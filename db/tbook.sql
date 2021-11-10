-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2021 lúc 02:34 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_book` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `follower` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `book_name`, `description`, `slug_book`, `image`, `status`, `author`, `view`, `created_at`, `updated_at`, `follower`) VALUES
(1, 'Iroha Ni Hoero', 'Cảnh báo độ tuổi: Truyện bạn đang xem có thể có nội dung và hình ảnh không phù hợp cho mọi lứa tuổi, nếu bạn dưới 18 tuổi, vui lòng chọn một truyện khác để giải trí. Chúng tôi sẽ không chịu trách nhiệm liên quan nếu bạn bỏ qua cảnh báo này.', 'iroha-ni-hoero', 'iroha-ni-hoero-1636460578-99.jpg', 0, 'Miki Nazuna', 1000, '2021-11-09 05:22:58', '2021-11-09 12:28:51', 0),
(2, 'Võ Luyện Đỉnh Phong', 'Võ đạo đỉnh phong, là cô độc, là tịch mịch, là dài đằng đẵng cầu tác, là cao xử bất thắng hàn\r\nPhát triển trong nghịch cảnh, cầu sinh nơi tuyệt địa, bất khuất không buông tha, mới có thể có thể phá võ chi cực đạo.\r\nLăng Tiêu các thí luyện đệ tử kiêm quét rác gã sai vặt Dương Khai ngẫu lấy được một bản vô tự hắc thư, từ nay về sau đạp vào dài đằng đẵng võ đạo.', 'vo-luyen-dinh-phong', 'vo-luyen-dinh-phong-1636460605-93.jpg', 0, 'MIYAJIMA Reiji', 300, '2021-11-09 05:23:25', '2021-11-09 12:28:54', 0),
(3, 'Kujibiki Tokushou Musou Hremu Ken', 'Kể về thanh niêm tham gia quay xổ số vô tình kiếm được vé đi sang dị giới. Và nhờ có skill lô tô được, anh đã quyết đị lập dàn harem ở bển.', 'kujibiki-tokushou-musou-hremu-ken', 'kujibiki-tokushou-musou-hremu-ken-1636460647-40.jpg', 0, 'Miki Nazuna', 1997, '2021-11-09 05:24:07', '2021-11-09 12:28:58', 0),
(4, 'Anh Hùng Bị Vứt Bỏ: Sự Trả Thù Của Anh Hùng Bị Triệu Hồi Đến Thế Giới Khác', 'Câu chuyện về ... một anh hùng bị vứt bỏ? và sự trả thù của anh ta ở thế giới khác Dặc biệt cậu ta là một đầu bếp đấy !', 'anh-hung-bi-vut-bo-su-tra-thu-cua-anh-hung-bi-trieu-hoi-den-the-gioi-khac', 'anh-hung-bi-vut-bo-su-tra-thu-cua-anh-hu-8750-1636460760-61.jpg', 0, 'Kinashi Haruka', 4000, '2021-11-09 05:26:00', '2021-11-09 12:29:01', 0),
(5, 'The Reincarnated Inferior Magic Swordsman', 'Một nhân viên văn phòng bình thường-Toru Mizunori, vì một sự cố nên đã rơi vào \"vết nứt không gian\" và gặp chúa....(nói chung là thuộc thể loại isekai :vvv)', 'the-reincarnated-inferior-magic-swordsman', 'the-reincarnated-inferior-magic-swordsma-1636460786-67.jpg', 0, 'Hiroto Kanou', 111123, '2021-11-09 05:26:26', '2021-11-09 12:29:05', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books_categories`
--

CREATE TABLE `books_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books_categories`
--

