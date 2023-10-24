<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="inscriptionReq.php" method="post">
        <label for="nom">Nom</label><br>
        <input type="text" name="nom" required><br><br>

        <label for="prenom">Prénom</label><br>
        <input type="text" name="prenom" required><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" required><br><br>

        <label for="mdp">Mot de passe</label><br>
        <input type="text" name="mdp" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>
    <?php
        if(isset($_GET['inscription']) AND $_GET['inscription']=="success"){
    ?>
        <div style="color:green">Inscription réussie</div>
    <?php
        }
        if(isset($_GET['inscription']) AND $_GET['inscription']=="error"){
    ?>
        <div style="color:red">Erreur : cet email est déjà pris</div>
    <?php
        }
    ?>
</body>
</html>