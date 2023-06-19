<?php
		// require('role.php');
        // require('session.php');
		
	?>


<?php 
	
		
	require('../../html/config/database.php');
	
	

?>
<!DOCTYPE html>
<html lang="fr" title="UnivSen">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage des utitlisateurs</title>
    <link rel="stylesheet" href="../../css/affich_fili.css">
</head>

<body>
    <main class="table">
    <a href="../../html/inscrire.php"><img src="../../image/icone/ajouter.png" class="ajouter" title="Ajouter"></a>
        <section class="table__header">
            <h1>Etudiants de l'universite</h1>
            <div class="input-group">
                <input type="search" placeholder="Rechercher etudiant">
                <img src="../../image/icone/search-regular-24 (1).png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                    <th title="Status"> Matricule </th>
                        <th title="Nom"> Nom </th>
                        <th title="Prenom"> Prenom</th>
                        <th title="Email"> Email </th>
                        <th title="Contact">Contact</th>
                        <th title="Action">Action</th>
                      
                       
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $requete = "SELECT * from etudiant";
                       $resultat = $bd->prepare($requete);
                       $resultat->execute();
                       $les_utilisateurs = $resultat->fetchAll();
                       
                       foreach ($les_utilisateurs as $user) {
                           echo("
                               <tr>
                                   <td> $user[Matricule] </td>
                                   <td> $user[NomEtu] </td>
                                   <td> $user[PrenomEtu]</td>
                                   <td> $user[Mail] </td>
                                   <td>$user[Contact]</td>
                                   <td class='action'>
                                        <a href='../../html/delete_etu.php?id=$user[Matricule]'><img src='../../image/icone/poubelle.png' class='danger' title='Supprimer' ></a>
                                        <a  href='../../html/modif_etu.php?id=$user[Matricule]'><img src='../../image/icone/editer.png' class='modif' title='Modifier' ></a>
                                   </td>
                               </tr>
                           ");
                       }
                       ?>
                </tbody>
            </table>
        </section>
        
    </main>
</body>

</html>