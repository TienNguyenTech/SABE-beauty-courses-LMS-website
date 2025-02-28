-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 11:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fit3048_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `completions`
--

CREATE TABLE `completions` (
  `completion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `content_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `content_type` varchar(20) NOT NULL,
  `content_url` varchar(500) NOT NULL,
  `content_title` varchar(100) NOT NULL,
  `content_description` varchar(2000) DEFAULT NULL,
  `content_position` int(11) NOT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `course_id`, `content_type`, `content_url`, `content_title`, `content_description`, `content_position`, `archived`) VALUES
(16, 1, 'pdf', 'assets/img/content/Online course intro .pdf', 'Online course intro', 'Introduction to online learning at South Adelaide Beauty and Education', 1, 0),
(17, 1, 'video', 'assets/img/content/Welcome To Sa Beauty And Ed 1.mp4', 'Welcome to South Adelaide Beauty and Education', 'Welcome to South Adelaide Beauty and Education', 2, 0),
(19, 1, 'video', 'assets/img/content/Equipment You Will Need 2.mp4', 'Equipment that you will need', 'Video detailing all the equipment that you will need to complete this course', 3, 0),
(20, 1, 'video', 'assets/img/content/The Most Amazing Facial Massage 4.mp4', 'The most amazing facial massage', 'Demonstration of how to perform facial massage', 4, 0),
(21, 1, 'video', 'assets/img/content/WIN_20241012_11_42_15_Pro.mp4', 'dfbdf', 'sdv', 5, 0),
(22, 1, 'pdf', 'assets/img/content/FIT3146-A2-Brief (1).pdf', 'new content', 'okok', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_blocks`
--

CREATE TABLE `content_blocks` (
  `id` int(11) NOT NULL,
  `parent` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `label` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(32) NOT NULL,
  `value` text DEFAULT NULL,
  `previous_value` text DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_blocks`
--

INSERT INTO `content_blocks` (`id`, `parent`, `slug`, `label`, `description`, `type`, `value`, `previous_value`, `modified`) VALUES
(41, 'Website Essentials', 'website-title', 'Website Title', 'Shown on the home page, as well as any tabs in the users browser.', 'text', 'South Adelaide Beauty and Education', NULL, '2024-08-16 20:38:42'),
(42, 'Website Essentials', 'logo', 'Logo', 'Logo of your brand', 'image', '/content-blocks/uploads/logo.ba1b01517c030cc71cc48e1d2f2bad63.png', '/content-blocks/uploads/logo.5ecd2f6a1d982a3a690cb2b479449e59.png', '2024-09-08 13:54:06'),
(43, 'Website Essentials', 'copyright-message', 'Copyright Message', 'Copyright information shown at the bottom of the home page.', 'text', '2024, South Adelaide Beauty and Education.', NULL, '2024-08-16 20:38:42'),
(44, 'Website Essentials', 'contact-phone', 'Contact Phone Number', 'The contact phone number that shown on contact us page.', 'text', '0000000000', NULL, '2024-08-16 20:38:42'),
(45, 'Website Essentials', 'contact-email', 'Contact Email', 'The contact email that shown on contact us page.', 'text', 'beautybylisafollett@gmail.com', NULL, '2024-08-16 20:38:42'),
(46, 'Website Essentials', 'location-address', 'Location-Address', 'The address for your place, shown on contact us page.', 'text', 'Lepena Cresent', NULL, '2024-08-16 20:38:42'),
(47, 'Website Essentials', 'location-suburb', 'Location-Suburb', 'The suburb for your place, shown on contact us page.', 'text', 'Hallet Cove', NULL, '2024-08-16 20:38:42'),
(48, 'Website Essentials', 'location-state', 'Location-State', 'The state for your place, shown on contact us page.', 'text', 'South Australia', NULL, '2024-08-16 20:38:42'),
(49, 'Website Essentials', 'location-postcode', 'Location-postcode', 'The postcode for your place, shown on contact us page.', 'text', '5138', NULL, '2024-08-16 20:38:42'),
(50, 'Homepage Slider', 'home-slider-text-1', 'homepage-top-image text 1', 'The text of the first image in the Pictures section is displayed at the top of the homepage', 'text', 'Shape Your Future in Beauty', NULL, '2024-08-16 20:38:46'),
(51, 'Homepage Slider', 'home-slider-text-2', 'homepage-top-image text 2', 'The text of the second image in the Pictures section is displayed at the top of the homepage', 'text', 'Where Creativity Meets Skill', NULL, '2024-08-16 20:38:46'),
(52, 'Homepage Slider', 'home-slider-text-3', 'homepage-top-image text 3', 'The text of the third image in the Pictures section is displayed at the top of the homepage', 'text', 'Hands-On Training, Real-World Experience', NULL, '2024-08-16 20:38:46'),
(53, 'Instagram Embeds', 'instagram-1', 'Instagram Post 1', 'Embedded instagram post shown on the homepage. Input link to instagram post from share menu here.', 'text', 'https://www.instagram.com/reel/C-KlGv2MuQ7/?utm_source=ig_web_copy_link&amp;igsh=MzRlODBiNWFlZA==', 'https://www.instagram.com/reel/C8WB6uuPvZz/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', '2024-09-12 02:20:20'),
(54, 'Instagram Embeds', 'instagram-2', 'Instagram Post 2', 'Embedded instagram post shown on the homepage. Input link to instagram post from share menu here.', 'text', 'https://www.instagram.com/reel/C_K1uS9sY86/?utm_source=ig_web_copy_link&amp;igsh=MzRlODBiNWFlZA==', 'https://www.instagram.com/reel/C8WB6uuPvZz/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', '2024-09-12 02:20:20'),
(55, 'Instagram Embeds', 'instagram-3', 'Instagram Post 3', 'Embedded instagram post shown on the homepage. Input link to instagram post from share menu here.', 'text', 'https://www.instagram.com/p/C-ZSV9vTbTX/?utm_source=ig_web_copy_link&amp;igsh=MzRlODBiNWFlZA==', 'https://www.instagram.com/reel/C8WB6uuPvZz/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', '2024-09-12 02:20:20'),
(57, 'Website Essentials', 'logo-dark', 'Dark Logo', 'Dark logo of your brand', 'image', '/content-blocks/uploads/logo-dark.7cf481d52f540cd931e1a692fcdc824e.png', '/content-blocks/uploads/logo.ba1b01517c030cc71cc48e1d2f2bad63.png', '2024-09-10 06:46:52'),
(58, 'Homepage Features List', 'feature-title-1', 'feature title 1', 'The title of the first feature in the Features section, is displayed under the slider of homepage', 'text', 'International Expert Instructors', NULL, '2024-10-07 04:34:11'),
(59, 'Homepage Features List', 'feature-description-1', 'feature description 1', 'The description of the first feature in the Features section, is displayed under the slider of homepage', 'text', 'Learn from seasoned professionals in the industry.', NULL, '2024-10-07 04:34:11'),
(60, 'Homepage Features List', 'feature-title-2', 'feature title 2', 'The title of the second feature in the Features section, is displayed under the slider of homepage', 'text', 'Flexible Classes', NULL, '2024-10-07 04:34:11'),
(61, 'Homepage Features List', 'feature-description-2', 'feature description 2', 'The description of the second feature in the Features section, is displayed under the slider of homepage', 'text', 'Day, evening, and weekend classes available.', NULL, '2024-10-07 04:34:11'),
(62, 'Homepage Features List', 'feature-title-3', 'feature title 3', 'The title of the third feature in the Features section, is displayed under the slider of homepage', 'text', 'Comprehensive Curriculum', NULL, '2024-10-07 04:34:11'),
(63, 'Homepage Features List', 'feature-description-3', 'feature description 3', 'The description of the third feature in the Features section, is displayed under the slider of homepage', 'text', 'Covering all aspects of cosmetology, from basics to advanced techniques.', NULL, '2024-10-07 04:34:11'),
(64, 'Homepage Meet Lisa', 'meet-lisa-paragraph-1', 'Paragraph 1', 'The first paragraph in the Meet Lisa section', 'text', 'I\'m Lisa, the CEO of South Adelaide Beauty and Education, I have over two decades of experience as a beauty therapist. I am armed with a current diploma in Beauty Therapy and a cert 4 in Training and Assessment with many years of teaching experience. I\\’m extremely passionate about delivering quality training that will enhance the overall standard of our beauty industry.', NULL, '2024-10-07 04:46:57'),
(65, 'Homepage Meet Lisa', 'meet-lisa-paragraph-2', 'Paragraph 2', 'The second paragraph in the Meet Lisa section', 'text', 'It might surprise you that the beauty industry remains largely unregulated, allowing individuals to claim the title of a beauty therapist after merely watching a YouTube video. At South Adelaide Beauty & Education, we\'re working to ensure that the therapists out there are of the highest quality.', NULL, '2024-10-07 04:46:57'),
(66, 'Murad Section', 'homepage-murad-image-1', 'homepage-murad image 1', 'The first image shown in the home page murad section.', 'image', '/content-blocks/uploads/homepage-murad-image-1.e58bf627c0f223191f37cbc2a35f4b12.jpg', NULL, '2024-10-07 15:35:38'),
(67, 'Murad Section', 'homepage-murad-image-2', 'homepage-murad image 2', 'The second image shown in the home page murad section.', 'image', '/content-blocks/uploads/homepage-murad-image-2.05ebc138a07832af4d2a67b22485e298.jpg', NULL, '2024-10-07 15:35:55'),
(68, 'Murad Section', 'homepage-murad-image-3', 'homepage-murad image 3', 'The third image shown in the home page murad section.', 'image', '/content-blocks/uploads/homepage-murad-image-3.1a4bd9e314425156008a287d822f2af2.jpg', NULL, '2024-10-07 15:36:15'),
(69, 'Murad Section', 'murad-description', 'murad-page description', 'The description shown in the murad page.', 'text', 'Murad is the dermatologist-developed brand that approaches skin differently. How? Through founder Dr. Howard Murad’s four main pillars of wellness for total skin health: 1) “eat your water,” 2) “awaken your body,” 3) “be kind to your mind” and, of course, 4) “nourish your skin” with our high-performance technologies and formulas. Because we believe skincare is healthcare and selfcare.', NULL, '2024-10-07 05:04:51'),
(70, 'Murad Section', 'murad-image-1', 'murad page image 1', 'The image 1 shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-1.b0ce855a69c50d24f61e76df526190b2.jpeg', NULL, '2024-10-07 15:36:36'),
(71, 'Murad Section', 'murad-image-2', 'murad page image 2', 'The image 2 shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-2.84043c1c59b5da3bf0f166842ffb4dea.png', NULL, '2024-10-07 15:36:49'),
(72, 'Murad Section', 'murad-image-3', 'murad page image 3', 'The image 3 shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-3.bec275f40a5f6d73365ead9fc3bd8066.jpeg', NULL, '2024-10-07 15:37:04'),
(73, 'Murad Section', 'murad-image-4', 'murad page image 4', 'The image 4 shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-4.b07dc7755722dca4d056d7db5bf485aa.jpeg', NULL, '2024-10-07 15:37:13'),
(74, 'Murad Section', 'murad-image-5', 'murad page image 5', 'The image 5 shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-5.47285bc798af52e461dbd83e23d8992e.jpg', NULL, '2024-10-07 15:37:25'),
(75, 'Murad Section', 'murad-image-6', 'murad page image 6', 'The image 6 shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-6.3cbdb9b1068c9b14ebacc3c89d2743f9.jpeg', NULL, '2024-10-07 15:37:34'),
(76, 'Murad Section', 'murad-image-banner', 'murad page banner', 'The banner image shown in the murad page.', 'image', '/content-blocks/uploads/murad-image-banner.7c20cd267139e52c2eff41a81e341775.jpeg', NULL, '2024-10-07 15:37:44'),
(77, 'Website Essentials', 'opening-hours', 'Opening-Hours', 'The opening hours for your place, shown on the footer of the page.', 'text', 'Monday to Friday: 9:30 - 20:00', NULL, '2024-08-16 20:38:42'),
(78, 'Beauty By Lisa', 'beauty-by-lisa-description', 'beauty by lisa description', 'The description of the Beauty By Lisa section Follet section, where you can find the best beauty products and services.', 'text', 'Welcome to Beauty by Lisa Follett, a home-based beauty sanctuary in Hallett Cove! With 20 years of\n                    industry experience across England and Australia, I am dedicated to bringing you the best in beauty\n                    therapy. I am also an educator in beauty therapy and I combine my expertise and passion for the\n                    beauty industry to create a comfortable and welcoming environment for all my clients. Explore our\n                    services and indulge in a personalized beauty experience designed just for you.', NULL, '2024-10-07 05:27:43'),
(79, 'Homepage Slider', 'home-slider-image-1', 'Image Carousel Image 1', 'The first background image displayed on the homepage', 'image', '/content-blocks/uploads/home-slider-image-1.6fae6caead4e482029594f055a66e918.jpg', '/content-blocks/uploads/home-slider-image-1.6e89685ded06998f1c955c8c61b8ede9.jpg', '2024-10-24 12:29:22'),
(80, 'Homepage Slider', 'home-slider-image-2', 'Image Carousel Image 2', 'The second background image displayed on the homepage', 'image', '/content-blocks/uploads/home-slider-image-2.c6616b1cb7bc24e51db9aaa52db583c1.jpg', '/content-blocks/uploads/home-slider-image-2.07cf841e8dd6272430d81d374d06a651.jpg', '2024-10-24 12:29:30'),
(81, 'Homepage Slider', 'home-slider-image-3', 'Image Carousel Image 3', 'The third background image displayed on the homepage', 'image', '/content-blocks/uploads/home-slider-image-3.a74d8a70f6486ad3eea3db836ca6d70d.jpg', '/content-blocks/uploads/home-slider-image-3.eba9d0f251462efdc16007967d5d831e.jpg', '2024-10-24 12:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `content_blocks_phinxlog`
--

CREATE TABLE `content_blocks_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_blocks_phinxlog`
--

INSERT INTO `content_blocks_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20230402063959, 'ContentBlocksMigration', '2024-08-12 22:55:20', '2024-08-12 22:55:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_description` varchar(1000) NOT NULL,
  `course_price` decimal(9,2) NOT NULL,
  `course_image` varchar(200) NOT NULL,
  `course_category` varchar(50) NOT NULL,
  `course_featured` int(11) NOT NULL DEFAULT 0,
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_price`, `course_image`, `course_category`, `course_featured`, `archived`) VALUES
(1, 'Back to Basics: Facial Workshop', 'Join us for an exclusive Back to Basics Facial Treatments Workshop! Perfect for beginners and those looking to refresh their skills, this hands-on session covers everything from skin science and safety to step-by-step facial techniques. Learn in a friendly, supportive environment with expert guidance. Gain confidence and practical experience to take your beauty skills to the next level. Spaces are limited—reserve your spot today!', 199.00, 'assets/img/products/pexels-arina-krasnikova-6663368.jpg', 'Workshop', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses_users`
--

CREATE TABLE `courses_users` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquirys`
--

CREATE TABLE `enquirys` (
  `enquiry_id` int(11) NOT NULL,
  `enquiry_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `enquiry_name` varchar(50) NOT NULL,
  `enquiry_email` varchar(100) NOT NULL,
  `enquiry_subject` varchar(100) NOT NULL,
  `enquiry_message` varchar(1000) NOT NULL,
  `enquiry_seen` int(11) DEFAULT 0,
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquirys`
--

INSERT INTO `enquirys` (`enquiry_id`, `enquiry_datetime`, `enquiry_name`, `enquiry_email`, `enquiry_subject`, `enquiry_message`, `enquiry_seen`, `archived`) VALUES
(5, '2024-09-26 19:19:47', 'John Smith', 'john.smith@gmail.com', 'Course Enquiry', 'I wanted to enquire about your custom courses.', 0, 0),
(10, '2024-09-29 22:25:01', 'John Enquiry', 'john@enquiry.com', 'I have an enquiry', 'HELP', 0, 0),
(11, '2024-09-29 22:31:31', 'John Archive', 'john@archive.com', 'Archive', 'hello', 0, 0),
(12, '2024-09-30 08:37:32', 'hfuehf', 'hufoifho', 'oijfiejoi', 'ijii', 0, 1),
(13, '2024-09-30 08:37:34', 'hfuehf', 'hufoifho', 'oijfiejoi', 'ijii', 0, 1),
(14, '2024-10-31 02:35:57', 'sadasd', 'asda@gmail.com', 'dasdas', 'dsada', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` decimal(9,2) NOT NULL,
  `payment_datetime` datetime NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checkout_id` varchar(256) NOT NULL,
  `payment_email` varchar(200) NOT NULL,
  `payment_seen` int(11) NOT NULL DEFAULT 0,
  `archived` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_amount`, `payment_datetime`, `course_id`, `user_id`, `checkout_id`, `payment_email`, `payment_seen`, `archived`) VALUES
(22, 199.00, '2024-09-18 16:56:52', 1, 14, 'null', 'emmalight@sabe.u24s1009.iedev.org', 0, 0),
(25, 199.00, '2024-10-31 12:39:09', 1, 5, 'null', 'admin@sabe.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progressions`
--

CREATE TABLE `progressions` (
  `progression_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 1,
  `completed_at` timestamp NULL DEFAULT current_timestamp(),
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progressions`
--

INSERT INTO `progressions` (`progression_id`, `user_id`, `content_id`, `is_completed`, `completed_at`, `archived`) VALUES
(9, 14, 17, 1, '2024-11-12 05:20:52', 0),
(10, 14, 19, 1, '2024-11-12 05:21:00', 0),
(11, 14, 20, 1, '2024-11-12 05:21:05', 0),
(12, 14, 21, 1, '2024-11-12 05:21:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quiz_json`)),
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `course_id`, `quiz_json`, `archived`) VALUES
(7, 1, '\"{\\\"title\\\":\\\"Facial Workshop Quiz\\\",\\\"pages\\\":[{\\\"elements\\\":{\\\"type\\\":\\\"radiogroup\\\",\\\"name\\\":\\\"Do you have all required equipment\\\",\\\"title\\\":\\\"Do you have all required equipment\\\",\\\"choicesOrder\\\":\\\"random\\\",\\\"choices\\\":[\\\"Yes\\\",\\\"No\\\"],\\\"correctAnswer\\\":\\\"Yes\\\",\\\"score\\\":1}},{\\\"elements\\\":{\\\"type\\\":\\\"radiogroup\\\",\\\"name\\\":\\\"Have you watched all the videos\\\",\\\"title\\\":\\\"Have you watched all the videos\\\",\\\"choicesOrder\\\":\\\"random\\\",\\\"choices\\\":[\\\"Yes\\\",\\\"No\\\"],\\\"correctAnswer\\\":\\\"Yes\\\",\\\"score\\\":1}},{\\\"elements\\\":{\\\"type\\\":\\\"radiogroup\\\",\\\"name\\\":\\\"Do you understand all course content\\\",\\\"title\\\":\\\"Do you understand all course content\\\",\\\"choicesOrder\\\":\\\"random\\\",\\\"choices\\\":[\\\"Yes\\\",\\\"No\\\"],\\\"correctAnswer\\\":\\\"Yes\\\",\\\"score\\\":1}},{\\\"elements\\\":{\\\"type\\\":\\\"radiogroup\\\",\\\"name\\\":\\\"What is your favourite pokemon?\\\",\\\"title\\\":\\\"What is your favourite pokemon?\\\",\\\"choicesOrder\\\":\\\"random\\\",\\\"choices\\\":[\\\"Charizard\\\",\\\"Pikachu\\\",\\\"Snowbro\\\",\\\"Mewtwo\\\"],\\\"correctAnswer\\\":\\\"Pikachu\\\",\\\"score\\\":1}}]}\"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `response_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `response_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`response_json`)),
  `response_score` float NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`response_id`, `user_id`, `quiz_id`, `response_json`, `response_score`, `submitted_at`, `archived`) VALUES
(26, 5, 6, '[{\"e?\":\"so true!!\"}]', 0, '2024-09-18 14:45:38', 0),
(27, 5, 6, '[{\"e?\":\"so true!!\"}]', 0, '2024-09-18 14:46:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `category_id`, `service_price`) VALUES
(4, 'Eyelash extensions', 1, 130.00),
(5, 'Lash lift & tint', 1, 90.00),
(6, 'Brow lamination', 1, 75.00),
(7, 'Eyelash tint', 1, 30.00),
(8, 'Eyebrow tint', 1, 20.00),
(9, 'Eyebrow wax', 1, 25.00),
(11, 'Body waxing', 11, 25.00),
(12, 'Facial waxing', 11, 15.00),
(13, 'Full body tan', 2, 30.00),
(14, 'SQT Bio-micro needling', 3, 280.00),
(15, 'Ultimate facial - 90 mins', 3, 180.00),
(16, 'Classic facial - 60 mins', 3, 140.00),
(17, 'Express facial - 30 mins', 3, 90.00),
(18, 'Heavenly head treatment - 60 mins', 4, 100.00),
(19, 'Heavenly head treatment - 30 mins', 4, 45.00),
(20, 'Body massage - 60 mins', 4, 100.00),
(21, 'Body massage - 30 mins', 4, 65.00),
(22, 'Pedicure', 5, 75.00),
(23, 'Reflexology for relaxation', 5, 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `service_categorys`
--

CREATE TABLE `service_categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_categorys`
--

INSERT INTO `service_categorys` (`category_id`, `category_name`) VALUES
(1, 'Lash & Brow Treatments'),
(2, 'Spray Tan'),
(3, 'Skincare Treatments'),
(4, 'Massage Treatments'),
(5, 'Foot Treatments'),
(11, 'Hair Removal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nonce` varchar(255) DEFAULT NULL,
  `nonce_expiry` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `login_attempts` int(11) NOT NULL DEFAULT 0,
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_surname`, `email`, `user_phone`, `user_type`, `password`, `nonce`, `nonce_expiry`, `created`, `modified`, `login_attempts`, `archived`) VALUES
(5, 'Lisa', 'Follett', 'admin@sabe.com', '0000000000', 'admin', '$2y$10$3cElDKe6O1ti1UWc08S/Gu0NF1RrlMDLugbiV3u4x2JLRikDWyNMO', '7bcdc054abf55d462d062e81b279fa703f64daab05453626d2e610881ddc6499ad1470769c93b93ef11197b6f35dd92813e287d3dabc00437426ff6e66d08c17', '2024-10-31 13:56:11', NULL, NULL, 0, 0),
(13, 'Lisa', 'Follett', 'admin@sabe.u24s1009.iedev.org', '0412345678', 'admin', '$2y$10$Qn1ZHgyHd.jVo/myePX30.MMc2gj/36A7ZECyIpKusRKwUg9tN06O', NULL, NULL, NULL, NULL, 0, 0),
(14, 'Emma', 'Light', 'emmalight@sabe.u24s1009.iedev.org', '0412345678', 'student', '$2y$10$LKcRQIJg/pQqR6vkmBSNQOWQiUYPG67AlaXGxMDXMvO28mZASqqwy', NULL, NULL, NULL, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completions`
--
ALTER TABLE `completions`
  ADD PRIMARY KEY (`completion_id`),
  ADD KEY `completion_user_fk` (`user_id`),
  ADD KEY `completion_course_fk` (`course_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `content_course_fk` (`course_id`);

--
-- Indexes for table `content_blocks`
--
ALTER TABLE `content_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_blocks_phinxlog`
--
ALTER TABLE `content_blocks_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courses_users`
--
ALTER TABLE `courses_users`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `courses_users_user_fk` (`user_id`);

--
-- Indexes for table `enquirys`
--
ALTER TABLE `enquirys`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_course_fk` (`course_id`),
  ADD KEY `payment_user_fk` (`user_id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `progressions`
--
ALTER TABLE `progressions`
  ADD PRIMARY KEY (`progression_id`),
  ADD KEY `progression_user_fk` (`user_id`),
  ADD KEY `progression_content_fk` (`content_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `quiz_course_fk` (`course_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `response_user_fk` (`user_id`),
  ADD KEY `response_quiz_fk` (`quiz_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_category_fk` (`category_id`);

--
-- Indexes for table `service_categorys`
--
ALTER TABLE `service_categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_uq` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `completions`
--
ALTER TABLE `completions`
  MODIFY `completion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `content_blocks`
--
ALTER TABLE `content_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `enquirys`
--
ALTER TABLE `enquirys`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `progressions`
--
ALTER TABLE `progressions`
  MODIFY `progression_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `service_categorys`
--
ALTER TABLE `service_categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `completions`
--
ALTER TABLE `completions`
  ADD CONSTRAINT `completion_course_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `completion_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `courses_users`
--
ALTER TABLE `courses_users`
  ADD CONSTRAINT `courses_users_course_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `courses_users_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_course_fk` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `payment_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `service_category_fk` FOREIGN KEY (`category_id`) REFERENCES `service_categorys` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
