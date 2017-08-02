<?php
namespace Craft;

class CurrencySwitcherPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Currency Switcher');
    }

    public function getDescription()
    {
        return "Switches the currency of a cart when fed an ISO currency.";
    }

    function getVersion()
    {
        return '0.1';
    }

    function getDeveloper()
    {
        return 'Clive Portman';
    }

    function getDeveloperUrl()
    {
        return 'https://cliveportman.co.uk';
    }    
    
    public function init()
    {
        parent::init();
    }
    

}