
	<?php
	// 	require('../utilisateurs/ma_session.php');
	// 	require('../utilisateurs/mon_role.php');
	// ?>
<?php 
		require('../../html/config/database.php');
		
		
		$id_udser=$_GET['id'];
		
		$requete="DELETE FROM UTILISATEUR where id_utilisateur=$id_udser";		
		
		$requete=$bd->prepare($requete);		
		
		$resultat=$requete->execute();
		
		
		$msg= "Utilisateur Supprimé avec sucées";
		$url= "user/affich_user.php";		
		header("location:../message.php?msg=$msg&color=v&url=$url");
		
?>