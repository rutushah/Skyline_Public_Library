-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 07:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

CREATE TABLE `book_detail` (
  `book_id` int(11) NOT NULL,
  `ISBN_number` int(11) NOT NULL,
  `book_name` varchar(25) NOT NULL,
  `author_name` varchar(25) NOT NULL,
  `book_price` float NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_stock_status` tinyint(1) NOT NULL,
  `book_edition` varchar(25) NOT NULL,
  `publish_year` date NOT NULL,
  `rack_no` int(11) NOT NULL,
  `book_status` tinyint(1) NOT NULL,
  `e_book` varchar(255) NOT NULL,
  `book_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_detail`
--

INSERT INTO `book_detail` (`book_id`, `ISBN_number`, `book_name`, `author_name`, `book_price`, `short_description`, `category_id`, `book_stock_status`, `book_edition`, `publish_year`, `rack_no`, `book_status`, `e_book`, `book_image`) VALUES
(25, 41937, 'Sleep the Brave', 'Milton Connelly', 39, 'Quae veniam dignissimos necessitatibus quia illo.Vero qui nam sunt qui voluptatibus adipisci ut.Laud', 22, 0, '9', '0000-00-00', 0, 0, 'book.pdf', 'book_image.jpg'),
(26, 45612100, 'Under a White Sky The Nat', 'Elizabeth Kolbert', 15.23, 'Under a White Sky: The Nature of the Future is a 2021 environmental book by Elizabeth Kolbert. The book follows many of the themes she explored in The Sixth Extinction: An Unnatural History.', 22, 0, '1', '1944-08-16', 8, 0, 'science.pdf', 'science2.jpg'),
(27, 78912100, 'Cosmos', 'Carl Sagan', 10.23, 'Sagan explores 15 billion years of cosmic evolution and the development of science and civilization. He traces the origins of knowledge and the scientific method, mixing science and philosophy, and speculates about the future of science.', 22, 0, '2', '1936-06-09', 8, 0, 'science.pdf', 'science3.jpg'),
(28, 78955500, 'Project Hail Mary: A Nove', ' Andy Weir ', 12.33, 'An irresistible interstellar adventure as only Andy Weir could deliver, Project Hail Mary is a tale of discovery, speculation, and survival to rival The Martian—while taking us to places it never dreamed of going.', 22, 0, '2', '1936-05-18', 8, 0, 'science.pdf', 'science4.jpg'),
(29, 12457896, 'Ivanhoe A romance', 'Walter Scott', 15, 'Walter Scott\'s historical novel Ivanhoe: A Romance is one of the Waverley novels, published in three volumes in 1819. The novel marked Scott\'s transition from writing novels set in the recent past of Scotland to novels set in the Middle Ages of England at', 23, 0, '2', '1929-05-22', 7, 0, 'romance.pdf', 'romance1.jpg'),
(30, 897896, 'The Lover', 'Marguerite Duras', 11.69, 'Long unavailable in hardcover, this edition of The Lover includes a new introduction by Maxine Hong Kingston that looks back at Duras\'s world from an intriguing new perspective—that of a visitor to Vietnam today.', 23, 0, '2', '1999-05-29', 7, 0, 'romance.pdf', 'romance2.jpg'),
(33, 457896, 'On Chesil Beach', 'Ian McEwan', 10.25, '1962, and Florence and Edward are celebrating their wedding in a hotel on the Dorset coast. Yet as they dine, the expectation of their marital duties become overwhelming. Unbeknownst to them both, the decisions they make this night will resonate thro', 23, 1, '2', '1999-09-09', 7, 0, 'romance.pdf', 'romance3.jpg'),
(34, 124578, 'Saturday ', 'Ian McEwan', 17.2, 'Henry Perowne—a neurosurgeon, urbane, privileged, deeply in love with his wife and grown-up children—plans to play a game of squash, visit his elderly mother, and cook dinner for his family. But after a minor traffic accident leads to an unsettling confro', 23, 0, '2', '1993-05-04', 7, 0, 'romance.pdf', 'romance4.jpg'),
(35, 564512, 'Rider to the Sea', 'J.M. Synge', 8.8, 'Riders to the Sea by Irish Literary Renaissance playwright John Millington Synge, First performed at the Molesworth Hall, Dublin, by the Irish National Theater Society on 25 February 1904. Any profits generated from the sale of this book will go towards t', 24, 0, '3', '1998-07-11', 9, 0, 'drama.pdf', 'drama1.jpg'),
(36, 964512, 'The Clean House', 'Sarah Ruhl ', 10.23, 'This extraordinary new play by an exciting new voice in the American drama was runner-up for the Pulitzer Prize. After its acclaimed run at Yale Repertory Theatre it was done to equal acclaim at several major theatres coast to coast before winding up off ', 24, 0, '3', '1998-02-03', 9, 0, 'drama.pdf', 'drama2.jpg'),
(37, 962369, 'The Crucible: A Play in F', 'Arthur Miller ', 9.9, 'Based on historical people and real events, Arthur Miller\'s play uses the destructive power of socially sanctioned violence unleashed by the rumors of witchcraft as a powerful parable about McCarthyism. ', 24, 0, '3', '1992-03-13', 9, 0, 'drama.pdf', 'drama3.jpg'),
(38, 2356897, 'Friction, Lubrication and', ' William T. Lewis ', 25, 'This book was converted from its physical edition to the digital format by a community of volunteers. You may find it for free on the web. Purchase of the Kindle edition includes wireless delivery.\n', 13, 1, '1', '1956-11-11', 3, 0, 'friction.pdf', 'fiction1.jpg'),
(39, 2356101, 'Mad Honey', 'Jodi Picoult ', 17, 'Olivia McAfee knows what it feels like to start over. Her picture-perfect life—living in Boston, married to a brilliant cardiothoracic surgeon, raising their beautiful son, Asher—was upended when her husband revealed a darker side. She never imagined that', 13, 0, '1', '1956-09-21', 3, 0, 'friction.pdf', 'fiction2.jpg'),
(40, 3256101, 'Long Shadows ', 'David Baldacci', 13.12, 'When Amos Decker is called to South Florida to investigate a double homicide, the case appears straightforward: A federal judge and her bodyguard have been found dead, the judge’s face sporting a blindfold with two eye holes crudely cut out, a clear sign ', 13, 0, '1', '1956-10-15', 3, 0, 'friction.pdf', 'fiction3.jpg'),
(41, 785460, 'Our Missing Hearts', 'Celeste Ng', 12.1, 'Twelve-year-old Bird Gardner lives a quiet existence with his loving but broken father, a former linguist who now shelves books in a university library. Bird knows to not ask too many questions, stand out too much, or stray too far. For a decade, their li', 13, 0, '1', '1961-10-04', 3, 0, 'friction.pdf', 'fiction4.jpg'),
(42, 7541203, 'The Picture of Dorian Gra', 'Oscar Wilde', 11, 'A damning portrayal of Victorian society, Wilde used his narrative to chastise his contemporaries for their superfluous and hypocritical values. Having also interspersed homoerotic scenes within the story, The Picture of Dorian Gray was unsurprisingly con', 25, 1, '2', '1912-05-29', 4, 0, 'history.pdf', 'history1.jpg'),
(43, 5441203, 'Battle Cry of Freedom', 'James Macpherson', 9.5, 'James M. McPherson, professor emeritus of U.S. history at Princeton, is one of the foremost scholars of the Civil War. In this informative and meticulously researched masterpiece, he clarifies the differing ways of life and philosophy that led to this sha', 25, 0, '2', '1912-03-04', 4, 0, 'history.pdf', 'history2.jpg'),
(44, 8841203, 'The Liberation Trilogy pa', 'Rick Atkinson', 9.5, 'The liberation of Europe and the destruction of the Third Reich is a story of courage and enduring triumph, of calamity and miscalculation. In this first volume of the Liberation Trilogy, Rick Atkinson shows why no modern learner can understand the ultima', 25, 0, '2', '1915-03-11', 4, 0, 'history.pdf', 'history3.jpg'),
(45, 8841203, 'The Day of Battle: The Wa', 'Rick Atkinson', 5.5, 'The Italian campaign\'s outcome was never certain; in fact, President Roosevelt, Prime Minister Churchill, and their military advisors bitterly debated whether an invasion of the so-called soft underbelly of Europe was even wise. But once underway, the com', 25, 0, '2', '1915-05-13', 4, 0, 'history.pdf', 'history4.jpg'),
(46, 9632587, 'The Murder of Roger Ackro', 'Agatha Christie', 8.2, 'Roger Ackroyd knew too much. He knew that the woman he loved had poisoned her brutal first husband. He suspected, also, that someone had been blackmailing her. Then, tragically, came the news that she had taken her own life with a drug overdose. But the e', 26, 0, '1', '2012-11-10', 6, 0, 'mystery.pdf', 'mystery1.jpg'),
(47, 9632100, 'A Strange Habit of Mind ', 'Andrew Klavan', 28.2, 'The world of Big Tech is full of eccentric characters, but shamanic billionaire Gerald Byrne may be the strangest of the bunch. The founder of Byrner, a global social media platform, Byrne is known for speaking with vague profundity and for dabbling in es', 26, 0, '1', '2013-02-23', 6, 0, 'mystery.pdf', 'mystery2.jpg'),
(48, 632100, 'And Then There Were None ', 'Agatha Christie', 9.6, 'Ten people, each with something to hide and something to fear, are invited to an isolated mansion on Indian Island by a host who, surprisingly, fails to appear. On the island they are cut off from everything but each other and the inescapable shadows of t', 26, 0, '1', '2013-04-15', 6, 0, 'mystery.pdf', 'mystery3.jpg'),
(49, 5632100, 'A Christmas Deliverance: ', 'Anne Perry ', 5, 'Scuff has come a long way from his time as a penniless orphan scraping together a living on the banks of the Thames. Now he’s studying medicine at a free clinic run by Dr. Crowe, a thoughtful if stoic mentor. But lately Crowe has been distracted, having w', 26, 0, '1', '2008-04-15', 6, 0, 'mystery.pdf', 'mystery4.jpg'),
(50, 4589100, 'Ordinary Grace Paperback', 'William Kent Krueger', 8.14, 'New Bremen, Minnesota, 1961. The Twins were playing their debut season, ice-cold root beers were selling out at the soda counter of Halderson’s Drugstore, and Hot Stuff comic books were a mainstay on every barbershop magazine rack. It was a time of innoce', 26, 0, '1', '2014-07-17', 6, 0, 'mystery.pdf', 'mystery5.jpg'),
(51, 84847878, 'New Book', 'Rutu Shah', 10, 'This is the new book added by me', 13, 0, '4', '2021-12-31', 4, 0, 'Cégep de la Gaspésie- Rutu Enrollement Letter.pdf', 'webProgramming.jpg'),
(52, 84847878, 'New Book', 'Rutu Shah', 10, 'This is the new book added by me', 13, 0, '4', '2021-12-31', 4, 0, 'Cégep de la Gaspésie- Rutu Enrollement Letter.pdf', 'webProgramming.jpg'),
(53, 84847878, 'New Book', 'Rutu Shah', 10, 'This is the new book added by me', 13, 0, '4', '2021-12-31', 4, 0, 'Cégep de la Gaspésie- Rutu Enrollement Letter.pdf', 'webProgramming.jpg'),
(54, 84847878, 'New Book', 'Rutu Shah', 10, 'This is the new book added by me', 13, 0, '4', '2021-12-31', 4, 0, 'Cégep de la Gaspésie- Rutu Enrollement Letter.pdf', 'webProgramming.jpg'),
(57, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(58, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(59, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(60, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(61, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(62, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(63, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(64, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg'),
(65, 73264, 'I Know Why the Caged Bird', 'Devon Bauch', 48, 'Omnis totam libero aliquid.Ut accusantium cum ex eos.Ab magni doloremque ullam.Odio officiis ut fuga', 13, 0, '9', '0000-00-00', 6, 0, 'book.pdf', 'book_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `book_issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_issue_date` date NOT NULL,
  `book_return_date` date NOT NULL,
  `book_return_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`book_issue_id`, `user_id`, `book_id`, `book_issue_date`, `book_return_date`, `book_return_status`) VALUES
