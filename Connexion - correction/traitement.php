<?php
    //$_POST['email'] et $_POST['mdp']
    if($_POST['email']=="toto@gmail.com"){
        if($_POST['mdp']=="HarryPotter2023"){
            header('Location:bienvenue.php');
        }else{
            header('Location:index.php?erreur=mdp');
        }
    }else{
        header('Location:index.php?erreur=email');
    }

?>