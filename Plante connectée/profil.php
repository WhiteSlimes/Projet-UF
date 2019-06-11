<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8', 'Kujaku', 'test');
}
catch (Exception $e)
{
         die('Erreur : ' . $e->getMessage());
}

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membre WHERE membre_id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
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
        <div align="center">
            <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
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
                                <a class="nav-link" href="#top">Plante</a>
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
                <a href="deconnexion.php">Déconnexion</a>
                <?php
            }
            ?>
        </div>
    </body>
</html>
<?php
}
?>