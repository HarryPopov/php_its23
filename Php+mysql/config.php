<?php
$kasutaja = "harry";
$dbserver = "localhost";
$andmebaas = "muusikapood";
$pw = "MySQLParool1";

$yhendus = mysqli_connect($dbserver, $kasutaja, $pw, $andmebaas);

if (!$yhendus) {
    die("Sa jälle ebaõnnestusid!");
}


?>