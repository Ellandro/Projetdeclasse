<?php
// require('../utilisateurs/ma_session.php');
// require('../utilisateurs/mon_role.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Nouvelle filiére </title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/monStyle.css">
</head>

<body>

<br><br><br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouvelle filiére</div>
        <div class="panel-body">

            <form method="post" action="insert_filiere.php">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>


                    <label for="niveau_diplome" class="control-label col-sm-2"> Niveau diplôme </label>
                    <div class="col-sm-4">
                        <select name="niveau_diplome" id="niveau_diplome" class="form-control">
                            <option value="Q">Qualification</option>
                            <option value="T">Technicien</option>
                            <option value="TS">Technicien Spécialisé</option>
                            <option value="FC">Attestation de FC</option>
                        </select>

                    </div>

                </div>

                <div class="row my-row">
                    <label for="duree_formation" class="control-label col-sm-2"> Durée de Formation </label>
                    <div class="col-sm-4">
                        <input type="text" name="duree_formation" id="duree_formation" class="form-control">
                    </div>
                    <div class="row my-row">
                    <label for="date_creation" class="control-label col-sm-2"> Date crèation </label>
                    <div class="col-sm-4">
                        <input type="text" name="date_creation" id="date_creation" class="form-control">
                    </div>


                </div>
                    

                </div>


                <div class="row my-row">
                    <label for="frais_inscription" class="control-label col-sm-2"> Frais d'inscription </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_inscription" id="frais_inscription" class="form-control">
                    </div>

                    <label for="frais_mansuel" class="control-label col-sm-2"> Frais Semestriel</label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_mansuel" id="frais_mansuel" class="form-control">
                    </div>

                </div>



                <button type='submit' class="btn btn-success btn-block"> Enregistrer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
