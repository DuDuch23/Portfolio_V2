-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 nov. 2023 à 00:38
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

CREATE TABLE `accueil` (
  `photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `mot_de_passe`) VALUES
(1, 'Mathieu.C', '$argon2i$v=19$m=65536,t=4,p=1$by9rQTRSSS4uRHVQSm9Jbg$9aQ19IVXpePL9f+CudOeMkuga0cT4LbWC/Aqz8yiFl0'),
(2, 'admin', '$argon2i$v=19$m=65536,t=4,p=1$QU1FanlqVi9jRE1OenRzcA$HUFkIlD435MPxmeY30Cn3HXhJtG/PbcCLcA0wvd64cQ');

-- --------------------------------------------------------

--
-- Structure de la table `message_portfolio`
--

CREATE TABLE `message_portfolio` (
  `id_message` int(11) NOT NULL,
  `nom_message` varchar(50) NOT NULL,
  `prenom_message` varchar(50) NOT NULL,
  `email_message` varchar(255) NOT NULL,
  `sujet_message` varchar(100) NOT NULL,
  `contenu_message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message_portfolio`
--

INSERT INTO `message_portfolio` (`id_message`, `nom_message`, `prenom_message`, `email_message`, `sujet_message`, `contenu_message`) VALUES
(7, 'Duchemin', 'Alexandre', 'alexduduch77@gmail.com', 'fezpiofjaefr', 'aurnfmaernfmaenfmajnfkajnflkanrfkajenf aurnfmaernfmaenfmajnfkajnflkanrfkajenf \r\naurnfmaernfmaenfmajnfkajnflkanrfkajenf aurnfmaernfmaenfmajnfkajnflkanrfkajenf aurnfmaernfmaenfmajnfkajnflkanrfkajenf aurnfmaernfmaenfmajnfkajnflkanrfkajenf \r\n'),
(11, 'DuDuch', 'Alex', 'alexduduch77@gmail.com', 'demande-offre', 'blablabltest\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(255) NOT NULL,
  `description_projet` text NOT NULL,
  `technos_projet` varchar(255) NOT NULL,
  `image_projet` varchar(255) NOT NULL,
  `alt_img_projet` varchar(100) NOT NULL,
  `temps_realisation_projet` varchar(100) NOT NULL,
  `lien_projet` text NOT NULL,
  `lien_github` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `description_projet`, `technos_projet`, `image_projet`, `alt_img_projet`, `temps_realisation_projet`, `lien_projet`, `lien_github`) VALUES
(1, 'CV Alex Johnson', 'Premier projet d\'intégration de BTS SIO 1er année', 'html, css', 'alex.png', 'alex-johnson', '1 semaines', 'https://aduchemin.lyceestvincent.fr/Projet_1_cv/CV-Alex-Johnson.html', 'https://github.com/DuDuch23/Projet-1-cv.git'),
(2, 'Disney+', 'Deuxième projet d\'intégration de première année de BTS SIO en groupe de deux avec une maquette', 'html, css, Js', 'disney+-logo.png', 'logo disney+', '2 semaines', 'https://aduchemin.lyceestvincent.fr/Projet_2_Disney+/Disney+.html', 'https://github.com/DuDuch23/Projet_2_Disney.git'),
(3, 'Projet CSE (Lycée Saint-Vincent)', 'Projet de fin d\'année d\'un site CSE pour le lycée Saint Vincent de Senlis en groupe de 3', 'html, css, php, js', 'logo-lsv.png', 'logo-lsv', '2 mois', 'https://aduchemin.lyceestvincent.fr/Projet-CSEV2/accueil.php', ''),
(4, 'Footclub', 'Projet d\'intégration POO (PhP Orienté Objet)', 'html, css, php (poo)', 'ballon_foot.webp', 'ballon de foot', '3 semaines', 'https://aduchemin.lyceestvincent.fr/Projet-CSEV2/footclub/public/index.php', 'https://github.com/DuDuch23/footclub.git'),
(5, 'testFinal', 'testFinal', 'testFinal', 'cafe-noir.jpeg', 'testFinal', '56h', 'https://tesdt.com', ''),
(6, 'test', 'test', 'test', 'c81.jpg', 'test', '51h', 'https://test.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

CREATE TABLE `techno` (
  `id-techno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` int(11) NOT NULL,
  `date_timeline` varchar(255) NOT NULL,
  `image_technos_timeline` varchar(255) NOT NULL,
  `nom_technos_timeline` varchar(255) NOT NULL,
  `texte_timeline` text NOT NULL,
  `alt_img_technos_timeline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `date_timeline`, `image_technos_timeline`, `nom_technos_timeline`, `texte_timeline`, `alt_img_technos_timeline`) VALUES
(1, '2017', 'html5.png', 'HTML5', 'J\'ai acquis des compétences en HTML grâce à des formations en ligne, pendant mes cours de BTS SIO (Services Informatiques aux Organisations) et à la pratique, par le biais d\'éxercice en cours et surtout par la réalisation de Projets m\'ayant permis d\'approndir mes connaissances.', 'html5'),
(2, '2017-2022', 'CSS3.png', 'Css3', 'Tout en acquisissant des compétences et connaissances en HTML, je me suis mis à apprendre le language css que j\'ai vite adopter et approfondit pendant mes cours et projets. Je suis assez aisé dans ce language et possède assez de facilité à intégrer du css en HTML et PhP.', 'css3'),
(3, 'Novembre 2022', 'cSharp.png', 'C#', 'Je pratique le C# en cours de BTS SIO (Services Informatiques aux Organisations), je possède les bases du language et mes connaissances s\'approfondissent de cours en cours par des exercices dans lesquels nous programmons des applications type .NET.', 'C#'),
(4, 'Janvier 2023', 'php.png', 'Php', 'Je pratique le php en général, ce language me fascine, il est celui que je maîtrise le mieux de tout les languages ayant appris. Mes connaissances dans ce language sont approfondis, grâce à un professionnel lors de mes cours de BTS SIO, des projets en PHP et des ressources en lignes.\r\n\r\n', 'php'),
(5, '2023', 'js.png', 'JavaScript', 'Je pratique et apprend le JavaScript dans mes projet et pendant mon temps libre. Mes connaissances en JavaScript ne sont pas encore approfondi mais je me renseigne et l\'apprends.\r\n\r\n', 'js');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `prenom_utilisateur` varchar(100) NOT NULL,
  `email_utilisateur` varchar(255) NOT NULL,
  `img_profil_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `email_utilisateur`, `img_profil_utilisateur`) VALUES
(1, 'Duchemin', 'Alexandre', 'alexduduch77@gmail.com', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `message_portfolio`
--
ALTER TABLE `message_portfolio`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `message_portfolio`
--
ALTER TABLE `message_portfolio`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
