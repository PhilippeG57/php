<?php
session_start();
include('pdo.php');

//retirer toutes les variables de session
unset($_SESSION['userId']);
unset($_SESSION['userNom']);
unset($_SESSION['userPrenom']);
unset($_SESSION['userEmail']);
unset($_SESSION['userDate']);

header('Location:connexion.php?deconnexion=success');

?>