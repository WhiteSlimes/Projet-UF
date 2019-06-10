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
    $requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<html>
    <head>
        <title>Plante co</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div align="center">
            <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
            <br><br>
            Pseudo = <?php echo $userinfo['pseudo']; ?>
            <br>
            Mail = <?php echo $userinfo['mail']; ?>
            <?php
            if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
            {
                ?>
                <br>
                <a href="#">Ajouter une plante</a>
                <br>
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