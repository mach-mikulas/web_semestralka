<?php

require_once("IController.php");

class PrihlaseniController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "PrihlaseniModel.php");
        $this->db = new PrihlaseniModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(isset($_POST["loginSubmit"])){
            $tplData['loginResult'] = $this->db->login();

            if($tplData['loginResult'] === 0){
                header("location: index.php?page=uvod");
            }
        }

        ob_start();

        require(DIRECTORY_VIEWS ."PrihlaseniTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

