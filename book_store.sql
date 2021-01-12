-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2020 lúc 10:06 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `MaBL` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `MaKH` int(11) DEFAULT NULL,
  `TieuDe` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NoiDung` varchar(300) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ThoiGian` datetime DEFAULT NULL,
  `TrangThai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`MaBL`, `MaSP`, `MaKH`, `TieuDe`, `NoiDung`, `ThoiGian`, `TrangThai`) VALUES
(1, 55, 2, 'Đã mua sách này', ' Trong độ xuân xanh phơi phới ngày ấy, bạn không dám mạo hiểm, không dám nỗ lực để kiếm học bổng, không chịu tìm tòi những thử thách trong công việc', '2020-07-28 00:00:00', 0),
(2, 54, 2, 'Tôi đã đọc hết cuốn sách này', ' Thực sự đây là cuốn sách rất đáng để đọc', '2020-07-29 00:00:00', 0),
(3, 55, 14, 'Sách rất hay', ' Nếu bạn đam mê các loại sách kỹ năng sống, thì cuốn sách này dành cho bạn', '2020-07-29 00:00:00', 0),
(16, 7, 2, NULL, 'Tác phẩm kiệt xuất của nhà văn nam cao, sau bao nhiêu năm nó lại được tái hiện vào những vlog hài hước của 1977, rất được nhiều người ưa thích', '2020-09-07 00:00:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `MaCTD` int(11) NOT NULL,
  `MaDH` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdonhang`
--

