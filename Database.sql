-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Sep 2022 pada 09.47
-- Versi server: 10.3.35-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemeshs1_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `device` text NOT NULL,
  `browser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agent`
--

INSERT INTO `agent` (`id`, `device`, `browser`) VALUES
(1, 'Desktop', 'Chrome'),
(2, 'Mobile', 'Chrome'),
(3, 'Desktop', 'Chrome'),
(4, 'Desktop', 'Chrome'),
(5, 'Desktop', 'Chrome'),
(6, 'Mobile', 'Chrome'),
(7, 'Mobile', 'Chrome'),
(8, 'Mobile', 'Chrome'),
(9, 'Mobile', 'Chrome'),
(10, 'Desktop', 'Chrome'),
(11, 'Mobile', 'Chrome'),
(12, 'Desktop', 'Chrome'),
(13, 'Desktop', 'Chrome'),
(14, 'Mobile', 'Chrome'),
(15, 'Desktop', 'Chrome'),
(16, 'Desktop', 'Chrome'),
(17, 'Desktop', 'Chrome'),
(18, 'Desktop', 'Chrome'),
(19, 'Desktop', 'Chrome'),
(20, 'Desktop', 'Chrome'),
(21, 'Mobile', 'Chrome'),
(22, 'Desktop', 'Chrome'),
(23, 'Mobile', 'Chrome'),
(24, 'Desktop', 'Chrome'),
(25, 'Desktop', 'Chrome'),
(26, 'Desktop', 'Chrome'),
(27, 'Desktop', 'Chrome'),
(28, 'Mobile', 'Chrome'),
(29, 'Desktop', 'Chrome'),
(30, 'Mobile', 'Chrome'),
(31, 'Desktop', 'Chrome'),
(32, 'Desktop', 'Chrome'),
(33, 'Desktop', 'Chrome'),
(34, 'Desktop', 'Chrome'),
(35, 'Desktop', 'Chrome'),
(36, 'Desktop', 'Chrome'),
(37, 'Desktop', 'Chrome'),
(38, 'Mobile', 'Chrome'),
(39, 'Desktop', 'Chrome'),
(40, 'Mobile', 'Chrome'),
(41, 'Mobile', 'Chrome'),
(42, 'Desktop', 'Chrome'),
(43, 'Desktop', 'Chrome'),
(44, 'Desktop', 'Chrome'),
(45, 'Desktop', 'Chrome'),
(46, 'Mobile', 'Chrome'),
(47, 'Desktop', 'Chrome'),
(48, 'Desktop', 'Chrome'),
(49, 'Desktop', 'Chrome'),
(50, 'Desktop', 'Chrome'),
(51, 'Mobile', 'Chrome'),
(52, 'Mobile', 'Chrome'),
(53, 'Mobile', 'Chrome'),
(54, 'Mobile', 'Chrome'),
(55, 'Mobile', 'Chrome'),
(56, 'Desktop', 'Chrome'),
(57, 'Desktop', 'Chrome'),
(58, 'Desktop', 'Chrome'),
(59, 'Mobile', 'Chrome'),
(60, 'Mobile', 'Chrome'),
(61, 'Mobile', 'Chrome'),
(62, 'Mobile', 'Chrome'),
(63, 'Mobile', 'Chrome'),
(64, 'Mobile', 'Chrome'),
(65, 'Desktop', 'Chrome'),
(66, 'Desktop', 'Chrome'),
(67, 'Desktop', 'Chrome'),
(68, 'Desktop', 'Chrome'),
(69, 'Desktop', 'Chrome'),
(70, 'Desktop', 'Chrome'),
(71, 'Desktop', 'Chrome'),
(72, 'Desktop', 'Chrome'),
(73, 'Desktop', 'Chrome'),
(74, 'Mobile', 'Chrome'),
(75, 'Mobile', 'Chrome'),
(76, 'Mobile', 'Chrome'),
(77, 'Mobile', 'Chrome'),
(78, 'Mobile', 'Chrome'),
(79, 'Mobile', 'Chrome'),
(80, 'Mobile', 'Chrome'),
(81, 'Mobile', 'Chrome'),
(82, 'Desktop', 'Chrome'),
(83, 'Desktop', 'Chrome'),
(84, 'Desktop', 'Chrome'),
(85, 'Desktop', 'Chrome'),
(86, 'Desktop', 'Chrome'),
(87, 'Mobile', 'Chrome'),
(88, 'Desktop', 'Chrome'),
(89, 'Desktop', 'Chrome'),
(90, 'Desktop', 'Chrome'),
(91, 'Desktop', 'Chrome'),
(92, 'Desktop', 'Chrome'),
(93, 'Desktop', 'Chrome'),
(94, 'Desktop', 'Chrome'),
(95, 'Desktop', 'Chrome'),
(96, 'Desktop', 'Chrome'),
(97, 'Desktop', 'Chrome'),
(98, 'Desktop', 'Chrome'),
(99, 'Desktop', 'Chrome'),
(100, 'Desktop', 'Chrome'),
(101, 'Desktop', 'Chrome'),
(102, 'Desktop', 'Chrome'),
(103, 'Desktop', 'Chrome'),
(104, 'Desktop', 'Chrome'),
(105, 'Mobile', 'Chrome'),
(106, 'Desktop', 'Chrome'),
(107, 'Desktop', 'Chrome'),
(108, 'Mobile', 'Chrome'),
(109, 'Mobile', 'Chrome'),
(110, 'Mobile', 'Chrome'),
(111, 'Mobile', 'Chrome'),
(112, 'Mobile', 'Chrome'),
(113, 'Mobile', 'Chrome'),
(114, 'Mobile', 'Chrome'),
(115, 'Mobile', 'Chrome'),
(116, 'Desktop', 'Chrome'),
(117, 'Desktop', 'Chrome'),
(118, 'Desktop', 'Chrome'),
(119, 'Desktop', 'Chrome'),
(120, 'Mobile', 'Chrome'),
(121, 'Mobile', 'Chrome'),
(122, 'Desktop', 'Chrome'),
(123, 'Desktop', 'Chrome'),
(124, 'Desktop', 'Chrome'),
(125, 'Desktop', 'Chrome'),
(126, 'Desktop', 'Chrome'),
(127, 'Mobile', 'Chrome'),
(128, 'Mobile', 'Chrome'),
(129, 'Mobile', 'Chrome'),
(130, 'Mobile', 'Chrome'),
(131, 'Mobile', 'Chrome'),
(132, 'Mobile', 'Chrome'),
(133, 'Desktop', 'Chrome'),
(134, 'Desktop', 'Chrome'),
(135, 'Desktop', 'Chrome'),
(136, 'Mobile', 'Chrome'),
(137, 'Mobile', 'Chrome'),
(138, 'Mobile', 'Chrome'),
(139, 'Mobile', 'Chrome'),
(140, 'Mobile', 'Chrome'),
(141, 'Mobile', 'Chrome'),
(142, 'Desktop', 'Chrome'),
(143, 'Desktop', 'Chrome'),
(144, 'Desktop', 'Chrome'),
(145, 'Mobile', 'Chrome'),
(146, 'Mobile', 'Chrome'),
(147, 'Mobile', 'Chrome'),
(148, 'Mobile', 'Chrome'),
(149, 'Mobile', 'Chrome'),
(150, 'Desktop', 'Chrome'),
(151, 'Mobile', 'Chrome'),
(152, 'Mobile', 'Chrome'),
(153, 'Desktop', 'Chrome'),
(154, 'Mobile', 'Chrome'),
(155, 'Desktop', 'Chrome'),
(156, 'Mobile', 'Chrome'),
(157, 'Desktop', 'Chrome'),
(158, 'Mobile', 'Chrome'),
(159, 'Mobile', 'Chrome'),
(160, 'Desktop', 'Chrome'),
(161, 'Mobile', 'Chrome'),
(162, 'Mobile', 'Chrome'),
(163, 'Mobile', 'Chrome'),
(164, 'Mobile', 'Chrome'),
(165, 'Mobile', 'Chrome'),
(166, 'Desktop', 'Chrome'),
(167, 'Mobile', 'Chrome'),
(168, 'Desktop', 'Chrome'),
(169, 'Desktop', 'Chrome'),
(170, 'Desktop', 'Chrome'),
(171, 'Mobile', 'Chrome'),
(172, 'Desktop', 'Chrome'),
(173, 'Mobile', 'Chrome'),
(174, 'Mobile', 'Chrome'),
(175, 'Mobile', 'Chrome'),
(176, 'Desktop', 'Chrome'),
(177, 'Mobile', 'Chrome'),
(178, 'Mobile', 'Chrome'),
(179, 'Mobile', 'Chrome'),
(180, 'Desktop', 'Chrome'),
(181, 'Mobile', 'Chrome'),
(182, 'Mobile', 'Chrome'),
(183, 'Mobile', 'Chrome'),
(184, 'Desktop', 'Chrome'),
(185, 'Desktop', 'Chrome'),
(186, 'Desktop', 'Chrome'),
(187, 'Desktop', 'Chrome'),
(188, 'Desktop', 'Chrome'),
(189, 'Mobile', 'Chrome'),
(190, 'Mobile', 'Chrome'),
(191, 'Desktop', 'Chrome'),
(192, 'Mobile', 'Chrome'),
(193, 'Mobile', 'Chrome'),
(194, 'Mobile', 'Chrome'),
(195, 'Desktop', 'Chrome'),
(196, 'Desktop', 'Chrome'),
(197, 'Desktop', 'Chrome'),
(198, 'Mobile', 'Chrome'),
(199, 'Desktop', 'Chrome'),
(200, 'Mobile', 'Chrome'),
(201, 'Mobile', 'Chrome'),
(202, 'Desktop', 'Chrome'),
(203, 'Mobile', 'Chrome'),
(204, 'Desktop', 'Chrome'),
(205, 'Mobile', 'Chrome'),
(206, 'Mobile', 'Chrome'),
(207, 'Desktop', 'Chrome'),
(208, 'Desktop', 'Chrome'),
(209, 'Mobile', 'Chrome'),
(210, 'Mobile', 'Chrome'),
(211, 'Desktop', 'Chrome'),
(212, 'Mobile', 'Chrome'),
(213, 'Desktop', 'Chrome'),
(214, 'Mobile', 'Chrome'),
(215, 'Desktop', 'Chrome'),
(216, 'Mobile', 'Chrome'),
(217, 'Mobile', 'Chrome'),
(218, 'Desktop', 'Chrome'),
(219, 'Mobile', 'Chrome'),
(220, 'Mobile', 'Chrome'),
(221, 'Desktop', 'Chrome'),
(222, 'Mobile', 'Chrome'),
(223, 'Desktop', 'Chrome'),
(224, 'Mobile', 'Chrome'),
(225, 'Mobile', 'Chrome'),
(226, 'Mobile', 'Chrome'),
(227, 'Desktop', 'Chrome'),
(228, 'Mobile', 'Chrome'),
(229, 'Mobile', 'Chrome'),
(230, 'Desktop', 'Chrome'),
(231, 'Mobile', 'Chrome'),
(232, 'Mobile', 'Chrome'),
(233, 'Mobile', 'Chrome'),
(234, 'Mobile', 'Chrome'),
(235, 'Desktop', 'Chrome'),
(236, 'Mobile', 'Chrome'),
(237, 'Mobile', 'Chrome'),
(238, 'Mobile', 'Chrome'),
(239, 'Desktop', 'Chrome'),
(240, 'Mobile', 'Chrome'),
(241, 'Desktop', 'Chrome'),
(242, 'Mobile', 'Chrome'),
(243, 'Mobile', 'Chrome'),
(244, 'Desktop', 'Chrome'),
(245, 'Mobile', 'Chrome'),
(246, 'Mobile', 'Chrome'),
(247, 'Desktop', 'Chrome'),
(248, 'Mobile', 'Chrome'),
(249, 'Mobile', 'Chrome'),
(250, 'Mobile', 'Chrome'),
(251, 'Mobile', 'Chrome'),
(252, 'Desktop', 'Firefox'),
(253, 'Mobile', 'Chrome'),
(254, 'Mobile', 'Chrome'),
(255, 'Mobile', 'Chrome'),
(256, 'Desktop', 'Firefox'),
(257, 'Mobile', 'Chrome'),
(258, 'Desktop', 'Chrome'),
(259, 'Mobile', 'Chrome'),
(260, 'Mobile', 'Chrome'),
(261, 'Mobile', 'Chrome'),
(262, 'Desktop', 'Chrome'),
(263, 'Desktop', 'Chrome'),
(264, 'Desktop', 'Chrome'),
(265, 'Desktop', 'Chrome'),
(266, 'Mobile', 'Chrome'),
(267, 'Mobile', 'Chrome'),
(268, 'Mobile', 'Chrome'),
(269, 'Mobile', 'Chrome'),
(270, 'Mobile', 'Chrome'),
(271, 'Desktop', 'Chrome'),
(272, 'Mobile', 'Chrome'),
(273, 'Desktop', 'Chrome'),
(274, 'Desktop', 'Chrome'),
(275, 'Mobile', 'Chrome'),
(276, 'Mobile', 'Chrome'),
(277, 'Mobile', 'Chrome'),
(278, 'Mobile', 'Chrome'),
(279, 'Mobile', 'Chrome'),
(280, 'Mobile', 'Chrome'),
(281, 'Desktop', 'Chrome'),
(282, 'Mobile', 'Chrome'),
(283, 'Desktop', 'Chrome'),
(284, 'Mobile', 'Chrome'),
(285, 'Desktop', 'Chrome'),
(286, 'Desktop', 'Chrome'),
(287, 'Mobile', 'Chrome'),
(288, 'Mobile', 'Chrome'),
(289, 'Mobile', 'Chrome'),
(290, 'Desktop', 'Chrome'),
(291, 'Desktop', 'Chrome'),
(292, 'Mobile', 'Chrome'),
(293, 'Mobile', 'Chrome'),
(294, 'Desktop', 'Chrome'),
(295, 'Mobile', 'Chrome'),
(296, 'Mobile', 'Chrome'),
(297, 'Mobile', 'Chrome'),
(298, 'Mobile', 'Chrome'),
(299, 'Mobile', 'Chrome'),
(300, 'Desktop', 'Chrome'),
(301, 'Mobile', 'Chrome'),
(302, 'Desktop', 'Chrome'),
(303, 'Desktop', 'Chrome'),
(304, 'Desktop', 'Chrome'),
(305, 'Desktop', 'Chrome'),
(306, 'Desktop', 'Chrome'),
(307, 'Desktop', 'Chrome'),
(308, 'Desktop', 'Chrome'),
(309, 'Desktop', 'Chrome'),
(310, 'Desktop', 'Chrome'),
(311, 'Desktop', 'Chrome'),
(312, 'Desktop', 'Chrome'),
(313, 'Desktop', 'Chrome'),
(314, 'Desktop', 'Chrome'),
(315, 'Mobile', 'Chrome'),
(316, 'Desktop', 'Chrome'),
(317, 'Desktop', 'Chrome'),
(318, 'Desktop', 'Chrome'),
(319, 'Desktop', 'Chrome'),
(320, 'Desktop', 'Chrome'),
(321, 'Mobile', 'Chrome'),
(322, 'Mobile', 'Chrome'),
(323, 'Desktop', 'Chrome'),
(324, 'Desktop', 'Chrome'),
(325, 'Mobile', 'Chrome'),
(326, 'Mobile', 'Chrome'),
(327, 'Desktop', 'Chrome'),
(328, 'Desktop', 'Chrome'),
(329, 'Mobile', 'Other'),
(330, 'Mobile', 'Other'),
(331, 'Mobile', 'Chrome'),
(332, 'Mobile', 'Chrome'),
(333, 'Desktop', 'Chrome'),
(334, 'Desktop', 'Chrome'),
(335, 'Desktop', 'Chrome'),
(336, 'Mobile', 'Chrome'),
(337, 'Mobile', 'Chrome'),
(338, 'Mobile', 'Chrome'),
(339, 'Mobile', 'Chrome'),
(340, 'Mobile', 'Chrome'),
(341, 'Mobile', 'Chrome'),
(342, 'Mobile', 'Chrome'),
(343, 'Mobile', 'Chrome'),
(344, 'Desktop', 'Chrome'),
(345, 'Desktop', 'Chrome'),
(346, 'Mobile', 'Chrome'),
(347, 'Mobile', 'Chrome'),
(348, 'Mobile', 'Chrome'),
(349, 'Desktop', 'Chrome'),
(350, 'Desktop', 'Chrome'),
(351, 'Desktop', 'Chrome'),
(352, 'Mobile', 'Chrome'),
(353, 'Mobile', 'Chrome'),
(354, 'Mobile', 'Chrome'),
(355, 'Mobile', 'Chrome'),
(356, 'Mobile', 'Chrome'),
(357, 'Mobile', 'Chrome'),
(358, 'Mobile', 'Chrome'),
(359, 'Mobile', 'Chrome'),
(360, 'Mobile', 'Chrome'),
(361, 'Desktop', 'Chrome'),
(362, 'Desktop', 'Chrome'),
(363, 'Desktop', 'Chrome'),
(364, 'Desktop', 'Chrome'),
(365, 'Desktop', 'Chrome'),
(366, 'Desktop', 'Chrome'),
(367, 'Mobile', 'Chrome'),
(368, 'Mobile', 'Chrome'),
(369, 'Mobile', 'Chrome'),
(370, 'Mobile', 'Chrome'),
(371, 'Mobile', 'Chrome'),
(372, 'Mobile', 'Chrome'),
(373, 'Mobile', 'Chrome'),
(374, 'Mobile', 'Chrome'),
(375, 'Mobile', 'Chrome'),
(376, 'Desktop', 'Chrome'),
(377, 'Desktop', 'Chrome'),
(378, 'Mobile', 'Chrome'),
(379, 'Mobile', 'Chrome'),
(380, 'Mobile', 'Chrome'),
(381, 'Desktop', 'Chrome'),
(382, 'Mobile', 'Chrome'),
(383, 'Mobile', 'Chrome'),
(384, 'Mobile', 'Chrome'),
(385, 'Desktop', 'Chrome'),
(386, 'Mobile', 'Chrome'),
(387, 'Desktop', 'Chrome'),
(388, 'Mobile', 'Chrome'),
(389, 'Desktop', 'Chrome'),
(390, 'Mobile', 'Chrome'),
(391, 'Desktop', 'Chrome'),
(392, 'Mobile', 'Chrome'),
(393, 'Desktop', 'Chrome'),
(394, 'Mobile', 'Chrome'),
(395, 'Desktop', 'Chrome'),
(396, 'Desktop', 'Chrome'),
(397, 'Mobile', 'Chrome'),
(398, 'Desktop', 'Chrome'),
(399, 'Desktop', 'Chrome'),
(400, 'Mobile', 'Chrome'),
(401, 'Mobile', 'Chrome'),
(402, 'Mobile', 'Chrome'),
(403, 'Desktop', 'Chrome'),
(404, 'Mobile', 'Chrome'),
(405, 'Mobile', 'Chrome'),
(406, 'Desktop', 'Chrome'),
(407, 'Desktop', 'Chrome'),
(408, 'Mobile', 'Chrome'),
(409, 'Desktop', 'Chrome'),
(410, 'Mobile', 'Chrome'),
(411, 'Desktop', 'Chrome'),
(412, 'Mobile', 'Chrome'),
(413, 'Mobile', 'Chrome'),
(414, 'Mobile', 'Chrome'),
(415, 'Mobile', 'Chrome'),
(416, 'Mobile', 'Chrome'),
(417, 'Mobile', 'Chrome'),
(418, 'Mobile', 'Chrome'),
(419, 'Mobile', 'Chrome'),
(420, 'Mobile', 'Chrome'),
(421, 'Mobile', 'Chrome'),
(422, 'Desktop', 'Chrome'),
(423, 'Desktop', 'Chrome'),
(424, 'Mobile', 'Chrome'),
(425, 'Mobile', 'Chrome'),
(426, 'Mobile', 'Chrome'),
(427, 'Mobile', 'Chrome'),
(428, 'Mobile', 'Chrome'),
(429, 'Mobile', 'Chrome'),
(430, 'Mobile', 'Chrome'),
(431, 'Mobile', 'Chrome'),
(432, 'Desktop', 'Chrome'),
(433, 'Mobile', 'Chrome'),
(434, 'Desktop', 'Chrome'),
(435, 'Desktop', 'Chrome'),
(436, 'Desktop', 'Chrome'),
(437, 'Mobile', 'Chrome'),
(438, 'Mobile', 'Chrome'),
(439, 'Desktop', 'Chrome'),
(440, 'Desktop', 'Chrome'),
(441, 'Mobile', 'Chrome'),
(442, 'Desktop', 'Chrome'),
(443, 'Desktop', 'Chrome'),
(444, 'Desktop', 'Chrome'),
(445, 'Mobile', 'Chrome'),
(446, 'Desktop', 'Chrome'),
(447, 'Desktop', 'Chrome'),
(448, 'Mobile', 'Chrome'),
(449, 'Desktop', 'Chrome'),
(450, 'Mobile', 'Chrome'),
(451, 'Desktop', 'Chrome'),
(452, 'Desktop', 'Chrome'),
(453, 'Mobile', 'Chrome'),
(454, 'Mobile', 'Chrome'),
(455, 'Mobile', 'Chrome'),
(456, 'Mobile', 'Chrome'),
(457, 'Desktop', 'Chrome'),
(458, 'Mobile', 'Chrome'),
(459, 'Mobile', 'Chrome'),
(460, 'Mobile', 'Chrome'),
(461, 'Mobile', 'Chrome'),
(462, 'Mobile', 'Chrome'),
(463, 'Mobile', 'Chrome'),
(464, 'Mobile', 'Chrome'),
(465, 'Mobile', 'Chrome'),
(466, 'Mobile', 'Chrome'),
(467, 'Mobile', 'Chrome'),
(468, 'Mobile', 'Chrome'),
(469, 'Mobile', 'Chrome'),
(470, 'Mobile', 'Chrome'),
(471, 'Desktop', 'Chrome'),
(472, 'Desktop', 'Chrome'),
(473, 'Mobile', 'Chrome'),
(474, 'Desktop', 'Chrome'),
(475, 'Mobile', 'Chrome'),
(476, 'Desktop', 'Chrome'),
(477, 'Desktop', 'Chrome'),
(478, 'Mobile', 'Chrome'),
(479, 'Mobile', 'Chrome'),
(480, 'Mobile', 'Chrome'),
(481, 'Mobile', 'Chrome'),
(482, 'Desktop', 'Chrome'),
(483, 'Desktop', 'Chrome'),
(484, 'Desktop', 'Chrome'),
(485, 'Desktop', 'Chrome'),
(486, 'Mobile', 'Chrome'),
(487, 'Mobile', 'Chrome'),
(488, 'Mobile', 'Chrome'),
(489, 'Mobile', 'Chrome'),
(490, 'Mobile', 'Chrome'),
(491, 'Mobile', 'Chrome'),
(492, 'Mobile', 'Chrome'),
(493, 'Mobile', 'Chrome'),
(494, 'Desktop', 'Chrome'),
(495, 'Desktop', 'Chrome'),
(496, 'Mobile', 'Chrome'),
(497, 'Mobile', 'Chrome'),
(498, 'Mobile', 'Chrome'),
(499, 'Desktop', 'Chrome'),
(500, 'Mobile', 'Chrome'),
(501, 'Mobile', 'Chrome'),
(502, 'Mobile', 'Chrome'),
(503, 'Desktop', 'Chrome'),
(504, 'Desktop', 'Chrome'),
(505, 'Mobile', 'Chrome'),
(506, 'Mobile', 'Other'),
(507, 'Mobile', 'Chrome'),
(508, 'Desktop', 'Chrome'),
(509, 'Mobile', 'Chrome'),
(510, 'Mobile', 'Chrome'),
(511, 'Mobile', 'Chrome'),
(512, 'Mobile', 'Chrome'),
(513, 'Desktop', 'Chrome'),
(514, 'Desktop', 'Chrome'),
(515, 'Mobile', 'Chrome'),
(516, 'Mobile', 'Chrome'),
(517, 'Mobile', 'Chrome'),
(518, 'Mobile', 'Chrome'),
(519, 'Mobile', 'Chrome'),
(520, 'Mobile', 'Chrome'),
(521, 'Mobile', 'Chrome'),
(522, 'Mobile', 'Chrome'),
(523, 'Mobile', 'Chrome'),
(524, 'Mobile', 'Chrome'),
(525, 'Mobile', 'Chrome'),
(526, 'Desktop', 'Chrome'),
(527, 'Desktop', 'Chrome'),
(528, 'Desktop', 'Chrome'),
(529, 'Mobile', 'Chrome'),
(530, 'Desktop', 'Chrome'),
(531, 'Mobile', 'Chrome'),
(532, 'Desktop', 'Chrome'),
(533, 'Desktop', 'Chrome'),
(534, 'Mobile', 'Chrome'),
(535, 'Mobile', 'Chrome'),
(536, 'Desktop', 'Chrome'),
(537, 'Desktop', 'Chrome'),
(538, 'Mobile', 'Chrome'),
(539, 'Mobile', 'Chrome'),
(540, 'Mobile', 'Chrome'),
(541, 'Desktop', 'Chrome'),
(542, 'Mobile', 'Chrome'),
(543, 'Desktop', 'Chrome'),
(544, 'Mobile', 'Chrome'),
(545, 'Mobile', 'Chrome'),
(546, 'Mobile', 'Chrome'),
(547, 'Desktop', 'Chrome'),
(548, 'Mobile', 'Chrome'),
(549, 'Mobile', 'Chrome'),
(550, 'Mobile', 'Chrome'),
(551, 'Mobile', 'Chrome'),
(552, 'Desktop', 'Chrome'),
(553, 'Mobile', 'Chrome'),
(554, 'Desktop', 'Chrome'),
(555, 'Desktop', 'Chrome'),
(556, 'Desktop', 'Chrome'),
(557, 'Desktop', 'Chrome'),
(558, 'Desktop', 'Chrome'),
(559, 'Desktop', 'Chrome'),
(560, 'Mobile', 'Chrome'),
(561, 'Mobile', 'Chrome'),
(562, 'Desktop', 'Chrome'),
(563, 'Desktop', 'Chrome'),
(564, 'Desktop', 'Chrome'),
(565, 'Desktop', 'Chrome'),
(566, 'Desktop', 'Chrome'),
(567, 'Desktop', 'Chrome'),
(568, 'Desktop', 'Chrome'),
(569, 'Mobile', 'Chrome'),
(570, 'Desktop', 'Chrome'),
(571, 'Desktop', 'Chrome'),
(572, 'Desktop', 'Chrome'),
(573, 'Desktop', 'Chrome'),
(574, 'Desktop', 'Chrome'),
(575, 'Desktop', 'Chrome'),
(576, 'Desktop', 'Chrome'),
(577, 'Desktop', 'Chrome'),
(578, 'Mobile', 'Chrome'),
(579, 'Desktop', 'Chrome'),
(580, 'Desktop', 'Chrome'),
(581, 'Desktop', 'Chrome'),
(582, 'Desktop', 'Chrome'),
(583, 'Mobile', 'Chrome'),
(584, 'Desktop', 'Chrome'),
(585, 'Desktop', 'Chrome'),
(586, 'Mobile', 'Chrome'),
(587, 'Mobile', 'Chrome'),
(588, 'Mobile', 'Chrome'),
(589, 'Mobile', 'Chrome'),
(590, 'Desktop', 'Chrome'),
(591, 'Mobile', 'Chrome'),
(592, 'Desktop', 'Chrome'),
(593, 'Desktop', 'Chrome'),
(594, 'Desktop', 'Chrome'),
(595, 'Desktop', 'Chrome'),
(596, 'Mobile', 'Chrome'),
(597, 'Mobile', 'Chrome'),
(598, 'Mobile', 'Chrome'),
(599, 'Desktop', 'Chrome'),
(600, 'Mobile', 'Chrome'),
(601, 'Mobile', 'Chrome'),
(602, 'Desktop', 'Chrome'),
(603, 'Desktop', 'Chrome'),
(604, 'Desktop', 'Chrome'),
(605, 'Mobile', 'Chrome'),
(606, 'Mobile', 'Chrome'),
(607, 'Desktop', 'Chrome'),
(608, 'Desktop', 'Chrome'),
(609, 'Mobile', 'Chrome'),
(610, 'Desktop', 'Chrome'),
(611, 'Desktop', 'Chrome'),
(612, 'Desktop', 'Chrome'),
(613, 'Desktop', 'Chrome'),
(614, 'Desktop', 'Firefox'),
(615, 'Desktop', 'Chrome'),
(616, 'Mobile', 'Chrome'),
(617, 'Desktop', 'Chrome'),
(618, 'Desktop', 'Chrome'),
(619, 'Desktop', 'Chrome'),
(620, 'Desktop', 'Chrome'),
(621, 'Desktop', 'Chrome'),
(622, 'Mobile', 'Chrome'),
(623, 'Mobile', 'Chrome'),
(624, 'Mobile', 'Chrome'),
(625, 'Desktop', 'Chrome'),
(626, 'Desktop', 'Chrome'),
(627, 'Desktop', 'Chrome'),
(628, 'Desktop', 'Chrome'),
(629, 'Desktop', 'Chrome'),
(630, 'Mobile', 'Chrome'),
(631, 'Mobile', 'Chrome'),
(632, 'Mobile', 'Chrome'),
(633, 'Desktop', 'Chrome'),
(634, 'Desktop', 'Chrome'),
(635, 'Desktop', 'Chrome'),
(636, 'Desktop', 'Chrome'),
(637, 'Desktop', 'Chrome'),
(638, 'Mobile', 'Chrome'),
(639, 'Desktop', 'Chrome'),
(640, 'Desktop', 'Chrome'),
(641, 'Mobile', 'Chrome'),
(642, 'Mobile', 'Chrome'),
(643, 'Mobile', 'Chrome'),
(644, 'Mobile', 'Chrome'),
(645, 'Mobile', 'Chrome'),
(646, 'Mobile', 'Chrome'),
(647, 'Mobile', 'Chrome'),
(648, 'Mobile', 'Chrome'),
(649, 'Mobile', 'Chrome'),
(650, 'Mobile', 'Chrome'),
(651, 'Mobile', 'Chrome'),
(652, 'Mobile', 'Chrome'),
(653, 'Desktop', 'Chrome'),
(654, 'Desktop', 'Chrome'),
(655, 'Mobile', 'Chrome'),
(656, 'Mobile', 'Chrome'),
(657, 'Mobile', 'Chrome'),
(658, 'Desktop', 'Chrome'),
(659, 'Desktop', 'Chrome'),
(660, 'Mobile', 'Chrome'),
(661, 'Desktop', 'Chrome'),
(662, 'Desktop', 'Chrome'),
(663, 'Desktop', 'Chrome'),
(664, 'Desktop', 'Chrome'),
(665, 'Mobile', 'Chrome'),
(666, 'Mobile', 'Chrome'),
(667, 'Mobile', 'Chrome'),
(668, 'Desktop', 'Chrome'),
(669, 'Desktop', 'Chrome'),
(670, 'Mobile', 'Chrome'),
(671, 'Desktop', 'Chrome'),
(672, 'Desktop', 'Chrome'),
(673, 'Desktop', 'Chrome'),
(674, 'Mobile', 'Chrome'),
(675, 'Mobile', 'Chrome'),
(676, 'Desktop', 'Chrome'),
(677, 'Mobile', 'Chrome'),
(678, 'Desktop', 'Chrome'),
(679, 'Desktop', 'Chrome'),
(680, 'Desktop', 'Chrome'),
(681, 'Mobile', 'Chrome'),
(682, 'Desktop', 'Chrome'),
(683, 'Desktop', 'Chrome'),
(684, 'Desktop', 'Chrome'),
(685, 'Desktop', 'Chrome'),
(686, 'Desktop', 'Chrome'),
(687, 'Desktop', 'Chrome'),
(688, 'Mobile', 'Chrome'),
(689, 'Mobile', 'Chrome'),
(690, 'Mobile', 'Chrome'),
(691, 'Desktop', 'Chrome'),
(692, 'Desktop', 'Chrome'),
(693, 'Desktop', 'Chrome'),
(694, 'Desktop', 'Chrome'),
(695, 'Desktop', 'Chrome'),
(696, 'Mobile', 'Chrome'),
(697, 'Mobile', 'Chrome'),
(698, 'Desktop', 'Chrome'),
(699, 'Mobile', 'Chrome'),
(700, 'Mobile', 'Chrome'),
(701, 'Mobile', 'Chrome'),
(702, 'Mobile', 'Chrome'),
(703, 'Desktop', 'Chrome'),
(704, 'Mobile', 'Chrome'),
(705, 'Mobile', 'Chrome'),
(706, 'Mobile', 'Chrome'),
(707, 'Mobile', 'Chrome'),
(708, 'Mobile', 'Chrome'),
(709, 'Mobile', 'Chrome'),
(710, 'Mobile', 'Chrome'),
(711, 'Mobile', 'Chrome'),
(712, 'Mobile', 'Chrome'),
(713, 'Desktop', 'Chrome'),
(714, 'Desktop', 'Chrome'),
(715, 'Mobile', 'Chrome'),
(716, 'Mobile', 'Chrome'),
(717, 'Desktop', 'Chrome'),
(718, 'Mobile', 'Chrome'),
(719, 'Mobile', 'Chrome'),
(720, 'Mobile', 'Chrome'),
(721, 'Mobile', 'Chrome'),
(722, 'Desktop', 'Chrome'),
(723, 'Desktop', 'Chrome'),
(724, 'Desktop', 'Chrome'),
(725, 'Mobile', 'Chrome'),
(726, 'Desktop', 'Chrome'),
(727, 'Mobile', 'Chrome'),
(728, 'Mobile', 'Chrome'),
(729, 'Mobile', 'Chrome'),
(730, 'Desktop', 'Chrome'),
(731, 'Mobile', 'Chrome'),
(732, 'Mobile', 'Chrome'),
(733, 'Mobile', 'Chrome'),
(734, 'Mobile', 'Chrome'),
(735, 'Desktop', 'Chrome'),
(736, 'Mobile', 'Chrome'),
(737, 'Mobile', 'Chrome'),
(738, 'Mobile', 'Chrome'),
(739, 'Mobile', 'Chrome'),
(740, 'Mobile', 'Chrome'),
(741, 'Mobile', 'Chrome'),
(742, 'Mobile', 'Chrome'),
(743, 'Mobile', 'Chrome'),
(744, 'Mobile', 'Chrome'),
(745, 'Mobile', 'Chrome'),
(746, 'Mobile', 'Chrome'),
(747, 'Mobile', 'Chrome'),
(748, 'Mobile', 'Chrome'),
(749, 'Mobile', 'Chrome'),
(750, 'Desktop', 'Chrome'),
(751, 'Desktop', 'Chrome'),
(752, 'Desktop', 'Chrome'),
(753, 'Mobile', 'Chrome'),
(754, 'Desktop', 'Chrome'),
(755, 'Desktop', 'Chrome'),
(756, 'Mobile', 'Chrome'),
(757, 'Desktop', 'Chrome'),
(758, 'Desktop', 'Chrome'),
(759, 'Mobile', 'Chrome'),
(760, 'Desktop', 'Chrome'),
(761, 'Mobile', 'Chrome'),
(762, 'Mobile', 'Chrome'),
(763, 'Mobile', 'Chrome'),
(764, 'Desktop', 'Chrome'),
(765, 'Mobile', 'Chrome'),
(766, 'Mobile', 'Chrome'),
(767, 'Desktop', 'Chrome'),
(768, 'Mobile', 'Chrome'),
(769, 'Desktop', 'Chrome'),
(770, 'Desktop', 'Chrome'),
(771, 'Mobile', 'Chrome'),
(772, 'Mobile', 'Chrome'),
(773, 'Mobile', 'Chrome'),
(774, 'Desktop', 'Chrome'),
(775, 'Desktop', 'Chrome'),
(776, 'Mobile', 'Chrome'),
(777, 'Desktop', 'Chrome'),
(778, 'Desktop', 'Chrome'),
(779, 'Desktop', 'Chrome'),
(780, 'Mobile', 'Chrome'),
(781, 'Mobile', 'Chrome'),
(782, 'Mobile', 'Chrome'),
(783, 'Desktop', 'Chrome'),
(784, 'Desktop', 'Chrome'),
(785, 'Desktop', 'Chrome'),
(786, 'Desktop', 'Chrome'),
(787, 'Mobile', 'Chrome'),
(788, 'Mobile', 'Chrome'),
(789, 'Desktop', 'Chrome'),
(790, 'Mobile', 'Chrome'),
(791, 'Desktop', 'Chrome'),
(792, 'Mobile', 'Chrome'),
(793, 'Mobile', 'Chrome'),
(794, 'Desktop', 'Chrome'),
(795, 'Mobile', 'Chrome'),
(796, 'Mobile', 'Chrome'),
(797, 'Mobile', 'Chrome'),
(798, 'Mobile', 'Chrome'),
(799, 'Mobile', 'Chrome'),
(800, 'Mobile', 'Chrome'),
(801, 'Mobile', 'Chrome'),
(802, 'Mobile', 'Chrome'),
(803, 'Mobile', 'Chrome'),
(804, 'Mobile', 'Chrome'),
(805, 'Mobile', 'Chrome'),
(806, 'Mobile', 'Chrome'),
(807, 'Desktop', 'Chrome'),
(808, 'Desktop', 'Chrome'),
(809, 'Desktop', 'Chrome'),
(810, 'Desktop', 'Chrome'),
(811, 'Desktop', 'Chrome'),
(812, 'Desktop', 'Chrome'),
(813, 'Desktop', 'Chrome'),
(814, 'Desktop', 'Chrome'),
(815, 'Desktop', 'Chrome'),
(816, 'Desktop', 'Chrome'),
(817, 'Desktop', 'Chrome'),
(818, 'Desktop', 'Chrome'),
(819, 'Desktop', 'Chrome'),
(820, 'Mobile', 'Chrome'),
(821, 'Desktop', 'Chrome'),
(822, 'Desktop', 'Chrome'),
(823, 'Mobile', 'Chrome'),
(824, 'Mobile', 'Chrome'),
(825, 'Desktop', 'Chrome'),
(826, 'Mobile', 'Chrome'),
(827, 'Desktop', 'Chrome'),
(828, 'Desktop', 'Chrome'),
(829, 'Mobile', 'Chrome'),
(830, 'Desktop', 'Chrome'),
(831, 'Desktop', 'Chrome'),
(832, 'Mobile', 'Chrome'),
(833, 'Mobile', 'Chrome'),
(834, 'Mobile', 'Chrome'),
(835, 'Mobile', 'Chrome'),
(836, 'Mobile', 'Chrome'),
(837, 'Mobile', 'Chrome'),
(838, 'Mobile', 'Chrome'),
(839, 'Mobile', 'Chrome'),
(840, 'Desktop', 'Chrome'),
(841, 'Desktop', 'Chrome'),
(842, 'Desktop', 'Chrome'),
(843, 'Mobile', 'Chrome'),
(844, 'Desktop', 'Chrome'),
(845, 'Mobile', 'Chrome'),
(846, 'Mobile', 'Chrome'),
(847, 'Mobile', 'Chrome'),
(848, 'Desktop', 'Chrome'),
(849, 'Mobile', 'Chrome'),
(850, 'Mobile', 'Chrome'),
(851, 'Mobile', 'Chrome'),
(852, 'Desktop', 'Chrome'),
(853, 'Desktop', 'Chrome'),
(854, 'Desktop', 'Chrome'),
(855, 'Desktop', 'Chrome'),
(856, 'Desktop', 'Chrome'),
(857, 'Desktop', 'Chrome'),
(858, 'Desktop', 'Chrome'),
(859, 'Desktop', 'Chrome'),
(860, 'Desktop', 'Chrome'),
(861, 'Desktop', 'Chrome'),
(862, 'Mobile', 'Chrome'),
(863, 'Desktop', 'Chrome'),
(864, 'Mobile', 'Chrome'),
(865, 'Mobile', 'Chrome'),
(866, 'Mobile', 'Chrome'),
(867, 'Mobile', 'Chrome'),
(868, 'Mobile', 'Chrome'),
(869, 'Mobile', 'Chrome'),
(870, 'Desktop', 'Chrome'),
(871, 'Desktop', 'Chrome'),
(872, 'Desktop', 'Chrome'),
(873, 'Desktop', 'Chrome'),
(874, 'Desktop', 'Chrome'),
(875, 'Desktop', 'Chrome'),
(876, 'Desktop', 'Chrome'),
(877, 'Desktop', 'Chrome'),
(878, 'Desktop', 'Chrome'),
(879, 'Desktop', 'Chrome'),
(880, 'Desktop', 'Chrome'),
(881, 'Desktop', 'Chrome'),
(882, 'Desktop', 'Chrome'),
(883, 'Mobile', 'Chrome'),
(884, 'Desktop', 'Chrome'),
(885, 'Mobile', 'Chrome'),
(886, 'Desktop', 'Chrome'),
(887, 'Desktop', 'Chrome'),
(888, 'Desktop', 'Chrome'),
(889, 'Desktop', 'Chrome'),
(890, 'Mobile', 'Chrome'),
(891, 'Desktop', 'Chrome'),
(892, 'Desktop', 'Chrome'),
(893, 'Desktop', 'Chrome'),
(894, 'Desktop', 'Chrome'),
(895, 'Desktop', 'Chrome'),
(896, 'Desktop', 'Chrome'),
(897, 'Desktop', 'Chrome'),
(898, 'Mobile', 'Chrome'),
(899, 'Mobile', 'Chrome'),
(900, 'Mobile', 'Chrome'),
(901, 'Desktop', 'Chrome'),
(902, 'Mobile', 'Chrome'),
(903, 'Mobile', 'Chrome'),
(904, 'Mobile', 'Chrome'),
(905, 'Desktop', 'Chrome'),
(906, 'Desktop', 'Chrome'),
(907, 'Desktop', 'Chrome'),
(908, 'Desktop', 'Chrome'),
(909, 'Desktop', 'Chrome'),
(910, 'Desktop', 'Chrome'),
(911, 'Desktop', 'Chrome'),
(912, 'Desktop', 'Chrome'),
(913, 'Mobile', 'Chrome'),
(914, 'Mobile', 'Chrome'),
(915, 'Mobile', 'Chrome'),
(916, 'Mobile', 'Chrome'),
(917, 'Mobile', 'Chrome'),
(918, 'Mobile', 'Chrome'),
(919, 'Desktop', 'Chrome'),
(920, 'Desktop', 'Chrome'),
(921, 'Desktop', 'Chrome'),
(922, 'Desktop', 'Chrome'),
(923, 'Mobile', 'Chrome'),
(924, 'Mobile', 'Chrome'),
(925, 'Mobile', 'Chrome'),
(926, 'Desktop', 'Chrome'),
(927, 'Mobile', 'Chrome'),
(928, 'Desktop', 'Chrome'),
(929, 'Desktop', 'Chrome'),
(930, 'Desktop', 'Chrome'),
(931, 'Mobile', 'Chrome'),
(932, 'Mobile', 'Chrome'),
(933, 'Mobile', 'Chrome'),
(934, 'Desktop', 'Chrome'),
(935, 'Desktop', 'Chrome'),
(936, 'Mobile', 'Chrome'),
(937, 'Desktop', 'Chrome'),
(938, 'Mobile', 'Chrome'),
(939, 'Mobile', 'Firefox'),
(940, 'Mobile', 'Chrome'),
(941, 'Mobile', 'Chrome'),
(942, 'Mobile', 'Chrome'),
(943, 'Mobile', 'Chrome'),
(944, 'Desktop', 'Chrome'),
(945, 'Mobile', 'Chrome'),
(946, 'Mobile', 'Chrome'),
(947, 'Desktop', 'Chrome'),
(948, 'Mobile', 'Chrome'),
(949, 'Desktop', 'Chrome'),
(950, 'Desktop', 'Chrome'),
(951, 'Desktop', 'Chrome'),
(952, 'Mobile', 'Chrome'),
(953, 'Mobile', 'Chrome'),
(954, 'Mobile', 'Chrome'),
(955, 'Desktop', 'Chrome'),
(956, 'Desktop', 'Chrome'),
(957, 'Mobile', 'Chrome'),
(958, 'Mobile', 'Chrome'),
(959, 'Desktop', 'Chrome'),
(960, 'Desktop', 'Chrome'),
(961, 'Mobile', 'Chrome'),
(962, 'Desktop', 'Chrome'),
(963, 'Desktop', 'Chrome'),
(964, 'Desktop', 'Chrome'),
(965, 'Desktop', 'Chrome'),
(966, 'Mobile', 'Chrome'),
(967, 'Mobile', 'Chrome'),
(968, 'Mobile', 'Chrome'),
(969, 'Mobile', 'Chrome'),
(970, 'Mobile', 'Chrome'),
(971, 'Mobile', 'Chrome'),
(972, 'Mobile', 'Chrome'),
(973, 'Desktop', 'Chrome'),
(974, 'Desktop', 'Chrome'),
(975, 'Mobile', 'Chrome'),
(976, 'Desktop', 'Chrome'),
(977, 'Desktop', 'Chrome'),
(978, 'Desktop', 'Chrome'),
(979, 'Desktop', 'Chrome'),
(980, 'Desktop', 'Chrome'),
(981, 'Mobile', 'Chrome'),
(982, 'Mobile', 'Chrome'),
(983, 'Desktop', 'Chrome'),
(984, 'Desktop', 'Other'),
(985, 'Desktop', 'Chrome'),
(986, 'Mobile', 'Chrome'),
(987, 'Mobile', 'Chrome'),
(988, 'Mobile', 'Chrome'),
(989, 'Desktop', 'Chrome'),
(990, 'Mobile', 'Chrome'),
(991, 'Mobile', 'Chrome'),
(992, 'Mobile', 'Chrome'),
(993, 'Mobile', 'Chrome'),
(994, 'Mobile', 'Chrome'),
(995, 'Desktop', 'Chrome'),
(996, 'Desktop', 'Chrome'),
(997, 'Mobile', 'Chrome'),
(998, 'Desktop', 'Chrome'),
(999, 'Mobile', 'Chrome'),
(1000, 'Desktop', 'Chrome'),
(1001, 'Mobile', 'Chrome'),
(1002, 'Mobile', 'Chrome'),
(1003, 'Mobile', 'Chrome'),
(1004, 'Desktop', 'Chrome'),
(1005, 'Mobile', 'Chrome'),
(1006, 'Mobile', 'Chrome'),
(1007, 'Mobile', 'Chrome'),
(1008, 'Mobile', 'Chrome'),
(1009, 'Desktop', 'Chrome'),
(1010, 'Desktop', 'Chrome'),
(1011, 'Mobile', 'Chrome'),
(1012, 'Mobile', 'Chrome'),
(1013, 'Desktop', 'Chrome'),
(1014, 'Mobile', 'Chrome'),
(1015, 'Mobile', 'Chrome'),
(1016, 'Desktop', 'Chrome'),
(1017, 'Desktop', 'Chrome'),
(1018, 'Mobile', 'Chrome'),
(1019, 'Mobile', 'Chrome'),
(1020, 'Mobile', 'Chrome'),
(1021, 'Mobile', 'Chrome'),
(1022, 'Mobile', 'Chrome'),
(1023, 'Mobile', 'Chrome'),
(1024, 'Mobile', 'Chrome');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_emoney`
--

CREATE TABLE `akun_emoney` (
  `id` int(11) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `device` text NOT NULL,
  `otp` varchar(30) NOT NULL,
  `pin` varchar(30) NOT NULL,
  `token` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_emoney`
