<?php

require_once("IController.php");

class MojeClankyController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "MojeClankyModel.php");
        $this->db = new MojeClankyModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        global $queryData;
        $tplData = [];
        $tplData['title'] = $pageTitle;


        if(isset($_POST["smazatMujClanekSubmit"])){
            $this->db->smazatMujClanek();
        }


        $queryData['clanky'] = $this->db->getClanky();
        $queryData['recenze'] = $this->db->getMojeRecenze();

        ob_start();

        require(DIRECTORY_VIEWS ."MojeClankyTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

