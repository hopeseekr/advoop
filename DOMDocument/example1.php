<?php

// 1. Load the XML file.
// There are two ways to load XML into a DOMDocument.

// 1a. Via a string:
/**
 * @return DOMDocument
 */
function loadXMLFromString()
{
    $xml = file_get_contents('cd_catalog.xml');
    $dom = new DOMDocument();
    $dom->loadXML($xml);

    return $dom;
}

// 1b. Or via the actual file.
/**
 * @return DOMDocument
 */
function loadXMLFromFile()
{
    $xmlFile = 'cd_catalog.xml';
    $dom = new DOMDocument();

    $dom->validateOnParse = true;
    $dom->formatOutput = true;
    $dom->load($xmlFile);

    return $dom;
}

$dom = loadXMLFromFile();

// 2. Every DOMDocument contains a 'firstChild' property which refers to the very first root element of the XML.
//    If an XML document contains two root elements, DOMDocument will throw an exception if you try to load it.
//print_r($dom->firstChild);

// 3. Almost all of the work with DOMDocument will be done via DOMNodes. Every DOMNode is also a DOMElement.
//    A DOMDocument is a Collection of DOMElements.
//    A DOMNode is a Collection of DOMElements which can have one or more Children.
//    A DOMElement is a piece of XML which cannot have children elements, such as TEXT.

// 4. You can search DOMDocuments for XML Ids much like you do with JavaScript:
$cd3Node = $dom->getElementById('cd3');

// 5. To get DOMNoe value
echo $cd3Node->nodeValue;




























