
	<?php
		// require('../utilisateurs/ma_session.php');
		// require('../utilisateurs/mon_role.php');
	?>
	
<?php

	require('../../html/config/database.php');
	// $id_note = $_GET['id_note'];

	$id_note=$_POST['id_note'];
	$matricule=$_POST['matricule'];
	$matiere=$_POST['id_mat'];
	$note=$_POST['note'];
	$type=$_POST['type'];
	$mention=$_POST['mention'];
    
	$requete="UPDATE  notes SET id_note=?,
                                matricule=?,
                                id_mat=?,
                                note=?,
                               type =?,
							   mention=?
                            WHERE id_note=?";
    $valeurs=array( $id_note,
                    $matricule,
                    $matiere,
                    $note,
                    $type,
                    $mention,
				$id_note);
					
	$resultat=$bd->prepare($requete);
	$resultat->execute($valeurs);
	
	$msg= "Note modifiée avec succès";
	$url= "notes/page_les_note.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");
	
?>
