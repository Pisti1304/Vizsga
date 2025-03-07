-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 27. 18:33
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT/;
/!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS/;
/!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION/;
/!40101 SET NAMES utf8mb4/;

--
-- Adatbázis: vizsga
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához felhasznalok
--

CREATE TABLE felhasznalok (
  id int(11) NOT NULL,
  vezeteknev text NOT NULL,
  keresztnev text NOT NULL,
  email text NOT NULL,
  jelszo text NOT NULL,
  2fa varchar(6) DEFAULT NULL,
  2fa_lejar datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása felhasznalok
--

INSERT INTO felhasznalok (id, vezeteknev, keresztnev, email, jelszo, 2fa, 2fa_lejar) VALUES
(1, 'Kerekes', 'István', 'spityhun2005@gmail.com', '$2y$10$0R/DGSmIMa8e7y2d4QNE2uWkowyw4h6/KQbpZ1kVquN8W1RyUHH3S', '320918', '2025-02-27 18:34:24'),
(2, 'Kerekes', 'Istvan', 'spityhun2005@gmail.com', '$2y$10$ZerCcPiI7MdFc4xvo5G3Qu84mRN18KVgFeTk01r4ODOrTOHP2ldYu', NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei felhasznalok
--
ALTER TABLE felhasznalok
  ADD PRIMARY KEY (id);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához felhasznalok
--
ALTER TABLE felhasznalok
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT/;
/!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS/;
/!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION/;
phpMyAdmin
phpMyAdmin
