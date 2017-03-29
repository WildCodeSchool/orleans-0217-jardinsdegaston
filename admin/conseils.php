<?php // --- provisoire ---
$test = [   '0' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '1' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '2' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '3' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '4' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '5' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '6' =>
                ['Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor']

];

$saisons = ['Printemps', 'Eté','Automne', 'Hiver'];

?>

<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Gestion des conseils</h1>
    </div>
</div>

<div class="row FormConseil col-xs-12">

    <div class="col-lg-8 col-lg-offset-2 form">
        <form name="ajout-Conseil" method="POST" action="ajout.php">

            <div class="form-group">
                <label for="Texte">Texte</label>
                <textarea required ="required" class="form-control" id="TexteConseil" name="Texte"></textarea>
                <label for="saison">Saison associée :</label>
                <?php
                foreach ( $saisons as $saison ) {
                    echo '&nbsp;&nbsp;&nbsp;<input type="checkbox" name="saison" id="saison'.strtolower($saison[0]).'" value="'.strtolower($saison[0]).'"';
                    if ( $saison == 'Printemps' ) echo ' checked';
                    echo ' />&nbsp;'.$saison;
                }
                ?>
            </div>

            <input class="btn btn-success" type="submit" name="add" value="Envoyer">

    </div>

</div>

<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Liste des Conseils</h1>
    </div>
</div>

<div class="row ThumbConseil">
    <div class="col-lg-10 col-lg-offset-2">
        <?php
        foreach ($test as $value) {

            echo '<div class="col-lg-3 thumbnail text-center">
            <p>' . $value['Texte'] . '</p>
            <p>Saisons: Printemps, Automne</p>
            <a href = "" class="btn btn-warning btn-sm" role = "button" >Modifier</a > <a href = "" class="btn btn-danger btn-sm" role = "button" >Supprimer</a>
        </div>';
        }
        ?>
    </div>

</div>

<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
