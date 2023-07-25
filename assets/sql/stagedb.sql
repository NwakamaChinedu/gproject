-- Adminer 4.8.1 MySQL 5.6.51 dump
-- Try to use Adminer to upload the database to avoid unecessary errors

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `stagedb`;
CREATE DATABASE `stagedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `stagedb`;

DROP TABLE IF EXISTS `found_table`;
CREATE TABLE `found_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `student_staff_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `phone_number` int(11) NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `item_color` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `item_description` text COLLATE utf8mb4_bin,
  `date_found` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `found_table` (`id`, `first_name`, `last_name`, `student_staff_id`, `email`, `phone_number`, `location`, `item_name`, `item_type`, `item_color`, `item_description`, `date_found`, `image`, `status`) VALUES
(5,	'BLESSING',	'ADEJIMI',	2214666,	'blessingtitilayo69@gmail.com',	2147483647,	'RGU campus',	'Purse',	'wallet',	'blue',	'dof hf',	'2023-02-20',	'/assets/uploads/no-image.png',	1),
(28,	'RGU',	'Unwana',	345245345,	'dfv@efg.com',	324245345,	'Vegas',	'money bag',	'dollars',	'money color',	'100 bill stack',	'2023-02-20',	'/assets/uploads/no-image.png',	0),
(29,	'srgdg',	'dfgdfgdfgd',	2345678,	'lkfmd@dlkfg.com',	2147483647,	'dfgbdgf',	'dfgbdfgbd',	'dfbgdfgbdgb',	'fgbfgdgbdgfb',	'dfgbdhfbdgfhdbgf dfghdfgjh dfgjh',	'2023-03-19',	'/assets/uploads/no-image.png',	0),
(30,	'srgdg',	'dfgdfgdfgd',	2345678,	'lkfmd@dlkfg.com',	2147483647,	'dfgbdgf',	'dfgbdfgbd',	'dfbgdfgbdgb',	'fgbfgdgbdgfb',	'dfgbdhfbdgfhdbgf dfghdfgjh dfgjh',	'2023-03-19',	'/assets/uploads/no-image.png',	0),
(31,	'srgdg',	'dfgdfgdfgd',	2345678,	'lkfmd@dlkfg.com',	2147483647,	'dfgbdgf',	'dfgbdfgbd',	'dfbgdfgbdgb',	'fgbfgdgbdgfb',	'dfgbdhfbdgfhdbgf dfghdfgjh dfgjh',	'2023-03-19',	'/assets/uploads/no-image.png',	0),
(32,	'Ibile',	'Babatunde',	542567,	'tony1@gmail.com',	2147483647,	'Sir Ian Wood Building',	'Jacket',	'Winter Jacket',	'Black',	'A poker dot jacket',	'2023-03-18',	'/assets/uploads/no-image.png',	0),
(34,	'Blessing',	'Adejimi',	2214492,	'blessingtitilayo69@gmail.com',	2147483647,	'RGU campus',	'Jacket',	'Winter Jacket',	'blue',	'sdfghjk',	'2023-03-23',	'/assets/uploads/no-image.png',	0),
(35,	'OLAJUMOKE',	'BALOGUN',	2221149,	'lajumokebalo@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'black',	'BLACK IPHONE XR',	'2023-03-23',	'/assets/uploads/no-image.png',	0),
(36,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olajumokebalogun22@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'black',	'IPHONE XR',	'2023-03-23',	'/assets/uploads/no-image.png',	1),
(37,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'black',	'iphone xr',	'2023-03-23',	'/assets/uploads/no-image.png',	1),
(38,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'BLACK',	'IPHONE XR',	'2023-03-23',	'/assets/uploads/no-image.png',	0),
(39,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'phone',	'IPHONE',	'black',	'ffffsh',	'2023-04-14',	'/assets/uploads/no-image.png',	0),
(40,	'new lost',	'lost thing',	8899330,	'ksmdv@kmdfsd.dfd',	2453453,	'Aberdeen',	'Dollars',	'100 bills',	'money color',	'  the smell of money  ',	'2023-04-15',	'assets/uploads/headshot.png',	0),
(41,	'BLESSING',	'ADEJIMI',	2214666,	'blessingtitilayo69@gmail.com',	2147483647,	'RGU campus',	'Purse',	'wallet',	'blue',	'dof hf',	'2023-02-20',	'/assets/uploads/no-image.png',	0),
(42,	'RGU',	'Unwana',	345245345,	'dfv@efg.com',	324245345,	'Vegas',	'money bag',	'dollars',	'money color',	'100 bill stack',	'2023-02-20',	'/assets/uploads/no-image.png',	0),
(43,	'srgdg',	'dfgdfgdfgd',	2345678,	'lkfmd@dlkfg.com',	2147483647,	'dfgbdgf',	'dfgbdfgbd',	'dfbgdfgbdgb',	'fgbfgdgbdgfb',	'dfgbdhfbdgfhdbgf dfghdfgjh dfgjh',	'2023-03-19',	'/assets/uploads/no-image.png',	1),
(44,	'srgdg',	'dfgdfgdfgd',	2345678,	'lkfmd@dlkfg.com',	2147483647,	'dfgbdgf',	'dfgbdfgbd',	'dfbgdfgbdgb',	'fgbfgdgbdgfb',	'dfgbdhfbdgfhdbgf dfghdfgjh dfgjh',	'2023-03-19',	'/assets/uploads/no-image.png',	0),
(45,	'srgdg',	'dfgdfgdfgd',	2345678,	'lkfmd@dlkfg.com',	2147483647,	'dfgbdgf',	'dfgbdfgbd',	'dfbgdfgbdgb',	'fgbfgdgbdgfb',	'dfgbdhfbdgfhdbgf dfghdfgjh dfgjh',	'2023-03-19',	'/assets/uploads/no-image.png',	1),
(46,	'Ibile',	'Babatunde',	542567,	'tony1@gmail.com',	2147483647,	'Sir Ian Wood Building',	'Jacket',	'Winter Jacket',	'Black',	'A poker dot jacket',	'2023-03-18',	'/assets/uploads/no-image.png',	1),
(47,	'Blessing',	'Adejimi',	2214492,	'blessingtitilayo69@gmail.com',	2147483647,	'RGU campus',	'Jacket',	'Winter Jacket',	'blue',	'sdfghjk',	'2023-03-23',	'/assets/uploads/no-image.png',	1),
(51,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'BLACK',	'IPHONE XR',	'2023-03-23',	'assets/uploads/headshot.png',	0),
(52,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'phone',	'IPHONE',	'black',	'ffffsh',	'2023-04-14',	'assets/uploads/headshot.png',	0),
(57,	'another',	'lost',	2233456,	'me@you.us',	39485934,	'LAb90',	'challas',	'Dolls',	'Green',	'The 100 Dollar bill  ',	'2023-04-15',	'assets/uploads/the classroom.jpg',	1),
(58,	'another post',	'of missing',	1122334,	'me@us.uou',	23432543,	'Lab80',	'chalk',	'teaching',	'white',	'white teaching chalk  ',	'2023-04-15',	'assets/uploads/the classroom.jpg',	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `first_name` = VALUES(`first_name`), `last_name` = VALUES(`last_name`), `student_staff_id` = VALUES(`student_staff_id`), `email` = VALUES(`email`), `phone_number` = VALUES(`phone_number`), `location` = VALUES(`location`), `item_name` = VALUES(`item_name`), `item_type` = VALUES(`item_type`), `item_color` = VALUES(`item_color`), `item_description` = VALUES(`item_description`), `date_found` = VALUES(`date_found`), `image` = VALUES(`image`), `status` = VALUES(`status`);

DROP TABLE IF EXISTS `lost_tb`;
CREATE TABLE `lost_tb` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `student_staff_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `phone_number` int(11) NOT NULL,
  `location` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `item_name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `item_type` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `item_color` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `item_description` text COLLATE utf8mb4_bin,
  `date_lost` date NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `lost_tb` (`UID`, `first_name`, `last_name`, `student_staff_id`, `email`, `phone_number`, `location`, `item_name`, `item_type`, `item_color`, `item_description`, `date_lost`) VALUES
(1,	'user',	'user',	5645754,	'user@gmail.com',	2147483647,	'hukhg',	'hgjhf',	'jhvhv',	'yjjhvjh',	'jghvliyfht',	'2023-03-17'),
(2,	'James',	'Bond',	2839372,	'jamesbond@movies.com',	2147483647,	'school',	'pen',	'pen',	'blue',	'blue pen',	'2023-03-18'),
(3,	'unwana',	'lksdfkkl',	2211222,	'me@example.co',	345345454,	'las vegas',	'money',	'Dollars',	'smell of money',	'klnfknk iofn ndfoo nio n',	'2023-03-20'),
(4,	'Blessing',	'Adejimi',	2214992,	'blessingtitilayo69@gmail.com',	2147483647,	'RGU campus',	'Jacket',	'Winter Jacket',	'blue',	'nm,./fghj',	'2023-03-23'),
(5,	'OLAJUMOKE',	'Balogun',	2221149,	'lajumokebalo@gmail.com',	2147483647,	'aberdeen',	'phone',	'iphone',	'black',	'ds',	'2023-03-23'),
(6,	'KIKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'black',	'IPHONE XR',	'2023-03-23'),
(7,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'black',	'IPHONEXR',	'2023-03-23'),
(8,	'OLAJUMOKE',	'BALOGUN',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'PHONE',	'IPHONE',	'black',	'iphone xr',	'2023-03-23'),
(9,	'OLAJUMOKE',	'Balogun',	2221149,	'olusolabalogun812@gmail.com',	2147483647,	'RGU',	'phone',	'IPHONE',	'BLACK',	'IPHONE XR',	'2023-03-23')
ON DUPLICATE KEY UPDATE `UID` = VALUES(`UID`), `first_name` = VALUES(`first_name`), `last_name` = VALUES(`last_name`), `student_staff_id` = VALUES(`student_staff_id`), `email` = VALUES(`email`), `phone_number` = VALUES(`phone_number`), `location` = VALUES(`location`), `item_name` = VALUES(`item_name`), `item_type` = VALUES(`item_type`), `item_color` = VALUES(`item_color`), `item_description` = VALUES(`item_description`), `date_lost` = VALUES(`date_lost`);

DROP TABLE IF EXISTS `Persons`;
CREATE TABLE `Persons` (
  `Personid` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `City` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `picture` varchar(300) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`Personid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `Persons` (`Personid`, `LastName`, `FirstName`, `City`, `Age`, `picture`) VALUES
