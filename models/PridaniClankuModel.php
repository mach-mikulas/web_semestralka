<?php

require_once("DatabaseModel.php");

class PridaniClankuModel extends DatabaseModel {

    public function upload(){

        $nazevClanku = htmlspecialchars($_POST["nazevClanku"]);

        $fileName = basename($_FILES['souborClanku']["name"]);
        $fileTmpName = $_FILES["souborClanku"]["tmp_name"];
        $fileError = $_FILES["souborClanku"]["error"];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if($fileActualExt != "pdf"){

            return 1;

        }

        if($fileError != 0){

            return 2;
        }

        $fileNameNew = uniqid("", true).".".$fileActualExt;
        $fileDestination = DIRECTORY_UPLOADS.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        $sql = "INSERT INTO clanek(`uzivatel_ID_autor`, `nazev_clanku`, `nazev_souboru`) 
                VALUES (:id, :nazev_clanku, :nazev_souboru)";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(
            "id" => mySession::get('id'),
            "nazev_clanku" => $nazevClanku,
            "nazev_souboru" => $fileNameNew,

        ));
        return 0;
    }

}
