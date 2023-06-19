<?php require("validepaie.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/paiement.css">
    <title>paiement</title>

</head>
<body>

<div class="container">

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Information personnelle</h3>
                <?php
                    if(isset($erreur)){
                        echo("<div class='essai'><p>".$erreur."</p></div>"
                        );
                    }
                        
                    if(isset($succes)){
                        echo("
                            <div class='essai'><p>".$succes."</p></div>"
                        );
                    }
                ?>

                <div class="inputBox">
                    <span>Matricule :</span>
                    <input type="text" placeholder="EXemple:122132342Y"  name="matricule" autocomplete="off">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com" name="email" autocomplete="off">
                </div>
                <div class="inputBox">
                    <span>Nom :</span>
                    <input type="text" placeholder="Tapez votre nom" name="nom" autocomplete="off">
                </div>
                <div class="inputBox">
                    <span>Prenom :</span>
                    <input type="text" placeholder="Tapez votre prenom" name="prenom" autocomplete="off">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Niveau :</span>
                        <input type="text" placeholder="Doctorat" name="niveau" autocomplete="off">
                    </div>
                    <div class="inputBox">
                        <span>Filiere :</span>
                        <!-- <input type="text" placeholder="Bilogie" name="filiere" autocomplete="off"> -->
                        <select name="filiere">
                            <?php 
                                $select="SELECT * FROM filiere";
                                $affiche = $bd->prepare($select);
                                $affiche->execute();
                                $nom_fil =$affiche->fetchAll(); 
                                foreach($nom_fil as $filiere){?>
                                    <option value="<?php echo($filiere['nom_fil']) ?>"><?php echo($filiere['nom_fil']) ?></option>
                                <?php }?>
                            ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">paiement</h3>

                <div class="inputBox">
                    <span>Vous pouvez avec:</span>
                    <img src="images/moov.jpg" alt="">
                    <img src="images/mtn.jpg" alt="">
                    <img src="images/orangeci.jpg" alt="">
                    <img src="images/wave.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Tout payer? :</span>
                    <select name="paie" id="paie">
                        <option value="non">NON</option>
                        <option value="oui">OUI</option>
                        
                    </select>
                </div>
                <div class="inputBox">
                    <span>Montant :</span>
                    <input type="number" placeholder="Montant en FCFA" name="montant" autocomplete="off">
                </div>
                <div class="inputBox">
                    <span>Versement:</span>
                    <select name="versement" id="vers" >
                        <option value="Semestre 1">Semestre 1</option>
                        <option value="Semestre 2">Semestre 2</option>
                    </select>
                    <!-- <input type="text" placeholder="january"> -->
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Reste a payer :</span>
                        <input type="number" placeholder="Reste en FCFA" name="reste" readonly value="4540">
                    </div>
                    <!-- <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234">
                    </div>-->
                </div> 

            </div>
    
        </div>

        <input type="submit" value="Validation du paiement" class="submit-btn" name="valider">

    </form>

</div>    
    
</body>
</html>