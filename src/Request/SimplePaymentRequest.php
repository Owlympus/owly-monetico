<?php

namespace OwlyMonetico\Request;

use OwlyMonetico\Interfaces\PaymentRequestInterface;
use OwlyMonetico\Model\Order;

class SimplePaymentRequest implements PaymentRequestInterface
{
    private Order $order;

    private string $language;

    private string $currency;

    private ?string $urlSuccess = null;

    private ?string $urlError = null;

    private ?string $email = null;

    private ?string $freeText = null;

    private ?bool $disengageable3DS = null;

    private ?string $threeDSecureChallenge = null;

    private ?string $paymentLabel = null;

    private ?string $paymentLabelLocal = null;

    private ?array $disabledPaymentMethods = null;

    private ?string $customerCardAlias = null;

    private ?bool $forceCardInput = null;

    private ?string $paymentProtocol = null;

    public function __construct(Order $order, string $language, string $currency)
    {
        $this->order = $order;
        $this->language = $language;
        $this->currency = $currency;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): SimplePaymentRequest
    {
        $this->order = $order;
        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): SimplePaymentRequest
    {
        $this->language = $language;
        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): SimplePaymentRequest
    {
        $this->currency = $currency;
        return $this;
    }

    public function getUrlSuccess(): ?string
    {
        return $this->urlSuccess;
    }

    public function setUrlSuccess(?string $urlSuccess): SimplePaymentRequest
    {
        $this->urlSuccess = $urlSuccess;
        return $this;
    }

    public function getUrlError(): ?string
    {
        return $this->urlError;
    }

    public function setUrlError(?string $urlError): SimplePaymentRequest
    {
        $this->urlError = $urlError;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): SimplePaymentRequest
    {
        $this->email = $email;
        return $this;
    }

    public function getThreeDSecureChallenge(): ?string
    {
        return $this->threeDSecureChallenge;
    }

    public function setThreeDSecureChallenge(?string $threeDSecureChallenge): SimplePaymentRequest
    {
        $this->threeDSecureChallenge = $threeDSecureChallenge;
        return $this;
    }

    public function getFreeText(): ?string
    {
        return $this->freeText;
    }

    public function setFreeText(?string $freeText): SimplePaymentRequest
    {
        $this->freeText = $freeText;
        return $this;
    }

    public function getPaymentLabel(): ?string
    {
        return $this->paymentLabel;
    }

    public function setPaymentLabel(?string $paymentLabel): SimplePaymentRequest
    {
        $this->paymentLabel = $paymentLabel;
        return $this;
    }

    public function getDisengageable3DS(): ?bool
    {
        return $this->disengageable3DS;
    }

    public function setDisengageable3DS(?bool $disengageable3DS): SimplePaymentRequest
    {
        $this->disengageable3DS = $disengageable3DS;
        return $this;
    }

    public function getPaymentLabelLocal(): ?string
    {
        return $this->paymentLabelLocal;
    }

    public function setPaymentLabelLocal(?string $paymentLabelLocal): SimplePaymentRequest
    {
        $this->paymentLabelLocal = $paymentLabelLocal;
        return $this;
    }

    public function getDisabledPaymentMethods(): ?array
    {
        return $this->disabledPaymentMethods;
    }

    public function setDisabledPaymentMethods(?array $disabledPaymentMethods): SimplePaymentRequest
    {
        $this->disabledPaymentMethods = $disabledPaymentMethods;
        return $this;
    }

    public function getCustomerCardAlias(): ?string
    {
        return $this->customerCardAlias;
    }

    public function setCustomerCardAlias(?string $customerCardAlias): SimplePaymentRequest
    {
        $this->customerCardAlias = $customerCardAlias;
        return $this;
    }

    public function getForceCardInput(): ?bool
    {
        return $this->forceCardInput;
    }

    public function setForceCardInput(?bool $forceCardInput): SimplePaymentRequest
    {
        $this->forceCardInput = $forceCardInput;
        return $this;
    }

    public function getPaymentProtocol(): ?string
    {
        return $this->paymentProtocol;
    }

    public function setPaymentProtocol(?string $paymentProtocol): SimplePaymentRequest
    {
        $this->paymentProtocol = $paymentProtocol;
        return $this;
    }
}