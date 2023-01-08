<?php

/**
 * Trida vypisujici HTML hlavicku a paticku stranky.
 */
class TemplateBasics {

    /**
     *  Vrati vrsek stranky az po oblast, ve ktere se vypisuje obsah stranky.
     *  @param string $pageTitle    Nazev stranky.
     */
    public function getHTMLHeader(string $pageTitle) {
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $pageTitle?></title>
            <link rel="stylesheet" href="responzivni.css">
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        </head>

        <body>

        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav nav-dark col-12 col-md-auto mb-2 justify-content-center mb-md-0">

                    <li><a href='index.php?page=uvod' class='nav-link px-2 link-secondary'>Úvod</a></li>
                    <li><a href='index.php?page=clanky' class='nav-link px-2 link-secondary'>Články</a></li>

                    <?php
                        if(mySession::isActive('id')){

                            if(mySession::get('vaha') == 1){

                                echo "<li><a href='index.php?page=pridaniclanku' class='nav-link px-2 link-secondary'>Přidat článek</a></li>";
                            }

                            if(mySession::get('vaha') == 2){

                                echo "<li><a href='index.php?page=pridaniclanku' class='nav-link px-2 link-secondary'>Přidání článku</a></li>";
                                echo "<li><a href='index.php?page=recenze' class='nav-link px-2 link-secondary'>Recenze</a></li>";
                            }

                            elseif(mySession::get('vaha') == 3){

                                echo "<li><a href='index.php?page=pridaniclanku' class='nav-link px-2 link-secondary'>Přidání článku</a></li>";
                                echo "<li><a href='index.php?page=spravarecenzi' class='nav-link px-2 link-secondary'>Správa recenzí</a></li>";
                                echo "<li><a href='index.php?page=spravauzivatelu' class='nav-link px-2 link-secondary'>Správa uživatelů</a></li>";
                            }

                            elseif(mySession::get('vaha') == 4){

                                echo "<li><a href='index.php?page=pridaniclanku' class='nav-link px-2 link-secondary'>Přidání článku</a></li>";
                                echo "<li><a href='index.php?page=recenze' class='nav-link px-2 link-secondary'>Recenze</a></li>";
                                echo "<li><a href='index.php?page=spravarecenzi' class='nav-link px-2 link-secondary'>Správa recenzí</a></li>";
                                echo "<li><a href='index.php?page=spravauzivatelu' class='nav-link px-2 link-secondary'>Správa uživatelů</a></li>";
                            }
                        }
                    ?>
                </ul>

                <div class="col-md-3 text-end">

                    <?php
                        if(mySession::isActive('id')){

                            echo mySession::get('login')." ".mySession::get('nazev');

                            ?>

                            <button type="button" onclick="window.location.href='index.php?page=odhlaseni'" class="btn btn-primary">Odhlásit se</button>

                        <?php
                            }
                        else{
                         ?>
                            <button type="button" onclick="window.location.href='index.php?page=prihlaseni'" class="btn btn-outline-primary me-2">Přihlášení</button>

                            <button type="button" onclick="window.location.href='index.php?page=registrace'" class="btn btn-primary">Registrace</button>
                     <?php
                        }
                     ?>

                </div>
            </header>
        </div>

        <?php
    }

    /**
     *  Vrati paticku stranky.
     */
    public function getHTMLFooter(){
        ?>

        <div class="container">
            <footer class="py-3 my-4">
                <p class="text-center text-muted border-top">© 2023 Mikuláš Mach</p>
            </footer>
        </div>
        </body>
        </html>

        <?php
    }

}

?>