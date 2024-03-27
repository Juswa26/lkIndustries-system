-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 02:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `ad_id` int(10) NOT NULL,
  `ad_code` varchar(255) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` varchar(255) NOT NULL,
  `ad_contact` varchar(255) NOT NULL,
  `ad_role` varchar(255) NOT NULL,
  `ad_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`ad_id`, `ad_code`, `ad_name`, `ad_email`, `ad_pass`, `ad_contact`, `ad_role`, `ad_img`) VALUES
(1, '', 'test user', 'test@gmail.com', '1234', '+63900000000', 'owner', 'k.jpg'),
(3, 'ADM1840715', 'Eyyy', 'diazcris369@gmail.com', '0', '123', 'come here', 'image0_1024_1024_watermark.jpg'),
(5, 'ADM6905676', 'Test Pic', 'diazcris369@gmail.com', '0', '123', 'Test Pics', 'image0_1024_1024_watermark.jpg'),
(6, 'ADM0331509', 'Ambas', '123@gmail.com', '111', '123', 'Bus', 'image_2023-08-12_165614620.png');

-- --------------------------------------------------------

--
-- Table structure for table `auto_serv`
--

CREATE TABLE `auto_serv` (
  `serv_id` int(10) NOT NULL,
  `serv_code` varchar(255) NOT NULL,
  `serv_name` varchar(255) NOT NULL,
  `serv_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `btrans_id` int(10) NOT NULL,
  `btrans_code` varchar(255) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_contact` varchar(255) NOT NULL,
  `car_make` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_year` int(100) NOT NULL,
  `car_vin` varchar(255) NOT NULL,
  `car_odo` int(100) NOT NULL,
  `car_license` varchar(255) NOT NULL,
  `serv_name` varchar(255) NOT NULL,
  `book_desc` varchar(755) NOT NULL,
  `book_status` varchar(255) NOT NULL,
  `sched_date` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`btrans_id`, `btrans_code`, `cust_id`, `cust_name`, `cust_email`, `cust_contact`, `car_make`, `car_model`, `car_year`, `car_vin`, `car_odo`, `car_license`, `serv_name`, `book_desc`, `book_status`, `sched_date`, `date_created`) VALUES
(1, 'SB43643684', 3, 'test user1', 'sampletest806@gmail.com', '+639000000000', 'Toyota', 'Camry', 2020, '1G1SL65848Z411439', 250000, 'ABC 123', 'PMS (Preventive Maintenance Schedule)', 'My car is making a knocking noise when I start it up. I also noticed that the oil level is low. I checked the owner\'s manual and it says that the oil should be changed every 3,000 miles. My car has 3,500 miles on it, so it\'s definitely time for an oil change.', 'For Initial Inspection', '2023-08-13T10:30', '2023-08-11 10:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `car_parts`
--

CREATE TABLE `car_parts` (
  `cpart_id` int(10) NOT NULL,
  `cpart_code` varchar(255) NOT NULL,
  `cpart_name` varchar(255) NOT NULL,
  `cpart_category` varchar(255) NOT NULL,
  `cpart_price` int(100) NOT NULL,
  `cpart_stock` int(100) NOT NULL,
  `cpart_desc` varchar(255) NOT NULL,
  `cpart_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_parts`
--

INSERT INTO `car_parts` (`cpart_id`, `cpart_code`, `cpart_name`, `cpart_category`, `cpart_price`, `cpart_stock`, `cpart_desc`, `cpart_img`) VALUES
(1, 'CPT8684536', 'Rear Bumper', 'Exterior', 1500, 10, 'This bumper car body part is a high-quality, durable replacement part that is perfect for restoring your bumper car to its original condition. The part is made of strong, impact-resistant plastic that can withstand the rigors of bumper car use. ', 'rear-bump.jpg'),
(2, 'CPT2651940', 'VTI GAUGE (Manual) ', 'Interior', 3500, 5, 'This versatile instrument is perfect for any vehicle, and it features a wide range of features to keep you informed and in control. The speedometer, tachometer, and fuel gauge are all easy to read, and the bright yellow needles make it easy to see.', 'vti-gauge.jpg'),
(3, 'CPT1346025', 'Momo Steering Wheel ', 'Interior', 899, 5, '\r\nUpgrade your driving experience with the Momo Monte Carlo steering wheel. This stylish and functional steering wheel is perfect for any car enthusiast. ', 'str-wheel.jpg'),
(4, 'CPT8501694', 'Confetti Recaro Bucket Seat ', 'Interior', 18000, 2, 'This stylish and functional steering wheel is perfect for any car enthusiast. It\'s made from high-quality Alcantara material and features a red stitching that will give your car a sporty look.', 'car-seat.jpg'),
(5, 'CPT7984560', 'Arm Rest', 'Interior', 2000, 3, 'This innovative arm rest is designed specifically for men with big mustaches. It provides a comfortable place to rest your whiskers, so you can relax and enjoy your day without having to worry about them getting in the way.', 'arm-rest.jpg'),
(6, 'CPT4961879', 'USDM climate control ', 'Interior', 800, 1, 'This climate control is a direct replacement for the stock climate control in your 1996-2000 Honda Civic. It features a sleek and modern design that will give your car a new look.', 'clim-ctrl.jpg'),
(8, 'CPT2900513', 'Stock Steering Wheel EK4', 'Interior', 2500, 6, 'Give your Honda Civic the upgrade it deserves with a new Stock Steering wheel EK 4. This steering wheel is a direct replacement for the stock steering wheel in your 1996-2000 Honda Civic. ', 'str-wheel2.png');

-- --------------------------------------------------------

--
-- Table structure for table `cparts_cat`
--

CREATE TABLE `cparts_cat` (
  `cat_id` int(10) NOT NULL,
  `cat_code` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cparts_cat`
--

INSERT INTO `cparts_cat` (`cat_id`, `cat_code`, `cat_name`, `cat_description`) VALUES
(1, 'CAT8901205', 'Car Battery', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam omnis magnam, quia iste commodi reiciendis delectus beatae voluptatibus, culpa, reprehenderit qui. Provident consectetur quod voluptatibus, ex iure nam similique aspernatur.\n'),
(2, 'CAT0244932', 'Car  Oil', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam omnis magnam, quia iste commodi reiciendis delectus beatae voluptatibus, culpa, reprehenderit qui. Provident consectetur quod voluptatibus, ex iure nam similique aspernatur.'),
(3, 'CAT1588620', 'Brake Fluid', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore illum laboriosam culpa molestias vel, provident nihil, distinctio doloremque laborum magnam minima, nisi eaque a perferendis hic porro nam ipsam deserunt!'),
(4, 'CAT5678901', 'Head Light', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore illum laboriosam culpa molestias vel, provident nihil, distinctio doloremque laborum magnam minima, nisi eaque a perferendis hic porro nam ipsam deserunt!'),
(5, 'CAT8249023', 'Tail Light', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore illum laboriosam culpa molestias vel, provident nihil, distinctio doloremque laborum magnam minima, nisi eaque a perferendis hic porro nam ipsam deserunt!');

-- --------------------------------------------------------

--
-- Table structure for table `cust_cart`
--

CREATE TABLE `cust_cart` (
  `cart_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `cpart_id` int(100) NOT NULL,
  `cpart_img` varchar(255) NOT NULL,
  `cpart_name` varchar(255) NOT NULL,
  `cpart_quant` int(100) NOT NULL,
  `cpart_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cust_users`
--

CREATE TABLE `cust_users` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_users`
--

INSERT INTO `cust_users` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_pass`, `created_at`) VALUES
(1, 'test user', 'test@gmail.com', '+63985150619', 'asfbakwjanksjaics', '2023-07-29 15:35:40'),
(2, 'test user', 'test@gmail.com', '+63985150619', 'asfbakwjanksjaics', '2023-07-29 15:35:44'),
(3, 'test user1', 'sampletest806@gmail.com', '+639000000000', '$2y$10$bDm/rm6JhiCQlcykchNRQ.Xf8EvsqfdwX0jR7qYwSHuCCrZ4ZvKfK', '2023-07-29 20:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `rewards_id` int(10) NOT NULL,
  `rewards_code` varchar(255) NOT NULL,
  `rewards_name` varchar(255) NOT NULL,
  `rewards_points` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` int(10) NOT NULL,
  `serv_code` varchar(255) NOT NULL,
  `serv_name` varchar(255) NOT NULL,
  `serv_desc` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `serv_code`, `serv_name`, `serv_desc`) VALUES
(1, '', 'PMS', 'Ensuring your vehicle\'s long-term health requires regular preventive maintenance. Our PMS service includes comprehensive checks and minor adjustments to avoid potential major repairs. From fluid checks, filter changes, tire inspection to battery testing, our team ensures your vehicle stays in top form.'),
(2, '', 'Change Oil', 'Regular oil changes are vital for your engine\'s health and longevity. Our service includes draining the old engine oil, replacing the oil filter, and filling up with premium-quality motor oil that suits your vehicle\'s specifications. Extend your engine\'s life with our expert oil change service'),
(4, '', 'Engine Replacement', 'In some cases, it may be more cost-effective to replace the engine rather than repair it. We offer engine replacement services where we will source and install a new or refurbished engine that meets or exceeds original manufacturer specifications. Trust us to get your vehicle back on the road in no time.'),
(5, '', 'Flood Damaged Cars Repair', 'Floods can cause significant damage to your vehicle. Our team is skilled in repairing flood-damaged cars, including drying out, cleaning, and replacing damaged parts. We will check the engine, electrical system, and interior to ensure your car is safe to drive again.'),
(6, '', ' Paint Job', ' Whether you want to refresh your vehicle\'s appearance or cover up scratches and dents, our professional paint job service has you covered. We offer color-matching, high-quality paint options, and top-tier finishing techniques to give your vehicle a fresh, new damn look.'),
(7, '', 'Body repair', 'From minor dings to major collision damage, our body repair service is equipped to handle it all. Our technicians use state-of-the-art tools and techniques to restore your vehicle to its pre-damage condition, ensuring it looks and drives like new.'),
(8, '', 'Transmission Change (Automatic to Manual)', 'If you prefer the control of a manual transmission, we offer services to change your automatic transmission to a manual one. Our skilled technicians will ensure a seamless transition, allowing you to experience the joy of stick-shift driving.'),
(9, '', 'Brake Change', 'Your safety is our top priority. We provide complete brake change services, including replacing brake pads, rotors, and fluid as needed. Our team uses high-quality parts to ensure you have reliable stopping power on the road.');

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE `user_transactions` (
  `trans_id` int(10) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `trans_code` varchar(255) NOT NULL,
  `trans_date` varchar(255) NOT NULL,
  `amount` int(100) NOT NULL,
  `deliv_method` varchar(255) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `trans_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`trans_id`, `cust_id`, `trans_code`, `trans_date`, `amount`, `deliv_method`, `pay_method`, `trans_status`) VALUES
(9, 3, 'CP33457730', '2023-08-11 07:57:37', 2550, 'in store pickup', 'store payment', 'Order In Process');

-- --------------------------------------------------------

--
-- Table structure for table `verify_otp`
--

CREATE TABLE `verify_otp` (
  `otp_id` int(10) NOT NULL,
  `otp_code` int(10) NOT NULL,
  `otp_expire` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify_otp`
--

INSERT INTO `verify_otp` (`otp_id`, `otp_code`, `otp_expire`, `user_email`) VALUES
(79, 805068, 2023, 'ga601174@gmail.com'),
(80, 535900, 2023, 'jhon.gab.aguilar@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `auto_serv`
--
ALTER TABLE `auto_serv`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`btrans_id`);

--
-- Indexes for table `car_parts`
--
ALTER TABLE `car_parts`
  ADD PRIMARY KEY (`cpart_id`);

--
-- Indexes for table `cparts_cat`
--
ALTER TABLE `cparts_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cust_cart`
--
ALTER TABLE `cust_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cust_users`
--
ALTER TABLE `cust_users`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`rewards_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `verify_otp`
--
ALTER TABLE `verify_otp`
  ADD PRIMARY KEY (`otp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `ad_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auto_serv`
--
ALTER TABLE `auto_serv`
  MODIFY `serv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `btrans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_parts`
--
ALTER TABLE `car_parts`
  MODIFY `cpart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cparts_cat`
--
ALTER TABLE `cparts_cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cust_cart`
--
ALTER TABLE `cust_cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cust_users`
--
ALTER TABLE `cust_users`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `rewards_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_transactions`
--
ALTER TABLE `user_transactions`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `verify_otp`
--
ALTER TABLE `verify_otp`
  MODIFY `otp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
