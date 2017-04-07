<?php // --- provisoire ---
$test = [   '0' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '1' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '2' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '3' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '4' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor']
        ];
    //var_dump($test);
?>

<?php include 'header.php'; ?>
<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Messages Reçus</h1>
    </div>
</div>
<div class="row Tableau">
    <div class="col-md-offset-1 col-md-10">
        <table class="table table-bordered table-hover sortable">
            <thead>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Texte</th>
                <th>Actions</th>
            </thead>
            <tbody>
            <?php
            foreach ($test as $value) {

                echo '<tr >

                    <td >'.$value["Nom"].'</td >

                    <td >'.$value["Prenom"].'</td >

                    <td >'.$value["Email"].'</td >

                    <td >'.$value["Texte"].'</td >


                    <td ><a href = "" class="btn btn-success btn-sm" role = "button" >Sauvegarder</a >&nbsp;<a href = "" class="btn btn-danger btn-sm" role = "button" >Supprimer</a ></td >

                </tr >';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<div class="row titre">
    <div class="col-xs-12 text-center">
        <h1>Messages Enregistrés</h1>
    </div>
</div>
<div class="row Tableau-Save">
    <div class="col-md-offset-1 col-md-10">
        <table class="table table-bordered table-hover sortable">
            <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Texte</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php
            foreach ($test as $value) {

                echo '<tr >

                    <td >'.$value["Nom"].'</td >

                    <td >'.$value["Prenom"].'</td >

                    <td >'.$value["Email"].'</td >

                    <td >'.$value["Texte"].'</td >


                    <td ><a href = "" class="btn btn-danger btn-sm" role = "button" >Supprimer</a ></td >

                </tr >';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<!-- le container-fluid est ouvert dans le header.php et ferme dans le footer.php -->
<?php include 'footer.php'; ?>
