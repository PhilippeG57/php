<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cardautre" style="width: 30rem; border-radius: 20px;">
        <br><br>
        <h1>Connectez-vous pour accéder au carré VIP</h1><br>
        <form action="traitement.php" method="POST">
            <div class="form-group">
                <?php
                    if(isset($_GET['erreur']) && $_GET['erreur']=="email"){
                ?>
                    <span>Cet email ne correspond pas à un VIP</span><br>
                <?php
                    }
                ?>
                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-control" required><br>
                <?php
                    if(isset($_GET['erreur']) && $_GET['erreur']=="mdp"){
                ?>
                    <span>Le mot de passe ne correspond pas à cet email</span><br>
                <?php
                    }
                ?>
                <label for="mdp">Mot de passe</label><br>
                <input type="text" name="mdp" class="form-control" required><br>
            </div>
            <br>
            <button type="submit" class="submit">ENVOYER</button>
        </form>
        <br><br>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>