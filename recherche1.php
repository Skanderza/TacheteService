<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>TACHETE Recheche employés</title>
  </head>
  
  <body>

  <header></header>
  <h1>La liste des employés</h1>
  <hr>
  <form method = "post" action="recherche1.php">
   <fieldset>
       <legend>Liste des employés</legend>
       <label>Saisissez le nom de l'employé</label>
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
      
  
$requete ="SELECT e.EmployeeID, e.LastName, e.FirstName, o.OrderId, o.OrderDate, c.CompanyName, c.ContactName from employees e 
INNER JOIN Orders o 
on e.EmployeeID = o.EmployeeID INNER JOIN Customers c 
on o.CustomerID = c.CustomerID WHERE LastName LIKE '$nom%' " ;   

$result = $idcom->query($requete);

if ($result->num_rows > 0) {


   echo('<table border="1">
    <colgroup width =150 span=12></colgroup>
	<thead> <!-- En-tête du tableau -->
   <tr>
       
       <th>Nom</th>
       <th>Prénom</th>
	   <th>Numéro commande</th>
       <th>Date commande</th>
       <th>Nom de la compagnie</th>
       <th>Nom du contact</th>
       </tr>
    </thead>
    <tbody> <!-- Corps du tableau --> ');
    //print_r($result->fetch_array());
    while($donnees = $result->fetch_array()) {
        echo ('<tr>');
       
       echo ('<td>'.$donnees['LastName'].'</td>');
       echo ('<td>'.$donnees['FirstName'].'</td>');
       echo ('<td>'.$donnees['OrderId'].'</td>');
       echo ('<td>'.$donnees['OrderDate'].'</td>');
       echo ('<td>'.$donnees['CompanyName'].'</td>');
       echo ('<td>'.$donnees['ContactName'].'</td>');
       
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
    echo "alert('Recherche employees')";
    echo"</script>";
}
  ?>
  
  </body>
</html>