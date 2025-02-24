<?php


//insertálás
function regisztral($kapcsolat, $firstname,$lastname, $email,$jelszo) {
    $db = vegrehajtas($kapcsolat,
        'insert into felhasznalok (vezeteknev,keresztnev, email ,jelszo)
            values (:vezeteknev,:keresztnev,:email, :jelszo)',
        [
            ':vezeteknev'   => $firstname,
            ':keresztnev'   => $lastname,
            ':email'   => $email,
            ':jelszo'  => password_hash($jelszo, PASSWORD_DEFAULT),
            
        ]
    );
    return $db === 1;
}

?>
