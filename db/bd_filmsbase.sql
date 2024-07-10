-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 juil. 2024 à 11:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_filmsbase`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duree` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `description`, `duree`, `image`) VALUES
(1, 'Avatar', 'Avatar nous emmène dans le monde de Pandora, où un homme se lance dans une épopée rythmée par l’aventure et l’amour et se bat pour sauver le seul endroit qu’il considère comme sa maison.', 162, 's-l1600.jpg'),
(2, 'Everything Everywhere All at Once', 'An unlikely hero uses newfound powers to fight fearsome and bewildering dangers from the multiverse.', 150, 'Everything_Everywhere_All_at_Once.jpg'),
(3, 'I, Tonya', 'Competitive ice skater Tonya Harding rises amongst the ranks at the U.S. Figure Skating Championships, but her future in the activity is thrown into doubt when her ex-husband intervenes.', 120, '81TnR95AkML._AC_UF1000,1000_QL80_.jpg'),
(4, '2067', 'A lowly utility worker is called to the future by a mysterious radio signal, he must leave his dying wife to embark on a journey that will force him to face his deepest fears in an attempt to change the fabric of reality and save humankind from its greatest environmental crisis yet.', 130, '1737958.jpg'),
(5, 'Les Trolls 3', 'After lots of flirting, Poppy and Branch are finally together. But when Branch\'s secret past as a pop star comes to light and one of his brothers is kidnapped, he and Poppy embark on a crazy musical adventure to rescue him.', 90, '2138941.webp'),
(6, 'Mission impossible : Dead Reckoning', 'Ethan Hunt et l\'équipe du FMI doivent traquer une nouvelle arme terrifiante qui menace toute l\'humanité si elle tombe entre de mauvaises mains. Avec le contrôle de l\'avenir et le destin du monde en jeu, une course mortelle autour du globe commence.', 160, 's-l1600 (1).jpg'),
(11, 'Star Trek', 'À peine sorti de l\'Académie de Starfleet, le jeune James T. Kirk se retrouve à bord de l\'Enterprise où il fait la connaissance de ceux qui deviendront ses membres d\'équipage et amis; ils partent tous combattre une menace pour la survie de la Terre.', 150, '667587656007f04-00-0519081675.webp'),
(12, 'Garfield : Héros malgré lui', 'Garfield, le célèbre chat d\'intérieur, amateur de lasagnes et qui déteste les lundis, est sur le point d\'être embarqué dans une folle aventure. Après avoir retrouvé son père disparu, Vic, un chat des rues mal peigné, Garfield et son ami le chien Odie, sont forcés de quitter leur quotidien confortable pour aider Vic à accomplir un cambriolage aussi risqué qu\'hilarant.', 90, '667588e8cec3e04-06-32images.jpg'),
(14, 'Les tuches', 'A Bouzolles, tout le monde connaît la famille Tuche. Jeff, Cathy et leurs trois enfants vivent du système D. Respectueuse de la philosophie Tuche, l\'homme n\'est pas fait pour travailler, toute la famille s\'emploie à être heureuse malgré le cruel manque de revenus. Leurs vies étaient toutes tracées. Ils seraient toujours pauvres, mais heureux.', 90, '667ea3f17132301-52-1719732939.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `valeur` tinyint(4) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `valeur`, `idUtilisateur`, `idFilm`) VALUES
(1, 1, 3, 14),
(2, 3, 6, 14),
(3, 5, 4, 1),
(4, 4, 7, 14),
(5, 3, 3, 2),
(7, 5, 3, 12),
(8, 4, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `password`, `image`) VALUES
(3, 'Anaïs', 'anais.aerts@gmail.com', '$2y$12$NGzIglxG5/ZAdwK.TyfEiurIx.VQTui0dBqxt.NusRLUY1SWHPbX.', ''),
(4, 'Kenza', 'k.enza@interface3.be', '$2y$12$8iCgBi1ZXjlQh/0JLW3koOfjqGmSsFVucalAFRaJ7fVR95Vz3To5C', ''),
(6, 'Marwa', 'm.arwa@interface3.be', '$2y$12$WFuSjB51sLWj7n7E656ZT.uvC0rCV4BHf05e.Zbi.yfBxHPqUuEAq', '667ab16955c5102-00-41'),
(7, 'Martha', 'martha@gmail.com', '$2y$12$13dsP5r3tqnGHq4GP1LJ7OIyfONAH0QdrNQ/RyHKAV/YwdhbjqCiO', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idFilm` (`idFilm`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
