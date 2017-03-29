
<?php // --- provisoire ---
$prestations = [
        ['titre' => 'Entretien des pelouses', 'detail' => 'Tonte, émoussage, scarification, regarnissage, ...', 'img' => 'tondeusersz.jpg'],
        ['titre' => 'Taille de haies', 'detail' => 'Taille des haies, arbustes, arbres fruitiers, ...', 'img' => 'haiersz.jpg'],
        ['titre' => 'Entretien des massifs', 'detail' => 'Entretien des massifs, désherbage, paillage, ...', 'img' => 'entretien_massifrsz.jpg'],
        ['titre' => 'Potager', 'detail' => 'Mise en place et entretien de potagers, ...', 'img' => 'potagerrsz.jpg'],
        ['titre' => 'Evacuation des déchets végétaux', 'detail' => 'Evacuation des déchets végétaux, ...', 'img' => 'evacuationrsz.jpg'],
        ['titre' => 'Entretien des extérieurs', 'detail' => 'Déneigement, peinture, lasure, nettoyage haute pression, ...', 'img' => 'entretien_exterieurrsz.jpg'],
]
?>

<!-- fichier admin/prestations.php --- gère les contenus des prestations -------- -->

<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Gestion des prestations</h1>
    </div>
</div>


<!-- liste des prestations enregistrées ----------------------------------------- -->
<div class="row">
    <?php
        foreach ( $prestations as $prestation ) {
            echo '
                <div class="col-xs-12 bandeau text-center">
                    Prestation : '.$prestation['titre'].'
                </div>
                <div class="col-xs-12">
                    <div class="row contenu">
                        <div class="col-xs-12 col-md-6 text-center">
                            <img class="img-fluid pimg bloc-right" src="../img/'.$prestation['img'].'" alt="Image prestation '.$prestation['titre'].'" />
                            <br />
                            <form method="post" action="modifimg.php" enctype="multipart/form-data">
                                <input class="cache" type="file" name="fichier" id="fichier" />
                                <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                            </form>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <form method="post" action="majpresta">
                                <label for="titre">Titre de la prestation </label><br />
                                <input class="form-control" type="text" name="titre" id="titre" value="'.$prestation['titre'].'" /><br />
                                <label for="detail">Détails de la prestation</label><br />
                                <textarea class="form-control" row="3" name="detail">'.$prestation['detail'].'</textarea><br />
                                <input class="btn btn-default" type="submit" name="valide" value="Enregistrer les modifications" />
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="btn btn-default" type="submit" name="supprime" value="Supprimer la prestations" />
                            </form>
                            <br />
                            Ordre d\'affichage & nbsp;&nbsp;&nbsp;
                            <a href = "#" class="btn btn-default btn-xs" > Monter</a >&nbsp;&nbsp;&nbsp;
                            <a href = "#" class="btn btn-default btn-xs" > Descendre</a >
                        </div>
                    </div>
                </div>
            ';
        }
    ?>


<!-- Créer une nouvelle prestation ----------------------------------------------------------- -->

    <div class="col-xs-12 bandeau text-center">
        Ajouter une prestation
    </div>
    <div class="col-xs-12">
        <div class="row contenu">
            <div class="col-xs-12 col-md-6 text-center">
                <img class="img-fluid pimg bloc-right" src="../img/noimg.png" alt="" />
                <br />
                <form method="post" action="modifimg.php" enctype="multipart/form-data">
                    <input class="cache" type="file" name="fichier" id="fichier" />
                    <label for="fichier" class="btn btn-default">Nouvelle image</label><br />
                </form>
            </div>
            <div class="col-xs-12 col-md-6">
                <form method="post" action="majpresta">
                    <label for="titre">Titre de la prestation </label><br />
                    <input class="form-control" type="text" name="titre" id="titre" value="" /><br />
                    <label for="detail">Détails de la prestation</label><br />
                    <textarea class="form-control" row="3" name="detail"></textarea><br />
                    <input class="btn btn-default" type="submit" name="valide" value="Ajouter" />
                </form>
            </div>
        </div>
    </div>

</div> <!-- fermeture de la row principale -->

<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
