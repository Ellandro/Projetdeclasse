	<?php
		session_start();
		require('../../html/config/database.php');
		if($_SESSION['user']['role']!="Directeur"){
			$msg = "Vous n'avez accès a cette page";
			$url = "../admin/dashboard.php";
			header("location:../message.php?msg=$msg&color=r&url=$url");
		}else{
			$requte_prof = "SELECT p.* FROM professeur p, filiere f
							WHERE p.nom_fil = f.nom_fil";
			$prepare_requete = $bd->prepare($requte_prof);
			$prepare_requete->execute();
			$tous_les_professeurs = $prepare_requete->fetchAll();
			$nbr_professeur = $prepare_requete->rowCount();
			
		}



									
?>
<!DOCTPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Les stagiaires </title> 
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/monStyle.css">
		
		
	</head>
		
	<body>
	
	
		<br><br>
		<div class="container">

			<h1 class="text-center"> Liste des stagiaires </h1>
			<div class="panel panel-primary">
				<div class="panel-heading">Nombre des professeur (<?php echo $nbr_professeur ?> )</div>
				<div class="panel-body">

<!-- ******************** Début Formulaire de recherche des stagiaires ***************** -->
					<form class="form-inline" >
				
					<label> Année scolaire: </label>
					

						<!-- <label> Filière: </label>								
							<select class="form-control" name="index_filiere"
										onChange="this.form.submit();"	>
								<option value=0>Toutes Les Filières</option>
								<?php  foreach($toutes_les_filieres as $filiere) {?>		
									<option 
										value="<?php echo  $filiere['nom_fil'] ?>" 
										<?php if($filiere['nom_fil']===$index_filiere) echo "selected"?> > 
										<?php echo  $filiere['nom_fil'] ?> 
									</option>							
								<?php  } ?>							
							</select>
							
							<input type="text" name="mot_cle" 	
										value="<?php echo $mot_cle ?>"				
										class="form-control"
										placeholder="Nom ou prénom">
							
							
							
						<button class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
					</form> -->
<!-- ******************** Fin Formulaire de recherche des stagiaires ***************** -->

			
				</div>
			</div>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th> Id </th> <th> Nom </th> <th> Date Naiss </th> <th> lieu de Naissance </th> 
						<th> Filière </th> 	 <th> Classe </th> <th> Contact</th><th> Photo</th>
						<th> Actions</th>
						
					</tr>
				</thead>
				
				<tbody>
			
			<?php foreach($tous_les_professeurs as $le_prof){?>
			
			<tr>
				<td><?php echo $le_prof['id'] ?> </td>
				<td><?php echo $le_prof['nom'] ?> </td>
				<td><?php echo $le_prof['prenom'] ?> </td>
				<td><?php echo $le_prof['adresse'] ?> </td>
				<td><?php echo $le_prof['nom_fil'] ?> </td>
				<td><?php echo $le_prof['niveau'] ?> </td>
				<td><?php echo $le_prof['tel'] ?> </td>
				<td>
					<img 
						src="../images/<?php echo $le_prof['photo']?>"
						class="img-thumbnail" width="40" height="40" > </td>
				<td> 

					<a class="btn btn-success btn-edit-delete"
						href="page_edit_prof.php
							?id_prof		=<?php echo $le_prof['id'] ?>
							" > 
							<span class="fa fa-edit">Modifier</span>
					</a>
				
				
					<a onclick="return confirm('Etes vous sur de vouloir supprimer ce stagiaire')"
					href="delete_prof.php?id=<?php echo $le_prof['id'] ?>" 
					class="btn btn-danger btn-edit-delete"> 
						<span class="fa fa-trash">Supprimer</span>
					</a>
				
<!-- 				
				<a class="btn btn-info btn-edit-delete"
					href="../fpdf/page_document.php
					?id_stagiaire=<?php echo $le_prof['id'] ?>">
					<span class="fa fa-print"></span>
				</a> -->
				
				</td>
			</tr>
		<?php } ?>
		
			</table>
				</tbody>
				<a href="page_add_prof.php" class="btn btn-primary">
					<span class="fa fa-plus"></span> NOUVEAU professeur 
				</a>
		</div>
	</body>
</html>




