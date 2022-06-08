-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 23 oct. 2020 à 02:17
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commune`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `dep` varchar(4) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`cin`, `nom`, `mdp`, `dep`, `dateAdd`) VALUES
('09876543', 'Zaid Dziri', 'azeaze', 'ABCD', '2020-10-22 22:35:20');

-- --------------------------------------------------------

--
-- Structure de la table `demende`
--

CREATE TABLE `demende` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `information` varchar(1000) NOT NULL,
  `departement` varchar(1000) NOT NULL,
  `marjaa` varchar(1000) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `type_reponse` varchar(100) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demende`
--

INSERT INTO `demende` (`id`, `type`, `adresse`, `tel`, `fax`, `email`, `nom`, `information`, `departement`, `marjaa`, `note`, `type_reponse`, `dateAdd`) VALUES
(1, 'شخص طبيعي', 'Rue de martire', '55741943', '22000220', 'driverwalid6@gmail.com', 'walid Sammoud', 'aaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbb', 'ccccccccccccccccccc', 'dddddddddddddd', 'on', '2020-10-22 19:16:01'),
(2, 'شخص معنوي', 'dzadazdazdza', '55515155', '55555555', 'dazzdadazdza@dzadza.dz', 'dzadazadzdza', 'dazzaddazdazadz', 'dazadzadz', 'adzzaddazdaz', 'adzzaddazdaz', 'on', '2020-10-22 19:20:21');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` varchar(4) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `chef_dep` varchar(200) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `nom`, `chef_dep`, `dateAdd`) VALUES
('ABCD', 'Tous', '09876543', '2020-10-22 22:36:03');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(8) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `sujet` varchar(1100) NOT NULL,
  `fichier` varchar(1100) NOT NULL,
  `message` varchar(1100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `dateAdd`, `user`, `admin`, `sujet`, `fichier`, `message`) VALUES
(2, '2020-10-23 01:00:23', '09895752', 'admin@mail.gov', 'بخصوص طلبك رقم #1208', '1603411678.pdf', 'تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، تجربة ، \r\n');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `cin` varchar(8) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  `dateAdd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`cin`, `nom`, `email`, `mdp`, `tel`, `adresse`, `dateAdd`) VALUES
('09895752', 'walid Sammoud', 'driverwalid6@gmail.com', 'azeaze', '55741943', 'Rue de martire', '2020-10-22 18:37:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `demende`
--
ALTER TABLE `demende`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demende`
--
ALTER TABLE `demende`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
