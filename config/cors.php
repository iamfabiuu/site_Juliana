<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    | Origens definidas no .env (FRONTEND_URL), separadas por vírgula.
    | Ex.: FRONTEND_URL=https://costadh.com.br,https://www.costadh.com.br
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    // Várias origens separadas por vírgula; remove espaços, barras finais e itens vazios
    'allowed_origins' => array_values(array_filter(array_map(
        fn ($url) => rtrim(trim($url), '/'),
        explode(',', (string) env('FRONTEND_URL', 'http://localhost:3000'))
    ))),

    // Previews da Vercel (projeto "costadh") + subdomínios do domínio oficial
    'allowed_origins_patterns' => [
        '#^https://costadh(-[a-z0-9-]+)?\.vercel\.app$#',
        '#^https://([a-z0-9-]+\.)?costadh\.com\.br$#',
    ],

    'allowed_headers' => [
        'Content-Type',
        'Accept',
        'Authorization',
        'X-Requested-With',
        'X-XSRF-TOKEN',
    ],

    'exposed_headers' => [],

    'max_age' => 86400, // guarda o preflight em cache por 24h

    // false = autenticação via token (Bearer). Use true só se for Sanctum com cookie.
    'supports_credentials' => false,
];
