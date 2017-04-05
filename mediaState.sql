-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2017 at 09:12 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediaState`
--

-- --------------------------------------------------------

--
-- Table structure for table `browser_thumbnails`
--

CREATE TABLE `browser_thumbnails` (
  `id` int(10) NOT NULL,
  `directory` varchar(999) NOT NULL,
  `vedio_name` varchar(999) NOT NULL,
  `thumbnail` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `browser_thumbnails`
--

INSERT INTO `browser_thumbnails` (`id`, `directory`, `vedio_name`, `thumbnail`) VALUES
(44, 'external/Step Up 3D (2010)/', 'Step Up 3D.2010.720p.BrRip.x264.YIFY.mp4', '229773171.jpg'),
(45, 'external/The Hangover Part III (2013)/', 'The.Hangover.Part.III.2013.720p.BluRay.x264.YIFY.mp4', '1326029385.jpg'),
(46, 'external/Westworld/season 2/episode1/', '9anime.to  One Piece (Dub) - 422 - 720p.mp4', '451970458.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `eid` int(9) NOT NULL,
  `id` int(9) NOT NULL,
  `episode_location` varchar(999) NOT NULL,
  `episode_pic` varchar(999) NOT NULL,
  `season` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`eid`, `id`, `episode_location`, `episode_pic`, `season`) VALUES
(1, 0, '/mediaRIP/uploads/[BigTitsAtWork].Lennox.Luxe.(The.Whole.Package.-.26.10.2016).rq.(1k).mp4', '/mediaRIP/uploads/thumbnails/634538056.jpg', '1'),
(2, 0, '/mediaRIP/uploads/[BigWetButts].Summer.Brielle.(Bubble.Butt.Jeans.-.21.10.2016).rq.(1k).mp4', '/mediaRIP/uploads/thumbnails/569637669.jpg', '1'),
(3, 0, '/mediaRIP/uploads/btas_katie_morgan_vl090716_480p_1000.mp4', '/mediaRIP/uploads/thumbnails/520524775.jpg', '1'),
(4, 0, '/mediaRIP/uploads/videoplayback360', '/mediaRIP/uploads/thumbnails/269648357.jpg', '1'),
(5, 0, '/mediaRIP/uploads/videoplayback361', '/mediaRIP/uploads/thumbnails/1726213491.jpg', '1'),
(6, 0, '/mediaRIP/uploads/dm_kagney_linn_karter_vl012916_480p_1000.mp4', '/mediaRIP/uploads/thumbnails/512509323.jpg', '1'),
(7, 0, '/mediaRIP/uploads/MilfsLikeItBig.-.Raylene.(The.Punisher.Whore.Zone).May.20,.2011.mp4', '/mediaRIP/uploads/thumbnails/1147885351.jpg', '1'),
(8, 0, '/mediaRIP/uploads/', '/mediaRIP/uploads/thumbnails/319996383.jpg', '1'),
(20, 6, '/mediaRIP/uploads/[BigTitsAtWork].Isis.Love.(Spilling.The.Boobs.-.02.11.2016).rq.(1k).mp4', '/mediaRIP/uploads/thumbnails/1744997180.jpg', '1'),
(21, 6, '/mediaRIP/uploads/btis_kendra_lust_480p.mp4', '/mediaRIP/uploads/thumbnails/53285184.jpg', '1'),
(43, 26, '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 422 - 720p.mp4', '/mediaRIP/uploads/thumbnails/771538538.jpg', '1'),
(45, 26, '/external/Westworld/season 2/episode 2/9anime.to  One Piece (Dub) - 432 - 720p.mp4', '/mediaRIP/uploads/thumbnails/480373122.jpg', '2'),
(46, 26, '/external/Westworld/season 2/episode1/9anime.to  One Piece (Dub) - 422 - 720p.mp4', '/mediaRIP/uploads/thumbnails/822922753.jpg', '2'),
(47, 30, '/mediaRIP/uploads/PS4.-.Tekken.7.Trailer.(E3.2016)_HD.mp4', '/mediaRIP/uploads/thumbnails/1849842341.jpg', '1'),
(48, 31, '/mediaRIP/uploads/PS4.-.Tekken.7.Trailer.(E3.2016)_HD.mp4', '/mediaRIP/uploads/thumbnails/1525921412.jpg', '2'),
(49, 31, '/mediaRIP/uploads/PS4.-.Tekken.7.Trailer.(E3.2016)_HD.mp4', '/mediaRIP/uploads/thumbnails/811355302.jpg', '3'),
(50, 32, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.459.-.720p.mp4', '/mediaRIP/uploads/thumbnails/2106659335.jpg', '1'),
(51, 32, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.460.-.720p.mp4', '/mediaRIP/uploads/thumbnails/1970815343.jpg', '1'),
(52, 33, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.469.-.720p.mp4', '/mediaRIP/uploads/thumbnails/1988928220.jpg', '2'),
(53, 34, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.468.-.720p.mp4', '/mediaRIP/uploads/thumbnails/1649232883.jpg', '1'),
(54, 34, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.469.-.720p.mp4', '/mediaRIP/uploads/thumbnails/2145591820.jpg', '1'),
(55, 34, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.470.-.720p.mp4', '/mediaRIP/uploads/thumbnails/1744294857.jpg', '1'),
(56, 34, '/mediaRIP/uploads/videoplayback-{d83e8785-ffd3-437c-ae82-d24a380b4b60}.dtapart', '/mediaRIP/uploads/thumbnails/173394794.jpg', '2'),
(57, 34, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.469.-.720p.mp4', '/mediaRIP/uploads/thumbnails/1044684814.jpg', '3'),
(58, 34, '/mediaRIP/uploads/[9anime.to].One.Piece.(Dub).-.470.-.720p.mp4', '/mediaRIP/uploads/thumbnails/1836252736.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `media_category_id` int(1) NOT NULL,
  `media_image` varchar(999) NOT NULL,
  `media_location` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_title`, `media_category_id`, `media_image`, `media_location`) VALUES
