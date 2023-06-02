# Piwik Pro Reporting API


## Usage

```
<?php

require '../vendor/autoload.php';

use PiwikPro\ReportingApi\Builder\ClientBuilder;
use PiwikPro\ReportingApi\Query\DirectQuery;
use PiwikPro\ReportingApi\Query\Model\Column;
use PiwikPro\ReportingApi\Query\Model\Date;

$client = (ClientBuilder::create('https://xyz.piwik.pro',
    'client_id',
    'client_secret'
))->buildClient();

$dateFrom = new Date(new \DateTime('01/01/2021'));
$dateTo = new Date(new \DateTime('03/30/2021'));

$query = (new DirectQuery('website_id'))
    ->addColumn(new Column('goal_uuid'))
    ->addColumn(new Column('goal_conversions'))
    ->addColumn(new Column('goal_revenue', 'sum'))
    ->setLimit(10)
    ->setOffset(0)
    ->setDateFrom($dateFrom)
    ->setDateTo($dateTo)
    ->addOrderBy(2, Direction::ASC);

echo '<pre>';
var_dump(json_decode($client->request($query)->getBody()->getContents(), true));
echo '</pre>';
```
