# Piwik Pro Reporting API

## Description
Allows to query following resources:
 * https://developers.piwik.pro/en/latest/custom_reports/http_api/http_api.html#tag/Queries
 * https://developers.piwik.pro/en/latest/custom_reports/http_api/http_api.html#tag/Raw-data/paths/~1api~1analytics~1v1~1sessions~1/post
 * https://developers.piwik.pro/en/latest/custom_reports/http_api/http_api.html#tag/Raw-data/paths/~1api~1analytics~1v1~1events~1/post

## Installation 
This project can be installed using Composer. Run composer require adrian-lorenc/piwik-pro-reporting-api or add the following to your composer.json:
```json
{
  "require": {
    "adrian-lorenc/piwik-pro-reporting-api": "dev-develop"
  }
}
```

## Usage

```php
<?php

require '../vendor/autoload.php';

use PiwikPro\ReportingApi\Client;
use PiwikPro\ReportingApi\Query\DirectQuery;
use PiwikPro\ReportingApi\Query\Model\Column;
use PiwikPro\ReportingApi\Query\Model\Date;
use PiwikPro\ReportingApi\Query\Model\Direction;
use PiwikPro\ReportingApi\Query\Model\ColumnCondition;
use PiwikPro\ReportingApi\Query\Model\ColumnOperator;
use PiwikPro\ReportingApi\Query\Model\Condition;
use PiwikPro\ReportingApi\Query\Model\Filter;
use PiwikPro\ReportingApi\Query\Model\LogicalOperator;

$client = Client::create(
    'https://xyz.piwik.pro',
    'client_id',
    'client_secret'
);

$dateFrom = new Date(new DateTime('01/01/2021'));
$dateTo = new Date(new DateTime('03/30/2021'));

$columnCondition = new ColumnCondition(ColumnOperator::not_empty, null);
$condition = new Condition('goal_uuid', $columnCondition);

$filter = (new Filter(LogicalOperator::or))
    ->addCondition($condition);

$filterContainer = (new Filter(LogicalOperator::and))
    ->addFilter($filter);

$query = (new DirectQuery('website_id'))
    ->addColumn(new Column('goal_uuid'))
    ->addColumn(new Column('goal_conversions'))
    ->addColumn(new Column('goal_revenue', 'sum'))
    ->setLimit(10)
    ->setOffset(0)
    ->setDateFrom($dateFrom)
    ->setDateTo($dateTo)
    ->setFilter($filterContainer)
    ->addOrderBy(2, Direction::ASC);

echo '<pre>';
echo 'Requested serialized query:' . "\n";
var_dump(json_encode($query, JSON_PRETTY_PRINT));
echo "\n" . '--------------------------------------------------' . "\n";
echo 'Service response:' . "\n";
var_dump(json_decode($client->request($query)->getBody()->getContents()));
echo '</pre>';
```
