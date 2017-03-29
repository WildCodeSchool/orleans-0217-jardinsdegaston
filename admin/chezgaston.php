
<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Et pendant ce temps-là, chez Gaston ...</h1>
    </div>
</div>

<div class="row FormBlog col-xs-12">

    <div class="col-lg-8 col-lg-offset-2 form">
        <form name="ajout-blog" method="POST" action="ajout.php">

            <div class="form-group">
                <label for="Nom">Titre</label>
                <input required ="required" class="form-control" type="text" id="Nom" name="Nom" />
            </div>

            <div class="form-group">
                <label for="Nom">Date</label>
                <input required ="required" class="form-control" type="text" id="Nom" name="Nom" value="<?php echo date('d-m-Y'); ?>"/>
            </div>

            <div class="form-group">
                <label for="Texte">Texte</label>
                <textarea required ="required" class="form-control" id="Texte" name="Texte"></textarea>
            </div>

            <label for="fichier" class="btn btn-default">Choisir une image</label>
            <input class="cache" type="file" name="fichier" id="fichier" />

            <input class="btn btn-success" type="submit" name="add" value="Envoyer">

    </div>

</div>


<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
