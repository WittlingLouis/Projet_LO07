<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?>
        <h3 class="text-success">Liste de vos trajets</h3>  

        <table class = "table table-striped table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th scope = "col"><h5><b>ville_depart</b></h5></th>
                    <th scope = "col"><h5><b>ville_arrivee</b></h5></th>
                    <th scope = "col"><h5><b>date_depart</b></h5></th>
                    <th scope = "col"><h5><b>heure_depart</b></h5></th>
                    <th scope = "col"><h5><b>statut</b></h5></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($results)) {
                    foreach ($results as $element) {
                        printf("<tr>");
                        printf("<td>%s</td>", htmlspecialchars($element->getVille_depart()));
                        printf("<td>%s</td>", htmlspecialchars($element->getVille_arrivee()));

                        $dateFormatee = date('d/m/Y', strtotime($element->getDate_depart()));
                        printf("<td>%s</td>", $dateFormatee);

                        $heureFormatee = date('H\hi', strtotime($element->getHeure_depart()));
                        printf("<td>%s</td>", $heureFormatee);

                        printf("<td>%s</td>", htmlspecialchars($element->getStatut()));

                        printf("</tr>");
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'><strong>Vous n'avez créé aucun trajet pour le moment.</strong></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>