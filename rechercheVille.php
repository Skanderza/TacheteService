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
    <title>TACHETE Recheche par ville</title>
  </head>
  
  <body>

  <header></header>
  <h1>La liste des employés</h1>
  <?php
echo "Bienvenue ".$nom." ".$prenom." ";
?>
<a href="deconnexiontachete.php">Déconnexion</a>
  <hr>
  <form method = "post" action="rechercheVille.php">
   <fieldset>
       <legend>Liste des employés et des societés pas ville</legend>
       <label>Saisissez une ville</label>
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
      
  
      $requete ="SELECT e.LastName, e.FirstName, c.CompanyName, c.City FROM Employees e 
      INNER JOIN Orders o 
      on e.EmployeeID = o.EmployeeID 
      INNER JOIN Customers c 
      on o.CustomerID = c.CustomerID
      WHERE c.City = '$nom'
      ORDER BY c.CompanyName ASC";

$result = $idcom->query($requete);

if ($result->num_rows > 0) {


   echo('<table border="1">
    <colgroup width =150 span=12></colgroup>
	<thead> <!-- En-tête du tableau -->
   <tr>
       
       <th>Nom</th>
       <th>Prénom</th>
       <th>Nom de la compagnie</th>
       <th>Ville</th>
       
       
       </tr>
    </thead>
    <tbody> <!-- Corps du tableau --> ');
    //print_r($result->fetch_array());
    while($donnees = $result->fetch_array()) {
        echo ('<tr>');
       
       echo ('<td>'.$donnees['LastName'].'</td>');
       echo ('<td>'.$donnees['FirstName'].'</td>');
       echo ('<td>'.$donnees['CompanyName'].'</td>');
       echo ('<td>'.$donnees['City'].'</td>');
       
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

<?php
}
    else {echo "Vous n'êtes pas autorisé à visiter cette page <br/>";
          echo "<a href = \"connexionTachete.php\">Merci de vous connecter</a> ";
          }
    ?>