	<?php
		// require('../utilisateurs/ma_session.php');
	?>

	<?php
		require('../../html/config/database.php');
		$requete_filieres = "SELECT * FROM filiere";
		$result_requete_filieres = $bd->query($requete_filieres);
		$toutes_les_filieres = $result_requete_filieres->fetchAll();
		
		$id_prof=$_GET['id_prof'];							 
		

		$identite_prof=$bd->query("SELECT * FROM professeur WHERE id=$id_prof");		
		$le_prof=$identite_prof->fetch();


		
		
				

	?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouveau professeur </title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.css">
    <link rel="stylesheet" href="../../css/monStyle.css">

  

</head>

<body>

<br><br><br>
<div class="container">


    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouveau Professeur</div>
        <div class="panel-body">
            <form method="post" action="insert_prof.php" enctype="multipart/form-data">
				<input type="hidden" name="id">

                <div class="row my-row">
                    <label for="prenom" class="control-label col-sm-2"> PRENOM </label>
                    <div class="col-sm-4">
                        <input required type="text" name="prenom" id="prenom" class="form-control" value="<?php echo($le_prof['prenom']) ?>">
                    </div>


                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input required type="text" name="nom" id="nom" class="form-control" value="<?php echo($le_prof['nom']) ?>">
                    </div>

                </div>


                <div class="row my-row">
                    <label for="calendar1" class="control-label col-sm-2"> DATE_NAISSANCE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_naissance" id="calendar1" class="form-control" value="<?php echo($le_prof['date_naissance']) ?>">
                    </div>

                    <label for="lieu_naissance" class="control-label col-sm-2">LIEU_NAISSANCE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="lieu_naissance" id="lieu_naissance" class="form-control" value="<?php echo($le_prof['lieu_naissance']) ?>">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="adresse" class="control-label col-sm-2"> ADRESSE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="adresse" id="adresse" class="form-control" value="<?php echo($le_prof['adresse']) ?>">
                    </div>

                    <label for="ville" class="control-label col-sm-2"> VILLE </label>
                    <div class="col-sm-4">
                        <input required type="text" name="ville" id="ville" class="form-control" value="<?php  ?>">
                    </div>

                </div>

                <div class="row my-row">
                    
                    <label for="niveau_scolaire" class="control-label col-sm-2"> Statut </label>
                    <div class="col-sm-4">
                        <select type="text" name="niveau_scolaire" id="niveau_scolaire" class="form-control" value="<?php echo('') ?>">
                            <option value="1">Titulaire</option>
                            <option value="2">Vacataire</option>
                           
                        </select>
                    </div>

                    <label for="tel" class="control-label col-sm-2"> TEL </label>
                    <div class="col-sm-4">
                        <input type="text" name="tel" id="tel" class="form-control" value="<?php echo($le_prof['tel']) ?>">
                    </div>

                </div>

                

                <div class="row my-row">
                    <label for="calendar" class="control-label col-sm-2"> DATE D'INSCRIPTION </label>
                    <div class="col-sm-4">
                        <input required type="text" name="date_inscription" id="calendar" class="form-control" value="<?php echo($le_prof['date_inscription']) ?>">
                    </div>

                    
                </div>

                <div class="row my-row">
                    <label for="photo" class="control-label col-sm-2"> PHOTO </label>
                    <div class="col-sm-4">
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <label class="control-label col-sm-2"> Filière: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_filiere">

                            <?php foreach ($toutes_les_filieres as $filiere) { ?>
                                <option value="<?php echo $filiere['nom_fil'] ?>">
                                    <?php echo $filiere['nom_fil'] ?>
                                </option>
                            <?php } ?>

                        </select>
                    </div>
                    <br><br>
                </div>

                <div class="row my-row">
                    <label class="control-label col-sm-2"> Année Academique: </label>
                    <div class="col-sm-4">
                        <?php $annee_debut = 2013; ?>
                        <select class="form-control" name="annee_scolaire">
                            <?php
                            for ($i = 1; $i <=10; $i++) {
                                $annee_sc = ($annee_debut + ($i - 1)) . "/" . ($annee_debut + $i);
                                ?>
                                <option selected>
                                    <?php echo $annee_sc; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <label class="control-label col-sm-2"> Niveau: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="classe" value="<?php echo($le_prof["niveau"]) ?>">
                            <?php
                                $niveau = ["Licence 1","Licence 2", "Licence 3", "Master 1", "Master 2"];
                                foreach($niveau as $niv){ ?>
                                    <option value="<?php echo $niv ?>"><?php echo $niv ?></option>
                              <?php  }?>
                            
                            
                            
                        </select>
                    </div>
                    <br><br>
                </div>


                <button type='submit' class="btn btn-success"> Modifier le Professeur</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
