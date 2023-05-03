<?php

namespace OwlyMonetico;

use Doctrine\DBAL\Schema\Table;
use Exception;
use OwlyMonetico\Collection\Civility;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Collection\PaymentProtocol;
use OwlyMonetico\Collection\ThreeDSecureChallenge;
use OwlyMonetico\Interfaces\PaymentRequestInterface;
use OwlyMonetico\Request\CofidisPaymentRequest;
use OwlyMonetico\Request\IFramePaymentRequest;
use OwlyMonetico\Request\PreAuthorizedPaymentRequest;
use OwlyMonetico\Request\SimplePaymentRequest;
use OwlyMonetico\Request\SplitPaymentRequest;

class Monetico
{
    const DEV_URL = 'https://p.monetico-services.com/test/paiement.cgi';

    const PROD_URL = 'https://p.monetico-services.com/paiement.cgi';

    const VERSION = '3.0';

    private string $eptCode;

    private string $securityKey;

    private string $companyCode;
    private string $test1;
    private string $test2;

    private string $mode = 'prod';

    public function __construct(string $eptCode, string $securityKey, string $companyCode)
    {
        $this->eptCode = $eptCode;
        $this->securityKey = $securityKey;
        $this->companyCode = $companyCode;

        $this->test1 = $eptCode . $securityKey;
        $this->test2 = $eptCode . $companyCode;
    }

    public function getDB()
    {
        return new Table();
    }

    public function getEptCode(): int
    {
        return $this->eptCode;
    }

    public function getSecurityKey(): string
    {
        return $this->securityKey;
    }

    public function getCompanyCode(): string
    {
        return $this->companyCode;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): Monetico
    {
        $this->mode = $mode;
        return $this;
    }

    private function getUsableKey(): string
    {
        $hexStrKey = substr($this->securityKey, 0, 38);
        $hexFinal = substr($this->securityKey, 38, 2) . '00';

        $cca0 = ord($hexFinal);

        if ($cca0 > 70 && $cca0 < 97)
            $hexStrKey .= chr($cca0 - 23) . substr($hexFinal, 1, 1);
        else {
            if (substr($hexFinal, 1, 1) == 'M')
                $hexStrKey .= substr($hexFinal, 0, 1) . '0';
            else
                $hexStrKey .= substr($hexFinal, 0, 2);
        }

        return $hexStrKey;
    }

    public function calculateMAC($fields): string
    {
        ksort($fields);
        return hash_hmac(
            'sha1',
            implode(
                '*',
                array_map(
                    fn($k, $v) => "$k=$v",
                    array_keys($fields),
                    $fields
                )
            ),
            hex2bin($this->getUsableKey())
        );
    }

    public function validateSeal(array $fields, string $expectedSeal): bool
    {
        return strtoupper($this->calculateMAC($fields)) === strtoupper($expectedSeal);
    }

