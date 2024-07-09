<?php

$currencyType = 840;
$urlApi = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
$response = file_get_contents($urlApi);
$data = json_decode($response, true);

foreach ($data as $key => $value) {
    $currencyCode = $value['r030'];
    $currencyName = $value["txt"];
    $currencyRate = $value["rate"];
    $currencyAbbr = $value["cc"];
    $exchangeDate = $value["exchangedate"];
    if ($currencyCode == $currencyType) {
        echo 'Курс на ' . $exchangeDate . PHP_EOL;
        echo 'Валюта: ' . $currencyName . PHP_EOL;
        echo 'Курс: ' . $currencyRate . ' ' . $currencyAbbr . PHP_EOL;
    };
}