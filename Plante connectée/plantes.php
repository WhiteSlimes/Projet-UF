<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'Kujaku', 'test');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>
<?php
    $plantes = $bdd->query('SELECT * FROM plante');
    $plantes = $plantes->fetchAll();
?>
<!DOCTYPE html>
    <html>
        <head>
        <title>Plante co</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width-device width, initial scale-1">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <h1 align="center">Les plantes</h1>
            <?php
            foreach ($plantes as $plante)
            {
            ?>
            <div id="trait"></div>
            <h3><?= $plante['nom'];?></h3>
            <img src="<?= $plante['photo']?>" alt="">
            <p><?= $plante['description']?></p>
            <?php
                if(!empty($_POST['envoyer']))
                {
            ?>
            <p>Catégorie : <?= $plante['catégorie'];?></p>
            <p>Humidité : <?= $plante['humidité'];?></p>
            <p>Température : <?= $plante['température'];?></p>
            <p>Luminosité : <?= $plante['luminosité'];?></p>
            <p>Période de floraison : <?= $plante['floraison'];?></p>
            <?php
                }
            ?>
            <?php }?>
            <div align="center">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="submit" id="envoyer" name="envoyer" value="Voir plus">
                </form>
            </div>
        </body>
    </html>