<?php

require_once("DatabaseModel.php");
class SpravaRecenziModel extends DatabaseModel{

    public function getClanky(){

        $sql = "SELECT clanek.*, uzivatel.jmeno , uzivatel.prijmeni, uzivatel.login
                FROM clanek
                INNER JOIN uzivatel ON clanek.uzivatel_ID_autor = uzivatel.ID_uzivazel
                WHERE clanek.schvaleno = 0";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function getRecenze(){

        $sql = "SELECT recenze.*, uzivatel.jmeno , uzivatel.prijmeni, uzivatel.login
                FROM recenze
                INNER JOIN uzivatel ON recenze.uzivatel_ID_recenzent = uzivatel.ID_uzivazel";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function getRecenzenti(){

        $sql = "SELECT uzivatel.*
                FROM uzivatel
                INNER JOIN pravomoce ON uzivatel.pravomoce_ID_pravomoce = pravomoce.ID_pravomoce 
                WHERE pravomoce.vaha = 2 OR pravomoce.vaha = 4";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function smazatClanek(){

        $idClanek = htmlspecialchars($_POST['ID_clanek']);

        $sql = "DELETE FROM clanek WHERE ID_clanek = :ID_clanek";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'ID_clanek' => $idClanek,
        ));

        return 0;

    }

}

?>