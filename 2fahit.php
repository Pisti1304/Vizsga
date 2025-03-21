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
