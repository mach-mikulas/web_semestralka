<?php

require_once("DatabaseModel.php");
class MojeClankyModel extends DatabaseModel{

    public function getClanky(){

        $mojeID = mySession::get("id");


        $sql = "SELECT clanek.*, uzivatel.jmeno , uzivatel.prijmeni, uzivatel.login
                FROM clanek
                INNER JOIN uzivatel ON clanek.uzivatel_ID_autor = uzivatel.ID_uzivazel
                WHERE clanek.uzivatel_ID_autor = :mojeID";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'mojeID' => $mojeID,
        ));

        $res = $query->fetchAll();

        return $res;

    }

    public function getMojeRecenze(){

        $sql = "SELECT recenze.*, uzivatel.jmeno , uzivatel.prijmeni, uzivatel.login
                FROM recenze
                INNER JOIN uzivatel ON recenze.uzivatel_ID_recenzent = uzivatel.ID_uzivazel
                WHERE recenze.zrecenzovano = 1";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function smazatMujClanek(){

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