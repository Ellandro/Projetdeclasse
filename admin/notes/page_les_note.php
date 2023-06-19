	<?php
		// require('../utilisateurs/ma_session.php');
		session_start();
		// if(!isset($_SESSION["user"])||!isset($_SESSION['etudiant'])){
		// 	header('Location:../../login/index.php');
		// }
	?>

<?php
		// include("../fonctions.php");
		
		require('../../html/config/database.php');

        $requete="SELECT * FROM notes order by note desc";  
        $result=$bd->prepare($requete);
		$result->execute();
	    $toutes_les_matieres=$result->fetchAll();   
        
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les Notes </title> 
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/monStyle.css"> -->
	</head>
		
	<body>
	
		<br><br><br><br>
		<div class="container">

            <div class="panel panel-primary">
                <div class="panel-heading"> <h2 class="text-center">Les Notes </h2></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                 <th>ID Note </th> 
								 <th> Matricule Etudiant </th>
								  <th> Matiere </th>
								 <th> Note </th>
								  <th> Type  </th> 
								 <th>Mention</th>
                                <!-- <th> Coeff</th> -->
							<?php if(isset($_SESSION['user'])){?>
								<th> Action</th>
							<?php }?>
								
								
                                            
                            </tr>
                        </thead>
                        
                        <tbody>
						<?php if(isset($_SESSION['user'])){
                            foreach($toutes_les_matieres as $matiere){
                                $id_matiere=$matiere['id_note'];
                            ?>
                            
                                <tr>
									
                                    <td><?php echo $matiere['id_note'] ?> </td>
									<td> <?php echo $matiere['Matricule'] ?></td>
                                    <td><?php echo $matiere['id_mat'] ?> </td>
                                    <td><?php echo $matiere['note'] ?> </td>
                                    <td><?php echo $matiere['type'] ?> </td>
                                    <td><?php echo $matiere['mention'] ?> </td>
                                    
                                   
										<td> 					
											<a href="page_edit_note.php?id_note=<?php echo $matiere['id_note']?>" 
											class="btn btn-success btn-edit-delete">Modifier<span class="fa fa-pencil"></span> 
											</a>
												
											<a 
												onclick="return confirm('Etes-vous sûr de vouloir supprimer cette matière')"
												href="delete_note.php?id_note=<?php echo $matiere['id_note']?>" 
												class="btn btn-danger btn-edit-delete"> Supprimer<span class="fa fa-trash"></span> 
											</a>										
										</td>
									
									
									
                                </tr>
                            <?php } ?>
							<?php } ?>
							<?php
							if (isset($_SESSION['etudiant'])) {
            					$id_etu = $_SESSION['etudiant']['Matricule'];
           
            					// Requête SQL pour récupérer les notes de l'étudiant
            					$requete = "SELECT n.*
            					            FROM Notes n
            					            INNER JOIN matiere m ON n.id_mat = m.nom_mat
            					            WHERE n.matricule = ?";
            					$stmt = $bd->prepare($requete);
            					   $stmt->bindParam(':id_etudiant', $id_etu);
            					$stmt->execute([$id_etu]);
								// $note = $stmt->fetch();
								while ($note = $stmt->fetch(PDO::FETCH_ASSOC)) {
									$id_note=$note['id_mat'];
							?>
								
									<tr>
										<td><?php echo $note['id_note']?></td>
										<td><?php echo $id_etu?></td>
										<td><?php echo $note['id_mat']?> </td>
										<td><?php echo $note['note']?></td>
										<td><?php echo $note['type']?></td>
										<td><?php echo $note['mention']?></td>
										
									</tr>
							<?php } ?>
							<?php } ?>

                        </tbody>
                        
                    </table>          
                </div> 
            </div> 
			<?php if(isset($_SESSION['user'])){ ?>        
                <a class="btn btn-primary btn-block" href="page_add_note.php" >
                    <h4>
                        <span class="fa fa-plus"></span> 
                        Ajouter une Nouvelle note
                    </h4>
				</a>  
			<?php } 
				else{
					if(isset($_SESSION['etudiant'])){?>        
						<a class="btn btn-primary btn-block" href="test.php" >
							<h4>
								<span class="fa fa-plus"></span> 
								Imprimer vos moyennes
							</h4>
						</a>  
					<?php } ?>  
			<?php } ?>           	         
		</div>
	</body>
</html>