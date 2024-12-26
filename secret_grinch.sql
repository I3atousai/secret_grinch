-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 25 2024 г., 02:42
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `secret_grinch`
--

-- --------------------------------------------------------

--
-- Структура таблицы `logged_box`
--

CREATE TABLE `logged_box` (
  `id` int NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `founder_id` int NOT NULL,
  `join_hash` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `join_link` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `max_gift_cost` int DEFAULT NULL,
  `closed_or_oped` tinyint(1) NOT NULL DEFAULT '1',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Дамп данных таблицы `logged_box`
--

INSERT INTO `logged_box` (`id`, `name`, `founder_id`, `join_hash`, `join_link`, `max_gift_cost`, `closed_or_oped`, `date_create`) VALUES
(4, 'santa', 4, '2y104yfrlvqURvuxrcSmBPjtpeIGBuG1yPhz7kci140EInDPNIvMIXLAS', 'santa6881.php', 2134, 1, '2024-12-22 21:28:28'),
(5, 'Gojeta', 4, '2y104na3urP5v6CocVcQhRjZPOPQIPHyWo1Bd7KcuaHahLOMtjGTtSe', 'Gojeta28866.php', 3332, 1, '2024-12-22 21:44:53'),
(6, 'goge', 4, '2y10KyIPdwkjmKzrWq6kGmuM7ehVaCqZ8cK0KfTsBAEHiw2K79vUiV9e', 'goge18670.php', 222, 1, '2024-12-22 21:46:03'),
(7, 'ddda', 4, '2y10DNXW56e8tGr255mqim34nUaHb2ipBVH0DX3m66nFTe579kTXOy', 'ddda84330.php', 2221, 0, '2024-12-16 21:46:59'),
(9, 'Гоку ssj', 4, '2y10Vw8gIUnbj7CeHXrNzqrjOQeg73QVkYf3V518ClMmO9o3zcKdfoy', 'Гоку ssj53401.php', 4443, 1, '2024-12-24 06:30:26'),
(10, 'Vegeta 2', 4, '2y10mrodVIsb4YoW5PgNrS0dmuPZizcLBkPe3PJzREgB7ZQNg12UCSq', 'Vegeta 281544.php', 5500, 1, '2024-12-24 06:35:55'),
(11, 'vobla', 4, '2y102SOdmocDsfw6IAULXXj8OQgOFRPpPw2NAhq2DksK8TyuWwBUFsmC', 'vobla12574.php', 2100, 1, '2024-12-24 06:36:58');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `text` varchar(150) NOT NULL,
  `box_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `box_id`, `user_id`, `status`, `date_create`) VALUES
(4, 'Коробка ddda Удалится через 4 дня', 7, 4, 1, '2024-12-23 20:41:40'),
(15, 'Коробка ddda Удалится через 4 дня', 7, 16, 0, '2024-12-23 20:41:40'),
(16, 'Коробка ddda Удалится через 4 дня', 7, 14, 0, '2024-12-23 20:41:40');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_pic_path` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../PFPictures/def_avatar.jpg',
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass_reset_hash` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass_reset_time` datetime DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `profile_pic_path`, `email`, `password`, `pass_reset_hash`, `pass_reset_time`, `date_create`) VALUES
(4, 'ivan', '../PFPictures/PHOTO-576144.jpeg', 'abobaeber@yahoo.com', '$2y$10$usf8tZCb19JRMfqFNpMHAOG5fKGp0fH77vQypjEMXpu.mYAoE0l/a', NULL, NULL, '2024-11-26 17:52:41'),
(13, 'boba', '../PFPictures/def_avatar.jpg', 'boba@mail.com', '$2y$10$v4Ut9vEHhou7pZ5JQ2KhfeFbCCN9aaacp88ln7MAQ2X4wPISWEJH2', NULL, NULL, '2024-11-30 15:52:28'),
(14, 'bimba', '../PFPictures/def_avatar.jpg', 'bimba@mail.ru', '$2y$10$1ZUAURzxGvU4rxAXC/94YeY1jfRAQm3pCPnv3xx2Jbo.BoSpzMQo6', NULL, NULL, '2024-11-30 15:52:50'),
(15, 'gogo', '../PFPictures/def_avatar.jpg', 'gogo@mail.ru', '$2y$10$fKFJ98aqBRUXUzpT8SvK9OMcqTFJJoXke3lB3EgeyaIilKKJNDihq', NULL, NULL, '2024-11-30 15:53:02'),
(16, 'baba', '../PFPictures/def_avatar.jpg', 'baba@mail.ru', '$2y$10$5Mn0kTgR1gqBdJ09t5TSweAJ99pIK3v3gM5Y.NBariZGyZpqJiBMe', NULL, NULL, '2024-11-30 15:53:14'),
(17, 'gundam', '../PFPictures/def_avatar.jpg', 'aslanyan121@gmail.com', '$2y$10$WLV95pUWYjGGTbB09S7NnOHMDe4B6vCPqCJL.9yQhO9UoLOZIQY6y', NULL, NULL, '2024-11-30 15:54:12');

