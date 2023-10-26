<?php
include('pdo.php');
session_start();

date_default_timezone_set('Europe/Paris');

if(!isset($_SESSION['userPrenom'])){
    header("Location:ajouterArticle.php?erreur=nonconnecte");
    exit();
}

$tmp_name = $_FILES["photo"]["tmp_name"];
$name = basename($_FILES["photo"]["name"]);
$ext = explode('.',$name);
//image.jpg     ['image', 'jpg']
$ext = $ext[1];
$unique = uniqid(); //permet de générer un nom unique

$newName = $unique.".".$ext; //aeAEAE9595.jpg
$destination = "images/".$newName;

move_uploaded_file($tmp_name,$destination);

//Insertion des données dans la table actus
$req = $pdo->prepare("
INSERT INTO actus(titre,texte,photo,idUser,dateAdd,dateUpdate)
VALUES (:titre,:texte,:photo,:idUser,:dateAdd,:dateUpdate)",
array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$req->execute(
    array(
        ':titre'=>$_POST['titre'],
        ':texte'=>$_POST['texte'],
        ':photo'=>$destination,
        ':idUser'=>$_SESSION['userId'],
        ':dateAdd'=>date('Y-m-d H:i:s'),
        ':dateUpdate'=>""
    )
);

$req->closeCursor();

header('Location:index.php?ajout=reussi');

?>