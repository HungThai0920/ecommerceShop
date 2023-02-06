-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 07:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cay_canh_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Về chúng tôi', '<p>Ch&uacute;ng t&ocirc;i l&agrave; Thế Giới Đồ Chơi</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:208px; position:absolute; top:-4.8px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 1, '2021-11-08 18:24:45', '2021-11-08 18:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` tinyint(4) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `roles`, `password`, `email`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'admin', 1, '$2y$10$o0536xrgEK55EUZJorcju.pzFXmgwjkblc2pqEYtg24QZra7fubcq', 'admin@gmail.com', 1, '1nt60yAZzivjPhHHCN5WYSY38Ov4tu7oWWiAXARbw0OfdR4Io7MghXtL5E7H', '2021-11-08 18:25:02', '2021-11-08 18:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `category_new`
--

CREATE TABLE `category_new` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_new`
--

INSERT INTO `category_new` (`id`, `name`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kiến thức cây cảnh', 1, 1, '2021-11-08 11:27:06', '2021-11-08 11:27:06'),
(2, 'Hướng dẫn chăm sóc', 2, 1, '2021-11-08 11:27:29', '2021-11-08 11:27:29'),
(3, 'Cây cảnh phong thủy', 3, 1, '2021-11-08 11:27:41', '2021-11-08 11:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(4) NOT NULL,
  `orders` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `parent_id`, `orders`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cây Cảnh Phong Thủy', 0, 1, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(2, 'Cây Cảnh Sen Đá', 1, 1, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(3, 'Cây Cảnh Loại To', 1, 2, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(4, 'Cây Cảnh Văn Phòng', 1, 3, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(5, 'Cây Cảnh Để Bàn', 0, 2, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(6, 'Cây Cảnh Trong Nhà', 0, 3, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(7, 'Cây Thủy Sinh', 0, 4, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(9, 'Cây Cảnh Nội Thất', 0, 5, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(10, 'Cây cảnh nghệ thuật', 0, 7, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23'),
(11, 'Cây công trình', 0, 8, 1, '2021-11-08 18:25:23', '2021-11-08 18:25:23');

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
(3, '2018_03_27_155711_create_category_product_table', 1),
(4, '2018_03_27_163233_create_admins_table', 1),
(5, '2018_03_27_165531_create_products_table', 1),
(6, '2018_03_27_172957_create_suppliers_table', 1),
(7, '2018_03_27_175642_create_slides_table', 1),
(8, '2018_03_27_175948_create_category_new_table', 1),
(9, '2018_03_27_180546_create_news_table', 1),
(10, '2018_03_27_181645_create_transaction_table', 1),
(11, '2018_03_27_184310_create_orders_table', 1),
(12, 'SuppllersTableSeeder', 1),
(13, 'SlideTableSeeder', 1),
(14, 'CategoryProductTableSeeder', 1),
(15, 'ProductsTableSeeder', 1),
(16, 'CategoryNewsTableSeeder', 1),
(17, 'NewsTableSeeder', 1),
(18, '2018_05_14_151501_create_abouts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_new_id` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `cate_new_id`, `info`, `image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kinh nghiệm trồng và chăm sóc sen đá lên màu chuẩn như ở vườn', 2, 'Sen đá được yêu thích không chỉ bởi sự nhỏ nhắn đáng yêu mà còn vì đây là một loại cây cực kì dễ sống, dễ trồng. Đối với nhiều người, có lẽ trồng và chăm sóc sen đá không có gì là quá khó.', 'cach-cham-soc-sen-da-180221-02.jpg', '<h2>Tưới nước cho c&acirc;y sen đ&aacute;</h2>\r\n\r\n<p>Theo kinh nghiệm chăm s&oacute;c c&acirc;y sen đ&aacute; của&nbsp;<strong>C&acirc;y Xinh</strong>, nước v&agrave; &aacute;nh s&aacute;ng l&agrave; hai yếu tố quan trọng cần đặc biệt ch&uacute; &yacute; nhất.</p>\r\n\r\n<p><img alt=\"Nước và ánh sáng là hai yếu tố quan trọng quyết định màu sắc và vẻ đẹp của cây\" src=\"https://cayxinh.vn/wp-content/uploads/2018/02/cach-cham-soc-sen-da-180221-02.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>H&igrave;nh ảnh: Nước v&agrave; &aacute;nh s&aacute;ng l&agrave; hai yếu tố quan trọng quyết định m&agrave;u sắc v&agrave; vẻ đẹp của c&acirc;y</p>\r\n\r\n<p>Để tưới nước hiệu quả, trước hết bạn cần hiểu sen đ&aacute; cần bao nhi&ecirc;u nước l&agrave; đủ. C&oacute; nhiều người quan niệm sen đ&aacute; cần &iacute;t nước n&ecirc;n chỉ tưới rất &iacute;t (v&agrave;i giọt, hoặc một &iacute;t) dẫn đến t&igrave;nh trạng c&acirc;y bị thiếu nước m&agrave; chết. Đ&acirc;y l&agrave; quan niệm chưa đủ, chỉ thể hiện th&ocirc;ng qua số lần tưới chứ kh&ocirc;ng phải l&agrave; lượng nước tưới cho c&acirc;y.</p>\r\n\r\n<h3>Biểu hiện một c&acirc;y sen đ&aacute; thiếu nước?</h3>\r\n\r\n<p>Một c&acirc;y sen đ&aacute; khi bị thiếu nước sẽ c&oacute; dấu hiệu để bạn nhận biết v&agrave; điều chỉnh lượng nước tưới cho ph&ugrave; hợp. Th&ocirc;ng thường nếu kh&ocirc;ng được cung cấp nước trong thời gian d&agrave;i, c&aacute;c l&aacute; sen đ&aacute; gi&agrave; dưới gốc sẽ c&oacute; m&agrave;u sắc c&acirc;y nhợt nhạt hơi &uacute;a v&agrave;ng, l&aacute; mềm rủ xuống, tr&ocirc;ng thiếu sức sống. Đồng thời, c&aacute;c l&aacute; mới ra sẽ bị ngắn v&agrave; bộ l&aacute; của c&acirc;y kh&ocirc;ng được đẹp.</p>\r\n\r\n<h3>Khi n&agrave;o cần tưới cho c&acirc;y?</h3>\r\n\r\n<p>Th&ocirc;ng thường, c&aacute;ch chăm s&oacute;c sen đ&aacute; tốt nhất đ&oacute; l&agrave; tưới nước khi đất đ&atilde; kh&ocirc; hẳn. Tuỳ thuộc v&agrave;o điều kiện nắng, gi&oacute; v&agrave; độ ẩm nơi trồng m&agrave; bạn c&oacute; thể điều chỉnh thời gian v&agrave; lượng nước tưới cho ph&ugrave; hợp. Việc để cho đất kh&ocirc; hẳn rồi tưới gi&uacute;p k&iacute;ch th&iacute;ch rễ c&acirc;y ph&aacute;t triển rất tốt nhất.</p>\r\n\r\n<p><img alt=\"Nên để đất khô giữa các lần tưới\" src=\"https://cayxinh.vn/wp-content/uploads/2018/02/cach-cham-soc-sen-da-180221-05.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>H&igrave;nh ảnh: N&ecirc;n để đất kh&ocirc; giữa c&aacute;c lần tưới</p>\r\n\r\n<p>Bạn cũng n&ecirc;n tr&aacute;nh trường hợp mỗi ng&agrave;y tưới cho c&acirc;y một &iacute;t khiến cho đất ẩm v&agrave; kh&ocirc;ng thể cứu chữa được.</p>\r\n\r\n<h3>Tưới bao nhi&ecirc;u nước?</h3>\r\n\r\n<p>Khi trồng sen đ&aacute; khi mới mua về, c&aacute;ch để giữ cho c&acirc;y mọc rễ mới nhanh nhất đ&oacute; l&agrave; mỗi lần đất kh&ocirc; cần tưới nhiều nước đến khi tất cả đất trong chậu đạt độ ẩm th&iacute;ch hợp. Nếu tưới c&acirc;y qu&aacute; &iacute;t sẽ kh&ocirc;ng đủ nước cho rễ ph&aacute;t triển, rễ sẽ chết dần v&agrave; k&eacute;o theo c&acirc;y bị yếu v&agrave; chậm ph&aacute;t triển.</p>\r\n\r\n<h3>Lưu &yacute; quan trọng khi tưới</h3>\r\n\r\n<p>C&aacute;c kỹ thuật trồng sen đ&aacute; được nh&agrave; vườn hướng dẫn cho người c&oacute; &iacute;t kinh nghiệm đ&oacute; l&agrave; tr&aacute;nh tưới l&ecirc;n l&aacute;, v&igrave; nếu nước đọng tr&ecirc;n l&aacute; dễ khiến c&acirc;y bị &uacute;ng. Tuy nhi&ecirc;n c&oacute; một số loại sen đ&aacute; vẫn c&oacute; thể tưới l&ecirc;n l&aacute; b&igrave;nh thường như c&aacute;c d&ograve;ng sedum, sen thơm (hay c&ograve;n gọi l&agrave; c&acirc;y nhất mạt hương).</p>', 1, '2021-11-08 11:29:00', '2021-11-08 11:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `price` bigint(15) NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `show_home` tinyint(4) NOT NULL,
  `hot` tinyint(4) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `buyed` int(11) DEFAULT 0,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thunbar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `supplier_id`, `price`, `sale`, `total`, `show_home`, `hot`, `view`, `buyed`, `warranty`, `image`, `unit`, `thunbar`, `description`, `specifications`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cây bàng singapore Trang trí nội thất sang trọng', 4, 1, 1200000, 5, 149, 1, 1, NULL, 0, NULL, '2021-11-08-18-02-46-photos-270x300-43-3f931efcff5716dcd9879a004c5f2909jpgphotos_270x300-43-3f931efcff5716dcd9879a004c5f2909.jpg', 'Hộp', NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(2, 'Cây Trầu Bà Leo Cột Thanh lọc không khí Sống cực bền', 4, 1, 150000, 3, 200, 1, 1, NULL, 0, NULL, '2021-11-08-18-03-48-photos-270x300-42-54b17b39653f62546a710c3349e4e5d4jpgphotos_270x300-42-54b17b39653f62546a710c3349e4e5d4.jpg', 'Hộp', NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(3, 'Cây Tùng Xương Cá', 1, 1, 1200000, 8, 9, 1, 1, 2, 0, NULL, '2021-11-08-18-14-37-cay-tung-xuong-ca-121220-01-247x247jpgcay-tung-xuong-ca-121220-01-247x247.jpg', 'Hộp', NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(4, 'Cây Ngọc Bích', 2, 1, 850000, 10, 50, 1, 1, 4, 0, NULL, '2021-11-08-18-15-15-cay-ngoc-bich-1208192-247x247jpgcay-ngoc-bich-1208192-247x247.jpg', 'Hộp', NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(5, 'Cây Vạn Niên Thanh Leo Cột', 4, 1, 850000, 10, 200, 1, 1, 6, 0, NULL, '2021-11-08-18-16-39-cay-van-nien-thanh-cot-247x247jpgcay-van-nien-thanh-cot-247x247.jpg', 'Hộp', NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(6, 'Cây Hạnh Phúc', 1, 1, 950000, 15, 50, 1, 1, NULL, 0, NULL, '2021-11-08-18-17-44-cay-hanh-phuc-1108198-247x247jpgcay-hanh-phuc-1108198-247x247.jpg', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(7, 'Cây Ngũ Gia Bì', 9, 1, 900000, 20, 3, 1, 1, NULL, 0, NULL, '2021-11-08-18-18-33-cay-ngu-gia-bi-12081911-247x247jpgcay-ngu-gia-bi-12081911-247x247.jpg', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(8, 'Cây Cau Cảnh', 9, 1, 850, 10, 150, 1, 0, 2, 0, NULL, '2021-11-08-18-20-58-cay-cau-canh-14102020-1-510x510jpgcay-cau-canh-14102020-1-510x510.jpg', NULL, NULL, '<p>C&acirc;y Cau Cảnh&nbsp;l&agrave; lo&agrave;i c&acirc;y c&oacute; sức sống m&atilde;nh liệt, mang nhiều &yacute; nghĩa về may mắn v&agrave; t&agrave;i lộc. Hiện nay loại c&acirc;y n&agrave;y được trồng nhiều trong kh&ocirc;ng gian nh&agrave; ở, m&ocirc;i trường l&agrave;m việc hay c&aacute;c qu&aacute;n cafe,&hellip;</p>', NULL, '<h2><strong>C&acirc;y Cau Cảnh &ndash; Loại c&acirc;y mang &yacute; nghĩa t&agrave;i lộc v&agrave; ph&uacute; qu&yacute;</strong></h2>\r\n\r\n<p>C&acirc;y Cau Cảnh&nbsp;l&agrave; lo&agrave;i c&acirc;y c&oacute; sức sống m&atilde;nh liệt, mang nhiều &yacute; nghĩa về may mắn v&agrave; t&agrave;i lộc. C&acirc;y được trồng nhiều trong kh&ocirc;ng gian nh&agrave; ở, m&ocirc;i trường l&agrave;m việc hay c&aacute;c qu&aacute;n cafe. H&atilde;y c&ugrave;ng theo d&otilde;i b&agrave;i viết dưới đ&acirc;y của&nbsp;<strong>C&acirc;y Xinh</strong>&nbsp;để t&igrave;m hiểu r&otilde; hơn về &yacute; nghĩa v&agrave; c&aacute;ch trồng, c&aacute;ch chăm s&oacute;c c&acirc;y nh&eacute;!</p>\r\n\r\n<h2><strong>Đặc điểm của c&acirc;y Cau Cảnh&nbsp;</strong></h2>\r\n\r\n<p>C&acirc;y Cau Cảnh hay c&ograve;n được c&ograve;n được gọi l&agrave; c&acirc;y Cau V&agrave;ng hay&nbsp;c&acirc;y Cau Kiểng<strong>.&nbsp;</strong>Loại c&acirc;y n&agrave;y c&oacute;&nbsp;danh ph&aacute;p khoa học l&agrave;&nbsp;Chrysalidocarpus lutescens, thuộc họ Arecaceae. Cau Cảnh c&oacute; chiều cao trung b&igrave;nh khoảng 70-2m. C&acirc;y mọc th&agrave;nh bụi, th&acirc;n c&acirc;y vươn thẳng v&agrave; c&oacute; m&agrave;u xanh ngả v&agrave;ng. C&aacute;c t&agrave;u l&aacute; mọc thẳng từ gốc, đối xứng với nhau tỏa đều v&agrave; xanh mướt. Ở giữa c&aacute;c phiến l&aacute; l&agrave; phần g&acirc;n cứng m&agrave;u v&agrave;ng.&nbsp;</p>\r\n\r\n<p>Cau Cảnh kh&oacute; c&oacute; hoa hơn những c&acirc;y cau thường, trung b&igrave;nh 1 năm chỉ nở 1-2 lần. Hoa c&oacute; m&ugrave;i thơm ng&aacute;t mọc th&agrave;nh từng ch&ugrave;m v&agrave;ng. Quả Cau Cảnh tr&ograve;n, nhỏ, m&agrave;u v&agrave;ng hoặc m&agrave;u đỏ.</p>\r\n\r\n<p><img alt=\"cau cảnh đẹp\" src=\"https://cayxinh.vn/wp-content/uploads/2020/07/cay-cau-canh-1.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>H&igrave;nh ảnh: C&acirc;y được nhiều người y&ecirc;u th&iacute;ch</p>\r\n\r\n<h2><strong>&Yacute; nghĩa của c&acirc;y Cau Cảnh&nbsp;</strong></h2>\r\n\r\n<p>H&igrave;nh ảnh c&acirc;y Cau Cảnh từ l&acirc;u đ&atilde; gắn liền với người d&acirc;n Việt Nam, mang đến những &yacute; nghĩa v&ocirc; c&ugrave;ng đặc biệt như:</p>\r\n\r\n<h3><strong>T&aacute;c dụng của C&acirc;y Cau Cảnh trong nh&agrave;</strong></h3>\r\n\r\n<p>C&acirc;y Cau Cảnh c&oacute; nhiều k&iacute;ch thước đa dạng kh&aacute;c nhau, vừa c&oacute; thể trồng ngoại thất, vừa c&oacute; thể sử dụng l&agrave;m&nbsp;<a href=\"https://cayxinh.vn/danh-muc/cay-trong-trong-nha\" rel=\"noopener noreferrer\" target=\"_blank\">c&acirc;y trồng trong nh&agrave;</a>. Trong đ&oacute;, những c&acirc;y mini thường được lựa chọn trang tr&iacute; tại b&agrave;n l&agrave;m việc, quầy thu ng&acirc;n hay c&aacute;c kệ s&aacute;ch.</p>\r\n\r\n<p><img alt=\"cây cau cảnh\" src=\"https://cayxinh.vn/wp-content/uploads/2020/07/cay-cau-canh-2.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>H&igrave;nh ảnh: C&acirc;y c&oacute; nhiều t&aacute;c dụng kh&aacute;c nhau</p>\r\n\r\n<p>Ngo&agrave;i t&aacute;c dụng tạo b&oacute;ng m&aacute;t, b&agrave;y tr&iacute; kh&ocirc;ng gian xanh tươi th&igrave;&nbsp;c&acirc;y Cau Cảnh trong nh&agrave;&nbsp;c&ograve;n được NASA đ&aacute;nh gi&aacute; l&agrave; lo&agrave;i c&acirc;y thanh lọc kh&ocirc;ng kh&iacute; rất tốt. Ch&uacute;ng c&oacute; thể loại bỏ c&aacute;c kh&iacute; độc như&nbsp;benzen, formaldehyde, trichloroethylene, xylene, toluene,&hellip; Đồng thời c&ograve;n c&oacute; thể h&uacute;t c&aacute;c tia độc hại ph&aacute;t ra từ những thiết bị điện tử như l&ograve; vi s&oacute;ng, m&aacute;y t&iacute;nh, tivi,&hellip; l&agrave;m ảnh hưởng xấu đến sức khỏe của con người.</p>\r\n\r\n<h3><strong>C&acirc;y Cau Cảnh trong phong thủy</strong></h3>\r\n\r\n<p>Trong phong thủy&nbsp;Cau Cảnh&nbsp;đ&oacute;ng vai tr&ograve; quan trọng gi&uacute;p mang đến nhiều năng lượng tốt đẹp cho gia đ&igrave;nh. C&acirc;y được nhiều người ưa chuộng bởi &yacute; nghĩa mang đến sự b&igrave;nh y&ecirc;n, những điều tốt l&agrave;nh đồng thời xua đuổi t&agrave; ma. Kh&ocirc;ng chỉ vậy loại c&acirc;y n&agrave;y c&ograve;n c&oacute; &yacute; nghĩa như một vật che chắn v&agrave; bảo vệ gia đ&igrave;nh khỏi những điều xấu, khai th&ocirc;ng vượng kh&iacute; mang đến những điều tốt đẹp.&nbsp;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; c&acirc;y Cau Cảnh c&oacute; m&agrave;u xanh mướt n&ecirc;n rất ph&ugrave; hợp với những gia chủ thuộc h&agrave;nh Mộc. Ngo&agrave;i ra do đ&acirc;y l&agrave; m&agrave;u sắc tương sinh với h&agrave;nh Hỏa n&ecirc;n loại c&acirc;y n&agrave;y cũng đem lại nhiều may mắn cho gia chủ.</p>\r\n\r\n<h2><strong>C&aacute;ch trồng Cau Cảnh tại nh&agrave;</strong></h2>\r\n\r\n<p>Được nhận định l&agrave; lo&agrave;i c&acirc;y dễ sinh trưởng v&agrave; ph&aacute;t triển. V&igrave; vậy việc trồng v&agrave; chăm s&oacute;c c&acirc;y Cau Cảnh kh&aacute; đơn giản. Tuy nhi&ecirc;n, cũng cần lưu &yacute; một v&agrave;i vấn đề dưới đ&acirc;y trước khi trồng để c&acirc;y được khỏe mạnh v&agrave; tạo cảnh quan đẹp mắt.</p>\r\n\r\n<ul>\r\n	<li><strong>Nh&acirc;n giống:&nbsp;</strong>Cau Cảnh c&oacute; thể trồng bằng hạt. Quả Cau khi kh&ocirc; lại c&oacute; thể gieo v&agrave;o trong đất ẩm, đặt ở nơi kh&ocirc; tho&aacute;ng l&agrave; c&oacute; thể mọc mầm v&agrave; l&ecirc;n c&acirc;y no. Tuy nhi&ecirc;n, để nảy mầm v&agrave; ph&aacute;t triển th&agrave;nh c&acirc;y con sẽ mất rất nhiều thời gian.</li>\r\n</ul>\r\n\r\n<p><img alt=\"cây cau kiểng\" src=\"https://cayxinh.vn/wp-content/uploads/2020/07/cay-cau-canh-3.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>H&igrave;nh ảnh: C&acirc;y c&oacute; thể nh&acirc;n giống bằng hạt</p>\r\n\r\n<ul>\r\n	<li><strong>Đất trồng:&nbsp;</strong>C&acirc;y Cau Cảnh th&iacute;ch hợp với những loại đất tơi xốp, tho&aacute;t nước tốt v&agrave; chứa nhiều chất m&ugrave;n. Thường th&igrave; sẽ sử dụng hỗn hợp gồm 4 phần đất mục, 2 phần đất hữu cơ, 1 phần c&aacute;t đ&atilde; được ph&acirc;n hủy. Lưu &yacute; những loại đất như đất ph&egrave;n, đất s&eacute;t, đất pha đều kh&ocirc;ng ph&ugrave; hợp với loại c&acirc;y n&agrave;y. Nếu trồng c&acirc;y trong chậu th&igrave; trung b&igrave;nh từ 4-6 th&aacute;ng thay đất một lần v&agrave; b&oacute;n th&ecirc;m c&aacute;c loại ph&acirc;n hữu cơ hoặc NPK để c&acirc;y ph&aacute;t triển tốt hơn.</li>\r\n</ul>\r\n\r\n<h2><strong>C&aacute;ch chăm s&oacute;c c&acirc;y đơn giản</strong></h2>\r\n\r\n<p>Cau cảnh c&oacute; sức sống v&ocirc; c&ugrave;ng m&atilde;nh liệt, bền bỉ, dễ th&iacute;ch nghi n&ecirc;n rất dễ chăm s&oacute;c. Tuy nhi&ecirc;n, để c&acirc;y c&oacute; thể ph&aacute;t triển tươi tốt bạn cần ch&uacute; &yacute; những vấn đề dưới đ&acirc;y:&nbsp;</p>\r\n\r\n<p><img alt=\"chăm sóc cây cau cảnh\" src=\"https://cayxinh.vn/wp-content/uploads/2020/07/cay-cau-canh-4.jpg\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>H&igrave;nh ảnh: Cau Cảnh c&oacute; c&aacute;ch chăm s&oacute;c đơn giản</p>\r\n\r\n<ul>\r\n	<li><strong>&Aacute;nh s&aacute;ng:</strong>&nbsp;Để c&acirc;y lu&ocirc;n c&oacute; m&agrave;u l&aacute; tươi, gi&agrave;u sức sống bạn n&ecirc;n đặt c&acirc;y ở những nơi c&oacute; đủ &aacute;nh s&aacute;ng cần thiết. Nếu đặt c&acirc;y ở những vị tr&iacute; nắng gay gắt sẽ l&agrave;m c&acirc;y dễ bị v&agrave;ng l&aacute;, kh&ocirc; h&eacute;o v&agrave; chết dần.</li>\r\n	<li><strong>Tưới nước:</strong>&nbsp;C&acirc;y Cau Cảnh l&agrave; loại ưa ẩm, cần nhiều nước nhưng kh&ocirc;ng ưa ngập &uacute;ng. Do đ&oacute; bạn cần ch&uacute; &yacute; lượng nước khi tưới c&acirc;y. Chỉ n&ecirc;n cung cấp lượng nước vừa đủ để l&agrave;m ướt đất.</li>\r\n	<li><strong>Nhiệt độ:</strong>&nbsp;C&acirc;y sinh trưởng v&agrave; ph&aacute;t triển tốt nhất trong 18-23&deg;C. Mức nhiệt thấp nhất m&agrave; c&acirc;y c&oacute; thể chịu được l&agrave; 10&deg;C. Nếu dưới nhiệt độ n&agrave;y c&acirc;y sẽ chậm ph&aacute;t triển v&agrave; chết.</li>\r\n	<li><strong>S&acirc;u bệnh:</strong>&nbsp;C&acirc;y thường gặp phải c&aacute;c loại s&acirc;u bệnh c&oacute; hại như nấm, rệp l&aacute;, hay s&acirc;u bọ tr&uacute; ngụ. Do đ&oacute;, cần kiểm tra thường xuy&ecirc;n c&acirc;y trồng, cắt bỏ l&aacute; kh&ocirc; hay v&agrave;ng &uacute;a v&agrave; c&oacute; thể phun thuốc trừ s&acirc;u trong trường hợp cần thiết.&nbsp;</li>\r\n</ul>\r\n\r\n<p>C&acirc;y Cau Cảnh&nbsp;sở hữu vẻ ngo&agrave;i đẹp bắt mắt v&agrave; rất dễ trồng, dễ chăm s&oacute;c. C&ugrave;ng với đ&oacute;, c&acirc;y mang nhiều &yacute; nghĩa phong thủy v&ocirc; c&ugrave;ng độc đ&aacute;o. Nếu bạn c&ograve;n điều g&igrave; băn khoăn hay đang muốn đặt mua ngay một chậu Cau Cảnh th&igrave; h&atilde;y li&ecirc;n hệ ngay với&nbsp;<strong>C&acirc;y Xinh</strong>&nbsp;theo số điện thoại&nbsp;<a href=\"tel:0868357939\">086.835.7939</a>&nbsp;để được hỗ trợ tốt nhất.&nbsp;</p>', 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52'),
(9, 'Tiểu cảnh gốm đất nung 05', 2, 1, 130000, 0, 250, 1, 1, NULL, 0, NULL, '2021-11-08-18-22-15-tieu-canh-chau-gom-dat-nung-05-280x280jpgtieu-canh-chau-gom-dat-nung-05-280x280.jpg', NULL, NULL, NULL, NULL, NULL, 1, '2021-11-08 18:25:52', '2021-11-08 18:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `link`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'slide 1', 'banner-cay-canh-2-1.jpg', 'link 1', 1, 1, '2021-11-08 18:26:07', '2021-11-08 18:26:07'),
(2, 'slide 2', 'banner_001.png', 'link 2', 2, 1, '2021-11-08 18:26:07', '2021-11-08 18:26:07'),
(3, 'slide 3', 'banner_002.png', 'link 23', 3, 1, '2021-11-08 18:26:07', '2021-11-08 18:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'LEGO Đan Mạch', 'Kim Mã', '19001907', 'legodanmach@gmail.com', '2021-11-08 18:26:20', '2021-11-08 18:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `shiper` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `notification` tinyint(2) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `sex`, `phone`, `address`, `birthday`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'duocnvoit@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', 1, '1659020898', 'thái bình', '2020-02-13', NULL, 't00roCjWJU3n8EBNByqiJjbwa3cPGbLfoanDTaIQ', '2020-02-14 19:55:48', '2020-02-14 19:55:48'),
(2, 'NGuyễn Văn Dược', 'duocnvoit12@gmail.com', '$2y$10$ngs2WFuSZ40qG8iJDKABNuY5cspttUG4aVNcm/Hzlmff/lsHZ62qm', 1, '0359020898', 'Tòa nhà Sông Đà, Đường Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội', '2019-12-04', NULL, '4YFNXkxu8zaWUZjithmOVnxPTZXm8vP5OiaI231R', '2020-02-15 04:06:15', '2020-02-15 04:06:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `category_new`
--
ALTER TABLE `category_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_new`
--
ALTER TABLE `category_new`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
