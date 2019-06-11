<?php

$capteur = $bdd->query('SELECT * FROM capteur');
$capteur = $capteur->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Informations en temps réeel</h1>
    <?php foreach ($capteur as $capt)  {?>
    <h2>Capteur en temps réel :</h2>
    <p>Capteur d'humidité :<?php $capt['humidité'] ?></p>
    <p>Capteur de température :<?php $capt['température'] ?></p>
    <p>Capteur de luminosité :<?php $capt['luminosité'] ?></p>
</body>
</html>