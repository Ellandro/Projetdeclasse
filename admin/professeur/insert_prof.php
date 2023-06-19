	<?php
		// require('../utilisateurs/ma_session.php');
	?>

<?php

	require('../../html/config/database.php');
	
	$civilite='f';
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_naissance=$_POST['date_naissance'];
	$lieu_naissance=$_POST['lieu_naissance'];
	$adresse=$_POST['adresse'];
	$ville=$_POST['ville'];
	// $cin=$_POST['cin'];
	$niveau=$_POST["classe"];
	$filiere = $_POST["id_filiere"];
	$tel=$_POST['tel'];
	$niveau_scolaire=$_POST['niveau_scolaire'];
	// $dernier_diplome=$_POST['dernier_diplome'];
	// $dernier_etablissement=$_POST['dernier_etablissement'];
	// $num_inscription=$_POST['num_inscription'];
	$date_inscription=$_POST['date_inscription'];
	$statut=$_POST['statut'];
	
	$nom_photo= $_FILES['photo']['name'];
		// Récuperer le nom de la photo "image1.jpg" ou "image2.png"

	$image_tmp=$_FILES['photo']['tmp_name'];
		// Recupérer le nom du fichier image temporaire dans serveru
	
	move_uploaded_file($image_tmp,'../images/'.$nom_photo);
		//Déplacer le fichier image temporaire vers le dossier 
		//images du serveur avec le nom réel

	$requete_insert_prof="INSERT INTO professeur VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	
					
	$resultat_insert_prof=$bd->prepare($requete_insert_prof);
	$resultat_insert_prof->execute([NULL,$nom,$prenom,$statut,$date_naissance,$lieu_naissance,$adresse,$filiere,$tel,$niveau,
									$date_inscription,$nom_photo]);

	
	$msg= "Professeur ajouté avec succès";
	$url="professeur/page_les_prof.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
	
?>