-- --------------------------------------------------------

--
-- Структура таблицы `users_and_logged_boxes`
--

CREATE TABLE `users_and_logged_boxes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `box_id` int NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users_and_logged_boxes`
--

INSERT INTO `users_and_logged_boxes` (`id`, `user_id`, `box_id`, `date_create`) VALUES
(132, 16, 4, '2024-12-22 21:28:30'),
(133, 14, 4, '2024-12-22 21:28:30'),
(134, 17, 4, '2024-12-22 21:28:30'),
(135, 4, 4, '2024-12-22 21:32:18'),
(136, 16, 7, '2024-12-22 21:47:12'),
(137, 14, 7, '2024-12-22 21:47:12'),
(138, 17, 7, '2024-12-22 21:47:12'),
(139, 16, 6, '2024-12-22 21:55:16'),
(140, 14, 6, '2024-12-22 21:55:16'),
(141, 17, 6, '2024-12-22 21:55:16'),
(142, 16, 9, '2024-12-24 06:30:56'),
(143, 14, 9, '2024-12-24 06:30:56'),
(144, 17, 9, '2024-12-24 06:30:56'),
(145, 16, 10, '2024-12-24 06:36:45'),
(146, 14, 10, '2024-12-24 06:36:45'),
(147, 17, 10, '2024-12-24 06:36:45'),
(148, 16, 11, '2024-12-24 06:37:16'),
(149, 14, 11, '2024-12-24 06:37:16'),
(150, 17, 11, '2024-12-24 06:37:16');

-- --------------------------------------------------------

--
-- Структура таблицы `user_box_wish`
--

CREATE TABLE `user_box_wish` (
  `id` int NOT NULL,
  `usr_id` int NOT NULL,
  `box_id` int NOT NULL,
  `wish` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Дамп данных таблицы `user_box_wish`
--

INSERT INTO `user_box_wish` (`id`, `usr_id`, `box_id`, `wish`, `date_create`) VALUES
(18, 4, 4, 'Чебурек', '2024-12-22 21:28:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `logged_box`
--
ALTER TABLE `logged_box`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`founder_id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logged_box` (`box_id`),
  ADD KEY `users` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_and_logged_boxes`
--
ALTER TABLE `users_and_logged_boxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`user_id`),
  ADD KEY `logged_box` (`box_id`);

--
-- Индексы таблицы `user_box_wish`
--
ALTER TABLE `user_box_wish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_box_wish` (`usr_id`,`box_id`) USING BTREE,
  ADD KEY `users` (`usr_id`),
  ADD KEY `logged_box` (`box_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `logged_box`
--
ALTER TABLE `logged_box`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users_and_logged_boxes`
--
ALTER TABLE `users_and_logged_boxes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT для таблицы `user_box_wish`
--
ALTER TABLE `user_box_wish`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
