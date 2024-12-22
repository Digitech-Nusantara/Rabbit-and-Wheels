<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Base URL
    |--------------------------------------------------------------------------
    |
    | Define which API service should be used to retrieve the exchange rates.
    |
    | Supported: "exchange-rates-api-io", "exchange-rates-data-api", "exchange-rate-host"
    |
    */
    'driver' => 'exchange-rates-api-io',

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | Define your API key here.
    |
    */
    'api_key' => env('EXCHANGE_RATES_API_KEY', '992f1fec0f04503e01b822337ff3848d'),

    /*
    |--------------------------------------------------------------------------
    | Use HTTPS
    |--------------------------------------------------------------------------
    |
    | Define if the API should be accessed via HTTPS or HTTP. The free tiers of
    | exchangeratesapi.io and exchangerate.host only allow API access via HTTP.
    |
    */
    'https' => false,
];
