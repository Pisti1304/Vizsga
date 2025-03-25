<?php
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

    if (empty($felhasznalo_id)) {
        if (isset($_SESSION['email'])) {
            $sql = "SELECT id FROM felhasznalok WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':email' => $_SESSION['email']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $_SESSION['temp_user']['felhasznalo_id'] = $result['id'];
                $felhasznalo_id = $result['id'];
        } 
    } 
}
    $sql = "SELECT *
    FROM felhasznalok f
    INNER JOIN fa_info fa ON f.id = fa.felhasznalo_id
    WHERE f.id = :id AND fa.2fa = :otp";
    
    
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