    /**
     * @throws Exception
     */
    private function validatePaymentRequestFields($data)
    {
        // Required
        if (preg_match('/^[A-Za-z\d]{7}$/', $data['TPE']) === false)
            throw new Exception('Field "Monetico->eptCode" incorrect (' . $data['TPE'] . '). Need 7 alphanumerics characters ([A-Za-z0-9]{7})');
        if ($data['version'] !== '3.0')
            throw new Exception('Field "Monetico::VERSION" incorrect (' . $data['version'] . '). Value "3.0" needed.');
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}:\d{2}:\d{2}:\d{2}$/', $data['date']) === false)
            throw new Exception('Field "PaymentRequestInterface->Order->date" incorrect (' . $data['date'] . '). Need format DD/MM/YYYY:hh:mm:ss.');
        if (preg_match('/^\d+(\.\d{1,2})?[A-Z]{3}$/', $data['montant']) === false)
            throw new Exception('Field "PaymentRequestInterface->Order->amount" incorrect (' . $data['montant'] . '). Need format numbers + devise or number + decimal + devise (ex: 35EUR or 45.75USD).');
        if (preg_match('/^[\x20-\x7E]{1,50}$/', $data['reference']) === false)
            throw new Exception('Field "PaymentRequestInterface->Order->reference" incorrect (' . $data['reference'] . '). Need 50 characters max, 12 is optimal for banking bills (ex: REF7896543). Pattern: /^[\x20-\x7E]{1,50}$/');
        if (!in_array($data['lgue'], Language::all()))
            throw new Exception('Field "PaymentRequestInterface->language" incorrect (' . $data['lgue'] . '). Need to be an available language in this list: ' . implode(', ', Language::all()));
        if (preg_match('/^[\da-f]{40}$/', $data['MAC']) === false)
            throw new Exception('Field "MAC" incorrect (' . $data['MAC'] . '). Need 40 hexadecimal characters. Pattern: /^[\da-f]{40}$/');
        if (preg_match('/^(?:[A-Za-z\d+]{4})*(?:[A-Za-z\d+]{2}==|[A-Za-z\d+]{3}=)$/', $data['contexte_commande']) === false)
            throw new Exception('Field "contexte_commande" incorrect (' . $data['contexte_commande'] . '). Need base64 encoded JSON UTF8 data. Pattern: /^(?:[A-Za-z\d+]{4})*(?:[A-Za-z\d+]{2}==|[A-Za-z\d+]{3}=)$/');
        if (empty($data['societe']))
            throw new Exception('Field "Monetico->companyCode" incorrect (' . $data['societe'] . '). Need to be not null.');
        // Optional
        if (!empty($data['texte-libre']) && strlen($data['texte-libre']) > 3200)
            throw new Exception('Field "PaymentRequestInterface->freeText" incorrect (' . $data['texte-libre'] . '). 3200 characters max.');
        if (!empty($data['url_retour_ok']) && filter_var($data['url_retour_ok'], FILTER_VALIDATE_URL) === false)
            throw new Exception('Field "PaymentRequestInterface->urlSuccess" incorrect (' . $data['url_retour_ok'] . '). Valid url required.');
        if (!empty($data['url_retour_err']) && filter_var($data['url_retour_err'], FILTER_VALIDATE_URL) === false)
            throw new Exception('Field "PaymentRequestInterface->urlError" incorrect (' . $data['url_retour_err'] . '). Valid url required.');
        if (!empty($data['ThreeDSecureChallenge']) && !in_array($data['ThreeDSecureChallenge'], ThreeDSecureChallenge::all()))
            throw new Exception('Field "PaymentRequestInterface->threeDSecureChallenge" incorrect (' . $data['ThreeDSecureChallenge'] . '). Need to be an available 3D secure challenge in this list: ' . implode(', ', ThreeDSecureChallenge::all()));
        if (!empty($data['libelleMonetique']) && preg_match('/^[A-Z a-z\d]{1,32}$/', $data['libelleMonetique']) === false)
            throw new Exception('Field "PaymentRequestInterface->paymentLabel" incorrect (' . $data['libelleMonetique'] . '). 32 characters max. Pattern: /^[A-Z a-z\d]{1,32}$/');
        if (!empty($data['libelleMonetiqueLocalite']) && strlen($data['libelleMonetiqueLocalite']) > 32 && preg_match('/^[-A-Z a-z\d]+\\[-A-Z a-z0-9]*\\[A-Za-z]{3}$/', $data['libelleMonetiqueLocalite']) === false)
            throw new Exception('Field "PaymentRequestInterface->paymentLabelLocal" incorrect (' . $data['libelleMonetiqueLocalite'] . '). 32 characters max. Exemple: Strasbourg\67000\FRA or Strasbourg\\\\FRA. Pattern: /^[-A-Z a-z\d]+\\\\[-A-Z a-z0-9]*\\\\[A-Za-z]{3}$/');
        if (!empty($data['desactivemoyenpaiement']) && !empty(array_diff(PaymentProtocol::all(), explode(',', $data['desactivemoyenpaiement']))))
            throw new Exception('Field "PaymentRequestInterface->disabledPaymentMethods" incorrect (' . $data['desactivemoyenpaiement'] . '). Need to be available payments methods in this list: ' . implode(', ', ThreeDSecureChallenge::all()));
        if (!empty($data['aliascb']) && preg_match('/^[a-zA-Z\d]{1,64}$/', $data['aliascb']) === false)
            throw new Exception('Field "PaymentRequestInterface->customerCardAlias" incorrect (' . $data['aliascb'] . '). Need 64 alphanumeric characters max.');
        if (!empty($data['protocole']) && !in_array($data['protocole'], PaymentProtocol::all()))
            throw new Exception('Field "PaymentRequestInterface->paymentProtocol" incorrect (' . $data['protocole'] . '). Need to be an available payment protocol in this list: ' . implode(', ', PaymentProtocol::all()));
    }

    /**
     * @throws Exception
     */
    private function getPaymentRequestFields(PaymentRequestInterface $paymentRequest, $skipValidation): array
    {
        $fields = [
            'TPE' => $this->eptCode,
            'version' => $this::VERSION,
            'date' => $paymentRequest->getOrder()->getDate()->format($paymentRequest::DATETIME_FORMAT),
            'montant' => sprintf('%01.2f%s', $paymentRequest->getOrder()->getAmount(), $paymentRequest->getCurrency()),
            'societe' => $this->companyCode,
            'reference' => $paymentRequest->getOrder()->getReference(),
            'lgue' => $paymentRequest->getLanguage(),
            'contexte_commande' => base64_encode(utf8_encode(json_encode([
                'billing' => $paymentRequest->getOrder()->getBillingAddress()->generateContext($skipValidation),
                'shipping' => $paymentRequest->getOrder()->getShippingAddress()->generateContext($skipValidation),
                'shoppingCart' => $paymentRequest->getOrder()->getCart()->generateContext($skipValidation),
                'client' => $paymentRequest->getOrder()->getCustomer()->generateContext($skipValidation)
            ])))
        ];

        if (!empty($paymentRequest->getUrlSuccess()))
            $fields['url_retour_ok'] = $paymentRequest->getUrlSuccess();
        if (!empty($paymentRequest->getUrlError()))
            $fields['url_retour_err'] = $paymentRequest->getUrlError();
        if (!empty($paymentRequest->getFreeText()))
            $fields['texte-libre'] = $paymentRequest->getFreeText();
        if (!is_null($paymentRequest->getDisengageable3DS()))
            $fields['3dsdebrayable'] = $paymentRequest->getDisengageable3DS();
        if (!empty($paymentRequest->getThreeDSecureChallenge()))
            $fields['ThreeDSecureChallenge'] = $paymentRequest->getThreeDSecureChallenge();
        if (!empty($paymentRequest->getPaymentLabel()))
            $fields['libelleMonetique'] = $paymentRequest->getPaymentLabel();
        if (!empty($paymentRequest->getPaymentLabelLocal()))
            $fields['libelleMonetiqueLocalite'] = $paymentRequest->getPaymentLabelLocal();
        if (!empty($paymentRequest->getDisabledPaymentMethods()))
            $fields['desactivemoyenpaiement'] = implode(',', $paymentRequest->getDisabledPaymentMethods());
        if (!empty($paymentRequest->getCustomerCardAlias()))
            $fields['aliascb'] = $paymentRequest->getCustomerCardAlias();
        if (!is_null($paymentRequest->getForceCardInput()))
            $fields['forcesaisiecb'] = $paymentRequest->getForceCardInput();
        if (!empty($paymentRequest->getPaymentProtocol()))
            $fields['protocole'] = $paymentRequest->getPaymentProtocol();

        return $fields;
    }

    /**
     * @throws Exception
     */
    public function getSimplePaymentRequestFields(SimplePaymentRequest $paymentRequest, $skipValidation = false): array
    {
        $fields = $this->getPaymentRequestFields($paymentRequest, $skipValidation);

        if (!empty($paymentRequest->getEmail()))
            $fields['mail'] = $paymentRequest->getEmail();

        $fields['MAC'] = $this->calculateMAC($fields);

        if (!$skipValidation) {
            $this->validatePaymentRequestFields($fields);

            if (!empty($fields['mail']) && filter_var($fields['mail'], FILTER_VALIDATE_EMAIL) === false)
                throw new Exception('Field "SimplePaymentRequest->email" incorrect (' . $fields['mail'] . '). Valid email required.');
        }

        return $fields;
    }

    /**
     * @throws Exception
     */
    public function getIFramePaymentRequestFields(IFramePaymentRequest $paymentRequest, $skipValidation = false): array
    {
        $fields = $this->getPaymentRequestFields($paymentRequest, $skipValidation);
        $fields['mail'] = $paymentRequest->getEmail();

        $fields['MAC'] = $this->calculateMAC($fields);

        if (!$skipValidation) {
            $this->validatePaymentRequestFields($fields);

            if (filter_var($fields['mail'], FILTER_VALIDATE_EMAIL) === false)
                throw new Exception('Field "IFramePaymentRequest->mail" incorrect (' . $fields['mail'] . '). Valid email required.');
        }

        return $fields;
    }

    /**
     * @throws Exception
     */
    public function getSplitPaymentRequestFields(SplitPaymentRequest $paymentRequest, $skipValidation = false): array
    {
        $fields = $this->getPaymentRequestFields($paymentRequest, $skipValidation);

        $fields['nbrech'] = $paymentRequest->getPaymentDeadline();
        for ($i = 1; $i <= $paymentRequest->getPaymentDeadline(); $i++) {
            $fields["montantech$i"] = sprintf('%01.2f%s', $paymentRequest->{"getDueAmount$i"}(), $paymentRequest->getCurrency());
            $fields["dateech$i"] = $paymentRequest->{"getDueDate$i"}()->format($paymentRequest::DUE_DATE_FORMAT);
        }

        if (!empty($paymentRequest->getEmail()))
            $fields['mail'] = $paymentRequest->getEmail();

        $fields['MAC'] = $this->calculateMAC($fields);

        if (!$skipValidation) {
            $this->validatePaymentRequestFields($fields);

            if ($fields['nbrech'] < 2 || $fields['nbrech'] > 4)
                throw new Exception('Field "SplitPaymentRequest->paymentDeadline" incorrect (' . $fields['nbrech'] . '). 2, 3 or 4 accepted.');

            $total = 0;
            for ($i = 1; $i <= $fields['nbrech']; $i++) {
                $total += $paymentRequest->{"getDueAmount$i"}();

                if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $fields["dateech$i"]) === false)
                    throw new Exception("Field \"SplitPaymentRequest->dueDate$i\" incorrect ( " . $fields["dateech$i"] . ' ). Format DD/MM/YYYY required.');
                if (preg_match('/^\d+(\.\d{1,2})?[A-Z]{3}$/', $fields["montantech$i"]) === false)
                    throw new Exception("Field \"SplitPaymentRequest->dueAmount1$i\" incorrect ( " . $fields["montantech$i"] . ' ). Need format numbers + devise or numbers + decimal + devise (ex: 35EUR or 45.75USD).');
            }

            if (sprintf('%01.2f%s', $total, $paymentRequest->getCurrency()) !== $fields['montant'])
                throw new Exception('Fields "SplitPaymentRequest->dueAmounts" incorrects (calculated: ' . sprintf('%01.2f%s', $total, $paymentRequest->getCurrency()) . '. total: ' . $fields['montant'] . '). Due amounts need to be equal to total amount.');

            // Optional
            if (!empty($fields['mail']) && filter_var($fields['mail'], FILTER_VALIDATE_EMAIL) === false)
                throw new Exception('Field "mail" incorrect (' . $fields['mail'] . '). Valid email required.');
        }

        return $fields;
    }

    /**
     * @throws Exception
     */
    public function getPreAuthorizedPaymentRequestFields(PreAuthorizedPaymentRequest $paymentRequest, $skipValidation = false): array
    {
        $fields = $this->getPaymentRequestFields($paymentRequest, $skipValidation);
        $fields['numero_dossier'] = $paymentRequest->getFileNumber();

        $fields['MAC'] = $this->calculateMAC($fields);

        if (!$skipValidation) {
            $this->validatePaymentRequestFields($fields);

            if (empty($fields['numero_dossier']) || strlen($fields['numero_dossier']) > 12)
                throw new Exception('Field "PreAuthorizedPaymentRequest->fileNumber" incorrect (' . $fields['numero_dossier'] . '). Need 12 alphanumeric characters max.');
        }

        return $fields;
    }

    /**
     * @throws Exception
     */
    public function getCofidisPaymentRequestFields(CofidisPaymentRequest $paymentRequest, $skipValidation = false): array
    {
        $fields = $this->getPaymentRequestFields($paymentRequest, $skipValidation);

        if(!empty($paymentRequest->getCivility()))
            $fields['civiliteclient'] = bin2hex($paymentRequest->getCivility());
        if(!empty($paymentRequest->getLastName()))
            $fields['nomclient'] = bin2hex($paymentRequest->getLastName());
        if(!empty($paymentRequest->getFirstName()))
            $fields['prenomclient'] = bin2hex($paymentRequest->getFirstName());
        if(!empty($paymentRequest->getAddress()))
            $fields['adresseclient'] = bin2hex($paymentRequest->getAddress());
        if(!empty($paymentRequest->getAdditionalAddress()))
            $fields['complementadresseclient'] = bin2hex($paymentRequest->getAdditionalAddress());
        if(!empty($paymentRequest->getPostalCode()))
            $fields['codepostalclient'] = bin2hex($paymentRequest->getPostalCode());
        if(!empty($paymentRequest->getCity()))
            $fields['villeclient'] = bin2hex($paymentRequest->getCity());
        if(!empty($paymentRequest->getCountry()))
            $fields['paysclient'] = bin2hex($paymentRequest->getCountry());
        if(!empty($paymentRequest->getPhone()))
            $fields['telephonefixeclient'] = bin2hex($paymentRequest->getPhone());
        if(!empty($paymentRequest->getMobilePhone()))
            $fields['telephonemobileclient'] = bin2hex($paymentRequest->getMobilePhone());
        if(!empty($paymentRequest->getBirthCountrySubdivision()))
            $fields['departementnaissanceclient'] = bin2hex($paymentRequest->getBirthCountrySubdivision());
        if(!empty($paymentRequest->getBirthdate()))
            $fields['datenaissanceclient'] = bin2hex($paymentRequest->getBirthdate()->format('Ymd'));
        if(!empty($paymentRequest->getPreScore()))
            $fields['prescore'] = bin2hex($paymentRequest->getPreScore());

        $fields['MAC'] = $this->calculateMAC($fields);

        if (!$skipValidation) {
            $this->validatePaymentRequestFields($fields);

            if (!empty($fields['civiliteclient']) && !in_array($fields['civiliteclient'], Civility::all()))
                throw new Exception('Field "CofidisPaymentRequest->civility" incorrect (' . $fields['civiliteclient'] . '). Need to be an available civility in this list: ' . implode(', ', Civility::all()));

            if (!empty($fields['nomclient']) && preg_match('/^[a-zA-Záàâäãåçéèêëíìîïñóòôöõúùûüýÿ-]{1,50}$/', $fields['nomclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->lastName" incorrect (' . $fields['nomclient'] . '). Need 50 characters max. Pattern: /^[a-zA-Záàâäãåçéèêëíìîïñóòôöõúùûüýÿ-]{1,50}/');

            if (!empty($fields['prenomclient']) && preg_match('/^[a-zA-Záàâäãåçéèêëíìîïñóòôöõúùûüýÿ-]{1,50}$/', $fields['prenomclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->firstName" incorrect (' . $fields['prenomclient'] . '). Need 50 characters max. Pattern: /^[a-zA-Záàâäãåçéèêëíìîïñóòôöõúùûüýÿ-]{1,50}/');

            if (!empty($fields['adresseclient']) && strlen($fields['adresseclient']) > 100)
                throw new Exception('Field "CofidisPaymentRequest->address" incorrect (' . $fields['adresseclient'] . '). Need 100 characters max.');

            if (!empty($fields['complementadresseclient']) && strlen($fields['complementadresseclient']) > 50)
                throw new Exception('Field "CofidisPaymentRequest->additionalAddress" incorrect (' . $fields['complementadresseclient'] . '). Need 50 characters max.');

            if (!empty($fields['codepostalclient']) && preg_match('/^[a-zA-Z\d]{1,10}$/', $fields['codepostalclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->postalCode" incorrect (' . $fields['codepostalclient'] . '). Need 10 alphanumeric characters max. Pattern: /^[a-zA-Z\d]{1,10}$/');

            if (!empty($fields['villeclient']) && preg_match('/^[a-zA-Z]{1,50}$/', $fields['villeclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->city" incorrect (' . $fields['villeclient'] . '). Need 50 characters max. Pattern: /^[a-zA-Z]{1,50}$/');

            if (!empty($fields['paysclient']) && !in_array($fields['paysclient'], Language::all()))
                throw new Exception('Field "CofidisPaymentRequest->country" incorrect (' . $fields['paysclient'] . '). Need to be an available country in this list: ' . implode(', ', Language::all()));

            if (!empty($fields['telephonefixeclient']) && preg_match('/^\d{2,20}$/', $fields['telephonefixeclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->phone" incorrect (' . $fields['telephonefixeclient'] . '). Need numeric characters. Pattern: /^\d{2,20}$/');

            if (!empty($fields['telephonemobileclient']) && preg_match('/^\d{2,20}$/', $fields['telephonemobileclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->mobilePhone" incorrect (' . $fields['telephonemobileclient'] . '). Need numeric characters. Pattern: /^\d{2,20}$/');

            if (!empty($fields['departementnaissanceclient']) && strlen($fields['departementnaissanceclient']) > 50)
                throw new Exception('Field "CofidisPaymentRequest->birthCountrySubdivision" incorrect (' . $fields['departementnaissanceclient'] . '). Need 50 characters max. Pattern: /^[a-zA-Z]{1,50}$/');

            if (!empty($fields['datenaissanceclient']) && preg_match('/^\d{8}$/', $fields['datenaissanceclient']) === false)
                throw new Exception('Field "CofidisPaymentRequest->birthdate" incorrect (' . $fields['datenaissanceclient'] . '). Need 8 numeric characters max. Pattern: /^\d{8}$/');

            if (!empty($fields['prescore']) && preg_match('/^\d+$/', $fields['prescore']) === false)
                throw new Exception('Field "CofidisPaymentRequest->preScore" incorrect (' . $fields['prescore'] . '). Need numeric characters. Pattern: /^\d+$/');
        }

        return $fields;
    }
}