# Piwik Pro Reporting API


## Usage

```
<?php

require '../vendor/autoload.php';

use PiwikPro\ReportingApi\Builder\ClientBuilder;
use PiwikPro\ReportingApi\Query\DirectQuery;
use PiwikPro\ReportingApi\Query\Parameter\Column;
use PiwikPro\ReportingApi\Query\Parameter\Date;
use PiwikPro\ReportingApi\Client\Query\Parameter\RelativeDate;

$clientBuilder = ClientBuilder::create('https://xyz.piwik.pro',
    'client_id',
    'client_secret'
);
$client = $clientBuilder->getClient();

$dateFrom = new Date(new \DateTime('01/01/2021'));
$dateTo = new Date(new \DateTime('03/30/2021'));

$query = new DirectQuery('website_id', [
    new Column('goal_uuid'),
    new Column('goal_conversions'),
    new Column('goal_revenue', 'sum'),
]);
$query->setLimit(10)
    ->setOffset(0)
    ->setDateFrom($dateFrom)
    ->setDateTo($dateTo);

echo '<pre>';
var_dump(json_decode($client->request($query)->getBody()->getContents()));
echo '</pre>';
```
