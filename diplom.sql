-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 09 2021 г., 20:11
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `measurs`
--

CREATE TABLE `measurs` (
  `id` int(11) NOT NULL,
  `id_ref` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `measurs`
--

INSERT INTO `measurs` (`id`, `id_ref`, `email`, `text`, `created_at`, `updated_at`) VALUES
(1, NULL, 'derr@ddd.com', 'Ваша проблемма решена! Благодарим за обращение!', '2021-06-09 17:13:59', '2021-06-08 16:26:51'),
(2, NULL, 'eddsww@cdd.com', 'По вашей проблемме производятся работы!', '2021-06-09 17:14:00', '2021-06-09 17:14:01'),
(3, NULL, 'intelg@mail.com', 'Благодарим за своевременное сообщение! Заявка обрабатывается', '2021-06-09 17:14:01', '2021-06-09 17:14:02'),
(4, NULL, 'offes2@ddd.com', 'Ваша проблемма в скором времени будет решена!', '2021-06-08 16:26:33', '2021-06-08 16:26:33');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_25_181604_create_references_table', 1),
(5, '2021_05_25_181846_create_meas_table', 1),
(7, '2021_05_25_182541_create_justices_table', 1),
(8, '2021_05_25_182741_create_territorials_table', 1),
(9, '2021_05_25_182933_create_notarials_table', 1),
(10, '2021_05_25_182337_create_podrazdels_table', 2),
(11, '2021_06_06_182306_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `podrazdels`
--

CREATE TABLE `podrazdels` (
  `id` int(11) NOT NULL,
  `nameOtdel` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `podrazdels`
--

INSERT INTO `podrazdels` (`id`, `nameOtdel`, `created_at`, `updated_at`) VALUES
(1, 'Центральный аппарат Министерства юстиции', '2020-05-27 14:56:07', '2021-05-27 14:56:08'),
(2, 'Территориальные ограны', '2021-05-27 15:00:25', '2021-05-27 15:00:26'),
(3, 'Государственный нотариальный архив', '2021-05-27 15:01:57', '2021-05-27 15:01:58');

-- --------------------------------------------------------

--
-- Структура таблицы `podrazdel_lists`
--

CREATE TABLE `podrazdel_lists` (
  `id` int(11) NOT NULL,
  `idOtdel` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `podrazdel_lists`
--

INSERT INTO `podrazdel_lists` (`id`, `idOtdel`, `name`) VALUES
(1, 1, 'Отдел приема документов'),
(2, 1, 'Отдел обработки документов'),
(3, 1, 'Отдел сбора информации'),
(4, 1, 'Отдел записи актов гражданского состояния'),
(5, 1, 'Отдел государственной регистрации вещных прав'),
(6, 1, 'Отдел государственной исполнительной службы'),
(7, 1, 'Отдел технической инвентаризации, учета и оценки недвижимости'),
(8, 2, 'Донецкий городской отдел ЗАГС'),
(9, 2, 'Макеевский городской отдел ЗАГС'),
(10, 2, 'Енакиевский городской отдел ЗАГС'),
(11, 2, 'Горловский городской отдел ЗАГС'),
(12, 2, 'Харцызский городской отдел ЗАГС'),
(13, 3, 'Государственная нотариальная контора города Донецка'),
(14, 3, 'Государственная нотариальная контора города Харцызска'),
(15, 3, 'Государственная нотариальная контора города Снежного'),
(16, 3, 'Государственная нотариальная контора города Макеевки'),
(17, 3, 'Государственная нотариальная контора пгт Старобешево'),
(18, 3, 'Государственная нотариальная контора города Ясиноватой'),
(19, 3, 'Государственная нотариальная контора города Новоазвска');

-- --------------------------------------------------------

--
-- Структура таблицы `references`
--

CREATE TABLE `references` (
  `id` int(11) NOT NULL,
  `FIO` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `prichinaObr` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `textObr` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `idPodr` int(11) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 DEFAULT 'Не обработан',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `references`
--

INSERT INTO `references` (`id`, `FIO`, `email`, `telephone`, `prichinaObr`, `textObr`, `idPodr`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Двойкин Андрей Александрович', NULL, '3232324423', 'Проблемы  с недвижимостью', 'Помогите решить', 1, 'Обработано', '2021-05-26', '2021-06-05'),
(2, 'Двойкин Андрей Александрович', NULL, '3232324423', 'Проблемы  с недвижимостью', 'Помогите решить', 1, 'Обработано', '2021-05-27', '2021-06-07'),
(5, 'Колесников Иван', 'svinpauk@dddd', '3232324423', 'Проблемы  с жизнью', 'Помогите разрулить', 1, 'Не обработан', '2021-05-31', '2021-05-31'),
(6, 'Erv', 'asdsada@ddd', '3232324423', 'Проблемы  с недвижимостью', 'Помогите решить', 1, 'Не обработан', '2021-05-31', '2021-05-31'),
(7, 'Казимиров Иван', 'ewewe@dddd', '23232442', 'Причина 1', 'Помогите', 1, 'Не обработан', '2021-05-31', '2021-05-31'),
(8, 'Казимиров Иван', 'ewewe@dddd', '23232442', 'Причина 1', 'Помогите', 1, 'Не обработан', '2021-05-31', '2021-05-31'),
(9, 'Андрей Двойкин Александрович', 'andrenik@mail.ua', '+380713560713', 'Замечание по работе', '222', 1, 'Не обработан', '2021-06-01', '2021-06-01'),
(10, 'Андрей Двойкин Александрович', 'andrenik@mail.ua', '+380713560713', 'Некомпетентность сотрудника', 'Помогите', 3, 'Не обработан', '2021-06-01', '2021-06-01'),
(13, 'Ingeburg Donetsk Alexandrovich', 'andrenik449@gmail.com', '89885448882', 'Замечание по работе', 'weww', 1, 'Не обработан', '2021-06-05', '2021-06-05'),
(14, 'Казимиров Иван', 'ewewe@dddd', '23232442', 'Причина 1', 'Помогите', 1, 'Не обработан', '2021-06-05', '2021-06-05'),
(18, 'Казимиров Иван', 'ewewe@dddd', '23232442', 'Причина 1', 'Помогите', 1, 'Не обработан', '2021-06-05', '2021-06-05'),
(19, 'Nasha Pochta Dvoikyn Andrey Donetsk Alexandrovich', 'andrenik449@gmail.com', '89885448882', 'Замечание по работе', '1232', 3, 'Не обработан', '2021-06-05', '2021-06-05'),
(20, 'Казимиров Иван', 'ewewe@dddd', '23232442', 'Причина 1', 'Помогите', 1, 'Не обработан', '2021-06-07', '2021-06-07');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'moder');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'Ренат', 'renatoom@d,r', '$2y$10$3WmGfViTOCuqlci6lN9JMOvPSY7SnfjWWQxxgargFcCXOdSICU7n6', NULL, 2, '2021-05-29 10:34:00', '2021-06-05 16:20:13'),
(2, 'Ingeburg Двойкин Александрович', 'andrenik@mail.ua', '$2y$10$zmhrfz072H1MTdkRKUd0KO78EPJ5XkR8ALGL6gAkezZmwlqpjCclu', 'PkUPVaYtb2wS6rEC3bCQ', 2, '2021-06-06 15:47:54', '2021-06-07 17:20:43'),
(3, 'Kek Ivanovich Ivan', 'svinpauk@sddd.com', '$2y$10$9mLt427TjHdyjCxezaKUweIOsKRGwUhHOey6yuMW9AQaPrNYcYiB.', 'r4pfajTg7yP1K1LNFdC8', 1, '2021-06-06 15:49:57', '2021-06-08 15:30:10'),
(4, 'Николай', 'nikola@mail.ua', '$2y$10$baL6srplz7cR/smHwQ5/heTGSwBTFpVCO253m7Teddvu5B65GBguy', NULL, 2, '2021-06-07 15:48:27', '2021-06-07 15:48:27'),
(12, 'Николай', 'nikola11@mail.ua111', '$2y$10$GMau4hJgca97G./tYMlwnOLDM7aoJLf3ymGCSAtcqr5ZUQNMxWPUK', NULL, NULL, '2021-06-07 15:54:47', '2021-06-07 15:54:47');

-- --------------------------------------------------------

--
-- Структура таблицы `user_refs`
--

CREATE TABLE `user_refs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_refer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user_refs`
--

INSERT INTO `user_refs` (`id`, `id_user`, `id_refer`) VALUES
(15, 3, 6),
(16, 3, 13),
(17, 3, 19),
(18, 3, 9),
(19, 3, 10),
(20, 3, 1),
(21, 3, 2),
(22, 3, 7),
(23, 3, 8),
(24, 3, 14),
(25, 3, 18),
(26, 3, 20),
(27, 3, 5),
(28, 2, 9),
(29, 2, 6),
(30, 4, 14);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `measurs`
--
ALTER TABLE `measurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_ref` (`id_ref`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `podrazdels`
--
ALTER TABLE `podrazdels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `podrazdel_lists`
--
ALTER TABLE `podrazdel_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_podrazdellist_podrazdels` (`idOtdel`);

--
-- Индексы таблицы `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_references_podrazdels` (`idPodr`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `FK_users_roles` (`id_role`) USING BTREE;

--
-- Индексы таблицы `user_refs`
--
ALTER TABLE `user_refs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_ref_references` (`id_refer`),
  ADD KEY `FK_user_ref_users` (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `measurs`
--
ALTER TABLE `measurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `podrazdels`
--
ALTER TABLE `podrazdels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `podrazdel_lists`
--
ALTER TABLE `podrazdel_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `references`
--
ALTER TABLE `references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user_refs`
--
ALTER TABLE `user_refs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `measurs`
--
ALTER TABLE `measurs`
  ADD CONSTRAINT `FK_measurs_user_refs` FOREIGN KEY (`id_ref`) REFERENCES `user_refs` (`id`);

--
-- Ограничения внешнего ключа таблицы `podrazdel_lists`
--
ALTER TABLE `podrazdel_lists`
  ADD CONSTRAINT `FK_podrazdellist_podrazdels` FOREIGN KEY (`idOtdel`) REFERENCES `podrazdels` (`id`);

--
-- Ограничения внешнего ключа таблицы `references`
--
ALTER TABLE `references`
  ADD CONSTRAINT `FK_references_podrazdels` FOREIGN KEY (`idPodr`) REFERENCES `podrazdels` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_refs`
--
ALTER TABLE `user_refs`
  ADD CONSTRAINT `FK_user_ref_references` FOREIGN KEY (`id_refer`) REFERENCES `references` (`id`),
  ADD CONSTRAINT `FK_user_ref_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
