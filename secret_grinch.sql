-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2024 г., 22:35
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `logged_box`
--

INSERT INTO `logged_box` (`id`, `name`, `founder_id`, `join_hash`, `join_link`, `max_gift_cost`, `closed_or_oped`, `date_create`) VALUES
(28, 'santa', 4, '2y10qsRaJdsBwK8poYmtwnqrQ8jff5PfaI6Xn37XdtQ0Teh5iky2fUAG', 'santa10188.php', NULL, 1, '2024-12-25 21:26:07'),
(30, 'Trunks', 4, '2y10FyHQKhHUb4qmWWCdTKWe1VVlFRCJKMK8Rqh3YeubAlB26Hram1u', 'Trunks91649.php', NULL, 1, '2024-12-25 21:28:11'),
(32, 'Vegita', 4, '2y10eQNZS5slQlDUhE9RuORlVOSr2qsWSxNQfeojNOYLAMuYUNar1Qi', 'Vegita69249.php', NULL, 1, '2024-12-25 21:29:53'),
(33, 'Trunks', 4, '2y10KgdPni5oreQ5iaPTyYG1shCUIAvF38z0iq2XZBsimhCjre7o5a', 'Trunks29000.php', NULL, 1, '2024-12-25 21:30:25'),
(34, 'Goku', 4, '2y10ZMt1XsCdZkoi0vVEGDIomeClResWgBtCbLeL9vJADIPMA3FGWj06', 'Goku7141.php', NULL, 1, '2024-12-26 06:53:10'),
(35, 'Goku ssj', 4, '2y10E8htrdr4bz4C7NFLxAaduuFCzLD3aVGKjUMtuJg9LQN1tpj4Wvi', 'Goku ssj59938.php', NULL, 1, '2024-12-26 06:53:21'),
(36, 'vegerot', 4, '2y10pEoNUcB4CSKpVqujlTj5uGIuuYvZq295rhCt6rgUaPPYU1FUazjC', 'vegerot5461.php', NULL, 1, '2024-12-26 06:53:53'),
(37, 'Chumba1', 4, '2y10f0r6UoRGmA68Tw0ZcjigbO5yozkIYel7kjg8d6anG3LoKs3t0yfoy', 'Chumba185636.php', 33, 1, '2024-12-27 18:41:08');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(4, 'ivan', '../PFPictures/PHOTO-576144.jpeg', 'abobaeber@yahoo.com', '$2y$10$usf8tZCb19JRMfqFNpMHAOG5fKGp0fH77vQypjEMXpu.mYAoE0l/a', '2y10S4utMEYrzzObVZMoD6De3UF13kF3dtRMaczdPVsuNgae8cEsRoC', '2024-12-26 09:57:56', '2024-11-26 17:52:41'),
(13, 'boba', '../PFPictures/def_avatar.jpg', 'boba@mail.com', '$2y$10$v4Ut9vEHhou7pZ5JQ2KhfeFbCCN9aaacp88ln7MAQ2X4wPISWEJH2', '2y10MvN6JX0rjp0oz1S07YhOxxYCn9I6bKQ5bxfDjpOBGVwp47ZrGMC', '2024-12-26 09:58:19', '2024-11-30 15:52:28'),
(14, 'bimba', '../PFPictures/def_avatar.jpg', 'bimba@mail.ru', '$2y$10$1ZUAURzxGvU4rxAXC/94YeY1jfRAQm3pCPnv3xx2Jbo.BoSpzMQo6', '2y10HkAJ3GjPaMb2x1jfTByp6G9dlmTLJgIMFHKF0leRdsfhdgQwbc4K', '2024-12-26 09:59:04', '2024-11-30 15:52:50'),
(15, 'gogo', '../PFPictures/def_avatar.jpg', 'gogo@mail.ru', '$2y$10$fKFJ98aqBRUXUzpT8SvK9OMcqTFJJoXke3lB3EgeyaIilKKJNDihq', '2y1037i7RavRPqfPxtmEJNh8evbA6tOA3cPVO3bJot0ZbYPDnnLFPge', '2024-12-26 09:59:16', '2024-11-30 15:53:02'),
(16, 'baba', '../PFPictures/def_avatar.jpg', 'baba@mail.ru', '$2y$10$5Mn0kTgR1gqBdJ09t5TSweAJ99pIK3v3gM5Y.NBariZGyZpqJiBMe', '2y101nId33Jmm3u2npKryPhNrlyK516IF3Dfq0q91IdxqcAnSENvgV2', '2024-12-26 09:59:27', '2024-11-30 15:53:14'),
(17, 'gundam', '../PFPictures/def_avatar.jpg', 'aslanyan121@gmail.com', '$2y$10$X5ncrou5eI580MSPoXVpD.kfSaiSpTCmDGFCqnufOwpUUYHY9uI1i', 'NULL', '2024-12-25 05:00:53', '2024-11-30 15:54:12');

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
(203, 16, 28, '2024-12-25 21:26:25'),
(204, 14, 28, '2024-12-25 21:26:25'),
(205, 17, 28, '2024-12-25 21:26:25'),
(209, 16, 30, '2024-12-25 21:28:52'),
(210, 14, 30, '2024-12-25 21:28:52'),
(211, 17, 30, '2024-12-25 21:28:52'),
(215, 16, 32, '2024-12-25 21:29:55'),
(216, 14, 32, '2024-12-25 21:29:55'),
(217, 17, 32, '2024-12-25 21:29:55'),
(218, 16, 33, '2024-12-25 21:30:26'),
(219, 14, 33, '2024-12-25 21:30:26'),
(220, 17, 33, '2024-12-25 21:30:26'),
(221, 16, 34, '2024-12-26 06:53:12'),
(222, 14, 34, '2024-12-26 06:53:12'),
(223, 17, 34, '2024-12-26 06:53:12'),
(224, 16, 35, '2024-12-26 06:53:22'),
(225, 14, 35, '2024-12-26 06:53:22'),
(226, 17, 35, '2024-12-26 06:53:22'),
(227, 16, 36, '2024-12-26 06:54:45'),
(228, 14, 36, '2024-12-26 06:54:45'),
(229, 17, 36, '2024-12-26 06:54:45'),
(230, 4, 28, '2024-12-26 22:17:03'),
(231, 16, 37, '2024-12-27 18:45:26'),
(232, 14, 37, '2024-12-27 18:45:26'),
(233, 4, 30, '2024-12-27 19:24:45');

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
-- Дамп данных таблицы `user_box_wish`
--

INSERT INTO `user_box_wish` (`id`, `usr_id`, `box_id`, `wish`, `date_create`) VALUES
(20, 4, 28, 'В лес уйти и чтобы не нашел никто', '2024-12-26 22:16:58');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT для таблицы `user_box_wish`
--
ALTER TABLE `user_box_wish`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
