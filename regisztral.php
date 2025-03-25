<?php
include('adatbazis.php');
$kapcsolat = kapcsolodas('mysql:host=localhost;dbname=vizsga;charset=utf8');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_check'])) {
    $email = $_POST['email'];

    
    $sql = "SELECT id FROM felhasznalok WHERE email = :email";
    $stmt = $kapcsolat->prepare($sql);
    $stmt->execute([':email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "Ez az e-mail cím már regisztrálva van!";

    } 
    exit(); 
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vezeteknev'], $_POST['keresztnev'], $_POST['email'], $_POST['jelszo'])) {
    $firstname = $_POST['vezeteknev'];
    $lastname = $_POST['keresztnev'];
    $email = $_POST['email'];
    $jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT); 

    
    $sql = "SELECT id FROM felhasznalok WHERE email = :email";
    $stmt = $kapcsolat->prepare($sql);
    $stmt->execute([':email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "Ez az e-mail cím már létezik!";
        header("Location: regisztracio.html");
        exit();
    } else {
        
        $sql = "INSERT INTO felhasznalok (vezeteknev, keresztnev, email, jelszo) VALUES (:vezeteknev, :keresztnev, :email, :jelszo)";
        $stmt = $kapcsolat->prepare($sql);
        $stmt->execute([
            ':vezeteknev' => $firstname,
            ':keresztnev' => $lastname,
            ':email' => $email,
            ':jelszo' => $jelszo
        ]);

        echo "Sikeres regisztráció!";
    }
}
?>