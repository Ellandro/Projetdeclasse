<?php
require('../utilisateurs/ma_session.php');
require('../utilisateurs/mon_role.php');
?>

<?php
require('../../html/config/database.php');
$id = $_GET['id'];
$requete = $pdo->query("SELECT * FROM filiere WHERE id=$id");
$lafiliere = $requete->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Modifier la filière </title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<br><br><br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading" align="center"> Modifier la filière</div>
        <div class="panel-body">

            <form method="post" action="update_filiere.php">

                <input type="hidden" name="id" value="<?php echo $lafiliere['id']; ?>">

                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2"> Nom </label>
                    <div class="col-sm-4">
                        <input type="text" name="nom" id="nom" class="form-control"
                               value="<?php echo $lafiliere['nom']; ?>">
                    </div>


                    <label for="niveau_diplome" class="control-label col-sm-2"> Niveau diplôme </label>
                    <div class="col-sm-4">
                        <select name="niveau_diplome" id="niveau_diplome" class="form-control">
                            <option value="Q" <?php if ($lafiliere['niveau_diplome'] === "Q") echo 'selected' ?> >
                                Qualification
                            </option>
                            <option value="T" <?php if ($lafiliere['niveau_diplome'] === "T") echo 'selected' ?> >
                                Technicien
                            </option>
                            <option value="TS" <?php if ($lafiliere['niveau_diplome'] === "TS") echo 'selected' ?> >
                                Technicien Spécialisé
                            </option>
                            <option value="AT" <?php if ($lafiliere['niveau_diplome'] === "AT") echo 'selected' ?> >
                                Attestation de FC
                            </option>

                        </select>

                    </div>

                </div>

                <div class="row my-row">
                    <label for="duree_formation" class="control-label col-sm-2"> Durée de Formation </label>
                    <div class="col-sm-4">
                        <input type="text" name="duree_formation" id="duree_formation" class="form-control"
                               value="<?php echo $lafiliere['duree_formation']; ?>">
                    </div>

                    <label for="niveau_admission" class="control-label col-sm-2"> Niveau d'admission </label>
                    <div class="col-sm-4">
                        <select name="niveau_admission" id="niveau_admission" class="form-control">

                            <option value="1"
                                <?php if ($lafiliere['niveau_admission'] === "1") echo 'selected' ?>>
                                9 Af ou diplome Spécialisation
                            </option>

                            <option value="2"
                                <?php if ($lafiliere['niveau_admission'] === "2") echo 'selected' ?>>
                                Niveau Bac ou diplome Qualification
                            </option>

                            <option value="3"
                                <?php if ($lafiliere['niveau_admission'] === "3") echo 'selected' ?>>
                                Bachelier ou diplome Technicien
                            </option>

                        </select>
                    </div>

                </div>

                


                <div class="row my-row">
                    <label for="frais_inscription" class="control-label col-sm-2"> Frais d'inscription </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_inscription" id="frais_inscription" class="form-control"
                               value="<?php echo $lafiliere['frais_inscription']; ?>">
                    </div>

                    <label for="frais_mansuel" class="control-label col-sm-2"> Frais mansuel </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_mansuel" id="frais_mansuel" class="form-control"
                               value="<?php echo $lafiliere['frais_mansuel']; ?>">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="frais_examen" class="control-label col-sm-2"> Frais d'examen </label>
                    <div class="col-sm-4">
                        <input type="text" name="frais_examen" id="frais_examen" class="form-control"
                               value="<?php echo $lafiliere['frais_examen']; ?>">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="date_creation" class="control-label col-sm-2"> Date création </label>
                    <div class="col-sm-4">
                        <input type="text" name="date_creation" id="date_creation" class="form-control"
                               value="<?php echo $lafiliere['date_creation']; ?>">
                    </div>


                <input value=" Enregistrer">
            </form>
        </div>
    </div>
</div>
</body>
</html>
