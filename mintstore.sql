-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mintstore
DROP DATABASE IF EXISTS `mintstore`;
CREATE DATABASE IF NOT EXISTS `mintstore` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mintstore`;

-- Dumping structure for table mintstore.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `verification` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `fname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`email`, `verification`, `fname`, `lname`) VALUES
	('tharinduwijayarathne87@gmail.com', '6184fd78c6423', 'Tharindu', 'Wijayarathna');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table mintstore.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.brand: ~11 rows (approximately)
DELETE FROM `brand`;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Apple'),
	(2, 'Samsung'),
	(3, 'Xiaomi'),
	(4, 'Sony '),
	(5, 'OnePlus'),
	(6, 'Nokia '),
	(7, 'Microsoft '),
	(8, 'Infinix'),
	(9, 'Oppo '),
	(10, 'Vivo'),
	(11, 'Realme'),
	(12, 'ZTE');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table mintstore.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_id`) USING BTREE,
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.cart: ~2 rows (approximately)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`id`, `user_id`, `product_id`, `qty`) VALUES
	(152, 'tharinduwijayarathne87@gmail.com', 10, 1),
	(153, 'tharinduwijayarathne87@gmail.com', 21, 1),
	(157, 'tharinduwijayarathne87@gmail.com', 15, 1),
	(158, 'tharinduwijayarathne87@gmail.com', 12, 1),
	(159, 'tharinduwijayarathne87@gmail.com', 13, 1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table mintstore.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.category: ~7 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Mobile Phones'),
	(2, 'Tablets & IPads'),
	(3, 'Mobile Accessories '),
	(4, 'Smart Watches '),
	(5, 'Earphones'),
	(6, 'Headsets '),
	(7, 'Fitness Trackers ');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table mintstore.chat
DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `to` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `content` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_chat_status` (`status`),
  KEY `FK_chat_users` (`from`),
  KEY `FK_chat_users_2` (`to`),
  CONSTRAINT `FK_chat_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_chat_users` FOREIGN KEY (`from`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_chat_users_2` FOREIGN KEY (`to`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.chat: ~0 rows (approximately)
DELETE FROM `chat`;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

-- Dumping structure for table mintstore.city
DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `postal_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.city: ~2 rows (approximately)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `name`, `postal_code`) VALUES
	(1, 'Kandy', '20000'),
	(2, 'Colombo', '11000');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table mintstore.color
DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.color: ~6 rows (approximately)
DELETE FROM `color`;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name`) VALUES
	(1, 'Gold'),
	(2, 'Silver'),
	(3, 'Graphite'),
	(4, 'Blue'),
	(5, 'Jet Black'),
	(6, 'Rose Gold');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table mintstore.condition
DROP TABLE IF EXISTS `condition`;
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.condition: ~2 rows (approximately)
DELETE FROM `condition`;
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Brandnew'),
	(2, 'Used');
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;

-- Dumping structure for table mintstore.district
DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.district: ~2 rows (approximately)
DELETE FROM `district`;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`id`, `name`) VALUES
	(1, 'Kandy'),
	(2, 'Colombo');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;

-- Dumping structure for table mintstore.feedback
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `product_id` int NOT NULL,
  `feed` text CHARACTER SET utf8,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.feedback: ~1 rows (approximately)
DELETE FROM `feedback`;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` (`id`, `user_email`, `product_id`, `feed`, `date`) VALUES
	(2, 'tharinduwijayarathna8206@gmail.com', 11, 'Good Product ', '2021-10-29 03:02:23'),
	(6, 'tharinduwijayarathne87@gmail.com', 11, 'Good Product. Highly Recommended.', '2021-11-02 04:01:48');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table mintstore.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.images: ~43 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`code`, `product_id`) VALUES
	('6179b4915f725.jpeg', 10),
	('6179b4916cf42.jpeg', 10),
	('6179b4917f21d.jpeg', 10),
	('6179b5319d7e2.jpeg', 11),
	('6179b531abadb.jpeg', 11),
	('6179b531b1eb8.jpeg', 11),
	('6179b5d54f52f.jpeg', 12),
	('6179b5d55ad12.jpeg', 12),
	('6179b5d56a081.jpeg', 12),
	('6179b72a70a8f.jpeg', 13),
	('6179b72a8401f.jpeg', 13),
	('6179b72a9acd9.jpeg', 13),
	('6179b7d22ae8d.jpeg', 14),
	('6179b7d23825b.jpeg', 14),
	('6179b7d23e614.jpeg', 14),
	('6179b9da0c39f.jpeg', 15),
	('6179b9da28a43.jpeg', 15),
	('6179b9da341e0.jpeg', 15),
	('6179baee50e1e.jpeg', 16),
	('6179baee5e633.jpeg', 16),
	('6179baee6825c.jpeg', 16),
	('6179bb9aef7f9.jpeg', 17),
	('6179bb9b0c337.jpeg', 17),
	('6179bb9b15a3c.jpeg', 17),
	('6179bd992796b.jpeg', 18),
	('6179bd993509f.jpeg', 18),
	('6179bd993b635.jpeg', 18),
	('6179befd5ced9.jpeg', 19),
	('6179befd71e29.jpeg', 19),
	('6179befd7fcc3.jpeg', 19),
	('6179c0167b143.jpeg', 20),
	('6179c016a5b8f.jpeg', 20),
	('6179c016b26fa.jpeg', 20),
	('6179c13fd4f32.jpeg', 21),
	('6179c13fe47ae.jpeg', 21),
	('6179c13feae35.jpeg', 21),
	('6182b489264be.jpeg', 26),
	('6182b48937e2e.jpeg', 26),
	('6182b4896aa41.jpeg', 26),
	('6182b48985320.jpeg', 26),
	('618430a5ce80f.jpeg', 27),
	('618430a5de4a3.jpeg', 27),
	('618430a5f119b.jpeg', 27);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table mintstore.invoice
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `product_id` int NOT NULL DEFAULT '0',
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` datetime DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.invoice: ~0 rows (approximately)
DELETE FROM `invoice`;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table mintstore.location
DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_id` int NOT NULL,
  `district_id` int NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location_province1_idx` (`province_id`),
  KEY `fk_location_district1_idx` (`district_id`),
  KEY `fk_location_city1_idx` (`city_id`),
  CONSTRAINT `fk_location_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_location_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  CONSTRAINT `fk_location_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.location: ~2 rows (approximately)
DELETE FROM `location`;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `province_id`, `district_id`, `city_id`) VALUES
	(1, 1, 1, 1),
	(2, 1, 1, 1),
	(3, 1, 1, 1),
	(4, 1, 1, 1);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;

-- Dumping structure for table mintstore.model
DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.model: ~18 rows (approximately)
DELETE FROM `model`;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` (`id`, `name`) VALUES
	(1, 'Iphone X'),
	(2, 'Galaxy S10'),
	(3, 'Galaxy M52 5G'),
	(4, 'Redmi 10 Prime'),
	(5, 'X70 Pro Plus'),
	(6, 'Realme 8i'),
	(7, 'Realme GT master'),
	(8, 'Nord 2'),
	(9, 'Iphone 13'),
	(10, 'Galaxy S20'),
	(11, 'Iphone 8'),
	(12, 'XZ3'),
	(13, 'Xperia iii'),
	(14, 'Mi 11'),
	(15, 'Iphone 6S'),
	(16, 'Iphone 11 Pro '),
	(17, 'Galaxy S21 Ultra'),
	(18, 'Galaxy Note 20 '),
	(19, 'Earbuds 2');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table mintstore.model_has_brand
