<!DOCTYPEhtml>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les Jardins de Gaston</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
</head>
<body>
<!-----      Navigation   ------->


<!-- navbar-collapse menu burger-->

<header">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="row hidden-xs"><img hidden-xs hidden-sm id="logo" src="img/logo_vert2.png"/></div>
                <div class="row hidden-sm hidden-md hidden-lg"><span class="headtitle">Les Jardins de Gaston</span></div>
            </div>

            <!-- navbar-collapse navigation -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Les prestations</a></li>
                    <li><a href="#">Le conseil du mois</a></li>
                    <li><a class="btn btn-success" href="#" role="button">Nous contacter</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>


<div class="container-fluid"> <!-- fermeture en fin de page -->


<!--------    Image header    --------->
    <div class="row">
        <div class="col-lg-12 bg-img1-lg img-responsive visible-lg parallax"></div>
    </div>


<!-------    Section presentation  -------->


<!-------       Titre       -------->


<!-------    Paragraphe presentation  -------->
    <div class="row vide"><div class="col-xs-12 text-center">Présentation</div></div>


<!-------     Valeur Ecologie  -------->


<!-------      Valeur Client     -------->


<!-------      Image Transition 1     -------->
    <div class="row">
        <div class="col-lg-12 bg-img2-lg img-responsive visible-lg parallax"></div>
    </div>


<!-------     Section Best Realisations    -------->

<div class="row real-titre">
    <div class="col-xs-12">
        <h2>Nos plus belles réalisations</h2>
    </div>
</div>

<div class="row real">
    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-lg-offset-1 col-lg-4 real1">
        <div class="thumbnail">

            <figure class="cd-image-container">
                <img src="img/test_img_1_rsz.jpg" alt="Original Image">
                <span class="cd-image-label" data-type="original">Original</span>

                <div class="cd-resize-img"> <!-- the resizable image on top -->
                    <img src="img/test_img_2.jpg" alt="Modified Image">
                    <span class="cd-image-label" data-type="modified">Modified</span>
                </div>

                <span class="cd-handle"></span> <!-- slider handle -->
            </figure> <!-- cd-image-container -->

            <!--<div class="beforeAfter">
                <div class="container-fluid">

                    <figure class="before"> <img class="img-responsive" src="img/test_img_1_rsz.jpg" />
                    </figure>
                    <figure class="after"> <img src="img/test_img_2.jpg" />
                    </figure>

                </div>

            </div>-->

            <div class="caption">
                <h3>Titre 3</h3>
                <p>Lorem ipsum</p>
            </div>
        </div>
    </div>

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4 real2">
        <div class="thumbnail">

            <figure class="cd-image-container">
                <img src="img/test2_avant.jpg" alt="Original Image">
                <span class="cd-image-label" data-type="original">Original</span>

                <div class="cd-resize-img"> <!-- the resizable image on top -->
                    <img src="img/test2_apres.jpg" alt="Modified Image">
                    <span class="cd-image-label" data-type="modified">Modified</span>
                </div>

                <span class="cd-handle"></span> <!-- slider handle -->
            </figure> <!-- cd-image-container -->

            <!--<div class="beforeAfter">
                <div class="container-fluid">

                    <figure class="before"> <img class="img-responsive" src="img/test2_avant.jpg" />
                    </figure>
                    <figure class="after"> <img src="img/test2_apres.jpg" />
                    </figure>

                </div>

            </div>-->
            <div class="caption">
                <h3>Titre 3</h3>
                <p>Lorem Ipsum</p>
            </div>
        </div>
    </div>

</div>


<!-------         Best Real 1         -------->


<!-------         Best Real 2         -------->

    <!--    Section Blog    -->

    <div class="row Blog">

        <div class="col-xs-9 col-xs-offset-1">
            <div class="thumbnail">
                <div class="BlogThumb">
                    <a href="blog.php"><h3>Et pendant ce temps chez Gaston...</h3></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>
            </div>
        </div>

    </div>






