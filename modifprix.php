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
    <title>Rechercher et modifier</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>

<h1> TACHETE SERVICES</h1>
<?php
echo "Bienvenue ".$nom." ".$prenom." ";
?>
<a href="deconnexiontachete.php">Déconnexion</a>
  <hr>
  <form method = "post" action="modifprix.php">
   <fieldset>
       <legend>Modification des produit</legend>
       <label>Saisissez l'id du produit</label>
       <input type="numeric" name="identifiant">

       <input type="submit" name ="modif" value="Rechercher et modifier">

   </fieldset>
</form>
<?php
//Créer la base de données
include_once 'myparamTachete.inc.php';

$idcom = new mysqli(MYHOST,MYUSER,MYPASS, 'tachete'); 
if (!$idcom) 
{
echo "Connexion impossible à la base";
exit(); 
}

if(!empty($_POST['identifiant'])){
    
    $identifiant = $idcom->escape_string($_POST['identifiant']);

    $requete = "SELECT * FROM Products WHERE ProductId = $identifiant ";

    $result = $idcom->query($requete);
     
    $coord = $result->fetch_row(); //fetch_row - Récupère une ligne de résultat sous forme de tableau indexé

    echo "<h1> Modification du prix</h1>";
    echo "<fieldset id=\"main\">";
    echo " <legend>Modification du prix :</legend>";
    echo "<form action=\"traitementPrix.php\" method=\"post\">";
    ?>
       <label>Identifiant:</label>
    <?php
    echo "<input type=\"numeric\" name=\"identifiant\" readonly =\"true\" value=\"$coord[0]\">";
    ?>
    <br><br>
    <label>Prix:</label>
        <?php
         echo "<input type=\"text\" name=\"nom\" value=\"$coord[5]\">";
         ?>
    <br><br>
        <input type="submit" name="valider" value=" Modifier "> &&nbsp&nbsp
        <input type="reset" value="Annuler">
      
      </fieldset>
    </form>
    
    <?php 
}
else {echo "Veuillez saisir l'identifiant du produit ";}
?>

</body>
</html>
<?php
}
    else {echo "Vous n'êtes pas autorisé à visiter cette page <br/>";
          echo "<a href = \"connexionTachete.php\">Merci de vous connecter</a> ";
          }
    ?>