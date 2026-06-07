<?php
require ($root . '/app/view/fragment/fragmentCovoitHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovoitMenu.php';
        include $root . '/app/view/fragment/fragmentCovoitJumbotron.html';
        ?> 
        <h3 class="text-success">Ajout du véhicule de l'utilisateur inscrit</h3>
        
        <form role="form" method='get' action='router2.php'>
            <input type="hidden" name='action' value='userVehiculeCreated'>        
            
            <input type="hidden" name='proprietaire_id' value='<?php echo $proprietaire_id; ?>'>

            <div class="form-group">
                <label class='w-25' for="marque">Marque : </label><br><input class="form-control" type="text" name='marque' size='75' value='Renault'> <br/> 
                <label class='w-25' for="modele">Modèle : </label><br><input class="form-control" type="text" name='modele' size='75' value='Clio 4'> <br/> 
                <label class='w-25' for="annee">Année : </label><br><input class="form-control" type="text" name='annee' size='75' value='2014'> <br/> 
                <label class='w-25' for="immatriculation">Immatriculation : </label><br><input class="form-control" type="text" name='immatriculation' size='75' value='aa-001-aa'> <br/> 
            </div>
            <p/>
            <button class="btn btn-success" type="submit">Finaliser mon inscription</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCovoitFooter.html'; ?>