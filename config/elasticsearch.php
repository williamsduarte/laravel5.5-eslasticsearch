<?php

return [

    'elastic' => [
        'host' => env('ELASTIC_SEARCH_HOST', 'localhost'),
        'port' => env('ELASTIC_SEARCH_PORT', 9200),
        'scheme' => env('ELASTIC_SEARCH_SCHEME', 'https'),
        'user' => env('ELASTIC_SEARCH_USER', ''),
        'pass' => env('ELASTIC_SEARCH_PASS', ''),
    ]

];
