<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Úvodní stránka";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);


$res = "<h1>TEST</h1>";

echo $res;
?>


    <div class="container">

                <div class="shadow rounded-3 my-5">

                    <div class="row justify-content-md-center">

                        <div class="col">
                            1 of 3
                        </div>
                        <div class="col">
                            Variable width content
                        </div>
                        <div class="col col-lg-2">
                            3 of 3
                        </div>

                </div>

        </div>
    </div>

<?php
$tplHeaders->getHTMLFooter();
?>