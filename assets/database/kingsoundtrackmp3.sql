-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 31, 2022 lúc 06:13 PM
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
-- Cấu trúc bảng cho bảng `coin_history`
--

CREATE TABLE `coin_history` (
  `history_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `coin` int(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `buy_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `history_item_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `history_picture` varchar(255) DEFAULT NULL,
  `coin` int(20) NOT NULL,
  `buy_date` datetime NOT NULL
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
  `coin` int(20) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `shop_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `coin` int(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`shop_id`, `title`, `item`, `coin`, `description`, `picture`) VALUES
('1219ac03-42b9-11ec-83fc-80e82c12f177', 'Tia sét', 'fas fa-bolt', 20, '1 tia sét sẽ được gắn cùng với profile của bạn\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'lightning_bolt.png'),
('1219b5c4-42b9-11ec-83fc-80e82c12f177', 'Quả bom', 'fas fa-bomb', 10, '1 quả bom sẽ được gắn cùng với profile của bạn\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'bomb.png'),
('254b052d-42ba-11ec-83fc-80e82c12f177', 'Gem', 'fas fa-gem', 50, '1 gem sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'gem.png'),
('254b175d-42ba-11ec-83fc-80e82c12f177', 'Trái tim', 'fas fa-heart', 10, '1 trái tim sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'heart.png'),
('322aab34-42b8-11ec-83fc-80e82c12f177', 'Vương miện', 'fas fa-crown', 100, '1 vương miện sẽ được gắn cùng với profile của bạn\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'crown.png'),
('97916d48-42b8-11ec-83fc-80e82c12f177', 'Nguyên tử', 'fas fa-atom', 30, '1 atom sẽ được gắn cùng với profile của bạn\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'atom.png'),
('adcd60cc-42be-11ec-83fc-80e82c12f177', 'Check', 'fas fa-check-circle', 10, '1 dấu tích sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'check.png'),
('adcd73bc-42be-11ec-83fc-80e82c12f177', 'Rồng', 'fas fa-dragon', 150, '1 con rồng sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'dragon.png'),
('ae4acaf3-42b9-11ec-83fc-80e82c12f177', 'Biohazard', 'fas fa-biohazard', 100, '1 biohazard sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'biohazard.png'),
('ae4ae00b-42b9-11ec-83fc-80e82c12f177', 'Bug', 'fas fa-bug', 50, '1 bug sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'bug.png'),
('bc004118-42ba-11ec-83fc-80e82c12f177', 'Ngọn lửa', 'fas fa-fire-alt', 30, '1 ngọn lửa sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'fire.png'),
('bc004c5a-42ba-11ec-83fc-80e82c12f177', 'Code', 'fas fa-code', 200, '1 code sẽ được gắn cùng với profile của bạn\r\nP/s: Sẽ thay thế cho 1 icon khác nếu mua', 'code.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `coin_history`
--
ALTER TABLE `coin_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Chỉ mục cho bảng `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_item_id`);

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
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

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
-- Các ràng buộc cho bảng `coin_history`
--
ALTER TABLE `coin_history`
  ADD CONSTRAINT `coin_history_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