(5, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1861959174.jpg', '/external/Untitled%20Folder/Untitled%20Folder/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(6, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/211390218.jpg', '/external/Untitled%20Folder/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(7, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/182889827.jpg', '/external/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(8, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/595634136.jpg', '/external/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20139%20-%20720p.mp4'),
(9, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/735907320.jpg', '/external/Untitled%20Folder/Untitled%20Folder/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(10, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1414297332.jpg', '/external/Untitled%20Folder/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(11, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/213651484.jpg', '/external/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(12, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1989029770.jpg', '/external/Untitled%20Folder/[9anime.to]%20One%20Piece%20(Dub)%20-%20139%20-%20720p.mp4'),
(13, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1844981516.jpg', '/external/Untitled$%20Folder%202/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(14, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1490692463.jpg', '/external/Untitled$%20Folder%202/[9anime.to]%20One%20Piece%20(Dub)%20-%20139%20-%20720p.mp4'),
(15, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1749646621.jpg', '/external/Untitled&Folder%202/[9anime.to]%20One%20Piece%20(Dub)%20-%20138%20-%20720p.mp4'),
(16, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1660422829.jpg', '/external/Untitled&Folder%202/[9anime.to]%20One%20Piece%20(Dub)%20-%20139%20-%20720p.mp4'),
(17, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1286807821.jpg', '/external/Untitled\'Folder 2/Untitled Folder/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(18, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/2069107072.jpg', '/external/Untitled\'Folder 2/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(19, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1519437969.jpg', '/external/Untitled\'Folder 2/[9anime.to] One Piece (Dub) - 139 - 720p.mp4'),
(20, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/713389869.jpg', '/external/Untitled&Folder 2/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(21, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/791491864.jpg', '/external/Untitled&Folder 2/[9anime.to] One Piece (Dub) - 139 - 720p.mp4'),
(22, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/617430646.jpg', '/external/Untitled$ Folder 2/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(23, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/637485883.jpg', '/external/Untitled$ Folder 2/[9anime.to] One Piece (Dub) - 139 - 720p.mp4'),
(24, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/249754235.jpg', '/external1/Untitled Folder/Untitled Folder/Untitled Folder/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(26, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1021740251.jpg', '/external1/Untitled Folder/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(27, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1190969451.jpg', '/external1/Untitled Folder/[9anime.to] One Piece (Dub) - 139 - 720p.mp4'),
(28, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/2126665679.jpg', '/external/Untitled Folder/Untitled Folder/Untitled Folder/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(29, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1363424727.jpg', '/external/Untitled Folder/Untitled Folder/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(46, 'Screenshot from 2016-12-26 14-31-08.png', 4, 'NULL', '/external/Screenshot from 2016-12-26 14-31-08.png'),
(47, 'Screenshot from 2016-12-28 16-35-55.png', 4, 'NULL', '/external/Screenshot from 2016-12-28 16-35-55.png'),
(48, 'Screenshot from 2016-12-30 19-31-21.png', 4, 'NULL', '/external/Screenshot from 2016-12-30 19-31-21.png'),
(49, 'Screenshot from 2016-12-31 14-58-25.png', 4, 'NULL', '/external/Screenshot from 2016-12-31 14-58-25.png'),
(50, 'Screenshot from 2017-01-13 15-58-45.png', 4, 'NULL', '/external/Screenshot from 2017-01-13 15-58-45.png'),
(52, 'Can\'t Say No.jpg', 4, 'NULL', '/external/Untitled Folder/Untitled Folder/Untitled Folder/Can\'t Say No.jpg'),
(53, 'Can\'t Say No.jpg', 4, 'NULL', '/external/Untitled Folder/Untitled Folder/Untitled Folder/Can\'t Say No.jpg'),
(54, '[9anime.to] One Piece (Dub) - 138 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/129790763.jpg', '/external/Untitled$ Folder 2/[9anime.to] One Piece (Dub) - 138 - 720p.mp4'),
(55, '[9anime.to] One Piece (Dub) - 139 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1352901119.jpg', '/external/Untitled$ Folder 2/[9anime.to] One Piece (Dub) - 139 - 720p.mp4'),
(56, 'green-bird.png', 4, 'NULL', '/external/green-bird.png'),
(58, '[9anime.to] One Piece (Dub) - 286 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1183783426.jpg', '/external/[9anime.to] One Piece (Dub) - 286 - 720p.mp4'),
(66, 'Bad Teacher', 1, '/mediaRIP/uploads/posters/Bad Teacher.jpg', '/external/Bad Teacher (2011)/Bad.teacher.2011.720p.BrRip.x264.YIFY.mp4'),
(67, 'Three Kings', 1, '/mediaRIP/uploads/posters/Three Kings.jpg', '/external/Three Kings (1990)/Three.Kings.1999.720p.BrRip.x264.YIFY.mkv'),
(86, 'green-bird.png', 4, 'NULL', '/external1/Untitled Folder/green-bird.png'),
(90, 'green-bird.png', 4, 'NULL', '/external1/Untitled Folder/green-bird.png'),
(95, 'Westworld.S01E03.PROPER.HDTV.x264-KILLERS[ettv].mkv', 5, '/mediaRIP/uploads/thumbnails/2062244501.jpg', '/external1/Westworld/Season 1/Westworld.S01E03.PROPER.HDTV.x264-KILLERS[ettv]/Westworld.S01E03.PROPER.HDTV.x264-KILLERS[ettv].mkv'),
(96, 'Westworld.S01E04.WEBRip.x264-FUM[ettv].mp4', 5, '/mediaRIP/uploads/thumbnails/1444636839.jpg', '/external1/Westworld/Season 1/Westworld.S01E04.WEBRip.x264-FUM[ettv]/Westworld.S01E04.WEBRip.x264-FUM[ettv].mp4'),
(97, 'Westworld.S01E05.HDTV.x264-KILLERS[ettv].mkv', 5, '/mediaRIP/uploads/thumbnails/112893730.jpg', '/external1/Westworld/Season 1/Westworld.S02E05.HDTV.x264-KILLERS[ettv]/Westworld.S01E05.HDTV.x264-KILLERS[ettv].mkv'),
(99, 'df ds fksfn skfskf ksfsdf ksd fkds fksf d 286 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1392135712.jpg', '/external1/df ds fksfn skfskf ksfsdf ksd fkds fksf d 286 - 720p.mp4'),
(100, 'episode.5.mkv', 5, '/mediaRIP/uploads/thumbnails/635332125.jpg', '/external1/legends of tomorrow/season 1/DCs.Legends.of.Tomorrow.S02E05.HDTV.x264-LOL[ettv]/episode.5.mkv'),
(122, 'episode.5.mkv', 5, '/mediaRIP/uploads/thumbnails/1014249397.jpg', '/external/legends of tomorrow/season 12/DCs.Legends.of.Tomorrow.S02E05.HDTV.x264-LOL[ettv]/episode.5.mkv'),
(124, 'episode 8.mkv', 5, '/mediaRIP/uploads/thumbnails/1575967413.jpg', '/external/legends of tomorrow/season 12/DCs.Legends.of.Tomorrow.S02E08.HDTV.x264-LOL[ettv]/episode 8.mkv'),
(175, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/727225380.jpg', '/external/Untitled_Folder/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(176, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1927132194.jpg', '/external/Untitled_Folder/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(177, 'myVideo2.mp4', 5, '/mediaRIP/uploads/thumbnails/1838823675.jpg', '/external/Untitled Folder 2/mediaRIP/raw/video_stuff/myVideo2.mp4'),
(178, 'myVideo2.mp4', 5, '/mediaRIP/uploads/thumbnails/1745332664.jpg', '/external/Untitled Folder 2/mediaRIP0.3/mediaRIP/raw/video_stuff/myVideo2.mp4'),
(179, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/636712486.jpg', '/external/Untitled_Folder/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(180, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/704002457.jpg', '/external/Untitled_Folder/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(181, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/166586716.jpg', '/external/Westworld/season 2/episode 2/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(182, 'myVideo2.mp4', 5, '/mediaRIP/uploads/thumbnails/1683035113.jpg', '/external/Untitled Folder 2/mediaRIP/raw/video_stuff/myVideo2.mp4'),
(183, 'myVideo2.mp4', 5, '/mediaRIP/uploads/thumbnails/2081008564.jpg', '/external/Untitled Folder 2/mediaRIP0.3/mediaRIP/raw/video_stuff/myVideo2.mp4'),
(184, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/793653093.jpg', '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(185, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1118713938.jpg', '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(186, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/907258178.jpg', '/external/Westworld/season 2/episode 2/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(187, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/837346304.jpg', '/external/Westworld/season 2/episode1/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(188, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/154885399.jpg', '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(189, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/2095355010.jpg', '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(190, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1963186007.jpg', '/external/Westworld/season 2/episode 2/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(191, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1303352804.jpg', '/external/Westworld/season 2/episode1/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(192, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1861384003.jpg', '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(193, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1753414104.jpg', '/external/Westworld/season 1/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(194, '9anime.to  One Piece (Dub) - 432 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1448082181.jpg', '/external/Westworld/season 2/episode 2/9anime.to  One Piece (Dub) - 432 - 720p.mp4'),
(195, '9anime.to  One Piece (Dub) - 422 - 720p.mp4', 5, '/mediaRIP/uploads/thumbnails/1797427726.jpg', '/external/Westworld/season 2/episode1/9anime.to  One Piece (Dub) - 422 - 720p.mp4'),
(196, 'The Hangover Part III', 1, '/mediaRIP/uploads/posters/The Hangover Part III.jpg', '/external/The Hangover Part III (2013)/The.Hangover.Part.III.2013.720p.BluRay.x264.YIFY.mp4'),
(197, 'The Hangover Part III', 1, '/mediaRIP/uploads/posters/The Hangover Part III.jpg', '/external/The Hangover Part III (2013)/The.Hangover.Part.III.2013.720p.BluRay.x264.YIFY.mp4'),
(198, 'Step Up 3D', 1, '/mediaRIP/uploads/posters/Step Up 3D.jpg', '/external/Step Up 3D (2010)/Step Up 3D.2010.720p.BrRip.x264.YIFY.mp4'),
(199, 'Step Up 3D', 1, '/mediaRIP/uploads/posters/Step Up 3D.jpg', '/external/Step Up 3D (2010)/Step Up 3D.2010.720p.BrRip.x264.YIFY.mp4'),
(200, 'The Hangover Part III', 1, '/mediaRIP/uploads/posters/The Hangover Part III.jpg', '/external/The Hangover Part III (2013)/The.Hangover.Part.III.2013.720p.BluRay.x264.YIFY.mp4'),
(202, 'Screen shot', 4, 'NULL', '/mediaRIP/uploads/708773393.png'),
(203, 'xXx', 1, '/mediaRIP/uploads/posters/xXx.jpg', '/mediaRIP/uploads/1790171731.mp4'),
(204, 'Taken', 5, '/mediaRIP/uploads/thumbnails/602103337.jpg', '/mediaRIP/uploads/602103337.mp4'),
(205, 'Tarzan', 1, '/mediaRIP/uploads/posters/Tarzan.jpg', '/mediaRIP/uploads/1615449205.mp4'),
(206, 'xXx', 1, '/mediaRIP/uploads/posters/xXx.jpg', '/mediaRIP/uploads/2135271462.mp4'),
(207, 'Bad Teacher', 1, '/mediaRIP/uploads/posters/Bad Teacher.jpg', '/mediaRIP/uploads/384747347.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(999) NOT NULL,
  `year` varchar(999) NOT NULL,
  `rated` varchar(999) NOT NULL,
  `released` varchar(999) NOT NULL,
  `runtime` varchar(999) NOT NULL,
  `genre` varchar(999) NOT NULL,
  `director` varchar(999) NOT NULL,
  `writer` varchar(999) NOT NULL,
  `actor` varchar(999) NOT NULL,
  `plot` varchar(999) NOT NULL,
  `language` varchar(999) NOT NULL,
  `country` varchar(999) NOT NULL,
  `awards` varchar(999) NOT NULL,
  `poster` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `year`, `rated`, `released`, `runtime`, `genre`, `director`, `writer`, `actor`, `plot`, `language`, `country`, `awards`, `poster`) VALUES
(59, 'Bad Teacher', '2011', 'R', '24 Jun 2011', '92 min', 'Comedy', 'Jake Kasdan', 'Gene Stupnitsky, Lee Eisenberg', '', 'A lazy, incompetent middle school teacher who hates her job, her students, and her co-workers is forced to return to teaching to make enough money for breast implants after her wealthy fiancÃ© dumps her.', 'English', 'USA', '6 wins & 3 nominations.', '/mediaRIP/uploads/posters/Bad Teacher.jpg'),
(60, 'Three Kings', '1999', 'R', '01 Oct 1999', '114 min', 'Action, Adventure, Comedy', 'David O. Russell', 'John Ridley (story), David O. Russell (screenplay)', '', 'In the aftermath of the Persian Gulf War, 4 soldiers set out to steal gold that was stolen from Kuwait, but they discover people who desperately need their help.', 'English, Arabic', 'USA', '8 wins & 19 nominations.', '/mediaRIP/uploads/posters/Three Kings.jpg'),
(61, 'Westworld', '2016â€“', 'TV-MA', '02 Oct 2016', '60 min', 'Drama, Mystery, Sci-Fi', 'N/A', 'N/A', 'Thandie Newton, James Marsden, Jeffrey Wright, Ed Harris', 'A Western-themed futuristic theme park, populated with artificial intelligence, allows high-paying guests to live out their fantasies with no consequences or retaliation from the android hosts, until now.', 'English', 'USA', 'Nominated for 3 Golden Globes. Another 5 wins & 25 nominations.', '/mediaRIP/uploads/posters/Westworld.jpg'),
(62, 'Westworld', '2016â€“', 'TV-MA', '02 Oct 2016', '60 min', 'Drama, Mystery, Sci-Fi', 'N/A', 'N/A', 'Thandie Newton, James Marsden, Jeffrey Wright, Ed Harris', 'A Western-themed futuristic theme park, populated with artificial intelligence, allows high-paying guests to live out their fantasies with no consequences or retaliation from the android hosts, until now.', 'English', 'USA', 'Nominated for 3 Golden Globes. Another 5 wins & 25 nominations.', '/mediaRIP/uploads/posters/Westworld.jpg'),
(63, 'Westworld', '2016â€“', 'TV-MA', '02 Oct 2016', '60 min', 'Drama, Mystery, Sci-Fi', 'N/A', 'N/A', 'Thandie Newton, James Marsden, Jeffrey Wright, Ed Harris', 'A Western-themed futuristic theme park, populated with artificial intelligence, allows high-paying guests to live out their fantasies with no consequences or retaliation from the android hosts, until now.', 'English', 'USA', 'Nominated for 3 Golden Globes. Another 5 wins & 25 nominations.', '/mediaRIP/uploads/posters/Westworld.jpg'),
(64, 'Westworld', '2016â€“', 'TV-MA', '02 Oct 2016', '60 min', 'Drama, Mystery, Sci-Fi', 'N/A', 'N/A', 'Thandie Newton, James Marsden, Jeffrey Wright, Ed Harris', 'A Western-themed futuristic theme park, populated with artificial intelligence, allows high-paying guests to live out their fantasies with no consequences or retaliation from the android hosts, until now.', 'English', 'USA', 'Nominated for 3 Golden Globes. Another 5 wins & 25 nominations.', '/mediaRIP/uploads/posters/Westworld.jpg'),
(65, 'Westworld', '2016â€“', 'TV-MA', '02 Oct 2016', '60 min', 'Drama, Mystery, Sci-Fi', 'N/A', 'N/A', 'Thandie Newton, James Marsden, Jeffrey Wright, Ed Harris', 'A Western-themed futuristic theme park, populated with artificial intelligence, allows high-paying guests to live out their fantasies with no consequences or retaliation from the android hosts, until now.', 'English', 'USA', 'Nominated for 3 Golden Globes. Another 5 wins & 25 nominations.', '/mediaRIP/uploads/posters/Westworld.jpg'),
(66, 'Bad Teacher', '2011', 'R', '24 Jun 2011', '92 min', 'Comedy', 'Jake Kasdan', 'Gene Stupnitsky, Lee Eisenberg', 'Cameron Diaz, Lucy Punch, Jason Segel, Justin Timberlake', 'A lazy, incompetent middle school teacher who hates her job, her students, and her co-workers is forced to return to teaching to make enough money for breast implants after her wealthy fiancÃ© dumps her.', 'English', 'USA', '6 wins & 3 nominations.', '/mediaRIP/uploads/posters/Bad Teacher.jpg'),
(67, 'Three Kings', '1999', 'R', '01 Oct 1999', '114 min', 'Action, Adventure, Comedy', 'David O. Russell', 'John Ridley (story), David O. Russell (screenplay)', 'George Clooney, Mark Wahlberg, Ice Cube, Spike Jonze', 'In the aftermath of the Persian Gulf War, 4 soldiers set out to steal gold that was stolen from Kuwait, but they discover people who desperately need their help.', 'English, Arabic', 'USA', '8 wins & 19 nominations.', '/mediaRIP/uploads/posters/Three Kings.jpg'),
(196, 'The Hangover Part III', '2013', 'R', '23 May 2013', '100 min', 'Comedy, Crime', 'Todd Phillips', 'Todd Phillips, Craig Mazin, Jon Lucas (characters), Scott Moore (characters)', 'Bradley Cooper, Ed Helms, Zach Galifianakis, Justin Bartha', 'When one of their own is kidnapped by an angry gangster, the Wolf Pack must track down Mr. Chow, who has escaped from prison and is on the lam.', 'English, Spanish', 'USA', '2 wins & 6 nominations.', '/mediaRIP/uploads/posters/The Hangover Part III.jpg'),
(197, 'The Hangover Part III', '2013', 'R', '23 May 2013', '100 min', 'Comedy, Crime', 'Todd Phillips', 'Todd Phillips, Craig Mazin, Jon Lucas (characters), Scott Moore (characters)', 'Bradley Cooper, Ed Helms, Zach Galifianakis, Justin Bartha', 'When one of their own is kidnapped by an angry gangster, the Wolf Pack must track down Mr. Chow, who has escaped from prison and is on the lam.', 'English, Spanish', 'USA', '2 wins & 6 nominations.', '/mediaRIP/uploads/posters/The Hangover Part III.jpg'),
(199, 'Step Up 3D', '2010', 'PG-13', '06 Aug 2010', '107 min', 'Drama, Music, Romance', 'Jon M. Chu', 'Amy Andelson, Emily Meyer, Duane Adler (characters)', 'Rick Malambri, Adam G. Sevani, Sharni Vinson, Alyson Stoner', 'A tight-knit group of New York City street dancers find themselves pitted against the world\'s best hip hop dancers in a high-stakes showdown.', 'English', 'USA', '1 nomination.', '/mediaRIP/uploads/posters/Step Up 3D.jpg'),
(200, 'The Hangover Part III', '2013', 'R', '23 May 2013', '100 min', 'Comedy, Crime', 'Todd Phillips', 'Todd Phillips, Craig Mazin, Jon Lucas (characters), Scott Moore (characters)', 'Bradley Cooper, Ed Helms, Zach Galifianakis, Justin Bartha', 'When one of their own is kidnapped by an angry gangster, the Wolf Pack must track down Mr. Chow, who has escaped from prison and is on the lam.', 'English, Spanish', 'USA', '2 wins & 6 nominations.', '/mediaRIP/uploads/posters/The Hangover Part III.jpg'),
(203, 'xXx', '2002', 'PG-13', '09 Aug 2002', '124 min', 'Action, Adventure, Thriller', 'Rob Cohen', 'Rich Wilkes', 'Vin Diesel, Asia Argento, Marton Csokas, Samuel L. Jackson', 'An extreme sports athlete, Xander Cage, is recruited by the government on a special mission.', 'English, German, Spanish, Russian, Czech', 'USA', '4 wins & 13 nominations.', '/mediaRIP/uploads/posters/xXx.jpg'),
(205, 'Tarzan', '1999', 'G', '18 Jun 1999', '88 min', 'Animation, Adventure, Family', 'Chris Buck, Kevin Lima', 'Tab Murphy (screenplay), Bob Tzudiker (screenplay), Noni White (screenplay), Stephen J. Anderson (story), Mark Kennedy (story), Carole Holliday (story), GaÃ«tan Brizzi (story), Paul Brizzi (story), Don Dougherty (story), Ed Gombert (story), Randy Haycock (story), Don Hall (story), Kevin Harkey (story), Glen Keane (story), Burny Mattinson (story), Frank Nissen (story), John Norton (story), Jeff Snow (story), Michael Surrey (story), Chris Ure (story), Mark Walton (story), Stevie Wermers (story), Kelly Wightman (story), John Ramirez (story), Edgar Rice Burroughs (story \\', 'Brian Blessed, Glenn Close, Minnie Driver, Tony Goldwyn', 'A man raised by gorillas must decide where he really belongs when he discovers he is a human.', 'English', 'USA', 'Won 1 Oscar. Another 11 wins & 25 nominations.', '/mediaRIP/uploads/posters/Tarzan.jpg'),
(206, 'xXx', '2002', 'PG-13', '09 Aug 2002', '124 min', 'Action, Adventure, Thriller', 'Rob Cohen', 'Rich Wilkes', 'Vin Diesel, Asia Argento, Marton Csokas, Samuel L. Jackson', 'An extreme sports athlete, Xander Cage, is recruited by the government on a special mission.', 'English, German, Spanish, Russian, Czech', 'USA', '4 wins & 13 nominations.', '/mediaRIP/uploads/posters/xXx.jpg'),
(207, 'Bad Teacher', '2011', 'R', '24 Jun 2011', '92 min', 'Comedy', 'Jake Kasdan', 'Gene Stupnitsky, Lee Eisenberg', 'Cameron Diaz, Lucy Punch, Jason Segel, Justin Timberlake', 'A lazy, incompetent middle school teacher who hates her job, her students, and her co-workers is forced to return to teaching to make enough money for breast implants after her wealthy fiancÃ© dumps her.', 'English', 'USA', '6 wins & 3 nominations.', '/mediaRIP/uploads/posters/Bad Teacher.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(5) NOT NULL,
  `track_name` varchar(999) NOT NULL,
  `singer` varchar(999) NOT NULL,
  `country` varchar(999) NOT NULL,
  `rating` varchar(999) NOT NULL,
  `genre` varchar(999) NOT NULL,
  `album_art` varchar(999) NOT NULL,
  `music_location` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `track_name`, `singer`, `country`, `rating`, `genre`, `album_art`, `music_location`) VALUES
(27, 'Neighbors.mp3', 'J. Cole', '', '', '', '/mediaRIP/uploads/posters/Neighbors.mp3.jpg', '/external/Neighbors.mp3'),
(28, 'Neighbors.mp3', 'J. Cole', '', '', '', '/mediaRIP/uploads/posters/Neighbors.mp3.jpg', '/external/Neighbors.mp3'),
(29, 'Neighbors.mp3', 'J. Cole', '', '', '', '/mediaRIP/uploads/posters/Neighbors.mp3.jpg', '/external1/Neighbors.mp3'),
(32, 'Snakehips_Ft_Zayn_Malik-Cruel.mp3', 'Snakehips Ft. Zayn Malik', '', '', '', '/mediaRIP/uploads/posters/Snakehips_Ft_Zayn_Malik-Cruel.mp3.jpg', '/external1/Snakehips_Ft_Zayn_Malik-Cruel.mp3'),
(33, 'Stitches - Shawn Mendez.mp3', 'Shawn Mendez', '', '', '', '/mediaRIP/uploads/posters/Stitches - Shawn Mendez.mp3.jpg', '/external1/Stitches - Shawn Mendez.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `tvSeries`
--

CREATE TABLE `tvSeries` (
  `uniqueId` int(9) NOT NULL,
  `title` varchar(999) NOT NULL,
  `poster` varchar(999) NOT NULL,
  `year` varchar(999) NOT NULL,
  `rated` varchar(999) NOT NULL,
  `released` varchar(999) NOT NULL,
  `runtime` varchar(999) NOT NULL,
  `genre` varchar(999) NOT NULL,
  `director` varchar(999) NOT NULL,
  `writer` varchar(999) NOT NULL,
  `actor` varchar(999) NOT NULL,
  `plot` varchar(999) NOT NULL,
  `language` varchar(999) NOT NULL,
  `country` varchar(999) NOT NULL,
  `awards` varchar(999) NOT NULL,
  `totalseason` varchar(999) NOT NULL,
  `media_location` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tvSeries`
--

INSERT INTO `tvSeries` (`uniqueId`, `title`, `poster`, `year`, `rated`, `released`, `runtime`, `genre`, `director`, `writer`, `actor`, `plot`, `language`, `country`, `awards`, `totalseason`, `media_location`) VALUES
(26, 'Westworld', '/mediaRIP/uploads/posters/Westworld.jpg', '2016â€“', 'TV-MA', '02 Oct 2016', '60 min', 'Drama, Mystery, Sci-Fi', 'N/A', 'N/A', 'Thandie Newton, James Marsden, Jeffrey Wright, Ed Harris', 'A Western-themed futuristic theme park, populated with artificial intelligence, allows high-paying guests to live out their fantasies with no consequences or retaliation from the android hosts, until now.', 'English', 'USA', 'Nominated for 3 Golden Globes. Another 5 wins & 25 nominations.', '', '/external/Westworld/'),
(30, 'Breaking Bad', '/mediaRIP/uploads/posters/Breaking Bad.jpg', '2008-2013', 'TV-14', '20 Jan 2008', '49 min', 'Crime, Drama, Thriller', 'N/A', 'Vince Gilligan', 'Bryan Cranston, Anna Gunn, Aaron Paul, Betsy Brandt', 'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his family\'s future.', 'English, Spanish', 'USA', 'Won 2 Golden Globes. Another 137 wins & 219 nominations.', '5', 'null'),
(31, 'Breaking Bad', '/mediaRIP/uploads/posters/Breaking Bad.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'null'),
(32, 'Game of Thrones', '/mediaRIP/uploads/posters/Game of Thrones.jpg', '2011-', 'TV-MA', '17 Apr 2011', '56 min', 'Adventure, Drama, Fantasy', 'N/A', 'David Benioff, D.B. Weiss', 'Peter Dinklage, Lena Headey, Emilia Clarke, Kit Harington', 'Nine noble families fight for control over the mythical lands of Westeros. Meanwhile, a forgotten race hell-bent on destruction returns after being dormant for thousands of years.', 'English', 'USA, UK', 'Won 1 Golden Globe. Another 224 wins & 393 nominations.', '8', 'null'),
(33, 'Game of Thrones', '/mediaRIP/uploads/posters/Game of Thrones.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'null'),
(34, 'Quantico', '/mediaRIP/uploads/posters/Quantico.jpg', '2015-', 'TV-14', '01 Sep 2015', '42 min', 'Crime, Drama, Mystery', 'N/A', 'Joshua Safran', 'Priyanka Chopra, Jake McLaughlin, Aunjanue Ellis, Yasmine Al Massri', 'A look at the lives of young FBI recruits training at the Quantico base in Virginia when one of them is suspected of being a sleeper terrorist.', 'English', 'USA', '2 wins & 2 nominations.', '2', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(11) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_level`) VALUES
(1, 'chinmoy', 'chinmoy1113@gmail.com', '1223', 99),
(2, 'neil', 'chinmoyd1.haldia@gmail.com', '1223', 99),
(3, 'andria', 'ander11111@gmail.com', '1223', 1),
(4, 'zoro', 'chinmoyd1.haldia@gmail.com', '12rit23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `browser_thumbnails`
--
ALTER TABLE `browser_thumbnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvSeries`
--
ALTER TABLE `tvSeries`
  ADD PRIMARY KEY (`uniqueId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `browser_thumbnails`
--
ALTER TABLE `browser_thumbnails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `eid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tvSeries`
--
ALTER TABLE `tvSeries`
  MODIFY `uniqueId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