(6,	'demo user',	'tet',	'las vegas',	89,	'assets/uploads/azure-fundamentals-600x600.png'),
(10,	'picture',	'essien',	'vegas',	543,	'assets/uploads/cybersec.jpg'),
(15,	'',	NULL,	NULL,	NULL,	'assets/uploads/elevenhundred_logo.jpeg'),
(17,	'slndfgkdfghf',	'lknbdfbglj',	'lkdfbwedrfhg',	334,	'assets/uploads/O2 payment.png'),
(18,	'You',	'Me',	'uypo',	90000000,	'assets/uploads/filmhouse logo.png')
ON DUPLICATE KEY UPDATE `Personid` = VALUES(`Personid`), `LastName` = VALUES(`LastName`), `FirstName` = VALUES(`FirstName`), `City` = VALUES(`City`), `Age` = VALUES(`Age`), `picture` = VALUES(`picture`);

DROP TABLE IF EXISTS `trackers`;
CREATE TABLE `trackers` (
  `Personid` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `Country_name` varchar(15) COLLATE utf8mb4_bin DEFAULT NULL,
  `ISP` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`Personid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `trackers` (`Personid`, `IP`, `Country_name`, `ISP`) VALUES
(31,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(32,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(33,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(34,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(35,	'::1',	'',	''),
(36,	'::1',	'',	''),
(37,	'::1',	'',	''),
(38,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(39,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(40,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(41,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(42,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(43,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(44,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(45,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(46,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(47,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(48,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(49,	'107.150.23.243',	'US',	'AS8100 QuadraNet Enterpri'),
(50,	'::1',	'',	''),
(51,	'::1',	'',	''),
(52,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(53,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(54,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(55,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(56,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(57,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(58,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(59,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(60,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(61,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(62,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(63,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(64,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(65,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(66,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(67,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(68,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(69,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(70,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(71,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(72,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(73,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(74,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(75,	'90.242.239.87',	'GB',	'AS5378 Vodafone Limited'),
(76,	'74.84.150.150',	'US',	'AS399045 DediOutlet, LLC'),
(77,	'74.84.150.150',	'US',	'AS399045 DediOutlet, LLC'),
(78,	'74.84.150.150',	'US',	'AS399045 DediOutlet, LLC'),
(79,	'::1',	'',	''),
(80,	'::1',	'',	''),
(81,	'::1',	'',	''),
(82,	'::1',	'',	''),
(83,	'::1',	'',	''),
(84,	'::1',	'',	''),
(207,	'8.8.8.8',	'US',	'AS15169 Google LLC'),
(515,	'',	'',	''),
(520,	'8.8.8.8',	'US',	'AS15169 Google LLC'),
(521,	'',	'',	''),
(883,	'8.8.8.8',	'US',	'AS15169 Google LLC')
ON DUPLICATE KEY UPDATE `Personid` = VALUES(`Personid`), `IP` = VALUES(`IP`), `Country_name` = VALUES(`Country_name`), `ISP` = VALUES(`ISP`);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `firstname` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `id` int(11) NOT NULL,
  `hashed_password` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `is_Admin` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO `users` (`firstname`, `lastname`, `email`, `id`, `hashed_password`, `is_Admin`, `phone`) VALUES
('John',	'Doe',	'admin@example.co',	0,	'$2y$10$1OOiAf.gxp5Mho2J7/3Xc.qQp3puJ7E9TJNwbmr4wLqEVj8BFtY2.',	1,	0),
('Blessing',	'Adejimi',	'b.adejimi@rgu.ac.uk',	2214992,	'$2y$10$CaJkUsb/eL.F3TX6loVnwOlgoCCsRDdzJjtnsxwC2hzd2lTRqZJly',	0,	2147483647),
('Blessing',	'Adejimi',	'blessingtitilayo69@gmail.com',	2214992,	'$2y$10$qjAJ.lDGmhDOdzCSeHFx0ekE3ozyQYb0pO20PBVUnO7Fd1HVAmvpu',	0,	2147483647),
('kjdfnbkj',	'dkjknkdf',	'dkfng@dfnmg.com',	34567,	'$2y$10$kEqA8lofn1rY2VFjJe5j1.f5CQZpoSxtnOf32azRSTo8DJks6HUxC',	0,	234567),
('Daniel',	'Eluwah',	'eludan@gmail.com',	2100480,	'$2y$10$VFzMnhOaCwDT0hSPg0zLpOdYpV/f5V84glz1Hc0i9KHDhdE/QjimG',	0,	2147483647),
('Kike',	'balogun',	'fregenesamuel2@gmail.com',	2221149,	'$2y$10$aUAOZixwa/PDsl5eHdWMeOBWeeL3LNMXgNdqSsU3cF.K/ajCvbejO',	0,	2147483647),
('james',	'Bond',	'jamesbond@movie.com',	8976543,	'$2y$10$xh21eUwKvTXJi0roiQX0fuxZ.tQJEKT2xyRXmh7LqeT/WRwpvclAu',	0,	89760998),
('olajumoke',	'balogun',	'lajumokebalo@gmail.com',	2221149,	'$2y$10$r2idZYCWwNGbW2saHRtXFe88vl9a1QmY1slmV1SVSvRYvbJKZgFQy',	0,	2147483647),
('me',	'You',	'me@you.co',	456754,	'$2y$10$XbyZh54BoXT1QpJ015UpMONpv/2Q2s3Dw8oD6sCRBMK61AHzqix.m',	0,	2147483647),
('me user',	'and you',	'meanyou@you.co',	0,	'$2y$10$9ITgNcdpDH2KP4taMHcOB.mFBIOM70euue2aq3j6iSBQbHLjER232',	1,	0),
('rgu',	'moodle',	'moodle@rug.co.uk',	0,	'$2y$10$SkO.hmHzYSfq6mCAmEo.CeHD1oPz/T5e7s4z80WQI5omfYh3Btbsq',	1,	0),
('chinedu',	'nwakama',	'nwakama.ec@gmail.com',	2737267,	'$2y$10$KGHIKLG4lAjl2FjrA4pLFeYzWG8sk6TZKCBflXT0vLJdE.alPRzXq',	1,	2147483647),
('oghogho',	'oghogho',	'oghogho123@yahoo.com',	1524624635,	'$2y$10$cwq7NgwdsnVWiDSQnDM6neU4u8wONx9gQPyImDL7Kxitr.YgiaVGG',	0,	2147483647),
('olajumoke',	'balogun',	'olajumokebalogun22@gmail.com',	2221149,	'$2y$10$LXknGN9pcsdD39a5nAxIX.LlZpY5yl8uZ5izSpRvGXJDEcjlD/DWO',	0,	2147483647),
('KIKE',	'BALOGUN',	'olusolabalogun812@gmail.com',	2221149,	'$2y$10$HHjeaWPQ2qcB9cHXuVGdOeEZryhioNiE2GCHTtuwU8AKe.fFLwfhC',	0,	2147483647),
('user2',	'essien',	'sdfg@ghf.hfg',	8958,	'$2y$10$fzxvtbedMPycoCAEUxK6L.ycdPWw.zYtxls6glJr0sYCJyyzePMRW',	0,	9),
('user',	'normal',	'user@user.co',	3456755,	'$2y$10$VzTd6MuVC/8Gq2hdX1NQoeQC.0ma7czyQH2RQHfZMPDgzzN0Fs0lu',	0,	2345657),
('you',	'me',	'you@me.co',	354678,	'$2y$10$vsi/UqxYmRZCs7BpbqAvKOZbV0kpVOTQdFwdi3UqcXF8uRAPRWni.',	0,	2345678)
ON DUPLICATE KEY UPDATE `firstname` = VALUES(`firstname`), `lastname` = VALUES(`lastname`), `email` = VALUES(`email`), `id` = VALUES(`id`), `hashed_password` = VALUES(`hashed_password`), `is_Admin` = VALUES(`is_Admin`), `phone` = VALUES(`phone`);

-- 2023-04-15 16:03:16