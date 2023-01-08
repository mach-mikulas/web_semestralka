<?php

require_once("DatabaseModel.php");

class SpravaUzivateluModel extends DatabaseModel {

    public function getUzivatele(){

        $sql = "SELECT uzivatel.*, pravomoce.* 
                FROM uzivatel
                INNER JOIN pravomoce ON uzivatel.pravomoce_ID_pravomoce = pravomoce.ID_pravomoce";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function getPravomoce(){

        $sql = "SELECT 
                * FROM pravomoce";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $res = $query->fetchAll();

        return $res;

    }

    public function update(){

        $idUzivatel = htmlspecialchars($_POST['ID_uzivatel']);
        $novaPrava = htmlspecialchars($_POST['ID_pravomoce']);

        $sql = "UPDATE uzivatel SET pravomoce_ID_pravomoce = :pravomoce WHERE ID_uzivazel = :ID_uzivatel";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'pravomoce' => $novaPrava,
            'ID_uzivatel' => $idUzivatel,
        ));
        return 0;
    }

    public function delete() {

        $idUzivatel = htmlspecialchars($_POST['ID_uzivatel']);

        $sql = "SELECT pravomoce_ID_pravomoce 
                FROM uzivatel 
                WHERE ID_uzivazel = :ID_uzivatel";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'ID_uzivatel' => $idUzivatel,
        ));
        $res = $query->fetch();
        if($res['pravomoce_ID_pravomoce'] >= mySession::get('vaha')){
            return 1;
        }

        // Proveď delete
        $sql = "DELETE FROM uzivatel WHERE ID_uzivazel = :ID_uzivatel";
        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'ID_uzivatel' => $idUzivatel,
        ));
        return 0;
    }

}

