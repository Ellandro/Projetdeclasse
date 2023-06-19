	<?php
		// require('../utilisateurs/ma_session.php');
		// require('../utilisateurs/mon_role.php');
	?>
	
<?php
	
	require('../../html/config/database.php');
	
	$id_matiere=$_GET['id_note'];		
	
	$requete="DELETE FROM notes where id_note=?";
	
	$valeur=array($id_matiere);
	
	$resultat=$bd->prepare($requete);
	
	$resultat->execute($valeur);
	
	$msg= "Note supprimée avec succès";
	$url="notes/page_les_note.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>