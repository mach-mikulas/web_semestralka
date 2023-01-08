<?php

global $tplData;
global $queryData;

require("TemplateBasics.php");

$tplData['title'] = "Úvodní stránka";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);

foreach($queryData['clanky'] as $clanek){

?>


    <div class="container ">

        <div class="shadow rounded-3 my-5 ">

            <div class="row bg-secondary">

                <div class="col-md-4">
                    <i><p><b>Autor:</b> <?php echo  $clanek['jmeno'] . " " . $clanek['prijmeni']?>  <b>Název:</b>  <?php echo  $clanek['nazev_clanku'] ?></p></i>
                </div>
                <div class="col-md-4 offset-md-4">
                        <a class="btn btn-primary" href="<?php echo "uploads/" . $clanek['nazev_souboru']?>" target="_blank">Zobrazit</a>
                </div>


            </div>

            <div class="container">
                <div class="row">
                    <p>
                        <b>Abstrakt:</b> <?php echo $clanek['abstrakt'] ?>
                    </p>

                </div>
            </div>

        </div>
    </div>

<?php

}

$tplHeaders->getHTMLFooter();
?>