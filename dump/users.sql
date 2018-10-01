-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2018 г., 14:42
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(120) NOT NULL,
  `password` varchar(190) NOT NULL,
  `name` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `gender` enum('1','2') NOT NULL,
  `birthday` date NOT NULL,
  `registration_date` datetime NOT NULL,
  `description` varchar(120) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `lastname`, `gender`, `birthday`, `registration_date`, `description`, `avatar`) VALUES
(2, 'takahiroasiro@gmail.com', '$2y$10$C6B0hwmq0PHa61dGlvPNCeXeRY9pFzA1YLuqluFTsajKSvlcuBrVS', 'haha', 'less', '1', '2012-08-12', '2018-10-01 05:36:53', '123', ''),
(4, 'rustik1998', '$2y$10$UdQFSBR9gqCb5F/HrhC/P.adB69EOtLi63CoMHuOR2RzgQRl.qiSm', 'hahal', 'less', '1', '2012-08-12', '2018-10-01 05:41:30', '123', 'jlkj'),
(10, 'takahiroasiro', '$2y$10$vy3Zb49Z6FUZYK/ek2MgiOJK3EcsFk/Wky4J2gRploMLrxFWAPzlC', 'haha', 'less', '2', '2012-08-12', '2018-10-01 10:59:38', '123', 'jlkj'),
(11, 'last', '$2y$10$C6B0hwmq0PHa61dGlvPNCeXeRY9pFzA1YLuqluFTsajKSvlcuBrVS', 'rus', 'tam', '1', '2018-10-08', '2018-10-23 05:14:18', NULL, 'klo.png'),
(12, 'outlast', '$2y$10$C6B0hwmq0PHa61dGlvPNCeXeRY9pFzA1YLuqluFTsajKSvlcuBrVS', 'rus', 'tam', '1', '2018-10-08', '2018-10-23 05:14:18', NULL, 'klo.png'),
(13, 'shark', '$2y$10$C6B0hwmq0PHa61dGlvPNCeXeRY9pFzA1YLuqluFTsajKSvlcuBrVS', 'rus', 'tam', '1', '2018-10-08', '2018-10-23 05:14:18', NULL, 'klo.png'),
(14, 'spark', '$2y$10$C6B0hwmq0PHa61dGlvPNCeXeRY9pFzA1YLuqluFTsajKSvlcuBrVS', 'rus', 'tam', '1', '2018-10-08', '2018-10-23 05:14:18', NULL, 'klo.png'),
(15, 'bark', '$2y$10$C6B0hwmq0PHa61dGlvPNCeXeRY9pFzA1YLuqluFTsajKSvlcuBrVS', 'rus', 'tam', '1', '2018-10-08', '2018-10-23 05:14:18', NULL, 'klo.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
