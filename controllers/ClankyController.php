<?php

require_once("IController.php");

class ClankyController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "ClankyModel.php");
        $this->db = new ClankyModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        global $queryData;
        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(isset($_POST["zobrazitClanekSubmit"])){

            $filename = htmlspecialchars($_POST['nazev_souboru']);

            header('Content-type:application/pdf');
            header('Content-Description:inline;filename="');

        }

        $queryData['clanky'] = $this->db->getPublikovaneClanky();
        $queryData['recenze'] = $this->db->getPublikovaneRecenze();

        ob_start();

        require(DIRECTORY_VIEWS ."ClankyTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

