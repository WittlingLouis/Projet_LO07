<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?>
        <h3 class="text-success">Liste de vos vehicules</h3>  

        <table class = "table table-striped table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th scope = "col"><h5><b>marque</b></h5></th>
                    <th scope = "col"><h5><b>modele</b></h5></th>
                    <th scope = "col"><h5><b>annee</b></h5></th>
                    <th scope = "col"><h5><b>immatriculation</b></h5></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getMarque(),
                            $element->getModele(), $element->getAnnee(), $element->getImmatriculation());
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>