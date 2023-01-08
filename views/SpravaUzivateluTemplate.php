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

    <div class="container">

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
                <td></td>
                <td></td>
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
                    <button name="updateSubmit" type="submit" class="btn btn-outline-primary me-2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                        </svg>

                    </button>
                    </td>

                <td>
                    <button name="deleteSubmit" type="submit" class="btn btn-danger  me-2">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>

                    </button>
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
    </div>

<?php
$tplHeaders->getHTMLFooter();
?>