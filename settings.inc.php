<?php
//////////////////////////////////////////////////////////////////
/////////////////  Globalni nastaveni aplikace ///////////////////
//////////////////////////////////////////////////////////////////

//// Pripojeni k databazi ////

/** Adresa serveru. */
const DB_SERVER = "localhost";
/** Nazev databaze. */
const DB_NAME = "konference_db";
/** Uzivatel databaze. */
const DB_USER = "root";
/** Heslo uzivatele databaze */
const DB_PASS = "";

//// Nazvy tabulek v DB ////


//// Dostupne stranky webu ////

/** Adresar kontroleru. */
const DIRECTORY_CONTROLLERS = "controllers/";
/** Adresar modelu. */
const DIRECTORY_MODELS = "models/";
/** Adresar sablon */
const DIRECTORY_VIEWS = "views/";

/** Klic defaultni webove stranky. */
const DEFAULT_WEB_PAGE_KEY = "uvod";

/** Dostupne webove stranky. */
const WEB_PAGES = array(
    "uvod" => array(

        "title" => "Úvodní stránka",

        //Kontroler
        "file_name" => "UvodController.php",
        "class_name" => "UvodController",
    ),

    "prihlaseni" => array(

        "title" => "Přihlášení",

        //Kontroler
        "file_name" => "PrihlaseniController.php",
        "class_name" => "PrihlaseniController",
    ),

    "registrace" => array(

        "title" => "Registrace",

        //Kontroler
        "file_name" => "RegistraceController.php",
        "class_name" => "RegistraceController",
    ),

    //TODO
    "recenze" => array(

        "title" => "Recenze",

        //Kontroler
        "file_name" => "RecenzeController.php",
        "class_name" => "RecenzeController",
    ),

    //TODO
    "spravarecenzi" => array(

        "title" => "Recenze",

        //Kontroler
        "file_name" => "SpravaRecenziController.php",
        "class_name" => "SpravaRecenziController",
    ),


);

?>
