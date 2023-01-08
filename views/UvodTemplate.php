<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Úvodní stránka";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hledáš informace?</h5>
                        <p class="card-text">Hledáš informace ohledně nějakého složitého tématu a nikde je nemůžeš najít nebo jen tak hledáš nějaké zajímavé téma?
                        Jestli ano, tak zamiř do sekce články. Je zde publikováno spoustu zajímavých věcí ze všech oborů.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Přidej se mezi nás</h5>
                        <p class="card-text">Jestli máš zajímavé téma co by si chtěl sdílet se světem, tak neváhej a <b>zaregistruj se</b> zdarma.
                        Bezplatně můžeš nahrávat články, které budou zrecenzovány odborníky v daných oborech.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$tplHeaders->getHTMLFooter();
?>