(15, 88, 27, '2022-11-22', '2022-12-07', 0),
(16, 90, 38, '2022-12-03', '2022-12-18', 0),
(17, 90, 28, '2022-12-03', '2022-12-18', 0),
(18, 88, 30, '2022-12-03', '2022-12-18', 0),
(19, 90, 38, '2022-12-03', '2022-12-18', 1),
(20, 88, 42, '2022-12-03', '2022-12-18', 1),
(21, 88, 33, '2022-12-03', '2022-12-18', 1),
(22, 95, 25, '2022-12-02', '2022-12-17', 1),
(23, 95, 26, '2022-12-02', '2022-12-17', 1),
(24, 95, 41, '2022-10-01', '2022-10-16', 0),
(25, 95, 42, '2022-11-10', '2022-11-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `category_status` int(15) DEFAULT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`, `category_image`) VALUES
(13, 'Folklore', 0, 'fiction.png'),
(22, 'Science', 0, 'science.jpg'),
(23, 'Romance', 0, 'romance.jpg'),
(24, 'Drama', 0, 'drama.jpg'),
(25, 'History', 0, 'history.jpg'),
(26, 'Mystery', 0, 'mystery.jpg'),
(40, 'Programming', 0, 'webProgramming.jpg'),
(42, 'Folklore', 0, 'category_image.jpg'),
(43, 'test1', 0, '20200707_191249.jpg'),
(44, 'Reference book', 0, 'category_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `library_setting`
--

CREATE TABLE `library_setting` (
  `library_id` int(11) NOT NULL,
  `library_name` varchar(25) NOT NULL,
  `library_address` varchar(255) NOT NULL,
  `library_contact` varchar(10) NOT NULL,
  `library_email` varchar(255) NOT NULL,
  `book_return_day_limit` int(11) NOT NULL,
  `membership_price` float NOT NULL,
  `fine_per_day` float NOT NULL,
  `book_issue_limit` int(11) NOT NULL,
  `opening_time` varchar(25) NOT NULL,
  `closing_time` varchar(25) NOT NULL,
  `library_status` tinyint(1) NOT NULL,
  `important_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_setting`
--

INSERT INTO `library_setting` (`library_id`, `library_name`, `library_address`, `library_contact`, `library_email`, `book_return_day_limit`, `membership_price`, `fine_per_day`, `book_issue_limit`, `opening_time`, `closing_time`, `library_status`, `important_message`) VALUES
(1, 'Skyline Public Library', '37573 Hane Ports', '5142334392', 'skyline@gmail.com', 15, 50, 2, 3, '09:00', '05:00', 0, '                                                                                                                                        This is skyline                                                                                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `residence_proof` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `registration_date`, `user_status`, `image`, `residence_proof`, `user_role`) VALUES
(15, 'Admin', 'admin', 'admin@gmail.com', '4567894547', '$2y$10$weYom3ec29WK/AXwN2cL4OVLF270Pnxc32iqj5h4k.yxtX2Bw9eNu', '4578 abbourt road', '2022-11-22', 0, 'admin.png', 'admin_address.png', 1),
(16, 'Staff', 'staff', 'staff@gmail.com', '4561237897', '$2y$10$koemaAGDZTElbS8p/d94POaDKBVZP.iSH/iKHzrRMo1Y6gr.1Crme', '78978 bourret avenue', '2022-11-22', 0, 'staff.jpg', 'staff_address.jpg', 3),
(17, 'Staff1', 'staff1', 'staff1@gmail.com', '7894561478', '$2y$10$1B7SBrdVAcRE9X7705mgIeFIZiooT6us8VvhUzaSJXPCOXCY5gOXS', '1234 guy road', '2022-11-22', 0, 'staff1.jpg', 'staff_address.jpg', 3),
(18, 'Kasi', 'Bashirian', 'Kasi99@gmail.com', '2072928915', '$2y$10$b2MIjw1apcjNVsw1DtjVbuacq8tL8GrzbqNwbEwgDz6MXPG3MIPF6', '9013 Jovan Brooks', '2022-12-02', 0, 'Profile_pic.jpg', 'Photo_id.jpg', 3),
(19, 'Son', 'Wehner', 'Son106@gmail.com', '2467236478', '$2y$10$6nlsd5tTs1YHTtzptmmdwO2weHQCnRs3LiM.oOzapmveXni4ScCyi', '438 Roob Mission', '2022-12-02', 0, 'Profile_pic.jpg', 'Photo_id.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `registration_date` date NOT NULL,
  `pet_name` varchar(25) NOT NULL,
  `mother_name` varchar(25) NOT NULL,
  `birth_place` varchar(25) NOT NULL,
  `fine` float NOT NULL,
  `user_unique_id` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `residence_proof` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `account_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_id`, `password`, `user_status`, `contact_number`, `address`, `payment_status`, `registration_date`, `pet_name`, `mother_name`, `birth_place`, `fine`, `user_unique_id`, `image`, `residence_proof`, `user_role`, `account_status`) VALUES
(87, 'James', 'wells', 'jameswells123@gmail.com', '$2y$10$JgnJ4Ao3bPEFCDYQzw4wvODjrlp1ZLiPCw5kDnd4JK6Q1hfCi02WG', 0, '7895565222', '2547 avenue newroad', 1, '2022-11-22', 'petuser1', 'motheruser1', 'placeuser1', 0, 'JA15682S', 'user1.jpg', 'user1_address.jpg', 2, 1),
(88, 'Alexis', 'Synge', 'alexissynge@gmail.com', '$2y$10$3qMcjyi6LhLdWiuhZpHYUOl2/t1Rf2g7xpAn2bHAm6C/ha4xRYV4S', 0, '7895656472', '7887 avenue jurresy', 0, '2022-11-22', 'petuser2', 'motheruser2', 'placeuser2', 30, 'AL37481E', 'user2.jpg', 'user2_address.jpg', 2, 0),
(89, 'Emma', 'Wilde', 'emmawilde@gmail.com', '$2y$10$4ia9rq6AzR2Kb.Kq5AACO.4zmXcagv6qTUYW4AFIiNLX/eLblw1dS', 0, '1547468989', '2345 newroad stafford', 1, '2022-11-22', 'petuser3', 'motheruser3', 'placeuser3', 0, 'EM76656E', 'user3.jpg', 'user3_address.jpg', 2, 1),
(90, 'Rutu', 'Shah', 'rutushah105@gmail.com', '$2y$10$lY/40.iKyflhL3Wk5KDn2OeawoVCtBOhKlW8BMnw2Nnn8DKiEClgC', 0, '5575133578', '556 Kulas Route', 0, '2022-11-29', 'Detu', 'Ripalben', 'bayad', 50, 'RU20691H', 'Snapchat-38789691.jpg', 'Snapchat-34957722.jpg', 2, 0),
(91, 'Odilia', 'Lindgren', 'Odilia147@gmail.com', '$2y$10$VrDJHjiNB4vbIC1vzLX7DO3taU8xLt3gJJ7/rpRIeajnjstonMDNe', 0, '6995918433', '05456 Simon Crossroad', 1, '2022-12-04', 'camel', 'Sanora Keeling', 'Jacobsfort', 0, 'OD96978N', 'Profile_pic.jpg', 'Photo_id.jpg', 2, 1),
(92, 'Lincoln', 'Koelpin', 'Lincoln231@gmail.com', '$2y$10$m56Zw5tvu.ba0o4lCJg3Ouv90L4grRc6mYDHRv2.98NKaPh2RqQTC', 0, '5500758789', '5943 Ron Rapids', 1, '2022-12-04', 'mink', 'Paris Collier', 'Guadalupeview', 0, 'LI88045N', 'Profile_pic.jpg', 'Photo_id.jpg', 2, 1),
(93, 'Jethalal', 'Gada', 'jethalal@gmail.com', '$2y$10$9B95sR/ooqhfu2tRZIOwzuCOREHHGbupz0hcgtgu0Q7pAVpRxEn8.', 0, '5142334585', '1645 boulevard de maissonneuve', 1, '2022-12-04', 'Detu', 'Babita', 'Bhachau', 0, 'JE83707A', 'Profile_pic.jpg', 'Photo_id.jpg', 2, 1),
(94, 'Glady', 'Upton', 'Glady113@gmail.com', '$2y$10$MsEZTSTJq8jAld8dt0faIuUcwbCtCYRMzHuE9HRH60Y6Ah6oZ3RGa', 0, '6009270086', '33017 Blythe Ranch', 1, '2022-12-04', 'yak', 'Herschel Pouros DDS', 'South Myung', 0, 'GL4477N', 'Profile_pic.jpg', 'Photo_id.jpg', 2, 1),
(95, 'Unnati', 'Patel', 'unnatipatelxyz@gmail.com', '$2y$10$l1kOVbuyVLNGFYraEE10AOfEp2MvqzLE3Y4JxxWioK2PFCBhSjAn.', 0, '4545655655', ' 318 ave bourret montreal', 0, '2022-12-02', 'petunnati', 'motherunnati', 'placeunnati', 94.0833, 'UN18998L', 'women_coat.jpg', 'women_banner.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_detail`
--
ALTER TABLE `book_detail`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`book_issue_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `library_setting`
--
ALTER TABLE `library_setting`
  ADD PRIMARY KEY (`library_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_detail`
--
ALTER TABLE `book_detail`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `book_issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `library_setting`
--
ALTER TABLE `library_setting`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_detail`
--
ALTER TABLE `book_detail`
  ADD CONSTRAINT `book_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD CONSTRAINT `book_issue_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `book_issue_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book_detail` (`book_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
