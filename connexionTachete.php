
<!DOCTYPE html>
<html>
    <head>
        <title>Connexion </title>
        
    </head>

    <body>
    <h1>Connexion </h1>

    <form action="<?= $_SERVER['PHP_SELF'] ?> " method="post">
        <input type="text" name="pseudo" placeholder="Votre pseudo">
        <input type="password" name="password" placeholder="Votre mot de passe">
        <input type="submit" value="Connexion">
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
    $pseudoAdmin = "pseudoadmin";
    $mdpAdmin = "mdpadmin";

    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
       
        $pseudo = $idcom->escape_string($_POST['pseudo']);
        $password = $idcom->escape_string($_POST['password']);

        //Ecrire la requete qui va récupérer le pseudo, password et id_membre
        $requete = "SELECT password, id_membre, nom, prenom FROM membres WHERE pseudo = '$pseudo' ";

        $result = $idcom->query($requete);
        //var_dump($result);
        //die();

        //$result->fetch_row() c'est-à-dire qu'on applique la fonction fetch_row à $result
        $coord = $result->fetch_row();

        if($coord && password_verify($_POST['password'], $pseudoAdmin) && ($_POST['pseudo']==$mdpAdmin)) {

            session_start();
            $_SESSION['id_membre'] = $coord[1];
            $_SESSION['pseudo'] = $_POST['pseudo'];
            
             
            header('Location: inscriptiontachete.php');}else
            
        if($coord && password_verify($_POST['password'], $coord[0])){
           
            session_start();
            $_SESSION['id_membre'] = $coord[1];
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['nom'] = $coord[2];
            $_SESSION['prenom'] = $coord[3];
            
            header('Location: indextachete.php');
        } 
    //var_dump($coord); 
    
    echo "Veuillez vous identifiez!";
    $idcom->close();
       
    }
    else{ echo "Veuillez vous connecter"; }
   
    ?>
    </body>
    </html>