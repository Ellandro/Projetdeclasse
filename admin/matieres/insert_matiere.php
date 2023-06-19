<?php
	// require('../utilisateurs/ma_session.php');
		
?>

<?php

	require('../../html/config/database.php');
		
	if(isset($_POST['save'])){
		if(
			!empty($_POST['nom_matiere'])&&
		 !empty($_POST['nombre_heure_total'])&&
		 !empty($_POST['nombre_heure_tp'])&&
		 !empty($_POST['nombre_heure_th'])&&
		 !empty($_POST['id_prof'])&&
		 !empty($_POST['nom_fil'])&&
		 !empty($_POST['coef'])
		 ){
			$nom=htmlspecialchars($_POST['nom_matiere']);
			$nombre_heure_total=htmlspecialchars($_POST['nombre_heure_total']);
			$nombre_heure_tp=htmlspecialchars($_POST['nombre_heure_tp']);
			$nombre_heure_th=htmlspecialchars($_POST['nombre_heure_th']);
			$coef=htmlspecialchars($_POST['coef']);
			$prof=htmlspecialchars($_POST['id_prof']);
			$filiere =htmlspecialchars($_POST['nom_fil']);

			$requete_insert_matiere="INSERT INTO matiere VALUES(?,?,?,?,?,?,?)";
			$valeurs_insert_matiere=[
    		                    $nom,
    		                    $nombre_heure_total,
    		                    $nombre_heure_tp,
    		                    $nombre_heure_th,
    		                    $coef,
								$filiere,
								$prof];

			$resultat_insert_matiere=$bd->prepare($requete_insert_matiere);
			$resultat_insert_matiere->execute($valeurs_insert_matiere);
			$msg= "Matiere ajoutée avec succès";
			$url= "matieres/page_les_matieres.php";		
			header("location:../message.php?msg=$msg&color=v&url=$url");
		 }
		 else{
			$msg = "Veuillez saisir toute les informations manquantes svp";
		 }
	}
	
	
	
?>
