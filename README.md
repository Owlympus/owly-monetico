# OwlyMonetico
Une petite librairie en PHP qui facilite la mise en place de [Monetico](https://www.monetico-paiement.fr/fr/accueil.html).

---

# Partie FR 🇫🇷

## Installation

```shell
composer require owlympus/owly-monetico
```

## Prérequis
- PHP >= 7.4

## Usage

### Monetico
```php
$monetico = new \OwlyMonetico\Monetico(
    '1234567', // Code TPE, 7 caractères max
    '0E23341908D38F6119E49F77651A15B8D4290203', // Clé de sécurité, 40 caractères hexadécimaux
    'maSociete' // Code société
);
```

### Client
```php
use OwlyMonetico\Collection\Civility;
use OwlyMonetico\Collection\Country;
use OwlyMonetico\Model\Customer;

$customer = (new Customer())
    ->setCivility($id_gender == 1 ? Civility::MR : Civility::MLLE) // Optionnel
    ->setFirstName('John') // Optionnel
    ->setLastName('Doe') // Optionnel
    ->setBirthdate(new DateTime('1970-01-01')) // Optionnel
    ->setEmail('john.doe@site.ext') // Optionnel
    ->setCountry(Country::FR); // Optionnel
```

### Item et Panier
```php
use OwlyMonetico\Model\Cart;
use OwlyMonetico\Model\Item;

$item = (new Item())
    ->setName('Item de test') // Optionnel
    ->setQuantity(1)
    ->setUnitPrice(2000); // En centimes

$cart = (new Cart())
    ->addItem($item);
```

### Addresse de facturation
```php
use OwlyMonetico\Collection\Country;
use OwlyMonetico\Model\BillingAddress;

$billingAddress = new BillingAddress(
    'Pl. Général de Gaulle',
    'La Valette-du-Var',
    '83160',
    Country::FR)
    ->setFirstName('John') // Optionnel
    ->setLastName('Doe') // Optionnel
    ->setEmail('john.doe@site.ext'); // Optionnel
```

### Addresse de livraison
```php
use OwlyMonetico\Collection\Country;
use OwlyMonetico\Model\ShippingAddress;

$billingAddress = new ShippingAddress(
    'Pl. Général de Gaulle',
    'La Valette-du-Var',
    '83160',
    Country::FR)
    ->setFirstName('John') // Optionnel
    ->setLastName('Doe') // Optionnel
    ->setEmail('john.doe@site.ext'); // Optionnel
```

### Commande
```php
use OwlyMonetico\Model\Order;

$order = new Order(
    uniqid('ref_'),
    $cart->getItemTotalAmount(),
    $customer,
    $cart,
    $billingAddress,
    $shippingAddress
);
```

## Paiements

### Paiement simple
Récupération des champs à envoyer en POST.
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\SimplePaymentRequest;

$simpleRequest = (new SimplePaymentRequest($order, Language::FR, Currency::EUR))
    ->setUrlSuccess('http://localhost/success') // Optionnel
    ->setUrlError('http://localhost/fail') // Optionnel
    ->setEmail('john.doe@site.ext'); // Optionnel pour envoyer le reçu.

// Récupération des valeurs AVEC vérification des champs
try {
    $simpleFields = $monetico->getSimplePaymentRequestFields($simpleRequest); // skipValidation: false par défaut
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($simpleFields);

// Récupération des champs SANS vérification
$simpleFields = $monetico->getSimplePaymentRequestFields($simpleRequest, true); // skipValidation: true
var_dump($simpleFields);
```

### Paiement en page épurée
Permet l'affichage de la page de paiement dans une iFrame avec les champs en GET.
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\IFramePaymentRequest;

$iFrameRequest = (new IFramePaymentRequest($order, Language::FR, Currency::EUR, 'john.doe@site.ext')) // Email obligatoire pour cette méthode
    ->setUrlSuccess('http://localhost/success') // Optionnel
    ->setUrlError('http://localhost/fail'); // Optionnel

// Récupération des valeurs AVEC vérification des champs
try {
    $iframeFields = $monetico->getIFramePaymentRequestFields($iFrameRequest); // skipValidation: false par défaut
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($iframeFields);

// Récupération des champs SANS vérification
$iframeFields = $monetico->getIFramePaymentRequestFields($iFrameRequest, true); // skipValidation: true
var_dump($iframeFields);
```

### Paiement en 2x, 3x ou 4x
Récupération des champs à envoyer en POST.
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\SplitPaymentRequest;

$splitRequest = (new SplitPaymentRequest($order, Language::FR, Currency::EUR, 2)) // Nombre de paiements
    ->setUrlSuccess('http://localhost/success.php') // Optionnel
    ->setUrlError('http://localhost/fail.php') // Optionnel
    ->setDueAmount1(10.00)
    ->setDueDate1(new DateTime()) // Premier paiement aujourd'hui
    ->setDueAmount2(10.00)
    ->setDueDate2(new DateTime('+1 month')); // Second paiement dans un mois (Échéances mensuelles obligatoires)

// Récupération des valeurs AVEC vérification des champs
try {
    $splitFields = $monetico->getSplitPaymentRequestFields($splitRequest); // skipValidation: false par défaut
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($iframeFields);

// Récupération des champs SANS vérification
$splitFields = $monetico->getSplitPaymentRequestFields($splitRequest, true); // skipValidation: true
var_dump($splitFields);
```

### Paiement avec pré-autorisation
Récupération des champs à envoyer en POST.
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\PreAuthorizedPaymentRequest;

$preAuthorizedRequest = (new PreAuthorizedPaymentRequest($order, Language::FR, Currency::EUR, '20150901PRE1')) // Le numéro de dossier obligatoire
    ->setUrlSuccess('http://localhost/success.php') // Optionnel
    ->setUrlError('http://localhost/fail.php'); // Optionnel

// Récupération des valeurs AVEC vérification des champs
try {
    $preAuthorizedFields = $monetico->getPreAuthorizedPaymentRequestFields($splitRequest); // skipValidation: false par défaut
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($preAuthorizedFields);

// Récupération des champs SANS vérification
$preAuthorizedFields = $monetico->getPreAuthorizedPaymentRequestFields($preAuthorizedRequest, true); // skipValidation: true
var_dump($preAuthorizedFields);
```

### Paiement en 3x, 4x via COFIDIS
Récupération des champs à envoyer en POST.
```php
use OwlyMonetico\Collection\Civility;
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\CofidisPaymentRequest;

$cofidisRequest = (new CofidisPaymentRequest($order, Language::FR, Currency::EUR))
    ->setCivility(Civility::MR) // Optionnel
    ->setFirstName('Yannick') // Optionnel
    ->setUrlSuccess('http://localhost/success.php') // Optionnel
    ->setUrlError('http://localhost/fail.php'); // Optionnel

// Récupération des valeurs AVEC vérification des champs
try {
    $cofidisFields = $monetico->getCofidisPaymentRequestFields($splitRequest); // skipValidation: false par défaut
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($preAuthorizedFields);

// Récupération des valeurs SANS vérification des champs
$cofidisFields = $monetico->getCofidisPaymentRequestFields($cofidisRequest, true); // skipValidation: true
var_dump($cofidisFields);
```

## Vérifications

La vérification des retours venant des `url_success` et `url_error` arrive prochainement.

## License

La librairie est sous licence [GNU](LICENCE).

---

# Part EN/US 🇬🇧/🇺🇸

## Installation

```shell
composer require owlympus/owly-monetico
```

## Requirements
- PHP >= 7.4

## Usage

### Monetico
```php
$monetico = new \OwlyMonetico\Monetico(
    '1234567', // EPT Code, 7 characters max
    '0E23341908D38F6119E49F77651A15B8D4290203', // Security key, 40 hexadecimal characters
    'myCompany' // Company code
);
```

### Customer
```php
use OwlyMonetico\Collection\Civility;
use OwlyMonetico\Collection\Country;
use OwlyMonetico\Model\Customer;

$customer = (new Customer())
    ->setCivility($id_gender == 1 ? Civility::MR : Civility::MLLE) // Optional
    ->setFirstName('John') // Optional
    ->setLastName('Doe') // Optional
    ->setBirthdate(new DateTime('1970-01-01')) // Optional
    ->setEmail('john.doe@site.ext') // Optional
    ->setCountry(Country::FR); // Optional
```

### Item et Cart
```php
use OwlyMonetico\Model\Cart;
use OwlyMonetico\Model\Item;

$item = (new Item())
    ->setName('Test item') // Optional
    ->setQuantity(1)
    ->setUnitPrice(2000); // In cents

$cart = (new Cart())
    ->addItem($item);
```

### Billing address
```php
use OwlyMonetico\Collection\Country;
use OwlyMonetico\Model\BillingAddress;

$billingAddress = new BillingAddress(
    'Pl. Général de Gaulle',
    'La Valette-du-Var',
    '83160',
    Country::FR)
    ->setFirstName('John') // Optional
    ->setLastName('Doe') // Optional
    ->setEmail('john.doe@site.ext'); // Optional
```

### Shipping address
```php
use OwlyMonetico\Collection\Country;
use OwlyMonetico\Model\ShippingAddress;

$billingAddress = new ShippingAddress(
    'Pl. Général de Gaulle',
    'La Valette-du-Var',
    '83160',
    Country::FR)
    ->setFirstName('John') // Optional
    ->setLastName('Doe') // Optional
    ->setEmail('john.doe@site.ext'); // Optional
```

### Commande
```php
use OwlyMonetico\Model\Order;

$order = new Order(
    uniqid('ref_'),
    $cart->getItemTotalAmount(),
    $customer,
    $cart,
    $billingAddress,
    $shippingAddress
);
```

## Payments

### Simple payment
Get the fields to send in POST
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\SimplePaymentRequest;

$simpleRequest = (new SimplePaymentRequest($order, Language::FR, Currency::EUR))
    ->setUrlSuccess('http://localhost/success') // Optional
    ->setUrlError('http://localhost/fail') // Optional
    ->setEmail('john.doe@site.ext'); // Optional to send the bill.

// Get the fields WITH field validation
try {
    $simpleFields = $monetico->getSimplePaymentRequestFields($simpleRequest); // skipValidation: false by default
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($simpleFields);

// Get the fields WITHOUT field validation
$simpleFields = $monetico->getSimplePaymentRequestFields($simpleRequest, true); // skipValidation: true
var_dump($simpleFields);
```

### Paiement en page épurée
Allows the payment page to be displayed in an iFrame with the fields in GET.
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\IFramePaymentRequest;

$iFrameRequest = (new IFramePaymentRequest($order, Language::FR, Currency::EUR, 'john.doe@site.ext')) // Email required for this method
    ->setUrlSuccess('http://localhost/success') // Optional
    ->setUrlError('http://localhost/fail'); // Optional

// Get the fields WITH field validation
try {
    $iframeFields = $monetico->getIFramePaymentRequestFields($iFrameRequest); // skipValidation: false by default
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($iframeFields);

// Get the fields WITHOUT field validation
$iframeFields = $monetico->getIFramePaymentRequestFields($iFrameRequest, true); // skipValidation: true
var_dump($iframeFields);
```

### Paiement en 2x, 3x ou 4x
Get the fields to send in POST
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\SplitPaymentRequest;

$splitRequest = (new SplitPaymentRequest($order, Language::FR, Currency::EUR, 2)) // Nombre de paiements
    ->setUrlSuccess('http://localhost/success.php') // Optional
    ->setUrlError('http://localhost/fail.php') // Optional
    ->setDueAmount1(10.00)
    ->setDueDate1(new DateTime()) // First payment today
    ->setDueAmount2(10.00)
    ->setDueDate2(new DateTime('+1 month')); // Second payment in a month (Monthly due dates)

// Get the fields WITH field validation
try {
    $splitFields = $monetico->getSplitPaymentRequestFields($splitRequest); // skipValidation: false by default
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($iframeFields);

// Get the fields WITHOUT field validation
$splitFields = $monetico->getSplitPaymentRequestFields($splitRequest, true); // skipValidation: true
var_dump($splitFields);
```

### Paiement avec pré-autorisation
Get the fields to send in POST
```php
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\PreAuthorizedPaymentRequest;

$preAuthorizedRequest = (new PreAuthorizedPaymentRequest($order, Language::FR, Currency::EUR, '20150901PRE1')) // Required file number
    ->setUrlSuccess('http://localhost/success.php') // Optional
    ->setUrlError('http://localhost/fail.php'); // Optional

// Get the fields WITH field validation
try {
    $preAuthorizedFields = $monetico->getPreAuthorizedPaymentRequestFields($splitRequest); // skipValidation: false by default
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($preAuthorizedFields);

// Get the fields WITHOUT field validation
$preAuthorizedFields = $monetico->getPreAuthorizedPaymentRequestFields($preAuthorizedRequest, true); // skipValidation: true
var_dump($preAuthorizedFields);
```

### Paiement en 3x, 4x via COFIDIS
Get the fields to send in POST
```php
use OwlyMonetico\Collection\Civility;
use OwlyMonetico\Collection\Currency;
use OwlyMonetico\Collection\Language;
use OwlyMonetico\Request\CofidisPaymentRequest;

$cofidisRequest = (new CofidisPaymentRequest($order, Language::FR, Currency::EUR))
    ->setCivility(Civility::MR) // Optional
    ->setFirstName('Yannick') // Optional
    ->setUrlSuccess('http://localhost/success.php') // Optional
    ->setUrlError('http://localhost/fail.php'); // Optional

// Get the fields WITH field validation
try {
    $cofidisFields = $monetico->getCofidisPaymentRequestFields($splitRequest); // skipValidation: false by default
} catch (Exception $e) {
    die($e->getMessage());
}
var_dump($preAuthorizedFields);

// Get the fields WITHOUT field validation
$cofidisFields = $monetico->getCofidisPaymentRequestFields($cofidisRequest, true); // skipValidation: true
var_dump($cofidisFields);
```

## Checks

Checking for returns from `url_success` and `url_error` is coming soon.

## License

The library is licensed under [GNU](LICENCE).