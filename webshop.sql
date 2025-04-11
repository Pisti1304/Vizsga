-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Ápr 03. 22:00
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vizsga`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `webshop`
--

CREATE TABLE `webshop` (
  `id` int(11) NOT NULL,
  `termek` varchar(20) NOT NULL,
  `suly` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `webshop`
--

INSERT INTO `webshop` (`id`, `termek`, `suly`) VALUES
(1, 'csokisfeherje', '500'),
(2, 'csokisfeherje', '1000'),
(3, 'csokisfeherje', '2000'),
(4, 'epresfeherje', '500'),
(5, 'epresfeherje', '1000'),
(6, 'epresfeherje', '2000'),
(7, 'fehercsokisfeherje', '500'),
(8, 'fehercsokisfeherje', '1000'),
(9, 'fehercsokisfeherje', '2000'),
(10, 'kreatin', '500'),
(11, 'kreatin', '1000'),
(12, 'kreatin', '2000'),
(13, 'aminosav', '500'),
(14, 'aminosav', '1000'),
(15, 'aminosav', '2000'),


--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `webshop`
--
ALTER TABLE `webshop`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `webshop`
--
ALTER TABLE `webshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
