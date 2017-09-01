<?php

require __DIR__.'/vendor/autoload.php';

use Carbon\Carbon;

// https://stackoverflow.com/a/8450359/4233593
function processDate(Traversable $elements)
{
    $date = Carbon::createFromFormat('m/d/y', $elements[2]->nodeValue);
    return $date->format('Y-m-d');
}

function getdata()
{
    $DOM = new DOMDocument;
    $DOM->loadHTMLFile(__DIR__.'/data.html');

    $items = $DOM->getElementsByTagName('tr');

    foreach ($items as $node) {
        echo processDate($node->childNodes) . PHP_EOL;
    }
}

getdata();
