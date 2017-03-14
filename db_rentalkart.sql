-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 04:59 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rentalkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `c_id` int(11) NOT NULL COMMENT 'Catagory Id',
  `c_title` varchar(50) NOT NULL COMMENT 'Catagory Name/Title'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='This Table Stores Catagory';

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`c_id`, `c_title`) VALUES
(1, 'ELECTRONICS'),
(2, 'CLOTHES'),
(3, 'HEALTH & BEAUTY'),
(4, 'SPORTS & LEISURE '),
(5, ' BOOKS & ENTERTAINMENTS'),
(6, 'Wolaaa'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE IF NOT EXISTS `customer_registration` (
  `cust_id` int(11) NOT NULL COMMENT 'Customer''s ID Primary Key Auto increment',
  `cust_password` varchar(255) NOT NULL COMMENT 'customer''s password',
  `cust_email` varchar(50) NOT NULL COMMENT 'customer''s email',
  `cust_fullname` varchar(50) NOT NULL COMMENT 'customer''s full name',
  `cust_address` varchar(255) NOT NULL COMMENT 'customer''s address',
  `cust_city` varchar(255) NOT NULL COMMENT 'customer''s city',
  `cust_pincode` int(10) NOT NULL COMMENT 'customer''s pincode',
  `cust_contactno` bigint(10) NOT NULL COMMENT 'customer''s contact number',
  `cust_gender` tinyint(1) NOT NULL COMMENT '0 for female 1 for male',
  `cust_dob` date NOT NULL COMMENT 'dob of customer',
  `cust_adhar_number` bigint(16) NOT NULL COMMENT 'Stores Customer''s Aadhar Number'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`cust_id`, `cust_password`, `cust_email`, `cust_fullname`, `cust_address`, `cust_city`, `cust_pincode`, `cust_contactno`, `cust_gender`, `cust_dob`, `cust_adhar_number`) VALUES
(1, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'anaablone25@gmail.com', 'Anaab Lone', 'Buchwara Dalgate, near umar medicate, srinagar, kashmir', 'srinagar', 190001, 9906631405, 0, '1993-06-25', 1234567890222222),
(2, 'ef62fc7b63b3abb0e890473f642995e7', 'ksaak33@gmail.com', 'Aamir Bashir', 'Near Fish Seeds Farm Manasbal, Ganderbal Kashmir ', 'Srinagar', 193504, 8491866657, 1, '1993-10-04', 1234567890222222);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL COMMENT 'Product Id',
  `p_title` varchar(50) NOT NULL COMMENT 'Product Title',
  `p_s_desc` varchar(100) NOT NULL COMMENT 'Product Short Description',
  `p_price_h` decimal(10,0) NOT NULL COMMENT 'Product Price Hourly',
  `p_price_d` decimal(10,0) NOT NULL COMMENT 'Product Price Daily',
  `p_price_w` decimal(10,0) NOT NULL COMMENT 'Product Price weakly',
  `p_pic` varchar(200) NOT NULL DEFAULT 'bootstrap/img/loading1.gif' COMMENT 'Product Main/ Full Picture',
  `p_pic_back` varchar(200) NOT NULL COMMENT 'Back Image Of Product',
  `p_pic_lside` varchar(200) NOT NULL COMMENT 'Left Side Image',
  `p_pic_rside` varchar(200) NOT NULL COMMENT 'Right Side of Image',
  `p_discount` int(11) NOT NULL DEFAULT '0' COMMENT 'Product Discount',
  `p_f_desc` varchar(500) NOT NULL COMMENT 'Product Full Description',
  `p_brand` varchar(40) NOT NULL COMMENT 'Product Brand',
  `p_model` varchar(40) NOT NULL COMMENT 'Product Model',
  `p_size_dim` varchar(50) NOT NULL COMMENT 'product Dimension And Size',
  `p_other` varchar(70) NOT NULL COMMENT 'Product Aditional Details',
  `p_like` int(11) NOT NULL DEFAULT '0' COMMENT 'Product Likes',
  `p_dislike` int(11) NOT NULL DEFAULT '0' COMMENT 'Product DisLikes',
  `p_upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Product Upload Date',
  `p_last_rented` date NOT NULL COMMENT 'When Last Time Product Was Rented',
  `p_rented` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether Product Rented Or Not ',
  `p_catagory` int(11) NOT NULL COMMENT 'Product Catagory Points To Catagory Table''s c_id  Filed',
  `sc_id` int(50) NOT NULL COMMENT 'Subcatagory Id',
  `user_id` int(11) NOT NULL COMMENT 'Stores user Id ie Who uploaded this product'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_title`, `p_s_desc`, `p_price_h`, `p_price_d`, `p_price_w`, `p_pic`, `p_pic_back`, `p_pic_lside`, `p_pic_rside`, `p_discount`, `p_f_desc`, `p_brand`, `p_model`, `p_size_dim`, `p_other`, `p_like`, `p_dislike`, `p_upload_date`, `p_last_rented`, `p_rented`, `p_catagory`, `sc_id`, `user_id`) VALUES
