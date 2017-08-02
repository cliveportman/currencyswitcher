# Craft Commerce Currency Switcher
Switches the currency of a cart when fed an ISO currency using Twig rather than an Update Cart form.

## Usage
Call the plugin with: ```{{ craft.currencySwitcher.switch('GBP') }}``` and it'll return the new payment currency code of the cart that you've just provided. 

In my case, I'm using the Geo plugin from Luke Holder to get a user's country, creating some arrays to define what currencies to use for what countries, and then looking for a match (defaulting to GBP). Here;s my template code from an include I call at the top of my layout file:
```
  {% set euroCountries = [
    'AD',
    'AT',
    'BE',
    'CY',
    'EE',
    'FI',
    'FR',
    'DE',
    'GR',
    'IE',
    'IT',
    'LV',
    'LT',
    'LU',
    'MC',
    'MT',
    'NL',
    'PT',
    'SK',
    'SI',
    'SM',
    'ES',
    'VA',
    'XK',
    'ME',
  ] %}

  {% set usDollarCountries = [
    'US',
  ] %}

  {% set canadianDollarCountries = [
    'CA',
  ] %}

  {% set australianDollarCountries = [
    'AU',
  ] %}

  {% set newZealandDollarCountries = [
    'NZ',
  ] %}

  {% if craft.geo.info.country_code in euroCountries %}
    {% set currency = 'EUR' %}

  {% elseif craft.geo.info.country_code in usDollarCountries %}
    {% set currency = 'USD' %}

  {% elseif craft.geo.info.country_code in canadianDollarCountries %}
    {% set currency = 'CAD' %}

  {% elseif craft.geo.info.country_code in australianDollarCountries %}
    {% set currency = 'AUD' %}

  {% elseif craft.geo.info.country_code in newZealandDollarCountries %}
    {% set currency = 'NZD' %}

  {% else %}
    {% set currency = 'GBP' %}

  {% endif %}

  {{ craft.currencySwitcher.switch(currency) }}
  ```
