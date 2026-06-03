<?php include __DIR__ . '/fragment/fragmentCovoitHeader.html'; ?>

<body>
    <div class="container">
        <?php
        include __DIR__ . '/fragment/fragmentCovoitMenu.php';
        include __DIR__ . '/fragment/fragmentCovoitJumbotron.html';
        ?>
        <h3 class="text-success">Liste des SuperGlobales (Cookie et Session)</h3>  

        <?php
        $superglobales = array("\$_COOKIE" => $_COOKIE, "\$_SESSION" => $_SESSION);
        echo("<br>");
        echo("<div class='card'>");
        echo("<div class='card-body bg-success'>");
        echo ("<br>");
        foreach ($superglobales as $label => $globale) {
            if (true) {

                ksort($globale);

                echo("<div class='card'>");
                echo("<div class='card-body bg-warning-subtle'>");
                echo("<h5 class='card-title text-success'>SuperGlobale : $label</h5>");

                echo("<div class = 'col-4'>");
                echo("<table class = 'table table-bordered'>");
                echo("<thead>");
                echo("<tr>");
                echo("<th>#</th>");
                echo("<th>clé</th>");
                echo("<th>valeur</th>");
                echo("</tr>");
                echo("</thead>");

                $compteur = 0;
                echo ("<tbody>");
                foreach ($globale as $cle => $valeur) {
                    $compteur++;
                    echo ("<tr>");
                    echo("<th scope='row'>$compteur</th>");
                    echo ("<td>$cle</td>");

                    if (is_array($valeur)) {
                        $liste = implode(", ", $valeur);
                        echo ("<td>$liste</td></tr>");
                    } else {
                        echo ("<td>$valeur</td>");
                        echo ("</tr>");
                    }
                }
                echo ("</tbody>");
                echo ("</table>");
                echo ("</div>");
                echo ("</div>");
                echo ("</div>");
                echo ("<br>");
            }
        }
        echo ("</div>");
        echo ("</div>");
        ?>
    </div>
    <?php
    include __DIR__ . '/fragment/fragmentCovoitFooter.html';
    ?>