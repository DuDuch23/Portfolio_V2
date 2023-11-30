-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 sep. 2023 à 04:00
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
-- Base de données : `cse`
--

-- --------------------------------------------------------

--
-- Structure de la table `billeterie`
--

CREATE TABLE `billeterie` (
  `billet_id` int(11) NOT NULL,
  `nom_billet` varchar(50) NOT NULL,
  `texte_billet` text NOT NULL,
  `date_debut_validite_billet` date NOT NULL,
  `date_fin_validite_billet` date NOT NULL,
  `nombre_place_min_billet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billeterie`
--

INSERT INTO `billeterie` (`billet_id`, `nom_billet`, `texte_billet`, `date_debut_validite_billet`, `date_fin_validite_billet`, `nombre_place_min_billet`) VALUES
(1, 'Tarif familiale', 'Tarif familiale parc astérix 15€ moins de 12 ans et 10€ pour les moins de 10 ans', '2023-05-23', '2023-09-01', 50),
(2, 'Tarif familiale', 'Tarif familiale parc astérix 15€ moins de 12 ans et 10€ pour les moins de 10 ans', '2023-05-23', '2023-09-01', 50),
(3, 'Tarif familiale', 'Tarif familiale parc astérix 15€ moins de 12 ans et 10€ pour les moins de 10 ans', '2023-05-23', '2023-09-01', 50),
(4, 'Tarif familiale', 'Tarif familiale parc astérix 15€ moins de 12 ans et 10€ pour les moins de 10 ans', '2023-05-23', '2023-09-01', 50),
(5, 'Billet Disneyland Paris', 'Tarif jeune 10€ pour les mineur(e)s, tarifs\r\nétudiants 8€', '2023-04-01', '2023-08-31', 20),
(6, 'Billet Disneyland Paris', 'Tarif jeune 10€ pour les mineur(e)s, tarifs\r\nétudiants 8€', '2023-04-01', '2023-08-31', 20);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id_droit` int(11) NOT NULL,
  `libelle_droit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `nom_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `info_accueil`
--

CREATE TABLE `info_accueil` (
  `id_info_accueil` int(11) NOT NULL,
  `num_tel_info_accueil` int(11) NOT NULL,
  `email_info_accueil` varchar(255) NOT NULL,
  `emplacement_bureau_info_accueil` varchar(255) NOT NULL,
  `titre_info_accueil` varchar(255) NOT NULL,
  `texte_info_accueil` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `nom_message` varchar(100) NOT NULL,
  `prenom_message` varchar(100) NOT NULL,
  `adresse_mail_message` varchar(255) NOT NULL,
  `contenu_message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `nom_message`, `prenom_message`, `adresse_mail_message`, `contenu_message`) VALUES
(14, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(15, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(16, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(17, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(18, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(19, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(21, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(22, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(23, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(24, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'zlzibnfzarkhfbmeaigbmergnmoeqjtngoetjngoemtjçunh\r\n'),
(25, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'Bonjour , \r\nje vblalal   gtigjitg \r\ng rgojgrijg #A10000 alexandre duchemubn je vosu contacte pour blabla bla #A10000#A10000#A10000\r\nMerci'),
(26, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour '),
(27, 'Duchemin', 'Alexandre', 'alexandre.duchemin@lyceestvincent.fr', 'bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour bonjoour '),
(30, 'efgref', 'ergezgez', 'gezrtgeg@gmail.com', 'ezrfzerfezrfezrf'),
(31, 'efgref', 'ergezgez', 'gezrtgeg@gmail.com', 'ezrfzerfezrfezrf');

-- --------------------------------------------------------

--
-- Structure de la table `partenariats`
--

CREATE TABLE `partenariats` (
  `partenaire_id` int(11) NOT NULL,
  `partenaire_nom` varchar(250) NOT NULL,
  `texte_partenaire` varchar(250) NOT NULL,
  `lien_partenaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenariats`
--

INSERT INTO `partenariats` (`partenaire_id`, `partenaire_nom`, `texte_partenaire`, `lien_partenaire`) VALUES
(1, 'alexandre', 'vente chocolat bla bla bla bla', 'https://chocolat.fr'),
(2, 'alexandre', 'vente chocolat bla bla bla bla', 'https://chocolat.fr'),
(3, 'alexandre', 'vente chocolat bla bla bla bla', 'https://chocolat.fr'),
(4, 'alexandre', 'vente chocolat bla bla bla bla', 'https://chocolat.fr'),
(5, 'alexandre', 'vente chocolat bla bla bla bla', 'https://chocolat.fr'),
(6, 'alexandre', 'vente chocolat bla bla bla bla', 'https://chocolat.fr'),
(7, 'Leonidas', 'Réduction sur les boites de chocolat, jusqu\'à -20% sur les boites chocolat blanc', 'https://leonidas.fr'),
(8, 'Leonidas', 'Réduction sur les boites de chocolat, jusqu\'à -20% sur les boites chocolat blanc', 'https://leonidas.fr'),
(9, 'Leonidas', 'Réduction sur les boites de chocolat, jusqu\'à -20% sur les boites chocolat blanc', 'https://leonidas.fr');

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE `sondage` (
  `id_sondage` int(11) NOT NULL,
  `question` text NOT NULL,
  `firstChoice` varchar(255) NOT NULL,
  `secondChoice` varchar(255) NOT NULL,
  `thirdChoice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sondage`
--

INSERT INTO `sondage` (`id_sondage`, `question`, `firstChoice`, `secondChoice`, `thirdChoice`) VALUES
(1, 'Pour quel parc d\'attraction souhaiteriez-vous obtenir des prix ?', 'Le parc Astérix', 'Le parc Disneyland', 'Le futuroscope');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `prenom_utilisateur` varchar(100) NOT NULL,
  `email_utilisateur` varchar(255) NOT NULL,
  `password_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billeterie`
--
ALTER TABLE `billeterie`
  ADD PRIMARY KEY (`billet_id`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id_droit`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `info_accueil`
--
ALTER TABLE `info_accueil`
  ADD PRIMARY KEY (`id_info_accueil`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `partenariats`
--
ALTER TABLE `partenariats`
  ADD PRIMARY KEY (`partenaire_id`);

--
-- Index pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`id_sondage`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billeterie`
--
ALTER TABLE `billeterie`
  MODIFY `billet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id_droit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_accueil`
--
ALTER TABLE `info_accueil`
  MODIFY `id_info_accueil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `partenariats`
--
ALTER TABLE `partenariats`
  MODIFY `partenaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `id_sondage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
