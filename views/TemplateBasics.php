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

                    <?php
                    // vypis menu
                    foreach(WEB_PAGES as $key => $pInfo){
                        echo "<li><a href='index.php?page=$key' class='nav-link px-2 link-secondary'>$pInfo[title]</a></li>";

                    }
                    ?>
                </ul>

                <div class="col-md-3 text-end">
                    <button type="button" onclick="window.location.href='index.php?page=prihlaseni'" class="btn btn-outline-primary me-2">Přihlášení</button>

                    <button type="button" onclick="window.location.href='index.php?page=registrace'" class="btn btn-primary">Registrace</button>
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