<!-------      Section Liste Prestations     -------->

<div class="row presta-titre">

    <div class="col-xs-12">
        <h2>Nos prestations</h2>
    </div>

</div>


<!-------        Prestation 1        -------->

<div class="row row-presta">

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4">
        <div class="thumbnail blocPresta">
            <img src="http://placehold.it/500x500" alt="prestation1">
            <div class="etiquette">
                <h3>Prestation 1</h3>
                <p>Lorem ipsum dolor ....</p>
            </div>
        </div>
    </div>


<!-------        Prestation 2        -------->

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4">
        <div class="thumbnail blocPresta">
            <img src="http://placehold.it/500x500" alt="prestation1">
            <div class="etiquette">
                <h3>Prestation 2</h3>
                <p>Lorem ipsum dolor ....</p>
            </div>
        </div>
    </div>

</div>

<!-------        Prestation 3        -------->

<div class="row row-presta">

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4">
        <div class="thumbnail blocPresta">
            <img src="http://placehold.it/500x500" alt="prestation1">
            <div class="etiquette">
                <h3>Prestation 3</h3>
                <p>Lorem ipsum dolor ....</p>
            </div>
        </div>
    </div>

<!-------        Prestation 4        -------->

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4">
        <div class="thumbnail blocPresta">
            <img src="http://placehold.it/500x500" alt="prestation1">
            <div class="etiquette">
                <h3>Prestation 4</h3>
                <p>Lorem ipsum dolor ....</p>
            </div>
        </div>
    </div>

</div>

<!-------        Prestation 5        -------->

<div class="row row-presta">

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4">
        <div class="thumbnail blocPresta">
            <img src="http://placehold.it/500x500" alt="prestation1">
            <div class="etiquette">
                <h3>Prestation 5</h3>
                <p>Lorem ipsum dolor ....</p>
            </div>
        </div>
    </div>

<!-------        Prestation 6        -------->

    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8  col-lg-offset-1 col-lg-4">
        <div class="thumbnail blocPresta">
            <img src="http://placehold.it/500x500" alt="prestation1">
            <div class="etiquette">
                <h3>Prestation 6</h3>
                <p>Lorem ipsum dolor ....</p>
            </div>
        </div>
    </div>

</div>

<!-------     Section Conseil du mois     -------->
    <div class="row Conseilbackground">
        <div class="row Conseil col-lg-8 col-lg-offset-2 col-xs-10 col-xs-offset-1">
            <div class="col-lg-3 col-lg-offset-1 ConseilTitre">
                <h4>Conseil du Jour</h4>
            </div>
            <div class="ConseilText col-lg-6 col-lg-offset-1">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
            </div>
        </div>
    </div>

<!-------       Section Livre d'or      -------->
    <div class="row col-xs-10 col-xs-offset-1 LDOR">
        <div class="row">

            <div class="LivreDor-titre">
                <h2>Livre d'Or</h2>
            </div>

        </div>

        <div class="row">
            <div id="carousel-livredor" class="carousel slide fade in" data-ride="carousel" data-interval="false">

                <div class="carousel-inner" role="listbox">

                    <div class="item col-xs-8 col-xs-offset-2 active">
                        <div class="caption">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</h3>
                            <p>Monsieur X</p>
                        </div>
                    </div>


                    <div class="item col-xs-8 col-xs-offset-2">
                        <div class="caption">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</h3>
                            <p>Madame X</p>
                        </div>
                    </div>
                </div>

                <a class="left carousel-control" href="#carousel-livredor" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-livredor" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>