INSERT INTO `books_categories` (`id`, `book_id`, `category_id`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 1, 6),
(4, 1, 7),
(5, 2, 2),
(6, 2, 5),
(7, 2, 7),
(8, 2, 9),
(9, 3, 1),
(10, 3, 2),
(11, 3, 4),
(12, 3, 7),
(13, 3, 9),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 4, 8),
(18, 4, 9),
(19, 5, 1),
(20, 5, 4),
(21, 5, 5),
(22, 5, 6),
(23, 5, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug_category`, `description`, `status`) VALUES
(1, 'Action', 'action', 'Thể loại này thường có nội dung về đánh nhau, bạo lực, hỗn loạn, với diễn biến nhanh', 0),
(2, 'Adventure', 'adventure', 'Thể loại phiêu lưu, mạo hiểm, thường là hành trình của các nhân vật', 0),
(3, 'Drama', 'drama', 'Thể loại mang đến cho người xem những cảm xúc khác nhau: buồn bã, căng thẳng thậm chí là bi phẫn', 0),
(4, 'Ecchi', 'ecchi', 'Thường có những tình huống nhạy cảm nhằm lôi cuốn người xem', 0),
(5, 'Manhwa', 'manhwa', 'Truyện tranh Hàn Quốc, đọc từ trái sang phải', 0),
(6, 'Romance', 'romance', 'Thường là những câu chuyện về tình yêu, tình cảm lãng mạn. Ớ đây chúng ta sẽ lấy ví dụ như tình yêu giữa một người con trai và con gái, bên cạnh đó đặc điểm thể loại này là kích thích trí tưởng tượng của bạn về tình yêu', 0),
(7, 'Harem', 'harem', 'Thể loại truyện tình cảm, lãng mạn mà trong đó, nhiều nhân vật nữ thích một nam nhân vật chính', 0),
(8, 'Mecha', 'mecha', 'Mecha, còn được biết đến dưới cái tên meka hay mechs, là thể loại nói tới những cỗ máy biết đi (thường là do phi công cầm lái)', 0),
(9, 'Fantasy', 'fantasy', 'Thể loại xuất phát từ trí tưởng tượng phong phú, từ pháp thuật đến thế giới trong mơ thậm chí là những câu chuyện thần tiên', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chapters`
--

INSERT INTO `chapters` (`id`, `book_id`, `chapter_title`, `slug_chapter`, `description`, `content`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'chap 1', 'chap-1', 'Lời mở đầu', '<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fpnh22-3.fna.fbcdn.net/v/t1.6435-9/83788448_1521987384606373_206868706129608704_n.jpg?_nc_cat=107&amp;ccb=1-5&amp;_nc_sid=174925&amp;_nc_ohc=SXOSyluf8U8AX-t3hRL&amp;_nc_ht=scontent.fpnh22-3.fna&amp;oh=2ec6c80405bc89b574e5f6a3692b9ad7&amp;oe=61AED13E\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.18169-9/26168920_971495559655561_5826085231405645284_n.jpg?_nc_cat=109&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=Jg2AfHpcnDIAX9vwEBu&amp;_nc_ht=scontent.fsgn2-4.fna&amp;oh=348df905e2d0651cbc88869a16231a5c&amp;oe=61B1F619\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.6435-9/50819660_1226206574184457_2456852032116490240_n.jpg?_nc_cat=106&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=HPOX-9RgxdUAX_ryaiL&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=954af10fc4bee3410128a4ab22281ab4&amp;oe=61B11058\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fpnh22-3.fna.fbcdn.net/v/t1.6435-9/31882800_1033624786775971_7179331250249793536_n.jpg?_nc_cat=107&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=8HfOsumLN9sAX_3twtF&amp;_nc_ht=scontent.fpnh22-3.fna&amp;oh=3ff15375c16558dda5bc51b1741d6f41&amp;oe=61AF70C1\" /></p>', 0, 0, '2021-11-09 06:21:00', '2021-11-09 13:25:14'),
(2, 1, 'chap 2', 'chap-2', 'Sử hình thành của wibu', '<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.18169-9/397489_313953028743154_387038419_n.jpg?_nc_cat=106&amp;ccb=1-5&amp;_nc_sid=de6eea&amp;_nc_ohc=vB1h-cWOw2QAX8LCsD5&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=6e8ebf6da9b01c807419a97f94fb38cd&amp;oe=61B15647\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.6435-9/67657601_1366000236871756_9148024888710135808_n.jpg?_nc_cat=111&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=pu8Ab0ShLjcAX96G3QH&amp;_nc_ht=scontent.fsgn2-6.fna&amp;oh=5088c909d58ca8a95903bd5280406ab4&amp;oe=61B0C5B4\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.18169-9/1528555_339718199499970_440472125_n.jpg?_nc_cat=106&amp;ccb=1-5&amp;_nc_sid=174925&amp;_nc_ohc=mSxghtyZaCgAX9ediQt&amp;_nc_oc=AQk8A6yh756ZmjpxHVdnL0Kv7wdUP4mumiiFz2cFbakfza8DuDidPbIqvsYjKd80khs&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=4a6ce2ba284dd3a10d556669e6ee4158&amp;oe=61AF872D\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-5.fna.fbcdn.net/v/t31.18172-8/18422477_856347551170363_3065690886327790243_o.jpg?_nc_cat=102&amp;ccb=1-5&amp;_nc_sid=174925&amp;_nc_ohc=SL8AUDKDBcwAX-lpUmL&amp;_nc_ht=scontent.fsgn2-5.fna&amp;oh=8b5aa3f464b9ca243011847d4f8096fb&amp;oe=61AF836D\" /></p>', 0, 0, '2021-11-09 06:22:34', '2021-11-09 13:25:19'),
(3, 1, 'chap 3', 'chap-3', 'Tiến hoá thành wibu chúa', '<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.18169-9/11254427_610859299052524_3367872947952833239_n.jpg?_nc_cat=106&amp;ccb=1-5&amp;_nc_sid=174925&amp;_nc_ohc=7oEK_T25eSsAX8gq9Nd&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=6c49a3f6e37c69f453bde2408af3ca14&amp;oe=61B05050\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fpnh22-2.fna.fbcdn.net/v/t1.18169-9/63472_473134336158355_14653678751345602_n.jpg?_nc_cat=104&amp;ccb=1-5&amp;_nc_sid=174925&amp;_nc_ohc=ka4OVjJSMbIAX_bfC3O&amp;_nc_ht=scontent.fpnh22-2.fna&amp;oh=f3eed863bb6f06d6f80740f29e15aaac&amp;oe=61AFD446\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-5.fna.fbcdn.net/v/t31.18172-8/18358995_852917858179999_3367381074543978033_o.jpg?_nc_cat=102&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=aKoH88YJ_IQAX-EfymB&amp;_nc_ht=scontent.fsgn2-5.fna&amp;oh=f5f36c7833e82f441af64e97c4d68653&amp;oe=61B08587\" /></p>', 0, 0, '2021-11-09 06:24:05', '2021-11-09 13:25:22'),
(4, 1, 'chap 4', 'chap-4', 'Sự trưởng thành', '<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fpnh22-4.fna.fbcdn.net/v/t31.18172-8/24172942_924974524316281_8272398051108595480_o.jpg?_nc_cat=108&amp;ccb=1-5&amp;_nc_sid=0debeb&amp;_nc_ohc=cKlnTBTrcDUAX_sFkr0&amp;_nc_ht=scontent.fpnh22-4.fna&amp;oh=e403a89184597a0abdc83adbb17fecee&amp;oe=61B025B3\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.6435-9/43249591_1157508231054292_1863527906769108992_n.jpg?_nc_cat=106&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=wxplxEYB9dsAX9k0KHI&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=aaec68ca3adb7133c7a414fdf01ca8ff&amp;oe=61AED786\" /></p>\r\n\r\n<p><img alt=\"Không có mô tả ảnh.\" src=\"https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.18169-9/18582324_862289523909499_7702962536428288408_n.jpg?_nc_cat=110&amp;ccb=1-5&amp;_nc_sid=8bfeb9&amp;_nc_ohc=EmY4t3EtU2YAX-ZHMa7&amp;_nc_ht=scontent.fsgn2-6.fna&amp;oh=fa9a8d3b2cd9a38716e3fc9291370eb3&amp;oe=61B03C87\" /></p>', 0, 0, '2021-11-09 06:28:09', '2021-11-09 06:28:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_19_151911_create_categories_table', 1),
(6, '2021_10_20_071630_create_books_table', 1),
(7, '2021_10_20_173138_create_chapters_tables', 1),
(8, '2021_10_28_161205_add_column_follower_to_chapters_table', 1),
(9, '2021_11_07_084912_create_books_categories_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$A0dVdWoGmFUX38HwbUNU9OiFJm/KmKsWb9ulyWrUxYLDVPkiz2cGC', NULL, '2021-11-09 04:06:59', '2021-11-09 04:06:59'),
(4, 'Trung User', 'trung@gmail.com', 2, NULL, '$2y$10$szSlhZUwtAog58req56sEuJ.Zy3qgmsdDF7eM9IbCNl5nKBzAnocS', NULL, '2021-11-09 04:31:59', '2021-11-09 04:31:59');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `books_categories`
--
ALTER TABLE `books_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_categories_book_id_foreign` (`book_id`),
  ADD KEY `books_categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `books_categories`
--
ALTER TABLE `books_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books_categories`
--
ALTER TABLE `books_categories`
  ADD CONSTRAINT `books_categories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
