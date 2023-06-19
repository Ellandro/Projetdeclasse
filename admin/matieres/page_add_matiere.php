	<?php
		require_once('insert_matiere.php');
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>  Nouvelle Matière </title> 
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/monStyle.css">
	</head>
		
	<body>
		
        <br><br><br><br><br><br>
        
		<div class="container">
			<div class="panel panel-success">
				<div class="panel-heading" align="center">  <h3 >Nouvelle matière </h3>  </div>
					<div class="panel-body">
						<form method="post" action="">
							<?php if(isset($msg))
								echo("<p>".$msg."</p>");
							?>
                            
                            <!-- ************ Début  Nom: *************** -->
                            <div class="row my-row">
								<label for="nom" class="control-label col-sm-2"> Nom matière  </label> 
									<div class="col-sm-4">
										<input type="text" name="nom_matiere" id="nom" class="form-control"> 

									</div>

							<!-- ************ Fin  nom: *************** -->
                            
                            <!-- ************ Début  Nombre d'heure: *************** -->	

								<label for="nombre_heure_total" class="control-label col-sm-2"> Nombre d'heure </label> 
									<div class="col-sm-4">
								        <input type="number" name="nombre_heure_total" id="nombre_heure_total" class="form-control" min=5>
									</div>

							</div>
							<!-- ************ Fin  Nombre d'heure: *************** -->
                            
                            <!-- ************ Début  TP: *************** -->
                            <div class="row my-row">
								<label for="nombre_heure_tp"class="control-label col-sm-2"> Nombre d'heure TP  </label>
									<div class="col-sm-4">								
								        <input type="number" name="nombre_heure_tp" id="nombre_heure_tp"class="form-control" min=0> 
									</div>

							<!-- ************ Fin TP: *************** -->
                            
                            <!-- ************ Début  Th: *************** -->	

								<label for="nombre_heure_th"class="control-label col-sm-2"> Nombre d'heure TD     </label>
									<div class="col-sm-4">
								        <input type="number" name="nombre_heure_th" id="nombre_heure_th"class="form-control" min=5>
								    </div>

							</div>
                            <!-- ************ Début  Proffeseur: *************** -->
                            <div class="row my-row">
								<label for="id_prof"class="control-label col-sm-2"> Identifiant du professeur</label>
									<div class="col-sm-4">	

								         <select type="text" name="id_prof" id="id_prof"class="form-control">  
										<?php 
                           			    $select_id="SELECT * FROM professeur";
                           			    $affiche_id = $bd->prepare($select_id);
										$affiche_id->execute();
										$idprof = $affiche_id->fetchAll();
										foreach($idprof as $id){?>
											<option value="<?php echo($id['id']) ?>"><?php echo($id['id'].":".$id['nom']) ?></option>
										<?php }?>
										 </select>
										
									</div>

							<!-- ************ Fin Professeur: *************** -->
                            
                            <!-- ************ Début  Filiere: *************** -->	

								<label for="nom_fil"class="control-label col-sm-2"> Nom de la filière   </label>
								<div class="col-sm-4">
								        <!-- <input type="text" name="nom_fil" id="nom_fil"class="form-control"> -->
									<select name="nom_fil" class="form-control">
                           			<?php 
                           			    $select="SELECT * FROM filiere";
                           			    $affiche = $bd->prepare($select);
                           			    $affiche->execute();
                           			    $nom_fil =$affiche->fetchAll(); 
                           			    foreach($nom_fil as $filiere){?>
                           			        <option value="<?php echo($filiere['nom_fil']) ?>"><?php echo($filiere['nom_fil']) ?></option>
                           			    <?php }?>
                        
                        			</select>
								</div>

							</div>
							<!-- ************ Fin Filiere: *************** -->
                            
                            <!-- ************ Début  coeff: *************** -->
                            <div class="row my-row">
								<label for="coef"class="control-label col-sm-2"> Coefficient </label>
									<div class="col-sm-4">
								        <input type="number" name="coef" id="coef" class="form-control" min=1 max=10>
                                    </div>

							</div>
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
