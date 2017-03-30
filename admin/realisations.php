
<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row">
    <div class="row titre">
        <div class="col-xs-12 text-center">
            <h1>Gestion des plus belles réalisations</h1>
        </div>
    </div>


    <!-- Premier bloc Avant/Après ----------------------------------- -->

    <div class="col-xs-12 bandeau text-center">
        Premier bloc
    </div>

    <div class="col-xs-12">
        <div class="row contenu">
            <div class="col-xs-12 col-md-4 text-center">
                <h3>Avant</h3>
                <img class="gimg" src="../img/test_img_1_rsz.jpg">
                <form method="post" action="modifimg.php" enctype="multipart/form-data">
                    <input type="hidden" name="source" value="avant1" />
                    <input class="cache" type="file" name="fichier" id="fichier" />
                    <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                </form>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <h3>Après</h3>
                <img class="gimg" src="../img/test_img_2.jpg">
                <form method="post" action="modifimg.php" enctype="multipart/form-data">
                    <input type="hidden" name="source" value="apres1" />
                    <input class="cache" type="file" name="fichier" id="fichier" />
                    <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                </form>
            </div>
            <div class="col-sm-12 col-md-4 ">
                <div class="hidden-xs hidden-sm"><br /><br /></div>
                <form method="post" action="majavap.php">
                    <label for="titre">Titre de la rubrique </label><br />
                    <input class="form-control" type="text" name="titre" id="titre" value="Titre" /><br />
                    <label for="detail">Commentaires</label><br />
                    <textarea class="form-control" row="3" name="detail">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    </textarea><br />
                    <input class="btn btn-default" type="submit" name="valide" value="Enregistrer les modifications" />
                </form>
            </div>
        </div>
    </div>


    <!-- Second bloc Avant/Après ------------------------------------ -->

    <div class="col-xs-12 bandeau text-center">
        Second bloc
    </div>

    <div class="col-xs-12">
        <div class="row contenu">
            <div class="col-xs-12 col-md-4 text-center">
                <h3>Avant</h3>
                <img class="gimg" src="../img/test2_avant.jpg">
                <form method="post" action="modifimg.php" enctype="multipart/form-data">
                    <input type="hidden" name="source" value="avant2" />
                    <input class="cache" type="file" name="fichier" id="fichier" />
                    <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                </form>
            </div>
            <div class="col-xs-12 col-md-4 text-center">
                <h3>Après</h3>
                <img class="gimg" src="../img/test2_apres.jpg">
                <form method="post" action="modifimg.php" enctype="multipart/form-data">
                    <input type="hidden" name="source" value="apres2" />
                    <input class="cache" type="file" name="fichier" id="fichier" />
                    <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                </form>
            </div>
            <div class="col-sm-12 col-md-4 ">
                <div class="hidden-xs hidden-sm"><br /><br /></div>
                <form method="post" action="majavap.php">
                    <label for="titre">Titre de la rubrique </label><br />
                    <input class="form-control" type="text" name="titre" id="titre" value="Titre" /><br />
                    <label for="detail">Commentaires</label><br />
                    <textarea class="form-control" row="3" name="detail">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    </textarea><br />
                    <input class="btn btn-default" type="submit" name="valide" value="Enregistrer les modifications" />
                </form>
            </div>
        </div>
    </div>


    <!-- Galerie --------------------------------------------------- -->

    <div class="col-xs-12 bandeau text-center">
        Galerie Avant/Après
    </div>

    <?php
    ?>

</div> <!-- fermeture de la row principale -->






<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
