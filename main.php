<?php

// https://stackoverflow.com/a/8450359/4233593
function processDate(Traversable $elements)
{
    return $elements[2]->nodeValue;
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
