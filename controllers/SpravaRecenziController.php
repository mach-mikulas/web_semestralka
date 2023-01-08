<?php

require_once("IController.php");

class SpravaRecenziController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "SpravaRecenziModel.php");
        $this->db = new SpravaRecenziModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        global $queryData;
        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(mySession::isActive("id") and mySession::get("vaha") >= 3){

            if(isset($_POST["deleteClanekSubmit"])){
                $this->db->smazatClanek();
            }

            if(isset($_POST["publikovatClanekSubmit"])){
                //$this->db->smazatClanek();
            }

        }


        $queryData['clanky'] = $this->db->getClanky();
        $queryData['recenze'] = $this->db->getRecenze();
        $queryData['recenzenti'] = $this->db->getRecenzenti();

        ob_start();

        require(DIRECTORY_VIEWS ."SpravaRecenziTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

