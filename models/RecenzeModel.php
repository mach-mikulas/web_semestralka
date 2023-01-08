<?php

require_once("DatabaseModel.php");
class RecenzeModel extends DatabaseModel{

    public function getRecRecenze(){

        $ID_moje = mySession::get("id");

        $sql = "SELECT recenze.*, clanek.*, uzivatel.jmeno, uzivatel.prijmeni  
                FROM recenze
                INNER JOIN clanek ON recenze.clanek_ID_clanek = clanek.ID_clanek 
                INNER JOIN uzivatel ON clanek.uzivatel_ID_autor = uzivatel.ID_uzivazel 
                WHERE recenze.uzivatel_ID_recenzent = :ID_moje AND clanek.schvaleno = 0";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'ID_moje' => $ID_moje,
        ));
        $res = $query->fetchAll();

        return $res;

    }

    public function hodnoceni(){

        $idRecenze = htmlspecialchars($_POST['ID_recenze']);
        $idClanek = htmlspecialchars($_POST['ID_clanek']);
        $zrecenzovano = htmlspecialchars($_POST['zrecenzovano']);
        $zajivamost = $_POST['kvalita_zajimavost'];
        $text = $_POST['kvalita_textu'];
        $informace = $_POST['kvalita_informaci'];

        if($zrecenzovano == 0){

            $sql = "UPDATE clanek
                SET pocet_recenzi = pocet_recenzi + 1
                WHERE ID_clanek = :ID_clanek ";



            $query = $this->pdo->prepare($sql);
            $query->execute(array(
                'ID_clanek' => $idClanek,
            ));

        }


        $sql = "UPDATE recenze
                SET hodnoceni_zajivamost = :hodnoceni_zajivamost, hodnoceni_kvalita_textu = :hodnoceni_text, hodnoceni_kvalita_informaci = :hodnoceni_informace, Zrecenzovano = 1
                WHERE ID_recenze = :ID_recenze ";



        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            'ID_recenze' => $idRecenze,
            'hodnoceni_zajivamost' => $zajivamost,
            'hodnoceni_text' => $text,
            'hodnoceni_informace' => $informace ,
        ));



        return 0;

    }

}

?>