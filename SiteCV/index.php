<?php

$servername = "localhost";
$dbname = "id9838746_kujaku";
$username = "id9838746_kujaku";
$password = "kujaku";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kujaku</title>
        <meta name="viewport" content="width-device width, initial scale-1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <!--Header Section-->
        <section id="header">
            <div class="container text-center">
                <div class="user-box">
                    <img src="img/user1.jpg" alt="photo">
                    <h1>Alexis Papon</h1>
                    <p>Étudiant à Ynov informatique</p>
                </div>
            </div>
            <div class="scroll-btn">
                <div class="scroll-bar">
                    <a href="#about">
                        <span>

                        </span>
                    </a>
                </div>
            </div>
        </section>

    <!--User Info Section-->
        <section id="user-info">
            <div class="nav-bar">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#"*>KUJAKU</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                <a class="nav-link" href="#top">HOME</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#about">À PROPOS</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#services">PROJETS</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#contact">CONTACT</a>
                                </li>
                            </ul>
                        </div>
                </nav>
            </div>

    <!--À PROPOS-->
            <div class="about container" id="about">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="img/user2.png" alt="photo">
                    </div>
                    <div class="col-md-6">
                        <h3>QUI SUIS-JE ?</h3>
                        <?php
                            $req = $bdd->query("SELECT * FROM moi");
                            $infos = $req->fetchAll();
                            foreach($infos as $info) : 
                        ?>
                        <p><?= $info['info'] ?></p>
                        <?php endforeach ?>
                        <div class="skills-bar">
                        <?php
                            $req = $bdd->query("SELECT * FROM skill");
                            $nom = $req->fetchAll();
                            foreach($nom as $name) :
                        ?>
                            <p><?= $name['nom'] ?></p>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?= $name['pourcentage'] ?>" ><?= $name['pourcentage'] ?></div>
                            </div>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!--Social-->
            <div class="social-icons">
                <ul>
                    <a href="https://twitter.com/White_Slimes" target="_blank"><li><i class="fa fa-twitter"></i></li></a>
                    <a href="https://www.facebook.com/alexis.papon.1?ref=bookmarks" target="_blank"><li><i class="fa fa-facebook"></i></li></a>
                    <a href="https://github.com/WhiteSlimes" target="_blank"><li><i class="fa fa-github"></i></li></a>
                </ul>
            </div>

    <!--Resume-->
            <div class="resume" id="resume">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center">Mes Expériences</h3>
                            <ul class="timeline">
                            <?php
                            $req = $bdd->query("SELECT * FROM experience");
                            $exp = $req->fetchAll();
                            foreach($exp as $expe) :
                            ?>
                                <li>
                                    <h4><span><?= $expe['date']?> - </span><?= $expe['nom']?></h4>
                                    <p><?= $expe['info']?><br>
                                        <b>Entreprise</b> - <?= $expe['entreprise']?><br>
                                        <b>Durée</b> - <?= $expe['duree']?><br>
                                        <b>Localisation</b> - <?= $expe['localisation']?><br>
                                    </p>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">Mon parcours scolaire</h3>
                            <ul class="timeline">
                            <?php
                            $req = $bdd->query("SELECT * FROM parcours");
                            $par = $req->fetchAll();
                            foreach($par as $parc) :
                            ?>
                                <li>
                                    <h4><span><?= $parc['date']?> - </span><?= $parc['etablissement']?></h4>
                                    <p><?= $parc['info']?><br>
                                        <b>Diplôme</b> - <?= $parc['diplome']?><br>
                                        <b>Durée</b> - <?= $parc['duree']?><br>
                                        <b>Localisation</b> - <?= $parc['localisation']?><br>
                                    </p>
                                </li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--Projets-->
            <div class="services" id="services">
                <div class="container">
                    <h1 class="text-center">Mes Projets</h1>
                    <p class="text-center">Je suis à la réalisation de plusieurs projets, en groupe ou même seul.</p>
                    <div class="row">
                    <?php
                        $req = $bdd->query("SELECT * FROM projet");
                        $pro = $req->fetchAll();
                        foreach($pro as $proj) :
                    ?>
                        <div class="col-md-4">
                            <div class="services-box">
                                    <i class="<?= $proj['icone']?>"></i><span> <?= $proj['nom']?></span>
                                    <p><?= $proj['info']?></p>
                                    <a href="<?= $proj['github']?>" target="_blank"><?= $proj ['lien']?></a><br>
                            </div>
                        </div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        <!--Contact-->
            <div class="contact" id="contact">
                <div class="container text-center">
                    <h1>Contactez-moi</h1>
                    <p class="text-center">Vous pouvez me contacter ici en remplissant le formulaire.</p>
                    <form method="POST">
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                        <textarea type="text" name="message" id="message" placeholder="Votre message" required rows="10" cols="50"></textarea>
                        <input type="submit" name="formsend" id="formsend" value="Envoyer">
                    </form>

                    <div class="row">
                        <div class="col-md-4">
                            <i class="fa fa-phone"></i>
                            <p>07 77 31 96 69</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-envelope"></i>
                            <p>alexis.papon@ynov.com</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-internet-explorer"></i>
                            <p>www.kujaku.fr</p>
                        </div>
                    </div>
                    <a href="telechargement/CV.pdf" download><button type="button" class="btn btn-primary"><i class="fa fa-download"></i>Résumé</button></a>
                    <button type="button" class="btn btn-primary"><i class="fa fa-rocket"></i>Tirez moi !</button>
                </div>
                <div class="footer text-center">
                    <p>Fait par un <i class="fa fa-reddit-alien"></i> Kujaku</p>
                </div>
            </div>
        </section>

        <script src="smooth-scroll.js"></script>
        <script>
            var scroll = new SmoothScroll('a[href*="#"]');
        </script>
    </body>
</html>