-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mei 2022 om 10:15
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerlingen`
--

CREATE TABLE `leerlingen` (
  `id` int(5) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `klas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `leerlingen`
--

INSERT INTO `leerlingen` (`id`, `naam`, `klas`) VALUES
(1, 'Sophie de Vies', 'T2K'),
(2, 'Achmed Akkabi', 'T2K'),
(3, 'Sjoerd Binnendijk', 'T2J');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toets`
--

CREATE TABLE `toets` (
  `id` int(11) NOT NULL,
  `vak` varchar(50) NOT NULL,
  `cijfer` int(5) NOT NULL,
  `leerling_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `toets`
--

INSERT INTO `toets` (`id`, `vak`, `cijfer`, `leerling_id`) VALUES
(8, 'Engels', 7, 1),
(9, 'Duits', 8, 1),
(10, 'Databases', 6, 1),
(11, 'Engels', 8, 2),
(12, 'PHP', 9, 2),
(13, 'Nederlands', 6, 3),
(14, 'PHP', 9, 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `leerlingen`
--
ALTER TABLE `leerlingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `toets`
--
ALTER TABLE `toets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `leerlingen`
--
ALTER TABLE `leerlingen`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `toets`
--
ALTER TABLE `toets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
