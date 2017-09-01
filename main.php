<?php

require __DIR__.'/vendor/autoload.php';

use Carbon\Carbon;

function processDate(Traversable $elements)
{
    $date = Carbon::createFromFormat('m/d/y', $elements[2]->nodeValue);

    if ($date->year >= 2018) {
        $date->subYears(100);
    }

    $elements[2]->nodeValue = $date->format('Y-m-d');
}

// https://stackoverflow.com/a/8450359/4233593
$DOM = new DOMDocument;
$DOM->loadHTMLFile(__DIR__.'/data.html');

$items = $DOM->getElementsByTagName('tr');

foreach ($items as $node) {
    processDate($node->childNodes);
}

$DOM->saveHTMLFile('fixed.html');
