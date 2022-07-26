<?php

namespace OwlyMonetico\Model;

use DateTime;
use Exception;
use OwlyMonetico\Collection\Currency;

class Cart
{
    const DATE_FORMAT = 'Y-m-d';

    private ?int $giftCardAmount = null;

    private ?int $giftCardCount = null;

    private ?string $giftCardCurrency = null;

    private ?DateTime $preOrderDate = null;

    private ?bool $preorderIndicator = null;

    private ?bool $reorderIndicator = null;

    private ?array $items = null;

    public function getGiftCardAmount(): ?int
    {
        return $this->giftCardAmount;
    }

    public function setGiftCardAmount(?int $giftCardAmount): Cart
    {
        $this->giftCardAmount = $giftCardAmount;

        return $this;
    }

    public function getGiftCardCount(): ?int
    {
        return $this->giftCardCount;
    }

    public function setGiftCardCount(?int $giftCardCount): Cart
    {
        $this->giftCardCount = $giftCardCount;

        return $this;
    }

    public function getGiftCardCurrency(): ?string
    {
        return $this->giftCardCurrency;
    }

    public function setGiftCardCurrency(?string $giftCardCurrency): Cart
    {
        $this->giftCardCurrency = $giftCardCurrency;

        return $this;
    }

    public function getPreOrderDate(): ?DateTime
    {
        return $this->preOrderDate;
    }

    public function getFormatedPreOrderDate(): ?string
    {
        if ($this->getPreOrderDate() instanceof DateTime) {
            return $this->preOrderDate->format("Y-m-d");
        }
        return null;
    }

    public function setPreOrderDate(?DateTime $preOrderDate): Cart
    {
        $this->preOrderDate = $preOrderDate;

        return $this;
    }

    public function getPreorderIndicator(): ?bool
    {
        return $this->preorderIndicator;
    }

    public function setPreorderIndicator(?bool $preorderIndicator): Cart
    {
        $this->preorderIndicator = $preorderIndicator;

        return $this;
    }

    public function getReorderIndicator(): ?bool
    {
        return $this->reorderIndicator;
    }

    public function setReorderIndicator(?bool $reorderIndicator): Cart
    {
        $this->reorderIndicator = $reorderIndicator;

        return $this;
    }

    /** @return Item[] */
    public function getItems(): ?array
    {
        return $this->items;
    }

    public function addItem(Item $item): Cart
    {
        $this->items[] = $item;

        return $this;
    }

    public function setItems(?array $items): Cart
    {
        $this->items = $items;

        return $this;
    }

    public function getItemTotalAmount(): float
    {
        $total = 0.00;

        /** @var Item $item */
        foreach ($this->items as $item)
            $total += ($item->getUnitPrice() / 100);

        return $total;
    }

    /**
     * @throws Exception
     */
    public function validate($data)
    {
        if(!empty($data['giftCardAmount']) && strlen($data['giftCardAmount']) > 12)
            throw new Exception('Field "Cart->giftCardAmount" incorrect (' . $data['giftCardAmount'] . '). Need 12 numbers max.');
        if(!empty($data['giftCardCount']) && strlen($data['giftCardCount']) > 2)
            throw new Exception('Field "Cart->giftCardCount" incorrect (' . $data['giftCardCount'] . '). Need 2 numbers max.');
        if(!empty($data['giftCardCurrency']) && !in_array($data['giftCardCurrency'], Currency::all()))
            throw new Exception('Field "Cart->giftCardCurrency" incorrect (' . $data['giftCardCurrency'] . '). Need to be an available currency in this list: ['.implode(', ', Currency::all()).'].');
        if(!empty($data['preOrderDate']) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $data['preOrderDate']) === false)
            throw new Exception('Field "Cart->preOrderDate" incorrect (' . $data['preOrderDate'] . '). Need to be format YYYY-MM-DD.');
        if(!empty($data['items']) && !is_array($data['items']))
            throw new Exception('Field "Cart->items" incorrect. Need to be an array.');
    }

    /**
     * @throws Exception
     */
    public function generateContext($skipValidation = false): array
    {
        $data = [];

        // Optional
        if(isset($this->giftCardAmount))
            $data['giftCardAmount'] = $this->giftCardAmount;
        if(isset($this->giftCardCount))
            $data['giftCardCount'] = $this->giftCardCount;
        if(!empty($this->giftCardCurrency))
            $data['giftCardCurrency'] = $this->giftCardCurrency;
        if(!empty($this->preOrderDate))
            $data['preOrderDate'] = $this->preOrderDate;
        if(isset($this->preorderIndicator))
            $data['preorderIndicator'] = $this->preorderIndicator;
        if(isset($this->reorderIndicator))
            $data['reorderIndicator'] = $this->reorderIndicator;

        if(!empty($this->items))
            /** @var Item $item */
            foreach ($this->items as $item)
                $data['shoppingCartItems'][] = $item->generateContext($skipValidation);

        if(!$skipValidation)
            $this->validate($data);

        return $data;
    }
}