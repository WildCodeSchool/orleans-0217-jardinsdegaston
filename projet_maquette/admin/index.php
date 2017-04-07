
<?php // --- provisoire ---
    $saisons = ['Printemps', 'Eté','Automne', 'Hiver'];
    $nbimages = 7;
?>


<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row">

    <div class="col-xs-12 text-center titre">
        <h1>Gestion des images de fond</h1>
    </div>


    <!-- Image principale ------------------------------------------ -->

    <div class="col-xs-12 bandeau text-center">
<!--        Image principale - sélection actuelle-->
        Image d'accueil
    </div>

    <?php
        foreach ( $saisons as $saison ) {
            echo '
                <div class="col-md-3 col-sm-6 col-xs-12 contenu text-center">
                    <img class="gimg" src="../img/bgimg1'.strtolower($saison[0]).'.jpg"><br />
                    '.$saison.'
                </div>
            ';
        }
    ?>


    <!-- Image secondaire ------------------------------------------ -->

<!--    <div class="col-xs-12 bandeau text-center">-->
<!--        Image secondaire - sélection actuelle-->
<!--    </div>-->
<!---->
<!--    --><?php
//        foreach ( $saisons as $saison ) {
//            echo '
//                <div class="col-md-3 col-sm-6 col-xs-12 contenu text-center">
//                    <img class="img-fluid gimg" src="../img/bgimg2'.strtolower($saison[0]).'.jpg"><br />
//                    '.$saison.'
//                </div>
//            ';
//        }
//    ?>


    <!-- Galerie ------------------------------------------------ -->

<!--    <div class="col-xs-12 bandeau text-center">-->
<!--        Gérer la galerie-->
<!--    </div>-->
<!--    --><?php
//        for ( $i=0; $i<$nbimages; $i++ ) {
//            echo '
//                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-center">
//                    <div class="blocimg">
//                        <img class="img-fluid pimg" src="../img/noimg.png"><br />
//                        Saison<br />
//                        <form method="post" action="modifimg.php" enctype="multipart/form-data">
//                            <input type="hidden" name="id" value="#" />
//                            <input class="btn btn-default" type="submit" name="bgimg1" value="Placer en image principale" /><br />
//                            <input class="btn btn-default" type="submit" name="bgimg2" value="Placer en image secondaire" /><br />
//                            <input class="btn btn-default" type="submit" name="supprime" value="Supprimer de la galerie" />
//                        </form>
//                    </div>
//                </div>
//            ';
//        }
//    ?>


    <!-- upload image ------------------------------------------ -->

    <div class="col-xs-12 bandeau text-center">
<!--        Charger une nouvelle image-->
        Remplacer une image
    </div>
    <div class="col-xs-12">
        <div class="row contenu">
            <div class="col-xs-12 col-md-6 col-lg-4 col-lg-offset-2 text-center">
                <img class="img-fluid pimg bloc-right" src="../projet%20maquette/img/noimg.png" alt="" />
                <br />
                <form method="post" action="modifimg.php" enctype="multipart/form-data">
                    <input type="hidden" name="source" value="fond_ecran" />
                    <input class="cache" type="file" name="fichier" id="fichier" />
                    <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                </form>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <br />
                <form method="post" action="majbg"><br /><br />
                    <label for="saison">Saison associée :</label><br />
                    <?php
                    foreach ( $saisons as $saison ) {
                        if ( $saison != 'Printemps' ) {
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        echo '<input type="radio" name="saison" id="saison'.strtolower($saison[0]).'" value="'.strtolower($saison[0]).'"';
                        if ( $saison == 'Printemps' ) echo ' checked';
                        echo ' />&nbsp;'.$saison;
                    }
                    ?>
                    <br /><br /><br />
<!--                    <input class="btn btn-default" type="submit" name="bgimg1" value="Placer en image principale" /><br />-->
<!--                    <input class="btn btn-default" type="submit" name="bgimg2" value="Placer en image secondaire" /><br />-->
<!--                    <input class="btn btn-default" type="submit" name="galerie" value="Ajouter à la galerie" />-->
                    <input class="btn btn-default" type="submit" name="galerie" value="Remplacer l'image" />
                </form>
            </div>
        </div>
    </div>



</div> <!-- fermeture de la row principale -->


<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
