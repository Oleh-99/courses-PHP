-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2021 г., 15:50
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `courses`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bg1`
--

CREATE TABLE `bg1` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bg1`
--

INSERT INTO `bg1` (`id`, `name`, `age`, `salary`) VALUES
(1, 'Дима', 23, 400),
(2, 'Петя', 25, 500),
(3, 'Вася', 23, 900),
(4, 'Коля', 23, 1000),
(5, 'Иван', 23, 500),
(6, 'Кирилл', 28, 1000),
(13, 'Ярослав', 30, 1200),
(14, 'Петро', 31, 1000),
(15, 'Светлану', 27, 1200),
(18, 'Никита', 26, 300);

-- --------------------------------------------------------

--
-- Структура таблицы `bg2`
--

CREATE TABLE `bg2` (
  `id` int(11) NOT NULL,
  `athor` text NOT NULL,
  `article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bg2`
--

INSERT INTO `bg2` (`id`, `athor`, `article`) VALUES
(1, 'Петров', 'В своей статье рассказывает о машинах.'),
(2, 'Иванов', 'Написал статью об инфляции.'),
(3, 'Сидоров', 'Придумал новый химический элемент.'),
(4, 'Осокина', 'Также писала о машинах.'),
(5, 'Ветров', 'Написал статью о том, как разрабатывать элементы дизайна.');

-- --------------------------------------------------------

--
-- Структура таблицы `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `done` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `todo`
--

INSERT INTO `todo` (`id`, `name`, `description`, `date`, `done`) VALUES
(1, 'todo1', 'description todo', '2021-05-05', 1),
(2, 'todo2', 'todo_description', '2021-05-05', 0),
(3, 'todo3', 'todo_description І', '2021-05-05', 0),
(4, 'hello', 'dsavdv', '2020-01-21', 1),
(5, 'hello', 'dsavdv', '2020-01-21', 1),
(6, 'hello', 'dsavdv', '2020-01-21', 0),
(7, 'todbrbdfb', 'advsdvdvdsvdvsdcvdsvsv', '2020-05-13', 0),
(8, 'hello', 'advsdvdvdsv', '2020-05-12', 0),
(9, 'hello', 'advsdvdvdsv', '2020-05-12', 1),
(10, 'hello', 'advsdvdvdsv', '2020-05-12', 0),
(11, 'sdvdsvdsv', 'dsvsdvsd', '1222-05-12', 0),
(12, 'hello213', 'sdvvdsv', '2020-05-12', 0),
(15, 'todo', 'dvfsvsdfv', '2021-05-06', 0),
(18, 'decvdv', 'dsvdsvdsv', '2021-05-22', 1),
(19, 'hello', 'sdvvsdvsdv', '2021-05-22', 0),
(20, 'todo43235', 'description32fwerfgbfbf', '2021-05-14', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bg1`
--
ALTER TABLE `bg1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bg2`
--
ALTER TABLE `bg2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bg1`
--
ALTER TABLE `bg1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `bg2`
--
ALTER TABLE `bg2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
