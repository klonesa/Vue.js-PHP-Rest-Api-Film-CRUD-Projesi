-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Nis 2021, 12:30:59
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `film_vue`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `id` int(11) NOT NULL,
  `film_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `film_yonetmen` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `film_yapim_yili` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `film_tur` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`id`, `film_adi`, `film_yonetmen`, `film_yapim_yili`, `film_tur`) VALUES
(1, 'Zindan Adası', 'Eklenecek', 'Eklenecek', 'Eklenecek'),
(2, 'Yeni Hayat', 'Eklenecek', 'Eklenecek', 'Eklenecek'),
(3, 'Yol Ayrımı', 'Eklenecek', 'Eklenecek', 'Eklenecek'),
(4, 'Sully', 'Eklenecek', 'Eklenecek', 'Eklenecek'),
(5, 'Son Kalan', 'Eklenecek', 'Eklenecek', 'Eklenecek'),
(6, 'Güneşin Göz Yaşları', 'Eklenecek', 'Eklenecek', 'Eklenecek'),
(7, 'Sarmaşık', 'Eklenecek', 'Eklenecek', 'Eklenecek');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
