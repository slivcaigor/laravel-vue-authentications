<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // Questa riga indica che il middleware CORS deve essere applicato a tutti i percorsi.
    'paths' => ['*'],

    // Questa riga indica che tutti i metodi HTTP (GET, POST, PUT, DELETE, ecc.) sono consentiti.
    'allowed_methods' => ['*'],

    // Questa riga indica gli URL di origine consentiti per la richiesta CORS
    'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],
    
    // Questa riga indica i pattern degli URL di origine consentiti per la richiesta CORS
    'allowed_origins_patterns' => [],

    // Questa riga indica gli header consentiti per la richiesta CORS
    'allowed_headers' => ['*'],

    // Questa riga indica gli header esposti nella risposta CORS
    'exposed_headers' => [],

    // Questa riga indica il tempo massimo di cache per una risposta CORS
    'max_age' => 0,

    // Questa riga indica se le credenziali devono essere inviate durante una richiesta CORS
    'supports_credentials' => true,

];