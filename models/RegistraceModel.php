<?php

require_once("DatabaseModel.php");

class RegistraceModel extends DatabaseModel {

    public function register(){

        $registerJmeno = htmlspecialchars($_POST["registerJmeno"]);
        $registerPrijmeni = htmlspecialchars($_POST["registerPrijmeni"]);
        $registerLogin = htmlspecialchars($_POST["registerLogin"]);
        $registerEmail = htmlspecialchars($_POST["registerEmail"]);
        $registerPassword = htmlspecialchars($_POST["registerPassword"]);

        $sql = "SELECT login, email 
                FROM uzivatel 
                WHERE login = :login OR email = :email";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "login" => $registerLogin,
            "email" => $registerEmail,
        ));

        $res = $query->fetch();
        if($res != null){
            if($res['login'] == $registerLogin){
                return 1;
            }
            if($res['email'] == $registerEmail){
                return 2;
            }
        }

        $sql = "INSERT INTO uzivatel(`jmeno`, `prijmeni`, `login`, `email`, `password`) 
                VALUES ( :jmeno, :prijmeni, :login, :email, :password)";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "jmeno" => $registerJmeno,
            "prijmeni" => $registerPrijmeni,
            "login" => $registerLogin,
            "email" => $registerEmail,
            "password" => $registerPassword,
        ));
        return 0;
    }

}