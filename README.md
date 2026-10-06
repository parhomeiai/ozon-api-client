## Installation

composer require escorp/ozon-api-client

## Usage

```php
app(OzonApiClient::class)->ping();

## None-Laravel Usage

```php
$ozon = OzonApiClientFactory::make(
    'WB_API_TOKEN',
    [
        'timeout' => 15,
        'retry_times' => 5,
        'retry_sleep_ms' => 500,
    ]
);

$prices = $ozon->prices->getPricesBatch([111, 222, 333]);