--

INSERT INTO `akun_emoney` (`id`, `nomor`, `device`, `otp`, `pin`, `token`, `type`, `saldo`) VALUES
(1, '', '', '', '', '', 'OVO', 0),
(2, '082234886498', 'ee6e2bbd-2dae-4aa5-949e-7bc4fc7a7dbe', '3398', '132465', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IiJ9.eyJhdWQiOlsiZ29qZWs6Y29uc3VtZXI6YXBwIl0sImRhdCI6eyJhY3RpdmUiOiJ0cnVlIiwiYmxhY2tsaXN0ZWQiOiJmYWxzZSIsImNvdW50cnlfY29kZSI6Iis2MiIsImNyZWF0ZWRfYXQiOiIyMDE4LTAyLTA5VDA5OjI3OjAwWiIsImVtYWlsIjoiYXZhbi5kd2lzeWFocHV0cmFAeWFob28uY29tIiwiZW1haWxfdmVyaWZpZWQiOiJmYWxzZSIsImdvcGF5X2FjY291bnRfaWQiOiIwMS03ZjY4MzJjZWE5NWI0MTkwYjRjNWQ5ODY5YTQ2OGE4Yi0yMCIsIm5hbWUiOiJBdmFuIER3aSBTeWFocHV0cmEiLCJudW1iZXIiOiI4MjIzNDg4NjQ5OCIsInBob25lIjoiKzYyODIyMzQ4ODY0OTgiLCJzaWduZWRfdXBfY291bnRyeSI6IklEIiwid2FsbGV0X2lkIjoiMTgwNDAwNTY4MDYzMDcyNDI0In0sImV4cCI6MTY2NTI0ODY5MSwiaWF0IjoxNjYyMTA5MDcxLCJpc3MiOiJnb2lkIiwianRpIjoiNTUzMGI1ZWUtNDAyMy00Y2U5LWE0NTMtYTFjODhlNzNhOTZlIiwic2NvcGVzIjpbXSwic2lkIjoiMjllNmI1OTYtMTcwYy00NjYwLWFiYWQtMWY2MWZiNzg3YTU5Iiwic3ViIjoiMzMxOTMyN2ItMWMyYS00M2U4LTk2ZDAtY2JlOTcwZjkyNzFmIiwidWlkIjoiNTg3NDUxMTQzIiwidXR5cGUiOiJjdXN0b21lciJ9.O_yLxUklN4dXCp41ZCakFogb40qTmgARdk1nX71NZVMnsNZ1xrTD5gpfC24nuSsEC_YMEsNhp6zS2gMWXOItIzSx6ki_XNpG8XHGuiRIaI6kXKQ0RJP2mG8jFMoRrX2aWuXObYSqX9GZfTwHtvQ6hmROEDUH34hdimJJmsix_jM', 'GOPAY', 0),
(3, '08971260070', '', '', '', '', 'SHOPEEPAY', 0),
(4, '081349844327', '', '', '', '', 'DANA', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pin` varchar(250) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `provider` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `username`, `pin`, `saldo`, `provider`) VALUES
(1, 'BCA', 'BCA', 0, 'BCA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_mutasi`
--

CREATE TABLE `bank_mutasi` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `saldo` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `kode_deposit` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `nomor_pengirim` varchar(250) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `an` text NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `get_saldo` varchar(250) NOT NULL,
  `status` enum('Success','Pending','Cancelled') NOT NULL,
  `acakin` varchar(250) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_verif`
--

CREATE TABLE `dt_verif` (
  `id` int(11) NOT NULL,
  `otp` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `exp_code` datetime NOT NULL,
  `status` enum('valid','notvalid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `product` varchar(500) NOT NULL,
  `sistem_id` varchar(100) NOT NULL,
  `validate_id` varchar(100) NOT NULL,
  `urutan` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `games_guest`
--

CREATE TABLE `games_guest` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `product` varchar(500) NOT NULL,
  `sistem_id` varchar(100) NOT NULL,
  `validate_id` varchar(100) NOT NULL,
  `urutan` bigint(20) NOT NULL,
  `keterangan` longtext NOT NULL,
  `petunjuk` varchar(500) NOT NULL,
  `status` enum('On','Off') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `games_guest`
--

INSERT INTO `games_guest` (`id`, `name`, `sub_name`, `category`, `slug`, `img`, `product`, `sistem_id`, `validate_id`, `urutan`, `keterangan`, `petunjuk`, `status`) VALUES
(2, 'Free Fire', '', 'Games', 'free-fire', '62b6b0713ed5c.jpg', 'FREE FIRE', 'A', 'Tydacks', 2, '<p>Top Up Diamond Free Fire</p>\r\n\r\n<ol>\r\n	<li>Masukkan ID</li>\r\n	<li>Pilih Nominal Diamond</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email&nbsp;yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>Diamond masuk otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://game.mypulsaa.com/assets/images/62f2d01dd2d15.jpg', 'On'),
(24, 'Mobile Legends', '', 'Games', 'mobile-legends', '622f6aef876a6.jpg', 'MOBILE LEGEND', 'AA', 'Tydacks', 2, '<p>Top Up Diamond Mobile Legends</p>\r\n\r\n<ol>\r\n	<li>Masukkan ID (SERVER)</li>\r\n	<li>Pilih Nominal Diamond</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>Diamond masuk otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://game.mypulsaa.com/assets/images/62f2d00693914.png', 'On'),
(25, 'Call of Duty Mobile', '', 'Games', 'call-of-duty-mobile', '623023c71b436.jpg', 'Call of Duty MOBILE', 'A', 'Tydacks', 3, '<p>Top Up Cash Point COD Mobile</p>\r\n\r\n<ol>\r\n	<li>Masukkan Open ID (Wajib Bind FB)</li>\r\n	<li>Pilih Nominal CP</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>CP masuk otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://duitly.my.id/assets/images/6234715c10fd1.jpg', 'On'),
(26, 'Sausage Man', '', 'Games', 'sausage-man', '62347a72d3555.jpg', 'Sausage Man', 'A', 'Tydacks', 4, '<p>Top Up Candy Sausage Man</p>\r\n\r\n<ol>\r\n	<li>Masukkan User ID</li>\r\n	<li>Pilih Nominal Candy</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>Candy masuk otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://duitly.my.id/assets/images/62347a72d3ac7.jpg', 'On'),
(27, 'PUBG Mobile', '', 'Games', 'pubg-mobile', '6230254c7c526.jpg', 'PUBG MOBILE', 'A', 'Tydacks', 5, '<p>Top Up UC PUBG Mobile</p>\r\n\r\n<ol>\r\n	<li>Masukkan ID PUBGM</li>\r\n	<li>Pilih Nominal UC</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>UC masuk otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://duitly.my.id/assets/images/623471e4475bd.jpg', 'On'),
(51, 'Arena of Valor', '', 'Games', 'arena-of-valor', '62f214f741f0d.jpeg', 'ARENA OF VALOR', 'A', 'Tydacks', 0, '<p>w</p>\r\n', '', 'On'),
(29, 'Valorant', '', 'Games', 'valorant', '6230269b14a11.jpg', 'Valorant', 'A', 'Tydacks', 7, '<p>Top Up Point Valorant</p>\r\n\r\n<ol>\r\n	<li>Masukkan Riot ID</li>\r\n	<li>Pilih Nominal Point</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email&nbsp;yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>Tunggu 1-5 menit Point otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://duitly.my.id/assets/images/6234720a11417.jpg', 'On'),
(31, 'Dragon Raja', '', 'Games', 'dragon-raja', '62302d9cc2d39.png', 'DRAGON RAJA - SEA', 'AAA', 'Tydacks', 9, '<p>Top Up Coupon Dragon Raja</p>\r\n\r\n<ol>\r\n	<li>Masukkan ID dan Server</li>\r\n	<li>Pilih Nominal Coupon</li>\r\n	<li>Pilih Metode Pembayaran</li>\r\n	<li>Tulis Email&nbsp;yg benar!</li>\r\n	<li>Klik Beli Sekarang &amp; lakukan Pembayaran</li>\r\n	<li>Coupon masuk otomatis ke akun Anda.</li>\r\n</ol>\r\n', 'https://duitly.my.id//assets/images/62302d9cc327a.png', 'On'),
(48, 'GARENA SHELL', '', 'Voucher', 'garena-shell', '62ee80fc0839a.jpeg', 'GARENA', 'A', 'Tydacks', 1, '<p>1</p>\r\n', '', 'On');

-- --------------------------------------------------------

--
-- Struktur dari tabel `games_kategori`
--

CREATE TABLE `games_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `urutan` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `games_kategori`
--

INSERT INTO `games_kategori` (`id`, `kategori`, `urutan`) VALUES
(2, 'Voucher', 2),
(1, 'Games', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `games_kategori_guest`
--

CREATE TABLE `games_kategori_guest` (
  `id` int(11) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `urutan` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `games_kategori_guest`
--

INSERT INTO `games_kategori_guest` (`id`, `kategori`, `urutan`) VALUES
(1, 'Populer', 1),
(7, 'Games', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest_kategori_smm`
--

CREATE TABLE `guest_kategori_smm` (
  `id` int(11) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `urutan` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest_produk_smm`
--

CREATE TABLE `guest_produk_smm` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nominal` varchar(250) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest_smm`
--

CREATE TABLE `guest_smm` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `img` varchar(250) NOT NULL,
  `product` varchar(500) NOT NULL,
  `urutan` bigint(20) NOT NULL,
  `keterangan` longtext NOT NULL,
  `petunjuk` varchar(500) NOT NULL,
  `status` enum('On','Off') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_guest`
--

CREATE TABLE `harga_guest` (
  `id` int(11) NOT NULL,
  `layanan_id` bigint(20) NOT NULL,
  `metode_id` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `tipe` enum('SMM','Games') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_guest`
--

INSERT INTO `harga_guest` (`id`, `layanan_id`, `metode_id`, `harga`, `tipe`) VALUES
(1, 66720851, 10, 5000, 'Games'),
(2, 66731684, 1, 513167, 'Games'),
(3, 66731684, 7, 355167, 'Games'),
(4, 66732552, 7, 2251450, 'Games'),
(5, 5, 7, 213070, 'Games'),
(6, 1863, 1, 28000, 'Games'),
(7, 1863, 2, 28000, 'Games'),
(8, 1863, 3, 28000, 'Games'),
(9, 1863, 4, 28000, 'Games'),
(10, 1863, 5, 28000, 'Games'),
(11, 1863, 6, 28000, 'Games'),
(12, 1863, 7, 28000, 'Games'),
(13, 1863, 8, 28000, 'Games'),
(14, 1863, 9, 28000, 'Games'),
(15, 1863, 10, 28000, 'Games'),
(16, 1863, 12, 27700, 'Games'),
(17, 1864, 1, 10000, 'Games'),
(18, 1864, 2, 10000, 'Games'),
(19, 1864, 3, 10000, 'Games'),
(20, 1864, 4, 10000, 'Games'),
(21, 1864, 5, 10000, 'Games'),
(22, 1864, 6, 10000, 'Games'),
(23, 1864, 7, 10000, 'Games'),
(24, 1864, 8, 10000, 'Games'),
(25, 1864, 9, 10000, 'Games'),
(26, 1864, 10, 10000, 'Games'),
(27, 1864, 12, 9700, 'Games'),
(28, 1873, 1, 100000, 'Games'),
(29, 1873, 2, 100000, 'Games'),
(30, 1873, 3, 100000, 'Games'),
(31, 1873, 4, 100000, 'Games'),
(32, 1873, 5, 100000, 'Games'),
(33, 1873, 6, 100000, 'Games'),
(34, 1873, 7, 100000, 'Games'),
(35, 1873, 8, 100000, 'Games'),
(36, 1873, 9, 100000, 'Games'),
(37, 1873, 10, 100000, 'Games'),
(38, 1873, 12, 100000, 'Games'),
(39, 1868, 1, 18600, 'Games'),
(40, 1868, 2, 18600, 'Games'),
(41, 1868, 3, 18600, 'Games'),
(42, 1868, 4, 18600, 'Games'),
(43, 1868, 5, 18600, 'Games'),
(44, 1868, 6, 18600, 'Games'),
(45, 1868, 7, 18600, 'Games'),
(46, 1868, 8, 18600, 'Games'),
(47, 1868, 9, 18600, 'Games'),
(48, 1868, 10, 18600, 'Games'),
(49, 1874, 1, 18900, 'Games'),
(50, 1874, 2, 18900, 'Games'),
(51, 1874, 3, 18900, 'Games'),
(52, 1874, 4, 18900, 'Games'),
(53, 1874, 5, 18900, 'Games'),
(54, 1874, 6, 18900, 'Games'),
(55, 1874, 7, 18900, 'Games'),
(56, 1874, 8, 18900, 'Games'),
(57, 1874, 9, 18900, 'Games'),
(58, 1874, 10, 18900, 'Games'),
(59, 1877, 1, 36600, 'Games'),
(60, 1877, 2, 36600, 'Games'),
(61, 1877, 3, 36600, 'Games'),
(62, 1877, 4, 36600, 'Games'),
(63, 1877, 5, 36600, 'Games'),
(64, 1877, 6, 36600, 'Games'),
(65, 1877, 7, 36600, 'Games'),
(66, 1877, 8, 36600, 'Games'),
(67, 1877, 9, 36600, 'Games'),
(68, 1877, 10, 36600, 'Games'),
(69, 1878, 1, 54650, 'Games'),
(70, 1878, 2, 54650, 'Games'),
(71, 1878, 3, 54650, 'Games'),
(72, 1878, 4, 54650, 'Games'),
(73, 1878, 5, 54650, 'Games'),
(74, 1878, 6, 54650, 'Games'),
(75, 1878, 7, 54650, 'Games'),
(76, 1878, 8, 54650, 'Games'),
(77, 1878, 9, 54650, 'Games'),
(78, 1878, 10, 54650, 'Games'),
(79, 1879, 1, 72765, 'Games'),
(80, 1879, 2, 72765, 'Games'),
(81, 1879, 3, 72765, 'Games'),
(82, 1879, 4, 72765, 'Games'),
(83, 1879, 5, 72765, 'Games'),
(84, 1879, 6, 72765, 'Games'),
(85, 1879, 7, 72765, 'Games'),
(86, 1879, 8, 72765, 'Games'),
(87, 1879, 9, 72765, 'Games'),
(88, 1879, 10, 72765, 'Games'),
(89, 1880, 1, 92300, 'Games'),
(90, 1880, 2, 92300, 'Games'),
(91, 1880, 3, 92300, 'Games'),
(92, 1880, 4, 92300, 'Games'),
(93, 1880, 5, 92300, 'Games'),
(94, 1880, 6, 92300, 'Games'),
(95, 1880, 7, 92300, 'Games'),
(96, 1880, 8, 92300, 'Games'),
(97, 1880, 9, 92300, 'Games'),
(98, 1880, 10, 92300, 'Games'),
(99, 1881, 1, 110998, 'Games'),
(100, 1881, 2, 110998, 'Games'),
(101, 1881, 3, 110998, 'Games'),
(102, 1881, 4, 110998, 'Games'),
(103, 1881, 5, 110998, 'Games'),
(104, 1881, 6, 110998, 'Games'),
(105, 1881, 7, 110998, 'Games'),
(106, 1881, 8, 110998, 'Games'),
(107, 1881, 9, 110998, 'Games'),
(108, 1881, 10, 110998, 'Games'),
(109, 1881, 12, 109959, 'Games'),
(110, 1880, 12, 91275, 'Games'),
(111, 1882, 12, 128867, 'Games'),
(112, 1883, 1, 143975, 'Games'),
(113, 1883, 2, 143975, 'Games'),
(114, 1883, 3, 143975, 'Games'),
(115, 1883, 4, 143975, 'Games'),
(116, 1883, 5, 143975, 'Games'),
(117, 1883, 6, 143975, 'Games'),
(118, 1883, 7, 143975, 'Games'),
(119, 1883, 8, 143975, 'Games'),
(120, 1883, 9, 143975, 'Games'),
(121, 1883, 10, 143975, 'Games'),
(122, 1884, 1, 182656, 'Games'),
(123, 1884, 2, 182656, 'Games'),
(124, 1884, 3, 182656, 'Games'),
(125, 1884, 4, 182656, 'Games'),
(126, 1884, 5, 182656, 'Games'),
(127, 1884, 6, 182656, 'Games'),
(128, 1884, 7, 182656, 'Games'),
(129, 1884, 8, 182656, 'Games'),
(130, 1884, 9, 182656, 'Games'),
(131, 1884, 10, 182656, 'Games'),
(132, 1884, 12, 181900, 'Games'),
(133, 1885, 12, 122450, 'Games'),
(134, 1886, 12, 126450, 'Games'),
(135, 2131, 1, 18700, 'Games'),
(136, 2131, 2, 18700, 'Games'),
(137, 2131, 3, 18700, 'Games'),
(138, 2131, 4, 18700, 'Games'),
(139, 2131, 5, 18700, 'Games'),
(140, 2131, 6, 18700, 'Games'),
(141, 2131, 7, 18700, 'Games'),
(142, 2131, 8, 18700, 'Games'),
(143, 2131, 9, 18700, 'Games'),
(144, 2131, 10, 18700, 'Games'),
(145, 2131, 12, 17600, 'Games'),
(146, 2132, 1, 35950, 'Games'),
(147, 2132, 2, 35950, 'Games'),
(148, 2132, 3, 35950, 'Games'),
(149, 2132, 4, 35950, 'Games'),
(150, 2132, 5, 35950, 'Games'),
(151, 2132, 6, 35950, 'Games'),
(152, 2132, 7, 35950, 'Games'),
(153, 2132, 8, 35950, 'Games'),
(154, 2132, 9, 35950, 'Games'),
(155, 2132, 10, 35950, 'Games'),
(156, 2132, 12, 34950, 'Games'),
(157, 2133, 1, 57200, 'Games'),
(158, 2133, 2, 57200, 'Games'),
(159, 2133, 3, 57200, 'Games'),
(160, 2133, 4, 57200, 'Games'),
(161, 2133, 5, 57200, 'Games'),
(162, 2133, 6, 57200, 'Games'),
(163, 2133, 7, 57200, 'Games'),
(164, 2133, 8, 57200, 'Games'),
(165, 2133, 9, 57200, 'Games'),
(166, 2133, 10, 57200, 'Games'),
(167, 2133, 12, 56850, 'Games'),
(168, 2134, 1, 68500, 'Games'),
(169, 2134, 2, 68500, 'Games'),
(170, 2134, 3, 68500, 'Games'),
(171, 2134, 4, 68500, 'Games'),
(172, 2134, 5, 68500, 'Games'),
(173, 2134, 6, 68500, 'Games'),
(174, 2134, 7, 68500, 'Games'),
(175, 2134, 8, 68500, 'Games'),
(176, 2134, 9, 68500, 'Games'),
(177, 2134, 10, 68500, 'Games'),
(178, 2134, 12, 67850, 'Games'),
(179, 2136, 1, 163800, 'Games'),
(180, 2136, 2, 163800, 'Games'),
(181, 2136, 3, 163800, 'Games'),
(182, 2136, 4, 163800, 'Games'),
(183, 2136, 5, 163800, 'Games'),
(184, 2136, 6, 163800, 'Games'),
(185, 2136, 7, 163800, 'Games'),
(186, 2136, 8, 163800, 'Games'),
(187, 2136, 9, 163800, 'Games'),
(188, 2136, 10, 163800, 'Games'),
(189, 2136, 12, 163200, 'Games'),
(190, 2753, 1, 5400, 'Games'),
(191, 2753, 2, 5400, 'Games'),
(192, 2753, 3, 5400, 'Games'),
(193, 2753, 4, 5400, 'Games'),
(194, 2753, 5, 5400, 'Games'),
(195, 2753, 6, 5400, 'Games'),
(196, 2753, 7, 5400, 'Games'),
(197, 2753, 8, 5400, 'Games'),
(198, 2753, 9, 5400, 'Games'),
(199, 2753, 10, 5400, 'Games'),
(200, 2753, 12, 4660, 'Games'),
(201, 1869, 1, 46000, 'Games'),
(202, 1869, 2, 46000, 'Games'),
(203, 1869, 3, 46000, 'Games'),
(204, 1869, 4, 46000, 'Games'),
(205, 1869, 5, 46000, 'Games'),
(206, 1869, 6, 46000, 'Games'),
(207, 1869, 7, 46000, 'Games'),
(208, 1869, 8, 46000, 'Games'),
(209, 1869, 9, 46000, 'Games'),
(210, 1869, 10, 46000, 'Games'),
(211, 1866, 1, 14466, 'Games'),
(212, 1866, 2, 14466, 'Games'),
(213, 1866, 3, 14466, 'Games'),
(214, 1866, 4, 14466, 'Games'),
(215, 1866, 5, 14466, 'Games'),
(216, 1866, 6, 14466, 'Games'),
(217, 1866, 7, 14466, 'Games'),
(218, 1866, 8, 14466, 'Games'),
(219, 1866, 9, 14466, 'Games'),
(220, 1866, 10, 14466, 'Games'),
(221, 1867, 1, 17954, 'Games'),
(222, 1867, 2, 17954, 'Games'),
(223, 1867, 3, 17954, 'Games'),
(224, 1867, 4, 17954, 'Games'),
(225, 1867, 5, 17954, 'Games'),
(226, 1867, 6, 17954, 'Games'),
(227, 1867, 7, 17954, 'Games'),
(228, 1867, 8, 17954, 'Games'),
(229, 1867, 9, 17954, 'Games'),
(230, 1867, 10, 17954, 'Games'),
(231, 1867, 12, 16954, 'Games'),
(232, 1870, 1, 88800, 'Games'),
(233, 1870, 2, 88800, 'Games'),
(234, 1870, 3, 88800, 'Games'),
(235, 1870, 4, 88800, 'Games'),
(236, 1870, 5, 88800, 'Games'),
(237, 1870, 6, 88800, 'Games'),
(238, 1870, 7, 88800, 'Games'),
(239, 1870, 8, 88800, 'Games'),
(240, 1870, 9, 88800, 'Games'),
(241, 1870, 10, 88800, 'Games'),
(242, 1870, 12, 87846, 'Games'),
(243, 1875, 1, 1500, 'Games'),
(244, 1875, 2, 1500, 'Games'),
(245, 1875, 3, 1500, 'Games'),
(246, 1875, 4, 1500, 'Games'),
(247, 1875, 5, 1500, 'Games'),
(248, 1875, 6, 1500, 'Games'),
(249, 1875, 7, 1500, 'Games'),
(250, 1875, 8, 1500, 'Games'),
(251, 1875, 9, 1500, 'Games'),
(252, 1875, 10, 1500, 'Games'),
(253, 1875, 12, 1500, 'Games'),
(254, 2445, 1, 28514, 'Games'),
(255, 2445, 2, 28514, 'Games'),
(256, 2445, 3, 28514, 'Games'),
(257, 2445, 4, 28514, 'Games'),
(258, 2445, 5, 28514, 'Games'),
(259, 2445, 6, 28514, 'Games'),
(260, 2445, 7, 28514, 'Games'),
(261, 2445, 8, 28514, 'Games'),
(262, 2445, 9, 28514, 'Games'),
(263, 2445, 10, 28514, 'Games'),
(264, 2445, 12, 26814, 'Games'),
(265, 2447, 1, 34828, 'Games'),
(266, 2447, 2, 34828, 'Games'),
(267, 2447, 3, 34828, 'Games'),
(268, 2447, 4, 34828, 'Games'),
(269, 2447, 5, 34828, 'Games'),
(270, 2447, 6, 34828, 'Games'),
(271, 2447, 7, 34828, 'Games'),
(272, 2447, 8, 34828, 'Games'),
(273, 2447, 9, 34828, 'Games'),
(274, 2447, 10, 34828, 'Games'),
(275, 2447, 12, 33200, 'Games'),
(276, 2448, 1, 53000, 'Games'),
(277, 2448, 2, 53000, 'Games'),
(278, 2448, 3, 53000, 'Games'),
(279, 2448, 4, 53000, 'Games'),
(280, 2448, 5, 53000, 'Games'),
(281, 2448, 6, 53000, 'Games'),
(282, 2448, 7, 53000, 'Games'),
(283, 2448, 8, 53000, 'Games'),
(284, 2448, 9, 53000, 'Games'),
(285, 2448, 10, 53000, 'Games'),
(286, 2448, 12, 52200, 'Games'),
(287, 2449, 1, 65998, 'Games'),
(288, 2449, 2, 65998, 'Games'),
(289, 2449, 3, 65998, 'Games'),
(290, 2449, 4, 65998, 'Games'),
(291, 2449, 5, 65998, 'Games'),
(292, 2449, 6, 65998, 'Games'),
(293, 2449, 7, 65998, 'Games'),
(294, 2449, 8, 65998, 'Games'),
(295, 2449, 9, 65998, 'Games'),
(296, 2449, 10, 65998, 'Games'),
(297, 2450, 1, 68260, 'Games'),
(298, 2450, 2, 68260, 'Games'),
(299, 2450, 3, 68260, 'Games'),
(300, 2450, 4, 68260, 'Games'),
(301, 2450, 5, 68260, 'Games'),
(302, 2450, 6, 68260, 'Games'),
(303, 2450, 7, 68260, 'Games'),
(304, 2450, 8, 68260, 'Games'),
(305, 2450, 9, 68260, 'Games'),
(306, 2450, 10, 68260, 'Games'),
(307, 2450, 12, 67260, 'Games'),
(308, 2451, 1, 129800, 'Games'),
(309, 2451, 2, 129800, 'Games'),
(310, 2451, 3, 129800, 'Games'),
(311, 2451, 4, 129800, 'Games'),
(312, 2451, 5, 129800, 'Games'),
(313, 2451, 6, 129800, 'Games'),
(314, 2451, 7, 129800, 'Games'),
(315, 2451, 8, 129800, 'Games'),
(316, 2451, 9, 129800, 'Games'),
(317, 2451, 10, 129800, 'Games'),
(318, 2451, 12, 128085, 'Games'),
(319, 2758, 1, 100186, 'Games'),
(320, 2758, 2, 100186, 'Games'),
(321, 2758, 3, 100186, 'Games'),
(322, 2758, 4, 100186, 'Games'),
(323, 2758, 5, 100186, 'Games'),
(324, 2758, 6, 100186, 'Games'),
(325, 2758, 7, 100186, 'Games'),
(326, 2758, 8, 100186, 'Games'),
(327, 2758, 9, 100186, 'Games'),
(328, 2758, 10, 100186, 'Games'),
(329, 2793, 1, 28200, 'Games'),
(330, 2793, 2, 28200, 'Games'),
(331, 2793, 3, 28200, 'Games'),
(332, 2793, 4, 28200, 'Games'),
(333, 2793, 5, 28200, 'Games'),
(334, 2793, 6, 28200, 'Games'),
(335, 2793, 7, 28200, 'Games'),
(336, 2793, 8, 28200, 'Games'),
(337, 2793, 9, 28200, 'Games'),
(338, 2793, 10, 28200, 'Games'),
(339, 2794, 1, 10000, 'Games'),
(340, 2794, 2, 10000, 'Games'),
(341, 2794, 3, 10000, 'Games'),
(342, 2794, 4, 10000, 'Games'),
(343, 2794, 5, 10000, 'Games'),
(344, 2794, 6, 10000, 'Games'),
(345, 2794, 7, 10000, 'Games'),
(346, 2794, 8, 10000, 'Games'),
(347, 2794, 9, 10000, 'Games'),
(348, 2794, 10, 10000, 'Games'),
(349, 2794, 12, 9600, 'Games'),
(350, 2795, 1, 15070, 'Games'),
(351, 2795, 2, 15070, 'Games'),
(352, 2795, 3, 15070, 'Games'),
(353, 2795, 4, 15070, 'Games'),
(354, 2795, 5, 15070, 'Games'),
(355, 2795, 6, 15070, 'Games'),
(356, 2795, 7, 15070, 'Games'),
(357, 2795, 8, 15070, 'Games'),
(358, 2795, 9, 15070, 'Games'),
(359, 2795, 10, 15070, 'Games'),
(360, 2795, 12, 13870, 'Games'),
(361, 2796, 1, 17466, 'Games'),
(362, 2796, 2, 17466, 'Games'),
(363, 2796, 3, 17466, 'Games'),
(364, 2796, 4, 17466, 'Games'),
(365, 2796, 5, 17466, 'Games'),
(366, 2796, 6, 17466, 'Games'),
(367, 2796, 7, 17466, 'Games'),
(368, 2796, 8, 17466, 'Games'),
(369, 2796, 9, 17466, 'Games'),
(370, 2796, 10, 17466, 'Games'),
(371, 2796, 12, 16466, 'Games'),
(372, 2798, 1, 19950, 'Games'),
(373, 2798, 2, 19950, 'Games'),
(374, 2798, 3, 19950, 'Games'),
(375, 2798, 4, 19950, 'Games'),
(376, 2798, 5, 19950, 'Games'),
(377, 2798, 6, 19950, 'Games'),
(378, 2798, 7, 19950, 'Games'),
(379, 2798, 8, 19950, 'Games'),
(380, 2798, 9, 19950, 'Games'),
(381, 2798, 10, 19950, 'Games'),
(382, 2799, 1, 46475, 'Games'),
(383, 2799, 2, 46475, 'Games'),
(384, 2799, 3, 46475, 'Games'),
(385, 2799, 4, 46475, 'Games'),
(386, 2799, 5, 46475, 'Games'),
(387, 2799, 6, 46475, 'Games'),
(388, 2799, 7, 46475, 'Games'),
(389, 2799, 8, 46475, 'Games'),
(390, 2799, 9, 46475, 'Games'),
(391, 2799, 10, 46475, 'Games'),
(392, 2799, 12, 45475, 'Games'),
(393, 2800, 1, 89745, 'Games'),
(394, 2800, 2, 89745, 'Games'),
(395, 2800, 3, 89745, 'Games'),
(396, 2800, 4, 89745, 'Games'),
(397, 2800, 5, 89745, 'Games'),
(398, 2800, 6, 89745, 'Games'),
(399, 2800, 7, 89745, 'Games'),
(400, 2800, 8, 89745, 'Games'),
(401, 2800, 9, 89745, 'Games'),
(402, 2800, 10, 89745, 'Games'),
(403, 2800, 12, 88745, 'Games'),
(404, 2801, 1, 176800, 'Games'),
(405, 2801, 2, 176800, 'Games'),
(406, 2801, 3, 176800, 'Games'),
(407, 2801, 4, 176800, 'Games'),
(408, 2801, 5, 176800, 'Games'),
(409, 2801, 6, 176800, 'Games'),
(410, 2801, 7, 176800, 'Games'),
(411, 2801, 8, 176800, 'Games'),
(412, 2801, 9, 176800, 'Games'),
(413, 2801, 10, 176800, 'Games'),
(414, 2801, 12, 175800, 'Games'),
(415, 2802, 1, 230075, 'Games'),
(416, 2802, 2, 230075, 'Games'),
(417, 2802, 3, 230075, 'Games'),
(418, 2802, 4, 230075, 'Games'),
(419, 2802, 5, 230075, 'Games'),
(420, 2802, 6, 230075, 'Games'),
(421, 2802, 7, 230075, 'Games'),
(422, 2802, 8, 230075, 'Games'),
(423, 2802, 9, 230075, 'Games'),
(424, 2802, 10, 230075, 'Games'),
(425, 2802, 12, 229075, 'Games'),
(426, 2803, 1, 110000, 'Games'),
(427, 2803, 2, 110000, 'Games'),
(428, 2803, 3, 110000, 'Games'),
(429, 2803, 4, 110000, 'Games'),
(430, 2803, 5, 110000, 'Games'),
(431, 2803, 6, 110000, 'Games'),
(432, 2803, 7, 110000, 'Games'),
(433, 2803, 8, 110000, 'Games'),
(434, 2803, 9, 110000, 'Games'),
(435, 2803, 10, 110000, 'Games'),
(436, 2803, 12, 100000, 'Games'),
(437, 3375, 1, 28514, 'Games'),
(438, 3375, 2, 28514, 'Games'),
(439, 3375, 3, 28514, 'Games'),
(440, 3375, 4, 28514, 'Games'),
(441, 3375, 5, 28514, 'Games'),
(442, 3375, 6, 28514, 'Games'),
(443, 3375, 7, 28514, 'Games'),
(444, 3375, 8, 28514, 'Games'),
(445, 3375, 9, 28514, 'Games'),
(446, 3375, 10, 28514, 'Games'),
(447, 3375, 12, 27514, 'Games'),
(448, 3376, 1, 29324, 'Games'),
(449, 3376, 2, 29324, 'Games'),
(450, 3376, 3, 29324, 'Games'),
(451, 3376, 4, 29324, 'Games'),
(452, 3376, 5, 29324, 'Games'),
(453, 3376, 6, 29324, 'Games'),
(454, 3376, 7, 29324, 'Games'),
(455, 3376, 8, 29324, 'Games'),
(456, 3376, 9, 29324, 'Games'),
(457, 3376, 10, 29324, 'Games'),
(458, 3376, 12, 28324, 'Games'),
(459, 3723, 1, 29644, 'Games'),
(460, 3723, 2, 29644, 'Games'),
(461, 3723, 3, 29644, 'Games'),
(462, 3723, 4, 29644, 'Games'),
(463, 3723, 5, 29644, 'Games'),
(464, 3723, 6, 29644, 'Games'),
(465, 3723, 7, 29644, 'Games'),
(466, 3723, 8, 29644, 'Games'),
(467, 3723, 9, 29644, 'Games'),
(468, 3723, 10, 29644, 'Games'),
(469, 3723, 12, 28644, 'Games'),
(470, 3725, 1, 15070, 'Games'),
(471, 3725, 2, 15070, 'Games'),
(472, 3725, 3, 15070, 'Games'),
(473, 3725, 4, 15070, 'Games'),
(474, 3725, 5, 15070, 'Games'),
(475, 3725, 6, 15070, 'Games'),
(476, 3725, 7, 15070, 'Games'),
(477, 3725, 8, 15070, 'Games'),
(478, 3725, 9, 15070, 'Games'),
(479, 3725, 10, 15070, 'Games'),
(480, 3725, 12, 14070, 'Games'),
(481, 3726, 1, 16466, 'Games'),
(482, 3726, 2, 16466, 'Games'),
(483, 3726, 3, 16466, 'Games'),
(484, 3726, 4, 16466, 'Games'),
(485, 3726, 5, 16466, 'Games'),
(486, 3726, 6, 16466, 'Games'),
(487, 3726, 7, 16466, 'Games'),
(488, 3726, 8, 16466, 'Games'),
(489, 3726, 9, 16466, 'Games'),
(490, 3726, 10, 16466, 'Games'),
(491, 3726, 12, 15466, 'Games'),
(492, 3727, 1, 18954, 'Games'),
(493, 3727, 2, 18954, 'Games'),
(494, 3727, 3, 18954, 'Games'),
(495, 3727, 4, 18954, 'Games'),
(496, 3727, 5, 18954, 'Games'),
(497, 3727, 6, 18954, 'Games'),
(498, 3727, 7, 18954, 'Games'),
(499, 3727, 8, 18954, 'Games'),
(500, 3727, 9, 18954, 'Games'),
(501, 3727, 10, 18954, 'Games'),
(502, 3727, 12, 17954, 'Games'),
(503, 3728, 1, 19950, 'Games'),
(504, 3728, 2, 19950, 'Games'),
(505, 3728, 3, 19950, 'Games'),
(506, 3728, 4, 19950, 'Games'),
(507, 3728, 5, 19950, 'Games'),
(508, 3728, 6, 19950, 'Games'),
(509, 3728, 7, 19950, 'Games'),
(510, 3728, 8, 19950, 'Games'),
(511, 3728, 9, 19950, 'Games'),
(512, 3728, 10, 19950, 'Games'),
(513, 3728, 12, 18950, 'Games'),
(514, 3729, 1, 47475, 'Games'),
(515, 3729, 2, 47475, 'Games'),
(516, 3729, 3, 47475, 'Games'),
(517, 3729, 4, 47475, 'Games'),
(518, 3729, 5, 47475, 'Games'),
(519, 3729, 6, 47475, 'Games'),
(520, 3729, 7, 47475, 'Games'),
(521, 3729, 8, 47475, 'Games'),
(522, 3729, 9, 47475, 'Games'),
(523, 3729, 10, 47475, 'Games'),
(524, 3729, 12, 45475, 'Games'),
(525, 3730, 1, 89745, 'Games'),
(526, 3730, 2, 89745, 'Games'),
(527, 3730, 3, 89745, 'Games'),
(528, 3730, 4, 89745, 'Games'),
(529, 3730, 5, 89745, 'Games'),
(530, 3730, 6, 89745, 'Games'),
(531, 3730, 7, 89745, 'Games'),
(532, 3730, 8, 89745, 'Games'),
(533, 3730, 9, 89745, 'Games'),
(534, 3730, 10, 89745, 'Games'),
(535, 3730, 12, 88745, 'Games'),
(536, 3731, 1, 176800, 'Games'),
(537, 3731, 2, 176800, 'Games'),
(538, 3731, 3, 176800, 'Games'),
(539, 3731, 4, 176800, 'Games'),
(540, 3731, 5, 176800, 'Games'),
(541, 3731, 6, 176800, 'Games'),
(542, 3731, 7, 176800, 'Games'),
(543, 3731, 8, 176800, 'Games'),
(544, 3731, 9, 176800, 'Games'),
(545, 3731, 10, 176800, 'Games'),
(546, 3731, 12, 175800, 'Games'),
(547, 3732, 1, 230075, 'Games'),
(548, 3732, 2, 230075, 'Games'),
(549, 3732, 3, 230075, 'Games'),
(550, 3732, 4, 230075, 'Games'),
(551, 3732, 5, 230075, 'Games'),
(552, 3732, 6, 230075, 'Games'),
(553, 3732, 7, 230075, 'Games'),
(554, 3732, 8, 230075, 'Games'),
(555, 3732, 9, 230075, 'Games'),
(556, 3732, 10, 230075, 'Games'),
(557, 3732, 12, 229075, 'Games'),
(558, 3733, 1, 110000, 'Games'),
(559, 3733, 2, 110000, 'Games'),
(560, 3733, 3, 110000, 'Games'),
(561, 3733, 4, 110000, 'Games'),
(562, 3733, 5, 110000, 'Games'),
(563, 3733, 6, 110000, 'Games'),
(564, 3733, 7, 110000, 'Games'),
(565, 3733, 8, 110000, 'Games'),
(566, 3733, 9, 110000, 'Games'),
(567, 3733, 10, 110000, 'Games'),
(568, 3733, 12, 10000, 'Games'),
(569, 4305, 1, 28514, 'Games'),
(570, 4305, 2, 28514, 'Games'),
(571, 4305, 3, 28514, 'Games'),
(572, 4305, 4, 28514, 'Games'),
(573, 4305, 5, 28514, 'Games'),
(574, 4305, 6, 28514, 'Games'),
(575, 4305, 7, 28514, 'Games'),
(576, 4305, 8, 28514, 'Games'),
(577, 4305, 9, 28514, 'Games'),
(578, 4305, 10, 28514, 'Games'),
(579, 4305, 12, 27514, 'Games'),
(580, 4306, 1, 29324, 'Games'),
(581, 4306, 2, 29324, 'Games'),
(582, 4306, 3, 29324, 'Games'),
(583, 4306, 4, 29324, 'Games'),
(584, 4306, 5, 29324, 'Games'),
(585, 4306, 6, 29324, 'Games'),
(586, 4306, 7, 29324, 'Games'),
(587, 4306, 8, 29324, 'Games'),
(588, 4306, 9, 29324, 'Games'),
(589, 4306, 10, 29324, 'Games'),
(590, 4306, 12, 28324, 'Games'),
(591, 4307, 1, 34828, 'Games'),
(592, 4307, 2, 34828, 'Games'),
(593, 4307, 3, 34828, 'Games'),
(594, 4307, 4, 34828, 'Games'),
(595, 4307, 5, 34828, 'Games'),
(596, 4307, 6, 34828, 'Games'),
(597, 4307, 7, 34828, 'Games'),
(598, 4307, 8, 34828, 'Games'),
(599, 4307, 9, 34828, 'Games'),
(600, 4307, 10, 34828, 'Games'),
(601, 4307, 12, 33828, 'Games'),
(602, 4308, 1, 54000, 'Games'),
(603, 4308, 2, 54000, 'Games'),
(604, 4308, 3, 54000, 'Games'),
(605, 4308, 4, 54000, 'Games'),
(606, 4308, 5, 54000, 'Games'),
(607, 4308, 6, 54000, 'Games'),
(608, 4308, 7, 54000, 'Games'),
(609, 4308, 8, 54000, 'Games'),
(610, 4308, 9, 54000, 'Games'),
(611, 4308, 10, 54000, 'Games'),
(612, 4308, 12, 53000, 'Games'),
(613, 4309, 1, 65998, 'Games'),
(614, 4309, 2, 65998, 'Games'),
(615, 4309, 3, 65998, 'Games'),
(616, 4309, 4, 65998, 'Games'),
(617, 4309, 5, 65998, 'Games'),
(618, 4309, 6, 65998, 'Games'),
(619, 4309, 7, 65998, 'Games'),
(620, 4309, 8, 65998, 'Games'),
(621, 4309, 9, 65998, 'Games'),
(622, 4309, 10, 65998, 'Games'),
(623, 4309, 12, 64998, 'Games'),
(624, 4617, 1, 21994, 'Games'),
(625, 4617, 2, 21994, 'Games'),
(626, 4617, 3, 21994, 'Games'),
(627, 4617, 4, 21994, 'Games'),
(628, 4617, 5, 21994, 'Games'),
(629, 4617, 6, 21994, 'Games'),
(630, 4617, 7, 21994, 'Games'),
(631, 4617, 8, 21994, 'Games'),
(632, 4617, 9, 21994, 'Games'),
(633, 4617, 10, 21994, 'Games'),
(634, 4617, 12, 20994, 'Games'),
(635, 4618, 1, 101186, 'Games'),
(636, 4618, 2, 101186, 'Games'),
(637, 4618, 3, 101186, 'Games'),
(638, 4618, 4, 101186, 'Games'),
(639, 4618, 5, 101186, 'Games'),
(640, 4618, 6, 101186, 'Games'),
(641, 4618, 7, 101186, 'Games'),
(642, 4618, 8, 101186, 'Games'),
(643, 4618, 9, 101186, 'Games'),
(644, 4618, 10, 101186, 'Games'),
(645, 4618, 12, 100186, 'Games'),
(646, 4619, 1, 5171, 'Games'),
(647, 4619, 2, 5171, 'Games'),
(648, 4619, 3, 5171, 'Games'),
(649, 4619, 4, 5171, 'Games'),
(650, 4619, 5, 5171, 'Games'),
(651, 4619, 6, 5171, 'Games'),
(652, 4619, 7, 5171, 'Games'),
(653, 4619, 8, 5171, 'Games'),
(654, 4619, 9, 5171, 'Games'),
(655, 4619, 10, 5171, 'Games'),
(656, 4619, 12, 4171, 'Games'),
(657, 3734, 1, 21150, 'Games'),
(658, 3734, 2, 21150, 'Games'),
(659, 3734, 3, 21150, 'Games'),
(660, 3734, 4, 21150, 'Games'),
(661, 3734, 5, 21150, 'Games'),
(662, 3734, 6, 21150, 'Games'),
(663, 3734, 7, 21150, 'Games'),
(664, 3734, 8, 21150, 'Games'),
(665, 3734, 9, 21150, 'Games'),
(666, 3734, 10, 21150, 'Games'),
(667, 3734, 12, 19150, 'Games'),
(668, 3737, 1, 39035, 'Games'),
(669, 3737, 2, 39035, 'Games'),
(670, 3737, 3, 39035, 'Games'),
(671, 3737, 4, 39035, 'Games'),
(672, 3737, 5, 39035, 'Games'),
(673, 3737, 6, 39035, 'Games'),
(674, 3737, 7, 39035, 'Games'),
(675, 3737, 8, 39035, 'Games'),
(676, 3737, 9, 39035, 'Games'),
(677, 3737, 10, 39035, 'Games'),
(678, 3737, 12, 38035, 'Games'),
(679, 3738, 1, 56910, 'Games'),
(680, 3738, 2, 56910, 'Games'),
(681, 3738, 3, 56910, 'Games'),
(682, 3738, 4, 56910, 'Games'),
(683, 3738, 5, 56910, 'Games'),
(684, 3738, 6, 56910, 'Games'),
(685, 3738, 7, 56910, 'Games'),
(686, 3738, 8, 56910, 'Games'),
(687, 3738, 9, 56910, 'Games'),
(688, 3738, 10, 56910, 'Games'),
(689, 3738, 12, 55910, 'Games'),
(690, 3739, 1, 76075, 'Games'),
(691, 3739, 2, 76075, 'Games'),
(692, 3739, 3, 76075, 'Games'),
(693, 3739, 4, 76075, 'Games'),
(694, 3739, 5, 76075, 'Games'),
(695, 3739, 6, 76075, 'Games'),
(696, 3739, 7, 76075, 'Games'),
(697, 3739, 8, 76075, 'Games'),
(698, 3739, 9, 76075, 'Games'),
(699, 3739, 10, 76075, 'Games'),
(700, 3739, 12, 75075, 'Games'),
(701, 3740, 1, 93725, 'Games'),
(702, 3740, 2, 93725, 'Games'),
(703, 3740, 3, 93725, 'Games'),
(704, 3740, 4, 93725, 'Games'),
(705, 3740, 5, 0, 'Games'),
(706, 3740, 6, 93725, 'Games'),
(707, 3740, 7, 93725, 'Games'),
(708, 3740, 8, 93725, 'Games'),
(709, 3740, 9, 93725, 'Games'),
(710, 3740, 10, 93725, 'Games'),
(711, 3740, 12, 92725, 'Games'),
(712, 3741, 1, 112375, 'Games'),
(713, 3741, 2, 112375, 'Games'),
(714, 3741, 3, 112375, 'Games'),
(715, 3741, 4, 112375, 'Games'),
(716, 3741, 5, 112375, 'Games'),
(717, 3741, 6, 112375, 'Games'),
(718, 3741, 7, 112375, 'Games'),
(719, 3741, 8, 112375, 'Games'),
(720, 3741, 9, 112375, 'Games'),
(721, 3741, 10, 112375, 'Games'),
(722, 3741, 12, 111375, 'Games'),
(723, 3742, 1, 130175, 'Games'),
(724, 3742, 2, 130175, 'Games'),
(725, 3742, 3, 130175, 'Games'),
(726, 3742, 4, 130175, 'Games'),
(727, 3742, 5, 130175, 'Games'),
(728, 3742, 6, 130175, 'Games'),
(729, 3742, 7, 130175, 'Games'),
(730, 3742, 8, 130175, 'Games'),
(731, 3742, 9, 130175, 'Games'),
(732, 3742, 10, 130175, 'Games'),
(733, 3742, 12, 129175, 'Games'),
(734, 3743, 1, 145934, 'Games'),
(735, 3743, 2, 145934, 'Games'),
(736, 3743, 3, 145934, 'Games'),
(737, 3743, 4, 145934, 'Games'),
(738, 3743, 5, 145934, 'Games'),
(739, 3743, 6, 145934, 'Games'),
(740, 3743, 7, 145934, 'Games'),
(741, 3743, 8, 145934, 'Games'),
(742, 3743, 9, 145934, 'Games'),
(743, 3743, 10, 145934, 'Games'),
(744, 3743, 12, 144934, 'Games'),
(745, 3744, 1, 184975, 'Games'),
(746, 3744, 2, 184975, 'Games'),
(747, 3744, 3, 184975, 'Games'),
(748, 3744, 4, 184975, 'Games'),
(749, 3744, 5, 184975, 'Games'),
(750, 3744, 6, 184975, 'Games'),
(751, 3744, 7, 184975, 'Games'),
(752, 3744, 8, 184975, 'Games'),
(753, 3744, 9, 184975, 'Games'),
(754, 3744, 10, 184975, 'Games'),
(755, 3744, 12, 183975, 'Games'),
(756, 3745, 1, 123450, 'Games'),
(757, 3745, 2, 123450, 'Games'),
(758, 3745, 3, 123450, 'Games'),
(759, 3745, 4, 123450, 'Games'),
(760, 3745, 5, 123450, 'Games'),
(761, 3745, 6, 123450, 'Games'),
(762, 3745, 7, 123450, 'Games'),
(763, 3745, 8, 123450, 'Games'),
(764, 3745, 9, 123450, 'Games'),
(765, 3745, 10, 123450, 'Games'),
(766, 3745, 12, 122450, 'Games'),
(767, 3746, 1, 127885, 'Games'),
(768, 3746, 2, 127885, 'Games'),
(769, 3746, 3, 127885, 'Games'),
(770, 3746, 4, 127885, 'Games'),
(771, 3746, 5, 127885, 'Games'),
(772, 3746, 6, 127885, 'Games'),
(773, 3746, 7, 127885, 'Games'),
(774, 3746, 8, 127885, 'Games'),
(775, 3746, 9, 127885, 'Games'),
(776, 3746, 10, 127885, 'Games'),
(777, 3746, 12, 126885, 'Games'),
(778, 3991, 1, 20050, 'Games'),
(779, 3991, 2, 20050, 'Games'),
(780, 3991, 3, 20050, 'Games'),
(781, 3991, 4, 20050, 'Games'),
(782, 3991, 5, 20050, 'Games'),
(783, 3991, 6, 20050, 'Games'),
(784, 3991, 7, 20050, 'Games'),
(785, 3991, 8, 20050, 'Games'),
(786, 3991, 9, 20050, 'Games'),
(787, 3991, 10, 20050, 'Games'),
(788, 3991, 12, 19050, 'Games'),
(789, 3992, 1, 36950, 'Games'),
(790, 3992, 2, 36950, 'Games'),
(791, 3992, 3, 36950, 'Games'),
(792, 3992, 4, 36950, 'Games'),
(793, 3992, 5, 36950, 'Games'),
(794, 3992, 6, 36950, 'Games'),
(795, 3992, 7, 36950, 'Games'),
(796, 3992, 8, 36950, 'Games'),
(797, 3992, 9, 36950, 'Games'),
(798, 3992, 10, 36950, 'Games'),
(799, 3992, 12, 35950, 'Games'),
(800, 3993, 1, 59450, 'Games'),
(801, 3993, 2, 59450, 'Games'),
(802, 3993, 3, 59450, 'Games'),
(803, 3993, 4, 59450, 'Games'),
(804, 3993, 5, 59450, 'Games'),
(805, 3993, 6, 59450, 'Games'),
(806, 3993, 7, 59450, 'Games'),
(807, 3993, 8, 59450, 'Games'),
(808, 3993, 9, 59450, 'Games'),
(809, 3993, 10, 59450, 'Games'),
(810, 3993, 12, 58450, 'Games'),
(811, 3995, 1, 86650, 'Games'),
(812, 3995, 2, 86650, 'Games'),
(813, 3995, 3, 86650, 'Games'),
(814, 3995, 4, 86650, 'Games'),
(815, 3995, 5, 86650, 'Games'),
(816, 3995, 6, 86650, 'Games'),
(817, 3995, 7, 86650, 'Games'),
(818, 3995, 8, 86650, 'Games'),
(819, 3995, 9, 86650, 'Games'),
(820, 3995, 10, 86650, 'Games'),
(821, 3995, 12, 85650, 'Games'),
(822, 3996, 1, 164800, 'Games'),
(823, 3996, 2, 164800, 'Games'),
(824, 3996, 3, 164800, 'Games'),
(825, 3996, 4, 164800, 'Games'),
(826, 3996, 5, 164800, 'Games'),
(827, 3996, 6, 164800, 'Games'),
(828, 3996, 7, 164800, 'Games'),
(829, 3996, 8, 164800, 'Games'),
(830, 3996, 9, 164800, 'Games'),
(831, 3996, 10, 164800, 'Games'),
(832, 3996, 12, 163800, 'Games'),
(833, 4622, 1, 202625, 'Games'),
(834, 4622, 2, 202625, 'Games'),
(835, 4622, 3, 202625, 'Games'),
(836, 4622, 4, 202625, 'Games'),
(837, 4622, 5, 202625, 'Games'),
(838, 4622, 6, 202625, 'Games'),
(839, 4622, 7, 202625, 'Games'),
(840, 4622, 8, 202625, 'Games'),
(841, 4622, 9, 202625, 'Games'),
(842, 4622, 10, 202625, 'Games'),
(843, 4622, 12, 201625, 'Games'),
(844, 3814, 1, 10600, 'Games'),
(845, 3814, 2, 10600, 'Games'),
(846, 3814, 3, 10600, 'Games'),
(847, 3814, 4, 10600, 'Games'),
(848, 3814, 5, 10600, 'Games'),
(849, 3814, 6, 10600, 'Games'),
(850, 3814, 7, 10600, 'Games'),
(851, 3814, 8, 10600, 'Games'),
(852, 3814, 9, 10600, 'Games'),
(853, 3814, 10, 10600, 'Games'),
(854, 3814, 12, 9600, 'Games'),
(855, 3815, 1, 16925, 'Games'),
(856, 3815, 2, 16925, 'Games'),
(857, 3815, 3, 16925, 'Games'),
(858, 3815, 4, 16925, 'Games'),
(859, 3815, 5, 16925, 'Games'),
(860, 3815, 6, 16925, 'Games'),
(861, 3815, 7, 16925, 'Games'),
(862, 3815, 8, 16925, 'Games'),
(863, 3815, 9, 16925, 'Games'),
(864, 3815, 10, 16925, 'Games'),
(865, 3815, 12, 15925, 'Games'),
(866, 3811, 1, 51950, 'Games'),
(867, 3811, 2, 51950, 'Games'),
(868, 3811, 3, 51950, 'Games'),
(869, 3811, 4, 51950, 'Games'),
(870, 3811, 5, 51950, 'Games'),
(871, 3811, 6, 51950, 'Games'),
(872, 3811, 7, 51950, 'Games'),
(873, 3811, 8, 51950, 'Games'),
(874, 3811, 9, 51950, 'Games'),
(875, 3811, 10, 51950, 'Games'),
(876, 3811, 12, 50950, 'Games'),
(877, 3812, 1, 148950, 'Games'),
(878, 3812, 2, 148950, 'Games'),
(879, 3812, 3, 148950, 'Games'),
(880, 3812, 4, 148950, 'Games'),
(881, 3812, 5, 148950, 'Games'),
(882, 3812, 6, 148950, 'Games'),
(883, 3812, 7, 148950, 'Games'),
(884, 3812, 8, 148950, 'Games'),
(885, 3812, 9, 148950, 'Games'),
(886, 3812, 10, 148950, 'Games'),
(887, 3812, 12, 147950, 'Games'),
(888, 3813, 1, 391475, 'Games'),
(889, 3813, 2, 391475, 'Games'),
(890, 3813, 3, 391475, 'Games'),
(891, 3813, 4, 391475, 'Games'),
(892, 3813, 5, 391475, 'Games'),
(893, 3813, 6, 391475, 'Games'),
(894, 3813, 7, 391475, 'Games'),
(895, 3813, 8, 391475, 'Games'),
(896, 3813, 9, 391475, 'Games'),
(897, 3813, 10, 391475, 'Games'),
(898, 3813, 12, 390475, 'Games');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_saldo`
--

CREATE TABLE `history_saldo` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `aksi` enum('+','-') NOT NULL,
  `nominal` double NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_transfer`
--

CREATE TABLE `history_transfer` (
  `id` int(11) NOT NULL,
  `rid` varchar(6) NOT NULL,
  `username` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `tipe` enum('news','info','update','maintenance') NOT NULL,
  `content` varchar(10000) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `kode` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuntungan`
--

CREATE TABLE `keuntungan` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `web` varchar(100) NOT NULL,
  `api` varchar(100) NOT NULL,
  `reff` bigint(20) NOT NULL,
  `bankfee` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuntungan`
--

INSERT INTO `keuntungan` (`id`, `code`, `web`, `api`, `reff`, `bankfee`) VALUES
(1, 'SOSIAL_MEDIA', '5000', '70', 5, 0),
(2, 'PULSA_LAINNYA', '3500', '3400', 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` enum('Developers','Staff') NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `instagram` text NOT NULL,
  `link` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak_kami`
--

INSERT INTO `kontak_kami` (`id`, `nama`, `alamat`, `jabatan`, `whatsapp`, `instagram`, `link`, `url`) VALUES
(6, 'GEMESH STORE', '', 'Developers', '6287852574867', 'gemesh.store', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_pulsa`
--

CREATE TABLE `layanan_pulsa` (
  `id` int(11) NOT NULL,
  `service_id` varchar(250) CHARACTER SET latin1 NOT NULL,
  `provider_id` varchar(250) CHARACTER SET latin1 NOT NULL,
  `operator` varchar(250) CHARACTER SET latin1 NOT NULL,
  `layanan` text CHARACTER SET latin1 NOT NULL,
  `harga` double NOT NULL,
  `harga_api` double NOT NULL,
  `harga_premium` bigint(20) NOT NULL,
  `harga_h2h` bigint(20) NOT NULL,
  `profit` double NOT NULL,
  `status` enum('Normal','Gangguan') CHARACTER SET latin1 NOT NULL,
  `provider` varchar(250) CHARACTER SET latin1 NOT NULL,
  `tipe` varchar(250) CHARACTER SET latin1 NOT NULL,
  `note` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `layanan_pulsa`
--

INSERT INTO `layanan_pulsa` (`id`, `service_id`, `provider_id`, `operator`, `layanan`, `harga`, `harga_api`, `harga_premium`, `harga_h2h`, `profit`, `status`, `provider`, `tipe`, `note`) VALUES
(6438, '1', '1', 'DANA', 'TEST', 0, 1, 1, 1, 0, 'Normal', 'DF', 'VGAME', '-'),
(6439, 'FF70', 'FF70', 'FREE FIRE', 'Free Fire 70 Diamond', 9555, 9505, 9455, 9405, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 70 Diamond'),
(6440, 'FF140', 'FF140', 'FREE FIRE', 'Free Fire 140 Diamond', 18619, 18569, 18519, 18469, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 140 Diamond'),
(6441, 'FF280', 'FF280', 'FREE FIRE', 'Free Fire 280 Diamond', 36718, 36668, 36618, 36568, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 280 Diamond'),
(6442, 'FF355', 'FF355', 'FREE FIRE', 'Free Fire 355 Diamond', 45750, 45700, 45650, 45600, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 355 Diamond'),
(6443, 'FF400', 'FF400', 'FREE FIRE', 'Free Fire 400 Diamond', 52387, 52337, 52287, 52237, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 400 Diamond'),
(6444, 'FF500', 'FF500', 'FREE FIRE', 'Free Fire 500 Diamond', 64741, 64691, 64641, 64591, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 500 Diamond'),
(6445, 'FF720', 'FF720', 'FREE FIRE', 'Free Fire 720 Diamond', 91045, 90995, 90945, 90895, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 720 Diamond'),
(6446, 'FF1075', 'FF1075', 'FREE FIRE', 'Free Fire 1075 Diamond', 136305, 136255, 136205, 136155, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 1075 Diamond'),
(6447, 'ML3', 'ML3', 'MOBILE LEGEND', 'MOBILELEGEND - 3 Diamond', 1670, 1620, 1570, 1520, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6448, 'ML12', 'ML12', 'MOBILE LEGEND', 'MOBILELEGEND - 12 Diamond', 3985, 3935, 3885, 3835, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6449, 'ML19', 'ML19', 'MOBILE LEGEND', 'MOBILELEGEND - 19 Diamond', 6255, 6205, 6155, 6105, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6450, 'ML28', 'ML28', 'MOBILE LEGEND', 'MOBILELEGEND - 28 Diamond', 8460, 8410, 8360, 8310, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6451, 'ML44', 'ML44', 'MOBILE LEGEND', 'MOBILELEGEND - 44 Diamond', 12500, 12450, 12400, 12350, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6452, 'ML59', 'ML59', 'MOBILE LEGEND', 'MOBILELEGEND - 59 Diamond', 16450, 16400, 16350, 16300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6453, 'ML85', 'ML85', 'MOBILE LEGEND', 'MOBILELEGEND - 85 Diamond', 20350, 20300, 20250, 20200, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6454, 'ML170', 'ML170', 'MOBILE LEGEND', 'MOBILELEGEND - 170 Diamond', 40250, 40200, 40150, 40100, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6455, 'ML240', 'ML240', 'MOBILE LEGEND', 'MOBILELEGEND - 240 Diamond', 59950, 59900, 59850, 59800, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6456, 'ML257', 'ML257', 'MOBILE LEGEND', 'MOBILELEGEND - 257 Diamond', 60350, 60300, 60250, 60200, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6457, 'ML296', 'ML296', 'MOBILE LEGEND', 'MOBILELEGEND - 296 Diamond', 76350, 76300, 76250, 76200, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6458, 'ML344', 'ML344', 'MOBILE LEGEND', 'MOBILELEGEND - 344 Diamond', 82450, 82400, 82350, 82300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6459, 'ML370', 'ML370', 'MOBILE LEGEND', 'MOBILELEGEND - 370 Diamond', 88450, 88400, 88350, 88300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6460, 'ML408', 'ML408', 'MOBILE LEGEND', 'MOBILELEGEND - 408 Diamond', 98450, 98400, 98350, 98300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6461, 'ML429', 'ML429', 'MOBILE LEGEND', 'MOBILELEGEND - 429 Diamond', 99450, 99400, 99350, 99300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6462, 'ML514', 'ML514', 'MOBILE LEGEND', 'MOBILELEGEND - 514 Diamond', 119550, 119500, 119450, 119400, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6463, 'ML568', 'ML568', 'MOBILE LEGEND', 'MOBILELEGEND - 568 Diamond', 138450, 138400, 138350, 138300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6464, 'ML600', 'ML600', 'MOBILE LEGEND', 'MOBILELEGEND - 600 Diamond', 142450, 142400, 142350, 142300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6465, 'ML706', 'ML706', 'MOBILE LEGEND', 'MOBILELEGEND - 706 Diamond', 159450, 159400, 159350, 159300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6466, 'ML875', 'ML875', 'MOBILE LEGEND', 'MOBILELEGEND - 875 Diamond', 200450, 200400, 200350, 200300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6467, 'Ml2195', 'Ml2195', 'MOBILE LEGEND', 'MOBILELEGEND - 2195 Diamond', 479450, 479400, 479350, 479300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6468, 'Ml2010', 'Ml2010', 'MOBILE LEGEND', 'MOBILELEGEND - 2010 Diamond', 467450, 467400, 467350, 467300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6469, 'Ml1412', 'Ml1412', 'MOBILE LEGEND', 'MOBILELEGEND - 1412 Diamond', 319450, 319400, 319350, 319300, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6470, 'Ml1159', 'Ml1159', 'MOBILE LEGEND', 'MOBILELEGEND - 1159 Diamond', 275475, 275425, 275375, 275325, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6471, 'ML963', 'ML963', 'MOBILE LEGEND', 'MOBILELEGEND - 963 Diamond', 219950, 219900, 219850, 219800, 0, 'Normal', 'DF', 'VGAME', 'no pelanggan = gabungan antara user_id dan zone_id'),
(6472, 'PM50', 'PM50', 'PUBG MOBILE', 'PUBG MOBILE 50 UC', 10115, 10065, 10015, 9965, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 50 UC'),
(6473, 'PM70', 'PM70', 'PUBG MOBILE', 'PUBG MOBILE 70 UC', 14585, 14535, 14485, 14435, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 70 UC'),
(6474, 'PM100', 'PM100', 'PUBG MOBILE', 'PUBG MOBILE 100 UC', 19565, 19515, 19465, 19415, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 100 UC'),
(6475, 'PM150', 'PM150', 'PUBG MOBILE', 'PUBG MOBILE 150 UC', 31000, 30950, 30900, 30850, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 150 UC'),
(6476, 'PM210', 'PM210', 'PUBG MOBILE', 'PUBG MOBILE 210 UC', 41120, 41070, 41020, 40970, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 210 UC'),
(6477, 'PM250', 'PM250', 'PUBG MOBILE', 'PUBG MOBILE 250 UC', 46550, 46500, 46450, 46400, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 250 UC'),
(6478, 'PM125', 'PM125', 'PUBG MOBILE', 'PUBG MOBILE 125 UC', 23660, 23610, 23560, 23510, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 125 UC'),
(6479, 'PM500', 'PM500', 'PUBG MOBILE', 'PUBG MOBILE 500 UC', 90000, 89950, 89900, 89850, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 500 UC'),
(6480, 'PM700', 'PM700', 'PUBG MOBILE', 'PUBG MOBILE 700 UC', 133475, 133425, 133375, 133325, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 700 UC'),
(6481, 'PM1250', 'PM1250', 'PUBG MOBILE', 'PUBG MOBILE 1250 UC', 248075, 248025, 247975, 247925, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 1250 UC'),
(6482, 'PM1750', 'PM1750', 'PUBG MOBILE', 'PUBG MOBILE 1750 UC', 331075, 331025, 330975, 330925, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 1750 UC'),
(6483, 'PM2500', 'PM2500', 'PUBG MOBILE', 'PUBG MOBILE 2500 UC', 495075, 495025, 494975, 494925, 0, 'Normal', 'DF', 'VGAME', 'PUBG MOBILE 2500 UC'),
(6484, 'CODM26', 'CODM26', 'Call of Duty MOBILE', 'Call of Duty Mobile 26 CP', 5100, 5050, 5000, 4950, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 26CP'),
(6485, 'CODM53', 'CODM53', 'Call of Duty MOBILE', 'Call of Duty Mobile 53 CP', 10350, 10300, 10250, 10200, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 53CP'),
(6486, 'CODM264', 'CODM264', 'Call of Duty MOBILE', 'Call of Duty Mobile 264 CP', 48175, 48125, 48075, 48025, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 264CP'),
(6487, 'CODM106', 'CODM106', 'Call of Duty MOBILE', 'Call of Duty Mobile 106 CP', 19650, 19600, 19550, 19500, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 106CP'),
(6488, 'CODM528', 'CODM528', 'Call of Duty MOBILE', 'Call of Duty Mobile 528 CP', 95700, 95650, 95600, 95550, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 528CP'),
(6489, 'CODM1056', 'CODM1056', 'Call of Duty MOBILE', 'Call of Duty Mobile 1056 CP', 190850, 190800, 190750, 190700, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 1056CP'),
(6490, 'CODM1584', 'CODM1584', 'Call of Duty MOBILE', 'Call of Duty Mobile 1584 CP', 285850, 285800, 285750, 285700, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 1584'),
(6491, 'CODM2640', 'CODM2640', 'Call of Duty MOBILE', 'Call of Duty Mobile 2640 CP', 476050, 476000, 475950, 475900, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 2640CP'),
(6492, 'CODM5380', 'CODM5380', 'Call of Duty MOBILE', 'Call of Duty Mobile 5280 CP', 970450, 970400, 970350, 970300, 0, 'Normal', 'DF', 'VGAME', 'Call of Duty Mobile 5280CP'),
(6493, 'FFMM', 'FFMM', 'FREE FIRE', 'Free Fire Membership Mingguan', 27900, 27850, 27800, 27750, 0, 'Normal', 'DF', 'VGAME', '60 diamond perhari Setiap login selama 7 hari (Wajib Login untuk mendapatkan diamond)'),
(6494, 'FFMB', 'FFMB', 'FREE FIRE', 'Free Fire Membership Bulanan', 82275, 82225, 82175, 82125, 0, 'Normal', 'DF', 'VGAME', '60 diamond perhari Setiap login selama 30 hari (Wajib Login untuk mendapatkan diamond)'),
(6495, 'GI60', 'GI60', 'Genshin Impact', 'Genshin Impact 60 Genesis Crystals', 13460, 13410, 13360, 13310, 0, 'Normal', 'DF', 'VGAME', 'Gabungan id server dan UID'),
(6496, 'GI330', 'GI330', 'Genshin Impact', 'Genshin Impact 300+30 Genesis Crystals', 62975, 62925, 62875, 62825, 0, 'Normal', 'DF', 'VGAME', 'Gabungan id server dan UID'),
(6497, 'GI1090', 'GI1090', 'Genshin Impact', 'Genshin Impact 980+110 Genesis Crystals', 197475, 197425, 197375, 197325, 0, 'Normal', 'DF', 'VGAME', 'Gabungan id server dan UID'),
(6498, 'GI2240', 'GI2240', 'Genshin Impact', 'Genshin Impact 1980+260 Genesis Crystals', 430475, 430425, 430375, 430325, 0, 'Normal', 'DF', 'VGAME', 'Gabungan id server dan UID'),
(6499, 'GI8080', 'GI8080', 'Genshin Impact', 'Genshin Impact 6480+1600 Genesis Crystals', 1300450, 1300400, 1300350, 1300300, 0, 'Normal', 'DF', 'VGAME', 'Gabungan id server dan UID'),
(6500, 'GI3880', 'GI3880', 'Genshin Impact', 'Genshin Impact 3280+600 Genesis Crystals', 700475, 700425, 700375, 700325, 0, 'Normal', 'DF', 'VGAME', 'Gabungan id server dan UID'),
(6501, 'GIMWM', 'GIMWM', 'Genshin Impact', 'Genshin Impact Blessing of the Welkin Moon', 62975, 62925, 62875, 62825, 0, 'Normal', 'DF', 'VGAME', 'Login Setiap hari selama 30 hari mendapatkan 300 Genesis Crystal secara langsung (1x) dan mendapatkan 90 Primogem setiap hari'),
(6502, 'PB1200', 'PB1200', 'POINT BLANK', '1200 PB Cash', 9605, 9555, 9505, 9455, 0, 'Normal', 'DF', 'VGAME', '1200 Point Blank Cash'),
(6503, 'PB2400', 'PB2400', 'POINT BLANK', '2400 PB Cash', 18660, 18610, 18560, 18510, 0, 'Normal', 'DF', 'VGAME', '2400 PB Cash'),
(6504, 'PB6000', 'PB6000', 'POINT BLANK', '6000 PB Cash', 45975, 45925, 45875, 45825, 0, 'Normal', 'DF', 'VGAME', '6000 PB Cash'),
(6505, 'PB12000', 'PB12000', 'POINT BLANK', '12000 PB Cash', 91475, 91425, 91375, 91325, 0, 'Normal', 'DF', 'VGAME', '12000 PB Cash'),
(6506, 'PB36000', 'PB36000', 'POINT BLANK', '36000 PB Cash', 275475, 275425, 275375, 275325, 0, 'Normal', 'DF', 'VGAME', '-'),
(6507, 'PB60000', 'PB60000', 'POINT BLANK', '60000 PB Cash', 455475, 455425, 455375, 455325, 0, 'Normal', 'DF', 'VGAME', '-'),
(6508, 'GP10K', 'GP10K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 10.000 INDONESIA REGION', 9950, 9900, 9850, 9800, 0, 'Normal', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 10.000'),
(6509, 'GP20K', 'GP20K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 20.000 INDONESIA REGION', 19950, 19900, 19850, 19800, 0, 'Gangguan', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 20.000'),
(6510, 'GP50K', 'GP50K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 50.000 INDONESIA REGION', 48750, 48700, 48650, 48600, 0, 'Gangguan', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 50.000'),
(6511, 'GP100K', 'GP100K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 100.000 INDONESIA REGION', 98450, 98400, 98350, 98300, 0, 'Normal', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 100.000'),
(6512, 'GP150K', 'GP150K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 150.000 INDONESIA REGION', 147450, 147400, 147350, 147300, 0, 'Normal', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 150.000'),
(6513, 'GP300K', 'GP300K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 300.000 INDONESIA REGION', 292450, 292400, 292350, 292300, 0, 'Normal', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 300.000'),
(6514, 'GP500K', 'GP500K', 'GOOGLE PLAY INDONESIA', 'Google Play Rp. 500.000 INDONESIA REGION', 488050, 488000, 487950, 487900, 0, 'Normal', 'DF', 'VGAME', 'Google Play Gift Card Indonesia Rp. 500.000'),
(6515, 'GS33', 'GS33', 'GARENA', 'Voucher Garena 33 Shell', 9700, 9650, 9600, 9550, 0, 'Normal', 'DF', 'VGAME', '-'),
(6516, 'GS66', 'GS66', 'GARENA', 'Voucher Garena 66 Shell', 18750, 18700, 18650, 18600, 0, 'Normal', 'DF', 'VGAME', '-'),
(6517, 'GS165', 'GS165', 'GARENA', 'Voucher Garena 165 Shell', 45950, 45900, 45850, 45800, 0, 'Normal', 'DF', 'VGAME', '-'),
(6518, 'GS330', 'GS330', 'GARENA', 'Voucher Garena 330 Shell', 91625, 91575, 91525, 91475, 0, 'Normal', 'DF', 'VGAME', '-'),
(6519, 'AOV40', 'AOV40', 'ARENA OF VALOR', 'AOV 40 Vouchers', 9995, 9945, 9895, 9845, 0, 'Normal', 'DF', 'VGAME', 'AOV 40 Vouchers'),
(6520, 'AOV90', 'AOV90', 'ARENA OF VALOR', 'AOV 90 Vouchers', 19850, 19800, 19750, 19700, 0, 'Normal', 'DF', 'VGAME', 'AOV 90 Vouchers'),
(6521, 'AOV230', 'AOV230', 'ARENA OF VALOR', 'AOV 230 Vouchers', 48055, 48005, 47955, 47905, 0, 'Normal', 'DF', 'VGAME', 'AOV 230 Vouchers'),
(6522, 'AOV470', 'AOV470', 'ARENA OF VALOR', 'AOV 470 Vouchers', 95650, 95600, 95550, 95500, 0, 'Normal', 'DF', 'VGAME', 'AOV 470 Vouchers'),
(6523, 'AVO950', 'AVO950', 'ARENA OF VALOR', 'AOV 950 Vouchers', 190800, 190750, 190700, 190650, 0, 'Normal', 'DF', 'VGAME', 'AOV 950 Vouchers'),
(6524, 'AOV1430', 'AOV1430', 'ARENA OF VALOR', 'AOV 1430 Vouchers', 285660, 285610, 285560, 285510, 0, 'Normal', 'DF', 'VGAME', 'AOV 1430 Vouchers'),
(6525, 'AOV2390', 'AOV2390', 'ARENA OF VALOR', 'AOV 2390 Vouchers', 475825, 475775, 475725, 475675, 0, 'Normal', 'DF', 'VGAME', 'AOV 2390 Vouchers'),
(6526, 'RM6', 'RM6', 'Ragnarok M: Eternal Love', '6 Big Cat Coins', 13200, 13150, 13100, 13050, 0, 'Normal', 'DF', 'VGAME', '6 Big Cat Coins'),
(6527, 'RM12', 'RM12', 'Ragnarok M: Eternal Love', '12 Big Cat Coins', 25050, 25000, 24950, 24900, 0, 'Normal', 'DF', 'VGAME', '12 Big Cat Coins'),
(6528, 'RM18', 'RM18', 'Ragnarok M: Eternal Love', '18 Big Cat Coins', 38450, 38400, 38350, 38300, 0, 'Normal', 'DF', 'VGAME', '18 Big Cat Coins'),
(6529, 'RM24', 'RM24', 'Ragnarok M: Eternal Love', '24 Big Cat Coins', 51450, 51400, 51350, 51300, 0, 'Normal', 'DF', 'VGAME', '24 Big Cat Coins'),
(6530, 'RM36', 'RM36', 'Ragnarok M: Eternal Love', '36 Big Cat Coins', 62450, 62400, 62350, 62300, 0, 'Normal', 'DF', 'VGAME', '36 Big Cat Coins'),
(6531, 'RM72', 'RM72', 'Ragnarok M: Eternal Love', '72 Big Cat Coins', 135450, 135400, 135350, 135300, 0, 'Normal', 'DF', 'VGAME', '72 Big Cat Coins'),
(6532, 'RM363', 'RM363', 'Ragnarok M: Eternal Love', '373 Big Cat Coins', 618450, 618400, 618350, 618300, 0, 'Normal', 'DF', 'VGAME', '373 Big Cat Coins'),
(6533, 'RM748', 'RM748', 'Ragnarok M: Eternal Love', '748 Big Cat Coins', 1235450, 1235400, 1235350, 1235300, 0, 'Normal', 'DF', 'VGAME', '748 Big Cat Coins'),
(6534, 'MLSM', 'MLSM', 'MOBILE LEGEND', 'MOBILELEGEND Startlight Member', 132450, 132400, 132350, 132300, 0, 'Normal', 'DF', 'VGAME', '-'),
(6535, 'MLSMP', 'MLSMP', 'MOBILE LEGEND', 'MOBILELEGEND Startlight Member Plus', 290450, 290400, 290350, 290300, 0, 'Normal', 'DF', 'VGAME', '-'),
(6536, 'MLTP', 'MLTP', 'MOBILE LEGEND', 'MOBILELEGEND Twilight Pass', 132450, 132400, 132350, 132300, 0, 'Normal', 'DF', 'VGAME', '-'),
(6537, 'FF1450', 'FF1450', 'FREE FIRE', 'Free Fire 1450 Diamond', 186445, 186395, 186345, 186295, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 1450 Diamond'),
(6538, 'FF2000', 'FF2000', 'FREE FIRE', 'Free Fire 2000 Diamond', 247275, 247225, 247175, 247125, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 2000 Diamond'),
(6539, 'FF925', 'FF925', 'FREE FIRE', 'Free Fire 925 Diamond', 118221, 118171, 118121, 118071, 0, 'Normal', 'DF', 'VGAME', 'Free Fire 925 Diamond'),
(6540, 'SM60', 'SM60', 'Sausage Man', 'Sausage Man 60 Candies', 13950, 13900, 13850, 13800, 0, 'Normal', 'DF', 'VGAME', 'Sausage Man 60 Candies'),
(6541, 'SM180', 'SM180', 'Sausage Man', 'Sausage Man 180 Candies', 39450, 39400, 39350, 39300, 0, 'Normal', 'DF', 'VGAME', 'Sausage Man 180 Candies'),
(6542, 'SM300', 'SM300', 'Sausage Man', 'Sausage Man 300 Candies', 68450, 68400, 68350, 68300, 0, 'Normal', 'DF', 'VGAME', 'Sausage Man 300 Candies'),
(6543, 'SM1980', 'SM1980', 'Sausage Man', 'Sausage Man 1980 Candies', 404450, 404400, 404350, 404300, 0, 'Normal', 'DF', 'VGAME', 'Sausage Man 1980 Candies'),
(6544, 'SM1280', 'SM1280', 'Sausage Man', 'Sausage Man 1280 Candies', 270450, 270400, 270350, 270300, 0, 'Normal', 'DF', 'VGAME', 'Sausage Man 1280 Candies'),
(6545, 'SM680', 'SM680', 'Sausage Man', 'Sausage Man 680 Candies', 135450, 135400, 135350, 135300, 0, 'Normal', 'DF', 'VGAME', 'Sausage Man 680 Candies'),
(6546, 'VT420', 'VT420', 'Valorant', 'Valorant 420 Points', 48950, 48900, 48850, 48800, 0, 'Normal', 'DF', 'VGAME', 'masukkan username akun game anda.'),
(6547, 'VT700', 'VT700', 'Valorant', 'Valorant 700 Points', 78050, 78000, 77950, 77900, 0, 'Normal', 'DF', 'VGAME', 'masukkan username akun game anda.'),
(6548, 'VT1375', 'VT1375', 'Valorant', 'Valorant 1375 Points', 145950, 145900, 145850, 145800, 0, 'Normal', 'DF', 'VGAME', 'masukkan username akun game anda.'),
(6549, 'VT4000', 'VT4000', 'Valorant', 'Valorant 4000 Points', 388475, 388425, 388375, 388325, 0, 'Normal', 'DF', 'VGAME', 'masukkan username akun game anda.'),
(6550, 'VT2400', 'VT2400', 'Valorant', 'Valorant 2400 Points', 242950, 242900, 242850, 242800, 0, 'Normal', 'DF', 'VGAME', 'masukkan username akun game anda.'),
(6551, 'FUND', 'FUND', 'DRAGON RAJA - SEA', 'Dragon Raja Investment Fund', 210450, 210400, 210350, 210300, 0, 'Normal', 'DF', 'VGAME', 'Masukkan ID Player di dalam game.'),
(6552, 'FUND2', 'FUND2', 'DRAGON RAJA - SEA', 'Dragon Raja Investment Fund II', 278450, 278400, 278350, 278300, 0, 'Normal', 'DF', 'VGAME', 'Masukkan ID Player di dalam game.'),
(6553, 'DR76', 'DR76', 'DRAGON RAJA - SEA', 'Dragon Raja 76 Coupons', 16100, 16050, 16000, 15950, 0, 'Normal', 'DF', 'VGAME', 'Masukkan ID Player di dalam game.'),
(6554, 'DR456', 'DR456', 'DRAGON RAJA - SEA', 'Dragon Raja 456 Coupons', 93450, 93400, 93350, 93300, 0, 'Normal', 'DF', 'VGAME', 'Masukkan ID Player di dalam game.'),
(6555, 'DR820', 'DR820', 'DRAGON RAJA - SEA', 'Dragon Raja 820 Coupons', 156450, 156400, 156350, 156300, 0, 'Normal', 'DF', 'VGAME', 'Masukkan ID Player di dalam game.'),
(6556, 'DR1699', 'DR1699', 'DRAGON RAJA - SEA', 'Dragon Raja 1699 Coupons', 313450, 313400, 313350, 313300, 0, 'Normal', 'DF', 'VGAME', 'Masukkan ID Player di dalam game.'),
(6557, '5650', '5650', 'Apex Legends Mobile', 'Apex Legends Mobile Syndicate Gold Pack 16 (5650 Gold)', 584550, 584500, 584450, 584400, 0, 'Normal', 'DF', 'VGAME', 'Masukan ID Apex Legends Mobile'),
(6558, 'AL1050', 'AL1050', 'Apex Legends Mobile', 'Apex Legends Mobile Syndicate Gold Pack 6 (1050 Gold)', 119150, 119100, 119050, 119000, 0, 'Normal', 'DF', 'VGAME', 'Masukan ID Apex Legends Mobile'),
(6559, 'AL500', 'AL500', 'Apex Legends Mobile', 'Apex Legends Mobile Syndicate Gold Pack 4 (500 Gold)', 60350, 60300, 60250, 60200, 0, 'Normal', 'DF', 'VGAME', 'Masukan ID Apex Legends Mobile'),
(6560, 'AL280', 'AL280', 'Apex Legends Mobile', 'Apex Legends Mobile Syndicate Gold Pack 2 (280 Gold)', 32750, 32700, 32650, 32600, 0, 'Normal', 'DF', 'VGAME', 'Masukan ID Apex Legends Mobile'),
(6561, 'AL90', 'AL90', 'Apex Legends Mobile', 'Apex Legends Mobile Syndicate Gold Pack 1 (90 Gold)', 15250, 15200, 15150, 15100, 0, 'Normal', 'DF', 'VGAME', 'Masukan ID Apex Legends Mobile'),
(6562, 'AU5', 'AU5', 'Among Us', 'Among Us 5.000 Powered by Google Play', 5405, 5355, 5305, 5255, 0, 'Normal', 'DF', 'VGAME', 'Dalam bentuk Voucher yang diredeem pada Google Play, lalu silahkan beli saldo Among Us di Google Play. Hanya untuk pengguna Android.'),
(6563, 'AU20', 'AU20', 'Among Us', 'Among Us 20.000 Powered by Google Play', 20260, 20210, 20160, 20110, 0, 'Normal', 'DF', 'VGAME', 'Dalam bentuk Voucher yang diredeem pada Google Play, lalu silahkan beli saldo Among Us di Google Play. Hanya untuk pengguna Android.'),
(6564, 'AU50', 'AU50', 'Among Us', 'Among Us 50.000 Powered by Google Play', 49975, 49925, 49875, 49825, 0, 'Normal', 'DF', 'VGAME', 'Dalam bentuk Voucher yang diredeem pada Google Play, lalu silahkan beli saldo Among Us di Google Play. Hanya untuk pengguna Android.'),
(6565, 'BP20', 'BP20', '8 Ball Pool', '8 Ball Pool 20 Cash', 17610, 17560, 17510, 17460, 0, 'Normal', 'DF', 'VGAME', 'nomor tujuan = user id 8 Ball Pool (tanpa menggunakan simbol -).'),
(6566, 'BP50', 'BP50', '8 Ball Pool', '8 Ball Pool 50 Cash', 36725, 36675, 36625, 36575, 0, 'Normal', 'DF', 'VGAME', 'nomor tujuan = user id 8 Ball Pool (tanpa menggunakan simbol -).'),
(6567, 'BP110', 'BP110', '8 Ball Pool', '8 Ball Pool 110 Cash', 70725, 70675, 70625, 70575, 0, 'Normal', 'DF', 'VGAME', 'nomor tujuan = user id 8 Ball Pool (tanpa menggunakan simbol -).'),
(6568, 'BP2000', 'BP2000', '8 Ball Pool', '8 Ball Pool 2.000 Cash', 687025, 686975, 686925, 686875, 0, 'Normal', 'DF', 'VGAME', 'nomor tujuan = user id 8 Ball Pool (tanpa menggunakan simbol -).'),
(6569, 'BP800', 'BP800', '8 Ball Pool', '8 Ball Pool 800 Cash', 350025, 349975, 349925, 349875, 0, 'Normal', 'DF', 'VGAME', 'nomor tujuan = user id 8 Ball Pool (tanpa menggunakan simbol -).'),
(6570, 'BP250', 'BP250', '8 Ball Pool', '8 Ball Pool 250 Cash', 142625, 142575, 142525, 142475, 0, 'Normal', 'DF', 'VGAME', 'nomor tujuan = user id 8 Ball Pool (tanpa menggunakan simbol -).'),
(6571, 'KOK255', 'KOK255', 'King of Kings', 'King of Kings 255 Coupons', 58065, 58015, 57965, 57915, 0, 'Normal', 'DF', 'VGAME', '-'),
(6572, 'KOK319', 'KOK319', 'King of Kings', 'King of Kings 319 Coupons', 72265, 72215, 72165, 72115, 0, 'Normal', 'DF', 'VGAME', '-'),
(6573, 'KOK127K', 'KOK127K', 'King of Kings', 'King of Kings 1277 Coupons', 286665, 286615, 286565, 286515, 0, 'Normal', 'DF', 'VGAME', '-'),
(6574, 'KOK1K', 'KOK1K', 'King of Kings', 'King of Kings 1064 Coupons', 239165, 239115, 239065, 239015, 0, 'Normal', 'DF', 'VGAME', '-'),
(6575, 'KOK638', 'KOK638', 'King of Kings', 'King of Kings 638 Coupons', 144165, 144115, 144065, 144015, 0, 'Normal', 'DF', 'VGAME', '-'),
(6576, 'KOK426', 'KOK426', 'King of Kings', 'King of Kings 426 Coupons', 96065, 96015, 95965, 95915, 0, 'Normal', 'DF', 'VGAME', '-'),
(6577, 'VV30', 'VV30', 'Vidio', 'Voucher Vidio 30 Hari Platinum', 31490, 31440, 31390, 31340, 0, 'Normal', 'DF', 'VGAME', 'Nomor tujuan diisi dengan nomor hp yang terdaftar di Vidio'),
(6578, 'VV1TH', 'VV1TH', 'Vidio', 'Voucher Vidio 1 Tahun Platinum', 213850, 213800, 213750, 213700, 0, 'Normal', 'DF', 'VGAME', 'Nomor tujuan diisi dengan nomor hp yang terdaftar di Vidio'),
(6579, 'RX10', 'RX10', 'Roblox', 'Roblox 10 USD', 170950, 170900, 170850, 170800, 0, 'Normal', 'DF', 'VGAME', 'Voucher Roblox 10 USD'),
(6580, 'RX25', 'RX25', 'Roblox', 'Roblox 25 USD', 426650, 426600, 426550, 426500, 0, 'Normal', 'DF', 'VGAME', 'Voucher Roblox 25 USD'),
(6581, 'LA65', 'LA65', 'LifeAfter Credits', 'LifeAfter 65 Credits', 14380, 14330, 14280, 14230, 0, 'Normal', 'DF', 'VGAME', '-'),
(6582, 'LA330', 'LA330', 'LifeAfter Credits', 'LifeAfter 330 Credits', 69550, 69500, 69450, 69400, 0, 'Normal', 'DF', 'VGAME', '-'),
(6583, 'LA558', 'LA558', 'LifeAfter Credits', 'LifeAfter 558 Credits', 110875, 110825, 110775, 110725, 0, 'Normal', 'DF', 'VGAME', '-'),
(6584, 'LA1K08', 'LA1K08', 'LifeAfter Credits', 'LifeAfter 1108 Credits', 207300, 207250, 207200, 207150, 0, 'Normal', 'DF', 'VGAME', '-'),
(6585, 'LA2K68', 'LA2K68', 'LifeAfter Credits', 'LifeAfter 2268 Credits', 414025, 413975, 413925, 413875, 0, 'Normal', 'DF', 'VGAME', '-'),
(6586, 'LD67', 'LD67', 'Lords Mobile', 'Lords Mobile 67 Diamonds', 10405, 10355, 10305, 10255, 0, 'Normal', 'DF', 'VGAME', 'Lords Mobile 67 Diamonds'),
(6587, 'LD134', 'LD134', 'Lords Mobile', 'Lords Mobile 134 Diamonds', 20310, 20260, 20210, 20160, 0, 'Normal', 'DF', 'VGAME', 'Lords Mobile 134 Diamonds'),
(6588, 'LD335', 'LD335', 'Lords Mobile', 'Lords Mobile 335 Diamonds', 49025, 48975, 48925, 48875, 0, 'Normal', 'DF', 'VGAME', 'Lords Mobile 335 Diamonds'),
(6589, 'LD3352', 'LD3352', 'Lords Mobile', 'Lords Mobile 3352 Diamonds', 480575, 480525, 480475, 480425, 0, 'Normal', 'DF', 'VGAME', 'Lords Mobile 3352 Diamonds'),
(6590, 'LD670', 'LD670', 'Lords Mobile', 'Lords Mobile 670 Diamonds', 98025, 97975, 97925, 97875, 0, 'Normal', 'DF', 'VGAME', 'Lords Mobile 670 Diamonds'),
(6591, 'LD2011', 'LD2011', 'Lords Mobile', 'Lords Mobile 2011 Diamonds', 290025, 289975, 289925, 289875, 0, 'Normal', 'DF', 'VGAME', 'Lords Mobile 2011 Diamonds'),
(6592, 'EC70', 'EC70', 'Eternal City', 'Eternal City 70 Gems', 14810, 14760, 14710, 14660, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 70 Gems'),
(6593, 'EC358', 'EC358', 'Eternal City', 'Eternal City 358 Gems', 71850, 71800, 71750, 71700, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 358 Gems'),
(6594, 'EC558', 'EC558', 'Eternal City', 'Eternal City 558 Gems', 113675, 113625, 113575, 113525, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 558 Gems'),
(6595, 'MCEC', 'MCEC', 'Eternal City', 'Monthly Card', 71850, 71800, 71750, 71700, 0, 'Normal', 'DF', 'VGAME', 'Eternal City Monthly Card'),
(6596, 'EC1118', 'EC1118', 'Eternal City', 'Eternal City 1118 Gems', 227600, 227550, 227500, 227450, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 1118 Gems'),
(6597, 'EC1398', 'EC1398', 'Eternal City', 'Eternal City 1398 Gems', 284675, 284625, 284575, 284525, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 1398 Gems'),
(6598, 'EC2300', 'EC2300', 'Eternal City', 'Eternal City 2300 Gems', 455750, 455700, 455650, 455600, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 2300 Gems'),
(6599, 'EC3800', 'EC3800', 'Eternal City', 'Eternal City 3800 Gems', 759750, 759700, 759650, 759600, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 3800 Gems'),
(6600, 'EC7000', 'EC7000', 'Eternal City', 'Eternal City 7000 Gems', 1424775, 1424725, 1424675, 1424625, 0, 'Normal', 'DF', 'VGAME', 'Eternal City 7000 Gems'),
(6601, 'MT100', 'MT100', 'MangaToon', 'MangaToon 100 Coins', 16950, 16900, 16850, 16800, 0, 'Normal', 'DF', 'VGAME', 'MangaToon 100 Coins'),
(6602, 'MT600', 'MT600', 'MangaToon', 'MangaToon 600 Coins', 95450, 95400, 95350, 95300, 0, 'Normal', 'DF', 'VGAME', 'MangaToon 600 Coins'),
(6603, 'MT10K', 'MT10K', 'MangaToon', 'MangaToon 10000 Coins', 1850475, 1850425, 1850375, 1850325, 0, 'Normal', 'DF', 'VGAME', 'MangaToon 10000 Coins'),
(6604, 'MT6K', 'MT6K', 'MangaToon', 'MangaToon 6000 Coins', 935450, 935400, 935350, 935300, 0, 'Normal', 'DF', 'VGAME', 'MangaToon 6000 Coins'),
(6605, 'MT1K', 'MT1K', 'MangaToon', 'MangaToon 1000 Coins', 158450, 158400, 158350, 158300, 0, 'Normal', 'DF', 'VGAME', 'MangaToon 1000 Coins'),
(6606, 'LM60', 'LM60', 'Laplace M', 'Laplace M 60 Spirals', 14555, 14505, 14455, 14405, 0, 'Normal', 'DF', 'VGAME', 'Laplace M 60 Spirals'),
(6607, 'LM300', 'LM300', 'Laplace M', 'Laplace M 300 Spirals', 71850, 71800, 71750, 71700, 0, 'Normal', 'DF', 'VGAME', 'Laplace M 300 Spirals'),
(6608, 'LM6480', 'LM6480', 'Laplace M', 'Laplace M 6480 Spirals', 1424750, 1424700, 1424650, 1424600, 0, 'Normal', 'DF', 'VGAME', 'Laplace M 6480 Spirals'),
(6609, 'LM3280', 'LM3280', 'Laplace M', 'Laplace M 3280 Spirals', 702725, 702675, 702625, 702575, 0, 'Normal', 'DF', 'VGAME', 'Laplace M 3280 Spirals'),
(6610, 'LM1980', 'LM1980', 'Laplace M', 'Laplace M 1980 Spirals', 417700, 417650, 417600, 417550, 0, 'Normal', 'DF', 'VGAME', 'Laplace M 1980 Spirals'),
(6611, 'LM980', 'LM980', 'Laplace M', 'Laplace M 980 Spirals', 208670, 208620, 208570, 208520, 0, 'Normal', 'DF', 'VGAME', 'Laplace M 980 Spirals'),
(6612, 'SPS1', 'SPS1', 'SPOTIFY', 'Spotify Premium Subscription Voucher - 1 Bulan', 56525, 56475, 56425, 56375, 0, 'Normal', 'DF', 'VGAME', '-'),
(6613, 'SPS3', 'SPS3', 'SPOTIFY', 'Spotify Premium Subscription Voucher - 3 Bulan', 168550, 168500, 168450, 168400, 0, 'Normal', 'DF', 'VGAME', '-'),
(6614, 'SPS6', 'SPS6', 'SPOTIFY', 'Spotify Premium Subscription Voucher - 6 Bulan', 305550, 305500, 305450, 305400, 0, 'Normal', 'DF', 'VGAME', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_sosmed`
--

CREATE TABLE `layanan_sosmed` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `kategori` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `layanan` text COLLATE utf8_swedish_ci NOT NULL,
  `catatan` text COLLATE utf8_swedish_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `harga` double NOT NULL,
  `harga_api` double NOT NULL,
  `harga_premium` bigint(20) NOT NULL,
  `harga_h2h` bigint(20) NOT NULL,
  `profit` double NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8_swedish_ci NOT NULL,
  `provider_id` int(11) NOT NULL,
  `provider` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_depo`
--

CREATE TABLE `metode_depo` (
  `id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `an` text NOT NULL,
  `tipe` enum('BANK','PULSA','E-MONEY') NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `off_at` time NOT NULL,
  `on_at` time NOT NULL,
  `status` enum('off','on') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_guest`
--

CREATE TABLE `metode_guest` (
  `id` int(11) NOT NULL,
  `tipe` enum('Transfer Bank','Virtual Account','Convenience Store','E-Wallet') NOT NULL,
  `metode` varchar(150) NOT NULL,
  `sistem` enum('Manual','Mutasi','Tripay') NOT NULL,
  `kode` varchar(150) NOT NULL,
  `img` varchar(200) NOT NULL,
  `rek` varchar(100) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `sub_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_guest`
--

INSERT INTO `metode_guest` (`id`, `tipe`, `metode`, `sistem`, `kode`, `img`, `rek`, `ket`, `sub_ket`) VALUES
(1, 'Virtual Account', 'BRIVA', 'Tripay', 'BRIVA', '6229a4152b520.png', '', 'BRI Virtual Account', 'Dicek Otomatis'),
(2, 'Virtual Account', 'Mandiri', 'Tripay', 'MANDIRIVA', '6229a9659878f.png', '', 'Mandiri Virtual Account', 'Dicek Otomatis'),
(3, 'Virtual Account', 'BNI', 'Tripay', 'BNIVA', '6229a9922785d.png', '', 'BNI Virtual Account', 'Dicek Otomatis'),
(4, 'Virtual Account', 'Bank Syariah Indonesia', 'Tripay', 'BSIVA', '6229a9c7c336e.png', '', 'BSI Virtual Account', 'Dicek Otomatis'),
(5, 'Virtual Account', 'Maybank', 'Tripay', 'MYBVA', '6229a9e25c032.png', '', 'Maybank Virtual Account', 'Dicek Otomatis'),
(6, 'E-Wallet', 'DANA', 'Mutasi', '', '62f2c6f150e81.png', '6281349844327', 'DANA', 'Dicek Otomatis'),
(7, 'E-Wallet', 'QRIS', 'Tripay', 'QRISC', '62f2c71051e59.png', '', 'QRIS (Dana, OVO, Gopay, LinkAja, BCA Mobile, Maybank, CIMB, UOB, dan lainnya)', 'Dicek Otomatis'),
(8, 'Convenience Store', 'Alfamart', 'Tripay', 'ALFAMART', '6229aa3dd44d7.png', '', 'Alfamart', 'Dicek Otomatis'),
(9, 'Convenience Store', 'Alfamidi', 'Tripay', 'ALFAMIDI', '6229aa51d173d.png', '', 'Alfamidi', 'Dicek Otomatis'),
(10, 'Convenience Store', 'Indomaret', 'Tripay', 'INDOMARET', '6229b12165a95.png', '', 'Indomaret', 'Dicek Otomatis'),
(14, 'E-Wallet', 'SHOPEEPAY', 'Mutasi', '', '62f2c7003caa6.png', '62971260070', 'SHOPEEPAY', 'Dicek Otomatis'),
(13, 'E-Wallet', 'GOPAY', 'Mutasi', '', '62ec5ae823058.png', '621349844327', 'GOPAY', 'Dicek Otomatis Setiap 1 Menit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_dana`
--

CREATE TABLE `mutasi_dana` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `saldo` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutasi_dana`
--

INSERT INTO `mutasi_dana` (`id`, `phone`, `type`, `saldo`, `tanggal`) VALUES
(1, '6285870824804', '+', '24', '2022-08-10 09:09:01'),
(2, '6285870824804', '+', '5', '2022-08-10 10:31:37'),
(3, '6285870824804', '+', '76', '2022-08-10 10:45:11'),
(4, '6285855861707', '+', '47', '2022-08-10 10:55:47'),
(5, '6285855861707', '+', '37', '2022-08-10 11:40:21'),
(6, '6285780824804', '+', '55', '2022-08-10 12:01:14'),
(7, '681515292625', '+', '30', '2022-08-10 12:44:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_gopay`
--

CREATE TABLE `mutasi_gopay` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `saldo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` date NOT NULL,
  `ref_trx` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_ovo`
--

CREATE TABLE `mutasi_ovo` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `akun` varchar(128) NOT NULL,
  `saldo` double NOT NULL,
  `deskripsi` text NOT NULL,
  `an` varchar(128) NOT NULL,
  `date` varchar(80) NOT NULL,
  `status` enum('Unread','Read') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutasi_ovo`
--

INSERT INTO `mutasi_ovo` (`id`, `username`, `kode`, `keterangan`, `akun`, `saldo`, `deskripsi`, `an`, `date`, `status`) VALUES
(32, '', '', ' / ', '', 0, '', '', ' ', 'Unread'),
(33, '800995xxxxxx5001', '-', 'OVO  / 210000-20220715131156-312409-00000CIM-00000middleware', 'Top Up', 11500, 'hotelmurah.com', 'hotelmurah.com', '2022-07-15 13:11:56', 'Unread'),
(31, '800995xxxxxx5001', 'cash', 'Nobu Bank / 210000-20220715131156-312409-00000CIM-00000middleware', 'Top Up Fee', 11500, 'OVO', 'hotelmurah.com', '2022-07-15 13:11:56', 'Unread'),
(30, '800995xxxxxx5001', '-', 'WANN STORE / dzhXHcHNyBguIXhvEqVK2hLUavgKHujBKZ0Y7GHX1b_7JNZ1N59wdst1', 'Pembayaran', 20000, 'WANN STORE', '', '2022-07-23 20:00:21', 'Unread'),
(29, '800995xxxxxx5001', 'others', 'OVO / SPR-13049304105', 'Transfer Masuk', 10000, 'Transfer Dari FERNANDO', 'FERNANDO', '2022-07-28 23:07:36', 'Unread'),
(28, '800995xxxxxx5001', '-', 'WANN STORE / JWNRGsaQmkN_IHg5EqBP3AGkDvGYuDyYBUYqfWM8ZxXXG5McBLM6WBkb', 'Pembayaran', 10000, 'WANN STORE', '', '2022-07-29 14:55:57', 'Unread'),
(27, '800995xxxxxx5001', 'others', 'OVO / SPR-13148398925', 'Transfer Masuk', 17057, 'Transfer Dari REZY STORE', 'REZY STORE', '2022-08-05 18:34:30', 'Unread'),
(26, '800995xxxxxx5001', 'cash', 'Nobu Bank / 210000-20220806203354-880395-00000CIM-00000middleware', 'Top Up Fee', 20469, 'OVO', 'ALTO', '2022-08-06 20:33:54', 'Unread'),
(25, '800995xxxxxx5001', 'others', 'OVO  / 210000-20220806203354-880395-00000CIM-00000middleware', 'Top Up', 20469, 'ALTO', 'ALTO', '2022-08-06 20:33:54', 'Unread'),
(24, '800995xxxxxx5001', 'cash', 'Nobu Bank / 210000-20220806204411-891268-00000CIM-00000middleware', 'Top Up Fee', 30041, 'OVO', 'ALTO', '2022-08-06 20:44:11', 'Unread'),
(23, '800995xxxxxx5001', 'others', 'OVO  / 210000-20220806204411-891268-00000CIM-00000middleware', 'Top Up', 30041, 'ALTO', 'ALTO', '2022-08-06 20:44:11', 'Unread'),
(22, '800995xxxxxx5001', '-', 'WANN STORE / Km4CQpeRmRF_IS1sEvQb34DM7VchhLMtzq5C6KagfRkmyBuXoglp-rIo', 'Pembayaran', 64567, 'WANN STORE', '', '2022-08-06 20:48:23', 'Unread');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_shopeepay`
--

CREATE TABLE `mutasi_shopeepay` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `saldo` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `opt_name` varchar(100) NOT NULL,
  `opt_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `options`
--

INSERT INTO `options` (`id`, `opt_name`, `opt_value`) VALUES
(3, 'icon-web', 'https://game.mypulsaa.com/assets/upload/images/62e785fdcd02c.jpg'),
(4, 'title', 'GEMESH - STORE'),
(5, 'title_web', 'GEMESH - STORE'),
(6, 'author', 'GEMESH - STORE'),
(7, 'keywords', 'Topup game,topup,game,diamond murah,codashop,unipin,mypulsa,topup murah,topup game murah,diamond,diamond game,diamond murah,topup diamond,ff,ml,pubg,cod,aov,freefire,free fire.pubg mobile,mobile legend,mobilelegend,callofduty,call of duty'),
(8, 'description', 'GEMESH - STORE adalah webiste Topup Game dan Entertaiment #1 Di Indonesia yang Tercepat,dan Terpercaya'),
(9, 're_site', ''),
(10, 're_secret', ''),
(11, 'harga_reseller', '100000'),
(12, 'harga_premium', '250000'),
(13, 'harga_h2hspecial', '500000'),
(21, 'df_harga_member', '450'),
(22, 'df_harga_reseller', '400'),
(23, 'df_harga_premium', '350'),
(24, 'df_harga_h2hspecial', '300'),
(37, 'sound_order', 'iphone_notification_so.mp3'),
(38, 'sound_deposit', 'iphone_notification_so.mp3'),
(39, 'games_style', '2'),
(41, 'unread-orders', '0'),
(42, 'unread-users', '0'),
(43, 'unread-deposit', '0'),
(45, 'games_style_guest', '1'),
(46, 'guest_status', ''),
(47, 'smtp_host', 'game.mypulsaa.com'),
(48, 'smtp_port', '465'),
(49, 'smtp_name', 'MYPULSA'),
(50, 'smtp_username', 'cs@game.mypulsaa.com'),
(51, 'smtp_password', 'Qwerty132465'),
(55, 'popup_guest_status', 'On'),
(56, 'popup_guest_link', '/assets/images/6311ae1848f2f.png'),
(57, 'logo_guest', '/assets/images/6311ae184d390.png'),
(60, 'tp-link', 'https://wa.tpulsa.xyz/app/api'),
(61, 'tp-phone', '6281352725651'),
(62, 'tp-key', ''),
(66, 'cekid-link', 'https://api.mypulsaa.com/'),
(67, 'cekid-key', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_guest`
--

CREATE TABLE `pembelian_guest` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `metode_id` varchar(100) NOT NULL,
  `metode` varchar(200) NOT NULL,
  `rek` varchar(150) NOT NULL,
  `games` varchar(100) NOT NULL,
  `layanan_id` varchar(100) NOT NULL,
  `layanan` varchar(150) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `target` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `status` enum('Pending','Success','Canceled','Processing') NOT NULL,
  `sn` varchar(250) NOT NULL,
  `error_msg` varchar(200) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_process` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_guest_smm`
--

CREATE TABLE `pembelian_guest_smm` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `metode_id` varchar(100) NOT NULL,
  `metode` varchar(200) NOT NULL,
  `rek` varchar(150) NOT NULL,
  `games` varchar(100) NOT NULL,
  `layanan_id` varchar(100) NOT NULL,
  `layanan` varchar(150) NOT NULL,
  `target` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `status` enum('Pending','Success','Canceled','Processing','Error','Partial') NOT NULL,
  `provider` varchar(250) NOT NULL,
  `provider_order_id` varchar(100) NOT NULL,
  `error_msg` varchar(200) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_process` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_pulsa`
--

CREATE TABLE `pembelian_pulsa` (
  `id` int(10) NOT NULL,
  `oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `provider_oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `layanan` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `id_service` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `profit` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `target` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `status` enum('Success','Pending','Error') COLLATE utf8_swedish_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_at` datetime NOT NULL,
  `place_from` enum('Website','API') COLLATE utf8_swedish_ci NOT NULL,
  `provider` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `refund` enum('no','ya') COLLATE utf8_swedish_ci NOT NULL,
  `tipe` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_sosmed`
--

CREATE TABLE `pembelian_sosmed` (
  `id` int(11) NOT NULL,
  `oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `provider_oid` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `layanan` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `target` text COLLATE utf8_swedish_ci NOT NULL,
  `note` text COLLATE utf8_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `remains` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `start_count` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `harga` double NOT NULL,
  `profit` double NOT NULL,
  `price_pusat` bigint(20) NOT NULL,
  `status` enum('Pending','Processing','Error','Partial','Success') COLLATE utf8_swedish_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_at` datetime NOT NULL,
  `provider` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `place_from` enum('Website','API') COLLATE utf8_swedish_ci NOT NULL,
  `refund` enum('no','ya') COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `merchant_id` varchar(250) COLLATE utf8_swedish_ci NOT NULL,
  `api_key` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `api_id` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data untuk tabel `provider`
--

INSERT INTO `provider` (`id`, `code`, `link`, `merchant_id`, `api_key`, `api_id`) VALUES
(10, 'DF', 'https://api.digiflazz.com/v1/', '', '4394e6e3-d430-540f-9440-9ac4b1eb1810', 'siwugeoE7j1W'),
(11, 'AG', 'https://v1.apigames.id/', 'M220531NLIL8564TP', '096b17c501fab359aa8362f6d6eab608649aa6875fedc6aea1a9c4547d082fc7', ''),
(12, 'Tripay', 'https://tripay.co.id/api/v2/', 'T15117', '2dJnFjl33p3aRkNNDp6sqxmAm6pY5HRL6iklHRi9', 'u3ziz-wdSni-TEWQV-Ut9V6-wwxf3'),
(13, 'Manual', '', '', '', ''),
(14, 'CekId', 'Jangan Diisi Dahulu Sedang Dalam Perbaikan & Integrasi Ke Provider Cek Id Lain', '', 'diengpedia', ''),
(15, 'TPulsa', 'Kosongkan Dahulu Fix Bug', '#', '#', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qris_depo`
--

CREATE TABLE `qris_depo` (
  `id` int(11) NOT NULL,
  `provider_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `biaya_admin` bigint(20) NOT NULL,
  `saldo_diterima` bigint(20) NOT NULL,
  `qr_images` text COLLATE utf8_unicode_ci NOT NULL,
  `qr_id` text COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reCapcha`
--

CREATE TABLE `reCapcha` (
  `id` int(11) NOT NULL,
  `secret` text COLLATE utf8_unicode_ci NOT NULL,
  `site` text COLLATE utf8_unicode_ci NOT NULL,
  `keyworld` text COLLATE utf8_unicode_ci NOT NULL,
  `grup_wa` text COLLATE utf8_unicode_ci NOT NULL,
  `maintenance` enum('false','true') COLLATE utf8_unicode_ci NOT NULL,
  `reason_mt` text COLLATE utf8_unicode_ci NOT NULL,
  `droot` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `reCapcha`
--

INSERT INTO `reCapcha` (`id`, `secret`, `site`, `keyworld`, `grup_wa`, `maintenance`, `reason_mt`, `droot`) VALUES
(1, '6LeMT5QdAAAAAN4pn30PFgoK01QOTh7tuw2QlFnh', '6LeMT5QdAAAAAAHve_aePaCO7kA_XMZGR--Xjg1S', 'Bisnis Pulsa', '-', 'true', 'Mohon maaf server maintenance.', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `posisi` enum('Login','Guest') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `img`, `posisi`) VALUES
(22, '62aaae77b07e9.jpg', 'Login'),
(30, '6311aeee0eaf0.jpg', 'Guest'),
(29, '6311aee140dea.jpg', 'Guest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `poin` bigint(20) NOT NULL,
  `pemakaian` bigint(20) NOT NULL,
  `pin` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_static` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_status` enum('ON','OFF') COLLATE utf8mb4_unicode_ci NOT NULL,
  `refferal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Member','Reseller','Premium','H2H Special','Admin','Lock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `verif` enum('NO','YES') COLLATE utf8mb4_unicode_ci NOT NULL,
  `uplink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`, `saldo`, `poin`, `pemakaian`, `pin`, `ip_static`, `api_status`, `refferal`, `level`, `status`, `verif`, `uplink`, `api_key`, `cookie_token`, `token`, `register_at`) VALUES
(232, 'admin', 'admin@gmail.com', '6289999', 'admin', '$2y$10$2aB9RXJl0nqXGqDiAMUxQurhLXSLTWnYuKOfpyVJwtMcuGmEE5.BS', 0, 0, 0, '0', '', 'OFF', 'DEFAULT', 'Admin', 'active', 'YES', 'DYNMSHP', 'kGs4ZXN7g3nW5MU8HrbviayJ9pCmle', '499ed3dba7c82a5783a1708c790c8a7a', '905755d3f2d12576fc4b0bf6ff225a47', '2020-09-18 16:32:35'),
(243, 'admin', 'admin@gmail.com', '6289999', 'Selynch', '$2y$10$2aB9RXJl0nqXGqDiAMUxQurhLXSLTWnYuKOfpyVJwtMcuGmEE5.BS', 0, 0, 0, '0', '', 'OFF', 'DEFAULT', 'Admin', 'active', 'YES', 'DYNMSHP', 'kGs4ZXN7g3nW5MU8HrbviayJ9pCmle', 'ffddf5fa19fd6d6792de13401a8ce155', 'd8eff246c2b724f9be8dc6994241ba7d', '2020-09-18 16:32:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chookie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `username`, `title`, `message`, `chookie`, `city`, `latitude`, `longitude`, `created_at`) VALUES
(1, 'admin', 'Melakukan Login', '2001:448a:50e0:e1b:d0fc:f301:2326:5f0f', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', ' ID', '', '', '2022-09-02 14:51:31'),
(2, 'admin', 'Melakukan Login', '2001:448a:50e0:e1b:d0fc:f301:2326:5f0f', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', ' ID', '', '', '2022-09-02 15:19:18'),
(3, 'admin', 'Melakukan Login', '2001:448a:50e0:e1b:d0fc:f301:2326:5f0f', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', ' ID', '', '', '2022-09-02 15:31:10'),
(4, 'admin', 'Melakukan Login', '2001:448a:50e0:c0da:d0fc:f301:2326:5f0f', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', ' ID', '', '', '2022-09-02 15:52:33'),
(5, 'admin', 'Melakukan Login', '2001:448a:50e0:c0da:d0fc:f301:2326:5f0f', 'Mozilla/5.0 (Linux; Android 11; CPH2159) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Mobile Safari/537.36', ' ID', '', '', '2022-09-02 20:47:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validation_bank`
--

CREATE TABLE `validation_bank` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `code` varchar(500) NOT NULL,
  `account_number` text NOT NULL,
  `account_name` text NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `status` enum('Cancel','Waiting','Success') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher_deposit`
--

CREATE TABLE `voucher_deposit` (
  `id` int(11) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `saldo` varchar(250) NOT NULL,
  `status` enum('belom diredeem','sudah diredeem') NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun_emoney`
--
ALTER TABLE `akun_emoney`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_mutasi`
--
ALTER TABLE `bank_mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dt_verif`
--
ALTER TABLE `dt_verif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `games_guest`
--
ALTER TABLE `games_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `games_kategori`
--
ALTER TABLE `games_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `games_kategori_guest`
--
ALTER TABLE `games_kategori_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guest_kategori_smm`
--
ALTER TABLE `guest_kategori_smm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guest_produk_smm`
--
ALTER TABLE `guest_produk_smm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guest_smm`
--
ALTER TABLE `guest_smm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga_guest`
--
ALTER TABLE `harga_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_saldo`
--
ALTER TABLE `history_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_transfer`
--
ALTER TABLE `history_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuntungan`
--
ALTER TABLE `keuntungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan_pulsa`
--
ALTER TABLE `layanan_pulsa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan_sosmed`
--
ALTER TABLE `layanan_sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode_depo`
--
ALTER TABLE `metode_depo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode_guest`
--
ALTER TABLE `metode_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi_dana`
--
ALTER TABLE `mutasi_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi_gopay`
--
ALTER TABLE `mutasi_gopay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi_ovo`
--
ALTER TABLE `mutasi_ovo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi_shopeepay`
--
ALTER TABLE `mutasi_shopeepay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_guest`
--
ALTER TABLE `pembelian_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_guest_smm`
--
ALTER TABLE `pembelian_guest_smm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_pulsa`
--
ALTER TABLE `pembelian_pulsa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_sosmed`
--
ALTER TABLE `pembelian_sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `qris_depo`
--
ALTER TABLE `qris_depo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reCapcha`
--
ALTER TABLE `reCapcha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `validation_bank`
--
ALTER TABLE `validation_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voucher_deposit`
--
ALTER TABLE `voucher_deposit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT untuk tabel `akun_emoney`
--
ALTER TABLE `akun_emoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bank_mutasi`
--
ALTER TABLE `bank_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `dt_verif`
--
ALTER TABLE `dt_verif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT untuk tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `games_guest`
--
ALTER TABLE `games_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `games_kategori`
--
ALTER TABLE `games_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `games_kategori_guest`
--
ALTER TABLE `games_kategori_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `guest_kategori_smm`
--
ALTER TABLE `guest_kategori_smm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `guest_produk_smm`
--
ALTER TABLE `guest_produk_smm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `guest_smm`
--
ALTER TABLE `guest_smm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `harga_guest`
--
ALTER TABLE `harga_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=899;

--
-- AUTO_INCREMENT untuk tabel `history_saldo`
--
ALTER TABLE `history_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT untuk tabel `history_transfer`
--
ALTER TABLE `history_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000;

--
-- AUTO_INCREMENT untuk tabel `keuntungan`
--
ALTER TABLE `keuntungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `layanan_pulsa`
--
ALTER TABLE `layanan_pulsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6615;

--
-- AUTO_INCREMENT untuk tabel `layanan_sosmed`
--
ALTER TABLE `layanan_sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4352;

--
-- AUTO_INCREMENT untuk tabel `metode_depo`
--
ALTER TABLE `metode_depo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `metode_guest`
--
ALTER TABLE `metode_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `mutasi_dana`
--
ALTER TABLE `mutasi_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mutasi_gopay`
--
ALTER TABLE `mutasi_gopay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mutasi_ovo`
--
ALTER TABLE `mutasi_ovo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `mutasi_shopeepay`
--
ALTER TABLE `mutasi_shopeepay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `pembelian_guest`
--
ALTER TABLE `pembelian_guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_guest_smm`
--
ALTER TABLE `pembelian_guest_smm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian_pulsa`
--
ALTER TABLE `pembelian_pulsa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT untuk tabel `pembelian_sosmed`
--
ALTER TABLE `pembelian_sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `qris_depo`
--
ALTER TABLE `qris_depo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reCapcha`
--
ALTER TABLE `reCapcha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT untuk tabel `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `validation_bank`
--
ALTER TABLE `validation_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `voucher_deposit`
--
ALTER TABLE `voucher_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
