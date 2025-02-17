<?php

include('adatbazis.php');
include('felhasznalok.php');
include('hitelesites.php');


session_start();
//
//

$hibak = [];
if (count($_POST) > 0) {
    $firstname = $_POST['vezeteknev'];
    $lastname = $_POST['keresztnev'];
    $jelszo = $_POST['jelszo'];
    $email = $_POST['email'];
    $captcha=$_POST["captcha"];
    $confirmcaptcha=$_POST["confirmcaptcha"];
    if($captcha != $confirmcaptcha)
    {
        echo "<script> alert('Incorrect Captcha');</script>";
    }
    else
    {
        $row=mysqli_fetch_assoc(mysqli_query($conn,
        "Select * from tb_user WHERE email='$email'"));
        if(isset($row) && $jelszo == $row["jelszo"])
        {
            $_SESSION["id"]=$row["id"];
            header("Location: index.html");
        }
        else
        {
            echo "<script> alert('Jelszó, vagy email rossz');</script>";
        }
    }



    
    $kapcsolat = kapcsolodas('mysql:host=localhost;dbname=vizsga');

    $felhasznalo = ellenoriz($kapcsolat, $firstname,$lastname, $jelszo,$email);

    if ($felhasznalo === false) {
        $hibak[] = 'Hibás adatok!';
    }

    if (count($hibak) === 0) {
        beleptet($felhasznalo);
        header('Location: index.html');
        exit();
    }
}
?>
