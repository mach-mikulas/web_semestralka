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
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Přihlášení</h5>
                        <form>

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
                                <button class="btn btn-primary" type="submit">Přihlásit se</button>
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