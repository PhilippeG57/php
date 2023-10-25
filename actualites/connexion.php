<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
        session_start();
        include('pdo.php');
        include('header.php');
    ?>
    <h1>Connexion</h1>
    <form action="connexionReq.php" method="post">
        <label for="email">Email</label><br>
        <input type="email" name="email" required><br><br>

        <label for="mdp">Mot de passe</label><br>
        <input type="text" name="mdp" required><br><br>

        <input type="submit" value="Se connecter">
    </form>
    <?php
        if(isset($_SESSION['userPrenom'])){
            echo "Connecté en tant que ".$_SESSION['userPrenom']."<br>";
            echo "<a href='deconnexionReq.php'>Se déconnecter</a>";
        }
        else{
            echo "Vous n'êtes pas connecté.";
        }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>