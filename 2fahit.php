<?php
session_start();

include 'adatbazis.php';
if (!isset($_SESSION['temp_user'])) {
    header("Location: index.html");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $felhasznalo_2fa = $_POST['2fa'];
    $mentet_2fa = $_SESSION['temp_user']['2fa'];
    $felhasznalo_id = $_SESSION['temp_user']['id'];

    $sql = "SELECT * FROM felhasznalok WHERE id='$felhasznalo_id' AND 2fa='$felhasznalo_2fa'";
    $kapcsolat = kapcsolodas("mysql:host=localhost;dbname=vizsga;charset=utf8");

    if ($data) {
        $fa_lejar = strtotime($data['2fa_lejar']);
        if ($fa_lejar >= time()) {
            $_SESSION['user_id'] = $data['id'];
            unset($_SESSION['temp_user']);
            header("Location: index.html");
            exit();
        } 
    }
    else{
        echo "Hibás hitelesités kód!";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="ketlepcsos">
        <h1>Két lépcsős Bejelentkezés</h1>
        <p>Gépeld be a 6 jegyű kodót amit emailban kaptál! <br> email címed: <?php echo $_SESSION['email']; ?></p>
        <form method="post" action="2fahit.php">
            <label class="asd" for="fa">Üsd be a Két lépcsős kódót:</label><br>
            <input type="number"  name="otp" pattern="\d{6}" placeholder="6 jegyű kód" class="hatjkod" required><br><br>
            <button type="submit" class="fa_ell">Kód ellenőrzés</button>
        </form>
    </div>
</body>
</html>