-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 19 2022 г., 22:44
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burgers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `change` tinyint(1) DEFAULT NULL,
  `card` tinyint(1) DEFAULT NULL,
  `callback` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `comments`, `change`, `card`, `callback`) VALUES
(1, 1, 'test address', 'test comments', NULL, NULL, NULL),
(2, 1, 'test address', 'test comments', NULL, NULL, NULL),
(3, 1, 'test address', 'test comments', NULL, NULL, NULL),
(4, 1, 'test address', 'test comments', NULL, NULL, NULL),
(5, 1, 'test address', 'test comments', NULL, NULL, NULL),
(6, 1, 'test address', 'test comments', NULL, NULL, NULL),
(7, 1, 'test address', 'test comments', NULL, NULL, NULL),
(8, 1, 'test address', 'test comments', 1, NULL, NULL),
(9, 1, 'test, д. 1, к. 2, кв. 3, эт. 4', 'asdfasdfasdf', 1, 1, 1),
(10, 1, '12341234', 'asdfasdf', 1, 0, 1),
(11, 1, 'test address', 'test comments', 1, 0, NULL),
(12, 1, 'asdfasdf', 'asdf', 1, 0, 1),
(13, 2, 'test', 'sfasdf', 0, 0, 1),
(14, 5, 'test, д. 1, к. 2, кв. 3, эт. 4', 'asdf', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`) VALUES
(1, 'test', '12341234', 'kav@gde.ru'),
(2, 'test2', '43434', 'test@example.com'),
(3, 'test1', '12341234', 'kav1@gde.ru'),
(4, 'test1', '12341234', 'kav12@gde.ru'),
(5, 'test', '+7 (123) 412 34 12', 'alkirg@yandex.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