DROP TABLE IF EXISTS `model_has_brand`;
CREATE TABLE IF NOT EXISTS `model_has_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `model_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_has_brand_brand1_idx` (`brand_id`),
  KEY `fk_model_has_brand_model1_idx` (`model_id`),
  CONSTRAINT `fk_model_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_model_has_brand_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.model_has_brand: ~18 rows (approximately)
DELETE FROM `model_has_brand`;
/*!40000 ALTER TABLE `model_has_brand` DISABLE KEYS */;
INSERT INTO `model_has_brand` (`id`, `brand_id`, `model_id`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 1, 11),
	(4, 1, 15),
	(5, 1, 9),
	(6, 1, 16),
	(7, 3, 14),
	(8, 3, 4),
	(9, 5, 8),
	(10, 11, 6),
	(11, 11, 7),
	(12, 10, 5),
	(13, 2, 3),
	(14, 2, 18),
	(15, 2, 10),
	(16, 2, 17),
	(17, 4, 12),
	(18, 4, 13),
	(19, 2, 19);
/*!40000 ALTER TABLE `model_has_brand` ENABLE KEYS */;

-- Dumping structure for table mintstore.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `color_id` int NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `heading` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `description` text CHARACTER SET utf8,
  `condition_id` int NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status_id` int NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_model_has_brand1_idx` (`model_has_brand_id`),
  KEY `fk_product_color1_idx` (`color_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_admin1_idx` (`user_email`),
  CONSTRAINT `fk_product_admin1` FOREIGN KEY (`user_email`) REFERENCES `admin` (`email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_model_has_brand1` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.product: ~14 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `model_has_brand_id`, `title`, `color_id`, `price`, `qty`, `heading`, `description`, `condition_id`, `user_email`, `status_id`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`) VALUES
	(10, 1, 1, 'Apple Iphone X 64GB (US)', 1, 148000, 14, 'Brandnew Apple iphone X. Imported from USA with all original accessories.  3 Years Apple Warranty', 'NETWORK	Technology	\nGSM / HSPA / LTE\nLAUNCH	Announced	2017, September 12\nStatus	Available. Released 2017, November 03\nBODY	Dimensions	143.6 x 70.9 x 7.7 mm (5.65 x 2.79 x 0.30 in)\nWeight	174 g (6.14 oz)\nBuild	Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame\nSIM	Nano-SIM\n 	IP67 dust/water resistant (up to 1m for 30 mins)\nApple Pay (Visa, MasterCard, AMEX certified)\nDISPLAY	Type	Super Retina OLED, HDR10, Dolby Vision, 625 nits (HBM)\nSize	5.8 inches, 84.4 cm2 (~82.9% screen-to-body ratio)\nResolution	1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)\nProtection	Scratch-resistant glass, oleophobic coating\n 	Wide color gamut\n3D Touch\nTrue-tone\nPLATFORM	OS	iOS 11.1.1, upgradable to iOS 15.1\nChipset	Apple A11 Bionic (10 nm)\nCPU	Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)\nGPU	Apple GPU (three-core graphics)\nMEMORY	Card slot	No\nInternal	64GB 3GB RAM, 256GB 3GB RAM\n 	NVMe\nMAIN CAMERA	Dual	12 MP, f/1.8, 28mm (wide), 1/3", 1.22µm, dual pixel PDAF, OIS\n12 MP, f/2.4, 52mm (telephoto), 1/3.4", 1.0µm, PDAF, OIS, 2x optical zoom\nFeatures	Quad-LED dual-tone flash, HDR (photo/panorama), panorama, HDR\nVideo	4K@24/30/60fps, 1080p@30/60/120/240fps\nSELFIE CAMERA	Dual	7 MP, f/2.2, 32mm (standard)\nSL 3D, (depth/biometrics sensor)\nFeatures	HDR\nVideo	1080p@30fps', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 01:50:33', 150, 200),
	(11, 1, 4, 'Apple Iphone 6s (64GB) US', 2, 26000, 12, 'The iPhone 6S has a similar design to the iPhone 6 but includes updated hardware, including a strengthened 7000 series aluminium alloy chassis and upgraded Apple A9 system-on-chip, a new 12-megapixel rear camera that can record up to 4K video at 30fps at first in the series', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE\nLAUNCH	Announced	2015, September 09. Released 2015, September 25\nStatus	Discontinued\nBODY	Dimensions	138.3 x 67.1 x 7.1 mm (5.44 x 2.64 x 0.28 in)\nWeight	143 g (5.04 oz)\nBuild	Glass front (Gorilla Glass), aluminum back, aluminum frame\nSIM	Nano-SIM\n 	Apple Pay (Visa, MasterCard, AMEX certified)\nDISPLAY	Type	IPS LCD\nSize	4.7 inches, 60.9 cm2 (~65.6% screen-to-body ratio)\nResolution	750 x 1334 pixels, 16:9 ratio (~326 ppi density)\nProtection	Ion-strengthened glass, oleophobic coating\n 	3D Touch\nPLATFORM	OS	iOS 9, upgradable to iOS 15.1\nChipset	Apple A9 (14 nm)\nCPU	Dual-core 1.84 GHz Twister\nGPU	PowerVR GT7600 (six-core graphics)\nMEMORY	Card slot	No\nInternal	16GB 2GB RAM, 32GB 2GB RAM, 64GB 2GB RAM, 128GB 2GB RAM\nMAIN CAMERA	Single	12 MP, f/2.2, 29mm (standard), 1/3", 1.22µm, PDAF\nFeatures	Dual-LED dual-tone flash, HDR\nVideo	4K@30fps, 1080p@60fps,1080p@120fps, 720p@240fps\nSELFIE CAMERA	Single	5 MP, f/2.2, 31mm (standard)\nFeatures	Face detection, HDR, panorama\nVideo	720p@30fps\nSOUND	Loudspeaker	Yes\n3.5mm jack	Yes\n 	16-bit/44.1kHz audio\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot\nBluetooth	4.2, A2DP, LE\nGPS	Yes, with A-GPS, GLONASS, GALILEO, QZSS\nNFC	Yes (Apple Pay only)\nRadio	No\nUSB	Lightning, USB 2.0', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 01:53:13', 100, 220),
	(12, 1, 6, 'Apple Iphone 11 Pro 128GB (US)', 4, 250000, 15, 'The phone comes with a 5.80-inch touchscreen display with a resolution of 1125x2436 pixels at a pixel density of 458 pixels per inch (ppi). iPhone 11 Pro is powered by a hexa-core Apple A13 Bionic processor. It comes with 4GB of RAM. The iPhone 11 Pro runs iOS 13 and is powered by a 3046mAh non-removable battery.', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE\nLAUNCH	Announced	2019, September 10\nStatus	Available. Released 2019, September 20\nBODY	Dimensions	144 x 71.4 x 8.1 mm (5.67 x 2.81 x 0.32 in)\nWeight	188 g (6.63 oz)\nBuild	Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame\nSIM	Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\n 	IP68 dust/water resistant (up to 4m for 30 mins)\nApple Pay (Visa, MasterCard, AMEX certified)\nDISPLAY	Type	Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (HBM), 1200 nits (peak)\nSize	5.8 inches, 84.4 cm2 (~82.1% screen-to-body ratio)\nResolution	1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)\nProtection	Scratch-resistant glass, oleophobic coating\n 	Wide color gamut\nTrue-tone\nPLATFORM	OS	iOS 13, upgradable to iOS 15.1\nChipset	Apple A13 Bionic (7 nm+)\nCPU	Hexa-core (2x2.65 GHz Lightning + 4x1.8 GHz Thunder)\nGPU	Apple GPU (4-core graphics)\nMEMORY	Card slot	No\nInternal	64GB 4GB RAM, 256GB 4GB RAM, 512GB 4GB RAM\n 	NVMe\nMAIN CAMERA	Triple	12 MP, f/1.8, 26mm (wide), 1/2.55", 1.4µm, dual pixel PDAF, OIS\n12 MP, f/2.0, 52mm (telephoto), 1/3.4", 1.0µm, PDAF, OIS, 2x optical zoom\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6"\nFeatures	Dual-LED dual-tone flash, HDR (photo/panorama)\nVideo	4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, stereo sound rec.\nSELFIE CAMERA	Dual	12 MP, f/2.2, 23mm (wide), 1/3.6"\nSL 3D, (depth/biometrics sensor)\nFeatures	HDR\nVideo	4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	No\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot\nBluetooth	5.0, A2DP, LE\nGPS	Yes, with A-GPS, GLONASS, GALILEO, QZSS\nNFC	Yes\nRadio	No\nUSB	Lightning, USB 2.0', 2, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 01:55:57', 250, 350),
	(13, 1, 2, 'Samsung Galaxy S10 6GB 64GB (US)', 2, 75000, 3, 'The Galaxy S10 packs in a 3400mAh battery and manages to deliver over one day of battery life. It sports a triple camera setup at the back onsisting of a 12-megapixel telephoto camera, 12-megapixel wide-angle camera and 16-megapixel ultra wide camera.', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE\nLAUNCH	Announced	2019, February 20\nStatus	Available. Released 2019, March 08\nBODY	Dimensions	149.9 x 70.4 x 7.8 mm (5.90 x 2.77 x 0.31 in)\nWeight	157 g (5.54 oz)\nBuild	Glass front (Gorilla Glass 6), glass back (Gorilla Glass 5), aluminum frame\nSIM	Single SIM (Nano-SIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\nDISPLAY	Type	Dynamic AMOLED, HDR10+\nSize	6.1 inches, 93.2 cm2 (~88.3% screen-to-body ratio)\nResolution	1440 x 3040 pixels, 19:9 ratio (~550 ppi density)\nProtection	Corning Gorilla Glass 6\n 	Always-on display\nPLATFORM	OS	Android 9.0 (Pie), upgradable to Android 11, One UI 3.0\nChipset	Exynos 9820 (8 nm) - EMEA/LATAM\nQualcomm SM8150 Snapdragon 855 (7 nm) - USA/China\nCPU	Octa-core (2x2.73 GHz Mongoose M4 & 2x2.31 GHz Cortex-A75 & 4x1.95 GHz Cortex-A55) - EMEA/LATAM\nOcta-core (1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485) - USA/China\nGPU	Mali-G76 MP12 - EMEA/LATAM\nAdreno 640 - USA/China\nMEMORY	Card slot	microSDXC (uses shared SIM slot) - dual SIM model only\nInternal	128GB 6GB RAM, 128GB 8GB RAM, 512GB 8GB RAM\n 	UFS 2.1\nMAIN CAMERA	Triple	12 MP, f/1.5-2.4, 26mm (wide), 1/2.55", 1.4µm, Dual Pixel PDAF, OIS\n12 MP, f/2.4, 52mm (telephoto), 1/3.6", 1.0µm, AF, OIS, 2x optical zoom\n16 MP, f/2.2, 12mm (ultrawide), 1/3.1", 1.0µm, Super Steady video\nFeatures	LED flash, auto-HDR, panorama\nVideo	4K@60fps (no EIS), 4K@30fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS & OIS\nSELFIE CAMERA	Single	10 MP, f/1.9, 26mm (wide), 1/3", 1.22µm, Dual Pixel PDAF\nFeatures	Dual video call, Auto-HDR\nVideo	4K@30/60fps, 1080p@30fps\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	Yes\n 	32-bit/384kHz audio\nTuned by AKG', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:01:38', 150, 250),
	(14, 1, 13, 'Samsung Galaxy M52 5G 6GB ', 5, 80000, 12, 'From its 120Hz AMOLED screen, fast Snapdragon 778G processor to 5G connectivity, the Galaxy M52 does have many features to appeal to the masses. It looks great.', 'NETWORK	Technology	\nGSM / HSPA / LTE / 5G\nLAUNCH	Announced	2021, September 24\nStatus	Available. Released 2021, October 03\nBODY	Dimensions	164.2 x 76.4 x 7.4 mm (6.46 x 3.01 x 0.29 in)\nWeight	173 g (6.10 oz)\nSIM	Hybrid Dual SIM (Nano-SIM, dual stand-by)\nDISPLAY	Type	Super AMOLED Plus, 120Hz\nSize	6.7 inches, 108.4 cm2 (~86.4% screen-to-body ratio)\nResolution	1080 x 2400 pixels, 20:9 ratio (~393 ppi density)\nPLATFORM	OS	Android 11, One UI 3.1\nChipset	Qualcomm SM7325 Snapdragon 778G 5G (6 nm)\nCPU	Octa-core (4x2.4 GHz Kryo 670 & 4x1.8 GHz Kryo 670)\nGPU	Adreno 642L\nMEMORY	Card slot	microSDXC (uses shared SIM slot)\nInternal	128GB 6GB RAM, 128GB 8GB RAM\nMAIN CAMERA	Triple	64 MP, f/1.8, 26mm (wide), PDAF\n12 MP, f/2.2, 123˚, (ultrawide)\n5 MP, f/2.4, (macro)\nFeatures	LED flash, panorama, HDR\nVideo	4K@30fps, 1080p@30fps\nSELFIE CAMERA	Single	32 MP, f/2.2, (wide)\nVideo	1080p@30fps\nSOUND	Loudspeaker	Yes\n3.5mm jack	No\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot\nBluetooth	5.0, A2DP, LE\nGPS	Yes, with A-GPS, GLONASS, GALILEO, BDS, QZSS\nNFC	Yes\nRadio	Unspecified\nUSB	USB Type-C 2.0, USB On-The-Go\nFEATURES	Sensors	Fingerprint (side-mounted), accelerometer, gyro, proximity, compass\nBATTERY	Type	Li-Ion 5000 mAh, non-removable\nCharging	Fast charging 25W\nMISC	Colors	Icy Blue, Blazing Black, White\nModels	SM-M526BR, SM-M526BR/DS\nSAR EU	0.79 W/kg (head)     1.40 W/kg (body)   ', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:04:26', 150, 300),
	(15, 1, 15, 'Samsung Galaxy S20 6GB (US)', 1, 160000, 10, 'Samsung Galaxy S20 is powered by a 2GHz octa-core Samsung Exynos 990 processor that features 2 cores clocked at 2.73GHz, 2 cores clocked at 2.5GHz and 4 cores clocked at 2GHz. It comes with 8GB of RAM. The Samsung Galaxy S20 runs Android 10 and is powered by a 4000mAh non-removable battery.', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE\nLAUNCH	Announced	2020, February 11\nStatus	Available. Released 2020, March 06\nBODY	Dimensions	151.7 x 69.1 x 7.9 mm (5.97 x 2.72 x 0.31 in)\nWeight	163 g (5.75 oz)\nBuild	Glass front (Gorilla Glass 6), glass back (Gorilla Glass 6), aluminum frame\nSIM	Single SIM (Nano-SIM and/or eSIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\nDISPLAY	Type	Dynamic AMOLED 2X, 120Hz, HDR10+, 1200 nits (peak)\nSize	6.2 inches, 93.8 cm2 (~89.5% screen-to-body ratio)\nResolution	1440 x 3200 pixels, 20:9 ratio (~563 ppi density)\nProtection	Corning Gorilla Glass 6\n 	Always-on display\n120Hz@FHD/60Hz@QHD refresh rate\nPLATFORM	OS	Android 10, upgradable to Android 11, One UI 3.0\nChipset	Exynos 990 (7 nm+) - Global\nQualcomm SM8250 Snapdragon 865 5G (7 nm+) - USA\nCPU	Octa-core (2x2.73 GHz Mongoose M5 & 2x2.50 GHz Cortex-A76 & 4x2.0 GHz Cortex-A55) - Global\nOcta-core (1x2.84 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.8 GHz Kryo 585) - USA\nGPU	Mali-G77 MP11 - Global\nAdreno 650 - USA\nMEMORY	Card slot	microSDXC (uses shared SIM slot)\nInternal	128GB 8GB RAM\n 	UFS 3.0\nMAIN CAMERA	Triple	12 MP, f/1.8, 26mm (wide), 1/1.76", 1.8µm, Dual Pixel PDAF, OIS\n64 MP, f/2.0, 29mm (telephoto), 1/1.72", 0.8µm, PDAF, OIS, 1.1x optical zoom, 3x hybrid zoom\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55" 1.4µm, Super Steady video\nFeatures	LED flash, auto-HDR, panorama\nVideo	8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS & OIS\nSELFIE CAMERA	Single	10 MP, f/2.2, 26mm (wide), 1/3.24", 1.22µm, Dual Pixel PDAF\nFeatures	Dual video call, Auto-HDR\nVideo	4K@30/60fps, 1080p@30fps\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	No\n 	32-bit/384kHz audio', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:13:06', 150, 300),
	(16, 1, 16, 'Samsung S21 Ultra 8GB (US)', 1, 180000, 13, 'The Galaxy S21 Ultra comes in a sleeker design and offers faster performance from Qualcomm\'s Snapdragon 888 chip. And, unlike the regular Galaxy S21, you don\'t have to make nearly as many trade-offs. You get a better main 108MP camera, a glass back (instead of plastic), more RAM, and a higher-res display.', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE / 5G\nLAUNCH	Announced	2021, January 14\nStatus	Available. Released 2021, January 29\nBODY	Dimensions	165.1 x 75.6 x 8.9 mm (6.5 x 2.98 x 0.35 in)\nWeight	227 g (Sub6), 229 g (mmWave) (8.01 oz)\nBuild	Glass front (Gorilla Glass Victus), glass back (Gorilla Glass Victus), aluminum frame\nSIM	Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM and/or eSIM, dual stand-by)\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\nStylus support\nDISPLAY	Type	Dynamic AMOLED 2X, 120Hz, HDR10+, 1500 nits (peak)\nSize	6.8 inches, 112.1 cm2 (~89.8% screen-to-body ratio)\nResolution	1440 x 3200 pixels, 20:9 ratio (~515 ppi density)\nProtection	Corning Gorilla Glass Victus\n 	Always-on display\nPLATFORM	OS	Android 11, One UI 3.1\nChipset	Exynos 2100 (5 nm) - International\nQualcomm SM8350 Snapdragon 888 5G (5 nm) - USA/China\nCPU	Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55) - International\nOcta-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680) - USA/China\nGPU	Mali-G78 MP14 - International\nAdreno 660 - USA/China\nMEMORY	Card slot	No\nInternal	128GB 12GB RAM, 256GB 12GB RAM, 512GB 12GB RAM, 512GB 16GB RAM\n 	UFS 3.1\nMAIN CAMERA	Quad	108 MP, f/1.8, 24mm (wide), 1/1.33", 0.8µm, PDAF, Laser AF, OIS\n10 MP, f/4.9, 240mm (periscope telephoto), 1/3.24", 1.22µm, dual pixel PDAF, OIS, 10x optical zoom\n10 MP, f/2.4, 72mm (telephoto), 1/3.24", 1.22µm, dual pixel PDAF, OIS, 3x optical zoom\n12 MP, f/2.2, 13mm (ultrawide), 1/2.55", 1.4µm, dual pixel PDAF, Super Steady video\nFeatures	LED flash, auto-HDR, panorama\nVideo	8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS\nSELFIE CAMERA	Single	40 MP, f/2.2, 26mm (wide), 1/2.8", 0.7µm, PDAF\nFeatures	Dual video call, Auto-HDR\nVideo	4K@30/60fps, 1080p@30fps\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	No\n 	32-bit/384kHz audio\nTuned by AKG', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:17:42', 300, 600),
	(17, 1, 14, 'Samsung Galaxy Note 20 8GB ', 4, 190000, 24, 'The phone comes with a 6.70-inch touchscreen display with a resolution of 1080x2400 pixels and an aspect ratio of 20:9. Samsung Galaxy Note 20 is powered by a 2.4GHz octa-core Samsung Exynos 990 processor that features 4 cores clocked at 2.4GHz and 4 cores clocked at 1.8GHz. It comes with 8GB of RAM.', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE\nLAUNCH	Announced	2020, August 05\nStatus	Available. Released 2020, August 21\nBODY	Dimensions	161.6 x 75.2 x 8.3 mm (6.36 x 2.96 x 0.33 in)\nWeight	192 g (6.77 oz)\nBuild	Glass front (Gorilla Glass 5), plastic back\nSIM	Single SIM (Nano-SIM and/or eSIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by)\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\nStylus, 26ms latency (Bluetooth integration, accelerometer, gyro)\nDISPLAY	Type	Super AMOLED Plus, HDR10+\nSize	6.7 inches, 108.4 cm2 (~89.2% screen-to-body ratio)\nResolution	1080 x 2400 pixels, 20:9 ratio (~393 ppi density)\nProtection	Corning Gorilla Glass 5\n 	Always-on display\nPLATFORM	OS	Android 10, upgradable to Android 11, One UI 3.0\nChipset	Exynos 990 (7 nm+) - Global\nQualcomm SM8250 Snapdragon 865 5G+ (7 nm+) - USA\nCPU	Octa-core (2x2.73 GHz Mongoose M5 & 2x2.50 GHz Cortex-A76 & 4x2.0 GHz Cortex-A55) - Global\nOcta-core (1x3.0 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.8 GHz Kryo 585) - USA\nGPU	Mali-G77 MP11 - Global\nAdreno 650 - USA\nMEMORY	Card slot	No\nInternal	256GB 8GB RAM\n 	UFS 3.0\nMAIN CAMERA	Triple	12 MP, f/1.8, 26mm (wide), 1/1.76", 1.8µm, Dual Pixel PDAF, OIS\n64 MP, f/2.0, 27mm (telephoto), 1/1.72", 0.8µm, PDAF, OIS, 3x hybrid zoom\n12 MP, f/2.2, 120˚, 13mm (ultrawide), 1/2.55", 1.4µm\nFeatures	LED flash, auto-HDR, panorama\nVideo	8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS & OIS\nSELFIE CAMERA	Single	10 MP, f/2.2, 26mm (wide), 1/3.2", 1.22µm, Dual Pixel PDAF\nFeatures	Dual video call, Auto-HDR\nVideo	4K@30/60fps, 1080p@30fps\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	No\n 	32-bit/384kHz audio\nTuned by AKG', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:20:34', 150, 300),
	(18, 1, 8, 'Xiaomi Redmi Note 10 Prime 8GB ', 5, 95000, 10, 'The Redmi 10 Prime is a bit overpriced but it\'s worth buying because as of now, we don\'t have any other better smartphone at Rs 12,000. It does have a massive 6000mAh battery, good camera, FHD+ display, 18W fast charging support, and much more.', 'ETWORK	Technology	\nGSM / HSPA / LTE\nLAUNCH	Announced	2021, September 03\nStatus	Available. Released 2021, September 07\nBODY	Dimensions	161.2 x 75.6 x 9.6 mm (6.35 x 2.98 x 0.38 in)\nWeight	192 g (6.77 oz)\nSIM	Dual SIM (Nano-SIM, dual stand-by)\n 	Dust & splash proof\nDISPLAY	Type	LCD, 90Hz\nSize	6.5 inches, 102.0 cm2 (~83.7% screen-to-body ratio)\nResolution	1080 x 2400 pixels, 20:9 ratio (~405 ppi density)\nProtection	Corning Gorilla Glass 3\nPLATFORM	OS	Android 11, MIUI 12.5\nChipset	MediaTek Helio G88 (12nm)\nCPU	Octa-core (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)\nGPU	Mali-G52 MC2\nMEMORY	Card slot	microSDXC (dedicated slot)\nInternal	64GB 4GB RAM, 128GB 6GB RAM\n 	eMMC 5.1\nMAIN CAMERA	Quad	50 MP, f/1.8, (wide), PDAF\n8 MP, f/2.2, 120˚ (ultrawide)\n2 MP, f/2.4, (macro)\n2 MP, f/2.4 (depth)\nFeatures	LED flash, HDR, panorama\nVideo	1080p@30fps\nSELFIE CAMERA	Single	8 MP, f/2.0, (wide)\nVideo	1080p@30fps\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	Yes\n 	24-bit/192kHz audio\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\nBluetooth	5.1, A2DP, LE\nGPS	Yes, with A-GPS, GLONASS, GALILEO, BDS\nNFC	No\nInfrared port	Yes\nRadio	FM radio\nUSB	USB Type-C 2.0', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:29:05', 200, 300),
	(19, 1, 7, 'Xiaomi Mi 11 8GB  128GB(US)', 6, 165000, 5, 'Xiaomi Mi 11 is powered by an octa-core Qualcomm Snapdragon 888 processor. It comes with 8GB of RAM. The Xiaomi Mi 11 runs Android 11 and is powered by a 4,600mAh non-removable battery. ... The Xiaomi Mi 11 runs MIUI 12 is based on Android 11 and packs 128GB of inbuilt storage.', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE / 5G\nLAUNCH	Announced	2021, March 29\nStatus	Available. Released 2021, April 02\nBODY	Dimensions	164.3 x 74.6 x 8.4 mm (6.47 x 2.94 x 0.33 in)\nWeight	234 g (8.25 oz)\nBuild	Glass front (Gorilla Glass Victus), ceramic back, aluminum frame\nSIM	Dual SIM (Nano-SIM, dual stand-by)\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\nDISPLAY	Type	AMOLED, 1B colors, 120Hz, HDR10+, Dolby Vision, 900 nits (HBM), 1700 nits (peak)\nSize	6.81 inches, 112.0 cm2 (~91.4% screen-to-body ratio)\nResolution	1440 x 3200 pixels, 20:9 ratio (~515 ppi density)\nProtection	Corning Gorilla Glass Victus\nPLATFORM	OS	Android 11, MIUI 12.5\nChipset	Qualcomm SM8350 Snapdragon 888 5G (5 nm)\nCPU	Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)\nGPU	Adreno 660\nMEMORY	Card slot	No\nInternal	256GB 8GB RAM, 256GB 12GB RAM, 512GB 12GB RAM\n 	UFS 3.1\nMAIN CAMERA	Triple	50 MP, f/2.0, 24mm (wide), 1/1.12", 1.4µm, Dual Pixel PDAF, Laser AF, OIS\n48 MP, f/4.1, 120mm (periscope telephoto), 1/2.0", 0.8µm, PDAF, OIS, 5x optical zoom\n48 MP, f/2.2, 12mm, 128˚ (ultrawide), 1/2.0", 0.8µm, PDAF\nFeatures	Dual-LED flash, HDR, panorama, 1.1” AMOLED selfie display\nVideo	8K@24fps, 4K@30/60fps, 1080p@30/60/120/240/960/1920fps, gyro-EIS, HDR10+ rec.\nSELFIE CAMERA	Single	20 MP, f/2.2, 27mm (wide), 1/3.4", 0.8µm\nFeatures	HDR, panorama\nVideo	1080p@30/60fps, 720p@120fps, gyro-EIS\nSOUND	Loudspeaker	Yes, with stereo speakers\n3.5mm jack	No\n 	24-bit/192kHz audio\nTuned by Harman Kardon\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, DLNA, hotspot\nBluetooth	5.2, A2DP, LE, aptX HD\nGPS	Yes, with dual-band A-GPS, GLONASS, GALILEO, QZSS, NavIC, BDS (tri-band)\nNFC	Yes\nInfrared port	Yes\nRadio	No\nUSB	USB Type-C 2.0, USB On-The-Go\nFEATURES	Sensors	Fingerprint (under display, optical), accelerometer, gyro, proximity, compass, color spectrum\nBATTERY	Type	Li-Po 5000 mAh, non-removable\nCharging	Fast charging 67W, 100% in 36 min (advertised)\nFast wireless charging 67W, 100% in 39 min (advertised)\nReverse wireless charging 10W\nQuick Charge 4+\nPower Delivery 3.0', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:35:01', 150, 250),
	(20, 1, 12, 'Vivo X70 Pro Plus 8GB (C)', 1, 170000, 15, 'The smartphone consists of quad-camera: 50 MP (wide) + 8 MP (periscope telephoto) + 12 (telephoto) + 48 MP (ultrawide). On the front, there is a single camera consist of 32 MP (wide).', 'NETWORK	Technology	\nGSM / CDMA / HSPA / EVDO / LTE / 5G\nLAUNCH	Announced	2021, September 09\nStatus	Available. Released 2021, September 17\nBODY	Dimensions	164.5 x 75.2 x 8.9 mm (6.48 x 2.96 x 0.35 in)\nWeight	209 g / 213 g (7.37 oz)\nSIM	Dual SIM (Nano-SIM, dual stand-by)\n 	IP68 dust/water resistant (up to 1.5m for 30 mins)\nDISPLAY	Type	LTPO AMOLED, 1B colors, 120Hz, HDR10+, 500 nits (typ), 1000 nits (HBM), 1500 nits (peak)\nSize	6.78 inches, 111.4 cm2 (~90.1% screen-to-body ratio)\nResolution	1440 x 3200 pixels, 20:9 ratio (~517 ppi density)\nPLATFORM	OS	Android 11, Funtouch OS 12 (International), OriginOS 1.0 (China)\nChipset	Qualcomm SM8350 Snapdragon 888+ 5G (5 nm)\nCPU	Octa-core (1x3.0 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680\nGPU	Adreno 660\nMEMORY	Card slot	No\nInternal	256GB 8GB RAM, 256GB 12GB RAM, 512GB 12GB RAM\n 	UFS 3.1', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:39:42', 150, 300),
	(21, 1, 9, 'OnePlus Nord 2 8GB (US)', 1, 120000, 10, 'A worthy successor for the first OnePlus Nord on all counts, and arguably the best, value-for-money phone OnePlus currently offers. The OnePlus Nord 2 is a surprisingly powerful phone that not just offers better value for money than the OnePlus 9 series phones, but also flaunts a couple of extra features.', 'NETWORK	Technology	\nGSM / HSPA / LTE / 5G\nLAUNCH	Announced	2021, July 22\nStatus	Available. Released 2021, July 28\nBODY	Dimensions	158.9 x 73.2 x 8.3 mm (6.26 x 2.88 x 0.33 in)\nWeight	189 g (6.67 oz)\nBuild	Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), plastic frame\nSIM	Dual SIM (Nano-SIM, dual stand-by)\nDISPLAY	Type	Fluid AMOLED, 90Hz, HDR10+\nSize	6.43 inches, 99.8 cm2 (~85.8% screen-to-body ratio)\nResolution	1080 x 2400 pixels, 20:9 ratio (~409 ppi density)\nProtection	Corning Gorilla Glass 5\nPLATFORM	OS	Android 11, OxygenOS 11.3\nChipset	MediaTek MT6893 Dimensity 1200 5G (6 nm)\nCPU	Octa-core (1x3.0 GHz Cortex-A78 & 3x2.6 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55)\nGPU	Mali-G77 MC9\nMEMORY	Card slot	No\nInternal	128GB 6GB RAM, 128GB 8GB RAM, 256GB 12GB RAM\n 	UFS 3.1\nMAIN CAMERA	Triple	50 MP, f/1.9, 24mm (wide), 1/1.56", 1.0µm, PDAF, OIS\n8 MP, f/2.3, 119˚ (ultrawide)\n2 MP, f/2.4, (monochrome)\nFeatures	Dual-LED flash, HDR, panorama\nVideo	4K@30fps, 1080p@30/60/240fps, gyro-EIS\nSELFIE CAMERA	Single	32 MP, f/2.5, (wide), 1/2.8", 0.8µm\nFeatures	Auto HDR\nVideo	1080p@30fps, gyro-EIS\nSOUND	Loudspeaker	Yes, with stereo speakers', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-10-28 02:44:39', 150, 300),
	(26, 1, 10, 'Realme 8i 12GB 128GB ', 1, 23123, 12, 'OS -Android 11, Realme UI 2.0\nChipset - Mediatek Helio G96 (12 nm)\nCPU - Octa-core (2x2.05 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)\nGPU - Mali-G57 MC2', 'NETWORK	Technology	\nGSM / HSPA / LTE\nLAUNCH	Announced	2021, September 09\nStatus	Available. Released 2021, September 14\nBODY	Dimensions	164.1 x 75.5 x 8.5 mm (6.46 x 2.97 x 0.33 in)\nWeight	194 g (6.84 oz)\nBuild	Glass front, plastic frame, plastic back\nSIM	Dual SIM (Nano-SIM, dual stand-by)\nDISPLAY	Type	IPS LCD, 120Hz, 600 nits (peak)\nSize	6.6 inches, 104.8 cm2 (~84.6% screen-to-body ratio)\nResolution	1080 x 2412 pixels, 20:9 ratio (~400 ppi density)\nPLATFORM	OS	Android 11, Realme UI 2.0\nChipset	Mediatek Helio G96 (12 nm)\nCPU	Octa-core (2x2.05 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)\nGPU	Mali-G57 MC2\nMEMORY	Card slot	microSDXC (dedicated slot)\nInternal	64GB 4GB RAM, 128GB 4GB RAM, 128GB 6GB RAM\n 	UFS 2.1\nMAIN CAMERA	Quad	50 MP, f/1.8, 26mm (wide), 1/2.76", 0.64µm, PDAF\n2 MP, f/2.4, (macro)\n2 MP, f/2.4, (depth)\nFeatures	LED flash, HDR, panorama\nVideo	1080p@30fps', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-11-03 19:51:48', 150, 350),
	(27, 5, 19, 'Samsung Earbuds 2 (Genuine)', 5, 25000, 10, 'Get lost in what you love. Galaxy Buds2 open a new world of sound with well-balanced audio, lightweight comfort fit, Active Noise Cancellation and seamless connectivity to your Galaxy phone and watch.1 Intuitive controls and powerful sound keep you immersed when working out, gaming or jamming to your beats.\n\n', 'Specifications\nDesign\nColors\nGalaxy Buds2 earbuds in Olive.\nOlive\n\nGalaxy Buds2 earbuds in Lavender.\nLavender\n\nGalaxy Buds2 earbuds in White.\nWhite\n\nGalaxy Buds2 earbuds in Graphite.\nGraphite\n\nDimensions & Weight\nIllustration of Galaxy Buds2 earbuds to show dimensions.\nEarbud\nDimensions: 17.0 x 20.9 x 21.1mm\nWeight: 5.0g\n\nIllustration of Galaxy Buds2 charging case, seen closed and from the top to show dimensions.Illustration of Galaxy Buds2 charging case, seen closed and from the side to show dimensions.\nCharging Case\nDimensions: 50.2 x 50.0 x 27.8mm\nWeight: 41.2g\n\nPerformance\nChipset\nBES2500ZP\nOS\nRTOS\nSpeaker\nDynamic 2 Way : Woofer & Tweeter\nMic\n3 Mics + VPU\nConnectivity\nBluetooth : 5.2\nBT Profile : HFP, A2DP, AVRCP\nCodec : Scalable (Samsung proprietary), AAC, SBC\nBattery\nPlay time\n5h / TTL 20h (ANC ON)\n*Bixby voice wake-up OFF\n\n 7.5h / TTL 29h (ANC Off)\nTalk time\n3.5h / TTL 13h (ANC ON) 3.5h / TTL 14h (ANC Off)\nQuick charging\n40min play / 3min charging (Wired, Wireless, D2D)\n60min play / 5min charging (Wired, Wireless, D2D)\n150min play / 10min charging (Wired, Wireless)\n*ANC off condition\n*In case of wireless charging, Galaxy Buds2 should be put on the center of the charger in ordinary temperature\n*Charging time is based on that battery power in earbuds is less than 30% when start charging\n*Based on internal testing. Audio playback time tested by pairing a pre-production Galaxy Buds2 to a recently released Galaxy smartphone. Actual battery life and charging time may vary by usage conditions, number of times charged and many other factors.\n*Play time may vary based on settings.\n\nSensor\nAccelerometer, Gyro, Proximity, Hall, Touch, VPU(Voice Pickup Unit)\nCompatibility\nAndroid\nDevices running Android 7.0 higher, with over 1.5GB of RAM\n\nPC Buds Manager\nDownloadable thru MS App. Store (Avail. above Win 10)\n\nConvenience\nAuto Switch, Bixby voice wake-up', 1, 'tharinduwijayarathne87@gmail.com', 1, '2021-11-05 00:42:37', 150, 300);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table mintstore.profile_img
DROP TABLE IF EXISTS `profile_img`;
CREATE TABLE IF NOT EXISTS `profile_img` (
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`code`),
  KEY `FK__user` (`user_email`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.profile_img: ~0 rows (approximately)
DELETE FROM `profile_img`;
/*!40000 ALTER TABLE `profile_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_img` ENABLE KEYS */;

-- Dumping structure for table mintstore.province
DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.province: ~2 rows (approximately)
DELETE FROM `province`;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'Central'),
	(2, 'Western');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table mintstore.recent
DROP TABLE IF EXISTS `recent`;
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_product1_idx` (`product_id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.recent: ~23 rows (approximately)
DELETE FROM `recent`;
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` (`id`, `product_id`, `user_email`) VALUES
	(16, 20, 'tharinduwijayarathna8206@gmail.com'),
	(41, 12, 'tharinduwijayarathne87@gmail.com'),
	(42, 11, 'tharinduwijayarathne87@gmail.com'),
	(43, 10, 'tharinduwijayarathne87@gmail.com'),
	(44, 13, 'tharinduwijayarathne87@gmail.com'),
	(45, 16, 'tharinduwijayarathne87@gmail.com'),
	(46, 15, 'tharinduwijayarathne87@gmail.com'),
	(47, 18, 'tharinduwijayarathne87@gmail.com'),
	(48, 10, 'tharinduwijayarathne87@gmail.com'),
	(49, 12, 'tharinduwijayarathne87@gmail.com'),
	(50, 14, 'tharinduwijayarathne87@gmail.com'),
	(51, 20, 'tharinduwijayarathne87@gmail.com'),
	(52, 17, 'tharinduwijayarathne87@gmail.com'),
	(53, 11, 'tharinduwijayarathne87@gmail.com'),
	(54, 21, 'tharinduwijayarathne87@gmail.com'),
	(55, 11, 'tharinduwijayarathne87@gmail.com'),
	(56, 19, 'tharinduwijayarathne87@gmail.com'),
	(57, 11, 'tharinduwijayarathne87@gmail.com'),
	(58, 26, 'tharinduwijayarathne87@gmail.com'),
	(59, 27, 'tharinduwijayarathne87@gmail.com'),
	(60, 12, 'tharinduwijayarathne87@gmail.com'),
	(61, 10, 'tharinduwijayarathne87@gmail.com'),
	(62, 19, 'tharinduwijayarathne87@gmail.com');
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;

-- Dumping structure for table mintstore.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL,
  `name` varchar(14) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.status: ~2 rows (approximately)
DELETE FROM `status`;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table mintstore.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_status` (`status_id`),
  CONSTRAINT `fk_user_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.user: ~4 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `register_date`, `verification_code`, `status_id`) VALUES
	('kasun2005@gmail.com', 'Kasun', 'Wijayarathna', 'Tharindu123', '0723429986', '2021-10-29 03:27:45', '617d398fcd314', 1),
	('tharinduwijayarathna8206@gmail.com', 'Tharindu', 'Wijayarathna', '617b127b142b5', '0765781398', '2021-10-29 02:43:31', NULL, 1),
	('tharinduwijayarathne87@gmail.com', 'Tharindu', 'Wijayarathna', '617efbc82e8c9', '0765781398', '2021-11-01 01:55:44', '6182b960cd04d', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table mintstore.user_has_address
DROP TABLE IF EXISTS `user_has_address`;
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `line1` text CHARACTER SET utf8,
  `line2` text CHARACTER SET utf8,
  `location_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_location1_idx` (`location_id`),
  CONSTRAINT `fk_user_has_address_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.user_has_address: ~3 rows (approximately)
DELETE FROM `user_has_address`;
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `user_email`, `line1`, `line2`, `location_id`) VALUES
	(2, 'tharinduwijayarathna8206@gmail.com', 'No 79, Hapugoda,', 'Ambatenne', 2),
	(4, 'tharinduwijayarathne87@gmail.com', 'No 79, Hapugoda', 'Ambatenne', 4);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;

-- Dumping structure for table mintstore.wishlist
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table mintstore.wishlist: ~1 rows (approximately)
DELETE FROM `wishlist`;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` (`id`, `product_id`, `user_email`) VALUES
	(21, 21, 'tharinduwijayarathne87@gmail.com'),
	(24, 10, 'tharinduwijayarathne87@gmail.com'),
	(25, 11, 'tharinduwijayarathne87@gmail.com'),
	(26, 12, 'tharinduwijayarathne87@gmail.com'),
	(27, 13, 'tharinduwijayarathne87@gmail.com'),
	(28, 14, 'tharinduwijayarathne87@gmail.com'),
	(29, 15, 'tharinduwijayarathne87@gmail.com'),
	(30, 16, 'tharinduwijayarathne87@gmail.com'),
	(31, 17, 'tharinduwijayarathne87@gmail.com'),
	(32, 18, 'tharinduwijayarathne87@gmail.com');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
