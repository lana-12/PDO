-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 sep. 2023 à 14:53
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `paginaire`
--
CREATE DATABASE IF NOT EXISTS `paginaire` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `paginaire`;

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` bigint(13) NOT NULL,
  `title` varchar(250) NOT NULL,
  `author` varchar(25) NOT NULL,
  `type` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `type`, `image`, `description`) VALUES
(2, 'Le Seigneur des Anneaux', 'J.R.R. Tolkien', 'Fantasy', 'livre.jpg', 'Une épopée fantastique dans un monde rempli de magie, d\'elfes et d\'anneaux magiques.'),
(4, 'Harry Potter et la coupe de feu', 'J.K. Rowling', 'Fantasy jeunesse', 'livre.jpg', 'Les aventures d\'un jeune sorcier découvrant le monde de la magie et encore pleins d\'aventure'),
(5, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'Conte philosophique', 'livre.jpg', 'Les rencontres du Petit Prince sur différentes planètes et ses réflexions sur la vie.'),
(6, 'Orgueil et Préjugés', 'Jane Austen', 'Roman romantique', 'livre.jpg', 'Une histoire de romance et de classe sociale dans la société britannique du 19e siècle.'),
(8, 'Le Nom de la Rose', 'Umberto Eco', 'Roman historique', 'livre.jpg', 'Une enquête policière dans un monastère au Moyen Âge.'),
(9, 'Le Hobbit', 'J.R.R. Tolkien', 'Fantasy jeunesse', 'livre.jpg', 'Les aventures de Bilbo le Hobbit lorsqu\'il est entraîné dans une quête inattendue.'),
(10, 'Le Rouge et le Noir', 'Stendhal', 'Roman psychologique', 'livre.jpg', 'Les ambitions d\'un jeune homme en France au 19e siècle.'),
(12, 'Le Comte de Monte-Cristo', 'Alexandre Dumas', 'Aventure', 'livre.jpg', 'La vengeance d\'Edmond Dantès après avoir été trahi et emprisonné.'),
(13, 'Le Meilleur des mondes', 'Aldous Huxley', 'Science-fiction dystopique', 'livre.jpg', 'Un monde futuriste où la société est contrôlée par la science.'),
(14, 'Les Trois Mousquetaires', 'Alexandre Dumas', 'Aventure', 'livre.jpg', 'Les aventures des mousquetaires Athos, Porthos, Aramis et d\'Artagnan.'),
(15, 'La Guerre des mondes', 'H.G. Wells', 'Science-fiction', 'livre.jpg', 'L\'invasion de la Terre par des martiens.'),
(16, 'Le Portrait de Dorian Gray', 'Oscar Wilde', 'Roman gothique', 'livre.jpg', 'La décadence morale d\'un jeune homme immortalisé dans un portrait.'),
(17, 'Le Vieil Homme et la Mer', 'Ernest Hemingway', 'Roman court', 'livre.jpg', 'La lutte d\'un vieux pêcheur contre un énorme poisson.'),
(18, 'Moby-Dick', 'Herman Melville', 'Aventure', 'livre.jpg', 'La quête obsessionnelle du capitaine Achab pour capturer la baleine blanche.'),
(19, 'Frankenstein', 'Mary Shelley', 'Roman gothique', 'livre.jpg', 'La création d\'une créature monstrueuse par le scientifique Victor Frankenstein... '),
(20, 'L\'Odyssée', 'Homère', 'Épopée', 'livre.jpg', 'Les aventures du héros grec Ulysse lors de son voyage pour retourner chez lui après la guerre de Troie.'),
(997, 'Avengers : Endgame', 'Anthony et Joe Russo', 'Super Héro', NULL, 'Au lendemain de la défaite contre Thanos, qui a anéanti d\'un claquement de doigt la moitié de l\'univers, les Avengers restants sont confrontés à la plus grande de toutes leurs épreuves : trouver en eux-mêmes la force de se relever et découvrir le moyen de vaincre Thanos une fois pour toutes.'),
(998, 'Le Seigneur des Anneaux', 'J.R.R. Tolkien', 'Fantasy', NULL, 'Un roman épique de fantasy.'),
(999, '1984', 'George Orwell', 'Science-fiction', NULL, 'Une dystopie politique.'),
(1000, 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 'Fantasy', NULL, 'Le début de la série Harry Potter.'),
(1001, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'Conte', NULL, 'Un conte philosophique.'),
(1002, 'L\'Alchimiste', 'Paulo Coelho', 'Roman', NULL, 'Un roman spirituel.'),
(1003, 'Orgueil et Préjugés', 'Jane Austen', 'Romance', NULL, 'Un roman classique de la littérature anglaise.'),
(1004, 'Le Hobbit', 'J.R.R. Tolkien', 'Fantasy', NULL, 'Une aventure fantastique.'),
(1005, 'Le Nom de la Rose', 'Umberto Eco', 'Mystère', NULL, 'Un roman historique et mystérieux.'),
(1006, 'La Nuit des temps', 'René Barjavel', 'Science-fiction', NULL, 'Une histoire d\'amour à travers le temps.'),
(1007, 'La Guerre des mondes', 'H.G. Wells', 'Science-fiction', NULL, 'L\'invasion des Martiens sur Terre.'),
(1008, 'Les Misérables', 'Victor Hugo', 'Roman', NULL, 'Une histoire de rédemption.'),
(1009, 'Le Comte de Monte-Cristo', 'Alexandre Dumas', 'Aventure', NULL, 'Une histoire de vengeance.'),
(1010, 'Le Meilleur des mondes', 'Aldous Huxley', 'Science-fiction', NULL, 'Une dystopie futuriste.'),
(1011, 'Fahrenheit 451', 'Ray Bradbury', 'Science-fiction', NULL, 'La censure et la destruction des livres.'),
(1012, 'La Bible', 'Divers auteurs', 'Religion', NULL, 'Le livre sacré du christianisme.'),
(1013, 'Le Rouge et le Noir', 'Stendhal', 'Roman', NULL, 'Un roman sur l\'ascension sociale.'),
(1014, 'Guerre et Paix', 'Léon Tolstoï', 'Roman', NULL, 'Un roman historique sur la Russie.'),
(1015, 'Crime et Châtiment', 'Fiodor Dostoïevski', 'Roman', NULL, 'Un roman psychologique.'),
(1016, 'Le Portrait de Dorian Gray', 'Oscar Wilde', 'Roman', NULL, 'Un roman sur la vanité et la corruption.'),
(1017, 'Le Vieil Homme et la Mer', 'Ernest Hemingway', 'Roman', NULL, 'La lutte d\'un pêcheur contre un énorme poisson.'),
(1018, 'Le Cycle de Dune', 'Frank Herbert', 'Science-fiction', NULL, 'Une saga de science-fiction.'),
(1019, 'Les Hauts de Hurle-Vent', 'Emily Brontë', 'Roman', NULL, 'Une histoire de passion et de vengeance.'),
(1020, 'Moby Dick', 'Herman Melville', 'Aventure', NULL, 'La quête du capitaine Achab pour tuer la baleine blanche.'),
(1021, 'Le Parfum', 'Patrick Süskind', 'Roman', NULL, 'L\'histoire d\'un tueur en série obsédé par les odeurs.'),
(1022, 'La Ferme des animaux', 'George Orwell', 'Satire', NULL, 'Une satire politique.'),
(1023, 'Les Fourmis', 'Bernard Werber', 'Science-fiction', NULL, 'Une saga de science-fiction sur les fourmis.'),
(1024, 'Le Trône de fer', 'George R.R. Martin', 'Fantasy', NULL, 'Une saga de fantasy.'),
(1025, 'La Recherche du temps perdu', 'Marcel Proust', 'Roman', NULL, 'Une exploration de la mémoire et du temps.'),
(1026, 'Le Château', 'Franz Kafka', 'Roman', NULL, 'Une histoire kafkaïenne d\'un homme confronté à la bureaucratie.'),
(1027, 'L\'Odyssée', 'Homère', 'Épopée', NULL, 'Le voyage d\'Ulysse pour retourner chez lui.'),
(1028, 'L\'Étranger', 'Albert Camus', 'Roman', NULL, 'Un roman philosophique sur l\'absurdité de la vie.'),
(1029, 'Les Trois Mousquetaires', 'Alexandre Dumas', 'Aventure', NULL, 'Les aventures des mousquetaires d\'Anne de France.'),
(1030, 'Le Lion, la Sorcière blanche et l\'Armoire magique', 'C.S. Lewis', 'Fantasy', NULL, 'Le début de la série Le Monde de Narnia.'),
(1031, 'L\'Attrape-cœurs', 'J.D. Salinger', 'Roman', NULL, 'L\'histoire de Holden Caulfield.'),
(1032, 'Les Raisins de la colère', 'John Steinbeck', 'Roman', NULL, 'La vie des familles pendant la Grande Dépression.'),
(1033, 'Le Portrait de la jeune fille en feu', 'Céline Sciamma', 'Drame', NULL, 'Une histoire d\'amour interdite au XVIIIe siècle.'),
(1034, 'Le Silmarillion', 'J.R.R. Tolkien', 'Fantasy', NULL, 'L\'histoire de la Terre du Milieu.'),
(1035, 'La Divine Comédie', 'Dante Alighieri', 'Épopée', NULL, 'Un voyage à travers l\'Enfer, le Purg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
