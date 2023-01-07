<?php

require_once("IController.php");

class PrihlaseniController implements IController
{
    private $db;

    public function __construct()
    {

        require_once(DIRECTORY_MODELS . "DatabaseModel.php");
        $this->db = new DatabaseModel();
    }

    public function show(string $pageTitle): string
    {

        global $tplData;

        $tplData = [];
        $tplData['title'] = $pageTitle;

        ob_start();

        require(DIRECTORY_VIEWS ."PrihlaseniTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

