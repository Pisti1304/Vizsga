<?php

include('adatbazis.php');
include('felhasznalok.php');


$hibak = [];

if (count($_POST) > 0) {
    $firstname = $_POST['vezeteknev'];
    $lastname = $_POST['keresztnev'];
    $email = $_POST['email'];
    $jelszo = $_POST['jelszo'];

    $kapcsolat = kapcsolodas('mysql:host=localhost;dbname=vizsga');
   
    if (count($hibak) === 0) {
        regisztral($kapcsolat, $firstname,$lastname,$email, $jelszo);
        header('Location: index.html');
        exit();
    }
}

?>
