-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 10:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fz`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Num` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `DateOfRegistration` date NOT NULL,
  `PaymentPlan` enum('Gym','Spa','Gym & Spa') NOT NULL,
  `Expiration` date NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Fname`, `Lname`, `Num`, `email`, `DateOfRegistration`, `PaymentPlan`, `Expiration`, `UserName`, `Pass`) VALUES
(1, 'John', 'Doe', '1234567890', 'johndoe@example.com', '2024-05-12', 'Gym', '2025-05-12', 'johndoe', 'password123'),
(2, 'Jane', 'Smith', '9876543210', 'janesmith@example.com', '2024-05-12', 'Spa', '2025-05-12', 'janesmith', 'pass123'),
(3, 'Michael', 'Johnson', '5551234567', 'michaeljohnson@example.com', '2024-05-03', 'Gym & Spa', '2024-10-15', 'michaelj', 'securepass'),
(4, 'Emily', 'Brown', '7890123456', 'emilybrown@example.com', '2024-05-04', 'Gym', '2024-09-20', 'emilyb', 'p@ssword'),
(5, 'David', 'Wilson', '2345678901', 'davidwilson@example.com', '2024-05-05', 'Spa', '2024-12-31', 'dwilson', 'welcome123'),
(6, 'Sarah', 'Anderson', '8765432109', 'sarahanderson@example.com', '2024-05-06', 'Gym & Spa', '2024-08-15', 'sarah_and', 'password!'),
(7, 'Chris', 'Lee', '3216549870', 'chrislee@example.com', '2024-05-07', 'Gym', '2024-10-01', 'chris_lee', 'abc123'),
(8, 'Amy', 'Martin', '9998887776', 'amymartin@example.com', '2024-05-08', 'Spa', '2024-11-10', 'amym', 'mysecretpass'),
(9, 'Ryan', 'Clark', '4445556667', 'ryanclark@example.com', '2024-05-09', 'Gym', '2024-09-30', 'ryan_c', 'password1234'),
(10, 'Jessica', 'Taylor', '1112223333', 'jessicataylor@example.com', '2024-05-10', 'Spa', '2024-10-05', 'jtaylor', 'letmein');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
