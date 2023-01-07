<?php

require_once("DatabaseModel.php");
class PrihlaseniModel{

    public function login(){

        $loginLogin = htmlspecialchars($_POST["loginLogin"]);
        $loginPassword = htmlspecialchars($_POST["loginPassword"]);


        // Vyber data
        $sql = "SELECT uzivatel.*, opravneni.nazev FROM uzivatel 
              INNER JOIN opravneni ON uzivatel.uzivatel_id_opravneni = opravneni.id_opravneni
              WHERE jmeno = :jmeno";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "jmeno" => $loginLogin,
        ));
        $res = $query->fetch();

        // Přihlašovací jméno neexistuje
        if($res == null){
            return 1;
        }

        // Hesla nejsou stejná
        if(!password_verify($lHeslo, $res['heslo'])){
            return 1;
        }

        // Přihlaš uživatele
        mySession::set("id", $res["id_uzivatel"]);
        mySession::set("login", $res["jmeno"]);
        mySession::set("uroven", $res["uzivatel_id_opravneni"]);
        mySession::set("opravneni", $res["nazev"]);
        return 0;

        //TODO
    }
}

}

?>