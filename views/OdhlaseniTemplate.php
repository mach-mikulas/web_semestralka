<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Odhlášení";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h1 class="card-title text-center mb-5 fw-light fs-5"><b>Opravdu se chceš odhlásit?</b></h1>


                    <form method="post">

                        <div class="d-grid">
                            <button name="odhlasitSubmit" onclick="window.location.href='index.php?page=uvod'" class="btn btn-outline-primary me-2" type="submit">Ano</button>
                            <br>
                            <button name="odhlasitNeSubmit"  class="btn btn-primary" type="submit">Ne</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$tplHeaders->getHTMLFooter();
?>
