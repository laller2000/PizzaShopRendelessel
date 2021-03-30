-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Dec 09. 17:17
-- Kiszolgáló verziója: 10.1.36-MariaDB
-- PHP verzió: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `pizzashop`
--
CREATE DATABASE IF NOT EXISTS `pizzashop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pizzashop`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasz`
--

CREATE TABLE `felhasz` (
  `ID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `szolgaltato` int(4) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `felhasz`
--

INSERT INTO `felhasz` (`ID`, `username`, `szolgaltato`, `phone`, `email`, `password`) VALUES
(11, 'imre', 620, 1233, 'ujsd@gmail.com', 'cb81be0e3fe7f9328bed66b15ef7119e'),
(15, 'ferike', 630, 121212, 'sdf@freemail.hu', 'cb81be0e3fe7f9328bed66b15ef7119e'),
(17, 'test', 1111, 123456789, 'test@test.hu', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `italok`
--

CREATE TABLE `italok` (
  `ID` int(11) NOT NULL,
  `nev` varchar(20) NOT NULL,
  `ar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `italok`
--

INSERT INTO `italok` (`ID`, `nev`, `ar`) VALUES
(1, 'Coca Cola', 220),
(2, 'Dreher Bak', 300);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendeles`
--

CREATE TABLE `megrendeles` (
  `ID` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `felhasz_ID` int(11) NOT NULL,
  `pizza_ID` int(11) DEFAULT NULL,
  `ital_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pizza`
--

CREATE TABLE `pizza` (
  `ID` int(11) NOT NULL,
  `nev` varchar(20) NOT NULL,
  `ar` int(10) NOT NULL,
  `sajt` enum('igen','nem') NOT NULL DEFAULT 'nem',
  `szosz` enum('igen','nem') NOT NULL DEFAULT 'nem',
  `kep` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `pizza`
--

INSERT INTO `pizza` (`ID`, `nev`, `ar`, `sajt`, `szosz`, `kep`) VALUES
(15, 'hagymas', 1200, 'nem', 'nem', '0.jpg'),
(16, 'szalamis', 1300, 'nem', 'nem', '1.jpg'),
(17, 'zoldseges', 1100, 'nem', 'nem', '2.jpg'),
(18, 'sajtos', 1000, 'nem', 'nem', '3.jpg'),
(19, 'kolbaszos', 1200, 'nem', 'nem', '4.jpg'),
(20, 'kukoricas', 1200, 'nem', 'nem', '5.jpg'),
(21, 'paradicsomos', 1200, 'nem', 'nem', '6.jpg'),
(22, 'baconos', 1500, 'nem', 'nem', '7.jpg'),
(23, 'magyaros', 1400, 'nem', 'nem', '8.jpg'),
(24, 'gombas', 1300, 'nem', 'nem', '9.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasz`
--
ALTER TABLE `felhasz`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `italok`
--
ALTER TABLE `italok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `megrendeles`
--
ALTER TABLE `megrendeles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `felhasz_ID` (`felhasz_ID`),
  ADD KEY `pizza_ID` (`pizza_ID`),
  ADD KEY `ital_ID` (`ital_ID`);

--
-- A tábla indexei `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasz`
--
ALTER TABLE `felhasz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `italok`
--
ALTER TABLE `italok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pizza`
--
ALTER TABLE `pizza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  ADD CONSTRAINT `megrendeles_ibfk_1` FOREIGN KEY (`felhasz_ID`) REFERENCES `felhasz` (`ID`),
  ADD CONSTRAINT `megrendeles_ibfk_2` FOREIGN KEY (`ital_ID`) REFERENCES `italok` (`ID`),
  ADD CONSTRAINT `megrendeles_ibfk_3` FOREIGN KEY (`pizza_ID`) REFERENCES `pizza` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
