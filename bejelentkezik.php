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
if (count($_POST) > 0) {
   
    $jelszo = $_POST['jelszo'];
    $email = $_POST['email'];
    $_SESSION['email']=$email;
    $sql = "SELECT * FROM felhasznalok WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);

    
    $kapcsolat = kapcsolodas('mysql:host=localhost;dbname=vizsga');

    
    if ($felhasznalo === false) {
        $hibak[] = 'Hibás adatok!';
    }

    if (count($hibak) === 0) {
        if ($data && password_verify($password, $data['password'])) {
            $otp = rand(100000, 999999);
            $otp_expiry = date("Y-m-d H:i:s", strtotime("+3 minute"));
            $subject= "2FA kód Bejelentkezéshez";
            $message="2FA Kódod: $otp";
    
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '72573537332@szily.hu'; 
            $mail->Password = 'lgcmghiuptfvfdtt'; 
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom('no-reply@gmail.com', 'Online Examination System');
            $mail->addAddress($email); 
            $mail->Subject = ("$subject");
            $mail->Body = $message;
            $mail->send();
    
            
            $query1 = mysqli_query($conn, $sql1);
    
            beleptet($felhasznalo);
            header('Location: kapcsolat.html');
            exit();
    }
}

}

?>
