<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Přidání článku";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center mb-5 fw-light fs-5"><b>Přídání článku</b></h1>

                        <?php
                        if (isset($tplData['uploadResult'])) {
                            if ($tplData['uploadResult'] == 0) { ?>
                                <div class="alert alert-success text-center" role="alert">
                                    <b>Článek byl úspěšně nahrán.</b>
                                </div>
                                <?php
                            } else if ($tplData['uploadResult'] == 1) { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <b>Članke se nepodařilo nahrát.</b>
                                    <p>Formát článku musí být PDF</p>
                                </div>

                                <?php
                            } else if ($tplData['uploadResult'] == 2) { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <b>Članke se nepodařilo nahrát.</b>
                                    <p>Došlo k chybě při nahrávání</p>
                                </div>

                                <?php
                            }
                        } ?>



                        <form method="post" enctype='multipart/form-data'>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required="required" id="floatingInput" name="nazevClanku" placeholder="Název článku">
                                <label for="floatingInput">Název článku</label>
                            </div>

                            <input type="file" class="form-control" accept="application/pdf" name="souborClanku" required="required"/>
                            <label class="form-label" for="customFile">Vyberte článek ve formátu PDF</label>

                            <br>

                            <div class="d-grid">
                                <button name="uploadSubmit" class="btn btn-primary" type="submit">Nahrát článek</button>
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