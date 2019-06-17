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
        $etablissement = htmlspecialchars($_POST['etablissement']);
        $info = htmlspecialchars($_POST['info']);
        $diplome = htmlspecialchars($_POST['diplome']);
        $duree = htmlspecialchars($_POST['duree']);
        $localisation = htmlspecialchars($_POST['localisation']);

        $reqadd = $bdd->prepare("INSERT INTO parcours(date, etablissement, info, diplome, duree, localisation) VALUES(?, ?, ?, ?, ?, ?)");
        $reqadd->execute(array($date, $etablissement, $info, $diplome, $duree, $localisation));
    } elseif (isset($_POST['supprimer'])) {
        $query = $bdd->prepare("DELETE FROM parcours WHERE id=:id");
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
                        <h3 class="text-center">Mon parcours</h3>
                        <ul class="timeline">
                            <?php
                            $req = $bdd->query("SELECT * FROM parcours");
                            $exp = $req->fetchAll();
                            foreach ($exp as $expe) :?>
                                <li>
                                    <h4><span><?= $expe['date']?> - </span><?= $expe['etablissement']?></h4>
                                    <p><?= $expe['info']?><br>
                                        <b>Diplôme</b> - <?= $expe['diplome']?><br>
                                        <b>Durée</b> - <?= $expe['duree']?><br>
                                        <b>Localisation</b> - <?= $expe['localisation']?><br>
                                    </p>
                                        <?php
                                        if (isset($_POST['suppr'])){
                                        ?>
                                    <form action="parcours.php?id=<?= $userinfo['id']?>" method="post">
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
                                <h4>Ajouter une école</h4>
                                <form method="POST">
                                    <table>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="date">Date :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="date" class="form-control" placeholder="Les dates">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="etablissement">Etablissement :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="etablissement" class="form-control" placeholder="L'établissement">
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
                                                    <label for="diplome">Diplôme :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="diplome" class="form-control" placeholder="Le diplôme">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="duree">Durée :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="duree" class="form-control" placeholder="La durée">
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
                                    <input type="submit" name="formsend" id="formsend" value="Ajouter" class="btn btn-primary" align="center">
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