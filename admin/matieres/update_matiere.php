
	<?php
		// require('../utilisateurs/ma_session.php');
		// require('../utilisateurs/mon_role.php');
	?>
	
<?php

	require('../../html/config/database.php');
	
	$id_matiere=$_POST['id_matiere'];
	$nom=$_POST['nom'];
	$nombre_heure_total=$_POST['nombre_heure_total'];
	$nombre_heure_tp=$_POST['nombre_heure_tp'];
	$nombre_heure_th=$_POST['nombre_heure_th'];
	$coef=$_POST['coef'];
    
	$requete="UPDATE  matiere SET nom_mat=?,
                                nombre_heure_total=?,
                                nombre_heure_tp=?,
                                nombre_heure_th=?,
                                coef=?
                            WHERE nom_mat=?";
    $valeurs=array( $nom,
                    $nombre_heure_total,
                    $nombre_heure_tp,
                    $nombre_heure_th,
                    $coef,
                    $id_matiere);
					
	$resultat=$bd->prepare($requete);
	$resultat->execute($valeurs);
	
	$msg= "Matiere modifiée avec succès";
	$url= "matieres/page_les_matieres.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>
