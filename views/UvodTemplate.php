<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Úvodní stránka";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);


$res = "<h1>TEST</h1>";

echo $res;
?>

<?php
$tplHeaders->getHTMLFooter();
?>