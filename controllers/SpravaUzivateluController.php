<?php

require_once("IController.php");

class SpravaUzivateluController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS ."SpravaUzivateluModel.php");
        $this->db = new SpravaUzivateluModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        global $queryData;

        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(mySession::isActive("id") and mySession::get("vaha") >= 3){

            if(isset($_POST["updateSubmit"])){
                $this->db->update();
            }

        }

        if(mySession::isActive("id") and mySession::get("vaha") >= 3){

            if(isset($_POST["deleteSubmit"])){
                $this->db->delete();
            }

        }


        $queryData['uzivatele'] = $this->db->getUzivatele();
        $queryData['pravomoce'] = $this->db->getPravomoce();



        ob_start();

        require(DIRECTORY_VIEWS ."SpravaUzivateluTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

