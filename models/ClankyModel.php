<?php

require_once("DatabaseModel.php");
class ClankyModel extends DatabaseModel{

    public function getPublikovaneClanky(){

        $sql = "SELECT clanek.*, uzivatel.jmeno , uzivatel.prijmeni, uzivatel.login
                FROM clanek
                INNER JOIN uzivatel ON clanek.uzivatel_ID_autor = uzivatel.ID_uzivazel
                WHERE clanek.schvaleno = 1";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function getPublikovaneRecenze(){

        $sql = "SELECT recenze.*, uzivatel.jmeno , uzivatel.prijmeni, uzivatel.login
                FROM recenze
                INNER JOIN uzivatel ON recenze.uzivatel_ID_recenzent = uzivatel.ID_uzivazel
                WHERE recenze.zrecenzovano = 1";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }



}

?>