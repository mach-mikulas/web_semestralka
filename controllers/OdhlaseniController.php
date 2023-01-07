<?php

require_once("IController.php");

class OdhlaseniController implements IController
{

    private $db;

    public function __construct()
    {
        require_once(DIRECTORY_MODELS."OdhlaseniModel.php");
        $this->db = new OdhlaseniModel();
    }

    /**
     * Vrati obsah uvodni stranky.
     * @param string $pageTitle Nazev stranky.
     * @return string               Vypis v sablone.
     */
    public function show(string $pageTitle): string
    {

        global $tplData;
        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(mySession::isActive("id")){
            if(isset($_POST["odhlasitSubmit"])){
                $this->db->odhlaseni();
                header("location: index.php?page=uvod");
            }

            if(isset($_POST["odhlasitNeSubmit"])){
                header("location: index.php?page=uvod");
            }

        }



        ob_start();

        require(DIRECTORY_VIEWS."OdhlaseniTemplate.php");

        $obsah = ob_get_clean();

        return $obsah;
    }

}