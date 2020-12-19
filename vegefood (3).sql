-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2020 lúc 05:53 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vegefood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

CREATE TABLE `chitiethd` (
  `MaHD` varchar(20) NOT NULL,
  `Masp` varchar(20) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Dongia` float NOT NULL,
  `Giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `Maanh` varchar(20) NOT NULL,
  `Tenanh` text NOT NULL,
  `Masp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(20) NOT NULL,
  `IDthem` varchar(20) NOT NULL,
  `Ngaythem` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ngaysua` timestamp NOT NULL DEFAULT current_timestamp(),
  `Diachigiao` text NOT NULL,
  `Trangthai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `Maloai` varchar(20) NOT NULL,
  `Tenloai` text NOT NULL,
  `IDthem` varchar(20) NOT NULL,
  `IDsua` varchar(20) NOT NULL,
  `Ngaythem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ngaysua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`Maloai`, `Tenloai`, `IDthem`, `IDsua`, `Ngaythem`, `Ngaysua`) VALUES
('L01', 'Rau củ', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Masp` varchar(20) NOT NULL,
  `Tensp` text NOT NULL,
  `Maloai` varchar(20) NOT NULL,
  `Mota` text NOT NULL,
  `Maanh` varchar(20) NOT NULL,
  `Slton` int(11) NOT NULL,
  `Solban` int(11) NOT NULL,
  `IDthem` varchar(20) NOT NULL,
  `IDsua` varchar(20) NOT NULL,
  `Ngaythem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ngaysua` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dongia` float NOT NULL,
  `Giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` varchar(20) NOT NULL,
  `use name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Hoten` text NOT NULL,
  `Diachi` text NOT NULL,
  `Dienthoai` varchar(12) NOT NULL,
  `Chucvu` text NOT NULL,
  `Ngaythem` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ngaysua` timestamp NOT NULL DEFAULT current_timestamp(),
  `Hinhanh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `use name`, `password`, `Email`, `Hoten`, `Diachi`, `Dienthoai`, `Chucvu`, `Ngaythem`, `Ngaysua`, `Hinhanh`) VALUES
('N01', 'thu', '123456', 'hthu2211@gmail.com', 'Hoàng Thị Thu', 'Hải Dương', '0362285001', 'Quản lý', '2020-12-19 03:36:07', '2020-12-19 03:36:07', 'new_logo.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD KEY `Masp` (`Masp`),
  ADD KEY `MaHD` (`MaHD`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`Maanh`),
  ADD KEY `Masp` (`Masp`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `IDthem` (`IDthem`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`Maloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Masp`),
  ADD KEY `Maloai` (`Maloai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`Masp`) REFERENCES `sanpham` (`Masp`),
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`Masp`) REFERENCES `sanpham` (`Masp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDthem`) REFERENCES `taikhoan` (`ID`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Maloai`) REFERENCES `loaisp` (`Maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
