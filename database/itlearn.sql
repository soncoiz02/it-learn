-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2021 lúc 04:49 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `itlearn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `cate_id` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `username`, `content`, `avatar`, `cate_id`, `date`) VALUES
(7, 'Làm mẫu thôi', 'soncoiz02', '<p>Bao giờ hết lười rồi viết nội dung sau</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'Web front end, Cơ bản', '2021-12-07'),
(8, 'Trung cute nhất', 'trungcute123', '<p>Trung cute v&ocirc; địch vũ trụ</p>\r\n', '', 'Cơ bản', '2021-12-07'),
(9, 'Write somthing here', 'dungtml', '<p>A B C D E F G</p>\r\n', '', 'Cơ bản', '2021-12-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_liked`
--

CREATE TABLE `blog_liked` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `blog_liked`
--

INSERT INTO `blog_liked` (`id`, `blog_id`, `username`) VALUES
(11, 7, 'soncoiz02'),
(12, 8, 'dungtml'),
(13, 7, 'dungtml'),
(14, 8, 'trungcute123'),
(15, 9, 'trungcute123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_saved`
--

CREATE TABLE `blog_saved` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate`
--

CREATE TABLE `cate` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `cate`
--

INSERT INTO `cate` (`cate_id`, `cate_name`) VALUES
(1, 'Web front end'),
(2, 'Back-end'),
(3, 'Cơ bản'),
(4, 'Mobile'),
(5, 'Python'),
(6, 'Java'),
(7, 'SQL'),
(8, 'Python'),
(9, 'Javascript'),
(10, 'HTML, CSS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `course_img` varchar(255) NOT NULL,
  `course_dsc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `cate_id`, `course_img`, `course_dsc`) VALUES
