-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2024 г., 00:48
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
  `closed_or_oped` tinyint(1) NOT NULL DEFAULT '1',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `logged_box`
--

INSERT INTO `logged_box` (`id`, `name`, `founder_id`, `join_hash`, `join_link`, `closed_or_oped`, `date_create`) VALUES
(42, 'santa', 4, '2y10sLZceFSv4RF801bYIThCEejMMaN5Zukm3p3AgB0gIQ8xEN2fZ6', 'santa32264.php', 1, '2024-12-20 13:07:46'),
(43, 'santa', 4, '2y10rjMw9nsGDAZzIvtuHTPEClXL8R8odTqKLdceoNkMj3fUdv4yuAW', 'santa1818.php', 1, '2024-12-20 13:08:55'),
(44, 'Gojeta', 4, '2y10R25YCJMLHJ0aucnYGcgOilFmAHOFnajG6jmhU6vpEVFDTGY8UO', 'Gojeta6891.php', 1, '2024-12-20 15:48:24'),
(45, 'Trunks', 4, '2y10vgVBEHLZr2PxW5mJO7EMPOv5TzzJ2KfzdOcOUzigyrowMH0ckHx1i', 'Trunks68413.php', 1, '2024-12-20 17:45:43'),
(46, 'Vegita', 4, '2y10T37WxG76qt8c25WuoA3cKOM4EnlgarVazvDEfgk1CnvLj8SkG', 'Vegita10709.php', 1, '2024-12-20 17:46:19'),
(47, 'Goku ssj', 4, '2y10QL2GyFgrgG1SbOrdVRaBzem4MpbtlSgJmWCb6DB0fBlYePKf1Ndlm', 'Goku ssj53627.php', 1, '2024-12-20 20:24:57');

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
(4, 'ivan', '../PFPictures/PHOTO-192846.jpeg', 'abobaeber@yahoo.com', '$2y$10$usf8tZCb19JRMfqFNpMHAOG5fKGp0fH77vQypjEMXpu.mYAoE0l/a', NULL, NULL, '2024-11-26 17:52:41'),
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
(94, 16, 42, '2024-12-20 13:07:48'),
(95, 14, 42, '2024-12-20 13:07:48'),
(99, 17, 43, '2024-12-20 13:08:56'),
(101, 4, 42, '2024-12-20 13:11:04'),
(102, 16, 44, '2024-12-20 15:48:26'),
(103, 14, 44, '2024-12-20 15:48:26'),
(104, 17, 44, '2024-12-20 15:48:26'),
(105, 4, 44, '2024-12-20 15:48:32'),
(106, 16, 45, '2024-12-20 17:45:49'),
(107, 14, 45, '2024-12-20 17:45:49'),
(108, 17, 45, '2024-12-20 17:45:49'),
(109, 16, 46, '2024-12-20 17:46:23'),
(110, 14, 46, '2024-12-20 17:46:23'),
(111, 17, 46, '2024-12-20 17:46:23'),
(112, 13, 46, '2024-12-20 17:46:23'),
(113, 4, 46, '2024-12-20 17:46:27'),
(114, 16, 47, '2024-12-20 20:25:02'),
(115, 14, 47, '2024-12-20 20:25:02'),
(116, 17, 47, '2024-12-20 20:25:02');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD KEY `users` (`usr_id`),
  ADD KEY `logged_box` (`box_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `logged_box`
--
ALTER TABLE `logged_box`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users_and_logged_boxes`
--
ALTER TABLE `users_and_logged_boxes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT для таблицы `user_box_wish`
--
ALTER TABLE `user_box_wish`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
