	<?php
		
	?>

<?php

	require('../../html/config/database.php');
	
	$id_prof=$_GET['id'];
	
	
	
	$requete="DELETE from professeur where id=?";
	
	$valeur=array($id_prof);
					
	$resultat=$bd->prepare($requete);
	$resultat->execute($valeur);
	
	$msg= "Stagiaire supprimé avec succés";
	$url="professeurs/page_les_prof.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	 
?>
