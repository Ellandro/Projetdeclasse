<?php
		// require('role.php');
        require('../../admin/user/session.php');
		
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
    <a href="page_add_utilisateur.php"><img src="../../image/icone/ajouter.png" class="ajouter" title="Ajouter"></a>
        <section class="table__header">
            <h1>Administration de l'universite</h1>
            <div class="input-group">
                <input type="search" placeholder="Rechercher utilisateur">
                <img src="../../image/icone/editer.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Login</th>
                        <th> Status </th>
                        <th> Email </th>
                        <?php if($_SESSION["user"]['role']=="Directeur"){?>
                        <th>Action</th>
                        <?php }?>
                      
                       
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $requete = "SELECT * from utilisateur";
                       $resultat = $bd->prepare($requete);
                       $resultat->execute();
                       $les_utilisateurs = $resultat->fetchAll();
                       
                       foreach ($les_utilisateurs as $user) {?>
                               <tr>
                                   <td><?php echo  $user['id_utilisateur'] ?></td>
                                   <td><?php echo $user['login'] ?></td>
                                   <td><?php echo ("<strong>$user[role]</strong>")?></td>
                                   <td><?php echo $user['email'] ?></td>
                                   <?php if($_SESSION["user"]['role']=="Directeur"){?>
                                   <td class='action'>
                                        <a href='delete_utilisateur.php?id=<?php echo$user['id_utilisateur']?>'><img src='../../image/icone/poubelle.png' class='danger' title='Supprimer' ></a>
                                        <a  href='edit_user.php?id=<?php echo$user['id_utilisateur']?>'><img src='../../image/icone/editer.png' class='modif' title='Modifier' ></a>
                                   </td>
                                   <?php }?>
                               </tr>
                        <?php }?>
                       
                </tbody>
            </table>
        </section>
        
    </main>
</body>

</html>