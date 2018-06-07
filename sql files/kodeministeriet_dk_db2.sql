-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Vært: mysql19.unoeuro.com
-- Genereringstid: 06. 06 2018 kl. 09:22:41
-- Serverversion: 5.7.21-21-log
-- PHP-version: 7.0.30
DROP DATABASE IF EXISTS duckshopdb;
CREATE DATABASE duckshopdb;
USE duckshopdb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodeministeriet_dk_db2`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `admin`
--

CREATE TABLE `admin` (
  `userID` int(11) NOT NULL,
  `eMail` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `accessLevel` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `admin`
--

INSERT INTO `admin` (`userID`, `eMail`, `password`, `accessLevel`) VALUES
(1, 'duranovic46@gmail.com', '$2y$15$Q.rE3kqj3kpbH5AiVWP5bebiT5v3FE9ghsjMXT9kLY00ydtemO/I6', 1),
(2, 'j.pettit51@gmail.com', '$2y$15$Q.rE3kqj3kpbH5AiVWP5bebiT5v3FE9ghsjMXT9kLY00ydtemO/I6', 1),
(10, 'teach@education.dk', '$2y$15$Q.rE3kqj3kpbH5AiVWP5bebiT5v3FE9ghsjMXT9kLY00ydtemO/I6', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `articleID` int(11) DEFAULT NULL,
  `commentTitle` varchar(100) DEFAULT NULL,
  `commentText` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `companyContact`
--

CREATE TABLE `companyContact` (
  `contactID` int(11) NOT NULL,
  `openHours` varchar(20) DEFAULT NULL,
  `openDay` varchar(200) DEFAULT NULL,
  `CVR` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `companyContact`
--

INSERT INTO `companyContact` (`contactID`, `openHours`, `openDay`, `CVR`) VALUES
(9, '08-16ætest', 'MON', 12345678),
(10, 'Sometime during the ', 'TUE', 12345678),
(11, '08-16', 'WED', 12345678),
(12, '08-16', 'THU', 12345678),
(13, '08-16', 'FRI', 12345678),
(14, 'CLOSED', 'SAT', 12345678),
(15, 'CLOSED', 'SUN', 12345678);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `companyInfo`
--

CREATE TABLE `companyInfo` (
  `CVR` int(10) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `logoText` varchar(300) DEFAULT NULL,
  `aboutUs` varchar(500) DEFAULT NULL,
  `zipCode` int(4) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `streetNumber` int(3) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `eMail` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `companyInfo`
--

INSERT INTO `companyInfo` (`CVR`, `logo`, `logoText`, `aboutUs`, `zipCode`, `street`, `streetNumber`, `phone`, `eMail`) VALUES
(12345678, '5b0664ea6989d_wut.png', 'muuh  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis tempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque tincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper at nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie aliquet lectus. Quisq', 'Top Duck is your one stop duck shop. We peddle anything you may need - as long as you need rubber ducks! Visit us now for exclusive daily deals and the opportunity to find your new bathing companion! We relish the opportunity to provide ducks to the folks! Quack', 6720, 'Vestervejen', 34, 11223344, 'mail@mail.dk');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `eMail` varchar(60) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `orderHistory` varchar(300) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cardHolderName` varchar(200) DEFAULT NULL,
  `cardNumber` int(30) DEFAULT NULL,
  `CVC` int(3) DEFAULT NULL,
  `expirationMonth` int(2) DEFAULT NULL,
  `expirationYear` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `customer`
--

INSERT INTO `customer` (`customerID`, `eMail`, `firstName`, `lastName`, `orderHistory`, `password`, `cardHolderName`, `cardNumber`, `CVC`, `expirationMonth`, `expirationYear`) VALUES
(3, 'Duranovic47@gmail.com', 'Zeljko', 'Djuranovicc', NULL, '$2y$15$Q.pXB6RkeR/baM8ZX91OGuLicF6k2mFXj5XOKM7F/ZtQ4alsbIxdO', 'Zeljko Djuranovicc', 111111999, 222, 5, 22),
(4, 'test@test.dk', NULL, NULL, NULL, '$2y$15$JI5nj4s0YV6.6TH4ES9rbOCfmIdbV5QlGhruOO4NlIvJ6ZMc95Tce', NULL, NULL, NULL, NULL, NULL),
(5, 'j.pettit51@gmail.com', 'Jakob', 'Pettit', NULL, '$2y$15$FyxQhUdoVDSUFIByDJ1F0eVIAHf7pndP8KP4paxmbqe3JVJIXG2/m', 'JHP', 2147483647, 123, 1, 18),
(6, 'sebastiankbuch@hotmail.com', NULL, NULL, NULL, '$2y$15$ltN.Td.2oZGUnsof3oJjsuVTath4ptcwW08iTnTzI6akFgTJGM.HO', NULL, NULL, NULL, NULL, NULL),
(7, 'post@jdanet.dk', 'Jesper', 'Dalsgaard', NULL, '$2y$15$dhHwTFRhVP5IajRNbKUnOeBm9lJYmOUYsoZDg1WVkSwtyRViWSgCC', '', 0, 0, 1, 18),
(8, 'kt@easv.dk', ';;;;KIM', '', NULL, '$2y$15$/2Fbq8Hy0EB9QV8TtLgyieokmg3DSQ1VtMkSrqaCkkvQpidil1lxq', '232dssdsd', 2323232, 0, 9, 18),
(11, 'Duranovic477@gmail.com', '', '', NULL, '$2y$15$eBOS6oPzfALo9byugUzvUOEAWBndoeopzKMH7kovFmXx5/HLMyYO.', '', 0, 0, 7, 21);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `customerContact`
--

