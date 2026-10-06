<?php

return [
    'client_id' => env('OZON_CLIENT_ID'),
    'api_key' => env('OZON_API_KEY'),

    'http' => [
        'timeout' => 10,
        'retry' => [
            'times' => 3,
            'sleep_ms' => 300,
        ],
    ],
];