INSERT INTO `ctdonhang` (`MaCTD`, `MaDH`, `MaSP`, `SoLuong`, `DonGia`) VALUES
(135, 95, 57, 3, 75000),
(136, 95, 54, 1, 65000),
(137, 95, 4, 1, 58400),
(138, 96, 57, 1, 75000),
(139, 97, 55, 1, 60000),
(140, 97, 54, 1, 65000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `MaCTPN` int(11) NOT NULL,
  `MaPN` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `DonGiaNhap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`MaCTPN`, `MaPN`, `MaSP`, `SoLuongNhap`, `DonGiaNhap`) VALUES
(2, 'PN001', 50, 20, 120000),
(3, 'PN001', 51, 20, 150000),
(5, 'PN001', 52, 20, 140000),
(6, 'PN001', 53, 20, 107000),
(7, 'PN003', 54, 20, 65000),
(8, 'PN003', 55, 20, 60000),
(9, 'PN003', 56, 20, 126000),
(10, 'PN004', 57, 20, 75000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaKH` int(11) DEFAULT NULL,
  `NgayLap` date DEFAULT NULL,
  `NgayGiao` date DEFAULT NULL,
  `HoTenNN` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` int(11) NOT NULL,
  `DiaChiNN` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MaNV` char(6) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaKH`, `NgayLap`, `NgayGiao`, `HoTenNN`, `SDT`, `DiaChiNN`, `TrangThai`, `MaNV`) VALUES
(95, 2, '2020-09-15', '2020-09-15', 'Bùi Quang Lâm', 985034000, 'H. Krông Pắc, Đăk Lắc, Việt Nam', 'giao thành công', 'NV0003'),
(96, 2, '2020-09-25', NULL, 'Bùi Quang Lâm', 985034000, 'H. Krông Pắc, Đăk Lắc, Việt Nam', 'đang giao hàng', 'NV0003'),
(97, 2, '2020-09-25', NULL, 'Bùi Quang Lâm', 985034000, 'H. Krông Pắc, Đăk Lắc, Việt Nam', 'đã tiếp nhận', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TaiKhoan` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MatKhau` varchar(2000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `HoTen` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Email` varchar(25) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `SDT` float DEFAULT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `TrangThai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TaiKhoan`, `MatKhau`, `HoTen`, `Email`, `SDT`, `DiaChi`, `TrangThai`) VALUES
(1, 'hoang123', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn Hoàng', 'Hoang@gmail.com', 985064000, '17 Lê Đô, Phường Thanh Khê, TP  Đà nẵng', 1),
(2, 'buiquanglam', 'e10adc3949ba59abbe56e057f20f883e', 'Bùi Quang Lâm', 'buiquanglam2696@gmail.com', 985034000, 'H. Krông Pắc, Đăk Lắc, Việt Nam', 1),
(14, 'huysieuto', 'e10adc3949ba59abbe56e057f20f883e', 'Văn Đức Huy', 'Vanhuy11@gmail.com', 985034000, 'Hòa Hiệp, Thăng Bình, Quảng Nam', 1),
(16, 'vietsinh99', 'fcea920f7412b5da7be0cf42b8c93759', 'Lê Viết Sinh', 'vietsinh@gmail.com', 985054000, '13 Thôn 2, Tam Hợp, Điện bàn, Quảng Nam', 1),
(17, 'dungsendo', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Quốc Dũng', 'trandung2k@gmail.com', 98765900, 'Tam Tiến, Thăng Bình, Quảng Nam', 1),
(18, 'baonguyen', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Bảo', 'keneml@gmail.com', 913653000, 'k93/99 Biện Biên Phủ, Thanh Khê, TP Đà Nẵng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoai` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenLoai` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoai`, `TenLoai`) VALUES
('CNTT01', 'Sách công nghệ thông tin'),
('KHCN01', 'Sách khoa học công nghệ'),
('KHTL01', 'Sách khoa học tâm lý'),
('KHTN01', 'Sách khoa học tự nhiên'),
('NT01', 'Tiểu thuyết ngôn tình'),
('PT01', 'Sách phát triển bản thân'),
('TT01', 'Tiểu thuyết trinh thám'),
('TTDG01', 'Truyện tranh dân gian'),
('TTN01', 'Truyện tranh thiếu nhi'),
('VHNN01', 'Văn học nước ngoài'),
('VHVN01', 'Văn học việt nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacc`
--

CREATE TABLE `nhacc` (
  `MaNCC` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenNCC` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` int(11) NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Email` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacc`
--

INSERT INTO `nhacc` (`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `Email`) VALUES
('Fahasa', 'FaHaSha Book Đà Nẵng', 985034654, '135 Lê Duẩn, Quận Hải Châu, TP Đà Nẵng', 'fahasa@gmail.com'),
('FNEW', 'First New việt nam', 815161894, '12 Cao Thắng, Phường Đa cao, Quận 1, TP HCM', 'firstnewvn@gmail.com'),
('THBOOK', 'Thái Hà Book', 985034354, '128 Ba Đình,Phường Mai Dịch, Quận Cầu Giấy, Hà Nội', 'thaihabook@yahoo.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` char(6) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenNV` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TaiKhoan` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MatKhau` varchar(2000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` int(11) DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MaQuyen` int(1) DEFAULT NULL,
  `TrangThai` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `TaiKhoan`, `MatKhau`, `SDT`, `DiaChi`, `MaQuyen`, `TrangThai`) VALUES
('NV0001', 'Bùi Quang Lâm', 'buiquanglam@hkbook', 'e10adc3949ba59abbe56e057f20f883e', 985034354, 'Đà Nẵng', 1, 1),
('NV0002', 'Nguyễn văn A', 'nguyena@hkbook', 'e10adc3949ba59abbe56e057f20f883e', 985034354, 'KOntum', 2, 1),
('NV0003', 'Nguyễn Văn B', 'nguyenb@hkbook', 'e10adc3949ba59abbe56e057f20f883e', 190008198, 'thăng bình, quảng nam', 3, 1),
('NV0004', 'Lê Văn Toàn', 'vantoan@hkbook', 'e10adc3949ba59abbe56e057f20f883e', 985034354, 'Hòa minh, Hòa Vang, Đà Nẵng', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaNV` char(6) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MaNCC` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNV`, `MaNCC`, `NgayLap`) VALUES
('PN001', 'NV0003', 'THBOOK', '2020-07-21 00:00:00'),
('PN003', 'NV0003', 'Fahasa', '2020-07-25 00:00:00'),
('PN004', 'NV0003', 'FNEW', '2020-09-13 00:00:00'),
('PN005', 'NV0003', 'FNEW', '2020-09-25 00:00:00'),
('PN006', 'NV0003', 'Fahasa', '2020-09-25 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MaQuyen` int(1) NOT NULL,
  `TenQuyen` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`) VALUES
(1, 'Quản Trị Viên'),
(2, 'Nhân Viên Bán Hàng'),
(3, 'Nhân Viên Kho');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaLoai` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MaTG` int(11) DEFAULT NULL,
  `Hinh` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DonGia` int(11) NOT NULL,
  `SoluongCon` int(11) NOT NULL,
  `NXB` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MoTa` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GiamGia` int(100) DEFAULT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaLoai`, `MaTG`, `Hinh`, `DonGia`, `SoluongCon`, `NXB`, `MoTa`, `GiamGia`, `TrangThai`) VALUES
(2, 'Nhà Giả Kim', 'PT01', 17, 'nhagiakim.jpg', 45000, 5, 'Nhà xuất bản lao động', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.\r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”', 0, 0),
(3, 'Đời Thay Đổi Khi Ta Thay Đổi', 'PT01', 15, 'doithaydoi.jpg', 75000, 4, 'Nhà xuất bản trẻ', 'Đời thay đổi khi chúng ta thay đổi nói về việc tại sao có những người dường như lúc nào cũng ở đúng nơi và đúng lúc – và làm thế nào bạn cũng được như họ; tại sao hóa đơn tính tiền luôn luôn tới ngay tức khắc; tại sao đèn giao thông cứ ở màu đỏ hoài cả nửa ngày trong khi bạn đang trễ một cuộc hẹn là', 20, 0),
(4, 'Chiến Thắng Con Quỷ Trong Bạn', 'PT01', 10, 'conquy.jpg', 73000, 3, 'Nhà xuất bản trẻ', 'Được dịch từ tiếng Anh-Outwting the Devil là một cuốn sách ban đầu được viết vào năm 1938 bởi Napoleon Hill, với chú thích của Sharon Lechter. Ban đầu nó được viết bởi Hill, nhưng được cho là quá gây tranh cãi khi được xuất bản trong khoảng thời gian đó. Nó được phát hành bởi Sterling Publishing vào', 20, 0),
(5, 'Nghĩ Giàu Làm Giàu', 'PT01', 10, 'nghigiau.jpg', 76000, 6, 'Nhà xuất bản trẻ', '“Nghĩ giàu và Làm Giàu” một cuốn sách kinh điển về làm giàu, làm người của Napoleon Hill nổi tiếng toàn thế giới với 60 triệu bản được bán suốt 70 năm qua. Cuốn sách là tinh hoa được tác giả Napoleon Hill dành toàn bộ thời gian và công sức suốt gần 30 năm để phỏng vấn hơn 500 người nổi tiếng và thàn', 10, 0),
(6, 'Dế Mèn Phiêu Lưu Ký', 'TTN01', 12, 'demen.jpg', 35000, 5, 'Nhà xuất thiếu nhi', 'Dế Mèn phiêu lưu ký là tác phẩm văn xuôi đặc sắc và nổi tiếng nhất của nhà văn Tô Hoài viết về loài vật, dành cho lứa tuổi thiếu nhi. Ban đầu truyện có tên là \"Con dế mèn\" do Nhà xuất bản Tân Dân, Hà Nội phát hành năm 1941. Sau đó, được sự ủng hộ nhiệt tình của nhân dân, Tô Hoài viết thêm truyện Dế ', 0, 0),
(7, 'Lão Hạc', 'VHVN01', 13, 'laohac.jpg', 45000, 3, 'Nhà xuất bản văn học', 'Lão Hạc là một truyện ngắn của nhà văn Nam Cao được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.\r\n\r\nLão Hạc, một người nông dân chất phác, hiền lành. Lão góa vợ và có một người con trai nhưng vì quá nghèo nên không thể lấy vợ cho người con trai của mình. Người con trai lão vì thế đã rời bỏ quê hương để đến đồn điền cao su làm ăn kiếm tiền. Lão luôn trăn trở, suy nghĩ về tương lai của đứa con. Lão sống bằng nghề làm vườn, mảnh vườn mà vợ lão đã mất bao công sức để mua về và để lại cho con trai lão. So với những người khác lúc đó, gia cảnh của lão khá đầy đủ, tuy nhiên do ốm yếu hơn hai tháng và cũng vì trận bão mà lão không có việc gì để làm .\r\n\r\nLão có một con chó tên là Vàng - con chó do con trai lão trước khi đi đồn điền cao su đã để lại. Lão vừa coi như con vừa coi như một người thân trong gia đình. Tuy nhiên, vì gia cảnh nghèo khó không nuôi nổi nó nên ông lão đành cắn răng bán con chó đi. Lão đã rất dằn vặt bản thân mình khi mang một \"tội lỗi\" là đã nỡ tâm \"lừa một con chó\". Lão đã khóc rất nhiều với ông giáo (người hàng xóm thân thiết của lão). Nhưng cũng kể từ đó, lão sống khép kín, lủi thủi một mình. Rồi một hôm, lão quyết định tìm đến cái chết để được giải thoát sau bao tháng ngày cùng cực, đau khổ.\r\n\r\nVà sau khi trao gửi hết tài sản cũng như nhờ vả chuyện ma chay sau này cho ông giáo, Lão Hạc đã kết thúc cuộc đời bằng một liều bả chó do xin từ Binh Tư. Cái chết của lão đau đớn và dữ dội, gây cho người đọc nhiều sự xúc động, xót xa. Lão chết để bảo toàn lòng tự trọng của mình, không để cho cái đói, cái nghèo dồn vào con đường tha hóa như Binh Tư.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', 20, 0),
(8, 'Chí Phèo', 'VHVN01', 13, 'chipheo.jpg', 35000, 5, 'Nhà xuất bản văn học', 'Chí Phèo là một truyện ngắn nổi tiếng của nhà văn Nam Cao viết vào tháng 2 năm 1941. Chí Phèo là một tác phẩm xuất sắc, thể hiện nghệ thuật viết truyện độc đáo của Nam Cao, đồng thời là một tấn bi kịch của một người nông dân nghèo bị tha hóa trong xã hội. Hiện nay, truyện đã được đưa vào sách giáo khoa Ngữ Văn 11, tập 1. Chí Phèo cũng là tên nhân vật chính của truyện.\r\n\r\nTruyện ngắn Chí Phèo, nguyên có tên là Cái lò gạch cũ; khi in thành sách lần đầu năm 1941, Nhà Xuất bản Đời mới - Hà Nội tự ý đổi tên là Đôi lứa xứng đôi. Đến khi in lại trong Tập Luống cày (do Hội Văn hóa cứu quốc xuất bản, Hà Nội, 1946), Nam Cao đặt lại tên là Chí Phèo.\r\n\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', 0, 0),
(9, 'Cho Tôi Một Vé Về Tuổi Thơ', 'VHVN01', 11, 'tuoitho.jpg', 65000, 5, 'Nhà xuất bản văn học', 'Truyện Cho tôi xin một vé đi tuổi thơ là sáng tác mới nhất của nhà văn Nguyễn Nhật Ánh. Nhà văn mời người đọc lên chuyến tàu quay ngược trở lại thăm tuổi thơ và tình bạn dễ thương của 4 bạn nhỏ. Những trò chơi dễ thương thời bé, tính cách thật thà, thẳng thắn một cách thông minh và dại dột, những ước mơ tự do trong lòng… khiến cuốn sách có thể làm các bậc phụ huynh lo lắng rồi thở phào. Không chỉ thích hợp với người đọc trẻ, cuốn sách còn có thể hấp dẫn và thực sự có ích cho người lớn trong quan hệ với con mình.', 0, 0),
(10, 'Mắt Biếc', 'VHVN01', 11, 'matbiec.jpg', 85000, 5, 'Nhà xuất bản trẻ', 'Mắt biếc là một tác phẩm của tác giả Nguyễn Nhật Ánh trong loạt truyện viết về tình yêu của thanh thiếu niên của tác giả này cùng với Thằng quỷ nhỏ, Cô gái đến từ hôm qua... Đây được xem là một trong những tác phẩm tiêu biểu của Nguyễn Nhật Ánh, từng được dịch giả Kato Sakae dịch để giới thiệu với độc giả Nhật Bản với tựa đề \"つぶらな瞳\".', 0, 0),
(11, 'Rừng Nauy', 'VHNN01', 16, 'rungnauy.jpg', 105000, 5, 'Nhà xuất bản trẻ', 'Rừng Na-Uy là tiểu thuyết của nhà văn Nhật Bản Murakami Haruki, được xuất bản lần đầu năm 1987. Với thủ pháp dòng ý thức, cốt truyện diễn tiến trong dòng hồi tưởng của nhân vật chính là chàng sinh viên bình thường Watanabe Tōru. Cậu ta đã trải qua nhiều cuộc tình chớp nhoáng với nhiều cô gái trẻ ưa ', 30, 0),
(12, 'Là khói hay sương', 'NT01', 13, 'khoihaysuong.jpg', 28000, 7, 'Nhà xuất bản trẻ', 'Hoàng tử kế vị Thâng Kiêng của vương quốc An Tư bất ngờ bị ám sát trong một đêm mưa bão ở một ngọn hải đăng, xác rơi xuống biển mất tích. Sau nhiều cuộc tìm kiếm không có kết quả, vua An Tư chiếu cáo xác nhận hoàng tử đã chết và tiến hành truy lùng hung thủ.\r\n\r\n   Cái chết của hoàng tử Thâng Kiêng đã châm ngòi cho cuộc tranh đấu giành quyền vị của bốn vị hoàng tử còn lại. Cuộc chiến cuối cùng kết thúc và vị vua mới được đăng lên ngôi vị nhưng cũng là lúc vụ án ám sát năm xưa được mở ra lần nữa.\r\n\r\n   Giấc mộng vương quyền cũng mờ nhạt như làn sương khói mỏng manh...', 0, 0),
(13, 'Chỉ là anh giấu đi', 'NT01', 11, 'giaudi.jpg', 48000, 5, 'Nhà xuất bản trẻ', 'Nội dung câu chuyện chủ yếu xoay quanh cuộc đời Duy Thanh, một chàng trai lớn lên ở cô nhi viện. Anh gặp Mỹ Hạnh và cả hai bắt đầu yêu nhau.\r\n\r\nCũng như bao chuyện tình khác, hai người luôn gặp phải nhiều trắc trở và biến cố trong tình yêu. Sau khi vượt qua nhiều sóng gió, liệu rằng hạnh phúc có thể mỉm cười và hai người có thể ở bên nhau sau những gì trải qua.', 0, 0),
(14, 'Nhân Gian Tất Cả Đều Là Gặp Gỡ', 'NT01', 19, 'nhangiandeudogapgo.jpg', 104000, 5, 'Nhà xuất bản hà nội', 'Cuốn sách của thời thanh xuân đơn thuần đẹp đẽ đến từ nhóm tác giả hàng đầu Trung Quốc với hơn 18 triệu fan hâm mộ.\r\nHàng nghìn bản đã được bán ra ngay trong những ngày phát hành đầu tiên, cũng như luôn đứng top best seller của các website đặt sách online tại Trung Quốc. Nhóm tác giả THẬP ĐIỂM ĐỘC THƯ của “Nhân gian tất cả đều là gặp gỡ” đã thật sự tạo nên một làn gió mát lành, chạm đến tâm hồn của từng độc giả.\r\nMỗi câu chuyện được kể trong cuốn sách này như một cuốn nhật kí ghi chép lại những hỉ -nộ- ái- ố trong cuộc sống thường ngày của mỗi chúng ta, nhưng sau đó chính là những cảm xúc  thật sự khắc cốt ghi tâm còn đọng lại trong tâm trí.\r\nChúng ta đang sợ hãi điều gì? Trưởng thành, lạc bước, mông lung, tuyệt vọng, chẳng thể tiến lên, cô độc,  chọn nhầm con đường, hay  đau đáu về một bóng hình mãi không thể nào quên?\r\nChúng ta vẫn nuối tiếc thanh xuân đã qua cùng với mối tình đầu trong trẻo, mà không nhận ra rằng, có thể gặp được nhau đã là khúc dạo đầu tuyệt vời nhất rồi. Rằng rất nhiều chuyện tình duyên tốt đẹp trên gian này đều bắt nguồn từ vô vàn các cuộc gặp gỡ nối tiếp nhau. Chúng giống như những mầm cây vậy, chậm rãi nảy mầm trong cuộc sống, có thể sẽ ra hoa, có thể sẽ kết quả.\r\n', 0, 0),
(15, 'Một Chén Rượu Có Thể Xoa Dịu Hồng Trần', 'NT01', 20, 'toicomotchenruou.jpg', 65000, 5, 'Nhà xuất bản hồng đức', 'Mỗi người sống trên thế gian này, thật ra trong lòng đều cất giữ những câu chuyện khác nhau, có thể là về những người ấm áp, cũng có thể là về những điều nuối tiếc. Chuyện đời thay đổi luôn khiến người ta thấy thương cảm, nhưng hồi ức là bằng chứng duy nhất về sự gặp gỡ giữa người với người, hễ đem hồi ức ra là sẽ thành câu chuyện.\r\n\r\nMở đầu của câu chuyện đa phần là một thoáng gặp gỡ bất ngờ, sau đó chớp mắt đã vạn năm, phần kết của câu chuyện luôn là càng đi càng xa, không còn thấy nổi bóng hình. Có lẽ những cuộc gặp gỡ đều rất đẹp đẽ, nhưng kết cục lại thường không như ý, nhưng cuộc đời là vậy, điều đẹp đẽ nằm ở chỗ, chúng ta không có cách nào đoán trước được gì.\r\n\r\nNhững câu chuyện trong cuốn sách này, có thể cho đến cuối đời cũng sẽ không xảy ra với bạn, nhưng chẳng ai dám nói chúng chưa từng xảy ra trên thế gian này, chỉ là tôi có may mắn gặp được những người đó, nghe được những chuyện đó, rồi kể lại cho bạn vào một thời điểm thích hợp.\r\n\r\nHy vọng những người bạn có duyên đọc được cuốn sách này, bất kể gặp phải chuyện gì cũng sẽ được như ý nguyện, đêm đêm có rượu, ngày ngày có những bài ca, có được trái tim tự do và gia đình yên vui, mùa đông thì ấm áp, mùa xuân không phải rét buốt, suốt đời luôn nở nụ cười trên môi.\r\n\r\n“Cầu chúc cho bạn dù có đối diện với cố nhân lâu ngày không gặp, hay tình cờ gặp lại người đã từng yêu mà chẳng thể có được, cho dù trong lòng có trời rung biển động, thì ngoài mặt vẫn không thể hiện dù chỉ là một chút gợn sóng. Gương mặt bình thản như không có chuyện gì xảy ra của bạn mới là gương mặt đẹp nhất.\r\n\r\n \r\n\r\nCầu chúc cho bạn có thể xông pha ngang dọc, cho dù có bị thương, có chảy máu, thì cũng phải yêu ghét phân minh, khóc cười thỏa sức như một thời niên thiếu đã từng qua.”\r\n\r\nNhững chuyện trong nhân gian có rất nhiều điều hối tiếc, nhưng mong rằng bạn có thể bốn mùa vô lo…', 0, 0),
(16, 'Thiên Tài Bên Trái, Kẻ Điên Bên Phải', 'PT01', 23, 'thientaibentrai.jpg', 105000, 5, 'Nhà xuất bản trẻ', 'NẾU MỘT NGÀY ANH THẤY TÔI ĐIÊN, THỰC RA CHÍNH LÀ ANH ĐIÊN ĐẤY!\r\n\r\nHỡi những con người đang oằn mình trong cuộc sống, bạn biết gì về thế giới của mình? Là vô vàn thứ lý thuyết được các bậc vĩ nhân kiểm chứng, là luật lệ, là cả nghìn thứ sự thật bọc trong cái lốt hiển nhiên, hay những triết lý cứng nhắc của cuộc đời?\r\n\r\nLại đây, vượt qua thứ nhận thức tẻ nhạt bị đóng kín bằng con mắt trần gian, khai mở toàn bộ suy nghĩ, để dòng máu trong bạn sục sôi trước những điều kỳ vĩ, phá vỡ mọi quy tắc. Thế giới sẽ gọi bạn là kẻ điên, nhưng vậy thì có sao? Ranh giới duy nhất giữa kẻ điên và thiên tài chẳng qua là một sợi chỉ mỏng manh: Thiên tài chứng minh được thế giới của mình, còn kẻ điên chưa kịp làm điều đó. Chọn trở thành một kẻ điên để vẫy vùng giữa nhân gian loạn thế hay khóa hết chúng lại, sống mãi một cuộc đời bình thường khiến bạn cảm thấy hạnh phúc hơn?\r\n\r\nThiên tài bên trái, kẻ điên bên phải là cuốn sách dành cho những người điên rồ, những kẻ gây rối, những người chống đối, những mảnh ghép hình tròn trong những ô vuông không vừa vặn… những người nhìn mọi thứ khác biệt, không quan tâm đến quy tắc. Bạn có thể đồng ý, có thể phản đối, có thể vinh danh hay lăng mạ họ, nhưng điều duy nhất bạn không thể làm là phủ nhận sự tồn tại của họ. Đó là những người luôn tạo ra sự thay đổi trong khi hầu hết con người chỉ sống rập khuôn như một cái máy. Đa số đều nghĩ họ thật điên rồ nhưng nếu nhìn ở góc khác, ta lại thấy họ thiên tài. Bởi chỉ những người đủ điên nghĩ rằng họ có thể thay đổi thế giới mới là những người làm được điều đó.', 0, 0),
(33, 'Những Nguyên Tắc Vàng của Napoleon Hill', 'PT01', 10, 'nguyentacvang.jpg', 65500, 5, 'Nhà xuất bản tổng hợp TP HCM', 'Napoleon Hill&nbsp;(1883 &ndash; 1970) được mệnh danh l&agrave; &ldquo;Người đặt nền tảng cho m&ocirc;n khoa học Th&agrave;nh c&ocirc;ng&rdquo;. &Ocirc;ng ch&iacute;nh l&agrave; người khơi nguồn cho d&ograve;ng s&aacute;ch khơi dậy những tiềm năng của con người với h&agrave;ng loạt những t&aacute;c phẩm nổi tiếng như&nbsp;Law of Success&nbsp;(Quy luật của sự th&agrave;nh c&ocirc;ng), Think and Grow Rich&nbsp;(C&aacute;ch nghĩ để th&agrave;nh c&ocirc;ng),&nbsp;The Magic Ladder of Success&nbsp;(Những nấc thang huyền b&iacute; dẫn tới th&agrave;nh c&ocirc;ng), Success through A Positive Mental Attitude&nbsp;(Th&agrave;nh c&ocirc;ng từ c&aacute;ch tư duy t&iacute;ch cực)&hellip; Những tư tưởng thể hiện trong c&aacute;c t&aacute;c phẩm của &ocirc;ng đều hướng đến mục ti&ecirc;u chung l&agrave; n&acirc;ng cao tầm ph&aacute;t triển của con người.</p>\r\n<p>D&ugrave; bạn l&agrave; ai, đang hoạt động trong lĩnh vực n&agrave;o, hiện giữ vị tr&iacute; ra sao trong x&atilde; hội th&igrave; việc n&acirc;ng cao chất lượng cuộc sống, biết nắm bắt những cơ hội gi&uacute;p ph&aacute;t huy những phẩm chất ưu trội của bản th&acirc;n, đạt được những mục ti&ecirc;u tầm cao l&agrave; ước muốn của bạn cũng như của biết bao người. V&igrave; vậy, một cuốn s&aacute;ch đ&oacute;ng vai tr&ograve; như một kim chỉ nam dẫn đường, một người bạn đồng h&agrave;nh gi&uacute;p bạn vượt qua những trở ngại trong cuộc sống, vươn tới những ch&acirc;n trời mới l&agrave; đều kh&ocirc;ng thể thiếu.</p>\r\n<p>Những nguy&ecirc;n tắc v&agrave;ng của Napoleon Hill tập hợp những b&agrave;i viết của t&aacute;c giả được đăng rải r&aacute;c tr&ecirc;n c&aacute;c tạp ch&iacute; tại từ năm 1919 đến 1923. L&agrave;m thế n&agrave;o để th&agrave;nh c&ocirc;ng trong việc thuyết phục người kh&aacute;c? Đ&acirc;u l&agrave; sự kỳ diệu của nguy&ecirc;n tắc &aacute;m thị v&agrave; tự &aacute;m thị một khi bạn biết sử dụng ch&uacute;ng đ&uacute;ng c&aacute;ch? Hay bạn c&oacute; biết c&aacute;ch vận dụng sức mạnh phi thường của t&acirc;m tr&iacute; để l&agrave;m chủ vận mệnh, tạo n&ecirc;n những bước đột ph&aacute; trong cuộc sống của ch&iacute;nh m&igrave;nh? Ch&iacute;nh trong tập s&aacute;ch n&agrave;y, bạn sẽ t&igrave;m thấy những nguy&ecirc;n tắc c&oacute; gi&aacute; trị thiết thực, tiếp th&ecirc;m sức mạnh cho bạn tr&ecirc;n h&agrave;nh tr&igrave;nh vươn đến th&agrave;nh c&ocirc;ng. H&atilde;y chi&ecirc;m nghiệm từng b&agrave;i học qu&yacute; trong Những nguy&ecirc;n tắc v&agrave;ng của Napoleon Hill&nbsp;v&agrave; thay đổi cuộc đời bạn.', 0, 0),
(50, 'Spring microsevice in Action', 'CNTT01', 25, 'spring in action.jpg', 120000, 5, 'Nhà xuất bản công nghệ', '<p>Spring microservice in Action được viết cho nh&agrave; ph&aacute;t triển Java / Spring thực h&agrave;nh, những người cần lời khuy&ecirc;n thực h&agrave;nh v&agrave; c&aacute;c v&iacute; dụ về c&aacute;ch x&acirc;y dựng v&agrave; vận h&agrave;nh c&aacute;c ứng dụng dựa tr&ecirc;n microservice. Khi t&ocirc;i viết cuốn s&aacute;ch n&agrave;y, t&ocirc;i muốn n&oacute; dựa tr&ecirc;n c&aacute;c mẫu microservice cốt l&otilde;i ph&ugrave; hợp với c&aacute;c v&iacute; dụ Spring Boot v&agrave; Spring Cloud thể hiện c&aacute;c mẫu đang hoạt động. Như vậy, bạn sẽ t&igrave;m thấy c&aacute;c mẫu thiết kế microservice cụ thể được thảo luận trong hầu hết c&aacute;c chương, c&ugrave;ng với c&aacute;c v&iacute; dụ về c&aacute;c mẫu được triển khai bằng Spring Boot v&agrave; Spring Cloud.</p>\r\n<p>Bạn n&ecirc;n đọc cuốn s&aacute;ch n&agrave;y nếu:</p>\r\n<p>Bạn l&agrave; một nh&agrave; ph&aacute;t triển Java, người c&oacute; kinh nghiệm x&acirc;y dựng c&aacute;c ứng dụng ph&acirc;n t&aacute;n (1-3 năm).<br />Bạn c&oacute; một nền tảng trong m&ugrave;a xu&acirc;n (hơn 1 năm).<br />Bạn c&oacute; thể quan t&acirc;m đến việc học c&aacute;ch x&acirc;y dựng c&aacute;c ứng dụng dựa tr&ecirc;n microservice.</p>', 0, 0),
(51, 'The Clean Code', 'CNTT01', 24, 'the clean coder.jpg', 150000, 5, 'Nhà xuất bản công nghệ', '<p><span><span>C&aacute;c lập tr&igrave;nh vi&ecirc;n chịu đựng v&agrave; th&agrave;nh c&ocirc;ng trong bối cảnh kh&ocirc;ng chắc chắn v&agrave; &aacute;p lực kh&ocirc;ng ngừng nghỉ c&oacute; chung một thuộc t&iacute;nh: Họ quan t&acirc;m s&acirc;u sắc đến thực tiễn tạo ra phần mềm.&nbsp;</span><span>Họ coi n&oacute; như một nghề thủ c&ocirc;ng.&nbsp;</span><span>Họ l&agrave; những chuy&ecirc;n gia.</span></span></p>\r\n<p>&nbsp;</p>\r\n<p><span><span>Trong&nbsp;</span><em><strong><span>The Clean Coder: Quy tắc ứng xử d&agrave;nh cho lập tr&igrave;nh vi&ecirc;n chuy&ecirc;n nghiệp,</span></strong></em><span>&nbsp;chuy&ecirc;n gia phần mềm huyền thoại Robert C. Martin giới thiệu c&aacute;c quy tắc, kỹ thuật, c&ocirc;ng cụ v&agrave; thực h&agrave;nh của nghề thủ c&ocirc;ng phần mềm thực sự.&nbsp;</span><span>Cuốn s&aacute;ch n&agrave;y được đ&oacute;ng g&oacute;i với lời khuy&ecirc;n thực tế của cộng đồng về tất cả mọi thứ, từ ước t&iacute;nh v&agrave; m&atilde; h&oacute;a đến t&aacute;i cấu tr&uacute;c v&agrave; thử nghiệm.&nbsp;</span><span>N&oacute; bao gồm nhiều hơn kỹ thuật: Đ&oacute; l&agrave; về th&aacute;i độ.&nbsp;</span><span>Martin chỉ ra c&aacute;ch tiếp cận ph&aacute;t triển phần mềm với danh dự, l&ograve;ng tự trọng v&agrave; niềm tự h&agrave;o;&nbsp;</span><span>l&agrave;m việc tốt v&agrave; l&agrave;m việc sạch sẽ;&nbsp;</span><span>giao tiếp v&agrave; ước t&iacute;nh trung thực;&nbsp;</span><span>đối mặt với những quyết định kh&oacute; khăn với sự r&otilde; r&agrave;ng v&agrave; trung thực;&nbsp;</span><span>v&agrave; hiểu rằng kiến ​​thức s&acirc;u sắc đi k&egrave;m với tr&aacute;ch nhiệm h&agrave;nh động.</span></span><em><strong></strong></em></p>\r\n<p>&nbsp;</p>\r\n<p><span>Độc giả sẽ học</span></p>\r\n<ul>\r\n<li><span>&Yacute; nghĩa của việc h&agrave;nh xử như một người thợ phần mềm thực thụ</span></li>\r\n<li><span>L&agrave;m thế n&agrave;o để đối ph&oacute; với xung đột, lịch tr&igrave;nh chặt chẽ v&agrave; c&aacute;c nh&agrave; quản l&yacute; kh&ocirc;ng hợp l&yacute;</span></li>\r\n<li><span>L&agrave;m thế n&agrave;o để h&ograve;a v&agrave;o d&ograve;ng m&atilde; h&oacute;a v&agrave; vượt qua khối nh&agrave; văn</span></li>\r\n<li><span>L&agrave;m thế n&agrave;o để xử l&yacute; &aacute;p lực kh&ocirc;ng ngừng v&agrave; tr&aacute;nh kiệt sức</span></li>\r\n<li><span>C&aacute;ch kết hợp th&aacute;i độ bền bỉ với m&ocirc; h&igrave;nh ph&aacute;t triển mới</span></li>\r\n<li><span>L&agrave;m c&aacute;ch n&agrave;o để quản l&yacute; thời gian của bạn v&agrave; tr&aacute;nh những con hẻm m&ugrave;, đầm lầy, đầm lầy v&agrave; đầm lầy</span></li>\r\n<li><span>L&agrave;m thế n&agrave;o để th&uacute;c đẩy m&ocirc;i trường nơi c&aacute;c lập tr&igrave;nh vi&ecirc;n v&agrave; nh&oacute;m c&oacute; thể ph&aacute;t triển mạnh</span></li>\r\n<li><span>Khi n&agrave;o n&oacute;i tiếng No No</span></li>\r\n<li><span>Khi n&agrave;o th&igrave; n&oacute;i C&oacute;</span></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><span><span>Phần mềm tuyệt vời l&agrave; một c&aacute;i g&igrave; đ&oacute; để kinh ngạc: mạnh mẽ, thanh lịch, chức năng, một niềm vui để l&agrave;m việc với cả nh&agrave; ph&aacute;t triển v&agrave; người d&ugrave;ng.&nbsp;</span><span>Phần mềm tuyệt vời kh&ocirc;ng được viết bởi m&aacute;y m&oacute;c.&nbsp;</span><span>N&oacute; được viết bởi c&aacute;c chuy&ecirc;n gia</span></span></p>', 0, 0),
(52, 'Beging Java 8', 'CNTT01', 26, 'begingjava8.jpg', 340000, 4, 'Nhà xuất bản công nghệ', '<p><em>C&aacute;c t&iacute;nh năng ng&ocirc;n ngữ Java 8 bắt đầu</em><span><span>&nbsp;bao gồm c&aacute;c&nbsp;</span><em><span>t&iacute;nh năng</span></em><span>&nbsp;thiết yếu v&agrave; n&acirc;ng cao của ng&ocirc;n ngữ lập tr&igrave;nh Java như c&aacute;c biểu thức lambda mới (bao đ&oacute;ng), c&aacute;c lớp b&ecirc;n trong, c&aacute;c luồng, I / O, Bộ sưu tập, bộ sưu tập r&aacute;c, luồng v&agrave; hơn thế nữa.&nbsp;</span><span>T&aacute;c giả Kishori Sharan cung cấp hơn 60 sơ đồ v&agrave; 290 chương tr&igrave;nh ho&agrave;n chỉnh để gi&uacute;p bạn h&igrave;nh dung v&agrave; hiểu r&otilde; hơn c&aacute;c chủ đề được đề cập trong cuốn s&aacute;ch n&agrave;y.</span></span></p>\r\n<p><span><span>Cuốn s&aacute;ch bắt đầu với một loạt c&aacute;c chương về c&aacute;c t&iacute;nh năng ng&ocirc;n ngữ thiết yếu do Java cung cấp, bao gồm c&aacute;c ch&uacute; th&iacute;ch, c&aacute;c lớp b&ecirc;n trong, sự phản chiếu v&agrave; kh&aacute;i qu&aacute;t.&nbsp;</span><span>C&aacute;c chủ đề n&agrave;y sau đ&oacute; được bổ sung bởi c&aacute;c chi tiết về c&aacute;ch sử dụng c&aacute;c biểu thức lambda, cho ph&eacute;p bạn x&acirc;y dựng c&aacute;c chương tr&igrave;nh Java mạnh mẽ v&agrave; hiệu quả.&nbsp;</span><span>Chương về c&aacute;c chủ đề theo d&otilde;i điều n&agrave;y v&agrave; thảo luận mọi thứ, từ c&aacute;c kh&aacute;i niệm rất cơ bản của một chủ đề đến c&aacute;c chủ đề n&acirc;ng cao nhất như đồng bộ h&oacute;a, khung fork / tham gia v&agrave; c&aacute;c biến nguy&ecirc;n tử.</span></span></p>\r\n<p><span><span>Cuốn s&aacute;ch n&agrave;y chứa phạm vi bao phủ chưa từng c&oacute; của I / O Java, bao gồm NIO 2.0, API đường dẫn, API FileVisitor, dịch vụ đồng hồ v&agrave; I / O tệp kh&ocirc;ng đồng bộ.&nbsp;</span><span>Với kiến ​​thức chuy&ecirc;n s&acirc;u n&agrave;y, c&aacute;c chương tr&igrave;nh quản l&yacute; dữ liệu v&agrave; tệp của bạn sẽ c&oacute; thể tận dụng mọi t&iacute;nh năng của khung I / O mạnh mẽ của Java.</span></span></p>\r\n<p><span><span>Cuối c&ugrave;ng, bạn sẽ t&igrave;m hiểu c&aacute;ch sử dụng API Stream, một bổ sung mới, th&uacute; vị cho Java 8, để thực hiện c&aacute;c hoạt động tổng hợp tr&ecirc;n c&aacute;c bộ sưu tập c&aacute;c th&agrave;nh phần dữ liệu bằng lập tr&igrave;nh kiểu chức năng.&nbsp;</span><span>Bạn sẽ kiểm tra c&aacute;c chi tiết về xử l&yacute; luồng như tạo luồng từ c&aacute;c nguồn dữ liệu kh&aacute;c nhau, t&igrave;m hiểu sự kh&aacute;c biệt giữa c&aacute;c luồng tuần tự v&agrave; song song, &aacute;p dụng mẫu giảm bản đồ bộ lọc v&agrave; xử l&yacute; c&aacute;c gi&aacute; trị t&ugrave;y chọn.</span></span></p>', 5, 0),
(53, 'Code Complete', 'CNTT01', 25, 'cod complete.jpg', 107000, 4, 'Nhà xuất bản công nghệ', '<p>Được coi l&agrave; một trong những hướng dẫn thực tiễn tốt nhất để lập tr&igrave;nh, Steve McConnell, bản gốc M&Atilde; HO&Agrave;N TH&Agrave;NH đ&atilde; gi&uacute;p c&aacute;c nh&agrave; ph&aacute;t triển viết phần mềm tốt hơn trong hơn một thập kỷ. B&acirc;y giờ cuốn s&aacute;ch kinh điển n&agrave;y đ&atilde; được cập nhật v&agrave; sửa đổi đầy đủ với c&aacute;c thực tiễn h&agrave;ng đầu của gi&aacute;o dục v&agrave; h&agrave;ng trăm mẫu m&atilde; mới, minh họa cho nghệ thuật v&agrave; khoa học về x&acirc;y dựng phần mềm. Nắm bắt cơ thể kiến ​​thức c&oacute; sẵn từ nghi&ecirc;n cứu, học thuật v&agrave; thực tiễn thương mại h&agrave;ng ng&agrave;y, McConnell tổng hợp c&aacute;c kỹ thuật hiệu quả nhất v&agrave; c&aacute;c nguy&ecirc;n tắc phải biết th&agrave;nh hướng dẫn r&otilde; r&agrave;ng, thực dụng. Bất kể cấp độ kinh nghiệm, m&ocirc;i trường ph&aacute;t triển hoặc quy m&ocirc; dự &aacute;n của bạn l&agrave; g&igrave;, cuốn s&aacute;ch n&agrave;y sẽ th&ocirc;ng b&aacute;o v&agrave; k&iacute;ch th&iacute;ch tư duy của bạn v&agrave; gi&uacute;p bạn x&acirc;y dựng m&atilde; chất lượng cao nhất.<br />Kh&aacute;m ph&aacute; c&aacute;c kỹ thuật v&agrave; chiến lược vượt thời gian gi&uacute;p bạn:<br />Thiết kế cho sự phức tạp tối thiểu v&agrave; s&aacute;ng tạo tối đa<br />Thay đổi lợi &iacute;ch của sự ph&aacute;t triển hợp t&aacute;c<br />&Aacute;p dụng c&aacute;c kỹ thuật lập tr&igrave;nh ph&ograve;ng thủ để giảm v&agrave; loại bỏ lỗi<br />Khai th&aacute;c c&aacute;c cơ hội để t&aacute;i cấu tr&uacute;c m&atilde; nguồn hoặc ph&aacute;t triển m&atilde; m&atilde; nguồn v&agrave; thực hiện một c&aacute;ch an to&agrave;n<br />Sử dụng thực h&agrave;nh x&acirc;y dựng đ&uacute;ng trọng lượng cho dự &aacute;n của bạn<br />Vấn đề gỡ lỗi nhanh ch&oacute;ng v&agrave; hiệu quả<br />Giải quyết c&aacute;c vấn đề x&acirc;y dựng quan trọng sớm v&agrave; ch&iacute;nh x&aacute;c<br />X&acirc;y dựng chất lượng v&agrave;o đầu, giữa v&agrave; cuối dự &aacute;n của bạn</p>', 0, 0),
(54, 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 'PT01', 23, 'tuoi-tre-dang-gia-bao-nhieu.jpg', 65000, 8, 'Nhà xuất bản trẻ', '<p>\"Bạn hối tiếc v&igrave; kh&ocirc;ng nắm bắt lấy một cơ hội n&agrave;o đ&oacute;, chẳng c&oacute; ai phải mất ngủ.</p>\r\n<p>Bạn trải qua những ng&agrave;y th&aacute;ng nhạt nhẽo với c&ocirc;ng việc bạn căm gh&eacute;t, người ta chẳng hề bận l&ograve;ng.</p>\r\n<p>Bạn c&oacute; chết m&ograve;n nơi x&oacute; tường với những ước mơ dang dở, đ&oacute; kh&ocirc;ng phải l&agrave; việc của họ.</p>\r\n<p>Suy cho c&ugrave;ng, quyết định l&agrave; ở bạn. Muốn c&oacute; điều g&igrave; hay kh&ocirc;ng l&agrave; t&ugrave;y bạn.</p>\r\n<p>N&ecirc;n h&atilde;y l&agrave;m những điều bạn th&iacute;ch. H&atilde;y đi theo tiếng n&oacute;i tr&aacute;i tim. H&atilde;y sống theo c&aacute;ch bạn cho l&agrave; m&igrave;nh n&ecirc;n sống.</p>\r\n<p>V&igrave; sau tất cả, chẳng ai quan t&acirc;m.\"</p>\r\n<p><span>Nhận định</span></p>\r\n<p>\"T&ocirc;i đ&atilde; đọc quyển s&aacute;ch n&agrave;y một c&aacute;ch th&iacute;ch th&uacute;. C&oacute; nhiều kiến thức v&agrave; kinh nghiệm hữu &iacute;ch, những điều mới mẻ ngay cả với người gần trung ni&ecirc;n như t&ocirc;i.</p>\r\n<p>Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u? được t&aacute;c giả chia l&agrave;m 3 phần: HỌC, L&Agrave;M, ĐI.</p>\r\n<p>Nhưng t&ocirc;i thấy cuốn s&aacute;ch c&ograve;n thể hiện một phần thứ tư nữa, đ&oacute; l&agrave; ĐỌC.</p>\r\n<p>H&atilde;y đọc s&aacute;ch, nếu bạn đọc s&aacute;ch một c&aacute;ch bền bỉ, sẽ đến l&uacute;c bạn bị th&ocirc;i th&uacute;c kh&ocirc;ng ngừng bởi &yacute; muốn viết n&ecirc;n cuốn s&aacute;ch của ri&ecirc;ng m&igrave;nh.</p>\r\n<p>Nếu t&ocirc;i c&ograve;n ở tuổi đ&ocirc;i mươi, hẳn l&agrave; t&ocirc;i sẽ đọc Tuổi trẻ đ&aacute;ng gi&aacute; bao nhi&ecirc;u? nhiều hơn một lần.\"</p>', 0, 0),
(55, 'Đừng Lựa Chọn An Nhàn Khi Còn Trẻ', 'NT01', 23, 'dung-lua-chon-anh-khi-con-tre.jpg', 60000, 3, 'Nhà xuất bản trẻ', '<p><span>Trong độ xu&acirc;n xanh phơi phới ng&agrave;y ấy, bạn kh&ocirc;ng d&aacute;m mạo hiểm, kh&ocirc;ng d&aacute;m nỗ lực để kiếm học bổng, kh&ocirc;ng chịu t&igrave;m t&ograve;i những thử th&aacute;ch trong c&ocirc;ng việc, kh&ocirc;ng phấn đấu hướng đến ước mơ của m&igrave;nh. Bạn mơ mộng rằng l&agrave;m việc xong sẽ v&agrave;o l&agrave;m ở một c&ocirc;ng ty nổi tiếng, l&agrave;m một thời gian sẽ thăng quan tiến chức. Mơ mộng rằng khởi nghiệp xong sẽ lập tức nhận được tiền đầu tư, cầm được tiền đầu tư l&agrave; sẽ ni&ecirc;m yết tr&ecirc;n s&agrave;n chứng kho&aacute;n. Mơ mộng rằng muốn g&igrave; sẽ c&oacute; đ&oacute;, kh&ocirc;ng thiếu tiền cũng chẳng thiếu t&igrave;nh, an hưởng những năm th&aacute;ng &ecirc;m đềm trong cuộc đời m&igrave;nh. Nhưng v&igrave; sao bạn lại nghĩ rằng bạn chẳng cần bỏ ra ch&uacute;t c&ocirc;ng sức n&agrave;o, cuộc sống sẽ d&acirc;ng đến tận miệng những thứ bạn muốn? Bạn cần phải hiểu rằng: Hấp tấp muốn mau ch&oacute;ng th&agrave;nh c&ocirc;ng rất dễ khiến ch&uacute;ng ta đi v&agrave;o m&ecirc; lộ. Thanh xu&acirc;n l&agrave; khoảng thời gian đẹp đẽ nhất trong đời, cũng l&agrave; những năm th&aacute;ng then chốt c&oacute; thể quyết định tương lai của một người. Nếu bạn lựa chọn an nh&agrave;n trong 10 năm, tương lai sẽ buộc bạn phải vất vả trong 50 năm để b&ugrave; đắp lại. Nếu bạn bươn chải vất vả trong 10 năm, thứ m&agrave; bạn chắc chắn c&oacute; được l&agrave; 50 năm hạnh ph&uacute;c. Điều qu&yacute; gi&aacute; nhất kh&ocirc;ng phải l&agrave; tiền m&agrave; l&agrave; tiền bạc. Thế n&ecirc;n, bạn &agrave;, đừng lựa chọn an nh&agrave;n khi c&ograve;n trẻ.</span></p>', 0, 0),
(56, 'Tốc Độ Của Niềm Tin', 'PT01', 18, 'toc-do-cua-niem-tin.jpg', 126000, 0, 'Nhà xuất bản TP HCM', '<p>X&Acirc;Y DỰNG THƯƠNG HIỆU BẰNG &ldquo;TỐC ĐỘ CỦA NIỀM TIN&rdquo;</p>\r\n<p>Bất kỳ doanh nh&acirc;n n&agrave;o cũng mong muốn x&acirc;y dựng được một thương hiệu (nh&atilde;n hiệu thương mại) cho doanh nghiệp v&agrave; cho sản phẩm của m&igrave;nh.</p>\r\n<p>Tuy nhi&ecirc;n, nếu như hiểu rằng &ldquo;thương hiệu&rdquo; l&agrave; &ldquo;c&aacute;i hiệu được thương&rdquo; th&igrave; cũng đồng nghĩa với việc x&acirc;y dựng thương hiệu l&agrave; một th&aacute;ch thức lớn đối với mọi doanh nghiệp. Bởi lẽ, muốn c&oacute; c&aacute;i &ldquo;hiệu&rdquo; (nổi tiếng) th&igrave; kh&ocirc;ng kh&oacute;, nhưng để c&aacute;i &ldquo;hiệu&rdquo; đ&oacute; được &ldquo;thương&rdquo; (uy t&iacute;n) l&agrave; điều kh&ocirc;ng hề dễ d&agrave;ng.</p>\r\n<p>V&agrave; &ldquo;Tốc độ của niềm tin&rdquo; (Speed of Trust) l&agrave; một trong số những cuốn s&aacute;ch hay nhất về c&aacute;ch thức x&acirc;y dựng thương hiệu doanh nghiệp m&agrave; t&ocirc;i từng biết.</p>\r\n<p>Cuốn s&aacute;ch n&agrave;y chỉ ra rằng, muốn c&oacute; thương hiệu uy t&iacute;n (Trusted Brand) th&igrave; cần phải c&oacute; một tổ chức đ&aacute;ng tin (Trusted Organization); muốn c&oacute; một tổ chức đ&aacute;ng tin th&igrave; cần phải c&oacute; đội ngũ đ&aacute;ng tin (Trusted Team); muốn c&oacute; đội ngũ đ&aacute;ng tin th&igrave; cần phải c&oacute; con người đ&aacute;ng tin (Trusted People).</p>\r\n<p>Khi một người muốn được tin cậy bởi người kh&aacute;c (Trusted by Others) th&igrave; trước hết người đ&oacute; phải c&oacute; &ldquo;tự trọng / sự đ&aacute;ng tin từ b&ecirc;n trong&rdquo; (Self-Trust). Nếu tự m&igrave;nh thấy m&igrave;nh kh&ocirc;ng đ&aacute;ng tin th&igrave; sẽ kh&ocirc;ng bao giờ c&oacute; được sự tin cậy của người kh&aacute;c. Ngược lại, khi m&igrave;nh thực sự c&oacute; &ldquo;Self-Trust&rdquo; (c&oacute; thiện căn v&agrave; đức tin, c&oacute; lương tri v&agrave; phẩm gi&aacute; ở b&ecirc;n trong con người m&igrave;nh) th&igrave; mặc nhi&ecirc;n m&igrave;nh sẽ nhận được sự tin cậy của người kh&aacute;c.</p>\r\n<p>Như vậy, một thương hiệu uy t&iacute;n (Trusted Brand) sẽ l&agrave; hệ quả của những con người đ&aacute;ng tin (Trusted People), đội ngũ đ&aacute;ng tin (Trusted Team) v&agrave; tổ chức đ&aacute;ng tin (Trusted Organization). N&oacute;i c&aacute;ch kh&aacute;c, h&agrave;nh tr&igrave;nh từ &ldquo;Tự trọng c&aacute; nh&acirc;n&rdquo; (Self-Trust) đến &ldquo;Thương hiệu tổ chức&rdquo; (Trusted Brand) cũng ch&iacute;nh l&agrave; c&aacute;ch thức x&acirc;y dựng thương hiệu hay nhất, hiệu quả nhất v&agrave; bền vững nhất đối với&nbsp;&nbsp;mọi tổ chức v&agrave; mọi doanh nghiệp.</p>\r\n<p>Với phương c&aacute;ch độc đ&aacute;o n&agrave;y, x&acirc;y dựng thương hiệu kh&ocirc;ng chỉ l&agrave; c&ocirc;ng việc của bộ phận Marketing hay c&ocirc;ng việc của Ban l&atilde;nh đạo C&ocirc;ng ty như l&acirc;u nay, m&agrave; đ&oacute; c&ograve;n l&agrave; tr&aacute;ch nhiệm thực sự của mỗi th&agrave;nh vi&ecirc;n trong to&agrave;n tổ chức. N&oacute;i c&aacute;ch kh&aacute;c, mỗi nh&acirc;n vi&ecirc;n đều l&agrave; người x&acirc;y dựng thương hiệu c&ocirc;ng ty.</p>', 0, 0),
(57, '7 Thói Quen Để Thành Đạt', 'PT01', 18, '7-thoi-quen-de-thanh-dat_2_2.jpg', 75000, 16, 'NXB Trẻ', '<p><span><span>Th&oacute;i Quen Để Th&agrave;nh Đạt</span></span></p>\r\n<p><span>Cuộc sống ng&agrave;y c&agrave;ng phức tạp, căng thẳng v&agrave; khắc nghiệt khi con người chuyển từ thời đại c&ocirc;ng nghiệp sang thời đại c&ocirc;ng nghệ th&ocirc;ng tin c&ugrave;ng với c&aacute;c hệ quả của n&oacute;. Nền kinh tế tri thức ra đời, k&egrave;m theo đ&oacute; l&agrave; h&agrave;ng loạt c&aacute;c vấn đề mới l&agrave;m ảnh hưỡng mạnh mẽ đến đời sống x&atilde; hội, đem đến cho con người những ứng dụng t&iacute;ch cực cũng như tạo ra th&ecirc;m một số kh&oacute; khăn v&agrave; th&aacute;ch thức. Những kh&oacute; khăn v&agrave; th&aacute;ch thức ấy kh&ocirc;ng chỉ kh&aacute;c về lượng m&agrave; c&ograve;n kh&aacute;c về chất.</span></p>\r\n<p><span>Những thay đổi s&acirc;u sắc của x&atilde; hội v&agrave; c&aacute;c biến động tr&ecirc;n thương trường to&agrave;n cầu trong thời đại kỹ thuật số đ&atilde; khiến nhiều người nghi ngờ t&iacute;nh ph&ugrave; hợp của những nguy&ecirc;n tắc, những th&oacute;i quen được đưa ra trong cuốn s&aacute;ch n&agrave;y. Theo t&aacute;c giả, cuộc sống c&agrave;ng c&oacute; nhiều biến động, những thử th&aacute;ch ch&uacute;ng ta gặp phải c&agrave;ng lớn th&igrave; \"7 th&oacute;i quen\" c&agrave;ng c&oacute; gi&aacute; trị đối với tất cả mọi người. V&igrave; c&aacute;c kh&oacute; khăn, th&aacute;ch thức lu&ocirc;n tồn tại v&agrave; ng&agrave;y c&agrave;ng phổ biến n&ecirc;n c&aacute;c giải ph&aacute;p đưa ra đều dựa tr&ecirc;n những nguy&ecirc;n tắc mang t&iacute;nh quy luật, hiển nhi&ecirc;n, bất biến, v&agrave; ph&aacute;t triển l&acirc;u d&agrave;i trong lịch sử.</span></p>\r\n<p><span>Trong&nbsp;<span>\"7 Th&oacute;i quen để th&agrave;nh đạt\"</span>, T&aacute;c giả đưa ra một phương thức tiếp cận to&agrave;n diện, thống nhất v&agrave; mang t&iacute;nh nguy&ecirc;n tắc trong việc giải quyết c&aacute;c vấn đề c&aacute; nh&acirc;n v&agrave; nghề nghiệp. Với sự thấu hiểu s&acirc;u sắc v&agrave; những giai thoại đầy &yacute; nghĩa, t&aacute;c giả mở ra cho ch&uacute;ng ta một con đường để từng bước tiến đến một cuộc sống c&ocirc;ng bằng, trung thực, cống hiến v&agrave; tự trọng - những nguy&ecirc;n tắc gi&uacute;p ch&uacute;ng ta dễ d&agrave;ng th&iacute;ch nghi với mọi thay đổi, đồng thời mang đến cho ch&uacute;ng ta tr&iacute; th&ocirc;ng minh v&agrave; sức mạnh để c&oacute; thể tận dụng được mọi cơ hội m&agrave; những thay đổi c&oacute; mang đến.</span></p>\r\n<p><span>Cuốn s&aacute;ch&nbsp;<span>\"7 Th&oacute;i quen để th&agrave;nh đạt\"</span>&nbsp;chắc chắn sẽ mang đến cho bạn một h&agrave;nh tr&igrave;nh học hỏi l&yacute; th&uacute;. H&atilde;y &aacute;p dụng ngay v&agrave; chia sẻ với người th&acirc;n, bạn b&egrave; những điều bạn học được. H&atilde;y nhớ: học m&agrave; kh&ocirc;ng h&agrave;nh th&igrave; kh&ocirc;ng phải l&agrave; học thực, biết m&agrave; kh&ocirc;ng l&agrave;m th&igrave; kh&ocirc;ng thật sự l&agrave; biết.</span></p>\r\n<p><span>Sống theo 7 th&oacute;i quen l&agrave; một cuộc đấu tranh kh&ocirc;ng ngừng bởi v&igrave; khi bạn c&agrave;ng tiến bộ th&igrave; bản chất của c&aacute;c th&aacute;ch thức bạn gặp phải cũng thay đổi.</span></p>\r\n<p><span><span>Xem Review s&aacute;ch:&nbsp;<a href=\"http://tiki.vn/tu-van/7-thoi-quen-de-thanh-dat\">7 Th&oacute;i quen để th&agrave;nh đạt</a></span><br /></span></p>\r\n<p><span>\" Cuốn \"7 Th&oacute;i quen để th&agrave;nh đạt\" của Covey đ&oacute;ng vai tr&ograve; chủ chốt trong việc ph&aacute;t triển triết l&yacute; v&agrave; hệ thống vận h&agrave;nh của Tập đo&agrave;n Saturn.</span></p>\r\n<p><span>Những cam kết của ch&uacute;ng t&ocirc;i về chất lượng với kh&aacute;ch h&agrave;ng đều bắt nguồn từ cuốn s&aacute;ch n&agrave;y.\"</span></p>\r\n<p><span><em>(Skip Lefauve, Cố chủ tịch tập đo&agrave;n Saturn/ General Motors)</em></span></p>\r\n<p><span>\"Người ta khen cuốn s&aacute;ch n&agrave;y v&igrave; n&oacute; gi&uacute;p thay đổi cuộc sống của họ, đưa họ đi tới hoặc trở lại đ&uacute;ng hướng, cả trong cuộc sống c&aacute; nh&acirc;n v&agrave; trong c&ocirc;ng việc.\"</span></p>\r\n<p><em>(Ken M.Radziwanowski, Chủ tịch Trường Kinh Doanh AT&amp;T)</em></p>', 0, 0),
(1000, 'Đắc Nhân Tâm', 'PT01', 14, 'dacnhantam.jpg', 85000, 5, 'Nhà xuất bản trẻ', 'Đắc nhân tâm của Dale Carnegie là quyển sách duy nhất về thể loại self-help liên tục đứng đầu danh mục sách bán chạy nhất (best-selling Books) do báo The New York Times bình chọn suốt 10 năm liền. Được xuất bản năm 1936, với số lượng bán ra hơn 15 triệu bản, tính đến nay, sách đã được dịch ra ở hầu hết các ngôn ngữ, trong đó có cả Việt Nam, và đã nhận được sự đón tiếp nhiệt tình của đọc giả ở hầu hết các quốc gia.\r\n\r\nLà quyển sách đầu tiên có ảnh hưởng làm thay đổi cuộc đời của hàng triệu người trên thế giới, Đắc Nhân Tâm là cuốn sách đem lại những giá trị tuyệt vời cho người đọc, bao gồm những lời khuyên cực kì bổ ích về cách ứng xử trong cuộc sống hàng ngày. Sức lan toả của quyển sách vô cùng rộng lớn – với nhiều tầng lớp, đối tượng.\r\nĐắc Nhân Tâm không chỉ là là nghệ thuật thu phục lòng người, Đắc Nhân Tâm còn đem lại cho độc giả góc nhìn, suy nghĩ sâu sắc về việc giao tiếp ứng xử.\r\n\r\nTriết lý của Đắc Nhân Tâm là hiểu mình, thành thật với chính mình, từ đó hiểu biết và quan tâm đến những người xung quanh để nhìn ra và khơi gợi những tiềm năng ẩn khuất nơi họ, giúp họ phát triển lên một tầm cao mới. Đây chính là nghệ thuật cao nhất về con người và chính là ý nghĩa sâu sắc nhất đúc kết từ những nguyên tắc vàng của Dale Carnegie.\r\n\r\nĐây là phiên bản Đắc Nhân Tâm đặc biệt, bìa cứng dày 320 trang, do First News thực hiện và Nhà xuất bản Tổng hợp TP.HCM ấn hành.', 15, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `MaTG` int(11) NOT NULL,
  `TenTG` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ThongTin` mediumtext COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`MaTG`, `TenTG`, `ThongTin`) VALUES
(10, 'Napoleon Hill', 'Napoleon Hill (1883-1970) là một tác giả người Mỹ, một trong những người sáng lập nên một thể loại v'),
(11, 'Nguyễn Nhật Ánh', 'Nguyễn Nhật Ánh (sinh ngày 7 tháng 5 năm 1955) là một nhà văn người Việt. Ông được biết đến qua nhiề'),
(12, 'Tô Hoài', 'Tô Hoài là một nhà văn Việt Nam. Một số tác phẩm đề tài thiếu nhi của ông được dịch ra ngoại ngữ. Ôn'),
(13, 'Nam Cao', 'Nam Cao là một nhà văn và cũng là một chiến sĩ, liệt sĩ người Việt Nam. Ông là nhà văn hiện thực lớn'),
(14, 'Dale Carnegie', 'Dale Breckenridge Carnegie là một nhà văn và nhà thuyết trình Mỹ và là người phát triển các lớp tự g'),
(15, 'Andrew Matthews', 'Nhà văn Tây ban Nha'),
(16, 'Murakami Haruki', 'Nhà Văn người nhật bản'),
(17, 'Paulo Coelho', 'Paulo Coelho là tiểu thuyết gia nổi tiếng người Brasil.'),
(18, 'Stephen M.R. Covey', 'Stephen M. R. Covey is an American writer and public speaker and the author of the book The SPEED of'),
(19, 'Cổ Mạn', 'Cố Mạn được xem là một trong những tác giả nổi tiếng được các bạn trẻ yêu thích nhất khi nhắc đến dòng sách ngôn tình. Những tác phẩm của cô nhẹ nhàng, lãng mạn, ngọt ngào hợp với \"khẩu vị\" của những thiếu nữ mới lớn. Hình tượng nam chính trong các tác phẩm của cô thường đạt tới độ hoàn hảo, hội tụ mọi yếu tố đẹp: đẹp trai, tài giỏi và đặc biệt là cực kỳ chung tình, mẫu đàn ông lí tưởng mà mọi cô gái đều mơ ước.'),
(20, 'Diệp Lạc Vô Tâm', 'Diệp Lạc Vô Tâm là một trong những tác giả ngôn tình có số lượng sách bán chạy nhất ở Việt Nam và cũng sở hữu một lượng fan đáng kể. Những tác phẩm của cô đa phần đều là những câu chuyện tình ngọt ngào đan xen nhiều tình tiết thú vị đưa người đọc từ bất ngờ này đến bất ngờ khác.'),
(21, 'Ân Tầm', 'Truyện của Ân Tầm nổi danh bởi hai đặc trưng \"dài và ngược\", tuy vậy nhưng các tác phẩm của cô luôn được các độc giả săn đón, yêu thích. Hình tượng nam chính của cô thường là những người đàn ông thành đạt trong sự nghiệp, có bối cảnh, xuất thân từ \"hào môn thế gia\" và luôn giữ khuôn mặt lạnh lùng, tàn nhẫn.'),
(22, 'Tân Di Ổ', 'Là tác giả của hai bộ truyện viết về tuổi thanh xuân nổi tiếng đã được chuyển thể thành phim Anh có thích nước Mỹ không? và Hóa ra anh vẫn ở đây. Các tác phẩm của Tân Di Ổ mang đậm nét đời thường, chân thực, không hoa mỹ, màu hồng như ở tiểu thuyết của Cố Mạn.'),
(23, 'Rosie Nguyễn', 'Cô tên thật là Nguyễn Hoàng Nguyên một tác giả Bloger/Facebooker về văn hóa du lịch, giảng viên lớp học kỹ năng và là huấn luyện viên yoga...'),
(24, 'Robert Martin', 'Robert Cecil Martin, thông thường được gọi là \"Chú Bob\", là một kỹ sư phần mềm, người hướng dẫn và tác giả bán chạy nhất của Mỹ. Ông được công nhận nhất vì đã phát triển nhiều nguyên tắc thiết kế phần mềm và là người sáng lập Tuyên ngôn Agile có ảnh hưởng. Martin đã là tác giả của nhiều cuốn sách và tạp chí.'),
(25, 'Steve McConnell', 'Steven C. McConnell là tác giả của sách giáo khoa kỹ thuật phần mềm như Hoàn thành mã, Phát triển nhanh và Ước tính phần mềm. Ông được trích dẫn như một chuyên gia về kỹ thuật phần mềm và quản lý dự án.'),
(26, 'Frederick Phillips', 'Frederick Phillips \"Fred\" Brooks Jr. là một kiến ​​trúc sư máy tính, kỹ sư phần mềm và nhà khoa học máy tính người Mỹ, nổi tiếng với việc quản lý sự phát triển của dòng máy tính System / 360 của IBM và gói hỗ trợ phần mềm OS / 360, sau đó viết thẳng thắn về quá trình trong cuốn sách bán kết của ông Người đàn ông huyền thoại'),
(27, 'Andy Hunt', 'Andy Hunt là một nhà văn viết sách về phát triển phần mềm. Hunt là đồng tác giả Lập trình viên thực dụng, mười cuốn sách khác và nhiều bài báo, và là một trong 17 tác giả gốc của Tuyên ngôn Agile và người sáng lập Liên minh Agile.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`MaBL`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`MaCTD`),
  ADD KEY `FK_DonHang` (`MaDH`),
  ADD KEY `FK_SanPham` (`MaSP`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD PRIMARY KEY (`MaCTPN`),
  ADD KEY `MaPN` (`MaPN`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `FK_KhachHang` (`MaKH`),
  ADD KEY `FK_NhanVien` (`MaNV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`,`Email`,`SDT`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `FK_Quyen` (`MaQuyen`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaNCC` (`MaNCC`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `FK_LoaiSP` (`MaLoai`),
  ADD KEY `MaTG` (`MaTG`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`MaTG`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  MODIFY `MaCTD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  MODIFY `MaCTPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `MaTG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `FK_DonHang` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `FK_SanPham` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`),
  ADD CONSTRAINT `ctphieunhap_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_KhachHang` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `FK_NhanVien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_Quyen` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MaNCC`) REFERENCES `nhacc` (`MaNCC`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_LoaiSP` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`MaLoai`),
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaTG`) REFERENCES `tacgia` (`MaTG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
