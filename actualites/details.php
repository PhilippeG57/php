<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
    include('pdo.php');
    session_start();
    include('header.php');
    if(empty($_GET["idactu"])){
        header("Location:index.php");
    }
    /*Récuperer les détails de l'article choisi à l'aide du parametre dans l'URL*/
    $stmt = $pdo->prepare("SELECT * from actus WHERE id =".$_GET['idactu']);
    $stmt->execute();
    $article=$stmt->fetch();
    ?>

    <h1 class="text-center"><?php echo $article['titre']?></h1><br>
    <div class="text-center">
        <img style="width:10%" src="<?php echo $article['photo'] ?>"><br><br>
        <?php echo $article['texte'] ?>
    </div>

    <?php
        /*Récuperer le pseudo de l'auteur de l'article*/
        $stmt = $pdo->prepare("SELECT users.pseudo AS Pseudo_Auteur
        FROM actus
        JOIN users ON actus.idUser = users.id
        WHERE actus.id =".$_GET['idactu']);
        $stmt->execute();
        $auteur=$stmt->fetch();

    ?>

    <div class="text-center">
        <?php echo "Article rédigé par ".$auteur['Pseudo_Auteur'] ?>
    </div>

    <div class="text-center">
        <a href="update.php?idactu=<?php echo $_GET['idactu'] ?>">Modifier</a>
        <a href="deleteReq.php?idactu=<?php echo $_GET['idactu'] ?>">Supprimer</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>