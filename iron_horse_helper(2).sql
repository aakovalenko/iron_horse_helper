-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2017 at 05:46 PM
-- Server version: 10.1.25-MariaDB-
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iron_horse_helper`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1505825265),
('user', '5', 1505893117);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Admin', NULL, NULL, 1505812144, 1505812144),
('canAdmin', 2, 'Enter to the admin part', NULL, NULL, 1505812667, 1505812667),
('delete', 2, 'Delete', NULL, NULL, 1505893653, 1505893653),
('manager', 1, 'Manager', NULL, NULL, 1505812145, 1505812145),
('update', 2, 'Update Horse', NULL, NULL, 1505893653, 1505893653),
('updateOwnHorse', 2, 'Редактировать свои посты', 'isAuthor', NULL, 1505907121, 1505907121),
('user', 1, 'User', 'isAuthor', NULL, 1505812144, 1505812144);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'canAdmin'),
('admin', 'update'),
('manager', 'canAdmin'),
('updateOwnHorse', 'update'),
('user', 'updateOwnHorse');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 0x4f3a32303a226170705c72756c65735c417574686f7252756c65223a333a7b733a343a226e616d65223b733a383a226973417574686f72223b733a393a22637265617465644174223b693a313530353930363431313b733a393a22757064617465644174223b693a313530353930363431313b7d, 1505906411, 1505906411);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` smallint(1) DEFAULT '1',
  `sort` smallint(2) DEFAULT '50',
  `date_create` int(11) DEFAULT NULL,
  `date_update` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `title`, `text`, `url`, `status_id`, `sort`, `date_create`, `date_update`) VALUES
