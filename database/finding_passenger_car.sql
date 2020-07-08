-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 08, 2020 lúc 07:17 PM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `finding_passenger_car`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `license_plates` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `car`
--

INSERT INTO `car` (`id`, `type`, `photo_path`, `license_plates`, `capacity`, `user_id`) VALUES
(1, 'Xe toyota sienna trắng', 'assets/images/car/1.jpg', '29A - 12435', 4, 3),
(2, 'Xe Honda Civic abc', 'assets/images/car/0.15489800 1594049688.jpg', '29A - 321576', 4, 2),
(3, 'Xe Kia Sendona', 'assets/images/car/3.jpg', '29A - 757682', 4, 4),
(4, 'Xe Honda CR-V', 'assets/images/car/4.jpg', '29A - 341634', 4, 6),
(5, 'Xe Toyota Rush', 'assets/images/car/5.jpg', '29A - 53424', 7, 5),
(6, 'Xe Toyota Innova', 'assets/images/car/6.jpg', '29A - 242351', 4, 7),
(7, 'Xe Honda Civic abc', 'assets/images/car/0.76018100 1594050112.jpg', '29A - 321576', 4, 10),
(8, 'Xe Honda Civic abc', 'assets/images/car/0.58125600 1594055432.jpg', '29A - 321576', 4, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coach`
--

CREATE TABLE `coach` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `fixed_time` int(11) DEFAULT NULL,
  `starting_province_city_id` int(11) NOT NULL,
  `specific_starting_location` varchar(255) NOT NULL,
  `end_province_city_id` int(11) NOT NULL,
  `specific_end_location` varchar(255) NOT NULL,
  `route` text,
  `number_current_passenger` int(11) NOT NULL DEFAULT '0',
  `capacity` int(11) NOT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coach`
--

INSERT INTO `coach` (`id`, `name`, `photo_path`, `fixed_time`, `starting_province_city_id`, `specific_starting_location`, `end_province_city_id`, `specific_end_location`, `route`, `number_current_passenger`, `capacity`, `cost`, `status`, `organization_id`) VALUES
(1, 'Hải Phòng - Bx Gia Lâm', 'assets/images/coach/1.jpg', 0, 27, '602 Trường Chinh', 24, 'Bến xe Gia Lâm', 'Cầu Rào - Lạch Tray - Nguyễn Văn Linh - Kiến An - An Lão - Tiên Lãng - Quốc lộ 5B - Cầu Thanh Trì - Cầu vượt quốc lộ 5B - Công ty May 10 - Chân cầu Vĩnh Tuy - Big C Long Biên - Cầu Chui - Bến xe Gia Lâm', 15, 36, '100000', 0, 1),
(2, 'Bx Gia Lâm - Hải Phòng', 'assets/images/coach/1.jpg', 0, 24, 'Bến xe Gia Lâm', 27, '602 Trường Chinh', 'Cầu Chui - Big C Long Biên - Chân cầu Vĩnh Tuy - Công ty May 10 - Cầu vượt Quốc Lộ 5 - cầu Thanh Trì - Cao tốc 5B - Tiên Lãng - An Lão - Kiến An - Trần Nguyên Hãn - Nguyễn Văn Linh - Lạch Tray - Cầu Rào - Nội thành Hài Phòng - 602 Trường Chinh', 15, 36, '100000', 0, 1),
(3, 'Bx Yên Nghĩa - Hải Phòng', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe yên nghĩa', 27, '602 Trường Chinh', 'Bến xe Yên Nghĩa - Mỹ Đình - BigC - Cao tốc 5B - Tiên Lãng - An Lão - Kiến An - Trần Nguyên Hãn - Nguyễn Văn Linh - Lạch Tray - Cầu Rào - 602 Trường Chinh', 3, 39, '100000', 0, 1),
(4, 'Hải Phòng - Bx Yên  Nghĩa', 'assets/images/coach/1.jpg', NULL, 27, '602 Trường Chinh', 24, 'Bến xe Yên Nghĩa', '602 Trường Chinh - Cầu Rào - Lạch Tray - Nguyễn Văn Linh - Trần Nguyên Hãn - Kiến An - An Lão - Tiên Lãng - Cao tôc 5B - BigC Mỹ Đình - Bến xe Yên Nghĩa', 15, 39, '100000', 0, 1),
(5, 'Tiên Lãng - Bx Gia Lâm', 'assets/images/coach/1.jpg', NULL, 29, 'Tiên Lãng', 24, 'Bến xe Gia Lâm', 'Bưu điện Tiên Lãng - Cầu Mới - Ngã 3 Hòa Bình - Cầu Cựu - Cao tốc 5B - Cầu Thanh Trì - Cầu vượt quốc lộ 5 - Công ty May 10 - Chân cầu Vĩnh Tuy - BigC Long Biên - Cầu Chui - Bến xe Gia Lâm', 10, 39, '100000', 0, 1),
(6, 'Bx Gia Lâm - Tiên Lãng', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe Gia Lâm', 29, 'Tiên Lãng', 'Bến xe Gia Lâm -  Cầu Chui - Big C Long Biên - Chân cầu Vĩnh Tuy - Công ty May 10 - cầu vượt Quốc Lộ 5 - cầu Thanh Trì - Cao tốc 5B', 15, 39, '100000', 0, 1),
(7, 'Tiên Lãng - Bx Yên Nghĩa', 'assets/images/coach/1.jpg', NULL, 29, 'Tiên Lãng Hòa Bình', 24, 'Bến xe Yên Nghĩa', 'Vàm Láng - Tiên Lãng - Cầu Mới - Ngã 3 Hòa Bình - Cầu Cựu - Cao tốc 5B - Bến xe Yên Nghĩa', 15, 39, '100000', 0, 1),
(8, 'Bx Yên Nghĩa - Hòa Bình', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe Yên Nghĩa', 29, 'Tiên Lãng Hòa Bình', 'Bến xe Yên Nghĩa - Cao tốc 5B - Cầu Cựu - Ngã 3 Hòa Bình - Cầu Mới - Tiên Lãng - Vàm Láng', 15, 39, '100000', 0, 1),
(9, 'Vĩnh Bảo - Bx Gia Lâm', 'assets/images/coach/1.jpg', NULL, 27, 'Vĩnh Bảo, Cây xăng Hương Phát', 24, 'Bến xe Gia Lâm', 'Vĩnh Bảo - Cây xăng Hương Phát - An Hòa - Nhân Hòa - Tân Hòa - thị trấn Vĩnh bảo - ngã 3 Tân Liên - chợ Cầu - cầu Quý Cao - Ngã 3 Hòa Bình - Cầu Cựu - Cao tốc 5B - Cầu Thanh Trì - cầu vượt quốc lộ 5 - Công ty May 10 - Chân cầu Vĩnh Tuy - Big C Long Biên - Cầu Chui - Bến xe Gia Lâm', 15, 39, '100000', 0, 1),
(10, 'Bx Gia Lâm - Vĩnh Bảo', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe Gia Lâm', 27, 'Vĩnh Bảo', 'Bến xe Gia Lâm - Cầu Chui - Big C Long Biên - chân cầu Vĩnh Tuy - Công ty May 10 - cầu vượt Quốc Lộ 5 - cầu Thanh Trì -cao tốc 5B - Cầu Cựu - Ngã 3 Hòa Bình - Quý Cao - Chợ Cầu - Ngã 3 Tân Liên - Cầu Mục - Thị trấn Vĩnh Bảo - Tần Hòa - Nhân Hòa - An Hòa - Cây xăng Hương Phát - Vĩnh Bảo', 15, 39, '100000', 0, 1),
(11, 'Vĩnh Bảo - Bx Yên Nghĩa', 'assets/images/coach/1.jpg', NULL, 27, 'Vĩnh Bảo cây Xăng Hương Phát', 24, 'Bến xe Yên Nghĩa', 'Khu vực Vĩnh Bảo - cây xăng Hương Phát - An Hòa - Nhân Hòa - Tân Hòa, thị trấn Vĩnh bảo - ngã 3 Tân Liên - chợ Cầu - cầu Quý Cao, cao tốc 5b Hải Phòng Hà Nội - bến xe Yên Nghĩa', 10, 36, '100000', 0, 1),
(12, 'Bx Yên Nghĩa - Vĩnh Bảo', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe Yên Nghĩa', 27, 'Cây Xăng Hương Phát, Vĩnh Bảo', 'Bến Xe Yên Nghĩa - cao tôc 5b Hà Nộ Hải Phòng - Cầu Cựu - Cầu Quý Cao - chợ Cầu - ngã 3 Tân Liên - thị trấn Vĩnh Bảo - Tân Hòa - Tân Hòa - Nhân Hòa - An Hòa - Cây Xăng Hương Phát', 10, 36, '100000', 0, 1),
(13, 'Quý Cao - Bx Gia Lâm', 'assets/images/coach/1.jpg', NULL, 26, 'Quý Cao', 24, 'Bến xe Gia Lâm', 'Quý cao - Tứ Kỳ - Hải Tân - Gia Lộc - Cao tốc 5b - cầu Thanh Trì - cầu vượt quốc lộ 5 - công ty may10 - chân cầu Vĩnh Tuy - BigC Long Biên - Cầu chui - Bến xe Gia Lâm', 15, 36, '90000', 0, 1),
(14, 'Bx Gia Lâm - Quý Cao', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe Gia Lâm', 26, 'Quý Cao', 'Bến xe Gia Lâm - Cầu Chui - Big C Long Biên - chân cầu Vĩnh Tuy - Công ty May 10 - cầu vượt Quốc Lộ 5 - cầu Thanh Trì - cao tốc 5B - Gia Lộc - Hải Tân - Tứ Kỳ - Quý Cao', 10, 36, '90000', 0, 1),
(15, 'Quý Cao - Bx Yên Nghĩa', 'assets/images/coach/1.jpg', NULL, 26, 'Quý Cao', 24, 'Bến xe Yên Nghĩa', 'Quý Cao - Tứ Kỳ - Hải Tân - Gia Lộc - cao tốc 5B Hải Phòng Hà Nội - bến xe Yên Nghĩa', 13, 36, '90000', 0, 1),
(16, 'Bx Yên Nghĩa - Quý Cao', 'assets/images/coach/1.jpg', NULL, 24, 'Bến xe Yên Nghĩa', 26, 'Quý Cao', 'Bến xe Yên Nghĩa - Cao tốc Hà Nội Hải Phòng - Gia Lộc - Hải Tân - Tứ Kỳ - Quý Cao', 13, 32, '95000', 0, 1),
(17, 'Bx Thượng Lý - Bx Nước Ngầm', 'assets/images/coach/2.jpg', NULL, 27, 'Bến xe Thượng Lý', 24, 'Bến xe Nước Ngầm', 'BX. Thượng Lý - VP Quán Toan - VP An Lão - Cao tốc An Lão - Lĩnh Nam - BX. Nước Ngầm', 13, 39, '100000', 0, 2),
(18, 'Bx Nước Ngầm - Bx Thượng Lý', 'assets/images/coach/2.jpg', NULL, 24, 'Bến xe Nước Ngầm', 27, 'Bến xe Thượng Lý', 'BX. Nước Ngầm - Lĩnh Nam - Cao tốc An Lão - VP An Lão - VP Quán Toan - BX. Thượng Lý', 10, 39, '100000', 0, 2),
(19, 'Bx Cầu Rào - Bx Gia Lâm', 'assets/images/coach/2.jpg', NULL, 27, 'Bến xe Cầu Rào', 24, 'Bến xe Gia Lâm', 'BX. Cầu Rào – cầu Rào 1 – đường Phạm Văn Đồng – VP 608 Phạm Văn Đồng – Đường cao tốc 5B – BX. Gia Lâm.', 10, 36, '100000', 0, 2),
(20, 'Bx Gia Lâm - Bx Cầu Rào', 'assets/images/coach/2.jpg', NULL, 24, 'Bến xe Gia Lâm', 27, 'Bến xe Cầu Rào', 'Bến xe Gia Lầm - Cao tốc 5B - VP 608 Phạm Văn Đồng - đường Phạm Văn Đồng - cầu Rào 1 - BX. Cầu Rào ', 10, 39, '100000', 0, 2),
(21, 'Bx Niệm Nghĩa - Bx Gia Lâm', 'assets/images/coach/2.jpg', NULL, 27, 'Bến xe Niệm Nghĩa', 24, 'Bến xe Gia Lâm', 'BX. Niệm Nghĩa – Cầu Rào II – đường Phạm Văn Đồng – VP 608 Phạm Văn Đồng – Đường cao tốc 353 – BX. Gia Lâm.', 23, 39, '100000', 0, 2),
(22, 'Bx Gia Lâm - Bx Niệm Nghĩa', 'assets/images/coach/2.jpg', NULL, 24, 'Bến xe Gia Lâm', 27, 'Bến xe Niệm Nghĩa', 'BX. Gia Lâm - Đường cao tốc 353 – VP 608 Phạm Văn Đồng – đường Phạm Văn Đồng – Cầu Rào II –  BX. Niệm Nghĩa', 23, 39, '100000', 0, 2),
(23, 'Bx Thượng Lý - Bx Gia Lâm', 'assets/images/coach/2.jpg', NULL, 27, 'Bến xe Thượng Lý', 24, 'Bến xe Gia Lâm', 'BX. Thượng Lý – VP Quán Toan – Quốc lộ 10 – VP An Lão – Nút cao tốc An Lão – Nút cao tốc Thanh Trì – BX. Gia Lâm.', 13, 39, '95000', 0, 2),
(24, 'Bx Gia Lâm - Bx Thượng Lý', 'assets/images/coach/2.jpg', NULL, 24, 'Bến xe Gia Lâm', 27, 'Bến xe Thượng Lý', 'BX. Gia Lâm  – Nút cao tốc Thanh Trì –  Nút cao tốc An Lão - VP An Lão – Quốc lộ 10 - VP Quán Toan –  BX. Thượng Lý', 13, 39, '95000', 0, 2),
(25, 'Bx Cầu Rào - Bx Nam Định', 'assets/images/coach/2.jpg', NULL, 27, 'Bến xe Cầu Rào', 39, 'Bến xe Nam Định', 'BX. Cầu Rào – Đường Phạm Văn Đồng – VP 608 – cao tốc An Lão – BX. Vĩnh Bảo – Quán Cháy - Ngã 3 Đường Mới – Vũ Hạ – Cầu Vật – Ba Đợi – Cầu Nguyễn – Đống Năm – Gia Lễ – Chợ đầu mối – BX. Thái Bình – Cầu Thẫm – BX. Nam Định.', 23, 39, '80000', 0, 2),
(26, 'Bx Nam Định - Bx Cầu Rào', 'assets/images/coach/2.jpg', NULL, 39, 'Bến xe Nam Định', 27, 'Bến xe Cầu Rào', 'BX. Nam Định  – Cầu Thẫm – BX. Thái Bình  – Chợ đầu mối – Gia Lễ - Đống Năm – Cầu Nguyễn – Ba Đợi – Cầu Vật – Vũ Hạ – Ngã 3 Đường Mới – Quán Cháy - BX. Vĩnh Bảo – cao tốc An Lão – VP 608 – Đường Phạm Văn Đồng –  BX. Cầu Rào ', 26, 39, '80000', 0, 2),
(27, 'Bx Thái Bình - Bx Gia Lâm', 'assets/images/coach/2.jpg', NULL, 53, 'Bến xe Thái Bình', 24, 'Bến xe Gia Lâm', 'BX. Thái Bình – Đường 10 – Vĩnh Bảo – Cao tốc 5B – BX. Gia Lâm', 23, 39, '100000', 0, 2),
(28, 'Bx Gia Lâm -  Bx Thái Bình', 'assets/images/coach/2.jpg', NULL, 24, 'Bến xe Gia Lâm', 53, 'Bến xe Thái Bình', 'Bến xe Gia Lâm - Cao tốc 5b - Đường 10 - Bến xe Thái Bình', 17, 39, '100000', 0, 2),
(29, 'Bx Thái Bình - 5a - Bx Gia Lâm', 'assets/images/coach/2.jpg', NULL, 53, 'Bến xe Thái Bình', 24, 'Bến xe Gia Lâm', 'BX. Thái Bình – TP.Thái Bình – Đường 10 – Quý Cao – Tứ Kỳ – Hải Dương – Quốc lộ 5 – BX. Gia Lâm.', 34, 39, '85000', 0, 2),
(30, 'Bx Gia Lâm - Bx Thái Bình', 'assets/images/coach/2.jpg', NULL, 24, 'Bến xe Gia Lâm', 53, 'Bến xe Thái Bình', 'Bến xe Gia Lâm - Quốc lộ 5 - Hải Dương - Tứ Kỳ - Quý Cao - Đường 10 - TP. Thái Bình - Bến xe Thái Bình', 28, 39, '85000', 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `combine`
--

CREATE TABLE `combine` (
  `id` int(11) NOT NULL,
  `driver_schedule_id` int(11) NOT NULL,
  `user_schedule_id` int(11) NOT NULL,
  `note` text,
  `status` int(11) NOT NULL,
  `departure_time` datetime NOT NULL,
  `requester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `name`, `province_city_id`) VALUES
(1, 'Bình Giang', 26),
(2, 'Cẩm Giàng', 26),
(3, 'Chí Linh', 26),
(4, 'Gia Lộc', 26),
(5, 'TP Hải Dương', 26),
(6, 'Kim Thành', 26),
(7, 'Kinh Môn', 26),
(8, 'Nam Sách', 26),
(9, 'Ninh Giang', 26),
(10, 'Thanh Hà', 26),
(11, 'Thanh Miện', 26),
(12, 'Tứ Kỳ', 26),
(13, 'Ba Đình', 24),
(14, 'Ba Vì', 24),
(15, 'Bắc Từ Liêm', 24),
(16, 'Cầu Giấy', 24),
(17, 'Chương Mỹ', 24),
(18, 'Đan Phượng', 24),
(19, 'Đông Anh', 24),
(20, 'Đống Đa', 24),
(21, 'Gia Lâm', 24),
(22, 'Hà Đông', 24),
(23, 'Hai Bà Trưng', 24),
(24, 'Hoài Đức', 24),
(25, 'Hoàn Kiếm', 24),
(26, 'Hoàng Mai', 24),
(27, 'Long Biên', 24),
(28, 'Mê Linh', 24),
(29, 'Mỹ Đức', 24),
(30, 'Nam Từ Liêm', 24),
(31, 'Phú Xuyên', 24),
(32, 'Phúc Thọ', 24),
(33, 'Quốc Oai', 24),
(34, 'Sóc Sơn', 24),
(35, 'Sơn Tây', 24),
(36, 'Tây Hồ', 24),
(37, 'Thạch Thất', 24),
(38, 'Thanh Oai', 24),
(39, 'Thanh Trì', 24),
(40, 'Thanh Xuân', 24),
(41, 'Thường Tín', 24),
(42, 'Ứng Hòa', 24),
(43, 'Đông Hưng', 53),
(44, 'Hưng Hà', 53),
(45, 'Kiến Xương', 53),
(46, 'Quỳnh Phụ', 53),
(47, 'TP Thái Bình', 53),
(48, 'Thái Thụy', 53),
(49, 'Tiền Hải', 53),
(50, 'Vũ Thư', 53);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `driver_schedule`
--

CREATE TABLE `driver_schedule` (
  `id` int(11) NOT NULL,
  `starting_district_id` int(11) NOT NULL,
  `starting_province_city_id` int(11) NOT NULL,
  `route_point` varchar(255) NOT NULL,
  `end_district_id` int(11) NOT NULL,
  `end_province_city_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `car_id` int(11) NOT NULL,
  `cost` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `extended_image`
--

CREATE TABLE `extended_image` (
  `id` int(11) NOT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `extended_image`
--

INSERT INTO `extended_image` (`id`, `coach_id`, `car_id`, `image_path`) VALUES
(1, 1, NULL, 'assets/images/coach/1_1.png'),
(2, 1, NULL, 'assets/images/coach/1_2.jpg'),
(3, 1, NULL, 'assets/images/coach/1_3.jpg'),
(4, 2, NULL, 'assets/images/coach/1_1.png'),
(5, 2, NULL, 'assets/images/coach/1_2.jpg'),
(6, 2, NULL, 'assets/images/coach/1_3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `follow`
--

INSERT INTO `follow` (`id`, `user_id`, `coach_id`) VALUES
(10, 7, 1),
(11, 3, 1),
(20, 2, 2),
(21, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `readed` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `content`, `readed`, `created_at`) VALUES
(3, 2, 'Bạn nhận được một yêu cầu kết nối cho chuyến đi Hải Dương đến Hà Nội từ tài xế Nguyễn Hoàng Hiệp', 1, '2020-07-05 17:22:20'),
(4, 2, 'Bạn nhận được một yêu cầu kết nối cho chuyến đi Hải Dương đến Hà Nội từ tài xế Nguyễn Hoàng Hiệp', 1, '2020-07-05 18:05:42'),
(5, 3, 'Yêu cầu kết nối hành khách cho chuyến đi Hải Dương đến Hà Nội với hành khách Nguyễn Huy Quang đã bị từ chối', 0, '2020-07-05 18:07:03'),
(6, 1, 'Bạn nhận được một yêu cầu đặt xe cho chuyến đi Hải Dương đến Hà Nội từ hành khách Nguyễn Huy Quang', 0, '2020-07-05 18:13:09'),
(7, 2, 'Yêu cầu kết nối với tài xế cho chuyến đi Hải Dương đến Hà Nội với tài xế Nguyễn Hoàng Hiệp đã đươc chấp thuận', 1, '2020-07-05 20:43:03'),
(8, 2, 'Chuyến đi Hải Dương đến Hà Nội với tài xế Nguyễn Hoàng Hiệp đã bị hủy bỏ', 1, '2020-07-05 21:11:37'),
(9, 2, 'abc', 1, '2020-07-08 23:55:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `hotline` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `organization`
--

INSERT INTO `organization` (`id`, `name`, `owner_id`, `hotline`, `logo`, `cover_image`, `email`, `address`) VALUES
(1, 'Ôhô', 2, '1900.066.646', 'assets/images/organization/logo/0.92755300 1594112071.png', 'assets/images/organization/cover/0.45732700 1594112139.jpg', 'info@oho.vn', 'Số 602 + 604 Trường Chinh, Kiến An, Hải Phòng'),
(2, 'Hải Âu', 3, '02253.717717', 'assets/images/organization/logo/2.jpg', 'assets/images/organization/cover/2.jpg', 'cskh@haiaubus.vn', 'Số 16 Tôn Đức Thắng, Hải Phòng'),
(3, 'Mai Linh', 4, ' 08. 35 117 888', 'assets/images/organization/logo/3.png', 'assets/images/organization/cover/3.jpg', 'pkd@mailinhexpress.vn', '349 Lê Hồng Phong, phường 2, quận 10, TP.HCM'),
(4, 'Hoàng Long', 5, '0313 920920', 'assets/images/organization/logo/4.jpg', 'assets/images/organization/cover/4.jpg', ' info@hoanglongasia.com', 'Số 05 Phạm Ngũ Lão - Q.Ngô Quyền - TP. Hải Phòng'),
(5, 'Sao Việt', 6, '0983.63.38.38', 'assets/images/organization/logo/5.png', 'assets/images/organization/cover/5.jpg', 'xesaoviet@gmail.com', ' 63 Ngõ 636 Trương Định – Hoàng Mai – Hà Nội'),
(6, 'Văn Minh', 7, '02253.717718', 'assets/images/organization/logo/6.jpg', 'assets/images/organization/cover/6.jpg', 'vanminh76.vn', 'Số 101 Lý Thường Kiệt, Tp. Vinh, Nghệ An'),
(7, 'Xe abc', 12, '0964016666', 'assets/images/organization/logo/0.66827800 1594117703.png', 'assets/images/organization/cover/0.66966100 1594117703.jpg', 'xeabc@gmail.com', '1395 Giải Phóng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province_city`
--

CREATE TABLE `province_city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `province_city`
--

INSERT INTO `province_city` (`id`, `name`) VALUES
(1, 'An Giang'),
(2, 'Bà Rịa – Vũng Tàu'),
(3, 'Bắc Giang'),
(4, 'Bắc Kạn'),
(5, 'Bạc Liêu'),
(6, 'Bắc Ninh'),
(7, 'Bến Tre'),
(8, 'Bình Định'),
(9, 'Bình Dương'),
(10, 'Bình Phước'),
(11, 'Bình Thuận'),
(12, 'Cà Mau'),
(13, 'Cần Thơ'),
(14, 'Cao Bằng'),
(15, 'Đà Nẵng'),
(16, 'Đắk Lắk'),
(17, 'Đắk Nông'),
(18, 'Điện Biên'),
(19, 'Đồng Nai'),
(20, 'Đồng Tháp'),
(21, 'Gia Lai'),
(22, 'Hà Giang'),
(23, 'Hà Nam'),
(24, 'Hà Nội'),
(25, 'Hà Tĩnh'),
(26, 'Hải Dương'),
(27, 'Hải Phòng'),
(28, 'Hậu Giang'),
(29, 'Hòa Bình'),
(30, 'Hưng Yên'),
(31, 'Khánh Hòa'),
(32, 'Kiên Giang'),
(33, 'Kon Tum'),
(34, 'Lai Châu'),
(35, 'Lâm Đồng'),
(36, 'Lạng Sơn'),
(37, 'Lào Cai'),
(38, 'Long An'),
(39, 'Nam Định'),
(40, 'Nghệ An'),
(41, 'Ninh Bình'),
(42, 'Ninh Thuận'),
(43, 'Phú Thọ'),
(44, 'Phú Yên'),
(45, 'Quảng Bình'),
(46, 'Quảng Nam'),
(47, 'Quảng Ngãi'),
(48, 'Quảng Ninh'),
(49, 'Quảng Trị'),
(50, 'Sóc Trăng'),
(51, 'Sơn La'),
(52, 'Tây Ninh'),
(53, 'Thái Bình'),
(54, 'Thái Nguyên'),
(55, 'Thanh Hóa'),
(56, 'Thừa Thiên Huế'),
(57, 'Tiền Giang'),
(58, 'TP Hồ Chí Minh'),
(59, 'Trà Vinh'),
(60, 'Tuyên Quang'),
(61, 'Vĩnh Long'),
(62, 'Vĩnh Phúc'),
(63, 'Yên Bái');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `coach_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `star` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `comment`, `coach_id`, `car_id`, `star`, `created_at`) VALUES
(1, 3, 'Xe chạy cao tốc mất ít thời gian. Dịch vụ tốt, nhân viên thân thiện!', 1, NULL, 5, '2020-05-24 09:56:10'),
(2, 2, 'Dịch vụ tốt, giá thành hợp lý.', 1, NULL, 4, '2020-05-24 09:58:07'),
(3, 3, 'Chất lượng vệ sinh chưa tốt, điều hòa không điều chỉnh được', 1, NULL, 4, '2020-05-24 09:59:51'),
(4, 7, 'Chất lượng dịch vụ vô cùng tốt', 1, NULL, 5, '2020-06-07 18:22:25'),
(5, 2, 'Tài xế chu đáo. Chất lượng phục vụ tốt', NULL, 3, 5, '2020-07-07 00:13:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `started_time` time NOT NULL,
  `coach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `timer`
--

INSERT INTO `timer` (`id`, `started_time`, `coach_id`) VALUES
(1, '04:20:00', 1),
(2, '04:50:00', 1),
(3, '05:50:00', 1),
(4, '06:20:00', 1),
(5, '06:50:00', 1),
(6, '07:20:00', 1),
(7, '07:50:00', 1),
(8, '08:20:00', 1),
(9, '08:50:00', 1),
(10, '09:20:00', 1),
(11, '09:50:00', 1),
(12, '10:50:00', 1),
(13, '11:50:00', 1),
(14, '12:50:00', 1),
(15, '13:20:00', 1),
(16, '13:50:00', 1),
(17, '14:20:00', 1),
(18, '14:50:00', 1),
(19, '15:20:00', 1),
(20, '15:50:00', 1),
(21, '16:20:00', 1),
(22, '16:50:00', 1),
(23, '17:50:00', 1),
(24, '06:10:00', 2),
(27, '06:10:00', 2),
(28, '06:10:00', 2),
(29, '06:10:00', 2),
(30, '06:10:00', 2),
(31, '06:10:00', 2),
(32, '07:10:00', 2),
(33, '07:10:00', 2),
(34, '07:40:00', 2),
(35, '08:10:00', 2),
(36, '08:40:00', 2),
(37, '09:10:00', 2),
(38, '09:40:00', 2),
(39, '10:10:00', 2),
(40, '11:10:00', 2),
(41, '12:10:00', 2),
(42, '13:10:00', 2),
(43, '13:40:00', 2),
(44, '14:40:00', 2),
(45, '15:10:00', 2),
(46, '15:40:00', 2),
(47, '16:10:00', 2),
(48, '16:40:00', 2),
(49, '17:10:00', 2),
(50, '17:40:00', 2),
(51, '18:10:00', 2),
(52, '18:40:00', 2),
(53, '19:20:00', 2),
(54, '06:40:00', 3),
(55, '06:40:00', 3),
(56, '07:15:00', 3),
(57, '08:00:00', 3),
(58, '08:40:00', 3),
(59, '09:15:00', 3),
(60, '10:15:00', 3),
(61, '11:15:00', 3),
(62, '12:15:00', 3),
(63, '13:15:00', 3),
(64, '14:15:00', 3),
(65, '15:15:00', 3),
(66, '16:15:00', 3),
(67, '17:00:00', 3),
(68, '17:15:00', 3),
(69, '18:15:00', 3),
(70, '04:35:00', 4),
(71, '04:35:00', 4),
(72, '05:35:00', 4),
(73, '06:35:00', 4),
(74, '07:35:00', 4),
(75, '08:35:00', 4),
(76, '09:35:00', 4),
(77, '10:35:00', 4),
(78, '11:35:00', 4),
(79, '12:35:00', 4),
(80, '13:35:00', 4),
(81, '14:35:00', 4),
(82, '15:35:00', 4),
(83, '16:35:00', 4),
(84, '05:15:00', 5),
(85, '05:15:00', 5),
(86, '06:50:00', 5),
(87, '07:50:00', 5),
(88, '08:50:00', 5),
(89, '09:50:00', 5),
(90, '10:50:00', 5),
(91, '11:50:00', 5),
(92, '12:50:00', 5),
(93, '13:50:00', 5),
(94, '14:50:00', 5),
(95, '15:50:00', 5),
(96, '16:50:00', 5),
(97, '17:50:00', 5),
(98, '06:10:00', 6),
(99, '06:10:00', 6),
(100, '07:10:00', 6),
(101, '07:40:00', 6),
(102, '08:10:00', 6),
(103, '08:40:00', 6),
(104, '09:10:00', 6),
(105, '09:40:00', 6),
(106, '10:10:00', 6),
(107, '11:10:00', 6),
(108, '11:50:00', 6),
(109, '12:40:00', 6),
(110, '13:10:00', 6),
(111, '13:40:00', 6),
(112, '14:10:00', 6),
(113, '14:40:00', 6),
(114, '15:10:00', 6),
(115, '15:40:00', 6),
(116, '16:10:00', 6),
(117, '17:10:00', 6),
(118, '17:40:00', 6),
(119, '18:10:00', 6),
(120, '18:40:00', 6),
(121, '19:10:00', 6),
(122, '19:40:00', 6),
(123, '05:15:00', 7),
(124, '06:50:00', 7),
(125, '07:50:00', 7),
(126, '08:50:00', 7),
(127, '09:50:00', 7),
(128, '10:50:00', 7),
(129, '11:50:00', 7),
(130, '12:50:00', 7),
(131, '13:50:00', 7),
(132, '14:50:00', 7),
(133, '15:50:00', 7),
(134, '16:50:00', 7),
(135, '17:50:00', 7),
(136, '05:25:00', 8),
(137, '06:20:00', 8),
(138, '07:10:00', 8),
(139, '07:35:00', 8),
(140, '08:15:00', 8),
(141, '08:40:00', 8),
(142, '09:00:00', 8),
(143, '09:40:00', 8),
(144, '10:10:00', 8),
(145, '11:00:00', 8),
(146, '11:30:00', 8),
(147, '12:05:00', 8),
(148, '12:40:00', 8),
(149, '13:00:00', 8),
(150, '13:20:00', 8),
(151, '14:00:00', 8),
(152, '14:40:00', 8),
(153, '15:00:00', 8),
(154, '15:40:00', 8),
(155, '16:00:00', 8),
(156, '16:20:00', 8),
(157, '16:40:00', 8),
(158, '17:15:00', 8),
(159, '17:50:00', 8),
(160, '18:15:00', 8),
(161, '18:45:00', 8),
(162, '06:40:00', 9),
(163, '06:40:00', 9),
(164, '07:40:00', 9),
(165, '08:40:00', 9),
(166, '09:40:00', 9),
(167, '10:40:00', 9),
(168, '11:40:00', 9),
(169, '12:40:00', 9),
(170, '13:40:00', 9),
(171, '14:40:00', 9),
(172, '15:40:00', 9),
(173, '16:40:00', 9),
(174, '17:40:00', 9),
(175, '06:10:00', 10),
(176, '07:10:00', 10),
(177, '07:40:00', 10),
(178, '08:10:00', 10),
(179, '08:40:00', 10),
(180, '09:10:00', 10),
(181, '09:40:00', 10),
(182, '10:10:00', 10),
(183, '11:10:00', 10),
(184, '11:50:00', 10),
(185, '12:40:00', 10),
(186, '13:10:00', 10),
(187, '13:40:00', 10),
(188, '14:10:00', 10),
(189, '14:40:00', 10),
(190, '15:10:00', 10),
(191, '15:40:00', 10),
(192, '16:10:00', 10),
(193, '17:10:00', 10),
(194, '17:40:00', 10),
(195, '18:10:00', 10),
(196, '18:40:00', 10),
(197, '19:00:00', 10),
(198, '19:20:00', 10),
(199, '06:40:00', 11),
(200, '07:40:00', 11),
(201, '08:40:00', 11),
(202, '09:40:00', 11),
(203, '10:40:00', 11),
(204, '11:40:00', 11),
(205, '12:40:00', 11),
(206, '13:40:00', 11),
(207, '14:40:00', 11),
(208, '15:40:00', 11),
(209, '16:40:00', 11),
(210, '17:40:00', 11),
(212, '06:40:00', 12),
(213, '07:15:00', 12),
(214, '08:00:00', 12),
(215, '08:40:00', 12),
(216, '09:15:00', 12),
(217, '10:15:00', 12),
(218, '11:15:00', 12),
(219, '12:15:00', 12),
(220, '13:15:00', 12),
(221, '14:15:00', 12),
(222, '15:15:00', 12),
(223, '16:15:00', 12),
(224, '17:15:00', 12),
(225, '18:15:00', 12),
(226, '04:45:00', 13),
(227, '05:45:00', 13),
(228, '06:45:00', 13),
(229, '07:45:00', 13),
(230, '08:45:00', 13),
(231, '09:45:00', 13),
(232, '10:45:00', 13),
(233, '11:45:00', 13),
(234, '12:45:00', 13),
(235, '13:45:00', 13),
(236, '14:45:00', 13),
(237, '15:45:00', 13),
(238, '16:45:00', 13),
(239, '17:45:00', 13),
(240, '06:30:00', 14),
(241, '07:30:00', 14),
(242, '08:30:00', 14),
(243, '09:30:00', 14),
(244, '10:30:00', 14),
(245, '11:30:00', 14),
(246, '12:30:00', 14),
(247, '13:30:00', 14),
(248, '14:30:00', 14),
(249, '15:30:00', 14),
(250, '16:30:00', 14),
(251, '17:30:00', 14),
(252, '18:30:00', 14),
(253, '19:00:00', 14),
(255, '04:30:00', 15),
(256, '04:50:00', 15),
(257, '05:20:00', 15),
(258, '05:50:00', 15),
(259, '06:20:00', 15),
(260, '07:00:00', 15),
(261, '07:30:00', 15),
(262, '08:15:00', 15),
(263, '09:20:00', 15),
(264, '10:00:00', 15),
(265, '11:00:00', 15),
(266, '11:40:00', 15),
(267, '12:20:00', 15),
(268, '13:00:00', 15),
(269, '13:30:00', 15),
(270, '14:00:00', 15),
(271, '14:30:00', 15),
(272, '15:00:00', 15),
(273, '15:30:00', 15),
(274, '17:00:00', 15),
(275, '18:20:00', 15),
(276, '05:25:00', 16),
(277, '06:25:00', 16),
(278, '07:10:00', 16),
(279, '07:35:00', 16),
(280, '08:15:00', 16),
(281, '08:40:00', 16),
(282, '09:00:00', 16),
(283, '09:40:00', 16),
(284, '10:20:00', 16),
(285, '11:00:00', 16),
(286, '12:00:00', 16),
(287, '12:40:00', 16),
(288, '13:20:00', 16),
(289, '14:00:00', 16),
(290, '14:40:00', 16),
(291, '15:20:00', 16),
(292, '16:00:00', 16),
(293, '16:40:00', 16),
(294, '17:15:00', 16),
(295, '17:50:00', 16),
(296, '18:15:00', 16),
(297, '05:20:00', 17),
(298, '06:20:00', 17),
(299, '07:20:00', 17),
(300, '08:20:00', 17),
(301, '09:20:00', 17),
(302, '10:20:00', 17),
(303, '11:20:00', 17),
(304, '12:20:00', 17),
(305, '13:20:00', 17),
(306, '14:20:00', 17),
(307, '15:20:00', 17),
(308, '16:20:00', 17),
(309, '17:20:00', 17),
(310, '18:40:00', 17),
(311, '06:00:00', 18),
(312, '07:00:00', 18),
(313, '08:00:00', 18),
(314, '09:00:00', 18),
(315, '10:00:00', 18),
(316, '11:00:00', 18),
(317, '12:00:00', 18),
(318, '13:00:00', 18),
(319, '14:00:00', 18),
(320, '15:00:00', 18),
(321, '16:00:00', 18),
(322, '17:00:00', 18),
(323, '18:00:00', 18),
(324, '19:00:00', 18),
(325, '05:30:00', 19),
(326, '06:30:00', 19),
(327, '07:30:00', 19),
(328, '08:30:00', 19),
(329, '09:30:00', 19),
(330, '10:30:00', 19),
(331, '11:30:00', 19),
(332, '12:30:00', 19),
(333, '13:30:00', 19),
(334, '14:30:00', 19),
(335, '15:30:00', 19),
(336, '16:30:00', 19),
(337, '17:30:00', 19),
(338, '18:30:00', 19),
(339, '19:20:00', 19),
(340, '06:30:00', 20),
(341, '07:00:00', 20),
(342, '07:30:00', 20),
(343, '08:00:00', 20),
(344, '08:30:00', 20),
(345, '09:00:00', 20),
(346, '09:30:00', 20),
(347, '10:00:00', 20),
(348, '10:30:00', 20),
(349, '11:00:00', 20),
(350, '11:30:00', 20),
(351, '12:30:00', 20),
(352, '13:00:00', 20),
(353, '13:30:00', 20),
(354, '14:00:00', 20),
(355, '14:30:00', 20),
(356, '15:00:00', 20),
(357, '15:30:00', 20),
(358, '16:00:00', 20),
(359, '16:30:00', 20),
(360, '17:00:00', 20),
(361, '17:30:00', 20),
(362, '18:00:00', 20),
(363, '18:30:00', 20),
(364, '19:00:00', 20),
(365, '19:30:00', 20),
(366, '06:00:00', 21),
(367, '07:00:00', 21),
(368, '08:00:00', 21),
(369, '09:00:00', 21),
(370, '10:00:00', 21),
(371, '11:00:00', 21),
(372, '12:00:00', 21),
(373, '13:00:00', 21),
(374, '14:00:00', 21),
(375, '15:00:00', 21),
(376, '16:00:00', 21),
(377, '17:00:00', 21),
(378, '18:00:00', 21),
(379, '05:00:00', 23),
(380, '06:00:00', 23),
(381, '07:00:00', 23),
(382, '08:00:00', 23),
(383, '09:00:00', 23),
(384, '10:00:00', 23),
(385, '11:00:00', 23),
(386, '12:00:00', 23),
(387, '13:00:00', 23),
(388, '14:00:00', 23),
(389, '15:00:00', 23),
(390, '16:00:00', 23),
(391, '17:00:00', 23),
(392, '18:00:00', 23),
(393, '19:00:00', 23),
(394, '06:00:00', 24),
(395, '07:10:00', 24),
(396, '08:10:00', 24),
(397, '09:10:00', 24),
(398, '10:10:00', 24),
(399, '11:10:00', 24),
(400, '12:10:00', 24),
(401, '13:10:00', 24),
(402, '14:10:00', 24),
(403, '15:10:00', 24),
(404, '16:10:00', 24),
(405, '17:10:00', 24),
(406, '18:10:00', 24),
(407, '19:10:00', 24),
(408, '06:00:00', 25),
(409, '07:00:00', 25),
(410, '08:00:00', 25),
(411, '09:00:00', 25),
(412, '10:00:00', 25),
(413, '11:00:00', 25),
(414, '12:00:00', 25),
(415, '13:00:00', 25),
(416, '14:00:00', 25),
(417, '15:00:00', 25),
(418, '16:00:00', 25),
(419, '17:00:00', 25),
(420, '18:00:00', 25),
(421, '05:40:00', 26),
(422, '06:40:00', 26),
(423, '07:40:00', 26),
(424, '08:40:00', 26),
(425, '09:40:00', 26),
(426, '10:40:00', 26),
(427, '11:40:00', 26),
(428, '12:40:00', 26),
(429, '13:40:00', 26),
(430, '14:40:00', 26),
(431, '15:40:00', 26),
(432, '16:40:00', 26),
(433, '17:40:00', 26),
(434, '05:00:00', 27),
(435, '05:40:00', 27),
(436, '06:20:00', 27),
(437, '07:00:00', 27),
(438, '07:40:00', 27),
(439, '08:20:00', 27),
(440, '09:00:00', 27),
(441, '09:40:00', 27),
(442, '10:20:00', 27),
(443, '11:00:00', 27),
(444, '11:40:00', 27),
(445, '12:40:00', 27),
(446, '14:00:00', 27),
(447, '14:40:00', 27),
(448, '15:20:00', 27),
(449, '16:00:00', 27),
(450, '16:40:00', 27),
(451, '17:30:00', 27),
(452, '06:00:00', 28),
(453, '06:40:00', 28),
(455, '07:20:00', 28),
(468, '08:00:00', 28),
(469, '08:40:00', 28),
(470, '09:20:00', 28),
(471, '10:00:00', 28),
(472, '10:40:00', 28),
(473, '11:20:00', 28),
(474, '12:00:00', 28),
(475, '12:40:00', 28),
(476, '13:20:00', 28),
(477, '14:00:00', 28),
(478, '14:40:00', 28),
(479, '15:20:00', 28),
(480, '16:00:00', 28),
(481, '16:40:00', 28),
(482, '17:20:00', 28),
(483, '05:30:00', 29),
(484, '06:30:00', 29),
(485, '07:30:00', 29),
(486, '08:30:00', 29),
(487, '09:30:00', 29),
(488, '10:30:00', 29),
(489, '11:30:00', 29),
(490, '12:30:00', 29),
(491, '13:30:00', 29),
(492, '14:30:00', 29),
(493, '15:30:00', 29),
(494, '16:30:00', 29),
(495, '17:30:00', 29),
(496, '05:30:00', 30),
(497, '06:30:00', 30),
(498, '07:30:00', 30),
(499, '08:30:00', 30),
(500, '09:30:00', 30),
(501, '10:30:00', 30),
(502, '11:30:00', 30),
(503, '12:30:00', 30),
(504, '13:30:00', 30),
(505, '14:30:00', 30),
(506, '15:30:00', 30),
(507, '16:30:00', 30),
(508, '17:30:00', 30),
(518, '06:00:00', 22),
(519, '07:00:00', 22),
(520, '08:00:00', 22),
(521, '09:00:00', 22),
(522, '10:00:00', 22),
(523, '11:00:00', 22),
(524, '12:00:00', 22),
(525, '13:00:00', 22),
(526, '14:00:00', 22),
(527, '15:00:00', 22),
(528, '16:00:00', 22),
(529, '17:00:00', 22),
(530, '18:00:00', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(1) NOT NULL DEFAULT '0',
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `organization_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `avatar`, `dob`, `gender`, `phone_number`, `email`, `password`, `address`, `verified`, `organization_id`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Huy Quang', 'assets/images/user/avatar/0.41844300 1594058044.jpg', '1997-09-19', 0, '0964016863', 'nguyenhuyquangbk1909@gmail.com', '$2y$12$EVfAoRWjwSXU8ftlcGKtlutmfFljQzPvglK3YyBAZ1ePNE3s1YRJu', '1395 Giải Phóng, Hoàng Mai, Hà Nội', 1, 1, '2020-04-13 03:13:14', '2020-07-06 17:54:04'),
(3, 'Nguyễn Hoàng Hiệp', 'assets/images/user/avatar/2.png', '1997-09-11', 0, '0964016864', '20152962@student.hust.edu.vn', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 1, '2020-04-22 10:06:51', '2020-04-22 10:06:51'),
(4, 'Nguyễn Thị Hiền', 'assets/images/user/avatar/non-avatar.png', '1997-11-18', 1, '0964016865', 'hiendt@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 1, '2020-05-24 03:08:17', '2020-05-24 03:08:17'),
(5, 'Nguyễn Trọng Quý', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016867', 'quynt@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 3, '2020-05-24 03:48:26', '2020-05-24 03:48:26'),
(6, 'Đỗ Thị Hằng', 'assets/images/user/avatar/non-avatar.png', NULL, 1, '0964016869', 'hangdt@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 4, '2020-05-24 03:48:58', '2020-05-24 03:48:58'),
(7, 'Phan Đình Khanh', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016869', 'khanhpd@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 5, '2020-05-24 03:50:05', '2020-05-24 03:50:05'),
(8, 'Nguyễn Hữu Nghĩa', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016870', 'nghianh@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 6, '2020-05-24 03:50:35', '2020-05-24 03:50:35'),
(9, 'Lê Doãn Hiệu', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016860', 'hieuld@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 4, '2020-05-24 03:51:13', '2020-05-24 03:51:13'),
(10, 'Mai Cảnh Toàn', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016860', 'toanmc@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 5, '2020-05-24 03:51:59', '2020-05-24 03:51:59'),
(11, 'Nguyễn Đình Tú', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016859', 'tund@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 6, '2020-05-24 03:52:36', '2020-05-24 03:52:36'),
(12, 'Lê Ngọc Minh', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964016850', 'minhln@gmail.com', '$2y$12$3SGysS.ho6IgSEkkep6yZOZDR8XnwYnrN6mXZHsPXCjOl3g2RTvAC', NULL, 1, 7, '2020-06-11 15:19:47', '2020-07-07 10:28:23'),
(13, 'Lê Xuân Bình', 'assets/images/user/avatar/non-avatar.png', NULL, 0, '0964325634', 'binhlx@gmail.com', '$2y$10$oMLjZrooSLXKNBgPd3NLjuigE0o38SgB2ajmtoYE.gWDBgtgKmqEa', NULL, 0, NULL, '2020-07-08 09:40:12', '2020-07-08 09:40:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_schedule`
--

CREATE TABLE `user_schedule` (
  `id` int(11) NOT NULL,
  `starting_district_id` int(11) NOT NULL,
  `starting_province_city_id` int(11) NOT NULL,
  `pick_up_location` varchar(255) NOT NULL,
  `end_district_id` int(11) NOT NULL,
  `end_province_city_id` int(11) NOT NULL,
  `drop_off_location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `intended_number_passenger` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Chỉ mục cho bảng `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_organization` (`organization_id`),
  ADD KEY `fk_starting_province_city_coach` (`starting_province_city_id`),
  ADD KEY `fk_end_province_city_coach` (`end_province_city_id`);
ALTER TABLE `coach` ADD FULLTEXT KEY `route_fulltext_search` (`route`);

--
-- Chỉ mục cho bảng `combine`
--
ALTER TABLE `combine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_driver_schedule_id` (`driver_schedule_id`),
  ADD KEY `fk_user_schedule_combine` (`user_schedule_id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_province_city` (`province_city_id`);

--
-- Chỉ mục cho bảng `driver_schedule`
--
ALTER TABLE `driver_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_car` (`car_id`),
  ADD KEY `fk_starting_province_city` (`starting_province_city_id`),
  ADD KEY `fk_starting_district` (`starting_district_id`),
  ADD KEY `fk_end_district` (`end_district_id`),
  ADD KEY `fk_end_province_city` (`end_province_city_id`);

--
-- Chỉ mục cho bảng `extended_image`
--
ALTER TABLE `extended_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coach_extended_image` (`coach_id`),
  ADD KEY `fk_car_extended_iamge` (`car_id`);

--
-- Chỉ mục cho bảng `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_owner` (`owner_id`);

--
-- Chỉ mục cho bảng `province_city`
--
ALTER TABLE `province_city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coach_rating` (`coach_id`);

--
-- Chỉ mục cho bảng `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coach` (`coach_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_organization_user` (`organization_id`);

--
-- Chỉ mục cho bảng `user_schedule`
--
ALTER TABLE `user_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_schedule_user` (`user_id`),
  ADD KEY `fk_end_province_user_schedule` (`end_province_city_id`),
  ADD KEY `fk_starting_province_user_schedule` (`starting_province_city_id`),
  ADD KEY `fk_starting_district_user_schedule` (`starting_district_id`),
  ADD KEY `fk_end_district_user_schedule` (`end_district_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `coach`
--
ALTER TABLE `coach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `combine`
--
ALTER TABLE `combine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `driver_schedule`
--
ALTER TABLE `driver_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `extended_image`
--
ALTER TABLE `extended_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `province_city`
--
ALTER TABLE `province_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user_schedule`
--
ALTER TABLE `user_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `fk_end_province_city_coach` FOREIGN KEY (`end_province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_organization` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_starting_province_city_coach` FOREIGN KEY (`starting_province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `combine`
--
ALTER TABLE `combine`
  ADD CONSTRAINT `fk_driver_schedule_id` FOREIGN KEY (`driver_schedule_id`) REFERENCES `driver_schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_schedule_combine` FOREIGN KEY (`user_schedule_id`) REFERENCES `user_schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_province_city` FOREIGN KEY (`province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `driver_schedule`
--
ALTER TABLE `driver_schedule`
  ADD CONSTRAINT `fk_car` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_end_district` FOREIGN KEY (`end_district_id`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_end_province_city` FOREIGN KEY (`end_province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_starting_district` FOREIGN KEY (`starting_district_id`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_starting_province_city` FOREIGN KEY (`starting_province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `extended_image`
--
ALTER TABLE `extended_image`
  ADD CONSTRAINT `fk_car_extended_iamge` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_coach_extended_image` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_coach_rating` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `timer`
--
ALTER TABLE `timer`
  ADD CONSTRAINT `fk_coach` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_organization_user` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_schedule`
--
ALTER TABLE `user_schedule`
  ADD CONSTRAINT `fk_end_district_user_schedule` FOREIGN KEY (`end_district_id`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_end_province_user_schedule` FOREIGN KEY (`end_province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_starting_district_user_schedule` FOREIGN KEY (`starting_district_id`) REFERENCES `district` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_starting_province_user_schedule` FOREIGN KEY (`starting_province_city_id`) REFERENCES `province_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_schedule_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
