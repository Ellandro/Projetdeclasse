<?php 
    require_once("../html/config/database.php");
?>
<?php

    session_start();
    if(isset($_POST['connexion'])){
        if(!empty($_POST['mail']) && !empty($_POST["pass"])){
            $mail=htmlspecialchars($_POST['mail']);
            $mdp = sha1($_POST['pass']);
            $requte = "SELECT * FROM utilisateur WHERE email=? AND pwd=?";
            $select = $bd->prepare($requte);
            $select->execute([$mail,$mdp]);
            $user = $select->fetch();
            if($select->rowCount()>0){
                $_SESSION["user"]=$user;
                header("Location:../admin/dashboard.php");
            }
            else{
                $etud = "SELECT * FROM etudiant WHERE Password = ? AND Mail = ?";
                $affiche = $bd->prepare($etud);
                $affiche->execute([$mdp,$mail]);
                $etud = $affiche->fetch();
                if($affiche->rowCount()>0){
                    $_SESSION['etudiant']=$etud;
                    header("location:../html/etudiant.php");
                }
                else{
                    $erreur = "Mail ou mot de passe incorrect";
                }
            }
        }else{
            $erreur = "veuillez saisir les champs vides";
        }
    }

?>