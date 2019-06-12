<?php
include_once'db.php';

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membre WHERE membre_id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<html>
    <?php include_once 'head.php' ?>
    <body id="green">
    <h2 id="p-titre">Profil de <?php echo $userinfo['pseudo']; ?></h2>
            <?php
            if(isset($_SESSION['membre_id']) AND $userinfo['membre_id'] == $_SESSION['membre_id'])
            {
                ?>
                <div class="nav-bar">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#"*>Plante</a>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                <a class="nav-link" href="capteur.php">Plante</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="plantes.php">Les plantes</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="membre.php?id=<?= $userinfo['membre_id'];?>">Profil</a>
                                </li>
                            </ul>
                        </div>
                </nav>
            </div>
                <div id="contenu">
                    <a href="deconnexion.php">Déconnexion</a>
                </div>
                <?php
            }
            ?>

    </body>
</html>
<?php
}
?>