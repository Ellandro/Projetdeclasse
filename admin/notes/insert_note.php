<?php
	// require('../utilisateurs/ma_session.php');
		
?>

<?php

	require('../../html/config/database.php');
		
	if(isset($_POST['save'])){
		if(!empty($_POST['id_note'])&&
		 !empty($_POST['matricule'])&&
		 !empty($_POST['nom_mat'])&&
		 !empty($_POST['note'])

		 
		 ){
			$nom=htmlspecialchars($_POST['id_note']);
			$matricule=htmlspecialchars($_POST['matricule']);
			$matiere=htmlspecialchars($_POST['nom_mat']);
			$note=htmlspecialchars($_POST['note']);
			$type=htmlspecialchars($_POST['type']);
			$mention = htmlspecialchars($_POST['mention']);
			
			$requete_insert_note="INSERT INTO notes VALUES(?,?,?,?,?,?)";
			$valeurs_insert_note=[
    		                    $nom,
    		                    $matricule,
    		                    $matiere,
    		                    $note,
								$type, 
								$mention];

			$resultat_insert_note=$bd->prepare($requete_insert_note);
			$resultat_insert_note->execute($valeurs_insert_note);
			$msg= "notes ajoutée avec succès";
			$url= "notes/page_les_note.php";		
			header("location:../message.php?msg=$msg&color=v&url=$url");
		 }
		 else{
			$msg = "Veuillez saisir toute les informations manquantes svp";
		 }
	}
	
	
	
?>
