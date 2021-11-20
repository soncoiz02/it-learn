-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 12:44 PM
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
  `cate_id` int(11) NOT NULL,
  `like_num` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_saved`
--

CREATE TABLE `blog_saved` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate`
--

CREATE TABLE `cate` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cate`
--

INSERT INTO `cate` (`cate_id`, `cate_name`) VALUES
(1, 'Javascript'),
(2, 'HTML CSS'),
(3, 'C++'),
(4, 'C#'),
(5, 'Android'),
(6, 'Office'),
(7, 'SQL'),
(8, 'Python'),
(9, 'Java'),
(10, 'Front-end'),
(11, 'Back-end');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `cate_id`, `image`, `description`) VALUES
(1, 'Javascript Cơ Bản', 1, '', 'Học Javascript cơ bản phù hợp cho người chưa từng học lập trình. Với hơn 100 bài học và có bài tập thực hành sau mỗi bài học.'),
(2, 'Javascript Nâng Cao', 1, '', 'Hiểu sâu hơn về cách Javascript hoạt động, hiểu các khái niệm Javascript nâng cao như: IIFE, closure, reference types, this keyword, bind, call, apply, ...'),
(3, 'NodeJS & ExpressJS', 11, '', 'Học Back-end với Node & ExpressJS framework, hiểu các khái niệm khi làm Back-end và xây dựng RESTful API cho trang web.'),
(4, 'HTML, CSS từ Zero Tới Hero', 2, '', 'Khóa học phù hợp cho cả người chưa từng học lập trình. Trong khóa này chúng ta sẽ cùng nhau xây dựng giao diện 2 trang web là The Band & Shopee.'),
(5, 'Lập trình C++ cơ bản', 3, '', 'LẬP TRÌNH C++ CĂN BẢN để cung cấp một lượng kiến thức về ngôn ngữ C++ nói riêng, và các khái niệm khác trong lập trình nói chung.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_comment`
--

CREATE TABLE `course_comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `lesson_id` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_signed`
--

CREATE TABLE `course_signed` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document`
--

CREATE TABLE `document` (
  `doc_id` varchar(50) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessson`
--

CREATE TABLE `lessson` (
  `lessson_id` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `doc_id` varchar(50) NOT NULL,
  `vid_id` varchar(50) NOT NULL,
  `quiz_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `quiz_id` varchar(50) NOT NULL,
  `poin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question_comment`
--

CREATE TABLE `question_comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL,
  `answer_3` text NOT NULL,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `vid_id` varchar(50) NOT NULL,
  `vid_name` varchar(255) NOT NULL,
  `vid_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `username` (`username`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Chỉ mục cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `blog_saved`
--
ALTER TABLE `blog_saved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course` (`cate_id`);

--
-- Chỉ mục cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Chỉ mục cho bảng `course_signed`
--
ALTER TABLE `course_signed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Chỉ mục cho bảng `lessson`
--
ALTER TABLE `lessson`
  ADD PRIMARY KEY (`lessson_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `vid_id` (`vid_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Chỉ mục cho bảng `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`),
  ADD KEY `username` (`username`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `question_comment`
--
ALTER TABLE `question_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_id` (`ques_id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`vid_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog_saved`
--
ALTER TABLE `blog_saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cate`
--
ALTER TABLE `cate`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course_comment`
--
ALTER TABLE `course_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course_signed`
--
ALTER TABLE `course_signed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `question_comment`
--
ALTER TABLE `question_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `cate_id` FOREIGN KEY (`cate_id`) REFERENCES `cate` (`cate_id`),
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blog_comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `blog_comment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

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
  ADD CONSTRAINT `course_comment_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessson` (`lessson_id`);

--
-- Các ràng buộc cho bảng `course_signed`
--
ALTER TABLE `course_signed`
  ADD CONSTRAINT `course_signed_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_signed_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `lessson`
--
ALTER TABLE `lessson`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `doc_id` FOREIGN KEY (`doc_id`) REFERENCES `document` (`doc_id`),
  ADD CONSTRAINT `quiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  ADD CONSTRAINT `vid_id` FOREIGN KEY (`vid_id`) REFERENCES `video` (`vid_id`);

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
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `cate` (`cate_id`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `question_comment`
--
ALTER TABLE `question_comment`
  ADD CONSTRAINT `question_comment_ibfk_1` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`),
  ADD CONSTRAINT `question_comment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
