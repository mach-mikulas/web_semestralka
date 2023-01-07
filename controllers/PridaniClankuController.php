<?php

require_once("IController.php");

class PridaniClankuController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "PridaniClankuModel.php");
        $this->db = new PridaniClankuModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;
        $tplData = [];
        $tplData['title'] = $pageTitle;

        if(isset($_POST["uploadSubmit"])){
            $tplData['uploadResult'] = $this->db->upload();
        }

        ob_start();

        require(DIRECTORY_VIEWS ."PridaniClankuTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

