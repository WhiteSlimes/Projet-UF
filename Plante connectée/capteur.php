<?php
include_once'db.php';

$capteur = $bdd->query('SELECT * FROM capteur');
$capteur = $capteur->fetchAll();

?>

<!DOCTYPE html>
<html>
<?php
include_once'head.php';
?>
<body id="green">
    <h1 id="p-titre">Informations en temps réeel</h1>
    <div id="contenu">
        <?php foreach ($capteur as $capt) {?>
        <h2>Capteur en temps réel  :</h2>
        <p>Capteur d'humidité : <?= $capt['humidité'];?></p>
        <p>Capteur de température : <?= $capt['température'];?>°C</p>
        <p>Capteur de luminosité : <?= $capt['luminosité'];?> lux</p>
        <?php } ?>
    </div>
</body>
</html>