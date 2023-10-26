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

if(!isset($_SESSION['userPseudo']) OR $auteur['Pseudo_Auteur']!=$_SESSION['userPseudo']){
    echo "Erreur : vous ne pouvez pas modifier cet article";
    header("Refresh: 3; index.php");
    exit();
}


if(isset($_GET["idactu"])){
    $stmt = $pdo->prepare('SELECT titre, texte, photo FROM actus WHERE id=:id');
    $stmt->bindValue(':id', $_GET["idactu"], PDO::PARAM_INT);
    $stmt->execute();
    $actu = $stmt->fetch();
    $stmt->closeCursor();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mettre à jour l'article</h1>
    <form action="updateReq.php" method="POST" enctype="multipart/form-data">
        <label for="titre">Titre de l'article</label><br>
        <input type="text" name="titre" value="<?= $actu["titre"] ?>">
        <input type="hidden" name="idactu" value="<?= $_GET["idactu"] ?>"><br><br>

        <label for="texte">Texte de l'article</label><br>
        <textarea name="texte" cols="30" rows="10"><?= $actu['texte'] ?></textarea><br><br>

        <div> Image actuelle : <br>
            <img src="<?= $actu["photo"] ?>">
        </div>
        <label for="photo">Changer photo de l'article</label>
        <input type="file" name="photo" value="<?= $actu["photo"] ?>"><br><br>

        <input type="submit" value="Modifier cet article">
    </form>
</body>
</html>