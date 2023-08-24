-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 02:21 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmme`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `photographer_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `event_id` text NOT NULL,
  `photographer_name` text NOT NULL,
  `photographer_address` text NOT NULL,
  `photographer_contact` text NOT NULL,
  `photographer_email` text NOT NULL,
  `customer_name` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_contact` text NOT NULL,
  `customer_email` text NOT NULL,
  `event_name` text NOT NULL,
  `event_date` text NOT NULL,
  `event_loc` text NOT NULL,
  `event_price` float(10,2) NOT NULL,
  `status_date` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `contact_number` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customertophotographermsg`
--

CREATE TABLE `customertophotographermsg` (
  `msg_id` int(11) NOT NULL,
  `photographer_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `photographer_name` text NOT NULL,
  `customer_name` text NOT NULL,
  `customer_contact` text NOT NULL,
  `customer_email` text NOT NULL,
  `customer_address` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `photographer_id` text NOT NULL,
  `customer_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `residential_address` text NOT NULL,
  `email_address` text NOT NULL,
  `event_name` text NOT NULL,
  `event_date` text NOT NULL,
  `event_loc` text NOT NULL,
  `event_price` float(10,2) NOT NULL,
  `process_date` datetime NOT NULL,
  `status` text NOT NULL,
  `date_added` datetime NOT NULL,
  `notif_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gcash`
--

CREATE TABLE `gcash` (
  `gcash_id` int(11) NOT NULL,
  `gcash_account` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gcash`
--

INSERT INTO `gcash` (`gcash_id`, `gcash_account`) VALUES
(1, '09xxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `photographer_id` text NOT NULL,
  `event_id` text NOT NULL,
  `amount` float(10,2) NOT NULL,
  `date_paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `customer_id`, `photographer_id`, `event_id`, `amount`, `date_paid`) VALUES
(1, '2', '3', '1', 1000.00, '2021-07-23 20:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `photographerandcustomermsgtoadmin`
--

CREATE TABLE `photographerandcustomermsgtoadmin` (
  `msg_id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `admin_id` text NOT NULL,
  `photographer_id` text NOT NULL,
  `full_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `email_address` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` text NOT NULL,
  `status` text NOT NULL,
  `user_type` text NOT NULL,
  `notif_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photographertocustomermsg`
--

CREATE TABLE `photographertocustomermsg` (
  `msg_id` int(11) NOT NULL,
  `photographer_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `customer_name` text NOT NULL,
  `photographer_name` text NOT NULL,
  `photographer_contact` text NOT NULL,
  `photographer_email` text NOT NULL,
  `photographer_address` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `event_price` text NOT NULL,
  `tax_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `event_price`, `tax_price`) VALUES
(1, '5000', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `age` text NOT NULL,
  `birthday` text NOT NULL,
  `gender` text NOT NULL,
  `email_address` text NOT NULL,
  `contact_number` text NOT NULL,
  `residential_address` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `date_registered` datetime NOT NULL,
  `status` text NOT NULL,
  `photo` text NOT NULL,
  `sample1` text NOT NULL,
  `sample2` text NOT NULL,
  `sample3` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `mname`, `lname`, `age`, `birthday`, `gender`, `email_address`, `contact_number`, `residential_address`, `username`, `password`, `date_registered`, `status`, `photo`, `sample1`, `sample2`, `sample3`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', '', '', '', 'systemadmin', 'f19826e36a24ce639a7036c19b33f97d', '0000-00-00 00:00:00', '', '', '', '', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customertophotographermsg`
--
ALTER TABLE `customertophotographermsg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gcash`
--
ALTER TABLE `gcash`
  ADD PRIMARY KEY (`gcash_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `photographerandcustomermsgtoadmin`
--
ALTER TABLE `photographerandcustomermsgtoadmin`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `photographertocustomermsg`
--
ALTER TABLE `photographertocustomermsg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customertophotographermsg`
--
ALTER TABLE `customertophotographermsg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gcash`
--
ALTER TABLE `gcash`
  MODIFY `gcash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `photographerandcustomermsgtoadmin`
--
ALTER TABLE `photographerandcustomermsgtoadmin`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photographertocustomermsg`
--
ALTER TABLE `photographertocustomermsg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
