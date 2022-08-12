-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2022 lúc 08:09 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangchamcong`
--

CREATE TABLE `bangchamcong` (
  `MaCC` varchar(5) NOT NULL,
  `MaNV` varchar(5) NOT NULL,
  `NgayLam` tinyint(4) NOT NULL,
  `NgayNghiCP` int(2) DEFAULT NULL,
  `NgayNghiKP` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bangchamcong`
--

INSERT INTO `bangchamcong` (`MaCC`, `MaNV`, `NgayLam`, `NgayNghiCP`, `NgayNghiKP`) VALUES
('CC001', 'NV001', 4, 0, 0),
('CC002', 'NV002', 4, 0, 0),
('CC003', 'NV003', 4, 0, 0),
('CC004', 'NV004', 4, 0, 0),
('CC005', 'NV005', 4, 0, 0),
('CC006', 'NV006', 4, 0, 0),
('CC007', 'NV007', 4, 0, 0),
('CC008', 'NV008', 4, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` varchar(5) NOT NULL,
  `TenCV` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`) VALUES
('TP001', 'Trưởng phòng CNTT'),
('TP002', 'Trưởng phòng CSKH'),
('TP003', 'Trưởng phòng Kinh Doanh'),
('TP004', 'Trưởng phòng Kế Hoạch'),
('TP005', 'Trưởng phòng Kế Toán'),
('TP006', 'Trưởng phòng Kĩ thuật'),
('TP007', 'Trưởng phòng Maketing'),
('TP008', 'Trưởng phòng Nhân sự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `Maluong` varchar(5) NOT NULL,
  `Thang` enum('1','2','3','4','5','6','7','8','9','10','11','12') DEFAULT NULL,
  `LuongCB` int(10) DEFAULT NULL,
  `PCXang` int(10) DEFAULT NULL,
  `PCAnTrua` int(10) DEFAULT NULL,
  `PCKhac` int(10) DEFAULT NULL,
  `BHYT` int(10) DEFAULT NULL,
  `BHXH` int(10) DEFAULT NULL,
  `MaThue` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`Maluong`, `Thang`, `LuongCB`, `PCXang`, `PCAnTrua`, `PCKhac`, `BHYT`, `BHXH`, `MaThue`) VALUES
('ML001', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt001'),
('ML002', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt002'),
('ML003', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt003'),
('ML004', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt004'),
('ML005', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt005'),
('ML006', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt006'),
('ML007', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt007'),
('ML008', '12', 15000000, 900000, 600000, 500000, 25000, 20000, 'Mt008');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(5) NOT NULL,
  `TenNV` varchar(50) CHARACTER SET utf8 NOT NULL,
  `GioiTinh` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `Namsinh` date DEFAULT NULL,
  `DCTT` varchar(50) DEFAULT NULL,
  `CMT` bigint(11) DEFAULT NULL,
  `MaPB` varchar(5) NOT NULL,
  `MaCV` varchar(5) NOT NULL,
  `MaCC` varchar(5) NOT NULL,
  `MaLuong` varchar(5) NOT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `GioiTinh`, `Namsinh`, `DCTT`, `CMT`, `MaPB`, `MaCV`, `MaCC`, `MaLuong`, `GhiChu`) VALUES
('NV001', 'Ngô Quang Anh', 'Nam', '1997-01-01', 'Nghệ An', 300812345, 'CN001', 'TP001', 'CC001', 'ML001', 'Trưởng phòng CNTT'),
('NV002', 'Phạm Thu Thảo', 'Nữ', '1995-08-05', 'Long An', 300723619, 'CS001', 'TP002', 'CC002', 'ML002', 'Chị Thảo trưởng phòng Chăm sóc khách hàng'),
('NV003', 'Ngô Minh Quân', 'Nam', '1998-08-05', 'Long An', 300935719, 'KD001', 'TP003', 'CC003', 'ML003', 'Quân trưởng phòng Kinh Doanh'),
('NV004', 'Đặng Quang Hà', 'Nam', '1994-09-05', 'Kiên Giang', 300756789, 'KH001', 'TP004', 'CC004', 'ML004', 'Anh Hà trưởng phòng Kế Hoạch'),
('NV005', 'Nguyễn Thị Anh Thư', 'Nữ', '1995-09-27', 'Long An', 300829999, 'KT001', 'TP005', 'CC005', 'ML005', 'Chị Thư trưởng phòng Kế Toán'),
('NV006', 'Nguyễn Khắc Duy', 'Nam', '1995-09-05', 'Cần Thơ', 300899289, 'KT002', 'TP006', 'CC006', 'ML006', 'Anh Duy trưởng phòng Kĩ Thuật'),
('NV007', 'Nguyễn Thu Hà', 'Nữ', '1993-03-02', 'Sóc Trăng', 300623259, 'MKT01', 'TP007', 'CC007', 'ML007', 'Chị Hà trưởng phòng Maketing'),
('NV008', 'Nguyễn Minh Toàn', 'Nam', '1998-09-05', 'Long An', 300891389, 'NS001', 'TP008', 'CC008', 'ML008', 'Toàn trưởng phòng Nhân Sự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` varchar(5) NOT NULL,
  `TenPB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`) VALUES
('CN001', 'Phòng CNTT'),
('CS001', 'Phòng CSKH'),
('KD001', 'Phòng Kinh Doanh'),
('KH001', 'Phòng Kế Hoạch'),
('KT001', 'Phòng Kế Toán'),
('KT002', 'Phòng Kĩ Thuật'),
('MKT01', 'Phòng Maketing'),
('NS001', 'Phòng Nhân sự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlytaikhoan`
--

CREATE TABLE `quanlytaikhoan` (
  `MaNV` varchar(5) DEFAULT NULL,
  `Usename` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quanlytaikhoan`
--

INSERT INTO `quanlytaikhoan` (`MaNV`, `Usename`, `Password`) VALUES
(NULL, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
('NV001', 'admin2', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangchamcong`
--
ALTER TABLE `bangchamcong`
  ADD PRIMARY KEY (`MaCC`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`Maluong`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `fk_nv_cc` (`MaCC`),
  ADD KEY `fk_nv_pb` (`MaPB`),
  ADD KEY `fk_nv_cv` (`MaCV`),
  ADD KEY `fk_nv_l` (`MaLuong`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- Chỉ mục cho bảng `quanlytaikhoan`
--
ALTER TABLE `quanlytaikhoan`
  ADD PRIMARY KEY (`Usename`),
  ADD KEY `fk_tk_nv` (`MaNV`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nv_cc` FOREIGN KEY (`MaCC`) REFERENCES `bangchamcong` (`MaCC`),
  ADD CONSTRAINT `fk_nv_cv` FOREIGN KEY (`MaCV`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `fk_nv_l` FOREIGN KEY (`MaLuong`) REFERENCES `luong` (`Maluong`),
  ADD CONSTRAINT `fk_nv_pb` FOREIGN KEY (`MaPB`) REFERENCES `phongban` (`MaPB`);

--
-- Các ràng buộc cho bảng `quanlytaikhoan`
--
ALTER TABLE `quanlytaikhoan`
  ADD CONSTRAINT `fk_tk_nv` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
