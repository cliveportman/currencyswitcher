<?php
namespace Craft;

class CurrencySwitcherService extends BaseApplicationComponent
{

	public function switchCurrency($isoCurrency, $cart) 
	{

        // CHECK FOR A CART AND IF THERE ISN'T ONE, CREATE ONE
        //$cart = craft()->commerce_cart->getCart();   
        if (!$cart->id) {
            if (!craft()->commerce_orders->saveOrder($cart)) {
                $error = Craft::t('Error creating empty cart: ') . print_r($order->getAllErrors(), true);
                CurrencySwitcherPlugin::log($error, LogLevel::Error);
                throw new Exception($error);
            }
        }

        // GET THE PAYMENT CURRENCY FROM THE SUPPLIED ISO
        if (!$currency = craft()->commerce_paymentCurrencies->getPaymentCurrencyByIso($isoCurrency)) {
            $error = Craft::t("Error getting currency from ISO '$isoCurrency'. Ensure this currency has been enabled within Craft Commerce.");
            CurrencySwitcherPlugin::log($error, LogLevel::Error);
            throw new Exception($error);
        }

        // SET THE CART'S PAYMENT CURRENCY
        if (!craft()->commerce_cart->setPaymentCurrency($cart, $currency)) {
            //$error = Craft::t('Error on setting currency: ') . print_r($cart->getAllErrors(), true);
            //CurrencySwitcherPlugin::log($error, LogLevel::Error);
            //throw new Exception($error);
        }

        return $currency;

    }

}