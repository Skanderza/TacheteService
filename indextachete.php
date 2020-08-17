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
            
            <input type="radio" name="lieu" value="Saint Denis"> Visualiser quel employé a passé quelles commandes et à quels clients
            <br><br>
            <input type="radio" name="lieu" value="Saint Denis"> Modifier les prix des produits
            <br><br>
            <input type="radio" name="lieu" value="Saint Denis">Affichez les sociétés clients qui ont commandé un produit précis
            <br><br>
            <input type="radio" name="lieu" value="Saint Denis">Affichez le nom, prénom et la société cliente pour les employés qui ont effectué une vente pour les clients par ville
            <br><br>
            <input type="radio" name="lieu" value="Reste du monde">Afficher les commandes et les produits commandés pendant une période de temps
        </fieldset>
        <br>
    
        <input type="submit" name="valider" value=" Envoyer "> &nbsp&nbsp&nbsp
        <input type="reset" value="Annuler">
    </form>
</fieldset>
<br><br>

<footer> Formulaire réalisé dans le cadre du TP 2 de la formation de développeurs intégrateurs et codeurs web</footer>
</body>
</html>
