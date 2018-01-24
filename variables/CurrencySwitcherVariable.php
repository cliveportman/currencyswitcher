<?php

namespace Craft;

class CurrencySwitcherVariable
{

    public function switchCurrency($isoCurrency, $cart)
    {
        
        $currency = craft()->currencySwitcher->switchCurrency($isoCurrency, $cart);
        return $currency;

    }

}