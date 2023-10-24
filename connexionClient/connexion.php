<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include('pdo.php');
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
</body>
</html>