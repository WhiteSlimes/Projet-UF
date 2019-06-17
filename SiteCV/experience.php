<?php include_once 'db.php' ?>
<?php

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>
    <html>
    <?php include_once 'head.php' ?>
    <body>
    <?php
    if (isset($_POST['formsend'])) {
        $date = htmlspecialchars($_POST['date']);
        $nom = htmlspecialchars($_POST['nom']);
        $info = htmlspecialchars($_POST['info']);
        $entreprise = htmlspecialchars($_POST['entreprise']);
        $duree = htmlspecialchars($_POST['duree']);
        $localisation = htmlspecialchars($_POST['localisation']);
        $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');


        $reqadd = $bdd->prepare("INSERT INTO experience(date, nom, info, entreprise, duree, localisation) VALUES(?, ?, ?, ?, ?, ?)");
        $reqadd->execute(array($date, $nom, $info, $entreprise, $duree, $localisation));
    } elseif (isset($_POST['supprimer'])) {
        $query = $bdd->prepare("DELETE FROM experience WHERE id=:id");
        $query->bindParam(':id', $_POST['expeid'], PDO::PARAM_INT);
        $query->execute();
    }
    ?>
    <?php
    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
        ?>
        <div class="resume" id="resume">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center">Mes Expériences</h3>
                        <ul class="timeline">
                            <?php
                            $req = $bdd->query("SELECT * FROM experience");
                            $exp = $req->fetchAll();
                            foreach ($exp as $expe) :?>
                                <li>
                                    <h4><span><?= $expe['date'] ?> - </span><?= $expe['nom'] ?></h4>
                                    <p><?= $expe['info'] ?><br>
                                        <b>Entreprise</b> - <?= $expe['entreprise'] ?><br>
                                        <b>Durée</b> - <?= $expe['duree'] ?><br>
                                        <b>Localisation</b> - <?= $expe['localisation'] ?><br>
                                        <?php
                                        if (isset($_POST['suppr'])){
                                        ?>
                                    <form action="experience.php?id=<?= $userinfo['id']?>" method="post">
                                        <th width="10px" scope="row"><input type="hidden" value="<?= $expe['id'] ?>" name="expeid" readonly></th>
                                        <button type="submit" name="supprimer">Supprimer</button>
                                    </form>
                                    <?php
                                    }
                                    ?>
                                    </p>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center">Modification</h3>
                        <ul class="timeline">
                            <li>
                                <h4>Ajouter une expérience</h4>
                                <form method="POST">
                                    <table>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="date">Date :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="date" class="form-control" placeholder="Date">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="nom">Nom :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="info">Info :</label>
                                                </td>
                                                <td>
                                                    <textarea type="text" name="info" class="form-control" placeholder="Les infos"></textarea>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="entreprise">Entreprise :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="entreprise" class="form-control" placeholder="Entreprise">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="duree">Durée :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="duree" class="form-control" placeholder="Durée">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="localisation">Localisation :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="localisation" class="form-control" placeholder="Localisation">
                                                </td>
                                            </tr>
                                        </div>
                                    </table>
                                    <input type="submit" name="formsend" id="formsend" value="Ajouter"
                                           class="btn btn-primary" align="center">
                                </form>
                                <form action="" method="post">
                                    <button type="submit" name="suppr" class="btn btn-primary">Supprimer</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="admin.php?id=<?= $userinfo['id']?>">Retour</a>
        <?php
    }
    ?>
    </body>
    </html>
    <?php
}
    ?>