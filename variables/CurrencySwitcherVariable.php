<?php

namespace Craft;

class CurrencySwitcherVariable
{

    public function switch($isoCurrency)
    {
        
        $currency = craft()->currencySwitcher->switchCurrency($isoCurrency);
        return $currency;

    }

}