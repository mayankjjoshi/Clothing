-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 06:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(17, 16, 32, 'test3', 999, 1, '5940235229_image1.webp'),
(18, 16, 50, 'Top Jaipur women', 1120, 3, '9002347275_image1.webp'),
(22, 17, 45, 'Kurta Kurta', 979, 1, '3708977353_image1.webp'),
(23, 17, 39, 'Blue Trousers Pant', 1988, 1, '3338723362_image1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(44) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`) VALUES
(1, 'MEN', 1),
(3, 'WOMEN', 1),
(4, 'KIDS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(2, 'xyz', 'xyz@gmail.com', '8765678924', 'hii , how are you ?', '2023-02-02 14:15:54'),
(3, 'Mayank', 'bhautik@gmail.com', '8141687112', 'hreu', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `flat` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id`, `user_id`, `name`, `number`, `email`, `flat`, `street`, `city`, `state`, `country`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(1, 16, 'mayank', 2147483647, 'bhautik@gmail.com', 'abc', 'xyz', 'www', 'gujarat', 'india', 90001, 'cod', 1848, 'Pending', 1, '2023-03-13 07:25:05'),
(2, 16, 'mayank', 2147483647, 'private6e@gtuytf.com', 'yfh h,m ', 'ngmyfm', 'abc', 'fgrdfrf', 'bfbfd', 0, 'paypal', 1998, 'pending', 3, '2023-03-13 08:42:52'),
(3, 16, 'soham', 2147483647, 'prajapati@gmail.com', 'xyz', 'abc street', 'vadodara', 'gujarat', 'india', 49001, 'paypal', 999, 'pending', 3, '2023-03-14 04:40:15'),
(4, 16, 'Rabari', 33333333, 'jill@gmail.com', '80', 'abc street', 'hardgud', 'gujarat', 'india', 54239, 'cod', 8991, 'pending', 3, '2023-03-14 04:42:35'),
(5, 17, 'xyz', 2147483647, 'xyz@gmail.com', 'xyz', 'abc street', 'vadodara', 'gujarat', 'india', 49001, 'paypal', 1978, 'pending', 1, '2023-03-15 12:10:29'),
(6, 17, 'Mayank', 2147483647, 'nai@gmail.com', 'xyz', 'abc street', 'vadodara', 'gujarat', 'india', 49001, 'cod', 4480, 'pending', 1, '2023-03-16 05:06:57'),
(7, 17, 'Bhautik', 2147483647, 'bhautik@gmail.com', 'xyz', 'abc street', 'vadodara', 'gujarat', 'india', 49001, 'cod', 2937, 'pending', 1, '2023-03-16 05:39:16'),
(8, 17, 'Mayank', 2147483647, 'nai@gmail.com', 'xyz', 'reghreh', 'vadodara', 'gujarat', 'india', 49001, 'paypal', 5974, 'pending', 1, '2023-03-20 08:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 14, 'Bhautik', '8141687112', 'bhautik@gmail.com', 'cod', 'xyz,abc street,vadodaragujarat,india-49001', ' top(1) T-shirt(1)', 1998, '02-Mar-2023', 'completed'),
(3, 14, 'Bhautik', '8141687112', 'bhautik@gmail.com', 'cod', 'rtbthht,abc street,vadodara,gujarat,india-49001', ' , t-shirt1(1)', 999, '04-Mar-2023', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(1, 1, 32, 1, 999, '2023-03-13 07:25:05'),
(2, 1, 20, 1, 849, '2023-03-13 07:25:05'),
(3, 2, 32, 1, 999, '2023-03-13 08:42:53'),
(4, 2, 21, 1, 999, '2023-03-13 08:42:53'),
(5, 3, 32, 1, 999, '2023-03-14 04:40:15'),
(6, 4, 32, 4, 3996, '2023-03-14 04:42:35'),
(7, 4, 27, 5, 4995, '2023-03-14 04:42:36'),
(8, 5, 32, 1, 999, '2023-03-15 12:10:29'),
(9, 5, 34, 1, 979, '2023-03-15 12:10:29'),
(10, 6, 35, 4, 4480, '2023-03-16 05:06:57'),
(11, 7, 45, 3, 2937, '2023-03-16 05:39:16'),
(12, 8, 53, 1, 1899, '2023-03-20 08:36:26'),
(13, 8, 44, 1, 679, '2023-03-20 08:36:26'),
(14, 8, 36, 4, 3396, '2023-03-20 08:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `mrp` float NOT NULL,
  `sprice` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `cat_id`, `subcat_id`, `pname`, `mrp`, `sprice`, `qty`, `image`, `image2`, `image3`, `image4`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(20, 4, 3, 'western top', 1000, 849, 7, '4229879169_kid.webp', '', '', '', 'trgntrnrtdjrtj', 'ytryjrtyjry', '', '', '', 1),
(21, 3, 4, 't-shirt1', 1299, 999, 10, '4271808380_women.webp', '', '', '', 'gvbsrg', 'rgrsgrw', '', '', '', 0),
(25, 1, 5, 'xyz', 1299, 849, 5, '3759809204_men2.webp', '', '', '', '78ki8', 'ytmuty', '', '', '', 0),
(27, 1, 5, 'pant2', 1299, 999, 5, '5521797270_image1.webp', '', '', '', 'myumtjrtyj', 'hrtjhrtjhtrj', '', '', '', 0),
(28, 1, 7, 't-shirt13', 1299, 999, 5, '2286653106_image1.webp', '', '', '', 'fbfbresbr', 'grefbrefrs', '', '', '', 0),
(29, 1, 7, 't-shirt14', 1299, 999, 5, '5927795684_image3.webp', '', '', '', 'thtrn', 'trhrhrther', '', '', '', 0),
(30, 1, 5, 'pant4', 1400, 999, 5, '6236251494_image4.webp', '', '', '', 'brgnbrte', 'gegere', '', '', '', 0),
(31, 1, 7, 'test12', 1299, 999, 5, '8896814089_image1.webp', '', '', '', 'yjyjytjyt', 'jjuykyuk', '', '', '', 0),
(32, 3, 10, 'Purple Kurta', 1299, 999, 5, '5940235229_image1.webp', '5149248865_image2.webp', '7348669013_image3.webp', '7852600443_image4.webp', 'nrnrtnrt', '', '', '', '', 1),
(33, 1, 7, 'Vintage Crew T-shirt', 1599, 1359, 5, '3096801913_image1.webp', '1170664676_image2.webp', '6083173558_image3.webp', '4131707290_image4.webp', 'Fabric Cotton', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(34, 1, 7, 'Vintage Crew Grey T-Shirt', 1300, 979, 10, '1246084520_image1.webp', '3557027098_image2.webp', '8962147575_image3.jpg', '6511513412_image4.webp', 'Fabric Cotton', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(35, 1, 7, 'Full Slevee T-Shirt', 1400, 1120, 12, '6201617837_image1.webp', '4661560367_image2.webp', '8510717737_image3.webp', '6792389013_image4.webp', 'Fabric Cotton', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(36, 1, 7, 'The V Shape T-Shirt', 900, 849, 13, '7516932423_image1.webp', '1970708097_image2.webp', '6892270519_image3.webp', '2789408883_image4.webp', 'Fabric Cotton', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(37, 1, 5, 'The Black Pant', 1200, 1150, 7, '7978197146_image1.webp', '3562098269_image2.webp', '8218813454_image3.webp', '8443784170_image4.webp', 'Fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(38, 1, 5, 'The Green Pant', 1800, 1500, 9, '5964020496_image1.webp', '1497141084_image2.webp', '2139783859_image3.webp', '3506345044_image4.webp', 'Cotton Jeans', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(39, 1, 5, 'Blue Trousers Pant', 2100, 1988, 8, '3338723362_image1.webp', '4078916113_image2.webp', '6912871542_image3.webp', '1156646903_image4.webp', 'Trousers', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(40, 1, 8, 'The Polo', 799, 529, 8, '9109946586_image1.webp', '4908974562_image2.webp', '3476067596_image3.webp', '1415367358_image4.webp', 'Polo', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(41, 1, 8, 'The Cotton Polo', 899, 499, 8, '5100918332_image1.webp', '2735792011_image5.webp', '7815774388_image4.webp', '4961092494_image3.webp', 'fabric polo', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(42, 1, 9, 'The Shirt', 699, 500, 7, '9926483038_image1.webp', '1975974434_image2.webp', '1762569123_image3.webp', '9324597689_image4.webp', 'Fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(43, 1, 9, 'the Grey Shirt', 1599, 1399, 8, '3466396415_image1.webp', '4001765713_image2.webp', '1957063606_image3.webp', '9112732932_image4.webp', 'Fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(44, 3, 10, 'Kurta', 799, 679, 8, '6093638537_image1.webp', '9691409849_image2.webp', '7466771057_image3.webp', '3404860826_image4.webp', 'Fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(45, 3, 10, 'Kurta Kurta', 1599, 979, 7, '3708977353_image1.webp', '8996536578_image2.webp', '8330188601_image3.webp', '8802063974_image4.webp', 'fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\\\'s incredibly soft and breathable (less than 1% of the world\\\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(46, 4, 3, 'Kid Dress', 1599, 979, 12, '3067576133_image1.webp', '7437379572_image2.webp', '7556998174_image3.webp', '3112241436_image4.webp', 'Kurta', '', '', '', '', 1),
(47, 4, 3, 'kid kurta', 1599, 979, 8, '2038523397_image1.webp', '5251111862_image2.webp', '5576152648_image3.webp', '2849336026_image4.webp', 'Kurta', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(48, 3, 11, 'Women Top', 1599, 979, 8, '3105252038_image1.webp', '9403001001_image2.webp', '3308703590_image3.webp', '4526186429_image4.webp', 'Fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(49, 3, 11, 'Women Top Women', 1599, 979, 8, '1439495405_image1.webp', '7885702605_image2.webp', '2136218749_image3.webp', '5368748565_image4.webp', 'Fabric', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(50, 3, 11, 'Top Jaipur women', 1599, 1120, 8, '9002347275_image1.webp', '2284697574_image2.webp', '5774427179_image3.webp', '6374879033_image4.webp', 'Top', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(51, 3, 11, 'Top Yellow', 1299, 849, 10, '5090273027_image1.webp', '7832882357_image2.webp', '2033154291_image3.webp', '7398345495_image4.webp', 'Fabric cotton top', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(52, 1, 9, 'T-shirt Brown', 1499, 849, 5, '4498142402_image4.webp', '2419353909_image3.webp', '1996053294_image2.webp', '3285500692_image1.webp', 'Fabric Cottons', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1),
(53, 3, 10, 'Women Embroidery Kurta', 2100, 1899, 5, '3501525292_image1.webp', '6185532619_image2.webp', '4922740812_image3.webp', '4154326976_image4.webp', 'Yellow Cotton Kurta', 'The fabric is custom knit using 100% Extra Long Staple Pima Cotton that\'s incredibly soft and breathable (less than 1% of the world\'s cotton is graded extra long staple). The long fiber length of Pima Cotton ensures the fabric retains its strength and softness, even after years of wear.', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcategory_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcategory` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcategory_id`, `cat_id`, `subcategory`, `status`) VALUES
(3, 4, 'dress', 1),
(4, 3, 'T-shirt', 1),
(5, 1, 'pant', 1),
(7, 1, 'T-shirt', 1),
(8, 1, 'Polo', 1),
(9, 1, 'Shirt', 1),
(10, 3, 'Kurta', 1),
(11, 3, 'Tops', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `create_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `create_date`) VALUES
(17, 'Bhautik', 'Patel', 'bhautik@gmail.com', '123456', '15-Mar-2023');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(12, 16, 21, 't-shirt1', 999, '4271808380_women.webp'),
(14, 16, 32, 'test3', 999, '5940235229_image1.webp'),
(15, 16, 50, 'Top Jaipur women', 1120, '9002347275_image1.webp'),
(21, 17, 53, 'Women Embroidery Kurta', 1899, '3501525292_image1.webp'),
(22, 17, 34, 'Vintage Crew Grey T-Shirt', 979, '1246084520_image1.webp'),
(23, 17, 35, 'Full Slevee T-Shirt', 1120, '6201617837_image1.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
