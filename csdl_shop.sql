-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 17, 2024 lúc 02:29 PM
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
-- Cơ sở dữ liệu: `csdl_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.thanh toán trực tiếp \r\n2.thanh toán online',
  `ngaydathang` varchar(50) DEFAULT NULL,
  `tongdonhang` int(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `receive_name` varchar(255) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `cartegory_id`, `brand_name`) VALUES
(40, 25, 'VAY'),
(42, 27, 'Quần'),
(43, 29, 'Bé Trai'),
(44, 28, 'Váy'),
(45, 27, 'Áo'),
(46, 27, 'Áo Khoác'),
(47, 29, 'Bé Gái'),
(48, 28, 'Áo'),
(49, 28, 'Áo Khoác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `iddh` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `dongia` double(10,2) NOT NULL DEFAULT 0.00,
  `tensp` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `iddh`, `idpro`, `soluong`, `dongia`, `tensp`, `img`) VALUES
(57, 183, 47, 3, 950.00, 'Váy', '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(58, 184, 47, 6, 950.00, 'Váy', '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(59, 187, 47, 1, 950.00, 'Váy', '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(60, 188, 47, 3, 950.00, 'Váy', '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(61, 3, 47, 4, 950.00, 'Váy', '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(62, 189, 47, 2, 950.00, 'Váy', '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(63, 190, 54, 1, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(64, 191, 54, 1, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(65, 192, 56, 2, 450.00, 'Áo Thun Cotton-Grey', 'NAMAOP3S1.jpeg'),
(66, 192, 55, 1, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(67, 196, 55, 1, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(68, 198, 54, 1, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(69, 0, 56, 3, 450.00, 'Áo Thun Cotton-Grey', 'NAMAOP3S1.jpeg'),
(70, 0, 55, 1, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(71, 199, 56, 3, 450.00, 'Áo Thun Cotton-Grey', 'NAMAOP3S1.jpeg'),
(72, 0, 54, 3, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(73, 0, 55, 3, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(74, 200, 75, 4, 2080.00, 'DARK BEIGE SET ( ÁO SƠ MI LỤA VÀ CHÂN VÁY XẾP LY)', 'AONUP1.jpeg'),
(75, 0, 55, 4, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(76, 203, 55, 3, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(77, 0, 77, 1, 890.00, 'ÁO TENCEL DẬP NỔI NHẤN BÈO', 'AONUP4S4.jpg'),
(78, 0, 55, 2, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(79, 0, 55, 3, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(80, 208, 78, 1, 850.00, 'ÁO SƠ MI TAY CÁNH TIÊN', 'AONUP2S1.jpg'),
(81, 209, 54, 7, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(82, 210, 55, 1, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(83, 0, 54, 4, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(84, 0, 54, 1, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(85, 211, 55, 2, 300.00, 'Áo Thun Cotton-Black', 'NAMAOP2S1.jpg'),
(86, 212, 54, 1, 300.00, 'Áo Thun Cotton-White', 'NAMAOP1S1.jpg'),
(87, 213, 57, 2, 350.00, 'Áo Thun Sọc Ngang-N1', 'NAMAOP5S1.jpeg'),
(88, 214, 56, 1, 450.00, 'Áo Thun Cotton-Grey', 'NAMAOP3S1.jpeg'),
(89, 215, 82, 1, 129.00, 'Áo thun ngắn tay Minnie bé gái Rabity', 'GIRLP3S1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(27, '   Nam'),
(28, '                        Nữ'),
(29, 'Trẻ Em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `iddonhang` int(11) NOT NULL,
  `madh` varchar(20) NOT NULL,
  `tongdonhang` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang chờ xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `pttt` tinyint(1) NOT NULL DEFAULT 1,
  `id` int(11) DEFAULT 0 COMMENT '0.khách vảng lai\r\n1.khách có tài khoản',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` decimal(10,3) NOT NULL,
  `product_sale` varchar(255) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `product_preverse` text NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cartegory_id`, `brand_id`, `product_price`, `product_sale`, `product_desc`, `product_preverse`, `product_img`) VALUES
(54, 'Áo Thun Cotton-White', 27, 45, 300.000, '250', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. \r\n\r\n- Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. \r\n\r\n- Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác \"mát lạnh\" ngay điểm chạm đầu tiên trên da.\r\n\r\n- Thấm hút mồ hôi tốt, mang đến cảm giác mặc thoải mái, thích hợp với các hoạt động ngoài trời. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 185 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 92-78-98 cm\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMAOP1S1.jpg'),
(55, 'Áo Thun Cotton-Black', 27, 45, 300.000, '250', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. \r\n\r\n- Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. \r\n\r\n- Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác \"mát lạnh\" ngay điểm chạm đầu tiên trên da.\r\n\r\n- Thấm hút mồ hôi tốt, mang đến cảm giác mặc thoải mái, thích hợp với các hoạt động ngoài trời. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 185 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 92-78-98 cm\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMAOP2S1.jpg'),
(56, 'Áo Thun Cotton-Grey', 27, 45, 450.000, '250', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. \r\n\r\n- Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. \r\n\r\n- Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác \"mát lạnh\" ngay điểm chạm đầu tiên trên da.\r\n\r\n- Thấm hút mồ hôi tốt, mang đến cảm giác mặc thoải mái, thích hợp với các hoạt động ngoài trời. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 185 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 92-78-98 cm\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMAOP3S1.jpeg'),
(57, 'Áo Thun Sọc Ngang-N1', 27, 45, 350.000, '200', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. - Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. - Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác ', '', 'NAMAOP5S1.jpeg'),
(58, 'Áo Thun Sọc Ngang-N2', 27, 45, 350.000, '200', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. \r\n\r\n- Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. \r\n\r\n- Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác \"mát lạnh\" ngay điểm chạm đầu tiên trên da.\r\n\r\n- Thấm hút mồ hôi tốt, mang đến cảm giác mặc thoải mái, thích hợp với các hoạt động ngoài trời. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 185 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 92-78-98 cm\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMAOP6S1.jpeg'),
(59, 'Áo Thun Batman-Yellow', 27, 45, 500.000, '400', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. \r\n\r\n- Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. \r\n\r\n- Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác \"mát lạnh\" ngay điểm chạm đầu tiên trên da.\r\n\r\n- Thấm hút mồ hôi tốt, mang đến cảm giác mặc thoải mái, thích hợp với các hoạt động ngoài trời. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 185 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 92-78-98 cm\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMAOP7S1.jpeg'),
(60, 'Áo Thun URBAN', 27, 45, 375.000, '300', '- Áo cổ tròn, tay cộc, kiểu dáng Slim fit, độ dài vừa phải. Thiết kế phù hợp với quý anh yêu thích vẻ ngoài hiện đại, trẻ trung, năng động. \r\n\r\n- Thân trước áo tạo điểm nhấn mây in 3D sắc nét với chủ đề Your Dream, bắt mắt người nhìn. \r\n\r\n- Sản phẩm được sản xuất từ Ice Cotton, một chất liệu phát triển bởi SPOERRY Thụy Sĩ. Vải có độ xoắn cao, lông tơ sẽ bị triệt tiêu, mang đến cảm giác \"mát lạnh\" ngay điểm chạm đầu tiên trên da.\r\n\r\n- Thấm hút mồ hôi tốt, mang đến cảm giác mặc thoải mái, thích hợp với các hoạt động ngoài trời. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 185 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 92-78-98 cm\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMAOP8S1.jpeg'),
(61, 'Áo Phao Nam Siêu Nhẹ-Blue Black', 27, 46, 1590.000, '1.500', 'Áo phao chần bông dáng suông. Cổ mũ, dài tay. Có 2 túi khóa kéo phía trước. Cài bằng dây khóa kéo cùng màu phía trước. Vải chần bông cách đều.Bên trong nhồi bông dày dặn với phom dáng chuẩn cùng đường may tỉ mỉ. Tính năng giữ nhiệt, chống nước, độ bền cao.Mẫu mặc size L:Chiều cao: 1m85Cân nặng: 75kgSố đo 3 vòng: 100-78-95 cm', '', 'NAMKHOACP2S1.jpeg'),
(63, 'Áo Vest Nam-Turquoise', 27, 46, 1695.000, '1600', 'Áo vest cổ hai ve khoét chữ V. Tay dài có 4 khuy. Có 1 túi trước ngực, 2 vuông có nắp 2 bên, có 3 túi lót bên trong. Có 2 khuy cài mặt trước. Xẻ tà 2 bên phía sau.Để tạo nên những bộ suit đẳng cấp, các nhà thiết kế tài ba của IVY Men tỉ mỉ trong từng đường chỉ, phom dáng cứng cáp từ cầu vai, vạt áo cho đến chiều dài chuẩn của ống tay đều được IVY Men chú trọng.Đi cùng là chất liệu cao cấp nhập khẩu từ Nhật Bản. Tất cả tạo nên những bộ Suit hoàn hảo - Chuẩn mực tối thượng của sự lịch lãm đầy nam tính.Màu sắc: Đen - Xanh Đậm - Xanh Tím Than - Ghi Khói', '', 'NAMKHOACP5S1.jpg'),
(64, 'Áo Vest Nam-Black', 27, 46, 1695.000, '1600', 'Áo vest cổ hai ve khoét chữ V. Tay dài có 4 khuy. Có 1 túi trước ngực, 2 vuông có nắp 2 bên, có 3 túi lót bên trong. Có 2 khuy cài mặt trước. Xẻ tà 2 bên phía sau.\r\n\r\nĐể tạo nên những bộ suit đẳng cấp, các nhà thiết kế tài ba của IVY Men tỉ mỉ trong từng đường chỉ, phom dáng cứng cáp từ cầu vai, vạt áo cho đến chiều dài chuẩn của ống tay đều được IVY Men chú trọng.\r\nĐi cùng là chất liệu cao cấp nhập khẩu từ Nhật Bản. Tất cả tạo nên những bộ Suit hoàn hảo - Chuẩn mực tối thượng của sự lịch lãm đầy nam tính.\r\n\r\nMàu sắc: Đen - Xanh Đậm - Xanh Tím Than - Ghi Khói', '', 'NAMKHOACP4S1.jpeg'),
(65, 'QUẦN TÂY NAM VẢI KẺ', 27, 42, 199.000, '150', 'Quần dài ống suông. Cài phía trước bằng khóa kéo và khuy. Họa tiết kẻ trẻ trung, năng động.\r\n\r\nChất liệu thô thấm mồ hôi rất tốt. Với độ dày vừa phải và ưu thế thấm hút mồ hôi vượt trội. Khi mặc lên cơ thể, bạn sẽ có cảm giác thoải mái, rất dễ chịu vì có độ mát, thông thoáng mà không bị nóng, bí hay ngột ngạt khó chịu.\r\nForm ống đứng cổ điển, nam tính, không kén dáng người và thích hợp nhiều độ tuổi. Dễ dàng kết hợp cùng nhiều trang phục như áo thun, sơ mi, blazer...', '', 'NAMQUANP1S1.jpg'),
(66, 'QUẦN TÂY DÁNG REGULAR FIT', 27, 42, 795.000, '', '- Quần dài dáng regular. Độ dài qua mắt cá chân. Đai quần có khuy cài và đỉa. Khóa dạng kéo.\r\n\r\n- Chất liệu vải khaki dày dặn,đứng phom, màu sắc trẻ trung cá tính phù hợp mix với nhiều kiểu áo.\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 175 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng:98-75-97 cm\r\n\r\nMẫu mặc size L ', '', 'NAMQUANP2S1.jpeg'),
(67, 'QUẦN TÂY DÁNG REGULAR FIT', 27, 42, 745.000, '700', '- Sử dụng loại vải Tuysi cao cấp, mềm mát, bóng và rất ít nhăn, dễ dàng là ủi về đúng phom giúp tạo nên phong cách lịch lãm, sang trọng cho người mặc. - Quần dài dáng regular, kiểu dáng basic, độ dài qua mắt cá chân. Đai quần có khuy cài và đỉa. Khóa dạng kéo.Thông tin mẫu:Chiều cao: 181 cmCân nặng: 70 kgMẫu mặc size LLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMQUANP3S1.jpeg'),
(68, 'QUẦN TÂY DÁNG SLIM FIT', 27, 42, 695.000, '', '- Quần dài dáng sim fit, đai quần có đỉa.\r\n\r\n- Có 2 túi chéo. 2 túi sau may viền có khuy cài. \r\n\r\n- Chất liệu Tuysi có độ thấm hút cao, hạn chế nhăn nhàu\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 175 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng:98-75-97 cm\r\n\r\nMẫu mặc size M\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMQUANP4S1.jpeg'),
(69, 'QUẦN SHORTS KHAKI DÁNG SLIM FIT', 27, 42, 495.000, '', 'Quần dáng lửng ngang gối, cạp liền cài bằng khóa kéo phía trước. 2 túi chéo 2 bên. Chất vải khaki bền bỉ, dày dặn, giữ form dáng tốt\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 175 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 98-75-97 cm\r\n\r\nMẫu mặc size L', '', 'NAMQUANP6S1.jpeg'),
(70, 'QUẦN SHORTS THUN CẠP CHUN', 27, 42, 325.000, '', 'Quần sooc lửng độ dài trên đầu gối. Cạp chun bản to co giãn thoải mái, có dây rút tạo kiểu. 2 túi chéo 2 bên tiện lợi. Quần in chữ tạo điểm nhấn.Chất liệu vải thun mềm mịn, thoáng mát. Kiểu dáng trẻ trung phù hợp với vóc dáng người Việt.Lưu ý: Quần có màu chữ giao ngẫu nhiên. Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMQUANP7S1.jpg'),
(71, 'ROSS KHAKI SHORTS', 27, 42, 750.000, '', 'Quần dáng lửng ngang gối, cạp chun bản to co giãn có dây rút. 2 túi chéo 2 bên. Chất vải khaki bền bỉ, dày dặn, giữ form dáng tốt\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 175 cm\r\n\r\nCân nặng: 70 kg\r\n\r\nSố đo 3 vòng: 98-75-97 cm\r\n\r\nMẫu mặc size M\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', '', 'NAMQUANP8S1.jpg'),
(72, 'QUẦN TÂY NAM KẺ', 27, 42, 199.000, '', 'Quần dài ống suông. Cài phía trước bằng khóa kéo và khuy. Họa tiết kẻ trẻ trung, năng động.Chất liệu thô thấm mồ hôi rất tốt. Với độ dày vừa phải và ưu thế thấm hút mồ hôi vượt trội. Khi mặc lên cơ thể, bạn sẽ có cảm giác thoải mái, rất dễ chịu vì có độ mát, thông thoáng mà không bị nóng, bí hay ngột ngạt khó chịu.Form ống đứng cổ điển, nam tính, không kén dáng người và thích hợp nhiều độ tuổi. Dễ dàng kết hợp cùng nhiều trang phục như áo thun, sơ mi, blazer...', '', 'NAMQUANP9S1.jpg'),
(80, 'Áo thun ngắn tay bé gái Rabity', 29, 47, 89.000, '89000', '-Áo thun bé gái một là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo thun cá tính, năng động giúp bé thoải mái vận động. Với những mẫu áo thun bạn có thể phối cho bé nhiều outfits mặc ở nhà, đi học, đi chơi, đi tiệc,...', ' - Không giặt khô- Giặt ở nhiệt độ nước không quá 30ºC- Có thể sấy khô ở chế độ thường, nhiệt độ trung bình- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước- Không nên tẩy', 'GIRLP1S1.jpg'),
(81, 'Áo thun polo ngắn tay bé gái Rabity', 29, 47, 299.000, '290', 'Áo thun tay ngắn polo bé gái là là một mẫu áo bạn nên có trong tủ đồ của các cô công chúa nhỏ giúp ba mẹ tiết kiệm thời gian trong việc lựa chọn cho bé mỗi ngày mà bé có thể mặc trong nhiều dịp khác nhau như như đi chơi, đi học, đi tiệc,...', ' - Không giặt khô\r\n - Giặt ở nhiệt độ nước không quá 30ºC \r\n- Có thể sấy khô ở chế độ thường, nhiệt độ trung bình \r\n- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước \r\n- Không nên tẩy', 'GIRLP2S1.jpg'),
(82, 'Áo thun ngắn tay Minnie bé gái Rabity', 29, 47, 129.000, '120', 'Áo thun bé gái một là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo thun cá tính, năng động giúp bé thoải mái vận động. Với những mẫu áo thun bạn có thể phối cho bé nhiều outfits mặc ở nhà, đi học, đi chơi, đi tiệc,...', ' - Không giặt khô\r\n - Giặt ở nhiệt độ nước không quá 30ºC \r\n- Có thể sấy khô ở chế độ thường, nhiệt độ trung bình \r\n- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước \r\n- Không nên tẩy', 'GIRLP3S1.jpg'),
(83, 'Áo thun ngắn tay Vintage bé gái Rabity', 29, 47, 169.000, '', 'Áo thun ngắn tay luôn là một loại trang phục được rất nhiều ba mẹ lựa chọn khi mua sắm quần áo cho con bởi sự thoải mái và tiện lợi mà chúng mang lại. Với nhưng mẫu áo thun ba mẹ có thể kết hợp được với nhiều kiểu quần, kiểu váy khác nhau để tạo nên những outfits mặc ở nhà, đi chơi, đi học,...', ' - Không giặt khô \r\n- Giặt ở nhiệt độ nước không quá 30ºC\r\n - Có thể sấy khô ở chế độ thường, nhiệt độ trung bình\r\n - Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước \r\n- Không nên tẩy', 'GIRLP4S1.jpg'),
(84, 'Chia sẻ Áo thun ngắn tay bé gái Rabity', 29, 47, 189.000, '180', 'Áo thun ngắn tay luôn là một loại trang phục được rất nhiều ba mẹ lựa chọn khi mua sắm quần áo cho con bởi sự thoải mái và tiện lợi mà chúng mang lại. Với nhưng mẫu áo thun ba mẹ có thể kết hợp được với nhiều kiểu quần, kiểu váy khác nhau để tạo nên những outfits mặc ở nhà, đi chơi, đi học,...\r\n\r\n', ' - Không giặt khô \r\n- Giặt ở nhiệt độ nước không quá 30ºC \r\n- Có thể sấy khô ở chế độ thường, nhiệt độ trung bình \r\n- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước \r\n- Không nên tẩy', 'GIRLP5S1.jpg'),
(85, 'Áo thun ngắn tay bé trai Rabity', 29, 43, 129.000, '100', 'Áo thun bé trai sẽ là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo thun cá tính, năng động sẽ giúp bé thoải mái vận động. Ba mẹ có thể phối cho bé áo thun với những quần khác nhau như quần short, quần dài, quần kaki,... cho bé mặc nhiều dịp đi học, đi chơi, đi học, đi tiệc,...', ' - Không giặt khô \r\n- Giặt ở nhiệt độ nước không quá 30ºC \r\n- Có thể sấy khô ở chế độ thường, nhiệt độ trung bình \r\n- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước\r\n - Không nên tẩy', 'BOYP2S1.jpg'),
(86, 'Áo thun polo ngắn tay bé trai Rabity', 29, 43, 239.000, '200', 'Áo thun polo cổ bẻ bé trai sẽ là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo vừa mang đến sự lịch sự như một mẫu áo sơ mi, vừa có sự co giản tốt, thoải mái của một chiếc áo thun sẽ giúp bé thoải mái vận động. Với những mẫu áo polo sẽ có tính dụng rất cao bé có thể mặc ở nhà, đi học, đi chơi,... ', ' - Không giặt khô\r\n - Giặt ở nhiệt độ nước không quá 30ºC \r\n- Có thể sấy khô ở chế độ thường, nhiệt độ trung bình \r\n- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước\r\n - Không nên tẩy', 'BOYP3S1.jpg'),
(87, 'Áo sơ mi ngắn tay Avengers bé trai Rabity', 29, 43, 249.000, '200', 'Áo sơ mi bé trai một là outfits tiện lợi cho mẹ và bé, với kiểu dáng áo sơ mi bảnh bao, năng động và không kém phần thời trang có thể phối cho bé nhiều outfits mặc đi học, đi chơi, đi tiệc,...', ' - Không giặt khô\r\n - Giặt ở nhiệt độ nước không quá 30ºC\r\n - Có thể sấy khô ở chế độ thường, nhiệt độ trung bình\r\n- Có thể ủi ở nhiệt độ thấp, nên dùng bàn ủi hơi nước - Không nên tẩy', '902019240-1_75b9b84327394c05987b1d95e4afcb59_medium.jpg'),
(88, 'Áo Blazer suông Quietluxury', 28, 49, 945.000, '900', 'Nằm trong BST MOMENT OF BLISS: TÁI ĐỊNH NGHĨA SỨC HÚT MÙA LỄ HỘI, áo Blazer nổi bật trong gam màu trung tính sang trọng, thể hiện tinh thần quietluxury. Áo Vest dáng suông giúp nàng nổi bật và tỏa sáng theo cách riêng biệt. \r\n\r\nÁo Blazer một khuy, dáng suông. Điểm nhấn khác biệt là chi tiết tay may lửng nhẹ nhàng, đối lập với chi tiết độn vai nam tính, mang lại một tổng thể hài hòa, cân bằng. Thiết kế mix cùng quần lửng dáng baggy có 2 túi chéo 2 bên. \r\n\r\nVới thiết kế này, nàng có thể dễ dàng tách set để mix&match với nhiều items khác nhau, đa dạng hơn các outfit trong tuần. Set đồ phù hợp đi làm, đi học. Mix áo Blazer cùng chân váy ngắn hoặc jeans là nàng đã có 1 set đồ năng động trẻ trung diện đi chơi rồi đó!\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 167 cm\r\n\r\nCân nặng: 50 kg\r\n\r\nSố đo 3 vòng: 83-65-93 cm\r\n\r\nMẫu mặc size M\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'KHOACNUP1S1.jpeg'),
(89, 'Áo kiểu Ladies', 28, 49, 770.000, '700', 'Thiết kế đáp ứng đủ tình thần tươi mới, năng động nhưng vẫn thật thanh lịch và tinh tế.\r\n\r\nÁo blazer được thiết kế cách điệu cổ tròn, tay ngắn, có 4 túi nhỏ và dấu khuy.\r\n\r\nSản phẩm lựa chọn mix màu pastel nhẹ nhàng nhưng vẫn đủ nổi bật để nàng tỏa sáng. B\r\n\r\nạn có thể diện đi làm, đi họp hay đến những nơi vui chơi, gặp mặt bạn bè. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 167 cm\r\n\r\nCân nặng: 50 kg\r\n\r\nSố đo 3 vòng: 83-65-93 cm\r\n\r\nMẫu mặc size M Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'KHOACNUP2S1.jpg'),
(90, 'Áo BLAZER Light stars', 28, 49, 895.000, '800', 'Áo blazer là hoàn hảo dành cho dành cho các cô nàng công sở đang tìm kiếm sự trẻ trung, cá tính nhưng vẫn giữ được nét lịch sự, duyên dáng. Thiết kế kế thừa vẻ đẹp của phom dáng áo vest cổ điển: cổ 2 ve, vai độn và 2 hàng khuy. \r\n\r\nChất liệu vải Tuysi mềm mỏng, không nhăn, sang trọng,.. diện rất thoải mái và giữ phom dáng tốt. Xu hướng nữ quyền được IVY moda kết hợp giữa vẻ đẹp thanh lịch, sang trọng nhưng vẫn đề cao sự thoải mái, dễ chịu từ phom dáng đến chất liệu mềm mại.\r\n\r\nKhông chỉ đẹp từ thiết kế đến chất liệu, áo blazer còn mang tính ứng dụng cao, phù hợp cho các cô nàng diện nơi công sở và đi dự sự kiện. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 167 cm\r\n\r\nCân nặng: 50 kg\r\n\r\nSố đo 3 vòng: 83-65-93 cm\r\n\r\nMẫu mặc size M Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'KHOACNUP3S1.jpg'),
(91, 'Áo vest cách điệu tay bồng', 28, 49, 645.000, '600', 'Sản phẩm áo vest cách điệu tay bồng của Ivy Moda là một sự kết hợp tuyệt vời giữa phong cách công sở và sự sang trọng hiện đại. Với kiểu dáng croptop tay ngắn, sản phẩm tôn lên vẻ ngoài tươi trẻ và cá tính của người mặc.\r\n\r\nChất liệu tuytsi cao cấp được sử dụng cho mang lại sự mềm mại, thoải mái và độ bền cao. Thiết kế cách điệu tay bồng tạo nên sự nhẹ nhàng, bay bổng cho người mặc, giúp bạn tự tin hơn khi diện sản phẩm này.\r\n\r\nÁo vest cách điệu tay bồng có thể dễ dàng kết hợp với nhiều trang phục khác nhau, từ chân váy đến quần jean, giúp bạn tạo ra nhiều phong cách thời trang khác nhau. Với sự kết hợp độc đáo giữa phong cách cổ điển và hiện đại, sản phẩm này sẽ là một lựa chọn hoàn hảo cho các buổi gặp gỡ bạn bè, tiệc tùng hoặc những ngày làm việc tại văn phòng.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 167 cm\r\n\r\nCân nặng: 50 kg\r\n\r\nSố đo 3 vòng: 83-65-93 cm\r\n\r\nMẫu mặc size M\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'KHOACNUP4S1.jpg'),
(93, 'chân váy xếp ly cạp cao phối khuy', 28, 44, 675.000, '600', 'Chân váy xếp ly dáng xoè là một sản phẩm thời trang đẹp mắt và nữ tính, được thiết kế để tôn lên vẻ đẹp của người diện. Với sự kết hợp giữa chất liệu vải thô đứng dáng và độ rộng của ly xếp, chiếc váy này mang đến cảm giác thoải mái và nền nã khi mặc.\r\n\r\nĐiểm nổi bật của sản phẩm chính là chi tiết xếp ly xoè dần về đuôi, giúp tạo nên vẻ đẹp cân đối và thời trang cho người diện. Thiết kế này cũng giúp tôn lên đôi chân thon dài và mang đến sự tự tin cho phái đẹp khi diện váy.\r\n\r\nVới màu sắc trang nhã và kiểu dáng đơn giản, chân váy xếp ly dáng xoè thích hợp để mặc trong nhiều dịp khác nhau, từ công sở đến dạo phố hay dự tiệc. Sản phẩm có thể kết hợp cùng áo sơ mi, áo thun và các phụ kiện đi kèm.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 167 cm\r\n\r\nCân nặng: 50 kg\r\n\r\nSố đo 3 vòng: 83-65-93 cm\r\n\r\nMẫu mặc size M\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'VAYNUP1S1.jpeg'),
(94, 'Chân váy Layers chữ A phối đai', 28, 44, 1290.000, '1000', 'Sang trọng và hiện đại, chân váy Layers chữ A phối đai là lựa chọn hoàn hảo cho những cô nàng yêu thích sự thanh lịch nhưng vẫn không kém phần cá tính.\r\n\r\nThiết kế chữ A tôn dáng, giúp vòng eo trở nên thon gọn và đôi chân dài hơn. Độ dài qua gối, chân váy mang đến vẻ lịch thiệp, tinh tế, phù hợp cho nhiều dịp khác nhau, từ công sở đến các sự kiện quan trọng.\r\n\r\nChi tiết xếp layers độc đáo tạo sự chuyển động nhẹ nhàng mà bồng bềnh. Phần phối đai nổi bật, tôn lên vòng eo nhỏ gọn, hoàn thiện vẻ ngoài thanh lịch và thời thượng.\r\n\r\nChân váy Layers dễ dàng phối hợp cùng áo sơ mi, áo thun hay blazer để tạo nên nhiều phong cách khác nhau, từ trang nhã đến năng động.\r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'VAYP2S1.jpg'),
(95, 'Chân váy Khaki xếp ly', 28, 44, 1090.000, '1000', 'Chân váy Khaki xếp ly độ dài qua gối kết hợp cùng chi tiết đính khuy phần eo trẻ trung. Dây kéo khóa ẩn khéo léo. \r\n\r\nThiết kế thanh lịch mang vẻ sang trọng nhưng vẫn trẻ trung phù hợp diện trong nhiều dịp khác nhau. Kết hợp chân váy cùng áo sơ mi hoặc áo thun, áo kiểu là nàng đã có ngay outfit đến nơi công sở, cafe cùng bạn bè. \r\n\r\nThông tin mẫu:\r\n\r\nChiều cao: 165 cm\r\n\r\nCân nặng: 49 kg\r\n\r\nSố đo 3 vòng: 81-63-90 cm\r\n\r\nMẫu mặc size S\r\n\r\nLưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.', ' Chi tiết bảo quản sản phẩm : \r\n\r\n* Các sản phẩm thuộc dòng cao cấp (Senora) và áo khoác (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.\r\n\r\n* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh bai giãn.\r\n\r\n* Vải voan, lụa, chiffon nên giặt bằng tay.\r\n\r\n* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì có thể giặt máy.\r\n\r\n* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí voan, lụa, đá cườm thì cần giặt tay.\r\n\r\n* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu jeans. Nếu giặt thì nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên giặt chung cùng đồ sáng màu, tránh dính màu vào các sản phẩm khác. \r\n\r\n* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu, phân biệt màu và loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm với xà phòng có chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.\r\n\r\n* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt nhẹ, vắt mức trung bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi giặt.\r\n\r\n* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp sẽ dễ bị phai bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ giữ màu vải tốt hơn.\r\n\r\n* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.\r\n\r\n* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. ', 'VAYP4S1.jpg'),
(97, 'Chân váy Tweed chữ A', 28, 44, 990.000, '900', 'test123', 'test123', '55398b80d2b3d3e43327a1626013d14e.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `product_id` int(11) NOT NULL,
  `product_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_images`
--

INSERT INTO `tbl_product_images` (`product_id`, `product_images`) VALUES
(34, '0fc2f1ea3df09fcfc35ce1f2ac4ba207.jpg'),
(34, '2976ce1426f7ac36fb9fd8c0e9a53bb4.jpg'),
(34, 'ffa850ca2f9c1e84460152587cceec9c.jpg'),
(35, '7d7bf0de3167e4f62d4e7d3c195b4cf5.jpg'),
(35, 'a4863429a51bdfbc4858e6b2e954ef39.jpg'),
(35, 'fd7975555480213a0ff6bd2bf8edd1d1.jpg'),
(36, 'b689f0d19aa6ccadbee03de08c6e2a44.jpg'),
(36, 'b77147765932cb378649a5e8e3dda4f2.jpg'),
(36, 'f96086e7e184f3d30a29ff538e77570d.jpg'),
(37, '7170dd8e51d879c202da09a5d4a9b0b4.jpg'),
(37, '3283312fdf61ba66fe938bae963ab3b0.jpg'),
(37, '44950635ed4c2fc868e9cb6837136d6d.jpg'),
(38, '7170dd8e51d879c202da09a5d4a9b0b4.jpg'),
(38, '3283312fdf61ba66fe938bae963ab3b0.jpg'),
(38, '44950635ed4c2fc868e9cb6837136d6d.jpg'),
(39, '7170dd8e51d879c202da09a5d4a9b0b4.jpg'),
(39, '3283312fdf61ba66fe938bae963ab3b0.jpg'),
(39, '44950635ed4c2fc868e9cb6837136d6d.jpg'),
(40, '2db850e792719562627a8d85fbccce3b.jpg'),
(40, '7eae11c6e5bf8f7468c4068411558c7e.jpg'),
(40, 'cca76efa768d4c2df8880efcd058ce52.jpg'),
(41, '07a992ab0c0446c30afdb79f8032e409.jpg'),
(41, '27ed531f063c96ada3439503ea7d597b.jpg'),
(41, 'f8134754dcdf3764948bff0e0d9c605f.jpg'),
(42, 'bandau.jpg'),
(42, 'BATDAU.jpg'),
(42, 'BAI TAP 1 BAT DAU.jpg'),
(43, '7170dd8e51d879c202da09a5d4a9b0b4.jpg'),
(43, '3283312fdf61ba66fe938bae963ab3b0.jpg'),
(43, '44950635ed4c2fc868e9cb6837136d6d.jpg'),
(44, '7eae11c6e5bf8f7468c4068411558c7e.jpg'),
(44, 'a93ce928fbbbd88df4100e23ad0073ae.jpg'),
(44, 'cca76efa768d4c2df8880efcd058ce52.jpg'),
(45, '4df214466a1123ba7e1b72c64eee0266.jpg'),
(45, '07a992ab0c0446c30afdb79f8032e409.jpg'),
(45, '27ed531f063c96ada3439503ea7d597b.jpg'),
(46, 'Download-Fish-PNG-14.png'),
(46, 'download-free-fish-png-transparent-images-transparent-backgrounds-tropical-fish-clipart-png-file-14.png'),
(46, 'Download-Real-Fish-PNG-Image.png'),
(47, '7170dd8e51d879c202da09a5d4a9b0b4.jpg'),
(47, '3283312fdf61ba66fe938bae963ab3b0.jpg'),
(47, '44950635ed4c2fc868e9cb6837136d6d.jpg'),
(48, '4df214466a1123ba7e1b72c64eee0266.jpg'),
(48, '07a992ab0c0446c30afdb79f8032e409.jpg'),
(48, '27ed531f063c96ada3439503ea7d597b.jpg'),
(49, '7170dd8e51d879c202da09a5d4a9b0b4.jpg'),
(49, '3283312fdf61ba66fe938bae963ab3b0.jpg'),
(49, '44950635ed4c2fc868e9cb6837136d6d.jpg'),
(50, '7eae11c6e5bf8f7468c4068411558c7e.jpg'),
(50, 'a93ce928fbbbd88df4100e23ad0073ae.jpg'),
(50, 'cca76efa768d4c2df8880efcd058ce52.jpg'),
(51, '2b18e760838e8241c271a4cc0491ef41.jpg'),
(51, 'a6d492363951a2221de7949f4fb7444c (1).jpg'),
(51, 'ce5394d21ee78952c352fb324bb50d6d.jpg'),
(52, '5bec0661974f808b286b920e744db8d7.jpg'),
(52, '663ae54716f0b1cee234e4fb19a2ef2b.jpg'),
(52, 'ee6bdfc0772d4cefab38b8cb2f384f62.jpg'),
(53, '1e21e091cc1f6e12d5c55c31b2982641.jpg'),
(53, '15906b6335b0ea696325fac5bc5efac9.jpg'),
(53, 'b448d85a04aa91af37c46895392ad2f4.jpg'),
(54, 'NAMAOP1S2.jpg'),
(54, 'NAMAOP1S3.jpg'),
(54, 'NAMAOP1S4.jpg'),
(55, 'NAMAOP2S2.jpg'),
(55, 'NAMAOP2S3.jpg'),
(55, 'NAMAOP2S4.jpg'),
(56, 'NAMAOP3S2.jpeg'),
(56, 'NAMAOP3S3.jpeg'),
(56, 'NAMAOP3S4.jpeg'),
(57, 'NAMAOP5S2.jpeg'),
(57, 'NAMAOP5S3.jpeg'),
(57, 'NAMAOP5S4.jpeg'),
(58, 'NAMAOP6S2.jpeg'),
(58, 'NAMAOP6S3.jpeg'),
(58, 'NAMAOP6S4.jpeg'),
(59, 'NAMAOP7S2.jpeg'),
(59, 'NAMAOP7S3.jpeg'),
(59, 'NAMAOP7S4.jpeg'),
(60, 'NAMAOP8S2.jpeg'),
(60, 'NAMAOP8S3.jpeg'),
(60, 'NAMAOP8S4.jpeg'),
(61, 'NAMKHOACP2S2.jpeg'),
(61, 'NAMKHOACP2S3.jpg'),
(61, 'NAMKHOACP2S4.jpeg'),
(62, 'NAMKHOACP3S2.jpg'),
(62, 'NAMKHOACP3S3.jpeg'),
(62, 'NAMKHOACP3S4.jpeg'),
(63, 'NAMKHOACP5S2.jpg'),
(63, 'NAMKHOACP5S3.jpg'),
(63, 'NAMKHOACP5S4.jpg'),
(64, 'NAMKHOACP4S2.jpeg'),
(64, 'NAMKHOACP4S3.jpeg'),
(64, 'NAMKHOACP4S4.jpeg'),
(65, 'NAMQUANP1S2.jpg'),
(65, 'NAMQUANP1S3.jpg'),
(65, 'NAMQUANP1S4.jpg'),
(66, 'NAMQUANP2S2.jpeg'),
(66, 'NAMQUANP2S3.jpeg'),
(66, 'NAMQUANP2S4.jpeg'),
(67, 'NAMQUANP3S2.jpeg'),
(67, 'NAMQUANP3S3.jpeg'),
(67, 'NAMQUANP3S4.jpeg'),
(68, 'NAMQUANP4S2.jpeg'),
(68, 'NAMQUANP4S3.jpeg'),
(68, 'NAMQUANP4S4.jpeg'),
(69, 'NAMQUANP6S2.jpeg'),
(69, 'NAMQUANP6S3.jpg'),
(69, 'NAMQUANP6S4.jpg'),
(70, 'NAMQUANP7S2.jpg'),
(70, 'NAMQUANP7S3.jpeg'),
(70, 'NAMQUANP7S4.jpeg'),
(71, 'NAMQUANP8S2.jpg'),
(71, 'NAMQUANP8S3.jpg'),
(71, 'NAMQUANP8S4.jpg'),
(72, 'NAMQUANP9S2.jpg'),
(72, 'NAMQUANP9S3.jpg'),
(72, 'NAMQUANP9S4.jpg'),
(73, '8-2-computer-pc-png-images.png'),
(73, 'computer_pc_PNG17495.png'),
(73, 'laptop_PNG5905.png'),
(74, 'VAYP3S2.jpg'),
(74, 'VAYP3S3.jpg'),
(74, 'VAYP3S4.jpg'),
(75, 'AONUP1S2.jpeg'),
(75, 'AONUP1S3.jpeg'),
(75, 'AONUP1S4.jpeg'),
(76, 'AONUP3S2.jpeg'),
(76, 'AONUP3S3.jpeg'),
(76, 'AONUP3S4.jpeg'),
(77, 'AONUP4S1.jpg'),
(77, 'AONUP4S2.jpg'),
(77, 'AONUP4S3.jpg'),
(78, 'AONUP2S2.jpg'),
(78, 'AONUP2S3.jpg'),
(78, 'AONUP2S4.jpg'),
(79, 'BOYP1S2.jpg'),
(79, 'BOYP1S3.jpg'),
(79, 'BOYP1S4.jpg'),
(80, 'GIRLP1S2.jpg'),
(80, 'GIRLP1S3.jpg'),
(80, 'GIRLP1S4.jpg'),
(81, 'GIRLP2S2.jpg'),
(81, 'GIRLP2S3.jpg'),
(81, 'GIRLP2S4.jpg'),
(82, 'GIRLP3S2.jpg'),
(82, 'GIRLP3S3.jpg'),
(82, 'GIRLP3S4.jpg'),
(83, 'GIRLP4S2.jpg'),
(83, 'GIRLP4S3.jpg'),
(83, 'GIRLP4S4.jpg'),
(84, 'GIRLP5S2.jpg'),
(84, 'GIRLP5S3.jpg'),
(84, 'GIRLPS=5S4.jpg'),
(85, 'BOYP2S2.jpg'),
(85, 'BOYP2S3.jpg'),
(85, 'BOYP2S4.jpg'),
(86, 'BOYP3S2.jpg'),
(86, 'BOYP3S3.jpg'),
(86, 'BOYP3S4.jpg'),
(87, '00__38__171640037264489bb2cf1b7a9d8d8bc8_medium.jpg'),
(87, '00__39__8a669f7ee0a0406b99a05fba41c45973_medium.jpg'),
(87, 'dsc05197_copy_7181aec87bd344f6b3c5863a4f4517c9_medium.jpg'),
(88, 'KHOACNUP1S2.jpeg'),
(88, 'KHOACNUP1S3.jpeg'),
(88, 'KHOACNUP1S4.jpeg'),
(89, 'KHOACNUP2S2.jpg'),
(89, 'KHOACNUP2S3.jpg'),
(89, 'KHOACNUP2S4.jpg'),
(90, 'KHOACNUP3S2.jpg'),
(90, 'KHOACNUP3S3.jpg'),
(90, 'KHOACNUP3S4.jpg'),
(91, 'KHOACNUP4S2.jpg'),
(91, 'KHOACNUP4S3.jpeg'),
(91, 'KHOACNUP4S4.jpeg'),
(92, 'KHOACNUP5S2.jpg'),
(92, 'KHOACNUP5S3.jpg'),
(92, 'KHOACNUP5S4.jpg'),
(93, 'VAYNUP1S2.jpeg'),
(93, 'VAYNUP1S3.jpg'),
(93, 'VAYNUP1S4.jpeg'),
(94, 'VAYP2S2 - Copy.jpg'),
(94, 'VAYP2S3 - Copy.jpg'),
(94, 'VAYP2S4 - Copy.jpg'),
(95, 'VAYP4S2.jpg'),
(95, 'VAYP4S3.jpg'),
(95, 'VAYP4S4.jpg'),
(96, 'VAYP9S2.jpeg'),
(96, 'VAYP9S3.jpeg'),
(96, 'VAYP9S4.jpeg'),
(97, '00__39__8a669f7ee0a0406b99a05fba41c45973_medium.jpg'),
(97, '4_e6d7e00eccdb47c7b3d9cc715ee3620b_medium.webp'),
(97, '24_a7c1fc8c15044b51a0548e1cfdfc3940_medium.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `phone`, `address`, `email`, `user`, `pass`, `role`) VALUES
(7, 'nguyen van a', 372990757, 'long hải long điền brvt', 'trungnghia22102003@gmail.com', 'nghia03', '123', 1),
(12, 'nghia', 12312312, 'asdasd', 'nghia@gmail.com', 'usertest1', '123', 0),
(13, 'usertest123', 12313123, 'long hai long dien brvt', 'usertest@gmail.com', 'usertest2', '123', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `fk_brand_cartegory` (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`iddonhang`),
  ADD KEY `tbl_donhang_users` (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `iddonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
