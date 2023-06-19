<?php require_once("loginval.php"); ?>
<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form </title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Connexion</header>
      <form action="" method="post">
        <?php
          if(isset($erreur)){
            echo("<p class='erreur'>$erreur</p>");
          }
        ?>
        <input type="text" placeholder="Entrez votre  email" name="mail">
        <input type="password" placeholder="Entrez votre mot de passe" name="pass">
        <a href="#">Mot de passe oublié?</a>
        <input type="submit" class="button" value="Connexion" name="connexion">
      </form>
    </div>
    
  </div>
</body>
</html>
