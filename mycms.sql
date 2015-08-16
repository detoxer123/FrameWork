-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2014. júl. 13. 10:28
-- Szerver verzió: 5.5.24-log
-- PHP verzió: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `mycms`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `publicationDate` date NOT NULL,
  `categoryId` smallint(5) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `summary` text COLLATE utf8_hungarian_ci NOT NULL,
  `content` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `imageExtension` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=24 ;

--
-- A tábla adatainak kiíratása `articles`
--

INSERT INTO `articles` (`id`, `publicationDate`, `categoryId`, `title`, `summary`, `content`, `imageExtension`) VALUES
(12, '2014-01-09', 1, 'Prba 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim ac felis vel congue. Sed ac aliquet metus. Sed viverra, dolor quis vulputate pretium, sem ligula feugiat lorem, vulputate dictum lorem libero eu massa. Cras mattis ac massa sed placerat. Donec porttitor nibh commodo magna scelerisque sodales. Vestibulum non laoreet lectus. Sed id sagittis purus. Suspendisse elit nisl, elementum in auctor id, ultricies id enim. Praesent convallis mi at arcu aliquam, ac eleifend erat porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim ac felis vel congue. Sed ac aliquet metus. Sed viverra, dolor quis vulputate pretium, sem ligula feugiat lorem, vulputate dictum lorem libero eu massa. Cras mattis ac massa sed placerat. Donec porttitor nibh commodo magna scelerisque sodales. Vestibulum non laoreet lectus. Sed id sagittis purus. Suspendisse elit nisl, elementum in auctor id, ultricies id enim. Praesent convallis mi at arcu aliquam, ac eleifend erat porta.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim ac felis vel congue. Sed ac aliquet metus. Sed viverra, dolor quis vulputate pretium, sem ligula feugiat lorem, vulputate dictum lorem libero eu massa. Cras mattis ac massa sed placerat. Donec porttitor nibh commodo magna scelerisque sodales. Vestibulum non laoreet lectus. Sed id sagittis purus. Suspendisse elit nisl, elementum in auctor id, ultricies id enim. Praesent convallis mi at arcu aliquam, ac eleifend erat porta.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim ac felis vel congue. Sed ac aliquet metus. Sed viverra, dolor quis vulputate pretium, sem ligula feugiat lorem, vulputate dictum lorem libero eu massa. Cras mattis ac massa sed placerat. Donec porttitor nibh commodo magna scelerisque sodales. Vestibulum non laoreet lectus. Sed id sagittis purus. Suspendisse elit nisl, elementum in auctor id, ultricies id enim. Praesent convallis mi at arcu aliquam, ac eleifend erat porta.', '.jpeg'),
(13, '2013-11-10', 3, 'Mooooka', 'In metus enim, commodo et faucibus quis, volutpat in purus. Morbi lectus metus, lobortis id turpis a, dictum aliquet eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed id enim pulvinar, mattis tellus ut, iaculis risus. Ut eleifend enim urna, et posuere turpis suscipit sed. Mauris in urna luctus, porta velit vel, blandit velit. Morbi egestas porta ultricies. Suspendisse eget sollicitudin lectus. Quisque ante neque, dignissim et vestibulum et, consectetur a leo. Vestibulum tincidunt vel dui sed elementum. Suspendisse accumsan convallis sapien, sit amet pretium nunc laoreet ut. Etiam mattis eu risus non auctor. Nullam eu vestibulum lorem, eget blandit magna.', 'In metus enim, commodo et faucibus quis, volutpat in purus. Morbi lectus metus, lobortis id turpis a, dictum aliquet eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed id enim pulvinar, mattis tellus ut, iaculis risus. Ut eleifend enim urna, et posuere turpis suscipit sed. Mauris in urna luctus, porta velit vel, blandit velit. Morbi egestas porta ultricies. Suspendisse eget sollicitudin lectus. Quisque ante neque, dignissim et vestibulum et, consectetur a leo. Vestibulum tincidunt vel dui sed elementum. Suspendisse accumsan convallis sapien, sit amet pretium nunc laoreet ut. Etiam mattis eu risus non auctor. Nullam eu vestibulum lorem, eget blandit magna.In metus enim, commodo et faucibus quis, volutpat in purus. Morbi lectus metus, lobortis id turpis a, dictum aliquet eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed id enim pulvinar, mattis tellus ut, iaculis risus. Ut eleifend enim urna, et posuere turpis suscipit sed. Mauris in urna luctus, porta velit vel, blandit velit. Morbi egestas porta ultricies. Suspendisse eget sollicitudin lectus. Quisque ante neque, dignissim et vestibulum et, consectetur a leo. Vestibulum tincidunt vel dui sed elementum. Suspendisse accumsan convallis sapien, sit amet pretium nunc laoreet ut. Etiam mattis eu risus non auctor. Nullam eu vestibulum lorem, eget blandit magna.', '.jpeg'),
(17, '2014-12-11', 2, 'Ez mos mier mukodik bazdmeg??', 'Nulla dignissim nec sem vel varius. Curabitur blandit feugiat purus, ut rhoncus orci pharetra sed. Sed auctor ornare auctor. Nam convallis dolor nec tortor lobortis, euismod viverra augue eleifend.', 'Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.\r\n\r\nNulla dignissim nec sem vel varius. Curabitur blandit feugiat purus, ut rhoncus orci pharetra sed. Sed auctor ornare auctor. Nam convallis dolor nec tortor lobortis, euismod viverra augue eleifend. Mauris hendrerit cursus magna, vitae mattis massa viverra at. Ut vehicula metus metus, ut commodo purus rhoncus non. Etiam porta feugiat sagittis. Integer venenatis sollicitudin rhoncus. Nulla ut justo eu nunc aliquet porttitor. Aenean facilisis imperdiet erat et malesuada. Nam eget pellentesque ante. In eleifend quam dolor, eget semper tellus accumsan non. In consequat dapibus est, a pulvinar leo faucibus non. Integer id imperdiet justo, eget dignissim magna.', '.jpeg'),
(18, '2014-12-11', 3, 'ppp', 'ZIZI Donec sed Donec sed magna tortor. Fusce rutrum urna in ullamcorper rutrum. Integer in urna nec nisl tempor hendrerit. Morbi auctor massa id elit imperdiet sagittis.tortor. Fusce rutrum urna in ullamcorper rutrum. Integer in urna nec nisl tempor hendrerit. Morbi auctor massa id elit imperdiet sagittis.', 'Donec sed magna tortor. Fusce rutrum urna in ullamcorper rutrum. Integer in urna nec nisl tempor hendreriDonec sed magna tortor. Fusce rutrum urna in ullamcorper rutrum. Integer in urna nec nisl tempor hendrerit. Morbi auctor massa id elit imperdiet sagittis.Donec sed magna tortor. Fusce rutrum urna in ullamcorper rutrum. Integer in urna nec nisl tempor hendrerit. Morbi auctor massa id elit imperdiet sagittis.t. Morbi auctor massa id elit imperdiet sagittis.', '.jpeg'),
(19, '2010-01-21', 1, 'New Thing', 'Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.', 'Nulla dignissim nec sem vel varius. Curabitur blandit feugiat purus, ut rhoncus orci pharetra sed. Sed auctor ornare auctor. Nam convallis dolor nec tortor lobortis, euismod viverra augue eleifend.Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.Pellentesque sollicitudin purus ac ornare commodo. Donec commodo nisi scelerisque dolor aliquet pretium. Proin mattis ut mi hendrerit faucibus. Aliquam dapibus posuere quam. Donec egestas consequat felis, et aliquam nisl venenatis id. Praesent nulla eros, vulputate in nulla vitae, bibendum condimentum nisi. Pellentesque at dictum turpis.', '.jpg'),
(20, '2011-01-01', 6, 'Hopp hejj', 'flnlknl ', 'lvdsnvkjsdvkjb cvskdb cvskjd cskjdcb', '.jpeg'),
(21, '2010-01-01', 1, 'New News', 'ksdhf dfkj dfskjh ', 'ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ksdhf dfkj dfskjh ', '.jpg'),
(22, '2009-11-11', 1, 'Mmmmm', 'fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds', 'fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds fgdk vdskjhv sdkjd dskshfkc sdvjh fjf f fjudbsds', '.jpg'),
(23, '2001-01-01', 1, 'Yo-yooo', 'dfd fvgkjdf dsfkugfs dvk', 'kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh kdf vjhvs svkjhvs fvkuivbw sdk fdsg fvkh ', '.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `description` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'News', 'Category for news.'),
(2, 'Samsung', 'Samsung category'),
(3, 'Monika', 'moni category'),
(6, 'Ihajj', 'Ez az');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `publicationDate` date NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `albumThumbnail` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=55 ;

--
-- A tábla adatainak kiíratása `galleries`
--

INSERT INTO `galleries` (`id`, `publicationDate`, `title`, `albumThumbnail`) VALUES
(2, '2001-01-01', 'Proba galeria Minden valt.', 'images/galleries/2/thumbs/20120915_183724.jpg'),
(43, '2015-03-29', 'Leicester', 'images/galleries/43/thumbs/20131026_162509.jpg'),
(46, '2010-01-01', 'Egyszer', 'images/galleries/46/thumbs/196724_457763480921091_1473070081_n.jpg'),
(47, '2010-01-01', 'Angliai retyma volt mar itt minden :)', 'images/galleries/47/thumbs/20131205_102504.jpg'),
(52, '2017-10-10', 'PSP', 'images/galleries/52/thumbs/20131026_162531.jpg'),
(53, '2015-04-02', 'UK', 'images/galleries/53/thumbs/20120915_200532.jpg'),
(54, '2017-10-10', 'Tobb soros cimet kell beirni most', 'images/galleries/54/thumbs/20130210_170822.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `albumId` smallint(5) unsigned NOT NULL,
  `image` text COLLATE utf8_hungarian_ci NOT NULL,
  `thumbnail` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=116 ;

--
-- A tábla adatainak kiíratása `pictures`
--

INSERT INTO `pictures` (`id`, `albumId`, `image`, `thumbnail`) VALUES
(2, 2, 'images/galleries/2/20130626_200955.jpg', 'images/galleries/2/thumbs/20130626_200955.jpg'),
(3, 2, 'images/galleries/1/20130807_165625.jpg', 'images/galleries/1/thumbs/20130807_165625.jpg'),
(13, 2, 'images/galleries/2/20121028_194556.jpg', 'images/galleries/2/thumbs/20121028_194556.jpg'),
(15, 2, 'images/galleries/2/20120915_184457.jpg', 'images/galleries/2/thumbs/20120915_184457.jpg'),
(18, 2, 'images/galleries/2/mini-moni.jpg', 'images/galleries/2/thumbs/mini-moni.jpg'),
(68, 47, 'images/galleries/47/20131214_161454.jpg', 'images/galleries/47/thumbs/20131214_161454.jpg'),
(78, 43, 'images/galleries/43/20131026_162509.jpg', 'images/galleries/43/thumbs/20131026_162509.jpg'),
(93, 46, 'images/galleries/46/20131123_140213.jpg', 'images/galleries/46/thumbs/20131123_140213.jpg'),
(95, 46, 'images/galleries/46/20131212_165628.jpg', 'images/galleries/46/thumbs/20131212_165628.jpg'),
(96, 46, 'images/galleries/46/20131212_165636.jpg', 'images/galleries/46/thumbs/20131212_165636.jpg'),
(97, 46, 'images/galleries/46/20131212_171228.jpg', 'images/galleries/46/thumbs/20131212_171228.jpg'),
(98, 46, 'images/galleries/46/20131212_171232.jpg', 'images/galleries/46/thumbs/20131212_171232.jpg'),
(99, 47, 'images/galleries/47/20131205_102504.jpg', 'images/galleries/47/thumbs/20131205_102504.jpg'),
(100, 47, 'images/galleries/47/20131205_102513.jpg', 'images/galleries/47/thumbs/20131205_102513.jpg'),
(101, 47, 'images/galleries/47/20131205_102534.jpg', 'images/galleries/47/thumbs/20131205_102534.jpg'),
(102, 47, 'images/galleries/47/20131205_102541.jpg', 'images/galleries/47/thumbs/20131205_102541.jpg'),
(103, 52, 'images/galleries/52/20131026_162531.jpg', 'images/galleries/52/thumbs/20131026_162531.jpg'),
(104, 52, 'images/galleries/52/20131117_161310.jpg', 'images/galleries/52/thumbs/20131117_161310.jpg'),
(105, 52, 'images/galleries/52/20131123_140213.jpg', 'images/galleries/52/thumbs/20131123_140213.jpg'),
(106, 52, 'images/galleries/52/20131123_140225.jpg', 'images/galleries/52/thumbs/20131123_140225.jpg'),
(107, 46, 'images/galleries/46/196724_457763480921091_1473070081_n.jpg', 'images/galleries/46/thumbs/196724_457763480921091_1473070081_n.jpg'),
(108, 53, 'images/galleries/53/20120915_200532.jpg', 'images/galleries/53/thumbs/20120915_200532.jpg'),
(109, 53, 'images/galleries/53/20120915_200540.jpg', 'images/galleries/53/thumbs/20120915_200540.jpg'),
(110, 53, 'images/galleries/53/20120915_200544.jpg', 'images/galleries/53/thumbs/20120915_200544.jpg'),
(111, 54, 'images/galleries/54/20130210_170822.jpg', 'images/galleries/54/thumbs/20130210_170822.jpg'),
(112, 54, 'images/galleries/54/20130210_170853.jpg', 'images/galleries/54/thumbs/20130210_170853.jpg'),
(113, 54, 'images/galleries/54/20130210_171216.jpg', 'images/galleries/54/thumbs/20130210_171216.jpg'),
(114, 2, 'images/galleries/2/229088_515903721757367_320884564_n.jpeg', 'images/galleries/2/thumbs/229088_515903721757367_320884564_n.jpeg'),
(115, 54, 'images/galleries/54/20130614_194910.jpg', 'images/galleries/54/thumbs/20130614_194910.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
