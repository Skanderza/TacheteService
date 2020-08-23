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
    <title>Mon formulaire</title>
    <link rel="stylesheet" href=styles.css>
</head>

<body>
<header></header>
<h1> TACHETE SERVICES</h1>
<?php
echo "Bienvenue ".$nom." ".$prenom." ";
?>
<a href="deconnexiontachete.php">Déconnexion</a>
<fieldset id="main">
    <legend>---------------------------------------------------------------------------------TACHETE SERVICES </legend>
    <form action="index.php" method="post">
       
      
            <legend>Choisissez votre demande :</legend>
<br>
                     <a href = "recherche1.php">Visualiser quel employé a passé quelles commandes et à quels clients </a>
                     <br/>
                     <a href = "modifprix.php">Modifier le prix des produits </a>
                     <br/>
                     <a href = "produitSociete.php">Affichez les sociétés clients qui ont commandé un produit précis </a>
                     <br/>                    
                     <a href = "rechercheVille.php">Affichez le nom, prénom et la société cliente pour les employés qui ont effectué une vente pour les clients par ville </a>
                     <br/>
                     <a href = "recherchedate.php">Afficher les commandes et les produits commandés pendant une période de temps </a>
           
        </fieldset>
        <br>
    
     
    </form>
</fieldset>
<br><br>

<footer>---------------------------------------------------------------------------------TACHETE SERVICES</footer>
</body>
</html>
<?php
}
    else {echo "Vous n'êtes pas autorisé à visiter cette page <br/>";
          echo "<a href = \"connexiontachete.php\">Merci de vous connecter</a> ";
          }
    ?>