-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Şub 2020, 15:55:19
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `worksteady`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lists`
--

CREATE TABLE `lists` (
  `lists_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `whichlist` int(11) NOT NULL COMMENT '0:todo 1:proccess 2:finished 3:gotsomeproblem 4:deleted',
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `lists`
--

INSERT INTO `lists` (`lists_id`, `user_id`, `owner_id`, `whichlist`, `content`, `active`, `reg_date`, `update_date`) VALUES
(44, 1, 1, 1, 'Motor araştırması', 0, '2020-02-28 00:32:19', '0000-00-00 00:00:00'),
(45, 1, 1, 3, 'Tasarım taslağının hazırlanması', 0, '2020-02-28 00:33:57', '0000-00-00 00:00:00'),
(46, 1, 1, 2, 'Haberleşme için kullanılacak yöntem araştırması', 0, '2020-02-28 00:35:19', '0000-00-00 00:00:00'),
(47, 1, 1, 3, 'Genel maliyet araştırması', 0, '2020-02-28 00:37:07', '0000-00-00 00:00:00'),
(51, 1, 1, 1, 'Hey', 0, '2020-02-28 10:29:03', '2020-02-28 20:01:49'),
(53, 1, 1, 2, 'Hello', 0, '2020-02-28 10:29:12', '0000-00-00 00:00:00'),
(54, 1, 1, 2, 'Ekledim', 0, '2020-02-28 11:00:04', '2020-02-28 20:03:16'),
(55, 1, 2, 1, 'Sahiplen bunu', 0, '2020-02-28 11:35:56', '0000-00-00 00:00:00'),
(57, 1, 1, 3, 'HET', 0, '2020-02-28 20:03:05', '2020-02-28 20:03:13'),
(58, 1, 0, 0, 'Nasıl ama', 0, '2020-02-28 20:04:12', '0000-00-00 00:00:00'),
(59, 1, 0, 0, 'Ekledim gitti', 0, '2020-02-28 20:06:40', '0000-00-00 00:00:00'),
(60, 1, 0, 0, 'Bir tane daha', 0, '2020-02-28 20:06:48', '0000-00-00 00:00:00'),
(61, 1, 0, 0, 'Harika', 0, '2020-02-28 20:06:53', '0000-00-00 00:00:00'),
(62, 1, 0, 0, 'Süper', 0, '2020-02-28 20:06:57', '0000-00-00 00:00:00'),
(63, 1, 0, 0, 'Müthiş', 0, '2020-02-28 20:07:01', '0000-00-00 00:00:00'),
(64, 1, 1, 2, 'Hiç değilse bizim', 0, '2020-02-28 20:07:31', '2020-02-29 11:56:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `refferance` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `refferance`, `tarih`) VALUES
(1, 'Ahmet Emin Kayar', 'aeminkyr@gmail.com', '8cdee5526476b101869401a37c03e379', 'sdasdsa', '2020-02-26 18:09:20'),
(2, 'Ahmet Enüştekin', 'ahmettenustekin@gmail.com', '8cdee5526476b101869401a37c03e379', '', '2020-02-28 09:21:33');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`lists_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `lists`
--
ALTER TABLE `lists`
  MODIFY `lists_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
