<?php
session_start();
include('pdo.php');

date_default_timezone_set('Europe/Paris');

/*Récuperer le pseudo de l'auteur de l'article*/
$stmt = $pdo->prepare("SELECT users.pseudo AS Pseudo_Auteur
FROM actus
JOIN users ON actus.idUser = users.id
WHERE actus.id =".$_POST['idactu']);
$stmt->execute();
$auteur=$stmt->fetch();

if(!isset($_SESSION['userPseudo']) OR $auteur['Pseudo_Auteur']!=$_SESSION['userPseudo']){
    echo "Erreur : vous ne pouvez pas modifier cet article";
    header("Refresh: 3; index.php");
    exit();
}

if(!empty($_POST['titre']) && !empty($_POST['texte']) && !empty($_POST['idactu'])){
    $stmt = $pdo->prepare("SELECT * FROM actus WHERE id=:id");
    $stmt->bindValue(':id', $_POST["idactu"], PDO::PARAM_INT);
    $stmt->execute();
    $actu=$stmt->fetch();
    $stmt->closeCursor();
}

if($actu){
    if(!empty($_FILES["photo"]["name"])){
        $extension = explode('.', $_FILES['photo']["name"]);
        $name = uniqid();
        $photo = $name.".".$extension[1];

        move_uploaded_file($_FILES["photo"]["tmp_name"], "images/".$photo);
    }
    else{
        $photo = $actu['photo'];
    }

    $stmt = $pdo->prepare("UPDATE actus SET titre = :titre, texte = :texte,
    photo = :photo, dateUpdate = :dateUpdate WHERE id = :id");
    $stmt->bindValue(':titre', $_POST["titre"], PDO::PARAM_STR);
    $stmt->bindValue(':texte', $_POST["texte"], PDO::PARAM_STR);
    if(!empty($_FILES["photo"]["name"])){
        $stmt->bindValue(':photo', "images/".$photo, PDO::PARAM_STR);
    }else{
        $stmt->bindValue(':photo', $photo, PDO::PARAM_STR);
    }
    $stmt->bindValue(':dateUpdate', date("Y-m-d H:i:s"), PDO::PARAM_STR);
    $stmt->bindValue(':id', $_POST["idactu"], PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
    header("Location:index.php?modification=reussie");
    exit;
}

echo "Veuillez remplir tous les champs !";
?>