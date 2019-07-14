-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 15 2019 г., 07:16
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `exchange_rates`
--

-- --------------------------------------------------------

--
-- Структура таблицы `exchange_history`
--

CREATE TABLE `exchange_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `usd` varchar(100) DEFAULT NULL,
  `eur` varchar(100) DEFAULT NULL,
  `uah` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `exchange_history`
--

INSERT INTO `exchange_history` (`id`, `usd`, `eur`, `uah`, `date`) VALUES
(14, '26.42', '29.82', '0.04', '2019-06-01 00:00:00'),
(15, '26.42', '29.82', '0.04', '2019-06-02 00:00:00'),
(16, '26.42', '29.82', '0.04', '2019-06-03 00:00:00'),
(17, '26.42', '29.82', '0.04', '2019-06-04 00:00:00'),
(18, '26.42', '29.82', '0.04', '2019-06-05 00:00:00'),
(19, '26.42', '29.82', '0.04', '2019-06-06 00:00:00'),
(20, '26.42', '29.82', '0.04', '2019-06-07 00:00:00'),
(21, '26.42', '29.82', '0.04', '2019-06-08 00:00:00'),
(22, '26.42', '29.82', '0.04', '2019-06-09 00:00:00'),
(23, '26.42', '29.82', '0.04', '2019-06-10 00:00:00'),
(24, '26.42', '29.82', '0.04', '2019-06-14 00:00:00'),
(25, '26.42', '29.76', '0.04', '2019-06-18 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `exchange_history`
--
ALTER TABLE `exchange_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `exchange_history`
--
ALTER TABLE `exchange_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
