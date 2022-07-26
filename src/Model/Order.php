<?php

namespace OwlyMonetico\Model;

use DateTime;

class Order
{
    private string $reference;

    private string $amount;

    private ?string $description = null;

    private DateTime $date;

    private BillingAddress $billingAddress;

    private Cart $cart;

    private Customer $customer;

    private ShippingAddress $shippingAddress;

    public function __construct(string $reference, string $amount, Customer $customer, Cart $cart, BillingAddress $billingAddress, ShippingAddress $shippingAddress)
    {
        $this->reference = $reference;
        $this->amount = $amount;
        $this->customer = $customer;
        $this->cart = $cart;
        $this->billingAddress = $billingAddress;
        $this->shippingAddress = $shippingAddress;
        $this->date = new DateTime();
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): Order
    {
        $this->reference = $reference;
        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): Order
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Order
    {
        $this->description = $description;
        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): Order
    {
        $this->date = $date;
        return $this;
    }

    public function getBillingAddress(): BillingAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(BillingAddress $billingAddress): Order
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    public function setCart(Cart $cart): Order
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): Order
    {
        $this->customer = $customer;
        return $this;
    }

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }
    public function setShippingAddress(ShippingAddress $shippingAddress): Order
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }
}