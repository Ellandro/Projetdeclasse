	<?php
		require_once('insert_note.php');
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  Nouvelle Note </title> 
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/monStyle.css">
	</head>
		
	<body>
		
        <br><br><br><br><br><br>
        
		<div class="container">
			<div class="panel panel-success">
				<div class="panel-heading" align="center">  <h3 >Nouvelle Notes </h3>  </div>
					<div class="panel-body">
						<form method="post" action="">
							<?php if(isset($msg))
								echo("<p>".$msg."</p>");
							?>
                            
                            <!-- ************ Début  Nom: *************** -->
                            <div class="row my-row">
								<label for="nom" class="control-label col-sm-2"> Identifiant de la note </label> 
									<div class="col-sm-4">
										<input type="text" name="id_note" id="nom" class="form-control"> 
									</div>

							<!-- ************ Fin  nom: *************** -->
                            
                            <!-- ************ Début  Nombre d'heure: *************** -->	

								<label for="nombre_heure_total" class="control-label col-sm-2"> Matricule Etudiant</label> 
									<div class="col-sm-4">
								        <input type="text" name="matricule" id="nombre_heure_total" class="form-control">
									</div>

							</div>
							<!-- ************ Fin  Nombre d'heure: *************** -->
                            
                            <!-- ************ Début  TP: *************** -->
                            <div class="row my-row">
								<label for="nombre_heure_tp"class="control-label col-sm-2"> Nom de la Matière  </label>
									<div class="col-sm-4">								
								        <!-- <input type="text" name="nom_mat" id="nombre_heure_tp"class="form-control">  -->
										<select name="nom_mat" class="form-control">
                            			<?php 
                            		    	$select="SELECT * FROM matiere";
                            		    	$affiche = $bd->prepare($select);
                            		    	$affiche->execute();
                            		    	$nom_fil =$affiche->fetchAll(); 
                            		    	foreach($nom_fil as $filiere){?>
                            		    	    <option value="<?php echo($filiere['nom_mat']) ?>"><?php echo($filiere['nom_mat']) ?></option>
                            		    <?php }?>
                            ?>
                       					 </select>
									</div>

							<!-- ************ Fin TP: *************** -->
                            
                            <!-- ************ Début  Th: *************** -->	

								<label for="nombre_heure_th"class="control-label col-sm-2">Note   </label>
									<div class="col-sm-4">
								        <input type="number" name="note" id="nombre_heure_th"class="form-control" min=0 max="100">
								    </div>

							</div>
                            <!-- ************ Début  Proffeseur: *************** -->
                            <div class="row my-row">
								<label for="id_prof"class="control-label col-sm-2"> Type</label>
									<div class="col-sm-4">								
								        <!-- <input type="text" name="id_prof" id="id_prof"class="form-control">  -->
										<select name="type" class="form-control" style="margin-bottom:10px ;">
											<option value="Devoir">Devoir</option>
											<option value="Examen">Examen</option>
										</select>
									</div>
									<label for="mention"class="control-label col-sm-2">Mention</label>
									<div class="col-sm-4">
								        <input type="text" name="mention" id="observation"class="form-control">
								    </div>
							</div>
							<!-- ************ Fin Professeur: *************** -->
                            
                            <!-- ************ Début  Filiere: *************** -->	

								<!-- <label for="nom_fil"class="control-label col-sm-2"> Nom de la filière   </label>
									<div class="col-sm-4">
								        <input type="text" name="nom_fil" id="nom_fil"class="form-control">
								    </div>

							</div> -->
							<!-- ************ Fin Filiere: *************** -->
                            
                            <!-- ************ Début  coeff: ***************
                            <div class="row my-row">
								<label for="coef"class="control-label col-sm-2"> Coefficient </label>
									<div class="col-sm-4">
								        <input type="number" name="coef" id="coef" class="form-control" >
                                    </div>

							</div> -->
						   <!-- ************ Fin  coeff: *************** -->

							<button type='submit' class="btn btn-success btn-block" name='save'> 
								<h3> Enregistrer  <span class="fa fa-save"></span></h3> 
							</button> 
						</form>	
					</div>
			</div>
		</div>
	</body>
</html>
