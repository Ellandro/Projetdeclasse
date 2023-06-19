	<?php
		// require('../utilisateurs/ma_session.php');
		// require('../utilisateurs/mon_role.php');
	?>

<?php
	//include("../fonctions.php");
	
	require('../../html/config/database.php');
	
	$id_note=$_GET['id_note'];
	
    $requete="SELECT * FROM notes where id_note=?";
	$resultat=$bd->prepare($requete);
	$resultat->execute([$id_note]);
    $la_matiere=$resultat->fetch();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  Mofifier la note</title> 
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monStyle.css">
	</head>
		
	<body>
		
        <br><br><br><br><br><br>
        
		<div class="container">
			<div class="panel panel-info">
				<div class="panel-heading" align="center">  <h3>Modifier une  Note </h3>   </div>
					<div class="panel-body">
						<form method="post" action="update_note.php">

                            <!-- ************ Début  id_matiere: *************** -->
							
						   <input type="hidden" name="id_note" 
						   			value="<?php echo $la_matiere['id_note'] ?>">

                             <!-- ************ Début  id_matiere: *************** -->

                            <!-- ************ Début  Nom: *************** -->
                            <div class="row my-row">
								<label for="nom" class="control-label col-sm-2">ID Note </label> 
									<div class="col-sm-4">
										<input type="text" name="id_note" 
                                        id="nom" class="form-control" value="<?php echo $la_matiere['id_note'] ?>"> 
									</div>

							<!-- ************ Fin  nom: *************** -->
                            
                            <!-- ************ Début  Nombre d'heure: *************** -->	

								<label for="nombre_heure_total" class="control-label col-sm-2"> Matricule Etudiant </label> 
									<div class="col-sm-4">
								        <input type="text" name="matricule" 
                                        id="matricule" class="form-control" 
                                        value="<?php echo $la_matiere['Matricule'] ?>">
									</div>

							</div>
							<!-- ************ Fin  Nombre d'heure: *************** -->
                            
                            <!-- ************ Début  TP: *************** -->
                            <div class="row my-row">
								<label for="nombre_heure_tp"class="control-label col-sm-2"> Matiere  </label>
									<div class="col-sm-4">								
								        <input type="text" name="id_mat" 
                                        id="id_mat"class="form-control"
                                        value="<?php echo $la_matiere['id_mat'] ?>"> 
									</div>

							<!-- ************ Fin TP: *************** -->
                            
                            <!-- ************ Début  Th: *************** -->	

								<label for="nombre_heure_th"class="control-label col-sm-2">  Note    </label>
									<div class="col-sm-4">
								        <input type="text" name="note" 
                                        id="note"class="form-control"
                                        value="<?php echo $la_matiere['note'] ?>">
								    </div>

							</div>
							<!-- ************ Fin TH: *************** -->
                            <div class="row my-row">
								<label for="id_prof"class="control-label col-sm-2"> Type</label>
									<div class="col-sm-4">								
								        <!-- <input type="text" name="id_prof" id="id_prof"class="form-control">  -->
										<select name="type" class="form-control" style="margin-bottom:10px ;" value="<?php echo $la_matiere['type']?>">
											<option value="Devoir">Devoir</option>
											<option value="Examen">Examen</option>
										</select>
									</div>
									<label for="mention"class="control-label col-sm-2">Mention</label>
									<div class="col-sm-4">
								        <input type="text" name="mention" id="observation"class="form-control" value="<?php echo $la_matiere['mention'] ?>">
								    </div>
							</div>
						   <!-- ************ Fin  coeff: *************** -->	
                          
						  

							<button type='submit' class="btn btn-success btn-block"> 
								<h3>Modification<span class="fa fa-save"></span> </h3>
							</button> 
						</form>	
					</div>
			</div>
		</div>
	</body>
</html>
