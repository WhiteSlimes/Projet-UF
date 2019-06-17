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
    if (isset($_POST['supprimer'])) {
        $query = $bdd->prepare("DELETE FROM message WHERE id=:id");
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
                        <h3 class="text-center">Mes Messages</h3>
                        <ul class="timeline">
                            <?php
                            $req = $bdd->query("SELECT * FROM message");
                            $exp = $req->fetchAll();
                            foreach ($exp as $expe) :?>
                                <li>
                                    <h4><span><?= $expe['date']?> - </span></h4>
                                    <p><?= $expe['mail']?></p>
                                    <p><?= $expe['message']?></p>
                                    <?php
                                    if (isset($_POST['suppr'])){
                                        ?>
                                        <form action="messages.php?id=<?= $userinfo['id']?>" method="post">
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
                        <h3 class="text-center">Supprimer</h3>
                        <ul class="timeline">
                            <li>
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