<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Přihlášení";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center mb-5 fw-light fs-5"><b>Přihlášení</b></h1>

                        <?php
                        if (isset($tplData['loginResult'])) {
                            if ($tplData['loginResult'] == 0) { ?>
                                <div class="alert alert-success text-center" role="alert">
                                    <b>Přihlášení proběhlo úspěšně.</b>
                                </div>
                                <?php
                            } else if ($tplData['loginResult'] == 1) { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <b>Přihlášení neproběhla úspěšně.</b>
                                    <p>Špatné přihlašovací jméno neho heslo.</p>
                                </div>

                                <?php
                            } else if ($tplData['loginResult'] == 2) { ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <b>ERROR</b>
                                    <p>CHYBA Databáze</p>
                                </div>


                                <?php
                            }
                        } ?>



                        <form method="post">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required="required" id="floatingInput" name="loginLogin" placeholder="Přihlašovací jméno">
                                <label for="floatingInput">Přihlašovací jméno</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" required="required" id="floatingPassword" name="loginPassword" placeholder="Heslo">
                                <label for="floatingPassword">Heslo</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">
                                    Zapamatovat heslo
                                </label>
                            </div>
                            <div class="d-grid">
                                <button name="loginSubmit" class="btn btn-primary" type="submit">Přihlásit se</button>
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