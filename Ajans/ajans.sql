-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Oca 2024, 10:35:07
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ajans`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `id` int(11) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `aciklama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`id`, `resim`, `aciklama`) VALUES
(24, './images/portfolio-item1.jpg', 'Yeni Kalemler'),
(25, './images/portfolio-item16.jpg', 'Yeni dizaynlar'),
(26, './images/portfolio-item3.jpg', 'Web sitenize Katkı'),
(27, './images/portfolio-item4.jpg', 'Sporda vakit ayırın'),
(28, './images/portfolio-item5.jpg', 'Resimleri baştan yaratın');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ulasim`
--

CREATE TABLE `ulasim` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `konu` varchar(255) NOT NULL,
  `mesaj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ulasim`
--

INSERT INTO `ulasim` (`id`, `ad`, `soyad`, `email`, `konu`, `mesaj`) VALUES
(2, 'mehmet', 'mustafa', 'mehmet.tunc0@gmail.com', 'yeniörnek', 'ashbabdhasbda'),
(4, 'mehmet', 'mustafa', 'masdmskladad', 'sdaskodnjaos', 'askmjdklasdjmaw'),
(5, 'mehmet', 'tunc', 'saldjahjsdn@sadklsad.com', 'asopıdıuhaoushd', 'asıpdjaıodjıoapwspduja');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ulasim`
--
ALTER TABLE `ulasim`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ad` (`ad`,`soyad`,`email`,`konu`,`mesaj`) USING HASH;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `ulasim`
--
ALTER TABLE `ulasim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
