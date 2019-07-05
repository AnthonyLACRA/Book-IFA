-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 05, 2019 at 10:14 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress_infos`
--

CREATE TABLE `adress_infos` (
  `adress_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `town` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adress_infos`
--

INSERT INTO `adress_infos` (`adress_id`, `user_id`, `num`, `street`, `zip`, `town`) VALUES
(1, 1, 20, 'RUE DU CHAMP', 57000, 'METZ');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birth_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `gender`, `birth_date`) VALUES
(1, 'J.K. Rowling', 'femme', '0000-00-00 00:00:00'),
(2, 'Stephen King', 'homme', '0000-00-00 00:00:00'),
(3, 'Hal Elrod', 'homme', '0000-00-00 00:00:00'),
(4, 'Olivier Roland', 'femme', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `cover` text,
  `release_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kind` varchar(100) NOT NULL,
  `format` varchar(60) NOT NULL DEFAULT 'Grand format',
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `cover`, `release_date`, `kind`, `format`, `cost`) VALUES
(1, 'Harry Potter à l\'école des sorciers', 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener à Poudlard, une école de sorcellerie ! Voler en balai, jeter des sorts, combattre les trolls : Harry se révèle un sorcier doué. Mais un mystère entoure sa naissance et l\'effroyable V., le mage dont personne n\'ose prononcer le nom.', 'https://m.media-amazon.com/images/I/91xhO-xKwLL._AC_UL436_.jpg', '2019-04-23 07:40:31', 'fantasy', 'broché', 25),
(3, 'Harry potter et la chambre des secrets', 'Une rentrée fracassante en voiture volante, une étrange malédiction quis\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos ! Entre les cours de potions magiques, les matchs de Quidditch et les combats de mauvais sorts, Harry et ses amis Ron et Hermione trouveront-ils le temps de percer le mystère de la Chambre des Secrets ?', 'https://images-na.ssl-images-amazon.com/images/I/51SXJtzUeML._SX346_BO1,204,203,200_.jpg', '2019-04-23 07:40:56', 'fantasy', 'broché', 24),
(6, 'Harry potter et le prisonier d\'Azkaban', 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherche Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa troisième rentrée. Au programme : des cours de divination, la fabrication d\'une potion de Ratatinage, le dressage des hippogriffes... Mais Harry est-il vraiment à l\'abri du danger qui le menace ?', 'https://images-na.ssl-images-amazon.com/images/I/51Fu0v5LcfL._SX346_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'fantasy', 'broché', 26),
(7, 'Harry Potter et la coupe de feu', 'Harry Potter a quatorze ans et entre en quatrième année à Poudlard. Une grande nouvelle attend Harry, Ron et Hermione à leur arrivée : la tenue d\'un tournoi de magie exceptionnel entre les plus célèbres écoles de sorcellerie. Déjà les délégations étrangères font leur entrée. Harry se réjouit... Trop vite. Il va se trouver plongé au cœur des événements les plus dramatiques qu\'il ait jamais eu à affronter.', 'https://images-na.ssl-images-amazon.com/images/I/51TxleRCAfL._SX346_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'fantasy', 'broché', 23),
(9, 'L\'Outsider', 'Le Diable peut avoir de nombreux visages. Et s\'il avait le vôtre ?\r\n\r\nLe corps martyrisé d\'un garçon de onze ans est retrouvé dans le parc de Flint City. Témoins et empreintes digitales désignent aussitôt le coupable : Terry Maitland, l\'un des habitants les plus respectés de la ville, entraîneur de l\'équipe locale de baseball, professeur d\'anglais, marié et père de deux fillettes. Et les résultats des analyses d\'ADN ne laissent aucun doute. Dossier classé. À un détail près : Terry Maitland a un alibi en béton. Et des preuves tout aussi irréfutables que les preuves qui l\'accusent.\r\nQui se cache derrière ce citoyen au-dessus de tout soupçon ?', 'https://images-na.ssl-images-amazon.com/images/I/51IC7Z8Ab5L._SX321_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'horreur', 'poche', 14),
(10, 'Simetierre', 'Louis Creed, un jeune médecin de Chicago, vient s’installer avec sa famille à Ludlow, petite bourgade du Maine. Leur voisin, le vieux Jud Crandall, les emmène visiter le pittoresque « simetierre » où des générations d’enfants ont enterré leurs animaux familiers. Mais, au-delà de ce « simetierre », tout au fond de la forêt, se trouvent les terres sacrées des Indiens, lieu interdit qui séduit pourtant par ses monstrueuses promesses.\r\nUn drame atroce va bientôt déchirer l’existence des Creed, et l’on se trouve happé dans un suspense cauchemardesque…\r\nSimetierre, classé au premier rang des best-sellers mondiaux, avant ça ou Misery, a été adapté au cinéma par Stephen King lui-même et réalisé par Mary Lambert.', 'https://images-na.ssl-images-amazon.com/images/I/41IWP7bQwKL._SX307_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'horreur', 'poche', 15),
(11, 'Sleeping beauties', 'Un phénomène inexplicable s\'empare des femmes à travers la planète : une sorte de cocon les enveloppe durant leur sommeil et si l\'on tente de les réveiller, on prend le risque de les transformer en véritables furies vengeresses.\r\nBientôt, presque toutes les femmes sont touchées par la fièvre Aurora et le monde est livré à la violence des hommes.\r\nÀ Dooling, petite ville des Appalaches, une seule femme semble immunisée contre cette maladie. Cas d\'étude pour la science ou créature démoniaque, la mystérieuse Evie échappera-t-elle à la fureur des hommes dans un monde qui les prive soudainement de femmes ?', 'https://images-na.ssl-images-amazon.com/images/I/51hVfzk884L._SX321_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'horreur', 'broché', 25),
(12, 'Miracle Morning', 'Debout ! Vous avez rendez-vous avec le succès.\r\n\r\nQuel est le point commun entre Richard Branson, patron de Virgin, Anna Wintour, directrice du Vogue US, Tim Cook (Apple), Marissa Mayer (Yahoo !) ? Le succès ? Certainement. Un emploi du temps de ministre ? Aussi. Mais surtout un secret jusqu\'ici bien gardé, et lumineux une fois révélé. Toutes ces personnalités ont l\'habitude de se lever avant l\'aube, et de démarrer leur journée par une à deux heures rien qu\'à eux. Deux heures pour faire du sport, méditer, se cultiver, mettre en route leur journée... Devenir meilleur, en somme !\r\nSe lever tôt, d\'accord, mais comment et pour quoi faire ?\r\nAvant 8 heures impérativement, et d\'un bond, sans se laisser la possibilité de tergiverser.\r\nEn sachant très clairement comment remplir cette heure ou ces deux heures que l\'on s\'offre, comme un supplément de vie.\r\nEn profitant de ce moment calme, sans téléphone ni mails, pendant que la maisonnée dort, pour méditer, faire du sport, écrire, lire mais surtout, préparer les objectifs de sa journée, à chaque fois comme une nouvelle petite aventure à entamer.Un livre motivant, inspirant, à la portée de tous.', 'https://images-na.ssl-images-amazon.com/images/I/41CrxRZCFLL._SX309_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'développement personnel', 'poche', 7),
(13, 'Tout le monde n\'a pas eu la chance de rater ses études', 'Vous en avez assez du métro-boulot-dodo, ou de ces études interminables dans lesquelles vous apprenez surtout des choses qui ne vous serviront pas ? Brisez la routine et réussissez en dehors du système en suivant cette méthode étape par étape basée sur l\'expérience de centaines d\'entrepreneurs et appuyée par plus de 400 références scientifiques. ', 'https://images-na.ssl-images-amazon.com/images/I/51cC-CinJHL._SX355_BO1,204,203,200_.jpg', '2019-04-23 07:41:50', 'développement personnel', 'poche', 6);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(1, 1),
(3, 1),
(6, 1),
(7, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 3),
(13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paiement` varchar(255) NOT NULL DEFAULT 'paypal',
  `address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `paiement`, `address`, `order_date`) VALUES
(1, 1, 'MasterCard', '20 RUE DU CHAMP 57000, METZ', '2019-07-05 12:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_content`
--

CREATE TABLE `order_content` (
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_content`
--

INSERT INTO `order_content` (`order_id`, `book_id`, `quantity`) VALUES
(1, 1, 1),
(1, 3, 1),
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT 'h',
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `inscription_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `gender`, `email`, `password`, `inscription_date`) VALUES
(1, 'lacrabere', 'h', 'anthony.lacrabere@gmail.com', '7be83b4ef9d5215598daac16fb957479dd2dce87', '2019-07-05 11:58:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress_infos`
--
ALTER TABLE `adress_infos`
  ADD PRIMARY KEY (`adress_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD KEY `auteurs_livres_ibfk_1` (`author_id`),
  ADD KEY `auteurs_livres_ibfk_2` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_ibfk_1` (`user_id`);

--
-- Indexes for table `order_content`
--
ALTER TABLE `order_content`
  ADD KEY `contenu_commande_ibfk_2` (`book_id`),
  ADD KEY `id_commande` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress_infos`
--
ALTER TABLE `adress_infos`
  MODIFY `adress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_content`
--
ALTER TABLE `order_content`
  ADD CONSTRAINT `order_content_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_content_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
