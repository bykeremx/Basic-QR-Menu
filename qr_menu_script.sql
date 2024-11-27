-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Kas 2024, 17:24:36
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `qr_menu_script`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_color` varchar(50) DEFAULT NULL,
  `category_image` varchar(150) DEFAULT NULL,
  `category_description` varchar(200) DEFAULT NULL,
  `category_status` enum('0','1') NOT NULL DEFAULT '1',
  `sira` int(11) DEFAULT NULL,
  `category_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `category_updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category_id` varchar(15) NOT NULL COMMENT 'hangi kategori',
  `menu_name` varchar(50) NOT NULL COMMENT 'adi',
  `menu_description` varchar(200) DEFAULT NULL COMMENT 'açıklaması',
  `menu_image` varchar(250) DEFAULT NULL COMMENT 'resmi',
  `menu_price` decimal(8,2) NOT NULL COMMENT 'fiyatı',
  `menu_status` enum('1','0') NOT NULL DEFAULT '1' COMMENT 'aktif/pasif',
  `sira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `most_the_prefer`
--

CREATE TABLE `most_the_prefer` (
  `id` int(11) NOT NULL COMMENT 'kimliği',
  `menu_id` int(250) NOT NULL COMMENT 'hangi_menu',
  `must` varchar(250) DEFAULT NULL COMMENT 'sırası'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL COMMENT '#kimlik1',
  `settings_description` varchar(150) DEFAULT NULL COMMENT 'açıklması',
  `settings_key` varchar(200) DEFAULT NULL COMMENT 'anahtar kelimesi',
  `settings_value` text NOT NULL COMMENT 'degeri',
  `settings_type` varchar(150) NOT NULL COMMENT 'input tipi ',
  `settings_delete` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'silindi mi ',
  `settings_status` enum('1','0') NOT NULL DEFAULT '1' COMMENT 'aktif mi '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_delete`, `settings_status`) VALUES
(1, 'site baslıgi', 'title', 'EXAMPLE', 'text', '0', '1'),
(2, 'Site Adı', 'name', 'EXAMPLE', 'text', '0', '1'),
(3, 'Site Logo', 'logo', 'assets/images/setting_image/24-05-13-07-Images.jpg', 'file', '0', '1'),
(4, 'Site Fav İcon', 'icon', 'assets/images/setting_image/24-01-29-11-Images.png', 'file', '0', '1'),
(11, 'site vizyon', 'vizyon', 'Lezzetin sınırlarını zorlayarak unutulmaz anılar yaratmak.', 'text', '0', '1'),
(12, 'site misyon', 'misyon', 'Taze ve özenle seçilmiş malzemelerle, samimi bir atmosferde lezzetli deneyimler sunmak', 'text', '0', '1'),
(13, 'is yeri acilis saati', 'acilis', '06.00', 'text', '0', '1'),
(14, 'is yeri kapanis saati', 'kapanis', '23.00', 'text', '0', '1'),
(15, 'Site Harita', 'harita', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3146.3924395568665!2d40.17938327476244!3d37.94462180235981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40751f79a6aad34f%3A0xe6f5f43047023496!2sVinora%20%C5%9Earap%20Evi%20%26%20Bar!5e0!3m2!1str!2str!4v1715694163161!5m2!1str!2str\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'text', '0', '1'),
(16, 'Site Footer Rengi 1 (Fixed)', 'footer_color_1', '#101010', 'color', '0', '1'),
(17, 'Setting Footer Rengi 2 ', 'footer_color_2', '#fdbd40', 'color', '0', '1'),
(18, 'Arka Plan Rengi', 'arkaplan_rengi', '#202020', 'color', '0', '1'),
(19, 'Instagram', 'ig', 'https://www.instagram.com/vinorasarapevibar?igsh=MTV2bmdhdWNqbDFhZg==', 'text', '0', '1'),
(20, 'facebook', 'fb', 'https://www.instagram.com/vinorasarapevibar?igsh=MTV2bmdhdWNqbDFhZg==', 'text', '0', '1'),
(21, 'twitter-x', 'x-twitter', 'https://www.instagram.com/vinorasarapevibar?igsh=MTV2bmdhdWNqbDFhZg==', 'text', '0', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL COMMENT 'kimlik',
  `image` varchar(250) DEFAULT NULL COMMENT 'resmi',
  `title` varchar(250) DEFAULT NULL COMMENT 'baslik',
  `description` varchar(250) DEFAULT NULL COMMENT 'açıklama',
  `must` int(11) DEFAULT NULL COMMENT 'sırası'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `surname` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `most_the_prefer`
--
ALTER TABLE `most_the_prefer`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `most_the_prefer`
--
ALTER TABLE `most_the_prefer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'kimliği';

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '#kimlik1', AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'kimlik';

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
