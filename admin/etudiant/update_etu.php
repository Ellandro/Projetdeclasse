<?php 
    require_once("../../html/config/database.php");
    $matricule = $_GET["id"];

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $tel = $_POST["tel"];
    $naiss =   $_POST["naiss"];
    $sexe =  $_POST["sexe"];   
    $address =  $_POST["adresse"];
    // $photo =  $_POST["fichier"]; 
    $pays =  $_POST["pays"];
    $ville =  $_POST["ville"];
    $pere = $_POST['pere'];
    $mere = $_POST['mere'];

    $query = "UPDATE etudiant SET Matricule=?, NomEtu=?, PrenomEtu=?, Mail=?, dateNaissance=?, Contact=?, Sexe=?, Pays=?,Pere=?,
            Mere=? WHERE Matricule=?";
    $update = $bd->prepare($query);
    $update->execute([$matricule,$nom,$prenom,$mail, $naiss,$tel,$sexe,$pays,$pere,$mere,$matricule]);
    $msg= "Etudiants modifiée avec succès";
	$url= "etudiant/affich_etu.php";		
	header("location:../message.php?msg=$msg&color=v&url=$url");

?>