(1, 5, 'sometext', 'text', 'some', 45, 50, 1506416438, NULL),
(2, 5, 'Subaru wrx', 'Subaru Impreza WRX (с 2014 года Subaru WRX) — турбированная версия Subaru Impreza, полноприводный спортивный автомобиль. Выпускается в вариантах седан, универсал (до 2007 года), а также хетчбэк (с 2007 года)', 'impreza', 1, 50, 1506419195, NULL),
(3, 5, 'Subaru Forester', 'Subaru Forester — японский полноприводный кроссовер бренда Subaru, выпускающийся с 1997 года. Построен на базе шасси Subaru Impreza. Производится на заводе Gunma Yajima Factory в муниципалитете Ота, Япония.\r\n\r\nНа Детройтском автосалоне 1997 года Subaru презентовала машину с большим клиренсом и полным приводом, которая с виду была гораздо больше похожа на универсал, чем на внедорожник. В России, Австралии и США Subaru Forester пользуется большой популярностью как семейный внедорожник[источник не указан 236 дней].', 'forester', 1, 50, 1506419266, NULL),
(4, 5, 'Subaru BRAT', 'Subaru BRAT (от англ. Bi-drive Recreational All-terrain Transporter — полноприводный авто для отдыха на природе) — пикап Subaru в стиле Coupé utility, созданный в конце 1970-х годов на базе полноприводного универсала Subaru Leone для рынка США. Комплектовался оппозитным двигателем объёмом 1,6 — 1,8 литра, пикап имел откидные сиденья в кузове, что позволяло транспортировать людей в кузове.\r\n\r\nОдним из наиболее известных владельцев данной модели автомобиля был бывший президент США Рональд Рейган. Красный BRAT сохранился в бывшей резиденции в Калифорнии. Бывший президент США Рональд Рейган владел своим BRAT’ом долгих 20 лет. Субару служила ему все это время верой и правдой на его огромном ранчо в Калифорнии. В 1998 году семья Рейган продала ранчо одному американскому фонду, а все свои машины раздарила друзьям. В 2004 году президентская Субару попала на аукцион eBay, а в 2005 году её выкупил все тот же фонд, который стал владельцем ранчо (Young America’s Foundation). Куратор фонда Мэрилин Фишер сообщила, что они решили воссоздать на ранчо максимально подлинную атмосферу, царившую на ранчо в 1980-е годы.', 'brat', 1, 55, 1506419334, 1506424068),
(5, 5, 'Subaru Legacy', 'Subaru Legacy — среднеразмерный седан или универсал повышенной проходимости японской фирмы Subaru, выпускается с 1989 года, на международный рынок поставляется с 1990 года. В Австралии автомобиль имеет название Liberty из уважения к австралийской организации под названием Legacy, которая помогает ветеранам и их семьям, пострадавшим во время и после войн. Согласно пресс релизу Subaru, приведённому в «Autoblog» в ноябре 2008 года, с начала производства в 1989 году было выпущено более 3.6 миллионов автомобилей Legacy[1]. Как и подавляющее большинство моделей этой компании, Legacy имеет полный привод.\r\n\r\nНа рынке США Legacy конкурирует с Toyota Camry, Honda Accord, Mitsubishi Galant и Nissan Altima. Автомобили Subaru Legacy, как и другие модели марки Subaru, участвовали и побеждали во многих международных соревнованиях: Subaru Legacy был признан Автомобилем года в Японии (2003—2004)[2].', 'legacy', 1, 59, 1506427766, NULL),
(6, 5, 'SUBARU XV', 'SUBARU XV — компактный кроссовер японского автопроизводителя Subaru, выпускаемых с 2011 года.\r\n\r\nКроссовер Subaru XV был создан по мотивам концепт-кара «SUBARU XV», презентация которого прошла в апреле 2011 года на автосалоне в Шанхае. Готовая же модель Subaru XV была представлена во Франкфурте 13 сентября 2011 года.[1]\r\n\r\nПо замыслу разработчиков автомобиль Subaru XV должен был представить собой сочетание функциональности, стиля и комфорта во время езды.\r\n\r\nОригинальный внешний вид и неоспоримые преимущества этого кроссовера позволили получить высокую оценку во всем мире среди своего класса. Модель отличается высоким уровнем безопасности и получила максимальный рейтинг «5 звезд» в рамках испытаний Европейской программы оценки новых автомобилей (Euro NCAP) в 2011 году.', 'xv', 1, 76, 1506428389, 1506428405),
(7, 5, 'Subaru Alcyone SVX', 'Subaru Alcyone SVX был впервые представлен на 28-м Токийском автосалоне в 1989 году как концепт кар. Итальянский автомобильный дизайнер Джорджетто Джуджаро спроектировал обтекаемый, без резких граней кузов, используя при этом идеи своих предыдущих проектов, таких как Ford Maya и Oldsmobile Inca. В Subaru решили запустить концепт кар в производство, сохранив при этом его самый яркий элемент — необычное окно в окне, назвав его «aircraft-inspired glass-to-glass canopy». Подобное решение было унаследовано от предыдущей модели, Subaru Alcyone XT.\r\n\r\nВ июле 1991 года (как модели 1992) начались продажи SVX в США, а в сентябре того же года автомобиль стал доступен в Японии. В 1992 году рекомендованная розничная цена составляла $24,445 для базовой модификации SVX-LS и $28,000 за топовую LS-L. К 1996 году цена поднялась до $36,740 за максимальную комплектацию LSi (в Японии называлась Version L).\r\n\r\nНесмотря на высокую цену и экономический спад, продажи в США были хорошими: 5,280 машины в 1992 и 3,859 в 1993 году (хотя в Subaru намеревались продавать по 10,000 каждый год). После того как в 1997 году продажи упали до 640 штук, было принято решение о прекращении производства. Всего было продано около 25 тысяч SVX, из них в США 14,257, в Европе 2,478. Праворульных модификаций было продано около 7 тысяч.\r\n\r\nС каждым проданным автомобилем Subaru теряла примерно $3,000, а общий убыток от проекта составил порядка $75,000,000. Однако компания не сочла эти убытки большими, решив, что имидж компании как производителя качественной и высокотехнологичной продукции стоит дороже.\r\n\r\nSubaru Alcyone SVX продолжает цениться на вторичном рынке. В частности, журнал Collectible Automobile предсказывает, что автомобиль в будущем станет популярным у коллекционеров.[1]', 'alcyone', 1, 50, 1506428490, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fueling`
--

CREATE TABLE `fueling` (
  `id` int(11) NOT NULL,
  `iron_horse_id` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `fuel_type` int(11) DEFAULT NULL,
  `price_per_liter` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `liters` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mileage` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fueling`
--

INSERT INTO `fueling` (`id`, `iron_horse_id`, `date`, `fuel_type`, `price_per_liter`, `liters`, `mileage`) VALUES
(2, 2, 745, 0, '12332', '12321', '3123');

-- --------------------------------------------------------

--
-- Table structure for table `iron_horse`
--

CREATE TABLE `iron_horse` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(20) NOT NULL,
  `engine` int(20) NOT NULL,
  `mileage` int(11) NOT NULL,
  `color` int(20) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `iron_horse`
--

INSERT INTO `iron_horse` (`id`, `user_id`, `brand`, `model`, `year`, `engine`, `mileage`, `color`, `created_at`, `updated_at`, `image`) VALUES
(1, 2, 'opel', 'corsa', 1994, 2000, 120678, 433434, 1505978651, NULL, NULL),
(2, 5, 'bmw', 'x6', 2014, 2500, 34980, 766767, 1505978686, NULL, NULL),
(15, 5, 'subaru', 'wrx', 2016, 2000, 13580, 434567, 1506064698, 1506082303, '');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `iron_horse_id` int(11) DEFAULT NULL,
  `mileage` int(11) NOT NULL,
  `oil` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gearbox_oil` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hydraulic_oil` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oil_filter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `air_filter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brake_fluid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coolant` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bulbs` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brake_pads` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brake_discs` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generator_belt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `camshaft_belt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wheel_rotation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tire_pressure` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alignment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `battery` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spark_plug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spark_plug_wire` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `iron_horse_id`, `mileage`, `oil`, `gearbox_oil`, `hydraulic_oil`, `oil_filter`, `air_filter`, `brake_fluid`, `coolant`, `bulbs`, `brake_pads`, `brake_discs`, `generator_belt`, `camshaft_belt`, `wheel_rotation`, `tire_pressure`, `alignment`, `battery`, `spark_plug`, `spark_plug_wire`, `date`) VALUES
(1, 2, 2131456, 'Mobil 1 7000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(2, NULL, 65478, 'Shell Ultra 0W50', '', '', '', '', 'dot 4', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(3, 15, 54326, 'Motul x8000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(4, NULL, 3456567, '10w40 Motul 8000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(5, NULL, 2147483647, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(6, NULL, 534534, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(7, 1, 1345564, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(8, NULL, 456677, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(10, 1, 87954, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2017-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1505809353),
('m140209_132017_init', 1505814984),
('m140403_174025_create_account_table', 1505814985),
('m140504_113157_update_tables', 1505814988),
('m140504_130429_create_token_table', 1505814988),
('m140506_102106_rbac_init', 1505811137),
('m140830_171933_fix_ip_field', 1505814989),
('m140830_172703_change_account_table_name', 1505814989),
('m141222_110026_update_ip_field', 1505814989),
('m141222_135246_alter_username_length', 1505814990),
('m150614_103145_update_social_account_table', 1505814991),
('m150623_212711_fix_username_notnull', 1505814991),
('m151218_234654_add_timezone_to_profile', 1505814991),
('m160929_103127_add_last_login_at_to_user_table', 1505814992),
('m170919_080955_create_user_table', 1505809441),
('m170919_095508_drop_user_table', 1505814952),
('m170919_111010_add_new_field_to_user', 1505829427),
('m170919_122626_create_iron_horse_table', 1505976947),
('m170921_062035_create_maintenance_table', 1505978466),
('m170921_140025_add_new_field_to_iron_horse', 1506002711),
('m170922_093859_create_blog_table', 1506079262),
('m170922_122011_create_fueling_table', 1506083475),
('m170925_074219_maintenance_date_string_attr', 1506325881),
('m170925_080033_update_maintenance_date', 1506326567),
('m170928_132651_create_category_table', 1506609996),
('m170928_133247_create_product_table', 1506609997),
('m170928_134044_create_tag_tables', 1506609998),
('m170928_135519_create_attribute_table', 1506610000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `price` int(11) NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `field`) VALUES
(2, 'andrii', 'kaa89pl@gmail.com', '$2y$10$HwU0PaTgNPsxPanrq35I0uCYMCbtUMZFlcyoAjOXeqgXD4oWgx//C', 'FSPSDKWB5YJtzFwarOsPdm_BllJOB157', 1505821422, NULL, NULL, '127.0.0.1', 1505821396, 1505821396, 0, 1506579195, NULL),
(5, 'test', 'testyii2@ukr.net', '$2y$10$sIamjJu9vPrkTXMXhSbT8OH5ia2OgqI4yPCHvrwX/vqjiseYNmRAu', 'dsMef6VQa_hBhxvtXs5Fp7w4gp-T0v5s', 1505890547, NULL, NULL, '127.0.0.1', 1505890518, 1505890518, 0, 1506424041, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `value`
--

CREATE TABLE `value` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_blog` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-category-parent_id` (`parent_id`);

--
-- Indexes for table `fueling`
--
ALTER TABLE `fueling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fueling_iron_horse` (`iron_horse_id`);

--
-- Indexes for table `iron_horse`
--
ALTER TABLE `iron_horse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_horse` (`user_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horse_maintenance` (`iron_horse_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-product-category_id` (`category_id`),
  ADD KEY `idx-product-active` (`active`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `idx-product_tag-product_id` (`product_id`),
  ADD KEY `idx-product_tag-tag_id` (`tag_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-tag-name` (`name`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`product_id`,`attribute_id`),
  ADD KEY `idx-value-product_id` (`product_id`),
  ADD KEY `idx-value-attribute_id` (`attribute_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fueling`
--
ALTER TABLE `fueling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `iron_horse`
--
ALTER TABLE `iron_horse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `user_blog` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk-category-parent` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `fueling`
--
ALTER TABLE `fueling`
  ADD CONSTRAINT `fueling_iron_horse` FOREIGN KEY (`iron_horse_id`) REFERENCES `iron_horse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `iron_horse`
--
ALTER TABLE `iron_horse`
  ADD CONSTRAINT `user_horse` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `horse_maintenance` FOREIGN KEY (`iron_horse_id`) REFERENCES `iron_horse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk-product-category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `fk-product_tag-product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-product_tag-tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `value`
--
ALTER TABLE `value`
  ADD CONSTRAINT `fk-value-attribute` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-value-product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
