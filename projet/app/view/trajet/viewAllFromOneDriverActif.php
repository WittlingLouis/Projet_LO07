<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?>
        <h3 class="text-success">Sélectionner l'un de mes trajet actif</h3>
        <form role="form" method='get' action='router2.php'>
            <input type="hidden" name='action' value='trajetReadListPassagers'>

            <div class="form-group">
                <label for="trajet_id">Choisissez un de vos trajets :</label>
                <select class="form-control" id='trajet_id' name='trajet_id' style="width: 500px">
                    <?php
                    if (!empty($results)) {
                        foreach ($results as $t) {
                            printf("<option value='%d'>%s vers %s le %s à %s</option>",
                                    $t->id,
                                    htmlspecialchars($t->ville_depart),
                                    htmlspecialchars($t->ville_arrivee),
                                    htmlspecialchars($t->date_depart),
                                    htmlspecialchars($t->heure_depart)
                            );
                        }
                    }
                    ?>
                </select>
            </div><br>
            <button class="btn btn-success" type="submit">Voir les passagers du trajet</button>
        </form>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>