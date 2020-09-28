-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 28 2020 г., 21:06
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `coment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `package`
--

CREATE TABLE `package` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_acounts`
--

CREATE TABLE `user_acounts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_rights`
--

CREATE TABLE `user_rights` (
  `rights_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `user_acounts`
--
ALTER TABLE `user_acounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`rights_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `package`
--
ALTER TABLE `package`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_acounts`
--
ALTER TABLE `user_acounts`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `rights_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