(1, 'Javascript Cơ Bản', 1, 'js1.png', 'Học Javascript cơ bản phù hợp cho người chưa từng học lập trình. Với hơn 100 bài học và có bài tập thực hành sau mỗi bài học.'),
(2, 'Javascript Nâng Cao', 1, 'js2.png', 'Hiểu sâu hơn về cách Javascript hoạt động, hiểu các khái niệm Javascript nâng cao như: IIFE, closure, reference types, this keyword, bind, call, apply, ...'),
(3, 'NodeJS & ExpressJS', 2, 'node.png', 'Học Back-end với Node & ExpressJS framework, hiểu các khái niệm khi làm Back-end và xây dựng RESTful API cho trang web.'),
(4, 'HTML, CSS từ Zero Tới Hero', 1, 'html.png', 'Khóa học phù hợp cho cả người chưa từng học lập trình. Trong khóa này chúng ta sẽ cùng nhau xây dựng giao diện 2 trang web là The Band & Shopee.'),
(5, 'Lập trình C++ cơ bản', 3, 'c++.png', 'LẬP TRÌNH C++ CĂN BẢN để cung cấp một lượng kiến thức về ngôn ngữ C++ nói riêng, và các khái niệm khác trong lập trình nói chung.'),
(24, 'soncoiz02', 1, '', '<p>ahsgzxjkchzjxhczxj</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_comment`
--

CREATE TABLE `course_comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `lesson_id` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_signed`
--

CREATE TABLE `course_signed` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_signed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `course_signed`
--

INSERT INTO `course_signed` (`id`, `username`, `course_id`, `date_signed`) VALUES
(15, 'soncoiz02', 1, '2021-12-07'),
(16, 'soncoiz02', 2, '2021-12-07'),
(17, 'dungtml', 4, '2021-12-07'),
(18, 'dungtml', 1, '2021-12-07'),
(19, 'dungtml', 2, '2021-12-07'),
(20, 'trungcute123', 2, '2021-12-07'),
(21, 'trungcute123', 3, '2021-12-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document`
--

CREATE TABLE `document` (
  `doc_id` varchar(50) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `link_video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `course_id`, `title`, `document`, `link_video`) VALUES
('A01', 1, 'Javascript có thể làm được gì? Giới thiệu qua về Javascript', NULL, 'https://www.youtube.com/watch?v=0SJE9dYdpps'),
('A02', 1, 'Cài đặt Javascript', NULL, 'https://www.youtube.com/watch?v=efI98nT8Ffo'),
('A03', 1, 'Sử dụng JS trong file HTML', NULL, 'https://www.youtube.com/watch?v=W0vEUmyvthQ'),
('A04', 1, 'Khai báo biến trong JS', NULL, 'https://www.youtube.com/watch?v=CLbx37dqYEI'),
('A05', 1, 'Toán tử số học trong JS', NULL, 'https://www.youtube.com/watch?v=m_h7-dgKnMU'),
('A06', 1, 'Câu lệnh điều kiện If trong JS', NULL, 'https://www.youtube.com/watch?v=9MpHrdWBdxg'),
('A07', 1, 'Mảng trong JS', NULL, 'https://www.youtube.com/watch?v=YzO65uOJNMg'),
('A08', 1, 'Hàm trong JS', NULL, 'https://www.youtube.com/watch?v=4g9ENVc2KLA'),
('A09', 1, 'Object constructor', NULL, 'https://www.youtube.com/watch?v=FO1OMbT_k2w'),
('A10', 1, 'Xây dựng Demo bằng JS', NULL, 'https://www.youtube.com/watch?v=utF5vj7Ljuo'),
('B01', 2, 'Ra mắt khóa Javascript nâng cao', NULL, 'https://www.youtube.com/watch?v=MGhw6XliFgo'),
('B02', 2, 'IIFE trong Javascript là gì?', NULL, 'https://www.youtube.com/watch?v=N-3GU1F1UBY'),
('B03', 2, 'Scope trong Javascript?', NULL, 'https://www.youtube.com/watch?v=5N8vz_VmszE'),
('B04', 2, 'Closure trong Javascript?', NULL, 'https://www.youtube.com/watch?v=xtQtGKL0NCI'),
('B05', 2, 'Hoisting trong Javascript?', NULL, 'https://www.youtube.com/watch?v=3MLhU1DrUxM'),
('B06', 2, 'Strict mode trong Javascript?', NULL, 'https://www.youtube.com/watch?v=w1W-j4cSPF0'),
('B07', 2, 'Từ khóa \"this\" trong Javascript?', NULL, 'https://www.youtube.com/watch?v=ii1Ra_zLDIo'),
('B08', 2, 'Fn.bind() method trong Javascript?', NULL, 'https://www.youtube.com/watch?v=6j9b2_E34JM'),
('B09', 2, 'Fn.call() method trong Javascript?', NULL, 'https://www.youtube.com/watch?v=QxLTSdTJDXY'),
('B10', 2, 'Fn.apply() method trong Javascript?', NULL, 'https://www.youtube.com/watch?v=a4FjX4Z-9Rs'),
('C01', 3, 'Lời khuyên trước khóa học Node Express', NULL, 'https://www.youtube.com/watch?v=z2f7RHgvddc'),
('C02', 3, 'Install NodeJS và express', NULL, 'https://www.youtube.com/watch?v=CcSuYLjKW3g'),
('C03', 3, 'Template engine (handlebars)', NULL, 'https://www.youtube.com/watch?v=lpbl2qQXbDo'),
('C04', 3, 'Use boostrap', NULL, 'https://www.youtube.com/watch?v=zNLXsTu_kUA'),
('C05', 3, 'Basic routing', NULL, 'https://www.youtube.com/watch?v=Wz6WghmEmFk'),
('C06', 3, 'Query parameters', NULL, 'https://www.youtube.com/watch?v=6LdwSrTCmo4'),
('C07', 3, 'Form default behavior', NULL, 'https://www.youtube.com/watch?v=wCF8pIbOOpo'),
('C08', 3, 'Mô hình MVC', NULL, 'https://www.youtube.com/watch?v=N8GhaR7K3tI'),
('C09', 3, 'Soft delete?', NULL, 'https://www.youtube.com/watch?v=dstdrBsf7ag'),
('C10', 3, 'Course detail page', NULL, 'https://www.youtube.com/watch?v=LnTPJcUQdNU'),
('D01', 4, 'Giới thiệu chung về khóa học HTML', NULL, 'https://www.youtube.com/watch?v=R6plN3FvzFY'),
('D02', 4, 'Cài đặt môi trường cho HTML', NULL, 'https://www.youtube.com/watch?v=ZotVkQDC6mU'),
('D03', 4, 'Thẻ HTML thông dụng', NULL, 'https://www.youtube.com/watch?v=AzmdwZ6e_aM'),
('D04', 4, 'Sử dụng CSS trong HTML', NULL, 'https://www.youtube.com/watch?v=NsSsJTg29oE'),
('D05', 4, 'Dựng khung web', NULL, 'https://www.youtube.com/watch?v=-umvdHAfR6E'),
('D06', 4, 'Dựng khung form đăng ký', NULL, 'https://www.youtube.com/watch?v=8AN4u5P08AA'),
('D07', 4, 'Hoàn thiện website', NULL, 'https://www.youtube.com/watch?v=z72B8zpAsu4'),
('D08', 4, 'Fix bugs và chạy thử ', NULL, 'https://www.youtube.com/watch?v=2kquykrrpOs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `quiz_id` varchar(50) NOT NULL,
  `poin` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_ask` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`ques_id`, `username`, `tag`, `content`, `date_ask`) VALUES
(23, 'dungtml', 'Web front end', 'Bao nhiêu lâu thì bán được 1 tỷ gói mè ?', '2021-12-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question_comment`
--

CREATE TABLE `question_comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `question_comment`
--

INSERT INTO `question_comment` (`id`, `username`, `ques_id`, `content`, `date`) VALUES
(29, 'trungcute123', 23, 'Em bán kem đánh răng\r\n', '2021-12-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` varchar(50) NOT NULL,
  `lesson_id` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL,
  `answer_3` text NOT NULL,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `lesson_id`, `question`, `answer_1`, `answer_2`, `answer_3`, `correct_answer`) VALUES
('0', 'A09', 'Cách nào đúng để khai báo function trong Javascript?', '\r\nfunction: myFunc() {}', 'function my Func = () => {}', 'function = myFunc() {}', 'function myFunc() {}'),
('1', 'D01', 'HTML viết tắt của từ gì?', 'Hyper Text Makeup Language', 'Hyper Text Mardup Language', 'Hyper Text Madeup Language', 'Hyper Text Markup Language.'),
('10', 'A03', 'Có mấy cách dùng Javascript vào html?', '1', '3', '4', '2'),
('11', 'A03', 'Đâu là cách viết đúng Javascript trong Html?', '<script alert(\'test vb\')></script>', '<script> console.log<\\script>', '<link rel=\"stylesheet\" href=\"main.js\">', '<script src=\"main.js\"></script>'),
('12', 'A04', 'let myVariable = [1,\'Bob\',\'Steve\',10];\r\n//thuộc kiểu dữ liệu nào dưới đây', 'string', 'number', 'object', 'array'),
('13', 'A04', 'var tets = \'Nguyễn Văn A\'\r\n, age = 18\r\n\r\n, love = false;', 'Không hợp lệ vì sai cú pháp', 'Sai vì không chứa ;', 'Sai vì age và love không \'var\'', 'Hợp lệ'),
('14', 'A05', 'Sau khi đoạn mã dưới đây được thực thi thì biến a có giá trị là gì?\r\nvar a = \'16\' - 5;', '10', '165', 'error', '11'),
('15', 'A05', 'x += y\r\ntương đương với gì', 'y=y+x', 'Không hợp lệ', 'x+x=y', 'x=x+y;'),
('16', 'A06', 'Sự khác nhau giữa switch - case và if - else là :', 'Không khác nhau', 'If - else dài hơn', 'If - else chỉ so sánh bằng, switch case có thể so sánh lớn bé', 'switch case chỉ so sánh bằng || if else có thể so sánh lớn bé'),
('17', 'A06', 'Có bao nhiêu thành phần BẮT BUỘC phải có ở switch case trong JavaScript ?', '5', '4', '2', '3'),
('18', 'A07', 'Có đoạn code:\r\nlet myArray = [3 ,4, 1, 2];\r\n\r\nmyArray[3] = 0;\r\n\r\nmyArray[0] sẽ có giá trị là: ?', '0', '1', '2', '3'),
('19', 'A08', 'Built-in function nghĩa là gì?', 'Là hàm tự động sinh ra theo chức năng lập tình viên muốn có', 'Là hàm do người sử dụng tạo ra', 'là biến sẵn của ngôn ngữ lập trình', 'Là hàm được tạo sẵn trong ngôn ngữ lập trình hoặc môi trường thực thi ngôn ngữ lập trình'),
('2', 'D01', 'HTML là gì?', 'Ngôn ngữ lập trình đánh dấu siêu văn bản', 'Ngôn ngữ lập trình siêu văn bản', 'Ngôn ngữ đánh dấu văn bản', 'Ngôn ngữ đánh dấu siêu văn bản'),
('20', 'A08', 'Built-in functions nào sau đây khi thực thi sẽ bật lên hộp thoại (dialog) trên trình duyệt?', 'console.log', 'setTimeout', 'setInterval', 'alert'),
('21', 'A02', 'Javascript ra đời khi nào?', '1999', '1989', '1992', '1995'),
('23', 'A10', 'Để tạo con trỏ có hình bàn tay, sử dụng cách nào dưới đây?', 'cursor: hand;', 'cursor: all;', 'cursor: point;', 'cursor: pointer;'),
('24', 'B01', 'Điểm khác nhau giữa == và === là gì?', 'Chỉ đơn giản là có thêm 1 dấu = cho dài thêm thôi chứ có làm gì đâu', 'Đều là so sánh. Nhưng == so sánh kiểu dữ liệu, === so sánh cả giá trị và kiểu dữ kiệu', 'Đều là so sánh, không khác nhau gì cả', 'Đều là so sánh. Nhưng == so sánh giá trị, === so sánh cả giá trị và kiểu dữ kiệu'),
('25', 'B02', ' \r\nTrong JavaScript hàm parseInt() dùng để làm gì?', 'Chuyển một số nguyên thành một chuỗi', 'Chuyển một chuỗi thành số thực', 'Chuyển một chuỗi thành số\r\n\r\nChuyển một chuỗi thành số\r\n\r\nChuyển một chuỗi thành số', 'Chuyển một chuỗi thành số nguyên'),
('26', 'B03', 'nháp', '1', '2', '3', '4'),
('27', 'B04', 'nháp', '1', '2', '3', '4'),
('28', 'B05', 'nháp', '1', '2', '3', '4'),
('29', 'B06', 'nháp', '1', '2', '3', '4'),
('3', 'D01', 'HTML ra đời khi nào?', '1991', '1992', '1988', '1990'),
('30', 'B07', 'nháp', '1', '2', '3', '4'),
('31', 'B08', 'nháp', '1', '2', '3', '4'),
('32', 'B09', 'nháp', '1', '2', '3', '4'),
('33', 'B10', 'nháp', '1', '2', '3', '4'),
('4', 'D02', 'Để bắt đầu với HTML, cần những gì?', 'Trình duyệt và Notepad', 'Chrome và phần mềm soạn thảo đơn giản', 'Trình duyệt và TextEdit', 'Trình duyệt và phần mềm soạn thảo đơn giản'),
('5', 'D03', 'Có mấy loại thẻ?', '1', '3', '4', '2'),
('6', 'D04', 'Có mấy cách áp dụng CSS vào HTML', '1', '2', '3', '4'),
('7', 'D04', 'Inline CSS là', 'CSS được viết trực tiếp trong thẻ mở của phần tử HTML', 'CSS được viết trong cặp thẻ <style></style>', 'CSS được viết trong file .css', 'Quy tắc CSS được viết trực tiếp trong thuộc tính style của phần tử HTML'),
('8', 'A01', 'Javascript có viết tắt như thế nào?', 'Json', 'JC', 'JA', 'JS'),
('9', 'A01', 'Cha đẻ ngôn ngữ Javascript?', 'James Gosling', 'Niklaus Wirth', 'Guido Van Rossum', 'Brendan Eich');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` bit(1) NOT NULL DEFAULT b'0',
  `date_signed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `avatar`, `email`, `position`, `date_signed`) VALUES
('dungtml', 'd30ef5569a0a3f315e0b91b0a129ae9f', 'Lê Tiến Dũng', 'user.png', 'dungngu@gmail.com', b'0', '2021-12-07'),
('soncoiz02', '1a202ada5531c1550da0640e00862480', 'Trần Bảo Sơn', '426e2a60af73642d3d62.jpg', 'soncoiz3107@gmail.com', b'1', '2021-12-07'),
('trungcute123', '5923f33de279fed8e31358d923a53a29', 'Đỗ Kiên Trung', 'user.png', 'okiun113@gmail.com', b'0', '2021-12-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `vid_id` varchar(50) NOT NULL,
  `vid_name` varchar(255) NOT NULL,
  `vid_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`vid_id`, `vid_name`, `vid_link`) VALUES
('H01', 'Giới thiệu chung về khóa học HTML', 'https://www.youtube.com/watch?v=R6plN3FvzFY'),
('H02', 'Cài đặt môi trường', 'https://www.youtube.com/watch?v=ZotVkQDC6mU'),
('H03', 'Thẻ HTML thông dụng', 'https://www.youtube.com/watch?v=AzmdwZ6e_aM'),
('H04', 'Sử dụng CSS trong HTML', 'https://www.youtube.com/watch?v=NsSsJTg29oE'),
('H05', 'Dựng khung web', 'https://www.youtube.com/watch?v=-umvdHAfR6E'),
('H06', 'Dựng khung form đăng ký', 'https://www.youtube.com/watch?v=8AN4u5P08AA'),
('H07', 'Hoàn thiện phần sản phẩm', 'https://www.youtube.com/watch?v=z72B8zpAsu4'),
('H08', 'Fix bugs', 'https://www.youtube.com/watch?v=2kquykrrpOs'),
('JS01', 'Javascript có thể làm được gì? Giới thiệu qua về trang F8 | Học lập trình Javascript cơ bản', 'https://www.youtube.com/watch?v=0SJE9dYdpps'),
('JS02', 'Lời khuyên trước khóa học', 'https://www.youtube.com/watch?v=-jV06pqjUUc'),
('JS03', 'Cài đặt môi trường', 'https://www.youtube.com/watch?v=efI98nT8Ffo'),
('JS04', 'Sử dụng JS trong file HTML', 'https://www.youtube.com/watch?v=W0vEUmyvthQ'),
('JS05', 'Khai báo biến', 'https://www.youtube.com/watch?v=CLbx37dqYEI'),
('JS06', 'Làm quen với toán tử', 'https://www.youtube.com/watch?v=SZb-N7TfPlw'),
('JS07', 'Toán tử số học', 'https://www.youtube.com/watch?v=m_h7-dgKnMU'),
('JS08', 'Toán tử ++ -- với tiền tố & hậu tố', 'https://www.youtube.com/watch?v=aM-DUx6Qnc8'),
('JS09', 'Toán tử so sánh trong Javascript', 'https://www.youtube.com/watch?v=rWM2lXtS-d8'),
('JS10', 'Câu lệnh điều kiện If', 'https://www.youtube.com/watch?v=9MpHrdWBdxg'),
('JS11', 'Kiểu dữ liệu trong Javascript', 'https://www.youtube.com/watch?v=P-fMQ3elxSE'),
('JS12', 'Chuỗi', 'https://www.youtube.com/watch?v=6F_dajRCC9Q'),
('JS13', 'Số và làm việc với số', 'https://www.youtube.com/watch?v=varb35t44v0'),
('JS14', 'Mảng', 'https://www.youtube.com/watch?v=YzO65uOJNMg'),
('JS15', 'Hàm', 'https://www.youtube.com/watch?v=4g9ENVc2KLA'),
('JS16', 'Các loại function', 'https://www.youtube.com/watch?v=scwab9DMNtM'),
('JS17', 'Object', 'https://www.youtube.com/watch?v=orIXdOPFWeM'),
('JS18', 'Object constructor', 'https://www.youtube.com/watch?v=FO1OMbT_k2w'),
('JS19', 'Toán tử 3 ngôi - Ternary operator', 'https://www.youtube.com/watch?v=L9pPv8pp71s'),
('JS20', '\"Học Xong\" Javascript Có Giải Được \"Code Thiếu Nhi\"?', 'https://www.youtube.com/watch?v=utF5vj7Ljuo'),
('JSA01', 'Ra mắt khóa Javascript nâng cao (javascript advanced)', 'https://www.youtube.com/watch?v=MGhw6XliFgo'),
('JSA02', 'IIFE trong Javascript là gì?', 'https://www.youtube.com/watch?v=N-3GU1F1UBY'),
('JSA03', 'Scope trong Javascript?', 'https://www.youtube.com/watch?v=5N8vz_VmszE'),
('JSA04', 'Closure trong Javascript có phải là cái gì \"kinh khủng\"?', 'https://www.youtube.com/watch?v=xtQtGKL0NCI'),
('JSA05', 'Hoisting trong Javascript? Let, const có được hoisted hay không?', 'https://www.youtube.com/watch?v=3MLhU1DrUxM'),
('JSA06', '\"use strict\" hay strict mode trong Javascript?', 'https://www.youtube.com/watch?v=w1W-j4cSPF0'),
('JSA07', 'Value types & reference types | Tham trị & tham chiếu trong Javascript', 'https://www.youtube.com/watch?v=n4tS1Q5-EzY'),
('JSA08', 'Từ khóa \"this\" trong Javascript?', 'https://www.youtube.com/watch?v=ii1Ra_zLDIo'),
('JSA09', 'Fn.bind() method P1?', 'https://www.youtube.com/watch?v=F5z6YoR8of0'),
('JSA10', 'Fn.bind() method P2?', 'https://www.youtube.com/watch?v=6j9b2_E34JM'),
('JSA11', 'Fn.call() method trong Javascript?', 'https://www.youtube.com/watch?v=QxLTSdTJDXY'),
('JSA12', 'Fn.apply() method trong Javascript?', 'https://www.youtube.com/watch?v=a4FjX4Z-9Rs'),
('NJS01', 'Lời khuyên trước khóa học Node Express', 'https://www.youtube.com/watch?v=z2f7RHgvddc'),
('NJS02', 'HTTP protocol', 'https://www.youtube.com/watch?v=SdcdneSdoV4'),
('NJS03', 'SSR & CSR', 'https://www.youtube.com/watch?v=HLEu57iLrRo'),
('NJS04', 'Install NodeJS', 'https://www.youtube.com/watch?v=CcSuYLjKW3g'),
('NJS05', 'Install express', 'https://www.youtube.com/watch?v=tfQXZ8jES6A'),
('NJS06', 'Install nodemon & inspector', 'https://www.youtube.com/watch?v=zCFOn4YXr00'),
('NJS07', 'Install Morgan', 'https://www.youtube.com/watch?v=seI--u0hSeg'),
('NJS08', 'Template engine (handlebars)', 'https://www.youtube.com/watch?v=lpbl2qQXbDo'),
('NJS09', 'Static files & SCSS', 'https://www.youtube.com/watch?v=BxZNiLo-OA0'),
('NJS10', 'Use boostrap', 'https://www.youtube.com/watch?v=zNLXsTu_kUA'),
('NJS11', 'Basic routing', 'https://www.youtube.com/watch?v=Wz6WghmEmFk'),
('NJS12', 'Query parameters', 'https://www.youtube.com/watch?v=6LdwSrTCmo4'),
('NJS13', 'Form default behavior', 'https://www.youtube.com/watch?v=wCF8pIbOOpo'),
('NJS14', 'POST method', 'https://www.youtube.com/watch?v=LlfdqnK28Cg'),
('NJS15', 'Mô hình MVC', 'https://www.youtube.com/watch?v=N8GhaR7K3tI'),
('NJS16', 'Course detail page', 'https://www.youtube.com/watch?v=LnTPJcUQdNU'),
('NJS17', 'Soft delete?', 'https://www.youtube.com/watch?v=dstdrBsf7ag'),
('NJS18', 'Deleted count documents', 'https://www.youtube.com/watch?v=o_hg0iAdqDA'),
('NJS19', '\"Select all\" with checkbox', 'https://www.youtube.com/watch?v=YilPrQiKOfE'),
('NJS20', 'Sort middleware', 'https://www.youtube.com/watch?v=MJ7JZSW6seA'),
('NJS21', 'Auto increment id field', 'https://www.youtube.com/watch?v=U0dG1GKI054');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE,
  ADD KEY `cate_id` (`cate_id`) USING BTREE;

--
-- Chỉ mục cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `blog_id` (`blog_id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- Chỉ mục cho bảng `blog_liked`
--
ALTER TABLE `blog_liked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `blog_saved`
--
ALTER TABLE `blog_saved`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `blog_id` (`blog_id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- Chỉ mục cho bảng `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`cate_id`) USING BTREE;

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`) USING BTREE,
  ADD KEY `course` (`cate_id`) USING BTREE;

--
-- Chỉ mục cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE,
  ADD KEY `lesson_id` (`lesson_id`) USING BTREE;

--
-- Chỉ mục cho bảng `course_signed`
--
ALTER TABLE `course_signed`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `course_id` (`course_id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- Chỉ mục cho bảng `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`) USING BTREE;

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`) USING BTREE,
  ADD KEY `course_id` (`course_id`) USING BTREE;

--
-- Chỉ mục cho bảng `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE,
  ADD KEY `quiz_id` (`quiz_id`) USING BTREE;

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`) USING BTREE,
  ADD KEY `cate_id` (`tag`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- Chỉ mục cho bảng `question_comment`
--
ALTER TABLE `question_comment`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ques_id` (`ques_id`) USING BTREE,
  ADD KEY `username` (`username`) USING BTREE;

--
-- Chỉ mục cho bảng `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`) USING BTREE,
  ADD KEY `lesson_id` (`lesson_id`) USING BTREE;

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid_id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `blog_liked`
--
ALTER TABLE `blog_liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `blog_saved`
--
ALTER TABLE `blog_saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cate`
--
ALTER TABLE `cate`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `course_signed`
--
ALTER TABLE `course_signed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `question_comment`
--
ALTER TABLE `question_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `blog_comment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `blog_liked`
--
ALTER TABLE `blog_liked`
  ADD CONSTRAINT `blog_liked_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `blog_liked_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `blog_saved`
--
ALTER TABLE `blog_saved`
  ADD CONSTRAINT `blog_saved_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `blog_saved_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course` FOREIGN KEY (`cate_id`) REFERENCES `cate` (`cate_id`);

--
-- Các ràng buộc cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  ADD CONSTRAINT `course_comment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `course_comment_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`lesson_id`);

--
-- Các ràng buộc cho bảng `course_signed`
--
ALTER TABLE `course_signed`
  ADD CONSTRAINT `course_signed_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_signed_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Các ràng buộc cho bảng `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Các ràng buộc cho bảng `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `question_comment`
--
ALTER TABLE `question_comment`
  ADD CONSTRAINT `question_comment_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`),
  ADD CONSTRAINT `question_comment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`lesson_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
