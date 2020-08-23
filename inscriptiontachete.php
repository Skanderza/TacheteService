
<?php
session_start();
if(isset($_SESSION['pseudo']) && isset($_SESSION['id_membre'])){
    $id_membre = $_SESSION['id_membre'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Administrateur </title>
        
    </head>

    <body>
    <h1>Inscription </h1>
    <h2>Administrateur</h2>
    <?php

    
    echo"Bienvenue  ".$_SESSION['pseudo'];
?>
    <form action="<?= $_SERVER['PHP_SELF'] ?> " method="post">
       
        
        <input type="email" name="email" placeholder="Votre adresse email">  
        <input type="text" name="pseudo" placeholder="Votre pseudo">
        <input type="password" name="password" placeholder="Votre mot de passe">
        <input type ="text" name ="nom" placeholder="Votre nom">
        <input type="text" name="prenom" placeholder="Votre prenom">
        <input type="submit" value="Inscription">
    </form>
    <?php
    //Inclusion des paramètres de connexion
include_once('myparamTachete.inc.php');

//Connexion au serveur de base de données MySQL
$idcom = new mysqli(MYHOST, MYUSER, MYPASS, "tachete");

//Test de la connexion
if(!$idcom){
    echo "Connexion impossible";
    exit(); //On arrete tout, on sort du script
}
if(!empty($_POST['email']) 
&& !empty($_POST['pseudo'])
&& !empty($_POST['password'])
&& !empty($_POST['nom'])
&& !empty($_POST['prenom']))

{
   
    $email = $idcom->escape_string($_POST['email']);
    $pseudo = $idcom->escape_string($_POST['pseudo']);
    $password = $idcom->escape_string($_POST['password']);
    $nom = $idcom->escape_string($_POST['nom']);
    $prenom = $idcom->escape_string($_POST['prenom']);
    
    
    //Hachage du mot de passe
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    
    //On récupère le resultat de notre requete dans la variable $result
    $result = $idcom->query($requete);
   //var_dump($result);
    $requete = "INSERT INTO membres(email, pseudo, password, nom, prenom) VALUES ('$email', '$pseudo', '$pass_hash', '$nom', '$prenom') ";

    $result = $idcom->query($requete);
     
    if($result){
        echo "Bravo vous êtes bien inscrit";
    }
    else { echo "Désolé vous n'êtes pas inscrit";
    }
    
    $idcom->close();


}
else { echo "Merci de bien rentrer les bonnes informations";
}

    ?>
    
    </body>
    </html>

    <?php
}
    else {echo "Vous n'êtes pas autorisé à visiter cette page <br/>";
          echo "<a href = \"connexiontachete.php\">Merci de vous connecter</a> ";
          }
    ?>