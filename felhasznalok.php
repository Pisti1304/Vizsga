<?php


//insertálás
function regisztral($kapcsolat, $firstname,$lastname, $jelszo,$email) {
    $db = vegrehajtas($kapcsolat,
        'insert into felhasznalok (vezeteknev,keresztnev, email ,jelszo)
            values (:vezeteknev,:keresztnev,:email, :jelszo)',
        [
            ':vezeteknev'   => $firstname,
            ':keresztnev'   => $lastname,
            ':jelszo'           => password_hash($jelszo, PASSWORD_DEFAULT),
            ':email'   => $email,
        ]
    );
    return $db === 1;
}
?>
