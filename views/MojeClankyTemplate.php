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
                <div class="col-md-4">
                    <a class="btn btn-primary" href="<?php echo "uploads/" . $clanek['nazev_souboru']?>" target="_blank">

                        Zobrazit

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                        </svg>

                    </a>
                </div>

               <div class="col-md-4">
                    <form method="post">
                        <input type="hidden" name="ID_clanek" value="<?php echo $clanek['ID_clanek']?>">
                        <button name="smazatMujClanekSubmit" type="submit" class="btn btn-danger  me-2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>

                        </button>
                    </form>
               </div>


            </div>

            <div class="container">
                <div class="row">
                    <p>
                        <b>Abstrakt:</b> <?php echo $clanek['abstrakt'] ?>
                    </p>

                </div>
            </div>

            <?php
            if($clanek['schvaleno'] == 1){
            ?>
            <div class="container">

                <div class="row bg-secondary">
                    <div class="col col-md-4">
                        <b>Jméno recenzenta</b>
                    </div>

                    <div class="col">
                        <b>Zajímavost[0/5]</b>
                    </div>

                    <div class="col">
                        <b>Kvalita textu[0/5]</b>
                    </div>

                    <div class="col">
                        <b>Kvalita informací[0/5]</b>
                    </div>
                </div>


                <?php
                foreach($queryData['recenze'] as $recenze){
                    if($recenze['clanek_ID_clanek'] == $clanek['ID_clanek']){
                    ?>

                    <div class="row justify-content-center">

                        <div class="col col-md-4">

                            <?php echo $recenze['jmeno'] . " " .$recenze['prijmeni'] ?>

                        </div>

                        <div class="col">

                            <?php echo $recenze['hodnoceni_zajivamost'] ?>

                        </div>

                        <div class="col">

                            <?php echo $recenze['hodnoceni_kvalita_textu'] ?>

                        </div>

                        <div class="col justify-content-center">

                            <?php echo $recenze['hodnoceni_kvalita_informaci'] ?>

                        </div>

                    </div>



                    <?php
                    }
                }
                ?>
            </div>


            <?php
            }else{
                ?>
                <div class="row bg-danger">


                    <div class="d-flex justify-content-center ">
                        <p><b>Článek nebyl ještě publikován</b></p>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>

    <?php

}

$tplHeaders->getHTMLFooter();
?>