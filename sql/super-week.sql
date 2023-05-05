-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 mai 2023 à 10:45
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `super-week`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `content`, `id_user`) VALUES
(1, '1984', 'George Orwell\'s dystopian novel about a society ruled by an authoritarian government that monitors every aspect of citizens lives.', 1),
(2, 'To Kill a Mockingbird', 'Harper Lee\'s classic novel set in the Deep South during the Great Depression, which explores themes of racial injustice, prejudice, and the loss of innocence.', 1),
(3, 'The Catcher in the Rye', 'J.D. Salinger\'s coming-of-age novel that follows the rebellious teenager Holden Caulfield as he navigates the complexities of adolescence and adulthood.', 1),
(4, 'The Great Gatsby', 'F. Scott Fitzgerald\'s novel set in the Roaring Twenties that explores the decadence, excess, and moral decay of the era through the eyes of the mysterious Jay Gatsby.', 2),
(5, 'Animal Farm', 'Another of George Orwell\'s classic works, Animal Farm is a political allegory that tells the story of a group of farm animals who rebel against their human farmer and establish their own society, only to see it corrupted and taken over by a tyrannical pig.', 2),
(6, 'Brave New World', 'Aldous Huxley\'s dystopian novel set in a future society that has achieved stability and happiness through the suppression of individuality, emotions, and free will.', 2),
(7, 'Pride and Prejudice', 'Jane Austen\'s classic novel set in Georgian England, which follows the Bennet sisters as they navigate the social customs and expectations of their time in pursuit of love and marriage.', 3),
(8, 'Wuthering Heights', 'Emily Bronte\'s novel set on the Yorkshire moors, which tells the story of the passionate and destructive love between Heathcliff and Catherine Earnshaw.', 3),
(9, 'The Lord of the Rings', 'J.R.R. Tolkien\'s epic fantasy trilogy that follows the hobbit Frodo Baggins and his companions as they embark on a quest to destroy the One Ring and defeat the Dark Lord Sauron.', 3),
(10, 'The Hobbit', 'J.R.R. Tolkien\'s prequel to The Lord of the Rings, which follows the hobbit Bilbo Baggins as he sets out on a journey with a group of dwarves to reclaim their treasure from the dragon Smaug.', 2),
(11, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling\'s first novel in the Harry Potter series, which follows the eponymous young wizard as he discovers his magical heritage and attends Hogwarts School of Witchcraft and Wizardry.', 2),
(12, 'The Da Vinci Code', 'Dan Brown\'s mystery thriller that follows symbologist Robert Langdon and cryptologist Sophie Neveu as they investigate a murder at the Louvre Museum and unravel a conspiracy involving the Holy Grail and the Catholic Church.', 2),
(13, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams\'s comedic science fiction series that follows the misadventures of human Arthur Dent and alien Ford Prefect as they travel through space and time.', 3),
(14, 'The Hunger Games', 'Suzanne Collins\'s dystopian trilogy set in a post-apocalyptic North America, which follows Katniss Everdeen as she becomes a symbol of rebellion against the oppressive Capitol.', 3),
(15, 'Crime and Punishment', 'A novel that explores themes of guilt, redemption, and the nature of evil through the story of a young man who commits a murder.', 3),
(16, 'Book 16', 'Content of book 16', 4),
(17, 'Book 17', 'Content of book 17', 4),
(18, 'Book 18', 'Content of book 18', 6),
(19, 'Book 19', 'Content of book 19', 6),
(20, 'L\'Étranger', 'Albert Camus est né à Mondovi en Algérie en 1913. Journaliste, Camus est un homme engagé. Dès 1936, il publie ses premières œuvres, des essais et une pièce de théâtre. Il déménage en France pendant l’année 1940.', 21);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'john.doe@gmail.com', 'John', 'Doe', '$2y$10$7CfSZyjKv2X68egR8j5.LOBP5zZc3m3HTjKpTw35Jk6vpLsmmKjmu'),
(2, 'jane.doe@hotmail.com', 'Jane', 'Doe', '$2y$10$v2n1kAFNkwFeU6XZU1B0l.zBZJLp7/N/iUG0fHLI2Q0nbzhAMJrQ2'),
(3, 'bob.smith@sfr.fr', 'Bob', 'Smith', '$2y$10$8Jg6xIMyMKf7tLqWlZTEAOzZgERryZn2vJOhhR8juFVxIHZtKjYF6'),
(4, 'alice.smith@gmail.com', 'Alice', 'Smith', '$2y$10$pzsKjG.mSvdSxWb6jJU6buZGYlFZLJmIcUR.Vsj/ZBtkyUPr41oi2'),
(5, 'peter.johnson@hotmail.com', 'Peter', 'Johnson', '$2y$10$kq3jDnAG/FlgMLOxhLJMC.m3l9B1ZGvjzVLjWJ8R7vBaQZYtK0Fzm'),
(6, 'julia.brown@sfr.fr', 'Julia', 'Brown', '$2y$10$NZrA2h1.SgtXzX9Zlr01VOH1LlZaFhzyEBgAd6jJy6SjU6GzNT7Ha'),
(7, 'mark.taylor@gmail.com', 'Mark', 'Taylor', '$2y$10$liiixldjpupvPHMKIUXW8.cpsnmZDhqVZebd57LlLO0igzQvQeW7m'),
(8, 'lisa.garcia@hotmail.com', 'Lisa', 'Garcia', '$2y$10$Nl6TquVKhEKNy6GRS7JpveDwUgV7U1Zm4cnV3JUnKGgkLE28OFzX2'),
(9, 'robert.wilson@sfr.fr', 'Robert', 'Wilson', '$2y$10$jFRJl0MWllydIHDKtPTPUe5GDEQJUXAQi5DC5jFOon5c5NNNCK1nW'),
(10, 'sarah.anderson@gmail.com', 'Sarah', 'Anderson', '$2y$10$xl5c5Fr5Gm/lPH7zX9yQxum3qPmLdPmFsvlLZvxRfrHlmjCvOeqT6'),
(11, 'david.lee@sfr.fr', 'David', 'Lee', '$2y$10$i4saxs3QIgF7W8zH/Zx60uzMC0/sEY0kiBMLRWUMsjfi/fL0lbiFe'),
(12, 'john.smith@gmail.com', 'John', 'Smith', '$2y$10$6PpG/IXyC6UbzQr1r3qf3.OvGfmWbzInO2O4.d3q3kzvF5Wguy8lS'),
(13, 'jane.doe@hotmail.com', 'Jane', 'Doe', '$2y$10$RYnmWzX8uzA0wdY38AYFi.pBZtWyWxrsn0AeLOEJxBvQF1nWzXimK'),
(14, 'bob.johnson@sfr.fr', 'Bob', 'Johnson', '$2y$10$bdzN/ROX5S5S5N5P6.qJU.TFhU6HdRdSHpUyJsbBMrC9XO2r/yq3a'),
(15, 'alice.brown@gmail.com', 'Alice', 'Brown', '$2y$10$y9J07s.ZdYsYsRJ5kf5p5.zdyF5J5H5DXl4QXai3DqY.BKknYDfzW'),
(16, 'peter.taylor@hotmail.com', 'Peter', 'Taylor', '$2y$10$kkwbzmm0p.7gZETn1ZwnsOZkFm7NY03cln9uV7/jjYrtTcV7FegbW'),
(17, 'julia.anderson@sfr.fr', 'Julia', 'Anderson', '$2y$10$pl8YYvGk4jMw2F3MliS5OeFl5oh5DJ/u.tB6jXUk.nbr2vFJZ7VwG'),
(18, 'mark.smith@gmail.com', 'Mark', 'Smith', '$2y$10$tCGgZPugjwTWwEQmG.KCWeDmIjMvT.Q1xQk9/RRKj8oGZIzxBJwR6'),
(19, 'lisa.johnson@hotmail.com', 'Lisa', 'Johnson', '$2y$10$ymZ81FWL.hEzAbLwdYrK8eKcLb7iG0X9AVRU81ecZIvCZLsEwajbu'),
(20, 'robert.brown@sfr.fr', 'Robert', 'Brown', '$2y$10$zJmfi/w.PahbxKjV7L8yv.EuLIqbRz9HXo4W4NzVTv4hKjQw3q5BW'),
(21, 'martin.michel@gmail.com', 'Martin', 'Michel', '$2y$10$g4kHqEOlIAEGmKvbRkDTteKkJKcv8STueGvWnPx3cCnL8.5GlSXJe'),
(22, 'toto@gmail.com', 'Tata', 'Tata', '$2y$10$krzf58fy3/zYGScbJKUX6.52Y2lD4tQAzSB/7c6EMfKNmYROo2xku');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
