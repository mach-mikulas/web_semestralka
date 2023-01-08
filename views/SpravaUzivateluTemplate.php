<?php

global $tplData;
global $queryData;


require("TemplateBasics.php");

$tplData['title'] = "Správa uživatelů";
$tplHeaders = new TemplateBasics();


$tplHeaders->getHTMLHeader($tplData['title']);
?>

    <br>
    <br>
    <br>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jméno</th>
            <th scope="col">Příjmení</th>
            <th scope="col">Login</th>
            <th scope="col">Email</th>
            <th scope="col">Oprávnění</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>

        <?php

        foreach ($queryData['uzivatele'] as $radek){?>

        <tr>
            <th scope="row"><?php echo $radek['ID_uzivazel'] ?></th>
            <td><?php echo $radek['jmeno'] ?></td>
            <td><?php echo $radek['prijmeni'] ?></td>
            <td><?php echo $radek['login'] ?></td>
            <td><?php echo $radek['email'] ?></td>
            <?php

            if(!mySession::isActive("id") or mySession::get("vaha") < 3 or $radek['pravomoce_ID_pravomoce'] == 4 or $radek['pravomoce_ID_pravomoce'] == mySession::get("vaha")){

                ?>
                <td><?php echo $radek['nazev'] ?></td>
                <?php

            }else{

                echo "<td>";
                    echo "<form method='post'>";?>

                    <input type="hidden" name="ID_uzivatel" value=<?php echo $radek['ID_uzivazel']?> >



                    <select class='form-select' name='ID_pravomoce' aria-label='Default select example' required>
                    <option value="<?php echo $radek['pravomoce_ID_pravomoce']?>" selected> <?php echo $radek['nazev']?> </option>

                <?php
                    foreach ($queryData['pravomoce'] as $pravomoce){

                        if($pravomoce['ID_pravomoce'] == $radek['pravomoce_ID_pravomoce'] or $pravomoce['ID_pravomoce'] > mySession::get("vaha")){
                            continue;
                        }
                        ?>

                        <option value="<?php echo $pravomoce['ID_pravomoce'] ?>" ><?php echo $pravomoce['nazev']?></option>;

                        <?php
                    }
                    ?>

                    </select>

                    </td>
                    <td>
                    <button name="updateSubmit" type="submit" class="btn btn-outline-primary me-2">Aktualizovat</button>
                    </td>

                <td>
                    <button name="deleteSubmit" type="submit" class="btn btn-danger  me-2">Smazat</button>
                </td>


                    <?php
                    echo "</form>";
                echo "</td>";

            }

            ?>


        </tr>

            <?php

        }

        ?>

        </tbody>
    </table>

<?php
$tplHeaders->getHTMLFooter();
?>