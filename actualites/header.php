<ul class="nav justify-content-end bg-dark">
    <li class="nav-item">
        <?php
            if(isset($_SESSION['userPrenom'])){
                echo "<span style='color:white; margin-right:10px;position:relative; top:8px'>Connecté en tant que ".$_SESSION['userPrenom']."</span>";
                echo "<a href='deconnexionReq.php' style='position:relative; top:8px'>Se déconnecter</a>";
            }
            else{
                echo "<span style='color:white; position:relative; top:8px'>Vous n'êtes pas connecté.</span>";
            }
        ?>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="./index.php">Accueil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./inscription.php">Inscription</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./connexion.php">Connexion</a>
    </li>
    <?php 
        if((isset($_SESSION['userStatut']) AND $_SESSION['userStatut']=="admin")){
    ?>
        <li class="nav-item">
            <a class="nav-link" href="./ajouterArticle.php">Ajouter article</a>
        </li>
    <?php
        }
    ?>
</ul>