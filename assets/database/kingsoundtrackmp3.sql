-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 25, 2022 lúc 10:40 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kingsoundtrackmp3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(20) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gender`
--

INSERT INTO `gender` (`gender_id`, `gender`) VALUES
(1, 'pop'),
(2, 'rock'),
(3, 'jazz'),
(4, 'Hip&Hop'),
(5, 'Nhạc đồng quê'),
(6, 'EDM'),
(7, 'Mỹ Latinh'),
(8, 'Châu phi'),
(9, 'Châu á'),
(10, 'Brasil'),
(11, 'Caribe'),
(12, 'Folk Đương đại'),
(13, 'Chill'),
(14, 'Dance');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `history_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `playtime` time NOT NULL,
  `playday` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `music`
--

CREATE TABLE `music` (
  `music_id` varchar(200) NOT NULL,
  `list` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(255) NOT NULL,
  `soundfile` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile`
--

CREATE TABLE `profile` (
  `profile_id` varchar(200) NOT NULL,
  `account` varchar(100) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` int(6) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `record`
--

CREATE TABLE `record` (
  `record_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `playtime` time NOT NULL,
  `playday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD KEY `profile_his` (`profile_id`);

--
-- Chỉ mục cho bảng `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`),
  ADD KEY `list` (`list`) USING BTREE;

--
-- Chỉ mục cho bảng `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Chỉ mục cho bảng `record`
--
ALTER TABLE `record`
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `music`
--
ALTER TABLE `music`
  MODIFY `list` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `profile_his` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Các ràng buộc cho bảng `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
