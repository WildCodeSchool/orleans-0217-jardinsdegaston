<?php // --- provisoire ---
$test = [   '0' =>
                    [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '1' =>
                [   'Nom' => 'Mme.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '2' =>
                [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '3' =>
                [   'Nom' => 'Mme.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '4' =>
                [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '5' =>
                [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor']
];

?>

<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Gestion du livre d'or</h1>
    </div>
</div>

<div class="row FormLdor col-xs-12">

    <div class="col-lg-8 col-lg-offset-2 form">
        <form name="ajout-Ldor" method="POST" action="ajout.php">

            <div class="form-group">
                <label for="Nom">Nom</label>
                <input required ="required" class="form-control" type="text" id="Nom" name="Nom" />
            </div>

            <div class="form-group">
                <label for="Texte">Texte</label>
                <textarea required ="required" class="form-control" id="Texte" name="Texte"></textarea>
            </div>

            <input class="btn btn-success" type="submit" name="add" value="Envoyer">

    </div>

</div>

<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Afficher les commentaires du Livre d'Or</h1>
    </div>
</div>

<div class="row ThumbLdor">
    <div class="col-lg-10 col-lg-offset-2">
        <?php
        foreach ($test as $value) {

            echo '<div class="col-lg-4 thumbnail text-center">
            <h3>' . $value['Nom'] . '</h3>
            <p>' . $value['Texte'] . '</p>
            <a href = "" class="btn btn-warning btn-sm" role = "button" >Modifier</a > <a href = "" class="btn btn-danger btn-sm" role = "button" >Supprimer</a>
        </div>';
        }
        ?>
    </div>

</div>





<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
