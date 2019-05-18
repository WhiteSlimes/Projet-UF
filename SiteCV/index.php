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
                        <p>Je m'appelle Alexis Papon, je suis né à Paris le 5 janvier 1999. Je suis passionné d'informatique depuis tout jeune ayant l'habitude de regarder mon père faire. J'ai aujourd'hui rejoint une école qui me permet d'apprendre sur quelque chose qui me passionne.</p>
                        <div class="skills-bar">
                            <p>HTML & CSS</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%">60%</div>
                            </div>

                            <p>JAVA</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%">50%</div>
                            </div>

                            <p>C</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%">70%</div>
                            </div>

                            <p>PYTHON</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 35%">35%</div>
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
                                <li>
                                    <h4><span>2015 - </span>Stage Informatique</h4>
                                    <p>Stage effectué durant ma troisième, c'était un stage d'observation. Mes employeurs m'ont quand même laissé pratiquer.<br>
                                        <b>Entreprise</b> - SPIE Infoservice<br>
                                        <b>Durée</b> - 2 semaines<br>
                                        <b>Localisation</b> - Bordeaux (Mérignac)<br>
                                    </p>
                                </li>
                                <li>
                                    <h4><span>2015 - </span> Travail saisonnier</h4>
                                    <p>Travail durant mes vacances d'été pour commencer à entrer dans le monde de travail et gagner de l'argent de poche.<br>
                                        <b>Entreprise</b> - Château Calon Segur<br>
                                        <b>Durée</b> - 1 mois<br>
                                        <b>Localisation</b> - Saint Estèphe<br>
                                    </p>
                                </li>
                                <li>
                                    <h4><span>2016 - </span> Travail saisonnier</h4>
                                    <p>Travail durant mes vacances d'été pour gagner un peu d'argent de poche.<br>
                                        <b>Entreprise</b> - Château Calon Segur<br>
                                        <b>Durée</b> - 1 mois<br>
                                        <b>Localisation</b> - Saint Estèphe<br>
                                    </p>
                                </li>
                                <li>
                                    <h4><span>2017 - </span> Travail saisonnier</h4>
                                    <p>Travail durant mes vacances d'été pour gagner un peu d'argent de poche.<br>
                                        <b>Entreprise</b> - Château Calon Segur<br>
                                        <b>Durée</b> - 1 mois<br>
                                        <b>Localisation</b> - Saint Estèphe<br>
                                    </p>
                                </li>
                                <li>
                                    <h4><span>2018 - </span> Travail saisonnier</h4>
                                    <p>Travail durant mes vacances d'été pour gagner un peu d'argent de poche.<br>
                                        <b>Entreprise</b> - Château Calon Segur<br>
                                        <b>Durée</b> - 1 mois<br>
                                        <b>Localisation</b> - Saint Estèphe<br>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">Mon parcour scolaire</h3>
                            <ul class="timeline">
                                <li>
                                    <h4><span>2011 - 2015 - </span>Collège Les Lesques</h4>
                                    <p>4 ans au collège pour l'optention de mon diplôme.<br>
                                        <b>Diplôme</b> - Brevet des collèges<br>
                                        <b>Durée</b> - 4 ans<br>
                                        <b>Localisation</b> - Lesparre<br>
                                    </p>
                                </li>
                                <li>
                                    <h4><span>2015 - 2018 - </span>Lycée Gustave Eiffel</h4>
                                    <p>3 ans au lycée pour obtenir mon Baccalauréat.<br>
                                        <b>Diplôme</b> - Baccalauréat STI2D(SIN)<br>
                                        <b>Durée</b> - 3 ans<br>
                                        <b>Localisation</b> - Bordeaux<br>
                                    </p>
                                </li>
                                <li>
                                    <h4><span>2018 - 2019 - </span>Ynov informatique</h4>
                                    <p>Première année à Ynov informatique pour obtenir mon Bachelor<br>
                                        <b>Diplôme</b> - Aucun<br>
                                        <b>Durée</b> - 1 ans<br>
                                        <b>Localisation</b> - Bordeaux<br>
                                    </p>
                                </li>
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
                        <div class="col-md-4">
                            <div class="services-box">
                                    <i class="fa fa-leaf"></i><span> Plante connectée</span>
                                    <p>Un projet de plante connectée en groupe, ou le but est d'avoir un maximum d'informations sur une plante afin de la faire évoluer dans les meilleures conditions</p>
                                    <a href="https://github.com/WhiteSlimes/Projet-UF/tree/master/Plante%20connect%C3%A9e" target="_blank">Voir le projet</a><br>
                                    <a href="#" target="_blank">Voir le site</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services-box">
                                <i class="fa fa-coffee"></i><span> Plugin Minecraft</span>
                                <p>Développement d'un plugin minecraft en Java. Ce projet je le réalise seul et par pure plaisir de pratiquer du Java, un langage qui me plaît beaucoup.</p>
                                <a href="https://github.com/WhiteSlimes/SeisanPlugin" target="_blank">Voir le projet</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services-box">
                                <i class="fa fa-laptop"></i><span> Site CV</span>
                                <p>Site CV, il s'agit du site sur lequel vous vous trouvez actuellement. Le but est de créer un site avec nos comptéences et tous se que l'on trouve dans un CV. Le projet est a réalisé seul.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--Contact-->
            <div class="contact" id="contact">
                <div class="container text-center">
                    <h1>Contactez-moi</h1>
                    <p class="text-center">Vous pouvez me contacter ici en remplissant le formulaire.</p>
                    <form method="POST" action="traitement.php">
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                        <textarea type="text" name="message" id="message" placeholder="Votre message" required rows="10" cols="50"></textarea>
                        <input type="submit" name="formsend" id="formsend" value="Envoyer">
                    </form>
                    <?php
                        if(isset($_POST['formsend']))
                        echo "Votre message a bien été envoyer !"
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
                            <p>www.kujaku.fr</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary"><i class="fa fa-download"></i>Résumé</button>
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