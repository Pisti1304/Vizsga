<?php

include('adatbazis.php');
include('felhasznalok.php');
include('hitelesites.php');


session_start();
//
//

$hibak = [];
if (count($_POST) > 0) {
   
    $jelszo = $_POST['jelszo'];
    $email = $_POST['email'];

    
    $kapcsolat = kapcsolodas('mysql:host=localhost;dbname=vizsga');

    
    if ($felhasznalo === false) {
        $hibak[] = 'Hibás adatok!';
    }

    if (count($hibak) === 0) {
        beleptet($felhasznalo);
        header('Location: kapcsolat.html');
        exit();
    }
}
?>
