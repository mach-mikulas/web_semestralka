<?php

global $tplData;

require("TemplateBasics.php");

$tplData['title'] = "Registrace";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center mb-5 fw-light fs-5"><b>Registrace</b></h1>


                        <?php
                            if (isset($tplData['registerResult'])) {
                                if ($tplData['registerResult'] == 0) { ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        <b>Registrace proběhla úspěšně.</b>
                                    </div>
                            <?php
                                } else if ($tplData['registerResult'] == 1) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <b>Registrace neproběhla úspěšně.</b>
                                        <p>Toto uživatelské jméno již využíván.</p>
                                    </div>
                            <?php
                                } else if ($tplData['registerResult'] == 2) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <b>Registrace neproběhla úspěšně.</b>
                                        <p>Tento e-mail je již využíváno.</p>
                                    </div>
                        <?php
                                }
                            } ?>



                        <form method="post">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required="required" id="floatingInput" name="registerJmeno" placeholder="Jméno">
                                <label for="floatingInput">Jméno</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required="required" id="floatingInput" name="registerPrijmeni" placeholder="Příjmení">
                                <label for="floatingInput">Příjmení</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required="required" id="floatingInput" name="registerLogin" placeholder="Přihlašovací jméno">
                                <label for="floatingInput">Přihlašovací jméno</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" required="required" id="floatingInput" name="registerEmail" placeholder="Email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" required="required" id="floatingPassword" name="registerPassword" placeholder="Heslo">
                                <label for="floatingPassword">Heslo</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary" name="registerSubmit" type="submit">Registrovat</button>
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