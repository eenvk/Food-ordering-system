-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Set 18, 2022 alle 11:49
-- Versione del server: 8.0.26
-- Versione PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_freshy`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `food`
--

CREATE TABLE `food` (
  `idFood` int NOT NULL,
  `category` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `food`
--

INSERT INTO `food` (`idFood`, `category`, `name`, `price`, `img`) VALUES
(1, 1, 'Margherita', '5.50', 'Margherita'),
(2, 1, 'Diavola', '6.50', 'Diavola'),
(3, 1, 'Prosciutto e funghi', '7.00', 'Prosciutto_e_funghi'),
(4, 1, 'Quattro stagioni', '7.00', 'Quattro_stagioni'),
(5, 1, 'Quattro formaggi', '6.50', 'Quattro_formaggi'),
(6, 1, 'Boscaiola', '7.50', 'Boscaiola'),
(7, 2, 'Vegan burger', '8.00', 'vegan'),
(8, 2, 'King burger', '10.00', 'king'),
(9, 3, 'Still water', '1.00', 'acqua_naturale'),
(10, 3, 'Sparkling water', '1.00', 'acqua_frizzante'),
(11, 3, 'Beer', '2.50', 'birra'),
(12, 3, 'Coca Cola', '1.50', 'coca_cola'),
(13, 2, 'Cheeseburger', '6.50', 'Cheeseburger'),
(14, 2, 'Crispy Bacon', '7.00', 'Crispy');

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `idOrder` int NOT NULL,
  `idUser` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`idOrder`, `idUser`) VALUES
(1, 5),
(2, 1),
(3, 13),
(4, 13),
(5, 1),
(6, 6),
(7, 6),
(8, 1),
(9, 1),
(10, 6),
(11, 14),
(12, 1),
(13, 15),
(14, 16),
(15, 1),
(16, 1),
(17, 5),
(18, 6),
(19, 6),
(20, 6),
(21, 5),
(22, 6),
(23, 1),
(24, 17),
(25, 6),
(26, 18),
(27, 1),
(28, 19),
(29, 1),
(30, 20),
(31, 19),
(32, 21),
(33, 22),
(34, 3),
(35, 23),
(36, 7),
(37, 7),
(38, 1),
(39, 25),
(40, 25),
(41, 13),
(42, 26),
(43, 27),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 28),
(55, 28),
(56, 29),
(57, 29),
(58, 30),
(59, 29),
(60, 7),
(61, 29),
(62, 30),
(63, 6),
(64, 31),
(65, 1),
(66, 32),
(67, 26),
(68, 30),
(69, 6),
(70, 6),
(71, 33),
(72, 34),
(73, 18),
(74, 6),
(75, 35),
(76, 36),
(77, 6),
(78, 6),
(79, 37),
(80, 27);

-- --------------------------------------------------------

--
-- Struttura della tabella `payments`
--

CREATE TABLE `payments` (
  `idPay` int NOT NULL,
  `idOrder` int NOT NULL,
  `idUser` int NOT NULL,
  `date` date NOT NULL,
  `total` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `payments`
--

INSERT INTO `payments` (`idPay`, `idOrder`, `idUser`, `date`, `total`) VALUES
(1, 19, 6, '2022-01-04', 13),
(2, 20, 6, '2022-01-05', 22),
(3, 21, 5, '2022-01-05', 26),
(4, 22, 6, '2022-01-05', 24),
(5, 25, 6, '2022-01-05', 13),
(6, 26, 18, '2022-01-05', 10),
(7, 28, 19, '2022-01-05', 28),
(8, 29, 1, '2022-01-06', 26),
(9, 30, 20, '2022-01-06', 10),
(10, 31, 19, '2022-01-07', 9),
(11, 32, 21, '2022-01-10', 23),
(12, 33, 22, '2022-01-11', 17),
(13, 34, 3, '2022-01-13', 51),
(14, 35, 23, '2022-01-13', 46),
(15, 37, 7, '2022-01-28', 28),
(16, 38, 1, '2022-01-30', 23),
(17, 39, 25, '2022-01-30', 25),
(18, 43, 27, '2022-01-30', 16),
(19, 51, 1, '2022-01-30', 19),
(20, 54, 28, '2022-01-30', 14),
(21, 56, 29, '2022-01-30', 22),
(22, 57, 29, '2022-01-30', 98),
(23, 59, 29, '2022-01-30', 33),
(24, 58, 30, '2022-01-30', 52),
(25, 24, 17, '2022-01-30', 19),
(26, 62, 30, '2022-02-28', 29),
(27, 53, 1, '2022-02-28', 45),
(28, 42, 26, '2022-02-28', 26),
(29, 63, 6, '2022-03-05', 6),
(30, 69, 6, '2022-03-10', 17),
(31, 70, 6, '2022-05-31', 28),
(32, 74, 6, '2022-06-04', 7),
(33, 75, 35, '2022-06-06', 21),
(34, 76, 36, '2022-06-06', 26),
(35, 77, 6, '2022-06-06', 8),
(36, 78, 6, '2022-07-18', 12),
(37, 80, 27, '2022-09-18', 28);

-- --------------------------------------------------------

--
-- Struttura della tabella `quantities`
--

CREATE TABLE `quantities` (
  `id` int NOT NULL,
  `idOrder` int NOT NULL,
  `idFood` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `quantities`
--

INSERT INTO `quantities` (`id`, `idOrder`, `idFood`, `quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 6, 3),
(5, 1, 1, 3),
(6, 1, 3, 3),
(7, 2, 1, 3),
(8, 2, 3, 3),
(9, 3, 1, 2),
(10, 3, 3, 1),
(11, 3, 8, 2),
(12, 3, 5, 1),
(13, 4, 1, 1),
(14, 4, 7, 1),
(15, 4, 3, 2),
(16, 5, 1, 2),
(17, 5, 3, 1),
(18, 5, 7, 1),
(19, 5, 8, 1),
(20, 6, 1, 2),
(21, 6, 2, 1),
(22, 7, 1, 2),
(23, 7, 2, 1),
(24, 8, 1, 2),
(25, 8, 7, 1),
(26, 8, 8, 2),
(27, 9, 1, 1),
(28, 10, 1, 2),
(29, 10, 3, 1),
(30, 11, 7, 1),
(31, 12, 1, 4),
(32, 11, 2, 1),
(33, 12, 6, 1),
(34, 13, 1, 2),
(35, 14, 3, 1),
(36, 14, 5, 1),
(37, 14, 7, 2),
(38, 15, 3, 1),
(39, 15, 4, 1),
(40, 16, 1, 2),
(41, 16, 7, 1),
(42, 17, 1, 1),
(43, 17, 2, 1),
(44, 17, 7, 2),
(45, 18, 1, 1),
(46, 18, 3, 1),
(47, 19, 1, 1),
(48, 19, 3, 1),
(49, 20, 1, 2),
(50, 20, 7, 1),
(51, 21, 10, 1),
(52, 21, 7, 1),
(53, 21, 1, 2),
(54, 21, 11, 1),
(55, 22, 1, 2),
(56, 22, 7, 1),
(57, 22, 9, 1),
(58, 22, 10, 1),
(59, 23, 1, 1),
(60, 24, 1, 2),
(61, 25, 1, 2),
(62, 25, 10, 1),
(63, 26, 2, 1),
(64, 26, 11, 1),
(65, 27, 2, 2),
(66, 28, 6, 1),
(67, 28, 8, 1),
(68, 28, 11, 1),
(69, 29, 1, 2),
(70, 29, 7, 1),
(71, 29, 9, 1),
(72, 29, 11, 1),
(73, 30, 6, 1),
(74, 31, 11, 1),
(75, 31, 1, 1),
(76, 32, 1, 1),
(77, 32, 8, 1),
(78, 32, 10, 2),
(79, 33, 7, 1),
(80, 33, 1, 1),
(81, 33, 9, 1),
(82, 34, 8, 1),
(83, 34, 1, 1),
(84, 34, 3, 1),
(85, 34, 9, 1),
(86, 34, 11, 2),
(87, 34, 5, 1),
(88, 34, 2, 1),
(89, 35, 3, 1),
(90, 35, 2, 1),
(91, 35, 7, 1),
(92, 35, 8, 1),
(93, 35, 11, 2),
(94, 35, 10, 1),
(95, 36, 1, 2),
(96, 36, 10, 1),
(97, 36, 8, 1),
(98, 36, 2, 2),
(99, 37, 1, 2),
(100, 37, 7, 1),
(101, 37, 11, 2),
(102, 38, 1, 2),
(103, 38, 7, 1),
(104, 38, 10, 1),
(105, 39, 1, 1),
(106, 39, 12, 2),
(107, 39, 8, 1),
(108, 40, 1, 1),
(109, 40, 3, 1),
(110, 40, 10, 1),
(111, 40, 12, 1),
(112, 41, 5, 1),
(113, 41, 10, 1),
(114, 42, 1, 2),
(115, 42, 3, 2),
(116, 43, 1, 1),
(117, 43, 7, 1),
(118, 45, 1, 1),
(119, 45, 7, 1),
(120, 51, 1, 3),
(121, 51, 9, 1),
(122, 52, 1, 1),
(123, 52, 7, 1),
(124, 54, 1, 2),
(125, 54, 9, 2),
(126, 55, 5, 2),
(127, 55, 12, 1),
(128, 56, 1, 1),
(129, 56, 7, 1),
(130, 56, 11, 2),
(131, 57, 1, 3),
(132, 57, 7, 2),
(133, 55, 9, 1),
(134, 57, 10, 1),
(135, 57, 6, 2),
(136, 58, 1, 2),
(137, 58, 12, 2),
(138, 58, 7, 1),
(139, 58, 6, 2),
(140, 58, 11, 2),
(141, 59, 3, 3),
(142, 59, 11, 1),
(143, 59, 5, 1),
(144, 24, 3, 1),
(145, 61, 1, 1),
(146, 61, 3, 1),
(162, 61, 9, 1),
(148, 61, 7, 1),
(170, 65, 3, 2),
(169, 65, 7, 1),
(164, 64, 1, 1),
(167, 62, 7, 2),
(166, 62, 1, 1),
(154, 60, 1, 2),
(155, 60, 7, 1),
(156, 60, 11, 1),
(157, 60, 12, 2),
(158, 53, 5, 5),
(168, 62, 10, 3),
(177, 67, 2, 2),
(198, 70, 4, 1),
(174, 66, 3, 2),
(184, 67, 12, 2),
(179, 67, 10, 3),
(181, 63, 1, 1),
(182, 69, 7, 1),
(183, 69, 3, 1),
(185, 67, 13, 1),
(186, 68, 6, 2),
(187, 68, 14, 1),
(194, 68, 8, 1),
(189, 68, 12, 2),
(195, 68, 1, 1),
(191, 68, 7, 2),
(199, 70, 1, 1),
(193, 68, 9, 2),
(200, 70, 5, 1),
(201, 70, 12, 1),
(202, 70, 6, 1),
(203, 73, 1, 1),
(204, 74, 1, 1),
(205, 74, 12, 1),
(206, 75, 14, 1),
(207, 75, 2, 1),
(208, 75, 11, 2),
(209, 75, 12, 1),
(210, 75, 10, 1),
(211, 76, 13, 4),
(212, 77, 2, 1),
(213, 77, 10, 1),
(215, 78, 1, 1),
(216, 78, 2, 1),
(217, 80, 1, 2),
(218, 80, 2, 1),
(219, 80, 14, 1),
(220, 80, 10, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `email` varchar(40) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`idUser`, `email`, `psw`, `name`, `surname`, `address`, `city`) VALUES
(1, 'elenanovkovic2@gmail.com', 'elena211', 'Elena', 'Novkovic', 'Vicolo S. Antonino', 'Treviso'),
(2, 'eee@eee.com', 'eee', 'Elena', 'eee', 'Via Dante Alighieri', 'Roma'),
(3, 'anna@anna', 'anna', 'Anna', 'aaa', 'qwertyuiopasdfghjkl', 'Napoli'),
(4, 'mario@mario', 'mario', 'Mario', 'Rossi', 'asdfghjkl', 'Milano'),
(5, 'andrea@andrea', 'andrea', 'Andrea', 'Verdi', 'trewqasdfghjk', 'Torino'),
(6, 'aaa@aaa', 'aaa', 'Aaa', 'Zzz', 'via kkk', 'Torino'),
(7, 'qqq@qqq', 'qqq', 'qqq', 'qqq', 'pppppppppppppppppppppp', 'Milano'),
(8, 'ttt@ttt', 'ttt', 'Tom', 'ttt', 'ahsuasuasuausas', 'Roma'),
(9, 'ppp@ppp.com', 'ppp', 'Paolo', 'ppp', 'uytrewnf', 'Milano'),
(10, 'silvia@silvia.com', 'silvia', 'Www', 'Www', 'Rpfjwma', 'Roma'),
(11, 'edo@edo.com', 'ggg', 'edo', 'renzi', 'sant bona', 'tv'),
(12, 'lil@uzi', 'liluzi', 'Lil Uzi', 'Vert', 'xxx', 'Los Angeles'),
(13, 'angela@angela', 'angela', 'Angela', 'Giacomini', 'san zeno', 'Treviso'),
(14, 'te@voioben.com', 'moore', 'prosecchina', 'mami', 'santa bona', 'TV'),
(15, 'tom@tom', 'tom', 'Tom', 'mc', 'ertgfd', 'London'),
(16, 'j@lo.com', 'jlo', 'jennifer', 'lo', 'uu', 'Madrid'),
(17, 'fff@fff', 'fff', 'FFF', 'fff', 'fff', 'Firenze'),
(18, 'a@a.com', 'aaa', 'a', 'a', 'aaa', 'tv'),
(19, 'g@g.com', 'ggg', 'giulia', 'corsi', 'gggg', 'tv'),
(20, 'a', 'a', 'enrico', 'bandiera', 'a', 'a'),
(21, 'dsadasdsad', 'asdsadsadasd', 'cdsadas', 'dsadasdad', 'dsadasdsad', 'dsadadsadas'),
(22, 'tino', 'tino', 'tino', 'tino', 'tino', 'tino'),
(23, 'giulia@sgrunt', 'arg', 'giulia', 'sgrunt', 'chopchop', 'coffcoff'),
(24, 'paperino', 'paperino', 'paperino', 'paperino', 'paperino', 'paperino'),
(25, 'gg@gg', 'ggg', 'Gg', 'Hh', 'ojsjdw', 'NY'),
(35, 'giugiu@g.giu', 'ggg', 'giugiu', 'c', 'asa', 'tititi'),
(27, 'ddd@ddd', 'ddd', 'ddd', 'ddd', 'bnye', 'Treviso'),
(28, 'rrr@rrr', 'rrr', 'Rrr', 'rrr', 'gfds', 'Milano'),
(29, 'bbb@bbb', 'bbb', 'bbb', 'bbb', 'vcxz', 'oiuyt'),
(30, 'vvv@vvv', 'vvv', 'vvv', 'vvv', 'vvvv', 'vv'),
(31, 'g@h', 'uuu', 'Prosecchina', 'Ggg', '<3', 'Tv'),
(32, 'sss@sss', 'sss', 'sss', 'sss', 'sss', 'sss'),
(33, 'brombeis@moto.na', 'napoli', 'A Napoli', 'no ci sono mai stato', 'Via Brombeis', 'Napoli'),
(36, 'ciaoooo', 'aaa', 'eliana', 'sferi', 'via sasdaad', 'treviso'),
(37, 'd@d', 'ddd', 'we', 'moore', 'ciao', 'luv u');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`idFood`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indici per le tabelle `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`idPay`);

--
-- Indici per le tabelle `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `food`
--
ALTER TABLE `food`
  MODIFY `idFood` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT per la tabella `payments`
--
ALTER TABLE `payments`
  MODIFY `idPay` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la tabella `quantities`
--
ALTER TABLE `quantities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
