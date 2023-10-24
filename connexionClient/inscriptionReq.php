<?php

include("pdo.php");
date_default_timezone_set('Europe/Paris');

$stmt = $pdo->prepare('SELECT * from users WHERE email = :email');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$userExist=$stmt->fetch();

if(empty($userExist)){
    //Insertion des données dans la table users
    $req = $pdo->prepare("
        INSERT INTO users(nom,prenom,email,mdp,dateInscription)
        VALUES (:nom,:prenom,:email,:mdp,:dateInscription)",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $req->execute(
        array(
            ':nom'=>$_POST['nom'],
            ':prenom'=>$_POST['prenom'],
            ':email'=>$_POST['email'],
            ':mdp'=>password_hash($_POST['mdp'], PASSWORD_DEFAULT),
            ':dateInscription'=>date('Y-m-d H:i:s')
        )
    );

    $req->closeCursor();

    header("Location:index.php?inscription=success");
}else{
    header("Location:index.php?inscription=error");
}
?>