-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Лют 22 2023 р., 13:42
-- Версія сервера: 5.7.33
-- Версія PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `oberig`
--

-- --------------------------------------------------------

--
-- Структура таблиці `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `fundraisings`
--

CREATE TABLE `fundraisings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_amount` bigint(20) NOT NULL,
  `current_amount` bigint(20) NOT NULL,
  `foundator_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `fundraisings`
--

INSERT INTO `fundraisings` (`id`, `name`, `description`, `max_amount`, `current_amount`, `foundator_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Збір коштів на пікап для ЗСУ', 'Шановні друзі!\r\n\r\nЗ метою допомоги захисникам України та забезпечення їх необхідними ресурсами, ми запускаємо збір коштів на придбання пікапа для Збройних Сил України.\r\n\r\nПід час військових операцій в зоні АТО та ООС, пікап є незамінним транспортом для переміщення бійців, доставки бойової техніки та боєприпасів на передову, а також для забезпечення медичного обслуговування поранених.\r\n\r\nМи звертаємося до кожного з вас з проханням приєднатися до нашої ініціативи та підтримати захисників нашої Батьківщини. Ваша пожертва допоможе придбати надійний пікап, який буде використовуватися для забезпечення потреб Збройних Сил України.\r\n\r\nМи глибоко вдячні за будь-яку фінансову підтримку, яку ви зможете надати. Будь-яка сума, яку ви пожертвуєте, стане важливим кроком на шляху до перемоги над агресором та збереження миру на нашій землі.\r\n\r\nЗахистимо разом нашу незалежність та допоможемо нашим бійцям у складний час! Дякуємо за вашу увагу та підтримку!\r\n\r\n\r\n\r\n', 1000000, 5700, 1, 1, NULL, NULL),
(2, 'Збір коштів на дрон для ЗСУ', 'Шановні друзі!\r\n\r\nЗ метою допомоги захисникам України та забезпечення їх необхідними ресурсами, ми запускаємо збір коштів на придбання дрона для Збройних Сил України.\r\n\r\n', 1000000, 1000000, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `founder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `funds`
--

INSERT INTO `funds` (`id`, `name`, `description`, `email`, `phone`, `website`, `help_link`, `founder`, `created_at`, `updated_at`) VALUES
(1, 'БЛАГОДІЙНА ОРГАНІЗАЦІЯ ФОНД \"АСПЕРН\"\n', 'Благополуччя дітей у здорових та щасливих сім’ях. Ми надаємо якісні соціальні послуги в сфері захисту дітей: притулок, реабілітацію, навчання; супроводжуємо сім\'ї і сімейні форми виховання, розвиваємо соціальні зв\'язки в громаді. Допомагаємо: ДІТЯМ - сиротам, які потребують захисту та допомоги, позбавленим батьківської опіки; МОЛОДІ - випускникам сімейних форм виховання та інтернатів; СІМ’ЯМ неповним, багатодітним, малозабезпеченим, СЖО, іншим; ЖІНКАМ - вагітним, матерям з дітьми', 'aspernoffice@gmail.com\n\n', '+380443321543\n', 'http://ua.aspern.com.ua/index.php/en/', 'http://ua.aspern.com.ua/index.php/en/dopomogti-zaraz', 'Andrew Vozniak', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) NOT NULL,
  `chat_id` bigint(20) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `messages`
--

INSERT INTO `messages` (`id`, `from`, `chat_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hi', NULL, NULL),
(2, 2, 1, 'asdasdasd', '2023-02-21 20:54:47', '2023-02-21 20:54:47'),
(3, 2, 1, 'asdasdasd', '2023-02-21 20:54:54', '2023-02-21 20:54:54'),
(4, 2, 1, 'asd', '2023-02-21 20:55:13', '2023-02-21 20:55:13'),
(5, 2, 1, 'тестове повідомлення', '2023-02-21 20:56:04', '2023-02-21 20:56:04'),
(6, 2, 1, '123', '2023-02-21 20:56:24', '2023-02-21 20:56:24');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2023_02_18_095823_create_categories_table', 1),
(46, '2023_02_18_100841_create_categoriesators_table', 1),
(49, '2014_10_12_000000_create_users_table', 2),
(50, '2014_10_12_100000_create_password_resets_table', 2),
(51, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(52, '2019_08_19_000000_create_failed_jobs_table', 2),
(53, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(54, '2020_05_21_100000_create_teams_table', 2),
(55, '2020_05_21_200000_create_team_user_table', 2),
(56, '2020_05_21_300000_create_team_invitations_table', 2),
(57, '2023_02_11_180303_create_sessions_table', 2),
(58, '2023_02_18_095000_create_funds_table', 2),
(59, '2023_02_18_095013_create_fundraisings_table', 2),
(60, '2023_02_21_220712_create_messages_table', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eg62bijnfq4wGJaHjA3FEJn04ly5IBmiX72E37se', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 OPR/94.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV0dMelF4TzNOcGxhd2lNb3MxZWdJbEdsZFlKa2VBSjRmZ0RuejFRNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9vYmVyaWcudGVzdC91c2VyL3Byb2ZpbGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDIwWDBvSUxKVnBodndTanR4Z1FKOXU5bTUvaE0zQXFsSjJTcXNWeUxrbklrMUFuNGtMWmsuIjt9', 1677073323);

-- --------------------------------------------------------

--
-- Структура таблиці `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Андрій\'s Team', 1, '2023-02-21 20:25:29', '2023-02-21 20:25:29'),
(2, 2, 'Ярослав\'s Team', 1, '2023-02-21 20:36:59', '2023-02-21 20:36:59');

-- --------------------------------------------------------

--
-- Структура таблиці `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `status`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Андрій Возняк', 'a.vozniaks@gmail.com', NULL, '$2y$10$20X0oILJVphvwSjtxgQJ9u9m5/hM3AqlJ2SqsVyLknIk1An4kLZk.', NULL, NULL, NULL, 1, 0, 'pKJZSSUn8EaZYhmN1oZg5WvwbvzVyRRzwKjjt1uH4g9JOgABAMVfvc0YeNbe', NULL, 'profile-photos/0aUQYdJoiIHbWanuQUPixTPnpEBOW13tyXlf1Lbn.png', '2023-02-21 20:25:29', '2023-02-22 11:42:03'),
(2, 'Ярослав Процик', 'protsyk@gmail.com', NULL, '$2y$10$it0x4BDGyVqWX1TCgtJ2W.xFdfQwucqAi.0klH8hr7KE3S74E8joe', NULL, NULL, NULL, 1, 0, 'hl44gGgKXZFx4vXxBH5A9brfeomd52cHC0J6b9CB8q1TulTNd3ZUoLfub8zq', NULL, NULL, '2023-02-21 20:36:59', '2023-02-21 20:36:59');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Індекси таблиці `fundraisings`
--
ALTER TABLE `fundraisings`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Індекси таблиці `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Індекси таблиці `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Індекси таблиці `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Індекси таблиці `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Індекси таблиці `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `fundraisings`
--
ALTER TABLE `fundraisings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблиці `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
