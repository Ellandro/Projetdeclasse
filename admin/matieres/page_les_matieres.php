	<?php
		// require('../utilisateurs/ma_session.php');
	?>

<?php
		// include("../fonctions.php");
		session_start();
		
		require('../../html/config/database.php');

         
		
		
        
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les Matières </title> 
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/monStyle.css"> -->
	</head>
		
	<body>
	
		<br><br><br><br>
		<div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading"> <h2 class="text-center">Les matieres </h2></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                 <th>Filière  </th> 
								 <th> Nom Matiere  </th>
								  <th> Nombre heure </th>
								 <th> TP  </th>
								  <th> TH  </th> 
								 <th>Id Professeur</th>
                                <th> Coeff</th>
								<?php if(isset($_SESSION['utilisateur'])){?>	
									<th> Action</th>
								<?php }?>
								
                                            
                            </tr>
                        </thead>
                        
                        <tbody>
                    
                            <?php
							if(isset($_SESSION['utilisateur'])){
								$requete="SELECT * FROM matiere order by nom_mat";  
								$result=$bd->prepare($requete);
								$result->execute();
								$toutes_les_matieres=$result->fetchAll(); 
							
							foreach($toutes_les_matieres as $matiere){
                                $id_matiere=$matiere['nom_mat'];
                            ?>
                            
                                <tr>
									
                                    <td><?php echo $matiere['nom_fil'] ?> </td>
									<td> <?php echo $matiere['nom_mat'] ?></td>
                                    <td><?php echo $matiere['nombre_heure_total'] ?> </td>
                                    <td><?php echo $matiere['nombre_heure_tp'] ?> </td>
                                    <td><?php echo $matiere['nombre_heure_th'] ?> </td>
                                    <td><?php echo $matiere['IdProf'] ?> </td>
                                    <td><?php echo $matiere['coef'] ?> </td>
									
										<td> 					
											<a href="page_edit_matiere.php?id_matiere=<?php echo $matiere['nom_mat']?>" 
											class="btn btn-success btn-edit-delete">Modifier<span class="fa fa-pencil"></span> 
											</a>
												
											<a 
												onclick="return confirm('Etes-vous sûr de vouloir supprimer cette matière')"
												href="delete_matiere.php?id_matiere=<?php echo $matiere['nom_mat']?>" 
												class="btn btn-danger btn-edit-delete"> Supprimer<span class="fa fa-trash"></span> 
											</a>										
										</td>
									<?php }?>
									
									
                                </tr>
                            <?php } ?>
                            
								
							<?php 
								if(isset($_SESSION['etudiant'])){
									$matricule = $_SESSION["eutidiant"]["matricule"];
									$requet_matiere = "SELECT m.* 
									FROM matiere m, filiere f, etudiant e, 
												WHERE e.nom_fil = f.nom_fil AND m.nom_fil = f.nom_fil  AND 
												e.matricule =?";
									$result_mat = $bd->prepare($requet_matiere);
									$result_mat->execute([$matricule]);
									$mat_etu = $result_mat->fetchAll();
									foreach($mat_etu as $matieres){?>
										<!-- <td><?php echo $matieres['f.nom_fil'] ?> </td> -->
										<td> <?php echo $matieres['nom_mat'] ?></td>
                                    	<td><?php echo $matieres['nombre_heure_total'] ?> </td>
                                    	<td><?php echo $matieres['nombre_heure_tp'] ?> </td>
                                    	<td><?php echo $matieres['nombre_heure_th'] ?> </td>
                                    	<td><?php echo $matieres['p.nom'] ?> </td>
                                    	<td><?php echo $matieres['coef'] ?> </td>	
								



								<?php }?>	

								<?php }?>
															
							
                            
                        </tbody>
                        
                    </table>          
                </div> 
            </div>
			<?php if(isset($_SESSION['utilisateur'])){?>          
                <a class="btn btn-primary btn-block" href="page_add_matiere.php" >
                    <h4>
                        <span class="fa fa-plus"></span> 
                        Ajouter une Nouvelle matiere
                    </h4>
				</a> 
				<?php }?>                   
		</div>
	</body>
</html>