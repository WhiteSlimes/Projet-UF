<?php
include_once'db.php';

if(isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membre WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['membre_id'] = $userinfo['membre_id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profil.php?id=".$_SESSION['membre_id']);
        }
        else
        {
            $erreur = "Votre adresse mail ou votre mot de passe est invalide !";
        }
    }
    else{
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<html>
    <?php include_once 'head.php' ?>
    <body id="green">
    <h2 id="p-titre">Connexion</h2>
        <div class="menu" align="center">
            <br><br>
            <form action="" method="POST">
                <input type="email" name="mailconnect" placeholder="Mail">
                <input type="password" name="mdpconnect" placeholder="Mot de passe">
                <input type="submit" name="formconnexion" value="Se connecter">
            </form>
            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur."</font>";
            }
            ?>
        </div>
    </body>
</html>