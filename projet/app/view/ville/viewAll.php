<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?>
        <h3 class="text-success">Liste des villes</h3>  

        <table class = "table table-striped table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th scope = "col"><h5><b>id</b></h5></th>
                    <th scope = "col"><h5><b>nom</b></h5></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    printf("<tr><td>%d</td><td>%s</td></tr>", $element->getId(), $element->getNom());
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>