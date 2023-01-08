<?php

require_once("IController.php");

class RecenzeController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "RecenzeModel.php");
        $this->db = new RecenzeModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        global $queryData;
        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(mySession::get("vaha") == 2 or mySession::get("vaha") == 4){

            if(isset($_POST["hodnoceniSubmit"])){
                $this->db->hodnoceni();
            }

        }


        $queryData['recenzentoviclanky'] = $this->db->getRecRecenze();


        ob_start();

        require(DIRECTORY_VIEWS ."RecenzeTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

