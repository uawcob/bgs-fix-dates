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
    $contents = "<table><tr><td>Row 1 Column 1</td><td>Row 1 Column 2</td></tr><tr><td>Row 2 Column 1</td><td>Row 2 Column 2</td></tr></table>";
    $DOM = new DOMDocument;
    $DOM->loadHTML($contents);

    $items = $DOM->getElementsByTagName('tr');

    foreach ($items as $node) {
        echo tdrows($node->childNodes) . "<br />";
    }
}

getdata();
