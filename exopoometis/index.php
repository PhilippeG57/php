<?php
require 'classes/voiture.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Porsche</title>
</head>
<body>
    <?php
        // j'achete une Porsche
        $maPorsche = new Voiture("AA 123 AA", "Rouge", 850, 450, 70, 4);
        // je regarde le tableau de bord
        echo $maPorsche->getMessage() . "<br>";

        //var_dump de ma porsche
        var_dump($maPorsche);

        // j'assure ma Porsche
        $maPorsche->setAssure(true);

        //Je regarde le tableau de bord
        echo $maPorsche->getMessage() . "<br>";

        $maPorsche->repeindre("Vert");
        echo $maPorsche->getMessage() . "<br>";

        $maPorsche->Mettre_essence(30);
        echo $maPorsche->getMessage() . "<br>";
    ?>
</body>
</html>