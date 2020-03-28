-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 06:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_karimafify_petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `adoption_ready_date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `fk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `age`, `img`, `Website`, `description`, `address`, `hobbies`, `adoption_ready_date`, `type`, `fk_id`) VALUES
(1, 'Dog, Liesing 1230', 3, 'https://images.derstandard.at/img/2019/10/29/dogBreiteKLEINER1200pix.jpg?w=750&s=21fc0ee8', 'https://en.wikipedia.org/wiki/Dog', 'The domestic dog is a member of the genus Canis (canines), which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore.', 'Liesing 1230', 'eating, going for walks, playing', '2020-01-01', 'Schaeffer', NULL),
(2, 'Cat, Meidling 1120', 6, 'https://cdn.prod.www.spiegel.de/images/117ba902-0001-0004-0000-000001428730_w1600_r0.7425714285714285_fpx49.99_fpy41.55.jpg', 'https://en.wikipedia.org/wiki/Cat', 'The cat (Felis catus) is a domestic species of small carnivorous mammal.', 'Meidling 1120', 'playing, sleeping', '2020-01-01', 'persian', NULL),
(3, 'Snake, 1230 Atzgersdorf', 11, 'https://cmkt-image-prd.freetls.fastly.net/0.1.0/ps/5096552/910/1365/m2/fpnw/wm1/rrbpbi3grldngmrblpwrdanhnqviwrynxgrzspltnxaijdwghnopqcbleljsbqai-.jpg?1537797419&s=09c76af5dcd9a9478f58bf49fb81959f', 'https://en.wikipedia.org/wiki/Snake', 'Snakes are elongated, legless, carnivorous reptiles of the suborder Serpentes. Like all other squamates, snakes are ectothermic, amniote vertebrates covered in overlapping scales.', '1230 Atzgersdorf', 'sleeping', '2020-01-01', 'Cobra', NULL),
(4, 'Bird,1040 Margareten', 7, 'https://www.hboc.org.au/wp-content/uploads/GoldenWhistler-610.jpg', 'https://en.wikipedia.org/wiki/bird', 'Birds are a group of warm-blooded vertebrates constituting the class Aves, characterized by feathers, toothless beaked jaws, the laying of hard-shelled eggs.', '1040 Margareten', 'Flying, eating', '2020-01-01', 'Spatz', NULL),
(5, 'Horse, 1080 Josefstadt', 4, 'https://upload.wikimedia.org/wikipedia/commons/d/de/Nokota_Horses_cropped.jpg', 'https://en.wikipedia.org/wiki/horse', 'The horse (Equus ferus caballus) is one of two extant subspecies of Equus ferus. It is an odd-toed ungulate mammal belonging to the taxonomic family Equidae.', '1080 Josefstadt', 'riding, eating', '2020-01-01', 'Arabic', NULL),
(6, 'Turtle, 1120 Meidling', 34, 'https://live.mrf.io/statics/i/ps/cdn.zmescience.com/wp-content/uploads/2020/02/reptile_green-sea-turtle_600x300.jpg', 'https://en.wikipedia.org/wiki/turtle', 'Turtles are reptiles of the order Testudines characterized by a special bony or cartilaginous shell developed from their ribs and acting as a shield.', '1120 Meidling', 'sleeping, eating', '2020-01-01', 'Houseturtle', NULL),
(7, 'Mule, 1120 Niederhofstraße', 14, 'https://animals.net/wp-content/uploads/2019/08/Mule-3-650x425.jpg', 'https://en.wikipedia.org/wiki/mule', 'A mule is the offspring of a male donkey (jack) and a female horse (mare). ', '1120 Niederhofstraße', 'Playing', '2020-01-01', 'grey', NULL),
(8, 'Wolf, 1130 Hietzing', 10, 'https://naturschutz.ch/wp-content/uploads/2017/03/Wolf3.jpg', 'https://en.wikipedia.org/wiki/wolf', 'The wolf (Canis lupus), also known as the gray wolf or grey wolf, is a large canine.', '1130 Hietzing', 'Howling', '2020-01-01', 'Greyback', NULL),
(9, 'Bear,1220 Kagran', 6, 'https://i.pinimg.com/originals/46/9f/67/469f67a8ef69ff51bd7aaba540b83f39.jpg', 'https://en.wikipedia.org/wiki/bear', 'Bears are carnivoran mammals of the family Ursidae. They are classified as caniforms.', '1220 Kagran', 'Hunting, eating, sleeping', '2020-01-01', 'Brownbear', NULL),
(10, 'Fish, 1150 Mariahilf', 2, 'https://thepetwiki.com/wp-content/uploads/400px-Goldfish.jpg', 'https://en.wikipedia.org/wiki/fish', 'Fish are gill-bearing aquatic craniate animals that lack limbs with digits.', '1150 Mariahilf', 'swimming', '2020-01-01', 'goldfish', NULL),
(11, 'Cow, 1230 Alterlaa', 15, 'https://cdn.britannica.com/55/174255-050-526314B6/brown-Guernsey-cow.jpg', 'https://en.wikipedia.org/wiki/cattle', 'Cattle, or cows, are the most common type of large domesticated ungulates. ', '1230 Alterlaa', 'Eating, Walking', '2020-01-01', 'Alpen Cow', NULL),
(12, 'Gekkota, 1190 Floridsdorf', 13, 'https://www.das-tierlexikon.de/wp-content/uploads/tokay-gecko.jpg', 'https://en.wikipedia.org/wiki/gekkota', 'Gekkota is an infraorder of squamate reptiles in the suborder Scleroglossa, comprising all geckos and the limbless \"snake-lizards\" of family Pygopodidae.', '1190 Floridsdorf', 'Climbing, sleeping', '2020-01-01', 'Greenback', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'admin', 'admin@admin.com', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', 'admin'),
(2, 'Max Mustermann', 'Muster@admin.com', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', 'admin'),
(3, 'test', 'test@test.com', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', 'user'),
(4, 'John Doe', 'John@test.com', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_id` (`fk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
