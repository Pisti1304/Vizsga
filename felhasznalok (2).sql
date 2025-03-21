-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 21. 13:07
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
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `vezeteknev` varchar(20) NOT NULL,
  `keresztnev` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `jelszo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `vezeteknev`, `keresztnev`, `email`, `jelszo`) VALUES
(1, 'Kerekes', 'István', 'istvan978@gmail.com', '$2y$10$oKgoVp6g8tWRx.YCaCXJdOXYtMzvywzmumX6zDDjP5PPFzdcJ0kxu'),
(2, 'Balazs', 'Jozan', 'jozan@gmail.com', '$2y$10$iq5nT0x3aDsIYZQvorBb2u/iQ/qnow7c30zREaHxBfs2S70/Ymqam'),
(3, 'Kerekes', 'István', 'spityhun2005@gmail.com', '$2y$10$m3XUAMngZq0PVVVFsXa8v.HAAjL2mdnuN7hE6/6A2hdL/viBc6kVW'),
(4, 'Kerekes', 'Istvan', '72573537332@szily.hu', '$2y$10$zde6kJtoKvb0WrqbzIWARuP3hkgdIv7HDN7Bejh5PGQFL6GNf.pwa'),
(5, 'Kerekes', 'István', 'spityhun2005@gmail.com', '$2y$10$3Y5oLX7iKA0Huj9oR0/ElenFXqjxjIAjgmCm/a8G71qmk7DH56iHK');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
