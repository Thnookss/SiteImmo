-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mariadb
-- Généré le : jeu. 15 fév. 2024 à 09:08
-- Version du serveur : 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lrimmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'omnis', 'earum-animi-vitae-debitis-commodi-praesentium'),
(2, 'dolorem', 'adipisci-dolores-rerum-est-itaque'),
(3, 'et', 'amet-nihil-odio-et-eius'),
(4, 'qui', 'enim-sit-et-sed-debitis-sed'),
(5, 'ratione', 'quisquam-rerum-velit-est-dolorem-saepe-dolorem-sed');

-- --------------------------------------------------------

--
-- Structure de la table `category_has_users`
--

CREATE TABLE `category_has_users` (
  `category_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DPE`
--

CREATE TABLE `DPE` (
  `id` int(11) NOT NULL,
  `isvalid` tinyint(1) NOT NULL,
  `note` varchar(1) NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `DPE`
--

INSERT INTO `DPE` (`id`, `isvalid`, `note`, `createdat`, `updatedat`) VALUES
(2, 1, 'A', '2024-02-14 10:06:43', '2024-02-14 10:06:43'),
(3, 1, 'C', '2024-02-14 10:06:52', '2024-02-14 10:06:52'),
(4, 1, 'B', '2024-02-14 10:06:55', '2024-02-14 10:06:55');

-- --------------------------------------------------------

--
-- Structure de la table `DTA`
--

CREATE TABLE `DTA` (
  `id` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `MPCA` varchar(1) NOT NULL,
  `isvalid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `DTA`
--

INSERT INTO `DTA` (`id`, `createdate`, `updatedate`, `type`, `MPCA`, `isvalid`) VALUES
(2, '2024-02-14 10:04:46', '2024-02-14 10:04:46', 'test', '1', 1),
(3, '2024-02-14 10:05:02', '2024-02-14 10:05:02', 'test1', '1', 0),
(4, '2024-02-14 10:05:13', '2024-02-14 10:05:13', 'test2', '0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `elecDiag`
--

CREATE TABLE `elecDiag` (
  `id` int(11) NOT NULL,
  `updatedate` datetime NOT NULL,
  `createdate` datetime NOT NULL,
  `isvalid` tinyint(1) NOT NULL,
  `eqlist` longtext NOT NULL,
  `properties_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `elecDiag`
--

INSERT INTO `elecDiag` (`id`, `updatedate`, `createdate`, `isvalid`, `eqlist`, `properties_id`) VALUES
(2, '2024-02-14 10:05:25', '2024-02-14 10:05:25', 1, 'four', NULL),
(3, '2024-02-14 10:05:39', '2024-02-14 10:05:39', 1, 'frigo', NULL),
(4, '2024-02-14 10:05:52', '2024-02-14 10:05:52', 0, 'gaziniere', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `equipements`
--

CREATE TABLE `equipements` (
  `id$` int(11) NOT NULL,
  `rooms_total` int(11) NOT NULL,
  `bedrooms_total` int(11) NOT NULL,
  `floors` tinyint(1) NOT NULL,
  `floors_total` int(11) DEFAULT NULL,
  `attic` tinyint(1) NOT NULL,
  `furnished_house` tinyint(1) NOT NULL,
  `yard` tinyint(1) NOT NULL,
  `cave` tinyint(1) NOT NULL,
  `properties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gazDiag`
--

CREATE TABLE `gazDiag` (
  `id` int(11) NOT NULL,
  `isvalid` tinyint(1) NOT NULL,
  `hasanomaly` tinyint(1) NOT NULL,
  `anomalytype` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `gazDiag`
--

INSERT INTO `gazDiag` (`id`, `isvalid`, `hasanomaly`, `anomalytype`) VALUES
(2, 1, 0, ''),
(3, 0, 1, 'AB1'),
(4, 1, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `image_cover` tinyint(1) NOT NULL,
  `properties_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `totroom` varchar(255) NOT NULL,
  `nroom` varchar(255) NOT NULL,
  `desc1` mediumtext NOT NULL,
  `desc2` mediumtext NOT NULL,
  `superficie` varchar(255) NOT NULL,
  `address_zip` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_complement` varchar(255) NOT NULL,
  `address_geo` varchar(255) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `price` varchar(255) NOT NULL,
  `fees` float NOT NULL,
  `comm` float DEFAULT NULL,
  `vendor_givename` varchar(255) NOT NULL,
  `vendor_familyname` varchar(255) NOT NULL,
  `vendor_phone` varchar(255) NOT NULL,
  `vendor_mobile` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_webpage` varchar(255) NOT NULL,
  `datecreate` date DEFAULT NULL,
  `dateupdate` date DEFAULT NULL,
  `datedelete` date DEFAULT NULL,
  `gazDiag_id` int(11) NOT NULL,
  `DTA_id` int(11) NOT NULL,
  `DPE_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `properties`
--

INSERT INTO `properties` (`id`, `title`, `totroom`, `nroom`, `desc1`, `desc2`, `superficie`, `address_zip`, `address_city`, `address_street`, `address_complement`, `address_geo`, `currency`, `price`, `fees`, `comm`, `vendor_givename`, `vendor_familyname`, `vendor_phone`, `vendor_mobile`, `vendor_email`, `vendor_webpage`, `datecreate`, `dateupdate`, `datedelete`, `gazDiag_id`, `DTA_id`, `DPE_id`, `users_id`, `category_id`, `transaction`, `type`) VALUES
(142267, 'UNE SUPER MAISON ECLATAX', '8', '6', 'JE VAIS ME PENDRE', 'Quas quis quidem impedit laudantium nesciunt vitae qui.', '101', '90680', 'Marsilly', '14 Rue des Goélands', '67, avenue Claude Bodin', '-1.1425929,46.2288675', 'BZD', '542803', 3319, 4, 'Émilie', 'Buisson', '+33 6 24 94 68 68', '05 69 76 72 98', 'thibaut40@besnard.com', 'http://guillou.fr/ex-vel-quae-aut-molestias-et.html', '2023-02-01', '2024-02-14', '2019-06-22', 2, 2, 2, 2, 2, 'For rent', 'Apartment'),
(142268, 'Et qui a quia et nobis deserunt vel.', '5', '10', 'Voluptatem iste repellat non iusto.', 'Cupiditate et dolor nisi fugiat necessitatibus.', '415', '31648', 'Ramos', '429, avenue Daniel Lebon', '63, place Turpin', '78.704785,165.986119', 'USD', '512327', 3614, 7, 'Antoinette', 'Mercier', '+33 1 72 78 73 13', '+33 9 30 35 90 38', 'celina.briand@leconte.net', 'http://bodin.net/', '2022-01-03', '2022-11-10', '2021-12-16', 2, 2, 2, 2, 2, '', ''),
(142269, 'Maiores est omnis labore ad iusto omnis.', '2', '7', 'A aliquid quo aut velit asperiores.', 'Dolorem quis impedit expedita sapiente enim eum atque.', '238', '43436', 'VidalBourg', '33, place Berger', '99, place de Giraud', '-4.399558,74.605847', 'SDG', '641923', 4004, 1, 'Zacharie', 'Leclerc', '+33 1 00 03 57 81', '02 43 68 41 65', 'guibert.claudine@letellier.fr', 'https://www.prevost.net/molestias-qui-porro-atque-atque-dignissimos-itaque-odit', '2018-01-05', '2023-10-31', '2014-07-10', 2, 2, 2, 2, 2, '', ''),
(142270, 'Eius in dolorem quae.', '1', '9', 'Est tempore adipisci cum sit eum omnis.', 'Nam eum numquam consequuntur fugiat.', '66', '98098', 'Martins', '68, rue de Launay', '461, chemin de Perez', '0.376737,-50.373748', 'SEK', '750684', 3803, 1, 'Denis', 'Bodin', '+33 (0)1 34 93 01 35', '+33 (0)1 39 26 02 85', 'rbouvier@faivre.org', 'https://guillon.net/quaerat-officia-reiciendis-nam-ducimus-ad-ut.html', '2016-01-28', '2020-10-02', '2019-12-31', 2, 2, 2, 2, 2, '', ''),
(142271, 'Apganan', '7', '3', 'Minima vitae ut praesentium.', 'Qui pariatur amet eos et.', '653', '77563', 'avenue Blanchet', '52', 'rue Bernadette Duhamel', '-88.398154,151.228929', 'MZN', '647355', 6719, 3, 'Margot', 'Bertrand', '+33 9 59 72 39 41', '0992460502', 'genevieve50@grondin.net', 'http://boulanger.net/molestiae-est-reiciendis-fugiat-esse-et', '2014-03-13', '2024-02-14', '2017-02-16', 2, 2, 2, 2, 2, 'For sale', 'Apartment'),
(142272, 'APPART A CHIER (vraiment pas ouf)', '1', '1', 'ACHETTE PAS CEST POURRAVE', 'Enim voluptatem animi tenetur ab nesciunt.', '1', '17138', 'Saint-Xandre', '13 Rue des Gerboises', '983, avenue Eugène Bourdon', '-1.0996135,46.2084274', 'DOP', '90837469', 5914, 7, 'Laure', 'Lecoq', '0360583705', '+33 2 20 62 29 09', 'edouard23@bonnin.fr', 'http://www.gilles.fr/', '2024-01-26', '2024-02-14', '2019-02-12', 2, 2, 2, 2, 2, 'For sale', 'Apartment'),
(142273, 'en vrai pas ouff', '6', '8', 'Occaecati voluptatum iure provident voluptas numquam ut debitis.', 'Rem et quia nobis aperiam totam aspernatur.', '35', '81025', 'impasse de Camus', '33', '7, rue de Blanchet', '84.376916,-112.415312', 'MUR', '92837', 4035, 7, 'Marine', 'Bouvet', '+33 6 59 46 82 66', '06 21 43 99 76', 'olivier.marthe@roux.com', 'http://godard.fr/deserunt-distinctio-consequuntur-ipsam-quia-et', '2022-08-29', '2024-02-14', '2022-12-02', 2, 2, 2, 2, 2, 'For sale', 'Apartment'),
(142274, 'Ullam velit consequatur expedita dicta nulla magni.', '7', '8', 'Ut tenetur et quia corporis quam mollitia.', 'Exercitationem repellendus facilis alias omnis rerum rerum.', '35', '20832', 'Dumasdan', '76, place Daniel Albert', 'chemin de Chauveau', '81.240302,161.555407', 'PLN', '376311', 7268, 1, 'Frédéric', 'Potier', '01 61 30 74 37', '+33 (0)9 26 31 85 58', 'adrien.dasilva@gillet.com', 'https://www.diaz.org/repudiandae-corrupti-eveniet-sed-recusandae-ipsum', '2018-12-25', '2014-11-08', '2017-06-06', 2, 2, 2, 16, 2, 'For rent', 'House'),
(142275, 'Omnis mollitia voluptate quo impedit dolor velit fugiat.', '2', '2', 'Et laborum aut tempore iure iusto dolorum.', 'Dolores in fugit laborum qui.', '862', '48888', 'Joly', '76, chemin Henry', '8, rue de Raymond', '-15.549341,33.727098', 'EUR', '755166', 3213, 9, 'Pénélope', 'Vallet', '0898429666', '0793776408', 'pierre99@poirier.net', 'http://coste.net/quis-consequatur-dolores-enim-iure', '2019-11-08', '2022-12-30', '2022-05-08', 2, 2, 2, 16, 2, 'For sale', 'Appartment'),
(142276, 'Nihil cumque nihil tenetur.', '6', '4', 'Eos in commodi necessitatibus reiciendis neque.', 'Quam dicta dolor ducimus qui illo minus.', '137', '66995', 'Camus', '189, chemin de Georges', '9, avenue de Begue', '-15.602291,-80.181439', 'KES', '214129', 6072, 2, 'Daniel', 'Barthelemy', '0147394134', '0377814256', 'thibault.mahe@lemonnier.fr', 'http://masson.fr/', '2018-05-19', '2023-01-18', '2023-07-12', 2, 2, 2, 16, 2, 'For rent', 'Commercial'),
(142277, 'Praesentium voluptate voluptas dicta at fugit rerum itaque.', '4', '1', 'Asperiores sunt odit minus occaecati ut deleniti ea.', 'Commodi error sapiente itaque.', '99', '76410', 'Martinsnec', '23, chemin de Hernandez', '7, rue Frédéric Blanchard', '69.580125,50.630291', 'INR', '981463', 9435, 6, 'Michelle', 'Blot', '0696544292', '+33 7 79 02 15 62', 'sebastien18@poirier.com', 'http://www.gilbert.fr/', '2021-05-09', '2021-07-12', '2018-01-14', 2, 2, 2, 16, 2, 'For rent', 'House'),
(142278, 'Laborum hic aut dignissimos deserunt et commodi qui.', '8', '10', 'At et voluptatem soluta.', 'Quisquam aut eaque provident sed.', '241', '61893', 'Jourdan', '97, impasse Emmanuel Cordier', '18, place Rémy Legros', '4.812365,-65.236756', 'CNY', '903215', 326, 5, 'Luce', 'Mahe', '0330243685', '+33 (0)3 59 62 15 56', 'christine16@cousin.fr', 'http://www.sanchez.fr/', '2019-06-12', '2015-10-27', '2014-03-19', 2, 2, 2, 16, 2, 'For sale', 'House'),
(142279, 'Perferendis non sit eum fugiat.', '8', '10', 'Facilis nobis pariatur consequatur aut accusamus qui.', 'Maxime qui tempore voluptatibus nesciunt sunt perferendis.', '884', '13885', 'Sanchez', '71, rue Gosselin', '81, rue de Carpentier', '37.411055,-13.037108', 'RSD', '694806', 673, 3, 'Vincent', 'Bernard', '06 78 85 21 03', '05 71 05 44 15', 'zpottier@lombard.com', 'http://fernandez.fr/incidunt-quibusdam-dolorem-accusantium-molestiae-et-mollitia-qui-aliquid.html', '2018-02-04', '2016-02-04', '2021-09-19', 2, 2, 2, 16, 2, 'For rent', 'Appartment'),
(142280, 'Impedit omnis saepe voluptates qui doloribus rerum aut eos.', '7', '2', 'Sunt quos voluptatem nulla.', 'Et illo consequatur soluta sit incidunt sed.', '890', '39665', 'Delahayeboeuf', '72, chemin de Vaillant', '44, impasse de Perrot', '73.206215,-51.177567', 'LAK', '181209', 7687, 5, 'Pauline', 'Charpentier', '04 88 84 43 40', '+33 (0)5 42 06 55 33', 'imartin@hamel.com', 'http://www.roux.org/et-inventore-sit-consequuntur-corrupti-accusamus-dignissimos-ducimus-temporibus', '2014-10-24', '2015-09-02', '2020-05-15', 2, 2, 2, 16, 2, 'For rent', 'Appartment'),
(142281, 'Veniam quia similique et dolorem.', '1', '6', 'Qui inventore praesentium et voluptas at.', 'Explicabo provident fuga nihil neque quaerat.', '92', '40513', 'Morel-sur-Gillet', 'place Andre', '63, avenue Margaux Valette', '56.984124,-30.573243', 'TZS', '828488', 2958, 6, 'André', 'Poulain', '+33 (0)5 50 13 49 90', '06 37 43 04 17', 'gilbert.pruvost@valette.com', 'http://fernandez.fr/quam-molestiae-ut-sint-voluptate-sit', '2015-02-10', '2018-09-20', '2014-10-29', 2, 2, 2, 16, 2, 'For sale', 'House'),
(142282, 'Minus qui libero ut quae.', '6', '2', 'Aut nesciunt quas dolore iste totam et rem.', 'Dolore neque consequatur sit reprehenderit libero non eaque.', '269', '91092', 'Leduc-la-Forêt', 'rue Julie Lebreton', '56, chemin Collet', '-69.216866,-17.367128', 'MMK', '925217', 4005, 10, 'Michelle', 'Chevalier', '+33 1 02 09 71 86', '+33 2 36 63 09 71', 'pasquier.bernard@pelletier.com', 'http://guillon.com/cumque-corrupti-et-minima-a-aut-beatae-ullam.html', '2019-02-23', '2019-02-09', '2017-09-13', 2, 2, 2, 16, 2, 'For rent', 'Land'),
(142283, 'Minima est et sed magni doloribus eius aut.', '4', '9', 'Consequuntur ipsam et placeat illum similique eius.', 'Dolorum consequatur eveniet et qui ut.', '776', '48003', 'Becker-sur-Baudry', '474, place Patricia Lamy', '49, impasse Becker', '-54.744455,-39.444038', 'NAD', '477091', 6804, 1, 'Pénélope', 'Lemaire', '01 81 86 06 88', '+33 (0)1 43 74 86 65', 'mvalette@delorme.fr', 'http://www.bourdon.com/autem-optio-quae-in-suscipit-excepturi', '2020-08-17', '2022-05-10', '2019-05-31', 2, 2, 2, 16, 2, 'For rent', 'Appartment'),
(142284, 'Blanditiis sunt est velit quia quod ut.', '7', '4', 'Aspernatur perspiciatis laudantium maiores inventore qui.', 'Blanditiis reprehenderit sit laudantium fuga.', '635', '78131', 'Gallet', 'rue de Masson', '78, chemin de Bonnin', '5.68315,80.689752', 'EUR', '766438', 8342, 1, 'Bernadette', 'Bousquet', '09 17 40 50 54', '+33 (0)9 25 80 59 08', 'margaud.teixeira@lagarde.fr', 'http://bodin.com/ipsam-eius-temporibus-et-enim-ut-et-earum', '2016-01-20', '2019-03-08', '2016-09-28', 2, 2, 2, 22, 2, 'For rent', 'Appartment'),
(142285, 'Et itaque neque magnam quis quis sit.', '5', '1', 'Sit consectetur cumque quis harum voluptate facere perspiciatis ab.', 'Facere dolorem blanditiis voluptas eius minus.', '571', '42600', 'Boutin', '74, avenue Pichon', '15, avenue de Laurent', '-49.036669,-9.041728', 'KES', '896863', 6665, 4, 'Jeannine', 'Meyer', '05 47 69 03 52', '05 60 43 89 49', 'barthelemy.madeleine@munoz.com', 'http://www.bertrand.org/saepe-quos-labore-possimus-quo-quo-sed', '2022-12-04', '2017-11-04', '2020-12-18', 2, 2, 2, 22, 2, 'For sale', 'Land'),
(142286, 'Repellat aut quaerat voluptas qui illum explicabo eveniet.', '6', '3', 'Animi libero quia minima.', 'Autem deserunt quod repellat ipsum nisi temporibus.', '881', '87080', 'Riou-sur-Mer', '64, place Allain', '398, rue Rossi', '-29.304035,-173.163873', 'JPY', '402566', 7439, 7, 'Benoît', 'Sauvage', '0515040535', '03 23 78 68 15', 'suzanne.joubert@carpentier.com', 'http://robert.fr/', '2019-08-28', '2022-01-30', '2019-04-13', 2, 2, 2, 22, 2, 'For sale', 'Commercial'),
(142287, 'Explicabo et magni consequatur culpa sed est qui et.', '7', '1', 'Occaecati et animi officiis.', 'Facilis earum dolore ut earum impedit similique mollitia.', '970', '48002', 'Rolland', '2, place Marie Humbert', 'impasse Susan Leleu', '25.005022,-65.267608', 'MUR', '629868', 3635, 5, 'Philippe', 'Voisin', '0222666053', '0891965804', 'celina12@blondel.com', 'https://www.legros.com/sint-qui-explicabo-soluta-in-soluta-voluptate-harum', '2018-09-14', '2015-10-30', '2017-12-05', 2, 2, 2, 22, 2, 'For rent', 'Land'),
(142288, 'Fugiat ut qui similique deserunt deserunt esse commodi molestiae.', '2', '10', 'Asperiores blanditiis labore blanditiis beatae.', 'Sequi commodi consequuntur est ratione pariatur.', '958', '48127', 'Giraud', '352, rue Brunet', '60, boulevard Cousin', '-31.681638,-23.571516', 'AUD', '711416', 7116, 7, 'Jules', 'Rey', '02 66 74 13 30', '08 92 93 45 18', 'thibaut.joubert@cousin.fr', 'http://www.petitjean.net/id-perferendis-molestiae-quis-enim-corporis-at.html', '2022-06-10', '2015-05-04', '2021-03-24', 2, 2, 2, 22, 2, 'For rent', 'Appartment'),
(142289, 'Neque aut odit quaerat officiis ipsum.', '7', '1', 'Voluptatem expedita repellendus autem est enim rerum animi.', 'Ut voluptas maiores eos non voluptate pariatur voluptate reprehenderit.', '984', '02788', 'Maillot-la-Forêt', '79, chemin Julien Gregoire', '712, place de Leduc', '-41.576949,11.883005', 'BHD', '757394', 6374, 4, 'William', 'Jacquot', '+33 (0)2 49 72 35 56', '+33 1 41 05 31 85', 'helene30@paul.net', 'http://martin.fr/quia-numquam-fugit-dolorum-consequuntur', '2014-04-17', '2018-01-22', '2019-03-03', 2, 2, 2, 22, 2, 'For sale', 'Commercial'),
(142290, 'Rerum ipsam adipisci qui officiis corrupti.', '5', '6', 'Tempora delectus impedit similique suscipit.', 'In et voluptas molestiae architecto facere commodi dolorem.', '466', '84082', 'Laine', '637, place de Delattre', '265, avenue Letellier', '7.249473,-115.577868', 'ZMW', '529640', 9286, 3, 'Zacharie', 'Thibault', '+33 (0)3 95 36 31 62', '+33 (0)8 25 60 01 56', 'gosselin.michele@bonnin.fr', 'http://joubert.com/ex-mollitia-dolorum-aut-hic-iusto', '2017-12-01', '2015-10-26', '2020-01-21', 2, 2, 2, 22, 2, 'For sale', 'House'),
(142291, 'Saepe iusto amet soluta earum.', '6', '8', 'Eos sit ex illo doloribus praesentium fugit.', 'Magni omnis ex et maiores et reiciendis qui.', '922', '42759', 'Michaud', '30, chemin Nicole Bourdon', '69, boulevard de Gay', '-51.722282,-56.002999', 'TZS', '305210', 7036, 7, 'Isabelle', 'Martin', '08 05 40 36 03', '0397375182', 'letellier.bertrand@martineau.fr', 'http://dijoux.fr/', '2015-02-14', '2020-09-02', '2017-08-11', 2, 2, 2, 22, 2, 'For rent', 'House'),
(142292, 'Velit aliquid amet est aspernatur voluptatem quidem harum.', '10', '10', 'Adipisci doloribus qui qui itaque harum.', 'Voluptatem et atque rem et quaerat vitae.', '946', '52308', 'Gillet', '43, boulevard Pierre', '21, place Guy Ferrand', '38.289161,96.12095', 'COP', '165244', 8620, 7, 'Matthieu', 'Duhamel', '0571369887', '+33 4 08 93 01 70', 'andre.perrin@neveu.org', 'http://leclerc.org/distinctio-nesciunt-sed-vitae-mollitia-deserunt-nulla-expedita-veritatis', '2022-09-12', '2020-10-04', '2023-02-19', 2, 2, 2, 22, 2, 'For rent', 'Land'),
(142293, 'Dolor dolores necessitatibus sed nihil autem.', '9', '3', 'In facilis dicta veniam rerum et rem veniam.', 'Et facere quae illum cum quaerat qui.', '351', '15859', 'Pintodan', '74, rue Payet', '87, boulevard Hernandez', '-47.968318,-83.15406', 'KZT', '543092', 7932, 2, 'Renée', 'Lacombe', '0774421465', '+33 5 85 25 21 09', 'isabelle.mercier@marchand.net', 'http://www.perez.fr/cumque-possimus-ipsum-architecto-laborum-voluptatem-velit', '2015-07-29', '2018-04-05', '2023-05-05', 2, 2, 2, 22, 2, 'For rent', 'House'),
(142294, 'Sit qui architecto aut consequuntur sed amet sapiente.', '7', '3', 'Autem autem rem ad id.', 'Consequatur sequi quo id beatae ea adipisci quis est.', '148', '74993', 'Gauthier', 'chemin Timothée Olivier', '97, chemin Nathalie Remy', '-77.67026,129.1504', 'BAM', '984101', 968, 4, 'Dominique', 'Gros', '0549329170', '+33 (0)8 97 77 25 17', 'celina89@schneider.net', 'https://lagarde.com/vitae-cupiditate-non-molestiae-dolor-voluptas-rem-cum.html', '2016-05-21', '2021-11-07', '2022-08-30', 2, 2, 2, 22, 2, 'For sale', 'Commercial'),
(142295, 'Quod ad harum et impedit qui.', '1', '6', 'Enim qui aut et reprehenderit.', 'Sint et non quis est culpa asperiores consequatur a.', '259', '83556', 'Leveque', '88, chemin Michelle Fleury', '74, rue de Mary', '-89.937812,23.716197', 'SGD', '152179', 9949, 8, 'Noémi', 'Roy', '08 91 70 66 44', '01 50 08 87 94', 'mpages@maillard.fr', 'http://www.blot.com/sed-corrupti-eligendi-itaque-consectetur-qui-aliquid.html', '2017-02-09', '2017-01-22', '2016-03-07', 2, 2, 2, 22, 2, 'For rent', 'House'),
(142296, 'Modi magni eligendi nulla et.', '1', '4', 'Nostrum vitae eum placeat qui ratione ea.', 'Ut eos tempore ut non placeat.', '474', '19858', 'Nicolasnec', '32, rue Charrier', '591, boulevard Labbe', '10.024526,-161.398225', 'GTQ', '596112', 5204, 7, 'Gabrielle', 'Perrot', '0370589727', '09 80 06 42 33', 'luce.guillou@gilbert.fr', 'https://bourdon.net/sit-molestiae-reiciendis-delectus-neque-blanditiis.html', '2023-05-30', '2022-08-27', '2017-01-19', 2, 2, 2, 22, 2, 'For rent', 'House'),
(142297, 'Pariatur suscipit officia aut delectus dolores.', '4', '7', 'Et consequatur provident sunt repellat.', 'Dignissimos quis est aut quas ratione.', '556', '85729', 'Garnier-sur-Da Silva', '11, boulevard Clémence Gallet', 'impasse Jacques', '-0.450601,63.362941', 'UAH', '497117', 6769, 1, 'Suzanne', 'Barbier', '+33 (0)2 76 98 25 90', '+33 3 16 04 40 55', 'olivie.buisson@prevost.fr', 'http://www.rodriguez.fr/quasi-qui-nisi-quod-debitis-velit-laudantium.html', '2018-09-29', '2021-10-15', '2022-01-26', 2, 2, 2, 22, 2, 'For rent', 'Appartment'),
(142298, 'Sit et modi ut consequatur consequatur nemo.', '1', '8', 'Recusandae architecto et nisi quibusdam ex ut eveniet.', 'Sed placeat perspiciatis ut ex sunt totam fugiat.', '59', '23154', 'LoiseauVille', '39, impasse Traore', '4, place Geneviève Moulin', '-8.969765,65.867552', 'BAM', '824969', 4272, 3, 'Emmanuelle', 'Martin', '+33 1 61 85 68 34', '+33 7 51 46 53 28', 'bernard.leroux@mathieu.fr', 'http://www.guillou.com/nostrum-aspernatur-et-soluta-quaerat-illum-nemo-enim.html', '2021-09-14', '2020-04-15', '2017-07-22', 2, 2, 2, 22, 2, 'For rent', 'House'),
(142299, 'Voluptas consequuntur magni maiores commodi dolores doloremque quia.', '2', '10', 'Quia dolor architecto omnis sequi.', 'Aut non optio voluptates quisquam quos.', '374', '56686', 'Dubois-la-Forêt', '55, chemin de Gregoire', 'rue Dorothée Marchal', '-5.656311,-96.887014', 'LAK', '918972', 6623, 7, 'Valentine', 'Nguyen', '0330126411', '03 36 84 71 76', 'wschneider@bigot.com', 'http://www.meyer.com/enim-laboriosam-sequi-hic-dolor-deserunt-saepe-nihil.html', '2017-03-08', '2015-03-19', '2022-09-12', 2, 2, 2, 22, 2, 'For sale', 'Appartment'),
(142300, 'Quidem aut omnis eum id odit deserunt quia aut.', '4', '9', 'Nemo voluptate et eum explicabo in et quibusdam labore.', 'Saepe rerum nam repellendus est nemo.', '923', '17010', 'Clerc-les-Bains', '75, boulevard de Boucher', '77, impasse de Dupuy', '-84.750707,-134.267319', 'AMD', '119780', 5799, 4, 'Hugues', 'Bouvier', '09 21 52 72 96', '0278721632', 'xavier58@antoine.fr', 'https://blanc.fr/quod-qui-veniam-velit-et-magnam.html', '2024-01-30', '2016-01-28', '2023-10-07', 2, 2, 2, 22, 2, 'For rent', 'Land'),
(142301, 'Rerum quia maxime sit ex perspiciatis.', '2', '2', 'Maiores reiciendis sint nobis hic eaque illo.', 'Accusamus laboriosam minus impedit est quia nesciunt qui.', '657', '41694', 'MaillardVille', '37, rue Lesage', 'place Michel Ferrand', '53.777484,129.49577', 'BTN', '428778', 7087, 1, 'Matthieu', 'Guichard', '+33 2 95 92 37 53', '+33 6 83 48 21 13', 'torres.adelaide@guillaume.com', 'http://www.evrard.com/sint-minus-veritatis-ratione-non-accusamus-veritatis-tenetur.html', '2022-08-05', '2020-12-22', '2023-01-12', 2, 2, 2, 22, 2, 'For sale', 'House'),
(142302, 'Libero dolores molestiae quae distinctio dolorem quam molestias vero.', '9', '1', 'Autem sit impedit omnis at corporis non atque.', 'Assumenda quo repellat est eveniet et distinctio expedita.', '334', '69289', 'Pelletier-la-Forêt', '8, chemin de Hardy', '72, chemin de Begue', '-54.28216,116.278998', 'BOB', '341894', 5481, 9, 'William', 'Goncalves', '0897172861', '0825924581', 'tpinto@leroy.fr', 'http://potier.com/sint-hic-reprehenderit-et-sit-asperiores-ab', '2023-02-18', '2020-04-01', '2023-09-15', 2, 2, 2, 22, 2, 'For rent', 'Appartment'),
(142303, 'Dignissimos enim vitae ducimus ipsam facilis.', '8', '4', 'Aut atque sint a corporis inventore.', 'Saepe nesciunt quam nisi eum qui.', '741', '79243', 'Ruizdan', '552, impasse Goncalves', '76, rue Aurélie Rodriguez', '77.652123,-13.646745', 'BBD', '604817', 5764, 3, 'Tristan', 'Barbier', '08 24 43 24 23', '+33 6 73 48 98 98', 'roy.martine@gautier.org', 'http://www.chretien.com/', '2022-04-11', '2015-01-12', '2022-09-02', 2, 2, 2, 22, 2, 'For sale', 'House');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`role`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `email`, `password`, `created_at`, `lastname`, `phone`, `address`, `updated_at`, `description`, `role`) VALUES
(1, 'Sacha', 'agent@somedomain.tld', '$2y$10$dVde7sq4fbqLlT9/f8Eg..X8UA.F05S/ZYfIgpWoPfbgym6q8kh52', NULL, 'Hemon', '123-456-789', '98672354923i ikufhgodiyfg odf', NULL, 'oui bonjour blablablafdsfsdfsf', '[\"ROLE_USER\"]'),
(2, 'test', 'test@test', '$2y$10$zVPhJVaSU7.z0JWpIiWPM.1uCTkwogMwRZ/QAkvYZPOIhDs1a7l0S', NULL, 'test', '09273643', '213423 i3tu4f igjfgisduyfvaiufag f ', NULL, 'LE SUICIDE CEST POUR BIENTOT', '[\"ROLE_USER\"]'),
(3, 'moi', 'moi@moi', '$2y$10$mD55PK3cNaj8HrBmn6fXcuhQ56OKATwLrXv1W6m1UV2WIrb/5MAXu', NULL, 'moi', NULL, NULL, NULL, NULL, '[\"ROLE_USER\"]'),
(14, 'Marcel', 'julien16@jean.com', '$2y$10$6GX8kFwdATeOicus0ci4seN9wzCp6H55KoMNpW95auiZ.1DOhKNy2', '2023-10-20', 'Valentin', '0590209044', '964, impasse Luce Gomez\n19818 Fourniernec', '2020-01-06', 'Molestiae itaque mollitia voluptate quas quibusdam voluptates nulla et.', '[\"ROLE_USER\"]'),
(15, 'Capucine', 'maryse.caron@weiss.org', '$2y$10$yAMvmjyISXVQC8ea9IdBiOk6EaBcUpJv3.8.Q7cBYk.LomCuHviG.', '2023-10-31', 'Hamel', '0131153351', '51, place de Brun\n40865 Gilles', '2017-10-15', 'Tempora ab sequi voluptatem.', '[\"ROLE_USER\"]'),
(16, 'Margaret', 'charles48@salmon.fr', '$2y$10$CIXi4T.WgwMklGXiiyz0DeCo1oeYOuzB/PDJ9.iEi42OVmW9pWw62', '2021-05-31', 'Dumont', '+33 (0)8 98 10 94 41', '637, rue de Blanc\n96432 Potiernec', '2023-09-01', 'Quod non eaque aspernatur blanditiis magni.', '[\"ROLE_USER\"]'),
(17, 'Adélaïde', 'rroy@robin.fr', '$2y$10$vRna6TwL.UDqC5LK38dNi.WLSYa7BDq/aR.FD/wnrMijzUOBVui0a', '2019-10-03', 'Lelievre', '+33 (0)6 55 52 39 06', '389, chemin Mace\n85351 David', '2018-03-08', 'Ut assumenda dolor repudiandae hic minima ab dolore.', '[\"ROLE_USER\"]'),
(18, 'Laurent', 'peltier.augustin@bertrand.fr', '$2y$10$uY4GVypuyr/vvfDUzV6.gegeKuwpL/4p8F81wEr5FXxAREi5mPzty', '2014-10-03', 'Schmitt', '+33 1 21 57 55 90', '51, rue de Jacquet\n19648 Allain', '2019-03-25', 'Saepe et earum error impedit magnam mollitia.', '[\"ROLE_USER\"]'),
(19, 'Suzanne', 'brun.audrey@humbert.org', '$2y$10$jN3wYXNLZhf0VaDEDIM2MuYEXZI6kWiOVkaWzog2gn9DK/PogiNkG', '2022-02-18', 'Hoarau', '06 24 49 33 06', '48, impasse de Vidal\n63802 Boulay', '2018-10-08', 'Eius consequatur accusamus enim debitis aliquid provident.', '[\"ROLE_USER\"]'),
(20, 'Victoire', 'emilie66@rodrigues.fr', '$2y$10$PsBEIDUgRBm/i4u1Nc92weIEJ.NAw.yZItI4Fq5wy3fnhSOmYSmnq', '2023-08-01', 'Blanchet', '0595828171', '16, rue Le Gall\n14131 Paulnec', '2022-03-21', 'Sint rem asperiores laborum in.', '[\"ROLE_USER\"]'),
(21, 'Henri', 'aurelie.morvan@francois.net', '$2y$10$HzL.OOuWFBe30H3J6PLEB.kaDKDkPfzoMLxuCRX/UaTeHSJfTm8du', '2021-07-16', 'Guyon', '01 89 26 03 56', 'boulevard André Hamon\n55366 Humbert', '2018-11-30', 'Saepe sunt totam assumenda.', '[\"ROLE_USER\"]'),
(22, 'Geneviève', 'claude.pineau@maurice.net', '$2y$10$0fUI2zECLZ.dX1ZrVBExeujlv10kbCalPoQRdSRfE4ZmtMAM3Ki5u', '2023-06-02', 'Cousin', '+33 (0)1 59 65 23 84', '85, avenue Maryse De Oliveira\n99504 Etienne-sur-Guillet', '2017-09-28', 'Sequi ut et et sed sunt.', '[\"ROLE_USER\"]'),
(23, 'Dorothée', 'dupre.joseph@perrier.fr', '$2y$10$i2yYOygXotlxhlKHDBHH1.g01FDntmNE41Y6bneRGvivXfBk6Dz1W', '2019-07-05', 'Goncalves', '0305628986', '35, rue Jérôme Riviere\n42252 Hamel', '2020-07-10', 'Ipsum et aperiam eligendi deleniti ipsum quia.', '[\"ROLE_USER\"]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_has_users`
--
ALTER TABLE `category_has_users`
  ADD PRIMARY KEY (`category_id`,`users_id`),
  ADD KEY `fk_category_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_category_has_users_category1_idx` (`category_id`);

--
-- Index pour la table `DPE`
--
ALTER TABLE `DPE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `DTA`
--
ALTER TABLE `DTA`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `elecDiag`
--
ALTER TABLE `elecDiag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_elecDiag_properties_idx` (`properties_id`);

--
-- Index pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`id$`),
  ADD KEY `fk_equipements_properties1_idx` (`properties_id`);

--
-- Index pour la table `gazDiag`
--
ALTER TABLE `gazDiag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pictures_properties1_idx` (`properties_id`);

--
-- Index pour la table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_properties_gazDiag1_idx` (`gazDiag_id`),
  ADD KEY `fk_properties_DTA1_idx` (`DTA_id`),
  ADD KEY `fk_properties_DPE1_idx` (`DPE_id`),
  ADD KEY `fk_properties_users1_idx` (`users_id`),
  ADD KEY `fk_properties_category1_idx` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `DPE`
--
ALTER TABLE `DPE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `DTA`
--
ALTER TABLE `DTA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `elecDiag`
--
ALTER TABLE `elecDiag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `id$` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `gazDiag`
--
ALTER TABLE `gazDiag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142304;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category_has_users`
--
ALTER TABLE `category_has_users`
  ADD CONSTRAINT `fk_category_has_users_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_category_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `elecDiag`
--
ALTER TABLE `elecDiag`
  ADD CONSTRAINT `fk_elecDiag_properties` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `equipements`
--
ALTER TABLE `equipements`
  ADD CONSTRAINT `fk_equipements_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `fk_pictures_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `fk_properties_DPE1` FOREIGN KEY (`DPE_id`) REFERENCES `DPE` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_properties_DTA1` FOREIGN KEY (`DTA_id`) REFERENCES `DTA` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_properties_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_properties_gazDiag1` FOREIGN KEY (`gazDiag_id`) REFERENCES `gazDiag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_properties_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
