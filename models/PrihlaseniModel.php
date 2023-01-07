<?php

require_once("DatabaseModel.php");
class PrihlaseniModel extends DatabaseModel{

    public function login(){

        $loginLogin = htmlspecialchars($_POST["loginLogin"]);
        $loginPassword = htmlspecialchars($_POST["loginPassword"]);


        // Vyber data
        $sql = "SELECT uzivatel.*, pravomoce.nazev 
                FROM uzivatel 
                INNER JOIN pravomoce ON uzivatel.pravomoce_ID_pravomoce = pravomoce.ID_pravomoce
                WHERE login = :login";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "login" => $loginLogin,
        ));
        $res = $query->fetch();

        // Přihlašovací jméno neexistuje
        if($res == null){
            return 1;
        }

        // Hesla nejsou stejná
        if($loginPassword != $res['password']){
            return 1;
        }

        // Přihlaš uživatele
        mySession::set("id", $res["ID_uzivazel"]);
        mySession::set("login", $res["login"]);
        mySession::set("vaha", $res["pravomoce_ID_pravomoce"]);
        mySession::set("pravomoce", $res["nazev"]);
        return 0;

    }

}

?>