<?php

// kapcsolódás

function kapcsolodas($kapcsolati_szoveg) {
  $user='root';
  $pass='';
  $pdo = new PDO($kapcsolati_szoveg, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}
//lekérdezés

function lekerdezes($kapcsolat, $sql, $parameterek = []) {
  $stmt = $kapcsolat->prepare($sql);
  $stmt->execute($parameterek);
  return $stmt->fetchAll();
}
//végrehajtás

function vegrehajtas($kapcsolat, $sql, $parameterek = []) {
  return $kapcsolat
    ->prepare($sql)
    ->execute($parameterek);
}
?>