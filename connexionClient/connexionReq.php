<?php
session_start();
include('pdo.php');

$stmt = $pdo->prepare('SELECT * from users WHERE email = :email');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$userExist=$stmt->fetch();

if(!empty($userExist)){
    if(password_verify($_POST['mdp'], $userExist['mdp'])){
        $_SESSION['userId'] = $userExist['id'];
        $_SESSION['userNom'] = $userExist['nom'];
        $_SESSION['userPrenom'] = $userExist['prenom'];
        $_SESSION['userEmail'] = $userExist['email'];
        $_SESSION['userDate'] = $userExist['dateInscription'];
        header('Location:connexion.php?auth=success');
    }
    else{
        header('Location:connexion.php?auth=errormdp');
    }
}

else{
    header('Location:connexion.php?auth=erroremail');
}


?>