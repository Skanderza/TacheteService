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
<fieldset id="main">
    <legend>---------------------------------------------------------------------------------TACHETE SERVICES </legend>
    <form action="index.php" method="post">
       
      
            <legend>Choisissez votre demande :</legend>
<br>
            
            <input type="radio" name="lieu" value="S1"> Visualiser quel employé a passé quelles commandes et à quels clients
            <br><br>
            <input type="radio" name="lieu" value="S2"> Modifier les prix des produits
            <br><br>
            <input type="radio" name="lieu" value="S3">Affichez les sociétés clients qui ont commandé un produit précis
            <br><br>
            <input type="radio" name="lieu" value="S4">Affichez le nom, prénom et la société cliente pour les employés qui ont effectué une vente pour les clients par ville
            <br><br>
            <input type="radio" name="lieu" value="S5">Afficher les commandes et les produits commandés pendant une période de temps
        </fieldset>
        <br>
    
        <input type="submit" name="valider" value=" Envoyer "> &nbsp&nbsp&nbsp
        <input type="reset" value="Annuler">
    </form>
</fieldset>
<br><br>
<?php
if(!empty($_POST[lieu])){

$lieu = $_POST['lieu'];

switch ($lieu) {
    case "S1":
        echo "<a href='recherche1.php?lieu=S1'>Requete 1</a>";
        break;
    case "S2":
        echo "<a href='modifprix.php?lieu=S2'>Requete 1</a>";
        break;
    case "S3":
        echo "<a href='produitSociete.php?lieu=S4'>Requete 1</a>";
    case "S4":
        echo "<a href='rechercheVille.php?lieu=S5'>Requete 1</a>";
    case "S5":
        echo "<a href='recherchedate.php?lieu=S1'>Requete 1</a>";
        break;
}
}else echo "Veuillez choisir une requete";
?>
<footer> Formulaire réalisé dans le cadre du TP 2 de la formation de développeurs intégrateurs et codeurs web</footer>
</body>
</html>
