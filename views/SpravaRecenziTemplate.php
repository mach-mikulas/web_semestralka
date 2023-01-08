<?php

global $tplData;
global $queryData;

require("TemplateBasics.php");

$tplData['title'] = "Správa recenzí";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);



foreach($queryData['clanky'] as $clanek){



?>


<div class="container">

    <div class="shadow rounded-3 my-5">

        <div class="row justify-content-md-center bg-secondary">

            <div class="col">
                Autor
            </div>
            <div class="col">
                Název článku
            </div>
            <div class="col">
                Abstrakt
            </div>
            <div class="col">
                Zvolit recenzenta
            </div>

            <?php
                if($clanek['pocet_recenzi'] > 2 and $clanek['pocet_recenzi'] == $clanek['pocet_recenzentu']){
            ?>

                    <div class="col">

                    </div>

            <?php
                }
            ?>

            <div class="col">

            </div>

        </div>

        <div class="row justify-content-md-center">

            <div class="col">
                <?php echo  $clanek['jmeno'] . " " . $clanek['prijmeni'] . "(" . $clanek['login'] . ")" ?>
            </div>
            <div class="col ">
                <?php echo  $clanek['nazev_clanku'] ?>
            </div>
            <div class="col">
                <textarea name="abstraktClanek" id="floatingTextArea" rows="4" readonly><?php echo $clanek['abstrakt'] ?></textarea>
            </div>
            <div class="col">

                <form method='post'>

                    <input type="hidden" name="ID_clanek" value="<?php echo $clanek['ID_clanek']?>">

                    <select class='form-select ' name='ID_recenzent' aria-label='Default select example' required>

                        <?php foreach($queryData['recenzenti'] as $recenzent){ ?>

                            <option value="<?php echo $recenzent['ID_uzivazel'] ?>"> <?php echo $recenzent['login']?> </option>;

                        <?php } ?>
                    </select>

                    <button name="priraditSubmit" type="submit" class="btn btn-outline-primary me-2">Přiřadit</button>
            </div>
                    <?php
                    if($clanek['pocet_recenzi'] > 2 and $clanek['pocet_recenzi'] == $clanek['pocet_recenzentu']){
                        ?>

                        <div class="col">
                            <button name="publikovatClanekSubmit"  class="btn btn-primary" type="submit">Publikovat</button>
                        </div>

                        <?php
                    }
                    ?>

                    <div class="col">
                        <button name="deleteClanekSubmit" type="submit" class="btn btn-danger  me-2">Smazat</button>
                    </div>

                </form>




        </div>

    </div>
</div>

<?php

}


$tplHeaders->getHTMLFooter();
?>
