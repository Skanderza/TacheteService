<?php
// 1 on demarre la session
session_start();
//2 on detruit les variables de sessions
session_unset();
//3 on detruit la session
session_destroy();
//4 on se redirige vers la page connexion
header('Location: connexiontachete.php');

?>