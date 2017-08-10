-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 02:49 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Website', '2017-07-10 19:32:47', '2017-07-10 19:32:47'),
(4, 'Relationships', '2017-07-10 19:32:59', '2017-07-10 19:32:59'),
(5, 'Intermediate', '2017-07-10 19:33:25', '2017-07-10 19:33:25'),
(6, 'JavaScript', '2017-08-07 02:18:13', '2017-08-07 02:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'admin', 'popcap10122@gmail.com', 'rưerwer', 4, '2017-07-14 09:00:04', '2017-07-14 09:00:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_31_095854_entrust_setup_tables', 2),
(4, '2017_06_02_084026_create_posts_table', 3),
(5, '2017_06_05_083939_create_comments_table', 4),
(6, '2017_07_04_081715_create_comments_table', 5),
(7, '2017_06_01_081715_create_comments_table', 6),
(8, '2017_07_04_085715_create_comments_table', 7),
(9, '2017_07_04_090049_add_userid_to_posts_table', 8),
(10, '2017_07_04_091038_create_comments_table', 9),
(20, '2017_07_04_091428_add_userid_to_comments_table', 10),
(25, '2017_07_07_035547_add_slug_to_posts_table', 11),
(26, '2017_07_07_083343_create_categories_table', 11),
(27, '2017_07_07_083736_add_category_id_to_posts_table', 11),
(28, '2017_07_10_044446_create_tags_table', 11),
(29, '2017_07_10_045204_create_post_tag_table', 12),
(30, '2017_08_06_164104_add_image_col_to_posts_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('popcap10122@gmail.com', '$2y$10$H5wjAISwd5rlvj6ocaqKVuE5VCD7IDRaDaJHXbgoQEKL.cVslf7j6', '2017-07-11 00:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'permission-read', 'permission Listing', 'see only list', '2017-06-01 00:55:29', '2017-06-01 00:55:29'),
(4, 'permission-create', 'create permission', 'Create new permission', '2017-06-01 00:55:29', '2017-06-01 00:55:29'),
(5, 'permission-edit', 'Edit permission', 'Edit permission', '2017-06-01 00:55:29', '2017-06-01 00:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(3, 39),
(3, 40),
(4, 40),
(5, 40),
(3, 42),
(4, 42),
(5, 42);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `image`, `category_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Many To Many Relationships', 'Eloquent also provides a few additional helper methods to make working with related models more convenient. For example, let\'s imagine a user can have many roles and a role can have many users. To attach a role to a user by inserting a record in the intermediate table that joins the models, use the attach method:', 'many-to-many-relationships', NULL, 4, '2017-07-10 19:34:37', '2017-07-10 19:34:37', 1),
(2, 'Morning In HCM', 'this is the post in the morning', 'morning-hcm', NULL, 3, '2017-07-10 19:41:40', '2017-07-10 19:41:40', 1),
(3, 'MANG XA HOI', 'asdddddddddddddddddd,asdddddddddddddddd', 'mang-xa-hoi', NULL, 3, '2017-07-10 19:56:29', '2017-07-10 19:56:29', 1),
(4, 'How to make a good impressing on the first time', '<p><img src="https://static.wixstatic.com/media/20adf4_7aa93768055d42e39d6c43c129f8f9bc.jpg/v1/fill/w_489,h_367,al_c,q_80,usm_0.66_1.00_0.01/20adf4_7aa93768055d42e39d6c43c129f8f9bc.webp" alt="" width="434" height="326">Prepare questions and talking points\r\n</p>\r\n\r\n<p>. Before you go into your first meeting with someone, think about what you want to learn from them and what you want them to learn about you. This will help you to get clearer about your own thoughts and feelings, and cut down on the possibility of a dull moment in the conversation.[3] For a job interview, research the company ahead of time. If your questions are about specific aspects of the business, it will show you are a serious candidate who has really considered what it would be like to work for them. If you are meeting someone whose work you admire, take the time to find out more about them so you can ask relevant questions and dig deeper than the average fan.</p>', 'make-a-good-impressing', NULL, 4, '2017-07-14 07:44:44', '2017-08-06 10:19:33', 1),
(5, 'First post image up1', '<p>First post image</p>', 'first-post-img', '1502075543.jpg', 3, '2017-08-06 10:14:01', '2017-08-06 20:57:11', 1),
(6, 'Post with sessionsss', '<p>First post with session message</p>', 'post-with-session', NULL, 3, '2017-08-06 20:56:44', '2017-08-06 21:04:00', 1),
(7, 'replace whitespace not in the end', '<p>str = "hello world   ";</p>\r\n<p>str =str.trim();</p>\r\n<p>newstr = str.replace("/\\s/g","-");</p>\r\n<p>result: hello-world</p>', 'replace-whitespace-not-in-the-end', NULL, 3, '2017-08-07 02:17:27', '2017-08-07 02:17:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 3, 5, NULL, NULL),
(3, 3, 6, NULL, NULL),
(4, 3, 7, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 2, 7, NULL, NULL),
(8, 4, 6, NULL, NULL),
(9, 5, 5, NULL, NULL),
(10, 6, 5, NULL, NULL),
(11, 7, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(39, 'default', 'Normal user', 'nothing', '2017-06-01 22:09:45', '2017-07-03 00:50:36'),
(40, 'admin', 'Admin', 'admin all site', '2017-06-02 00:36:17', '2017-06-02 00:36:17'),
(42, 'manager', 'Manager', 'Manager posts (create,edit...)', '2017-07-03 00:50:18', '2017-07-03 00:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 40),
(5, 42),
(6, 42);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'PHP', '2017-07-10 02:07:14', '2017-07-10 02:07:14'),
(6, 'MongoDB', '2017-07-10 02:33:11', '2017-07-10 02:33:11'),
(7, 'MySQL', '2017-07-10 03:03:04', '2017-07-10 03:03:04'),
(8, 'JavaScript', '2017-08-07 02:18:28', '2017-08-07 02:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'popcap10122@gmail.com', '$2y$10$qiFeKsgC.WCD22ef7vVvquj/nKhsUJHsV7GlGCGwNHqUsux2uVf.y', 'nuf71U9XL4rcAzyVSnTwFlCWvyiSQDmYAdiOf5TyCnNez7JLGNFrRvqhU3M2', '2017-06-05 01:28:02', '2017-06-05 01:28:02'),
(2, 'User', 'user@example.com', '$2y$10$Ol2bHe6jwyLkATsIqBUz.ulYGtTg8v6WmichKD6lw6JCYuLtvc3Ae', '6eNgKtdbyUQcTO49z9n55fQvUyzsBnHGz13f0noCOrDCcykqQSCe2ArCfXtS', '2017-06-30 02:29:06', '2017-06-30 02:29:06'),
(5, 'guest', 'guest@gmail.com', '$2y$10$rQ.CK.8QG0UFbt81u2jcZew82G39dUC60BLXWDCK4.X9Ud/4rwekO', 'RqItOhtfn2K7ZY9ujsFmuGOtBM3DtY4TaBdVudwWTbx5GqS6rdBnCMpE23iL', '2017-07-03 01:13:13', '2017-08-08 02:53:54'),
(6, 'mod', 'abc@gmail.com', '$2y$10$L8GUTo5/11jcS4.dYW18JuapBBuU/vrSiFJzxCVv3iANeaTMM2FKq', 'Mb9radJW6u7NZ3snHLwyXYJKzs2wezwPxDqs67yGXdviwaxKOaX1OWeMm43l', '2017-07-03 01:22:22', '2017-07-03 01:22:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
