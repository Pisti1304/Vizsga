<?php
ini_set('display_errors', 1); // Hibák megjelenítése
error_reporting(E_ALL);
session_start();
include 'adatbazis.php';

if (!isset($_SESSION['temp_user'])) {
    header("Location: index.html");
    exit();
}

$kapcsolati_szoveg = "mysql:host=localhost;dbname=vizsga;charset=utf8"; 
$conn = kapcsolodas($kapcsolati_szoveg);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $felhasznalo_2fa = trim($_POST['otp']); 
    $felhasznalo_id = $_SESSION['temp_user']['felhasznalo_id'];

    
    $sql = "SELECT * FROM fa_info WHERE felhasznalo_id = :id AND `2fa` = :otp";
    $parameterek = [':id' => $felhasznalo_id, ':otp' => $felhasznalo_2fa];

   
    $data = lekerdezes($conn, $sql, $parameterek);

    if ($data) {
        
        $fa_lejar = strtotime($data[0]['2fa_lejar']); 

        if ($fa_lejar >= time()) {
            
            $_SESSION['user_id'] = $data[0]['felhasznalo_id']; 
            unset($_SESSION['temp_user']); 
            header("Location: index.html"); 
            exit();
        } else {
            
            echo "A 2FA kód lejárt!";
        }
    } else {
        echo "Hibás kód vagy nem található!";
    }
}
?>
<<<<<<< HEAD
=======

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kétlépcsős Bejelentkezés</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <div id="ketlepcsos">
        <h1 id="ketlepcso_szoveg1">Kétlépcsős Bejelentkezés</h1>
        <p id="ketlepcso_szoveg2">Gépeld be a 6 jegyű kódot, amit emailben kaptál! <br> 
        Email címed: <?php echo ($_SESSION['email']); ?></p>
        <form method="post" action="2fahit.php">
            <label class="ketlepcso_label" for="otp">Üsd be a kétlépcsős kódot:</label><br>
            <input type="number" name="otp" pattern="\d{6}" placeholder="6 jegyű kód" class="hatjegyukod" required><br><br>
            <button type="submit" class="ketfaktor_gomb">Kód ellenőrzés</button>
        </form>
    </div>
</body>
</html>
>>>>>>> 77484f0d15218b146d4d070e6356cc2865bd963a
