<?php
include_once'db.php';
?>
<?php
    $plantes = $bdd->query('SELECT * FROM plante');
    $plantes = $plantes->fetchAll();
?>
<!DOCTYPE html>
    <html>
        <?php include_once 'head.php'; ?>
        <body id="green">
            <h1 id="p-titre">Les plantes</h1>
            <?php
            foreach ($plantes as $plante)
            {
            ?>
            <div id="trait"></div>
                <article>
                    <div class="l-plante">
                        <h3><?= $plante['nom'];?></h3>
                        <img src="<?= $plante['photo']?>" alt="" class="l-p-img">
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
                    </div>
                        <?php }?>
                        <div align="center">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                <input type="submit" id="envoyer" name="envoyer" value="Voir plus">
                            </form>
                        </div>
                </article>
        </body>
    </html>