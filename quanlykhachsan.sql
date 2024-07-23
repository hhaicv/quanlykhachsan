-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2024 at 11:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlykhachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image_url`, `link_url`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'khuyến mại khách hàng mới', 'banners/kM3sr5cwgz2sFVhEEL7ZX13ofFk6ZZ05WIHdTh0d.webp', 'http://quanlykhachsan.test/admin/banners', '2024-07-17', '2024-07-21', '2024-07-17 07:27:40', '2024-07-17 07:27:40'),
(2, 'khuyến mãi 10% mùa du lịch', 'banners/kM3sr5cwgz2sFVhEEL7ZX13ofFk6ZZ05WIHdTh0d.webp', 'http://quanlykhachsan.test/admin/banners', '2024-07-17', '2024-07-21', NULL, NULL),
(3, 'khuyến mãi 10% mùa du lịch', 'banners/kM3sr5cwgz2sFVhEEL7ZX13ofFk6ZZ05WIHdTh0d.webp', 'http://quanlykhachsan.test/admin/banners', '2024-07-17', '2024-07-21', NULL, NULL),
(4, 'khuyến mãi 10% mùa du lịch', 'banners/kM3sr5cwgz2sFVhEEL7ZX13ofFk6ZZ05WIHdTh0d.webp', 'http://quanlykhachsan.test/admin/banners', '2024-07-17', '2024-07-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_price` int NOT NULL,
  `promotion_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('sent','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2024_07_12_150621_create_amenities_table', 2),
(35, '2024_07_15_081343_create_room_amenitie_table', 6),
(36, '2024_07_15_090626_create_amenities_table', 7),
(37, '2024_07_15_091752_create_amenitie_room_table', 7),
(41, '2024_07_15_100136_create_tag_room_table', 8),
(48, '2014_10_12_000000_create_users_table', 9),
(49, '2014_10_12_100000_create_password_reset_tokens_table', 9),
(50, '2019_08_19_000000_create_failed_jobs_table', 9),
(51, '2019_12_14_000001_create_personal_access_tokens_table', 9),
(52, '2024_07_11_080507_create_room_types_table', 9),
(53, '2024_07_12_161714_create_promotions_table', 9),
(54, '2024_07_12_175404_create_banners_table', 9),
(55, '2024_07_13_072506_create_rooms_table', 9),
(56, '2024_07_15_095431_create_tags_table', 9),
(57, '2024_07_15_100136_create_room_tag_table', 9),
(58, '2024_07_16_082436_create_bookings_table', 9),
(59, '2024_07_16_082512_create_invoices_table', 9),
(60, '2024_07_16_082740_create_emails_table', 9),
(61, '2024_07_18_085904_create_homes_table', 10),
(62, '2024_07_18_151248_create_services_table', 10),
(63, '2024_07_18_163110_create__room_type_service_table', 11),
(64, '2024_07_19_144704_create_room_service_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `discount_rate` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `description`, `discount_rate`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'M1', 'Khuyến mãi tháng 7', 50000, '2024-07-17', '2024-07-27', NULL, NULL),
(2, 'M1', 'Khuyến mãi tháng 7', 50000, '2024-07-17', '2024-07-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('available','booked','maintenance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `quantity`, `size`, `cover`, `images`, `price`, `view`, `bed`, `max_people`, `content`, `status`, `created_at`, `updated_at`) VALUES
(5, 'PRESIDENT SUITE', 10, '175m2', 'room/x3x5Uq0rPuUUqUkkAqEjUVMQNQit0zqBTqaVc11p.jpg', '[\"room\\/FdyzX1aDlX8XkacRIvZOvhTFJ3Pw2vqWYMDAiwvw.jpg\",\"room\\/Taq9eIrKifDbM8WzrS20P0fu6eWeBQNwTHkMb1VM.jpg\",\"room\\/krXHIY6K8xJezOLtZ5Vwbyg76OP6ELOIrulfBIeu.jpg\",\"room\\/EwXDyKdFYsivxrXj3zr4AJ2X7PBblyIdmtgkncSR.jpg\",\"room\\/2L2u0E5gRjEO3fMsaKw3t1pNXLpPZx3uZNi9cvht.jpg\",\"room\\/EUkKN3CbNeJXTMYr9T4lgOWf00LgHSTxMNZHu0Jo.jpg\",\"room\\/NniNJE1xON87RNnedJqxxPJgzDZIglFMDIfDuuzU.jpg\",\"room\\/3P0PaK09NKRXXHwNVq07XvsSxc2gkll8gwhhoJyO.jpg\",\"room\\/lVq0g7VDLVvMgUoNVjcp7xUItTfr6XumQt604m3S.jpg\"]', 26000000, 'Hướng biển & thành phố', '! Giường đôi lớn', '2 Người Lớn. 2 Trẻ Em', 'Hạng phòng President Suite cao cấp bậc nhất, một chiếc ban công xinh xắn với tầm nhìn bao quát hướng biển và cả thành phố từ trên cao tuyệt mỹ. Một phòng tắm tiện nghi với phòng xông hơi đạt tiêu chuẩn 5 sao.', 'available', '2024-07-19 08:20:55', '2024-07-19 09:18:14'),
(9, 'SUPERIOR', 20, '30m2', 'room/IxmCvmlifJ5QjbhrBPjYfn98etmoyi0LdgDVPQuc.jpg', '[\"room\\/To9v7IRU4kJQTcrHPXKDibrP8RCoVUgBsJ4rw4De.jpg\",\"room\\/IuFvpSHkGvDSQtc4z7ilNe1i3qXhWQXhOw4LgAhf.jpg\",\"room\\/MC7HIGZ97BmNnLVYMImj6GfePbDX6ZeCp9JFu8Fs.jpg\",\"room\\/sQYFNeBmnT6eq80Hd5RyQXTrtfhM3wNl7fPzq25w.jpg\",\"room\\/UoChicCtvHAe6eCQlMARz9MJMwK5DY2fHqP67Yi9.jpg\",\"room\\/3vO4SIgcBTFi8UCy3yKHZXcbZI7AphwQBE6JOwHm.jpg\",\"room\\/j484JxXkjkm5XlDhvIIiVRws38dSZ80LGhbaso9u.jpg\"]', 1800000, 'Ban công, Hướng góc biển, Thành phố', '01 Giường Đôi hoặc 02 Giường Đơn', '2 Người lớn, 2 Trẻ em', 'Phòng Superior có thiết kế hiện đại với loại giường cỡ lớn rộng rãi hoặc 02 giường đơn riêng biệt và một tầm nhìn ra thành phố hoặc biển tuyệt đẹp. Phòng tắm xinh xắn với vòi hoa sen tạo sự thoải mái dưới làn nước mát.', 'available', '2024-07-19 20:03:18', '2024-07-19 20:03:18'),
(10, 'DELUXE', 20, '32m2', 'room/qlsvYnbK6ErSGeoOGO8nQkHzgN51EJuhf5ArjNnz.jpg', '[\"room\\/qFEgBA4Q58eswsIcaKdhxd0VUb8c0bYxeGpLSa7z.jpg\",\"room\\/QwEdnKFFETyDuqtlGOIXiWBQYLWBOhhoIAhTy7bJ.jpg\",\"room\\/hdLz1EyyakesLKht0qspEgYgpbfOe9nu5kylvV35.jpg\",\"room\\/Oziswfn9MmLNVbB3EbQWU4zo8Gk1Dh2sl3o4hVGh.jpg\"]', 2000000, 'Ban công, Hướng sông, Thành phố', '01 Giường Đôi hoặc 02 Giường Đơn', '2 Người lớn, 2 Trẻ em', 'Cùng với loại giường cỡ lớn và rộng hoặc 2 giường đơn, tầm nhìn ra quang cảnh biển và thành phố xinh đẹp. Không gian phòng đơn giản, sang trọng và tiện nghi phù hợp cho những chuyến nghỉ dưỡng và công tác vội vã.', 'available', '2024-07-19 20:19:16', '2024-07-19 20:19:16'),
(11, 'PREMIER DELUXE', 15, '35m2', 'room/e7IjHcuNS8KH8LmyJSJ2iMcXVE48XpPLfuVBjSCE.jpg', '[\"room\\/bTQBwmeY3KzJUSPnAVq4EdqgcQmPvQuloPwC0AU6.jpg\",\"room\\/XzgvEa4DkvXfe2GKf7foOgGIuOecnvqoQvAGDNGI.jpg\",\"room\\/5ZDQB6mCVGfgpGitIo5R3e0UTvCyVTNYFz5JwSWS.jpg\",\"room\\/gZAZi34IkZQ6lgQVc8BMMH3dU6iyAIx9jXqkceZi.jpg\",\"room\\/E9wMuuYGI0caoYFRpLFTPJu15Dre84lVbtW2UUkd.jpg\",\"room\\/vj6oEnbcYv7E8QI5i73bDBGTM1J19Jk8tBo76ZO1.jpg\"]', 2800000, 'Ban công, Hướng biển, Thành phố', '01 Giường Đôi', '2 Người lớn, 2 Trẻ em', 'Hạng phòng cao cấp Premium cùng nội thất sang trọng, hài hoà với thiết kế chủ đạo, bạn sẽ hài lòng khi được trải nghiệm tại đây. Một giường ngủ lớn cho cặp đôi hoặc gia đình nhỏ sẽ là lựa chọn thích hợp nhất.', 'available', '2024-07-19 20:24:36', '2024-07-19 20:24:36'),
(12, 'CLUB SUITE', 15, '55m2', 'room/14MfgpanlViD4heYjx4tnCwUcMFZMJdtYQDOuLMI.jpg', '[\"room\\/Jw6KTKhqx6ajjI89ZFUybsCWgIZb9QBc5fX53Llf.jpg\",\"room\\/fQcZPZPFN0HLKoPXC3ugrG5rAKVw3tJfSrsxPJCv.jpg\",\"room\\/eUztlrFTztiwHdMpgf5e9uvyzaeF166O2GQ0NEFs.jpg\",\"room\\/jA0u2K3pM0sJvBjpmlK5tZSffXUoM41k5fvBej0g.jpg\",\"room\\/tDijmbTTYBZW0M66oT7diFHZaB0P7U1BxS4xQCgK.jpg\",\"room\\/YJ7aqC8kEhS9paYgrVoNlzK5b6Umtt0io2NXMiSv.jpg\",\"room\\/NCEvhSisqOJFjwi19mAQ7Xyzxjfun9t42FtZ4L1s.jpg\",\"room\\/UzuCv5mJxioikfHd7jRmpKuF5DPrYFA9vXwg5bpq.jpg\"]', 4500000, 'Hướng biển hoặc thành phố', '01 Giường Đôi', '2 Người lớn, 2 Trẻ em', 'Thức giấc với bình minh trên biển, hay đơn giản là ngắm hoàng hôn mỗi buổi chiều tại hạng phòng đẳng cấp. Không gian trong phòng và ban công phía trước là sự kết hợp hoàn hảo cho kỳ nghỉ của bạn.', 'available', '2024-07-19 20:29:14', '2024-07-19 20:29:14'),
(13, 'FAMILY CLUB SUITE', 10, '60m2', 'room/qL0Yr8XPGVyi87GbCk8PSSs46tEivNoaFxvYOxlp.jpg', '[\"room\\/8NAZo9ohQbWGzq8jdPY4Y6xKJ7JYShhGilCVsjvW.jpg\",\"room\\/SP6aqHHPBsyrtbiReBkNmXM6kIEZdAyUc5lwnPOY.jpg\",\"room\\/aG4DZ4pfp2kipXOEm6rIdZZMn8ViprWYsESwSpq3.jpg\",\"room\\/FtTIOdKTjCLYdg1fkfnN8dTP8W7sqhniQkPLXFJM.jpg\",\"room\\/j9RMtMA2lHXyNIOtxZzVRErkhCKKq9On03hF9Uhy.jpg\",\"room\\/wYfbJPmgIPgHD4Unspzw1nGDg7D6HNHFLCIF7Tsi.jpg\",\"room\\/qGCSjP2zX0DHY3PEK0wopXdcsEcqmycfDPJaTOZr.jpg\"]', 5000000, 'Ban công, Hướng biển hoặc Thành phố', '01 Giường Đôi & 02 Giường Đơn', '4 Người lớn, 2 Trẻ em', 'Căn phòng gia đình là 2 giường đôi rộng rãi với không gian riêng biệt, 01 nhà vệ sinh, bồn tắm và vòi hoa sen. Hệ thống cửa thông nhau cùng với ban công hướng nhìn ra thành phố và biển. Chúng tôi tin rằng, bạn cùng những người thân yêu sẽ có được những khoảnh khắc đáng nhớ tại căn phòng này.', 'available', '2024-07-19 20:36:11', '2024-07-19 20:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE `room_service` (
  `room_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_service`
--

INSERT INTO `room_service` (`room_id`, `service_id`) VALUES
(5, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(5, 3),
(5, 4),
(12, 4),
(5, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(5, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(5, 7),
(13, 7),
(5, 8),
(12, 8),
(13, 8),
(5, 9),
(9, 9),
(10, 9),
(11, 9),
(12, 9),
(13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `room_tag`
--

CREATE TABLE `room_tag` (
  `tag_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_tag`
--

INSERT INTO `room_tag` (`tag_id`, `room_id`) VALUES
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(3, 9),
(4, 9),
(6, 9),
(9, 9),
(10, 9),
(11, 9),
(13, 9),
(14, 9),
(3, 10),
(4, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(13, 10),
(14, 10),
(3, 11),
(4, 11),
(6, 11),
(7, 11),
(8, 11),
(9, 11),
(10, 11),
(11, 11),
(13, 11),
(14, 11),
(3, 12),
(4, 12),
(6, 12),
(7, 12),
(8, 12),
(9, 12),
(10, 12),
(11, 12),
(12, 12),
(13, 12),
(14, 12),
(3, 13),
(4, 13),
(6, 13),
(7, 13),
(8, 13),
(9, 13),
(10, 13),
(11, 13),
(12, 13),
(13, 13),
(14, 13);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Ban Công View Biển', 'services/gWIsJck3vbHkbQ6FRLiWgcs1tLwd0xGcLgIlqRXw.png', 'Phòng có cửa sổ lớn hoặc ban công rộng hướng thẳng ra biển.\nTầm nhìn không bị che khuất, có thể nhìn thấy biển xanh, bãi cát trắng, và những con sóng vỗ bờ.', '2024-07-18 08:57:55', '2024-07-18 08:57:55'),
(3, 'Phòng Họp Riêng', 'services/lS7FioyTjzW6yIdz2Hf4tdy62dE6TE30iRe5N5aP.png', 'Phòng họp nằm ở một vị trí yên tĩnh trong khách sạn, tách biệt khỏi các khu vực ồn ào.\r\nDiện tích phòng rộng rãi, phù hợp cho các cuộc họp từ 10 đến 50 người, tùy theo nhu cầu.', '2024-07-18 09:02:19', '2024-07-18 09:02:19'),
(4, 'Spa & Hồ Bơi', 'services/kcRSf20vxf92YLsU4VZetkAqh9SOefRktWMlItg4.png', 'Spa được bố trí ở một khu vực yên tĩnh, tạo không gian thư giãn tối đa cho khách hàng.\nHồ bơi ngoài trời với diện tích rộng rãi, phù hợp cho cả người lớn và trẻ em.', '2024-07-18 09:03:51', '2024-07-18 09:03:51'),
(5, 'Lễ Tân 24H', 'services/PrRbS6nJTPDaeHaIRGoIWhBGU9MCqGHwj3lygJM0.png', 'Lễ tân hoạt động liên tục suốt 24 giờ mỗi ngày, đảm bảo sự tiện lợi và sẵn sàng phục vụ cho khách hàng dù lúc nào.', '2024-07-18 09:06:46', '2024-07-18 09:06:46'),
(6, 'Dịch vụ tại phòng', 'services/JhlIuzHtZuFtWvgnV7s278F3B3Xc2UcWCphFD3Bp.png', 'Dịch vụ dọn phòng được cung cấp hàng ngày vào thời gian phù hợp với lịch trình của khách hàng.', '2024-07-18 09:20:17', '2024-07-18 09:22:49'),
(7, 'Đưa đón khách hàng', 'services/2aRBX4DaA5v7GLbPb2o4n1ubHsPRNRM5B0NyHCHY.png', 'Dịch vụ nhằm đem đến cho khách hàng có cảm nhận luôn được đón tiếp. Cũng như thể hiện sự chuyên nghiệp cho khách sạn trong việc quan tâm đến du khách của mình.', '2024-07-18 09:21:08', '2024-07-18 09:21:08'),
(8, 'Nhà Hàng', 'services/UvFsOq7aM5CmpQepjrJNGJlbMwOHNS4UDWHbFXec.png', 'Nơi mà cung cấp cho du khách những trải nghiệm phong cách ẩm thực khác nhau từ Á, Âu, Hàn Quốc…', '2024-07-18 09:22:03', '2024-07-18 09:22:03'),
(9, 'Vệ sinh hàng ngày', 'services/jur5PIhJJghCAKKCWweL1vJ0aMzFaDRehVo9xN5U.png', 'Đội ngũ nhân viên dọn phòng chuyên nghiệp và có kinh nghiệm sẽ tiến hành làm sạch và sắp xếp lại không gian phòng theo tiêu chuẩn cao nhất.', '2024-07-18 09:23:27', '2024-07-18 09:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Két Sắt', 'fa-solid fa-vault', NULL, '2024-07-19 02:51:31', '2024-07-19 09:11:44'),
(4, 'Điều Hòa', 'fa-solid fa-fan', NULL, '2024-07-19 07:54:25', '2024-07-19 07:54:25'),
(5, 'Bàn Làm Việc', 'fa-solid fa-computer', NULL, '2024-07-19 08:59:30', '2024-07-19 08:59:30'),
(6, 'wifi', 'fa-solid fa-wifi', NULL, '2024-07-19 09:00:09', '2024-07-19 09:00:09'),
(7, 'Bồn tắm', 'fa-solid fa-bath', NULL, '2024-07-19 09:00:46', '2024-07-19 09:00:46'),
(8, 'Tủ quần áo', 'fa-solid fa-stop', NULL, '2024-07-19 09:03:02', '2024-07-19 09:03:02'),
(9, 'Tivi', 'fa-solid fa-tv', NULL, '2024-07-19 09:03:38', '2024-07-19 09:03:38'),
(10, 'Ấm đun nước', 'fa-solid fa-jar', NULL, '2024-07-19 09:05:08', '2024-07-19 09:05:08'),
(11, 'Điện thoại bàn', 'fa-solid fa-blender-phone', NULL, '2024-07-19 09:07:23', '2024-07-19 09:07:23'),
(12, 'Bộ Sofa', 'fa-solid fa-couch', NULL, '2024-07-19 09:08:23', '2024-07-19 09:08:23'),
(13, 'Ban công', 'fa-solid fa-city', NULL, '2024-07-19 09:09:43', '2024-07-19 09:09:43'),
(14, 'Tủ lạnh', 'fa-solid fa-table-cells-large', NULL, '2024-07-19 09:12:21', '2024-07-19 09:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` enum('admin','member') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_invoice_id_foreign` (`invoice_id`),
  ADD KEY `emails_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_booking_id_foreign` (`booking_id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`room_id`,`service_id`),
  ADD KEY `room_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `room_tag`
--
ALTER TABLE `room_tag`
  ADD PRIMARY KEY (`tag_id`,`room_id`),
  ADD KEY `room_tag_room_id_foreign` (`room_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `emails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `room_service`
--
ALTER TABLE `room_service`
  ADD CONSTRAINT `room_service_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `room_tag`
--
ALTER TABLE `room_tag`
  ADD CONSTRAINT `room_tag_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
