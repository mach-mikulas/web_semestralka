<?php
// nactu rozhrani kontroleru
require_once("IController.php");

/**
 * Ovladac zajistujici vypsani uvodni stranky.
 */
class UvodController implements IController {

    /** @var DatabaseModel $db  Sprava databaze. */
    private $db;

    /**
     * Inicializace pripojeni k databazi.
     */
    public function __construct() {
        // inicializace prace s DB
        require_once (DIRECTORY_MODELS."DatabaseModel.php");
        $this->db = new DatabaseModel();
    }

    /**
     * Vrati obsah uvodni stranky.
     * @param string $pageTitle     Nazev stranky.
     * @return string               Vypis v sablone.
     */
    public function show(string $pageTitle):string {

        global $tplData;
        $tplData = [];

        $tplData['title'] = $pageTitle;


        ob_start();

        require(DIRECTORY_VIEWS."UvodTemplate.php");

        $obsah = ob_get_clean();


        return $obsah;
    }

}

?>