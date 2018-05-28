-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 28 mai 2018 à 09:23
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateArt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `dateArt`) VALUES
(1, 'Article 1', 'Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nCum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.\r\n\r\nEt Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.\r\n', '2018-05-01 12:05:00'),
(2, 'Article 2', 'Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nCum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.\r\n\r\nEt Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', '2018-05-02 16:15:00'),
(3, 'Article 3', 'Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nCum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.\r\n\r\nEt Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', '2018-05-02 22:24:00'),
(4, 'Article 4', 'Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nCum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.\r\n\r\nEt Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', '2018-05-03 10:18:00'),
(5, 'Article 5', 'Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nCum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.\r\n\r\nEt Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.', '2018-05-03 20:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dateCom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `articleId`, `username`, `comment`, `dateCom`, `report`) VALUES
(2, 1, 'Denis', 'Igitur in qui diutius est alio qui etiamsi qui ille.\r\n	', '2018-05-03 20:25:36', 0),
(3, 2, 'Arthur', 'Ibi diu advenit translationem equitum diu potuit discerpti praeteritis supra crebriores Hermogenis filius Gallus Gallus solito discerpti Herculanus discerpti torrentes.\r\n	', '2018-05-03 20:27:41', 0),
(4, 3, 'Jules', 'Ibi diu advenit translationem equitum diu potuit discerpti praeteritis supra crebriores Hermogenis filius Gallus Gallus solito discerpti Herculanus discerpti torrentes.\r\n	', '2018-05-03 20:27:41', 0),
(5, 4, 'Sandra', 'Ibi diu advenit translationem equitum diu potuit discerpti praeteritis supra crebriores Hermogenis filius Gallus Gallus solito discerpti Herculanus discerpti torrentes.\r\n	', '2018-05-03 20:27:41', 0),
(6, 5, 'Léon', 'Ibi diu advenit translationem equitum diu potuit discerpti praeteritis supra crebriores Hermogenis filius Gallus Gallus solito discerpti Herculanus discerpti torrentes.\r\n	', '2018-05-03 20:27:41', 0),
(7, 2, 'Nicolas', 'Celate et orientales bella fas recensere discessit quas nunc non.\r\n	', '2018-05-03 20:29:27', NULL),
(8, 3, 'Mélanie', 'Celate et orientales bella fas recensere discessit quas nunc non.\r\n	', '2018-05-03 20:29:27', NULL),
(9, 4, 'Julie', 'Celate et orientales bella fas recensere discessit quas nunc non.\r\n	', '2018-05-03 20:29:27', NULL),
(10, 5, 'Léa', 'Celate et orientales bella fas recensere discessit quas nunc non.\r\n	', '2018-05-03 20:29:27', NULL),
(11, 1, 'Elodie', 'Puteos sine idcirco nobilissimas se acerbissimum quia et libidines nunc quia insignem quia odium et.\r\n	', '2018-05-03 20:31:05', 0),
(12, 2, 'Damien', 'Puteos sine idcirco nobilissimas se acerbissimum quia et libidines nunc quia insignem quia odium et.\r\n	', '2018-05-03 20:31:05', 0),
(13, 3, 'Quentin', 'Puteos sine idcirco nobilissimas se acerbissimum quia et libidines nunc quia insignem quia odium et.\r\n	', '2018-05-03 20:31:05', NULL),
(14, 4, 'Edouard', 'Puteos sine idcirco nobilissimas se acerbissimum quia et libidines nunc quia insignem quia odium et.\r\n	', '2018-05-03 20:31:05', NULL),
(15, 5, 'Domi', 'Puteos sine idcirco nobilissimas se acerbissimum quia et libidines nunc quia insignem quia odium et.\r\n	', '2018-05-03 20:31:05', NULL),
(16, 3, 'Robert', 'test de commentaire', '2018-05-16 14:52:12', NULL),
(17, 5, 'VIctor', 'Les commentaires fonctionnent pa', '2018-05-16 15:16:12', 1),
(18, 5, 'VIctor', 'Les commentaires fonctionnent pas de problème', '2018-05-16 23:52:03', 0),
(21, 4, 'Elodie', 'Super cet article !! Vivement le prochain', '2018-05-17 00:34:08', NULL),
(22, 4, 'Elodie', 'Super cet article !! Vivement le prochain', '2018-05-17 02:32:19', NULL),
(29, 5, 'test', '&lt;strong&gt;test 2 des balises html&lt;/strong&gt;', '2018-05-17 15:08:05', 1),
(35, 1, '&lt;strong&gt;test&lt;/strong&gt;', 'changement de commentaire dans la partie admin test', '2018-05-23 17:48:21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'Forteroche', '$2y$10$3SvD16a5wQQhFEFl4okHquasPMc/Yz.0/sMlyrcCu7cQoGI3SFyCC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comArticle` (`articleId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comArticle` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
