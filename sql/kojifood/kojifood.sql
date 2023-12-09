-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2023 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kojifood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', 'dad3a37aa9d50688b5157698acfd7aee', 'admin@gmail.com', '', '2023-07-31 08:51:04'),
(9, 'ninzy', 'e10adc3949ba59abbe56e057f20f883e', 'ninbook0708@gmail.com', 'QFE6ZM', '2023-04-03 02:35:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slogan` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(11, 48, 'Bonefish', 'Ba lạng cá rô phi tươi tẩm gia vị nhẹ\n', 30000.00, '5ad7582e2ec9c.jpg'),
(12, 48, 'Hard Rock Cafe', 'Hỗn hợp xà lách cắt nhỏ, phô mai vụn, gà viên', 20000.00, '5ad7590d9702b.jpg'),
(13, 49, 'Uno Pizzeria & Grill', 'Trẻ em có thể chọn hình dạng mì ống, loại nước sốt, loại rau yêu thích', 30000.00, '5ad7597aa0479.jpg'),
(14, 50, 'Red Robins Chick on a Stick', 'Ức gà nướng truyền thống\n', 30000.00, '5ad759e1546fc.jpg'),
(15, 51, 'Lyfe Kitchens Tofu Taco', 'Vegetarian and vegan choices', 20000.00, '5ad75a1869e93.jpg'),
(16, 52, 'Houlihans Mini Cheeseburger', 'Thịt bò hảo hạng', 30000.00, '5ad75a5dbb329.jpg'),
(17, 53, 'Noudle Soup', 'Great taste', 20000.00, '5ad79fcf59e66.jpg'),
(24, 50, 'Cơm trộn', 'Cơm ngon lắm, có thịt bò, rau chua,...', 25000.00, '65683e185af10.jpg'),
(25, 48, 'Cá chiên', 'Cá chiên giòn, thơm ngon,...', 25000.00, '65683fe5bb16d.jpg'),
(26, 49, 'Cá thu', 'Cá thu chiên thơm chua ngọt', 25000.00, '65684368cfb91.jpg'),
(27, 48, 'Cá hồi nướng', 'Cá hồi bổ sung nhiều protein và chất đạm', 30000.00, '656843a91e45b.jpg'),
(28, 51, 'Cá nướng', 'Nướng trộn với chanh muối', 25000.00, '656843e191189.jpg'),
(29, 48, 'bánh canh cua', 'bánh canh, thịt cua,...', 30000.00, '6568521336a9e.jpg'),
(30, 48, 'Bánh canh giò heo', 'Bánh canh, thịt heo, giò heo, rau thơm,...', 30000.00, '6568526365929.jpg'),
(31, 48, 'Bún bò Huế', 'Bún, thịt bò gân, tái, rau thơm,...', 30000.00, '656852b058143.jpg'),
(32, 49, 'Bò né', 'Thịt bò, trứng, pate, rau,...', 35000.00, '65685429c598c.jpg'),
(33, 49, 'Bò kho', 'Thịt bò, rau thơm, bánh mì', 30000.00, '6568554e2771b.jpg'),
(34, 49, 'Bò lá lót', 'Thịt bò, lá lót, nước tương,...', 35000.00, '65685683b086c.jpg'),
(35, 50, 'Bún thịt nướng', 'Bún, thịt heo nướng, trứng,... ', 30000.00, '656857ac3bfb8.jpg'),
(36, 49, 'Cá đút lò', 'Cá diêu hồng, rau củ,...', 35000.00, '656858b7d433d.jpg'),
(37, 49, 'Cá chiên thập cẩm', 'Cá chiên giòn, thơm ngon, mời bạn ăn nhaaa', 25000.00, '6568590b93412.jpg'),
(38, 50, 'Cá kho tiêu', 'Cá kho, tiêu đen, chua ngọt, ngon lắm,....', 30000.00, '65685954dffde.jpg'),
(39, 49, 'Cá kho tộ', 'Cá kho tộ, đậm đà gia vị ', 30000.00, '656859a8045f6.jpg'),
(40, 50, 'Canh bí đao thịt bằm', 'Bí đao, thịt heo, canh ngon từ thịt, ngọt từ bí đao', 25000.00, '656859ec87f7c.jpg'),
(41, 50, 'Canh cà chua trứng', 'Cà chua, trứng, thơm ngon,...', 25000.00, '65685a322d981.jpg'),
(42, 51, 'Cánh gà chiên', 'Chiên với bột, ăn cũng được chứ không ngon lắm', 30000.00, '65685b107e6ee.jpg'),
(43, 51, 'Canh giò heo', 'Giò heo, thịt heo, rau, củ, quả, ...', 30000.00, '65685b61ed6bb.jpg'),
(44, 51, 'Canh rau dền', 'Rau dền, thịt băm, củ, quả,...', 25000.00, '65685b914e2e6.jpg'),
(45, 51, 'Cá thu kho', 'Cá thu, kho mặn, ...', 25000.00, '65685c2b6e0f2.jpg'),
(46, 51, 'Cháo gà', 'Cháo, thịt gà, hạt tiêu đen, ...', 25000.00, '65685c5db8ce0.jpg'),
(47, 51, 'Cháo lươn', 'Cháo, thịt lươn, ngon ngon', 30000.00, '65685cb5d88d3.jpg'),
(48, 52, 'Cháo thịt bằm', 'Cháo, thịt heo bằm, ...', 30000.00, '65685ce8c94c1.jpg'),
(49, 52, 'Gà luộc lá chanh', 'Thịt gà, lá chanh, ớt,...', 25000.00, '65685d2486dbc.jpg'),
(50, 52, 'Giò heo hầm', 'Thịt heo, hầm 5 tiếng, thịt mềm, ...', 35000.00, '65685d62519e1.jpg'),
(51, 52, 'Hủ tiếu xào', 'Hủ tiếu, thịt bò xào, thịt băm,...', 30000.00, '65685d918efbf.jpg'),
(52, 52, 'Mì Quảng Nam', 'Mì quảng, thịt gà, nhiều rau,...', 35000.00, '65685dc6ce54c.jpg'),
(53, 52, 'Ragu lưởi bò', 'Thịt bò hầm kiểu Ragu, rau củ,...', 35000.00, '65685dff5400a.jpg'),
(54, 53, 'Sường heo chiên nước mắm', 'Thịt sường heo, nước mắm, ', 35000.00, '65685e384dd0e.jpg'),
(55, 53, 'Sườn nướng', 'Thịt sườn nướng, thịt heo,...', 25000.00, '65685e6b0017c.jpg'),
(56, 53, 'Tàu hủ sã ớt', 'Tàu hủ chiên, ớt chiên, sã,...', 30000.00, '65685e9dae16f.jpg'),
(57, 53, 'Trứng lòng đào', 'Trứng luộc chưa chín hết', 5000.00, '65685ec94cac8.jpg'),
(58, 53, 'Xúc xích nướng', 'Xúc xích', 10000.00, '65685ef0a3fa9.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remark` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(62, 32, 'in process', 'hi', '2023-03-03 17:35:52'),
(63, 32, 'closed', 'cc', '2023-03-03 17:36:46'),
(64, 32, 'in process', 'fff', '2023-03-03 18:01:37'),
(65, 32, 'closed', 'hi', '2023-03-03 18:08:55'),
(66, 34, 'in process', 'on a way', '2023-03-03 18:56:32'),
(71, 39, 'closed', 'Giao rồi nha cậu', '2023-04-03 03:30:12'),
(72, 39, 'rejected', 'Ui zoi oi', '2023-04-03 03:35:33'),
(73, 39, 'closed', 'Oke ', '2023-04-03 03:36:44'),
(74, 40, 'in process', 'x', '2023-07-31 08:52:02'),
(75, 43, 'rejected', 'z', '2023-07-31 08:52:25'),
(76, 43, 'closed', 'g', '2023-08-01 04:37:16'),
(77, 45, 'in process', 'd', '2023-08-01 04:37:34'),
(78, 46, 'rejected', 'j', '2023-08-01 04:37:52'),
(79, 61, 'in process', 'oke', '2023-08-01 05:28:03'),
(80, 60, 'closed', 'oke', '2023-08-01 05:28:21'),
(81, 65, 'closed', 'chuc ngon mieng\r\n', '2023-11-17 21:32:12'),
(82, 65, 'closed', 'rt', '2023-11-17 21:32:24'),
(83, 65, 'rejected', 'rre', '2023-11-17 21:32:50'),
(84, 66, 'closed', 'chuc ngon mieng', '2023-11-19 16:01:12'),
(85, 67, 'in process', 'cho chut nha', '2023-11-19 16:01:42'),
(86, 80, 'in process', 'cho một chút nhé\r\n', '2023-11-20 12:44:53'),
(87, 80, 'closed', 'chuc ngon mieng\r\n', '2023-11-20 13:09:42'),
(88, 87, 'closed', 'chuc ngon miệng', '2023-11-20 13:52:45'),
(89, 87, 'in process', '.', '2023-11-20 14:10:00'),
(90, 89, 'closed', 'â', '2023-11-20 14:29:48'),
(91, 89, 'in process', 'sg', '2023-11-20 14:53:01'),
(92, 91, 'closed', 'cam on', '2023-11-22 07:17:31'),
(93, 92, 'closed', 'cam on da su dung', '2023-11-28 05:35:52'),
(94, 93, 'closed', 'doi chut nhe\r\n', '2023-11-30 03:40:29'),
(95, 94, 'closed', 'jhj', '2023-11-30 03:50:00'),
(96, 97, 'closed', 'thank', '2023-11-30 06:46:17'),
(97, 101, 'closed', 'da giao', '2023-12-04 10:06:42'),
(98, 101, 'in process', 'cam on\r\n', '2023-12-06 06:55:29'),
(99, 101, 'in process', 'fadf', '2023-12-06 06:59:18'),
(100, 101, 'closed', 'eaf', '2023-12-06 06:59:30'),
(101, 101, 'in process', 'da', '2023-12-06 07:03:01'),
(102, 102, 'closed', 'èae', '2023-12-06 07:15:18'),
(103, 102, 'rejected', 'dadd', '2023-12-06 07:19:00'),
(104, 102, 'closed', 'sd', '2023-12-06 07:30:18'),
(105, 103, 'rejected', 'dầ', '2023-12-06 07:34:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `o_hr` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_hr` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `o_days` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(48, 5, 'Monday', 'HariBurger@gmail.com', ' 090412 64676', 'HariBurger.com', '7am', '4pm', 'mon-tue', '200 Cô Giang,P.Cô Giang, Q.1', '642a5036c300d.jpg', '2023-12-09 07:07:00'),
(49, 5, 'Tuesday', 'kwbab@gmail.com', '011 2677 9070', 'kwbab.com', '6am', '5pm', 'mon-fri', '100 Trần Phú, P.5, Q.10', '5ad7597aa0479.jpg', '2023-12-09 07:07:41'),
(50, 6, 'Wednesday', 'Indiantaste@gmail.com', '090410 35147', 'Indiantaste.com', '6am', '6pm', 'mon-sat', '200 Bùi Viện, P.Phạm ngũ lão, Q.1', '606d74c416da5.jpg', '2023-12-09 07:09:33'),
(51, 7, 'Thursday', 'martin@gmail.com', '3454345654', 'martin.com', '8am', '4pm', 'mon-thu', '219 Tôn Thất Thuyết,P.15,Q.4', '5ad75a1869e93.jpg', '2023-12-09 07:08:38'),
(52, 8, 'Friday', 'thanh@gmail.com', '2345434567', 'thanhchicken.com', '6am', '7pm', 'mon-fri', '400 Nguyễn Đính Chiễu,Quận 3', '5ad75a5dbb329.jpg', '2023-12-09 07:13:49'),
(53, 9, 'Saturday', 'kari@gmail.com', '4512545784', 'kari.com', '7am', '7pm', 'mon-sat', '20 Hồ Xuân Hương, Quận 3', '65685e9dae16f.jpg', '2023-12-09 07:14:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(5, 'grill.', '2023-03-08 15:56:04'),
(6, 'pizza.', '2023-03-08 15:55:52'),
(7, 'pasta.', '2023-03-08 15:55:44'),
(8, 'thaifood.', '2023-03-08 15:55:36'),
(9, 'fish.', '2023-03-08 15:55:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(22) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `gender` varchar(3) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`, `email`, `role`, `staff_name`, `gender`, `phone`) VALUES
(1, 'staff', 'e10adc3949ba59abbe56e057f20f883e', 'staff@gmail.com', 'nvpv', 'Phi Hùng', 'nam', '012345678'),
(2, 'chef', 'e10adc3949ba59abbe56e057f20f883e', 'chef@gmail.com', 'nvb', 'Phan Huy Phong', 'nam', '036523258');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(37, 'phonghuy', 'Phan', 'Huy Phong', 'phanhuyphong2@gmail.com', '011111121212', '25d55ad283aa400af464c76d713c07ad', 'Công nghiệp', 1, '2023-12-06 07:42:32'),
(40, 'hung', 'Phi', 'Hung', 'phong@gmail.com', '0368132250', '25d55ad283aa400af464c76d713c07ad', 'gò vấp', 1, '2023-12-06 08:37:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(39, 34, 'Hard Rock Cafe', 1, 20000.00, 'closed', '2023-04-03 03:36:44'),
(40, 34, 'Hard Rock Cafe', 1, 20000.00, 'in process', '2023-07-31 08:52:02'),
(43, 35, 'Bonefish', 2, 30000.00, 'closed', '2023-08-01 04:37:16'),
(44, 35, 'Hard Rock Cafe', 15, 20000.00, NULL, '2023-07-31 08:48:00'),
(45, 35, 'Bonefish', 2, 30000.00, 'in process', '2023-08-01 04:37:34'),
(47, 35, 'Uno Pizzeria & Grill', 1, 30000.00, NULL, '2023-07-31 08:49:00'),
(49, 35, 'Red Robins Chick on a Stick', 1, 30000.00, NULL, '2023-08-01 05:02:51'),
(50, 35, 'Red Robins Chick on a Stick', 1, 30000.00, NULL, '2023-08-01 05:04:05'),
(51, 35, 'Red Robins Chick on a Stick', 1, 30000.00, NULL, '2023-08-01 05:04:20'),
(52, 35, 'Red Robins Chick on a Stick', 1, 30000.00, NULL, '2023-08-01 05:05:32'),
(53, 35, 'Bonefish', 1, 30000.00, NULL, '2023-08-01 05:05:32'),
(61, 35, 'Hard Rock Cafe', 1, 20000.00, 'in process', '2023-08-01 05:28:03'),
(62, 35, 'Hard Rock Cafe', 1, 20000.00, NULL, '2023-08-01 07:02:46'),
(63, 35, 'Uno Pizzeria & Grill', 1, 30000.00, NULL, '2023-08-01 07:18:11'),
(92, 37, 'Bonefish', 1, 30000.00, 'closed', '2023-11-28 05:35:52'),
(93, 39, 'Bonefish', 1, 30000.00, 'closed', '2023-11-30 03:40:29'),
(102, 37, 'Cá chiên', 1, 25000.00, 'closed', '2023-12-09 07:41:17'),
(105, 40, 'Bonefish', 1, 30000.00, NULL, '2023-12-09 07:24:20'),
(107, 37, 'Cá thu', 1, 25000.00, NULL, '2023-12-09 07:41:53'),
(108, 37, 'Cá chiên', 1, 25000.00, NULL, '2023-12-09 07:42:09'),
(109, 37, 'Cá thu', 1, 25000.00, NULL, '2023-12-09 07:42:23'),
(110, 40, 'Cá nướng', 1, 25000.00, NULL, '2023-12-09 07:42:35'),
(111, 40, 'Cá nướng', 1, 25000.00, NULL, '2023-12-09 08:45:11'),
(112, 40, 'Bonefish', 1, 30000.00, NULL, '2023-12-09 08:45:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Chỉ mục cho bảng `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Chỉ mục cho bảng `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Chỉ mục cho bảng `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Chỉ mục cho bảng `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
