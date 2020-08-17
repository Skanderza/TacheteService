

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>TACHETE Recheche par date</title>
  </head>
  
  <body>

  <header></header>
  <h1>La liste des commandes et des produits</h1>
  <hr>
  <form method = "post" action="recherchedate.php">
   <fieldset>
       <legend>La liste des commandes et des produits commandés à cette période</legend>
       <label>Saisissez la premiere date</label>
       <input type="date" name="date1"><br><br>
       <label>Saisissez la deuxieme date</label>
       <input type="date" name="date2">
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

   if(!empty(($_POST['date1']) and ($_POST['date2']))) {
   
      $date1 = $idcom->escape_string($_POST['date1']);
      $date2 = $idcom->escape_string($_POST['date2']);

      
  
      $requete ="SELECT o.OrderId, p.ProductName, o.OrderDate 
      FROM Orders o INNER JOIN OrderDetails od
      on o.OrderID = od.OrderID INNER JOIN Products p 
      on od.ProductID = od.ProductID
      WHERE o.OrderDate BETWEEN '$date1' and '$date2' ";

$result = $idcom->query($requete);

if ($result->num_rows > 0) {

echo ("Entre le ".$date1." et le  ".$date2);
   echo('<table border="1">
    <colgroup width =150 span=12></colgroup>
	<thead> <!-- En-tête du tableau -->
   <tr>
       
       <th>Numéro commande</th>
       <th>Nom du produit</th>
       <th>Date commande</th>

       </tr>
    </thead>
    <tbody> <!-- Corps du tableau --> ');
    //print_r($result->fetch_array());
    while($donnees = $result->fetch_array()) {
        echo ('<tr>');
       
       echo ('<td>'.$donnees['OrderId'].'</td>');
       echo ('<td>'.$donnees['ProductName'].'</td>');
       echo ('<td>'.$donnees['OrderDate'].'</td>');
       
       
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
    echo "alert('Recherche')";
    echo"</script>";
}
  ?>
  
  </body>
</html>