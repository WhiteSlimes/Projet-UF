<?php include_once 'db.php' ?>
<?php

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>
    <html>
    <?php include_once 'head.php'?>
    <body>
    <div align="center">
        <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
    </div>
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
        ?>
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#"*>Modification</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="me.php?id=<?= $userinfo['id'];?>">Qui suis-je</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="experience.php?id=<?= $userinfo['id'];?>">Expériences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="parcours.php?id=<?= $userinfo['id'];?>">Parcours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="projets.php?id=<?= $userinfo['id'];?>">Projets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="skill.php?id=<?= $userinfo['id'];?>">Skill</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="messages.php?id=<?= $userinfo['id'];?>">Messages</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div align="center">
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