(1, 'Fujifilm FinePix S2950 Digital Camera', ' (14MP, 18x Optical Zoom) 3-inch LCD', '50', '500', '3500', 'themes/images/products/14.jpg', 'themes/images/products/6.jpg', 'themes/images/products/8.jpg', 'themes/images/products/9.jpg', 0, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).', 'Fujifilm', 'FinePix S2950HD', '5.50\\" h x 5.50\\" w x 2.00\\" l', 'The S2950 sports an impressive 28mm – 504mm', 4, 2, '2017-02-01 05:57:49', '2017-02-09', 1, 1, 0, 0),
(3, 'kabul FinePix S2950 Digital Camera', ' (14MP, 18x Optical Zoom) 3-inch LCD', '30', '300', '3500', 'themes/images/products/8.jpg', 'themes/images/products/8.jpg', 'themes/images/products/7.jpg', 'themes/images/products/9.jpg', 0, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).', 'Fujifilm', 'FinePix S2950HD', '5.50\\" h x 5.50\\" w x 2.00\\" l', 'The S2950 sports an impressive 28mm – 504mm', 2, 5, '2017-02-10 05:57:49', '2017-02-12', 1, 1, 0, 0),
(4, 'known S2950 Digital Camera', ' (14MP, 18x Optical Zoom) 3-inch LCD', '60', '600', '3500', 'themes/images/products/9.jpg', 'themes/images/products/9.jpg', 'themes/images/products/6.jpg', 'themes/images/products/7.jpg', 0, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).', 'Fujifilm', 'FinePix S2950HD', '5.50\\" h x 5.50\\" w x 2.00\\" l', 'The S2950 sports an impressive 28mm – 504mm', 4, 0, '2017-02-12 05:57:49', '2017-02-15', 1, 1, 0, 0),
(5, 'Phone FinePix S2950 Digital Camera', ' (14MP, 18x Optical Zoom) 3-inch LCD', '10', '100', '3500', 'themes/images/products/10.jpg', 'themes/images/products/7.jpg', 'themes/images/products/10.jpg', 'themes/images/products/8.jpg', 0, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).', 'Fujifilm', 'FinePix S2950HD', '5.50\\" h x 5.50\\" w x 2.00\\" l', 'The S2950 sports an impressive 28mm – 504mm', 7, 1, '2017-01-31 05:57:49', '2017-02-03', 1, 1, 0, 0),
(6, 'Bulb FinePix S2950 Digital Camera', ' (14MP, 18x Optical Zoom) 3-inch LCD', '15', '150', '3500', 'themes/images/products/11.jpg', 'themes/images/products/7.jpg', 'themes/images/products/8.jpg', 'themes/images/products/6.jpg', 0, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).', 'Fujifilm', 'FinePix S2950HD', '5.50\\" h x 5.50\\" w x 2.00\\" l', 'The S2950 sports an impressive 28mm – 504mm', 1, 3, '2017-02-15 05:57:49', '0000-00-00', 0, 0, 0, 0),
(7, 'Bulb FinePix S2950 Digital Camera', ' (14MP, 18x Optical Zoom) 3-inch LCD', '15', '150', '3500', 'themes/images/products/11.jpg', 'themes/images/products/7.jpg', 'themes/images/products/8.jpg', 'themes/images/products/6.jpg', 0, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).', 'Fujifilm', 'FinePix S2950HD', '5.50\\" h x 5.50\\" w x 2.00\\" l', 'The S2950 sports an impressive 28mm – 504mm', 1, 3, '2017-02-15 05:57:49', '0000-00-00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcatagory`
--

CREATE TABLE IF NOT EXISTS `subcatagory` (
  `sc_id` int(11) NOT NULL COMMENT 'Subcatagory Id',
  `sc_title` varchar(50) NOT NULL COMMENT 'Subcatagory Name/Title',
  `c_id` int(11) NOT NULL COMMENT 'Catagory To which It Belongs'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcatagory`
--

INSERT INTO `subcatagory` (`sc_id`, `sc_title`, `c_id`) VALUES
(1, 'Cameras ', 1),
(2, 'Computers, Tablets & laptop', 1),
(3, 'Mobile Phone', 1),
(4, 'Sound & Vision', 1),
(5, 'Women''s Clothing', 2),
(6, 'Women''s Shoes', 2),
(7, 'Women''s Hand Bags', 2),
(8, 'Men''s Clothings', 2),
(9, 'Men''s Shoes', 2),
(10, 'Kids Clothing', 2),
(11, 'Kids Shoes', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`c_id`), ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`), ADD KEY `p_id` (`p_id`), ADD KEY `p_catagory` (`p_catagory`), ADD KEY `sc_id` (`sc_id`);

--
-- Indexes for table `subcatagory`
--
ALTER TABLE `subcatagory`
  ADD PRIMARY KEY (`sc_id`), ADD KEY `sc_id` (`sc_id`), ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Catagory Id',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Customer''s ID Primary Key Auto increment',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Product Id',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subcatagory`
--
ALTER TABLE `subcatagory`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Subcatagory Id',AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
