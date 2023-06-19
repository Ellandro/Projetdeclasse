	<?php
		// require('../utilisateurs/ma_session.php');
		// require('../utilisateurs/mon_role.php');
	?>
	
<?php
	
	require('../../html/config/database.php');
	
	$id_matiere=$_GET['id_matiere'];		
	
	$requete="DELETE FROM matiere where nom_mat=?";
	
	$valeur=array($id_matiere);
	
	$resultat=$bd->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "Matiere supprimée avec succès";
	$url="matieres/page_les_matieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>