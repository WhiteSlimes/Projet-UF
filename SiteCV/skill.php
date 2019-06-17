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
        $nom = htmlspecialchars($_POST['nom']);
        $pourcentage = htmlspecialchars($_POST['pourcentage']);
        $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');


        $reqadd = $bdd->prepare("INSERT INTO skill(nom, pourcentage) VALUES(?, ?)");
        $reqadd->execute(array($nom, $pourcentage));
    } elseif (isset($_POST['supprimer'])) {
        $query = $bdd->prepare("DELETE FROM skill WHERE id=:id");
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
                        <h3 class="text-center">Mes Compétences</h3>
                        <ul class="timeline">
                            <?php
                            $req = $bdd->query("SELECT * FROM skill");
                            $exp = $req->fetchAll();
                            foreach ($exp as $expe) :?>
                                <li>
                                    <h4><?= $expe['nom'] ?></h4>
                                    <p><?= $expe['pourcentage'] ?><br>
                                        <?php
                                        if (isset($_POST['suppr'])){
                                        ?>
                                    <form action="skill.php?id=<?= $userinfo['id']?>" method="post">
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
                                <h4>Ajouter une compétence</h4>
                                <form method="POST">
                                    <table>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="icone">Nom :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="nom" class="form-control" placeholder="Nom">
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="form-group">
                                            <tr>
                                                <td align="right">
                                                    <label for="pourcentage">Pourcentage :</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="pourcentage" class="form-control" placeholder="Pourcentage">
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

