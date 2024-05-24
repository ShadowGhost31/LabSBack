-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2024 г., 09:05
-- Версия сервера: 8.2.0
-- Версия PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vt221_brv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tov`
--

DROP TABLE IF EXISTS `tov`;
CREATE TABLE IF NOT EXISTS `tov` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `cost` int NOT NULL,
  `kol` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tov`
--

INSERT INTO `tov` (`id`, `name`, `cost`, `kol`, `date`) VALUES
(1, 'Хліб столовий', 24, 100, '2024-05-24'),
(2, 'Хліб житній', 20, 50, '2024-05-24'),
(3, 'Молоко', 15, 200, '2024-05-24'),
(4, 'Сир', 80, 30, '2024-05-24'),
(5, 'Масло', 50, 40, '2024-05-24'),
(6, 'Яблука', 30, 150, '2024-05-24'),
(7, 'Банани', 35, 120, '2024-05-24'),
(8, 'Апельсини', 40, 90, '2024-05-24'),
(9, 'Картопля', 12, 500, '2024-05-24'),
(10, 'Морква', 10, 300, '2024-05-24');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `birthdate`, `gender`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$10$vRjaiKpEu.wrlwHzfmdNCezuTeyiUGtB.or5IMks5RxQTEq0jfz.2', 'going.ru.gg@gmail.com', 'Roman', 'Bigun', '2024-01-11', 'male', '0989327745', 'JJJJJ', '2024-05-24 08:47:47', '2024-05-24 08:47:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
