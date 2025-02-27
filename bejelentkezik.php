<?php
include('adatbazis.php');
include('felhasznalok.php');
include('hitelesites.php');

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$hibak = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $jelszo = $_POST['jelszo'];
    $_SESSION['email'] = $email;

  
    $kapcsolat = kapcsolodas("mysql:host=localhost;dbname=vizsga;charset=utf8");

    
    $sql = "SELECT * FROM felhasznalok WHERE email = ?";
    $felhasznalok = lekerdezes($kapcsolat, $sql, [$email]);

    if (!$felhasznalok) {
        $hibak[] = 'Hibás email vagy jelszó!';
    } else {
        $felhasznalo = $felhasznalok[0]; 

        
        if (password_verify($jelszo, $felhasznalo['jelszo'])) {
            
            $fa = rand(100000, 999999);
            $fa_lejar = date("Y-m-d H:i:s", strtotime("+3 minutes"));

            
            $sql1 = "UPDATE felhasznalok SET `2fa` = ?, `2fa_lejar` = ? WHERE id = ?";
            vegrehajtas($kapcsolat, $sql1, [$fa, $fa_lejar, $felhasznalo['id']]);

            
            $targy = "2FA kód Bejelentkezéshez";
            $uzenet = "2FA Kódod: $fa";

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = '72573537332@szily.hu'; 
                $mail->Password = 'lgcmghiuptfvfdtt'; 
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('no-reply@gmail.com', '2FA Biztonsági kód');
                $mail->addAddress($email);
                $mail->Subject = $targy;
                $mail->Body = $uzenet;
                $mail->send();
            } catch (Exception $e) {
                $hibak[] = "Email küldési hiba: " . $mail->ErrorInfo;
            }

            
            $_SESSION['temp_user'] = ['id' => $felhasznalo['id'], '2fa' => $fa];

            
            header('Location: 2fahit.php');
            exit();
        } else {
            $hibak[] = 'Hibás email vagy jelszó!';
        }
    }
}



?>