<!-------     Section Formulaire     -------->
    <div class="row Contact col-xs-12">
        <img class=" ImgForm col-lg-6" src="http://placehold.it/600x470">


        <div class="col-lg-6 col-xs-12 formulaire">

            <h2>CONTACTEZ-NOUS</h2>
            <p>Tel: 06 00 00 00 00</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
            <form name="ajout-citation" method="POST" action="ajout.php">

                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input required ="required" class="form-control" type="text" id="Nom" name="Nom" />
                </div>

                <div class="form-group">
                    <label for="Prenom">Prenom</label>
                    <input required ="required" class="form-control" type="text" id="Prenom" name="Prenom"/>
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input required ="required" class="form-control" type="text" id="Email" name="Email" />
                </div>

                <div class="form-group">
                    <label for="Texte">Texte</label>
                    <textarea required ="required" class="form-control" id="Texte" name="Texte"></textarea>
                </div>

                <input class="btn btn-success" type="submit" name="add" value="Envoyer">

        </div>

    </div>

<!-------           Footer           -------->
    <div class="row footer">
        <div class="col-xs-4 vcenter">
            <a href="http://www.entreprises.gouv.fr/services-a-la-personne" target="_blanc"><img id="footer-logo-sp" src="img/service.jpg" alt="Logo Service à la personne" /></a>
        </div>
        <div class="col-xs-4 text-center">
            <img id="footer-logo-gaston" class="hidden-xs" src="img/logo-gaston.png" alt="logo Les Jardins de Gaston">
            <span class="visible-xs">Les Jardins de Gaston</span><br />
            <br />
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#infolegale">Mentions légales</button>

            <!-- modale mentions legales -->
            <div class="modal fade" id="infolegale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title" id="myModalLabel">Informations légales</h3>
                        </div>
                        <div class="modal-body infolegale">

                            <h4>Editeur</h4>
                            <p>
                                Les Jardins de Gaston - Affaire personnelle commerçant.<br />
                                Siège social : 572 rue verte, 45640 SANDILLON.<br />
                                Siret : 53067183300016.<br />
                                Inscrit au registre de la Chambre de commerce du Loiret.
                            </p>


                            <h4>Responsable de publication</h4>
                            <p>M. Fabrice GUILBON.</p>


                            <h4>Hébergement</h4>
                            <p>Ce site est hébergé chez <a href="https://www.ovh.com/fr/" target="_blanc">OVH</a>.</p>


                            <h4>Protection des données personnelles sur le site</h4>
                            <p>
                                Aucune donnée à caractère personnel n'est stockée sur ce site, qui respecte les règles suivantes :<br />
                                - 1. Pas d’information collectée à l’insu de l’internaute,<br />
                                - 2. Pas de cession à des tiers.
                                Les informations renseignées par les internautes dans le formulaire de contact ne sont utilisées que pour le
                                traitement des messages laissés par ces derniers.
                            </p>


                            <h4>Droit d'auteur - Copyright</h4>
                            <p>
                                L'ensemble de ce site relève de la législation française et internationale sur le droit d'auteur et la propriété
                                intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les documents téléchargeables et les
                                représentations iconographiques et photographiques.<br />
                                La reproduction de tout ou partie de ce site sur un support quelconque, matériel ou immatériel, quel qu'il soit est
                                formellement interdite sauf autorisation expresse du responsable de publication.
                            </p>

                            <h4>Fonctionnement</h4>
                            <p>
                                Pour toute remarque ou suggestion sur le fonctionnement du site, veuillez adresser un message via le formulaire de contact.</a>
                            </p>

                            <h4>Conception et réalisation</h4>
                            Isabelle MULIGO, Jérémie DAVIAUD, Sylvain JAN, Patrick FAUCHEUX
                            <p>
                                <a href="https://wildcodeschool.fr/orleans/" target="_blanc">
                                    <img class="legal-logo-wcs" src="img/logo-wcs-ho" alt="logo Wild Code School" />
                                </a>
                            </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin modale infos legales -->

        </div>
        <div class="col-xs-4">
            <a href="http://wildcodeschool.fr/orleans" target="_blanc">
                <div class="wcs text-right">
                    <br/><br/>Site<br/>créé par
                </div>
            </a>
        </div>
    </div>

</div> <!-- fermeture du container-fluid -->

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/beforeAfterEffect.js"></script>

</body>

</html>