<?php
session_start();
include('pdo.php');

    /*Récuperer le pseudo de l'auteur de l'article*/
    $stmt = $pdo->prepare("SELECT users.pseudo AS Pseudo_Auteur
    FROM actus
    JOIN users ON actus.idUser = users.id
    WHERE actus.id =".$_GET['idactu']);
    $stmt->execute();
    $auteur=$stmt->fetch();

if(!empty($_GET["idactu"])){
    if(isset($_SESSION['userPseudo']) AND $auteur['Pseudo_Auteur']==$_SESSION['userPseudo']){
        $stmt = $pdo->prepare("DELETE FROM actus WHERE id = :id");
        $stmt->bindValue(':id', $_GET["idactu"], PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();

        echo "L'article vient d'être supprimé, retour à la page d'accueil";
        header("Refresh: 3; index.php");
        exit();
    }
    else{
        echo "Erreur : vous n'etes pas l'auteur de cet article";
        header("Refresh: 3; index.php");
        exit();
    }
}

echo "Erreur : Impossible de supprimer l'article.";
header("Refresh: 3; index.php");
?>