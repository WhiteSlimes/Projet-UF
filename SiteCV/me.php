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
        $info = htmlspecialchars($_POST['info']);

        $reqadd = $bdd->prepare("INSERT INTO moi(info) VALUES(?)");
        $reqadd->execute(array($info));
    } elseif (isset($_POST['supprimer'])) {
        $query = $bdd->prepare("DELETE FROM moi WHERE id=:id");
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
                            <h3 class="text-center">Mes infos</h3>
                            <ul class="timeline">
                                <?php
                                $req = $bdd->query("SELECT * FROM moi");
                                $exp = $req->fetchAll();
                                foreach ($exp as $expe) :?>
                                    <li>
                                        <p><?= $expe['info'] ?><br><br>
                                            <?php
                                            if (isset($_POST['suppr'])){
                                            ?>
                                        <form action="me.php?id=<?= $userinfo['id']?>" method="post">
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
                                    <h4>Ajouter une info</h4>
                                    <form method="POST">
                                        <table>
                                            <div class="form-group">
                                                <tr>
                                                    <td align="right">
                                                        <label for="nom">Info :</label>
                                                    </td>
                                                    <td>
                                                        <textarea type="text" name="info" class="form-control" placeholder="Les infos"></textarea>
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