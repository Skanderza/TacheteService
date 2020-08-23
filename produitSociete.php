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
    <meta charset="utf-8" />
    <title>TACHETE Recheche par produit</title>
  </head>
  
  <body>

  <header></header>
  <h1>La liste des sociétés clientes</h1>
  <?php
echo "Bienvenue ".$nom." ".$prenom." ";
?>
<a href="deconnexiontachete.php">Déconnexion</a>
  <hr>
  <form method = "post" action="produitSociete.php">
   <fieldset>
       <legend>Liste des societés clientes</legend>
       <label>Saisissez le nom du produit</label>
       <input type="text" name="nom">

       <input type="submit" value="Rechercher">

   </fieldset>
</form>

  <?php
//Inclusion des paramètres de connexion
include_once("myparamTachete.inc.php");

$idcom = new mysqli(MYHOST,MYUSER,MYPASS, 'tachete'); 
if (!$idcom) 
{
echo "Connexion impossible à la base";
exit(); 
}
?>

<?php

   if(!empty($_POST['nom'])) {
   
      $nom = $idcom->escape_string($_POST['nom']);
      


$requete ="SELECT c.CompanyName, o.OrderID, p.ProductName from Customers c INNER JOIN Orders o 
on c.CustomerID = o.CustomerID INNER JOIN OrderDetails od
on o.OrderID = od.OrderID INNER JOIN Products p 
on od.ProductID = p.ProductID WHERE p.ProductName LIKE '$nom%' 
ORDER BY `c`.`CompanyName`  DESC";

$result = $idcom->query($requete);

if ($result->num_rows > 0) {


   echo('<table border="1">
    <colgroup width =150 span=12></colgroup>
	<thead> <!-- En-tête du tableau -->
   <tr>
       
       <th>Nom de la compagnie</th>
       <th>Numéro de la commande</th>
	   <th>Nom du produit</th>
       
       </tr>
    </thead>
    <tbody> <!-- Corps du tableau --> ');
    //print_r($result->fetch_array());
    while($donnees = $result->fetch_array()) {
        echo ('<tr>');
       
       echo ('<td>'.$donnees['CompanyName'].'</td>');
       echo ('<td>'.$donnees['OrderID'].'</td>');
       echo ('<td>'.$donnees['ProductName'].'</td>');
       
       
       echo('</tr>');
   }
       echo('<tbody>');
       echo('</table>');
      } else {
        echo "0 results";
    }
$idcom->close(); 
}
else {
    //echo "Veuillez remplir la formulaire";
    echo "<script language=\"javascript\">";
    echo "alert('Recherche par produit')";
    echo"</script>";
}
  ?>
  
  </body>
</html>

<?php
}
    else {echo "Vous n'êtes pas autorisé à visiter cette page <br/>";
          echo "<a href = \"connexionTachete.php\">Merci de vous connecter</a> ";
          }
    ?>