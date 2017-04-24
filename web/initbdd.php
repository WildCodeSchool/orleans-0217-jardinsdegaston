<?php
// --- web/initbdd.php ---

// --- initialisation des acces a la base de donnees
require $fileRoot.'src/model/connect.php';
$bdd = new \PDO(DSN, USER, PASS);
$bdd->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
$bdd->exec("set names utf8");
