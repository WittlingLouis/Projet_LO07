<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?> 
        <h3 class="text-success">Ajouter un véhicule</h3>
        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='vehiculeCreated'>        
                <label class='w-25' for="id">Marque : </label><br><input class="form-control" type="text" name='marque' size='75' value='Renault'> <br/> 
                <label class='w-25' for="id">Modèle : </label><br><input class="form-control" type="text" name='modele' size='75' value='Clio 4'> <br/> 
                <label class='w-25' for="id">Année : </label><br><input class="form-control" type="text" name='annee' size='75' value='2014'> <br/> 
                <label class='w-25' for="id">Immatriculation : </label><br><input class="form-control" type="text" name='immatriculation' size='75' value='aa-001-aa'> <br/> 
                <label class='w-25' for="id">Sélectionnez un conducteur : </label><br><select class="form-control" name='proprietaire_id'>
                    <?php
                    foreach ($listeConducteurs as $conducteur) {
                        echo ("<option value='" . $conducteur['id'] . "'>" . $conducteur['nom'] . " " . $conducteur['prenom'] . "</option>");
                    }
                    ?>
                </select>
            </div>
            <p/>
            <br/> 
            <button class="btn btn-success" type="submit">Insérer le véhicule</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>