CREATE TABLE `customerContact` (
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `code_confirmation` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `customerOrders`
--

CREATE TABLE `customerOrders` (
  `orderID` int(11) NOT NULL,
  `shipperID` int(11) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `employeeID` int(11) DEFAULT NULL,
  `orderDateDay` int(2) DEFAULT NULL,
  `orderDateMonth` int(2) DEFAULT NULL,
  `orderDateYear` int(4) DEFAULT NULL,
  `orderComment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `eMail` varchar(60) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `news`
--

CREATE TABLE `news` (
  `articleID` int(11) NOT NULL,
  `articleText` varchar(10000) DEFAULT NULL,
  `articleTitle` varchar(100) DEFAULT NULL,
  `articleSubTitle` varchar(100) DEFAULT NULL,
  `articleIMG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `news`
--

INSERT INTO `news` (`articleID`, `articleText`, `articleTitle`, `articleSubTitle`, `articleIMG`) VALUES
(2, 'Lorem ipsum dolor sit amet, sea eius possim ut, commune suavitate reprehendunt te nec. Te usu possim timeam facilisis, ne novum erroribus accusamus eum, vix an dicam utroque. Lorem verterem ne vim. Has id sint delenit, ut feugiat accommodare voluptatibus sit. Menandri repudiandae eos ei. Denique contentiones vel te, adhuc augue dictas ut pri, sit ei epicurei mandamus delicatissimi.\r\n\r\nEi duo magna ocurreret inciderint, ius eu nulla philosophia, has solum dolore dissentias cu. At paulo iuvaret mel. Per periculis consequat et, eu invenire consulatu theophrastus quo. Mel ut minim nihil atomorum, cu purto timeam vim, sed te tollit tibique adversarium. Quo cibo appetere eu, usu accusam offendit et.\r\n\r\nHabemus alienum epicurei ex vis. Corpora intellegam at vel, sale error principes sed te. Ex sit audire voluptaria repudiandae. Augue iudicabit intellegebat ea nec, per ad periculis posidonium philosophia. Cu inani soluta facilisi sea.\r\n\r\nSea repudiare dignissim eu, sit maiorum docendi incorrupte id. Sea ex saperet intellegam, ut usu debet mediocrem percipitur, per et munere nullam. Nulla graece ne nec, vidit affert vim id. Nisl quando imperdiet ex sit. Aeque feugiat percipit pri ex, dicunt oblique legendos has et, est eu liber utroque.\r\n\r\nZril vituperata duo cu, ex sumo tritani vix. Mei habeo disputationi ei, sit an detracto definitiones. Quem harum cum eu. Ne dicant nemore vis, ea pri percipit principes.', 'Lorem Ipsum: The next big thing!', 'How can text generators ever compete with Lorem Ipsum?', ''),
(3, 'Lorem ipsum dolor sit amet, sea eius possim ut, commune suavitate reprehendunt te nec. Te usu possim timeam facilisis, ne novum erroribus accusamus eum, vix an dicam utroque. Lorem verterem ne vim. Has id sint delenit, ut feugiat accommodare voluptatibus sit. Menandri repudiandae eos ei. Denique contentiones vel te, adhuc augue dictas ut pri, sit ei epicurei mandamus delicatissimi.\r\n\r\nEi duo magna ocurreret inciderint, ius eu nulla philosophia, has solum dolore dissentias cu. At paulo iuvaret mel. Per periculis consequat et, eu invenire consulatu theophrastus quo. Mel ut minim nihil atomorum, cu purto timeam vim, sed te tollit tibique adversarium. Quo cibo appetere eu, usu accusam offendit et.\r\n\r\nHabemus alienum epicurei ex vis. Corpora intellegam at vel, sale error principes sed te. Ex sit audire voluptaria repudiandae. Augue iudicabit intellegebat ea nec, per ad periculis posidonium philosophia. Cu inani soluta facilisi sea.\r\n\r\nSea repudiare dignissim eu, sit maiorum docendi incorrupte id. Sea ex saperet intellegam, ut usu debet mediocrem percipitur, per et munere nullam. Nulla graece ne nec, vidit affert vim id. Nisl quando imperdiet ex sit. Aeque feugiat percipit pri ex, dicunt oblique legendos has et, est eu liber utroque.\r\n\r\nZril vituperata duo cu, ex sumo tritani vix. Mei habeo disputationi ei, sit an detracto definitiones. Quem harum cum eu. Ne dicant nemore vis, ea pri percipit principes.', 'Lorem Ipsum closes', 'Investors left the top text generator', '5b073fa2cf176_harry_ponder.jpg'),
(4, 'Lorem Ipsum&nbsp;er ganske enkelt fyldtekst fra print- og typografiindustrien. Lorem Ipsum har været standard fyldtekst siden 1500-tallet, hvor en ukendt trykker sammensatte en tilfældig spalte for at trykke en bog til sammenligning af forskellige skrifttyper. Lorem Ipsum har ikke alene overlevet fem århundreder, men har også vundet indpas i elektronisk typografi uden væsentlige ændringer. Sætningen blev gjordt kendt i 1960&#39;erne med lanceringen af Letraset-ark, som indeholdt afsnit med Lorem Ipsum, og senere med layoutprogrammer som Aldus PageMaker, som også indeholdt en udgave af Lorem Ipsum.', 'Top Duck Shop listed on NASDAQ', 'Shares won&#39;t stop climbing!', '5b0740d257bc2_jurasic_quack_side.jpg'),
(5, 'h1 {background-color: red; color: blue; font-family: &#34;Comic Sans MS&#34;;\r\n\r\nbody {\r\n	background-color: #0000FF !important;\r\n}\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas \r\nenim, eu tempus orci erat aliquet nisi.\r\n\r\n\r\nNunc cursus elit ut cursus ultricies. Praesent at molestie augue, et \r\nconsequat neque. Aenean at gravida velit. Phasellus vitae pharetra \r\nvelit. Praesent a pulvinar eros. Donec vitae mattis velit. Proin \r\nvehicula ligula vitae odio convallis faucibus. Aenean aliquet quis leo \r\nut sollicitudin. In ex enim, euismod vel consequat sit amet, auctor eget\r\n metus. Phasellus ut dolor mi.\r\n\r\n\r\nUt vitae urna ornare, blandit turpis eget, ultricies eros. Nam mollis \r\nsem vel lorem luctus consectetur. In leo urna, rhoncus vel blandit sit \r\namet, accumsan eget enim. Nam velit est, porttitor sit amet pulvinar \r\nvel, sagittis sit amet tortor. Aliquam interdum ornare porta. Aenean \r\nluctus, ipsum ut convallis faucibus, neque massa imperdiet orci, a \r\nvulputate purus elit quis odio. Etiam bibendum enim sed consectetur \r\npretium. Nulla interdum vitae massa in sollicitudin. Vestibulum \r\nimperdiet pellentesque nunc, id interdum lacus lacinia quis. Quisque \r\nvulputate lorem vel posuere tristique. Morbi accumsan lectus et arcu \r\nullamcorper bibendum. Integer non condimentum metus. Morbi vel dignissim\r\n felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas \r\nenim, eu tempus orci erat aliquet nisi.\r\n\r\n\r\nNunc cursus elit ut cursus ultricies. Praesent at molestie augue, et \r\nconsequat neque. Aenean at gravida velit. Phasellus vitae pharetra \r\nvelit. Praesent a pulvinar eros. Donec vitae mattis velit. Proin \r\nvehicula ligula vitae odio convallis faucibus. Aenean aliquet quis leo \r\nut sollicitudin. In ex enim, euismod vel consequat sit amet, auctor eget\r\n metus. Phasellus ut dolor mi.\r\n\r\n\r\nUt vitae urna ornare, blandit turpis eget, ultricies eros. Nam mollis \r\nsem vel lorem luctus consectetur. In leo urna, rhoncus vel blandit sit \r\namet, accumsan eget enim. Nam velit est, porttitor sit amet pulvinar \r\nvel, sagittis sit amet tortor. Aliquam interdum ornare porta. Aenean \r\nluctus, ipsum ut convallis faucibus, neque massa imperdiet orci, a \r\nvulputate purus elit quis odio. Etiam bibendum enim sed consectetur \r\npretium. Nulla interdum vitae massa in sollicitudin. Vestibulum \r\nimperdiet pellentesque nunc, id interdum lacus lacinia quis. Quisque \r\nvulputate lorem vel posuere tristique. Morbi accumsan lectus et arcu \r\nullamcorper bibendum. Integer non condimentum metus. Morbi vel dignissim\r\n felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas \r\nenim, eu tempus orci erat aliquet nisi.\r\n\r\n\r\nNunc cursus elit ut cursus ultricies. Praesent at molestie augue, et \r\nconsequat neque. Aenean at gravida velit. Phasellus vitae pharetra \r\nvelit. Praesent a pulvinar eros. Donec vitae mattis velit. Proin \r\nvehicula ligula vitae odio convallis faucibus. Aenean aliquet quis leo \r\nut sollicitudin. In ex enim, euismod vel consequat sit amet, auctor eget\r\n metus. Phasellus ut dolor mi.\r\n\r\n\r\nUt vitae urna ornare, blandit turpis eget, ultricies eros. Nam mollis \r\nsem vel lorem luctus consectetur. In leo urna, rhoncus vel blandit sit \r\namet, accumsan eget enim. Nam velit est, porttitor sit amet pulvinar \r\nvel, sagittis sit amet tortor. Aliquam interdum ornare porta. Aenean \r\nluctus, ipsum ut convallis faucibus, neque massa imperdiet orci, a \r\nvulputate purus elit quis odio. Etiam bibendum enim sed consectetur \r\npretium. Nulla interdum vitae massa in sollicitudin. Vestibulum \r\nimperdiet pellentesque nunc, id interdum lacus lacinia quis. Quisque \r\nvulputate lorem vel posuere tristique. Morbi accumsan lectus et arcu \r\nullamcorper bibendum. Integer non condimentum metus. Morbi vel dignissim\r\n felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas \r\nenim, eu tempus orci erat aliquet nisi.\r\n\r\n\r\nNunc cursus elit ut cursus ultricies. Praesent at molestie augue, et \r\nconsequat neque. Aenean at gravida velit. Phasellus vitae pharetra \r\nvelit. Praesent a pulvinar eros. Donec vitae mattis velit. Proin \r\nvehicula ligula vitae odio convallis faucibus. Aenean aliquet quis leo \r\nut sollicitudin. In ex enim, euismod vel consequat sit amet, auctor eget\r\n metus. Phasellus ut dolor mi.\r\n\r\n\r\nUt vitae urna ornare, blandit turpis eget, ultricies eros. Nam mollis \r\nsem vel lorem luctus consectetur. In leo urna, rhoncus vel blandit sit \r\namet, accumsan eget enim. Nam velit est, porttitor sit amet pulvinar \r\nvel, sagittis sit amet tortor. Aliquam interdum ornare porta. Aenean \r\nluctus, ipsum ut convallis faucibus, neque massa imperdiet orci, a \r\nvulputate purus elit quis odio. Etiam bibendum enim sed consectetur \r\npretium. Nulla interdum vitae massa in sollicitudin. Vestibulum \r\nimperdiet pellentesque nunc, id interdum lacus lacinia quis. Quisque \r\nvulputate lorem vel posuere tristique. Morbi accumsan lectus et arcu \r\nullamcorper bibendum. Integer non condimentum metus. Morbi vel dignissim\r\n felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas \r\nenim, eu tempus orci erat aliquet nisi.\r\n\r\n\r\nNunc cursus elit ut cursus ultricies. Praesent at molestie augue, et \r\nconsequat neque. Aenean at gravida velit. Phasellus vitae pharetra \r\nvelit. Praesent a pulvinar eros. Donec vitae mattis velit. Proin \r\nvehicula ligula vitae odio convallis faucibus. Aenean aliquet quis leo \r\nut sollicitudin. In ex enim, euismod vel consequat sit amet, auctor eget\r\n metus. Phasellus ut dolor mi.\r\n\r\n\r\nUt vitae urna ornare, blandit turpis eget, ultricies eros. Nam mollis \r\nsem vel lorem luctus consectetur. In leo urna, rhoncus vel blandit sit \r\namet, accumsan eget enim. Nam velit est, porttitor sit amet pulvinar \r\nvel, sagittis sit amet tortor. Aliquam interdum ornare porta. Aenean \r\nluctus, ipsum ut convallis faucibus, neque massa imperdiet orci, a \r\nvulputate purus elit quis odio. Etiam bibendum enim sed consectetur \r\npretium. Nulla interdum vitae massa in sollicitudin. Vestibulum \r\nimperdiet pellentesque nunc, id interdum lacus lacinia quis. Quisque \r\nvulputate lorem vel posuere tristique. Morbi accumsan lectus et arcu \r\nullamcorper bibendum. Integer non condimentum metus. Morbi vel dignissim\r\n felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas \r\nenim, eu tempus orci erat aliquet nisi.\r\n\r\n\r\nNunc cursus elit ut cursus ultricies. Praesent at molestie augue, et \r\nconsequat neque. Aenean at gravida velit. Phasellus vitae pharetra \r\nvelit. Praesent a pulvinar eros. Donec vitae mattis velit. Proin \r\nvehicula ligula vitae odio convallis faucibus. Aenean aliquet quis leo \r\nut sollicitudin. In ex enim, euismod vel consequat sit amet, auctor eget\r\n metus. Phasellus ut dolor mi.\r\n\r\n\r\nUt vitae urna ornare, blandit turpis eget, ultricies eros. Nam mollis \r\nsem vel lorem luctus consectetur. In leo urna, rhoncus vel blandit sit \r\namet, accumsan eget enim. Nam velit est, porttitor sit amet pulvinar \r\nvel, sagittis sit amet tortor. Aliquam interdum ornare porta. Aenean \r\nluctus, ipsum ut convallis faucibus, neque massa imperdiet orci, a \r\nvulputate purus elit quis odio. Etiam bibendum enim sed consectetur \r\npretium. Nulla interdum vitae massa in sollicitudin. Vestibulum \r\nimperdiet pellentesque nunc, id interdum lacus lacinia quis. Quisque \r\nvulputate lorem vel posuere tristique. Morbi accumsan lectus et arcu \r\nullamcorper bibendum. Integer non condimentum metus. Morbi vel dignissim\r\n felis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis \r\ntempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque \r\ntincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper \r\nat nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie \r\naliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a\r\n leo. Nam tempor, ipsum ', 'Killa', 'Duck', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orderHistory`
--

CREATE TABLE `orderHistory` (
  `orderHistoryID` int(11) NOT NULL,
  `customerID` int(10) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orderInfo`
--

CREATE TABLE `orderInfo` (
  `orderInfoID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `productRating` varchar(5) DEFAULT NULL,
  `productIMG` varchar(100) DEFAULT NULL,
  `productDescription` varchar(1000) DEFAULT NULL,
  `productStock` int(10) DEFAULT NULL,
  `productPrice` int(10) DEFAULT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `productSpecial` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `product`
--

INSERT INTO `product` (`productID`, `categoryID`, `productRating`, `productIMG`, `productDescription`, `productStock`, `productPrice`, `productName`, `productSpecial`) VALUES
(5, 1, '5', '5b05bca31174b_500_rock_idol.jpg', 'This mohawked, tattooed, dog-collard punk rocker is the rock idol of Essex Duck. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4.3&#34; high.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis tempus mauris. Mauris vitae nunc ut dolor dapibus finibus. Quisque tincidunt eu ligula et accumsan. Fusce et nunc eu mauris viverra semper at nec turpis. Sed nulla eros, sollicitudin ut felis non, molestie aliquet lectus. Quisque ante erat, consectetur et sodales vitae, rutrum a leo. Nam tempor, ipsum eget accumsan sagittis, sapien nulla egestas enim, eu tempus orci erat aliquet nisi.\r\n\r\nNunc curs', 12, 99, 'Rock Idol Rubber Ducky', NULL),
(6, 1, '5', '5b05bd587cb38_500_space.jpg', 'One small waddle for duck...one giant waddle for duckkind! The astronaut of Essex Duck will soon be on to the next galactic mission. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 3.9&#34; high.', 23, 99, 'Space Rubber Duck', NULL),
(7, 1, '10', '5b05bd7276506_500_chef.jpg', 'In crisp white chef jacket and hat, chef is ready to serve up five-star fare at Essex Duck. Imagine what chef might cook up for you. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4.4&#34; high.', 6, 99, 'Chef Rubber Duck', NULL),
(8, 1, '10', '5b05bda7c5ef8_500_constable.jpg', 'The constable of Essex Duck is keeping things in order. It&#39;s a tough job, but somebody has to do it. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4.1&#34; high.', 65, 99, 'Constable Rubber Duck', NULL),
(9, 1, NULL, '5b05bddc47aba_500_artiste.jpg', 'This artiste finds everything at Essex Duck a bit surreal. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4&#34; high.', 25, 99, 'Artiste Rubber Duck', NULL),
(10, 1, NULL, '5b05be0016e5a_500_robot.jpg', 'The droid of Essex Duck is programmed for fun and entertainment. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 3.9&#34; high.', 38, 99, 'Robot Rubber Duck', NULL),
(11, 1, NULL, '5b05be21ae223_500_dragon.jpg', 'The friendly dragon of Essex Duck will set your heart afire. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 3.8&#34; high.', 13, 99, 'Dragon Rubber Duck', NULL),
(12, 1, NULL, '5b05be5e1f6c6_500_princess.jpg', 'The royal beauty of Essex Duck tell us, &#34;Always be yourself, unless you can be a princess. Then be a princess.&#34; This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4.7&#34; high.', 67, 99, 'Princess Rubber Duck', NULL),
(13, 1, NULL, '5b05be8d0ccd3_500_queen.jpg', 'Wearing her purple crown, the Queen of Essex Duck looks very regal. Imagine the elegance she will add to your bath or collection. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 5.3&#34; high.', 45, 99, 'Queen Rubber Duck', NULL),
(14, 1, NULL, '5b05beabf26a6_500_royal_guard.jpg', 'The royal guardsman of Essex Duck provides bath time security fit for a Queen. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 5&#34; high.', 44, 99, 'Royal Guard Rubber Duck', NULL),
(16, 1, NULL, '5b05bedd65610_500_laser.jpg', 'The successful water foul is the average duck with laser-like focus, according to Essex Duck&#39;s most precise foul. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 2, 99, 'Laser Rubber Duck', NULL),
(17, 1, NULL, '5b05bf03d2ecd_500_diva.jpg', 'The diva of Essex Duck knows what she wants and how to get it. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4.6&#34; high.', 66, 99, 'Diva Rubber Duck', NULL),
(18, 1, NULL, '5b05bf21e77d8_500_nerd.jpg', 'The nerd of Essex Duck is geek chic in his suspenders, bow tie, and glasses. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 77, 99, 'Nerd Rubber Duck', 79),
(19, 1, NULL, '5b05bf425f6ae_500_ahoy.jpg', 'This sociable matey calls, &#34;Ahoy,&#34; to all at Essex Duck. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 29, 99, 'Ahoy Rubber Duck', NULL),
(20, 1, NULL, '5b05bf653722e_500_brit.jpg', 'Wrapped in the British flag, the Brit of Essex Duck is loyal through and through. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 52, 99, 'Brit Rubber Duck', NULL),
(21, 1, NULL, '5b05bf8cc062f_500_donut.jpg', 'Dripping pink icing and confetti sprinkles make mouths water at Essex Duck. This luxury edition rubber duck is perfect for anyone with a sweet tooth. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 74, 99, 'Donut Rubber Duck', NULL),
(22, 1, NULL, '5b05bfab38a7f_500_love_love_love.jpg', 'What more can we say? At Essex Duck we love, love, love this duck! This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 91, 99, 'Love, Love, Love Rubber Duck', NULL),
(23, 1, NULL, '5b05bfd21ba8c_500_pop_dot.jpg', 'Make a dash for the dot...dot...dot of Essex Duck. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 13, 99, 'Pop Dot Rubber Duck', NULL),
(24, 1, NULL, '5b05bfef4b6a0_500_80s_cube.jpg', 'The 80&#39;s cube of Essex Duck has everyone puzzled. Perhaps you can find a solution. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 76, 99, '80&#39;s Cube Rubber Duck', NULL),
(25, 1, NULL, '5b05c00a95d9d_500_pop_heart.jpg', 'This duck has hearts beating all around Essex Duck. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 48, 99, 'Pop Heart Rubber Duck', NULL),
(26, 1, NULL, '5b05c024cd204_500_zigzag.jpg', 'This Zig Zag duck is veering all over Essex Duck. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 87, 99, 'Zig Zag Rubber Duck', NULL),
(27, 1, NULL, '5b05c045153fe_500_camofusion.jpg', 'Mix it up with the camo fusion duck of Essex Duck. This luxury collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 3.6&#34; high.', 45, 99, 'Camo Fusion Rubber Duck', NULL),
(28, 1, NULL, '5b05c06397873_500_pirate.jpg', 'Shiver me timbers. The freebooter of Essex Duck is back from his latest round of pillage and plunder. This deluxe collectible duck is individually hand painted and detailed. Made from safe phthalate-free plastic. Not a teething toy. Exercise proper supervision for children under three. Please note, this duck range is primarily intended as a collectable item. Due to bespoke shapes, especially with some of the more elaborate moldings and designs with hats, they might not float upright in the bath. Measures 4&#34; long x 3&#34; wide x 4.2&#34; high.', 9, 99, 'Pirate Rubber Duck', NULL),
(29, 2, NULL, '5b05c0f764ac1_pond-bombshell.jpg', 'From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures &#34; long x &#34; wide x &#34; high.', 23, 150, 'Pond Bombshell', NULL),
(30, 2, NULL, '5b05c11fdc32a_say-hello.jpg', 'From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures &#34; long x &#34; wide x &#34; high.', 6, 150, 'NEW! Say Hello to My Lil&#39; Friend', NULL),
(31, 2, NULL, '5b05c13b5c934_material-bird.jpg', 'From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures &#34; long x &#34; wide x &#34; high.', 65, 150, 'Material Bird', NULL),
(32, 2, NULL, '5b05c1577b605_floating-stones.jpg', 'From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures &#34; long x &#34; wide x &#34; high.', 87, 150, 'Floating Stones', NULL),
(33, 2, NULL, '5b05c177f361b_ziggy-starduck.jpg', 'From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures &#34; long x &#34; wide x &#34; high.', 19, 150, 'Ziggy Starduck', NULL),
(34, 2, NULL, '5b05c1977404a_love-ducky.jpg', 'From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures &#34; long x &#34; wide x &#34; high.', 71, 150, 'I Love Ducky', NULL),
(35, 2, NULL, '5b05c1bb6a147_blue_suede_duck.jpg', 'One for the money. Two for the show. Three to get ready. Now go, duck, go. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3.7&#34; wide x 4.6&#34; high.', 31, 150, 'Blue Suede Rock &#39;n&#39; Roll Rubber Duck', NULL),
(36, 2, NULL, '5b05c1e651329_give_geese_a_chance.jpg', 'All we are saying is, &#34;Give geese a chance.&#34; From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.8&#34; long x 4.1&#34; wide x 4.2&#34; high.', 91, 150, 'Give Geese a Chance Rubber Duck', NULL),
(37, 2, NULL, '5b05c20ff2324_500_paddle_like_its_1999.jpg', 'Paddle like it&#39;s 1999 with the prince of Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.8&#34; long x 3.6&#34; wide x 4.5&#34; high.', 54, 150, 'Paddle Like It&#39;s 1999 Rubber Duck', NULL),
(38, 2, NULL, '5b05c22e2e168_500_duckin.jpg', 'Duckin&#39; enjoys his new flock of fans at Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3.3&#34; wide x 4.4&#34; high.', 13, 150, 'Duckin&#39; Rubber Duck', NULL),
(39, 2, NULL, '5b05c253c3c02_jake_blues.jpg', 'With brother Elwood, Jake is putting the band back together. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.3&#34; long x 3.5&#34; wide x 4.5&#34; high.', 32, 150, 'Jake Blues Rubber Duck', NULL),
(40, 2, NULL, '5b05c270687ac_elwood_blues.jpg', 'With brother Jake, Elwood is on a mission from God. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.4&#34; long x 3.2&#34; wide x 4.3&#34; high.', 43, 150, 'Elwood Blues Rubber Duck', NULL),
(41, 2, NULL, '5b05c294acc2f_purple_waves.jpg', 'Essex Duck is rocking to the roll of purple waves. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 4&#34; wide x 4.3&#34; high.', 99, 150, 'Purple Waves Rubber Duck', NULL),
(42, 2, NULL, '5b05c2b14fc8f_devo.jpg', 'When a problem comes along Devo of Essex Duck whips it good. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.6&#34; long x 2.9&#34; wide x 4.1&#34; high.', 81, 150, 'Devo Rubber Duck', NULL),
(43, 2, NULL, '5b05c2dada7af_500_on_the_pond_again.jpg', 'The country western crooner of Essex Duck just can wait to get on the pond again. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.9&#34; long x 3.5&#34; wide x 4&#34; high.', 8, 150, 'On the Pond Again Rubber Duck', NULL),
(44, 2, NULL, '5b05c2f42e326_one_pond_rasta.jpg', 'With One Pond Rasta at Essex Duck, every little thing is gonna be alright . From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3.3&#34; wide x 4.1&#34; high.', 13, 150, 'One Pond Rasta Rubber Duck', NULL),
(45, 2, NULL, '5b05c31403198_500_kiss.jpg', 'Gene Simons is showing his demon side at Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.1&#34; long x 3.8&#34; wide x 4.2&#34; high.', 43, 150, 'Gene Simmons Kiss Rubber Duck', NULL),
(46, 2, NULL, '5b05c3311ffc6_500_duckinator.jpg', 'The Duckinator of Essex Duck is bad to the foam. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3.6&#34; wide x 4.4&#34; high.', 71, 150, 'Duckinator Rubber Duck', NULL),
(47, 2, NULL, '5b05c34e97f1a_betty_boop.jpg', 'Boop-boop-e-doop (squeak)! We are totally smitten by Betty Boop at Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.1&#34; long x 3.2&#34; wide x 3.9&#34; high.', 11, 150, 'Betty Boop Rubber Duck', NULL),
(48, 2, NULL, '5b05c36c2a080_harry_ponder.jpg', 'Harry Ponder is the wizard of Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3.7&#34; wide x 4.6&#34; high.', 61, 150, 'Harry Ponder Rubber Duck', NULL),
(49, 2, NULL, '5b05c38759a2f_mr_squawk.jpg', 'Mr. Squawk of Essex Duck is on a mission to go where no duck has gone before. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.2&#34; long x 4&#34; wide x 4.2&#34; high.', 81, 150, 'Mr. Squawk Rubber Duck', NULL),
(50, 2, NULL, '5b05c3a654329_pirates_of_the_quackibean.jpg', 'Captain Quack Mallard brings tales of high-sea adventure to Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.2&#34; long x 3.4&#34; wide x 4.4&#34; high.', 88, 150, 'Captain Quack Rubber Duck', NULL),
(51, 2, NULL, '5b05c3d82500c_mad_quax.jpg', 'Meet Mad Quax, the pond warrior of Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.3&#34; long x 3.8&#34; wide x 4.6&#34; high.', 91, 150, 'Mad Quax Rubber Duck', NULL),
(52, 2, NULL, '5b05c403ce416_500_floating_dead.jpg', 'With the zombie of Essex Duck, of corpse bath time will be more fun. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.2&#34; long x 3.7&#34; wide x 4.5&#34; high.', 64, 150, 'The Floating Dead Rubber Duck', NULL),
(53, 2, NULL, '5b05c448f366a_500_goosebusters.jpg', 'The GooseBuster of Essex Duck ain&#39;t afraid of no goose. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3.3&#34; wide x 4.3&#34; high.', 41, 150, 'GooseBusters Rubber Duck', NULL),
(54, 2, NULL, '5b05c46fb0747_500_duck_the_magic_dragon.jpg', 'Duck the Magic Dragon continues to work his magic on everyone at Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.7&#34; long x 3.4&#34; wide x 4.5&#34; high.', 35, 150, 'Duck the Magic Dragon Rubber Duck', NULL),
(55, 2, NULL, '5b05c488ed07c_jurasic_quack_side.jpg', 'The Jurassic Quack of Essex Duck might not be as fierce as your neighborhood dinosaur, be he is a lot cuter. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.7&#34; long x 3.4&#34; wide x 4.5&#34; high.', 61, 150, 'Jurassic Quack Rubber Duck', NULL),
(56, 2, NULL, '5b05c4a3c9d2d_500_spa_wars.jpg', 'May the bath be with you as you journey through space and time with the Spa Wars duck of Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.1&#34; long x 3.5&#34; wide x 4.4&#34; high.', 88, 150, 'Spa Wars Rubber Duck', NULL),
(57, 2, NULL, '5b05c4c3ccf05_500_breaking_bath.jpg', 'Watch your back. The bad boy of Essex Duck knows a duck, who knows a duck, who knows another duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.1&#34; long x 3.5&#34; wide x 4.2&#34; high.', 44, 150, 'Breaking Bath Rubber Duck', NULL),
(58, 2, NULL, '5b05c4dd7ad16_sam.jpg', 'The Uncle Sam of Essex Duck is made in the USA. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.8&#34; long x 3.1&#34; wide x 4.3&#34; high.', 48, 150, 'Sam Rubber Duck', NULL),
(59, 2, NULL, '5b05c4f70d42e_pork_chopper.jpg', 'The biker of Essex Duck loves to ride (but hates to arrive). With so many roads to travel, he just can&#39;t stay in one place for long. Made in America. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.7&#34; long x 3.2&#34; wide x 4.5&#34; high.', 50, 150, 'Pork Chopper Rubber Duck', NULL),
(60, 2, NULL, '5b05c51434acc_tour_de_duck.jpg', 'The race is on at Essex Duck. And Tour De Duck is in it to win it. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4&#34; long x 3&#34; wide x 4.2&#34; high.', 90, 150, 'Tour De Duck Rubber Duck', NULL),
(61, 2, NULL, '5b05c53778037_chip.jpg', 'Who wants ice cream? We all do at Essex Duck. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 3.8&#34; long x 3.5&#34; wide x 4.3&#34; high.', 79, 150, 'Chip Rubber Duck', NULL),
(62, 2, NULL, '5b05c54de3099_devil.jpg', 'The devil of Essex Duck is cute and mischievous at the same time. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 4.1&#34; long x 3.5&#34; wide x 4.1&#34; high.', 19, 150, 'Devil Rubber Duck', NULL),
(63, 2, NULL, '5b05c5692d8e7_pink_flamingo.jpg', 'This pink flamingo gets along so well with all the ducks at Essex Duck, we just couldn&#39;t turn it away. From the original creator of the first ever collectible celebrity rubber ducks. Voted one of the Top 100 Gifts by Entertainment Weekly. Not a teething toy. Exercise proper supervision for children under three. Measures 5.1&#34; long x 2.9&#34; wide x 3.8&#34; high.', 50, 150, 'Pink Flamingo', NULL),
(64, 2, NULL, '5b05c5888648e_mr_green.jpg', 'Mr. Green, Essex Duck&#39;s first 100% recycled &#34;Green&#34; rubber duck, is made from environmentally-friendly recycled and recyclable material. All packaging is made from 100% recycled material too. Not a teething toy. Exercise proper supervision for children under three. Measures 4.2&#34; long x 3.6&#34; wide x 4.3&#34; high.', 39, 150, 'Mr. Green Recycled Rubber Duck', NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `productCategory`
--

CREATE TABLE `productCategory` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `productCategory`
--

INSERT INTO `productCategory` (`categoryID`, `categoryName`) VALUES
(1, 'Bud ducks'),
(2, 'Celebriducks');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `reviewText` varchar(300) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `shipper`
--

CREATE TABLE `shipper` (
  `shipperID` int(11) NOT NULL,
  `shipperName` varchar(50) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userID`);

--
-- Indeks for tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `articleID` (`articleID`);

--
-- Indeks for tabel `companyContact`
--
ALTER TABLE `companyContact`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `CVR` (`CVR`);

--
-- Indeks for tabel `companyInfo`
--
ALTER TABLE `companyInfo`
  ADD PRIMARY KEY (`CVR`);

--
-- Indeks for tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indeks for tabel `customerOrders`
--
ALTER TABLE `customerOrders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `shipperID` (`shipperID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indeks for tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indeks for tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`articleID`);

--
-- Indeks for tabel `orderHistory`
--
ALTER TABLE `orderHistory`
  ADD PRIMARY KEY (`orderHistoryID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indeks for tabel `orderInfo`
--
ALTER TABLE `orderInfo`
  ADD PRIMARY KEY (`orderInfoID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indeks for tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indeks for tabel `productCategory`
--
ALTER TABLE `productCategory`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indeks for tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `productID` (`productID`);

--
-- Indeks for tabel `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipperID`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tilføj AUTO_INCREMENT i tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `companyContact`
--
ALTER TABLE `companyContact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tilføj AUTO_INCREMENT i tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tilføj AUTO_INCREMENT i tabel `customerOrders`
--
ALTER TABLE `customerOrders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `news`
--
ALTER TABLE `news`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `orderHistory`
--
ALTER TABLE `orderHistory`
  MODIFY `orderHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `orderInfo`
--
ALTER TABLE `orderInfo`
  MODIFY `orderInfoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Tilføj AUTO_INCREMENT i tabel `productCategory`
--
ALTER TABLE `productCategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipperID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`articleID`) REFERENCES `news` (`articleID`);

--
-- Begrænsninger for tabel `companyContact`
--
ALTER TABLE `companyContact`
  ADD CONSTRAINT `companyContact_ibfk_1` FOREIGN KEY (`CVR`) REFERENCES `companyInfo` (`CVR`);

--
-- Begrænsninger for tabel `customerOrders`
--
ALTER TABLE `customerOrders`
  ADD CONSTRAINT `customerOrders_ibfk_1` FOREIGN KEY (`shipperID`) REFERENCES `shipper` (`shipperID`),
  ADD CONSTRAINT `customerOrders_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `customerOrders_ibfk_3` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);

--
-- Begrænsninger for tabel `orderHistory`
--
ALTER TABLE `orderHistory`
  ADD CONSTRAINT `orderHistory_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `orderHistory_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `customerOrders` (`orderID`);

--
-- Begrænsninger for tabel `orderInfo`
--
ALTER TABLE `orderInfo`
  ADD CONSTRAINT `orderInfo_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `customerOrders` (`orderID`),
  ADD CONSTRAINT `orderInfo_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Begrænsninger for tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `productCategory` (`categoryID`);

--
-- Begrænsninger for tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
