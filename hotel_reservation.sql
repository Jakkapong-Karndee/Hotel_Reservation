-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 04:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `range_insert` (IN `hotel_id` INT, IN `room_type_id` INT, IN `price` INT, IN `room_start` INT, IN `room_stop` INT)  BEGIN
	DECLARE incRange INT;
    SET incRange = room_start;
    WHILE incRange <= room_stop DO
		INSERT INTO hotel_room (hotel_room.hotel_id,  hotel_room.room_type_id, hotel_room.room_no, hotel_room.room_status,hotel_room.price) VALUES (hotel_id,room_type_id,incRange,'Available',price);
            SET incRange = incRange + 1;
     END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `guest_id`, `room_id`, `hotel_id`, `date_start`, `date_end`, `transaction_id`) VALUES
(28, 4, 10, 4, '2021-11-21 01:00:00', '2021-11-24 01:00:00', 12),
(29, 4, 11, 4, '2021-11-21 01:00:00', '2021-11-24 01:00:00', 12),
(30, 4, 16, 4, '2021-11-21 01:00:00', '2021-11-24 01:00:00', 12),
(31, 4, 20, 5, '2021-11-21 01:00:00', '2021-11-24 01:00:00', 12),
(32, 4, 20, 5, '2021-12-30 04:00:00', '2022-01-02 10:00:00', 13),
(33, 5, 16, 4, '2021-11-21 05:00:00', '2021-11-24 05:00:00', 14),
(34, 5, 20, 5, '2022-01-14 05:00:00', '2022-01-31 03:00:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `guest_detail`
--

CREATE TABLE `guest_detail` (
  `guest_id` int(11) NOT NULL,
  `passport_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_detail`
--

INSERT INTO `guest_detail` (`guest_id`, `passport_id`, `user_id`) VALUES
(4, 32543453, 1),
(5, 352, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `location`) VALUES
(4, 'John\'s hotel', 'Johnland'),
(5, 'Jim Hotel', 'Jimland'),
(6, 'Jack Hotel', 'Jackland');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `room_status` varchar(20) DEFAULT NULL,
  `price` int(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`room_id`, `hotel_id`, `room_type_id`, `room_no`, `room_status`, `price`) VALUES
(10, 4, 4, 100, 'Available', 1000),
(11, 4, 4, 101, 'Available', 1000),
(12, 4, 4, 102, 'Available', 1000),
(13, 4, 4, 103, 'Available', 1000),
(14, 4, 4, 104, 'Available', 1000),
(15, 4, 4, 105, 'Available', 1000),
(16, 4, 5, 200, 'Available', 2000),
(17, 4, 5, 201, 'Available', 2000),
(18, 4, 5, 202, 'Available', 2000),
(19, 4, 5, 203, 'Available', 2000),
(20, 5, 6, 300, 'Available', 3000),
(21, 5, 6, 301, 'Available', 3000),
(22, 6, 4, 120, 'Available', 900),
(23, 6, 4, 121, 'Available', 900),
(24, 6, 4, 122, 'Available', 900),
(25, 6, 4, 123, 'Available', 900),
(26, 6, 4, 124, 'Available', 900),
(27, 6, 4, 125, 'Available', 900),
(28, 6, 4, 126, 'Available', 900),
(29, 6, 4, 127, 'Available', 900),
(30, 6, 4, 128, 'Available', 900),
(31, 6, 4, 129, 'Available', 900),
(32, 6, 4, 130, 'Available', 900);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type_name`) VALUES
(4, 'Standard'),
(5, 'Deluxe'),
(6, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `staff_detail`
--

CREATE TABLE `staff_detail` (
  `staff_id` int(11) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_detail`
--

INSERT INTO `staff_detail` (`staff_id`, `gender`, `address`, `user_id`) VALUES
(4, 'Male', 'staff1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `staff_id`, `payment_type`, `payment_status`, `total_cost`, `pay_date`) VALUES
(12, 4, 'Cash', 'paid', 7000, '2021-11-21'),
(13, NULL, 'Cash', NULL, 3000, NULL),
(14, NULL, 'Cash', NULL, 2000, NULL),
(15, NULL, 'Cash', NULL, 3000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `position`, `username`, `password`) VALUES
(1, 'guest1', 'guest1', 'guest1', '45345453', 'Guest', 'guest1', 'guest1'),
(2, 'staff1', 'staff1', 'staff1', '543', 'Staff', 'staff1', 'staff1'),
(3, 'guest2', 'guest2', 'guest2', '425', 'Guest', 'guest2', 'guest2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `guest_id` (`guest_id`,`room_id`,`hotel_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `guest_detail`
--
ALTER TABLE `guest_detail`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `id` (`user_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `hotel_id` (`hotel_id`,`room_type_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `staff_detail`
--
ALTER TABLE `staff_detail`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `id` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `guest_detail`
--
ALTER TABLE `guest_detail`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_detail`
--
ALTER TABLE `staff_detail`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest_detail` (`guest_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`);

--
-- Constraints for table `guest_detail`
--
ALTER TABLE `guest_detail`
  ADD CONSTRAINT `guest_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD CONSTRAINT `hotel_room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`),
  ADD CONSTRAINT `hotel_room_ibfk_2` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `staff_detail`
--
ALTER TABLE `staff_detail`
  ADD CONSTRAINT `staff_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_detail` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
