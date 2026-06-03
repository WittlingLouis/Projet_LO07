<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?> 
        <h3 class="text-success">Création d'un nouveau trajet</h3>  

        <form role="form" method='get' action='router2.php'>
            <div class="form-group">  

                <input type="hidden" name='action' value='trajetCreated'>   

                <label class='w-25' for="ville_depart">Sélectionnez la ville de départ :</label>
                <select class="form-control" id='ville_depart' name='ville_depart' style="width: 500px">
                    <?php
                    foreach ($villes as $v) {
                        $id = $v->getId();
                        $nom = $v->getNom();

                        printf(
                                "<option value='%d'>%s</option>",
                                $id,
                                htmlspecialchars($nom)
                        );
                    }
                    ?>
                </select>
                <br>

                <label class='w-25' for="ville_arrivee">Sélectionnez la ville de départ :</label>
                <select class="form-control" id='ville_arrivee' name='ville_arrivee' style="width: 500px">
                    <?php
                    foreach ($villes as $v) {
                        $id = $v->getId();
                        $nom = $v->getNom();

                        printf(
                                "<option value='%d'>%s</option>",
                                $id,
                                htmlspecialchars($nom)
                        );
                    }
                    ?>
                </select>
                <br>

                <label class='w-25' for="id">Sélectionnez un véhicule : </label>
                <select class="form-control" id='vehicule' name='vehicule' style="width: 500px">
                    <?php
                    foreach ($vehicule as $v) {
                        $id = $v->getId();
                        $marque = $v->getMarque();
                        $modele = $v->getModele();
                        $immat = $v->getImmatriculation();

                        printf(
                                "<option value='%d'>%s %s (%s)</option>",
                                $id,
                                htmlspecialchars($marque),
                                htmlspecialchars($modele),
                                htmlspecialchars($immat)
                        );
                    }
                    ?>
                </select>
                <br>

                <label class="w-25" for="prix_trajet">Prix du trajet :</label>
                <input type="number" class="form-control" id="prix_trajet" name="prix_trajet" placeholder="Ex: 10">
                <br/>

                <label class="w-25" for="date_trajet">Date du trajet :</label>
                <input type="date" class="form-control" id="date_trajet" name="date_trajet">
                <br/>

                <label class="w-25" for="heure_trajet">Heure du trajet :</label>
                <input type="time" class="form-control" id="heure_trajet" name="heure_trajet">
                <br/>

            </div>
            <p/>
            <br/> 
            <button class="btn btn-success" type="submit">Insérer le trajet</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>