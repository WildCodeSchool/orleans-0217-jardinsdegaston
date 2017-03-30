<?php
/**
 * Created by PhpStorm.
 * User: wilder3
 * Date: 27/03/17
 * Time: 16:28
 */
 ?>

<!DOCTYPEhtml>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Et pendant ce temps-là chez Gaston</title>
    <link rel="icon" type="image/png" href="img/herbes_picto_xtraSmallvert.png" sizes="32x32" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog_stylesheet.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chicle" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Clicker+Script|Lato|Raleway" rel="stylesheet">
</head>
<body id="top">
<!-----      Navigation   ------->

<nav class="navbar navbar-inverse" id="navbarColor">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <!-- navbar-collapse navigation -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <a href="#top"><img class="logo" src="img/logo_blanc.png"></a>
            <ul class="nav navbar-nav navbar-right">
                <li><form class="search-form" role="search">
                        <div class="form-group waves-light">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form></li>
                <li><a href="blog.php#top">Retour en haut</a></li>
                <li><a href="index.php#top">Revenir sur le site</a></li>
            </ul>
            <ul>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!--<!-- SideNav slide-out button -->
<!--<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>-->
<!--<!--/. SideNav slide-out button -->
<!---->
<!--<!-- Sidebar navigation -->
<!--<div id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar">-->
<!--    <!-- Logo -->
<!---->
<!--        <div class="logo-wrapper waves-light">-->
<!--            <a href="index.php#top"><img src="img/logo_blanc_test.png" class="img-fluid flex-center"></a>-->
<!--        </div>-->
<!---->
<!--    <!--/. Logo -->
<!---->
<!--    <!--Search Form-->
<!---->
<!--        <form class="search-form" role="search">-->
<!--            <div class="form-group waves-light">-->
<!--                <input type="text" class="form-control" placeholder="Search">-->
<!--            </div>-->
<!--        </form>-->
<!---->
<!--    <!--/.Search Form-->
<!---->
<!--    <!-- Side navigation links -->
<!--    <div class="btnNav">-->
<!--        <div>-->
<!--            <a href="blog.php#top">Retour en haut</a>-->
<!--        </div>-->
<!--        <div>-->
<!--            <a href="index.php#top">Revenir sur le site</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <!--/. Side navigation links -->
<!--    <div class="sidenav-bg mask-strong"></div>-->
<!--</div>-->


</header>


<!---    Timeline   --->

<div class="container">
    <header class="page-header">
        <h1>L'évolution du jardin de Gaston</h1>
    </header>

    <ul class="timeline">
        <li><div class="tldate">Mars 2017</div></li>

        <li>
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 24 mars 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x400" alt="post 1" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>

        <li class="timeline-inverted">
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 12 mars 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x400" alt="post 2" class="imgPost img-responsive"/></p>
                    <p>Lorem Ipsum and such.</p>
                </div>
            </div>
        </li>

        <li><div class="tldate">Février 2017</div></li>

        <li>
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 27 février 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x400" alt="post 3" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 22 février 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such. <a href="http://lorempixel.com/">lorem ipsum</a>.</p>

                    <p><img src="http://placehold.it/600x400" alt="post 1" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>
        <li>
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 16 février 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x300" alt="post 4" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-panel noarrow">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 2 février 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x300" alt="post 5" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>

        <li><div class="tldate">Janvier 2017</div></li>

        <li class="timeline-inverted">
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 janvier 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x300" alt="post 6" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>
        <li>
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <h4>Titre</h4>
                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 4 janvier 2017</small></p>
                </div>
                <div class="tl-body">
                    <p>Lorem Ipsum and such.</p>
                    <p><img src="http://placehold.it/600x400" alt="post 7" class="imgPost img-responsive"/></p>
                </div>
            </div>
        </li>
    </ul>
</div>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/beforeAfterEffect.js"></script>

</body>

</html>
