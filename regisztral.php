<?php


include('felhasznalok.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vizsga";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

$hibak = [];

if (count($_POST) > 0) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $jelszo = $_POST['jelszo'];
    $email = $_POST['email'];

    $kapcsolat = kapcsolodas('mysql:host=localhost;dbname=vizsga');
   

    

    if (count($hibak) === 0) {
        regisztral($kapcsolat, $fistname,$lastname, $jelszo,$email);
        header('Location: index.html');
        exit();
    }
}

?>