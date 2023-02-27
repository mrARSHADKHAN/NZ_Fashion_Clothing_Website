-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for nz_fashion
CREATE DATABASE IF NOT EXISTS `nz_fashion` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nz_fashion`;

-- Dumping structure for table nz_fashion.admin_msg
CREATE TABLE IF NOT EXISTS `admin_msg` (
  `am_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(130) NOT NULL,
  `user_id` varchar(130) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(1) NOT NULL,
  `cm_id` varchar(50) NOT NULL,
  PRIMARY KEY (`am_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='customer message';

-- Dumping data for table nz_fashion.admin_msg: ~10 rows (approximately)
/*!40000 ALTER TABLE `admin_msg` DISABLE KEYS */;
INSERT INTO `admin_msg` (`am_id`, `cus_id`, `user_id`, `message`, `status`, `cm_id`) VALUES
	(1, 'arshad@gmail.com', 'admin@admin.com', 'Yes available, please check the gallery.', '0', '5'),
	(2, 'mohammed@gmail.com', 'admin@admin.com', 'Yes available.', '0', '2'),
	(3, 'usera@gmail.com', 'admin@admin.com', 'hello...', '0', '4'),
	(4, 'usera@gmail.com', 'admin@admin.com', 'how can i help you?', '0', '4'),
	(5, 'arshad@gmail.com', 'admin@admin.com', 'new latest shoes are available on the gallery', '0', '5'),
	(6, 'arshad@gmail.com', 'admin@admin.com', 'also new men\'s accessories are added in the products page don\'t forget to check out.', '0', '5'),
	(7, 'arshad@gmail.com', 'admin@admin.com', 'please check, thank you', '0', '7'),
	(8, 'usera@gmail.com', 'admin@admin.com', 'yes we will update soon, thank you', '0', '8'),
	(9, 'userb@gmail.com', 'admin@admin.com', 'yes you can', '0', '10'),
	(10, 'usera@gmail.com', 'staff@staff.com', 'we updated the products, please check on the gallery page.', '0', '8');
/*!40000 ALTER TABLE `admin_msg` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(33) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(50) NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `pro_quantity` varchar(50) NOT NULL DEFAULT '0',
  `size` varchar(50) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='cart table';

-- Dumping data for table nz_fashion.cart: ~8 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cart_id`, `cus_id`, `pro_id`, `pro_quantity`, `size`) VALUES
	(2, 'usera@gmail.com', '3', '2', 'M'),
	(3, 'arshad@gmail.com', '2', '2', 'M'),
	(5, 'arshad@gmail.com', '3', '1', 'M'),
	(6, 'arshad@gmail.com', '1', '2', 'S'),
	(10, 'mohammed@gmail.com', '9', '1', 'M'),
	(11, 'mohammed@gmail.com', '7', '1', 'M'),
	(15, 'usera@gmail.com', '8', '2', 'M'),
	(17, 'userb@gmail.com', '1', '1', 'M');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.customer_logs
