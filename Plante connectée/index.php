<?php
include_once'db.php';

if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        
        $pseudolenght = strlen($pseudo);
        if($pseudolenght <= 255)
        {
            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM membre WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {
                        if($mdp == $mdp2)
                        {
                            $insertmbr = $bdd->prepare("INSERT INTO membre(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                            $insertmbr->execute(array($pseudo, $mail, $mdp));
                            $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                        }
                        else
                        {
                            $erreur = "Vos mots de passe ne correspondent pas !";
                        }
                    }
                    else
                    {
                        $erreur = "Adresse mail déjà utilisée";
                    }
                }
                else
                {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
            }
            else
            {
                $erreur = "Vos adresses mails ne correspondent pas !";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas dépassé 255 caractères !";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis !";
    }
}


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
    <body id="green" >
    <h2 id="p-titre">Inscription</h2>
        <div id="contenu">
            <br><br />
            <form method="POST" action="">
            <table>
                <tr>
                    <td align="right">
                        <label for="pseudo">Pseudo :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo;} ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mail">Mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Votre mail" name="mail" id="mail" value="<?php if(isset($mail)) { echo $mail;} ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right"> 
                        <label for="mail2">Confirmation du mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Confirmez votre email" name="mail2" id="mail2" value="<?php if(isset($mail2)) { echo $mail2;} ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right"> 
                        <label for="mdp">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Votre mot de passe" name="mdp" id="mdp">
                    </td>
                </tr>
                <tr>
                    <td align="right"> 
                        <label for="mdp2">Confirmation du mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirmez votre mot de passe" name="mdp2" id="mdp2">
                    </td>
                </tr>
            </table>
            <input type="submit" name="forminscription" value="S'inscrire">
            <br>
            <a href="connexion.php">Se connecter</a>
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