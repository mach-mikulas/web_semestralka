<?php

require_once("mySession.php");
class ApplicationStart{

    public function __construct(){

        require_once(DIRECTORY_CONTROLLERS."IController.php");

    }

    public function appStart(){

        mySession::start();

        if(isset($_GET["page"]) && array_key_exists($_GET["page"], WEB_PAGES)){
            $pageKey = $_GET["page"]; // nastavim pozadovane
        } else {
            $pageKey = DEFAULT_WEB_PAGE_KEY; // defaulti klic
        }

        $pageInfo = WEB_PAGES[$pageKey];


        require_once(DIRECTORY_CONTROLLERS ."/". $pageInfo["file_name"]);


        /** @var IController $controller  Ovladac prislusne stranky. */
        $controller = new $pageInfo["class_name"];

        echo $controller->show($pageInfo["title"]);

    }

}

?>