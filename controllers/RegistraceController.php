<?php

require_once("IController.php");

class RegistraceController implements IController
{

    private $db;

    public function __construct()
    {
        // inicializace prace s DB
        require_once(DIRECTORY_MODELS . "DatabaseModel.php");
        $this->db = new DatabaseModel();
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

        ob_start();

        require(DIRECTORY_VIEWS ."RegistraceTemplate.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}