CREATE TABLE IF NOT EXISTS `customer_logs` (
  `cus_id` varchar(100) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL DEFAULT '',
  `cus_acc_code` varchar(100) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Customer Logins';

-- Dumping data for table nz_fashion.customer_logs: ~5 rows (approximately)
/*!40000 ALTER TABLE `customer_logs` DISABLE KEYS */;
INSERT INTO `customer_logs` (`cus_id`, `cus_name`, `contact`, `cus_acc_code`) VALUES
	('arshad@gmail.com', 'Arshad', '0770245365', 'arro2dGaP0XkI'),
	('mohammed@gmail.com', 'Mohammed', '0780245632', 'mo76iD0L6fTh6'),
	('ravi@gmail.com', 'Ravi', '0753654789', 'rakbOzu3gK8i.'),
	('usera@gmail.com', 'User A', '0782546545', 'us9H1k1zTuTxo'),
	('userb@gmail.com', 'User B', '0780221653', 'usan0HLYR1KMk');
/*!40000 ALTER TABLE `customer_logs` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.customer_msg
CREATE TABLE IF NOT EXISTS `customer_msg` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(130) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `user_id` varchar(130) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='customer message';

-- Dumping data for table nz_fashion.customer_msg: ~11 rows (approximately)
/*!40000 ALTER TABLE `customer_msg` DISABLE KEYS */;
INSERT INTO `customer_msg` (`cm_id`, `cus_id`, `cus_name`, `user_id`, `message`, `status`) VALUES
	(1, 'mohammed@gmail.com', 'Mohammed', '', 'Hello sir, is there any cotton shirts available?', '1'),
	(2, 'mohammed@gmail.com', 'Mohammed', '', 'Available sir?', '1'),
	(3, 'usera@gmail.com', 'User A', '', 'Hi sir', '1'),
	(4, 'usera@gmail.com', 'User A', '', 'Reply soon.\r\nPlease', '1'),
	(5, 'arshad@gmail.com', 'Arshad', '', 'Hello, is latest shoes are available?', '1'),
	(6, 'arshad@gmail.com', 'Arshad', '', 'Thank you', '1'),
	(7, 'arshad@gmail.com', 'Arshad', '', 'Yes im looking for men\'s accessories ', '1'),
	(8, 'usera@gmail.com', 'User A', '', 'can you update latest products\'', '1'),
	(9, 'userb@gmail.com', 'User B', '', 'hello sir', '1'),
	(10, 'userb@gmail.com', 'User B', '', 'can i order bundles of shirts?', '1'),
	(11, 'userb@gmail.com', 'User B', '', 'thank you sir\r\n', '0');
/*!40000 ALTER TABLE `customer_msg` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `user_id` varchar(130) NOT NULL,
  `name` varchar(130) NOT NULL,
  `access_code` varchar(130) NOT NULL,
  `role` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='login credentials';

-- Dumping data for table nz_fashion.logs: ~3 rows (approximately)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`user_id`, `name`, `access_code`, `role`, `picture`) VALUES
	('admin@admin.com', 'Arshad', 'adpexzg3FUZAk', 'admin', 'profile-img.jpg'),
	('admin@nzfashion.com', 'Administrator', 'adpexzg3FUZAk', 'admin', 'default.jpg'),
	('staff@staff.com', 'Alice', 'stft9noDq.5V2', 'staff', 'messages-2.jpg');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.products
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(33) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `size` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `picture` varchar(150) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='products table';

-- Dumping data for table nz_fashion.products: ~23 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`pro_id`, `pro_name`, `category`, `size`, `price`, `brand`, `description`, `picture`) VALUES
	(1, 'POLO IN NAVY', 'T-Shirts', 'M', 2000, 'POLO', 'MADE IN L.A. TIPPED MONTAUK\r\n-Slub-Spun Jersey\r\n-100% garment dyed cotton.\r\n-Buttonless placket.\r\n-Made in USA\r\n-Machine wash.\r\n-Style Number KN6277411', '1_19657890659890560201454691531.jpg'),
	(2, 'White Swatter', 'T-Shirts', 'M', 2500, 'POLO', 'ITALIAN COTTON SILK SWATTER\r\n-55% Silk 45% Cotton from Italy.\r\n-Classic fit. \r\n-Contrast tipping.\r\n-Shell buttons.\r\n-Imported.\r\n-Dry Clean.\r\n-SW4739268', '2_3246657913343600311785981549.jpg'),
	(3, 'RIVIERA SWEATER', 'T-Shirts', 'M', 2300, 'POLO', 'ITALIAN COTTON SILK\r\n-55% Silk 45% Cotton from Italy.\r\n-Classic fit. \r\n-Contrast tipping.\r\n-Shell buttons.\r\n-Imported.', '3_139956265214719457861182770685.jpg'),
	(5, 'FULL PLACKET NAVY', 'Shirts', 'L', 3000, 'POLO', 'MADE IN L.A. MONTAUK TIPPED\r\nManufactured in a legendary Los Angeles factory from premium imported cotton', '5_563606254211656933715331001.jpg'),
	(6, 'RIVIERA SWEATER', 'T-Shirts', 'L', 2600, 'POLO', 'ITALIAN COTTON SILK TIPPED RIVIERA SWEATER POLO IN IVORY\r\n55% Silk 45% Cotton from Italy.\r\nClassic fit. \r\nContrast tipping.\r\nShell buttons.\r\nImported.', '6_418917514897548768927856710.jpg'),
	(7, 'Blue Sneaker', 'Shoes', 'M', 4000, 'Vans', 'Original style number\r\nVintage-inspired canvas uppers\r\nOrtholite® sockliners\r\nHigher glossed foxing tape\r\nCotton laces', '7_139138358715705227261942431907.jpg'),
	(8, 'Blue Sneaker', 'Shoes', 'L', 4000, 'Vans', 'Original style number\r\nVintage-inspired canvas uppers\r\nOrtholite® sockliners\r\nHigher glossed foxing tape\r\nCotton laces', '8_18196284371968891056879629907.jpg'),
	(9, 'CLASSIC CHECKERBOARD SNEAKER', 'Shoes', 'M', 5000, 'Vans', 'CLASSIC SLIP ON IN CHECKERBOARD\r\nComposition: Textile\r\nMen\'s sizes only', '9_20118188361239344782736316406.jpg'),
	(10, 'BLUE STRECH DENIM', 'Trousers', 'M', 6500, 'TOD SYNDER', 'BLUE STRECH DENIM\r\n85.5% cotton, 13.5% polyester, 1% Elastane\r\n12.5oz denim\r\nSlim fit\r\nLeg opening circumference: 14"(based on size 32w)\r\nOur most popular wash, a lightly faded vintage blue jean\r\nRoom at the top but tailored through the leg\r\nZipper fly', '10_13910530481591882134902654133.jpg'),
	(11, 'BLUE STRECH DENIM', 'Trousers', 'M', 5000, 'TOD SYNDER', '85.5% cotton, 13.5% polyester, 1% Elastane\r\n12.5oz denim\r\nSlim fit\r\nLeg opening circumference: 14"(based on size 32w)\r\nOur most popular wash, a lightly faded vintage blue jean\r\nRoom at the top but tailored through the leg\r\nZipper fly', '11_5038249701888545113673840029.jpg'),
	(12, 'LIGHT BLUE DENIM', 'Trousers', 'L', 5000, 'TOD SYNDER', 'LIGHT BLUE DENIM\r\n\r\nRoom at the top but tailored through the leg\r\nZipper fly\r\nClassic five pocket construction\r\nAntique copper rivets\r\nChain stitching on the coin pocket\r\nMachine Wash', '12_64986202223267464167371999.jpg'),
	(13, 'DENIM SHIRT', 'Shirts', 'S', 2300, 'MASS', 'JAPANESE DENIM OVERSHIRT IN STONE WASH\r\n\r\n100% Cotton\r\nJapanese fabric\r\nFits similar to our other overshirts; relaxed enough to layer\r\nGenuine melamine buttons\r\nContrast stitching reminiscent of vintage denim\r\nMachine Was', '13_614220711623602623506044961.jpg'),
	(14, 'DENIM SHIRT', 'Shirts', 'S', 2300, 'MASS', 'DENIM SHIRT\r\n\r\n100% Cotton\r\nJapanese fabric\r\nFits similar to our other overshirts; relaxed enough to layer\r\nGenuine melamine buttons\r\nContrast stitching reminiscent of vintage denim\r\nMachine Was', '14_34987495516489749071768653769.jpg'),
	(15, 'BROWN BOOTS', 'Shoes', 'S', 4100, 'NIKE', 'BROWN BOOTS NIKE\r\n\r\nAvailable in Tan, Tobacco, Grey and Olive.\r\n\r\nItalian Suede\r\n12mm Rubber Sole\r\nMade in Italy', '15_169461576510076313951700148027.jpg'),
	(16, 'BROWN BOOTS', 'Shoes', 'S', 4200, 'NIKE', 'Available in Tan, Tobacco, Grey and Olive.\r\nBOOTS NIKE\r\n\r\nItalian Suede\r\n12mm Rubber Sole\r\nMade in Italy', '16_1530302562176752957977456183.jpg'),
	(17, 'BLUE SPIRAL BELT', 'Accessories', 'S', 1200, 'MASS', 'Stretch Woven Belt\r\n\r\nFull Grain Leather Detailing\r\nBrass Buckle\r\nFits small, take 2 sizes larger than normal\r\nMade in Italy', '17_14293864161045553850786866746.jpg'),
	(18, 'TIMEX EXPEDITION ', 'Watches', 'M', 12000, 'TIMEX', 'Product: TW2V00700JR\r\nCase Width: 38 mm\r\nCase Material: Stainless Steel\r\nBand Color: Brown\r\nBuckle/Clasp: Buckle\r\nCase Color: Stainless Steel\r\nCase Finish: Brushed/Beadblast\r\nCase Shape: Round', '18_17986187775800240941393947134.jpg'),
	(19, 'TIMEX BROWN LEATHER', 'Watches', 'M', 14000, 'TIMEX', 'Dimensions: 38mm case; 18mm lug; 13mm height\r\n\r\nWater Resistance: 50 meter\r\n\r\nWrist Profile: Mens (150 / 183 / 205)\r\n\r\nCrystal: Acrylic\r\n\r\nQuick-Release Horween Leather Strap', '19_205471065314709216112011253181.jpg'),
	(20, 'TIMEX MARLIN LEATHER', 'Watches', 'M', 15000, 'TIMEX', 'TIMEX MARLIN LEATHER STRAP\r\n\r\nCase Material: Stainless Steel\r\nBand Color: Blue\r\nBuckle/Clasp: Buckle\r\nCase Color: Stainless Steel\r\nCase Finish: Brushed/Polished\r\nCase Shape: Round\r\nCase Size: Full Size\r\nCrystal/Lens: Acrylic\r\nDial Color: Blue', '20_12620532241850566287826391118.jpg'),
	(21, 'ITALIAN SHIRT JACKET', 'Shirts', 'L', 3000, 'TOD SYNDER', '00% Wool\r\nMade in Italy\r\nBrushed finish\r\nTwo oversize chest pockets\r\nGenuine horn buttons\r\nBoxy fit\r\nFor a more tailored fit please size down', '21_1694189644880486150969837333.jpg'),
	(22, 'ITALIAN WOOL COAT', 'Shirts', 'L', 4000, 'TOD SYNDER', 'Made in Italy\r\nBrushed finish\r\nTwo oversize chest pockets\r\nGenuine horn buttons\r\nBoxy fit\r\nFor a more tailored fit please size down\r\nDry Clean', '22_708290888460695237199768671.jpg'),
	(23, 'SLIM FIT JEAN', 'Trousers', 'L', 4300, 'EDVIN', 'SLIM FIT LIGHTWEIGHT JAPANESE SELVEDGE JEAN\r\n100% cotton\r\n11oz denim\r\nSlim fit \r\nLeg opening circumference: 14"(based on size 32w).\r\nImported Japanese Selvedge\r\nGenuine Selvedge \r\nDue to the rigid nature of this high-quality denim, we suggest you size up for a more comfortable fit\r\nShank button fly', '23_107542404917033407691855827647.jpg'),
	(24, 'CLASSIC FIT JEAN', 'Trousers', 'M', 4300, 'EDVIN', '100% Cotton\r\n12.5oz Denim\r\nAntique Copper Rivets\r\nClassic Fit\r\nFully Relaxed, With a Slightly Tailored Leg\r\nRoomier in the Thighs Than Our Straight Fit\r\nLeg Opening Circumference: 16.5” (Based on a 32W)\r\nVintage-Inspired Shank Button Fly', '24_18037381099298443682046127652.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.products_archive
CREATE TABLE IF NOT EXISTS `products_archive` (
  `pro_id` int(33) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `size` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `picture` varchar(150) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`pro_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='products table';

-- Dumping data for table nz_fashion.products_archive: ~1 rows (approximately)
/*!40000 ALTER TABLE `products_archive` DISABLE KEYS */;
INSERT INTO `products_archive` (`pro_id`, `pro_name`, `category`, `size`, `price`, `brand`, `description`, `picture`) VALUES
	(4, ' RIVIERA SWEATER', 'Shirts', 'M', 2300, 'POLO', 'ITALIAN COTTON SILK\r\n55% Silk 45% Cotton from Italy.\r\nClassic fit. \r\nContrast tipping.\r\nShell buttons.', '4_164852895110551568591827466036.jpg');
/*!40000 ALTER TABLE `products_archive` ENABLE KEYS */;

-- Dumping structure for table nz_fashion.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wis_id` int(33) NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(50) NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `pro_quantity` varchar(50) NOT NULL DEFAULT '1',
  `size` varchar(50) NOT NULL DEFAULT 'M',
  PRIMARY KEY (`wis_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='cart table';

-- Dumping data for table nz_fashion.wishlist: ~6 rows (approximately)
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` (`wis_id`, `cus_id`, `pro_id`, `pro_quantity`, `size`) VALUES
	(18, 'usera@gmail.com', '8', '1', 'M'),
	(19, 'usera@gmail.com', '7', '1', 'M'),
	(21, 'userb@gmail.com', '2', '1', 'M'),
	(24, 'userb@gmail.com', '11', '1', 'M'),
	(25, 'usera@gmail.com', '21', '1', 'M'),
	(26, 'arshad@gmail.com', '16', '1', 'M');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
