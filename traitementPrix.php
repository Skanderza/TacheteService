<?php
session_start();
if(isset($_SESSION['pseudo']) && isset($_SESSION['id_membre'])){
    $id_membre = $_SESSION['id_membre'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>Modification prix</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<h1>Modification prix</h1>
<?php
echo "Bienvenue ".$nom." ".$prenom." ";
?>
<a href="deconnexiontachete.php">Déconnexion</a>
<br>
<?php
//Créer la base de données
include_once 'myparamTachete.inc.php';
//Connexion au serveur de la bdd
$idcom = new mysqli(MYHOST, MYUSER, MYPASS, "tachete");

//Test si la connexion est valide
if (!$idcom) {
    echo "Connexion impossible";
    exit();
} 

if(!empty($_POST['nom'])) {

    $identifiant = $_POST['identifiant'];
    $nom = $idcom->escape_string($_POST['nom']);

    //Ecrire la requete pour modifier les données d'un utilisateur
    $requete = "UPDATE products SET
    UnitPrice = '$nom' 
    WHERE ProductId = '$identifiant'";

    //Envoyer la requete
    $result = $idcom->query($requete);

    //Vérifier que la requete est bien éxécutée
    if ($result) {
      echo "Les données ont bien été modifiées";
    } else {
        echo "Erreur " . $idcom->error;
    }

    //Fermer la connexion au serveur
    $idcom->close();

}
else {echo "Veuillez remplir correctement le formulaire ";}

?>

</body>
</html>

<?php
}
    else {echo "Vous n'êtes pas autorisé à visiter cette page <br/>";
          echo "<a href = \"connexionTachete.php\">Merci de vous connecter</a> ";
          }
    ?>