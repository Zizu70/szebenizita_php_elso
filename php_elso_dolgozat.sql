-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 05. 08:22
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_elso_dolgozat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `allatok`
--

CREATE TABLE `allatok` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `kind_of` varchar(30) NOT NULL,
  `gender` enum('male','famale','neutered') NOT NULL,
  `born` date NOT NULL,
  `age` int(10) NOT NULL,
  `meat_eating` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `allatok`
--

INSERT INTO `allatok` (`id`, `name`, `kind_of`, `gender`, `born`, `age`, `meat_eating`) VALUES
(1, 'Kockás', 'dog', 'famale', '2007-02-22', 16, 'yes'),
(3, 'Picike', 'parrot', 'male', '2017-04-01', 6, 'no'),
(4, 'Gülszi', 'chameleon', 'male', '2020-01-03', 4, 'yes'),
(5, 'Mau', 'cat', 'neutered', '2017-05-01', 7, 'yes'),
(8, 'Zsizsi', 'goat', 'famale', '2020-04-10', 3, 'no'),
(32, 'Holló', 'hen', 'male', '2023-08-11', 1, 'no'),
(35, 'Zsurló', 'pig', 'male', '2023-11-01', 0, 'no'),
(41, 'Altaire', 'horse', 'male', '2010-01-01', 13, 'no'),
(42, 'Rigel', 'cow', 'male', '2010-01-01', 13, 'no'),
(43, 'Alaise', 'donky', 'famale', '2020-01-01', 3, 'no'),
(58, 'Sóska', 'sheep', 'famale', '2022-02-02', 2, 'no'),
(59, 'Capri ', 'rabbit', 'male', '2022-01-01', 2, 'no'),
(70, 'Harry', 'hamster', 'male', '2020-01-01', 4, 'yes');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `allatok`
--
ALTER TABLE `allatok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `allatok`
--
ALTER TABLE `allatok`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
