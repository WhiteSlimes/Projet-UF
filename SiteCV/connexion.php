<?php include_once 'db.php' ?>
<?php
if(isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM admin WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: admin.php?id=".$_SESSION['id']);
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
<?php include_once 'head.php'?>
    <body>
    <h2>Connexion</h2>
        <div class="menu" align="center">
            <br><br>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email"> Adresse Email</label>
                    <input type="email" name="mailconnect" placeholder="Mail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mdpconnect"></label>
                    <input type="password" name="mdpconnect" placeholder="Mot de passe" class="form-control">
                </div>
                <input type="submit" name="formconnexion" value="Se connecter" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>