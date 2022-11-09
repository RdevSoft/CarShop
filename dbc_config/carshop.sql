-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2014 at 10:50 AM
-- Server version: 5.6.10
-- PHP Version: 5.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixblog`
--

DROP TABLE IF EXISTS `db_tabprefixblog`;
CREATE TABLE IF NOT EXISTS `db_tabprefixblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(30) NOT NULL,
  `featured_img` char(200) NOT NULL,
  `title` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_tabprefixblog`
--

INSERT INTO `db_tabprefixblog` (`id`, `type`, `featured_img`, `title`, `description`, `created_by`, `create_time`, `status`) VALUES
(1, 'blog', 'ferrari.jpg', 'Lorem ipsum doller sit amaet Lorem ipsum doller sit amaet', '<p>Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.</p>\r\n<p> </p>\r\n<p>Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.</p>', 1, 1410854808, 1),
(2, 'news', 'bike.jpg', 'Lorem ipsum news ipsum', '<p>Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.</p>', 1, 1410855039, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixblog_meta`
--

DROP TABLE IF EXISTS `db_tabprefixblog_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixblog_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `key` char(50) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixbrandmodels`
--

DROP TABLE IF EXISTS `db_tabprefixbrandmodels`;
CREATE TABLE IF NOT EXISTS `db_tabprefixbrandmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` char(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=208 ;

--
-- Dumping data for table `db_tabprefixbrandmodels`
--

INSERT INTO `db_tabprefixbrandmodels` (`id`, `parent`, `name`, `type`, `status`) VALUES
(1, 0, 'Alfa Romeo', 'brand', 1),
(2, 0, ' Acura', 'brand', 1),
(3, 0, ' Aston Martin', 'brand', 1),
(4, 0, ' Audi', 'brand', 1),
(5, 0, ' Bentley', 'brand', 1),
(6, 0, ' BMW', 'brand', 1),
(7, 0, ' Cadillac', 'brand', 1),
(8, 0, ' Chevrolet', 'brand', 1),
(9, 0, ' Chrysler', 'brand', 1),
(10, 0, ' Citroen', 'brand', 1),
(11, 0, ' Corvette', 'brand', 1),
(12, 0, ' Dacia', 'brand', 1),
(13, 0, ' Dodge', 'brand', 1),
(14, 0, ' Ferrari', 'brand', 1),
(15, 0, ' Fiat', 'brand', 1),
(16, 0, ' Ford', 'brand', 1),
(17, 0, ' GMC', 'brand', 1),
(18, 0, ' Honda', 'brand', 1),
(19, 0, ' Hyundai', 'brand', 1),
(20, 0, ' Infiniti', 'brand', 1),
(21, 0, ' Isuzu', 'brand', 1),
(22, 0, ' Jaguar', 'brand', 1),
(23, 0, ' Jeep', 'brand', 1),
(24, 0, ' KIA', 'brand', 1),
(25, 0, ' Lamborghini', 'brand', 1),
(26, 0, ' Lancia', 'brand', 1),
(27, 0, ' Land Rover', 'brand', 1),
(28, 0, ' Lexus', 'brand', 1),
(29, 0, ' Lotus', 'brand', 1),
(30, 0, ' Maserati', 'brand', 1),
(31, 0, ' Mazda', 'brand', 1),
(32, 0, ' McLaren', 'brand', 1),
(33, 0, ' Mercedes-Benz', 'brand', 1),
(34, 0, ' Mini', 'brand', 1),
(35, 0, ' Mitsubishi', 'brand', 1),
(36, 0, ' Nissan', 'brand', 1),
(37, 0, ' Opel', 'brand', 1),
(38, 0, ' Peugeot', 'brand', 1),
(39, 0, ' Porsche', 'brand', 1),
(40, 0, ' Proton', 'brand', 1),
(41, 0, ' Renault', 'brand', 1),
(42, 0, ' Rolls-Royce', 'brand', 1),
(43, 0, ' Saab', 'brand', 1),
(44, 0, ' Seat', 'brand', 1),
(45, 0, ' Skoda', 'brand', 1),
(46, 0, ' Subaru', 'brand', 1),
(47, 0, ' Suzuki', 'brand', 1),
(48, 0, ' Toyota', 'brand', 1),
(49, 0, ' Vauxhall', 'brand', 1),
(50, 0, ' Volkswagen', 'brand', 1),
(51, 0, ' Volvo', 'brand', 1),
(52, 6, 'F48', 'model', 1),
(53, 6, 'F80', 'model', 1),
(54, 6, 'F82', 'model', 1),
(55, 6, 'F83', 'model', 1),
(56, 6, 'F85', 'model', 1),
(57, 6, 'F86', 'model', 1),
(58, 6, 'G11', 'model', 1),
(59, 6, 'G12', 'model', 1),
(60, 6, 'G30', 'model', 1),
(61, 6, 'E24', 'model', 1),
(62, 6, 'M3', 'model', 1),
(63, 6, 'M5', 'model', 1),
(64, 6, 'Z4 Roadster', 'model', 1),
(65, 6, 'X6M', 'model', 1),
(66, 4, 'A1', 'model', 1),
(67, 4, 'A4', 'model', 1),
(68, 4, 'A5', 'model', 1),
(69, 4, 'A6', 'model', 1),
(70, 4, 'A7', 'model', 1),
(71, 4, 'A8', 'model', 1),
(72, 4, 'TT', 'model', 1),
(73, 4, 'R8', 'model', 1),
(74, 4, 'Q3', 'model', 1),
(75, 4, 'Q5', 'model', 1),
(76, 4, 'Q7', 'model', 1),
(77, 48, 'Prius', 'model', 1),
(78, 48, 'Celica', 'model', 1),
(79, 48, 'Supra', 'model', 1),
(80, 48, 'Carina', 'model', 1),
(81, 48, 'Camry', 'model', 1),
(82, 48, 'MR2', 'model', 1),
(83, 48, 'Premio', 'model', 1),
(84, 48, 'Corolla', 'model', 1),
(85, 48, 'Allion', 'model', 1),
(86, 48, 'Axio', 'model', 1),
(87, 16, 'Escape', 'model', 1),
(88, 16, 'Mustang', 'model', 1),
(89, 16, 'Fusion', 'model', 1),
(90, 16, 'Taurus', 'model', 1),
(91, 16, 'Explorer', 'model', 1),
(92, 16, 'Edge', 'model', 1),
(93, 16, 'Fiesta', 'model', 1),
(94, 39, 'Cayenne', 'model', 1),
(95, 39, '911', 'model', 1),
(96, 39, 'Boxster', 'model', 1),
(97, 39, '912', 'model', 1),
(98, 39, 'Panamera', 'model', 1),
(99, 39, 'Carrera', 'model', 1),
(100, 39, 'Cayman', 'model', 1),
(101, 7, 'Escalade', 'model', 1),
(102, 7, 'CTS-V', 'model', 1),
(103, 7, 'SRX', 'model', 1),
(104, 7, 'Eldorado', 'model', 1),
(105, 7, 'Cimarron', 'model', 1),
(106, 7, 'Seville', 'model', 1),
(107, 7, 'XTS', 'model', 1),
(108, 7, 'ATS', 'model', 1),
(109, 14, '750 Monza', 'model', 1),
(110, 14, 'Barchetta', 'model', 1),
(111, 14, '312PB', 'model', 1),
(112, 14, 'Testa Rossa', 'model', 1),
(113, 14, '330 LMB', 'model', 1),
(114, 14, '458 Italia', 'model', 1),
(115, 1, 'MiTo', 'model', 1),
(116, 1, 'Giulietta', 'model', 1),
(117, 1, '4C', 'model', 1),
(118, 2, 'ILX', 'model', 1),
(119, 2, 'MDX', 'model', 1),
(120, 2, 'RDX', 'model', 1),
(121, 2, 'RLX', 'model', 1),
(122, 2, 'TLX', 'model', 1),
(123, 3, 'V8 Vantage', 'model', 1),
(124, 3, 'V12 Vantage', 'model', 1),
(125, 3, 'DB9', 'model', 1),
(126, 3, 'Vanquish', 'model', 1),
(127, 3, 'Rapide', 'model', 1),
(128, 8, 'Agile', 'model', 1),
(129, 8, 'Aveo', 'model', 1),
(130, 8, 'Celta', 'model', 1),
(131, 8, 'Classic', 'model', 1),
(132, 8, 'Lova', 'model', 1),
(133, 8, 'Lanos', 'model', 1),
(134, 8, 'Onix', 'model', 1),
(135, 8, 'Prisma', 'model', 1),
(136, 8, 'Sail', 'model', 1),
(137, 8, 'Sonic', 'model', 1),
(138, 8, 'Spark', 'model', 1),
(139, 8, 'Cobalt', 'model', 1),
(140, 8, 'Cruze', 'model', 1),
(141, 8, 'Lacetti', 'model', 1),
(142, 8, 'Volt', 'model', 1),
(143, 8, 'Malibu', 'model', 1),
(144, 8, 'Caprice', 'model', 1),
(145, 8, 'Impala', 'model', 1),
(146, 8, 'Lumina', 'model', 1),
(147, 8, 'SS', 'model', 1),
(148, 8, 'Corvette', 'model', 1),
(149, 8, 'Camaro', 'model', 1),
(150, 8, 'Orlando', 'model', 1),
(151, 8, 'Spin', 'model', 1),
(152, 8, 'Tavera', 'model', 1),
(153, 8, 'Captiva', 'model', 1),
(154, 8, 'Niva', 'model', 1),
(155, 8, 'Colorado', 'model', 1),
(156, 8, 'Express', 'model', 1),
(157, 8, 'Montana', 'model', 1),
(158, 8, 'Tornado', 'model', 1),
(159, 9, 'Ypsilon', 'model', 1),
(160, 9, 'Delta', 'model', 1),
(161, 9, '300', 'model', 1),
(162, 9, 'Grand Voyager', 'model', 1),
(163, 10, 'C1', 'model', 1),
(164, 10, 'C4 Picasso', 'model', 1),
(165, 10, 'Aircross', 'model', 1),
(166, 10, 'C- Elysse', 'model', 1),
(167, 10, 'C3 Picasso', 'model', 1),
(168, 10, 'C4', 'model', 1),
(169, 10, 'C4 Cactus', 'model', 1),
(170, 13, 'Avenger', 'model', 1),
(171, 13, 'Grand Caravan', 'model', 1),
(172, 13, 'Challenger', 'model', 1),
(173, 13, 'Charger', 'model', 1),
(174, 13, 'Dart', 'model', 1),
(175, 13, 'Durango', 'model', 1),
(176, 13, 'Journey', 'model', 1),
(177, 17, 'Sierra', 'model', 1),
(178, 17, 'Syclone', 'model', 1),
(179, 17, 'Sonoma', 'model', 1),
(180, 17, 'Canyon', 'model', 1),
(181, 17, 'TopKick', 'model', 1),
(182, 17, 'Forward', 'model', 1),
(183, 17, 'W-Series', 'model', 1),
(184, 17, 'T-Series', 'model', 1),
(185, 17, 'Typhoon', 'model', 1),
(186, 17, 'Envoy', 'model', 1),
(187, 17, 'Acadia', 'model', 1),
(188, 17, 'Terrain', 'model', 1),
(189, 18, 'Accord', 'model', 1),
(190, 18, 'Acty', 'model', 1),
(191, 18, 'Brio', 'model', 1),
(192, 18, 'City', 'model', 1),
(193, 18, 'Civic', 'model', 1),
(194, 18, 'CR-V', 'model', 1),
(195, 18, 'Elysion', 'model', 1),
(196, 18, 'HR-V', 'model', 1),
(197, 18, 'NSX', 'model', 1),
(198, 18, 'Pilot', 'model', 1),
(199, 18, 'Shuttle', 'model', 1),
(200, 18, 'Vamos', 'model', 1),
(201, 18, 'ZEST', 'model', 1),
(202, 19, 'Accent', 'model', 1),
(203, 19, 'Ventam Genesis', 'model', 1),
(204, 19, 'Eon', 'model', 1),
(205, 19, 'Atos', 'model', 1),
(206, 19, 'Santro', 'model', 1),
(207, 19, 'Avante', 'model', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixemailtmpl`
--

DROP TABLE IF EXISTS `db_tabprefixemailtmpl`;
CREATE TABLE IF NOT EXISTS `db_tabprefixemailtmpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` char(100) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `db_tabprefixemailtmpl`
--

INSERT INTO `db_tabprefixemailtmpl` (`id`, `email_name`, `values`, `status`) VALUES
(1, 'confirmation_email', '{"subject":"Confirmation email","body":"Hi #username,\\r\\nYour signup is successful. Please follow the below link for activating your account:\\r\\n \\r\\n#activationlink\\r\\n\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\r\\nThanks\\r\\n#webadmin","avl_vars":"#username,#useremail,#activationlink,#webadmin"}', 1),
(2, 'recovery_email', '{"subject":"Recovery email","body":"Hi #username,\\r\\nWe have received an account recovery request from your email. Please follow the below link for setting new password \\r\\n\\r\\n#recoverylink\\r\\n\\r\\nThanks\\r\\n#webadmin","avl_vars":"#username,#recoverylink,#webadmin"}', 1),
(3, 'signup_notification_email', '{"subject":"Notification email","body":"Hi #username,\\nWe''ve received signup information from you. Once you''ve finish the payment, your account will be activated. You can return to this page by following the following link: \\n\\n#recoverylink\\n\\nThanks\\n#webadmin","avl_vars":"#username,#recoverylink,#webadmin"}', 1),
(4, 'payment_confirmation_email', '{"subject":"Confirmation email","body":"Hi #username,\\nYour account is confirmed. Please follow the below link for login\\n\\n#loginlink\\n\\nThanks\\n#webadmin","avl_vars":"#username,#loginlink,#webadmin"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixlanguage`
--

DROP TABLE IF EXISTS `db_tabprefixlanguage`;
CREATE TABLE IF NOT EXISTS `db_tabprefixlanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `lang` char(50) NOT NULL,
  `short_name` char(5) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `lang` (`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `db_tabprefixlanguage`
--

INSERT INTO `db_tabprefixlanguage` (`id`, `unique_id`, `lang`, `short_name`, `values`, `status`) VALUES
(1, 'English-en', 'English', 'en', '{"condition_new":"New","condition_used":"Used","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Other","condition_sold":"Sold","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Register","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Terms and Confition","reg_success_message":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Status","description":"Description","location_map":"Location Map","image_gallery":"Image Gallery","summary":"Summary","overview":"Overview","address":"Address","message":"Message","username":"Username","about_me":"About Me","type_filters":"Type Filters","email_subject":"Email Subject","all":"All","deleted":"Deleted","contact_us":"Contact Us","active":"Active","pending":"Pending","reported":"Reported","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Cars","car":"Car","manufacturers":"Manufacturers","car_type":"Car Type","car_manufacturer":"Car Manufacturer","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Specifications","dimensions":"Dimensions","reg_no":"Registration No.","engine_size":"Engine Size","engine_type":"Engine Type","exterior_color":"Exterior Color","interior_color":"Interior Color","fuel_type":"Fuel Type","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Height","width":"Width","length":"Length","wheelbase":"Wheelbase","track_rear":"Track Rear","track_front":"Track Front","ground_clearance":"Ground Clearance","manufacturer":"Manufacturer","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Recent Cars","select_manufacturer":"Select Manufacturer","select_model":"Select Model","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"All Dealers","all_cars":"All cars","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Tags","no_dealers_found":"No Dealers Found","dealer_vehicles":"Dealer Vehicles","result":"Result","dealer_not_found":"Dealer not Found","payment_finish_title":"Payment Complete","payment_renew_title":"Payment Complete","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contact Subject","dealer_panel":"Dealer Panel","list_your_car":"List Your Car","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"News","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled","mileage_range":"Mileage Range","select_transmission_type":"Select Transmission","select_car_condition":"Select Condition","enter_above_text":"Enter Above Text","dt_first":"First","dt_last":"Last","dt_next":"Next","dt_prev":"Previous","dt_no_data":"No data available in table","dt_show_empty":"Showing 0 to 0 of 0 entries","dt_no_match":"No matching records found","dt_search":"Search","dt_processing":"Processing...","dt_loading":"Loading...","dt_info":"Showing _START_ to _END_ of _TOTAL_ entries","dt_filter_info":"(filtered from _MAX_ total entries)","dt_show_entries":"Show _MENU_ entries","days":"Days","posts":"Posts","take_package":"Take package","selected_package":"Selected package","email":"Email","password":"Password","confirm_password":"Confirm password","i_have_read":"I''ve read the","terms_conditon":"Terms and conditions","signup_with_social_accounts":"SIgnup with social accounts","profile":"Profile","map_api_key":"Gmap api key","show_state_province":"Show state\\/province","cookie_policy":"Cookie policy","cookie_policy_alert":"This site uses cookies. By continuing to use this site you agree to our use of cookies.","read_more":"Read more","i_agree":"I agree","ask_for_price":"Ask for price","total_view":"Total view"}', 1),
(3, 'Spanish-es', 'Spanish', 'es', '{"condition_new":"Nueva","condition_used":"Usado","condition_pre_owned":"usados \\u200b\\u200bcertificados","condition_recondition":"Reacondicionamiento","condition_other":"Otros","condition_sold":"Vendido","condition_available":"Disponible","sign_in":"Iniciar sesi\\u00f3n","sign_up":"Registrarse","admin_panel":"Panel de administraci\\u00f3n","logout":"Salir","advanced_search":"B\\u00fasqueda Avanzada","home":"Hogar","about":"sobre","contact":"Contacto","plain_search":"Llanura Buscar","ignore_this_section":"No haga caso de esta secci\\u00f3n","location_search":"Buscar una localidad","country":"Pa\\u00eds","state_province":"Estado \\/ Provincia","city":"Ciudad","price":"Precio","phone":"Tel\\u00e9fono","first_name":"nombre","last_name":"Apellido","company_name":"Nombre de la empresa","register":"Registrarse","type":"Tipo","details":"Detalles de la descarga","view_all":"Ver todos","order_by":"Orden","none":"Ninguno","terms_and_conditions":"T\\u00e9rminos y confition","reg_success_message":"Su registro de la cuenta es exitosa. Un correo electr\\u00f3nico fue enviado a su correo electr\\u00f3nico. Por favor, siga que el correo electr\\u00f3nico para activar sus account.Thanks","limit":"L\\u00edmite","usage":"Uso","recover":"Recuperar","oops":"Vaya, no se encontr\\u00f3 la p\\u00e1gina","share_this":"Compartir Este","status":"Estado","description":"Descripci\\u00f3n","location_map":"Mapa de ubicaci\\u00f3n","image_gallery":"Galer\\u00eda de im\\u00e1genes","summary":"Resumen","overview":"Resumen de","address":"Direcci\\u00f3n","message":"Mensaje","username":"Nombre de usuario","about_me":"Acerca de m\\u00ed","type_filters":"Tipo Filtros","email_subject":"Asunto del correo","all":"todo","deleted":"Suprimido","contact_us":"Contacte con nosotros","active":"Activo","pending":"Pendiente","reported":"Correspondiente","featured_video":"Video del d\\u00eda","embed_video_url":"Embeded URL de video","profile_picture":"Imagen","cars":"Coches","car":"de coches","manufacturers":"","car_type":"Tipo de Auto","car_manufacturer":"Fabricante de coches","car_model":"Modelo del coche","year":"A\\u00f1o","mileage":"","condition":"Condici\\u00f3n","specifications":"Especificaciones","dimensions":"Dimensiones","reg_no":"N \\u00b0 de registro","engine_size":"Tama\\u00f1o del motor","engine_type":"Tipo de motor","exterior_color":"Color Exterior","interior_color":"Color Interior","fuel_type":"Tipo de combustible","safety_rating":"Clasificaci\\u00f3n de seguridad","standard_seating":"Norma Asientos","steering_type":"Tipo de direcci\\u00f3n","height":"Altura","width":"Ancho","length":"Longitud","wheelbase":"Distancia entre ejes","track_rear":"v\\u00eda trasera","track_front":"Frente Pista","ground_clearance":"Distancia al suelo","manufacturer":"Fabricante","body_type":"Tipo de Cuerpo","featured_cars":"Coches destacados","recent_cars":"Coches recientes","select_manufacturer":"Selecto","select_model":"Seleccionar modelo","price_range":"Escala de precios","select_type":"Seleccionar el tipo de","model_year":"Modelo A\\u00f1o","filter_vehicles":"Veh\\u00edculos de filtro","no_cars_found":"No se han encontrado coches","dealers":"Distribuidores","all_dealers":"Todos los Distribuidores","all_cars":"Todos los coches","top_dealers":"Los principales concesionarios","top_cars":"Top Cars","dealer_cars":"Concesionario Coches","dealer_location":"Ubicaci\\u00f3n del distribuidor","dealer":"","model":"Modelo","zip_code":"C\\u00f3digo Postal","transmission":"Transmisi\\u00f3n","tags":"Etiquetas","no_dealers_found":"No se han encontrado Distribuidores","dealer_vehicles":"Veh\\u00edculos del distribuidor","result":"Resultado","dealer_not_found":"Concesionario no encontrado","payment_finish_title":"Pago Completo","payment_renew_title":"Pago Completo","payment_finish_text":"Su pago se ha completado. Tan pronto como recibimos la confirmaci\\u00f3n de PayPal se activar\\u00e1 su cuenta","payment_renew_text":"Su pago se ha completado. Tan pronto como recibimos la confirmaci\\u00f3n de PayPal ser\\u00e1 renovado su cuenta","payment_cancel_title":"Pago Cancelar","payment_cancel_text":"Su pago se cancela","feature_payment_finish":"Su pago se ha completado. Tan pronto como recibamos la confirmaci\\u00f3n de PayPal, se presentar\\u00e1 su patrimonio.","feature_payment_cancel":"Su pago se cancela.","payment_notification":"Usted va a hacer un pago. Un correo electr\\u00f3nico es enviado a su correo electr\\u00f3nico. Puede hacer una copia de este paso en cualquier momento desde el enlace de ese correo electr\\u00f3nico.","type_filers":"Tipo Filtros","view_listing":"Ver entradas","car_added_successfully":"coches agregado con \\u00e9xito","email_tracker":"Correo electr\\u00f3nico Rastreador","bulk_email":"Correo electr\\u00f3nico masivo","other_info":"Otra Informaci\\u00f3n","basic_info":"Informaci\\u00f3n B\\u00e1sica","contact_subject":"Contacto Asunto","dealer_panel":"Grupo Concesionario","list_your_car":"Lista de su coche","share":"Comparte","search":"Buscar","all_email_to_dealer":"todo el correo a distribuidor","embed_preview":"Insertar Vista previa","car_brochure":"Folleto de coches","pages":"P\\u00e1ginas","post_not_found":"Sin cargo se encontr\\u00f3","blog":"","news":"Noticias","article":"Art\\u00edculo","change_package":"Paquete de Cambios","bi_payment_cancel_title":"Pago cancelado","mileage_range":"Rango Kilometraje","select_transmission_type":"Seleccione una Transmisi\\u00f3n","select_car_condition":"Seleccionar Condici\\u00f3n","enter_above_text":"Introduzca el texto por encima","dt_first":"Primera","dt_last":"\\u00daltimo","dt_next":"Siguiente","dt_prev":"Anterior","dt_no_data":"No hay datos disponibles en la tabla","dt_show_empty":"Mostrando 0 a 0 de 0 entradas","dt_no_match":"No existen registros que coincidan encontrados","dt_search":"Buscar","dt_processing":"Procesamiento ...","dt_loading":"Cargando ...","dt_info":"Mostrando _START_ a _END_ de entradas _TOTAL_","dt_filter_info":"(filtrado de las entradas totales _MAX_)","dt_show_entries":"Mostrar Entradas _MENU_","days":"D\\u00edas","posts":"Mensajes","take_package":"Tome paquete","selected_package":"Selected paquete","email":"Correo electr\\u00f3nico","password":"Contrase\\u00f1a","confirm_password":"Confirmar contrase\\u00f1a","i_have_read":"He le\\u00eddo el","terms_conditon":"T\\u00e9rminos y condiciones","signup_with_social_accounts":"Registrar con cuentas sociales","profile":"","map_api_key":"clave de API Gmap","show_state_province":"Mostrar estado \\/ provincia","cookie_policy":"pol\\u00edtica de cookies","cookie_policy_alert":"Este sitio utiliza cookies. Al continuar utilizando este sitio usted acepta el uso de cookies.","read_more":"Leer m\\u00e1s","i_agree":"Estoy de acuerdo"}', 1),
(4, 'Russian-ru', 'Russian', 'ru', '{"condition_new":"\\u041d\\u043e\\u0432\\u044b\\u0439","condition_used":"\\u0418\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u0443\\u0435\\u0442\\u0441\\u044f","condition_pre_owned":"\\u0421\\u0435\\u0440\\u0442\\u0438\\u0444\\u0438\\u0446\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\\u043d\\u044b\\u0439 Pre \\u041f\\u043e\\u0434\\u0435\\u0440\\u0436\\u0430\\u043d\\u043d\\u044b\\u0439","condition_recondition":"\\u0412\\u043e\\u0441\\u0441\\u0442\\u0430\\u043d\\u043e\\u0432\\u0438\\u0442\\u0435\\u043b\\u044c\\u043d\\u044b\\u0439","condition_other":"\\u0414\\u0440\\u0443\\u0433\\u043e\\u0435","condition_sold":"\\u041f\\u0440\\u043e\\u0434\\u0430\\u043d\\u043e","condition_available":"\\u0414\\u043e\\u0441\\u0442\\u0443\\u043f\\u0435\\u043d","sign_in":"\\u0412\\u0445\\u043e\\u0434","sign_up":"\\u0420\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u044f","admin_panel":"\\u041f\\u0430\\u043d\\u0435\\u043b\\u044c \\u0430\\u0434\\u043c\\u0438\\u043d\\u0438\\u0441\\u0442\\u0440\\u0430\\u0442\\u043e\\u0440\\u0430","logout":"\\u0432\\u044b\\u0445\\u043e\\u0434 \\u0438\\u0437 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u044b","advanced_search":"\\u0420\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043f\\u043e\\u0438\\u0441\\u043a","home":"\\u0413\\u043b\\u0430\\u0432\\u043d\\u0430\\u044f","about":"\\u041e","contact":"\\u041a\\u043e\\u043d\\u0442\\u0430\\u043a\\u0442","plain_search":"Plain \\u041f\\u043e\\u0438\\u0441\\u043a","ignore_this_section":"\\u0418\\u0433\\u043d\\u043e\\u0440\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c \\u044d\\u0442\\u043e\\u0442 \\u0440\\u0430\\u0437\\u0434\\u0435\\u043b","location_search":"\\u041f\\u043e\\u0438\\u0441\\u043a \\u043f\\u043e \\u043c\\u0435\\u0441\\u0442\\u043e\\u043f\\u043e\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u044e","country":"\\u0421\\u0442\\u0440\\u0430\\u043d\\u0430","state_province":"\\u0428\\u0442\\u0430\\u0442 \\/ \\u043f\\u0440\\u043e\\u0432\\u0438\\u043d\\u0446\\u0438\\u044f","city":"\\u0413\\u043e\\u0440\\u043e\\u0434","price":"\\u0426\\u0435\\u043d\\u0430","phone":"\\u0422\\u0435\\u043b\\u0435\\u0444\\u043e\\u043d","first_name":"\\u0418\\u043c\\u044f","last_name":"\\u0424\\u0430\\u043c\\u0438\\u043b\\u0438\\u044f","company_name":"\\u041d\\u0430\\u0437\\u0432\\u0430\\u043d\\u0438\\u0435 \\u043a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u0438","register":"\\u0420\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u044f","type":"\\u0422\\u0438\\u043f","details":"\\u041f\\u043e\\u0434\\u0440\\u043e\\u0431\\u043d\\u043e\\u0441\\u0442\\u0438","view_all":"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u0432\\u0441\\u0435","order_by":"\\u0421\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c \\u043f\\u043e","none":"\\u041d\\u0435\\u0442","terms_and_conditions":"\\u0422\\u0435\\u0440\\u043c\\u0438\\u043d\\u044b \\u0438 Confition","reg_success_message":"\\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u044f \\u0412\\u0430\\u0448\\u0430 \\u0443\\u0447\\u0435\\u0442\\u043d\\u0430\\u044f \\u0437\\u0430\\u043f\\u0438\\u0441\\u044c \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u0430. \\u041f\\u0438\\u0441\\u044c\\u043c\\u043e \\u0431\\u044b\\u043b\\u043e \\u043e\\u0442\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043e \\u043d\\u0430 \\u0432\\u0430\\u0448 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u044b\\u0439 \\u0430\\u0434\\u0440\\u0435\\u0441. \\u041f\\u043e\\u0436\\u0430\\u043b\\u0443\\u0439\\u0441\\u0442\\u0430, \\u0441\\u043b\\u0435\\u0434\\u0443\\u0439\\u0442\\u0435 \\u044d\\u0442\\u043e\\u0439 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0439 \\u043f\\u043e\\u0447\\u0442\\u0435, \\u0447\\u0442\\u043e\\u0431\\u044b \\u0430\\u043a\\u0442\\u0438\\u0432\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c account.Thanks","limit":"\\u041f\\u0440\\u0435\\u0434\\u0435\\u043b","usage":"\\u0418\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435","recover":"\\u0412\\u043e\\u0441\\u0441\\u0442\\u0430\\u043d\\u043e\\u0432\\u0438\\u0442\\u044c","oops":"\\u041a \\u0441\\u043e\\u0436\\u0430\\u043b\\u0435\\u043d\\u0438\\u044e, \\u0441\\u0442\\u0440\\u0430\\u043d\\u0438\\u0446\\u0430 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u0430","share_this":"\\u041f\\u043e\\u0434\\u0435\\u043b\\u0438\\u0442\\u044c\\u0441\\u044f \\u044d\\u0442\\u043e\\u0439","status":"","description":"\\u041e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435","location_map":"Location Map","image_gallery":"\\u0413\\u0430\\u043b\\u0435\\u0440\\u0435\\u044f \\u0438\\u0437\\u043e\\u0431\\u0440\\u0430\\u0436\\u0435\\u043d\\u0438\\u0439","summary":"\\u0440\\u0435\\u0437\\u044e\\u043c\\u0435","overview":"\\u041e\\u0431\\u0437\\u043e\\u0440","address":"\\u0410\\u0434\\u0440\\u0435\\u0441","message":"\\u0421\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u0435","username":"\\u0418\\u043c\\u044f \\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u0435\\u043b\\u044f","about_me":"\\u041e\\u0431\\u043e \\u043c\\u043d\\u0435","type_filters":"\\u0424\\u0438\\u043b\\u044c\\u0442\\u0440\\u044b \\u0442\\u0438\\u043f\\u0430","email_subject":"\\u0422\\u0435\\u043c\\u0430 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0433\\u043e \\u043f\\u0438\\u0441\\u044c\\u043c\\u0430","all":"\\u0412\\u0441\\u0435","deleted":"\\u0423\\u0434\\u0430\\u043b\\u0435\\u043d\\u043d\\u044b\\u0435","contact_us":"\\u041e\\u0431\\u0440\\u0430\\u0442\\u043d\\u0430\\u044f \\u0441\\u0432\\u044f\\u0437\\u044c","active":"\\u0410\\u043a\\u0442\\u0438\\u0432\\u043d\\u044b\\u0439","pending":"\\u0412 \\u043e\\u0436\\u0438\\u0434\\u0430\\u043d\\u0438\\u0438","reported":"\\u0421\\u043e\\u043e\\u0431\\u0449\\u0430\\u0435\\u0442\\u0441\\u044f,","featured_video":"\\u041b\\u0443\\u0447\\u0448\\u0435\\u0435 \\u0432\\u0438\\u0434\\u0435\\u043e","embed_video_url":"Embeded URL \\u0432\\u0438\\u0434\\u0435\\u043e","profile_picture":"\\u041f\\u0440\\u043e\\u0444\\u0438\\u043b\\u044c \\u0424\\u043e\\u0442\\u043e","cars":"\\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","car":"\\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c","manufacturers":"\\u041f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u0438","car_type":"\\u0422\\u0438\\u043f \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044f","car_manufacturer":"\\u041f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044c \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0435\\u0439","car_model":"\\u041c\\u043e\\u0434\\u0435\\u043b\\u044c \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044f","year":"\\u0413\\u043e\\u0434","mileage":"\\u041f\\u0440\\u043e\\u0431\\u0435\\u0433","condition":"\\u0441\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u0438\\u0435","specifications":"\\u0422\\u0435\\u0445\\u043d\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0435 \\u0445\\u0430\\u0440\\u0430\\u043a\\u0442\\u0435\\u0440\\u0438\\u0441\\u0442\\u0438\\u043a\\u0438","dimensions":"\\u0420\\u0430\\u0437\\u043c\\u0435\\u0440\\u044b","reg_no":"\\u0420\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u043e\\u043d\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440","engine_size":"\\u0414\\u0432\\u0438\\u0433\\u0430\\u0442\\u0435\\u043b\\u044c \\u0420\\u0430\\u0437\\u043c\\u0435\\u0440","engine_type":"\\u0422\\u0438\\u043f \\u0434\\u0432\\u0438\\u0433\\u0430\\u0442\\u0435\\u043b\\u044f","exterior_color":"\\u0426\\u0432\\u0435\\u0442 \\u043a\\u0443\\u0437\\u043e\\u0432\\u0430","interior_color":"\\u0426\\u0432\\u0435\\u0442 \\u0441\\u0430\\u043b\\u043e\\u043d\\u0430","fuel_type":"\\u0422\\u0438\\u043f \\u0442\\u043e\\u043f\\u043b\\u0438\\u0432\\u0430","safety_rating":"\\u0411\\u0435\\u0437\\u043e\\u043f\\u0430\\u0441\\u043d\\u043e\\u0441\\u0442\\u044c \\u0420\\u0435\\u0439\\u0442\\u0438\\u043d\\u0433","standard_seating":"\\u0421\\u0442\\u0430\\u043d\\u0434\\u0430\\u0440\\u0442\\u043d\\u044b\\u0439 \\u0413\\u043e\\u0441\\u0442\\u0438\\u043d\\u044b\\u0439","steering_type":"\\u0422\\u0438\\u043f \\u0440\\u0443\\u043b\\u044f","height":"\\u0412\\u044b\\u0441\\u043e\\u0442\\u0430","width":"\\u0448\\u0438\\u0440\\u0438\\u043d\\u0430","length":"\\u0414\\u043b\\u0438\\u043d\\u0430","wheelbase":"\\u043a\\u043e\\u043b\\u0435\\u0441\\u043d\\u0430\\u044f \\u0431\\u0430\\u0437\\u0430","track_rear":"\\u0422\\u0440\\u0435\\u043a \\u0441\\u0437\\u0430\\u0434\\u0438","track_front":"\\u0422\\u0440\\u0435\\u043a \\u0441\\u043f\\u0435\\u0440\\u0435\\u0434\\u0438","ground_clearance":"\\u0414\\u043e\\u0440\\u043e\\u0436\\u043d\\u044b\\u0439 \\u043f\\u0440\\u043e\\u0441\\u0432\\u0435\\u0442","manufacturer":"\\u041f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044c","body_type":"\\u0422\\u0438\\u043f \\u043a\\u0443\\u0437\\u043e\\u0432\\u0430","featured_cars":"\\u0420\\u0435\\u043a\\u043e\\u043c\\u0435\\u043d\\u0434\\u0443\\u0435\\u043c\\u044b\\u0435 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","recent_cars":"\\u041f\\u043e\\u0441\\u043b\\u0435\\u0434\\u043d\\u0438\\u0435 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","select_manufacturer":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u043f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044f","select_model":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c","price_range":"\\u0414\\u0438\\u0430\\u043f\\u0430\\u0437\\u043e\\u043d \\u0446\\u0435\\u043d","select_type":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u0442\\u0438\\u043f","model_year":"\\u041c\\u043e\\u0434\\u0435\\u043b\\u044c \\u0413\\u043e\\u0434","filter_vehicles":"\\u0424\\u0438\\u043b\\u044c\\u0442\\u0440 \\u0422\\u0440\\u0430\\u043d\\u0441\\u043f\\u043e\\u0440\\u0442","no_cars_found":"\\u041d\\u0435\\u0442 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u044b","dealers":"\\u0414\\u0438\\u043b\\u0435\\u0440\\u044b","all_dealers":"\\u0412\\u0441\\u0435 \\u0434\\u0438\\u043b\\u0435\\u0440\\u044b","all_cars":"\\u0412\\u0441\\u0435 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","top_dealers":"\\u041b\\u0443\\u0447\\u0448\\u0438\\u0435 \\u0434\\u0438\\u043b\\u0435\\u0440\\u044b","top_cars":"\\u041b\\u0443\\u0447\\u0448\\u0438\\u0435 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","dealer_cars":"\\u0414\\u0438\\u043b\\u0435\\u0440\\u0441\\u043a\\u0438\\u0435 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","dealer_location":"\\u0414\\u0438\\u043b\\u0435\\u0440 \\u0420\\u0430\\u0441\\u043f\\u043e\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435","dealer":"\\u0434\\u0438\\u043b\\u0435\\u0440","model":"\\u041c\\u043e\\u0434\\u0435\\u043b\\u044c","zip_code":"\\u041f\\u043e\\u0447\\u0442\\u043e\\u0432\\u044b\\u0439 \\u0438\\u043d\\u0434\\u0435\\u043a\\u0441","transmission":"\\u041a\\u043e\\u0440\\u043e\\u0431\\u043a\\u0430 \\u043f\\u0435\\u0440\\u0435\\u0434\\u0430\\u0447","tags":"\\u0422\\u0435\\u0433\\u0438","no_dealers_found":"\\u041d\\u0435\\u0442 \\u0414\\u0438\\u043b\\u0435\\u0440\\u044b \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u043e","dealer_vehicles":"\\u0434\\u0438\\u043b\\u0435\\u0440 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0435\\u0439","result":"\\u0420\\u0435\\u0437\\u0443\\u043b\\u044c\\u0442\\u0430\\u0442","dealer_not_found":"\\u0414\\u0438\\u043b\\u0435\\u0440 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d","payment_finish_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041f\\u043e\\u043b\\u043d\\u0430\\u044f","payment_renew_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041f\\u043e\\u043b\\u043d\\u0430\\u044f","payment_finish_text":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0437\\u0430\\u0432\\u0435\\u0440\\u0448\\u0435\\u043d. \\u041a\\u0430\\u043a \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043c\\u044b \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043b\\u0438 \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u0435 \\u043e\\u0442 PayPal \\u0432\\u0430\\u0448 \\u0430\\u043a\\u043a\\u0430\\u0443\\u043d\\u0442 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0430\\u043a\\u0442\\u0438\\u0432\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d","payment_renew_text":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0437\\u0430\\u0432\\u0435\\u0440\\u0448\\u0435\\u043d. \\u041a\\u0430\\u043a \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043c\\u044b \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043b\\u0438 \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u0435 \\u043e\\u0442 PayPal \\u0432\\u0430\\u0448 \\u0441\\u0447\\u0435\\u0442 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043e\\u0431\\u043d\\u043e\\u0432\\u043b\\u0435\\u043d","payment_cancel_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041e\\u0442\\u043c\\u0435\\u043d\\u0438\\u0442\\u044c","payment_cancel_text":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043e\\u0442\\u043c\\u0435\\u043d\\u0435\\u043d","feature_payment_finish":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0437\\u0430\\u0432\\u0435\\u0440\\u0448\\u0435\\u043d. \\u041a\\u0430\\u043a \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043c\\u044b \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043c \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u0435 \\u043e\\u0442 PayPal, \\u0432\\u0430\\u0448\\u0435 \\u0438\\u043c\\u0443\\u0449\\u0435\\u0441\\u0442\\u0432\\u043e \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043f\\u0440\\u0438\\u0437\\u043d\\u0430\\u043a\\u0430\\u043c.","feature_payment_cancel":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043e\\u0442\\u043c\\u0435\\u043d\\u0435\\u043d.","payment_notification":"\\u0412\\u044b \\u0441\\u043e\\u0431\\u0438\\u0440\\u0430\\u0435\\u0442\\u0435\\u0441\\u044c \\u0441\\u043e\\u0432\\u0435\\u0440\\u0448\\u0438\\u0442\\u044c \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436. \\u041f\\u0438\\u0441\\u044c\\u043c\\u043e \\u0441 \\u043e\\u0442\\u043f\\u0440\\u0430\\u0432\\u043b\\u044f\\u0435\\u0442\\u0441\\u044f \\u043d\\u0430 \\u0432\\u0430\\u0448 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u044b\\u0439 \\u0430\\u0434\\u0440\\u0435\\u0441. \\u0412\\u044b \\u043c\\u043e\\u0436\\u0435\\u0442\\u0435 \\u0432\\u0435\\u0440\\u043d\\u0443\\u0442\\u044c\\u0441\\u044f \\u043a \\u044d\\u0442\\u043e\\u043c\\u0443 \\u0448\\u0430\\u0433\\u0443 \\u0432 \\u043b\\u044e\\u0431\\u043e\\u0435 \\u0432\\u0440\\u0435\\u043c\\u044f \\u0441 \\u043f\\u043e\\u043c\\u043e\\u0449\\u044c\\u044e \\u0441\\u0441\\u044b\\u043b\\u043a\\u0438 \\u043d\\u0430 \\u044d\\u0442\\u0443 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u0443\\u044e \\u043f\\u043e\\u0447\\u0442\\u0443.","type_filers":"\\u0424\\u0438\\u043b\\u044c\\u0442\\u0440\\u044b \\u0442\\u0438\\u043f\\u0430","view_listing":"\\u041f\\u0440\\u043e\\u0441\\u043c\\u043e\\u0442\\u0440\\u0435\\u0442\\u044c \\u0441\\u043f\\u0438\\u0441\\u043e\\u043a","car_added_successfully":"\\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u043e \\u0434\\u043e\\u0431\\u0430\\u0432\\u043b\\u0435\\u043d","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"\\u0414\\u0440\\u0443\\u0433\\u0430\\u044f \\u0438\\u043d\\u0444\\u043e\\u0440\\u043c\\u0430\\u0446\\u0438\\u044f","basic_info":"\\u041e\\u0441\\u043d\\u043e\\u0432\\u043d\\u0430\\u044f \\u0438\\u043d\\u0444\\u043e\\u0440\\u043c\\u0430\\u0446\\u0438\\u044f","contact_subject":"\\u041a\\u043e\\u043d\\u0442\\u0430\\u043a\\u0442\\u043d\\u043e\\u0435 \\u043b\\u0438\\u0446\\u043e \\u0422\\u0435\\u043c\\u0430","dealer_panel":"\\u0414\\u0438\\u043b\\u0435\\u0440 \\u041f\\u0430\\u043d\\u0435\\u043b\\u044c","list_your_car":"\\u0421\\u043f\\u0438\\u0441\\u043e\\u043a \\u0412\\u0430\\u0448 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c","share":"\\u0414\\u043e\\u043b\\u044f","search":"\\u041f\\u043e\\u0438\\u0441\\u043a","all_email_to_dealer":"\\u0412\\u0441\\u044f \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u0430\\u044f \\u043f\\u043e\\u0447\\u0442\\u0430 \\u0434\\u0438\\u043b\\u0435\\u0440\\u0441\\u043a\\u0438\\u043c","embed_preview":"\\u0412\\u0441\\u0442\\u0430\\u0432\\u0438\\u0442\\u044c \\u0438\\u0437\\u043e\\u0431\\u0440\\u0430\\u0436\\u0435\\u043d\\u0438\\u0435","car_brochure":"\\u0411\\u0440\\u043e\\u0448\\u044e\\u0440\\u0430 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044f","pages":"\\u0421\\u0442\\u0440\\u0430\\u043d\\u0438\\u0446\\u044b","post_not_found":"\\u041d\\u0435\\u0442 \\u0421\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u043e","blog":"\\u0411\\u043b\\u043e\\u0433","news":"\\u041d\\u043e\\u0432\\u043e\\u0441\\u0442\\u0438","article":"\\u0421\\u0442\\u0430\\u0442\\u044c\\u044f","change_package":"\\u0418\\u0437\\u043c\\u0435\\u043d\\u0435\\u043d\\u0438\\u0435 \\u043f\\u0430\\u043a\\u0435\\u0442\\u0430","bi_payment_cancel_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041e\\u0442\\u043c\\u0435\\u043d\\u0435\\u043d\\u043e","mileage_range":"\\u0414\\u0438\\u0430\\u043f\\u0430\\u0437\\u043e\\u043d \\u041f\\u0440\\u043e\\u0431\\u0435\\u0433","select_transmission_type":"\\u0412\\u044b\\u0431\\u043e\\u0440 \\u043a\\u043e\\u0440\\u043e\\u0431\\u043a\\u0438 \\u043f\\u0435\\u0440\\u0435\\u0434\\u0430\\u0447","select_car_condition":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u0443\\u0441\\u043b\\u043e\\u0432\\u0438\\u0435","enter_above_text":"\\u0412\\u0432\\u0435\\u0434\\u0438\\u0442\\u0435 \\u041f\\u0440\\u0438\\u0432\\u0435\\u0434\\u0435\\u043d\\u043d\\u044b\\u0439 \\u0432\\u044b\\u0448\\u0435 \\u0442\\u0435\\u043a\\u0441\\u0442","dt_first":"\\u0412\\u043e-\\u043f\\u0435\\u0440\\u0432\\u044b\\u0445","dt_last":"\\u041f\\u043e\\u0441\\u043b\\u0435\\u0434\\u043d\\u0438\\u0439","dt_next":"\\u0421\\u043b\\u0435\\u0434\\u0443\\u044e\\u0449\\u0438\\u0439","dt_prev":"\\u041f\\u0440\\u0435\\u0434\\u044b\\u0434\\u0443\\u0449\\u0430\\u044f","dt_no_data":"\\u041d\\u0435\\u0442 \\u0434\\u043e\\u0441\\u0442\\u0443\\u043f\\u043d\\u044b\\u0445 \\u0434\\u0430\\u043d\\u043d\\u044b\\u0445 \\u0432 \\u0442\\u0430\\u0431\\u043b\\u0438\\u0446\\u0435","dt_show_empty":"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u043d\\u044b \\u0441 0 \\u043f\\u043e 0 \\u0438\\u0437 0 \\u0437\\u0430\\u043f\\u0438\\u0441\\u0435\\u0439","dt_no_match":"\\u041d\\u0435\\u0442 \\u0441\\u043e\\u043e\\u0442\\u0432\\u0435\\u0442\\u0441\\u0442\\u0432\\u0443\\u044e\\u0449\\u0438\\u0445 \\u0437\\u0430\\u043f\\u0438\\u0441\\u0435\\u0439 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u043e","dt_search":"\\u041f\\u043e\\u0438\\u0441\\u043a","dt_processing":"\\u041e\\u0431\\u0440\\u0430\\u0431\\u043e\\u0442\\u043a\\u0430 ...","dt_loading":"\\u0417\\u0430\\u0433\\u0440\\u0443\\u0437\\u043a\\u0430 ...","dt_info":"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u043d\\u044b _START_ \\u0434\\u043b\\u044f _END_ \\u0437\\u0430\\u043f\\u0438\\u0441\\u0435\\u0439 _TOTAL_","dt_filter_info":"(\\u0444\\u0438\\u043b\\u044c\\u0442\\u0440\\u0443\\u044e\\u0442 \\u043e\\u0442 \\u043e\\u0431\\u0449\\u0435\\u0433\\u043e \\u043a\\u043e\\u043b\\u0438\\u0447\\u0435\\u0441\\u0442\\u0432\\u0430 \\u0437\\u0430\\u043f\\u0438\\u0441\\u0435\\u0439 _MAX_)","dt_show_entries":"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u0437\\u0430\\u043f\\u0438\\u0441\\u0438 _MENU_","days":"\\u0414\\u043d\\u0438","posts":"\\u0421\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u044f","take_package":"\\u041f\\u0440\\u0438\\u043d\\u044f\\u0442\\u044c \\u043f\\u0430\\u043a\\u0435\\u0442","selected_package":"\\u0412\\u044b\\u0431\\u0440\\u0430\\u043d\\u043d\\u044b\\u0439 \\u043f\\u0430\\u043a\\u0435\\u0442","email":"\\u042d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u0430\\u044f \\u043f\\u043e\\u0447\\u0442\\u0430","password":"","confirm_password":"\\u041f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0434\\u0438\\u0442\\u0435 \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c","i_have_read":"\\u042f \\u043f\\u0440\\u043e\\u0447\\u0438\\u0442\\u0430\\u043b","terms_conditon":"\\u041f\\u0440\\u0430\\u0432\\u0438\\u043b\\u0430 \\u0438 \\u0443\\u0441\\u043b\\u043e\\u0432\\u0438\\u044f","signup_with_social_accounts":"SIGNUP \\u0441 \\u0441\\u043e\\u0446\\u0438\\u0430\\u043b\\u044c\\u043d\\u044b\\u043c\\u0438 \\u0441\\u0447\\u0435\\u0442\\u0430\\u043c\\u0438","profile":"\\u043f\\u0440\\u043e\\u0444\\u0438\\u043b\\u044f","map_api_key":"\\u043a\\u043b\\u044e\\u0447 \\u0430\\u043f\\u0438 Gmap","show_state_province":"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u0448\\u0442\\u0430\\u0442 \\/ \\u043f\\u0440\\u043e\\u0432\\u0438\\u043d\\u0446\\u0438\\u044e","cookie_policy":"\\u041f\\u043e\\u043b\\u0438\\u0442\\u0438\\u043a\\u0430 Cookie","cookie_policy_alert":"\\u042d\\u0442\\u043e\\u0442 \\u0441\\u0430\\u0439\\u0442 \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u0443\\u0435\\u0442 \\u043a\\u0443\\u043a\\u0438-\\u0444\\u0430\\u0439\\u043b\\u044b. \\u041f\\u0440\\u043e\\u0434\\u043e\\u043b\\u0436\\u0430\\u044f \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u044c \\u044d\\u0442\\u043e\\u0442 \\u0441\\u0430\\u0439\\u0442, \\u0432\\u044b \\u0441\\u043e\\u0433\\u043b\\u0430\\u0448\\u0430\\u0435\\u0442\\u0435\\u0441\\u044c \\u043d\\u0430 \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435 \\u043d\\u0430\\u043c\\u0438 \\u043a\\u0443\\u043a\\u0438.","read_more":"\\u041f\\u043e\\u0434\\u0440\\u043e\\u0431\\u043d\\u0435\\u0435","i_agree":"\\u042f \\u0441\\u043e\\u0433\\u043b\\u0430\\u0441\\u0435\\u043d"}', 1),
(5, 'Arabic-ar', 'Arabic', 'ar', '{"condition_new":"\\u062c\\u062f\\u064a\\u062f","condition_used":"\\u0645\\u0633\\u062a\\u0639\\u0645\\u0644\\u0629","condition_pre_owned":"\\u0645\\u0635\\u062f\\u0642 \\u0642\\u0628\\u0644 \\u0627\\u0644\\u0645\\u0645\\u0644\\u0648\\u0643\\u0629","condition_recondition":"\\u0631\\u0645\\u0645","condition_other":"\\u0623\\u062e\\u0631\\u0649","condition_sold":"\\u0645\\u0628\\u0627\\u0639\\u0647","condition_available":"\\u0645\\u062a\\u0648\\u0641\\u0631","sign_in":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644","sign_up":"\\u0627\\u0634\\u062a\\u0631\\u0643","admin_panel":"\\u0644\\u0648\\u062d\\u0629 \\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u0629","logout":"\\u062e\\u0631\\u0648\\u062c","advanced_search":"\\u0627\\u0644\\u0628\\u062d\\u062b \\u0627\\u0644\\u0645\\u062a\\u0642\\u062f\\u0645","home":"\\u0627\\u0644\\u0645\\u0646\\u0632\\u0644","about":"\\u062d\\u0648\\u0644","contact":"\\u0627\\u0644\\u0627\\u062a\\u0635\\u0627\\u0644","plain_search":"\\u0639\\u0627\\u062f\\u064a \\u0627\\u0644\\u0628\\u062d\\u062b","ignore_this_section":"\\u062a\\u062c\\u0627\\u0647\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0642\\u0633\\u0645","location_search":"\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0628\\u062d\\u062b \\u0639\\u0646","country":"","state_province":"\\u0627\\u0644\\u062f\\u0648\\u0644\\u0629 \\/ \\u0645\\u0642\\u0627\\u0637\\u0639\\u0629","city":"\\u0645\\u062f\\u064a\\u0646\\u0629","price":"\\u0627\\u0644\\u0633\\u0639\\u0631","phone":"\\u0627\\u0644\\u0647\\u0627\\u062a\\u0641","first_name":"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u0648\\u0644","last_name":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0639\\u0627\\u0626\\u0644\\u0629","company_name":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629","register":"\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644","type":"\\u0646\\u0648\\u0639","details":"\\u062a\\u0641\\u0627\\u0635\\u064a\\u0644","view_all":"\\u0639\\u0631\\u0636 \\u062c\\u0645\\u064a\\u0639","order_by":"\\u0627\\u0644\\u062a\\u0631\\u062a\\u064a\\u0628 \\u062d\\u0633\\u0628","none":"\\u0644\\u0627 \\u0634\\u064a\\u0621","terms_and_conditions":"\\u0634\\u0631\\u0648\\u0637 \\u0648Confition","reg_success_message":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u062d\\u0633\\u0627\\u0628\\u0643 \\u0646\\u0627\\u062c\\u062d\\u0627. \\u062a\\u0645 \\u0625\\u0631\\u0633\\u0627\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643. \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0628\\u0627\\u0639 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0644\\u062a\\u0641\\u0639\\u064a\\u0644 account.Thanks \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643","limit":"\\u0627\\u0644\\u062d\\u062f","usage":"\\u0627\\u0644\\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645","recover":"\\u0627\\u0633\\u062a\\u0631\\u062c\\u0627\\u0639","oops":"\\u0639\\u0641\\u0648\\u0627\\u060c \\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629","share_this":"\\u062d\\u0635\\u0629 \\u0647\\u0630\\u0627","status":"\\u0627\\u0644\\u062d\\u0627\\u0644\\u0629","description":"\\u0627\\u0644\\u0648\\u0635\\u0641","location_map":"\\u062e\\u0631\\u064a\\u0637\\u0629 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639","image_gallery":"\\u0645\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0635\\u0648\\u0631","summary":"\\u0645\\u0644\\u062e\\u0635","overview":"\\u0646\\u0638\\u0631\\u0629 \\u0639\\u0627\\u0645\\u0629","address":"\\u0639\\u0646\\u0648\\u0627\\u0646","message":"\\u0631\\u0633\\u0627\\u0644\\u0629","username":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645","about_me":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0639\\u0646\\u064a","type_filters":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0641\\u0644\\u0627\\u062a\\u0631","email_subject":"\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629","all":"\\u0643\\u0644","deleted":"\\u0627\\u0644\\u0645\\u062d\\u0630\\u0648\\u0641\\u0629","contact_us":"\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0646\\u0627","active":"\\u0646\\u0634\\u0627\\u0637\\u0627\\u062a","pending":"\\u0641\\u064a \\u0627\\u0646\\u062a\\u0638\\u0627\\u0631","reported":"\\u0627\\u0644\\u0645\\u0628\\u0644\\u063a","featured_video":"\\u0627\\u0644\\u0645\\u0645\\u064a\\u0632 \\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648","embed_video_url":"\\u0645\\u0637\\u0639\\u0645 \\u0628 \\u0641\\u064a\\u062f\\u064a\\u0648 \\u0631\\u0627\\u0628\\u0637","profile_picture":"\\u0635\\u0648\\u0631\\u0629 \\u0627\\u0644\\u0645\\u0644\\u0641 \\u0627\\u0644\\u0634\\u062e\\u0635\\u064a","cars":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","car":"\\u0633\\u064a\\u0627\\u0631\\u0629","manufacturers":"\\u0627\\u0644\\u0645\\u0635\\u0646\\u0639\\u0648\\u0646","car_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629","car_manufacturer":"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0635\\u0627\\u0646\\u0639","car_model":"\\u0645\\u0648\\u062f\\u064a\\u0644 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629","year":"\\u0627\\u0644\\u0633\\u0646\\u0629","mileage":"\\u0627\\u0644\\u0623\\u0645\\u064a\\u0627\\u0644","condition":"\\u062d\\u0627\\u0644\\u0629","specifications":"\\u0627\\u0644\\u0645\\u0648\\u0627\\u0635\\u0641\\u0627\\u062a","dimensions":"\\u0627\\u0644\\u0623\\u0628\\u0639\\u0627\\u062f","reg_no":"\\u0631\\u0642\\u0645 \\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644","engine_size":"\\u062d\\u062c\\u0645 \\u0627\\u0644\\u0645\\u062d\\u0631\\u0643","engine_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0645\\u062d\\u0631\\u0643","exterior_color":"\\u0627\\u0644\\u0644\\u0648\\u0646 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a","interior_color":"\\u0627\\u0644\\u0644\\u0648\\u0646 \\u0627\\u0644\\u062f\\u0627\\u062e\\u0644\\u064a","fuel_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0648\\u0642\\u0648\\u062f","safety_rating":"\\u062a\\u0642\\u064a\\u064a\\u0645 \\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\u0629","standard_seating":"\\u0627\\u0644\\u062c\\u0644\\u0648\\u0633 \\u0642\\u064a\\u0627\\u0633\\u064a","steering_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u062a\\u0648\\u062c\\u064a\\u0647","height":"\\u0627\\u0644\\u0637\\u0648\\u0644","width":"\\u0627\\u0644\\u0639\\u0631\\u0636","length":"\\u0637\\u0648\\u0644","wheelbase":"\\u0642\\u0627\\u0639\\u062f\\u0629 \\u0627\\u0644\\u0639\\u062c\\u0644\\u0627\\u062a","track_rear":"\\u0627\\u0644\\u0645\\u0633\\u0627\\u0631 \\u0627\\u0644\\u062e\\u0644\\u0641\\u064a","track_front":"\\u0627\\u0644\\u0645\\u0633\\u0627\\u0631 \\u0627\\u0644\\u062c\\u0628\\u0647\\u0629","ground_clearance":"\\u0627\\u0644\\u062e\\u0644\\u0648\\u0635 \\u0627\\u0644\\u0623\\u0631\\u0636\\u064a","manufacturer":"\\u0627\\u0644\\u0635\\u0627\\u0646\\u0639","body_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u062c\\u0633\\u0645","featured_cars":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0645\\u0645\\u064a\\u0632\\u0629","recent_cars":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u062d\\u062f\\u064a\\u062b\\u0629","select_manufacturer":"\\u0627\\u062e\\u062a\\u0631 \\u0627\\u0644\\u0635\\u0627\\u0646\\u0639","select_model":"\\u062a\\u062d\\u062f\\u064a\\u062f \\u0646\\u0645\\u0648\\u0630\\u062c","price_range":"\\u0627\\u0644\\u0646\\u0637\\u0627\\u0642 \\u0627\\u0644\\u0633\\u0639\\u0631\\u064a","select_type":"\\u062d\\u062f\\u062f \\u0646\\u0648\\u0639","model_year":"\\u0646\\u0645\\u0648\\u0630\\u062c \\u0627\\u0644\\u0633\\u0646\\u0629","filter_vehicles":"\\u062a\\u0635\\u0641\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0643\\u0628\\u0627\\u062a","no_cars_found":"\\u0644\\u0627 \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u064a\\u0647\\u0627","dealers":"\\u062a\\u062c\\u0627\\u0631","all_dealers":"\\u062c\\u0645\\u064a\\u0639 \\u062a\\u062c\\u0627\\u0631","all_cars":"\\u062c\\u0645\\u064a\\u0639 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","top_dealers":"\\u0623\\u0639\\u0644\\u0649 \\u062a\\u062c\\u0627\\u0631","top_cars":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0623\\u0639\\u0644\\u0649","dealer_cars":"\\u062a\\u0627\\u062c\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","dealer_location":"\\u062a\\u0627\\u062c\\u0631 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639","dealer":"\\u062a\\u0627\\u062c\\u0631","model":"\\u0646\\u0645\\u0648\\u0630\\u062c","zip_code":"\\u0627\\u0644\\u0631\\u0645\\u0632 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f\\u064a","transmission":"\\u0646\\u0642\\u0644","tags":"\\u0627\\u0644\\u0643\\u0644\\u0645\\u0627\\u062a","no_dealers_found":"\\u0644\\u0627 \\u062a\\u062c\\u0627\\u0631 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649","dealer_vehicles":"\\u062a\\u0627\\u062c\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","result":"\\u0627\\u0644\\u0646\\u062a\\u064a\\u062c\\u0629","dealer_not_found":"\\u062a\\u0627\\u062c\\u0631 \\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649","payment_finish_title":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644","payment_renew_title":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644","payment_finish_text":"\\u0627\\u0643\\u062a\\u0645\\u0644\\u062a \\u0639\\u0645\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062f\\u0641\\u0639. \\u0641\\u064a \\u0623\\u0642\\u0631\\u0628 \\u0648\\u0642\\u062a \\u0648\\u0646\\u062d\\u0646 \\u062a\\u0644\\u0642\\u064a \\u062a\\u0623\\u0643\\u064a\\u062f \\u0645\\u0646 \\u0628\\u0627\\u064a \\u0628\\u0627\\u0644 \\u0633\\u0648\\u0641 \\u064a\\u062a\\u0645 \\u062a\\u0641\\u0639\\u064a\\u0644 \\u062d\\u0633\\u0627\\u0628\\u0643","payment_renew_text":"\\u0627\\u0643\\u062a\\u0645\\u0644\\u062a \\u0639\\u0645\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062f\\u0641\\u0639. \\u0641\\u064a \\u0623\\u0642\\u0631\\u0628 \\u0648\\u0642\\u062a \\u0648\\u0646\\u062d\\u0646 \\u062a\\u0644\\u0642\\u064a \\u062a\\u0623\\u0643\\u064a\\u062f \\u0645\\u0646 \\u0628\\u0627\\u064a \\u0628\\u0627\\u0644 \\u0633\\u064a\\u062a\\u0645 \\u062a\\u062c\\u062f\\u064a\\u062f \\u062d\\u0633\\u0627\\u0628\\u0643","payment_cancel_title":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0625\\u0644\\u063a\\u0627\\u0621","payment_cancel_text":"\\u062a\\u0645 \\u0625\\u0644\\u063a\\u0627\\u0621 \\u0627\\u0644\\u062f\\u0641\\u0639","feature_payment_finish":"\\u0627\\u0643\\u062a\\u0645\\u0644\\u062a \\u0639\\u0645\\u0644\\u064a\\u0629 \\u0627\\u0644\\u062f\\u0641\\u0639. \\u0628\\u0623\\u0633\\u0631\\u0639 \\u0645\\u0627 \\u062a\\u0644\\u0642\\u064a \\u062a\\u0623\\u0643\\u064a\\u062f \\u0645\\u0646 \\u0628\\u0627\\u064a \\u0628\\u0627\\u0644\\u060c \\u0648\\u0633\\u064a\\u062a\\u0645 \\u0639\\u0631\\u0636 \\u0627\\u0644\\u0639\\u0642\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643.","feature_payment_cancel":"\\u064a\\u062a\\u0645 \\u0625\\u0644\\u063a\\u0627\\u0621 \\u0627\\u0644\\u062f\\u0641\\u0639 \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643.","payment_notification":"\\u0623\\u0646\\u062a \\u062a\\u0633\\u064a\\u0631 \\u0644\\u062c\\u0639\\u0644 \\u0627\\u0644\\u062f\\u0641\\u0639. \\u064a\\u062a\\u0645 \\u0625\\u0631\\u0633\\u0627\\u0644 \\u0628\\u0631\\u064a\\u062f \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643. \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0646\\u0633\\u062e \\u0647\\u0630\\u0647 \\u0627\\u0644\\u062e\\u0637\\u0648\\u0629 \\u0641\\u064a \\u0623\\u064a \\u0648\\u0642\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0627\\u0631\\u062a\\u0628\\u0627\\u0637 \\u0639\\u0644\\u0649 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a.","type_filers":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0641\\u0644\\u0627\\u062a\\u0631","view_listing":"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639","car_added_successfully":"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0648\\u0627\\u0636\\u0627\\u0641 \\u0628\\u0646\\u062c\\u0627\\u062d","email_tracker":"\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u0645\\u0642\\u062a\\u0641\\u064a","bulk_email":"\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u0633\\u0627\\u0626\\u0628\\u0629","other_info":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0623\\u062e\\u0631\\u0649","basic_info":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0623\\u0633\\u0627\\u0633\\u064a\\u0629","contact_subject":"\\u0627\\u0644\\u0627\\u062a\\u0635\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639","dealer_panel":"\\u062a\\u0627\\u062c\\u0631 \\u0644\\u0648\\u062d\\u0629","list_your_car":"\\u0642\\u0627\\u0626\\u0645\\u0629 \\u0633\\u064a\\u0627\\u0631\\u062a\\u0643","share":"\\u062d\\u0635\\u0629","search":"\\u0628\\u062d\\u062b","all_email_to_dealer":"\\u0643\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0627\\u0626\\u0639","embed_preview":"\\u062a\\u0636\\u0645\\u064a\\u0646 \\u0645\\u0639\\u0627\\u064a\\u0646\\u0629","car_brochure":"\\u0643\\u062a\\u064a\\u0628 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629","pages":"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0627\\u062a","post_not_found":"\\u0644\\u0627 \\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u0643\\u0629 \\u0648\\u062c\\u062f\\u062a","blog":"\\u0645\\u062f\\u0648\\u0646\\u0629","news":"\\u0623\\u062e\\u0628\\u0627\\u0631","article":"\\u0627\\u0644\\u0645\\u0627\\u062f\\u0629","change_package":"\\u062a\\u063a\\u064a\\u064a\\u0631 \\u062d\\u0632\\u0645\\u0629","bi_payment_cancel_title":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0645\\u0644\\u063a\\u0627\\u0629","mileage_range":"\\u0627\\u0644\\u0645\\u062f\\u0649 \\u0627\\u0644\\u0623\\u0645\\u064a\\u0627\\u0644","select_transmission_type":"\\u0627\\u062e\\u062a\\u0631 \\u0646\\u0642\\u0644","select_car_condition":"\\u0627\\u062e\\u062a\\u0631 \\u0627\\u0644\\u062d\\u0627\\u0644\\u0629","enter_above_text":"\\u0623\\u062f\\u062e\\u0644 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0639\\u0644\\u0627\\u0647","dt_first":"\\u0623\\u0648\\u0644\\u0627","dt_last":"\\u0627\\u0644\\u0623\\u062e\\u064a\\u0631","dt_next":"\\u0627\\u0644\\u062a\\u0627\\u0644\\u064a","dt_prev":"\\u0627\\u0644\\u0633\\u0627\\u0628\\u0642","dt_no_data":"\\u0644\\u0627 \\u062a\\u0648\\u062c\\u062f \\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0641\\u064a \\u0627\\u0644\\u062c\\u062f\\u0648\\u0644","dt_show_empty":"\\u0639\\u0631\\u0636 0-0 \\u0645\\u0646 0 \\u0645\\u0642\\u0627\\u0644\\u0627\\u062a","dt_no_match":"\\u0644\\u0627 \\u0633\\u062c\\u0644\\u0627\\u062a \\u0645\\u0637\\u0627\\u0628\\u0642\\u0629 \\u0648\\u062c\\u062f\\u062a","dt_search":"\\u0627\\u0644\\u0628\\u062d\\u062b","dt_processing":"\\u062a\\u062c\\u0647\\u064a\\u0632 ...","dt_loading":"\\u062a\\u062d\\u0645\\u064a\\u0644 ...","dt_info":"\\u0639\\u0631\\u0636 _START_ \\u0625\\u0644\\u0649 _END_ \\u0645\\u0646 \\u0625\\u062f\\u062e\\u0627\\u0644\\u0627\\u062a _TOTAL_","dt_filter_info":"(\\u062a\\u0635\\u0641\\u064a\\u062a\\u0647\\u0627 \\u0645\\u0646 \\u0645\\u062c\\u0645\\u0648\\u0639 \\u0627\\u0644\\u0645\\u0642\\u0627\\u0644\\u0627\\u062a _MAX_)","dt_show_entries":"\\u0625\\u062f\\u062e\\u0627\\u0644\\u0627\\u062a \\u0645\\u0634\\u0627\\u0647\\u062f\\u0629 _MENU_","days":"\\u064a\\u0648\\u0645","posts":"\\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u0643\\u0627\\u062a","take_package":"\\u062e\\u0630 \\u062d\\u0632\\u0645\\u0629","selected_package":"\\u0627\\u062e\\u062a\\u064a\\u0627\\u0631 \\u062d\\u0632\\u0645\\u0629","email":"\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a","password":"\\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631","confirm_password":"\\u062a\\u0623\\u0643\\u064a\\u062f \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631","i_have_read":"\\u0644\\u0642\\u062f \\u0642\\u0631\\u0623\\u062a","terms_conditon":"\\u0627\\u0644\\u0634\\u0631\\u0648\\u0637 \\u0648\\u0627\\u0644\\u0623\\u062d\\u0643\\u0627\\u0645","signup_with_social_accounts":"\\u0627\\u0644\\u0627\\u0634\\u062a\\u0631\\u0627\\u0643 \\u0645\\u0639 \\u0627\\u0644\\u062d\\u0633\\u0627\\u0628\\u0627\\u062a \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629","profile":"","map_api_key":"GMAP \\u0645\\u0641\\u062a\\u0627\\u062d API","show_state_province":"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u062f\\u0648\\u0644\\u0629 \\/ \\u0627\\u0644\\u0645\\u0642\\u0627\\u0637\\u0639\\u0629","cookie_policy":"\\u0633\\u064a\\u0627\\u0633\\u0629 \\u0643\\u0648\\u0643\\u064a","cookie_policy_alert":"\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u064a\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0627\\u0644\\u0643\\u0648\\u0643\\u064a\\u0632. \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0645\\u0631\\u0627\\u0631 \\u0641\\u064a \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639\\u060c \\u0641\\u0625\\u0646\\u0643 \\u062a\\u0648\\u0627\\u0641\\u0642 \\u0639\\u0644\\u0649 \\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645\\u0646\\u0627 \\u0644\\u0645\\u0644\\u0641\\u0627\\u062a \\u062a\\u0639\\u0631\\u064a\\u0641 \\u0627\\u0644\\u0627\\u0631\\u062a\\u0628\\u0627\\u0637.","read_more":"\\u0627\\u0642\\u0631\\u0623 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f","i_agree":"\\u0623\\u0648\\u0627\\u0641\\u0642"}', 1),
(6, 'Turkish-tr', 'Turkish', 'tr', '{"condition_new":"New","condition_used":"Kullan\\u0131lm\\u0131\\u015f","condition_pre_owned":"\\u00d6n Sahip olunan Sertifikal\\u0131","condition_recondition":"yenilemek","condition_other":"Di\\u011fer","condition_sold":"Sat\\u0131ld\\u0131","condition_available":"Mevcut","sign_in":"Oturum","sign_up":"Sign Up","admin_panel":"Y\\u00f6netici Paneli","logout":"Oturum Kapat","advanced_search":"Geli\\u015fmi\\u015f Arama","home":"Ev","about":"Yakla\\u015f\\u0131k","contact":"\\u0130leti\\u015fim","plain_search":"D\\u00fcz Arama","ignore_this_section":"Bu b\\u00f6l\\u00fcm\\u00fc g\\u00f6z ard\\u0131","location_search":"Yer arama","country":"\\u00dclke","state_province":"Eyalet \\/ \\u0130l","city":"\\u015eehir","price":"Fiyat","phone":"Telefon","first_name":"Ad","last_name":"Soyad\\u0131","company_name":"Firma Ad\\u0131","register":"Kay\\u0131t Ol","type":"T\\u00fcr","details":"Detaylar","view_all":"T\\u00fcm","order_by":"S\\u0131ralama","none":"Yok","terms_and_conditions":"\\u015eartlar ve Confition","reg_success_message":"Hesab\\u0131n\\u0131z kayd\\u0131 ba\\u015far\\u0131l\\u0131 oldu\\u011funu. Bir e-posta e-posta g\\u00f6nderildi. senin account.Thanks etkinle\\u015ftirmek i\\u00e7in bu e-posta takip edin","limit":"Limit","usage":"Kullan\\u0131m\\u0131","recover":"Kurtar","oops":"\\u00dczg\\u00fcn\\u00fcz, sayfa bulunamad\\u0131","share_this":"Payla\\u015f Bu","status":"Durum","description":"A\\u00e7\\u0131klama","location_map":"Haritada Yeri","image_gallery":"Resim Galerisi","summary":"\\u00d6zet","overview":"Genel Bak\\u0131\\u015f","address":"Adres","message":"Mesaj","username":"Ad\\u0131","about_me":"Hakk\\u0131mda","type_filters":"Tipi Filtreler","email_subject":"E-posta Konusu","all":"T\\u00fcm","deleted":"Silinen","contact_us":"Bize","active":"Aktif","pending":"Beklemede","reported":"Dolayl\\u0131","featured_video":"\\u00d6ne \\u00c7\\u0131kan Video","embed_video_url":"G\\u00f6m\\u00fcl\\u00fc video URL","profile_picture":"Profil Resmi","cars":"Arabalar","car":"Ara\\u00e7","manufacturers":"\\u00dcreticiler","car_type":"Ara\\u00e7 Tipi","car_manufacturer":"Ara\\u00e7 \\u00dcreticisi","car_model":"Ara\\u00e7 Modeli","year":"Y\\u0131l","mileage":"Kilometre","condition":"Durum","specifications":"\\u00d6zellikler","dimensions":"Boyutlar","reg_no":"Kay\\u0131t No.","engine_size":"Motor Boyut","engine_type":"Motor Tipi","exterior_color":"Kasa Rengi","interior_color":"\\u0130\\u00e7 Renk","fuel_type":"Yak\\u0131t Tipi","safety_rating":"G\\u00fcvenlik De\\u011ferlendirme","standard_seating":"standart oturma","steering_type":"Direksiyon T\\u00fcr\\u00fc","height":"Y\\u00fckseklik","width":"Geni\\u015flik","length":"Uzunluk","wheelbase":"Dingil mesafesi","track_rear":"Par\\u00e7a Arka","track_front":"Par\\u00e7a \\u00d6n","ground_clearance":"Yerden Y\\u00fckseklik","manufacturer":"\\u00dcretici","body_type":"V\\u00fccut Tipi","featured_cars":"Vitrin Arabalar\\u0131","recent_cars":"Son Arabalar","select_manufacturer":"Se\\u00e7 \\u00dcretici","select_model":"Modeli Se\\u00e7in","price_range":"Fiyat Aral\\u0131\\u011f\\u0131","select_type":"Se\\u00e7 T\\u00fcr","model_year":"Model Y\\u0131l\\u0131","filter_vehicles":"Filtre Ara\\u00e7lar","no_cars_found":"Hay\\u0131r Otomobil Bulundu","dealers":"Bayiler","all_dealers":"Sat\\u0131c\\u0131lar\\u0131","all_cars":"B\\u00fct\\u00fcn arabalar","top_dealers":"En Sat\\u0131c\\u0131lar\\u0131","top_cars":"En Otomobiller","dealer_cars":"Bayi Otomobil","dealer_location":"Bayi Konumu","dealer":"Bayi","model":"Model","zip_code":"Posta Kodu","transmission":"\\u0130letim","tags":"Etiketler","no_dealers_found":"Hay\\u0131r Sat\\u0131c\\u0131lar\\u0131 Bulundu","dealer_vehicles":"Bayi Ara\\u00e7lar","result":"Sonu\\u00e7","dealer_not_found":"Bayi Bulunamad\\u0131","payment_finish_title":"Tam \\u00d6deme","payment_renew_title":"Tam \\u00d6deme","payment_finish_text":"\\u00d6demeniz tamamland\\u0131. Biz paypal onay al\\u0131nan en k\\u0131sa s\\u00fcrede hesab\\u0131n\\u0131z aktif olacakt\\u0131r","payment_renew_text":"\\u00d6demeniz tamamland\\u0131. Biz paypal onay al\\u0131nan en k\\u0131sa s\\u00fcrede hesab\\u0131n\\u0131z yenilenecektir","payment_cancel_title":"\\u00d6deme \\u0130ptal","payment_cancel_text":"\\u00d6demeniz iptal edilir","feature_payment_finish":"\\u00d6demeniz tamamland\\u0131. En k\\u0131sa s\\u00fcrede biz paypal onay alma gibi sizin emlak yer alacak.","feature_payment_cancel":"\\u00d6demeniz iptal edilir.","payment_notification":"Bir \\u00f6deme yapmak i\\u00e7in gidiyoruz. Bir e-posta e-posta g\\u00f6nderilir. O e-postadaki linke istedi\\u011finiz zaman bu ad\\u0131ma yedekleyebilirsiniz.","type_filers":"Tipi Filtreler","view_listing":"G\\u00f6r\\u00fcn\\u00fcm \\u0130lan","car_added_successfully":"Araba Ba\\u015far\\u0131yla Eklendi","email_tracker":"E-posta Tracker","bulk_email":"Toplu E-posta","other_info":"Di\\u011fer Bilgiler","basic_info":"Temel Bilgiler","contact_subject":"\\u0130leti\\u015fim Konusu","dealer_panel":"Bayi Paneli","list_your_car":"Otomobiliniz Liste","share":"Payla\\u015f","search":"Arama","all_email_to_dealer":"Bayi All-posta","embed_preview":"Sitene Ekle \\u00d6nizleme","car_brochure":"Ara\\u00e7 Bro\\u015f\\u00fcr\\u00fc","pages":"Sayfalar","post_not_found":"Hay\\u0131r Mesaj Bulundu","blog":"Blog","news":"Haberler","article":"Madde","change_package":"De\\u011fi\\u015fim Paketi","bi_payment_cancel_title":"\\u00d6deme \\u0130ptal Edildi","mileage_range":"Kilometre Aral\\u0131\\u011f\\u0131","select_transmission_type":"Se\\u00e7 \\u0130letim","select_car_condition":"Se\\u00e7iniz Durum","enter_above_text":"\\u00dcst\\u00fc Metin girin","dt_first":"Birinci","dt_last":"Son","dt_next":"Sonraki","dt_prev":"\\u00d6nceki","dt_no_data":"Tablodaki veriler yok","dt_show_empty":"0 0 giri\\u015flere 0 g\\u00f6steriliyor","dt_no_match":"bulunamad\\u0131 e\\u015fle\\u015fen kay\\u0131t","dt_search":"Arama","dt_processing":"\\u0130\\u015fleme ...","dt_loading":"Y\\u00fckleniyor ...","dt_info":"_TOTAL_ giri\\u015flerinin _END_ i\\u00e7in _START_ G\\u00f6sterilen","dt_filter_info":"(_MAX_ toplam girdileri s\\u00fcz\\u00fclm\\u00fc\\u015f)","dt_show_entries":"Show _MENU_ girdileri","days":"G\\u00fcn","posts":"Mesajlar","take_package":"Paketi al\\u0131n","selected_package":"Se\\u00e7ilen paket","email":"E-Posta","password":"\\u015eifre","confirm_password":"\\u015eifreyi onayla","i_have_read":"okudum","terms_conditon":"\\u015eartlar ve ko\\u015fullar","signup_with_social_accounts":"Sosyal hesaplar\\u0131 ile kaydolma","profile":"Profil","map_api_key":"gmap api anahtar\\u0131","show_state_province":"Devlet \\/ il g\\u00f6ster","cookie_policy":"\\u00c7erez politikas\\u0131","cookie_policy_alert":"Bu site \\u00e7erezleri kullanmaktad\\u0131r. E\\u011fer \\u00e7erez kullanmam\\u0131z\\u0131 kabul Bu siteyi kullanmaya devam ederek.","read_more":"Devam\\u0131n\\u0131 oku","i_agree":"Kabul ediyorum"}', 1),
(7, 'Dutch-nl', 'Dutch', 'nl', '{"condition_new":"New","condition_used":"Gebruikt","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Overige","condition_sold":"Verkocht","condition_available":"Beschikbaar","sign_in":"Inloggen","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Afmelden","advanced_search":"Advanced Search","home":"Home","about":"Over","contact":"Contact","plain_search":"Plain Zoeken","ignore_this_section":"Negeer deze sectie","location_search":"Locatie Zoeken","country":"Land","state_province":"Staat \\/ Provincie","city":"Stad","price":"Prijs","phone":"Telefoon","first_name":"Voornaam","last_name":"Achternaam","company_name":"Naam Bedrijf","register":"","type":"Type","details":"Details","view_all":"Alles weergeven","order_by":"Door Bestel","none":"Geen","terms_and_conditions":"Algemene confition","reg_success_message":"Uw account registratie is succesvol. Een e-mail is verzonden naar uw e-mail. Volg die e-mail naar uw account.Thanks activeren","limit":"Limit","usage":"Gebruik","recover":"Recover","oops":"Oeps, pagina niet gevonden","share_this":"Share This","status":"Status","description":"Beschrijving","location_map":"Location Map","image_gallery":"Fotogalerij","summary":"Samenvatting","overview":"Overzicht","address":"Adres","message":"Bericht","username":"gebruikersnaam","about_me":"Over mij","type_filters":"Type Filters","email_subject":"E-mail Onderwerp","all":"Alle","deleted":"Verwijderde","contact_us":"Contact","active":"Actief","pending":"In afwachting van","reported":"Gerapporteerde","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profiel Picture","cars":"Auto''s","car":"Auto","manufacturers":"Fabrikanten","car_type":"Type auto","car_manufacturer":"Autofabrikant","car_model":"Auto Model","year":"Jaar","mileage":"kilometerstand Kilometer","condition":"Staat","specifications":"Specificaties","dimensions":"Afmetingen","reg_no":"Registration No.","engine_size":"Motor Size","engine_type":"Motor Type","exterior_color":"carrosseriekleur","interior_color":"Kleur interieur","fuel_type":"Brandstof","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Hoogte","width":"breedte","length":"Lengte","wheelbase":"Wielbasis","track_rear":"Track Rear","track_front":"Track Voorzijde","ground_clearance":"Bodemvrijheid","manufacturer":"Fabrikant","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Nieuw Cars","select_manufacturer":"Selecteer Fabrikant","select_model":"Select Model","price_range":"Prijsklasse","select_type":"Select Type","model_year":"Modeljaar","filter_vehicles":"Filter Vehicles","no_cars_found":"Geen auto''s gevonden","dealers":"Dealers","all_dealers":"verdelers","all_cars":"Alle auto''s","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmissie","tags":"Tags","no_dealers_found":"geen handelaren gevonden","dealer_vehicles":"Dealer Vehicles","result":"Resultaat","dealer_not_found":"Dealer niet gevonden","payment_finish_title":"Betaling Compleet","payment_renew_title":"Betaling Compleet","payment_finish_text":"Uw betaling is voltooid. Zodra we kregen de bevestiging van PayPal uw account wordt geactiveerd","payment_renew_text":"Uw betaling is voltooid. Zodra we kregen de bevestiging van PayPal uw account wordt verlengd","payment_cancel_title":"Betaling Annuleren","payment_cancel_text":"Uw betaling is geannuleerd","feature_payment_finish":"Uw betaling is voltooid. Zodra wij ontvangen een bevestiging van PayPal, zal uw nalatenschap te zien zijn.","feature_payment_cancel":"Uw betaling is geannuleerd.","payment_notification":"U gaat om een \\u200b\\u200bbetaling te verrichten. Een e-mail wordt verzonden naar uw e-mail. U kunt terug naar deze stap op elk moment van de link in de e-mail.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car succesvol toegevoegd","email_tracker":"E-Tracker","bulk_email":"Bulk Email","other_info":"Overige info","basic_info":"Basisinformatie","contact_subject":"Contact Onderwerp","dealer_panel":"Dealer Panel","list_your_car":"Lijst uw auto","share":"Share","search":"Zoeken","all_email_to_dealer":"Alle E-mail naar Dealer","embed_preview":"insluiten Voorbeeld","car_brochure":"Auto Brochure","pages":"Pagina''s","post_not_found":"Nee Geplaatst gevonden","blog":"Blog","news":"Nieuws","article":"Artikel","change_package":"Change Package","bi_payment_cancel_title":"Betaling geannuleerd","mileage_range":"Kilometer Range","select_transmission_type":"Select Transmission","select_car_condition":"Selecteer Voorwaarde","enter_above_text":"Voer bovenstaande tekst","dt_first":"First","dt_last":"Last","dt_next":"Next","dt_prev":"Vorige","dt_no_data":"Er zijn geen gegevens beschikbaar in tabel","dt_show_empty":"Toont 0-0 van 0 inzendingen","dt_no_match":"Er zijn geen records die overeenstemmen","dt_search":"Zoeken","dt_processing":"Verwerking ...","dt_loading":"Loading ...","dt_info":"Resultaat _START_ om _END_ van _TOTAL_ inzendingen","dt_filter_info":"(gefilterd van _MAX_ totaal inzendingen)","dt_show_entries":"entries Show _MENU_","days":"Days","posts":"Berichten","take_package":"Take-pakket","selected_package":"Geselecteerde pakket","email":"E-mail","password":"Wachtwoord","confirm_password":"Bevestig wachtwoord","i_have_read":"Ik heb gelezen de","terms_conditon":"Algemene voorwaarden","signup_with_social_accounts":"SignUp met sociale accounts","profile":"Profiel","map_api_key":"Gmap api key","show_state_province":"Show staat \\/ provincie","cookie_policy":"beleid Cookie","cookie_policy_alert":"Deze website maakt gebruik van cookies. Door te blijven deze site gaat u akkoord met ons gebruik van cookies.","read_more":"Lees meer","i_agree":"Ik ben het eens"}', 1),
(8, 'French-fr', 'French', 'fr', '{"condition_new":"New","condition_used":"","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Reconditionnement","condition_other":"Autre","condition_sold":"Vendu","condition_available":"Disponible","sign_in":"Identifiez-vous","sign_up":"Inscription","admin_panel":"panneau d''administration","logout":"D\\u00e9connexion","advanced_search":"Recherche avanc\\u00e9e","home":"Maison","about":"A propos de","contact":"Contact","plain_search":"Plaine Recherche","ignore_this_section":"Ignorer cette section","location_search":"Lieu Recherche","country":"Pays","state_province":"Etat \\/ Province","city":"Ville","price":"Prix","phone":"T\\u00e9l\\u00e9phone","first_name":"Pr\\u00e9nom","last_name":"Nom","company_name":"Nom de la soci\\u00e9t\\u00e9","register":"Inscription","type":"Type","details":"D\\u00e9tails","view_all":"Tout voir","order_by":"Trier par","none":"Aucun","terms_and_conditions":"Termes et Confition","reg_success_message":"L''enregistrement de votre compte est r\\u00e9ussie. Un e-mail a \\u00e9t\\u00e9 envoy\\u00e9 \\u00e0 votre adresse email. S''il vous pla\\u00eet suivre ce courriel pour activer votre account.Thanks","limit":"Limite","usage":"Utilisation","recover":"R\\u00e9cup\\u00e9rer","oops":"Oops, page non trouv\\u00e9e","share_this":"Partager cet","status":"Statut","description":"Description de","location_map":"Carte de localisation","image_gallery":"Galerie d''images","summary":"R\\u00e9sum\\u00e9","overview":"Vue d''ensemble","address":"Adresse","message":"message","username":"Nom d''utilisateur","about_me":"\\u00c0 propos de moi","type_filters":"Type Filtres","email_subject":"Email Sujet","all":"tout","deleted":"supprim\\u00e9","contact_us":"Contactez-nous","active":"Actif","pending":"l''attente","reported":"Rapport\\u00e9","featured_video":"Vid\\u00e9o vedette","embed_video_url":"Embeded Video Url","profile_picture":"Profil Photo","cars":"Voitures","car":"Voiture","manufacturers":"Fabricants","car_type":"Type de voiture","car_manufacturer":"Voiture Fabricant","car_model":"Mod\\u00e8le de voiture","year":"Ann\\u00e9e","mileage":"Kilom\\u00e9trage","condition":"Condition","specifications":"Sp\\u00e9cifications","dimensions":"Dimensions","reg_no":"N \\u00b0 d''enregistrement","engine_size":"Taille du moteur","engine_type":"Type de moteur","exterior_color":"Couleur ext\\u00e9rieure","interior_color":"Couleur int\\u00e9rieure","fuel_type":"Type de carburant","safety_rating":"Cote de s\\u00e9curit\\u00e9","standard_seating":"Capacit\\u00e9 standard","steering_type":"Type de direction","height":"Hauteur","width":"Largeur","length":"Longueur","wheelbase":"Empattement","track_rear":"Voie arri\\u00e8re","track_front":"Track avant","ground_clearance":"Garde au sol","manufacturer":"Fabricant","body_type":"Type de carrosserie","featured_cars":"Voitures en vedette","recent_cars":"Voitures r\\u00e9centes","select_manufacturer":"Choisi fabriquant","select_model":"S\\u00e9lectionnez Mod\\u00e8le","price_range":"Gamme de prix","select_type":"S\\u00e9lectionner le type","model_year":"Mod\\u00e8le Ann\\u00e9e","filter_vehicles":"Filtrer V\\u00e9hicules","no_cars_found":"Pas de voitures trouv\\u00e9s","dealers":"Concessionnaires","all_dealers":"Tous les concessionnaires","all_cars":"Toutes les voitures","top_dealers":"Top concessionnaires","top_cars":"Top Cars","dealer_cars":"Voitures du dealer","dealer_location":"concessionnaire Emplacement","dealer":"Dealer","model":"Mod\\u00e8le","zip_code":"Code postal","transmission":"Transmission","tags":"tags","no_dealers_found":"Pas de concessionnaires trouv\\u00e9s","dealer_vehicles":"V\\u00e9hicules Dealer","result":"R\\u00e9sultat","dealer_not_found":"Marchand introuvable","payment_finish_title":"Paiement complet","payment_renew_title":"Paiement complet","payment_finish_text":"Votre paiement est termin\\u00e9. D\\u00e8s que nous avons re\\u00e7u la confirmation de paypal votre compte sera activ\\u00e9","payment_renew_text":"Votre paiement est termin\\u00e9. D\\u00e8s que nous avons re\\u00e7u la confirmation de votre compte paypal sera renouvel\\u00e9","payment_cancel_title":"Paiement Annuler","payment_cancel_text":"Votre paiement est annul\\u00e9","feature_payment_finish":"Votre paiement est termin\\u00e9. D\\u00e8s que nous recevons la confirmation de paypal, votre succession sera s\\u00e9lectionn\\u00e9e.","feature_payment_cancel":"Votre paiement est annul\\u00e9.","payment_notification":"Vous allez effectuer un paiement. Un email est envoy\\u00e9 \\u00e0 votre adresse email. Vous pouvez revenir \\u00e0 cette \\u00e9tape \\u00e0 tout moment \\u00e0 partir du lien sur cet e-mail.","type_filers":"Type Filtres","view_listing":"Voir Annonce","car_added_successfully":"Car Ajout\\u00e9 avec succ\\u00e8s","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Autres Info","basic_info":"Informations de base","contact_subject":"Contact Sujet","dealer_panel":"Panel Dealer","list_your_car":"Inscrivez votre voiture","share":"Partager","search":"Chercher","all_email_to_dealer":"Tout Email Pour Dealer","embed_preview":"Embed Aper\\u00e7u","car_brochure":"Brochure voiture","pages":"Pages","post_not_found":"Aucun post trouv\\u00e9","blog":"Blog","news":"Nouvelles","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Paiement annul\\u00e9","mileage_range":"Gamme Kilom\\u00e9trage","select_transmission_type":"S\\u00e9lectionnez Transmission","select_car_condition":"S\\u00e9lectionnez Condition","enter_above_text":"Entr\\u00e9e texte ci-dessus","dt_first":"Premi\\u00e8re","dt_last":"Dernier","dt_next":"Suivant","dt_prev":"Pr\\u00e9c\\u00e9dent","dt_no_data":"Aucune donn\\u00e9e disponible dans le tableau","dt_show_empty":"Afficher 0 \\u00e0 0 de 0 entr\\u00e9es","dt_no_match":"Aucun enregistrement correspondant trouv\\u00e9","dt_search":"Recherche","dt_processing":"Traitement en cours ...","dt_loading":"Chargement ...","dt_info":"Affichage _START_ \\u00e0 _END_ des entr\\u00e9es _TOTAL_","dt_filter_info":"(filtr\\u00e9 _Max_ entr\\u00e9es totales)","dt_show_entries":"entr\\u00e9es Afficher les _MENU_","days":"Jours","posts":"Messages","take_package":"Prenez package","selected_package":"selected_package","email":"Email","password":"Mot de passe","confirm_password":"Confirmation du mot de passe","i_have_read":"J''ai lu le","terms_conditon":"Termes et conditions","signup_with_social_accounts":"Inscription avec des comptes sociaux","profile":"profile","map_api_key":"Gmap touche api","show_state_province":"Afficher l''\\u00e9tat \\/ province","cookie_policy":"politique de Cookie","cookie_policy_alert":"Ce site utilise des cookies. En continuant \\u00e0 utiliser ce site, vous acceptez notre utilisation des cookies.","read_more":"Lire la suite","i_agree":"Je suis d''accord"}', 1),
(9, 'Deutsch-de', 'Deutsch', 'de', '{"condition_new":"New","condition_used":"Gebrauchte","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Sonstiges","condition_sold":"Verkauft","condition_available":"Verf\\u00fcgbar","sign_in":"Anmelden","sign_up":"Registrieren","admin_panel":"Admin Panel","logout":"Abmelden","advanced_search":"Erweiterte Suche","home":"Home","about":"\\u00dcber","contact":"Kontakt","plain_search":"Plain Suche","ignore_this_section":"Ignorieren esta secci\\u00f3n","location_search":"Standort Suchen","country":"Land","state_province":"Staat \\/ Provinz","city":"Stadt","price":"Preis","phone":"Telefon","first_name":"Vorname","last_name":"Nachname","company_name":"Firmenname","register":"registrieren","type":"Typ","details":"Details","view_all":"Alle anzeigen","order_by":"Im Auftrag","none":"Keine","terms_and_conditions":"Begriffe und confition","reg_success_message":"Ihr Kontoregistrierung ist erfolgreich. Eine E-Mail an Ihre E-Mail gesendet. Folgen Sie bitte die E-Mail Ihre account.Thanks zu aktivieren","limit":"Limit","usage":"Nutzungs","recover":"Wiederherstellen","oops":"Hoppla, Seite nicht gefunden","share_this":"Share This","status":"Status","description":"Beschreibung","location_map":"Lageplan","image_gallery":"Bildergalerie","summary":"Zusammenfassung","overview":"\\u00dcbersicht","address":"Adresse","message":"Nachricht","username":"Benutzername","about_me":"\\u00dcber mich","type_filters":"Typ Filter","email_subject":"E-Mail Betreff","all":"Alle","deleted":"Gel\\u00f6scht","contact_us":"Kontaktieren Sie uns","active":"Aktiv","pending":"Bis","reported":"Berichtet","featured_video":"Featured Video","embed_video_url":"Embedded-Video-URL","profile_picture":"Profil Bild","cars":"Autos","car":"Auto","manufacturers":"Hersteller","car_type":"Fahrzeugtyp","car_manufacturer":"Auto Hersteller","car_model":"Auto-Modell","year":"Jahr","mileage":"Kilometerstand","condition":"Zustand","specifications":"Technische Daten","dimensions":"Ma\\u00dfe","reg_no":"Registernummer","engine_size":"Motorgr\\u00f6\\u00dfe","engine_type":"Motortyp","exterior_color":"Au\\u00dfenfarbe","interior_color":"Innenfarbe","fuel_type":"Kraftstofftyp","safety_rating":"Sicherheitsbewertung","standard_seating":"Standard-Bestuhlung","steering_type":"Lenkerart","height":"H\\u00f6he","width":"Breite","length":"L\\u00e4nge","wheelbase":"Radstand","track_rear":"Spur hinten","track_front":"Spur vorne","ground_clearance":"Bodenfreiheit","manufacturer":"Hersteller","body_type":"K\\u00f6rpertyp","featured_cars":"Favoriten Autos","recent_cars":"Neue Autos","select_manufacturer":"Hersteller ausw\\u00e4hlen","select_model":"Modell w\\u00e4hlen","price_range":"Preisspanne","select_type":"Typ w\\u00e4hlen","model_year":"Modelljahr","filter_vehicles":"Filter Fahrzeuge","no_cars_found":"Keine Autos gefunden","dealers":"H\\u00e4ndler","all_dealers":"Alle Maschinen des Anbieters","all_cars":"Alle Autos","top_dealers":"Top-H\\u00e4ndler","top_cars":"Top Cars","dealer_cars":"Dealer Autos","dealer_location":"H\\u00e4ndlerstandort","dealer":"H\\u00e4ndler","model":"Model","zip_code":"Postleitzahl","transmission":"Getriebe","tags":"Tags","no_dealers_found":"Keine H\\u00e4ndler gefunden","dealer_vehicles":"H\\u00e4ndler Fahrzeuge","result":"Ergebnis","dealer_not_found":"Dealer nicht gefunden","payment_finish_title":"Zahlung abschlie\\u00dfen","payment_renew_title":"Zahlung abschlie\\u00dfen","payment_finish_text":"Ihre Zahlung ist abgeschlossen. Sobald wir die Best\\u00e4tigung von PayPal Konto empfangen wird aktiviert","payment_renew_text":"Ihre Zahlung ist abgeschlossen. Sobald wir die Best\\u00e4tigung von PayPal Konto empfangen wird erneuert","payment_cancel_title":"Zahlung stornieren","payment_cancel_text":"Ihre Zahlung wird Abgebrochen","feature_payment_finish":"Ihre Zahlung ist abgeschlossen. Sobald wir die Best\\u00e4tigung von PayPal empfangen, wird Ihre Immobilien sehen sein.","feature_payment_cancel":"Ihre Zahlung wird abgebrochen.","payment_notification":"Sie werden eine Zahlung zu leisten. Eine E-Mail an Ihre E-Mail gesendet. Sie k\\u00f6nnen \\u00fcber den Link auf diese E-Mail auf diese jederzeit zur\\u00fccktreten.","type_filers":"Typ Filter","view_listing":"Eintr\\u00e4ge anzeigen","car_added_successfully":"Auto Erfolgreich","email_tracker":"E-Mail-Verfolger","bulk_email":"Bulk Email","other_info":"Weitere Infos","basic_info":"Basisinformationen","contact_subject":"Kontakt Thema","dealer_panel":"Dealer-Panel","list_your_car":"F\\u00fchren Sie Ihr Auto","share":"Teilen","search":"Suche","all_email_to_dealer":"Alle E-Mail an H\\u00e4ndler","embed_preview":"eingef\\u00fcgt Vorschau","car_brochure":"Auto-Brosch\\u00fcre","pages":"Seiten","post_not_found":"Kein Beitrag gefunden","blog":"Blog","news":"Nachrichten","article":"Artikel","change_package":"\\u00c4nderungspaket","bi_payment_cancel_title":"Zahlung Cancelled","mileage_range":"gefahrene Strecke","select_transmission_type":"Select Transmission","select_car_condition":"Zustand ausw\\u00e4hlen","enter_above_text":"Bitte geben Sie oben Text","dt_first":"Erste","dt_last":"Nur noch wenige","dt_next":"Next","dt_prev":"Zur\\u00fcck","dt_no_data":"Keine verf\\u00fcgbaren Daten in Tabelle","dt_show_empty":"0 bis 0 von 0 Eintr\\u00e4ge angezeigt","dt_no_match":"Keine passenden Datens\\u00e4tze gefunden","dt_search":"Suchen","dt_processing":"Verarbeitung ...","dt_loading":"Laden ...","dt_info":"Zeige _start_ bis _END_ von _TOTAL_ Eintr\\u00e4ge","dt_filter_info":"(gefiltert aus _MAX_ Gesamt Eintr\\u00e4ge)","dt_show_entries":"Show _MENU_ Eintr\\u00e4ge","days":"Tage","posts":"Beitr\\u00e4ge","take_package":"Nehmen Sie Paket","selected_package":"Ausgew\\u00e4hlte Paket","email":"E-Mail","password":"Passwort","confirm_password":"Passwort best\\u00e4tigen","i_have_read":"Ich habe gelesen, die","terms_conditon":"AGB","signup_with_social_accounts":"Mit SIGNUP sozialen Konten","profile":"Profil","map_api_key":"Gmap api Schl\\u00fcssel","show_state_province":"Zeigen Staat \\/ Provinz","cookie_policy":"Pl\\u00e4tzchen-Politik","cookie_policy_alert":"Diese Website benutzt Cookies. Durch die Fortsetzung dieser Website erkl\\u00e4ren Sie sich unsere Verwendung von Cookies einverstanden zu verwenden.","read_more":"Lesen Sie mehr","i_agree":"Ich bin damit einverstanden"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixlocations`
--

DROP TABLE IF EXISTS `db_tabprefixlocations`;
CREATE TABLE IF NOT EXISTS `db_tabprefixlocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` char(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `db_tabprefixlocations`
--

INSERT INTO `db_tabprefixlocations` (`id`, `parent`, `name`, `type`, `status`) VALUES
(1, 0, 'USA', 'country', 1),
(2, 0, ' Canada', 'country', 1),
(3, 0, ' UK', 'country', 1),
(4, 0, ' Mexico', 'country', 1),
(5, 1, 'Alabama', 'state', 1),
(6, 1, ' Alaska', 'state', 1),
(7, 1, ' Arizona', 'state', 1),
(8, 1, ' Arkansas', 'state', 1),
(9, 1, ' California', 'state', 1),
(10, 1, ' Colorado', 'state', 1),
(11, 1, ' Connecticut', 'state', 1),
(12, 1, ' Delaware', 'state', 1),
(13, 1, ' Florida', 'state', 1),
(14, 1, ' Georgia', 'state', 1),
(15, 1, ' Hawaii', 'state', 1),
(16, 1, ' Idaho', 'state', 1),
(17, 1, ' Illinois', 'state', 1),
(18, 1, ' Indiana', 'state', 1),
(19, 1, ' Iowa', 'state', 1),
(20, 1, ' Kansas', 'state', 1),
(21, 1, ' Kentucky', 'state', 1),
(22, 1, ' Louisiana', 'state', 1),
(23, 1, ' Maine', 'state', 1),
(24, 1, ' Maryland', 'state', 1),
(25, 1, ' Massachusetts', 'state', 1),
(26, 1, ' Michigan', 'state', 1),
(27, 1, ' Minnesota', 'state', 1),
(28, 1, ' Mississippi', 'state', 1),
(29, 1, ' Missouri', 'state', 1),
(30, 1, ' Montana', 'state', 1),
(31, 1, ' Nebraska', 'state', 1),
(32, 1, ' Nevada', 'state', 1),
(33, 1, ' New Hampshire', 'state', 1),
(34, 1, ' New Jersey', 'state', 1),
(35, 1, ' New Mexico', 'state', 1),
(36, 1, ' New York', 'state', 1),
(37, 1, ' North Carolina', 'state', 1),
(38, 1, ' North Dakota', 'state', 1),
(39, 1, ' Ohio', 'state', 1),
(40, 1, ' Oklahoma', 'state', 1),
(41, 1, ' Oregon', 'state', 1),
(42, 1, ' Pennsylvania', 'state', 1),
(43, 1, ' Rhode Island', 'state', 1),
(44, 1, ' South Carolina', 'state', 1),
(45, 1, ' South Dakota', 'state', 1),
(46, 1, ' Tennessee', 'state', 1),
(47, 1, ' Texas', 'state', 1),
(48, 1, ' Utah', 'state', 1),
(49, 1, ' Vermont', 'state', 1),
(50, 1, ' Virginia', 'state', 1),
(51, 1, ' Washington', 'state', 1),
(52, 1, ' West Virginia', 'state', 1),
(53, 1, ' Wisconsin', 'state', 1),
(54, 1, ' Wyoming', 'state', 1),
(55, 2, 'Alberta', 'state', 1),
(56, 2, ' British Columbia', 'state', 1),
(57, 2, ' Manitoba', 'state', 1),
(58, 2, ' New Brunswick', 'state', 1),
(59, 2, ' Newfoundland', 'state', 1),
(60, 2, ' Northwest Territories', 'state', 1),
(61, 2, ' Nova Scotia', 'state', 1),
(62, 2, ' Nunavut', 'state', 1),
(63, 2, ' Ontario', 'state', 1),
(64, 2, ' Prince Edward Island', 'state', 1),
(65, 2, ' Quebec', 'state', 1),
(66, 2, ' Saskatchewan', 'state', 1),
(67, 2, ' Yukon', 'state', 1),
(68, 9, 'Los Angeles', 'city', 1),
(69, 9, 'San Diego', 'city', 1),
(70, 9, 'Palm Sprigs', 'city', 1),
(71, 9, 'San Francisco', 'city', 1),
(72, 9, 'Long Beach', 'city', 1),
(73, 9, 'Pleasanton', 'city', 1),
(74, 3, 'Birmingham', 'state', 0),
(75, 14, 'Atlanta', 'city', 1),
(76, 9, 'San Farnando', 'city', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixmedia`
--

DROP TABLE IF EXISTS `db_tabprefixmedia`;
CREATE TABLE IF NOT EXISTS `db_tabprefixmedia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `media_name` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `media_url` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixoptions`
--

DROP TABLE IF EXISTS `db_tabprefixoptions`;
CREATE TABLE IF NOT EXISTS `db_tabprefixoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` char(255) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_tabprefixoptions`
--

INSERT INTO `db_tabprefixoptions` (`id`, `key`, `values`, `status`) VALUES
(1, 'paypal', '{"item_name":"Bookit Service Booking","email":"mail@mail.com","currency":"USD","sandbox":"On"}', 1),
(2, 'site_settings', '{"site_title":"CarShop","footer_text":"CarShop, all rights reserved","site_logo":"http:\\/\\/localhost\\/carshop\\/assets\\/images\\/logo\\/#","site_lang":"en","site_direction":"ltr","site_direction_rules":"required","default_layout":"1","ga_tracking_code":"","meta_description":"Post Car Dealership","key_words":"car shop, auto, engine","crawl_after":"3"}', 1),
(3, 'active_theme', 'default', 1),
(4, 'positions', '[{"name":"content_top","status":1,"widgets":false},{"name":"content_bottom","status":1,"widgets":false},{"name":"right_bar_home","status":1,"widgets":["all_types","top_cars","top_dealers","facebook_like_box"]},{"name":"right_bar","status":1,"widgets":false},{"name":"right_bar_posts","status":1,"widgets":["all_types","facebook_like_box","top_dealers"]},{"name":"right_bar_post_detail","status":1,"widgets":["all_types","facebook_like_box","top_dealers"]},{"name":"footer_first_column","status":1,"widgets":["contact_text"]},{"name":"footer_second_column","status":1,"widgets":["follow_us"]},{"name":"footer_third_column","status":1,"widgets":["short_description"]},{"name":"right_bar_all_dealer","status":1,"widgets":["top_dealers","all_types","featured_cars"]},{"name":"right_bar_dealer_cars","status":1,"widgets":["all_types","top_cars"]},{"name":"right_bar_general","status":1,"widgets":["all_types","featured_cars","top_dealers"]},{"name":"side_bar_advance_search","status":1,"widgets":["plain_search_widget","all_types","featured_cars"]}]', 1),
(5, 'top_menu', '[{"id":"1","parent":0},{"id":"7","parent":0},{"id":"2","parent":"7"},{"id":"6","parent":"7"},{"id":"9","parent":"7"},{"id":"8","parent":"7"},{"id":"10","parent":"7"},{"id":"3","parent":"7"},{"id":"4","parent":0}]', 1),
(6, 'wordfilters', '{"bitch":"b***h","fuck":"f**k"}', 1),
(7, 'basic_settings', '{"publish_directly":"Yes","publish_directl_rules":"required","do_water_mark":"Yes","do_water_mark_rules":"required","water_mark_text":"@dbc","water_mark_text_rules":"required","enable_fb_login":"Yes","enable_fb_login_rules":"required","fb_app_id":"#","fb_app_id_rules":"required","fb_secret_key":"#","fb_secret_key_rules":"required","enable_gplus_login":"Yes","enable_gplus_login_rules":"required","gplus_app_id":"googleusercontent.com","gplus_app_id_rules":"required","gplus_secret_key":"#","gplus_secret_key_rules":"required"}', 1),
(8, 'purchase_key', '', 1),
(9, 'item_id', '', 1),
(10, 'carshop_settings', '{"publish_directly":"Yes","publish_directly_rules":"required","system_currency":"USD","system_currency_type":"0","system_currency_rules":"required","enable_signup":"Yes","enable_signup_rules":"required","enable_pricing":"Yes","enable_pricing_rules":"required","show_state_province":"yes","show_state_province_rules":"required","hide_posts_if_expired":"No","hide_posts_if_expired_rules":"required","mileage_unit":"miles","show_admin_agent":"Yes","show_admin_agent_rules":"required","currency_placing":"before_with_no_gap","currency_placing_rules":"required","min_car_price":"0","max_car_price":"80000","enable_paypal_transfer":"Yes","enable_paypal_transfer_rules":"required","enable_bank_transfer":"Yes","enable_bank_transfer_rules":"required","signup_payment_bank_instruction":"Put your bank transfer instructions here\\r\\n#account no\\r\\nNB: Please remember to add your email id with transfer code","signup_payment_bank_instruction_rules":"required","enable_cookie_policy_popup":"No","enable_cookie_policy_popup_rules":"required","cookie_policy_page_url":"show\\/page\\/cookie_policy","cookie_policy_page_url_rules":"required","enable_feature_payment":"No","enable_feature_payment_rules":"required","feature_charge":"","feature_charge_rules":"","feature_day_limit":"","feature_day_limit_rules":"","featured_payment_bank_instruction":"","enable_fb_login":"No","enable_fb_login_rules":"required","fb_app_id":"","fb_app_id_rules":"","fb_secret_key":"","fb_secret_key_rules":""}', 1),
(11, 'paypal_settings', '{"enable_sandbox_mode":"Yes","enable_sandbox_mode_rules":"required","item_name":"Car Dealer Package","item_name_rules":"required","email":"seller@paypalsandbox.com","email_rules":"required","currency":"USD","currency_rules":"required","finish_url":"account\\/finish_url","finish_url_rules":"required","cancel_url":"account\\/cancel_url","cancel_url_rules":"required"}', 1),
(12, 'banner_settings', '{"menu_bg_color":"rgba(14,144,160,0.91)","menu_text_color":"#ffffff","search_bg":"car63.jpg","map_latitude":"34.0204989","map_longitude":"-118.4117325","map_zoom":"8"}', 1),
(13, 'webadmin_email', '{"contact_email":"mail@mail.com","webadmin_name":"Webadmin","webadmin_email":"mail@mail.com"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpackages`
--

DROP TABLE IF EXISTS `db_tabprefixpackages`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpackages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `max_post` int(11) NOT NULL,
  `expiration_time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_tabprefixpackages`
--

INSERT INTO `db_tabprefixpackages` (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES
(1, 'Basic', 'Sample Package Description...', 5.00, 10, 30, 1),
(2, 'Normal', '', 10.00, 10, 60, 1),
(3, 'Free', 'Free Package for all user', 0.00, 50, 365, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpages`
--

DROP TABLE IF EXISTS `db_tabprefixpages`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` char(50) NOT NULL,
  `show_in_menu` int(1) NOT NULL DEFAULT '1',
  `layout` int(1) NOT NULL,
  `content_from` char(10) NOT NULL DEFAULT 'Manual',
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` char(150) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sidebar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_settings` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `db_tabprefixpages`
--

INSERT INTO `db_tabprefixpages` (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES
(1, 'DBC_home', 1, 1, 'Url', '[home]', '', '', '', '{"meta_description":"test meta lorem ispum","key_words":"meme,gag,fufu","crawl_after":"3"}', '2013-12-20 13:46:23', 1, 0, 0),
(2, 'DBC_search', 1, 1, 'Url', '[advanced_search]', 'show/search', '', '', '', '2013-12-20 13:46:41', 1, 0, 0),
(3, 'about', 1, 2, 'Manual', '[about]', 'show/page/about', '<h2>About us</h2>\r\n<p>Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.<!--StartFragment-->Lorem ipsum doller sit amet.<!--EndFragment--><!--StartFragment-->Lorem ipsum doller sit amet.<!--EndFragment--><!--StartFragment-->Lorem ipsum doller sit amet.<!--EndFragment--><!--StartFragment-->Lorem ipsum doller sit amet.<!--EndFragment-->Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.</p>\r\n<p>Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.Lorem ipsum doller sit amet.<!--StartFragment-->Lorem ipsum doller sit amet.<!--EndFragment--></p>', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2013-12-20 13:47:00', 1, 0, 0),
(4, 'contact', 1, 1, 'Url', '[contact]', 'show/contact', '', '', '{"meta_description":"contact us page for carshop, this meta will be read by search engine","key_words":"fun, contact, gag","crawl_after":"3"}', '2014-06-23 15:42:26', 1, 1, 0),
(5, 'DBC_advanced_search', 1, 0, 'Url', '[DBC_ADVANCED_SEARCH]', '', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-07-20 09:01:25', 0, 1, 0),
(6, 'dealers', 1, 0, 'Url', '[dealers]', 'show/dealer', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-07-21 14:52:04', 1, 1, 0),
(7, 'pages', 1, 0, 'Manual', '[pages]', 'show/page/pages', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-15 10:26:14', 1, 1, 0),
(8, 'blog', 1, 2, 'Url', '[blog]', 'show/post/blog', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-16 08:13:08', 1, 1, 0),
(9, 'news', 1, 2, 'Url', '[news]', 'show/post/news', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-16 08:13:57', 1, 1, 0),
(10, 'article', 1, 2, 'Url', '[article]', 'show/post/article', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-16 08:15:15', 1, 1, 0),
(11, 'cookie_policy', 0, 2, 'Manual', '[cookie_policy]', 'show/page/cookie_policy', '<p style="margin: 0cm 0cm 12pt"><strong>What are Cookies? </strong><br /> A cookie is a very small piece of information that a website stores to save and collect basic information.<br style="box-sizing: border-box" /> Many cookies are essential to the operation of our website, for example to allow you to make a purchase or create an account with us.<br style="box-sizing: border-box" /> Cookies on our site are also used to customise certain areas of content just for you, and to make your browsing experience more efficient and faster.<br style="box-sizing: border-box" /> <br style="box-sizing: border-box" /> <strong>How we use Cookies</strong><br style="box-sizing: border-box" /> Cookies on our website are used for the following purposes</p>\r\n<ul style="list-style-type: disc">\r\n<li style="margin-bottom: 3pt">To enable you to login to the system</li>\r\n<li style="">To enable you to system messages</li>\r\n<li style="  ">To improve the website''s usability by saving loading time</li>\r\n<li style="  ">To analyse the use of our website through Analytics software such as Google Analytics.</li>\r\n</ul>\r\n<p> </p>\r\n<p><strong>Information Collected</strong><br style="" /> The cookies our website doesnt collect any private data</p>', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2016-07-20 10:46:37', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixplugins`
--

DROP TABLE IF EXISTS `db_tabprefixplugins`;
CREATE TABLE IF NOT EXISTS `db_tabprefixplugins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixposts`
--

DROP TABLE IF EXISTS `db_tabprefixposts`;
CREATE TABLE IF NOT EXISTS `db_tabprefixposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `car_type` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `condition` char(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mileage` int(11) NOT NULL,
  `transmission` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `reg_no` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine_size` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine_type` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exterior_color` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `interior_color` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fuel_type` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `safety_rating` int(2) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `steering_type` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `height` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `length` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wheel_base` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `track_rear` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `track_front` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ground_clearance` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `featured_img` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gallery` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facilities` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `publish_time` date NOT NULL,
  `status` int(1) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0',
  `total_view` int(10) NOT NULL DEFAULT '0',
  `search_meta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_tabprefixposts`
--

INSERT INTO `db_tabprefixposts` (`id`, `unique_id`, `car_type`, `brand`, `model`, `year`, `condition`, `mileage`, `transmission`, `price`, `reg_no`, `engine_size`, `engine_type`, `exterior_color`, `interior_color`, `fuel_type`, `safety_rating`, `no_of_seats`, `steering_type`, `height`, `width`, `length`, `wheel_base`, `track_rear`, `track_front`, `ground_clearance`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`) VALUES
(1, '541210edd6dd9', 'Coupe', 6, 59, 2012, 'condition_new', 1000, 'Automatic', 200000.00, '', '2.3L', 'V8', 'Blue', 'Grey', 'Gas', 5, 4, 'Power Steering', '55.6 in', '71.7 in', '180.4 in', '108.7 in', '23 in', '20 in', '12 in', 'url.jpg', '["BMW-M3-8.jpg","bmw-m3-coupe.jpg","670x377Image.jpg"]', '', 1, 0, '0000-00-00', 1, 0, 0, 3, 'Coupe  BMW G12 2012 Automatic New Gas  New BMW Car Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>bmw, new, sports car'),
(2, '54121e6f58fe2', 'Sports Car', 4, 73, 2014, 'condition_new', 2000, 'Automatic', 250000.00, 'NE 781001', '5.2 L', 'V10', 'Red', 'Black', 'Gas', 5, 2, 'Power Steering', '49.0 in', '76.0 in', '174.6 in', '104.3 in', '23 in', '20 in', '12 in', 'abt-audi-r8.jpg', '["2012-audi-r8-collection-s_600x0w.jpg","Audi_R8_Facelift_(2013)3.jpg","car_photo_343885.jpg"]', '', 1, 0, '0000-00-00', 1, 1, 0, 3, 'Sports Car  Audi R8 2014 Automatic New Gas  Audi for Sale Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>audi, sports car, speed'),
(3, '541225943fa62', 'Sedan', 48, 77, 2010, 'condition_used', 6000, 'Automatic', 50000.00, 'ZMR 2090', '1.8-liter', 'Hybrid Engine', 'White', 'Brown', 'Gas', 4, 4, 'Power Steering', '49.0 in', '76.0 in', '174.6 in', '104.3 in', '23 in', '20 in', '12 in', '05-Prius-Exteriorb-950x577.jpg', '["prius-url.jpg","01_2010_toyota_prius_realorrender_opte.jpg"]', '', 1, 0, '0000-00-00', 1, 0, 0, 5, 'Sedan  Toyota Prius 2010 Automatic Used Gas  Hybrid Car Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>prius, toyota, low fuel, cost'),
(4, '54135d664bf6b', 'SUV', 16, 87, 2009, 'condition_new', 1000, 'Automatic', 30000.00, 'DDGt123', '3.0 L', 'V6', 'Black', 'Grey', 'Octane', 4, 6, 'Power', '67.9 in', '71.1 in', '174.7 in', '103.1 in', '50 in', '45in', '25 in', 'ford_escape.jpg', '[""]', '', 1, 0, '0000-00-00', 1, 1, 0, 2, 'SUV  Ford Escape 2009 Automatic New Octane  Ford SUV  Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.suv, ford, new, sale'),
(5, '54141ef3619e6', 'Luxury Car', 7, 108, 2013, 'condition_new', 2000, 'Automatic', 70000.00, 'Ex-71252', '2.5 L', 'Ecotech I4', 'Red', 'Brown', 'Gas', 5, 5, 'Power Steering', '55.9 in', '71.1 in', '182.8 in', '109.3 in', '23 in', '20 in', '12 in', '2013-cadillac-ats-026.jpg', '[""]', '', 1, 0, '0000-00-00', 1, 1, 0, 7, 'Luxury Car  Cadillac ATS 2013 Automatic New Gas  Cadillac Luxury Car with a very very long long title text Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \r\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \r\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \r\nhendrerit mi a sollicitudin.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \r\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \r\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \r\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \r\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \r\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\r\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\r\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \r\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \r\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \r\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\r\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \r\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \r\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \r\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\r\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\r\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \r\npurus vehicula.<br>cadillac, luxury car, sedan'),
(6, '54142087d425b', 'Sports Car', 14, 114, 2011, 'condition_new', 200, 'Automatic', 400000.00, 'Not Given', '4.5L', 'V8', 'Red', 'Leather', 'Gas', 5, 2, 'Power Steering', '47.8 in', '76.3 in', '178.2 in', '104.3 in', '', '', '12 in', 'ferrari_458.jpg', '["ferrari_458.jpg","ferrari-458-italia_1527561i.jpg","2013-ferrari-458-italia-spider-interior.jpg"]', '', 1, 0, '0000-00-00', 1, 1, 0, 14, 'Sports Car  Ferrari 458 Italia 2011 Automatic New Gas  Ferrari For Sale Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>ferrai, italy, luxury');

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpost_meta`
--

DROP TABLE IF EXISTS `db_tabprefixpost_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpost_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `key` char(50) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `db_tabprefixpost_meta`
--

INSERT INTO `db_tabprefixpost_meta` (`id`, `post_id`, `key`, `value`, `status`) VALUES
(1, 1, 'title', '{"en":"New BMW Car"}', 1),
(2, 1, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(3, 1, 'tags', 'bmw, new, sports car', 1),
(4, 1, 'custom_values', '{"post_id":"3","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(5, 1, 'video_url', 'https://www.youtube.com/watch?v=vQXvyV0zIP4', 1),
(6, 1, 'car_brochure', 'n/a', 1),
(7, 2, 'title', '{"en":"Audi for Sale"}', 1),
(8, 2, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(9, 2, 'tags', 'audi, sports car, speed', 1),
(10, 2, 'custom_values', '{"post_id":"4","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(11, 2, 'video_url', 'https://www.youtube.com/watch?v=JNydaMCK2zQ', 1),
(12, 2, 'car_brochure', 'n/a', 1),
(13, 3, 'title', '{"en":"Hybrid Car"}', 1),
(14, 3, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(15, 3, 'tags', 'prius, toyota, low fuel, cost', 1),
(16, 3, 'custom_values', '{"post_id":"5","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(17, 3, 'video_url', 'https://www.youtube.com/watch?v=jJ1BiZTpg_0', 1),
(18, 3, 'car_brochure', 'n/a', 1),
(19, 4, 'title', '{"en":"Ford SUV "}', 1),
(20, 4, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula."}', 1),
(21, 4, 'tags', 'suv, ford, new, sale', 1),
(22, 4, 'custom_values', '{"post_id":"6","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.\\"}"}', 1),
(23, 4, 'video_url', 'https://www.youtube.com/watch?v=gW3Odt16Yto', 1),
(24, 4, 'car_brochure', '', 1),
(25, 5, 'title', '{"en":"Cadillac Luxury Car with a very very long long title text"}', 1),
(26, 5, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\r\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\r\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\r\\nhendrerit mi a sollicitudin.\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\r\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\r\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\r\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\r\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\r\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\r\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\r\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\r\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\r\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\r\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\r\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\r\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\r\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\r\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\r\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\r\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\r\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\r\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\r\\npurus vehicula.<br>"}', 1),
(27, 5, 'tags', 'cadillac, luxury car, sedan', 1),
(28, 5, 'custom_values', '{"post_id":"7","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\r\\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\r\\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\r\\\\nhendrerit mi a sollicitudin.\\\\r\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\r\\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\r\\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\r\\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\r\\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\r\\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\r\\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\r\\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\r\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\r\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\r\\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\r\\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\r\\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\r\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\r\\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\r\\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\r\\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\r\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\r\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\r\\\\npurus vehicula.<br>\\"}"}', 1),
(29, 5, 'video_url', '', 1),
(30, 5, 'car_brochure', '', 1),
(31, 6, 'title', '{"en":"Ferrari For Sale"}', 1),
(32, 6, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(33, 6, 'tags', 'ferrai, italy, luxury', 1),
(34, 6, 'custom_values', '{"post_id":"8","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(35, 6, 'video_url', 'https://www.youtube.com/watch?v=MvVXL-vBQs0', 1),
(36, 6, 'car_brochure', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixsessions`
--

DROP TABLE IF EXISTS `db_tabprefixsessions`;
CREATE TABLE IF NOT EXISTS `db_tabprefixsessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixusers`
--

DROP TABLE IF EXISTS `db_tabprefixusers`;
CREATE TABLE IF NOT EXISTS `db_tabprefixusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` int(3) NOT NULL,
  `first_name` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` char(10) NOT NULL DEFAULT '',
  `profile_photo` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_name` char(100) NOT NULL,
  `user_email` char(100) NOT NULL,
  `password` char(255) NOT NULL,
  `remember_me_key` char(255) NOT NULL DEFAULT '',
  `recovery_key` char(255) NOT NULL DEFAULT '',
  `confirmation_key` char(30) NOT NULL DEFAULT '',
  `confirmed` int(1) NOT NULL DEFAULT '1',
  `confirmed_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `banned_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned_till` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `db_tabprefixusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixusertype`
--

DROP TABLE IF EXISTS `db_tabprefixusertype`;
CREATE TABLE IF NOT EXISTS `db_tabprefixusertype` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_tabprefixusertype`
--

INSERT INTO `db_tabprefixusertype` (`id`, `name`, `status`) VALUES
(1, 'admin', 1),
(2, 'agent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixuser_meta`
--

DROP TABLE IF EXISTS `db_tabprefixuser_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixuser_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` char(30) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `db_tabprefixuser_meta`
--

INSERT INTO `db_tabprefixuser_meta` (`id`, `user_id`, `key`, `value`, `status`) VALUES
(1, 1, 'post_count', '7', 1),
(2, 1, 'company_name', 'Hayday Auto Company', 1),
(3, 1, 'phone', '(541) 754-3010', 1),
(4, 1, 'about_me', 'Hello World', 1),
(5, 1, 'fb_profile', 'www.facebook.com/#', 1),
(6, 1, 'twitter_profile', 'twitter.com/#', 1),
(7, 1, 'li_profile', 'www.linkedin.com/#', 1),
(8, 1, 'gp_profile', 'plus.google.com/#', 1),
(9, 1, 'user_address', 'Address', 1),
(10, 1, 'user_country', '1', 1),
(11, 1, 'user_state', '9', 1),
(12, 1, 'user_city', '76', 1),
(13, 1, 'user_zip', '91340', 1),
(14, 1, 'user_latitude', '000000', 1),
(15, 1, 'user_longitude', '000000', 1),
(16, 1, 'query_email#1410698854', '{"sender_email":"mail@mail.com","sender_name":"user","subject":"Why car","msg":"lorem ipsum"}', 1),
(17, 2, 'query_email#1410699081', '{"sender_email":"mail@mail.com","sender_name":"user","subject":"What''s Car","msg":"Lorem Ipsum"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixuser_package`
--

DROP TABLE IF EXISTS `db_tabprefixuser_package`;
CREATE TABLE IF NOT EXISTS `db_tabprefixuser_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `request_date` date NOT NULL,
  `activation_date` date NOT NULL,
  `expirtion_date` date NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0=no,2=pending,1=active',
  `status` int(1) NOT NULL COMMENT '0=deleted,1=active',
  `payment_medium` char(20) NOT NULL DEFAULT 'paypal',
  `response_log` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_tabprefixuser_package`
--

INSERT INTO `db_tabprefixuser_package` (`id`, `unique_id`, `user_id`, `package_id`, `amount`, `request_date`, `activation_date`, `expirtion_date`, `is_active`, `status`, `payment_medium`, `response_log`) VALUES
(1, '54156ba6a3c4f', 3, 3, 0.00, '2014-09-14', '2014-09-14', '2015-09-14', 1, 1, 'paypal', ''),
(2, '5416b6a22e448', 4, 1, 5.00, '2014-09-15', '0000-00-00', '0000-00-00', 2, 1, 'paypal', ''),
(3, '54180ebf53063', 5, 1, 5.00, '2014-09-16', '0000-00-00', '0000-00-00', 2, 1, 'paypal', '');

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixwidgets`
--

DROP TABLE IF EXISTS `db_tabprefixwidgets`;
CREATE TABLE IF NOT EXISTS `db_tabprefixwidgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` char(23) NOT NULL,
  `params` text NOT NULL,
  `status` int(1) NOT NULL,
  `editable` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `db_tabprefixwidgets`
--

INSERT INTO `db_tabprefixwidgets` (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES
(1, 'All types', 'all_types', '', 1, 1),
(3, 'Top Dealers', 'top_dealers', '', 1, 1),
(4, 'Featured Cars', 'featured_cars', '', 1, 1),
(5, 'Top cars', 'top_cars', '', 1, 1),
(6, 'Language selector', 'language_selector', '', 1, 1),
(7, 'Facebook like box', 'facebook_like_box', '', 1, 1),
(8, 'Contact text', 'contact_text', '', 1, 1),
(9, 'Follow us', 'follow_us', '', 1, 1),
(10, 'News Post', 'news_post', '', 1, 1),
(11, 'Blog Post', 'blog_post', '', 1, 1),
(12, 'Article Post', 'article_post', '', 1, 1),
(13, 'Short Description', 'short_description', '', 1, 1),
(14, 'Plain Search Widget', 'plain_search_widget', '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
