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

const DIRECTORY_UPLOADS = "uploads/";

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

    "odhlaseni" => array(

        "title" => "Odhlášení",

        //Kontroler
        "file_name" => "OdhlaseniController.php",
        "class_name" => "OdhlaseniController",
    ),

    "clanky" => array(

        "title" => "Články",

        //Kontroler
        "file_name" => "ClankyController.php",
        "class_name" => "ClankyController",
    ),

    "pridaniclanku" => array(

        "title" => "Přidání článku",

        //Kontroler
        "file_name" => "PridaniClankuController.php",
        "class_name" => "PridaniClankuController",
    ),

    "spravauzivatelu" => array(

        "title" => "Správa uživatelů",

        //Kontroler
        "file_name" => "SpravaUzivateluController.php",
        "class_name" => "SpravaUzivateluController",
    ),

);

?>
