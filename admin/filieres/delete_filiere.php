
<?php
	// require('../utilisateurs/ma_session.php');
	// require('../utilisateurs/mon_role.php');
	
?>

<?php
	
	
	require('../../html/config/database.php');
	
	$id_filiere=$_GET['id'];		
	
	$requete="DELETE FROM filiere where nom_fil=?";
	
	$valeur=array($id_filiere);
	
	$resultat=$bd->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "Filière supprimée avec succès";
	$url="filieres/page_les_filieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
?>