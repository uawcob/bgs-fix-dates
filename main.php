<?php

// https://stackoverflow.com/a/8450359/4233593
function tdrows($elements)
{
    $str = "";
    foreach ($elements as $element) {
        $str .= $element->nodeValue . ", ";
    }

    return $str;
}

function getdata()
{
    $DOM = new DOMDocument;
    $DOM->loadHTMLFile(__DIR__.'/data.html');

    $items = $DOM->getElementsByTagName('tr');

    foreach ($items as $node) {
        echo tdrows($node->childNodes) . "<br />";
    }
}

getdata();
