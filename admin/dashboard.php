<?php
    require_once('../admin/user/session.php');
    require_once('../html/config/database.php');
    $query = "SELECT * FROM professeur ";
    $result = $bd->prepare($query);
    $result->execute();
    $nprof=$result->rowCount();
    $etu = "SELECT * FROM professeur ";
    $result_etu = $bd->prepare($etu);
    $result_etu->execute();
    $netu=$result_etu->rowCount();

    $requete = "SELECT montant FROM paiement";
    $resultat = $bd->query($requete);

    // Calcul du total
    $total = 0;
    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $total += $row['montant'];
    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashbord.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../image/epsilon.png" alt="Logo du site" id="epsilon">
                    <!-- <h2>Eps <span class="danger">ilon</span></h2> -->
                </div>
                <div class="close" id="close-btn">
                    <img src="../image/x-regular-24.png" alt="bouton de close">
                </div>
            </div>
            <div class="sidbar">
                <a href="#">
                    <img src="../image/icone/home.png" alt="">
                    <h3>Tableau de bord</h3>
                </a>
                <a href="../html/inscrire.php">
                    <img src="../image/icone/modifier.png" alt="">
                    <h3>Inscription</h3>
                </a>
                <a href="notes/page_les_note.php">
                    <img src="../image/icone/note.png" alt="">
                    <h3>Notes</h3>
                </a>
                <a href="../admin/etudiant/affich_etu.php">
                    <img src="../image/user-circle-regular-24.png" alt="">
                    <h3>Etudiants</h3>
                </a>
                <a href="../admin/matieres/page_les_matieres.php">
                    <img src="../image/icone/livre.png" alt="">
                    <h3>Matieres</h3>
                </a>
                <a href="../payment/paiement.php" class="active">
                    <img src="../image/icone/cheque.png" alt="">
                    <h3>Paiements</h3>
                </a>
                <a href="user/affich_user.php">
                    <img src="../image/icone/utilisateurs-alt.png" alt="">
                    <h3>Admministration</h3>
                </a>
                <a href="professeur/page_les_prof.php">
                    <img src="../image/icone/utilisateurs-alt.png" alt="">
                    <h3>Professeur</h3>
                </a>
                <a href="user/deconnexion.php">
                    <img src="../image/exit-regular-24.png" alt="">
                    <h3>Deconnexion</h3>
                </a>
            </div>
        </aside>
        <!-- End of aside -->
        <main>
            <h1>Tableau de bord</h1>
            <div class="date">
                <input type="date" name="" id="">
            </div>
            <div class="insights">
                <div class="prof">
                    <img src="../image/icone/cheque.png" alt="" srcset="">
                    <div class="midles">
                        <div class="left">
                            <h3>Montant Total</h3>
                            <h1><?php echo($total) ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                               <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Dernier mois</small>
                </div>
                <!-- END OF ENSEIGNANTS -->
                <div class="prof">
                    <img src="../image/icone/utilisateurs-alt.png" alt="" srcset="">
                    <div class="midles">
                        <div class="left">
                            <h3>Total Enseignants</h3>
                            <h1><?php echo($nprof)?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                               <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Dernier mois</small>
                </div>
                <div class="prof">
                    <img src="../image/icone/utilisateurs-alt.png" alt="" srcset="">
                    <div class="midles">
                        <div class="left">
                            <h3>Total Etudiant</h3>
                            <h1><?php echo($netu)?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                               <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Dernier mois</small>
                </div>
                
            </div>
            <div class="personnelle">
                <h2>La liste de paiement</h2>
                <table>
                    <thead>
                        <tr>
                            <th title="Nom">Matricule</th>
                            <th title="Prenom">Nom</th>
                            <th title="Niveau">Prenom</th>
                            <th title="Mail">Mail</th>
                            <th title="Contact">Monatant</th>
                            <th title="Sexe">Versement</th>
                            <!-- <th title="Action">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        
                            
                        <?php
                  
                    // Lire toutes les lignes de ma table etudiant
                         $query = "SELECT * FROM paiement";
                        $result = $bd->prepare($query);
                        $result->execute();
                        $results = $result->fetchAll();

                    

                    // affichages des resultats

                   foreach($results as $row){
                        echo("
                        <tr>
                        <td>$row[Matricule]</td>
                        <td>$row[Nom]</td>
                        <td>$row[Prenom]</td>
                        <td>$row[Email]</td>
                        <td>$row[Montant]</td>
                        <td>$row[Num_versement]</td>
                        </tr>");
                    }

                ?>
                    </tbody>
                </table>
                <a href="etudiant/affich_etu.php">Afficher tous</a>
            </div>
        </main>
            <div class="right">
                 <div class="top">
                    <button id="menu-btn">
                        <img src="../image/user-circle-regular-24.png" alt="menu">
                    </button>
                    <div class="toggle">
                        <img src="../image/health-regular-24.png"  class="active">
                        <img src="../image/offer-solid-24.png" alt="">
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Salut, <b><?php echo($_SESSION["user"]["login"])?></b></p>
                            <small class="text-muted"><?php echo($_SESSION["user"]["role"]) ?></small>
                        </div>
                        <div class="profile_photo">
                            <img src="../image/etudiant1.jpg" alt="">
                        </div>
                    </div>
                 </div>
            </div>
    </div>
</body>
</html>