<?php
include_once'db.php';
if(isset($_POST['formplante']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $categorie = htmlspecialchars($_POST['categorie']);
    $description = htmlspecialchars($_POST['description']);
    $photo = ($_POST['photo']);
    $humidite = htmlspecialchars($_POST['humidite']);
    $temperature = htmlspecialchars($_POST['temperature']);
    $luminosite = htmlspecialchars($_POST['luminosite']);
    $floraison = htmlspecialchars($_POST['floraison']);

    $insertplante = $bdd->prepare('INSERT INTO plante(nom, catégorie, description, photo, humidité, température, luminosité, floraison) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $insertplante->execute(array($nom, $categorie, $description, $photo, $humidite, $temperature, $luminosite, $floraison));
}

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membre WHERE membre_id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
?>
<!DOCTYPE html>
<html>
    <?php include_once 'head.php' ?>
    <body id="green">
        <h2 id="p-titre">Mes infos</h2>
        <div id="contenu">
        Pseudo = <?php echo $userinfo['pseudo']; ?>
        <br>
        Mail = <?php echo $userinfo['mail']; ?>
        </div>
        <h2 id="p-titre">Mes plantes</h2>
        <?php
            $req = $bdd->prepare('SELECT * FROM plante_user l JOIN plante p ON l.plante_id =p.plante_id WHERE l.membre_id = :pui');
            $req->bindParam(':pui',$userinfo['membre_id'], PDO::PARAM_INT);
            $req->execute();
            $plante_user = $req->fetchAll();
            foreach($plante_user as $uplante) : ?>
            <div id="trait"></div>
            <h5><?= $uplante['nom']?></h5>
            <div id="contenu">
            <img src="<?= $uplante['photo']?>" alt="">
            <p><?= $uplante['description']?></p>
            <p>Catégorie : <?= $uplante['catégorie'];?></p>
            <p>Humidité : <?= $uplante['humidité'];?></p>
            <p>Température : <?= $uplante['température'];?></p>
            <p>Luminosité : <?= $uplante['luminosité'];?></p>
            <p>Période de floraison : <?= $uplante['floraison'];?></p>
            </div>
            <?php endforeach ?>
            
            <div id="contenu">
                <form action="" method="POST">
                    <select name="plante" id="plante">
                    <?php
                        $req = $bdd->query('SELECT * FROM plante');
                        $plante = $req->fetchAll();
                        foreach($plante as $plantes) : ?>
                        <option value="<?= $plantes['plante_id']?>"><?= $plantes['nom']?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="submit" name="btnplante" value="Ajouter">
                </form>
                <?php
                if(isset($_POST['btnplante']))
                {
                    $addplante = $bdd->prepare('INSERT INTO plante_user(nom, plante_id, membre_id) VALUES(:nom, :plante_id, :membre_id)');
                    $addplante->bindParam(':nom', $plantes['nom'], PDO::PARAM_STR);
                    $addplante->bindParam(':plante_id', $_POST['plante_id'], PDO::PARAM_INT);
                    $addplante->bindParam(':membre_id', $userinfo['membre_id'], PDO::PARAM_INT);
                    $addplante->execute();
                }
                ?>
            </div>
            <div id="trait"></div>
            <h2 id="p-titre">Ajouter une plante à la BDD.</h2>
            <div id="contenu">
                <form method="POST" action="">
                    <div class="menu">
                    <table>
                        <tr>
                            <td align="right">
                                <label for="nom">Nom :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Nom plante" name="nom" id="nom" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="categorie">Catégorie :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Catégorie plante" name="categorie" id="categorie" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="description">Description :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Description plante" name="description" id="description" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="photo">Photo :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Lien vers la photo" name="photo" id="photo" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="humidite">Humidité :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Entre -4 et 4" name="humidite" id="humidite" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="temperature">Température :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Entre -4 et 4" name="temperature" id="temperature" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="luminosite">Luminosité :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Entre -4 et 4" name="luminosite" id="luminosite" required>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="floraison">Floraison :</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Période de floraison" name="floraison" id="floraison" required>
                            </td>
                        </tr>
                    </table>
                    </div>
                    <input type="submit" name="formplante" value="Ajouter">
                </form>
            </div>
        <div id="contenu">
            <a href="profil.php?id=<?= $userinfo['membre_id'];?>">Retour</a>
        </div>
    </body>
</html>