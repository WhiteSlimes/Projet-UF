<?php include_once 'db.php' ?>
<!DOCTYPE html>
<html>
<?php include_once 'head.php'?>
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
                    <?php
                    if(isset($_POST['formsend'])){
                        $mail = htmlspecialchars($_POST['mail']);
                        $message = htmlspecialchars($_POST['message']);

                        $reqmessage = $bdd->prepare("INSERT INTO message(mail, message) VALUES(?, ?)");
                        $reqmessage->execute(array($mail, $message));
                        $info = "Votre message a bien été envoyé !";


                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="mail">Adresse Email</label>
                            <input type="email" class="form-control" name="mail" id="mail" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Votre message</label>
                            <textarea type="text" class="form-control" name="message" id="message" rows="3" placeholder="Votre message" required></textarea>
                        </div>
                            <input type="submit" name="formsend" id="formsend" value="Envoyer" class="btn btn-primary">
                    </form>
                    <?php
                    if(isset($info)){
                        echo '<font color="green">'.$info."</font>";
                    }
                    ?>

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
                            <p>cvalexis.000webhostapp.com</p>
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