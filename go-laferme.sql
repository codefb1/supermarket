-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 27 sep. 2021 à 08:12
-- Version du serveur : 10.3.28-MariaDB
-- Version de PHP : 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `go-laferme`
--

-- --------------------------------------------------------

--
-- Structure de la table `av_accounts`
--

CREATE TABLE `av_accounts` (
  `account_id` int(11) NOT NULL,
  `type_compte` int(11) NOT NULL,
  `account_firstname` varchar(45) NOT NULL,
  `account_lastname` varchar(45) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_password` varchar(45) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_updated` datetime NOT NULL,
  `data_status` int(11) NOT NULL,
  `partener_id` int(11) DEFAULT 0,
  `account_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_accounts`
--

INSERT INTO `av_accounts` (`account_id`, `type_compte`, `account_firstname`, `account_lastname`, `account_email`, `account_password`, `data_created`, `data_updated`, `data_status`, `partener_id`, `account_user`) VALUES
(2, 1, 'BASSEM', 'Fartoun', 'elfartoun@gmail.com', '00000000', '2017-08-15 11:31:49', '2018-11-22 15:19:33', 1, 0, 'bassem'),
(5, 0, 'Partenaire', 'Ma-Bouche-Rit ', 'boucherie@gmail.com', '123456789@', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9, 'MaBoucheRit'),
(6, 0, 'Partenaire', 'Boucherie Marseille', 'chokri.saidi@go-makkah.com', '987654321@ ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 10, 'BoucherieMarseille '),
(7, 0, 'Partenaire', 'Gratuit', 'chokri_free@gmail.com', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 11, ''),
(8, 1, 'chokri', 'admin', 'user@gmail.com', 'Adm2021', '0000-00-00 00:00:00', '2021-06-25 16:26:35', 1, 0, 'user'),
(9, 1, 'FALLAH', 'Amani ', 'fallah.amani@gmail.com', '00000000', '0000-00-00 00:00:00', '2021-09-15 14:04:39', 1, 0, 'userAmani'),
(10, 0, 'Partenaire', 'Démo Boucherie Platinum', 'siwarmensi6@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 12, ''),
(11, 0, 'Partenaire', 'Démo Boucherie Platinum', 'siwarmensi6@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 13, ''),
(13, 0, 'Partenaire', 'Démo Boucherie Platinum', 'siwarmensi6@gmail.com', '75321', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 15, 'Démo');

-- --------------------------------------------------------

--
-- Structure de la table `av_associations`
--

CREATE TABLE `av_associations` (
  `association_id` int(11) NOT NULL,
  `association_lastname` varchar(255) DEFAULT NULL,
  `association_adress` varchar(255) DEFAULT NULL,
  `association_email` varchar(255) DEFAULT NULL,
  `association_city` varchar(255) DEFAULT NULL,
  `association_zip` varchar(255) DEFAULT NULL,
  `association_created` datetime DEFAULT NULL,
  `association_country_id` int(11) DEFAULT 0,
  `association_status` int(1) DEFAULT 0,
  `association_phone` varchar(255) DEFAULT NULL,
  `association_updated` datetime DEFAULT NULL,
  `association_picture` varchar(255) DEFAULT NULL,
  `association_comments` longtext DEFAULT NULL,
  `association_short_text` text DEFAULT NULL,
  `association_responsable` varchar(255) DEFAULT NULL,
  `association_phone_portable` varchar(255) DEFAULT NULL,
  `association_price` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_associations`
--

INSERT INTO `av_associations` (`association_id`, `association_lastname`, `association_adress`, `association_email`, `association_city`, `association_zip`, `association_created`, `association_country_id`, `association_status`, `association_phone`, `association_updated`, `association_picture`, `association_comments`, `association_short_text`, `association_responsable`, `association_phone_portable`, `association_price`) VALUES
(3, 'bassem fartoun', 'paris', 'elfart@gmail.com', 'tunis', '68000', '2021-04-18 13:33:35', 1, 1, '0123456789', '2021-09-17 12:48:58', 'file_ce1f8b04f0a1eca74ad9d641ff0a02e3.jpeg', '<p>test</p>', 'info', NULL, '', 80),
(4, 'Palestine', 'Palestine', 'palestine@gmail.com', 'Palestine', '12345', '2021-06-01 14:30:39', 2, 1, '0123456789', '2021-09-17 12:48:30', 'file_9c517b54d85e0fc91a1821b0634d310a.jpeg', '', '', NULL, '0123456789', 80),
(5, 'Cameroun', 'Cameroun', 'cameroun@gmail.com', 'Cameroun', '12345', '2021-06-01 14:56:04', 6, 1, '0123456789', '2021-09-17 13:16:37', 'file_3757153e5d8b7b8eb0e428ffd7d0d259.jpg', '', '', NULL, '', 80),
(6, 'Cote d\'ivoire', 'code ', 'cote@gmail.com', 'code', '12345', '2021-06-01 14:59:58', 7, 1, '0123456789', '2021-09-17 12:47:24', 'file_06695435a20ce414c60ab5308f7f275e.jpeg', '', '', NULL, '', 80),
(7, 'Maroc', '', 'maroc@gmail.com', 'tunis', '12345', '2021-06-01 15:01:10', 5, 1, '0123456789', '2021-09-17 12:46:46', 'file_4f5499a52ca6d7bd70bb26a03d1bce4e.jpeg', '', '', NULL, '', 80),
(8, 'Tunis', '', 'tunis@gmail.com', 'tunis', '12345', '2021-06-01 15:02:59', 4, 1, '0123456789', '2021-09-17 12:46:27', 'file_13dc009147662d27e757940e11f9df9a.jpeg', '', '', NULL, '', 80);

-- --------------------------------------------------------

--
-- Structure de la table `av_attributs`
--

CREATE TABLE `av_attributs` (
  `attribut_id` int(11) NOT NULL,
  `attribut_name` varchar(255) NOT NULL,
  `attribut_data_created` datetime NOT NULL,
  `attribut_data_updated` datetime NOT NULL,
  `attribut_data_status` int(11) NOT NULL,
  `attribut_picture` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_attributs`
--

INSERT INTO `av_attributs` (`attribut_id`, `attribut_name`, `attribut_data_created`, `attribut_data_updated`, `attribut_data_status`, `attribut_picture`) VALUES
(1, 'Produit  Origine', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(2, 'Ages', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(4, 'Produit Label Rouge', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'file_f086f12b44600c31019a30e092462b30.png'),
(5, 'Certification Halal', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL),
(6, 'Produit Biologique', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'file_6e5d582dbbfad859fe2f418a3549198d.png');

-- --------------------------------------------------------

--
-- Structure de la table `av_attributs_values`
--

CREATE TABLE `av_attributs_values` (
  `attribut_value_id` int(11) NOT NULL,
  `attribut_id` int(11) NOT NULL,
  `attribut_value` varchar(255) NOT NULL,
  `attribut_value_data_created` datetime NOT NULL,
  `attributvalue_data_updated` datetime NOT NULL,
  `attribut_value_data_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_attributs_values`
--

INSERT INTO `av_attributs_values` (`attribut_value_id`, `attribut_id`, `attribut_value`, `attribut_value_data_created`, `attributvalue_data_updated`, `attribut_value_data_status`) VALUES
(1, 1, 'France', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 3, '12 Kg a 20 KG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 2, '5 ans', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 2, '6 ans', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 1, 'Allemange', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 6, 'Oui', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 6, 'NON', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 1, 'France', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 4, 'Oui', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 4, 'Non', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_banners`
--

CREATE TABLE `av_banners` (
  `banner_id` int(11) NOT NULL,
  `banner_text` text NOT NULL,
  `banner_botton_text` text NOT NULL,
  `banner_picture` varchar(255) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_updated` datetime NOT NULL,
  `banner_data_status` int(11) NOT NULL DEFAULT 0,
  `files` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `banner_title` text DEFAULT NULL,
  `bannier_position` int(11) DEFAULT 1,
  `banner_text_deux` text DEFAULT NULL,
  `banner_text_troix` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_banners`
--

INSERT INTO `av_banners` (`banner_id`, `banner_text`, `banner_botton_text`, `banner_picture`, `data_created`, `data_updated`, `banner_data_status`, `files`, `product_id`, `banner_title`, `bannier_position`, `banner_text_deux`, `banner_text_troix`) VALUES
(1, 'découpé mise sous vide !', 'Profitez de la promotion', 'file_0bbd7b381a5cecc0b46bfdabc14c71e4.jpg', '0000-00-00 00:00:00', '2021-08-09 16:06:34', 1, NULL, 87, 'Mouton <span>entier</span>', 3, NULL, NULL),
(2, '', '', 'file_dd0daa891f47153a9eca059be403fc3a.jpg', '0000-00-00 00:00:00', '2021-08-09 16:06:26', 1, NULL, 0, 'bannier top', 1, NULL, NULL),
(3, 'Composer votre couffin selon votre événement :', 'Composer mon couffin !', 'file_045c6e79e5c5b831862bd874dfa7e19d.jpg', '0000-00-00 00:00:00', '2021-09-21 11:58:16', 1, NULL, 0, 'Le Couffin idéal!', 2, 'Anniversaire,Classique,Mariage,Invitation...', 'Livraison Par Chronofresh en 48H sera à votre portée :)'),
(4, 'slider 2', 'slider 2', 'file_5c29e78068f872480da60c6523496ae8.jpeg', '0000-00-00 00:00:00', '2021-08-09 16:09:45', 0, NULL, 0, 'slider 2', 2, NULL, NULL),
(5, '', '', 'file_04687494b9d46a84d34f6a7045d8fd86.jpg', '0000-00-00 00:00:00', '2021-08-19 16:28:34', 1, NULL, 0, ' Nos Packs <span>  Mouton Entier</span>', 4, NULL, NULL),
(6, '', '', 'file_a7c51bab60cc462972faa8e2cd768cf6.jpg', '0000-00-00 00:00:00', '2021-08-19 16:43:25', 1, NULL, 0, ' La <span>  Boucherie</span>', 5, NULL, NULL),
(7, '', '', 'file_f624b956aea8c65be7fb80e5ab55107a.jpg', '0000-00-00 00:00:00', '2021-08-19 16:29:19', 1, NULL, 0, '<span>  Panier</span>', 6, NULL, NULL),
(8, '', '', 'file_7ad468fd2a2a190027353492f858ead1.jpg', '0000-00-00 00:00:00', '2021-08-11 09:07:48', 1, NULL, 0, '<span>  Promotions</span>', 7, NULL, NULL),
(9, '', '', 'file_7ad468fd2a2a190027353492f858ead1.jpg', '0000-00-00 00:00:00', '2021-08-19 16:29:29', 1, NULL, 0, '<span>  Goffa</span>', 8, NULL, NULL),
(10, '', '', 'file_cd0e3be661b2399ee06843931fd4ff6e.jpg', '0000-00-00 00:00:00', '2021-08-24 16:17:43', 1, NULL, 0, 'Service client - Contactez-nous', 9, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `av_categories`
--

CREATE TABLE `av_categories` (
  `categorie_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `categorie_name` varchar(255) NOT NULL,
  `categorie_picture` varchar(255) DEFAULT NULL,
  `categorie_content` longtext DEFAULT NULL,
  `data_status_categorie` int(11) NOT NULL DEFAULT 1,
  `categorie_meta_description` text DEFAULT NULL,
  `categorie_meta_title` text DEFAULT NULL,
  `categorie_meta_keywords` text DEFAULT NULL,
  `is_show_home` int(1) DEFAULT 1,
  `is_show_menu` int(1) DEFAULT 1,
  `count_products` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_categories`
--

INSERT INTO `av_categories` (`categorie_id`, `parent_id`, `categorie_name`, `categorie_picture`, `categorie_content`, `data_status_categorie`, `categorie_meta_description`, `categorie_meta_title`, `categorie_meta_keywords`, `is_show_home`, `is_show_menu`, `count_products`) VALUES
(2, 0, 'Agneau', 'file_eef9bfe3b06bda64ce3e2816bce4844c.jpg', 'L’Agneau est à la fois la promesse de grillades relevés d’herbes et d’aromates sublimes ! toutes les occasions sont bonnes pour le déguster ', 1, 'Agneau', 'Agneau', 'Agneau', 2, 2, 21),
(3, 0, 'Bœuf', 'file_978fca50db0295b39d57a2a9929ee10a.jpg', ' pour un bon fonctionnement de notre organisme, La viande de bœuf est riche aux vitamines et des minéraux nécessaires', 1, 'Bœuf', 'Bœuf', 'Bœuf', 2, 2, 20),
(4, 0, 'Volaille ', 'file_fe15b0390c0580c0e7d69e65adff50b0.jpg', 'Pour une alimentation saine et équilibrée, servez vous de viande de volaille qui apporte des acides aminés que l\'organisme humain ne fabrique pas lui-même !', 1, 'Volaille ', 'Volaille ', 'Volaille ', 2, 2, 23),
(5, 0, 'Veau', 'file_8ac8516ed7f9a885a13b785472bc9e0b.jpg', 'La viande de veau, tendre et délicate s’accommode de si nombreuses façons qu’elle a incontestablement séduit les plus grands Chefs ', 1, 'Veau', 'Veau', 'Veau', 2, 2, 15),
(14, 5, 'Pack Famille', NULL, NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(17, 5, 'Paniers suspendus', NULL, NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(229, 101, 'Sauces Halal', '', NULL, 1, 'Sauces Halal', 'Sauces Halal', 'Sauces Halal', 1, 1, 8),
(223, 5, 'Les Abats Rouges de Veau', '', NULL, 1, 'Les abats rouges de Veau', 'Les abats rouges de Veau', 'Les abats rouges de Veau', 1, 1, 2),
(31, 4, 'Poulet de Bresse AOP', 'file_a3c5bd12afec2bbc61a91740d36a0176.jpg', NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(32, 4, 'Poulet \"Faverolles\" Bio 180 jours', NULL, NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(34, 4, 'Canette Fermière', '', NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(36, 4, 'Pack Famille', NULL, NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(38, 4, 'Pack Volaille Bio', '', NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(231, 230, 'Mouton entier', '', NULL, 0, 'Mouton entier', 'Mouton entier', 'Mouton entier', 1, 1, 3),
(232, 101, 'Huiles ', '', NULL, 1, 'Huiles ', 'Huiles ', 'Huiles ', 1, 1, 7),
(233, 101, 'Couscous et Semoules', '', NULL, 1, 'Couscous et Semoules', 'Couscous et Semoules', 'Couscous et Semoules', 1, 1, 8),
(41, 4, 'Paniers Suspendus', '', NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(50, 4, 'Gauloises Grises', NULL, NULL, 1, ' sous catégorie', 'sous catégorie', '', 1, 1, 0),
(51, 4, 'Cou-nu du Forez', NULL, NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 0),
(52, 4, 'Pintade Perle Noire', 'file_dbf2a6cebe16031c734f5db47e829dd9.jpg', NULL, 1, 'La pintade est rustique, très résistante et de croissance lente. ... Sa chair, et particulièrement les cuisses, sont d\'une qualité exceptionnelle, et le goût est très différent de la pintade fermière classique', 'Pintade Perle Noire', ' Pintade Perle Noire', 1, 1, 0),
(218, 5, 'Les Filets de Veau', '', NULL, 1, 'Les filets de veau ', 'Les filets de veau ', 'Les filets de veau ', 1, 1, 2),
(214, 4, 'Poulet ', '', NULL, 1, 'Poulet ', 'Poulet ', 'Poulet ', 1, 1, 21),
(215, 4, 'Dinde ', '', NULL, 1, 'Dinde ', 'Dinde ', 'Dinde ', 1, 1, 2),
(193, 3, 'Les Macreuses de Bœuf ', '', NULL, 1, 'Les macreuses de bœuf ', 'Les macreuses de bœuf ', 'Les macreuses de bœuf ', 1, 1, 0),
(207, 3, 'Les Brochettes de Bœuf ', '', NULL, 1, 'Les brochettes de bœuf ', 'Les brochettes de bœuf ', 'Les brochettes de bœuf ', 1, 1, 0),
(79, 4, 'Emincé de Poulet', 'file_9e3f988d97da63bd7fdaa92fedd92bba.jpeg', NULL, 1, ' sous catégorie', 'sous catégorie', ' sous catégorie', 1, 1, 1),
(211, 2, 'Les Abats Blancs d\'Agneau ', '', NULL, 1, 'Les abats blancs d\'agneau ', 'Les abats blancs d\'agneau ', 'Les abats blancs d\'agneau ', 1, 1, 2),
(83, 2, 'Selle d\'Agneau', 'file_540eb08b2fe31597193d7ec537d2a62c.jpg', NULL, 1, 'la selle désigne la partie haute de la cuisse. Petit précis de langage : en boucherie, c\'est le quartier postérieur allant des côtes au gigot. La selle complète est l\'ensemble des deux carrés d\'agneau, de part et d\'autre de la colonne vertébrale de l\'animal.', 'Selle d\'agneau', 'Selle d\'agneau', 1, 1, 1),
(84, 2, 'Souris d\'Agneau', 'file_814ac19bb47d40176411d61c07a796f6.jpg', NULL, 1, 'La souris d\'agneau est un morceau de viande constitué par le muscle qui entoure le tibia de la patte arrière de l\'agneau, sous le gigot. Le terme de souris fait référence à sa forme ovale. Sa chair gélatineuse et moelleuse se prête aux recettes braisées et confites.', 'Souris d\'agneau', 'Souris d\'Agneau', 1, 1, 1),
(213, 3, 'Charcuterie de Bœuf', '', NULL, 1, 'Charcuterie de bœuf', 'Charcuterie de bœuf', 'Charcuterie de bœuf', 1, 1, 5),
(90, 2, 'Steak Haché d\'Agneau', '', NULL, 1, 'On retrouve le haché dans d’innombrables préparations et il est vendu sous diverses formes. Vous le retrouvez aussi bien pur que préparé en magasin. On n’utilise pas les morceaux les plus tendres de l’agneau pour le haché. Il s’agit le plus souvent de l’échine, la poitrine, l’épaule ou le gigot. Vous ne trouvez pas facilement du haché d’agneau tout prêt chez votre boucher, vous devrez peut-être la demander ou la commander à l’avance. Le haché d’agneau est idéal pour préparer des boulettes, des burgers, la moussaka et bien sûr de délicieuses merguez.', 'Steak haché d\'agneau', 'Steak haché d\'agneau', 1, 1, 1),
(91, 2, 'Sauté d\'Agneau', 'file_f1166d0ce9296e68ec44debe2972b9dd.jpg', NULL, 1, 'A rôtir ou à griller, c\'est le morceau de choix de l\'agneau. A l\'extrémité se trouve la souris, petit muscle ovale en forme de poire situé tout en haut du manche du gigot, dont la texture gélatineuse devient particulièrement moelleuse après une cuisson longue.', 'Sauté d\'agneau', 'Sauté d\'agneau', 1, 1, 1),
(95, 2, 'Poitrine d\'Agneau', 'file_7ed1cb05ce6dd0a5e34da0c2a5548ca8.jpg', NULL, 1, 'La poitrine d\'agneau est un morceau qui ne nécessite pas un gros budget à l\'achat, cette viande se situe sur la partie basse de l\'animal. Elle se compose essentiellement de muscles de l\'abdomen et se savoure aussi bien mijotée en hiver, que grillée en été.', 'Poitrine d\'agneau', 'Poitrine d\'agneau', 1, 1, 1),
(100, 2, 'Brochette d\'Agneau', 'file_7931be77bb9e00fe6e9115d27117f4aa.jpg', NULL, 1, 'Nos bouchers préparent ces brochettes d\'agneau sur place, dans leur atelier. Les morceaux de viande d\'agneau marinée, provenant d\'un tendre gigot d\'agneau, sont piqués sur des bâtonnets en bois avec des morceaux d\'oignon. Parfaites pour le barbecue.', 'Les morceaux de viande d\'agneau marinée, provenant d\'un tendre gigot d\'agneau, sont piqués sur des bâtonnets en bois avec des morceaux d\'oignon. Parfaites pour le barbecue.', 'Brochette d\'agneau', 1, 1, 1),
(101, 0, 'Epicerie', 'file_43f159273a773e3b135cc0e61106a603.jpg', 'Les épices parfument les plats de viande, leur donner un goût savoureux et donner à l\'ensemble une coloration agréable.', 1, 'Les épices parfument les plats de viande, leur donner un goût savoureux et donner à l\'ensemble une coloration agréable.', 'Epicerie', 'Epicerie', 1, 1, 54),
(102, 101, ' Épices', '', NULL, 1, 'Grâce à leur saveur plus ou moins piquante ou parfumée, les épices permettent d’assaisonner les viandes et relever leur goût', ' Épices', ' Épices', 1, 1, 31),
(103, 101, 'Sauce et condiments', '', NULL, 1, ' Une bonne sauce avec une bonne viande, elle accompagne, elle relève, elle souligne, elle mijote', 'Sauce et condiments', 'Sauce et condiments', 1, 1, 0),
(108, 3, 'Gite à la Noix de Bœuf', '', NULL, 1, 'Gite à la noix de boeuf', 'Gite à la noix de boeuf', 'Gite à la noix de boeuf', 1, 1, 0),
(194, 3, 'Rumsteck de Bœuf ', '', NULL, 1, 'Rumsteck de bœuf ', 'Rumsteck de bœuf ', 'Rumsteck de bœuf ', 1, 1, 2),
(203, 3, 'Les Abats Rouges', '', NULL, 1, 'Les abats rouges ', 'Les abats rouges ', 'Les abats rouges ', 1, 1, 0),
(118, 3, 'Queue de Bœuf ', '', NULL, 1, '', 'Queue de bœuf ', 'Queue de bœuf ', 1, 1, 0),
(224, 5, 'Charcuterie de Veau ', '', NULL, 1, 'Charcuterie de Veau ', 'Charcuterie de Veau ', 'Charcuterie de Veau ', 1, 1, 2),
(220, 5, 'Les Côtes et Entrecôte de Veau ', '', NULL, 1, 'Les cotes et entrecôte de Veau ', 'Les cotes et entrecôte de Veau ', 'Les cotes et entrecôte de Veau ', 1, 1, 2),
(230, 0, 'Mouton entier', '', 'Mouton entier', 0, 'Mouton entier', 'Mouton entier', 'Mouton entier', 1, 1, 3),
(205, 3, 'Côte et Entrecôte de Bœuf ', '', NULL, 1, 'Cote et entrecôte de bœuf ', 'Côte et entrecôte de bœuf ', 'Cote et entrecôte de bœuf ', 1, 1, 5),
(222, 5, 'Les abats blancs de veau ', '', NULL, 1, 'Les abats blancs de veau ', 'Les abats blancs de veau ', 'Les abats blancs de veau ', 1, 1, 0),
(216, 3, 'Les Bourguignons de Bœuf ', '', NULL, 1, 'Les bourguignons de bœuf ', 'Les bourguignons de bœuf ', 'Les bourguignons de bœuf ', 1, 1, 2),
(202, 3, 'Ventre de Bœuf ', '', NULL, 1, 'Ventre de bœuf ', 'Ventre de bœuf ', 'Ventre de bœuf ', 1, 1, 0),
(200, 3, 'Cuisse de Bœuf ', '', NULL, 1, 'Cuisse de bœuf ', 'Cuisse de bœuf ', 'Cuisse de bœuf ', 1, 1, 1),
(206, 3, 'Les Bavettes de Bœuf ', '', NULL, 1, 'Les bavettes de bœuf ', 'Les bavettes de bœuf ', 'Les bavettes de bœuf ', 1, 1, 0),
(192, 3, 'Poitrine de Bœuf', '', NULL, 1, 'Poitrine de bœuf', 'Poitrine de bœuf', 'Poitrine de bœuf', 1, 1, 0),
(201, 2, 'Epigramme ', '', NULL, 1, 'Epigramme ', 'Epigramme ', 'Epigramme ', 1, 1, 0),
(219, 5, 'Les Noix de Veau', '', NULL, 1, 'Les Noix de veau', 'Les Noix de veau', 'Les Noix de veau', 1, 1, 1),
(221, 5, 'Les Jarrets de Veau', '', NULL, 1, 'Les jarrets de veau', 'Les jarrets de veau', 'Les jarrets de veau', 1, 1, 1),
(212, 2, 'Charcuterie d\'Agneau', '', NULL, 1, 'Charcuterie ', 'Charcuterie ', 'Charcuterie ', 1, 1, 1),
(137, 0, 'El Goffa ', '', '', 0, 'El Goffa ', 'El Goffa ', 'El Goffa ', 2, 1, 0),
(227, 5, 'Poitrine de Veau', '', NULL, 1, 'Poitrine de Veau ', 'Poitrine de Veau ', 'Poitrine de Veau ', 1, 1, 0),
(225, 3, 'Les Filets de Bœuf ', '', NULL, 1, 'Les filets de bœuf ', 'Les filets de bœuf ', 'Les filets de bœuf ', 1, 1, 1),
(208, 2, 'Gigot d\'Agneau ', '', NULL, 1, 'Gigot d\'agneau ', 'Gigot d\'agneau ', 'Gigot d\'agneau ', 1, 1, 3),
(204, 3, 'Les Abats Blancs de Bœuf ', '', NULL, 1, 'Les abats blancs de bœuf ', 'Les abats blancs de bœuf ', 'Les abats blancs de bœuf ', 1, 1, 0),
(198, 3, 'Epaule de Bœuf ', '', NULL, 1, 'Epaule de bœuf ', 'Epaule de bœuf ', 'Epaule de bœuf ', 1, 1, 0),
(199, 3, 'Tende de Tranche de Bœuf ', '', NULL, 1, 'Tende de tranche de bœuf ', 'Tende de tranche de bœuf ', 'Tende de tranche de bœuf ', 1, 1, 2),
(161, 2, 'Agneau Entier ', '', NULL, 1, '', 'Agneau entier ', 'Agneau entier ', 1, 1, 0),
(162, 4, 'Chapon Fermier', '', NULL, 1, '', 'Chapon fermier', 'Chapon fermier', 1, 1, 0),
(228, 5, 'Quasi de Veau', '', NULL, 1, 'Quasi de veau', 'Quasi de veau', 'Quasi de veau', 1, 1, 1),
(226, 5, 'Les Avants de Veau ', '', NULL, 1, 'Les avants de Veau ', 'Les avants de Veau ', 'Les avants de Veau ', 1, 1, 4),
(197, 3, 'Les Rosbifs de Bœuf ', '', NULL, 1, 'Les rosbifs de bœuf ', 'Les rosbifs de bœuf ', 'Les rosbifs de bœuf ', 1, 1, 1),
(196, 2, 'Epaule d\'Agneau ', '', NULL, 1, 'Epaule d\'agneau ', 'Epaule d\'agneau ', 'Epaule d\'agneau ', 1, 1, 3),
(191, 3, 'Les Avants de Bœuf', '', NULL, 1, 'Les avants de bœuf', 'Les avants de bœuf', 'Les avants de bœuf', 1, 1, 1),
(189, 2, 'Collier d\'Agneau ', 'file_49cf97e0dd7b083c5a18b0f7b54f901a.jpg', NULL, 1, 'Collier d\'agneau ', 'Collier d\'agneau ', 'Collier d\'agneau ', 1, 1, 1),
(210, 2, 'Les Abats Rouges d\'Agneau ', '', NULL, 1, 'Les abats rouges d\'agneau ', 'Les abats rouges d\'agneau ', 'Les abats rouges d\'agneau ', 1, 1, 2),
(190, 2, 'Les côtes d\'Agneau', 'file_5976c61bcde5cb4d7fd20b079f3fa367.jpg', NULL, 1, 'Les côtes d\'agneau ', 'Les côtes d\'agneau ', 'Les côtes d\'agneau ', 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `av_categories_couffin`
--

CREATE TABLE `av_categories_couffin` (
  `categorie_couffin_id` int(11) NOT NULL,
  `categorie_couffin_name` varchar(255) NOT NULL,
  `categorie_couffin_picture` varchar(255) DEFAULT NULL,
  `categorie_couffin_content` longtext DEFAULT NULL,
  `data_status_categorie_couffin` int(11) DEFAULT 1,
  `categorie_couffin_meta_description` text DEFAULT NULL,
  `categorie_couffin_meta_title` text DEFAULT NULL,
  `categorie_couffin_meta_keywords` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_categories_couffin`
--

INSERT INTO `av_categories_couffin` (`categorie_couffin_id`, `categorie_couffin_name`, `categorie_couffin_picture`, `categorie_couffin_content`, `data_status_categorie_couffin`, `categorie_couffin_meta_description`, `categorie_couffin_meta_title`, `categorie_couffin_meta_keywords`) VALUES
(2, 'Famille ', 'file_02ad0b523357523ed414ad610bb36b05.jpeg', '', 1, 'Couffin Famille', 'Couffin Famille', 'Couffin Famille'),
(3, 'Evénements ', 'file_07af12ebfa49212a38f57e80df0a43a1.jpeg', '', 1, ' Couffin Evénements', ' Couffin Evénements', ' Couffin Evénements'),
(4, 'Dégustations', 'file_4b80c30517c828f4db6c8520ec29d9bf.jpeg', '', 1, 'Couffin Dégustations', 'Couffin Dégustations', 'Couffin Dégustations');

-- --------------------------------------------------------

--
-- Structure de la table `av_categories_options`
--

CREATE TABLE `av_categories_options` (
  `categorie_option_id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT 0,
  `option_type_id` int(1) DEFAULT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `option_price` float DEFAULT 0,
  `option_price_buying` float DEFAULT 0,
  `categorie_option_picture` varchar(255) DEFAULT NULL,
  `data_status_categorie_option` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_categories_options`
--

INSERT INTO `av_categories_options` (`categorie_option_id`, `categorie_id`, `option_type_id`, `option_name`, `option_price`, `option_price_buying`, `categorie_option_picture`, `data_status_categorie_option`) VALUES
(1, 231, 2, 'Coupe bouchère ', 17, 10, NULL, 1),
(2, 231, 2, 'Coupe Classique ', 0, 0, NULL, 1),
(3, 190, 1, 'Carcasse', 10, 0, NULL, 1),
(4, 190, 1, 'Foi', 5, 0, NULL, 1),
(5, 231, 1, '1/3 sadaka', 0, 0, NULL, 1),
(6, 231, 1, 'Foie', 0, 0, NULL, 1),
(7, 231, 1, 'Carcasse', 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_certificats`
--

CREATE TABLE `av_certificats` (
  `certificat_id` int(11) NOT NULL,
  `certificat_name` varchar(255) NOT NULL,
  `certificat_picture` varchar(255) DEFAULT NULL,
  `certificat_data_status` int(11) DEFAULT 0,
  `certificat_data_created` datetime DEFAULT NULL,
  `certificat_data_updated` datetime DEFAULT NULL,
  `certificat_discription` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_certificats`
--

INSERT INTO `av_certificats` (`certificat_id`, `certificat_name`, `certificat_picture`, `certificat_data_status`, `certificat_data_created`, `certificat_data_updated`, `certificat_discription`) VALUES
(1, 'Viandes certifiées Halal', 'file_b028ecb433c313571e3c53dc11f7412b.png', 0, '2021-06-02 07:52:25', '2021-06-02 07:52:47', '<p>Tous les abattagesont lieu sans &eacute;lectronarcose, sans &eacute;lectrochocet sans assommage, de fa&ccedil;onmanuelle, 1 &agrave; 1, et dans la mesure du possible, t&ecirc;te de l\'animal &agrave; l\'endroit.</p>'),
(2, 'Viandes résultant de l\'agriculture biologique', 'file_430e9e7eeda51e895029f59b31db05ed.jpg', 0, '2021-06-02 07:54:16', NULL, '<p>Nous avonsrecours &agrave; l\'agriculturebiologique pour le poulet, le b&oelig;ufetl\'agneau. Afin de vousgarantir des viandesr&eacute;sultant de l\'agriculturebiologique, nous diligentons des contr&ocirc;leset audits inopin&eacute;s chez nos&eacute;leveurs.</p>'),
(3, 'Viandes certifiées Label Rouge ou Fermier', 'file_61151d53334a8da822101d4ed9a94841.png', 0, '2021-06-02 07:55:44', NULL, '<p>Nous vousproposons du poulet Label rouge fermier; poulet de grandequalit&eacute;.Nos&eacute;leveursdoivent respecter un cahier des charges qui d&eacute;finitpr&eacute;cis&eacute;ment les caract&eacute;ristiques du produit, les exigences de production tout au long de sa fabrication et les crit&egrave;res de labellisation.</p>'),
(4, 'Viandes certifiées Label Rouge ou Fermier', 'file_61151d53334a8da822101d4ed9a94841.png', 0, '2021-06-02 07:55:44', NULL, '<p>Nous vousproposons du poulet Label rouge fermier; poulet de grandequalit&eacute;.Nos&eacute;leveursdoivent respecter un cahier des charges qui d&eacute;finitpr&eacute;cis&eacute;ment les caract&eacute;ristiques du produit, les exigences de production tout au long de sa fabrication et les crit&egrave;res de labellisation.</p>'),
(5, ' IGP', 'file_057e2e406817f9c199b2626b2d28043e.PNG', 0, '2021-06-02 07:57:13', '2021-09-15 14:21:32', '<p>Le B&oelig;uf de Galice que nous proposons dispose de la certification IGP (Indication G&eacute;ographique Prot&eacute;g&eacute;e). Cette certification attribu&eacute;e aux produits sp&eacute;cifiques portant un nom g&eacute;ographique et li&eacute;s &agrave; leur origine g&eacute;ographique, atteste de produits qualitatifs.</p>'),
(6, 'Produits AVS', 'file_ea0e12a9c93828d0d7e39dc272eb351d.png', 1, '2021-06-07 03:28:20', '2021-08-26 08:38:29', '<p>Produits AVS</p>'),
(7, 'Achahada ', 'file_9c130519c9afa97f9306388b1395c0f7.png', 1, '2021-07-09 16:05:34', '2021-08-19 09:34:49', '<p>Sahahada</p>'),
(8, 'Altakwa ', 'file_df2c77de6ee1accf69d7e5480f6cab77.PNG', 0, '2021-09-15 14:27:27', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `av_code_zip`
--

CREATE TABLE `av_code_zip` (
  `code_zip_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `av_code_zip_parteners`
--

CREATE TABLE `av_code_zip_parteners` (
  `code_zip_partener_id` int(11) NOT NULL,
  `departement_code` varchar(255) DEFAULT NULL,
  `partener_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_code_zip_parteners`
--

INSERT INTO `av_code_zip_parteners` (`code_zip_partener_id`, `departement_code`, `partener_id`) VALUES
(49, '01', 9),
(50, '02', 9),
(51, '03', 9),
(52, '05', 9);

-- --------------------------------------------------------

--
-- Structure de la table `av_contacts`
--

CREATE TABLE `av_contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_lastname` varchar(255) NOT NULL,
  `contact_adress` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_created` datetime NOT NULL,
  `contact_status` int(1) NOT NULL DEFAULT 0,
  `contact_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_contacts`
--

INSERT INTO `av_contacts` (`contact_id`, `contact_lastname`, `contact_adress`, `contact_email`, `contact_subject`, `contact_message`, `contact_created`, `contact_status`, `contact_phone`) VALUES
(3, 'bassem', '', 'elfartoun@gmail.com', 'test', 'sdsdsd', '2021-08-24 16:56:54', 0, ''),
(4, 'bassem', '', 'elfartoun@gmail.com', 'test', 'sdsdsd', '2021-08-24 16:57:51', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `av_countries`
--

CREATE TABLE `av_countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_data_status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_countries`
--

INSERT INTO `av_countries` (`country_id`, `country_name`, `country_data_status`) VALUES
(1, 'France', 1),
(2, 'Palestine', 1),
(3, 'Algérie', 1),
(4, 'Tunisie', 1),
(5, 'Maroc', 1),
(6, 'Cameroun', 1),
(7, 'Cote d ivoire', 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_customers`
--

CREATE TABLE `av_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(45) DEFAULT NULL,
  `customer_lastname` varchar(45) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_delivery_firstname` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_city` varchar(255) DEFAULT NULL,
  `customer_data_created` datetime DEFAULT NULL,
  `customer_data_updated` datetime DEFAULT NULL,
  `customer_data_status` int(11) DEFAULT NULL,
  `customer_zip` varchar(255) DEFAULT NULL,
  `customer_password` varchar(255) DEFAULT NULL,
  `customer_country` int(11) DEFAULT NULL,
  `customer_deliver_address` varchar(255) DEFAULT NULL,
  `customer_delivery_phone` varchar(255) DEFAULT NULL,
  `customer_delivery_city` varchar(255) DEFAULT NULL,
  `customer_delivery_zip` varchar(255) DEFAULT NULL,
  `customer_delivery_country` int(11) DEFAULT NULL,
  `customer_delivery_lastname` varchar(255) DEFAULT NULL,
  `customer_siret` varchar(255) DEFAULT NULL,
  `customer_delivery_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_customers`
--

INSERT INTO `av_customers` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_delivery_firstname`, `customer_address`, `customer_phone`, `customer_city`, `customer_data_created`, `customer_data_updated`, `customer_data_status`, `customer_zip`, `customer_password`, `customer_country`, `customer_deliver_address`, `customer_delivery_phone`, `customer_delivery_city`, `customer_delivery_zip`, `customer_delivery_country`, `customer_delivery_lastname`, `customer_siret`, `customer_delivery_address`) VALUES
(1, 'bassem', 'fartoun 2', 'elfartounb@gmail.com', NULL, NULL, NULL, NULL, '2021-04-15 11:54:34', '2021-04-15 14:05:20', 1, NULL, '123456', NULL, NULL, NULL, NULL, NULL, 0, NULL, '', NULL),
(2, 'Saidi', 'Chokri', 'choukri.saidi@go-makkahd.com', NULL, '32 avenue lierre semard', '0622190709', 'Ivry sur seine', '2021-05-18 22:18:34', NULL, 1, '94200', 'azerty', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(3, 'weal', 'fartoun', 'weal@gmail.com', 'weal', 'grounoble', '0123456789', NULL, '2021-05-25 02:43:02', NULL, 1, '91345', '1234567890', 1, NULL, '0123456789', 'paris', '91345', 1, 'fartoun', NULL, 'grounoble'),
(4, 'Saidi', 'Chokri', 'chokris.saidi1@go-makkah.com', 'Saidi', '27 rue des alouettes', '0622190709', 'Boissy st leger', '2021-05-25 13:30:01', NULL, 1, '94470', 'azerty', 1, NULL, '0622190709', 'Boissy st leger', '94470', 1, 'Chokri', NULL, '27 rue des alouettes'),
(5, 'arbi', 'fartoun', 'test@gmail.com', 'Arbi', NULL, NULL, NULL, '2021-05-25 13:30:01', '2021-05-25 13:31:36', 1, NULL, 'azerty', NULL, NULL, '0622190709', 'Boissy st leger', '94470', 1, 'Chokri', NULL, '27 rue des alouettes'),
(6, 'Chokri', 'SAIDI', 'chokri.saidi@go-makkah.com', 'Chokri', '32 AVENUE PIERRE SEMARD', '0622190709', 'IVRY SUR SEINE', '2021-06-30 07:36:16', NULL, 1, '94470', 'Azerty', 1, NULL, '0622190709', 'IVRY SUR SEINE', '94470', 1, 'SAIDI', NULL, '32 AVENUE PIERRE SEMARD'),
(7, 'b', 'vv', 'sdsd@gmail.com', 'b', 'v', 'sdsdsd', 'dsdsd', '2021-07-12 14:24:08', NULL, 1, '12345', '123', 1, NULL, 'sdsdsd', 'dsdsd', '12345', 1, 'vv', NULL, 'v'),
(8, 'FALLAH', 'Amani', 'fallah.amanie@gmail.com', 'FALLAH', NULL, NULL, NULL, '2021-08-05 10:23:06', '2021-08-17 10:03:09', 1, NULL, '123456789', NULL, NULL, '00000000', 'trappes', '6033', 1, 'Amani', NULL, 'rue nour '),
(9, NULL, NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, '2021-08-16 08:21:08', NULL, 1, NULL, 'test123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, '2021-08-16 16:08:07', NULL, 1, NULL, '00000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, 'test22@gmail.com', NULL, NULL, NULL, NULL, '2021-08-18 16:06:31', NULL, 1, NULL, '987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'test1', 'test2', 'bonjour@gmail.com', 'test1', 'rue bonjour', '000000089', 'ville1', '2021-08-18 16:57:18', NULL, 1, '72001', '123456', 1, NULL, '000000089', 'ville1', '72001', 1, 'test2', NULL, 'rue bonjour'),
(13, 'bassem', 'fartoun', 'elfartoun@gmail.com', 'bassem', 'chaville', '0033214569', 'paris', '2021-08-19 10:15:36', NULL, 1, '70045', '123456', 1, NULL, '0033214569', 'paris', '70045', 1, 'fartoun', NULL, 'chaville'),
(14, 'fallah', 'amani', 'fallah.amani2@gmail.com', 'FAllah', NULL, NULL, NULL, '2021-08-19 15:40:40', '2021-09-18 10:52:43', 1, NULL, '123456789', NULL, NULL, '000000089', 'ville', '72001', 1, 'Amani', NULL, 'rue bonjour'),
(15, 'siwar', 'mensi', 'siwarmensi6@gmail.com', 'mensi', NULL, NULL, NULL, '2021-09-09 10:37:58', '2021-09-09 10:38:19', 1, NULL, 'sousassoumsi', NULL, NULL, '56346009', 'paris', '1234', 1, 'siwar', NULL, 'bonjourr'),
(16, 'chokri', 'saidi', 'chokri.saidi@go-makkah.com', 'SAIDI', NULL, NULL, NULL, '2021-09-09 15:03:38', NULL, 1, NULL, 'Azerty01+', NULL, NULL, '0622190709', 'Ivry sur seine', '94200', 1, 'CHOKRI', NULL, '32 avenue Pierre Semard'),
(17, 'amani', 'fallah', 'fallah.amani@gmail.com', 'Fallah', NULL, NULL, NULL, '2021-09-16 08:40:32', NULL, 1, NULL, '12345789', NULL, NULL, '003301010101', 'Trappes ', '78190', 1, 'Amani', NULL, 'Trappes '),
(18, 'basem', 'fartoun', 'fartounbassem@gmail.com', 'basem', 'paris', '0033 954 543 3', 'paris', '2021-09-19 00:44:54', NULL, 1, '12345', '123456', 1, NULL, '0033 954 543 3', 'paris', '12345', 1, 'fartoun', NULL, 'paris'),
(19, 'Monique', 'Heldt', 'monette13170@gmail.com', 'Monique', '5rue de la cabreto la voilerie', '0442027501', 'les pennes mirabeau', '2021-09-22 09:33:17', NULL, 1, '13170', 'monette', 1, NULL, '0442027501', 'les pennes mirabeau', '13170', 1, 'Heldt', NULL, '5rue de la cabreto la voilerie');

-- --------------------------------------------------------

--
-- Structure de la table `av_customer_shopping`
--

CREATE TABLE `av_customer_shopping` (
  `customer_shopping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_shopping_name` varchar(255) NOT NULL,
  `customer_shopping_data_created` datetime NOT NULL,
  `customer_shopping_data_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_customer_shopping`
--

INSERT INTO `av_customer_shopping` (`customer_shopping_id`, `customer_id`, `customer_shopping_name`, `customer_shopping_data_created`, `customer_shopping_data_updated`) VALUES
(1, 4, 'TEST', '2021-06-14 23:36:38', '2021-06-14 23:36:38'),
(2, 16, 'Ma liste 1', '2021-09-09 15:13:12', '2021-09-09 15:13:12');

-- --------------------------------------------------------

--
-- Structure de la table `av_customer_shopping_products`
--

CREATE TABLE `av_customer_shopping_products` (
  `customer_shopping_product_id` int(11) NOT NULL,
  `customer_shopping_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `association_id` int(11) DEFAULT NULL,
  `customer_shopping_product_data_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_customer_shopping_products`
--

INSERT INTO `av_customer_shopping_products` (`customer_shopping_product_id`, `customer_shopping_id`, `product_id`, `product_quantity`, `association_id`, `customer_shopping_product_data_created`) VALUES
(1, 1, 85, 1, 0, '2021-06-14 23:36:44');

-- --------------------------------------------------------

--
-- Structure de la table `av_departement`
--

CREATE TABLE `av_departement` (
  `departement_id` int(11) NOT NULL,
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_departement`
--

INSERT INTO `av_departement` (`departement_id`, `departement_code`, `departement_nom`, `departement_nom_uppercase`, `departement_slug`, `departement_nom_soundex`) VALUES
(1, '01', 'Ain', 'AIN', 'ain', 'A500'),
(2, '02', 'Aisne', 'AISNE', 'aisne', 'A250'),
(3, '03', 'Allier', 'ALLIER', 'allier', 'A460'),
(5, '05', 'Hautes-Alpes', 'HAUTES-ALPES', 'hautes-alpes', 'H32412'),
(4, '04', 'Alpes-de-Haute-Provence', 'ALPES-DE-HAUTE-PROVENCE', 'alpes-de-haute-provence', 'A412316152'),
(6, '06', 'Alpes-Maritimes', 'ALPES-MARITIMES', 'alpes-maritimes', 'A41256352'),
(7, '07', 'Ardèche', 'ARDÈCHE', 'ardeche', 'A632'),
(8, '08', 'Ardennes', 'ARDENNES', 'ardennes', 'A6352'),
(9, '09', 'Ariège', 'ARIÈGE', 'ariege', 'A620'),
(10, '10', 'Aube', 'AUBE', 'aube', 'A100'),
(11, '11', 'Aude', 'AUDE', 'aude', 'A300'),
(12, '12', 'Aveyron', 'AVEYRON', 'aveyron', 'A165'),
(13, '13', 'Bouches-du-Rhône', 'BOUCHES-DU-RHÔNE', 'bouches-du-rhone', 'B2365'),
(14, '14', 'Calvados', 'CALVADOS', 'calvados', 'C4132'),
(15, '15', 'Cantal', 'CANTAL', 'cantal', 'C534'),
(16, '16', 'Charente', 'CHARENTE', 'charente', 'C653'),
(17, '17', 'Charente-Maritime', 'CHARENTE-MARITIME', 'charente-maritime', 'C6535635'),
(18, '18', 'Cher', 'CHER', 'cher', 'C600'),
(19, '19', 'Corrèze', 'CORRÈZE', 'correze', 'C620'),
(20, '2a', 'Corse-du-sud', 'CORSE-DU-SUD', 'corse-du-sud', 'C62323'),
(21, '2b', 'Haute-corse', 'HAUTE-CORSE', 'haute-corse', 'H3262'),
(22, '21', 'Côte-d\'or', 'CÔTE-D\'OR', 'cote-dor', 'C360'),
(23, '22', 'Côtes-d\'armor', 'CÔTES-D\'ARMOR', 'cotes-darmor', 'C323656'),
(24, '23', 'Creuse', 'CREUSE', 'creuse', 'C620'),
(25, '24', 'Dordogne', 'DORDOGNE', 'dordogne', 'D6325'),
(26, '25', 'Doubs', 'DOUBS', 'doubs', 'D120'),
(27, '26', 'Drôme', 'DRÔME', 'drome', 'D650'),
(28, '27', 'Eure', 'EURE', 'eure', 'E600'),
(29, '28', 'Eure-et-Loir', 'EURE-ET-LOIR', 'eure-et-loir', 'E6346'),
(30, '29', 'Finistère', 'FINISTÈRE', 'finistere', 'F5236'),
(31, '30', 'Gard', 'GARD', 'gard', 'G630'),
(32, '31', 'Haute-Garonne', 'HAUTE-GARONNE', 'haute-garonne', 'H3265'),
(33, '32', 'Gers', 'GERS', 'gers', 'G620'),
(34, '33', 'Gironde', 'GIRONDE', 'gironde', 'G653'),
(35, '34', 'Hérault', 'HÉRAULT', 'herault', 'H643'),
(36, '35', 'Ile-et-Vilaine', 'ILE-ET-VILAINE', 'ile-et-vilaine', 'I43145'),
(37, '36', 'Indre', 'INDRE', 'indre', 'I536'),
(38, '37', 'Indre-et-Loire', 'INDRE-ET-LOIRE', 'indre-et-loire', 'I536346'),
(39, '38', 'Isère', 'ISÈRE', 'isere', 'I260'),
(40, '39', 'Jura', 'JURA', 'jura', 'J600'),
(41, '40', 'Landes', 'LANDES', 'landes', 'L532'),
(42, '41', 'Loir-et-Cher', 'LOIR-ET-CHER', 'loir-et-cher', 'L6326'),
(43, '42', 'Loire', 'LOIRE', 'loire', 'L600'),
(44, '43', 'Haute-Loire', 'HAUTE-LOIRE', 'haute-loire', 'H346'),
(45, '44', 'Loire-Atlantique', 'LOIRE-ATLANTIQUE', 'loire-atlantique', 'L634532'),
(46, '45', 'Loiret', 'LOIRET', 'loiret', 'L630'),
(47, '46', 'Lot', 'LOT', 'lot', 'L300'),
(48, '47', 'Lot-et-Garonne', 'LOT-ET-GARONNE', 'lot-et-garonne', 'L3265'),
(49, '48', 'Lozère', 'LOZÈRE', 'lozere', 'L260'),
(50, '49', 'Maine-et-Loire', 'MAINE-ET-LOIRE', 'maine-et-loire', 'M346'),
(51, '50', 'Manche', 'MANCHE', 'manche', 'M200'),
(52, '51', 'Marne', 'MARNE', 'marne', 'M650'),
(53, '52', 'Haute-Marne', 'HAUTE-MARNE', 'haute-marne', 'H3565'),
(54, '53', 'Mayenne', 'MAYENNE', 'mayenne', 'M000'),
(55, '54', 'Meurthe-et-Moselle', 'MEURTHE-ET-MOSELLE', 'meurthe-et-moselle', 'M63524'),
(56, '55', 'Meuse', 'MEUSE', 'meuse', 'M200'),
(57, '56', 'Morbihan', 'MORBIHAN', 'morbihan', 'M615'),
(58, '57', 'Moselle', 'MOSELLE', 'moselle', 'M240'),
(59, '58', 'Nièvre', 'NIÈVRE', 'nievre', 'N160'),
(60, '59', 'Nord', 'NORD', 'nord', 'N630'),
(61, '60', 'Oise', 'OISE', 'oise', 'O200'),
(62, '61', 'Orne', 'ORNE', 'orne', 'O650'),
(63, '62', 'Pas-de-Calais', 'PAS-DE-CALAIS', 'pas-de-calais', 'P23242'),
(64, '63', 'Puy-de-Dôme', 'PUY-DE-DÔME', 'puy-de-dome', 'P350'),
(65, '64', 'Pyrénées-Atlantiques', 'PYRÉNÉES-ATLANTIQUES', 'pyrenees-atlantiques', 'P65234532'),
(66, '65', 'Hautes-Pyrénées', 'HAUTES-PYRÉNÉES', 'hautes-pyrenees', 'H321652'),
(67, '66', 'Pyrénées-Orientales', 'PYRÉNÉES-ORIENTALES', 'pyrenees-orientales', 'P65265342'),
(68, '67', 'Bas-Rhin', 'BAS-RHIN', 'bas-rhin', 'B265'),
(69, '68', 'Haut-Rhin', 'HAUT-RHIN', 'haut-rhin', 'H365'),
(70, '69', 'Rhône', 'RHÔNE', 'rhone', 'R500'),
(71, '70', 'Haute-Saône', 'HAUTE-SAÔNE', 'haute-saone', 'H325'),
(72, '71', 'Saône-et-Loire', 'SAÔNE-ET-LOIRE', 'saone-et-loire', 'S5346'),
(73, '72', 'Sarthe', 'SARTHE', 'sarthe', 'S630'),
(74, '73', 'Savoie', 'SAVOIE', 'savoie', 'S100'),
(75, '74', 'Haute-Savoie', 'HAUTE-SAVOIE', 'haute-savoie', 'H321'),
(76, '75', 'Paris', 'PARIS', 'paris', 'P620'),
(77, '76', 'Seine-Maritime', 'SEINE-MARITIME', 'seine-maritime', 'S5635'),
(78, '77', 'Seine-et-Marne', 'SEINE-ET-MARNE', 'seine-et-marne', 'S53565'),
(79, '78', 'Yvelines', 'YVELINES', 'yvelines', 'Y1452'),
(80, '79', 'Deux-Sèvres', 'DEUX-SÈVRES', 'deux-sevres', 'D2162'),
(81, '80', 'Somme', 'SOMME', 'somme', 'S500'),
(82, '81', 'Tarn', 'TARN', 'tarn', 'T650'),
(83, '82', 'Tarn-et-Garonne', 'TARN-ET-GARONNE', 'tarn-et-garonne', 'T653265'),
(84, '83', 'Var', 'VAR', 'var', 'V600'),
(85, '84', 'Vaucluse', 'VAUCLUSE', 'vaucluse', 'V242'),
(86, '85', 'Vendée', 'VENDÉE', 'vendee', 'V530'),
(87, '86', 'Vienne', 'VIENNE', 'vienne', 'V500'),
(88, '87', 'Haute-Vienne', 'HAUTE-VIENNE', 'haute-vienne', 'H315'),
(89, '88', 'Vosges', 'VOSGES', 'vosges', 'V200'),
(90, '89', 'Yonne', 'YONNE', 'yonne', 'Y500'),
(91, '90', 'Territoire de Belfort', 'TERRITOIRE DE BELFORT', 'territoire-de-belfort', 'T636314163'),
(92, '91', 'Essonne', 'ESSONNE', 'essonne', 'E250'),
(93, '92', 'Hauts-de-Seine', 'HAUTS-DE-SEINE', 'hauts-de-seine', 'H32325'),
(94, '93', 'Seine-Saint-Denis', 'SEINE-SAINT-DENIS', 'seine-saint-denis', 'S525352'),
(95, '94', 'Val-de-Marne', 'VAL-DE-MARNE', 'val-de-marne', 'V43565'),
(96, '95', 'Val-d\'oise', 'VAL-D\'OISE', 'val-doise', 'V432'),
(97, '976', 'Mayotte', 'MAYOTTE', 'mayotte', 'M300'),
(98, '971', 'Guadeloupe', 'GUADELOUPE', 'guadeloupe', 'G341'),
(99, '973', 'Guyane', 'GUYANE', 'guyane', 'G500'),
(100, '972', 'Martinique', 'MARTINIQUE', 'martinique', 'M6352'),
(101, '974', 'Réunion', 'RÉUNION', 'reunion', 'R500');

-- --------------------------------------------------------

--
-- Structure de la table `av_home_blocks`
--

CREATE TABLE `av_home_blocks` (
  `home_block_id` int(11) NOT NULL,
  `home_block_text` text DEFAULT NULL,
  `home_block_botton_text` text DEFAULT NULL,
  `home_block_picture` varchar(255) DEFAULT NULL,
  `home_block_data_status` int(11) DEFAULT 0,
  `files` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT 0,
  `home_block_title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_home_blocks`
--

INSERT INTO `av_home_blocks` (`home_block_id`, `home_block_text`, `home_block_botton_text`, `home_block_picture`, `home_block_data_status`, `files`, `product_id`, `home_block_title`) VALUES
(1, '', '', 'file_e3ce8a73c50f5c5c7185b9b27f4daff1.jpg', 0, NULL, 0, 'block'),
(2, '', 'Réservez mon pack !', 'hero_2.jpg', 0, NULL, 3, 'Réservez mon pack !'),
(3, '<p>à une de nos associations partenaires </p> <p>GO ferme halal met un point d’honneur à travailler main dans la main avec des associations partenaires dans plusieurs pays. Votre mouton sera livré en 24h et vous recevrez les vidéos avec votre nom et remerciements ! </p>', 'Je fais don d\'un mouton  !', 'image-13.jpg', 0, NULL, 89, 'Faites don de <span> votre mouton !</span>');

-- --------------------------------------------------------

--
-- Structure de la table `av_log_orders_parteners`
--

CREATE TABLE `av_log_orders_parteners` (
  `log_order_partener_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `old_partener_id` int(11) DEFAULT NULL,
  `new_partener_id` int(11) DEFAULT NULL,
  `log_data_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_log_orders_parteners`
--

INSERT INTO `av_log_orders_parteners` (`log_order_partener_id`, `order_id`, `account_id`, `old_partener_id`, `new_partener_id`, `log_data_created`) VALUES
(4, 89, NULL, 9, 10, '2021-09-19 14:47:53');

-- --------------------------------------------------------

--
-- Structure de la table `av_log_products_parteners_price`
--

CREATE TABLE `av_log_products_parteners_price` (
  `log_product_partener_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `old_price_buying` float DEFAULT 0,
  `new_price_buying` float DEFAULT 0,
  `log_data_created` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_log_products_parteners_price`
--

INSERT INTO `av_log_products_parteners_price` (`log_product_partener_id`, `product_id`, `user`, `old_price_buying`, `new_price_buying`, `log_data_created`, `type`, `user_name`) VALUES
(2, 87, 2, 39.9, 39.9, '2021-05-01 02:30:43', 'user', 'Fartoun'),
(3, 87, 2, 39.9, 39.9, '2021-05-01 02:32:32', 'admine', 'BASSEM Fartoun'),
(4, 87, 2, 39.9, 30.9, '2021-05-01 02:33:02', 'admine', 'BASSEM Fartoun'),
(5, 87, 2, 30.9, 39.9, '2021-05-01 02:33:14', 'admine', 'BASSEM Fartoun'),
(6, 2, 9, 24.8, 24.8, '2021-05-01 02:39:16', 'Boucherie ', 'Boucherie Paris 11'),
(7, 80, 9, 36, 36, '2021-06-24 17:01:21', 'Boucherie', 'Boucherie Paris 11'),
(8, 91, 9, 16, 16, '2021-06-27 11:27:53', 'Boucherie', 'Boucherie Paris 11'),
(9, 87, 9, 39.9, 39.9, '2021-07-09 10:58:53', 'Boucherie', 'Boucherie Paris 11'),
(10, 90, 9, 0, 16, '2021-07-29 15:07:18', 'Boucherie', 'Boucherie Paris 11'),
(11, 86, 9, 28, 28, '2021-08-05 09:49:56', 'Boucherie', 'Boucherie Paris 11'),
(12, 196, 0, 0, 25, '2021-08-13 15:31:12', 'Boucherie', NULL),
(13, 196, 0, 25, 24, '2021-08-13 15:32:44', 'Boucherie', NULL),
(14, 196, 9, 0, 25, '2021-08-13 15:43:47', 'Boucherie', 'Boucherie Paris 11'),
(15, 195, 9, 0, 19.9, '2021-08-13 15:46:54', 'Boucherie', 'Boucherie Paris 11'),
(16, 194, 9, 0, 2.5, '2021-08-13 15:51:36', 'Boucherie', 'Boucherie Paris 11'),
(17, 221, 9, 4.9, 14, '2021-08-13 16:17:10', 'Boucherie', 'Boucherie Paris 11'),
(18, 285, 9, 0, 4.58, '2021-09-02 12:55:39', 'Boucherie', 'Boucherie Paris 11'),
(19, 284, 9, 0, 1.19, '2021-09-02 12:57:02', 'Boucherie', 'Boucherie Paris 11'),
(20, 283, 9, 0, 4.58, '2021-09-02 12:57:19', 'Boucherie', 'Boucherie Paris 11'),
(21, 282, 9, 0, 4.58, '2021-09-02 12:57:41', 'Boucherie', 'Boucherie Paris 11'),
(22, 284, 9, 0, 4.58, '2021-09-02 12:59:10', 'Boucherie', 'Boucherie Paris 11'),
(23, 284, 9, 0, 4.58, '2021-09-02 12:59:14', 'Boucherie', 'Boucherie Paris 11'),
(24, 90, 0, NULL, 16, '2021-09-13 08:39:39', 'Boucherie', 'admines'),
(25, 90, 0, NULL, 16, '2021-09-13 08:40:53', 'Boucherie', 'admines'),
(26, 90, 0, NULL, 16, '2021-09-13 08:42:58', 'Boucherie', 'admines'),
(27, 90, 0, NULL, 16, '2021-09-13 08:43:06', 'Boucherie', 'admines'),
(28, 90, 0, NULL, 16, '2021-09-13 08:43:19', 'Boucherie', 'admines'),
(29, 90, 0, NULL, 16, '2021-09-13 08:43:38', 'Boucherie', 'admines'),
(30, 90, 0, NULL, 16, '2021-09-13 08:46:41', 'Boucherie', 'admines'),
(31, 90, 0, NULL, 16, '2021-09-13 08:46:50', 'Boucherie', 'admines'),
(32, 90, 0, NULL, 16, '2021-09-13 08:47:22', 'Boucherie', 'admines'),
(33, 90, 0, NULL, 16, '2021-09-13 08:49:30', 'Boucherie', 'admines'),
(34, 90, 0, NULL, 16, '2021-09-14 08:54:03', 'Boucherie', 'admines'),
(35, 90, 0, NULL, 16, '2021-09-14 08:54:09', 'Boucherie', 'admines'),
(36, 90, 0, NULL, 16, '2021-09-14 08:54:19', 'Boucherie', 'admines'),
(37, 90, 0, NULL, 16, '2021-09-14 08:54:20', 'Boucherie', 'admines'),
(38, 90, 0, NULL, 16, '2021-09-14 08:54:27', 'Boucherie', 'admines'),
(39, 90, 0, NULL, 16, '2021-09-14 08:54:29', 'Boucherie', 'admines'),
(40, 90, 0, NULL, 16, '2021-09-14 08:54:38', 'Boucherie', 'admines'),
(41, 90, 0, NULL, 16, '2021-09-14 08:54:56', 'Boucherie', 'admines'),
(42, 90, 0, NULL, 16, '2021-09-14 08:54:58', 'Boucherie', 'admines'),
(43, 90, 0, NULL, 16, '2021-09-14 08:55:04', 'Boucherie', 'admines'),
(44, 90, 0, NULL, 15, '2021-09-14 08:55:16', 'Boucherie', 'admines'),
(45, 90, 0, NULL, 16, '2021-09-14 08:55:22', 'Boucherie', 'admines'),
(46, 90, 0, NULL, 16, '2021-09-14 08:55:31', 'Boucherie', 'admines'),
(47, 90, 0, NULL, 17.9, '2021-09-14 08:56:46', 'Boucherie', 'admines'),
(48, 90, 0, NULL, 17.9, '2021-09-14 08:56:59', 'Boucherie', 'admines'),
(49, 90, 0, NULL, 17.9, '2021-09-14 08:57:04', 'Boucherie', 'admines'),
(50, 90, 0, NULL, 17, '2021-09-14 08:57:32', 'Boucherie', 'admines'),
(51, 90, 0, NULL, 17, '2021-09-14 08:57:39', 'Boucherie', 'admines'),
(52, 90, 0, NULL, 17, '2021-09-14 08:57:56', 'Boucherie', 'admines'),
(53, 90, 0, NULL, 17, '2021-09-14 09:01:26', 'Boucherie', 'admines'),
(54, 90, 0, NULL, 17, '2021-09-14 09:02:00', 'Boucherie', 'admines'),
(55, 90, 0, NULL, 17.9, '2021-09-14 09:02:12', 'Boucherie', 'admines'),
(56, 90, 0, NULL, 17, '2021-09-14 09:03:37', 'Boucherie', 'admines'),
(57, 90, 0, NULL, 17, '2021-09-14 09:03:48', 'Boucherie', 'admines'),
(58, 90, 0, NULL, 17, '2021-09-14 09:03:53', 'Boucherie', 'admines'),
(59, 90, 0, NULL, 17.9, '2021-09-14 09:04:39', 'Boucherie', 'admines'),
(60, 163, 0, NULL, 8.9, '2021-09-14 09:06:56', 'Boucherie', 'admines'),
(61, 156, 0, NULL, 9.9, '2021-09-14 09:09:39', 'Boucherie', 'admines'),
(62, 160, 0, NULL, 6.5, '2021-09-14 09:10:28', 'Boucherie', 'admines'),
(63, 161, 0, NULL, 0, '2021-09-14 09:11:28', 'Boucherie', 'admines'),
(64, 161, 0, NULL, 0, '2021-09-14 09:11:32', 'Boucherie', 'admines'),
(65, 161, 0, NULL, 0.8, '2021-09-14 09:11:39', 'Boucherie', 'admines'),
(66, 165, 0, NULL, 3, '2021-09-14 09:12:48', 'Boucherie', 'admines'),
(67, 162, 0, NULL, 13.9, '2021-09-14 09:13:57', 'Boucherie', 'admines'),
(68, 164, 0, NULL, 5.9, '2021-09-14 09:14:48', 'Boucherie', 'admines'),
(69, 166, 0, NULL, 9.9, '2021-09-14 09:16:18', 'Boucherie', 'admines'),
(70, 238, 0, NULL, 15.9, '2021-09-14 09:17:03', 'Boucherie', 'admines'),
(71, 86, 0, NULL, 15, '2021-09-14 09:17:52', 'Boucherie', 'admines'),
(72, 86, 0, NULL, 15, '2021-09-14 09:18:11', 'Boucherie', 'admines'),
(73, 86, 0, NULL, 15, '2021-09-14 09:18:15', 'Boucherie', 'admines'),
(74, 86, 0, NULL, 15, '2021-09-14 09:18:39', 'Boucherie', 'admines'),
(75, 86, 0, NULL, 15, '2021-09-14 09:21:01', 'Boucherie', 'admines'),
(76, 86, 0, NULL, 15, '2021-09-14 09:26:43', 'Boucherie', 'admines'),
(77, 86, 0, NULL, 15, '2021-09-14 09:26:46', 'Boucherie', 'admines'),
(78, 86, 0, NULL, 15, '2021-09-14 09:26:47', 'Boucherie', 'admines'),
(79, 86, 0, NULL, 15, '2021-09-14 09:33:01', 'Boucherie', 'admines'),
(80, 86, 0, NULL, 15, '2021-09-14 09:41:44', 'Boucherie', 'admines'),
(81, 86, 0, NULL, 15, '2021-09-14 09:45:59', 'Boucherie', 'admines'),
(82, 86, 0, NULL, 15, '2021-09-14 09:46:07', 'Boucherie', 'admines'),
(83, 86, 0, NULL, 15, '2021-09-14 09:46:13', 'Boucherie', 'admines'),
(84, 86, 0, NULL, 15, '2021-09-14 09:49:14', 'Boucherie', 'admines'),
(85, 85, 0, NULL, 13.9, '2021-09-14 09:59:03', 'Boucherie', 'admines'),
(86, 85, 0, NULL, 13.9, '2021-09-14 09:59:14', 'Boucherie', 'admines'),
(87, 85, 0, NULL, 13.9, '2021-09-14 09:59:14', 'Boucherie', 'admines'),
(88, 85, 0, NULL, 13.9, '2021-09-14 09:59:16', 'Boucherie', 'admines'),
(89, 85, 0, NULL, 13.9, '2021-09-14 09:59:16', 'Boucherie', 'admines'),
(90, 85, 0, NULL, 13.9, '2021-09-14 09:59:17', 'Boucherie', 'admines'),
(91, 85, 0, NULL, 13.9, '2021-09-14 09:59:18', 'Boucherie', 'admines'),
(92, 85, 0, NULL, 13.9, '2021-09-14 09:59:20', 'Boucherie', 'admines'),
(93, 85, 0, NULL, 13.9, '2021-09-14 09:59:20', 'Boucherie', 'admines'),
(94, 85, 0, NULL, 13.9, '2021-09-14 09:59:24', 'Boucherie', 'admines'),
(95, 85, 0, NULL, 13, '2021-09-14 10:06:05', 'Boucherie', 'admines'),
(96, 84, 0, NULL, 8.5, '2021-09-14 10:35:53', 'Boucherie', 'admines'),
(97, 84, 0, NULL, 8.5, '2021-09-14 10:36:02', 'Boucherie', 'admines'),
(98, 84, 0, NULL, 8.5, '2021-09-14 10:36:46', 'Boucherie', 'admines'),
(99, 83, 0, NULL, 14.9, '2021-09-14 10:37:55', 'Boucherie', 'admines'),
(100, 83, 0, NULL, 14.9, '2021-09-14 10:38:02', 'Boucherie', 'admines'),
(101, 243, 0, NULL, 13.9, '2021-09-14 10:39:10', 'Boucherie', 'admines'),
(102, 243, 0, NULL, 13.9, '2021-09-14 10:39:16', 'Boucherie', 'admines'),
(103, 243, 0, NULL, 13, '2021-09-14 10:39:39', 'Boucherie', 'admines'),
(104, 251, 0, NULL, 14.9, '2021-09-14 10:40:39', 'Boucherie', 'admines'),
(105, 251, 0, NULL, 14.9, '2021-09-14 10:40:48', 'Boucherie', 'admines'),
(106, 150, 0, NULL, 14.9, '2021-09-14 10:42:59', 'Boucherie', 'admines'),
(107, 150, 0, NULL, 14.9, '2021-09-14 10:43:04', 'Boucherie', 'admines'),
(108, 150, 0, NULL, 14.9, '2021-09-14 10:43:12', 'Boucherie', 'admines'),
(109, 149, 0, NULL, 14.9, '2021-09-14 10:44:03', 'Boucherie', 'admines'),
(110, 148, 0, NULL, 14.9, '2021-09-14 10:44:47', 'Boucherie', 'admines'),
(111, 151, 0, NULL, 8.5, '2021-09-14 10:45:49', 'Boucherie', 'admines'),
(112, 78, 0, NULL, 14.9, '2021-09-14 10:46:35', 'Boucherie', 'admines'),
(113, 77, 0, NULL, 12.9, '2021-09-14 10:47:22', 'Boucherie', 'admines'),
(114, 239, 0, NULL, 16.9, '2021-09-14 10:48:40', 'Boucherie', 'admines'),
(115, 76, 0, NULL, 14.9, '2021-09-14 10:49:09', 'Boucherie', 'admines'),
(116, 75, 0, NULL, 13.9, '2021-09-14 10:49:39', 'Boucherie', 'admines'),
(117, 74, 0, NULL, 14.9, '2021-09-14 10:50:20', 'Boucherie', 'admines'),
(118, 73, 0, NULL, 15.9, '2021-09-14 10:50:54', 'Boucherie', 'admines'),
(119, 72, 0, NULL, 14.9, '2021-09-14 10:51:36', 'Boucherie', 'admines'),
(120, 252, 0, NULL, 10.9, '2021-09-14 10:53:15', 'Boucherie', 'admines'),
(121, 250, 0, NULL, 17, '2021-09-14 11:00:45', 'Boucherie', 'admines'),
(122, 250, 0, NULL, 6.9, '2021-09-14 11:00:50', 'Boucherie', 'admines'),
(123, 249, 0, NULL, 10.9, '2021-09-14 11:01:39', 'Boucherie', 'admines'),
(124, 57, 0, NULL, 9.9, '2021-09-14 11:02:25', 'Boucherie', 'admines'),
(125, 247, 0, NULL, 9.9, '2021-09-14 11:03:06', 'Boucherie', 'admines'),
(126, 245, 0, NULL, 10.9, '2021-09-14 11:03:40', 'Boucherie', 'admines'),
(127, 242, 0, NULL, 9.9, '2021-09-14 11:04:23', 'Boucherie', 'admines'),
(128, 236, 0, NULL, 27.9, '2021-09-14 11:05:12', 'Boucherie', 'admines'),
(129, 235, 0, NULL, 15.9, '2021-09-14 11:07:25', 'Boucherie', 'admines'),
(130, 234, 0, NULL, 19.9, '2021-09-14 11:07:56', 'Boucherie', 'admines'),
(131, 233, 0, NULL, 12.9, '2021-09-14 11:08:25', 'Boucherie', 'admines'),
(132, 232, 0, NULL, 17.9, '2021-09-14 11:08:58', 'Boucherie', 'admines'),
(133, 231, 0, NULL, 17.9, '2021-09-14 11:09:23', 'Boucherie', 'admines'),
(134, 228, 0, NULL, 10.9, '2021-09-14 11:11:53', 'Boucherie', 'admines'),
(135, 227, 0, NULL, 10.9, '2021-09-14 11:14:05', 'Boucherie', 'admines'),
(136, 227, 0, NULL, 10.9, '2021-09-14 11:14:11', 'Boucherie', 'admines'),
(137, 227, 0, NULL, 11, '2021-09-14 11:14:17', 'Boucherie', 'admines'),
(138, 227, 0, NULL, 11, '2021-09-14 11:14:17', 'Boucherie', 'admines'),
(139, 227, 0, NULL, 11, '2021-09-14 11:14:19', 'Boucherie', 'admines'),
(140, 227, 0, NULL, 11, '2021-09-14 11:14:20', 'Boucherie', 'admines'),
(141, 227, 0, NULL, 10.9, '2021-09-14 11:14:38', 'Boucherie', 'admines'),
(142, 227, 0, NULL, 10.9, '2021-09-14 11:14:41', 'Boucherie', 'admines'),
(143, 227, 0, NULL, 6, '2021-09-14 11:14:46', 'Boucherie', 'admines'),
(144, 227, 0, NULL, 10.9, '2021-09-14 11:14:51', 'Boucherie', 'admines'),
(145, 226, 0, NULL, 6.9, '2021-09-14 11:23:08', 'Boucherie', 'admines'),
(146, 226, 0, NULL, 6.9, '2021-09-14 11:23:09', 'Boucherie', 'admines'),
(147, 58, 0, NULL, 6.9, '2021-09-14 11:31:27', 'Boucherie', 'admines'),
(148, 138, 0, NULL, 12.9, '2021-09-14 11:33:12', 'Boucherie', 'admines'),
(149, 135, 0, NULL, 8.9, '2021-09-14 11:33:55', 'Boucherie', 'admines'),
(150, 133, 0, NULL, 9.9, '2021-09-14 11:35:32', 'Boucherie', 'admines'),
(151, 132, 0, NULL, 9.9, '2021-09-14 11:36:11', 'Boucherie', 'admines'),
(152, 131, 0, NULL, 13.9, '2021-09-14 11:36:50', 'Boucherie', 'admines'),
(153, 130, 0, NULL, 10.9, '2021-09-14 11:37:20', 'Boucherie', 'admines'),
(154, 129, 0, NULL, 13.9, '2021-09-14 11:37:47', 'Boucherie', 'admines'),
(155, 128, 0, NULL, 10.9, '2021-09-14 11:38:17', 'Boucherie', 'admines'),
(156, 127, 0, NULL, 12.9, '2021-09-14 11:38:53', 'Boucherie', 'admines'),
(157, 126, 0, NULL, 10.9, '2021-09-14 11:39:26', 'Boucherie', 'admines'),
(158, 125, 0, NULL, 10.9, '2021-09-14 11:40:07', 'Boucherie', 'admines'),
(159, 124, 0, NULL, 9.9, '2021-09-14 11:40:56', 'Boucherie', 'admines'),
(160, 123, 0, NULL, 9.9, '2021-09-14 11:41:18', 'Boucherie', 'admines'),
(161, 122, 0, NULL, 9.9, '2021-09-14 11:41:41', 'Boucherie', 'admines'),
(162, 121, 0, NULL, 14.9, '2021-09-14 11:42:14', 'Boucherie', 'admines'),
(163, 120, 0, NULL, 14.9, '2021-09-14 11:42:53', 'Boucherie', 'admines'),
(164, 71, 0, NULL, 17.9, '2021-09-14 11:43:32', 'Boucherie', 'admines'),
(165, 70, 0, NULL, 10.9, '2021-09-14 11:44:17', 'Boucherie', 'admines'),
(166, 69, 0, NULL, 19.9, '2021-09-14 11:44:50', 'Boucherie', 'admines'),
(167, 67, 0, NULL, 17.9, '2021-09-14 11:45:25', 'Boucherie', 'admines'),
(168, 66, 0, NULL, 16.9, '2021-09-14 11:45:58', 'Boucherie', 'admines'),
(169, 65, 0, NULL, 9.9, '2021-09-14 11:46:47', 'Boucherie', 'admines'),
(170, 64, 0, NULL, 14.9, '2021-09-14 11:47:14', 'Boucherie', 'admines'),
(171, 63, 0, NULL, 14.9, '2021-09-14 11:47:50', 'Boucherie', 'admines'),
(172, 61, 0, NULL, 14.9, '2021-09-14 11:48:40', 'Boucherie', 'admines'),
(173, 60, 0, NULL, 17.9, '2021-09-14 11:51:11', 'Boucherie', 'admines'),
(174, 59, 0, NULL, 14.9, '2021-09-14 11:51:38', 'Boucherie', 'admines'),
(175, 57, 0, NULL, 6.9, '2021-09-14 11:52:41', 'Boucherie', 'admines'),
(176, 56, 0, NULL, 25.9, '2021-09-14 11:53:34', 'Boucherie', 'admines'),
(177, 55, 0, NULL, 16.9, '2021-09-14 11:54:41', 'Boucherie', 'admines'),
(178, 54, 0, NULL, 14.9, '2021-09-14 11:55:08', 'Boucherie', 'admines'),
(179, 53, 0, NULL, 13.9, '2021-09-14 11:55:31', 'Boucherie', 'admines'),
(180, 52, 0, NULL, 25.9, '2021-09-14 11:56:15', 'Boucherie', 'admines'),
(181, 51, 0, NULL, 14.9, '2021-09-14 11:56:48', 'Boucherie', 'admines'),
(182, 50, 0, NULL, 14.9, '2021-09-14 11:57:26', 'Boucherie', 'admines'),
(183, 49, 0, NULL, 14.9, '2021-09-14 11:57:56', 'Boucherie', 'admines'),
(184, 48, 0, NULL, 15.9, '2021-09-14 11:58:19', 'Boucherie', 'admines'),
(185, 47, 0, NULL, 9.9, '2021-09-14 11:59:13', 'Boucherie', 'admines'),
(186, 46, 0, NULL, 15.9, '2021-09-14 11:59:43', 'Boucherie', 'admines'),
(187, 45, 0, NULL, 9.9, '2021-09-14 12:00:11', 'Boucherie', 'admines'),
(188, 44, 0, NULL, 14.9, '2021-09-14 12:00:47', 'Boucherie', 'admines'),
(189, 68, 0, NULL, 9.9, '2021-09-14 12:01:32', 'Boucherie', 'admines'),
(190, 183, 0, NULL, 8.9, '2021-09-14 12:02:02', 'Boucherie', 'admines'),
(191, 185, 0, NULL, 10.9, '2021-09-14 12:02:37', 'Boucherie', 'admines'),
(192, 39, 0, NULL, 5.9, '2021-09-14 12:06:09', 'Boucherie', 'admines'),
(193, 174, 0, NULL, 8.9, '2021-09-14 12:06:49', 'Boucherie', 'admines'),
(194, 38, 0, NULL, 5.9, '2021-09-14 12:07:32', 'Boucherie', 'admines'),
(195, 37, 0, NULL, 9.9, '2021-09-14 12:08:45', 'Boucherie', 'admines'),
(196, 36, 0, NULL, 13.9, '2021-09-14 12:09:27', 'Boucherie', 'admines'),
(197, 35, 0, NULL, 13.9, '2021-09-14 12:10:31', 'Boucherie', 'admines'),
(198, 34, 0, NULL, 6, '2021-09-14 12:11:01', 'Boucherie', 'admines'),
(199, 33, 0, NULL, 6.9, '2021-09-14 12:11:41', 'Boucherie', 'admines'),
(200, 31, 0, NULL, 6.9, '2021-09-14 12:13:14', 'Boucherie', 'admines'),
(201, 30, 0, NULL, 13.9, '2021-09-14 12:13:44', 'Boucherie', 'admines'),
(202, 28, 0, NULL, 6.9, '2021-09-14 12:14:23', 'Boucherie', 'admines'),
(203, 26, 0, NULL, 6.9, '2021-09-14 12:15:08', 'Boucherie', 'admines'),
(204, 181, 0, NULL, 6.9, '2021-09-14 12:15:45', 'Boucherie', 'admines'),
(205, 182, 0, NULL, 9, '2021-09-14 12:16:38', 'Boucherie', 'admines'),
(206, 186, 0, NULL, 7.95, '2021-09-14 12:17:23', 'Boucherie', 'admines'),
(207, 175, 0, NULL, 8.9, '2021-09-14 12:18:01', 'Boucherie', 'admines'),
(208, 175, 0, NULL, 8.9, '2021-09-14 12:18:06', 'Boucherie', 'admines'),
(209, 187, 0, NULL, 8.9, '2021-09-14 12:18:34', 'Boucherie', 'admines'),
(210, 176, 0, NULL, 7.9, '2021-09-14 12:19:02', 'Boucherie', 'admines'),
(211, 188, 0, NULL, 5.5, '2021-09-14 12:20:03', 'Boucherie', 'admines'),
(212, 20, 0, NULL, 3.3, '2021-09-14 12:22:36', 'Boucherie', 'admines'),
(213, 19, 0, NULL, 3.9, '2021-09-14 12:23:23', 'Boucherie', 'admines'),
(214, 18, 0, NULL, 9.9, '2021-09-14 12:23:57', 'Boucherie', 'admines'),
(215, 17, 0, NULL, 4.5, '2021-09-14 12:26:41', 'Boucherie', 'admines'),
(216, 246, 0, NULL, 5.5, '2021-09-14 12:27:58', 'Boucherie', 'admines'),
(217, 16, 0, NULL, 5.9, '2021-09-14 12:28:28', 'Boucherie', 'admines'),
(218, 244, 0, NULL, 14.9, '2021-09-14 12:31:15', 'Boucherie', 'admines'),
(219, 241, 0, NULL, 12.9, '2021-09-14 12:31:51', 'Boucherie', 'admines'),
(220, 240, 0, NULL, 9.9, '2021-09-14 12:36:27', 'Boucherie', 'admines'),
(221, 196, 0, NULL, 30, '2021-09-14 12:38:08', 'Boucherie', 'admines'),
(222, 195, 0, NULL, 20.9, '2021-09-14 12:38:35', 'Boucherie', 'admines'),
(223, 194, 0, NULL, 3, '2021-09-14 12:39:22', 'Boucherie', 'admines'),
(224, 193, 0, NULL, 16.9, '2021-09-14 12:40:20', 'Boucherie', 'admines'),
(225, 189, 0, NULL, 10.9, '2021-09-14 12:40:50', 'Boucherie', 'admines'),
(226, 180, 0, NULL, 9.9, '2021-09-14 12:43:52', 'Boucherie', 'admines'),
(227, 179, 0, NULL, 10.9, '2021-09-14 12:44:40', 'Boucherie', 'admines'),
(228, 178, 0, NULL, 10.9, '2021-09-14 12:45:07', 'Boucherie', 'admines'),
(229, 173, 0, NULL, 16.9, '2021-09-14 12:45:48', 'Boucherie', 'admines'),
(230, 172, 0, NULL, 15.9, '2021-09-14 12:46:36', 'Boucherie', 'admines'),
(231, 171, 0, NULL, 17.9, '2021-09-14 12:47:22', 'Boucherie', 'admines'),
(232, 170, 0, NULL, 17.9, '2021-09-14 12:48:25', 'Boucherie', 'admines'),
(233, 169, 0, NULL, 16.9, '2021-09-14 12:49:04', 'Boucherie', 'admines'),
(234, 168, 0, NULL, 16.9, '2021-09-14 12:49:50', 'Boucherie', 'admines'),
(235, 167, 0, NULL, 16.9, '2021-09-14 12:50:26', 'Boucherie', 'admines'),
(236, 15, 0, NULL, 10.9, '2021-09-14 12:50:54', 'Boucherie', 'admines'),
(237, 13, 0, NULL, 14.9, '2021-09-14 12:51:24', 'Boucherie', 'admines'),
(238, 12, 0, NULL, 16.9, '2021-09-14 12:51:56', 'Boucherie', 'admines'),
(239, 11, 0, NULL, 9.9, '2021-09-14 12:52:24', 'Boucherie', 'admines'),
(240, 10, 0, NULL, 17.9, '2021-09-14 12:52:55', 'Boucherie', 'admines'),
(241, 9, 0, NULL, 17.9, '2021-09-14 12:55:20', 'Boucherie', 'admines'),
(242, 7, 0, NULL, 17.9, '2021-09-14 12:55:47', 'Boucherie', 'admines'),
(243, 6, 0, NULL, 17.9, '2021-09-14 12:56:17', 'Boucherie', 'admines'),
(244, 4, 0, NULL, 17.9, '2021-09-14 12:56:49', 'Boucherie', 'admines'),
(245, 3, 0, NULL, 19.9, '2021-09-14 12:57:34', 'Boucherie', 'admines'),
(246, 2, 0, NULL, 15.9, '2021-09-14 12:58:02', 'Boucherie', 'admines'),
(247, 1, 0, NULL, 17.9, '2021-09-14 12:58:29', 'Boucherie', 'admines'),
(248, 79, 0, NULL, 32, '2021-09-14 13:01:16', 'Boucherie', 'admines'),
(249, 80, 0, NULL, 36, '2021-09-14 13:01:54', 'Boucherie', 'admines'),
(250, 86, 0, NULL, 15, '2021-09-14 13:04:01', 'Boucherie', 'admines'),
(251, 90, 0, NULL, 17, '2021-09-14 16:48:31', 'Boucherie', 'admines'),
(252, 91, 10, 16, 19.9, '2021-09-15 09:19:33', 'Boucherie', 'Boucherie Marseille'),
(253, 90, 10, 10, 17.9, '2021-09-15 09:20:05', 'Boucherie', 'Boucherie Marseille'),
(254, 153, 10, 0, 11, '2021-09-15 09:20:55', 'Boucherie', 'Boucherie Marseille'),
(255, 82, 10, 17, 11, '2021-09-15 09:21:00', 'Boucherie', 'Boucherie Marseille'),
(256, 91, 0, NULL, 19, '2021-09-15 09:21:51', 'Boucherie', 'admines'),
(257, 91, 0, NULL, 19, '2021-09-15 09:21:55', 'Boucherie', 'admines'),
(258, 165, 10, 0, 1, '2021-09-15 09:22:35', 'Boucherie', 'Boucherie Marseille'),
(259, 165, 0, NULL, 3, '2021-09-15 09:23:01', 'Boucherie', 'admines'),
(260, 49, 0, NULL, 14, '2021-09-15 09:27:23', 'Boucherie', 'admines'),
(261, 163, 10, 0, 8.9, '2021-09-15 09:27:35', 'Boucherie', 'Boucherie Marseille'),
(262, 156, 10, 0, 9.9, '2021-09-15 09:30:39', 'Boucherie', 'Boucherie Marseille'),
(263, 160, 10, 0, 6.5, '2021-09-15 09:31:08', 'Boucherie', 'Boucherie Marseille'),
(264, 161, 10, 0, 0.8, '2021-09-15 09:31:25', 'Boucherie', 'Boucherie Marseille'),
(265, 161, 0, NULL, 0, '2021-09-15 09:31:52', 'Boucherie', 'admines'),
(266, 162, 10, 0, 13.9, '2021-09-15 09:32:32', 'Boucherie', 'Boucherie Marseille'),
(267, 164, 10, 0, 5.9, '2021-09-15 09:32:52', 'Boucherie', 'Boucherie Marseille'),
(268, 166, 10, 0, 9.9, '2021-09-15 09:33:16', 'Boucherie', 'Boucherie Marseille'),
(269, 238, 10, 0, 15.9, '2021-09-15 09:33:39', 'Boucherie', 'Boucherie Marseille'),
(270, 86, 10, 28, 15, '2021-09-15 09:33:53', 'Boucherie', 'Boucherie Marseille'),
(271, 85, 10, 23, 13.9, '2021-09-15 09:34:11', 'Boucherie', 'Boucherie Marseille'),
(272, 84, 10, 11.9, 8.5, '2021-09-15 09:34:33', 'Boucherie', 'Boucherie Marseille'),
(273, 83, 10, 23, 14.9, '2021-09-15 09:35:09', 'Boucherie', 'Boucherie Marseille'),
(274, 243, 10, 0, 13.9, '2021-09-15 09:35:39', 'Boucherie', 'Boucherie Marseille'),
(275, 251, 10, 0, 14.9, '2021-09-15 09:37:15', 'Boucherie', 'Boucherie Marseille'),
(276, 150, 10, 0, 14.9, '2021-09-15 09:37:25', 'Boucherie', 'Boucherie Marseille'),
(277, 149, 10, 0, 14.9, '2021-09-15 09:37:40', 'Boucherie', 'Boucherie Marseille'),
(278, 148, 10, 0, 14.9, '2021-09-15 09:37:46', 'Boucherie', 'Boucherie Marseille'),
(279, 151, 10, 0, 8.5, '2021-09-15 09:38:15', 'Boucherie', 'Boucherie Marseille'),
(280, 78, 10, 11, 14.9, '2021-09-15 09:38:35', 'Boucherie', 'Boucherie Marseille'),
(281, 78, 0, NULL, 14, '2021-09-15 09:38:54', 'Boucherie', 'admines'),
(282, 77, 10, 17, 12.9, '2021-09-15 09:40:02', 'Boucherie', 'Boucherie Marseille'),
(283, 239, 10, 0, 16.9, '2021-09-15 09:40:42', 'Boucherie', 'Boucherie Marseille'),
(284, 76, 10, 24, 14.9, '2021-09-15 09:40:54', 'Boucherie', 'Boucherie Marseille'),
(285, 76, 0, NULL, 14, '2021-09-15 09:41:12', 'Boucherie', 'admines'),
(286, 75, 10, 25, 13.9, '2021-09-15 09:44:04', 'Boucherie', 'Boucherie Marseille'),
(287, 75, 0, NULL, 13, '2021-09-15 09:44:14', 'Boucherie', 'admines'),
(288, 74, 10, 29, 14.9, '2021-09-15 09:45:22', 'Boucherie', 'Boucherie Marseille'),
(289, 74, 0, NULL, 14, '2021-09-15 09:45:36', 'Boucherie', 'admines'),
(290, 73, 10, 34, 15.9, '2021-09-15 09:46:08', 'Boucherie', 'Boucherie Marseille'),
(291, 73, 0, NULL, 15, '2021-09-15 09:46:22', 'Boucherie', 'admines'),
(292, 73, 0, NULL, 15, '2021-09-15 09:46:26', 'Boucherie', 'admines'),
(293, 72, 0, NULL, 14, '2021-09-15 09:46:49', 'Boucherie', 'admines'),
(294, 72, 10, 35, 14.9, '2021-09-15 09:47:19', 'Boucherie', 'Boucherie Marseille'),
(295, 72, 10, 14.9, 0, '2021-09-15 09:47:24', 'Boucherie', 'Boucherie Marseille'),
(296, 84, 10, 8.5, 0, '2021-09-15 09:47:35', 'Boucherie', 'Boucherie Marseille'),
(297, 91, 10, 19, 0, '2021-09-15 09:47:47', 'Boucherie', 'Boucherie Marseille'),
(298, 90, 10, 17.9, 0, '2021-09-15 09:55:58', 'Boucherie', 'Boucherie Marseille'),
(299, 87, 10, 39.9, 0, '2021-09-15 09:56:01', 'Boucherie', 'Boucherie Marseille'),
(300, 73, 10, 15.9, 0, '2021-09-15 09:56:15', 'Boucherie', 'Boucherie Marseille'),
(301, 239, 10, 16.9, 0, '2021-09-15 09:56:39', 'Boucherie', 'Boucherie Marseille'),
(302, 76, 10, 14.9, 0, '2021-09-15 09:56:42', 'Boucherie', 'Boucherie Marseille'),
(303, 75, 10, 13.9, 0, '2021-09-15 09:56:44', 'Boucherie', 'Boucherie Marseille'),
(304, 74, 10, 14.9, 0, '2021-09-15 09:56:49', 'Boucherie', 'Boucherie Marseille'),
(305, 74, 10, 0, 0, '2021-09-15 09:56:53', 'Boucherie', 'Boucherie Marseille'),
(306, 243, 10, 13.9, 0, '2021-09-15 09:57:03', 'Boucherie', 'Boucherie Marseille'),
(307, 243, 10, 0, 0, '2021-09-15 09:57:05', 'Boucherie', 'Boucherie Marseille'),
(308, 251, 10, 14.9, 0, '2021-09-15 09:57:53', 'Boucherie', 'Boucherie Marseille'),
(309, 166, 10, 9.9, 0, '2021-09-15 09:58:04', 'Boucherie', 'Boucherie Marseille'),
(310, 238, 10, 15.9, 0, '2021-09-15 09:59:18', 'Boucherie', 'Boucherie Marseille'),
(311, 86, 10, 15, 0, '2021-09-15 09:59:23', 'Boucherie', 'Boucherie Marseille'),
(312, 85, 10, 13.9, 0, '2021-09-15 09:59:26', 'Boucherie', 'Boucherie Marseille'),
(313, 164, 10, 5.9, 0, '2021-09-15 09:59:40', 'Boucherie', 'Boucherie Marseille'),
(314, 161, 10, 0.8, 0, '2021-09-15 09:59:52', 'Boucherie', 'Boucherie Marseille'),
(315, 243, 9, 13, 13.9, '2021-09-15 10:01:30', 'Boucherie', 'Ma-Bouche-Rit '),
(316, 46, 0, NULL, 15, '2021-09-15 10:16:57', 'Boucherie', 'admines'),
(317, 15, 0, NULL, 10, '2021-09-15 10:45:00', 'Boucherie', 'admines'),
(318, 12, 0, NULL, 16, '2021-09-15 13:22:22', 'Boucherie', 'admines'),
(319, 50, 0, NULL, 14, '2021-09-15 13:22:58', 'Boucherie', 'admines'),
(320, 6, 0, NULL, 17, '2021-09-15 15:16:08', 'Boucherie', 'admines'),
(321, 287, 14, 0, 1, '2021-09-16 10:35:36', 'Boucherie', 'Démo Boucherie Platinum'),
(322, 61, 0, NULL, 14, '2021-09-16 13:58:59', 'Boucherie', 'admines'),
(323, 66, 0, NULL, 16, '2021-09-21 08:07:22', 'Boucherie', 'admines'),
(324, 69, 0, NULL, 19, '2021-09-21 08:08:10', 'Boucherie', 'admines'),
(325, 161, 0, NULL, 20, '2021-09-21 16:41:46', 'Boucherie', 'admines'),
(326, 161, 0, NULL, 0.8, '2021-09-21 16:42:02', 'Boucherie', 'admines'),
(327, 161, 0, NULL, 0.8, '2021-09-21 16:43:56', 'Boucherie', 'admines'),
(328, 161, 0, NULL, 0.8, '2021-09-21 16:47:35', 'Boucherie', 'admines'),
(329, 91, 9, 16, 19.9, '2021-09-24 15:30:09', 'Boucherie', 'Ma-Bouche-Rit '),
(330, 90, 9, 17, 17.9, '2021-09-24 15:30:22', 'Boucherie', 'Ma-Bouche-Rit '),
(331, 85, 9, 13, 13.9, '2021-09-24 15:32:40', 'Boucherie', 'Ma-Bouche-Rit ');

-- --------------------------------------------------------

--
-- Structure de la table `av_news`
--

CREATE TABLE `av_news` (
  `new_id` int(11) NOT NULL,
  `new_title` varchar(255) NOT NULL,
  `new_short_text` text NOT NULL,
  `new_text` text NOT NULL,
  `new_picture` varchar(255) NOT NULL,
  `data_created` datetime DEFAULT NULL,
  `data_updated` datetime DEFAULT NULL,
  `new_data_status` int(11) NOT NULL DEFAULT 0,
  `new_home` int(11) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `new_date` date DEFAULT NULL,
  `new_meta_description` varchar(255) NOT NULL,
  `new_meta_title` varchar(255) NOT NULL,
  `new_meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_news`
--

INSERT INTO `av_news` (`new_id`, `new_title`, `new_short_text`, `new_text`, `new_picture`, `data_created`, `data_updated`, `new_data_status`, `new_home`, `files`, `new_date`, `new_meta_description`, `new_meta_title`, `new_meta_keywords`) VALUES
(39, 'test', '<p>test</p>', '<p>test</p>', 'file_4b9973b084c99e2c93edcc04491bdf9a.jpg', NULL, '2021-04-18 13:32:24', 1, NULL, NULL, '0000-00-00', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `av_newsletters`
--

CREATE TABLE `av_newsletters` (
  `newsletter_id` int(11) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `newslette_status` int(1) DEFAULT 1,
  `newsletter_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_newsletters`
--

INSERT INTO `av_newsletters` (`newsletter_id`, `client_email`, `newslette_status`, `newsletter_created`) VALUES
(1, 'elfartoun@gmail.com', 1, '2021-08-24'),
(2, 'fallah.amani@gmail.com', 1, '2021-08-25'),
(3, 'siwarmensi6@gmail.com', 1, '2021-09-21');

-- --------------------------------------------------------

--
-- Structure de la table `av_options_types`
--

CREATE TABLE `av_options_types` (
  `option_type_id` int(11) NOT NULL,
  `option_type_name` varchar(255) NOT NULL,
  `data_status_option_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_options_types`
--

INSERT INTO `av_options_types` (`option_type_id`, `option_type_name`, `data_status_option_type`) VALUES
(1, 'Option d\'envoi', 1),
(2, 'Option du découpages', 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_orders`
--

CREATE TABLE `av_orders` (
  `order_id` int(11) NOT NULL,
  `partener_id` int(11) DEFAULT NULL,
  `order_reference` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transporter_id` int(11) DEFAULT NULL,
  `order_products_quantity` int(11) DEFAULT NULL,
  `order_amount` float DEFAULT NULL,
  `order_shipping_rate` float DEFAULT NULL,
  `order_deliver` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_notify_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `paysys_id` int(11) DEFAULT NULL,
  `taxe_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `order_shipping_street` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_zip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_country` int(11) DEFAULT NULL,
  `order_billing_street` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_billing_city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_billing_zip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_billing_country` int(11) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `order_data_created` datetime DEFAULT NULL,
  `order_data_updated` datetime DEFAULT NULL,
  `order_payment_method` int(11) DEFAULT NULL,
  `order_payment_method_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_partener_status` int(11) DEFAULT NULL,
  `order_comments` longtext CHARACTER SET utf8 DEFAULT NULL,
  `delivery_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `delivery_num_coli` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `delivery_price` float DEFAULT NULL,
  `delivery_status` int(11) NOT NULL DEFAULT 0,
  `delivery_referance` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_payment_status` int(11) NOT NULL DEFAULT 0,
  `order_billing_firstname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_billing_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_billing_lastname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_firstname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_lastname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_shipping_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_billing_phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `is_association` int(1) NOT NULL DEFAULT 0,
  `is_entier` int(1) NOT NULL DEFAULT 0,
  `order_total_marge` varchar(255) DEFAULT '0',
  `order_total_price_buying` float NOT NULL DEFAULT 0,
  `order_products_prices` float DEFAULT 0,
  `order_tax` float DEFAULT 0,
  `order_dispo_date` date DEFAULT NULL,
  `order_dispo_time` time DEFAULT NULL,
  `order_payment_status_partener` int(11) NOT NULL DEFAULT 1,
  `delivery_date_time` datetime DEFAULT NULL,
  `poid_coli` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `partener_pdf_payement` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_partener_date_payement` datetime DEFAULT NULL,
  `order_comments_parteners` text CHARACTER SET utf8 NOT NULL,
  `order_partener_amount` float DEFAULT NULL,
  `order_total_amount_association` float DEFAULT 0,
  `is_partener_singal` int(11) DEFAULT 1,
  `data_partener_singal` datetime DEFAULT NULL,
  `data_partener_up_auto_status` datetime DEFAULT NULL,
  `order_payment_info` text CHARACTER SET utf8 DEFAULT NULL,
  `order_price_total_option` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_orders`
--

INSERT INTO `av_orders` (`order_id`, `partener_id`, `order_reference`, `customer_id`, `transporter_id`, `order_products_quantity`, `order_amount`, `order_shipping_rate`, `order_deliver`, `order_notify_email`, `order_shipping_number`, `paysys_id`, `taxe_id`, `currency_id`, `order_shipping_street`, `order_shipping_city`, `order_shipping_zip`, `order_shipping_country`, `order_billing_street`, `order_billing_city`, `order_billing_zip`, `order_billing_country`, `order_status`, `order_data_created`, `order_data_updated`, `order_payment_method`, `order_payment_method_name`, `order_partener_status`, `order_comments`, `delivery_name`, `delivery_num_coli`, `delivery_price`, `delivery_status`, `delivery_referance`, `order_payment_status`, `order_billing_firstname`, `order_billing_email`, `order_billing_lastname`, `order_shipping_firstname`, `order_shipping_lastname`, `order_shipping_email`, `order_shipping_phone`, `order_billing_phone`, `is_association`, `is_entier`, `order_total_marge`, `order_total_price_buying`, `order_products_prices`, `order_tax`, `order_dispo_date`, `order_dispo_time`, `order_payment_status_partener`, `delivery_date_time`, `poid_coli`, `partener_pdf_payement`, `order_partener_date_payement`, `order_comments_parteners`, `order_partener_amount`, `order_total_amount_association`, `is_partener_singal`, `data_partener_singal`, `data_partener_up_auto_status`, `order_payment_info`, `order_price_total_option`) VALUES
(1, 9, '123cfvg', 1, 1, 2, 160, 10, NULL, NULL, 'ris', NULL, 1, NULL, 'berdou', 'paris', '7543', NULL, 'chaville', 'patis', '75783', NULL, 1, '2021-04-24 12:23:00', '2021-04-14 12:23:00', 1, NULL, 8, NULL, NULL, NULL, NULL, 8, NULL, 3, 'fartoun', 'issam@gmail.com', 'issam', 'fartpun', 'weal', 'weal@gmail.com', '06854734', '068594321', 0, 1, '25', 125, 160, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, 0, 1, NULL, NULL, NULL, 0),
(2, 9, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', 1, '40 RUE mouroj', 'ben arous', '1234', 1, 1, '2021-04-24 18:23:00', '2021-04-14 12:23:00', 1, NULL, 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '0', 0, 0, 0, NULL, NULL, 2, NULL, NULL, NULL, NULL, '', NULL, 0, 1, NULL, NULL, NULL, 0),
(3, 10, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', NULL, '1 tunis web', 'tunis', '68000', NULL, 1, '2021-04-14 12:23:00', '2021-04-14 12:23:00', 1, NULL, 4, '<p>bien</p>', NULL, NULL, NULL, 0, NULL, 1, 'weal', 'weal@gmail.com', 'fartoun', '', '', '', '', '0123456789', 0, 0, '0', 0, 0, 0, NULL, NULL, 1, NULL, NULL, NULL, '2021-05-18 18:41:44', '<p>test</p>', NULL, 0, 1, NULL, NULL, NULL, 0),
(4, 9, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', 1, '40 RUE mouroj', 'ben arous', '1234', 1, 2, '2021-04-14 12:23:00', '2021-04-14 12:23:00', 1, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, 0, 1, NULL, NULL, NULL, 0),
(5, 9, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', 1, '40 RUE mouroj', 'ben arous', '1234', 1, 2, '2021-04-14 12:23:00', '2021-04-14 12:23:00', 1, NULL, 2, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, '2021-05-10', '20:35:00', 1, NULL, NULL, NULL, NULL, '', NULL, 0, 1, NULL, NULL, NULL, 0),
(6, 9, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', 1, '40 RUE mouroj', 'ben arous', '1234', 1, 3, '2021-04-14 12:23:00', '2021-04-14 12:23:00', 1, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, '2021-05-07', '04:29:00', 2, '2021-05-06 01:27:50', NULL, 'payments_aac454131e77221486ade5a26c57de53.pdf', '2021-05-08 04:10:01', '', 10, 0, 1, NULL, NULL, NULL, 0),
(7, 9, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', 1, '40 RUE mouroj', 'ben arous', '1234', 1, 3, '2021-04-14 12:23:00', '2021-04-14 12:23:00', 1, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', NULL, 0, 1, NULL, NULL, NULL, 0),
(8, 9, '123cfvg', 1, NULL, 2, 160, NULL, NULL, NULL, 'ris', NULL, 1, NULL, '20 rue paris', 'werdia', '1002', 1, '40 RUE mouroj', 'ben arous', '1234', 1, 3, '2021-04-14 12:23:00', '2021-04-14 12:23:00', 1, NULL, 6, NULL, 'weal faroun', '123', 10, 7, 'SZE', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, '2021-05-04', '04:25:00', 1, '2021-05-06 01:26:25', NULL, '', '2021-05-08 00:00:00', '', NULL, 0, 1, NULL, NULL, NULL, 0),
(9, 9, '9', 1, NULL, NULL, 348.07, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '1 tunis web', 'tunis', '68200', 1, '1 tunis web', 'tunis', '68200', 1, 1, '2021-05-25 00:36:38', '2021-05-25 00:36:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'bassem', NULL, 'fartoun', 'bassem', 'fartoun', NULL, NULL, NULL, 0, 1, '31.92', 299.6, 331.52, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 299.6, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(10, 9, '10', 3, NULL, NULL, 546.93, 16.55, NULL, NULL, NULL, NULL, 1, NULL, 'grounoble', 'chaville', '91345', 1, 'grounoble', 'chaville', '91345', 1, 1, '2021-05-25 03:25:45', '2021-05-25 03:25:45', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'weal', NULL, 'fartoun', 'weal', 'fartoun', NULL, NULL, NULL, 0, 1, '7.98', 522.4, 530.38, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 522.4, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(11, 9, '11', 5, NULL, NULL, 160.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'boissy st leger ', '94470', 1, '27 rue des alouettes', 'boissy st leger ', '94470', 1, 1, '2021-05-25 13:32:47', '2021-05-25 13:32:47', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', NULL, 'Chokri', 'Saidi', 'Chokri', NULL, NULL, NULL, 0, 1, '0', 144, 144, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 144, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(12, 9, '12', 5, NULL, NULL, 87.43, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'boissy st leger ', '94470', 1, '27 rue des alouettes', 'boissy st leger ', '94470', 1, 1, '2021-05-25 17:31:42', '2021-05-25 17:31:42', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', NULL, 'Chokri', 'Saidi', 'Chokri', NULL, NULL, NULL, 0, 1, '7.98', 62.9, 70.88, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 62.9, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(13, 9, '13', 1, NULL, NULL, 67.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '1 tunis web', 'tunis', '68200', 1, '1 tunis web', 'tunis', '68200', 1, 1, '2021-05-25 18:16:57', '2021-05-25 18:16:57', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'bassem', NULL, 'fartoun', 'bassem', 'fartoun', NULL, NULL, NULL, 0, 1, '0', 51, 51, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 51, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(14, 9, '14', 4, NULL, NULL, 889.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 07:14:38', '2021-06-10 07:14:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 101, 873, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:00:36', '', 101, 772, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(15, 11, '15', 4, NULL, NULL, 840.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 07:22:36', '2021-06-10 07:22:36', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 0, '0', 0, 824, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:01:23', '', 0, 824, 1, NULL, NULL, NULL, 0),
(16, 9, '16', 4, NULL, NULL, 67.08, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 07:40:39', '2021-06-10 07:40:39', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '11.18', 55.9, 67.08, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 55.9, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(17, 9, '17', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:08:32', '2021-06-10 12:08:32', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(18, 9, '18', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:14:32', '2021-06-10 12:14:32', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(19, 11, '19', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:35:54', '2021-06-10 12:35:54', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 1, NULL, NULL, NULL, 0),
(20, 11, '20', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:38:05', '2021-06-10 12:38:05', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 1, NULL, NULL, NULL, 0),
(21, 11, '21', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:42:40', '2021-06-10 12:42:40', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 1, NULL, NULL, NULL, 0),
(22, 11, '22', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:45:07', '2021-06-10 12:45:07', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 1, NULL, NULL, NULL, 0),
(23, 11, '23', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:47:46', '2021-06-10 12:47:46', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 1, NULL, NULL, NULL, 0),
(24, 9, '24', 4, NULL, NULL, 167.75, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:50:57', '2021-06-10 12:50:57', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '3.2', 16, 151.2, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:01:41', '', 16, 132, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(25, 11, '25', 4, NULL, NULL, 47.88, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:52:47', '2021-06-10 12:52:47', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '7.98', 39.9, 47.88, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 39.9, 0, 1, NULL, NULL, NULL, 0),
(26, 11, '26', 4, NULL, NULL, 19.9, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:55:51', '2021-06-10 12:55:51', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 0, '0', 19.9, 19.9, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 19.9, 0, 1, NULL, NULL, NULL, 0),
(27, 11, '27', 4, NULL, NULL, 19.2, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 12:57:03', '2021-06-10 12:57:03', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '3.2', 16, 19.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 1, NULL, NULL, NULL, 0),
(28, 9, '28', 4, NULL, NULL, 96.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-10 13:10:58', '2021-06-10 13:10:58', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 0, '0', 0, 80, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:02:01', '', 0, 80, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(29, 9, NULL, 4, NULL, NULL, 548.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-15 16:12:19', '2021-06-15 16:12:19', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 0, 532, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:02:22', '', 0, 532, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(30, 9, '30', 4, NULL, NULL, 548.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-15 16:15:46', '2021-06-15 16:15:46', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 0, 532, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:02:40', '', 0, 532, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(31, 11, '31', 4, NULL, NULL, 584, 0, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-15 16:30:10', '2021-06-15 16:30:10', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 0, 584, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:03:21', '', 0, 584, 1, NULL, NULL, NULL, 0),
(32, 9, '32', 4, NULL, NULL, 352.15, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-16 11:36:29', '2021-06-16 11:36:29', NULL, 'Bread', 1, '', NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 123.6, 335.6, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:03:41', '', 123.6, 212, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(33, 9, '33', 4, NULL, NULL, 83.63, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-17 13:21:20', '2021-06-17 13:21:20', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '11.18', 55.9, 67.08, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 55.9, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(34, 9, '34', 4, NULL, NULL, 92.43, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-17 14:07:51', '2021-06-17 14:07:51', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '7.98', 67.9, 75.88, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 67.9, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(35, 9, '35', 4, NULL, NULL, 548.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-17 14:11:45', '2021-06-17 14:11:45', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 80, 532, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 16:03:50', '', 80, 452, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(36, 9, '36', 4, NULL, NULL, 217.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 3, '2021-06-17 14:13:28', '2021-06-17 14:13:28', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 0, NULL, 3, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 69, 201, 5, '2021-06-17', '07:57:00', 2, '2021-06-17 14:16:01', NULL, NULL, '2021-09-10 16:04:02', '', 69, 132, 1, NULL, NULL, NULL, 0),
(37, 9, '37', 4, NULL, NULL, 253.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 2, '2021-06-17 14:43:19', '2021-06-17 14:43:19', NULL, 'Bread', 2, NULL, NULL, NULL, NULL, 0, NULL, 3, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 25, 237, 5, '2021-07-07', '04:31:00', 2, NULL, NULL, NULL, '2021-09-10 16:04:15', '', 25, 212, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(38, 9, NULL, 4, NULL, NULL, 131.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 2, '2021-06-18 10:06:15', '2021-06-18 10:06:15', NULL, 'Bread', 2, NULL, NULL, NULL, NULL, 0, NULL, 3, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 35, 115, 5, '2021-07-06', '04:59:00', 2, NULL, NULL, NULL, '2021-09-10 16:04:28', '', 35, 80, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(39, 9, '39', 4, NULL, NULL, 131.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 2, '2021-06-18 10:06:45', '2021-06-18 10:06:45', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 0, NULL, 3, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 1, 1, '0', 35, 115, 5, '2021-06-28', '15:55:00', 2, NULL, NULL, NULL, '2021-09-10 15:57:38', '', 35, 80, 1, NULL, NULL, NULL, 0),
(40, 9, '40', 4, NULL, NULL, 40.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-06-18 10:19:12', '2021-06-18 10:19:12', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, 'Saidi', 'chokri.saidi@go-makkah.com', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 24, 24, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 24, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(41, 9, '41', 1, NULL, NULL, 90.75, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '1 tunis web', 'tunis', '12345', 1, '1 tunis web', 'tunis', '12345', 1, 1, '2021-06-18 10:21:05', '2021-06-18 10:21:05', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'elfartoun@gmail.com', NULL, 'bassem', 'vvvv', 'elfartoun@gmail.com', '0123456789', '0123456789', 0, 1, '3.2', 71, 74.2, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 71, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(42, 11, '42', 1, NULL, NULL, 132, 0, NULL, NULL, NULL, NULL, 1, NULL, '1 tunis web', 'tunis', '12345', 1, '1 tunis web', 'tunis', '12345', 1, 1, '2021-06-18 10:21:58', '2021-06-18 10:21:58', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 0, NULL, 3, NULL, 'elfartoun@gmail.com', NULL, 'bassem', 'vvvv', 'elfartoun@gmail.com', '0123456789', '0123456789', 1, 1, '0', 0, 132, 5, NULL, NULL, 2, NULL, NULL, NULL, '2021-09-10 15:57:13', '', 0, 132, 1, NULL, NULL, NULL, 0),
(43, 9, '43', 1, NULL, NULL, 889.59, 16.55, NULL, NULL, NULL, NULL, 1, NULL, 'tunis', 'tunis', '12345', 1, 'tunis', 'tunis', '12345', 1, 3, '2021-06-18 11:35:32', '2021-06-18 11:35:32', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 0, NULL, 3, NULL, 'elfartoun@gmail.com', NULL, 'bassem', 'fartoun', 'elfartoun@gmail.com', '0123456789', '0123456789', 1, 1, '30.34', 258.7, 873.04, 5, '2021-06-21', '09:53:00', 2, '2021-06-24 13:51:40', NULL, NULL, '2021-09-10 15:56:09', '', 258.7, 584, 1, NULL, NULL, NULL, 0),
(44, 9, '44', 6, NULL, NULL, 46.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 AVENUE PIERRE SEMARD', 'IVRY SUR SEINE', '94470', 1, NULL, '', '94470', 1, 2, '2021-06-30 08:31:43', '2021-06-30 08:31:43', NULL, 'Bread', 2, NULL, NULL, NULL, NULL, 0, NULL, 3, NULL, NULL, NULL, 'Chokri', 'SAIDI', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 0, '0', 30, 30, 5, '2021-07-08', '05:09:00', 1, NULL, NULL, NULL, NULL, '', 30, 0, 2, '2021-06-30 08:38:25', NULL, NULL, 0),
(49, 9, '49', 2, NULL, NULL, 39.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 10:54:36', '2021-07-28 11:10:14', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 23, 23, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 23, 0, 2, '2021-07-28 10:55:07', '2021-07-28 11:10:07', NULL, 0),
(50, 9, '50', 2, NULL, NULL, 28.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 11:53:17', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '2', 10, 12, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 10, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(51, 9, '51', 2, NULL, NULL, 45.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 12:02:42', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 29, 29, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 29, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(52, 9, '52', 2, NULL, NULL, 45.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 12:18:12', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 29, 29, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 29, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(53, 9, '53', 2, NULL, NULL, 51.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 12:52:08', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 35, 35, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 35, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(54, 9, '54', 2, NULL, NULL, 48.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 12:53:41', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 32, 32, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 32, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(55, 9, '55', 2, NULL, NULL, 51.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 12:57:41', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 35, 35, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 35, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(56, 9, '56', 2, NULL, NULL, 28.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 13:22:49', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '2', 10, 12, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 10, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(57, 9, '57', 2, NULL, NULL, 28.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 13:28:20', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '2', 10, 12, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 10, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', '{\"name\":\"Alex\",\"age\":30}', 0),
(58, 9, '58', 2, NULL, NULL, 28.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 14:39:28', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '2', 10, 12, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 10, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(59, 9, '59', 2, NULL, NULL, 28.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 14:41:11', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '2', 10, 12, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 10, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(60, 9, '60', 2, NULL, NULL, 28.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 14:46:51', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '2', 10, 12, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 10, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(61, 9, '61', 2, NULL, NULL, 71.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 15:02:14', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 55, 55, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 55, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(62, 9, '62', 2, NULL, NULL, 71.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 15:05:04', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 55, 55, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 55, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(63, 9, '63', 2, NULL, NULL, 44.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, '32 avenue lierre semard', 'Ivry sur seine', '94200', 1, 1, '2021-07-28 15:07:45', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'choukri.saidi@go-makkah.com', NULL, 'Saidi', 'Chokri', 'choukri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 1, '0', 28, 28, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 28, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(64, 9, '64', 4, NULL, NULL, 67.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-28 19:16:19', '2021-07-29 15:37:44', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, 'chokri.saidi@go-makkah.com', NULL, NULL, 0, 1, '0', 51, 51, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 51, 0, 2, '2021-07-29 15:07:51', '2021-07-29 15:22:51', NULL, 0),
(65, 9, '65', 4, NULL, NULL, 39.55, 16.55, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94470', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 2, '2021-07-28 19:22:32', '2021-07-28 19:22:32', NULL, 'Bread', 2, NULL, NULL, NULL, NULL, 0, NULL, 3, 'Saidi', NULL, 'Chokri', 'Saidi', 'Chokri', NULL, '0622190709', '0622190709', 0, 1, '0', 23, 23, 5, '2021-07-30', '05:06:00', 1, NULL, NULL, NULL, NULL, '', 23, 0, 1, NULL, NULL, NULL, 0),
(66, 10, '66', 8, NULL, NULL, 87.35, 16.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 3, '2021-08-05 10:40:47', '2021-08-05 10:40:47', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 0, NULL, 3, '', 'fallah.amani@gmail.com', '', 'FALLAH', 'Amani', 'fallah.amani@gmail.com', '00000000', '00000000', 0, 1, '0', 70.8, 70.8, 5, '2021-08-06', '14:00:00', 2, '2021-08-05 10:52:26', NULL, NULL, NULL, '', 70.8, 0, 2, '2021-08-05 10:49:08', '2021-08-05 11:04:08', NULL, 0),
(67, 10, '67', 8, NULL, NULL, 145.14, 16.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 3, '2021-08-05 11:37:12', '2021-08-05 11:37:12', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FALLAH', 'fallah.amani@gmail.com', 'Amani', 'FALLAH', 'Amani', 'fallah.amani@gmail.com', '00000000', '00000000', 0, 1, '17.58', 119.8, 128.59, 5, '2021-08-05', '15:45:00', 2, '2021-08-05 12:35:37', NULL, NULL, NULL, '', 119.8, 0, 2, '2021-08-05 11:37:19', '2021-08-05 11:52:19', NULL, 0),
(68, 10, '68', 8, NULL, NULL, 66.15, 16.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 1, '2021-08-05 11:38:29', '2021-08-05 11:45:06', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FALLAH', 'fallah.amani@gmail.com', 'Amani', 'FALLAH', 'Amani', 'fallah.amani@gmail.com', '00000000', '00000000', 0, 0, '0', 49.6, 49.6, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 49.6, 0, 2, '2021-08-05 11:39:18', '2021-08-05 11:54:18', NULL, 0),
(69, 10, '69', 8, 1, NULL, 377.15, 17.15, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 10, '2021-08-05 14:01:03', '2021-08-05 14:01:03', NULL, 'Bread', 3, NULL, NULL, '', 0, 8, '', 3, 'FALLAH', 'fallah.amani@gmail.com', 'Amani', 'FALLAH', 'Amani', 'fallah.amani@gmail.com', '00000000', '00000000', 1, 1, '0', 68, 360, 5, '2021-08-05', '17:00:00', 2, '2021-09-10 15:54:44', '', NULL, NULL, '', 68, 292, 2, '2021-08-05 14:01:10', '2021-08-05 14:16:10', NULL, 0),
(70, 10, '70', 8, NULL, NULL, 17.66, 16.65, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 1, '2021-08-13 12:50:58', '2021-09-15 09:12:18', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FALLAH', 'fallah.amani@gmail.com', 'Amani', 'FALLAH', 'Amani', 'fallah.amani@gmail.com', '00000000', '00000000', 0, 0, '0.168', 0.84, 1.01, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 0.84, 0, 2, '2021-09-15 08:57:16', '2021-09-15 09:12:16', NULL, 0),
(71, 10, '71', 8, NULL, NULL, 54.61, 16.81, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 1, '2021-08-16 15:07:10', '2021-09-15 09:12:18', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FALLAH', 'fallah.amani@gmail.com', 'Amani', 'FALLAH', 'Amani', 'fallah.amani@gmail.com', '00000000', '00000000', 0, 0, '6.3', 31.5, 37.8, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 31.5, 0, 2, '2021-09-15 08:57:16', '2021-09-15 09:12:16', NULL, 0),
(72, 10, '72', 10, NULL, NULL, 34.26, 16.66, NULL, NULL, NULL, NULL, 1, NULL, 'test', 'dsds', '1234', 1, 'test', 'dsds', '1234', 1, 1, '2021-08-16 16:14:34', '2021-09-15 09:12:18', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, '', 'test@gmail.com', '', 'test', 'test', 'test@gmail.com', '4141', '4141', 0, 1, '3.2', 16, 17.6, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 16, 0, 2, '2021-09-15 08:57:16', '2021-09-15 09:12:16', NULL, 0),
(73, 9, '73', 8, NULL, NULL, 221.73, 17.43, NULL, NULL, NULL, NULL, 1, NULL, 'rue', 'Tappes', '78001', 1, 'rue', 'Tappes', '78001', 1, 1, '2021-08-17 09:05:31', '2021-08-17 10:03:50', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FALLAH', 'fallah.amani@gmail.com', 'Amani', 'fallah', 'amani', 'fallah.amani@gmail.com', '235654858', '235654858', 0, 0, '28.414', 175.87, 204.3, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 175.87, 0, 2, '2021-08-17 09:48:50', '2021-08-17 10:03:50', NULL, 0),
(74, 9, '74', 14, NULL, NULL, 72.95, 18.05, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 1, '2021-08-19 15:53:30', '2021-09-02 13:10:40', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 0, '7.15', 47.75, 54.9, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 47.75, 0, 2, '2021-09-02 12:55:40', '2021-09-02 13:10:40', NULL, 0),
(75, 9, '75', 1, NULL, NULL, 56.22, 15.2, NULL, NULL, NULL, NULL, 1, NULL, 'tunis', 'tunis', '75', 1, 'tunis', 'tunis', '', 1, 1, '2021-08-19 17:17:23', '2021-09-02 13:10:40', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'bassem', '', 'fartoun', 'bassem', 'fartoun', 'elfartounb@gmail.com', '07541', '78541554', 0, 1, '0.238', 40.9, 41.02, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 40.9, 0, 2, '2021-09-02 12:55:40', '2021-09-02 13:10:40', NULL, 0),
(76, 9, '76', 14, NULL, NULL, 72.77, 17.07, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 1, '2021-08-20 10:05:26', '2021-09-02 13:10:40', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 0, '9.284', 46.42, 55.7, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 46.42, 0, 2, '2021-09-02 12:55:40', '2021-09-02 13:10:40', NULL, 0),
(77, 9, '77', 5, NULL, NULL, 56.9, 16, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy st leger', '94', 1, '27 rue des alouettes', 'Boissy st leger', '94470', 1, 1, '2021-08-20 11:05:38', '2021-09-02 13:10:40', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'Saidi', '', 'Chokri', 'Saidi', 'Chokri', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 0, '6.816', 34.08, 40.9, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 34.08, 0, 2, '2021-09-02 12:55:40', '2021-09-02 13:10:40', NULL, 0),
(78, 9, '78', 14, NULL, NULL, 104.35, 17.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 1, '2021-08-23 10:01:57', '2021-09-02 13:10:40', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 1, '5.968', 80.84, 86.8, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 80.84, 0, 2, '2021-09-02 12:55:40', '2021-09-02 13:10:40', NULL, 0),
(79, 9, '79', 14, NULL, NULL, 51.35, 17.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 1, '2021-09-04 08:27:49', '2021-09-09 08:48:18', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 0, '3.134', 30.67, 33.8, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 30.67, 0, 2, '2021-09-09 08:33:15', '2021-09-09 08:48:15', NULL, 0),
(80, 9, '80', 14, 1, NULL, 121.65, 17.05, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 9, '2021-09-09 08:15:26', '2021-09-09 08:15:26', NULL, 'Bread', 3, NULL, NULL, '', 0, 6, '', 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 1, '7.768', 96.84, 104.6, 5, '2021-09-09', '10:00:00', 2, '2021-09-10 08:46:16', '', 'payments_821bef4da9515309a2904f45c3bc69ec.pdf', '2021-09-09 09:39:03', '', 96.84, 0, 2, '2021-09-09 08:33:15', '2021-09-09 08:48:15', NULL, 0),
(81, 9, '81', 14, NULL, NULL, 422.95, 37.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 9, '2021-09-09 10:23:36', '2021-09-09 10:23:36', NULL, 'Bread', 3, NULL, NULL, NULL, NULL, 6, NULL, 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 1, '64.5', 322.5, 385.4, 5, '2021-09-10', '12:30:00', 1, '2021-09-10 09:09:25', NULL, NULL, NULL, '', 322.5, 0, 2, '2021-09-09 10:24:26', '2021-09-09 10:39:26', NULL, 0),
(82, 9, '82', 15, 1, NULL, 337.75, 17.55, NULL, NULL, NULL, NULL, 1, NULL, '', 'Sousse', '0', NULL, '', 'Sousse', '', NULL, 10, '2021-09-09 11:38:19', '2021-09-09 11:54:13', NULL, 'Bread', 3, NULL, NULL, '', 0, 8, '', 3, 'Siwar', 'siwarmensi6@gmail.com', 'Mensi', 'Siwar', 'Mensi', 'siwarmensi6@gmail.com', '56346009', '56346009', 0, 1, '51.334', 271.67, 320.2, 5, NULL, NULL, 2, '2021-09-13 11:17:07', '', NULL, '2021-09-13 11:16:52', '', 271.67, 0, 2, '2021-09-09 11:39:13', '2021-09-09 11:54:13', NULL, 0),
(83, 9, '83', 16, NULL, NULL, 68.2, 17, NULL, NULL, NULL, NULL, 1, NULL, '27 rue des alouettes', 'Boissy St Léger', '94200', NULL, '32 avenue Pierre Semard', 'Ivry sur seine', '94200', NULL, 1, '2021-09-09 15:09:30', '2021-09-09 15:25:14', NULL, 'Bread', 4, '', NULL, NULL, NULL, 0, NULL, 3, 'SAIDI', 'chokri.saidi@go-makkah.com', 'CHOKRI', 'SAIDI', 'CHOKRI', 'chokri.saidi@go-makkah.com', '0622190709', '0622190709', 0, 0, '8.532', 42.66, 51.2, 5, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-16 15:18:25', '', 42.66, 0, 2, '2021-09-09 15:10:14', '2021-09-09 15:25:14', NULL, 0),
(84, 9, '84', 14, 1, NULL, 26.45, 17.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 9, '2021-09-09 15:13:02', '2021-09-09 15:28:14', NULL, 'Bread', 3, NULL, NULL, '', 0, 6, '', 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 0, '1.484', 7.42, 8.9, 5, '2021-09-11', '09:15:00', 2, '2021-09-11 12:23:42', '', NULL, '2021-09-10 16:15:17', '<p>commentaire &agrave; afficher chez le boucher</p>', 7.42, 0, 2, '2021-09-09 15:13:14', '2021-09-09 15:28:14', NULL, 0),
(85, 9, '85', 15, 1, NULL, 46.25, 17.55, NULL, NULL, NULL, NULL, 1, NULL, 'bonjourr', 'paris', '1', 1, 'bonjourr', 'paris', '1234', NULL, 3, '2021-09-13 13:19:02', '2021-09-13 13:19:02', NULL, 'Bread', 3, NULL, NULL, '', 0, 7, '', 3, 'mensi', 'siwarmensi6@gmail.com', 'siwar', 'mensi', 'siwar', 'siwarmensi6@gmail.com', '56346009', '56346009', 0, 1, '4.784', 23.92, 28.7, 5.5, '2021-09-13', '16:00:00', 2, '2021-09-13 15:22:16', '', NULL, '2021-09-13 15:21:58', '', 23.92, 0, 1, NULL, NULL, NULL, 0),
(86, 9, '86', 17, NULL, NULL, 203.2, 18, NULL, NULL, NULL, NULL, 1, NULL, 'Trappes ', 'Trappes ', '78', 1, 'Trappes ', 'Trappes ', '78190', 1, 9, '2021-09-16 08:41:00', '2021-09-16 08:41:00', NULL, 'Bread', 3, '<p>Merci !!!&nbsp;</p>', NULL, NULL, NULL, 6, NULL, 3, 'Fallah', '', 'Amani', 'Fallah', 'Amani', 'fallah.amani@gmail.com', '003301010101', '003301010101', 0, 1, '30.89', 154.45, 185.2, 5.5, '2021-09-17', '10:10:00', 1, '2021-09-17 10:39:22', NULL, NULL, NULL, '<p>BOnjour, avoir la foie en option&nbsp;</p>', 154.45, 0, 2, '2021-09-16 08:42:14', '2021-09-16 08:57:14', NULL, 0),
(87, 9, '87', 14, 1, NULL, 145.63, 23.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue bonjour', 'ville1', '72', 1, 'rue bonjour', 'ville1', '72001', 1, 3, '2021-09-16 09:14:10', '2021-09-16 09:14:10', NULL, 'Bread', 3, NULL, NULL, '', 0, 7, '', 3, 'FAllah', '', 'Amani', 'FAllah', 'Amani', 'fallah.amani@gmail.com', '000000089', '000000089', 0, 0, '20.37', 101.85, 122.08, 5.5, '2021-09-16', '10:20:00', 1, '2021-09-17 10:40:37', '', '', '2021-09-17 13:35:51', '', 101.85, 0, 2, '2021-09-16 09:14:15', '2021-09-16 09:29:15', NULL, 0),
(88, 9, '88', 18, NULL, NULL, 27.05, 21.55, NULL, NULL, NULL, NULL, 1, NULL, 'paris', 'paris', '12345', 1, 'paris', 'paris', '12345', 1, 1, '2021-09-19 00:45:04', '2021-09-21 08:38:37', NULL, 'Bread', 4, NULL, NULL, NULL, NULL, 0, NULL, 3, 'basem', 'fartounbassem@gmail.com', 'fartoun', 'basem', 'fartoun', 'fartounbassem@gmail.com', '0033 954 543 3', '0033 954 543 3', 0, 0, '0.916', 4.58, 5.5, 5.5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '', 4.58, 0, 1, NULL, NULL, NULL, 0),
(89, 10, '89', 18, NULL, NULL, 136.55, 23.55, NULL, NULL, NULL, NULL, 1, NULL, 'paris', 'paris', '12345', 1, 'paris', 'paris', '12345', 1, 1, '2021-09-19 00:47:04', '2021-09-19 00:47:04', NULL, 'Bread', 1, NULL, NULL, NULL, NULL, 0, NULL, 3, 'basem', 'fartounbassem@gmail.com', 'fartoun', 'basem', 'fartoun', 'fartounbassem@gmail.com', '0033 954 543 3', '0033 954 543 3', 0, 0, '26.1', 87, 113, 5.5, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-19 14:47:53', '', 87, 0, 1, NULL, NULL, NULL, 0),
(90, 9, '90', 8, 1, NULL, 195.63, 16.55, NULL, NULL, NULL, NULL, 1, NULL, 'rue nour ', 'trappes', '6033', 1, 'rue nour ', 'trappes', '6033', 1, 3, '2021-09-21 08:35:27', '2021-09-21 08:35:27', NULL, 'Bread', 3, NULL, NULL, '', 0, 7, '', 3, 'FALLAH', 'fallah.amanie@gmail.com', 'Amani', 'FALLAH', 'Amani', 'fallah.amanie@gmail.com', '00000000', '00000000', 0, 1, '3.18', 15.9, 179.08, 5.5, '2021-09-21', '00:00:10', 2, '2021-09-21 11:10:05', '', 'payments_fbbf752241979525a09c6c0e172cbff4.pdf', '2021-09-21 11:13:29', '', 15.9, 0, 2, '2021-09-21 08:39:34', '2021-09-21 08:54:34', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `av_orders_details`
--

CREATE TABLE `av_orders_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `orders_detail_product_price` float DEFAULT NULL,
  `product_price_discount` float DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `orders_detail_product_poids` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order_product_marge` varchar(255) DEFAULT '0',
  `order_product_price_buying` float DEFAULT 0,
  `order_product_entier_association` int(1) DEFAULT NULL,
  `association_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_orders_details`
--

INSERT INTO `av_orders_details` (`order_detail_id`, `order_id`, `orders_detail_product_price`, `product_price_discount`, `product_id`, `product_quantity`, `orders_detail_product_poids`, `order_product_marge`, `order_product_price_buying`, `order_product_entier_association`, `association_id`) VALUES
(1, 1, 20, 0, 19, 2, '10', '4', 15, NULL, NULL),
(2, 1, 40, 0, 20, 3, '15', '2', 35, NULL, NULL),
(3, 2, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(4, 2, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(5, 3, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(6, 3, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(7, 4, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(8, 4, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(9, 5, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(10, 5, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(11, 6, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(12, 6, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(13, 7, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(14, 7, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(15, 8, 20, 0, 19, 2, '10', '0', 0, NULL, NULL),
(16, 8, 40, 0, 20, 3, '15', '0', 0, NULL, NULL),
(17, 9, 28, 0, 86, 5, '1', '0', 28, NULL, NULL),
(18, 9, 47.88, 0, 87, 4, '0.110', '7.98', 39.9, NULL, NULL),
(19, 10, 19.9, 0, 70, 5, '0.500', '0', 19.9, NULL, NULL),
(20, 10, 30, 0, 64, 1, '0.500', '0', 30, NULL, NULL),
(21, 10, 16, 0, 65, 1, '1', '0', 16, NULL, NULL),
(22, 10, 28, 0, 86, 2, '1', '0', 28, NULL, NULL),
(23, 10, 23, 0, 81, 1, '8', '0', 23, NULL, NULL),
(24, 10, 47.88, 0, 87, 1, '0.110', '7.98', 39.9, NULL, NULL),
(25, 10, 23, 0, 83, 1, '1', '0', 23, NULL, NULL),
(26, 10, 55, 0, 84, 1, '0.5', '0', 55, NULL, NULL),
(27, 10, 180, 0, 82, 1, '15', '0', 180, NULL, NULL),
(28, 11, 34, 0, 73, 1, '0.300', '0', 34, NULL, NULL),
(29, 11, 55, 0, 84, 2, '0.5', '0', 55, NULL, NULL),
(30, 12, 47.88, 0, 87, 1, '0.110', '7.98', 39.9, NULL, NULL),
(31, 12, 23, 0, 85, 1, '1.7', '0', 23, NULL, NULL),
(32, 13, 28, 0, 86, 1, '1', '0', 28, NULL, NULL),
(33, 13, 23, 0, 83, 1, '1', '0', 23, NULL, NULL),
(34, 14, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(35, 14, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(36, 14, 80, 0, 89, 3, '0', '0', NULL, 1, 7),
(37, 14, 80, 0, 89, 1, '0', '0', NULL, 1, 3),
(38, 14, 80, 0, 89, 1, '0', '0', NULL, 1, 4),
(39, 14, 80, 0, 89, 2, '0', '0', NULL, 1, 5),
(40, 14, 55, 0, 84, 1, '0.5', '0', 55, 0, 0),
(41, 14, 23, 0, 83, 1, '1', '0', 23, 0, 0),
(42, 14, 23, 0, 85, 1, '1.7', '0', 23, 0, 0),
(43, 15, 132, 0, 89, 2, '0', '0', NULL, 1, NULL),
(44, 15, 80, 0, 89, 1, '0', '0', NULL, 1, 7),
(45, 15, 80, 0, 89, 6, '0', '0', NULL, 1, 8),
(46, 16, 47.88, 0, 87, 1, '0.110', '7.98', 39.9, 0, 0),
(47, 16, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(48, 17, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(49, 18, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(50, 19, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(51, 20, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(52, 21, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(53, 22, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(54, 23, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(55, 24, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(56, 24, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(57, 25, 47.88, 0, 87, 1, '0.110', '7.98', 39.9, 0, 0),
(58, 26, 19.9, 0, 70, 1, '0.500', '0', 19.9, 0, 0),
(59, 27, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(60, 28, 80, 0, 89, 1, '0', '0', NULL, 1, 7),
(61, 29, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(62, 29, 80, 0, 89, 1, '0', '0', NULL, 1, 7),
(63, 29, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(64, 29, 80, 0, 89, 3, '0', '0', NULL, 1, 4),
(65, 30, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(66, 30, 80, 0, 89, 1, '0', '0', NULL, 1, 7),
(67, 30, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(68, 30, 80, 0, 89, 3, '0', '0', NULL, 1, 4),
(69, 31, 132, 0, 89, 2, '0', '0', NULL, 1, NULL),
(70, 31, 80, 0, 89, 2, '0', '0', NULL, 1, 7),
(71, 31, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(72, 31, 80, 0, 89, 1, '0', '0', NULL, 1, 4),
(73, 32, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(74, 32, 80, 0, 89, 1, '0', '0', NULL, 1, 7),
(75, 32, 20, 0, 45, 3, '1', '0', 20, 0, 0),
(76, 32, 15.9, 0, 17, 4, '0.600', '0', 15.9, 0, 0),
(77, 33, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(78, 33, 47.88, 0, 87, 1, '0.110', '7.98', 39.9, 0, 0),
(79, 34, 47.88, 0, 87, 1, '0.110', '7.98', 39.9, 0, 0),
(80, 34, 28, 0, 86, 1, '1', '0', 28, 0, 0),
(81, 35, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(82, 35, 80, 0, 89, 1, '0', '0', NULL, 1, 3),
(83, 35, 80, 0, 89, 3, '0', '0', NULL, 1, 4),
(84, 35, 25, 0, 75, 1, '1.5', '0', 25, 0, 0),
(85, 35, 55, 0, 84, 1, '0.5', '0', 55, 0, 0),
(86, 36, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(87, 36, 35, 0, 72, 1, '0.300', '0', 35, 0, 0),
(88, 36, 34, 0, 73, 1, '0.300', '0', 34, 0, 0),
(89, 37, 25, 0, 75, 1, '1.5', '0', 25, 0, 0),
(90, 37, 0, 0, 20, 1, '0.500', '0', NULL, 0, 0),
(91, 37, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(92, 37, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(93, 39, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(94, 39, 35, 0, 72, 1, '0.300', '0', 35, 0, 0),
(95, 40, 24, 0, 76, 1, '2', '0', 24, 0, 0),
(96, 41, 55, 0, 84, 1, '0.5', '0', 11.9, 0, 0),
(97, 41, 19.2, 0, 91, 1, '0.110', '3.2', 16, 0, 0),
(98, 42, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(99, 43, 19.2, 0, 91, 2, '0.110', '3.2', 16, 0, 0),
(100, 43, 47.88, 0, 87, 3, '0.110', '7.98', 39.9, 0, 0),
(101, 43, 132, 0, 89, 2, '0', '0', NULL, 1, NULL),
(102, 43, 80, 0, 89, 2, '0', '0', NULL, 1, 7),
(103, 43, 80, 0, 89, 1, '0', '0', NULL, 1, 4),
(104, 43, 80, 0, 89, 1, '0', '0', NULL, 1, 5),
(105, 43, 11, 0, 78, 1, '0.5', '0', 11, 0, 0),
(106, 43, 32, 0, 79, 3, '0.520', '0', 32, 0, 0),
(107, 44, 30, 0, 71, 1, '0.110', '0', 30, 0, 0),
(112, 49, 23, 0, 85, 1, '1.7', '0', 23, 0, 0),
(113, 50, 12, 0, 90, 1, '0.110', '0', NULL, 0, 0),
(114, 51, 29, 0, 74, 1, '0.200', '0', 29, 0, 0),
(115, 52, 29, 0, 74, 1, '0.200', '0', 29, 0, 0),
(116, 53, 35, 0, 72, 1, '0.300', '0', 35, 0, 0),
(117, 54, 32, 0, 79, 1, '0.520', '0', 32, 0, 0),
(118, 55, 35, 0, 72, 1, '0.300', '0', 35, 0, 0),
(119, 56, 12, 0, 90, 1, '0.110', '0', NULL, 0, 0),
(120, 57, 12, 0, 90, 1, '0.110', '0', NULL, 0, 0),
(121, 58, 12, 0, 90, 1, '0.110', '0', NULL, 0, 0),
(122, 59, 12, 0, 90, 1, '0.110', '0', NULL, 0, 0),
(123, 60, 12, 0, 90, 1, '0.110', '0', NULL, 0, 0),
(124, 61, 55, 0, 84, 1, '0.5', '0', 11.9, 0, 0),
(125, 62, 55, 0, 84, 1, '0.5', '0', 11.9, 0, 0),
(126, 63, 28, 0, 86, 1, '1', '0', 28, 0, 0),
(127, 64, 23, 0, 85, 1, '1.7', '0', 23, 0, 0),
(128, 64, 28, 0, 86, 1, '1', '0', 28, 0, 0),
(129, 65, 23, 0, 85, 1, '1.7', '0', 23, 0, 0),
(130, 66, 24.8, 0, 2, 1, '0.500', '0', 24.8, 0, 0),
(131, 66, 23, 0, 81, 2, '8', '0', 17, 0, 0),
(132, 67, 17.6, 0, 90, 3, '0.110', '2', 10, 0, 0),
(133, 67, 43.89, 0, 87, 1, '0.110', '7.98', 39.9, 0, 0),
(134, 67, 31.9, 0, 36, 1, '0.110', '0', 31.9, 0, 0),
(135, 68, 24.8, 0, 2, 2, '0.500', '0', 24.8, 0, 0),
(136, 69, 34, 0, 73, 2, '0.300', '0', 34, 0, 0),
(137, 69, 132, 0, 89, 1, '0', '0', NULL, 1, NULL),
(138, 69, 80, 0, 89, 1, '0', '0', NULL, 1, 8),
(139, 69, 80, 0, 89, 1, '0', '0', NULL, 1, 7),
(140, 70, 1.01, 0, 159, 1, '0.1', '0', NULL, 0, 0),
(141, 71, 19.9, 0, 3, 1, '0.500', '9.978', 49.89, 0, 0),
(142, 71, 17.9, 0, 10, 1, '0.260', '7.962', 39.81, 0, 0),
(143, 72, 17.6, 0, 90, 1, '0.110', '2', 10, 0, 0),
(144, 73, 19.9, 0, 3, 3, '0.500', '9.978', 49.89, 0, 0),
(145, 73, 25, 0, 4, 3, '0.560', '5', 25, 0, 0),
(146, 73, 17.9, 0, 10, 2, '0.260', '7.962', 39.81, 0, 0),
(147, 73, 16.9, 0, 31, 2, '0.440', '0', 16.9, 0, 0),
(148, 74, 17.9, 0, 9, 1, '0.300', '8.4', 42, 0, 0),
(149, 74, 25, 0, 4, 1, '0.560', '5', 25, 0, 0),
(150, 74, 12, 0, 21, 1, '1.5', '0', 12, 0, 0),
(151, 75, 12.02, 0, 84, 1, '0.5', '0.238', 11.9, 0, 0),
(152, 75, 29, 0, 74, 1, '0.200', '0', 29, 0, 0),
(153, 76, 19.9, 0, 3, 1, '0.500', '9.978', 49.89, 0, 0),
(154, 76, 17.9, 0, 10, 2, '0.260', '7.962', 39.81, 0, 0),
(155, 77, 30, 0, 64, 1, '0.500', '6', 30, 0, 0),
(156, 77, 10.9, 0, 125, 1, '1', '0', NULL, 0, 0),
(157, 78, 17.9, 0, 7, 2, '0.360', '6.52', 32.6, 0, 0),
(158, 78, 29, 0, 74, 1, '0.200', '0', 29, 0, 0),
(159, 78, 11, 0, 78, 2, '0.5', '0', 11, 0, 0),
(160, 79, 8.9, 0, 183, 1, '1', '1.484', 7.42, 0, 0),
(161, 79, 15, 0, 39, 1, '1', '0', 15, 0, 0),
(162, 79, 9.9, 0, 37, 1, '1', '5.4', 27, 0, 0),
(163, 80, 8.9, 0, 183, 3, '1', '1.484', 7.42, 0, 0),
(164, 80, 12, 0, 21, 2, '1.5', '0', 12, 0, 0),
(165, 80, 34, 0, 73, 1, '0.300', '0', 34, 0, 0),
(166, 80, 19.9, 0, 3, 1, '0.500', '9.978', 49.89, 0, 0),
(167, 81, 17.4, 0, 238, 1, '1', '2.9', 14.5, 0, 0),
(168, 81, 17.6, 0, 90, 1, '0.110', '3.2', 16, 0, 0),
(169, 81, 19.2, 0, 70, 4, '0.500', '3.98', 19.9, 0, 0),
(170, 81, 273.6, 0, 218, 1, '21', '0', NULL, 0, 0),
(171, 82, 8.9, 0, 183, 1, '1', '1.484', 7.42, 0, 0),
(172, 82, 15, 0, 39, 1, '1', '0', 15, 0, 0),
(173, 82, 12.9, 0, 36, 1, '1', '6.38', 31.9, 0, 0),
(174, 82, 35, 0, 69, 2, '0.500', '7', 35, 0, 0),
(175, 82, 16.8, 0, 63, 1, '1', '3.4', 17, 0, 0),
(176, 82, 30.8, 0, 86, 1, '1', '5.6', 28, 0, 0),
(177, 82, 42, 0, 14, 3, '0.240', '8.4', 42, 0, 0),
(178, 82, 19.9, 0, 3, 2, '0.500', '9.978', 49.89, 0, 0),
(179, 83, 19.2, 0, 70, 1, '0.500', '3.98', 19.9, 0, 0),
(180, 83, 16, 0, 65, 2, '1', '3.2', 16, 0, 0),
(181, 84, 8.9, 0, 183, 1, '1', '1.484', 7.42, 0, 0),
(182, 85, 5.9, 0, 164, 1, '1', '0.984', 4.92, 0, 0),
(183, 85, 22.8, 0, 195, 1, '1', '3.98', 19.9, 0, 0),
(184, 86, 109, 0, 299, 1, '7', '0', NULL, 0, 0),
(185, 86, 16.8, 0, 78, 1, '1', '2.8', 14, 0, 0),
(186, 86, 19.08, 0, 238, 2, '1', '3.18', 15.9, 0, 0),
(187, 86, 7.08, 0, 164, 3, '1', '1.18', 5.9, 0, 0),
(188, 87, 13.08, 0, 185, 1, '1', '2.18', 10.9, 0, 0),
(189, 87, 109, 0, 299, 1, '7', '0', NULL, 0, 0),
(190, 88, 5.5, 0, 285, 1, '5', '0.916', 4.58, 0, 0),
(191, 89, 113, 0, 294, 1, '7', '0', NULL, 0, 0),
(192, 90, 19.08, 0, 238, 1, '1', '3.18', 15.9, 0, 0),
(193, 90, 80, 0, 0, 2, NULL, '0', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `av_orders_products_options`
--

CREATE TABLE `av_orders_products_options` (
  `orders_product_option_id` int(11) NOT NULL,
  `order_detail_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `categorie_option_id` int(11) NOT NULL,
  `product_option_qty` float DEFAULT 0,
  `product_option_price` float DEFAULT 0,
  `product_option_price_buying` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `av_pages`
--

CREATE TABLE `av_pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_meta_description` text DEFAULT NULL,
  `page_meta_title` varchar(255) DEFAULT NULL,
  `page_description` text DEFAULT NULL,
  `page_meta_keywords` text DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `data_created` datetime DEFAULT NULL,
  `data_updated` datetime DEFAULT NULL,
  `page_image` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_data_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_pages`
--

INSERT INTO `av_pages` (`page_id`, `page_title`, `page_meta_description`, `page_meta_title`, `page_description`, `page_meta_keywords`, `page_url`, `data_created`, `data_updated`, `page_image`, `page_name`, `page_data_status`) VALUES
(5, 'home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Qui sommes nous', 'Qui sommes nous', 'Qui sommes nous', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.france-clean.fr/bassem/template/img/logo_go_ferme_halal.png\" alt=\"logo\" width=\"195\" height=\"128\" /></p>\r\n<p>&nbsp;</p>\r\n<p><strong><u>GO-ferme-halal.fr </u></strong></p>\r\n<p>Vous propose une s&eacute;lection unique de viandes issus de l&rsquo;agriculture Biologique.</p>\r\n<p>Un large choixHalal s&rsquo;offre &agrave; vous : Agneau, B&oelig;uf, Veau, Volailles&hellip; &agrave; des prix abordables.</p>\r\n<p>Nous travaillons directement en partenariat avec des bouchers amoureux de leur m&eacute;tier et dont la fa&ccedil;on de travailler correspond &agrave; notre philosophie : des produits &eacute;labor&eacute;s dans le respect de l&rsquo;&eacute;levage des animaux et de l&rsquo;environnement. Et ce sont eux qui fixent leurs prix, pour assurer ainsi la p&eacute;rennit&eacute; de leurs exploitations.</p>\r\n<p>Notre &eacute;quipe s\'engage pour la qualit&eacute; et la s&eacute;lection pour vous de nos meilleures b&ecirc;tes, adapt&eacute;es &agrave; tous les budgets.</p>\r\n<p>&nbsp;</p>', 'Qui sommes nous', NULL, NULL, NULL, '', 'Qui sommes nous', 1),
(7, 'Notre mission', 'Notre mission', 'Notre mission', '<p><br /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.crushpixel.com/big-static14/preview4/raw-lamb-cutlets-on-bone-1575829.jpg?fbclid=IwAR1tNzmNof9k9QoWdqlJvwyMuOppgjnhiZzU7ko2s_O8serj72H_mIoDbCk\" alt=\"\" width=\"385\" height=\"271\" /></p>\r\n<p>&nbsp;</p>\r\n<div><u>Pour le BOUCHER</u></div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://fr.freepik.com/photos-gratuite/femme-coupant-viande-fraiche-dans-boucherie-gant-securite-metal_3389483.htm#page=1&amp;query=boucher&amp;position=1\" alt=\"\" width=\"385\" height=\"271\" /></div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div>&nbsp;L\'aider &agrave; valoriser son travail; le faire conna&icirc;tre et l\'aider &agrave; rayonner sur sa r&eacute;gion mais &eacute;galement la France enti&egrave;re ; l\'accompagner dans le d&eacute;veloppement de ses ventes en Circuit-Court.</div>\r\n<div><u>Pour le Consommateur</u></div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<p>&nbsp;</p>\r\n<div><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://fr.freepik.com/photos-premium/boites-colis-papier-logo-panier-achat-dans-chariot-clavier-ordinateur-portable_5734664.htm#query=consommateur%20&amp;position=32\" alt=\"\" width=\"385\" height=\"271\" /></div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div>Lui apporter du go&ucirc;t et de la transparence dans son assiette ; faire d&eacute;couvrir de petits producteurs de qualit&eacute; difficilement accessibles (qu&rsquo;on ne trouve pas forc&eacute;ment en bas de chez soi) et pouvoir se faire livrer leurs produits, frais, &agrave; domicile le jour de son choix.</div>', 'Notre mission', NULL, NULL, NULL, '', 'Notre mission', 1),
(8, 'Nos engagements ', 'Nos engagements ', 'Nos engagements ', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://keyrus-prod.s3.amazonaws.com/uploads/Lessor_de_la_logistique_urbaine_- _Keyrus.jpg?fbclid=IwAR0a7JYyqwFXWf7dwXuVFvCMYS_laTDhu068WQNFMAbMa32v-il2h8z9qps\" alt=\"\" width=\"385\" height=\"271\" /></p>\r\n<ul>\r\n<li><a href=\"https://www.pourdebon.com/page/philosophie\"><strong>Qualit&eacute; de l&rsquo;origine</strong></a><strong>: </strong></li>\r\n</ul>\r\n<p>Les produits de nos &eacute;tals r&eacute;pondent en priorit&eacute; &agrave; des crit&egrave;res officiels de qualit&eacute; (AOP, AB, IGP, Label Rouge, M&eacute;daill&eacute;s&nbsp;<a href=\"https://blog.pourdebon.com/concours-general-agricole-2017/\">CGA</a>,&nbsp;<a href=\"https://blog.pourdebon.com/le-college-culinaire-de-france/\">Coll&egrave;ge Culinaire de France</a>, etc.) et sont produits selon des m&eacute;thodes artisanales d&rsquo;agriculture raisonn&eacute;e ou bio. La transparence est totale sur l&rsquo;origine des produits - Lieu de production, d&rsquo;&eacute;levage/abattage et transformation.</p>\r\n<ul>\r\n<li><br /><a href=\"https://www.pourdebon.com/page/philosophie#delivery\"><strong>Qualit&eacute; du transport</strong></a><strong>: </strong></li>\r\n</ul>\r\n<p>Chaque commande est collect&eacute;e directement sur son lieu de production, transport&eacute;e en v&eacute;hicule frigorifique, puis livr&eacute;e 24h apr&egrave;s son exp&eacute;dition par les producteurs. Si plusieurs commandes sont pass&eacute;es sur Go-ferme-halal&nbsp; elles seront automatiquement group&eacute;es lors de la livraison le jour souhait&eacute;.</p>\r\n<ul>\r\n<li><strong><br /></strong><a href=\"https://www.pourdebon.com/page/philosophie#delivery\"><strong>Respect de la cha&icirc;ne du froid</strong></a><strong>: </strong></li>\r\n</ul>\r\n<p>les produits sont manipul&eacute;s manuellement par Chronofresh, en chambre froide. Tout au long du voyage, la temp&eacute;rature est contr&ocirc;l&eacute;e par puce RFID et les donn&eacute;es sont envoy&eacute;es &agrave; la cellule de supervision d&eacute;di&eacute;e.\"</p>\r\n<p>&nbsp;</p>', 'Nos engagements ', NULL, NULL, NULL, '', 'Nos engagements ', 1),
(9, 'Conditions Générales', 'Conditions Générales', 'Conditions Générales', '<p>Les pr&eacute;sentes conditions s&rsquo;appliquent &agrave; toutes les ventes effectu&eacute;es sur le pr&eacute;sent site internet GO-ferme-halal.fr</p>\r\n<p>Elles pr&eacute;valent dans tous les cas sur tout autre document &eacute;mis qui n&rsquo;ont qu&rsquo;une valeur indicative (tels que renseignements fournis de fa&ccedil;on directe ou publicitaire sur les produits, description et renseignement de nos prospectus, catalogues, tarifs, reproduction&hellip;).</p>\r\n<p>Elles sont modifiables sans pr&eacute;avis et seront applicables aux ventes r&eacute;alis&eacute;es post&eacute;rieurement &agrave; la modification.</p>\r\n<p>Elles font partie int&eacute;grante de notre offre et sont donc syst&eacute;matiquement port&eacute;es &agrave; la connaissance de tout client pr&eacute;alablement &agrave; la passation d&rsquo;une commande.</p>\r\n<p>S&rsquo;agissant d&rsquo;un contrat de vente conclu par voie &eacute;lectronique, la soci&eacute;t&eacute; entend s&rsquo;identifier aupr&egrave;s du client :</p>\r\n<p>GO-FERME HALAL&nbsp; au capital de &hellip;. euros dont le si&egrave;ge social est sis&nbsp;Soci&eacute;t&eacute; &hellip;&hellip;.., zone de &hellip;.. , &hellip;&hellip;.., &hellip;&hellip;&hellip;. sous le num&eacute;ro &hellip;&hellip;..</p>\r\n<p>Le fait de passer commande implique n&eacute;cessairement l&rsquo;acceptation sans aucune r&eacute;serve et l&rsquo;adh&eacute;sion pleine et enti&egrave;re du client aux pr&eacute;sentes conditions. Toute condition contraire oppos&eacute;e par le client nous sera inopposable, &agrave; d&eacute;faut d&rsquo;acceptation expresse de notre part, et ce quel que soit le moment o&ugrave; elle aura pu &ecirc;tre port&eacute;e &agrave; notre connaissance</p>\r\n<ul>\r\n<li><strong>Produits et disponibilit&eacute;s</strong></li>\r\n</ul>\r\n<p><strong>Image&nbsp;: </strong><a href=\"https://www.pexels.com/photo/sliced-meats-on-wooden-chopping-board-1927383/\"><strong>https://www.pexels.com/photo/sliced-meats-on-wooden-chopping-board-1927383/</strong></a></p>\r\n<p>Les produits Halal de notre offre sont conformes &agrave; la r&eacute;glementation et aux normes en vigueur en France et/ou dans l&rsquo;Union Europ&eacute;enne &agrave; la date de leur livraison.</p>\r\n<p>Chaque produit est accompagn&eacute; d\'un descriptif permettant au client de conna&icirc;tre les caract&eacute;ristiques essentielles du produit ; les photos et illustrations n&rsquo;ont toutefois qu&rsquo;une valeur indicative. De m&ecirc;me, pour les produits &agrave; la d&eacute;coupe, leur poids est susceptible de varier selon la d&eacute;coupe dans une fourchette de +/- 5 % par rapport au poids indiqu&eacute; sur le descriptif du produit. Si le poids du produit &agrave; la d&eacute;coupe est sup&eacute;rieur ou inf&eacute;rieur de 5 % au poids indiqu&eacute; dans le descriptif, l\'exc&eacute;dent ou l\'insuffisance de poids ne donnera lieu &agrave; aucune augmentation ou diminution proportionnelle du prix.</p>\r\n<p>En cons&eacute;quence, notre responsabilit&eacute; ne saurait &ecirc;tre recherch&eacute;e ni engag&eacute;e en cas d&rsquo;erreurs, impr&eacute;cisions ou omissions relativement aux informations de notre offre mises en ligne sur ce site.</p>\r\n<p>Nous nous r&eacute;servons le droit de modifier &agrave; tout moment et sans pr&eacute;avis notre offre. En cons&eacute;quence, les produits de notre offre sont disponibles tant qu&rsquo;ils figurent sur le site et dans la limite des stocks. La disponibilit&eacute; ou non d&rsquo;un produit ainsi que le d&eacute;lai de livraison est indiqu&eacute;e au client lors de la saisie du bon de commande et lui est confirm&eacute;e dans l&rsquo;accus&eacute; de r&eacute;ception de commande vis&eacute; ci-dessous. En cas d&rsquo;indisponibilit&eacute; confirm&eacute;e dans l\'accus&eacute; de r&eacute;ception de commande, le client pourra alors demander, dans les 72 heures, soit l&rsquo;annulation de son bon de commande contre remboursement, soit la substitution avec un autre produit disponible sur le site.</p>\r\n<ul>\r\n<li><strong>Commandes</strong></li>\r\n</ul>\r\n<p><strong>Image&nbsp;: </strong><a href=\"https://www.solutions-magazine.com/wp-content/uploads/2020/12/SODEXO.jpg.png\"><strong>https://www.solutions-magazine.com/wp-content/uploads/2020/12/SODEXO.jpg.png</strong></a></p>\r\n<p>Le client est enti&egrave;rement responsable des informations saisies dans le bon de commande. A d&eacute;faut d&rsquo;&ecirc;tre compl&egrave;tement renseign&eacute;, le bon de commande ne sera pas valid&eacute;. En cons&eacute;quence, notre responsabilit&eacute; ne saurait &ecirc;tre recherch&eacute;e ni engag&eacute;e dans le cas o&ugrave; nous serions dans l&rsquo;impossibilit&eacute; de livrer ou d&rsquo;ex&eacute;cuter la commande en raison d&rsquo;erreurs, impr&eacute;cisions ou omissions relativement &agrave; ces informations.</p>\r\n<p>Le client, qui souhaite commander un ou plusieurs produits doit obligatoirement :</p>\r\n<p>- saisir son identifiant et son mot de passe ; &agrave; d&eacute;faut il devra cr&eacute;er un compte client personnel en cliquant sur le bouton &laquo; &hellip;&hellip; &raquo; puis en remplissant le formulaire d\'inscription sur lequel il indiquera toutes les coordonn&eacute;es demand&eacute;es, avec en particulier le lieu de livraison souhait&eacute; qui doit obligatoirement &ecirc;tre situ&eacute; dans la zone de livraison indiqu&eacute;e sur le site. Le client est en outre amen&eacute; &agrave; choisir un mot de passe qui devra rester confidentiel et ne pas &ecirc;tre divulgu&eacute; &agrave; un tiers. Le client demeure responsable de l\'utilisation de son compte et de son mot de passe.</p>\r\n<p>- remplir le panier de commande en ligne en s&eacute;lectionnant les produits choisis ;</p>\r\n<p>- valider sa commande apr&egrave;s l&rsquo;avoir v&eacute;rifi&eacute;e, et notamment le lieu de livraison, ainsi que la date et l\'heure de livraison s&eacute;lectionn&eacute;es ;</p>\r\n<p>- certifier avoir lu et accept&eacute; les pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Ventes ;</p>\r\n<p>- effectuer le paiement dans les conditions pr&eacute;vues ;</p>\r\n<p>- confirmer sa commande et son r&egrave;glement.</p>\r\n<p>Nous nous r&eacute;servons le droit de ne pas confirmer tout bon de commande d&rsquo;un client avec lequel il existe ou existerait un litige.</p>\r\n<p>Les informations conserv&eacute;es dans notre syst&egrave;me d&rsquo;information ont force probante quant aux commandes pass&eacute;es. En cas de production de ces informations sur support &eacute;lectronique, elles auront la m&ecirc;me valeur que si elles avaient &eacute;t&eacute; donn&eacute;es et conserv&eacute;es par &eacute;crit.</p>\r\n<p>Les commandes pass&eacute;es sur le site sont destin&eacute;es un usage personnel. Le client s\'interdit notamment de revendre les produits &agrave; un tiers.</p>\r\n<ul>\r\n<li><strong>Prix</strong></li>\r\n</ul>\r\n<p>Les prix des produits sont ceux en vigueur, c\'est-&agrave;-dire diffus&eacute;s sur notre site internet au</p>\r\n<p>Ils sont exprim&eacute;s en euros, toutes taxes comprises hors participation aux frais de transports et de livraison.</p>\r\n<p>Il est express&eacute;ment pr&eacute;cis&eacute; que pour toute commande, il y aura lieu d&rsquo;ajouter au prix, les frais de transport et de livraison tels que diffus&eacute;s sur notre site et confirm&eacute;s dans l&rsquo;ARC.&nbsp;</p>\r\n<ul>\r\n<li><strong>Paiement</strong></li>\r\n</ul>\r\n<p><strong>Image&nbsp;: </strong><a href=\"https://www.pexels.com/photo/bank-blur-business-buy-259200/\"><strong>https://www.pexels.com/photo/bank-blur-business-buy-259200/</strong></a></p>\r\n<p>Le prix est payable comptant le jour de la saisie du bon de commande par le client. Le paiement s&rsquo;effectue par carte bancaire (Carte Bleue, Carte Visa ou Carte Mastercard) via le serveur bancaire de notre banque dans un environnement s&eacute;curis&eacute; c\'est-&agrave;-dire par un proc&eacute;d&eacute; de cryptage des donn&eacute;es qui en assure la confidentialit&eacute;. Le paiement se d&eacute;roule donc directement entre le client et la banque, les informations transmises par le client &agrave; partir de son ordinateur ne circulent pas en clair sur le net, ne transitent pas par ce site et ne sont pas enregistr&eacute;es sur nos serveurs ; le client devra donc communiquer ces informations lors de chaque nouvelle commande.</p>\r\n<p>En cas de refus du centre du paiement bancaire concern&eacute;, la commande sera automatiquement annul&eacute;e et le client sera inform&eacute; par l&rsquo;envoi d&rsquo;un e-mail.&nbsp;</p>\r\n<ul>\r\n<li><strong>Livraison</strong></li>\r\n</ul>\r\n<p><strong>Image&nbsp;: </strong><a href=\"https://www.techadvisor.fr/cmsdata/slideshow/3798132/gettyimages-1217702156_thumb800.jpg\"><strong>https://www.techadvisor.fr/cmsdata/slideshow/3798132/gettyimages-1217702156_thumb800.jpg</strong></a></p>\r\n<p>Nos produits ne peuvent &ecirc;tre livr&eacute;s que dans la zone de livraison indiqu&eacute;e sur le site.</p>\r\n<p>Nous nous engageons &agrave; faire nos meilleurs efforts pour livrer dans le cr&eacute;neau horaire et &agrave; l&rsquo;adresse de livraison mentionn&eacute;s dans le bon de commande.</p>\r\n<p>Le client s\'engage donc &agrave; &ecirc;tre disponible pour r&eacute;ceptionner les produits &agrave; l\'adresse et au cr&eacute;neau horaire qu\'il a indiqu&eacute; dans sa commande.</p>\r\n<p>Dans le cas o&ugrave; les produits command&eacute;s n\'ont pu &ecirc;tre livr&eacute;s du fait de l\'absence du client ou du fait d\'informations erron&eacute;es ou impr&eacute;cises sur l\'horaire et le lieu de livraison :</p>\r\n<p>- Pour les livraisons &agrave; Paris et proche banlieue : Le livreur de notre partenaire &hellip;&hellip;. retournera la commande &hellip;&hellip;&hellip;.&nbsp;Le client sera contact&eacute;&nbsp;pour reprogrammer une nouvelle livraison qui sera &agrave;&nbsp;sa charge.</p>\r\n<p>- Pour les livraisons en France : notre&nbsp;partenaire &hellip;&hellip;.. adressera au client un mail afin de reprogrammer la livraison &agrave; une date ult&eacute;rieure. Les produits frais ayant une date limite de consommation, il est &agrave; la charge du client de bien s\'assurer de ne pas programmer un report de plus de 24/48h.</p>\r\n<p>Malgr&eacute; la r&eacute;serve de propri&eacute;t&eacute; ci-dessous, les produits voyagent aux risques et p&eacute;rils du client.</p>\r\n<p>Nos produits sont livr&eacute;s par transporteur en France et par coursier &agrave; Paris et proche banlieue.</p>\r\n<ul>\r\n<li><strong>R&eacute;ception</strong></li>\r\n</ul>\r\n<p>Il appartiendra au client de v&eacute;rifier les produits au moment m&ecirc;me de leur livraison.</p>\r\n<p>En cons&eacute;quence :</p>\r\n<p>- En cas de produits manquants ou abim&eacute;s, le client devra faire toutes constatations n&eacute;cessaires lors de la r&eacute;ception des produits sur le bon de livraison et confirmer ses r&eacute;serves par lettre R.A.R. au transporteur dans les trois jours qui suivent la r&eacute;ception des produits conform&eacute;ment aux dispositions de l&rsquo;article L 133-3 du Code de Commerce. Une copie de cette lettre nous sera adress&eacute;e.</p>\r\n<p>- En cas de non-conformit&eacute; des produits livr&eacute;s par rapport aux produits command&eacute;s ou au bon de livraison, le client devra imm&eacute;diatement retourner &agrave; ses frais et &agrave; ses risques le produit non conforme et formuler ses r&eacute;clamations par &eacute;crit au plus tard dans les 3 jours de la r&eacute;ception des produits au si&egrave;ge social de la soci&eacute;t&eacute; Go-ferme Halal .</p>\r\n<ul>\r\n<li><strong>Droits de r&eacute;tractation</strong></li>\r\n</ul>\r\n<p>En application de l\'article L 121-20-2 du Code de la Consommation, le droit de r&eacute;tractation vis&eacute; par l\'article L 121-20 du Code de la Consommation ne pourra &ecirc;tre exerc&eacute; en raison de la nature des produits vendus ; ceux&ndash;ci &eacute;tant susceptibles de se d&eacute;t&eacute;riorer ou de se p&eacute;rimer rapidement.&nbsp;</p>\r\n<ul>\r\n<li><strong>Clause de r&eacute;serve de propri&eacute;t&eacute;</strong></li>\r\n</ul>\r\n<p>Nous nous r&eacute;servons la propri&eacute;t&eacute; des produits jusqu&rsquo;&agrave; complet paiement du prix factur&eacute;. Cette disposition ne fait pas obstacle au transfert des risques qui s&rsquo;op&egrave;re d&egrave;s la remise du produit au transporteur.&nbsp;</p>\r\n<ul>\r\n<li><strong>Force majeure</strong></li>\r\n</ul>\r\n<p>La force majeure et le cas fortuit nous exon&egrave;rent de toute obligation de livrer. Toute inex&eacute;cution due &agrave; la force majeure ou cas fortuit, donnera lieu &agrave; remboursement, s&rsquo;il y a lieu, des sommes r&eacute;gl&eacute;es mais en aucun cas &agrave; des dommages et int&eacute;r&ecirc;ts.</p>\r\n<ul>\r\n<li><strong>Propri&eacute;t&eacute; intellectuelle et industrielle</strong></li>\r\n</ul>\r\n<p>Le client s&rsquo;engage &agrave; respecter les droits de propri&eacute;t&eacute; intellectuelle et industrielle attach&eacute;s au site.</p>\r\n<ul>\r\n<li><strong>Comp&eacute;tences - contestation</strong></li>\r\n</ul>\r\n<p>Les pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente et plus g&eacute;n&eacute;ralement les contrats conclus via notre site web sont soumis au droit fran&ccedil;ais.</p>\r\n<p>En cas de contestation relative aux pr&eacute;sentes conditions et plus g&eacute;n&eacute;ralement aux contrats conclus via notre site web, nous nous efforcerons de r&eacute;soudre avec le client, dans un d&eacute;lai d&rsquo;un mois, le diff&eacute;rend &agrave; l&rsquo;amiable. A d&eacute;faut de solution amiable trouv&eacute;e dans ce d&eacute;lai, les tribunaux de Rodez seront seuls comp&eacute;tents, quels qu&rsquo;en soient le lieu de livraison, le mode de r&egrave;glement et m&ecirc;me en cas d&rsquo;appel en garantie ou de pluralit&eacute; de d&eacute;fendeurs.</p>\r\n<ul>\r\n<li><strong>Garantie</strong></li>\r\n</ul>\r\n<p>Nous garantissons les produits conform&eacute;ment aux dispositions l&eacute;gales tant du code civil que du code de la consommation, sur pr&eacute;sentation de la facture d&rsquo;achat dat&eacute;e mentionnant pr&eacute;cis&eacute;ment la r&eacute;f&eacute;rence du produit concern&eacute;.</p>\r\n<p>Toute r&eacute;clamation devra nous &ecirc;tre adress&eacute;e par le client par lettre RAR &agrave; l&rsquo;adresse du si&egrave;ge social figurant en t&ecirc;te des pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Vente.</p>\r\n<p>Les informations nominatives collect&eacute;es ont pour objet d&rsquo;assurer la bonne fin des commandes pass&eacute;es sur le site. Elles sont indispensables au traitement des commandes, &agrave; l&rsquo;acheminement des produits et &agrave; l&rsquo;&eacute;tablissement des factures. Elles sont destin&eacute;es &agrave; notre usage et sont susceptibles d&rsquo;&ecirc;tre trait&eacute;es par des prestataires de services agissant pour notre compte. Le client consent &eacute;galement &agrave; l\'utilisation de ces donn&eacute;es par notre soci&eacute;t&eacute; et/ou par des tiers. Conform&eacute;ment &agrave; la loi &laquo; Informatique et Libert&eacute; &raquo;, le traitement des informations nominatives relatives aux acheteurs, a fait l&rsquo;objet d&rsquo;une d&eacute;claration aupr&egrave;s de la CNIL.</p>\r\n<p>Conform&eacute;ment &agrave; l&rsquo;article de ladite loi du 6 janvier 1978 l&rsquo;acheteur dispose d&rsquo;un droit d&rsquo;acc&egrave;s, de modification, de rectification et de suppression des donn&eacute;es qui le concernent, qu&rsquo;il peut exercer aupr&egrave;s de nous &agrave; l&rsquo;adresse du si&egrave;ge social figurant en t&ecirc;te de ces conditions ou par courriel &agrave; l&rsquo;adresse : contact@go-ferme-halal.fr.</p>\r\n<p>&nbsp;</p>', 'Conditions Générales', NULL, NULL, NULL, '', 'Conditions Générales', 1),
(10, 'Mentions Légales ', 'Mentions Légales ', 'Mentions Légales ', '<p>Raison sociale : GO-FERME HALAL</p>\r\n<p>Nom : Entreprise GO-FERME HALAL</p>\r\n<p>Adresse Si&egrave;ge social : &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</p>\r\n<p>Adresse Mail : contact@go-ferme-halal.fr</p>\r\n<p>SIREN : &hellip;&hellip;&hellip;</p>\r\n<p>Adresse site internet : www.go-ferme-halal.fr</p>\r\n<p>&Eacute;diteur du site : &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>\r\n<p>Directeur de publication : &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>\r\n<p>Traitement des informations personnelles :</p>\r\n<p>Conform&eacute;ment &agrave; la loi du 6 janvier 1978 relative &agrave; l&rsquo;informatique, aux fichiers et aux libert&eacute;s, nous vous informons que vous disposez d&rsquo;un droit d&rsquo;acc&egrave;s, de modification, de rectification et de suppression des donn&eacute;es qui vous concernent.</p>\r\n<p>Pour cela &eacute;crivez &agrave; Soci&eacute;t&eacute; &hellip;&hellip;&hellip;&hellip;</p>\r\n<p>Droits d&rsquo;auteur :</p>\r\n<p>En application de la loi du 11 mars 1957 et du code de la propri&eacute;t&eacute; intellectuelle du 1 er juillet 1992, toute reproduction partielle ou totale &agrave; usage collectif est strictement interdite sans autorisation de &hellip;&hellip;.. . Tous les &eacute;l&eacute;ments contenus sur ce site (texte, photos, visuels) sont la propri&eacute;t&eacute; de AS et/ou de leurs d&eacute;tenteurs respectifs.</p>', 'Mentions Légales ', NULL, NULL, NULL, '', 'Mentions Légales ', 1),
(11, 'Emballages', 'Emballages', 'Emballages', '<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.freepik.com/premium-photo/raw-piece-marble-beef-brisket-meat_13410164.htm#query=%20sous%20vide&amp;position=14\" alt=\"\" width=\"385\" height=\"271\" /></p>\r\n<ul>\r\n<li><strong>Technologie d\'emballage sous vide </strong></li>\r\n</ul>\r\n<p>L&rsquo;emballage sous vide est un moyen efficace d&rsquo;augmenter la dur&eacute;e de conservation des aliments et de prot&eacute;ger physiquement les produits des agressions ext&eacute;rieures. Le cycle d&rsquo;emballage sous vide comporte 4 &eacute;tapes&nbsp;</p>\r\n<p><u>CONTR&Ocirc;LE PAR TEMPS, POURCENTAGE OU POINT D\'&Eacute;BULLITION</u></p>\r\n<ol>\r\n<li><strong> Extraction de l\' air</strong></li>\r\n</ol>\r\n<p>L&rsquo;emballage sous vide est un moyen efficace d&rsquo;augmenter la dur&eacute;e de conservation des aliments et de prot&eacute;ger physiquement les produits des agressions ext&eacute;rieures. Le cycle d&rsquo;emballage sous vide comporte 4 &eacute;tapes. Pendant la premi&egrave;re &eacute;tape l&rsquo;air est extrait du produit, du sachet et de la chambre jusqu&rsquo;&agrave; ce que le niveau de vide pr&eacute;d&eacute;fini a &eacute;t&eacute; atteint ou que le point d&rsquo;&eacute;bullition a &eacute;t&eacute; d&eacute;tect&eacute;.</p>\r\n<p><u>EMBALLAGE SOUS ATMOSPH&Egrave;RE MODIFI&Eacute;E OU MAP</u></p>\r\n<ol start=\"2\">\r\n<li><strong> Injection de gaz (option)</strong></li>\r\n</ol>\r\n<p>L\'injection de gaz est une option sur toutes les s&eacute;ries, &agrave; l\'exception des mod&egrave;les Jumbo et Titaan. L\'ajout d\'un gaz offre une protection suppl&eacute;mentaire et emp&ecirc;che le produit de se d&eacute;colorer.Le m&eacute;lange de gaz le plus appropri&eacute; d&eacute;pend du produit alimentaire en question. Votre fournisseur peut vous informer au mieux de la composition optimale pour votre application.</p>\r\n<ul>\r\n<li>Protection de la structure</li>\r\n<li>Pr&eacute;servation de la qualit&eacute;</li>\r\n<li>Pr&eacute;vention de la coloration</li>\r\n<li>Augmentation de la DLC</li>\r\n</ul>\r\n<p><u>CHOISIR LA BONNE SOLUTION DE SOUDURE</u></p>\r\n<ol start=\"3\">\r\n<li><strong> Soudure</strong></li>\r\n</ol>\r\n<p>Le syst&egrave;me de soudure adapt&eacute;&nbsp;prot&egrave;ge efficacement les produits contre les &eacute;l&eacute;ments externes. Choisissez&nbsp;le&nbsp;syst&egrave;me de soudure&nbsp;en fonction du type et de l\'&eacute;paisseur du sachet sous vide&nbsp;et de vos exigences sp&eacute;cifiques. Les syst&egrave;mes de soudure&nbsp;de Henkelman:</p>\r\n<ul>\r\n<li>Double soudure&nbsp;(standard)</li>\r\n<li>Soudure coupure (&euro;0)</li>\r\n<li>Soudure coupure 1-2 (&euro;)</li>\r\n<li>Soudure large&nbsp;(&euro;0)</li>\r\n<li>Soudure Bi-active (&euro;)</li>\r\n</ul>\r\n<p><u>SOFT AIR PROT&Egrave;GE LE PRODUIT ET LE SACHET SOUS VIDE</u></p>\r\n<ol start=\"4\">\r\n<li><strong> Remise en atmosph&egrave;re</strong></li>\r\n</ol>\r\n<p>Une fois la mise sous vide termin&eacute; et le sachet sous vide soud&eacute;, l\'air retourne dans la chambre par la vanne d\'a&eacute;ration. D&egrave;s que la pression atmosph&eacute;rique dans la chambre est identique &agrave; la pression &agrave; l\'ext&eacute;rieur, le couvercle s\'ouvre. Cela fonctionne par la remise en atmosph&egrave;re standard et Soft Air. Soft Air est particuli&egrave;rement adapt&eacute; aux produits &agrave; bords tranchants.</p>\r\n<ul>\r\n<li>Protection du produit et du sachet sous vide</li>\r\n<li>En standard sur tous les mod&egrave;les, sauf Jumbo, Falcon and Atmoz</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.freepik.com/premium-photo/raw-piece-marble-beef-brisket-meat_13410164.htm#query=%20sous%20vide&amp;position=14\" alt=\"\" width=\"385\" height=\"271\" /></p>', 'Emballages', NULL, NULL, NULL, '', '  Emballages', 1),
(12, 'Nos certification', 'Nos certification', 'Nos certification', '<p>GO-FERME-HALAL n&rsquo;est engag&eacute;e qu&rsquo;avec les Bouchers certifi&eacute;s :</p>\r\n<ul>\r\n<li><strong>Viandes certifi&eacute;es Halal</strong></li>\r\n</ul>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://teknutrition.com/wp-content/uploads/2018/03/bigstock-131396768.png\" alt=\"\" width=\"241\" height=\"203\" /></p>\r\n<p>Tous les abattagesont lieu sans &eacute;lectronarcose, sans &eacute;lectrochocet sans assommage, de fa&ccedil;onmanuelle, 1 &agrave; 1, et dans la mesure du possible, t&ecirc;te de l\'animal &agrave; l\'endroit.</p>\r\n<ul>\r\n<li><strong>Viandes r&eacute;sultant de l\'agriculture biologique</strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.protegez-vous.ca/var/protegez_vous/storage/images/_aliases/social_network_image/0/3/2/5/315230-1-fre-CA/05_Introalimentation201207_img_1536x1146.jpg\" alt=\"\" width=\"241\" height=\"203\" /></p>\r\n<p>Nous avonsrecours &agrave; l\'agriculturebiologique pour le poulet, le b&oelig;ufetl\'agneau. Afin de vousgarantir des viandesr&eacute;sultant de l\'agriculturebiologique, nous diligentons des contr&ocirc;leset audits inopin&eacute;s chez nos&eacute;leveurs.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Viandes certifi&eacute;es Label Rouge ou Fermier</strong></li>\r\n</ul>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://upload.wikimedia.org/wikipedia/fr/thumb/a/a0/Label_Rouge.svg/1200px-Label_Rouge.svg.png\" alt=\"\" width=\"241\" height=\"203\" /></p>\r\n<p>Nous vousproposons du poulet Label rouge fermier; poulet de grandequalit&eacute;.Nos&eacute;leveursdoivent respecter un cahier des charges qui d&eacute;finitpr&eacute;cis&eacute;ment les caract&eacute;ristiques du produit, les exigences de production tout au long de sa fabrication et les crit&egrave;res de labellisation.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Boeuf de Galice certifi&eacute; IGP</strong></li>\r\n</ul>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://upload.wikimedia.org/wikipedia/commons/4/4c/Logo-IGP.jpg\" alt=\"\" width=\"241\" height=\"203\" /></p>\r\n<p>Le B&oelig;uf de Galiceque nous proposons dispose de la certification IGP (Indication G&eacute;ographique Prot&eacute;g&eacute;e). Cette certification attribu&eacute;e aux produitssp&eacute;cifiquesportantun nom g&eacute;ographique et li&eacute;s &agrave; leurorigineg&eacute;ographique, atteste de produitsqualitatifs.</p>', 'Nos certification', NULL, NULL, NULL, '', 'Nos certification', 1),
(13, 'Partenaire ', 'Partenaire ', 'Partenaire ', '<p>GO FERME HALAL ~ CONTENU ~ SITE WEB ~</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>08-PARTENAIRE&nbsp;</strong><strong>:</strong></p>\r\n<ul>\r\n<li><strong>POURQUOI DEVENIR UN PARTENAIRE:</strong></li>\r\n</ul>\r\n<p>c&rsquo;est trop simple ! ! !</p>\r\n<p>UNE STRAT&Eacute;GIE DE PARTENARIAT LE PLUS RENTABLE POUR D&Eacute;VELOPPER L&rsquo;ACTIVIT&Eacute; DE NOS CLIENTS</p>\r\n<p>Dans le march&eacute;d\'achat en ligneactuel, nous sommesconvaincusquel\'honn&ecirc;tet&eacute;est lameilleurestrat&eacute;gie. Pour cette raison, nous avonscr&eacute;&eacute; la politique de magasin la plus g&eacute;n&eacute;reuse, justeettransparente pour nos clients</p>\r\n<ul>\r\n<li><strong><u>AVANTAGES</u></strong></li>\r\n</ul>\r\n<p><strong>01 UN ACC&Egrave;S GRATUIT &Agrave; NOTRE PLATEFORME </strong></p>\r\n<p>En devenantpartenaire, vousdisposez d&rsquo;un acc&egrave;sgratuit &agrave; notre plate-formepourg&eacute;rervosproduits et voscommandes en ligne. Vousavez le droitd&rsquo;activeroud&eacute;sactiverchaquevente &agrave; tout moment et de composer des paniers de plusieursproduits.</p>\r\n<p><strong>02 UNE TABLETTE ET UNE IMPRIMANTE DE TICKETS </strong></p>\r\n<p>GO-ferme-Halal, offre &agrave; chaquepartenaireunetablettedot&eacute;ed\'uneimprimante des tickets contreunch&egrave;que de garantie, qui ne sera pas d&eacute;pos&eacute; et sera rendu au partenaireunefoisque le contratestfini. Toutefois le partenaireestengag&eacute; &agrave; rendre la tablette et l&rsquo;imprimante &agrave; GO-ferme-Halal apr&eacute;s la fin du contrat.</p>\r\n<p><strong>03 UN PACKAGING &Agrave; LA HAUTEUR DE VOS AMBITIONS </strong></p>\r\n<p>GO-ferme-Halal, offregratuitement &agrave; sesboucherspartenaires des packs de caisses en carton de plusieursdimentions, faciles &agrave; stocker et tr&eacute;srapide &agrave; monter pour faciliter la livraison de leurscommandes. GO-ferme-Halal vousenvoie, par poste etdirectement &agrave; votreadresse de nouveaux packs de caissesapr&eacute;svoslivraisons.</p>\r\n<ul>\r\n<li><strong>COMMENT DEVENIR UN PARTENAIRE :</strong></li>\r\n<li><strong>Formulaire a remplir pour cr&eacute;er un compte</strong></li>\r\n</ul>\r\n<p>Les CHAMPS&nbsp;:</p>\r\n<p>-Nom</p>\r\n<p>-Pr&eacute;nom</p>\r\n<p>-Nom de boucherie</p>\r\n<p>-Logo</p>\r\n<p>-Adresse</p>\r\n<p>-Email</p>\r\n<p>-Contact</p>\r\n<p>-Bouton &lsquo;&rsquo;valider&rsquo;&rsquo;</p>\r\n<p>Apr&egrave;s la confirmation de l&rsquo;&eacute;quipe Go-FERME-HALAL ( login et mot de passe)&nbsp;</p>\r\n<ul>\r\n<li><strong>Compte Partenaire </strong></li>\r\n</ul>\r\n<p>Les Champs</p>\r\n<p>-Produit</p>\r\n<p>-Description</p>\r\n<p>-Prix</p>\r\n<p>&nbsp;</p>', 'Partenaire ', NULL, NULL, NULL, '', 'Partenaire ', 1),
(14, 'Nos recettes', 'Nos recettes', 'NOS RECETTES ', '<p>GO FERME HALAL ~ CONTENU ~ SITE WEB ~</p>\r\n<p><strong>09-NOS RECETTES </strong></p>\r\n<ul>\r\n<li><strong>Agneau</strong></li>\r\n</ul>\r\n<p><strong>- L\'agneau &agrave; la Ni&ccedil;oise</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.toutlevin.com/img/327e77c2a44a57af241129891685ff01004740003000-960.jpg\" alt=\"\" width=\"443\" height=\"273\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>1kg de tranches de Gigot<br />4 tomates<br />4 oignons<br />120 g de petites olives noires de Nice<br />5 goussesd&rsquo;ail<br />6 grosses feuilles de basilic<br />2 branches de thyms&eacute;ch&eacute;es<br />25 cl d&rsquo;eau<br />1 cu &agrave; soupe de farine<br />1 cu &agrave; souped&rsquo;huiled&rsquo;olive<br />Sel, poivre</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>Coupez les tranches d&rsquo;agneau en morceaux.&nbsp;<br />Pelez les tomateset les oignons, coupez les en 4.&nbsp;<br />Pelezethachez les goussesd&rsquo;ail.&nbsp;<br />Salezetpoivrez les morceaux de viande.&nbsp;<br />Dansune cocotte fa&icirc;tes chauffer l&rsquo;huile, ajoutez la viandeetfa&icirc;tescolorer les morceaux, puisretirez-les et r&eacute;servez-les.&nbsp;<br />Dans la cocotte, mettez les oignons et l&rsquo;ail &agrave; feudoux 5 min, ajoutez la viande, la farine, 15 cl d&rsquo;eau, remuezbien.&nbsp;<br />Ajoutez les tomates, les olives, le thym, le rested&rsquo;eau, fa&icirc;tesfr&eacute;mir.&nbsp;<br />Rectifiezl&rsquo;assaisonnement.&nbsp;<br />Couvrezetfa&icirc;tesmijoter 1h en remuantr&eacute;guli&egrave;rement.&nbsp;<br />Avant de servir, parsemez de basilic coup&eacute; en lamelles.</p>\r\n<p><strong>- C&ocirc;tes d\'Agneau - Beurre de lavande</strong></p>\r\n<p><img style=\"float: right;\" src=\"https://www.atelierdeschefs.com/media/recette-e4752-cotes-d-agneau-en-croute-de-lavande-cocotte-de-courgettes.jpg alt=\" width=\"432\" height=\"288\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>8 c&ocirc;tesd\'agneau</p>\r\n<p>1/2 cu. &agrave; caf&eacute; de fleur de lavande</p>\r\n<p>2 cu. &agrave; souped\'huiled\'olive</p>\r\n<p>80 gr de beurredoux</p>\r\n<p>sel, poivre</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>D&eacute;posez le beurredansunsaladier et travaillez-le &agrave; la fouchettejusqu\'&agrave;obtentiond\'uneconsistance plus &eacute;paisse. Incorporez les fleurs de lavande.M&eacute;langez.</p>\r\n<p>Roulez le beurreobtenudans du film alimentaire.R&eacute;servez au froid.</p>\r\n<p>Placez les c&ocirc;tesd\'agneaudansun plat, badigeonnezd\'huile et faites griller 3 &agrave; 4 minutes de chaquec&ocirc;t&eacute; sous le grill du four. Assaisonnez.</p>\r\n<p>Placezsurchaquec&ocirc;tesd\'agneauunerondelle de beurre de lavandebienfroid.Servez et d&eacute;gustezaussit&ocirc;t !</p>\r\n<p><strong>-C&ocirc;telettes d\'Agneau de Marius</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://img.over-blog-kiwi.com/0/81/60/50/20200526/ob_085cb5_cote-d-agneau-chimichurri-cyril-lignac.jpg\" alt=\"\" width=\"511\" height=\"383\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>8 C&ocirc;telettesd\'Agneau des Colis du Boucher</p>\r\n<p>40 tomatescerises environ</p>\r\n<p>1 goussed\'ail</p>\r\n<p>1 c. &agrave; caf&eacute; de romarin</p>\r\n<p>1 c. &agrave; caf&eacute; de thym</p>\r\n<p>3 c. &agrave; souped&rsquo;huiled&rsquo;olive</p>\r\n<p>Seletpoivre</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>Pr&eacute;parezune marinade en pelantetpilantl&rsquo;ail, ajoutez les herbes et l&rsquo;huile, trempezvosc&ocirc;telettes dedans et laissez mariner une bonne dizaine de minutes en remuantr&eacute;guli&egrave;rement.&nbsp;</p>\r\n<p>Pendant ce temps lavezvostomatescerises, coupez-les en 2 siellessonttr&egrave;s grosses.&nbsp;<br />&Eacute;gouttez la viande.&nbsp;</p>\r\n<p>Sur feuviffaites chauffer unepo&ecirc;le, d&eacute;posez-y les c&ocirc;teletteset laissez dorer 2 min par face.&nbsp;<br />Baissez le feu, ajoutez les tomates, salez, poivrezet laissez revenir encore 6 min.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>B&oelig;uf</strong></li>\r\n</ul>\r\n<p><strong>-Basse C&ocirc;te au Roquefort</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://img.cuisineaz.com/610x610/2017-02-06/i120442-cote-de-boeuf-sauce-roquefort.jpeg\" alt=\"\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>- 1 kg de Basses-c&ocirc;tes de B&oelig;uf des Colis du Boucher<br />- 2 &eacute;chalotes<br />- 200 gr de Roquefort<br />- 20 cl de fond de veau en poudre<br />- 20 cl de cr&egrave;me fra&icirc;cheliquide<br />- Quelques&eacute;clats de noix<br />- 10 cl d&rsquo;huileneutre (tournesol&hellip;)<br />- Sel<br />- Poivre du moulin</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>Coupezvotre train de bassec&ocirc;te en 6 tranches &eacute;paisses, &eacute;pluchezethachez les &eacute;chalotes.</p>\r\n<p>Dansunepo&ecirc;lefaitesbien chauffer l&rsquo;huile, saisissez-y le b&oelig;ufselonvotrego&ucirc;t (voirconseil de cuissonsur les infospratiques du www.lescolisduboucher.com), r&eacute;servez.</p>\r\n<p>Dans la m&ecirc;mepo&ecirc;lefaitessuer les &eacute;chaloteshach&eacute;es, ajoutez le porto et faitesr&eacute;duire 5 min, puisajoutez le fond de veau, le roquefort en morceaux et la cr&egrave;me, salez, poivrez et faitesr&eacute;duire 5 min jusqu&rsquo;&agrave;obtentiond&rsquo;une sauce onctueuse.</p>\r\n<p>Nappezvosmorceaux de viande de la sauce etajoutezquelques&eacute;clats de noix.</p>\r\n<p><strong>-Bavette de Flanchet Minceur</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://i.pinimg.com/originals/f8/03/a2/f803a25b97ee1e8985dab9006bdfdbe7.jpg\" alt=\"\" width=\"613\" height=\"459\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>- 6 bavettes de flanchet des Colis du Boucher<br />- 2 belles goussesd\'ail<br />- 6 &eacute;chalotes<br />- 2 citrons vert non trait&eacute;s<br />- Zeste de citron vert<br />- 3 cu. &agrave; soupe de sauce soja<br />- 2 pinc&eacute;es de pimentd\'Espelette<br />- 2 cu. &agrave; souped\'aneths&eacute;ch&eacute;<br />- 2 cu. &agrave; souped\'herbes de Provence<br />- Sel, poivre<br />- Huileneutre</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>Lavez les citrons vert, pressez-les en conservant le jus, pr&eacute;levezquelqueszestes.<br />Epluchezetcoupez les &eacute;chalotes en rondelles, pelez, d&eacute;germez et coupezl&rsquo;ail en lamelles.<br />Dansunsaladierdisposez les bavettes, ajoutezl&rsquo;ail, l&rsquo;&eacute;chalote, les zestes, le jus de citron, la suacesoja et le piment, les herbes, salez, poivrez.<br />Couvrezet laissez mariner au frais 1h.</p>\r\n<p><strong>-Boeuf Brais&eacute;</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://img.cuisineaz.com/660x660/2013-12-20/i32453-photo-de-boeuf-braise.jpeg\" alt=\"\" width=\"613\" height=\"459\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>- 1kg de B&oelig;ufBrais&eacute; des Colis du Boucher<br />- 75 cl de sauce tomate<br />- 4 poivrons rouge<br />- 2 oignons<br />- 1 carotte<br />- 1 bouquet garni<br />- 3 clous de girofle<br />- huiled\'olive<br />- sel<br />- pimentd\'Espelette</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>1- Faitescuire le B&oelig;ufBrais&eacute;dansune cocotte avec de l\'eaufroide, le bouquet garni, 1/2 oignon piqu&eacute; de 3 clous de girofle, la carotte coup&eacute; en morceaux. Attendezl\'&eacute;bullition pour &eacute;cumer, salezet laissez cuire 2 h1/2 (ou en cocotte-minute 1 h1/4).<br /><br />2- Laissez refroidir, d&eacute;graissez&eacute;ventuellement, couper la viande en morceauxetr&eacute;servez. Vouspourrez le lendemaind&eacute;graissez le bouillon, le filtrez pour faire un potage ; &agrave; &eacute;bullitionajouter du vermicelleou du tapioca selongo&ucirc;t.<br /><br />3- Faire griller les poivrons, les mettredans un sac plastique, fermerherm&eacute;tiquement, les laisser 15 mn, les sortir, peler, &eacute;p&eacute;piner, et couper en lani&egrave;res, r&eacute;servez-les.<br /><br />4- Epluchezl\'oignon, coupez en lamelles, faire revenirdansune cocotte avec unpeud\'huiled\'olive, laisserblondir, ajouter la sauce tomate, le pimentd&rsquo;Espeletteselongo&ucirc;t. Ajoutez les lani&egrave;res de poivronet la viande, faire mijoter 15 mn.</p>\r\n<ul>\r\n<li><strong>Veau</strong></li>\r\n</ul>\r\n<p><strong>-Blanquette de Veau &agrave; la Vanille</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cache.marieclaire.fr/data/photo/w1000_ci/cuisine/4u/blanquette-de-veau-a-la-vanille.jpg\" alt=\"\" width=\"464\" height=\"309\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>- 1 kg de blanquette de Veau des Colis du Boucher<br />- 1 blanc de poireau<br />- 2 carottes<br />- 400 gr d&rsquo;oignons nouveaux<br />- 200 gr de champignons de Paris<br />- 1 bouquet garni<br />- 15 cl de cr&egrave;me fra&icirc;che<br />- 40 gr de beurre<br />- 2 jaunesd&rsquo;&oelig;ufs<br />- 2 cu &agrave; soupe de farine<br />- &frac12; citron<br />- 1 gousse de vanille<br />- Sel, poivre</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>1.Nettoyez le blanc de poireaux et les oignons et pelez la carotte. Faitesrevenir la viande &agrave; feudoux sans coloration dansune cocotte avec 30 g de beurre<br /><br />2.Poudrez de farineetremuez 3 mn. Versez de l\'eau &agrave; hauteur etajoutez les oignons, la carotte et le blanc de poireauficel&eacute;s avec le bouquet garni, la vanillefendue, sel et poivre. Couvrezet laissez mijoter 1 h 30 &agrave; feudoux.<br /><br />3. &Eacute;mincez les champignons de Paris nettoy&eacute;set les faire sauterdans 10 g de beurre avec un filet de jus de citron.<br /><br />4. Unefoiscuite&eacute;gouttez la viandeet les l&eacute;gumes (retirez le bouquet garni avec le blanc de poireau et la carotte et gardez les oignons). Faitesr&eacute;duire le bouillon de cuisson de moiti&eacute;, remettez-y la viandeet les oignonsainsique les champignons, portez &agrave; &eacute;bullition.<br /><br />5. Ajoutez la cr&egrave;me fra&icirc;che battue avec les jaunesd\'&oelig;ufset un filet de jus de citron. Faites&eacute;paissir &agrave; feudoux sans bouillir pour que les jaunes ne coagulent pas. Servezaussit&ocirc;t !</p>\r\n<p><strong>-C&ocirc;tes de Veau aux Girolles</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://assets.afcdn.com/recipe/20170301/8525_w1024h768c1cx1391cy960.jpg\" alt=\"\" width=\"512\" height=\"384\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>-6 c&ocirc;tes de veau des Colis du Boucher<br />-600 g de girolles : 600 g<br />-80 g de beurre : 80 g<br />-3 c. &agrave; souped&rsquo;huileneutre<br />-25 cl de cr&egrave;me liquide<br />-Sel et Poivre</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>Nettoyezets&eacute;chezd&eacute;licatement les girolles.<br /><br />Dansunegrandepo&ecirc;lesurfeuvif, faitesfondre le beurre, saisissez-y les c&ocirc;tes des 2 cot&eacute;s, unefoisbiencolor&eacute;esbaissez le feu et faitescuire encore 10 min. Retirez, r&eacute;servez au chaud.<br /><br />Dans la m&ecirc;mepo&ecirc;le, surfeuvif, versezl&rsquo;huile, ajoutez les champignons et faites-les sauter 3 min. puisajoutez la cr&egrave;me, salez, poivrez et laissez cuiresurfeudoux en remuant pendant 2 min.</p>\r\n<p><strong>-Cordon Bleu</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://assets.afcdn.com/recipe/20130524/34311_w1024h576c1cx1237cy1000.webp\" alt=\"\" width=\"428\" height=\"241\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>- 4 escalopes de veau des Colis du Boucher<br />- 4 tranches de jambon<br />- 160 g de comt&eacute;<br />- 3 cu. &agrave; soupe de farine<br />- 1 &oelig;uf<br />- 50g de chapeluremaison (ou en boite)<br />- 20 gr de beurre<br />- 1 cu. &agrave; souped&rsquo;huileneutre<br />- Sel, poivre du moulin</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>&Ocirc;tez le gras du jambon, coupezchaque tranche en 2, coupezvotrecomt&eacute; en 4 tranches, &eacute;talezvosescalopes, salezetpoivrez-les.</p>\r\n<p><br />Battezvotre&oelig;uf, mettez le dansune petite assiette, pr&eacute;parez 2 autresassiettes, une avec la farine, l&rsquo;autre avec la chapelure.</p>\r\n<p><br />Disposezsur la moiti&eacute; de chaque escalope &frac12; tranche de jambon, le comt&eacute;puisl&rsquo;autre &frac12; tranche de jambon, refermezl&rsquo;escalope (sibesoin pour la faire tenirutilisezun pic ap&eacute;ritif).</p>\r\n<p><br />Trempezchaque escalope dans la farine, puisdansl&rsquo;&oelig;ufetenfindans la chapelure.</p>\r\n<p><br />Dansunegrandepo&ecirc;lefaitesfondre le beurre et l&rsquo;huile, d&eacute;posezvosescalopes, faites-les cuiresurfeumoyen 8 min d&rsquo;un cot&eacute;, puis 8 min de l&rsquo;autre.</p>\r\n<p><br />Avant de les servir, faites-les reposer 5 min hors du feudans la po&ecirc;lerecouverte.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Volailles </strong></li>\r\n</ul>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -Ailes de pouletcaram&eacute;lis&eacute;es</strong></p>\r\n<p><img src=\"https://chefcuisto.com/files/2017/03/ailes-poulet-general-tao.jpg\" alt=\"\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>-Ailes de poulet (750gr)</p>\r\n<p>-Huiled\'olive (2 c&agrave;s)</p>\r\n<p>-Sel, poivre&nbsp;</p>\r\n<p>-Sauce sojasucr&eacute;e (15cl)</p>\r\n<p>-Miel (20cl)</p>\r\n<p>-Ciboulettehach&eacute;</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>-Pr&eacute;chauffezvotre four &agrave; 180&deg;</p>\r\n<p>-Disposez les ailessurun plat de cuisson en uneseulecouche</p>\r\n<p>-M&eacute;langezl\'huile, la sauce soja, la ciboulettehach&eacute;eet le miel. Versezsur les ailes de poulet.</p>\r\n<p>-Cuiredans le four pr&eacute;chauff&eacute;.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>-Brochette blanc de pouletananas curry coco</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://cac.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fcac.2F2019.2F05.2F29.2F4876ffb8-57c2-4f4a-a0b9-2e8730fb2a48.2Ejpeg/748x372/quality/80/crop-from/center/brochette-poulet-ananas.jpeg\" alt=\"\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>2 c &agrave; s de curry, 4 c &agrave; s de lait de coco, 1 ananas, 6 blancs de poulet des colis du boucher</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>1- Eplucherl\'ananaset le couper en d&eacute;s.</p>\r\n<p>2- Emincer le pouletpuismettredansunsaladier avec le curry et le lait de coco</p>\r\n<p>3- M&eacute;langerpuislaisser mariner au moinsuneheure au frais</p>\r\n<p>4- Monter les brochettes et les mettresurvotre barbecue, C\'EST PRET!!!</p>\r\n<p><strong>-Chaponfarci</strong></p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://img.cuisineaz.com/660x660/2015-12-01/i89904-chapon-farci.jpg\" alt=\"\" /></p>\r\n<ul>\r\n<li>Les ingr&eacute;dients</li>\r\n</ul>\r\n<p>- 1 chapon (environ 3 kg)<br /><br />- Pour la farce :<br />- 400 g de viande hach&eacute;e<br />- 100 g de foies de volaille<br />- 2 oeufs<br />- 2 yaourts nature<br />- 80 g d&rsquo;&eacute;chalotes<br />- 100 g d&rsquo;oignons<br />- 2 gousses d&rsquo;ail<br />- persil<br />- sel poivre</p>\r\n<ul>\r\n<li>La recette</li>\r\n</ul>\r\n<p>Epluchez et &eacute;mincez les oignons, l&rsquo;ail et les &eacute;chalotes. Faites-les revenir quelques min dans une po&ecirc;le, puis mixez-les.<br />Nettoyer puis coupez en petits morceaux les foies de volaille et faites-les cuire l&eacute;g&egrave;rement &agrave; la po&ecirc;le. (Ils doivent rester ros&eacute;s)<br />Dans un saladier, disposez la viande hach&eacute;e, ajoutez-y les 2 yaourts et les &oelig;ufs battus. M&eacute;langez. Incorporez ensuite les foies de volaille l&eacute;g&egrave;rement cuits et le m&eacute;lange d&rsquo;ail, oignons, &eacute;chalotes. M&eacute;langez le tout puis ajoutez quelques feuilles de persil nettoy&eacute;es.<br />Pr&eacute;chauffez le four th. 2-3 (160&deg;).<br />Salez et poivrez l&rsquo;int&eacute;rieur du chapon puis farcissez-le et cousez l\'ouverture.<br />Disposez-le dans un grand plat et mettez &agrave; cuire environ 3 heures (environ 30 min de cuisson pour 500 g de chapon) en surveillant et en arrosant de jus r&eacute;guli&egrave;rement (environ toutes les demi-heures).<br />Servez.</p>\r\n<p>&nbsp;</p>', 'NOS RECETTES ', NULL, NULL, NULL, '', 'NOS RECETTES ', 1);
INSERT INTO `av_pages` (`page_id`, `page_title`, `page_meta_description`, `page_meta_title`, `page_description`, `page_meta_keywords`, `page_url`, `data_created`, `data_updated`, `page_image`, `page_name`, `page_data_status`) VALUES
(15, 'Mouton a offrir à une association', 'Mouton a offrir à une association', 'Mouton a offrir à une association', '<h5>Go-Ferme halal met un point d\'honneur &agrave; travailler main dans la main avec les associations partenaires.&nbsp;</h5>\r\n<p>N&rsquo;oubliez pas que vos dons apportent certainement non seulement du r&eacute;confort, mais aussi des moments chaleureux &agrave; des milliers de personnes ! N&rsquo;h&eacute;sitez plus : Nos associations comptent sur vos don !&nbsp;</p>', 'Mouton a offrir à une association', NULL, NULL, NULL, 'file_133586a7156583154b5a5722fbcba388.png', 'Mouton a offrir à une association', 1),
(16, 'Mouton à consommer', 'Mouton à consommer', 'Mouton à consommer', '<h3>Envie de produit de qualit&eacute;, aux saveurs authentiques ?&nbsp;</h3>\r\n<p>&nbsp;</p>\r\n<h5><span style=\"font-weight: 400;\">Go Ferme Halal vous propose un agneau entier de qualit&eacute;, &eacute;lev&eacute; en plein air, sous la m&egrave;re, au c&oelig;ur de la nature, avec une alimentation saine et naturelle...</span></h5>\r\n<p>&nbsp;</p>\r\n<p>Nous vous assurons une livraison rapide dans les meilleures conditions, mais &eacute;galement un d&eacute;coupage qui respecte les normes exigeantes.Vous pouvez choisir l\'otpion de d&eacute;coupage selon vos envies.</p>\r\n<p>&nbsp;</p>\r\n<p>Vous avez aussi la possibilit&eacute; d\'offrir une partie en Sadaka, vous apporterez bien plus qu&rsquo;une aide alimentaire.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>D&eacute;tails du produit</strong><span style=\"font-weight: 400;\">&nbsp;:&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Agneau entier de race fran&ccedil;aise,&nbsp; non d&eacute;coup&eacute;, sans fressure et sans t&ecirc;te</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Livraison</strong><span style=\"font-weight: 400;\"> : </span></p>\r\n<p><span style=\"font-weight: 400;\">L\'agneau vous est livr&eacute; coup&eacute; en sac plastique mis sous-vide accompagn&eacute;s ou pas du Foie, rognons et c&oelig;ur selon votre choix&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; **Le poids du colis peut varier selon l\'animal - cf. conditions g&eacute;n&eacute;rales de vente**</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : </span><a href=\"../../../../products/show/165\">Cervelle d\'agneau</a><span style=\"font-weight: 400;\">, </span><a href=\"../../../../products/show/156\">Foie d\'agneau</a><span style=\"font-weight: 400;\">, </span><a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau<span style=\"font-weight: 400;\">&hellip;&nbsp;!</span></a></strong></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">Si vous avez besoin d&rsquo;informations compl&eacute;mentaires sur les articles propos&eacute;s par Go Ferme Halal, merci de nous </span><strong>contacter</strong><span style=\"font-weight: 400;\">.</span></p>', 'Mouton à consommer', NULL, NULL, NULL, 'file_1b271c93baa582808d1648402e1ef7f3.png', 'Mouton à consommer ', 1),
(17, 'Politique de confidentialité', 'Politique de confidentialité', 'Politique de confidentialité', '<h1 style=\"text-align: center;\"><strong>POLITIQUE DE CONFIDENTIALITE </strong></h1>\r\n<p>&nbsp;</p>\r\n<p>Dans le cadre de l&rsquo;utilisation du site internet (ci-apr&egrave;s&nbsp;le &laquo;&nbsp;<strong>Site</strong>&nbsp;&raquo;) ou de nos services de mise en relation (ci-apr&egrave;s les &laquo;&nbsp;<strong>Services</strong> &raquo;), GO-Laferme peut &ecirc;tre amen&eacute;&agrave; traiter des donn&eacute;es &agrave; caract&egrave;re personnel vous concernant.</p>\r\n<p>&nbsp;</p>\r\n<p>La pr&eacute;sente politique de confidentialit&eacute; a pour objet de vous informer des modalit&eacute;s du traitement de vos donn&eacute;es &agrave; caract&egrave;re personnel mis en &oelig;uvre par GO-Laferme en tant que responsable du traitement et des droits dont vous disposez en application de de la loi n&deg;78-17 du 6 janvier 1978 relative &agrave; l&rsquo;informatique, aux fichiers et aux libert&eacute;s (dite &laquo; <strong>Loi informatique et libert&eacute;s&nbsp;</strong>&raquo;) et en application du R&egrave;glement UE 2016/679 relatif &agrave; la protection des donn&eacute;es personnelles (&laquo;&nbsp;<strong>RGPD</strong>&nbsp;&raquo;).</p>\r\n<p>&nbsp;</p>\r\n<p>Pour les besoins de la pr&eacute;sente politique, les termes&nbsp;&laquo;&nbsp;<strong>vous</strong>&nbsp;&raquo;, &laquo;&nbsp;<strong>votre</strong>&nbsp;&raquo;, <strong>vos</strong> &raquo; d&eacute;signent les visiteursdu Site et/ou utilisateurs de nos Services, tandis que les termes &laquo; GO-Laferme &raquo;, &laquo; <strong>nous</strong>&nbsp;&raquo;, &laquo;&nbsp;<strong>notre</strong>&nbsp;&raquo;, &laquo;&nbsp;<strong>nos</strong> &raquo; d&eacute;signent GO-Laferme. Les termes &laquo;&nbsp;<strong>donn&eacute;es &agrave; caract&egrave;re personnel</strong>&nbsp;&raquo;, &laquo;&nbsp;<strong>traitement</strong>&nbsp;&raquo;, <strong>&laquo;&nbsp;responsable du traitement&nbsp;</strong>&raquo; ont la signification pr&eacute;vue &agrave; l&rsquo;article 4 du RGPD.</p>\r\n<p>&nbsp;</p>\r\n<h1>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quelles sont les donn&eacute;es &agrave; caract&egrave;re personnel vous concernant que nous traitons&nbsp;?</h1>\r\n<p>&nbsp;</p>\r\n<p>Lorsque vous visitez notre Site, vous n&rsquo;avez aucune obligation de nous communiquer des donn&eacute;es &agrave; caract&egrave;re personnel vous concernant. Notre Site et ses diff&eacute;rentes rubriques sont librement accessibles, sans besoin de cr&eacute;er un compte utilisateur. Des cookies peuvent n&eacute;anmoins &ecirc;tre d&eacute;pos&eacute;s sur votre terminal dans les conditions expos&eacute;es &agrave; l&rsquo;article 8(Cookies).</p>\r\n<p>&nbsp;</p>\r\n<p>Si vous remplissez notre formulaire de contact accessible sur notre Site ou si vous nous contactez spontan&eacute;ment, vous serez amen&eacute; &agrave; nousfournir les informations suivantesvous concernant&nbsp;:</p>\r\n<ul>\r\n<li>Vos nom et pr&eacute;nom&nbsp;;</li>\r\n<li>Vos coordonn&eacute;es(adresse mail&nbsp;et t&eacute;l&eacute;phone portable)&nbsp;;</li>\r\n<li>Des informations relatives &agrave; votre parcours scolaire / professionnel (telles que les informations figurant sur votre CV&nbsp;: ann&eacute;e d&rsquo;obtention du baccalaur&eacute;at, mentions, dipl&ocirc;mes&hellip;)&nbsp;;</li>\r\n<li>Des informations relatives &agrave; votre recherche d&rsquo;&eacute;tablissement&nbsp;(telles que secteur g&eacute;ographique ou le type de cursus recherch&eacute;).</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Si vous effectuez un paiement via sur notre Site (par exemple, pour l&rsquo;achat d&rsquo;une offre de formation), nous vous demanderons de fournir les cat&eacute;gories de donn&eacute;es &agrave; caract&egrave;re personnel suivantes&nbsp;:</p>\r\n<ul>\r\n<li>Donn&eacute;es bancaires (Num&eacute;ro de carte, type de carte, date d&rsquo;expiration, cryptogramme).</li>\r\n<li>Coordonn&eacute;es&nbsp;(telle que votre adresse mail afin de confirmer la commande)&nbsp;;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Nous veillons &agrave; ne collecter que les donn&eacute;es personnelles strictement n&eacute;cessaires &agrave; la mise en &oelig;uvre de nos Services.</p>\r\n<p>&nbsp;</p>\r\n<h1>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pour quelles finalit&eacute;s traitons nous vos donn&eacute;es &agrave; caract&egrave;re personnel&nbsp;?</h1>\r\n<p>&nbsp;</p>\r\n<p>Nous traitons vos donn&eacute;es &agrave; caract&egrave;re personnel pour les finalit&eacute;s suivantes&nbsp;:</p>\r\n<ul>\r\n<li>Assurer la mise en relation entre vous et un &eacute;tablissement d&rsquo;enseignement sup&eacute;rieur priv&eacute; (ci-apr&egrave;s &laquo;&nbsp;<strong>Etablissement(s)</strong>&raquo;), et ce uniquement lorsque vous en avez faitesla demande expresse&nbsp;;</li>\r\n<li>G&eacute;rer la passation de commande sur notre Site (souscription &agrave; des formations payantes par exemple)&nbsp;;</li>\r\n<li>Assurer le suivi de la relation client (suivi de la satisfaction, newsletter&hellip;).</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h1>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quels sont les destinataires de vos donn&eacute;es&nbsp;/ Qui a acc&egrave;s &agrave; vos donn&eacute;es &agrave; caract&egrave;re personnel&nbsp;?</h1>\r\n<p>&nbsp;</p>\r\n<p>Au sein de GO-Laferme , seule la personne habilit&eacute;e en charge des relations commerciales a acc&egrave;s &agrave; vos donn&eacute;es &agrave; caract&egrave;re personnel.</p>\r\n<p>&nbsp;</p>\r\n<p>Lors d&rsquo;un achat en ligne effectu&eacute; sur notre Site, vos donn&eacute;es bancaires sont trait&eacute;es par notre prestataire de paiement s&eacute;curis&eacute;.</p>\r\n<p>&nbsp;</p>\r\n<p>Notre prestataire de support et de maintenance du Site peut &eacute;galement &ecirc;tre amen&eacute; le cas &eacute;ch&eacute;ant &agrave; traiter vos donn&eacute;es &agrave; caract&egrave;re personnel. Nous veillons cependant &agrave; ce qu&rsquo;il n&rsquo;ait acc&egrave;s qu&rsquo;aux seules donn&eacute;es strictement n&eacute;cessaires &agrave; l&rsquo;exercice de sa mission de support et de maintenance.</p>\r\n<p>&nbsp;</p>\r\n<p>Dans le cadre de notre activit&eacute; commerciale et de l&rsquo;entretien de notre Site, nous pouvons &eacute;galement contracter avec sous-traitants fiables qui peuvent h&eacute;berger vos donn&eacute;es &agrave; caract&egrave;re personnel pour notre compte, selon nos instructions. Nous veillons &agrave; ce que ces prestataires pr&eacute;sentent les garanties contractuelles appropri&eacute;es concernant la s&eacute;curit&eacute; et la confidentialit&eacute; des donn&eacute;es auxquelles ils ont acc&egrave;s.</p>\r\n<p>&nbsp;</p>\r\n<h1>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sur quelle base l&eacute;gales vos donn&eacute;es sont-elles trait&eacute;es&nbsp;?</h1>\r\n<p>&nbsp;</p>\r\n<p>Les traitements de donn&eacute;es &agrave; caract&egrave;re personnel que nous effectuons reposent sur votre consentement libre et expr&egrave;s pour une ou plusieurs finalit&eacute;s sp&eacute;cifiques (A titre d&rsquo;exemple, la transmission de vos donn&eacute;es personnelles &agrave; un &Eacute;tablissement repose sur votre consentement expr&egrave;s). Le suivi de la relation clients repose quant &agrave; lui sur l&rsquo;int&eacute;r&ecirc;t l&eacute;gitime de GO-Laferme.</p>\r\n<p>&nbsp;</p>\r\n<h1>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Combien de temps conservons-nous vos donn&eacute;es&nbsp;?</h1>\r\n<p>Nous veillons &agrave; ne conserver vos donn&eacute;es que pour la dur&eacute;e n&eacute;cessaire &agrave; la finalit&eacute; pour laquelle elles ont &eacute;t&eacute; collect&eacute;es, &agrave; savoir&nbsp;:</p>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td width=\"179\">\r\n<p><strong>Cat&eacute;gories de donn&eacute;es </strong></p>\r\n</td>\r\n<td width=\"387\">\r\n<p><strong>Dur&eacute;e de conservation</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"179\">\r\n<p>Donn&eacute;es collect&eacute;es dans le cadre de nos services d&rsquo;interm&eacute;diation</p>\r\n</td>\r\n<td width=\"387\">\r\n<p>3 ans &agrave; compter du dernier contact avec GO-Laferme.&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"179\">\r\n<p>Donn&eacute;es bancaires</p>\r\n</td>\r\n<td width=\"387\">\r\n<p>En cas d&rsquo;achat ponctuel/unique&nbsp;: Jusqu&rsquo;&agrave; la r&eacute;ception du bien ou l&rsquo;ex&eacute;cution de la prestation de service augment&eacute; du d&eacute;lai de r&eacute;tractation pr&eacute;vu par le Code de la consommation.</p>\r\n<p>Si vous consentez &agrave; la conservation de vos donn&eacute;es bancaires pour faciliter des achats ult&eacute;rieurs&nbsp;: Jusqu&rsquo;au retrait du consentement et/ou &agrave; l&rsquo;expiration de la validation des donn&eacute;es de la carte bancaire.</p>\r\n<p>En cas d&rsquo;abonnement&nbsp;: Jusqu&rsquo;&agrave; la derni&egrave;re &eacute;ch&eacute;ance de paiement si l&rsquo;abonnement ne pr&eacute;voit pas de tacite reconduction.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h1>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vos donn&eacute;es font elles l&rsquo;objet d&rsquo;un transfert hors UE ou EEE&nbsp;?</h1>\r\n<p>Vos donn&eacute;es sont h&eacute;berg&eacute;es en France, chez OVHcloud.</p>\r\n<p>&nbsp;</p>\r\n<p>Dans l&rsquo;hypoth&egrave;se o&ugrave; nous aurions recours &agrave; un prestataire situ&eacute; hors de l&rsquo;Union Europ&eacute;enne ou de l&rsquo;Espace &eacute;conomique europ&eacute;en, nous veillerons &agrave; encadrer ce transfert &agrave; l&rsquo;aide de garantie appropri&eacute;es, conform&eacute;ment aux dispositions l&eacute;gales et r&egrave;glementaires applicables.</p>\r\n<p>&nbsp;</p>\r\n<h1>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; De quels droits disposez-vous sur vos donn&eacute;es&nbsp;?</h1>\r\n<p>Sous r&eacute;serve des conditions pr&eacute;vues par la Loi informatique et libert&eacute;s et par le RGPD, vous disposez des droits suivants sur vos donn&eacute;es personnelles&nbsp;:</p>\r\n<ul>\r\n<li><strong>le droit d&rsquo;acc&egrave;s</strong>, entendu comme le droit de d\'obtenir la confirmation que des donn&eacute;es &agrave; caract&egrave;re personnel vous concernant sont trait&eacute;es ainsi que l\'acc&egrave;s auxdites donn&eacute;es et aux modalit&eacute;s du traitement&nbsp;;</li>\r\n<li><strong>le droit de rectification</strong>, entendu comme le droit de faire rectifier toute donn&eacute;e &agrave; caract&egrave;re personnel vous concernant qui serait inexacte ou de compl&eacute;ter toute donn&eacute;e qui serait incompl&egrave;te&nbsp;;</li>\r\n<li><strong>le droit d&rsquo;effacement </strong>entendu comme le droit d&rsquo;obtenir l&rsquo;effacement de vos donn&eacute;es &agrave; caract&egrave;re personnel dans les meilleurs d&eacute;lais, dans les conditions pr&eacute;vues &agrave; l&rsquo;article 17 du RGPD&nbsp;;</li>\r\n<li><strong>le droit &agrave; la limitation du traitement </strong>dans les conditions pr&eacute;vues &agrave; l&rsquo;article 18 du RGPD&nbsp;;</li>\r\n<li><strong>le droit &agrave; la portabilit&eacute; de vos donn&eacute;es </strong>entendu comme le droit de transmettre ou faire transmettre vos donn&eacute;es personnelles &agrave; un autre responsable du traitement&nbsp;;</li>\r\n<li><strong>le droit d&rsquo;opposition </strong>entendu comme le droit de vous opposer &agrave; tout moment au traitement de vos donn&eacute;es &agrave; caract&egrave;re personnel &agrave; des fins de prospection.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Vous pouvez exercer vos droits en adressant vos demandes&nbsp;par courriel &agrave; l&rsquo;adresse&nbsp; <a href=\"mailto:contact@abe-business.com\">contact@abe-business.com</a>.</p>\r\n<p>&nbsp;</p>\r\n<p>En cas de doute sur votre identit&eacute;, nous nous r&eacute;servons la possibilit&eacute; de vous demander la copie recto-verso d&rsquo;une pi&egrave;ce d&rsquo;identit&eacute;.</p>\r\n<p>&nbsp;</p>\r\n<p>Nous nous engageons &agrave; r&eacute;pondre &agrave; toute demande d&rsquo;exercice de droit dans un d&eacute;lai d&rsquo;un mois &agrave; compter de sa r&eacute;ception, ce d&eacute;lai pouvant &ecirc;tre prolong&eacute; de deux mois compte tenu de la complexit&eacute; et du nombre de demandes.</p>\r\n<p>&nbsp;</p>\r\n<p>En cas de diff&eacute;rend concernant le traitement de vos donn&eacute;es mis en &oelig;uvre par GO-Laferme, vous disposez du droit d&rsquo;introduire une r&eacute;clamation aupr&egrave;s de la Cnil (3 Place de Fontenoy, 75007 Paris). En pareille situation, nous vous invitons toutefois &agrave; nous contacter au pr&eacute;alable afin de trouver une issue amiable au diff&eacute;rend.</p>\r\n<p>&nbsp;</p>\r\n<h1>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cookies</h1>\r\n<p>Les cookies sont des fichiers textes, souvent crypt&eacute;s, stock&eacute;s dans votre navigateur.</p>\r\n<p>&nbsp;</p>\r\n<p>Notre Site utilise les types de cookies suivants&nbsp;:</p>\r\n<ul>\r\n<li>A compl&eacute;ter selon type de cookies utilis&eacute;s (mesure d&rsquo;audience, publicit&eacute; cibl&eacute;e&hellip;).</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Ces cookies recueillent les donn&eacute;es &agrave; caract&egrave;re personnel suivantes&nbsp;:</p>\r\n<ul>\r\n<li>A compl&eacute;ter selon type de cookies utilis&eacute;s (adresse IP, lieu de connexion&hellip;)</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Lorsque vous visitez ou utilisez notre Site pour la premi&egrave;re fois, un bandeau apparait en bas de page vous informant de l&rsquo;utilisation de cookies. Lorsque des cookies n&eacute;cessitant votre consentement sont utilis&eacute;s, nous vous invitons &agrave; indiquer express&eacute;ment votre choix en cliquant sur l&rsquo;un des boutons &laquo;&nbsp;J&rsquo;accepte&nbsp;&raquo; ou &laquo;&nbsp;Je refuse&nbsp;&raquo;. Ces cookies ne seront d&eacute;pos&eacute;s sur votre terminal que si vous y consentez. (A adapter selon cookies utilis&eacute;s)</p>\r\n<p>&nbsp;</p>\r\n<p>Les donn&eacute;es collect&eacute;es &agrave; l&rsquo;aide des cookies de mesure d&rsquo;audience sont conserv&eacute;es pendant une dur&eacute;e de 25 mois maximum.</p>\r\n<p>&nbsp;</p>\r\n<p>Les cookies n&eacute;cessitant votre consentement ont une dur&eacute;e de vie de 13 mois apr&egrave;s leur premier d&eacute;p&ocirc;t dans votre &eacute;quipement terminalsauf suppression &agrave; partir des param&egrave;tres de votre navigateur.</p>\r\n<p>&nbsp;</p>\r\n<p>Il est possible de s&rsquo;opposer au d&eacute;p&ocirc;t de cookies en configurant votre navigateur de la mani&egrave;re suivante&nbsp;:</p>\r\n<p>&nbsp;</p>\r\n<p><em>Pour Chrome </em></p>\r\n<ol>\r\n<li>Choisissez le menu &laquo;&nbsp;Pr&eacute;f&eacute;rences&nbsp;&raquo; puis &laquo;&nbsp;Confidentialit&eacute; et s&eacute;curit&eacute;&nbsp;&raquo;, puis &laquo;&nbsp;Param&egrave;tres du site&nbsp;&raquo;&nbsp;;</li>\r\n<li>Choisissez l&rsquo;ic&ocirc;ne &laquo;&nbsp;Cookies et donn&eacute;es de sites&nbsp;&raquo;&nbsp;;</li>\r\n<li>S&eacute;lectionnez les options qui vous conviennent.</li>\r\n</ol>\r\n<p><em>&nbsp;</em></p>\r\n<p><em>Pour Mozilla Firefox</em></p>\r\n<ol>\r\n<li>Choisissez le menu &laquo;&nbsp;Outil&nbsp;&raquo; puis &laquo;&nbsp;Options&nbsp;&raquo;&nbsp;;</li>\r\n<li>Cliquez sur l&rsquo;ic&ocirc;ne &laquo;&nbsp;Vie priv&eacute;e&nbsp;&raquo;&nbsp;;</li>\r\n<li>Rep&eacute;rez le menu &laquo;&nbsp;Cookie&nbsp;&raquo; et s&eacute;lectionnez les options qui vous conviennent.</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p><em>Pour Safari (v.13.0.2)</em></p>\r\n<ol>\r\n<li>Choisissez l&rsquo;onglet &laquo;&nbsp;Safari&nbsp;&raquo;, puis &laquo;&nbsp;pr&eacute;f&eacute;rences&nbsp;&raquo;&nbsp;;</li>\r\n<li>Cliquez sur &laquo;&nbsp;Confidentialit&eacute;&nbsp;&raquo;&nbsp;;</li>\r\n<li>Choisissez l&rsquo;option souhait&eacute;e&nbsp;(&laquo;&nbsp;Emp&ecirc;cher le suivi sur plusieurs domaines&nbsp;&raquo; ou &laquo;&nbsp;G&eacute;rer les donn&eacute;es du site web&hellip;&nbsp;&raquo;).</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<h1>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mise &agrave; jour de la pr&eacute;sente politique de confidentialit&eacute;</h1>\r\n<p>La pr&eacute;sente politique de confidentialit&eacute; est susceptible d&rsquo;&ecirc;tre modifi&eacute;e ou am&eacute;nag&eacute;e &agrave; tout moment. Toute modification de la pr&eacute;sente politique pourra vous &ecirc;tre notifi&eacute;e par email (si nous disposons de votre email) ou &agrave; l&rsquo;aide d&rsquo;un pop-up lors de votre prochaine visite sur le Site.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><em>Derni&egrave;re mise &agrave; jour&nbsp;: le 01 f&eacute;vrier 2021</em></p>\r\n<p>&nbsp;</p>', 'Politique de confidentialité', NULL, NULL, NULL, '', 'Politique de confidentialité', 1),
(18, 'Un couffin.. à chaque événement !', 'Un couffin.. à chaque événement !', 'Un couffin.. à chaque événement !', '<p>Optez pour une id&eacute;e originale&nbsp; avec El Goffa ! Passez d&egrave;s maintenant votre commande et b&eacute;n&eacute;ficiez d\'une livraison rapide et dans les meilleures conditions !</p>', 'Un couffin.. à chaque événement ! ', NULL, '2021-08-23 12:26:15', '2021-08-23 12:26:15', '', 'Un couffin.. à chaque événement !', 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_parteners`
--

CREATE TABLE `av_parteners` (
  `partener_id` int(11) NOT NULL,
  `partener_lastname` varchar(255) NOT NULL,
  `partener_adress` varchar(255) NOT NULL,
  `partener_email` varchar(255) NOT NULL,
  `partener_city` varchar(255) NOT NULL,
  `partener_zip` varchar(255) NOT NULL,
  `partener_created` datetime NOT NULL,
  `partener_status` int(1) NOT NULL DEFAULT 0,
  `partener_phone` varchar(255) NOT NULL,
  `partener_updated` datetime DEFAULT NULL,
  `partener_type` int(1) NOT NULL DEFAULT 1,
  `partener_siret` varchar(255) DEFAULT NULL,
  `partener_repensable` varchar(255) DEFAULT NULL,
  `partener_phone_portable` varchar(255) DEFAULT NULL,
  `partener_password` varchar(255) DEFAULT NULL,
  `certificat_id` int(11) DEFAULT NULL,
  `partener_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_parteners`
--

INSERT INTO `av_parteners` (`partener_id`, `partener_lastname`, `partener_adress`, `partener_email`, `partener_city`, `partener_zip`, `partener_created`, `partener_status`, `partener_phone`, `partener_updated`, `partener_type`, `partener_siret`, `partener_repensable`, `partener_phone_portable`, `partener_password`, `certificat_id`, `partener_user`) VALUES
(9, 'Ma-Bouche-Rit ', '4 Square Stephenson ', 'boucherie@gmail.com', 'Noisy-le-Sec', '93130', '2021-04-14 22:01:32', 1, '+33148408766', '2021-09-15 08:50:54', 1, '0', 'Lotfi', '+33640333554', '123456789@', 6, 'MaBoucheRit'),
(10, 'Boucherie Marseille', '', 'chokri.saidi@go-makkah.com', 'Marseille', '31000', '2021-04-21 04:29:00', 1, '0611583818', '2021-09-15 08:54:13', 1, '', 'Moahmed Ali', '', '987654321@ ', 5, 'BoucherieMarseille '),
(11, 'Gratuit', '', 'chokri_free@gmail.com', '', '', '2021-06-10 07:12:22', 0, '', '2021-09-01 15:53:43', 1, '', 'Chokri', '', '123', 6, ''),
(15, 'Démo Boucherie Platinum', '3 Rue Lech Walesa', 'siwarmensi6@gmail.com', 'Le Kremlin-Bicetre', '94 270', '2021-09-16 11:10:55', 1, '0101010101', '2021-09-16 11:11:34', 1, '', 'AbdelKader', '', '75321', 5, 'Démo');

-- --------------------------------------------------------

--
-- Structure de la table `av_payments_parteners`
--

CREATE TABLE `av_payments_parteners` (
  `payment_partener_id` int(11) NOT NULL,
  `partener_id` int(11) DEFAULT 0,
  `payment_date` datetime NOT NULL,
  `payment_preuve` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `payment_data_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_payments_parteners`
--

INSERT INTO `av_payments_parteners` (`payment_partener_id`, `partener_id`, `payment_date`, `payment_preuve`, `payment_amount`, `payment_data_created`) VALUES
(1, 10, '2021-08-05 16:10:00', 'file_18d78d3a1c3268019e383f5db9613176.PNG', '119.80', '2021-08-05 14:13:31'),
(2, 10, '2021-08-05 18:20:00', 'file_9fea2706fac47a6a1b4d43dcc1fece58.PNG', '', '2021-08-05 14:20:03'),
(3, 10, '2021-08-05 15:22:00', 'file_5d99843633445f3214c1abc8ddf7c368.PNG', '70.8', '2021-08-05 14:25:50'),
(4, 9, '2021-09-09 10:23:00', 'file_6945a2375c2378ce244fab20bca624e0.pdf', '96.84', '2021-09-09 09:27:03');

-- --------------------------------------------------------

--
-- Structure de la table `av_payments_parteners_details`
--

CREATE TABLE `av_payments_parteners_details` (
  `payment_partener_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT 0,
  `payment_partener_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_payments_parteners_details`
--

INSERT INTO `av_payments_parteners_details` (`payment_partener_detail_id`, `order_id`, `payment_partener_id`) VALUES
(1, 67, 1),
(2, 69, 2),
(3, 66, 3),
(4, 80, 4);

-- --------------------------------------------------------

--
-- Structure de la table `av_payment_systems`
--

CREATE TABLE `av_payment_systems` (
  `payment_system_id` int(11) NOT NULL,
  `payment_system_wording` varchar(100) NOT NULL,
  `payment_system_overview` text NOT NULL,
  `payment_system_logo` varchar(100) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_updated` datetime NOT NULL,
  `data_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_payment_systems`
--

INSERT INTO `av_payment_systems` (`payment_system_id`, `payment_system_wording`, `payment_system_overview`, `payment_system_logo`, `data_created`, `data_updated`, `data_status`) VALUES
(1, 'Paypal', '<p>Paypal</p>\n', 'paypal_logo_o.png', '2013-11-12 10:24:24', '2013-11-12 10:24:24', 1),
(2, 'Atos', '<p>Atos</p>\n', 'Atos_logo_o.png', '2013-11-12 10:24:44', '2013-11-12 10:24:44', 1),
(3, 'Ogone', '<p>Ogone</p>\n', 'ogone_logo_o.png', '2013-11-12 10:25:10', '2013-11-12 10:25:10', 1),
(4, 'Paybox', '<p>Paybox</p>\n', 'paybox_logo_o.png', '2013-11-12 10:25:34', '2013-11-12 10:25:34', 1),
(5, 'Paymill', '<p>Paymill</p>\n', 'paymill_logo_o.png', '2013-11-12 10:25:53', '2013-11-12 10:25:53', 1),
(6, 'Buyster', '<p>Buyster</p>\n', 'Buyster_logo_o.png', '2013-11-12 10:26:20', '2013-11-12 10:26:20', 1),
(7, 'Google Wallet', '<p>Google Wallet</p>\n', 'google_wallet_logo_o.png', '2013-11-12 10:26:44', '2013-11-12 10:26:44', 1),
(8, 'Amazon', '<p>Amazon</p>\n', 'Amazon_logo_o.png', '2013-11-12 10:27:00', '2013-11-12 10:27:00', 1),
(9, 'Hipay', '<p>Hipay</p>\n', 'Hipay_logo_o.png', '2013-11-12 10:27:23', '2013-11-12 10:27:23', 1),
(10, 'Mypay', '<p>Mypay</p>\n', 'mypay_logo_o.png', '2013-11-12 10:27:47', '2013-11-12 10:27:47', 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_products`
--

CREATE TABLE `av_products` (
  `product_id` int(11) NOT NULL,
  `new_id` int(11) DEFAULT NULL,
  `product_ref` varchar(255) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_total_price` float DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_price_dicount` float DEFAULT NULL,
  `product_poids` varchar(255) DEFAULT '0',
  `product_text` text DEFAULT NULL,
  `product_short_text` text DEFAULT NULL,
  `product_picture` varchar(255) DEFAULT NULL,
  `product_data_created` datetime DEFAULT NULL,
  `product_data_updated` datetime DEFAULT NULL,
  `product_data_status` int(11) DEFAULT 0,
  `files` varchar(255) DEFAULT NULL,
  `product_meta_description` varchar(255) DEFAULT NULL,
  `product_meta_title` varchar(255) DEFAULT NULL,
  `product_meta_keywords` varchar(255) DEFAULT NULL,
  `sub_categorie_id` int(11) DEFAULT NULL,
  `show_poids` int(1) DEFAULT 0,
  `product_stock` int(11) DEFAULT 1,
  `product_price_selling` float DEFAULT 0,
  `product_price_marge_percente` float DEFAULT 0,
  `product_price_marge_percente_dicount` float DEFAULT 0,
  `product_entier` int(1) NOT NULL DEFAULT 0,
  `product_best_seller` int(1) DEFAULT 1,
  `product_is_promo` int(1) DEFAULT 1,
  `product_entier_association` int(1) DEFAULT 0,
  `product_affected_partener` int(11) DEFAULT NULL,
  `product_bio` int(1) DEFAULT NULL,
  `product_label_rouge` int(1) DEFAULT NULL,
  `product_origin` int(1) DEFAULT NULL,
  `product_promo` int(1) DEFAULT NULL,
  `product_is_composer` int(11) DEFAULT 1,
  `product_show_home` int(1) DEFAULT 0,
  `product_info` varchar(255) DEFAULT NULL,
  `product_short_description` text DEFAULT NULL,
  `show_option` int(1) DEFAULT 0,
  `categorie_couffin_id` int(11) DEFAULT NULL,
  `certificat_id` int(11) DEFAULT NULL,
  `product_poitou_charentes` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_products`
--

INSERT INTO `av_products` (`product_id`, `new_id`, `product_ref`, `categorie_id`, `product_name`, `product_total_price`, `product_price`, `product_price_dicount`, `product_poids`, `product_text`, `product_short_text`, `product_picture`, `product_data_created`, `product_data_updated`, `product_data_status`, `files`, `product_meta_description`, `product_meta_title`, `product_meta_keywords`, `sub_categorie_id`, `show_poids`, `product_stock`, `product_price_selling`, `product_price_marge_percente`, `product_price_marge_percente_dicount`, `product_entier`, `product_best_seller`, `product_is_promo`, `product_entier_association`, `product_affected_partener`, `product_bio`, `product_label_rouge`, `product_origin`, `product_promo`, `product_is_composer`, `product_show_home`, `product_info`, `product_short_description`, `show_option`, `categorie_couffin_id`, `certificat_id`, `product_poitou_charentes`) VALUES
(1, 0, '1', 5, 'Pavé de Veau ', 0, 17.9, 17.9, '0.300', NULL, '<p>le pav&eacute; est un grand classique de la boucherie fran&ccedil;aise. Sa coupe &eacute;paisse en fait une pi&egrave;ce fondante &agrave; c&oelig;ur appr&eacute;ci&eacute;e de tous.</p>', NULL, '2021-04-20 16:51:02', '2021-09-14 12:58:29', 0, NULL, 'le pavé est un grand classique de la boucherie française. Sa coupe épaisse en fait une pièce fondante à cœur appréciée de tous.', 'Pavé de veau ', 'Pavé de veau ', 219, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(2, 0, '2', 5, 'Blanquette de Veau ', 0, 15.9, 15.9, '0.500', NULL, '', 'file_0ea723be3fa0604358253f4139853baa.jpg', '2021-04-20 16:51:02', '2021-09-14 12:58:02', 1, NULL, 'Blanquette de veau ', 'Blanquette de veau ', 'Blanquette de veau ', 226, 1, 1, 19.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(3, 0, '3', 5, 'Filet de Veau ', 0, 19.9, 19.9, '0.500', NULL, '<p>Le filet de veau est de loin le morceau de viande le plus tendre de l&rsquo;animal. Il est accol&eacute; &agrave; la longe et &agrave; la c&ocirc;te filet. Il peut servir &agrave; la pr&eacute;paration d&rsquo;un r&ocirc;ti mais il est &eacute;galement tr&egrave;s bon en pav&eacute; ou en grenadin. Le filet de veau se rapproche beaucoup, en termes de go&ucirc;t, du filet de b&oelig;uf.&nbsp;</p>', 'file_028038e06d24520f67108bbd74b97a6d.jpg', '2021-04-20 16:51:02', '2021-09-14 12:57:34', 1, NULL, 'Le filet de veau, situé le long des vertèbres lombaires, est un morceau très tendre. Comme le filet de bœuf, c\'est un muscle long aux fibres courtes.', 'Filet de veau ', 'Filet de veau', 218, 0, 3, 23.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, 'sachet de 5 pièces soit  500/600 gr ', '', 0, NULL, 6, NULL),
(4, 0, '4', 5, 'Steak Haché de Veau ', 0, 17.9, 17.9, '0.560', NULL, '', 'file_43cd8e660bdd15c159d513a529ea119c.jpg', '2021-04-20 16:51:02', '2021-09-14 12:56:49', 1, NULL, '', 'Steak haché de veau ', 'Steak haché de veau ', 224, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(5, 0, '5', 5, 'Pack Famille', NULL, NULL, NULL, '0', NULL, 'Pack Famille', NULL, '2021-04-20 16:51:02', NULL, 0, NULL, 'Pack Famille', 'Pack Famille', 'Pack Famille', 14, 0, 0, 0, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(6, 0, '6', 5, 'Rôti de Veau  ', 0, 17, 17, '1', NULL, '', 'file_52d19e7fb7befc09f2c078c18c6d254e.jpg', '2021-04-20 16:51:02', '2021-09-15 15:16:08', 1, NULL, 'Le rôti de veau se taille dans le filet, le quasi, la noix ou l\'épaule. ', 'Rôti de veau ', 'Rôti de veau ', 228, 0, 1, 20.4, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(7, 0, '7', 5, 'Paupiette de Veau ', 0, 17.9, 17.9, '0.360', NULL, '<p>Une paupiette est une tranche de viande fine, le plus souvent &agrave; base de b&oelig;uf ou de veau, que l\'on recouvre d\'une farce puis que l\'on roule avant cuisson.</p>', 'file_7ca7791215543292c50c3b9a000f27bc.jpg', '2021-04-20 16:51:02', '2021-09-14 12:55:47', 0, NULL, 'Une paupiette est une tranche de viande fine, le plus souvent à base de bœuf ou de veau, que l\'on recouvre d\'une farce puis que l\'on roule avant cuisson.', 'Paupiette de veau ', 'Paupiette de veau', 228, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(8, 0, '8', 5, 'Paniers suspendus', NULL, NULL, NULL, '0', NULL, 'Paniers suspendus', NULL, '2021-04-20 16:51:02', NULL, 0, NULL, 'Paniers suspendus', 'Paniers suspendus', 'Paniers suspendus', 17, 0, 0, 0, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(9, 0, '9', 5, 'Entrecôte de Veau ', 0, 17.9, 17.9, '0.300', NULL, '', 'file_66bf7dae8e29f0a5b7dda31ab290df13.jpg', '2021-04-20 16:51:02', '2021-09-14 12:55:20', 1, NULL, 'L\'entrecôte de veau est un produit d\'exception. Une côte de veau désossée d\'une belle épaisseur, à servir de préférence rosée.', 'Entrecôte de veau ', 'Entrecôte de veau ', 220, 0, 3, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(10, 0, '10', 5, 'Escalope de Veau', 0, 17.9, 17.9, '0.260', NULL, '', 'file_06dada8acd480cf69ac3d04f99da02c3.jpg', '2021-04-20 16:51:02', '2021-09-14 12:52:55', 1, NULL, 'L\'escalope de veau est un morceau de viande très maigre. Il contient beaucoup d\'apports nutritionnels essentiels tels que des protéines, des vitamines B, du zinc et du sélénium, mais peu de calories', 'Escalope de veau ', 'Escalope de veau ', 219, 1, 3, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(11, 0, '11', 5, 'Tendron de Veau ', 0, 9.9, 9.9, '0.300', NULL, '<p>Le tendron de veau est un morceau osseux. Localis&eacute;e sous les c&ocirc;tes, cette viande est entrelard&eacute;e et contient beaucoup de cartilage. Appel&eacute; &eacute;galement c&ocirc;te parisienne, le tendron est tr&egrave;s pris&eacute; par les amateurs de viande, encore plus que celui du b&oelig;uf. Il peut &ecirc;tre pr&eacute;par&eacute; grill&eacute;, po&ecirc;l&eacute; ou m&ecirc;me r&ocirc;ti au four.</p>', NULL, '2021-04-20 16:51:02', '2021-09-14 12:52:24', 0, NULL, 'Le tendron de veau est situé sur le muscle abdominal en dessous des côtes, à proximité de la poitrine et du flanchet. Ce morceau de viande est entrelardé et a beaucoup de cartilage. Il est aussi plus étroit que la poitrine mais plus long.', 'Tendron de veau ', 'Tendron de veau ', 226, 1, 3, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(12, 0, '12', 5, 'Côte de Veau ', 0, 16, 16, '1', NULL, '', 'file_103c664f7a8f9c280f4b41a404002b75.jpg', '2021-04-20 16:51:03', '2021-09-15 13:22:22', 1, NULL, 'La côte première, dite côtelette, est plus belle, bien charnue, avec une belle noix de viande tendre, sans aponévrose; son manche est bien droit, elle est légèrement grasse sur les bords.', 'Côte de veau ', 'Côte de veau ', 220, 1, 1, 19.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(13, 0, '13', 5, 'Sauté de Veau ', 0, 14.9, 14.9, '0.500', NULL, '<p>Fa&ccedil;on de cuisiner des morceaux de veau en les faisant revenir &agrave; feu vif dans une mati&egrave;re grasse et en les accompagnant d\'une sauce.</p>', NULL, '2021-04-20 16:51:03', '2021-09-14 12:51:24', 0, NULL, 'Façon de cuisiner des morceaux de veau en les faisant revenir à feu vif dans une matière grasse et en les accompagnant d\'une sauce.', 'Sauté de veau ', 'Sauté de veau ', 226, 1, 0, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(14, 0, '14', 5, 'Faux-Filet de Veau ', 0, 35, 35, '0.240', NULL, '', 'file_3e6335b3a14975439c46c73b4da8c572.jpg', '2021-04-20 16:51:03', '2021-08-11 16:05:14', 1, NULL, 'Le faux-filet est un morceau à poêler, griller ou rôtir.', 'Faux-filet de veau ', 'Faux-filet de veau ', 218, 1, 0, 42, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, NULL, '', 0, NULL, 6, NULL),
(15, 0, '15', 5, 'Jarret de Veau (Osso Buco) ', 0, 10, 10, '1', NULL, '<p>Le jarret de Veau, &eacute;galement appel&eacute; &laquo; Osso Buco &raquo;, est localis&eacute; dans la partie inf&eacute;rieure des membres de l&rsquo;animal. Caract&eacute;ris&eacute; par son aspect maigre et g&eacute;latineux, le jarret de veau est cuisin&eacute; avec son os. Ce morceau de viande est tr&egrave;s appr&eacute;ci&eacute; par les enfants et peut &ecirc;tre cuisin&eacute; au four ou &agrave; la po&ecirc;le.</p>', 'file_52c73a27db370ecff8939646680fbad1.jpg', '2021-04-20 16:51:03', '2021-09-15 10:45:00', 1, NULL, 'Le jarret de veau est l\'ingrédient incontournable du célèbre ragoût italien osso buco. Tendre, pas trop gras et doté d\'un os riche en moelle, ce morceau de viande de veau est parfait pour réaliser des plats mijotés.', 'Jarret de veau (Osso Buco)', 'Jarret de veau (Osso Buco)', 221, 1, 1, 12, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(16, 0, '16', 4, 'Pilon de Poulet ', 0, 5.9, 5.9, '1', NULL, '<p>Le pilon est la partie inf&eacute;rieure de la cuisse d\'une volaille. La viande de pilon est semblable &agrave; la viande de cuisse, elle est juteuse et go&ucirc;teuse</p>', 'file_91086aa6af9dc27addf52be76ad7644a.jpg', '2021-04-20 16:51:03', '2021-09-14 12:28:28', 1, NULL, 'Le pilon est la partie inférieure de la cuisse d\'une volaille. La viande de pilon est semblable à la viande de cuisse, elle est juteuse et goûteuse', 'Pilon de poulet ', 'Pilon de poulet ', 214, 1, 0, 7.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(17, 0, '17', 4, 'Haut de Cuisse de Poulet ', 0, 4.5, 4.5, '0.600', NULL, '<p>Les hauts de cuisses de poulet se situent entre la jambe de l\'animal et sa queue. L&eacute;g&egrave;rement plus grasse que la poitrine, cette coupe du poulet est onctueuse, juteuse et gr&acirc;ce au gras</p>', 'file_7c6f0bf06ac9f4537c93c2a82b50f304.jpg', '2021-04-20 16:51:03', '2021-09-14 12:26:41', 1, NULL, 'Les hauts de cuisses de poulet se situent entre la jambe de l\'animal et sa queue. Légèrement plus grasse que la poitrine, cette coupe du poulet est onctueuse, juteuse et grâce au gras', 'Haut de cuisse de poulet  ', 'Haut de cuisse de poulet  ', 214, 1, 1, 5.4, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(18, 0, '18', 4, 'Filet de Poulet ', 0, 9.9, 9.9, '1', NULL, '<p>Le filet de poulet peut &ecirc;tre utilis&eacute; dans de nombreux plats .</p>', 'file_f4e82cd3a3bfbd448d7e45e86ba979b3.jpg', '2021-04-20 16:51:03', '2021-09-14 12:23:57', 1, NULL, 'Le filet de poulet peut être utilisé dans de nombreux plats .', 'Filet de poulet ', 'Filet de poulet ', 214, 1, 0, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(19, 0, '19', 4, 'Cuisse de Poulet ', 0, 3.9, 3.9, '1', NULL, '<p>La cuisse de poulet d&eacute;signe le haut et le bas de cuisse avec les muscles et la peau. La viande se compose d\'un grand nombre de petits muscles, s&eacute;par&eacute;s par des couches de graisse. La viande est un peu plus fonc&eacute;e que celle de la poitrine, plus aromatique</p>', 'file_9f27f50faa48707fcf39ded30de16535.jpg', '2021-04-20 16:51:03', '2021-09-14 12:23:23', 1, NULL, 'La cuisse de poulet désigne le haut et le bas de cuisse avec les muscles et la peau. La viande se compose d\'un grand nombre de petits muscles, séparés par des couches de graisse. La viande est un peu plus foncée que celle de la poitrine, plus aromatique', 'Cuisse de poulet ', 'Cuisse de poulet ', 214, 1, 1, 4.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(20, 0, '20', 4, 'Aile de Poulet ', 0, 3.3, 3.3, '1', NULL, '<p>Les ailes de poulet &agrave; la mode sont une sp&eacute;cialit&eacute; culinaire &agrave; base de viande de poulet.</p>', 'file_2db6e13c29b2c710e93fecf8e826c32f.jpg', '2021-04-20 16:51:03', '2021-09-14 12:22:36', 1, NULL, 'Les ailes de poulet à la mode sont une spécialité culinaire à base de viande de poulet.', 'Aile de poulet ', 'Aile de poulet ', 214, 1, 3, 3.96, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(21, 0, '21', 4, 'Poulet Entier ', 19, 12, 0, '1.5', NULL, '<p>Nos gros poulets nourris aux grains vari&eacute;s et refroidis &agrave; l\'air. Ils sont tendres et juteux. Ils ne fondent pas &agrave; la cuisson.</p>', 'file_1ad4514ec2b9fc02b42bfe75732f0beb.jpg', '2021-04-20 16:51:03', '2021-04-22 13:26:30', 1, NULL, 'Nos gros poulets nourris aux grains variés et refroidis à l\'air. Ils sont tendres et juteux. Ils ne fondent pas à la cuisson.', 'Poulet entier ', 'Poulet entier ', 214, 0, 0, 12, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(22, 0, '22', 4, 'Poulet de Bresse AOP ', 26, 14.9, 0, '1.8', NULL, '<p>LE POULET DE BRESSE Il se caract&eacute;rise par ses plumes blanches, ses pattes bleues, sa cr&ecirc;te rouge et sa peau fine. Le poulet de Bresse est &eacute;lev&eacute; en libert&eacute; sur des parcours herbeux avec un minimum de 10 m&sup2; par volaille</p>', NULL, '2021-04-20 16:51:03', '2021-04-22 13:26:30', 0, NULL, 'LE POULET DE BRESSE Il se caractérise par ses plumes blanches, ses pattes bleues, sa crête rouge et sa peau fine. Le poulet de Bresse est élevé en liberté sur des parcours herbeux avec un minimum de 10 m² par volaille', 'Poulet de bresse AOP ', 'Poulet de bresse AOP ', 31, 0, 0, 14.9, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(23, 0, '23', 4, 'Poulet \"Faverolles\" Bio ', 44, 24, 0, '1.8', NULL, 'Un poulet d\'exception à croissance très lente (180 jours d\'élevage). Sa chaire tendre et son léger gras surprendront les fins gourmets amateurs de volaille.', NULL, '2021-04-20 16:51:03', '2021-04-22 13:26:30', 0, NULL, 'Un poulet d\'exception à croissance très lente (180 jours d\'élevage). Sa chaire tendre et son léger gras surprendront les fins gourmets amateurs de volaille.', 'Poulet ', 'Poulet ', 32, 0, 0, 24, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(24, 0, '24', 4, 'Dinde Noire Fermière Bio', 68, 23, 0, '3', NULL, '<p>Dinde noire fermi&egrave;re Bio</p>', NULL, '2021-04-20 16:51:03', '2021-05-06 02:14:25', 0, NULL, 'Dinde noire fermière Bio ', 'Dinde noire fermière Bio ', 'Dinde noire fermière Bio', 215, 0, 1, 23, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(25, 0, '25', 4, 'Canette Fermière ', 48, 26, 0, '1.8', NULL, '<p>Canette enti&egrave;re, vendu avec ses abats. Elev&eacute; en plein air, nourri au grain garanti sans OGM, sans produits chimiques et sans antibiotiques</p>', NULL, '2021-04-20 16:51:03', '2021-04-22 13:26:30', 0, NULL, 'Canette entière, vendu avec ses abats. Elevé en plein air, nourri au grain garanti sans OGM, sans produits chimiques et sans antibiotiques', 'Canette fermière ', 'Canette fermière ', 34, 0, 0, 26, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(26, 0, '26', 4, 'Cuisse de Poulet Marinée ', 0, 6.9, 6.9, '0.920', NULL, '<p>Cuisse de poulet marin&eacute;e</p>', 'file_682e4d30964796d6e71b4d88439a4e71.jpg', '2021-04-20 16:51:03', '2021-09-14 12:15:08', 1, NULL, 'Cuisse de poulet marinée ', 'Cuisse de poulet marinée ', 'Cuisse de poulet marinée ', 214, 0, 1, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(27, 0, '27', 4, 'Pack Famille', NULL, NULL, NULL, '0', NULL, 'Pack Famille', NULL, '2021-04-20 16:51:03', NULL, 0, NULL, 'Pack Famille', 'Pack Famille', 'Pack Famille', 36, 0, 0, 0, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(28, 0, '28', 4, 'Aile de Poulet Marinée', 0, 6.9, 6.9, '0.500', NULL, '<p>Peu importe le type de f&ecirc;te que vous planifiez ou pour vous empiffrer d&rsquo;ailes de poulet marin&eacute;e , elles remporteront un grand succ&egrave;s.</p>', 'file_7abe350b07c4f4633db40e4aa06ca7c3.jpg', '2021-04-20 16:51:03', '2021-09-14 12:14:23', 1, NULL, 'Peu importe le type de fête que vous planifiez ou pour vous empiffrer d’ailes de poulet marinée , elles remporteront un grand succès.', 'Aile de poulet marinée ', 'Aile de poulet marinée ', 214, 0, 0, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(29, 0, '29', 4, 'Pack volaille Bio', NULL, NULL, NULL, '0', NULL, 'Pack volaille Bio', NULL, '2021-04-20 16:51:03', NULL, 0, NULL, 'Pack volaille Bio', 'Pack volaille Bio', 'Pack volaille Bio', 38, 0, 0, 0, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(30, 0, '30', 4, 'Paupiette de Poulet ', 0, 13.9, 13.9, '1', NULL, '<p>Tranche de viande fine que l\'on recouvre d\'une farce puis que l\'on roule</p>', 'file_ba5beb55ae9bbbd07a867e939f3674c3.jpg', '2021-04-20 16:51:03', '2021-09-14 12:13:44', 1, NULL, 'Tranche de viande fine que l\'on recouvre d\'une farce puis que l\'on roule', 'Paupiette de poulet ', 'Paupiette de poulet ', 214, 0, 0, 16.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(31, 0, '31', 4, 'Pilon de Poulet Mariné ', 0, 6.9, 6.9, '0.440', NULL, '<p>Avec les pilons de poulet marin&eacute;s, vous avez la certitude que votre barbecue sera une r&eacute;ussite.</p>', 'file_543c66fb73120dcd6713b66bf9c97ca7.jpg', '2021-04-20 16:51:03', '2021-09-14 12:13:14', 1, NULL, 'Avec les pilons de poulet marinés, vous avez la certitude que votre barbecue sera une réussite.', 'Pilon de poulet mariné ', 'Pilon de poulet mariné ', 214, 1, 0, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(32, NULL, '32', 4, 'Paniers suspendus', NULL, NULL, NULL, '0', NULL, 'Paniers suspendus', NULL, '2021-04-20 16:51:03', NULL, 0, NULL, 'Paniers suspendus', 'Paniers suspendus', 'Paniers suspendus', 41, 0, 0, 0, 0, 0, 0, 1, 1, 0, 9, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(33, 0, '33', 4, 'Cuisse de Poulet Désossée ', 0, 6.9, 6.9, '1', NULL, '<p>La cuisse de poulet d&eacute;soss&eacute;e bio est excellente en recettes sant&eacute;.</p>', 'file_d2880460ffa6cf3f2324c1d1a099a238.jpg', '2021-04-20 16:51:03', '2021-09-14 12:11:41', 1, NULL, 'La cuisse de poulet désossée bio est excellente en recettes santé.', 'Cuisse de poulet désossée ', 'Cuisse de poulet désossée ', 214, 0, 0, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(34, 0, '34', 4, 'Aile de Poulet Pack 2kg', 0, 6, 6, '2', NULL, '<p>Aile de poulet pack 2 kg</p>', 'file_ca580c8ffbf3e558db4af9e600fc1b29.jpg', '2021-04-20 16:51:03', '2021-09-14 12:11:01', 1, NULL, 'Aile de poulet pack 2 kg ', 'Aile de poulet pack 2 kg', 'Aile de poulet pack 2 kg', 214, 0, 0, 7.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(35, 0, '35', 4, 'Aile de Poulet Marinée Pack 2kg ', 0, 13.9, 13.9, '2', NULL, '<p>Aile de poulet marin&eacute;e pack 2 kg</p>', 'file_1d052152f8be0c8ef4e52b37e5871bf1.jpg', '2021-04-20 16:51:03', '2021-09-14 12:10:31', 1, NULL, 'Aile de poulet marinée pack 2 kg ', 'Aile de poulet marinée pack 2 kg ', 'Aile de poulet marinée pack 2 kg', 214, 0, 0, 16.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(36, 0, '36', 4, 'Brochette de Poulet Marinée ', 0, 13.9, 13.9, '1', NULL, '<p>Brochette de poulet Une brochette, en cuisine, d&eacute;signe une fine tige en m&eacute;tal ou en bois sur laquelle sont enfil&eacute;s des morceaux de blanc de poulet marin&eacute;e</p>', 'file_5fad5368e6b950605b25a2352e141433.jpg', '2021-04-20 16:51:03', '2021-09-14 12:09:27', 1, NULL, 'Brochette de poulet Une brochette, en cuisine, désigne une fine tige en métal ou en bois sur laquelle sont enfilés des morceaux de blanc de poulet marinée ', 'Brochette de poulet marinée ', 'Brochette de poulet marinée ', 214, 0, 0, 16.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(37, 0, '37', 4, 'Escalope de Poulet (finement tranchée)', 0, 9.9, 9.9, '1', NULL, '<p>L\'escalope de poulet est une fine tranche de filet de poulet Bio. Reconnu pour ses vertus di&eacute;t&eacute;tique.</p>', 'file_5d93bfd16d392fb773a09a87b015802a.jpg', '2021-04-20 16:51:03', '2021-09-14 12:08:45', 1, NULL, 'L\'escalope de poulet est une fine tranche de filet de poulet Bio. Reconnu pour ses vertus diététique.', 'Escalope de poulet (finement tranchée) ', 'Escalope de poulet (finement tranchée) ', 214, 0, 0, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(38, 0, '38', 4, 'Haut de Cuisse Mariné ', 0, 5.9, 5.9, '0.150', NULL, '<p>Les hauts de cuisses de poulet se situent entre la jambe de l&rsquo;animal et sa queue. L&eacute;g&egrave;rement plus grasse que la poitrine, cette coupe du poulet est onctueuse, juteuse et gr&acirc;ce au gras, extr&ecirc;mement go&ucirc;teuse. Elle se mange tr&egrave;s bien grill&eacute;e ou r&ocirc;tie.</p>', 'file_88d82274cd2c9792e6a8efe2634bcf7e.jpg', '2021-04-20 16:51:03', '2021-09-14 12:07:32', 1, NULL, 'Les hauts de cuisses de poulet se situent entre la jambe de l’animal et sa queue. Légèrement plus grasse que la poitrine, cette coupe du poulet est onctueuse, juteuse et grâce au gras, extrêmement goûteuse. Elle se mange très bien grillée ou rôtie.', 'Haut de cuisse mariné ', 'Haut de cuisse mariné ', 214, 0, 0, 7.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(39, 0, '39', 4, 'Foie de Poulet ', 0, 5.9, 5.9, '1', NULL, '<p>Le foie de poulet est un produit tr&egrave;s peu calorique et riche en vitamines et en fer, exactement comme pour le foie de veau ou encore celui de l&rsquo;agneau. Il est tr&egrave;s conseill&eacute; de rincer le foie dans de l&rsquo;eau froide pendant 45 minutes avant de le cuisiner afin d&rsquo;&eacute;viter d&rsquo;avoir un go&ucirc;t amer. Saut&eacute; &agrave; l&rsquo;aile ou accompagn&eacute; d&rsquo;une sauce aux champignons, le foie de poulet reste une alternative pas ch&egrave;re &agrave; celui du veau et de l&rsquo;agneau.</p>\n<p><strong>Go Ferme Halal </strong>vous propose un foie de poulet halal (certification AVS). Il vous sera livr&eacute; chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail </strong>ou via notre <strong>formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter</strong> afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.</p>', 'file_455381591abc32bb5f4b11b627a23f85.jpg', '2021-04-20 16:51:03', '2021-09-14 12:06:09', 1, NULL, 'Le foie de volaille renvoie le plus souvent au foie de poulet. Cet abat dit « rouge » par opposition aux abats blancs (tripes, pieds, etc.) est un aliment peu onéreux qui s\'intégre parfaitement dans le cadre d\'une alimentation saine et équilibrée.', 'Foie de poulet ', 'Foie de poulet', 214, 0, 0, 7.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(40, 0, '40', 4, 'Dinde Rouge ', 68, 23, 0, '3', NULL, 'Le dindon (meleagris gallopavo), et sa femelle la dinde, sont les animaux domestiques emblématiques de nos basses-cours. La dinde, à la chair maigre en teneur en protéines élevée, est une volaille particulièrement appréciée pour sa viande et compose le me', 'file_d285334ef5de67352880ef4f3b3ba4dd.jpg', '2021-04-20 16:51:03', '2021-04-22 13:26:30', 1, NULL, 'Le dindon (meleagris gallopavo), et sa femelle la dinde, sont les animaux domestiques emblématiques de nos basses-cours. La dinde, à la chair maigre en teneur en protéines élevée, est une volaille particulièrement appréciée pour sa viande et compose le me', 'Dinde Rouge ', 'Dinde Rouge ', 215, 0, 0, 23, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(41, 0, '41', 4, 'Gauloises Grises ', 32, 18, 0, '1.8', NULL, '<p>La Gauloise Grise ou encore appel&eacute;e la Bresse Gauloise Grise est une poule de race pure et tr&egrave;s ancienne. De nature sauvage, ces volailles sont &eacute;lev&eacute;es en plein air et sont r&eacute;put&eacute;es pour l&rsquo;excellente qualit&eacute; de leur chair.</p>\n<p><strong>Go Ferme Halal </strong>vous propose une Gauloise Grise halal (certification AVS). Elle vous sera livr&eacute;e chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail </strong>ou via notre <strong>formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter </strong>afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.</p>', NULL, '2021-04-20 16:51:03', '2021-04-22 13:26:30', 0, NULL, 'La poule Gauloise grise est originaire de la région de la Bresse. Très réputée pour ses pattes et tarses (le haut des pattes) de couleur bleue', 'Gauloises Grises ', 'Gauloises Grises ', 50, 0, 0, 18, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(42, 0, '42', 4, 'Cou-nu du Forez ', 28, 16.77, 0, '1.8', NULL, '<p>La poule Cou nu du Forez est, comme son nom l&rsquo;indique, originaire du Forez, dans la r&eacute;gion Auvergne. &Eacute;tant d&eacute;pourvue de plumes au niveau du cou, cette poule est tr&egrave;s pris&eacute;e par les amateurs de volailles gr&acirc;ce notamment &agrave; son go&ucirc;t bien particulier et atypique qui la diff&eacute;rencie des autres races.</p>\n<p><strong>Go Ferme Halal</strong> vous propose un cou nu du Forez halal (certification AVS). Elle vous sera livr&eacute;e chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail </strong>ou via notre <strong>formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter </strong>afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.</p>', NULL, '2021-04-20 16:51:03', '2021-04-22 13:26:30', 0, NULL, 'Les poules Cou nu ont une bonne réputation de rusticité. Elles ont un cou complètement dénudé à l\'exception d\'une touffe de plumes dans le milieu, nettement dégagée et isolée.', 'Cou-nu du Forez ', 'Cou-nu du Forez ', 51, 0, 0, 16.77, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(43, 0, '43', 4, 'Pintade Perle Noire', 33, 20.99, 0, '1.7', NULL, '<p>La pintade perle noire est un animal sauvage. Elle donc doit &ecirc;tre &eacute;lev&eacute;e en semi-libert&eacute; et en plein air, ce qui lui donne un go&ucirc;t sp&eacute;cifique. Cuisin&eacute;e au four et accompagn&eacute;e de l&eacute;gumes de saison, elle convient parfaitement pour un repas de famille.</p>\n<p><strong>Go Ferme Halal </strong>vous propose une pintade perle noire halal (certification AVS). Elle vous sera livr&eacute;e chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail </strong>ou via notre <strong>formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre Newsletter afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.</p>', NULL, '2021-04-20 16:51:03', '2021-04-22 13:26:30', 0, NULL, 'La pintade est rustique, très résistante et de croissance lente. Sa chair, et particulièrement les cuisses, sont d\'une qualité exceptionnelle, et le goût est très différent de la pintade fermière classique.', 'Pintade Perle Noire ', 'Pintade Perle Noire ', 52, 0, 0, 20.99, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(44, 0, '44', 3, 'Onglet de Bœuf ', 0, 14.9, 14.9, '0.300', NULL, '', 'file_f12894d4dcd787751e6a24047da76ea1.jpg', '2021-04-20 16:51:03', '2021-09-14 12:00:47', 0, NULL, 'L’onglet de bœuf  est un morceau situé sur le ventre de l’animal, sous le faux-filet et le filet qui se consomme généralement grillé et surtout saignant pour garder toutes ses saveurs', 'Onglet de boeuf ', 'Onglet de boeuf ', 202, 0, 3, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(45, 0, '45', 3, 'Pot-au-Feu de Bœuf ', 0, 9.9, 9.9, '1', NULL, '', 'file_df66b11a7cdea96b25bbcc238b87c79d.jpeg', '2021-04-20 16:51:03', '2021-09-14 12:00:11', 1, NULL, 'Le pot-au-feu est un plat traditionnel de la cuisine française, c’est un plat convivial à base de viande maigre ou grasse ou gélatineuse. ', 'Pot-au-feu ', 'Pot-au-feu ', 205, 0, 0, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(46, 0, '46', 3, 'Rosbif de Bœuf ', 0, 15, 15, '1', NULL, '<p>Le Rosbif de b&oelig;uf est un produit qui nous vient tout droit du Royaume-Uni. Appel&eacute; &eacute;galement b&oelig;uf r&ocirc;ti ou comme l&rsquo;appelle les Anglais, &laquo; roast beef &raquo;, cette viande ne provient pas d&rsquo;une partie sp&eacute;cifique de l&rsquo;animal. En effet, le faux-filet, le filet ou encore le rumsteck peuvent &ecirc;tre utilis&eacute;s.<br />Le morceau de viande est recouvert d&rsquo;une mince bande de lard. Le tout est ficel&eacute; en faisant le tour du r&ocirc;ti. La barde sert &agrave; emp&ecirc;cher le dess&egrave;chement de la viande.</p>', 'file_1bdb87d98942fd6b2954571b7dceffaa.jpg', '2021-04-20 16:51:03', '2021-09-15 10:16:57', 1, NULL, 'Rosbif est le le ', 'Rosbif ', 'Rosbif ', 197, 1, 0, 18, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(47, 0, '47', 3, 'Bourguignon de Bœuf ', 0, 9.9, 9.9, '1', NULL, '', 'file_24302ad12c942fe28b86158bed7e894b.jpg', '2021-04-20 16:51:03', '2021-09-14 11:59:13', 1, NULL, 'Le bœuf bourguignon est une recette française à base de la viande du bœuf, vous pouvez la cuisiner avec de champignons ou de lardons', 'Bourguignon ', 'Bourguignon ', 216, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(48, 0, '48', 3, 'La Poire de Bœuf', 0, 15.9, 15.9, '0.300', NULL, '<p>La poire, son nom vient de sa forme elle fait partie de la tranche situ&eacute; sur la face de la cuisse ou se trouve les muscles, sa viande est tr&egrave;s tendre et excellente.</p>', NULL, '2021-04-20 16:51:03', '2021-09-14 11:58:19', 0, NULL, 'La poire, son nom vient de sa forme elle fait partie de la tranche situé sur la face de la cuisse ou se trouve les muscles, sa viande est très tendre et excellente. ', 'La poire ', 'La poire', 199, 0, 0, 19.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(49, 0, '49', 3, 'Bifteck dans la Tranche de Bœuf ', 0, 14, 14, '1', NULL, '', 'file_4e3cafe122dc45d42b2234e86f47d013.jpg', '2021-04-20 16:51:03', '2021-09-15 09:27:23', 1, NULL, 'Bifteck dans la tranche est un morceau très tendre et  très maigre à griller ou à poêler qui convient à tous les goûts.', 'Bifteck dans la tranche ', 'Bifteck dans la tranche ', 199, 0, 0, 16.8, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(50, 0, '50', 3, 'Steak de Rumsteak de Bœuf', 0, 14, 14, '1', NULL, '<p>Le rumsteck est form&eacute;e par l\'aiguillette de rumsteck tir&eacute; du fond ; la partie centrale, qui contient la boule et le filet de Rumsteck, elle est maigre et moelleuse, et elle n&eacute;cessite plus de temps pour &ecirc;tre grill&eacute;e</p>', NULL, '2021-04-20 16:51:03', '2021-09-15 13:22:58', 0, NULL, 'Le rumsteck est formée par l\'aiguillette de rumsteck tiré du fond ; la partie centrale, qui contient la boule et le filet de Rumsteck, elle est maigre et moelleuse, et elle nécessite plus de temps pour être grillée ', 'Steak de rumsteak ', 'Steak de rumsteak', 194, 0, 1, 16.8, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(51, 0, '51', 3, 'Filet de Rumsteak de Bœuf  ', 0, 14.9, 14.9, '0.500', NULL, '', 'file_07a93fb2ecf0ca91e648927d799216ad.jpg', '2021-04-20 16:51:03', '2021-09-14 11:56:48', 0, NULL, 'Le filet de rumsteak est pratique pour se faire découper en  médaillons ou en brochette ou une fondu, sa viande est caractérisé par sa qualité mince et allongé et très tendre.', 'Filet de rumsteak ', 'Filet de rumsteak ', 225, 0, 0, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(52, 0, '52', 3, 'Filet de Bœuf ', 0, 25.9, 25.9, '0.500', NULL, '', 'file_894b81d33ff3d90f487e5c3a850d66fc.jpg', '2021-04-20 16:51:03', '2021-09-14 11:56:15', 0, NULL, 'Le filet de bœuf est un morceau maigre et tendre au  goût délicat  situé dans la région lombaire', 'Filet de boeuf ', 'Filet de boeuf', 225, 0, 0, 31.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(53, 0, '53', 3, 'Bavette de Flanchet de Bœuf ', 0, 13.9, 13.9, '0.180', NULL, '', 'file_3cb49ddaecaac33fe3854445a667fd23.jpg', '2021-04-20 16:51:03', '2021-09-14 11:55:31', 0, NULL, 'La bavette de flanchet est une viande qui se situe au niveau de l\'aine de l\'animal, généralement de forme carrée  et caractérisé par sa viande de fibres longues comme celle de la bavette d’aloyau.', 'Bavette de flanchet ', 'Bavette de flanchet ', 206, 0, 0, 16.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(54, 0, '54', 3, 'Bavette d\'Aloyau de Bœuf ', 0, 14.9, 14.9, '0.180', NULL, '', 'file_f9f6f8aca455975d531ddb71024ff217.jpg', '2021-04-20 16:51:03', '2021-09-14 11:55:08', 0, NULL, 'La bavette d\'aloyau est un muscle de la forme d’une bavette, facile à cuisiner, de fibres très longues et d’une viande savoureuse  et goûteuse.', 'Bavette d\'aloyau ', 'Bavette d\'aloyau', 206, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(55, 0, '55', 3, 'Faux-Filet de Bœuf  ', 0, 16.9, 16.9, '0.250', NULL, '', 'file_d5ebd69ce17bfb125f8dc716f151e130.jpg', '2021-04-20 16:51:03', '2021-09-14 11:54:41', 0, NULL, 'Le faux-filet est un morceau de boeuf qui se caractérise par sa viande tendre et savoureuse. Situé juste à côté du filet, il est particulièrement goûteux et légèrement moins persillé que l\'entrecôte', 'Faux-filet ', 'Faux-filet ', 225, 0, 0, 20.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(56, 0, '56', 3, 'Tranches de Filet de Bœuf ', 0, 25.9, 25.9, '0.150', NULL, '<p><strong>Go Ferme Halal</strong> propose pour les amateurs de la viande des tranches de filet de b&oelig;uf de qualit&eacute; sup&eacute;rieure.</p>\n<p>Principalement d&eacute;coup&eacute;s dans des morceaux nobles, ces filets de b&oelig;uf sont particuliers et appr&eacute;ci&eacute;s dans tous vos repas.&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement en ligne nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> d&eacute;licieuses.</p>\n<p>Disponible &eacute;galement en ligne : <strong><a href=\"../../../../products/show/55\">Faux-filet</a>, <a href=\"../../../../products/show/52\">Filets de boeuf</a>, <a href=\"../../../../products/show/51\">Filets de rumsteak</a>,<a href=\"../../../../products/categorie/101-epices\"> &eacute;picerie</a>...!&nbsp;</strong></p>', 'file_8cff2ca0c1067d34cf9bba6b526f8c4c.jpg', '2021-04-20 16:51:03', '2021-09-14 11:53:34', 1, NULL, 'Le filet de bœuf est un morceau de choix, connu par sa qualité tendre et maigre, situé dans la partie lombaire et peut être consommé sous forme de rôti.', 'Tranches de filet de boeuf ', 'Tranches de filet de boeuf ', 225, 0, 0, 31.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(57, 0, '57', 3, 'Basse Côte de Bœuf ', 0, 6.9, 6.9, '1', NULL, '<p><strong>Go Ferme Halal </strong>propose pour les amateurs une basse c&ocirc;te de qualit&eacute; sup&eacute;rieure.&nbsp;</p>\n<p>Il faut savoir que la basse c&ocirc;te est un morceau proche de l\'entrec&ocirc;te mais est moins r&eacute;put&eacute;e.</p>\n<p>Optez pour un morceau est un des plus go&ucirc;teux et appr&eacute;ci&eacute; des connaisseurs, qui apporte du go&ucirc;t et du gras dans vos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.&nbsp;</p>\n<p>Nous vous proposons un c&oelig;ur de basse c&ocirc;te noble et tr&egrave;s tendre, presque d&eacute;pourvu de nerfs.</p>\n<p>Disponible &eacute;galement en ligne : <strong><a href=\"../../../../products/show/62\">Le royal</a>, <a href=\"../../../../products/show/122\">Collier de boeuf</a>, <a href=\"../../../../products/show/61\">pav&eacute; de rumsteak</a>, <a href=\"../../../../products/show/69\">entrec&ocirc;te de boeuf </a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_e343a67013978ce50d7fc3e93be911ec.jpg', '2021-04-20 16:51:03', '2021-09-14 11:52:41', 1, NULL, 'Les basses côtes sont des morceaux de la partie avant du bœuf entre collier et entrecôte, c’est un morceau gras d’une viande très tenre.  ', 'Basse côte ', 'Basse côte ', 191, 0, 1, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(58, 0, '58', 3, 'Plat de Côte de Bœuf  ', 0, 6.9, 6.9, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose en ligne la vente du plat de c&ocirc;te de b&oelig;uf : un morceau largement r&eacute;pandu en cuisine.</p>\n<p>Il faut savoir que le plat de c&ocirc;te de b&oelig;uf est situ&eacute; sous les c&ocirc;tes et au-dessus du tendron.</p>\n<p>Avec ce plat de c&ocirc;te de b&oelig;uf, vous pourrez r&eacute;aliser de nombreuses <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> d&eacute;licieuses, &agrave; d&eacute;guster en famille ou entre amis !</p>\n<p>Disponible &eacute;galement en ligne : <strong><a href=\"../../../../products/show/60\">Entrec&ocirc;e de boeuf</a>, <a href=\"../../../../products/show/133\">Longe de boeuf</a>, <a href=\"../../../../products/show/69\">entrec&ocirc;te de boeuf marin&eacute;e</a>, <a href=\"../../../../products/show/66\">c&ocirc;te de boeuf</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>&hellip; !</strong></p>', 'file_24c1a95b1ed356d97b7bb70ab4643878.jpg', '2021-04-20 16:51:03', '2021-09-14 11:31:27', 1, NULL, 'Le plat-de-côtes est une viande situé à l\'extrémité des os des côtes formé d\'un ensemble de plusieurs côtes composé d’une viande à fibres longues. ', 'Plat de côte ', 'Plat de côte', 205, 0, 1, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(59, 0, '59', 3, 'Araignée de Bœuf  ', 0, 14.9, 14.9, 'par pièce ', NULL, '<p>Envie d&rsquo;une viande d\'excellence des bouchers et des gourmets ?&nbsp;</p>\n<p><strong>Go Ferme Halal</strong> est l&rsquo;adresse qu&rsquo;il vous faut !</p>\n<p>Nous proposons pour les amateurs une araign&eacute;e, issue d&rsquo;une viande de qualit&eacute; sup&eacute;rieure et certifi&eacute;e du <em>Label Rouge.</em> Elle provient de b&oelig;uf &eacute;lev&eacute; en plein air sous la m&egrave;re dans la nature et 100 % bio.</p>\n<p>L&rsquo;araign&eacute;e est un morceau incontournable, qu\'on ne le vend que tr&egrave;s rarement en raison de leur raret&eacute;, mais &eacute;galement de son aspect peu pr&eacute;sentable.</p>\n<p>Il faut savoir que l&rsquo;araign&eacute;e est une pi&egrave;ce situ&eacute;e au niveau de l&rsquo;aine de l&rsquo;animal.</p>\n<p>Nous vous garantissons un morceau de choix avec une texture tr&egrave;s tendre.</p>\n<p>Vous pouvez pr&eacute;parer diff&eacute;rents plats, tout en ayant un go&ucirc;t beaucoup plus prononc&eacute;.</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement des<a href=\"../../../../pages/show/14-nos-recettes\"><strong> recettes</strong></a> uniques et d&eacute;licieuses, issues du savoir-faire de notre chef-boucher !</p>\n<p>Disponible &eacute;galement en ligne :<strong><a href=\"../../../../products/show/121\"> La tranche</a>, <a href=\"../../../../products/show/48\">La poire de boeuf</a>, <a href=\"../../../../products/show/49\">Bifteck dans la tranche</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>&hellip; !</strong></p>', 'file_f9b7c64c2755e0931f3f85671efdc2ff.jpg', '2021-04-20 16:51:03', '2021-09-14 11:51:38', 1, NULL, 'L’araignée est un morceau rarement vendu et qualifié de morceau de choix, il possède un goût juteux et plus accentué et lorsqu’elle est préparée elle ressemble à une araignée. ', 'Araignée ', 'Araignée ', 199, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(60, 0, '60', 3, 'Entrecôte de Bœuf ', 0, 17.9, 17.9, '1', NULL, '<p>Envie d&rsquo;entrec&ocirc;te de b&oelig;uf fraiche et avec un go&ucirc;t inimitable et d&eacute;licieux ?</p>\n<p><strong>Go Ferme Halal </strong>propose, pour les amateurs, l\'un des morceaux les plus nobles en boucherie : des entrec&ocirc;tes de b&oelig;uf, de qualit&eacute; sup&eacute;rieure tout en vous garantisant :&nbsp;</p>\n<p>&nbsp; &nbsp; <strong>&nbsp;-</strong> Un go&ucirc;t franc<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> Une tendret&eacute; parfaite&nbsp;<br />&nbsp; &nbsp; <strong>&nbsp;- </strong>Une viande subtile</p>\n<p>Tellement cette entrec&ocirc;te est facile &agrave; pr&eacute;parer, vous l\'appr&eacute;ciez servie seule. Vous pouvez &eacute;galement l&rsquo;accompagner pour un repas d&rsquo;exception.</p>\n<p>Disponible &eacute;galement en ligne :<strong> <a href=\"../../../../products/show/133\">Longe de boeuf</a>, <a href=\"../../../../products/show/66\">c&ocirc;te de boeuf</a>,<a href=\"../../../../products/show/58\"> plat de c&ocirc;te</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_3ad8a444aaa0458c2fdc9a5773eee43f.jpg', '2021-04-20 16:51:03', '2021-09-14 11:51:11', 1, NULL, 'L\'entrecôte est un morceau de la côte de bœuf désossé  et peu épaisse,  c’est l’un des meilleurs morceaux pour la grillade. ', 'Entrecôte de boeuf ', 'Entrecôte de boeuf ', 205, 1, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(61, 0, '61', 3, 'Pavé de Rumsteak de Bœuf ', 0, 14, 14, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose la vente en ligne du Pav&eacute; de rumsteck de qualit&eacute; sup&eacute;rieure.&nbsp;</p>\n<p>Taill&eacute; en pav&eacute;, c&rsquo;est un morceau tendre, &nbsp;savoureux, mais &eacute;galement go&ucirc;teux !</p>\n<p>Par son &eacute;paisseur, cette pi&egrave;ce de choix permet d\'appr&eacute;cier la saveur du b&oelig;uf sur plusieurs cuissons.</p>\n<p>Disponible &eacute;galement en ligne : <strong><a href=\"../../../../products/show/249\">Quasi de boeuf</a>, <a href=\"../../../../products/show/129\">aiguillete baronne</a>, <a href=\"../../../../products/show/120\">Rumsteak</a>, <a href=\"../../../../products/show/50\">steak de rumsteak</a>&hellip;!</strong></p>', 'file_140212faf482cd355fb4d0c31e14d64e.jpg', '2021-04-20 16:51:03', '2021-09-16 13:58:59', 1, NULL, 'Un pavé de rumsteck est un morceau du haut de la cuisse du bœuf d’une viande à courtes et tendre fibres, peu gras ce qui fait de ce morceau une pièce très noble de l’animal.', 'Pavé de rumsteak ', 'Pavé de rumsteak ', 194, 1, 0, 16.8, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(62, 0, '62', 3, 'Le Royal de Bœuf  ', 0, 30, 30, '0.200', NULL, '<p>Le royal est une pi&egrave;ce de l&rsquo;arri&egrave;re de b&oelig;uf tr&egrave;s tendre qui se cuisine &agrave; la po&ecirc;le.</p>', 'file_21251992f77dde0f4e8e8e395b263bca.jpg', '2021-04-20 16:51:03', '2021-08-12 14:38:50', 0, NULL, 'Le royal est une pièce de l’arrière de bœuf très tendre qui se cuisine à la poêle. ', 'Le royal ', 'Le royal ', 206, 1, 0, 36, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(63, 0, '63', 3, 'Steak Haché de Bœuf ', 0, 14.9, 14.9, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose des steaks hach&eacute;s, issus d&rsquo;une viande de b&oelig;uf go&ucirc;teuse, tr&egrave;s parfum&eacute;e.</p>\n<p>Nos Steaks hach&eacute;s feront certainement le bonheur des enfants et surtout des amateurs de burgers !</p>\n<p>Nous vous assurons une viande tendre et juteuse pour pr&eacute;parer des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> savoureuses, qui raviront vos convives !</p>\n<p>&nbsp;</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/242\">Merguez de boeuf</a>, <a href=\"../../../../products/show/70\">Kefta</a>, <a href=\"../../../../products/show/65\">Viande hach&eacute;e</a>, <a href=\"../../../../products/show/230\">Bifteck hach&eacute; boeuf</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>&hellip; !</strong></p>', 'file_e3bdd087023b38d33390e471044487a0.jpg', '2021-04-20 16:51:03', '2021-09-14 11:47:50', 1, NULL, 'Un steak haché est une galette préparé à la base de viande hachée', 'Steak haché ', 'Steak haché ', 213, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(64, 0, '64', 3, 'Pièce à Fondue de Bœuf  ', 0, 14.9, 14.9, '0.500', NULL, '<p>Soucieux de votre satisfaction,<strong> Go Ferme Halal</strong> vous propose une pi&egrave;ce &agrave; fondue, issue d&rsquo;une viande tendre et tr&egrave;s parfum&eacute;e. Ce morceau incontournable a &eacute;t&eacute; s&eacute;lectionn&eacute; avec un grand soin pour que vous puissiez pr&eacute;parer des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong> </a>savoureuses.&nbsp;</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/247\">Boeuf &agrave; mijoter</a>, <a href=\"../../../../products/show/252\">Macreuse pour bourguignon</a>, <a href=\"../../../../products/show/67\">Eminc&eacute; de boeuf</a>, <a href=\"../../../../products/show/47\">Bourguignon</a>&hellip; !</strong></p>', NULL, '2021-04-20 16:51:03', '2021-09-14 11:47:14', 0, NULL, 'La pièce à fondue est un morceau de bœuf à cuir au four, elle est très tendre et très maigre coupé généralement de la partie haute arrière du bœuf.', 'Pièce à fondue ', 'Pièce à fondue ', 216, 1, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(65, 0, '65', 3, 'Viande Hachée de bœuf', 0, 9.9, 9.9, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose en ligne, la vente de viande hach&eacute;e d\'une saveur incomparable, en direct du producteur.&nbsp;</p>\n<p>Nous vous assurons une viande avec toutes les normes sanitaires europ&eacute;ennes.&nbsp;</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/70\">Kefta</a>, <a href=\"../../../../products/show/242\">Merguez de boeuf</a>, <a href=\"../../../../products/show/63\">Steak hach&eacute; de boeuf</a>, <a href=\"../../../../products/show/230\">Bifteck hach&eacute; de boeuf</a>&hellip; !</strong></p>', 'file_bc6e19a536aae3765ff78bfb92db8a7b.jpg', '2021-04-20 16:51:03', '2021-09-14 11:46:47', 1, NULL, 'C’est de la viande coupé en morceaux très fines. ', 'Viande hachée ', 'Viande hachée ', 213, 1, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 2, 2, 2, 2, 1, 1, '', '', 0, NULL, 6, NULL),
(66, 0, '66', 3, 'Côte de Bœuf  ', 0, 16, 16, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose un mets succulent : une c&ocirc;te de b&oelig;uf issue d\'animaux s&eacute;lectionn&eacute;s pour vous en direct de chez l\'&eacute;leveur.</p>\n<p>Optez pour un morceau qui apporte &agrave; la d&eacute;gustation un plaisir gustatif intense !</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/58\">Plat de c&ocirc;tes</a>, <a href=\"../../../../products/show/60\">entrec&ocirc;te de boeuf</a>,<a href=\"../../../../products/show/69\"> entrec&ocirc;te de boeuf marin&eacute;e</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>, <a href=\"../../../../products/show/63\">Steak hach&eacute;</a>, <a href=\"../../../../products/show/71\">Brochette de b&oelig;uf</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_d3a10fc0d3f34806b36fd6de3594105a.jpg', '2021-04-20 16:51:03', '2021-09-21 08:07:22', 1, NULL, 'C’est une tranche de viande très épaisse issue du milieu de train de côtes du bœuf  et elle recouvre ses vertèbres dorsales, elle comprend ainsi un os couvert par la viande.', 'Côte de boeuf ', 'Côte de boeuf ', 205, 1, 0, 19.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(67, 0, '67', 3, 'Emincé de Bœuf ', 0, 17.9, 17.9, '0.6', NULL, '<p>Envie d\'un produit convivial tout pr&ecirc;t, go&ucirc;teux ?&nbsp;</p>\n<p><strong>Go Ferme Halal</strong>, boucherie charcuterie en ligne, vous propose un &eacute;minc&eacute; de b&oelig;uf de qualit&eacute; sup&eacute;rieure.</p>\n<p>Optez pour un &Eacute;minc&eacute; de b&oelig;uf pr&ecirc;t &agrave; cuisiner des <strong><a href=\"../../../../pages/show/14-nos-recettes\">recettes</a> </strong>rapides et go&ucirc;teuses !</p>\n<p>Faites cuire nos &eacute;minc&eacute;s de b&oelig;uf quelques minutes :</p>\n<p>&nbsp; &nbsp;<strong> &nbsp;-</strong> &Agrave; la plancha<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> Sur la pierre &agrave; griller&nbsp;<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> &Agrave; la po&ecirc;le&nbsp; &nbsp;</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/252\">Macreuse pour bourguinon</a>,<a href=\"../../../../products/show/247\"> Boeuf &agrave; mijoter</a>, <a href=\"../../../../products/show/47\">Bourguignon</a>, <a href=\"../../../../products/show/64\">Pi&egrave;ce &agrave; fondue</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-04-20 16:51:03', '2021-09-14 11:45:25', 0, NULL, 'Des tranches de viande de bœuf minces découpées en lanières fines.', 'Emincé de boeuf ', 'Emincé de boeuf ', 216, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL);
INSERT INTO `av_products` (`product_id`, `new_id`, `product_ref`, `categorie_id`, `product_name`, `product_total_price`, `product_price`, `product_price_dicount`, `product_poids`, `product_text`, `product_short_text`, `product_picture`, `product_data_created`, `product_data_updated`, `product_data_status`, `files`, `product_meta_description`, `product_meta_title`, `product_meta_keywords`, `sub_categorie_id`, `show_poids`, `product_stock`, `product_price_selling`, `product_price_marge_percente`, `product_price_marge_percente_dicount`, `product_entier`, `product_best_seller`, `product_is_promo`, `product_entier_association`, `product_affected_partener`, `product_bio`, `product_label_rouge`, `product_origin`, `product_promo`, `product_is_composer`, `product_show_home`, `product_info`, `product_short_description`, `show_option`, `categorie_couffin_id`, `certificat_id`, `product_poitou_charentes`) VALUES
(68, 0, '68', 4, 'Emincé de Poulet ', 0, 9.9, 9.9, '0.5', NULL, '<p>Eminc&eacute; de poulet est appr&eacute;ci&eacute; des petits et des grands. Il permet la r&eacute;alisation de petits plats rapides et pleins d\'imagination. Pr&eacute;par&eacute; &agrave; la cr&egrave;me avec des champignons ou avec une sauce moutarde ou curry, son succ&egrave;s est assur&eacute;.</p>', 'file_4fa47ad1aec4946f28217f8c871b5cc3.jpg', '2021-04-20 16:51:03', '2021-09-14 12:01:32', 1, NULL, 'Emincé de poulet   est apprécié des petits et des grands. Il permet la réalisation de petits plats rapides et pleins d\'imagination. Préparé à la crème avec des champignons ou avec une sauce moutarde ou curry, son succès est assuré.', 'Emincé de poulet ', 'Emincé de poulet ', 214, 1, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(69, 0, '69', 3, 'Entrecôte de Bœuf Marinée ', 0, 19, 19, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose une Entrec&ocirc;te de b&oelig;uf marin&eacute;e de qualit&eacute; sup&eacute;rieure<em>.&nbsp;</em></p>\n<p>Nous vous assurons une pi&egrave;ce tendre et tellement savoureuse pour pr&eacute;parer<strong> </strong><a href=\"../../../../pages/show/14-nos-recettes\"><strong>des recettes </strong></a>qui raviront vos convives.</p>\n<p>L&rsquo;entrec&ocirc;te de b&oelig;uf marin&eacute;e est un morceau embl&eacute;matique qui peut &ecirc;tre cuit de plusieurs fa&ccedil;ons :&nbsp;</p>\n<p>&nbsp; &nbsp; <strong>&nbsp;-</strong> Au four<br />&nbsp; &nbsp; &nbsp;<strong>- </strong>Au gril<br />&nbsp; &nbsp; &nbsp;<strong>-</strong> &Agrave; la po&ecirc;le&nbsp;<br />&nbsp; &nbsp; <strong>&nbsp;- </strong>Au barbecue</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/133\">Longe de boeuf</a>, <a href=\"../../../../products/show/66\">C&ocirc;te de boeuf</a>, <a href=\"../../../../products/show/60\">Entrec&ocirc;te de boeuf</a>, <a href=\"../../../../products/show/58\">Plat de c&ocirc;tes</a>, <a href=\"../../../../products/show/45\">Pot-au-Feu de boeuf</a>&hellip; !</strong></p>', 'file_9a503afd90a06be03de372006f983c4a.jpg', '2021-04-20 16:51:03', '2021-09-21 08:08:10', 1, NULL, 'L’entrecôte est considéré comme l’un des meilleurs morceaux de bœuf à griller préparé avec une marinade.', 'Entrecôte de boeuf marinée ', 'Entrecôte de boeuf marinée ', 205, 0, 1, 22.8, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(70, 0, '70', 3, 'Kefta de Bœuf ', 0, 10.9, 10.9, '0.500', NULL, '<p><strong>Go Ferme Halal</strong> vous propose Kefta, &agrave; base de viande de b&oelig;uf tendre et tr&egrave;s parfum&eacute;e.</p>\n<p>Ces boulettes de viande kefta sont un m&eacute;lange de viandes hach&eacute;es de b&oelig;uf agr&eacute;ment&eacute; d&rsquo;&eacute;pices 100 % halal et de qualit&eacute; sup&eacute;rieure.&nbsp;</p>\n<p>&Agrave; d&eacute;guster chaudes ou ti&egrave;des lors d&rsquo;un buffet ou accompagn&eacute;es de boulgour, de riz ou de semoule, nos kefta de b&oelig;uf raviront certainement vos convives !</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/242\">Merguez de boeuf</a>, <a href=\"../../../../products/show/230\">Bifteck hach&eacute; boeuf</a>, <a href=\"../../../../products/show/65\">Viande hach&eacute;e</a>, <a href=\"../../../../products/show/63\">Steak hach&eacute;</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_9822fd4f3befe21af323a81ca4de3124.jpg', '2021-04-20 16:51:03', '2021-09-14 11:44:17', 1, NULL, ' La Kefta c\'est des boulettes de viande hachée à préparer avec des épices.', 'Kefta ', 'Kefta ', 213, 0, 1, 13.08, 20, 0, 0, 2, 1, 0, 9, 0, 0, 0, 0, 1, 1, '500 g ', '', 0, NULL, 6, NULL),
(71, 0, '71', 3, 'Brochette de Bœuf ', 0, 17.9, 17.9, '0.110', NULL, '<p><strong>Go Ferme Halal </strong>vous propose des brochettes de b&oelig;uf, issues d&rsquo;une viande fra&icirc;che, de qualit&eacute; sup&eacute;rieure.</p>\n<p><strong>Mode et temps de pr&eacute;paration :</strong></p>\n<p>Les brochettes sont fra&icirc;ches et pr&ecirc;tes &agrave; l\'emploi !&nbsp;</p>\n<p>Selon la cuisson souhait&eacute;e et vos convives, vous pouvez pr&eacute;parer vos brochettes d&rsquo;agneau :</p>\n<p>&nbsp; &nbsp;<strong> &nbsp;-</strong> &Agrave; la grille<br />&nbsp; &nbsp;<strong> &nbsp;-&nbsp;</strong>Au barbecue<br />&nbsp; &nbsp; <strong>&nbsp;-</strong>&nbsp;Au four<br />&nbsp; &nbsp; <strong>&nbsp;-</strong>&nbsp;&Agrave; la plancha</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits : <strong><a href=\"../../../../products/show/232\">Brochettes de boeuf Nature</a>, <a href=\"../../../../products/show/231\">Brochettes de boeuf marin&eacute;es</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>, <a href=\"../../../../products/show/63\">Steak hach&eacute;</a>&hellip; !</strong></p>', NULL, '2021-04-20 16:51:04', '2021-09-14 11:43:32', 0, NULL, 'Une brochette, en cuisine, désigne une fine tige en métal ou en bois sur laquelle sont enfilés des morceaux de viande .', 'Brochette de boeuf ', 'Brochette de boeuf ', 207, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(72, 0, '72', 2, 'Selle d\'Agneau ', 0, 14, 14, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose une selle d\'agneau : une viande tendre et de qualit&eacute;.&nbsp;Il s\'agit d\'un morceau provenant de la partie post&eacute;rieure de l&rsquo;agneau. Plus pr&eacute;cis&eacute;ment, c&rsquo;est le quartier ant&eacute;rieur reliant le gigot aux c&ocirc;tes.</p>\n<p>Nous vous assurons un morceau particuli&egrave;rement int&eacute;ressant en cuisine pour pr&eacute;parer des<a href=\"../../../../pages/show/14-nos-recettes\"> <strong>recettes</strong></a> savoureuses, qui raviront vos convives.</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/149\">C&ocirc;te secondaire d&rsquo;agneau</a>, <a href=\"../../../../products/show/150\">C&ocirc;te premi&egrave;re d&rsquo;agneau</a>, <a href=\"../../../../products/show/166\">Langue d&rsquo;agneau</a>, <a href=\"../../../../products/show/89\">Mouton entier</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_540eb08b2fe31597193d7ec537d2a62c.jpg', '2021-04-20 16:51:04', '2021-09-15 09:47:24', 1, NULL, 'Chez l\'agneau et le mouton, la selle désigne la partie haute de la cuisse. Petit précis de langage : en boucherie, c\'est le quartier postérieur allant des côtes au gigot. La selle complète est l\'ensemble des deux carrés d\'agneau, de part et d\'autre de la ', 'Selle d\'agneau ', 'Selle d\'agneau ', 83, 0, 0, 16.8, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(73, 0, '73', 2, 'Souris d\'Agneau ', 0, 15, 15, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose une souris d&rsquo;agneau de qualit&eacute; : un morceau particuli&egrave;rement tendre et savoureux. Sa chair est aussi g&eacute;latineuse et particuli&egrave;rement moelleuse.</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; vous procurer plusieurs souris afin que tout le monde puisse en profiter !</p>\n<p>Optez pour un morceau id&eacute;al pour repas entre amis et en famille, un succ&egrave;s garanti !</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/149\">C&ocirc;te secondaire d&rsquo;agneau</a>, <a href=\"../../../../products/show/150\">C&ocirc;te premi&egrave;re d&rsquo;agneau</a>, <a href=\"../../../../products/show/166\">Langue d&rsquo;agneau</a>, <a href=\"../../../../products/show/89\">Mouton entier</a>&hellip; !</strong></p>', 'file_52e8ff3212fc5ddba745576b746eb5bb.jpg', '2021-04-20 16:51:04', '2021-09-15 09:56:15', 1, NULL, 'La souris d\'agneau est un morceau de viande constitué par le muscle qui entoure le tibia de la patte arrière de l\'agneau, sous le gigot. Le terme de souris fait référence à sa forme ovale. Sa chair gélatineuse et moelleuse se prête aux recettes braisées', 'Souris d\'agneau ', 'Souris d\'agneau d\'agneau ', 84, 0, 1, 18, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(74, 0, '74', 2, 'Tranches De Gigot d\'Agneau ', 0, 14, 14, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose une tranche de gigot d\'agneau de qualit&eacute; : une viande fra&icirc;che et tendre.&nbsp;</p>\n<p>Ce morceau sera appr&eacute;ci&eacute; par les amateurs de bonne viande !</p>\n<p>Retrouvez les vraies saveurs de la tendresse dans vos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> savoureuses et gourmandes.</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/239\">Gigot dessos&eacute;</a>, <a href=\"../../../../products/show/75\">Gigot raccourci</a>, <a href=\"../../../../products/show/76\">Gigot entier</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_674fb427dae9bd5c3ab218423fd953aa.jpg', '2021-04-20 16:51:04', '2021-09-15 09:56:53', 1, NULL, 'Tranches de gigot d\'agneau : Voilà la partie-phare de l\'agneau, le fameux gigot, qui correspond au membre postérieur de l\'animal et qui est tout simplement la partie la plus consommée de l\'agneau', 'Tranches de gigot d\'agneau ', 'Tranches de gigot d\'agneau  ', 208, 0, 1, 16.8, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(75, 0, '75', 2, 'Gigot Raccourci d\'Agneau', 0, 13, 13, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose un gigot raccourci, issu d&rsquo;une viande savoureuse et tr&egrave;s parfum&eacute;e. Ce morceau est situ&eacute; dans le prolongement des c&ocirc;tes filet, dans la partie post&eacute;rieure de l&rsquo;agneau.&nbsp;</p>\n<p>Tellement d&eacute;licieux ce gigot raccourci est parfait pour pr&eacute;parer des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> qui raviront vos convives.</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/239\">Gigot dessos&eacute;</a>, <a href=\"../../../../products/show/76\">Gigot entier</a>, <a href=\"../../../../products/show/74\">Tranches de Gigot d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_f72a0e184a641c1d747193dbe333271f.jpg', '2021-04-20 16:51:04', '2021-09-15 09:56:44', 1, NULL, 'Le poids d\'un gigot raccourci correspond aux 4/5ème environ du poids d\'un gigot entier. La selle se cuit entière, au four, comme un rôti.', 'Gigot raccourci', 'Gigot raccourci ', 208, 1, 0, 15.6, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(76, 0, '76', 2, 'Gigot Entier d\'Agneau', 0, 14, 14, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose un gigot entier provenant d&rsquo;une viande tendre et savoureuse.</p>\n<p>En effet, la viande est issue d&rsquo;agneau, &eacute;lev&eacute; sous m&egrave;re, en plein air dans la nature et avec une alimentation bio. Il s&rsquo;agit d&rsquo;une viande certifi&eacute;e du <em>Label Rouge.</em></p>\n<p>Nous vous proposons un morceau riche en vitamine.</p>\n<p>Pr&eacute;parez une multitude de <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> qui raviront vos convives ! Ce gigot entier est &agrave; &ecirc;tre cuire plusieurs fa&ccedil;ons &agrave; savoir :&nbsp;</p>\n<p>&nbsp; &nbsp; &nbsp; <strong>-</strong> Rago&ucirc;t<br />&nbsp; &nbsp; &nbsp;<strong> -</strong> Tajine<br />&nbsp; &nbsp; &nbsp;<strong> -</strong> R&ocirc;ti apr&egrave;s d&eacute;sossage&nbsp;<br />&nbsp; &nbsp; &nbsp; <strong>- </strong>Au barbecue</p>\n<p><strong>Mode et temps de pr&eacute;paration :&nbsp;</strong></p>\n<p><strong>&nbsp; &nbsp; &nbsp; - </strong>Le gigot d&rsquo;agneau doit cuire sans aucune mati&egrave;re grasse&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp; -</strong> La chair du gigot d&rsquo;agneau se marrie parfaitement avec le go&ucirc;t de l&rsquo;ail<br /><strong>&nbsp; &nbsp; &nbsp; - </strong>Le gigot d&rsquo;agneaux doit cuire &agrave; feu vif<br /><strong>&nbsp; &nbsp; &nbsp; - </strong>Il faut prot&eacute;ger le gigot d&rsquo;agneau &agrave; mi-cuisson par un papier d&rsquo;aluminium, afin d&rsquo;&eacute;viter&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;que l&rsquo;ext&eacute;rieur ne soit trop br&ucirc;l&eacute;<br /><strong>&nbsp; &nbsp; &nbsp; -</strong> Ne saler les morceaux qu&rsquo;au moment de la d&eacute;coupe</p>\n<p><strong>Conditionnement :&nbsp;</strong></p>\n<p>Sous vide dans son emballage&nbsp;</p>\n<p><strong>Date limite de consommation :&nbsp;</strong></p>\n<p>Entre 8 et 10 jours</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/239\">Gigot dessos&eacute;</a>, <a href=\"../../../../products/show/75\">Gigot raccourci</a>, <a href=\"../../../../products/show/74\">Tranches de Gigot d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-04-20 16:51:04', '2021-09-15 09:56:42', 1, NULL, 'Le gigot entier se compose du gigot raccourci et de la selle, partie haute de la hanche. Il ne faut pas confondre la selle du gigot avec la selle anglaise, c\'est-à-dire le filet. La selle de gigot doit toujours être désossée et ficelée.', 'Gigot entier ', 'Gigot entier  ', 208, 0, 1, 16.8, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(77, 0, '77', 2, 'Collier d\'Agneau', 0, 12.9, 12.9, '1', NULL, '<p><strong>Go Ferme Halal</strong><strong> </strong><span style=\"font-weight: 400;\">vous propose un collier d\'agneau qui parvient d&rsquo;une viande tendre, tr&egrave;s parfum&eacute;e, mais &eacute;galement savoureuse. En effet, les viandes sont issues d&rsquo;agneaux, &eacute;lev&eacute;s sous m&egrave;re, en plein air dans la nature et avec une alimentation 100 % bio.</span></p>\n<p><span style=\"font-weight: 400;\">Nous avons choisi pour vous un morceau pour pr&eacute;parer <strong><a href=\"../../../../pages/show/14-nos-recettes\">des recettes</a> </strong>avec un go&ucirc;t particulier, qui raviront vos convives.</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents </span><strong>produits</strong><span style=\"font-weight: 400;\">&nbsp;: </span><a href=\"../../../../products/show/149\"><strong>C&ocirc;te secondaire d&rsquo;agneau</strong></a><strong>, </strong><a href=\"../../../../products/show/150\"><strong>C&ocirc;te premi&egrave;re d&rsquo;agneau</strong></a><strong>, </strong><a href=\"../../../../products/show/153-agneau-entier\"><strong>Mouton entier</strong></a><span style=\"font-weight: 400;\">&hellip; !</span></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', 'file_50f59e1aa57a7058e2bbc3917ab21270.jpg', '2021-04-20 16:51:04', '2021-09-15 09:40:02', 1, NULL, 'Le collier d\'agneau est un morceau charnu, économique et savoureux. C\'est le cou de l\'animal et il pèse environ 1 kg. Très osseux, il donne un jus gélatineux lorsqu\'il mijote longuement', 'Collier d\'agneau ', 'Collier d\'agneau ', 189, 1, 1, 15.48, 20, 0, 0, 2, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(78, 0, '78', 2, 'Côtes Filet d\'Agneau ', 0, 14, 14, '1', NULL, '<p><strong>Go Ferme Halal</strong><strong> </strong><span style=\"font-weight: 400;\">vous propose</span><strong> </strong><span style=\"font-weight: 400;\">des C&ocirc;tes filet d\'agneau extr&ecirc;mement tendre et savoureux.</span></p>\n<p><span style=\"font-weight: 400;\">Ces c&ocirc;tes filet sont issues d\'agneaux &eacute;lev&eacute;s en bergerie et en plein air, nourris sans OGM.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Ce morceau est tr&egrave;s savoureux et il accepte une cuisson ros&eacute;e.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents </span><a href=\"../../../../categories\"><strong>produits</strong></a><span style=\"font-weight: 400;\">&nbsp;: </span><strong><a href=\"../../../../products/show/149\">C&ocirc;te secondaire d&rsquo;agneau</a>, </strong><a href=\"../../../../products/show/150\"><strong>C&ocirc;te premi&egrave;re d&rsquo;agneau</strong></a><strong>, </strong><a href=\"../../../../products/show/166\"><strong>Langue d&rsquo;agneau</strong></a><strong>, </strong><a href=\"../../../../products/show/153-agneau-entier\"><strong>Mouton entier</strong></a><strong>, </strong><strong><a href=\"../../../../products/categorie/101-epices\">&Eacute;pices</a>&hellip;</strong><span style=\"font-weight: 400;\"> !</span></p>', 'file_c934b954c9e63715cc6aece24521f9a2.jpg', '2021-04-20 16:51:04', '2021-09-15 09:38:54', 1, NULL, 'La côte filet d\'agneau se situe à proximité de la selle et du gigot entier, du haut de côtes et de la poitrine. Cette côte ne comporte pas de manche, sa noix est maigre et est suivie du filet. La côte filet est fixée à la colonne vertébrale.', 'Côtes filet d\'agneau', 'Côtes filet d\'agneau', 190, 1, 1, 16.8, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(79, 0, '79', 2, 'Steak Haché d\'Agneau ', 0, 32, 32, '0.500', NULL, '<p><strong>Go Ferme Halal </strong>vous propose un steak hach&eacute; d\'agneau frais et de qualit&eacute;, issu d&rsquo;une viande locale, tendre et fra&icirc;che. Les agneaux proviennent d&rsquo;&eacute;levages naturels, en plein air.&nbsp;</p>\n<p>Nos steaks hach&eacute;s d\'agneau vous feront r&eacute;galer. Pour une <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recette</strong></a> simple et d&eacute;licieuses, accompagnez vos steak de pomme de terre ou en hamburger !</p>\n<p>Nous vous assurons un steak hach&eacute; d&rsquo;excellentes valeurs nutritives, sa viande d&rsquo;agneau s&rsquo;appr&ecirc;te de plusieurs fa&ccedil;ons :&nbsp;</p>\n<p>&nbsp; &nbsp; <strong>- <a href=\"../../../../products/show/76\">Gigot d&rsquo;agneau</a></strong><br />&nbsp; &nbsp; <strong>- <a href=\"../../../../products/show/84\">Poitrine d\'agneau</a></strong>&nbsp; &nbsp;<br />&nbsp; &nbsp; <strong>- <a href=\"../../../../products/show/238\">Epaule d&rsquo;agneau</a>&nbsp;</strong></p>\n<p>&nbsp;</p>', 'file_11e97db9e9fe96ad3fa36345095e645e.jpg', '2021-04-20 16:51:04', '2021-09-14 13:01:16', 1, NULL, 'Pour un burger au goût parfumé, notre steak haché d\'agneau Biolal, fondant et savoureux, est préparé dans un morceau maigre.', 'Steak haché d\'agneau ', 'Steak haché d\'agneau ', 90, 1, 1, 38.4, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '500 g ', '', 0, NULL, 6, NULL),
(80, 0, '80', 2, 'Sauté d\'Agneau ', 0, 36, 36, '0.5', NULL, '<p><strong>&nbsp; &nbsp; Go Ferme Halal</strong> vous propose un saut&eacute; d&rsquo;agneau frais et issu d&rsquo;une viande locale et 100 % bio et qui convient &agrave; la cuisson rapide comme lente, au four comme au grill.&nbsp;</p>\n<p>Ce saut&eacute; d&rsquo;agneau fera bien des envieux, issue d&rsquo;une viande d&eacute;licieusement go&ucirc;teuse et fine.</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits :<strong><a href=\"../../../../products/show/165\"> Cervelle d\'agneau</a>, <a href=\"../../../../products/show/156\">Foie d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', 'file_511785d0cd9f632d31bf293928cc825b.jpg', '2021-04-20 16:51:04', '2021-09-14 13:01:54', 1, NULL, 'Ces morceaux d\'agneau coupé sans os dans l\'épaule  sont  idéal , pour vos ragouts, tajines, navarins et couscous.', 'Sauté d\'agneau ', 'Sauté d\'agneau ', 91, 1, 1, 43.2, 20, 0, 0, 1, 1, 0, 9, 2, 1, 1, 1, 1, 1, '500 g ', '', 1, NULL, 6, NULL),
(81, 0, '81', 2, 'Agneau demi coupé ', 143, 23, 0, '8', NULL, '<p><span style=\"font-weight: 400;\"><strong>Go Ferme Halal</strong> vous propose un agneau demi coup&eacute; de qualit&eacute; et 100 % bio.</span></p>\n<p><span style=\"font-weight: 400;\">Pour la d&eacute;coupe, nous emballons s&eacute;par&eacute;ment&nbsp;:</span></p>\n<p><span style=\"font-weight: 400;\">&nbsp; <strong>&nbsp; &nbsp;-</strong> Les c&ocirc;tes<br />&nbsp; <strong>&nbsp; &nbsp;-</strong> Le gigot<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> L&rsquo;&eacute;paule&nbsp;<br />&nbsp; &nbsp;<strong> &nbsp;-</strong> La fricass&eacute;e<br /></span></p>\n<p><span style=\"font-weight: 400;\">Cet agneau demi-coup&eacute; est l\'&eacute;quilibre parfait entre finesse et go&ucirc;t.</span></p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/82\">Agneau entier d&eacute;coup&eacute;</a></strong></span><span style=\"font-weight: 400;\">, <strong><a href=\"../../../../products/show/85-epaule-dagneau-avec-os\">Epaule d\'agneau (avec os )</a></strong>, <strong>&nbsp;<a href=\"../../../../products/show/75-gigot-raccourci\">Gigot d\'agneau raccourci &hellip;</a></strong></span><strong>&nbsp;!</strong></p>\n<p><span style=\"font-weight: 400;\">Pour avoir plus d&rsquo;information sur les articles propos&eacute;s par <strong>Go Ferme Halal</strong> ou encore sur les modalit&eacute;s de </span><strong>livraison</strong><span style=\"font-weight: 400;\">, n&rsquo;h&eacute;sitez pas &agrave; nous </span><strong>contacter</strong><span style=\"font-weight: 400;\">&nbsp;!</span></p>', NULL, '2021-04-20 16:51:04', '2021-04-22 13:26:30', 0, NULL, 'La partie antérieure de la carcasse habillée d\'agneau qui est séparée du demi-arrière par une coupe qui longe la courbure naturelle entre la onzième (11e) et la douzième (12e) côte.', 'Agneau demi coupé ', 'Agneau demi coupé ', 161, 1, 1, 23, 0, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(82, 0, '82', 2, 'Agneau entier découpé', 262, 17, 17, '15', NULL, '<p><span style=\"font-weight: 400;\"><strong>Go Ferme Halal</strong> vous propose un agneau entier d&eacute;coup&eacute; de haute qualit&eacute;. Cet agneau est &eacute;lev&eacute; en plein air, sous la m&egrave;re et avec une alimentation saine et naturelle.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Fa&ccedil;on m&eacute;choui (Pr&ecirc;t &agrave; cuire). Animation garantie pour vos convives&nbsp;!</span></p>\n<p><strong>Date limite de consommation&nbsp;:&nbsp;</strong></p>\n<p><span style=\"font-weight: 400;\">Entre 4 et 5 jours</span></p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/81\">Agneau demi coup&eacute;</a></strong> </span><span style=\"font-weight: 400;\">, </span><a href=\"../../../../products/show/74-tranches-de-gigot-dagneau\"><strong>Tranches de gigot d\'agneau ..</strong></a><strong>&nbsp;!</strong></p>\n<p><span style=\"font-weight: 400;\">Pour avoir plus d&rsquo;information sur les articles propos&eacute;s par <strong>Go Ferme Halal </strong>ou encore sur les modalit&eacute;s de </span><strong>livraison</strong><span style=\"font-weight: 400;\">, n&rsquo;h&eacute;sitez pas &agrave; nous </span><strong>contacter</strong><span style=\"font-weight: 400;\">&nbsp;!</span></p>', 'file_9e1710f8af3683e954b33ce3747c183b.jpg', '2021-04-20 16:51:04', '2021-09-15 09:21:00', 0, NULL, 'Agneau entier découpé  : l\'agneau est découpé comme suit :  -2 gigots avec os -2 épaules avec os -2 carré de côtes -Côtelettes par 4 sous vide -Sauté d\'agneau par 500g -Abats à part', 'Agneau entier découpé ', 'Agneau entier découpé ', 161, 1, 1, 17, 0, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(83, 0, '83', 2, 'Côtelettes d’Agneau ', 0, 14.9, 16.39, '1', NULL, '<p><span style=\"font-weight: 400;\"><strong>Go Ferme Halal </strong>vous propose des c&ocirc;telettes d\'agneau 100 % halal.</span></p>\n<p><span style=\"font-weight: 400;\">Nous vous garantissons une viande tendre, savoureuse,&nbsp; et tr&egrave;s parfum&eacute;e &agrave; la fois.</span></p>\n<p><span style=\"font-weight: 400;\">Pr&eacute;parez des </span><a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a><span style=\"font-weight: 400;\"> d&eacute;licieuses&nbsp;! Nos c&ocirc;telettes d&rsquo;agneau sont tr&egrave;s faciles &agrave; cuire&nbsp;:</span></p>\n<p><span style=\"font-weight: 400;\">&nbsp; &nbsp; <strong>&nbsp;- </strong>&Agrave; la po&ecirc;le<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> Au four<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> En cocotte&nbsp;<br />&nbsp; &nbsp; &nbsp;<strong>-</strong> Au barbecue</span></p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits&nbsp;: </span><strong><a href=\"../../../../products/show/150\">C&ocirc;tes premi&eacute;res</a></strong><span style=\"font-weight: 400;\">, <strong><a href=\"../../../../products/show/149\">C&ocirc;tes secondaires</a></strong></span><strong>&nbsp;</strong><span style=\"font-weight: 400;\">, <strong><a href=\"../../../../products/show/148\">C&ocirc;tes d&eacute;couvertes</a></strong></span><strong>&nbsp;</strong><span style=\"font-weight: 400;\">&hellip;&nbsp;!</span></p>', 'file_0750fd2091ae049f57e4981bf4355e7e.jpg', '2021-04-20 16:51:04', '2021-09-15 09:35:09', 1, NULL, 'Côtelettes d’agneau  Délicatement recouvertes de graisse, les côtes d\'agneau sont fondantes et parfumées. Leur goût à la fois généreux, sauvage et raffiné fait le bonheur des connaisseurs. On distingue les côtelettes découvertes des côtes premières ', 'Côtelettes d’agneau ', 'Côtelettes d’agneau ', 190, 1, 1, 17.88, 20, 10, 0, 2, 2, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(84, 0, '84', 2, 'Poitrine d\'Agneau ', 0, 8.5, 9.35, '0.5', NULL, '<p><strong>Go Ferme Halal</strong> vous propose une poitrine d&rsquo;agneau frais et de qualit&eacute;, issue de viande d&rsquo;agneau halal et 100 % bio.&nbsp;</p>\n<p>C\'est un morceau qui fait partie basse du corps&nbsp;</p>\n<p>Pour un go&ucirc;t d&eacute;licieux, pr&eacute;parez votre poitrine d&rsquo;agneau au four : une <strong><a href=\"../../../../pages/show/14-nos-recettes\">recette</a> </strong>simple, rapide, mais aussi savoureuse !</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits :<strong> <a href=\"../../../../products/show/165\">Cervelle d\'agneau</a>, <a href=\"../../../../products/show/156\">Foie d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_073b8e3cad336456c9d08b894ad5b012.jpg', '2021-04-20 16:51:04', '2021-09-15 09:47:35', 1, NULL, 'La poitrine d\'agneau est un morceau qui ne nécessite pas un gros budget à l\'achat, cette viande se situe sur la partie basse de l\'animal. Elle se compose essentiellement de muscles de l\'abdomen et se savoure aussi bien mijotée en hiver, que grillée en été', 'Poitrine d\'agneau', 'Poitrine d\'agneau ', 95, 1, 1, 10.2, 20, 10, 0, 2, 2, 0, 9, 1, 1, 1, 1, 1, 1, '500 g ', '', 0, NULL, 6, NULL),
(85, 0, '85', 2, 'Epaule d\'Agneau (avec os) ', 0, 13.9, 15.29, '1.7', NULL, '<p><span style=\"font-weight: 400;\"><strong>Go Ferme Halal</strong> vous propose une &eacute;paule d\'agneau avec os : une viande d&eacute;licieuse et fine que vous allez adorer !</span></p>\n<p><span style=\"font-weight: 400;\">Elle convient autant&nbsp;:</span></p>\n<p>&nbsp; &nbsp; &nbsp;<strong>- </strong>&Agrave; la cuisson rapide&nbsp;<br />&nbsp; &nbsp; &nbsp;<strong>- </strong>&Agrave; la cuisson lente<br />&nbsp; &nbsp; &nbsp;<strong>- </strong>Au four comme au grill</p>\n<p><span style=\"font-weight: 400;\">Cette Epaule d\'agneau (avec os) vous offre des saveurs d\'exception dans vos<a href=\"../../../../pages/show/14-nos-recettes\"> </a></span><a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a><span style=\"font-weight: 400;\">.</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/86\">Epaule d\'agneau ( sans os)</a></strong></span><span style=\"font-weight: 400;\">, </span><span style=\"font-weight: 400;\"><strong><a href=\"../../../../products/show/76\">Gigot entier</a>, <a href=\"../../../../products/show/73-souris-dagneau\">Souris d\'agneau</a></strong></span><span style=\"font-weight: 400;\">&hellip;&nbsp;!</span></p>\n<p>&nbsp;</p>', 'file_bba06f3ab580b56fd26909bfb9813821.jpg', '2021-04-20 16:51:04', '2021-09-24 15:32:40', 1, NULL, 'Bien que moins charnue, sa chair est tout aussi délicate que celle du gigot. - Désossée, elle forme une masse large et de faible épaisseur. Sa forme aplatie permet de l\'enduire facilement de farce', 'Epaule d\'agneau (avec os)', 'Epaule d\'agneau (avec os) ', 196, 1, 1, 16.68, 20, 10, 0, 2, 2, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(86, 0, '86', 2, 'Epaule d\'Agneau Désossée ', 0, 15, 16.5, '1', NULL, '<p><span style=\"font-weight: 400;\"><strong>Go Ferme Halal </strong>vous propose une &eacute;paule d\'agneau d&eacute;soss&eacute;e, issue de viande d&rsquo;agneau&nbsp; frais et 100 % locale.</span></p>\n<p><span style=\"font-weight: 400;\">Optez &eacute;paule d\'agneau pour une soigneusement d&eacute;soss&eacute;e&nbsp;!&nbsp;</span></p>\n<p><strong>Mode et temps de pr&eacute;paration</strong></p>\n<p><span style=\"font-weight: 400;\">Vous pouvez pr&eacute;parer plusieurs </span><a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a><span style=\"font-weight: 400;\"> en utilisant l&rsquo;&eacute;paule d\'agneau d&eacute;soss&eacute;e et &agrave; maintes occasions :</span></p>\n<p><span style=\"font-weight: 400;\">&nbsp; &nbsp;<strong> &nbsp;-</strong> En r&ocirc;ti<br />&nbsp; &nbsp; <strong>&nbsp;-</strong> En saut&eacute;&nbsp;<br />&nbsp; &nbsp;<strong> &nbsp;-</strong> &Agrave; la plancha finement tranch&eacute;e</span></p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits :<strong> <a href=\"../../../../products/show/85\">Epaule d\'agneau( Avec Os)</a></strong></span><span style=\"font-weight: 400;\">, </span><span style=\"font-weight: 400;\"><strong><a href=\"../../../../products/show/76\">Gigot entier</a>, <a href=\"../../../../products/show/73-souris-dagneau\">Souris d\'agneau</a></strong></span><span style=\"font-weight: 400;\">&hellip;&nbsp;!</span></p>', 'file_3f01a6877b1e4080e84521785ea5c5fb.jpg', '2021-04-20 16:51:04', '2021-09-15 09:59:23', 1, NULL, 'Sa chair contenant un peu de gras est moins fibreuse que celle du gigot , et reste moelleuse et fondante après cuisson. Quelque soit sa préparation le résultat est toujours savoureux.', 'Epaule d\'agneau désossée ', 'Epaule d\'agneau désossée ', 196, 1, 1, 18, 20, 10, 0, 2, 2, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(87, 0, '87', 2, 'Brochette d\'Agneau BIO', 0, 39.9, 43.89, '0.110', NULL, '<p><span style=\"font-weight: 400;\">&nbsp;<strong> &nbsp; Une brochette </strong>de viande d\'agneau <strong>Bio</strong>, ces morceaux sont en g&eacute;n&eacute;ral du gigot que l\'on peut compl&eacute;ter avec des tranches d\'oignons ou poivrons bio.</span></p>\n<p><span style=\"font-weight: 400;\">Issue d\'agneaux Bio au go&ucirc;t exceptionnel, la brochette d\'agneaux BIO va vous &eacute;pater !</span></p>\n<p><span style=\"font-weight: 400;\">Pour apporter une touche orientale, assaisonnez la brochette avec nos </span><strong><a href=\"../../../../products/categorie/101-epices\">&eacute;pices</a> </strong><span style=\"font-weight: 400;\">de qualit&eacute;.</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/90\">Brochette d\'agneau</a>, <a href=\"../../../../products/show/91\">Brochette d\'agneau Label rouge</a></strong></span><span style=\"font-weight: 400;\">&hellip;&nbsp;!</span></p>', NULL, '2021-04-20 16:51:04', '2021-09-15 09:56:01', 0, NULL, 'Les morceaux de viande d\'agneau , provenant d\'un tendre gigot d\'agneau, sont piqués sur des bâtonnets en bois avec des morceaux d\'oignon. Parfaites pour le barbecue.', 'Brochette d\'agneau', 'Brochette d\'agneau ', 100, 1, 1, 47.88, 20, 10, 0, 1, 2, 0, 9, 1, 1, 1, 1, 1, 0, '110 g ', '', 0, NULL, 6, NULL),
(89, 0, '', 230, 'Certifié AVS', 110, NULL, 0, '30', NULL, '<p><strong>Go Ferme Halal</strong> vous propose en ligne la vente des moutons vivants, s&eacute;lectionn&eacute;s soigneusement des meilleurs bouchers et &eacute;leveurs locaux.</p>\n<p><strong>Go Ferme Halal </strong>vous propose une gamme d&rsquo;animaux vivants, aussi bien m&acirc;les que femelles, &agrave; des niveaux tarifaires diff&eacute;rents suivant les niveaux &nbsp;g&eacute;n&eacute;tiques certifi&eacute;s par l&rsquo;organisme de s&eacute;lection.</p>\n<p style=\"text-align: center;\"><strong>Faites don de votre sacrifice &agrave; une association !</strong></p>\n<p>Nous mettons un point d&rsquo;honneur &agrave; travailler main dans la main avec de nombreuses associations partenaires. N&rsquo;h&eacute;sitez plus : Nos associations comptent sur vos !&nbsp;</p>\n<p>Disponible &eacute;galement, en vente en ligne, l\'&eacute;paule d\'agneau, <strong><a href=\"../../../../products/show/165\">Cervelle d\'agneau</a>,<a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>, <a href=\"../../../../products/show/153-agneau-entier\">Agneau entier,</a> <a href=\"../../../../products/show/82\">Agneau entier d&eacute;coup&eacute;</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>\n<p>Tous nos produits sont livr&eacute;s &agrave; domicile dans le respect de la cha&icirc;ne du froid, en un jour ouvr&eacute; apr&egrave;s l\'exp&eacute;dition.</p>\n<p>Pour avoir plus d&rsquo;information sur les articles propos&eacute;s par<strong> Go Ferme Halal</strong>, n&rsquo;h&eacute;sitez pas &agrave; nous<strong> contacter</strong> !</p>', 'file_39b42440ac3285ded15dbfc575728674.jpeg', '2021-06-01 04:14:30', '2021-06-01 04:49:13', 1, NULL, '', '', '', 231, 0, 0, 132, 20, 0, 0, 1, 1, 1, 9, 0, 0, 0, 0, 1, 1, '', '', 1, NULL, NULL, NULL),
(90, 0, '90', 2, 'Brochette d\'Agneau', 0, 17.9, 19.69, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose des d&eacute;licieuses brochettes d\'agneau !</p>\n<p>Soucieux de votre satisfaction, nous vous assurons une viande tendre et gracieuse.&nbsp;</p>\n<p>Cuisinez nos brochettes d\'agneau selon vos envies&hellip; !&nbsp;</p>\n<p>Afin de donner encore plus de go&ucirc;t, marinez vos brochettes d&rsquo;agneau avant cuisson pendant quelques heures !</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/165\">Cervelle d\'agneau</a>, <a href=\"../../../../products/show/156\">Foie d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', 'file_6ab5ba8b563a678277ccf8ac25cb462e.jpg', '2021-06-01 17:09:27', '2021-09-24 15:30:22', 1, NULL, 'Les morceaux de viande d\'agneau , provenant d\'un tendre gigot d\'agneau, sont piqués sur des bâtonnets en bois avec des morceaux d\'oignon. Parfaites pour le barbecue.', 'Brochette d\'agneau', 'Brochette d\'agneau ', 100, 1, 1, 21.48, 20, 10, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '110 g ', '', 0, NULL, 6, NULL),
(91, 0, '91', 2, 'Brochette d\'Agneau Label Rouge', 0, 19.9, 21.89, '1', NULL, '<p><span style=\"font-weight: 400;\"><strong>&nbsp; &nbsp; &nbsp;D&eacute;gustez</strong> nos brochettes d\'agneau <em>Label rouge&nbsp;!</em> Nos brochettes sont uniquement pr&eacute;par&eacute;es avec des viandes halal et de hautes qualit&eacute;s.</span></p>\n<p><span style=\"font-weight: 400;\">Tous nos &eacute;leveurs sont<em> Label Rouge&nbsp;!</em> Ce qui garantit une viande fondante et d&eacute;licate avec une chair claire et sans go&ucirc;t fort, mais &eacute;galement une graisse ferme, blanche, bien r&eacute;partie et non huileuse.</span></p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres produits&nbsp;: </span><span style=\"font-weight: 400;\"><strong><a href=\"../../../../products/show/90\">Brochette d\'agneau</a>, <a href=\"../../../../products/show/87\">Brochette d\'agneau BIO</a></strong></span><span style=\"font-weight: 400;\">&hellip;</span></p>\n<p>&nbsp;</p>', NULL, '2021-06-01 17:12:34', '2021-09-24 15:30:09', 0, NULL, 'Les morceaux de viande d\'agneau , provenant d\'un tendre gigot d\'agneau, sont piqués sur des bâtonnets en bois avec des morceaux d\'oignon. Parfaites pour le barbecue.', 'Brochette d\'agneau', 'Brochette d\'agneau ', 100, 0, 1, 23.88, 20, 10, 0, 1, 2, 0, 9, 2, 2, 2, 2, 1, 0, '', '', 0, NULL, 6, NULL),
(93, 0, '93', 101, 'Curcuma 100g - El Morjane ', 0, 1.64, 1.64, '0.1', NULL, '<p>Curcuma est appr&eacute;ci&eacute; pour sa jolie couleur jaune qu\'elle donne aux plats ainsi que son gout piquant.</p>\n<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient : </strong>Curcuma.</p>\n<p>&nbsp;</p>', 'file_2d2ae6e2033630bfa10d0e19d2987dee.jpg', '2021-08-03 14:10:41', '2021-08-09 20:54:16', 1, NULL, 'Curcuma est apprécié pour sa jolie couleur jaune qu\'elle donne aux plats et son gout piquant', 'Curcuma ', 'Curcuma ', 102, 1, 1, 1.968, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(94, 0, '94', 101, 'Cumin Moulu 100g - El Morjane', 0, 1.45, 1.45, '0.1', NULL, '<p>Le cumin est une &eacute;pice tr&egrave;s utilisable en cuisine qui poss&egrave;de une l&eacute;g&egrave;re amertume et un peu piquant.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Cumin.</p>\n<p>&nbsp;</p>', 'file_87625b6ebf95fa8bd89ce7e3d59e684b.jpg', '2021-08-03 14:27:14', '2021-08-09 20:53:18', 1, NULL, 'Le cumin est une épice très utilisable en cuisine qui possède une légère amertume et il est un peu piquant', 'Cumin', 'Cumin', 102, 1, 1, 1.74, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(95, 0, '95', 101, 'Poivre Noir Entier 100g - El Morjane', 0, 1, 1, '0.1', NULL, '<p>Le poivre noir est consid&eacute;r&eacute; le plus aromatique des &eacute;pices, avec sa touche piquante il rel&egrave;ve des diff&eacute;rents plats.</p>\n<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Poivre noir.</p>', 'file_432e3df6bb0a031a39037e429a8efede.jpg', '2021-08-03 14:38:59', '2021-08-09 20:51:20', 1, NULL, 'Le poivre noir est considéré le plus aromatique des épices, avec sa touche piquante il relève des différents plats ', 'Poivre Noir', 'Poivre Noir', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(98, 0, '98', 101, 'Herbes de Provences 100g - El Morjane', 0, 1.03, 1.03, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients : </strong>Romarin, thym, basilic et origan.</p>', 'file_33c8413560d1c3ce419863ccf216af91.jpg', '2021-08-03 15:02:17', '2021-08-09 20:49:18', 1, NULL, 'Herbes de Provences est un ensemble d\'épices séchés et fraiches composés de romarin, thym, basilic et origan, ', 'Herbes de provences', 'Herbes de provences', 102, 1, 1, 1.236, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(99, 0, '99', 101, 'Piment doux moulu 100g - El Morjane', 0, 1.64, 1.64, '0.1', NULL, '<p>Le piment doux en poudre est extrait de piment doux rouge s&eacute;ch&eacute; et broy&eacute;, il permet d\'affiner les plats sans en alt&eacute;rer le go&ucirc;t.</p>\n<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Piment doux.</p>\n<p>&nbsp;</p>', 'file_6c1bd21f1e5914bdd0a3323f499cf870.jpg', '2021-08-03 15:10:03', '2021-08-09 20:45:47', 1, NULL, 'Le piment doux en poudre est extrait de piment doux rouge séché et broyé, il permet d\'affiner les plats sans en altérer le goût.', ' piment rouge poudre', ' piment rouge poudre', 102, 1, 0, 1.968, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(100, 0, '100', 101, 'Carvi moulu 100g - El Morjane', 0, 1.64, 1.64, '0.1', NULL, '<p>Le carvi est une &eacute;pice forte, elle est l&eacute;g&egrave;rement menthol&eacute;e, utilis&eacute;e depuis longtemps pour assaisonner les viandes de b&oelig;uf.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Carvi.</p>', 'file_011be3e42d621371212a3f2f1eb3d3b9.jpg', '2021-08-03 15:14:59', '2021-08-09 20:42:17', 1, NULL, 'Le carvi est une épice forte, elle est légèrement mentholée, utilisée depuis longtemps pour assaisonner les viandes de bœuf.', 'Carvi', 'Carvi', 102, 1, 1, 1.968, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(101, 0, '101', 101, 'Coriandre moulue 100g - El Morjane', 0, 1.64, 1.64, '0.1', NULL, '<p>Le coriandre est tr&egrave;s connu et utile dans nos plats, son ar&ocirc;me rappelle celui de l\'&eacute;corce d\'orange.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Coriandre.</p>\n<p>&nbsp;</p>', 'file_a604176359e45f14f12f19741ff06fc4.jpg', '2021-08-03 15:18:41', '2021-08-09 20:43:58', 1, NULL, 'Le coriandre est très connu et utile dans nos plats, son arôme rappelle celui de l\'écorce d\'orange.', 'Coriandre', 'Coriandre', 102, 1, 0, 1.968, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(103, 0, '103', 101, 'Basilic 100g - El Morjane', 0, 1, 1, '0.05', NULL, '<p>Le basilic est un arome qui a la saveur fra&icirc;che et peu citronn&eacute;e accompagn&eacute;e d\'une l&eacute;g&egrave;re amertume.</p>\n<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient : </strong>Basilic.</p>', 'file_dcb27543f50ad9e277bcd1c0627d4938.jpg', '2021-08-04 15:51:52', '2021-08-09 20:38:38', 1, NULL, 'Le basilic est un arome qui a la saveur fraîche et peu citronnée accompagnée d\'une légère amertume', 'Basilic', 'Basilic', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(104, 0, '104', 101, 'Feuilles de Laurier 25g - El Morjane', 0, 2, 2, '0.025', NULL, '<p>Le laurier est une &eacute;pice qu\'on ajoute dans divers plats en sauce, il poss&egrave;de des propri&eacute;t&eacute;s qui permettent d\'&eacute;viter l\'ajout du sel.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Laurier.</p>', 'file_94b7a44111c00f8718cc5b48c5525b72.jpg', '2021-08-04 15:56:32', '2021-08-09 20:46:44', 1, NULL, 'Le laurier est un épice que l\'on ajoute dans divers plats en sauce, il possède des propriétés qui nous permettent d\'éviter l\'ajout du sel ', 'Laurier', 'Laurier', 102, 1, 1, 2.4, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(110, 0, '110', 101, 'Clous De Girofle Entiers 50g - El Morjane', 0, 1, 1, '0.05', NULL, '<p>Le clou de girofle est une sorte de fruit s&eacute;ch&eacute; utilis&eacute; en cuisine pour son ar&ocirc;me puissant.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient : </strong>Clous de Girofle.</p>', 'file_01e84b59891420a575abc3900686cf8b.jpg', '2021-08-04 16:30:35', '2021-08-18 10:42:31', 1, NULL, 'Le clou de girofle est une sorte de fruit séché utilisé en cuisine pour son arôme puissant.', 'Clou de girofle', 'Clou de girofle', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(111, 0, '111', 101, 'Ras El Hanout Jaune Moulu 100g - El Morjane', 0, 0.77, 0.77, '0.1', NULL, '<p>Ras hanout qui signifie litt&eacute;ralement, t&ecirc;te de l\'&eacute;picerie.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Cumin, curcuma, coriandre, sel, piment fort, fenugrec, carvi, ail, MOUTARDE, clous de girofle, gingembre, laurier et poivre noir.</p>', 'file_89a8e9786e3a3a7bbc4ce9a64eae6ee7.jpg', '2021-08-04 16:35:03', '2021-08-09 20:31:11', 1, NULL, 'Ras hanout qui signifie littéralement, tête de l\'épicerie , est un mélange d\'épices composé de Cumin, curcuma, coriandre, sel, piment fort, fenugrec, carvi, ail, MOUTARDE, clous de girofle, gingembre, laurier et poivre noir', 'Ras hanout', 'Ras hanout', 102, 1, 1, 0.924, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(112, 0, '112', 101, 'Origan 50g - El Morjane ', 0, 1, 1, '0.05', NULL, '<p>Le go&ucirc;t d&eacute;licieux de l\'origan aide &agrave; r&eacute;duire la consommation de sel et de mati&egrave;res grasses.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient : </strong>Basilic.</p>', 'file_b55faeff7956f56da95709fa9b3b91c6.jpg', '2021-08-04 16:46:21', '2021-08-09 20:30:24', 1, NULL, 'Le goût délicieux de l\'origan aide à réduire la consommation de sel et de matières grasses.', 'Origan', 'Origan', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(114, 0, '114', 101, 'Cannelle Moulue 100g - El Morjane', 0, 0.95, 0.95, '0.1', NULL, '<p>La cannelle moulue est une &eacute;pice tr&egrave;s ancienne, extraite de l\'&eacute;corce s&egrave;che du cannelier</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Cannelle.</p>', 'file_1283c2873a790fe87dc6b91490b2e81e.jpg', '2021-08-04 16:52:27', '2021-08-09 20:29:14', 1, NULL, 'La cannelle moulue est une épice très ancienne, extraite de l\'écorce sèche du cannelier', 'Cannelle', 'Cannelle', 102, 1, 0, 1.14, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(116, 0, '116', 101, 'Gingembre Moulu 100g - El Morjane', 0, 0.88, 0.88, '0.1', NULL, '<p>Le gingembre moulu est une &eacute;pice qui aromatise de nombreux plats, extraite de l\'&eacute;corce s&eacute;ch&eacute; de gingembre.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Gingembre.</p>\n<p>&nbsp;</p>', 'file_fe83670f21151a77e365b8188d4a21aa.jpg', '2021-08-04 17:04:09', '2021-08-09 20:58:31', 1, NULL, 'Le gingembre moulue est une épice qui aromatise de nombreux plats, extraite de l\'écorce séché de gingembre', 'Gingembre', 'Gingembre', 102, 1, 1, 1.056, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(117, 0, '117', 101, 'Fenouil Moulu 100g - El Morjane', 0, 0.84, 0.84, '0.1', NULL, '<p>Une petite quantit&eacute; de sa poudre donne aux plats une saveur m&eacute;diterran&eacute;enne fra&icirc;che avec une odeur anis&eacute;e.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient : </strong>Fenouil.</p>', 'file_0c662346444ae036724c593f68436f58.jpg', '2021-08-04 17:08:44', '2021-08-06 10:42:40', 1, NULL, 'Une petite quantité de sa poudre donne aux plats une saveur méditerranéenne fraîche avec une odeur anisée', 'Fenouil', 'Fenouil', 102, 1, 1, 1.596, 90, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL);
INSERT INTO `av_products` (`product_id`, `new_id`, `product_ref`, `categorie_id`, `product_name`, `product_total_price`, `product_price`, `product_price_dicount`, `product_poids`, `product_text`, `product_short_text`, `product_picture`, `product_data_created`, `product_data_updated`, `product_data_status`, `files`, `product_meta_description`, `product_meta_title`, `product_meta_keywords`, `sub_categorie_id`, `show_poids`, `product_stock`, `product_price_selling`, `product_price_marge_percente`, `product_price_marge_percente_dicount`, `product_entier`, `product_best_seller`, `product_is_promo`, `product_entier_association`, `product_affected_partener`, `product_bio`, `product_label_rouge`, `product_origin`, `product_promo`, `product_is_composer`, `product_show_home`, `product_info`, `product_short_description`, `show_option`, `categorie_couffin_id`, `certificat_id`, `product_poitou_charentes`) VALUES
(120, 0, '120', 3, 'Rumsteak de Bœuf ', 0, 14.9, 14.9, '1', NULL, '<p>Rumsteak est une pi&egrave;ce de d&eacute;coupe du b&oelig;uf. Il est comme le faux-filet et l\'entrec&ocirc;te et principalement pr&eacute;par&eacute; en grillade.</p>', 'file_2742caf547ec4074a2205839f79ef397.jpg', '2021-08-07 09:50:37', '2021-09-14 11:42:53', 1, NULL, 'Rumsteak est une pièce de découpe du bœuf. Il est comme le faux-filet et l\'entrecôte et principalement préparé en grillade.', 'Rumsteak', 'Rumsteak', 194, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(121, 0, '121', 3, 'La Tranche de Bœuf ', 0, 14.9, 14.9, '1', NULL, '<p>C\'est un gros morceau de b&oelig;uf &agrave; fibres courtes avec lequel le boucher pr&eacute;pare des rosbifs</p>', 'file_046f9ce26363cd4e1b28842d4307b6dc.jpg', '2021-08-07 10:01:39', '2021-09-14 11:42:14', 0, NULL, ' C\'est un gros morceau de bœuf à fibres courtes avec lequel le boucher prépare des rosbifs', 'La tranche ', 'La tranche ', 199, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(122, 0, '122', 3, 'Collier de Bœuf', 0, 9.9, 9.9, '1', NULL, '<p>&agrave; l\'avant de l\'&eacute;paule, juste derri&egrave;re la t&ecirc;te. Viande maigre, elle est g&eacute;n&eacute;ralement utilis&eacute;e pour les rago&ucirc;ts, les rago&ucirc;ts et le potaufeu. Cette pi&egrave;ce r&eacute;siste bien &agrave; la cuisson lente, permettant &agrave; la viande de fondre davantage.</p>', 'file_d184dc2c9f9d59ed3342964e2f727e87.jpg', '2021-08-07 10:11:55', '2021-09-14 11:41:41', 0, NULL, 'à l\'avant de l\'épaule, juste derrière la tête. Viande maigre, elle est généralement utilisée pour les ragoûts, les ragoûts et le potaufeu. Cette pièce résiste bien à la cuisson lente, permettant à la viande de fondre davantage.', 'Collier', 'Collier', 191, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(123, 0, '123', 3, 'Gite de Bœuf', 0, 9.9, 9.9, '1', NULL, '<p>encore appel&eacute; jarret, il s\'agit d\'une d&eacute;licieuse viande g&eacute;latineuse utilis&eacute;e en pot-au-feu</p>', 'file_82bb13caba966beda65c4c060a381166.jpg', '2021-08-07 10:18:25', '2021-09-14 11:41:18', 0, NULL, 'encore appelé jarret, il s\'agit d\'une délicieuse viande gélatineuse utilisée en pot-au-feu', 'Gite', 'Gite', 192, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(124, 0, '124', 3, 'Gite à la Noix de Bœuf ', 0, 9.9, 9.9, '1', NULL, '<p>C\'est la partie post&eacute;rieure de la mi-cuisse qui est compos&eacute; encore de la semelle, le rond de g&icirc;te et le nerveux de g&icirc;te &agrave; la noix.</p>', NULL, '2021-08-07 11:03:27', '2021-09-14 11:40:56', 0, NULL, 'C\'est la partie postérieure de la mi-cuisse qui est composé encore de la semelle, le rond de gîte et le nerveux de gîte à la noix. ', 'Gite à la Noix', 'Gite à la Noix', 108, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(125, 0, '125', 3, 'Macreuse de Bœuf ', 0, 10.9, 10.9, '1', NULL, '', 'file_d205f066fc76b3f08f2fd902e26b0c47.jpg', '2021-08-09 08:53:08', '2021-09-14 11:40:07', 0, NULL, 'Il est très tendre et comme son nom l\'indique, il est utilisé pour faire griller des steaks.', 'Macreuse', 'Macresue', 193, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(126, 0, '126', 3, 'Rond de Gite de Bœuf ', 0, 10.9, 10.9, '1', NULL, '<p>Situ&eacute;e &agrave; l\'arri&egrave;re de la cuisse, c\'est une viande moelleuse et tr&egrave;s maigre qui peut &ecirc;tre consomm&eacute;e crue en tartare ou en carpaccio, et elle peut &eacute;galement &ecirc;tre utilis&eacute;e en rago&ucirc;t.</p>', NULL, '2021-08-09 09:10:47', '2021-09-14 11:39:26', 0, NULL, 'Située à l\'arrière de la cuisse, c\'est une viande moelleuse et très maigre qui peut être consommée crue en tartare ou en carpaccio, et elle peut également être utilisée en ragoût.', 'Rond de gite', 'Rond de gite', 108, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(127, 0, '127', 3, 'Jumeau à Biftek de Bœuf  ', 0, 12.9, 12.9, '1', NULL, '<p>Comme son nom l\'indique, le jumeau &agrave; bifteck est coup&eacute; en steak. Il a son jumeau : le jumeau Potaufeu. Le jumeau &agrave; bifteck est un muscle long avec des fibres courtes qui peut &ecirc;tre grill&eacute; ou frit.</p>', NULL, '2021-08-09 09:24:12', '2021-09-14 11:38:53', 0, NULL, 'Comme son nom l\'indique, le jumeau à bifteck est coupé en steak. Il a son jumeau : le jumeau Potaufeu. Le jumeau à bifteck  est un muscle long avec des fibres courtes qui peut être grillé ou frit.', 'Jumeau à Biftek ', 'Jumeau à Biftek ', 198, 0, 1, 15.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(128, 0, '128', 3, 'Macreuse à Pot-au-Feu de Bœuf ', 0, 10.9, 10.9, '1', NULL, '<p>Il est souvent utilis&eacute; dans le potaufeu, ainsi que dans les rago&ucirc;ts. Il est moins tendre que la macreuse &agrave; Bifteck et est &eacute;galement parfait pour faire une pur&eacute;e de Parmentier.</p>', NULL, '2021-08-09 09:30:11', '2021-09-14 11:38:17', 0, NULL, 'Il est souvent utilisé dans le potaufeu, ainsi que dans les ragoûts. Il est moins tendre que la macreuse à Bifteck et est également parfait pour faire une purée de Parmentier.', 'Macreuse à pot-au-feu', 'Macreuse à pot-au-feu', 193, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(129, 0, '129', 3, 'Aiguillète Baronne de Bœuf ', 0, 13.9, 13.9, '1', NULL, '<p>On l\'appelle ainsi car la pi&egrave;ce &eacute;tait historiquement r&eacute;serv&eacute;e aux riches, pr&eacute;par&eacute;e comme du b&oelig;uf dans la cocotte, un morceau de cuisse, aujourd\'hui elle est servie en steak grill&eacute; ou &agrave; la po&ecirc;le.</p>', NULL, '2021-08-09 09:34:37', '2021-09-14 11:37:47', 0, NULL, 'On l\'appelle ainsi car la pièce était historiquement réservée aux riches, préparée comme du bœuf dans la cocotte, un morceau de cuisse, aujourd\'hui elle est servie en steak grillé ou à la poêle.', 'Aiguillète baronne  ', 'Aiguillète baronne  ', 194, 0, 1, 16.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(130, 0, '130', 3, 'Plat de Tranche de Bœuf ', 0, 10.9, 10.9, '1', NULL, '<p>C\'est un morceau dans la partie avant de la cuisse qui est utilis&eacute; pour cuire des r&ocirc;tis comme le rosbif</p>', NULL, '2021-08-09 09:39:36', '2021-09-14 11:37:20', 0, NULL, 'C\'est un morceau dans la partie avant de la cuisse qui est utilisé pour cuire des rôtis comme le rosbif', 'Plat de tranche', 'Plat de tranche', 200, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(131, 0, '131', 3, 'Hampe de Bœuf ', 0, 13.9, 13.9, '1', NULL, '<p>Situ&eacute; dans la poitrine du veau, c\'est une pi&egrave;ce tr&egrave;s tendre qui sert &agrave; faire des steaks</p>', 'file_8250c0c80645426d5e3c631065247d58.jpg', '2021-08-09 09:44:04', '2021-09-14 11:36:50', 0, NULL, 'Situé dans la poitrine du veau, c\'est une pièce très tendre qui sert à faire des steaks', 'Hampe', 'Hampe', 202, 0, 1, 16.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(132, 0, '132', 3, 'Paleron de Bœuf ', 0, 9.9, 9.9, '1', NULL, '<p>C\'est une pi&egrave;ace d\'&eacute;paule ferme et g&eacute;latineuse qui se marie tr&egrave;s bien avec les rago&ucirc;ts ou les grillades</p>', NULL, '2021-08-09 09:51:48', '2021-09-14 11:36:11', 0, NULL, 'C\'est une pièace d\'épaule ferme et gélatineuse qui se marie très bien avec les ragoûts ou les grillades', 'Paleron', 'Paleron', 198, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(133, 0, '133', 3, 'Longe de Bœuf ', 0, 9.9, 9.9, '1', NULL, '<p>Le longe de b&oelig;uf est obtenu &agrave; partir du dos, plus pr&eacute;cis&eacute;ment du milieu de l\'&eacute;chine. Cette partie est la moins utilis&eacute;e du b&oelig;uf, pari qui est plus tendre</p>', NULL, '2021-08-09 10:01:38', '2021-09-14 11:35:32', 0, NULL, 'Le longe de bœuf est obtenu à partir du dos, plus précisément du milieu de l\'échine. Cette partie est la moins utilisée du bœuf, pari qui est plus tendre', 'Longe', 'Longe', 205, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(134, 0, '134', 3, 'Queue de Bœuf', 0, 9.9, 9.9, '0.6', NULL, '<p>C\'est un morceau fait de l\'os de la queue et de la viande qui l\'entoure. Plut&ocirc;t gras comme un morceau, il faut le laisser mijoter longuement pour le rendre moelleux</p>', 'file_14fb3be7978f3525e1d1e59dbd6d67d2.jpg', '2021-08-09 10:06:35', '2021-09-02 16:56:18', 0, NULL, 'C\'est un morceau fait de l\'os de la queue et de la viande qui l\'entoure. Plutôt gras comme un morceau, il faut le laisser mijoter longuement pour le rendre moelleux', 'Queue de bœuf', 'Queue de bœuf', 118, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 pièce entre 600g et 650g ', '', 0, NULL, 6, NULL),
(135, 0, '135', 3, 'Jarret de Bœuf ', 0, 8.9, 8.9, '1', NULL, '<p>le jarret de b&oelig;uf est &eacute;galement appel&eacute; g&icirc;te avant ou g&icirc;te arri&egrave;re, sa viande est g&eacute;latineuse et moelleuse</p>', 'file_0242242ae85d4ab26d9988eb61a0a1da.jpg', '2021-08-09 10:14:23', '2021-09-14 11:33:55', 1, NULL, ' le jarret de bœuf est également appelé gîte avant ou gîte arrière, sa viande est gélatineuse et moelleuse', 'Jarret', 'Jarret', 200, 0, 1, 10.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(138, 0, '138', 3, 'Langue de Bœuf', 0, 12.9, 12.9, '1', NULL, '<p>Il est consid&eacute;r&eacute; comme un abat, cuit entier, brais&eacute; et servi en sauce.</p>', 'file_6c9174f3d54f7e16083e2ce0522c863f.jpg', '2021-08-09 10:37:20', '2021-09-14 11:33:12', 0, NULL, 'Il est considéré comme un abat, cuit entier, braisé et servi en sauce.', 'Langue de bœuf ', 'Langue de bœuf ', 203, 0, 1, 15.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(139, 0, '139', 101, 'Ail moulu 100g - El Morjane ', 0, 0.92, 0.92, '0.1', NULL, '<p>Malgr&eacute; son go&ucirc;t et son odeur forts, la poudre d\'ail est un ar&ocirc;me agr&eacute;able pour tous types de plats.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient : </strong>Ail.</p>\n<p>&nbsp;</p>', 'file_f62db9ceb778c347de72a8cabd5aa99e.jpg', '2021-08-09 11:00:12', '2021-08-09 13:59:00', 1, NULL, ' Malgré son goût et son odeur forts, la poudre d\'ail est un arôme agréable pour tous les types de plats.', 'Ail moulu ', 'Ail moulu ', 102, 1, 1, 1.104, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(140, 0, '140', 101, 'Colorant Alimentaire Moulu 100g - El Morjane', 0, 0.8, 0.8, '0.1', NULL, '<p>Un additif qui permet de recolorer les aliments.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients : </strong>Amidon de ma&iuml;s. sel, tartrazine (E102), rouge azura AC (E129).</p>', 'file_f2331ca52e1a9ef2d7c811f7b7e1b9d6.jpg', '2021-08-09 11:21:44', '2021-08-09 13:58:20', 1, NULL, 'un additif qui permet de recolorer les aliments.', 'Colorant alimentaire', 'Colorant alimentaire', 102, 1, 1, 0.96, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(141, 0, '141', 101, 'Curry Madras moulu 100g - El Morjane', 0, 0.71, 0.71, '0.1', NULL, '<p>Le Curry madras moulu est de force moyenne&nbsp;</p>\n<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Cumin, curcuma, coriandre, clous de girofle, laurier, fenugrec, ail, MOUTARDE, gingembre, poivre noir, sel et amidon de ma&iuml;s.</p>\n<p>&nbsp;</p>', 'file_dd74ff1d52c6ffd29390b83020dc0f73.jpg', '2021-08-09 11:41:27', '2021-08-09 13:57:39', 1, NULL, 'Le Cury madras moulue de force moyenne est composé de 7 épices qui sont; coriandre, gingembre, fenugrec, cumin, curcuma, poivre et piment doux', 'Cury madras moulue', 'Cury madras moulue', 102, 1, 1, 0.852, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(142, 0, '142', 101, 'Epice Barbecue Moulue 100g - El morjane', 0, 1, 1, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients : </strong>Piment doux concass&eacute;, sel, romarin, cumin, thyn, piment fort, poivre noir, ail, pili-pili concass&eacute;, oignons, basilic et origan.</p>', 'file_81d4be14b10f1db3137297f0d3e8facc.jpg', '2021-08-09 11:48:57', '2021-08-09 13:57:13', 1, NULL, 'Epice Barbecue Moulue est un mélange d\'épices qui contient de Romarin, poivre, basilic, persil, girofle, laurier, muscade, marjolaine, sarriette et thym.', 'Epice Barbecue Moulue', 'Epice Barbecue Moulue', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(143, 0, '143', 101, 'Fenugrec Moulu 100g - El Morjane', 0, 0.67, 0.67, '0.1', NULL, '<p>Le fenugrec est une &eacute;pice peu connue utilis&eacute;e dans les rago&ucirc;ts de b&oelig;uf et elle a un certain go&ucirc;t amer.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Fenugrec.</p>\n<p>&nbsp;</p>', 'file_5fa64d1d299865c6275b3a9d80dddd73.jpg', '2021-08-09 12:56:39', '2021-08-09 13:56:55', 1, NULL, ' Le fenugrec est une épice peu connue utilisée dans les ragoûts de bœuf et elle a un certain goût amer.', 'Fenugrec Moulu ', 'Fenugrec Moulu ', 102, 1, 1, 0.804, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(144, 0, '144', 101, 'Molokheya Moulue 100g - El Morjane', 0, 0.88, 0.88, '0.1', NULL, '<p>Molokheya est connue sous le nom commun de Cor&egrave;te, elle d&eacute;signe une &eacute;pice (feuilles de Cor&egrave;tes moulues), et des plats orientaux typiques pr&eacute;par&eacute;s avec cette herbe, qui portent &eacute;galement son nom.</p>\n<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Molokheya.</p>', 'file_96478199c66a615944aab346e971b8f4.jpg', '2021-08-09 13:10:14', '2021-08-09 13:56:33', 1, NULL, 'Molokheya est connue sous le nom commun de Corète, elle désigne une épice (feuilles de Corètes moulues), et des plats orientaux typiques préparés avec cette herbe, qui porte également son nom.', 'Molokheya Moulue ', 'Molokheya Moulue ', 102, 1, 1, 1.056, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(145, 0, '145', 101, 'Poivre Blanc Moulu 100g - El Morjane', 0, 1, 1, '0.1', NULL, '<p>le poivre blanc est un piquant neutre, invisible dans les plats ce que lui distingue des poivres noirs.</p>\n<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dient :</strong> Poivre blanc.</p>\n<p>&nbsp;</p>', 'file_35ab5660311170325013180e183c186d.jpg', '2021-08-09 13:36:56', '2021-08-09 13:56:08', 1, NULL, 'le poivre blanc est un piquant neutre, invisible dans les plat ce qui le distingue des poivres noirs  ', 'Poivre blanc', 'Poivre blanc', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(146, 0, '146', 101, 'Épice Chorba Moulue 100g - El Morjane', 0, 0.82, 0.82, '0.1', NULL, '<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients : </strong>Curcuma, sel, cumin, poivre noir, gingembre, cannelle, basillic, coriandre, noix de muscade, ail et fenouil.</p>', 'file_e2a7aa456a3956e02d4f05bdd859e37e.jpg', '2021-08-09 13:43:05', '2021-08-09 13:55:47', 1, NULL, 'Épice Chorba Moulue est un mélange d\'épices contient de Curcuma, sel, cumin, poivre noir, gingembre, cannelle, basilic, coriandre, noix de muscade, ail et fenouil.', 'Épice Chorba Moulue ', 'Épice Chorba Moulue ', 102, 1, 0, 0.984, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(147, 0, '147', 101, 'Épice Couscous Jaune Moulue 100g - El Morjane', 0, 0.75, 0.75, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Coriandre, curcuma, cumin, sel, gingembre, cannelle, poivre noir, ail, MOUTARDE, clous de girofle, laurier et fenugrec.</p>', 'file_ff51290336f9b9d7b75e04e7297cb6c8.jpg', '2021-08-09 13:49:07', '2021-08-09 13:55:25', 1, NULL, 'Épice Couscous Jaune Moulue est un mélange d\'épices contient de Coriandre, curcuma, cumin, sel, gingembre, cannelle, poivre noir, ail, moutarde, clous de girofle, laurier et fenugrec.', 'Épice Couscous Jaune Moulue', 'Épice Couscous Jaune Moulue', 102, 1, 1, 0.9, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(148, 0, '148', 2, 'Côtes Découvertes d\'Agneau', 0, 14.9, 16.39, '1', NULL, '<p><strong>Go Ferme Halal</strong><strong> </strong><span style=\"font-weight: 400;\">propose des c&ocirc;tes d&eacute;couvertes d\'agneau frais et de qualit&eacute;, issue d&rsquo;une viande tendre et 100 % halal.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Nos c&ocirc;tes d&eacute;couvertes d\'agneau sont connues par deux caract&eacute;ristiques, gages de qualit&eacute; : elles sont reconnaissable au grain serr&eacute; de leur chair et &agrave; la blancheur du gras.</span></p>\n<p><span style=\"font-weight: 400;\">Optez pour une pi&egrave;ce riche en vitamine et appr&eacute;ci&eacute;e pour toutes vos </span><strong><a href=\"../../../../pages/show/14-nos-recettes\">recettes</a>&nbsp;</strong><span style=\"font-weight: 400;\">!</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents </span><a href=\"../../../../categories\"><strong>produits</strong></a><span style=\"font-weight: 400;\">&nbsp;: </span><a href=\"../../../../products/show/156\"><strong>Foie</strong><strong> d\'agneau</strong></a><strong>, </strong><a href=\"../../../../products/show/160\"><strong>T&ecirc;te d\'agneau</strong></a><strong>, </strong><a href=\"../../../../products/show/87-brochette-dagneau-bio\"><strong>Brochette d\'agneau BIO</strong></a><span style=\"font-weight: 400;\">&hellip; !&nbsp;</span></p>', NULL, '2021-08-09 13:54:00', '2021-09-15 09:37:46', 0, NULL, 'côtes découvertes d\'agneau', 'côtes découvertes d\'agneau', 'côtes découvertes d\'agneau', 190, 0, 1, 17.88, 20, 10, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(149, 0, '149', 2, 'Côtes Secondaires d\'Agneau ', 0, 14.9, 16.39, '1', NULL, '<p><strong><span style=\"font-weight: 400;\">Optez pour une&nbsp; c&ocirc;te secondaire d\'agneau riche en vitamine, avec une chair plus grasse que les </span><a href=\"../../../../products/show/150\">c&ocirc;tes premi&egrave;res</a><span style=\"font-weight: 400;\">&nbsp;!</span></strong></p>\n<p><strong>Go Ferme Halal</strong><strong> </strong><span style=\"font-weight: 400;\">vous propose</span><strong> </strong><span style=\"font-weight: 400;\">une c&ocirc;te</span><strong> </strong><span style=\"font-weight: 400;\">secondaire d\'agneau bio et de qualit&eacute;, issue d&rsquo;une viande tendre et tellement savoureuse.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Nos c&ocirc;tes d&rsquo;agneau sont pr&eacute;f&eacute;r&eacute;es pour les amateurs et elles ont un go&ucirc;t sp&eacute;cial pour pr&eacute;parer des </span><a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a><span style=\"font-weight: 400;\"> d&eacute;licieuses.</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents </span><strong>produits</strong><span style=\"font-weight: 400;\"> : <strong><a href=\"../../../../products/show/238\">Epaule roul&eacute;</a></strong> </span><strong>, </strong><strong>&nbsp;</strong><strong><a href=\"../../../../products/show/85-epaule-dagneau-avec-os\">Epaule d\'agneau (avec os)</a> </strong><span style=\"font-weight: 400;\">&hellip; !</span></p>', NULL, '2021-08-09 13:58:45', '2021-09-15 09:37:40', 0, NULL, 'Côtes Secondaires d\'agneau ', 'Côtes Secondaires d\'agneau ', 'Côtes Secondaires d\'agneau ', 190, 0, 0, 17.88, 20, 10, 0, 1, 2, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(150, 0, '150', 2, 'Côtes Premières d\'Agneau ', 0, 14.9, 16.39, '1', NULL, '<p><strong>Go Ferme Halal</strong><span style=\"font-weight: 400;\"> vous propose un mets des plus appr&eacute;ci&eacute;s des connaisseurs : une c&ocirc;te premi&egrave;re d\'agneau frais et de qualit&eacute;. Cette c&ocirc;te d&rsquo;agneau est issue d&rsquo;une viande tendre et savoureuse.&nbsp;</span></p>\n<p><span style=\"font-weight: 400;\">Tellement d&eacute;licieuses, cette c&ocirc;te premi&egrave;re d&rsquo;agneau est &eacute;galement id&eacute;ale pour les grillades, ou encore pour pr&eacute;parer d&rsquo;autres </span><a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a><span style=\"font-weight: 400;\"> savoureuses.</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents </span><a href=\"../../../../categories\"><strong>produits</strong></a><span style=\"font-weight: 400;\"> : <strong><a href=\"../../../../products/show/151\">Haut de cote d\'agneau</a></strong> </span><strong>, <a href=\"../../../../products/show/78-c%C3%B4tes-filet-dagneau\">C&ocirc;tes filet d\'agneau</a></strong><strong>, </strong><a href=\"../../../../products/show/87-brochette-dagneau-bio\"><strong>Brochette d\'agneau BIO</strong></a><span style=\"font-weight: 400;\">&hellip; !</span></p>', NULL, '2021-08-09 14:00:28', '2021-09-15 09:37:25', 0, NULL, 'Côtes Premières d\'agneau ', 'Côtes Premières d\'agneau ', 'Côtes Premières d\'agneau ', 190, 0, 0, 17.88, 20, 10, 0, 1, 2, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(151, 0, '151', 2, 'Haut-de-côte d\'Agneau', 0, 8.5, 8.5, '1', NULL, '<p><strong>Go Ferme Halal </strong>propose une haute de c&ocirc;te d\'agneau de qualit&eacute;, issue d&rsquo;une viande tendre et certifi&eacute;e AVS. En effet, les agneaux sont &eacute;lev&eacute;s sous m&egrave;re, en plein air dans la nature et avec une alimentation 100 % bio.</p>\n<p>Cette c&ocirc;te d\'agneau constitue un r&ocirc;ti particuli&egrave;rement savoureux, ou encore pour toute autre<a href=\"../../../../pages/show/14-nos-recettes\"> recette</a>.</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits <strong>: <a href=\"../../../../products/show/156\">Foie d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>, <a href=\"../../../../products/show/87\">Brochette d\'agneau BIO</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-08-09 14:03:58', '2021-09-15 09:38:15', 0, NULL, 'Haut-de-cote ', 'Haut-de-cote ', 'Haut-de-cote ', 201, 0, 0, 10.2, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(152, 0, '152', 101, 'Épice Harira Moulue 100g - El Morjane', 0, 0.88, 0.88, '0.1', NULL, '<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Piment doux, ail, coriandre, cumin, piment de Cayenne et oignons.</p>', 'file_941be040d6139259ddec5643d12f5541.jpg', '2021-08-09 14:09:50', '2021-08-09 14:10:51', 1, NULL, 'Épice Harira Moulue est un mélange d\'épices contient de Piment doux, ail, coriandre, cumin, piment de Cayenne et oignons.', 'Épice Harira Moulue', 'Épice Harira Moulue', 102, 1, 1, 1.056, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(153, 0, '153', 2, 'Agneau Entier ', 0, 11, 11, '1', NULL, '<p>Optez pour des produits de qualit&eacute;, aux saveurs authentiques avec <strong>Go Ferme Halal</strong> !</p>\n<p><strong>Go Ferme Halal </strong>vous propose un agneau entier de qualit&eacute;, &eacute;lev&eacute; en plein air, sous la m&egrave;re, au c&oelig;ur de la nature, avec une alimentation saine et naturelle...</p>\n<p>Ces agneaux sont aussi excellents pour les m&eacute;chouis !</p>\n<p><span style=\"font-weight: 400;\">N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits :<strong><a href=\"../../../../products/show/86\">Epaule d\'agneau dessos&eacute;</a>, <a href=\"../../../../products/show/76\">Gigot entier d\'agneau</a>, <a href=\"../../../../products/show/82\">Agneau entier d&eacute;coup&eacute;</a></strong></span><a href=\"../../../../products/show/160\"><span style=\"font-weight: 400;\">&hellip;&nbsp;!</span></a></p>\n<p><strong>D&eacute;tails du produit :</strong> Agneau entier de race fran&ccedil;aise, non d&eacute;coup&eacute;, sans fressure et sans t&ecirc;te Fa&ccedil;on M&eacute;choui (Pr&ecirc;t &agrave; cuire) Foie, rognons et c&oelig;ur (en sachet)</p>\n<p><strong>Prix </strong>: d&eacute;gressif sur quantit&eacute;</p>\n<p><strong>Livraison :</strong> L\'agneau vous est livr&eacute; tranch&eacute; en sachet sous-vide.</p>\n<p><strong>Date limite de consommation : </strong>4-5 jours</p>\n<p><strong>**Le poids du colis peut varier selon l\'animal - cf. conditions g&eacute;n&eacute;rales de vente**</strong></p>\n<p>Si vous avez besoin d&rsquo;informations compl&eacute;mentaires sur les articles propos&eacute;s par <strong>Go Ferme Halal</strong>, merci de nous <strong>contacter</strong>.</p>', 'file_0947d5f05bd9e17062db80414bcf6fa5.jpeg', '2021-08-09 14:13:40', '2021-09-15 09:20:55', 0, NULL, 'Agneau Entier ', 'Agneau Entier ', 'Agneau Entier ', 161, 1, 1, 13.2, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '15 Kg -19 Kg ', '', 0, NULL, 6, NULL),
(154, 0, '154', 101, 'Épice Kefta Moulue 100g - El Morjane', 0, 0.86, 0.86, '0.1', NULL, '<p><strong>Allerg&egrave;nes : </strong>Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients : </strong>Piment doux, cumin, sel, piment fort, cannelle et menthe.</p>', 'file_d31b19489a72b4ad965992959cc81420.jpg', '2021-08-09 14:14:20', '2021-08-09 14:14:56', 1, NULL, 'Épice Kefta Moulue est un mélange d\'épices contient de Piment doux, cumin, sel, piment fort, cannelle et menthe.', 'Épice Kefta Moulue', 'Épice Kefta Moulue', 102, 1, 1, 1.032, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(155, 0, '155', 101, 'Épice Massalé Moulue 100g - El Morjane', 0, 1.08, 1.08, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Coriandre, curcuma, sel, cumin, origan, fenugrec, gingembre, piment doux, clous de girofle, noix de muscade, cardamone, MOUTARDE, piment fort, poivre noir, laurier, ail et amidon de ma&icirc;s.</p>', 'file_0900f8f27d75af20fe1f855b645d6dee.jpg', '2021-08-09 14:19:03', '2021-08-09 14:19:36', 1, NULL, 'Épice Massalé Moulue est un mélange d\'épices contient de Coriandre, curcuma, sel, cumin, origan, fenugrec, gingembre, piment doux, clous de girofle, noix de muscade, cardamone, moutarde, piment fort, poivre noir, laurier, ail et amidon de maîs.', 'Épice Massalé Moulue ', 'Épice Massalé Moulue ', 102, 1, 1, 1.296, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(156, 0, '156', 2, 'Foie d\'Agneau ', 0, 9.9, 9.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp;Directement issue d\'&eacute;levage local, notre viande d\'agneau est 100 % halal et elle sauvegarde de l\'&eacute;levage traditionnel, rythm&eacute; par la nature ! Vendu dans son emballage sous vide.</p>\n<p><strong>&Agrave; savoir !</strong></p>\n<p>Le foie est une viande maigre (- 5% de lipide)</p>\n<p>Elle aussi une source majeure de :</p>\n<p><strong>&nbsp; &nbsp; &nbsp;- </strong>Vitamines&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;- </strong>Sels min&eacute;raux essentiels</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/166\">Langue d\'agneau</a>, <a href=\"../../../../products/show/165\">Cervelle d\'agneau..</a>!</strong></p>\n<p>&nbsp;</p>', 'file_0561439a27de0597bd72a07f06460049.jpeg', '2021-08-09 14:19:06', '2021-09-15 09:30:39', 1, NULL, 'Foie d\'agneau ', 'Foie d\'agneau ', 'Foie d\'agneau ', 210, 0, 0, 11.88, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(157, 0, '157', 101, 'Épice Poulet Jaune Moulue 100g - El Morjane', 0, 0.8, 0.8, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Curcuma, coriandre, piment doux, sel, cumin, gingembre, poivre noir, carvi, piment de Cayenne, persil, laurier, fenugrec, ail, MOUTARDE et clous de girofle.</p>', 'file_5a328850abe474054a5bfa07eda1e358.jpg', '2021-08-09 14:23:42', '2021-08-09 14:25:16', 1, NULL, 'Épice Poulet Jaune Moulue est un mélange d\'épices contient de Curcuma, coriandre, piment doux, sel, cumin, gingembre, poivre noir, carvi, piment de Cayenne, persil, laurier, fenugrec, ail, moutarde et clous de girofle.', 'Épice Poulet Jaune Moulue', 'Épice Poulet Jaune Moulue', 102, 1, 1, 0.96, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(158, 0, '158', 101, 'Épice Tajine Moulue 100g - El Morjane', 0, 0.82, 0.82, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients : </strong>Curcuma, coriandre, cumin, sel, gingembre et poivre noir.</p>', 'file_5e8aeecfb93f9e549ddd6289ffbc1855.jpg', '2021-08-09 14:30:04', '2021-08-09 14:30:30', 1, NULL, 'Épice Tajine Moulue est un mélange d\'épices contient de  Curcuma, coriandre, cumin, sel, gingembre et poivre noir.', 'Épice Tajine Moulue', 'Épice Tajine Moulue', 102, 1, 1, 0.984, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(159, 0, '159', 101, 'Épice Tandoori Moulue 100g - El Morjane', 0, 0.84, 0.84, '0.1', NULL, '<p><strong>Allerg&egrave;nes :</strong> Peut contenir des traces de S&Eacute;SAME, et/ou de MOUTARDE, et/ou de GLUTEN, et/ou d\'ARACHIDES, et/ou de FRUITS &Agrave; COQUE.</p>\n<p><strong>Ingr&eacute;dients :</strong> Piment doux, coriandre, piment fort, sel, fenugrec, carvi, cannelle, cumin, thym, romarin, poivre noir et clous de girofle.</p>', 'file_67b442980e46cf86332307b634dab6fa.jpg', '2021-08-09 14:33:46', '2021-09-08 15:52:17', 1, NULL, 'Épice Tandoori Moulue est un mélange d\'épices contient de piment doux, coriandre, piment fort, sel, fenugrec, carvi, cannelle, cumin, thym, romarin, poivre noir et clous de girofle', 'Épice Tandoori Moulue', 'Épice Tandoori Moulue', 102, 1, 1, 1.008, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, 'sdsdsd', '', 0, NULL, 6, NULL),
(160, 0, '160', 2, 'Tête d\'Agneau ', 0, 6.5, 6.5, '1', NULL, '<p>Pour une meilleure conservation, <strong>Go Ferme Halal </strong>vous propose des t&ecirc;tes d\'agneau pel&eacute;es mais non fendues. Elle est emball&eacute;e sous vide et coup&eacute;e selon votre choix .</p>\n<p><strong>Comment pr&eacute;parer la t&ecirc;te de veau ?</strong></p>\n<p><strong>&nbsp; &nbsp; &nbsp;- </strong>Pocher &agrave; feu doux la peau de la t&ecirc;te d&rsquo;agneau, coup&eacute;e en gros morceaux(environ 3 heures)<br /><strong>&nbsp; &nbsp; &nbsp;- </strong>Remettre la t&ecirc;te &agrave; cuire pendant 1 heure (20 min en autocuiseur)<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> D&eacute;pouiller la langue<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Faire pocher la cervelle dans un court-bouillon au vinaigre (25 minutes)<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Trancher et pr&eacute;senter la t&ecirc;te de veau avec diff&eacute;rentes sauces</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/164\">Tripes d\'agneau</a>, <a href=\"../../../../products/show/163\">Rognon blancs d\'agneau</a>, <a href=\"../../../../products/show/162\">Ris d\'agneau</a>, <a href=\"../../../../products/show/161-pieds-dagneau\">Pieds d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-08-09 14:34:13', '2021-09-15 09:31:08', 0, NULL, 'Tête d\'agneau ', 'Tête d\'agneau ', 'Tête d\'agneau ', 211, 0, 1, 7.8, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(161, 0, '161', 2, 'Pieds d\'Agneau ', 0, 0.8, 0.8, '', NULL, '<p><strong>Go Ferme Halal</strong> vous propose en ligne des pieds d\'agneau comestibles et surtout d&eacute;licieux.</p>\n<p>Nos produits sont vendus pr&ecirc;ts &agrave; &ecirc;tre cuisin&eacute;s. Une fois cuit dans un bouillon aromatis&eacute;, les pieds d&rsquo;agneau peuvent &ecirc;tre pr&eacute;par&eacute;s en vinaigrette :</p>\n<p>&nbsp; &nbsp; &nbsp; <strong>-</strong> Pan&eacute; ;<br />&nbsp; &nbsp; &nbsp;<strong> - </strong>Grill&eacute; ;<br />&nbsp; &nbsp; &nbsp; <strong>-</strong> Farci ;<br />&nbsp; &nbsp; &nbsp;<strong> -</strong> Etc.&nbsp;</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits <strong>:&nbsp;<a href=\"../../../../products/show/164\">Tripes d\'agneau</a>, <a href=\"../../../../products/show/163\">Rognon blancs d\'agneau</a>, <a href=\"../../../../products/show/162\">Ris d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_495dd9f0e52439736ee35d2451628125.jpg', '2021-08-09 14:46:47', '2021-09-21 16:47:35', 1, NULL, 'Les pieds de l\'agneau sont consommables comme ses oreilles, ils sont délicieux et font partie des spécialités marseillaises.', 'Pieds d\'agneau ', 'Pieds d\'agneau ', 211, 0, 0, 0.96, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '1 pièce ', ' ', 0, NULL, 6, NULL),
(162, 0, '162', 2, 'Ris d\'Agneau ', 0, 13.9, 13.9, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose un ris d\'agneau de qualit&eacute;.</p>\n<p>Optez pour une pi&egrave;ce au go&ucirc;t savoureux et d&eacute;licat et que les grands chefs cuisiniers affectionnent !</p>\n<p>Trouverez les vraies saveurs et la tendret&eacute; de l\'agneau dans ce ris d\'agneau d\'excellence !</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/164\">Tripes d\'agneau</a>, <a href=\"../../../../products/show/163\">Rognon blancs d\'agneau</a>, <a href=\"../../../../products/show/161-pieds-dagneau\">pieds d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-08-09 15:46:12', '2021-09-15 09:32:32', 0, NULL, 'Ris d\'agneau ', 'Ris d\'agneau ', 'Ris d\'agneau ', 211, 0, 1, 16.68, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(163, 0, '163', 2, 'Rognon blanc d\'Agneau ', 0, 8.9, 8.9, '1', NULL, '<p>Des rognons d&rsquo;agneau frais et de qualit&eacute;. Ils accompagnent parfaitement les <strong><a href=\"../../../../products/subcategorie/100-brochette-dagneau\">brochettes d&rsquo;agneaux</a></strong> ou bien en plat principal en saut&eacute;.</p>\n<p><strong>Pr&eacute;paration de Rognons blanc d\'agneau :</strong></p>\n<p><strong>&nbsp; &nbsp; &nbsp;-</strong> Ouvrez les rognons dans le sens horizontal<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> D&eacute;barrasser les rognons blancs d\'agneau de leur sang<br /><strong>&nbsp; &nbsp; &nbsp;- </strong>&Eacute;gouttez-les<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Farinez l&eacute;g&egrave;rement vos rognons blancs d\'agneau<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Ajouter un peu d&rsquo;huile d&rsquo;olive et d&rsquo;&eacute;chalotes coup&eacute;es<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Commencez la cuisson<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Salez, poivrez en utilisant nos &eacute;pices de qualit&eacute;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Couvrez et r&eacute;duisez le feu<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Faites cuire (20 min)</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits : <strong><a href=\"../../../../products/show/164\">Tripes d\'agneau</a>, <a href=\"../../../../products/show/162\">Ris d\'agneau</a>, <a href=\"../../../../products/show/161-pieds-dagneau\">pieds d\'agneau</a>, <a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-08-09 15:59:14', '2021-09-15 09:27:35', 0, NULL, 'Rognon blanc d\'agneau ', 'Rognon blanc d\'agneau ', 'Rognon blanc d\'agneau ', 211, 0, 1, 10.68, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(164, 0, '164', 2, 'Tripes d\'Agneau ', 0, 5.9, 5.9, '1', NULL, '<p>La fra&icirc;cheur de nos tripes d\'agneau permet d\'obtenir des plats go&ucirc;teux et savoureux.&nbsp;</p>\n<p>Les tripes d\'agneau sont pauvres en graisse et tr&egrave;s riches en :</p>\n<p><strong>&nbsp; &nbsp; &nbsp;-</strong> Fer<br /><strong>&nbsp; &nbsp; &nbsp;-</strong>&nbsp;Prot&eacute;ines&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Vitamines B<br /><strong>&nbsp; &nbsp; &nbsp;-</strong>&nbsp;Vitamines B12<br /><strong>&nbsp; &nbsp; &nbsp;-</strong>&nbsp;Sel min&eacute;raux&nbsp;</p>\n<p><strong>Go Ferme Halal </strong>assure que des produits halal et connus pour leurs apports nutritionnels.</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/163\">Rognon blanc d\'agneau</a>, <a href=\"../../../../products/show/162\">Ris d\'agneau</a>, <a href=\"../../../../products/show/161-pieds-dagneau\">pieds d\'agneau</a>, <a href=\"../../../../products/show/160\">tete d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_5473b2584a5103ed7b929117043d1169.jpg', '2021-08-09 16:03:01', '2021-09-17 19:57:19', 1, NULL, 'Tripes d\'agneau ', 'Tripes d\'agneau ', 'Tripes d\'agneau ', 211, 0, 1, 7.08, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(165, 0, '165', 2, 'Cervelle d\'Agneau ', 0, 3, 3, '1 ( pièce) ', NULL, '<p><strong>Go Ferme Halal</strong> vous propose une cervelle d\'agneau qui constitue un aliment tr&egrave;s int&eacute;ressant au plan nutritionnel.</p>\n<p><strong>Une recette savoureuse &agrave; base de la cervelle d\'agneau !</strong></p>\n<p><strong>&nbsp; &nbsp; &nbsp;-</strong> &Eacute;goutter la cervelle&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Placer la cervelle d&rsquo;agneau dans un grand faitout d\'eau froide<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Ajouter les ingr&eacute;dients suivants : vinaigre, oignon, persil, sel et poivre (au choix)<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Laisser cuire les morceaux de cervelle &agrave; feu doux&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Couper la cervelle en petits morceaux<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Pr&eacute;parer la p&acirc;te &agrave; choux&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Ajouter la farine et bien m&eacute;langer&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Incorporer les &oelig;ufs&nbsp;<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Plonger les dans la p&acirc;te, puis dans un bain d\'huile chaude<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Laisser dorer les morceaux de cervelle<br /><strong>&nbsp; &nbsp; &nbsp;-</strong> Placer les morceaux de cervelle sur une feuille de papier absorbant</p>\n<p><strong><em>&Agrave; servir accompagn&eacute;s d\'une sauce tartare ou de quartiers de citron !&nbsp;</em></strong></p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir nos autres diff&eacute;rents produits <strong>:<a href=\"../../../../products/show/166\">Langue d\'agneau</a>, <a href=\"../../../../products/show/156\">Foie d\'agneau</a>&hellip; !</strong></p>', NULL, '2021-08-09 16:12:13', '2021-09-15 09:23:01', 0, NULL, 'Cervelle d\'agneau ', 'Cervelle d\'agneau ', 'Cervelle d\'agneau ', 210, 0, 1, 3.6, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, 'par pièce', '', 0, NULL, 6, NULL),
(166, 0, '166', 2, 'Langue d\'Agneau  ', 0, 9.9, 9.9, '0.1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose une langue d\'agneau fra&icirc;che et 100% bio. Elle est tr&egrave;s appr&eacute;ci&eacute;e chaude avec une sauce ou froide (au choix) en salade avec des tomates.</p>\n<p><strong>Cuisson :&nbsp;</strong></p>\n<p>40 minutes en court bouillon</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits :<strong> <a href=\"../../../../products/show/165\">Cervelle d\'agneau</a>, <a href=\"../../../../products/show/156\">Foie d\'agneau</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_ffe41874e7c8d7ab541f9f9714f9c8af.jpg', '2021-08-09 16:17:13', '2021-09-15 09:58:04', 1, NULL, 'Langue d\'agneau  ', 'Langue d\'agneau  ', 'Langue d\'agneau  ', 210, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '70 g - 150 g', '', 0, NULL, 6, NULL),
(167, 0, '167', 5, 'Côte Filet de Veau ', 0, 16.9, 16.9, '1', NULL, '<p>La c&ocirc;te filet de veau est un morceau de viande pr&eacute;lev&eacute; de la Longe. Elle est moins connue que la c&ocirc;te premi&egrave;re ou la seconde mais se pr&eacute;pare de la m&ecirc;me fa&ccedil;on : grill&eacute;e ou po&ecirc;l&eacute;e. Elle est tr&egrave;s reconnaissable gr&acirc;ce &agrave; son os en forme de T. La c&ocirc;te filet est de veau une viande de gros calibre.</p>', NULL, '2021-08-11 10:47:47', '2021-09-14 12:50:26', 0, NULL, 'La côte filet est une grosse pièce située dans la longe qui est reconnue par la l\'os en forme de T en milieu ', 'Cote filet', 'Cote filet', 220, 0, 1, 20.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(168, 0, '168', 5, 'Côte Première de Veau', 0, 16.9, 16.9, '1', NULL, '<p>La c&ocirc;te premi&egrave;re de veau est &laquo; LA &raquo; c&ocirc;te la plus pris&eacute;e chez les amateurs de viandes, d&rsquo;o&ugrave; son nom &laquo; Premi&egrave;re &raquo;. &nbsp;Appel&eacute;e aussi c&ocirc;telette, elle est plus belle visuellement que sa voisine, la c&ocirc;te seconde. &nbsp;Elle est l&eacute;g&egrave;rement recouverte de graisse sur les bords. Cette viande est particuli&egrave;rement tendre et moelleuse lorsqu&rsquo;elle est grill&eacute;e ou po&ecirc;l&eacute;e.</p>', NULL, '2021-08-11 11:03:39', '2021-09-14 12:49:50', 0, NULL, 'La côte première est appelée encore côtelette, elle est grassouillette avec un manche qui est bien tendu et des bords qui sont un peu graisseux  ', 'Cote première ', 'Cote première ', 220, 0, 1, 20.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(169, 0, '169', 5, 'Noix Pâtissière de Veau', 0, 16.9, 16.9, '1', NULL, '<p>Comme pour la Sous Noix et la Noix, la Noix p&acirc;tissi&egrave;re de veau est un muscle situ&eacute; dans la cuisse de l&rsquo;animal. Elle est souvent utilis&eacute;e par les chefs dans la pr&eacute;paration des vol-au-vent et timbales, d&rsquo;o&ugrave; le mot p&acirc;tissi&egrave;re. Contrairement aux deux autres morceaux de la cuisse, elle n&rsquo;offre pas de grosses tranches d&rsquo;escalope.</p>', NULL, '2021-08-11 11:55:51', '2021-09-14 12:49:04', 0, NULL, 'Noix pâtissière est dans la partie supérieur de la cuisse, c\'est également une pièce très moelleux, mais ses côtelettes sont plus petites que celles de la noix.', 'Noix pâtissière', 'Noix pâtissière', 219, 0, 1, 20.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(170, 0, '170', 5, 'Longe de Veau ', 0, 17.9, 17.9, '1', NULL, '<p>La Longe de veau est un morceau de viande de gros calibre et convient parfaitement pour les gros app&eacute;tits. Appartenant &agrave; la famille des c&ocirc;tes, elle peut &ecirc;tre cuisin&eacute;e avec ou sans son os. La Longe de Veau est situ&eacute;e juste en dessus du Filet, entre la c&ocirc;te premi&egrave;re et le Quasi de l&rsquo;animal. On l&rsquo;appelle &eacute;galement Longe filet.&nbsp;</p>', NULL, '2021-08-11 12:14:27', '2021-09-14 12:48:25', 0, NULL, 'La longe est une côte très grosse qui s\'est servie grillée ou brisée ', 'Longe', 'Longe', 220, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(171, 0, '171', 5, 'Noix de Veau ', 0, 17.9, 17.9, '1', NULL, '<p>Comme pour la Sous Noix, la Noix de veau offre de belles tranches d&rsquo;escalope qui peuvent &ecirc;tre grill&eacute;es ou pan&eacute;es. Contrairement aux deux autres muscles de la cuisse, &agrave; savoir la Noix p&acirc;tissi&egrave;re et la Sous Noix, la Noix de veau poss&egrave;de un grain de chair tr&egrave;s fin. Elle est tr&egrave;s pris&eacute;e par les amateurs de viandes rouges.</p>', NULL, '2021-08-11 13:18:16', '2021-09-14 12:47:22', 0, NULL, 'La noix est le muscle au milieu de la cuisse : il est très doux et la fibre de sa pulpe est très fine, la noix de veau a de belles morceaux et des tranches à poêler .', 'Noix', 'Noix', 219, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(172, 0, '172', 5, 'Sous Noix de Veau', 0, 15.9, 15.9, '1', NULL, '<p>&Agrave; l&rsquo;instar de la noix et la Noix p&acirc;tissi&egrave;re, la Sous noix de veau est un muscle situ&eacute; &agrave; l&rsquo;arri&egrave;re de l&rsquo;animal. Ensemble, ils constituent la cuisse. Contrairement aux deux autres morceaux, la Sous noix de veau a un grain de chair plus gros. Cette viande offre de belles tranches d&rsquo;escalope, id&eacute;ale pour pr&eacute;parer une &laquo; Piccata &raquo; de veau.&nbsp;</p>', NULL, '2021-08-11 13:44:29', '2021-09-14 12:46:36', 0, NULL, 'La sous Noix est un gros muscle sous la cuisse de veau, elle est coupé en tranches', 'Sous Noix', 'Sous Noix', 219, 0, 1, 19.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(173, 0, '173', 5, 'Quasi de Veau ', 0, 16.9, 16.9, '1', NULL, '<p>Le quasi de veau est l&rsquo;un des morceaux les plus pris&eacute;s pour la pr&eacute;paration des r&ocirc;tis. Situ&eacute; dans la partie &laquo; arri&egrave;re &raquo; de l&rsquo;animal, le quasi veau est appel&eacute; diff&eacute;remment selon les r&eacute;gions : Cul de longe &agrave; Lyon, c&oelig;ur de veau &agrave; Marseille ou encore pi&egrave;ce blanche &agrave; Toulouse. C&rsquo;est l&rsquo;&eacute;quivalent du rumsteak chez le b&oelig;uf.</p>', NULL, '2021-08-11 14:50:29', '2021-09-14 12:45:48', 0, NULL, 'Quasi de vœu est un muscle fessier épais situé entre la cuisse et la région lombaire, il s\'agit l\'une des meilleures coupes de veau à griller. ', 'Quasi de vœu ', 'Quasi de vœu ', 228, 0, 1, 20.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(174, 0, '174', 4, 'Nuggets de Poulet ', 0, 8.9, 8.9, '1', NULL, '<p>Comme pour le cordon bleu, les Nuggets de poulet sont particuli&egrave;rement demand&eacute;s par les enfants. C&rsquo;est un produit qui nous vient tout droit des Etats-Unis. Ils sont le plus souvent pr&eacute;par&eacute;s dans l&rsquo;huile de friture, accompagn&eacute;s de frites de pommes de terre. Cependant, les amateurs de nuggets optent de plus en plus &agrave; la cuisson au four.</p>\n<p><strong>Go Ferme Halal </strong>vous propose des Nuggets de poulet halal (certification AVS). Il vous sera livr&eacute; chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail</strong> ou via notre<strong> formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter </strong>afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos<a href=\"../../../../pages/show/14-nos-recettes\"><strong> recettes</strong></a>.</p>', 'file_f334ff5e1aec07de1ff1d92709617b50.jpg', '2021-08-11 14:52:02', '2021-09-14 12:06:49', 0, NULL, 'Nuggets de poulet ', 'Nuggets de poulet ', 'Nuggets de poulet ', 214, 0, 1, 10.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL);
INSERT INTO `av_products` (`product_id`, `new_id`, `product_ref`, `categorie_id`, `product_name`, `product_total_price`, `product_price`, `product_price_dicount`, `product_poids`, `product_text`, `product_short_text`, `product_picture`, `product_data_created`, `product_data_updated`, `product_data_status`, `files`, `product_meta_description`, `product_meta_title`, `product_meta_keywords`, `sub_categorie_id`, `show_poids`, `product_stock`, `product_price_selling`, `product_price_marge_percente`, `product_price_marge_percente_dicount`, `product_entier`, `product_best_seller`, `product_is_promo`, `product_entier_association`, `product_affected_partener`, `product_bio`, `product_label_rouge`, `product_origin`, `product_promo`, `product_is_composer`, `product_show_home`, `product_info`, `product_short_description`, `show_option`, `categorie_couffin_id`, `certificat_id`, `product_poitou_charentes`) VALUES
(175, 0, '175', 4, 'Poulet Fermier Pattes Bleu (Label Rouge) ', 0, 8.9, 8.9, '1', NULL, '', NULL, '2021-08-11 14:54:16', '2021-09-14 12:18:06', 0, NULL, 'Poulet fermier pattes bleu (label rouge) ', 'Poulet fermier pattes bleu (label rouge) ', 'Poulet fermier pattes bleu (label rouge) ', 214, 0, 1, 10.68, 20, 0, 0, 1, 1, 0, 9, 0, 2, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(176, 0, '176', 4, 'Poulet Fermier Pac (Label Rouge)  ', 0, 7.9, 7.9, '1', NULL, '', NULL, '2021-08-11 14:55:47', '2021-09-14 12:19:02', 1, NULL, 'Poulet fermier pac (label rouge)  ', 'Poulet fermier pac (label rouge)  ', 'Poulet fermier pac (label rouge)  ', 214, 0, 1, 9.48, 20, 0, 0, 1, 1, 0, 9, 0, 2, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(177, 0, '177', 4, 'Dinde Fermier (Label Rouge) ', 0, 11, 11, '3', NULL, '', NULL, '2021-08-11 15:00:40', '2021-08-11 16:31:19', 0, NULL, 'Dinde fermier (label rouge) ', 'Dinde fermier (label rouge) ', 'Dinde fermier (label rouge) ', 215, 0, 1, 13.2, 20, 0, 0, 1, 1, 0, 9, 0, 2, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(178, 0, '178', 5, 'Epaule de Veau', 0, 10.9, 10.9, '1', NULL, '<p>L&rsquo;&eacute;paule de veau est un morceau de l&rsquo;animal tendre et moelleux et tr&egrave;s appr&eacute;ci&eacute; par les amateurs de viande. Facile &agrave; cuisiner, Il peut &ecirc;tre utilis&eacute; dans plusieurs recettes : en brochettes, saut&eacute;, &eacute;minc&eacute; ou encore r&ocirc;ti au four. &nbsp;L&rsquo;&eacute;paule reste une alternative moins ch&egrave;re &agrave; la noix de veau.</p>', NULL, '2021-08-11 15:14:54', '2021-09-14 12:45:07', 1, NULL, 'Epaule de vœu est le pied antérieur de veau est souvent vendu entier, désossé ou non selon son usage dans la cuisson, et elle convient à tous types de préparation ', 'Epaule de vœu', 'Epaule de vœu', 226, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(179, 0, '179', 5, 'Collier de Veau', 0, 10.9, 10.9, '1', NULL, '<p>Le collier de veau est un muscle localis&eacute; &agrave; l&rsquo;avant de la b&ecirc;te. M&eacute;connue et pas ch&egrave;re, cette viande se cuisine g&eacute;n&eacute;ralement &agrave; feu doux. Le collier de veau peut parfaitement convenir &agrave; la pr&eacute;paration d&rsquo;un pot-au-feu ou encore un rago&ucirc;t. Plusieurs chefs cuisiniers affirment que cette viande a un meilleur go&ucirc;t si elle est consomm&eacute;e le lendemain de sa cuisson.</p>', NULL, '2021-08-11 15:26:54', '2021-09-14 12:44:40', 1, NULL, 'Le collier est le muscle de cou de veau, il est abandonné par les consommateurs car il est peu connu ', 'Collier', 'Collier', 226, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(180, 0, '180', 5, 'Flanchet de Veau ', 0, 9.9, 9.9, '1', NULL, '<p>Le flanchet de veau est l&rsquo;ingr&eacute;dient principal de la blanquette. Cette viande, mince et peu tendre, pr&eacute;sente des caract&eacute;ristiques similaires au flanchet de b&oelig;uf. Elle est consid&eacute;r&eacute;e comme un produit de 2eme choix par les amateurs de viandes. Elle est par cons&eacute;quent moins ch&egrave;re que les autres morceaux de veau.</p>', NULL, '2021-08-11 15:37:50', '2021-09-14 12:43:52', 0, NULL, 'Le flanchet est la pièce la plus fine et la plus longue contient du cartilage. Une fois cuit, c\'est un morceau mou et gélatineux.', 'Flanchet', 'Flanchet', 227, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(181, 0, '181', 4, 'Poulet Rôti ', 0, 6.9, 6.9, '3.5', NULL, '', 'file_4064178cce8b8d57ed79cb48cec14f15.jpg', '2021-08-11 16:52:05', '2021-09-14 12:15:45', 0, NULL, 'Poulet rôti ', 'Poulet rôti ', 'Poulet rôti ', 214, 0, 1, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(182, 0, '182', 4, 'Poulet Rôti avec Garniture', 0, 9, 9, '3.5', NULL, '', 'file_e2fd2bcdad24b7eec72d9be2a94f077f.jpg', '2021-08-11 16:53:49', '2021-09-14 12:16:38', 0, NULL, 'Poulet rôti avec garniture ', 'Poulet rôti avec garniture ', 'Poulet rôti avec garniture ', 214, 0, 1, 10.8, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(183, 0, '183', 4, 'Cordon Bleu ', 0, 8.9, 8.9, '1', NULL, '<p>Les origines du Cordon Bleu sont, &agrave; ce jour, incertains. On raconte que cette tranche<strong> d&rsquo;<a href=\"../../../../products/show/37\">escalope de poulet</a></strong>, farcie par du jambon et du fromage, et enrob&eacute;e de chapelure, est d&rsquo;origine italienne. Les cuisiniers utilisaient, &agrave; l&rsquo;&eacute;poque, un ruban bleu pour joindre les deux extr&eacute;mit&eacute;s de la viande et ainsi maintenir la garniture, d&rsquo;o&ugrave; son appellation.</p>\n<p>Le cordon bleu, particuli&egrave;rement appr&eacute;ci&eacute; par les enfants, est tr&egrave;s facile &agrave; cuisiner. Il suffit de chauffer de l&rsquo;huile dans une po&ecirc;le et de le faire cuire pendant 12 &agrave; 15 minutes &agrave; feu moyen.&nbsp;</p>\n<p><strong>Go Ferme Halal </strong>vous propose un Cordon Bleu halal (certification AVS). Il vous sera livr&eacute; chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail </strong>ou via notre <strong>formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter</strong> afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <strong><a href=\"../../../../pages/show/14-nos-recettes\">recettes</a>.</strong></p>', 'file_3af706d8b8fe1602a681434f625014cc.jpg', '2021-08-11 16:57:10', '2021-09-14 12:02:02', 1, NULL, 'Cordon bleu ', 'Cordon bleu ', 'Cordon bleu ', 214, 1, 1, 10.68, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(184, 0, '184', 4, 'Cuisse de Dinde ', 0, 5.42, 5.42, '1', NULL, '<p>La cuisse de dinde au four est l&rsquo;un des plats les plus cuisin&eacute;s de nos jours. En effet, cette partie de la volaille contient tr&egrave;s peu de gras et elle est tr&egrave;s facile &agrave; pr&eacute;parer, &agrave; l&rsquo;instar des cuisses de poulet. Cependant, la dinde est nettement moins calorique que le poulet et peut parfaitement &ecirc;tre int&eacute;gr&eacute;e dans les r&eacute;gimes pour perdre du poids.&nbsp;</p>\n<p><strong>Go Ferme Halal </strong>vous propose une cuisse de dinde halal (certification AVS). Elle vous sera livr&eacute;e chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail </strong>ou via notre<strong> formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter </strong>afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.</p>', 'file_5ade4f9cbcef99149d098980cc1f5c3b.jpg', '2021-08-11 17:03:24', '2021-08-11 17:04:30', 0, NULL, 'Cuisse de dinde ', 'Cuisse de dinde ', 'Cuisse de dinde ', 215, 0, 1, 6.504, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(185, 0, '185', 4, 'Escalope de Dinde', 0, 10.9, 10.9, '1', NULL, '<p>L&rsquo;escalope de dinde est massivement recommand&eacute;e dans les r&eacute;gimes pour la perte de poids. En effet, cette viande, aux vertus di&eacute;t&eacute;tiques, pr&eacute;sente une faible teneur en calories et en lipides. Comptez 106 calories par tranche de 100 grammes. Elle est &eacute;galement tr&egrave;s utilis&eacute;e dans les r&eacute;gimes pr&eacute;ventifs des maladies cardiovasculaires.</p>\n<p><strong>Go Ferme Halal</strong> vous propose une escalope de dinde halal (certification AVS). Elle vous sera livr&eacute;e chez vous en moins de 48 heures.</p>\n<p>Pour en savoir plus sur nos modalit&eacute;s de paiement et de livraison, n&rsquo;h&eacute;sitez pas &agrave; nous contacter par <strong>t&eacute;l&eacute;phone</strong>, par <strong>mail</strong> ou via notre <strong>formulaire de contact</strong> disponible sur notre site web.</p>\n<p>Nous vous invitons &eacute;galement &agrave; vous inscrire, gratuitement, &agrave; notre <strong>Newsletter</strong> afin d&rsquo;&ecirc;tre au courant de toutes nos nouveaut&eacute;s, nos offres et nos <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a>.</p>\n<p><br /><br /></p>', 'file_093f07e53893da1a7e3580942e24032e.png', '2021-08-11 17:06:22', '2021-09-14 12:02:37', 1, NULL, 'Escalope de dinde ', 'Escalope de dinde ', 'Escalope de dinde ', 215, 1, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(186, 0, '186', 4, 'Poulet Fermier Effile (Label Rouge)', 0, 7.95, 7.95, '1 ( pièce) ', NULL, '', NULL, '2021-08-12 08:08:17', '2021-09-14 12:17:23', 0, NULL, 'Poulet fermier Effile ', 'Poulet fermier Effile ', 'Poulet fermier Effile ', 214, 0, 1, 9.54, 20, 0, 0, 1, 1, 0, 9, 0, 2, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(187, 0, '187', 4, 'Poulet Fermier Jaune ( Label Rouge) ', 0, 8.9, 8.9, '1', NULL, '', NULL, '2021-08-12 08:12:05', '2021-09-14 12:18:34', 1, NULL, 'Poulet fermier Jaune ( label rouge) ', 'Poulet fermier Jaune ( label rouge) ', 'Poulet fermier Jaune ( label rouge) ', 214, 0, 1, 10.68, 20, 0, 0, 1, 1, 0, 9, 0, 2, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(188, 0, '188', 4, 'Poulet Pac ', 0, 5.5, 5.5, '1 ( pièce) ', NULL, '', NULL, '2021-08-12 08:14:43', '2021-09-14 12:20:03', 0, NULL, 'Poulet pac ', 'Poulet pac ', 'Poulet pac ', 214, 0, 1, 6.6, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 ( pièce) ', '', 0, NULL, 6, NULL),
(189, 0, '189', 5, 'Côte Découverte de Veau', 0, 10.9, 10.9, '1', NULL, '<p>M&ecirc;me si &agrave; l&rsquo;apparence, les c&ocirc;tes de veau sont toutes identiques, elles pr&eacute;sentent n&eacute;anmoins quelques diff&eacute;rences dans leur structure et la forme de l&rsquo;os. La c&ocirc;te d&eacute;couverte est moins large et elle est localis&eacute;e sous l&rsquo;&eacute;paule. Tout comme ses voisines, la premi&egrave;re et la &nbsp;seconde, la c&ocirc;te d&eacute;couverte est tr&egrave;s riche en vitamines et en sels min&eacute;raux.</p>', NULL, '2021-08-12 08:48:11', '2021-09-14 12:40:50', 0, NULL, 'Cote découverte est plus étroit que les autres cotes, mais riche d\'aponévrose et son manche est très courbé, il est aussi plus solide.', 'Cote découverte', 'Cote découverte', 220, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(190, 0, '190', 4, 'Poularde Fermière ', 0, 13.65, 13.65, '1', NULL, '<p>Petite s&oelig;ur du chapon, la poularde fermi&egrave;re a des avantages nutritionnels nombreux. Etant nourri des c&eacute;r&eacute;ales, ca lui apporte un gout savoureux, une chair adorable et l&eacute;ger.</p>', NULL, '2021-08-12 09:07:24', '2021-08-12 09:19:01', 0, NULL, 'Poularde fermière ', 'Poularde fermière ', 'Poularde fermière ', 214, 1, 1, 16.38, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(192, 0, '', 4, 'Chapon Fermier  ', 0, 48.5, 48.5, '3-3.5', NULL, '<p>D&rsquo;origine Corpulent, issu d&rsquo;une souche des poulets noir, le chapon fermier est &eacute;lev&eacute; pendant 150 jours en plein air. Il est nourri essentiellement avec des c&eacute;r&eacute;ales et puis des produits laitiers. Etant porteur du Label rouge, ce type de volaille est consid&eacute;r&eacute; parmi les produits de meilleures ventes dans cette cat&eacute;gorie.</p>', NULL, '2021-08-12 09:13:03', '2021-08-12 09:15:04', 0, NULL, 'Chapon fermier  ', 'Chapon fermier  ', 'Chapon fermier  ', 162, 0, 1, 58.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, NULL, '', 0, NULL, 6, NULL),
(193, 0, '', 5, 'Côte Seconde de Veau ', 0, 16.9, 16.9, '1', NULL, '<p>La c&ocirc;te seconde de veau est quasiment identique &agrave; la c&ocirc;te premi&egrave;re. Elles sont toutes les deux tendres et moelleuses. C&rsquo;est une viande qui se cuisine g&eacute;n&eacute;ralement grill&eacute;e ou &agrave; la po&ecirc;le. Elle contient une bonne dose de sels min&eacute;raux ainsi que du fer, du phosphore ou encore du zinc.&nbsp;</p>', NULL, '2021-08-12 09:28:38', '2021-09-14 12:40:20', 0, NULL, 'La cote seconde rayée, plus douce que la cote première, mais moins belle ; son manche est courbé.', 'Cote seconde', 'Cote seconde', 220, 0, 1, 20.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(194, 0, '', 5, 'Pieds de Veau', 0, 3, 3, '1 (pièce)', NULL, '<p>Les pieds de veau, qui font partie de la famille des abats, est un produit m&eacute;connu du grand public. Pourtant, le bouillon de pieds de veau est un v&eacute;ritable rem&egrave;de naturel. En effet, selon plusieurs &eacute;tudes, le faite de faire bouillir cet organe et d&rsquo;en consommer r&eacute;guli&egrave;rement vous aide &agrave; avoir des os plus solides et des veines durcies.</p>', NULL, '2021-08-12 11:02:41', '2021-09-14 12:39:22', 0, NULL, 'pieds de veau rasés, blanchis, parfois partiellement cuits, accompagnés de pot-au-feu et viande bourguignonne', 'pied de veau ', 'pied de veau ', 222, 0, 1, 3.6, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '1 (pièce)', '', 0, NULL, 6, NULL),
(195, 0, '', 5, 'Foie de Veau ', 0, 20.9, 20.9, '1', NULL, '<p>Le foie de veau est un v&eacute;ritable minerai de vitamines et de sels min&eacute;raux. En effet, cette partie du veau est tr&egrave;s riche en vitamines (A, B1, B2, B5 ou encore B9) et surtout en fer. Il est vivement conseill&eacute; d&rsquo;en manger pour les personnes an&eacute;miques. Associ&eacute; aux merguez, le foie de veau est devenu un titulaire indiscutable de nos grillades mixtes.&nbsp;</p>', 'file_4ebfdc64d93545a570581868b20e0e50.jpg', '2021-08-12 11:18:10', '2021-09-14 12:38:35', 1, NULL, 'Le foie de veau est très fin de goût délicat, extrêmement doux, ce dernier est très apprécié', 'Foie', 'Foie', 223, 0, 1, 25.08, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(196, 0, '', 5, 'Tête de Veau ', 0, 30, 30, '1 (pièce)', NULL, '<p>T&egrave;te de veau est un abat blanc qui est nettoy&eacute;, ras&eacute;, blanchie et d&eacute;soss&eacute; car il est consomm&eacute; avec la peau</p>', NULL, '2021-08-12 11:47:34', '2021-09-14 12:38:08', 0, NULL, 'Tète de veau est un abat blanc qui est nettoyé, rasé, blanchie et désossé car il est consommé avec la peau   ', 'tète ', 'tète ', 222, 0, 1, 36, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '1 (pièce)', '', 0, NULL, 6, NULL),
(221, 0, '221', 2, 'produit test ', 0, 14, 14, '1', NULL, NULL, NULL, '2021-08-13 16:16:01', '2021-08-13 16:17:10', 0, NULL, '', '', '', 0, 0, 1, 16.8, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, NULL, NULL, 0, NULL, 6, NULL),
(226, 0, '226', 3, 'Gros Poitrine de Bœuf', 0, 6.9, 6.9, '1', NULL, '<p>Il est situ&eacute; sous l\'&eacute;paule et il est compos&eacute; de trois muscles pectoraux s&eacute;par&eacute;s par deux ou trois couches de cartilage. C\'est une viande stri&eacute;e et savoureuse.</p>', NULL, '2021-08-14 10:43:10', '2021-09-14 11:23:09', 0, NULL, 'Il est situé sous l\'épaule et il est composé de trois muscles pectoraux séparés par deux ou trois couches de cartilage. C\'est une viande striée et savoureuse.', 'Gros poitrine bœuf ', 'Gros poitrine bœuf ', 192, 0, 1, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(227, 0, '227', 3, 'Mouvant de Bœuf', 0, 10.9, 10.9, '1', NULL, '<p>Un morceau de cuisse d&eacute;licate et savoureuse qui se trouve sur la face int&eacute;rieur, il est maigre et a une fibre courte.</p>', NULL, '2021-08-14 11:18:09', '2021-09-14 11:14:51', 0, NULL, 'Un morceau de cuisse délicate et savoureuse qui se trouve sur la face intérieur, il est maigre et a une fibre courte.', 'Mouvant bœuf ', 'Mouvant bœuf ', 200, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(228, 0, '228', 3, 'Rond de Tranche de Bœuf', 0, 10.9, 10.9, '1', NULL, '<p>Un morceau maigre &agrave; fibres courtes de cuisse comme le mouvant et le plat de tranche qui est d&eacute;licate et savoureuse qui se trouve sur la face int&eacute;rieur.</p>', NULL, '2021-08-14 11:38:32', '2021-09-14 11:11:53', 0, NULL, 'Un morceau maigre à fibres courtes de cuisse comme le mouvant et le plat de tranche qui est délicate et savoureuse qui se trouve sur la face intérieur.', 'Rond de tranche bœuf', 'Rond de tranche bœuf', 200, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(230, 0, '230', 3, 'Bifteck Haché de Bœuf', 0, 14.9, 14.9, '1', NULL, '<p>Le bifteck hach&eacute; b&oelig;uf est fabriqu&eacute; &agrave; partir de rumsteak ou du filet au contraire de viande hach&eacute;e qui est faite de diff&eacute;rentes pi&egrave;ces de b&oelig;uf</p>', 'file_24aec2950d8b5422a1d4ab47ea7dc34b.jpg', '2021-08-14 12:15:47', '2021-09-02 16:47:24', 1, NULL, 'Le bifteck haché bœuf est fabriqué à partir de rumsteak ou du filet au contraire de viande hachée qui est faite de différentes pièces de bœuf', 'Bifteck haché bœuf ', 'Bifteck haché bœuf ', 213, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(231, 0, '231', 3, 'Brochette de Bœuf Marinée', 0, 17.9, 17.9, '1', NULL, '<p>Brochette de b&oelig;uf marin&eacute;e est pr&eacute;par&eacute; &agrave; l\'aide d\'un filet ou de bavette de b&oelig;uf, coup&eacute; en gros cubes</p>', 'file_b2e30f5892c3b94fcac6a89f4a0ddcf5.jpg', '2021-08-14 12:48:54', '2021-09-14 11:09:23', 0, NULL, 'Brochette de bœuf marinée est préparé à l\'aide d\'un filet ou de bavette de bœuf, coupé en gros cubes ', 'Brochette de bœuf marinée ', 'Brochette de bœuf marinée ', 207, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(232, 0, '232', 3, 'Brochette de Bœuf Nature', 0, 17.9, 17.9, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose des brochettes de b&oelig;uf Nature, issues d&rsquo;une viande fra&icirc;che, de qualit&eacute; sup&eacute;rieure.</p>\n<p><strong>Mode et temps de pr&eacute;paration :</strong></p>\n<p>Les brochettes sont fra&icirc;ches et pr&ecirc;tes &agrave; l\'emploi !&nbsp;</p>\n<p>Selon la cuisson souhait&eacute;e et vos convives, vous pouvez pr&eacute;parer vos brochettes d&rsquo;agneau :</p>\n<p>&nbsp; &nbsp; <strong>&nbsp;- </strong>&Agrave; la grille<br />&nbsp; &nbsp; <strong>&nbsp;-&nbsp;</strong>Au barbecue<br />&nbsp; &nbsp; <strong>&nbsp;-</strong>&nbsp;Au four<br />&nbsp; &nbsp; <strong>&nbsp;-</strong>&nbsp;&Agrave; la plancha</p>\n<p>D&eacute;couvrez &eacute;galement en ligne nos autres produits :<strong>&nbsp;<a href=\"../../../../products/show/231\">Brochettes de boeuf marin&eacute;es</a>, <a href=\"../../../../products/categorie/101-epices\">&eacute;picerie</a>, <a href=\"../../../../products/show/63\">Steak hach&eacute;</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-08-14 12:53:53', '2021-09-14 11:08:58', 0, NULL, '', 'Brochette de bœuf nature', 'Brochette de bœuf nature', 207, 0, 1, 21.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(233, 0, '233', 3, 'Joue de Bœuf', 0, 12.9, 12.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp; La joue de b&oelig;uf est un morceau de viande qui n&rsquo;est tr&egrave;s pas connue chez les consommateurs de viandes rouges. Pourtant, cette partie de la m&acirc;choire de l&rsquo;animal, consid&eacute;r&eacute;e comme un produit de 2eme choix, est tr&egrave;s tendre et contient tr&egrave;s peu de gras. La joue de b&oelig;uf est une viande pas ch&egrave;re et peut servir &agrave; la pr&eacute;paration d&rsquo;un bourguignon de b&oelig;uf.</p>', NULL, '2021-08-16 08:46:26', '2021-09-14 11:08:25', 0, NULL, 'La joue de bœuf est un muscle qui fait partie de la tète de l\'animal, elle provient de la mâchoire inferieur et elle légèrement grasse. ', 'Joue de bœuf', 'Joue de bœuf', 203, 0, 1, 15.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(234, 0, '234', 3, 'Rosbif en Faux Filet de Bœuf ', 0, 19.9, 19.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp;<strong>Le Rosbif en faux filet de b&oelig;uf,</strong> comme son nom l&rsquo;indique, est tout simplement un morceau taill&eacute; dans le faux-filet. La viande&nbsp; est recouverte d&rsquo;une mince bande de lard. Le tout est ficel&eacute; en faisant le tour du r&ocirc;ti. La barde sert &agrave; emp&ecirc;cher le dess&egrave;chement de la viande. Son temps de cuisson doit &ecirc;tre calcul&eacute; selon le poids et la forme du morceau</p>', NULL, '2021-08-16 12:07:03', '2021-09-14 11:07:56', 0, NULL, '', 'Rosbif en faux filet', 'Rosbif en faux filet', 197, 0, 1, 23.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(235, 0, '235', 3, 'Rosbif Rumsteak de Bœuf ', 0, 15.9, 15.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp; <strong>Le rosbif rumsteak de b&oelig;uf</strong> est l&rsquo;un des produits les plus utilis&eacute;s dans la cuisson des r&ocirc;tis &agrave; basse temp&eacute;rature. La viande&nbsp; est recouverte d&rsquo;une mince bande de lard. Le tout est ficel&eacute; en faisant le tour du r&ocirc;ti. La barde sert &agrave; emp&ecirc;cher le dess&egrave;chement de la viande. Son temps de cuisson doit &ecirc;tre calcul&eacute; selon le poids et la forme du morceau</p>', NULL, '2021-08-16 12:20:32', '2021-09-14 11:07:25', 0, NULL, '', 'Rosbif rumsteak', 'Rosbif rumsteak', 197, 0, 1, 19.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(236, 0, '236', 3, 'Rosbif en Filet de Bœuf ', 0, 27.9, 27.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp;<strong>Le Rosbif en filet de b&oelig;uf</strong> est tout simplement un morceau taill&eacute; dans le filet. La viande&nbsp; est recouverte d&rsquo;une mince bande de lard. Le tout est ficel&eacute; en faisant le tour du r&ocirc;ti. La barde sert &agrave; emp&ecirc;cher le dess&egrave;chement de la viande.&nbsp;</p>', NULL, '2021-08-16 12:25:36', '2021-09-14 11:05:12', 0, NULL, '', 'Rosbif en filet', 'Rosbif en filet', 197, 0, 1, 33.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(238, 0, '238', 2, 'Epaule Roulé', 0, 15.9, 15.9, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose une &eacute;paule d&rsquo;agneau roul&eacute; fra&icirc;che et savoureuse.&nbsp;</p>\n<p>R&ocirc;tie, brais&eacute;e, ou encore grill&eacute;e, elle peut tout aussi bien &eacute;pater vos convives d&rsquo;un soir qu&rsquo;&eacute;gayer le repas du dimanche.</p>\n<p>&nbsp; &nbsp; Optez pour un morceau go&ucirc;teux, tendre et peu filandreux, pour pr&eacute;parer des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong> </a>d&eacute;licieuses.</p>\n<p>D&eacute;couvrez &eacute;galement nos autres produits :<strong><a href=\"../../../../products/show/86\">Epaule d\'agneau desoss&eacute;e</a>, <a href=\"../../../../products/show/85\">Epaule d\'agneau avec Os</a>, <a href=\"../../../../products/show/73-souris-dagneau\">Souris d\'agneau</a>,<a href=\"../../../../products/show/72\"> Selle d\'agneau</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', 'file_4e9fecd1b7c1d9d1eb34ec5d8dd71f1d.jpg', '2021-08-16 15:35:45', '2021-09-15 09:59:18', 1, NULL, '', 'Epaule roulé', 'Epaule roulé', 196, 0, 1, 19.08, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 0, NULL, 6, NULL),
(239, 0, '239', 2, 'Gigot Désossé d\'Agneau', 0, 16.9, 16.9, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose un gigot d&eacute;soss&eacute;, issue d&rsquo;une viande d&rsquo;agneau, &eacute;lev&eacute;e en plein air et avec une nourriture 100 % bio.&nbsp;</p>\n<p>Il faut savoir que le gigot est l&rsquo;une des pi&egrave;ces les plus maigres de l&rsquo;agneau.</p>\n<p><strong>Astuces de Go Ferme Halal :</strong></p>\n<p><strong>&nbsp; &nbsp; - </strong>La chair du gigot d&rsquo;agneau se marrie parfaitement avec le go&ucirc;t de l&rsquo;ail<br /><strong>&nbsp; &nbsp; - </strong>Cuire &agrave; feu vif<br /><strong>&nbsp; &nbsp; - </strong>Prot&eacute;ger le gigot d&rsquo;agneau &agrave; mi-cuisson par un papier d&rsquo;aluminium, afin d&rsquo;&eacute;viter que&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;l&rsquo;ext&eacute;rieur ne soit trop br&ucirc;l&eacute;<br /><strong>&nbsp; &nbsp; - </strong>Saler les tranches qu&rsquo;au moment de la d&eacute;coupe</p>\n<p>&nbsp;</p>\n<p>N&rsquo;h&eacute;sitez pas &agrave; d&eacute;couvrir &eacute;galement nos autres produits : <strong><a href=\"../../../../products/show/76\">Gigot entier</a>, <a href=\"../../../../products/show/75\">Gigot raccourci</a>, <a href=\"../../../../products/show/74\">Tranches de gigot d\'agneau</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>\n<p>&nbsp;</p>', NULL, '2021-08-16 15:38:26', '2021-09-17 19:57:12', 0, NULL, '', 'gigot désossé', 'gigot désossé', 208, 0, 1, 20.28, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(240, 0, '240', 5, 'Poitrine de Veau ', 0, 9.9, 9.9, '1', NULL, '<p>La poitrine de veau est une viande qui se rapproche du flanchet et du Tendron. C&rsquo;est un muscle qui contient des os et des cartilages. Elle convient parfaitement dans les <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> qui demandent un mode de cuisson lent. La poitrine de veau reste n&eacute;anmoins une des parties de l&rsquo;animal les plus caloriques.</p>', 'file_29d99b2110ef36f1b6fca882111468d5.jpg', '2021-08-16 16:44:23', '2021-09-14 12:36:27', 1, NULL, 'La poitrine de veau est la partie la plus grosse et larges des morceaux, elle est riche en viande osseux qui contient du cartilage', 'Poitrine', 'Poitrine', 226, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(241, 0, '241', 5, 'Langue de Veau', 0, 12.9, 12.9, '1', NULL, '<p>Faisant partie de la famille des abats, la langue de veau est un aliment calorique et riche en fer et &nbsp;en prot&eacute;ines. Cette viande est donc tr&egrave;s conseill&eacute;e pour les r&eacute;gimes hyper prot&eacute;in&eacute;s. La langue de veau se cuisine g&eacute;n&eacute;ralement &agrave; la po&ecirc;le, accompagn&eacute;e d&rsquo;une sauce de votre choix (piquante, aux champignons ou encore une sauce Mad&egrave;re) et de riz.&nbsp;</p>', 'file_e4a621c4fa0ce6e8bb685c651323c06a.jpg', '2021-08-16 16:46:35', '2021-09-14 12:31:51', 1, NULL, '', 'Langue de veau', 'Langue de veau', 223, 0, 1, 15.48, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(242, 0, '242', 3, 'Merguez de Bœuf', 0, 9.9, 9.9, '1', NULL, '<p>&nbsp; &nbsp; Originaire d&rsquo;Afrique du Nord, <strong>la merguez de b&oelig;uf</strong> s&rsquo;est impos&eacute;e comme un composant indispensable de nos barbecues estivaux. Sa couleur rouge, qui la caract&eacute;rise tant, est le r&eacute;sultat des &eacute;pices utilis&eacute;es dans sa confection. La merguez de b&oelig;uf est tr&egrave;s calorique et convient parfaitement &agrave; l&rsquo;alimentation des sportifs.</p>', 'file_64e7b48647a27d539b060a69c8990a6b.jpg', '2021-08-17 09:50:13', '2021-09-14 11:04:23', 1, NULL, 'Merguez de bœuf est fait à partir de la viande de bœuf hachée et mélangée avec quelques piments et épices.  ', 'Merguez de bœuf', 'Merguez de bœuf', 213, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 1, '', '', 0, NULL, 6, NULL),
(243, 0, '243', 2, 'Merguez d\'Agneau', 0, 13.9, 15.29, '1', NULL, '<p><strong>Go Ferme Halal</strong> vous propose Merguez d\'agneau, &agrave; base de viande 100 % halal, tendre et tr&egrave;s parfum&eacute;e.&nbsp;</p>\n<p>&nbsp; &nbsp;Cette petite saucisse fra&icirc;che et &eacute;pic&eacute;e &agrave; base d\'agneau fera bien des heureux. Elle est parfaite pour pr&eacute;parer des <strong><a href=\"../../../../pages/show/14-nos-recettes\">recettes</a> </strong>tellement savoureuses.</p>\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nous vous proposons un produit incontournable de notre boucherie.</strong></p>\n<p><br />&nbsp; &nbsp; &nbsp; &nbsp;</p>\n<p>D&eacute;couvrez &eacute;galement nos autres produits :<strong><a href=\"../../../../products/show/79\"> Steak hach&eacute; d\'ageau</a>, <a href=\"../../../../products/show/91\">Brochettes d\'agneau Label Rouge</a>, <a href=\"../../../../products/show/87\">Brochettes d\'agenau Bio</a>, <a href=\"../../../../products/show/90\">Brochettes d\'agneau</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>', 'file_d809767d9557edf0b3813dd8581b77a6.jpg', '2021-08-17 10:17:14', '2021-09-17 19:57:07', 1, NULL, 'Merguez d\'agneau est fait à partir de la viande d\'agneau hachée et mélangée avec quelques piments et épices  ', 'Merguez d\'agneau', 'Merguez d\'agneau ', 212, 0, 1, 16.68, 20, 10, 0, 1, 2, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(244, 0, '244', 5, 'Merguez de Veau', 0, 14.9, 14.9, '0.5', NULL, '<p>&nbsp; Comme pour la merguez de b&oelig;uf, <strong>la merguez de veau</strong> s&rsquo;est impos&eacute;e comme un composant indispensable de nos barbecues estivaux. Sa couleur rouge, qui la caract&eacute;rise tant, est le r&eacute;sultat des &eacute;pices utilis&eacute;es dans sa confection. La merguez de veau reste n&eacute;anmoins moins calorique que celle du b&oelig;uf.</p>', 'file_df38a22a320c0fbbb87b21c4ef6b1008.jpg', '2021-08-17 10:20:31', '2021-09-14 12:31:15', 1, NULL, 'Merguez de veau est fait à partir de la viande de veau hachée et mélangée avec quelques piments et épices  ', 'Merguez de veau ', 'Merguez de veau ', 224, 0, 1, 17.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 paquet d\'environ 500g', '', 0, NULL, 6, NULL),
(245, 0, '245', 3, 'Macreuse de bœuf découpée en cubes', 0, 10.9, 10.9, '1', NULL, '<p>&nbsp; &nbsp; La macreuse de b&oelig;uf d&eacute;coup&eacute;e en cubes sert le plus souvent &agrave; pr&eacute;parer les plats mijot&eacute;s, tels que le rago&ucirc;t ou encore le pot-au-feu. R&eacute;put&eacute;e pour son aspect g&eacute;latineux, elle est &eacute;galement tr&egrave;s utilis&eacute;e dans la pr&eacute;paration du <strong><a href=\"../../../../products/show/47\">b&oelig;uf bourguignon.</a></strong></p>', NULL, '2021-08-17 10:31:32', '2021-09-14 11:03:40', 0, NULL, '', 'Macreuse coupé en cube', 'Macreuse coupé en cube', 193, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(246, 0, '246', 4, 'Poulet Prêt à Cuir', 0, 5.5, 5.5, '1 (pièce)', NULL, '', NULL, '2021-08-17 11:00:20', '2021-09-14 12:27:58', 0, NULL, 'Poulet prêt à cuir présente une viande tendre et délicieuse non grasse et qu\'elle a la peau fine.', 'Poulet prêt à cuir', 'Poulet prêt à cuir', 214, 0, 0, 6.6, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 (pièce)', '', 0, NULL, 6, NULL),
(247, 0, '247', 3, 'Bœuf à Mijoter ', 0, 9.9, 9.9, '1', NULL, '<p>&nbsp; &nbsp; Le terme <strong>&laquo;&nbsp;b&oelig;uf &agrave; mijoter&nbsp;&raquo; </strong>ne d&eacute;signe pas un morceau en particulier de l&rsquo;animal mais fait r&eacute;f&eacute;rence &agrave; un mode de pr&eacute;paration culinaire. En effet, plusieurs parties du b&oelig;uf peuvent servir &agrave; cette m&eacute;thode de cuisson lente et &agrave; feu doux. Le <a href=\"../../../../products/show/58\"><strong>plat de c&ocirc;te</strong></a>, le <a href=\"../../../../products/show/124\"><strong>g&icirc;te &agrave; la noix</strong></a> ou encore <a href=\"../../../../products/show/250\"><strong>le</strong> <strong>flanchet</strong></a>&nbsp;sont les viandes les plus utilis&eacute;es pour pr&eacute;parer un b&oelig;uf mijot&eacute;.</p>', NULL, '2021-08-17 11:30:28', '2021-09-14 11:03:06', 1, NULL, 'Bœuf à mijoter est le morceau le plus économique des morceaux de bœuf car il convient à toutes types des cuissons ', 'Bœuf à mijoter ', 'Bœuf à mijoter ', 216, 0, 1, 11.88, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(249, 0, '249', 3, 'Quasi de Bœuf', 0, 10.9, 10.9, '1', NULL, '<p>&nbsp; &nbsp; <strong>Le quasi de b&oelig;uf</strong> est sans doute l&rsquo;une des viandes les plus utilis&eacute;es dans la pr&eacute;paration d&rsquo;un r&ocirc;ti, qu&rsquo;il soit classique ou brais&eacute;. Ce morceau est localis&eacute; dans le haut de la cuisse. Le terme quasi de b&oelig;uf est n&eacute;anmoins rarement utilis&eacute; dans le jargon culinaire. Le quasi de veau, en revanche, est tr&egrave;s r&eacute;pandu chez les bouchers.</p>', NULL, '2021-08-17 13:25:40', '2021-09-14 11:01:39', 0, NULL, 'Quasi de bœuf est la partie de la cuisse qui est détaché de la ronde par une section droite parallèlement à l\'os pubien ', 'Quasi de bœuf ', 'Quasi de bœuf ', 194, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(250, 0, '250', 3, 'Flanchet de Bœuf', 0, 6.9, 6.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp; &nbsp;Le flanchet de b&oelig;uf est une viande qui se situe dans la partie inf&eacute;rieure de l&rsquo;animal, plus pr&eacute;cis&eacute;ment dans l&rsquo;abdomen. Caract&eacute;ris&eacute; par son aspect stri&eacute;, le flanchet de b&oelig;uf est tr&egrave;s utilis&eacute; dans la pr&eacute;paration du pot-au-feu. Appel&eacute; &eacute;galement la petite poitrine, cette viande est totalement d&eacute;pourvue d&rsquo;os et tr&egrave;s riches en prot&eacute;ines.</p>', NULL, '2021-08-17 14:00:38', '2021-09-14 11:00:50', 0, NULL, 'Flanchet de bœuf est très plat, désossé, au cartilage alternant avec des muscles striés de longueur moyenne et à fibres longues.', 'Flanchet de bœuf', 'Flanchet de bœuf', 192, 0, 1, 8.28, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(251, 0, '251', 2, 'Côtes d\'Agneau', 0, 14.9, 16.39, '1', NULL, '<p><strong>Go Ferme Halal </strong>vous propose une c&ocirc;te d&rsquo;agneau de qualit&eacute; sup&eacute;rieure, issue d&rsquo;une viande tendre et tr&egrave;s parfum&eacute;e. Nous vous assurons une viande certifi&eacute;e AVS. En effet, elles proviennent d&rsquo;agneaux &eacute;lev&eacute;s en plein air, sous m&egrave;re et avec une alimentation bio.</p>\n<p>Optez pour une viande d\'agneau :</p>\n<p><strong>&nbsp; &nbsp; - </strong>Riche en vitamines<br /><strong>&nbsp; &nbsp; - </strong>Ros&eacute;e claire<br /><strong>&nbsp; &nbsp; - </strong>Tr&egrave;s peu grasse<br /><strong>&nbsp; &nbsp; - </strong>Avec un go&ucirc;t savoureux&nbsp;<br /><strong>&nbsp; &nbsp; - </strong>Avec une texture moelleuse&nbsp;</p>\n<p>Laissez-vous tenter par cette c&ocirc;te d\'agneau et pr&eacute;parez des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> qui raviront vos convives!</p>\n<p>Disponible &eacute;galement, en vente en ligne <strong>:<a href=\"../../../../products/show/150\">C&ocirc;tes premieres d\'agneau</a>, <a href=\"../../../../products/show/149\">C&ocirc;tes secondaires d\'agneau</a>, <a href=\"../../../../products/show/83\">C&ocirc;telettes d\'agneau</a>, <a href=\"../../../../products/show/78\">C&ocirc;tes filet d\'agneau</a>&hellip; !</strong></p>', 'file_49a67663b36c584f2e38906fccc73d44.jpg', '2021-08-17 14:33:06', '2021-09-17 19:56:55', 1, NULL, 'Les côtes d\'agneau ont 13 paires de côtes qui forment la cage thoracique. Ils sont laissés carrés ou coupés individuellement. Il en existe trois types; cote découverte, cote première et cote filet ', 'cote d\'agneau ', 'cote d\'agneau ', 190, 0, 1, 17.88, 20, 10, 0, 1, 2, 0, 9, 1, 1, 1, 1, 1, 1, '', '', 1, NULL, 6, NULL),
(252, 0, '252', 3, 'Macreuse pour Bourguignon de Bœuf ', 0, 10.9, 10.9, '1', NULL, '<p>&nbsp; &nbsp; &nbsp; Riche en phosphore et en calcium, la macreuse de b&oelig;uf est une viande g&eacute;latineuse qui se situe dans la partie inf&eacute;rieure de l&rsquo;&eacute;paule de l&rsquo;animal. Associ&eacute;e &agrave; d&rsquo;autres types de viandes, comme par exemple le <strong><a href=\"../../../../products/show/132\">paleron</a></strong> (viande peu grasse) et le <strong>tendron</strong> (viande entrelard&eacute;e), elle sert &agrave; pr&eacute;parer un plat qui a la cote chez les Fran&ccedil;ais, &agrave; savoir le Bourguignon de b&oelig;uf.</p>', NULL, '2021-08-17 15:31:45', '2021-09-14 10:53:15', 0, NULL, '', 'Macreuse pour bourguignon ', 'Macreuse pour bourguignon ', 193, 0, 1, 13.08, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(262, 0, '262', 101, 'Sauce Barbecue - El Morjane', 0, 2.41, 2.41, '', NULL, '<p><strong>Avant ouverture</strong>, &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes </strong>: Aucun.</p>\n<p><strong>Ingr&eacute;dients</strong> : Sucre (39%), eau, vinaigre, concentr&eacute; de tomates (5%), amidon modifi&eacute;, sel, ar&ocirc;me, ar&ocirc;me de fum&eacute;e, stabilisant (gomme xanthane), acidifiant (acide citrique).</p>', 'file_54ec874ca67d0e1783ccac4fae73bd53.jpg', '2021-08-30 10:19:12', '2021-08-30 10:19:48', 1, NULL, '', 'Sauce Barbecue', 'Sauce Barbecue', 229, 0, 1, 2.892, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(263, 0, '263', 101, 'Sauce Ketchup - El Morjane', 0, 2, 2, '500ml', NULL, '<p><strong>Avant ouverture</strong>, &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes </strong>: Aucun.</p>\n<p><strong>Ingr&eacute;dients</strong> : Sucre, eau, concentr&eacute; de tomates (17%), vinaigre, amidon modifi&eacute;, sel, extrait, stabilisant (gomme xanthane), acidifiant (acide citrique).</p>', 'file_6d73383a41142a074c0b180d53632127.jpg', '2021-08-30 10:30:37', '2021-08-30 10:36:51', 1, NULL, 'Sauce Ketchup', 'Sauce Ketchup', 'Sauce Ketchup', 229, 0, 1, 2.4, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(264, 0, '264', 101, 'Sauce Algérienne - El Morjane', 0, 2.41, 2.41, '', NULL, '<p><strong>Avant ouverture,</strong> &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes : </strong>Moutarde et &oelig;uf.</p>\n<p><strong>Ingr&eacute;dients :</strong> Huile de colza (49%), sucre, eau, vinaigre, moutarde (eau, graines de moutarde, vinaigre, sel et &eacute;pices), jaunes d\'&oelig;ufs, concentr&eacute; de tomate, oignon d&eacute;shydrat&eacute;, extraits (chili, oignon, ail, moutarde, clous de girofle), chili, ar&ocirc;me, colorants (extrait de paprika, b&ecirc;ta-carot&egrave;ne), ar&ocirc;me de fum&eacute;e, sel, granulat de paprika, acidifiant (acide citrique), stabilisant (gomme xanthane), antioxydant (calcium disodium EDTA).</p>', 'file_47ffd9b4bfd00550c466ab97eebd9dfc.jpg', '2021-08-30 10:43:46', '2021-08-30 10:44:16', 1, NULL, 'Sauce Algérienne', 'Sauce Algérienne', 'Sauce Algérienne', 229, 0, 1, 2.892, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(265, 0, '265', 101, 'Sauce Burger - El Morjane', 0, 2.41, 2.41, '', NULL, '<p><strong>Avant ouverture</strong>, &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes :</strong> Moutarde, &oelig;uf et sulfites.</p>\n<p><strong>Ingr&eacute;dients :</strong> Huile de colza (69.1%), eau, moutarde (eau, graines de moutarde, vinaigre, sel et &eacute;pices), vinaigre, concentr&eacute; de tomates, sucre, jaune d\'&oelig;ufs en poudre, sel, cornichons (contient des sulfites), extraits naturels, acidifiant (acide citrique).</p>', 'file_1de0e471bcb0b024b23d417c3c244424.jpg', '2021-08-30 10:53:58', '2021-08-30 10:54:25', 1, NULL, 'Sauce Burger ', 'Sauce Burger ', 'Sauce Burger ', 229, 0, 2, 2.892, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(266, 0, '266', 101, 'Sauce Mayonnaise - El Morjane', 0, 2.35, 2.35, '', NULL, '<p><strong>Avant ouverture,</strong> &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes </strong>: Moutarde et &oelig;uf.</p>\n<p><strong>Ingr&eacute;dients </strong>: Huile de colza (69%), eau, jaunes d\'&oelig;ufs (5.9%), vinaigre, extraits (jus de citron, poivre, oignon), sucre, moutarde (eau, graines de moutarde, vinaigre, sel et &eacute;pices), sel, amidon modifi&eacute;, acidifiant (acide citrique), colorant (extrait de paprika), antioxydant (calcium disodium EDTA).</p>', 'file_d5108bc53b82806b86896314e1549624.jpg', '2021-08-30 10:59:57', '2021-08-30 11:00:19', 1, NULL, 'Sauce Mayonnaise', 'Sauce Mayonnaise', 'Sauce Mayonnaise', 229, 0, 1, 2.82, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(267, 0, '267', 101, 'Sauce Andalouse - El Morjane', 0, 2.41, 2.41, '', NULL, '<p><strong>Avant ouverture</strong>, &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes :</strong> Moutarde, &oelig;uf et c&eacute;leri.</p>\n<p><strong>Ingr&eacute;dients :</strong> Huile de colza (49%), eau, concentr&eacute; de tomates, moutarde (eau, graines de moutarde, vinaigre, sel et &eacute;pices), vinaigre, sucre, jaune d\'&oelig;ufs, extraits (contient du c&eacute;leri), c&acirc;pres, sel, poudre de paprika et d\'oignon, amidon modifi&eacute;, ar&ocirc;me, colorant (extrait de paprika), acidifiant (acide citrique), stabilisant (gomme xanthane), antioxydant (calcium disodium EDTA).</p>', 'file_7cb904a79f545440a68294a594f19323.jpg', '2021-08-30 11:04:14', '2021-08-30 11:04:44', 1, NULL, 'Sauce Andalouse', 'Sauce Andalouse', 'Sauce Andalouse', 229, 0, 1, 2.892, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(268, 0, '268', 101, 'Sauce Cheezy - El Morjane', 0, 2.41, 2.41, '', NULL, '<p><strong>Avant ouverture</strong>, &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture,</strong> &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes :</strong> Moutarde, &oelig;uf et lait.</p>\n<p><strong>Ingr&eacute;dients : </strong>Huile de colza (59%), eau, vinaigre, jaunes d\'&oelig;ufs, sucre, ar&ocirc;me (contient lait et moutarde), colorants (b&ecirc;ta-carot&egrave;ne et extrait de paprika), sel, amidon modifi&eacute;, acidifiant (acide citrique), stabilisant (gomme xanthane), antioxydant (calcium disodium EDTA).</p>', 'file_d55a23dd3caacbae0ce3ca203a0321c0.jpg', '2021-08-30 11:09:07', '2021-08-30 11:09:26', 1, NULL, 'Sauce Cheezy', 'Sauce Cheezy', 'Sauce Cheezy', 229, 0, 1, 2.892, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(269, 0, '269', 101, 'Sauce Samouraï - El Morjane', 0, 2.41, 2.41, '', NULL, '<p><strong>Avant ouverture,</strong> &agrave; conserver &agrave; temp&eacute;rature ambiante, &agrave; l\'abri de la chaleur et de l\'humidit&eacute;.</p>\n<p><strong>Apr&egrave;s ouverture</strong>, &agrave; conserver maximum 30 jours au r&eacute;frig&eacute;rateur entre 0&deg;C et +4&deg;c.</p>\n<p><strong>Allerg&egrave;nes : </strong>Moutarde et &oelig;uf.</p>\n<p><strong>Ingr&eacute;dients :</strong> Huile de colza (61%), eau, vinaigre, jaunes d\'&oelig;ufs, moutarde (eau, graines de moutarde, vinaigre, sel et &eacute;pices), concentr&eacute; de tomates, sucre, sel, chili (0.4%), amidon modifi&eacute;, extraits (contient &nbsp;moutarde), ar&ocirc;me, colorant (extrait de paprika), granulat de paprika, acidifiant (acide citrique), antioxydant (calcium disodium EDTA).</p>', 'file_2707c8e88780845304c5ae29546ceaf6.jpg', '2021-08-30 11:13:20', '2021-08-30 11:14:02', 1, NULL, 'Sauce Samouraï', 'Sauce Samouraï', 'Sauce Samouraï', 229, 0, 1, 2.892, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(270, 0, '270', 101, 'Huile D\'olive Vierge Extra 1L PET - El Morjane', 0, 6.83, 6.83, '', NULL, '<p>Cette huile d\'olive vierge &nbsp;extra est un produit compl&egrave;tement naturel, sans additif ni conservateur. Cette huile de cat&eacute;gorie sup&eacute;rieure est obtenue &agrave; l\'aide de proc&eacute;d&eacute;s m&eacute;caniques avec la premi&egrave;re pression &agrave; froid d\'olives sougneusement s&eacute;lectionn&eacute;es. Ce pur jus de fruit d\'olive est extrait de la premi&egrave;re pression afin d\'obtenir sa consistance, son go&ucirc;t fruit&eacute;, sa couleur verte aux reflets dor&eacute;s, son ar&ocirc;me rafrichissant, son corps, sa saveur longue est prononc&eacute;e qui produit une sensation persistante au palais avec un arri&egrave;re-go&ucirc;t tr&egrave;s agr&eacute;able. Elle se marie bien avec le fromage, les saveurs intenses des potages, les plats en sauce ou &agrave; base de riz, les oeufs etc... sans oublier la conception de vinegrettes et d\'assaisonnements pour accopagnier les salades. Produit en UE.</p>\n<p><strong>Allerg&egrave;nes : </strong>Aucun.</p>\n<p><strong>Ingr&eacute;dient : </strong>Huile d\'olive.</p>', 'file_21862c5351ab00efa9ac23478da4e643.jpg', '2021-08-31 16:02:21', '2021-08-31 16:02:51', 1, NULL, 'Huile D\'olive Vierge Extra 1l PET', 'Huile D\'olive Vierge Extra 1l PET', 'Huile D\'olive Vierge Extra 1l PET', 232, 0, 1, 8.196, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 Litre', '', 0, NULL, 6, NULL),
(271, 0, '271', 101, 'Huile D\'olive Vierge Extra 500ml Verre - El Morjane', 0, 4.71, 4.71, '', NULL, '<p>Cette huile d\'olive vierge &nbsp;extra est un produit compl&egrave;tement naturel, sans additif ni conservateur. Cette huile de cat&eacute;gorie sup&eacute;rieure est obtenue &agrave; l\'aide de proc&eacute;d&eacute;s m&eacute;caniques avec la premi&egrave;re pression &agrave; froid d\'olives sougneusement s&eacute;lectionn&eacute;es. Ce pur jus de fruit d\'olive est extrait de la premi&egrave;re pression afin d\'obtenir sa consistance, son go&ucirc;t fruit&eacute;, sa couleur verte aux reflets dor&eacute;s, son ar&ocirc;me rafrichissant, son corps, sa saveur longue est prononc&eacute;e qui produit une sensation persistante au palais avec un arri&egrave;re-go&ucirc;t tr&egrave;s agr&eacute;able. Elle se marie bien avec le fromage, les saveurs intenses des potages, les plats en sauce ou &agrave; base de riz, les oeufs etc... sans oublier la conception de vinegrettes et d\'assaisonnements pour accopagnier les salades. Produite en UE.</p>\n<p><strong>Allerg&egrave;nes :</strong> Aucun.</p>\n<p><strong>Ingr&eacute;dient :</strong> Huile d\'olive.</p>', 'file_0d6fbad682d1e376cf5aec551579d44b.jpg', '2021-08-31 16:09:07', '2021-09-01 10:50:27', 1, NULL, 'Huile D\'olive Vierge Extra 500ml Verre', 'Huile D\'olive Vierge Extra 500ml Verre', 'Huile D\'olive Vierge Extra 500ml Verre', 232, 0, 1, 5.652, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '500ml', '', 0, NULL, 6, NULL),
(272, 0, '272', 101, 'Huile D\'olive Vierge Extra 750ml Verre - El Morjane', 0, 6.38, 6.38, '', NULL, '<p>Cette huile d\'olive vierge &nbsp;extra est un produit compl&egrave;tement naturel, sans additif ni conservateur. Cette huile de cat&eacute;gorie sup&eacute;rieure est obtenue &agrave; l\'aide de proc&eacute;d&eacute;s m&eacute;caniques avec la premi&egrave;re pression &agrave; froid d\'olives sougneusement s&eacute;lectionn&eacute;es. Ce pur jus de fruit d\'olive est extrait de la premi&egrave;re pression afin d\'obtenir sa consistance, son go&ucirc;t fruit&eacute;, sa couleur verte aux reflets dor&eacute;s, son ar&ocirc;me rafrichissant, son corps, sa saveur longue est prononc&eacute;e qui produit une sensation persistante au palais avec un arri&egrave;re-go&ucirc;t tr&egrave;s agr&eacute;able. Elle se marie bien avec le fromage, les saveurs intenses des potages, les plats en sauce ou &agrave; base de riz, les oeufs etc... sans oublier la conception de vinegrettes et d\'assaisonnements pour accopagnier les salades. Produite en UE.</p>\n<p><strong>Allerg&egrave;nes :</strong> Aucun.</p>\n<p><strong>Ingr&eacute;dient :</strong> Huile d\'olive.</p>', 'file_ef9f579b1345bf6920903ab21eb9f664.jpg', '2021-08-31 16:14:31', '2021-08-31 16:15:01', 1, NULL, 'Huile D\'olive Vierge Extra 750ml Verre', 'Huile D\'olive Vierge Extra 750ml Verre', 'Huile D\'olive Vierge Extra 750ml Verre', 232, 0, 1, 7.656, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '750ml', '', 0, NULL, 6, NULL);
INSERT INTO `av_products` (`product_id`, `new_id`, `product_ref`, `categorie_id`, `product_name`, `product_total_price`, `product_price`, `product_price_dicount`, `product_poids`, `product_text`, `product_short_text`, `product_picture`, `product_data_created`, `product_data_updated`, `product_data_status`, `files`, `product_meta_description`, `product_meta_title`, `product_meta_keywords`, `sub_categorie_id`, `show_poids`, `product_stock`, `product_price_selling`, `product_price_marge_percente`, `product_price_marge_percente_dicount`, `product_entier`, `product_best_seller`, `product_is_promo`, `product_entier_association`, `product_affected_partener`, `product_bio`, `product_label_rouge`, `product_origin`, `product_promo`, `product_is_composer`, `product_show_home`, `product_info`, `product_short_description`, `show_option`, `categorie_couffin_id`, `certificat_id`, `product_poitou_charentes`) VALUES
(273, 0, '273', 101, 'Huile De Grignons D\'olives 1L PET - El Morjane', 0, 3.77, 3.77, '', NULL, '<p>De l\'huile d\'olive vierge est incorpor&eacute; dans la composition de cette huile de grignons d\'olives raffin&eacute;e. Fortement conseill&eacute;e pour tous types de fritures gr&acirc;ce &agrave; sa grande stabilit&eacute; et sa cuisson ne d&eacute;gage aucune sorte d\'odeur. Produit en UE.</p>\n<p><strong>Allerg&egrave;nes :</strong> Aucun.</p>\n<p><strong>Ingr&eacute;dient : </strong>Huile d\'olive.</p>', 'file_8bd2f06699d6ff57581ccbfeb740e4c8.jpg', '2021-08-31 16:19:04', '2021-08-31 16:19:23', 1, NULL, 'Huile De Grignons D\'olives 1l PET', 'Huile De Grignons D\'olives 1l PET', 'Huile De Grignons D\'olives 1l PET', 232, 0, 1, 4.524, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 Litre', '', 0, NULL, 6, NULL),
(274, 0, '274', 101, 'Huile De Tournesol 1L - El Morjane', 0, 2.04, 2.04, '', NULL, '<p>Huile raffin&eacute;e 100% tournesol, sans cholest&eacute;rol et riche en vitamine E. Pour friture, cuisson et assaisonnement</p>\n<p><strong>Allerg&egrave;nes :</strong> Aucun.</p>\n<p><strong>Ingr&eacute;dient : </strong>Tournesol.</p>', 'file_b1ffd56fa37df5dbe8753e6fd5d23b3d.jpg', '2021-08-31 16:22:46', '2021-08-31 16:26:54', 1, NULL, 'Huile De Tournesol ', 'Huile De Tournesol ', 'Huile De Tournesol ', 232, 0, 1, 2.448, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '1 Litre', '', 0, NULL, 6, NULL),
(275, 0, '275', 101, 'Huile De Tournesol 3L - El Morjane', 0, 6.72, 6.72, '', NULL, '<p>Huile raffin&eacute;e 100% tournesol, sans cholest&eacute;rol et riche en vitamine E. Pour friture, cuisson et assaisonnement.</p>\n<p><strong>Allerg&egrave;nes :</strong> Aucun.</p>\n<p><strong>Ingr&eacute;dient : </strong>Tournesol.</p>', 'file_1c89fbacbc6872df50bb9637e4ec5bc5.jpg', '2021-08-31 16:25:49', '2021-08-31 16:26:09', 1, NULL, 'Huile De Tournesol ', 'Huile De Tournesol ', 'Huile De Tournesol ', 232, 0, 1, 8.064, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '3 Litres', '', 0, NULL, 6, NULL),
(276, 0, '276', 101, 'Huile De Tournesol 5L - El Morjane', 0, 10.63, 10.63, '', NULL, '<p>Huile raffin&eacute;e 100% tournesol, sans cholest&eacute;rol et riche en vitamine E. Pour friture, cuisson et assaisonnement</p>\n<p><strong>Allerg&egrave;nes :</strong> Aucun.</p>\n<p><strong>Ingr&eacute;dient :</strong> Tournesol.</p>', 'file_0e204c13f7c62ef45c515b7d2094759d.jpg', '2021-08-31 16:33:54', '2021-08-31 16:34:43', 1, NULL, 'Huile De Tournesol', 'Huile De Tournesol', 'Huile De Tournesol', 232, 0, 1, 12.756, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '5 Litres', '', 0, NULL, 6, NULL),
(277, 0, '277', 101, 'Couscous Fin 1kg - El Morjane', 0, 1, 1, '1', NULL, '<p>Couscous a base de bl&eacute; dur de qualit&eacute; sup&eacute;rieure.</p>\n<p><strong>Methodes de pr&eacute;paration</strong></p>\n<p><strong>Au micro-ondes</strong></p>\n<p>Dans un plat adapt&eacute;, verser un volume de couscous. Ajouter un peu d\'huile d\'olive et m&eacute;langez. Ajouter la m&ecirc;me quantit&eacute; d\'eau et laisser gonfler 5 a 10 min. &Eacute;grainer. Faire cuire 2 fois 3 minutes &agrave; couvert au micro-ondes en &eacute;grainant entre chaque cuisson. Ajouter de l\'huile ou du beurre selon les go&ucirc;ts.</p>\n<p><strong>Au couscoussier</strong></p>\n<p>Dans un plat adapt&eacute;, verser un volume de couscous. Ajouter un peu d\'huile d\'olive et m&eacute;langer. Ajouter la m&ecirc;me quantit&eacute; d\'eau et laisser gonfler 5 a 10 min. Faire cuire au couscoussier 15 minutes. M&eacute;langer. Ajouter de l\'huile ou du beurre selon les go&ucirc;ts.</p>\n<p><strong>Allerg&egrave;ne : </strong>Gluten.</p>\n<p><strong>Ingr&eacute;dient : </strong>Bl&eacute; dur.</p>', 'file_ec78553be94999059dbb4769bb04bfd1.jpg', '2021-08-31 16:49:51', '2021-09-08 10:19:44', 1, NULL, 'Couscous Fin 1kg', 'Couscous Fin 1kg', 'Couscous Fin 1kg', 233, 0, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(278, 0, '278', 101, 'Couscous Moyen 1kg - El Morjane', 0, 1, 1, '1', NULL, '<p>Couscous a base de bl&eacute; dur de qualit&eacute; sup&eacute;rieure.</p>\n<p><strong>Methodes de pr&eacute;paration</strong></p>\n<p><strong>Au micro-ondes</strong></p>\n<p>Dans un plat adapt&eacute;, verser un volume de couscous. Ajouter un peu d\'huile d\'olive et m&eacute;langez. Ajouter la m&ecirc;me quantit&eacute; d\'eau et laisser gonfler 5 a 10 min. &Eacute;grainer. Faire cuire 2 fois 3 minutes &agrave; couvert au micro-ondes en &eacute;grainant entre chaque cuisson. Ajouter de l\'huile ou du beurre selon les go&ucirc;ts.</p>\n<p><strong>Au couscoussier</strong></p>\n<p>Dans un plat adapt&eacute;, verser un volume de couscous. Ajouter un peu d\'huile d\'olive et m&eacute;langer. Ajouter la m&ecirc;me quantit&eacute; d\'eau et laisser gonfler 5 a 10 min. Faire cuire au couscoussier 15 minutes. M&eacute;langer. Ajouter de l\'huile ou du beurre selon les go&ucirc;ts.</p>\n<p><strong>Allerg&egrave;ne :</strong> Gluten.</p>\n<p><strong>Ingr&eacute;dient : </strong>Bl&eacute; dur.</p>', 'file_b0fe5bd114d9472bc92aeeaac87b6069.jpg', '2021-08-31 16:52:43', '2021-09-08 10:21:04', 1, NULL, 'Couscous Moyen 1kg', 'Couscous Moyen 1kg', 'Couscous Moyen 1kg', 233, 0, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(280, 0, '280', 101, 'Semoule Extra Fine 1kg - El Morjane', 0, 1, 1, '1', NULL, '<p>Semoule 100% bl&eacute; dur de qualit&eacute; sup&eacute;rieure</p>\n<p><strong>Allerg&egrave;ne :</strong> Gluten.</p>\n<p><strong>Ingr&eacute;dient :</strong> Bl&eacute; dur.</p>', 'file_91146cc20d724c5c79fda22161b1bac1.jpg', '2021-09-01 09:17:47', '2021-09-08 10:21:33', 1, NULL, 'Semoule Extra Fine 1kg', 'Semoule Extra Fine 1kg', 'Semoule Extra Fine 1kg', 233, 0, 1, 1.2, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(281, 0, '281', 101, 'Semoule Extra Fine 5kg - El Morjane', 0, 4, 4, '5', NULL, '<p>Semoule 100% bl&eacute; dur de qualit&eacute; sup&eacute;rieure</p>\n<p><strong>Allerg&egrave;ne :</strong> Gluten.</p>\n<p><strong>Ingr&eacute;dient : </strong>Bl&eacute; dur.</p>', 'file_079f9502033dd68eac40a37552cf152a.jpg', '2021-09-01 09:28:26', '2021-09-08 10:21:53', 1, NULL, 'Semoule Extra Fine 5kg', 'Semoule Extra Fine 5kg', 'Semoule Extra Fine 5kg', 233, 0, 1, 4.8, 20, 0, 0, 1, 1, 0, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, 6, NULL),
(282, 0, '282', 101, 'Semoule Fine 1kg - El Morjane', 0, 1.2, 1.2, '1', NULL, '<p>Semoule 100% bl&eacute; dur de qualit&eacute; sup&eacute;rieure</p>\n<p><strong>Allerg&egrave;ne :</strong> Gluten.</p>\n<p><strong>Ingr&eacute;dient :</strong> Bl&eacute; dur.</p>', 'file_2fa291c8ce95917f25d3b14dc3c32f1e.jpg', '2021-09-01 09:46:51', '2021-09-16 10:56:47', 1, NULL, 'Semoule Fine 1kg', 'Semoule Fine 1kg', 'Semoule Fine 1kg', 233, 0, 3, 1.44, 20, 0, 0, 1, 1, 0, NULL, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, NULL, NULL),
(283, 0, '283', 101, 'Semoule Fine 5kg - El Morjane', 0, 4.59, 4.59, '5', NULL, '<p>Semoule 100% bl&eacute; dur de qualit&eacute; sup&eacute;rieure</p>\n<p><strong>Allerg&egrave;ne :</strong> Gluten.</p>\n<p><strong>Ingr&eacute;dient :</strong> Bl&eacute; dur.</p>', 'file_0442eab5c548c431b6dfc5c87408de8c.jpg', '2021-09-01 09:50:27', '2021-09-16 10:55:15', 1, NULL, 'Semoule Fine 5kg', 'Semoule Fine 5kg', 'Semoule Fine 5kg', 233, 0, 3, 5.508, 20, 0, 0, 1, 1, 0, NULL, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, NULL, NULL),
(284, 0, '284', 101, 'Semoule Moyenne 1kg - El Morjane', 0, 1.2, 1.2, '1', NULL, '<p>Semoule 100% bl&eacute; dur de qualit&eacute; sup&eacute;rieure</p>\n<p><strong>Allerg&egrave;ne : </strong>Gluten.</p>\n<p><strong>Ingr&eacute;dient : </strong>Bl&eacute; dur.</p>', 'file_91cab84ed5ef9a9880029c90efa921f2.jpg', '2021-09-01 10:00:50', '2021-09-16 10:53:37', 1, NULL, 'Semoule Moyenne 1kg', 'Semoule Moyenne 1kg', 'Semoule Moyenne 1kg', 233, 0, 3, 1.44, 20, 0, 0, 1, 1, 0, NULL, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, NULL, NULL),
(285, 0, '285', 101, 'Semoule Moyenne 5kg - El Morjane', 0, 4.58, 4.58, '5', NULL, '<p>Semoule 100% bl&eacute; dur de qualit&eacute; sup&eacute;rieure</p>\n<p><strong>Allerg&egrave;ne :</strong> Gluten.</p>\n<p><strong>Ingr&eacute;dient : </strong>Bl&eacute; dur.</p>', 'file_aa72090dc4fb175b32c7c4925f46e230.jpg', '2021-09-01 10:05:29', '2021-09-09 10:55:50', 1, NULL, 'Semoule Moyenne 5kg', 'Semoule Moyenne 5kg', 'Semoule Moyenne 5kg', 233, 0, 1, 5.496, 20, 0, 0, 1, 1, 0, 9, 1, 1, 1, 1, 1, 0, '', '', 0, NULL, 6, NULL),
(287, 0, '', 101, 'Épice Kefta Moulue 100g - ESPIG', 1, 1, 1, '0.1', NULL, '<p>Assaisonement pour pr&eacute;paration de Kefta</p>\n<p><strong>Ingr&eacute;dients :</strong> piment doux, cumin, cannelle, sel (8%), piment fort, menthe, rose.</p>', 'file_9fe478a89f1cc7446ec134660b925d45.jpg', '2021-09-08 10:17:23', '2021-09-16 10:35:36', 1, NULL, 'Epices Kefta', 'Epices Kefta', 'Epices Kefta', 102, 1, 1, 1.2, 20, 0, 0, 1, 1, 0, 14, 1, 1, 1, 1, 1, 0, '0', '', 0, NULL, NULL, NULL),
(288, NULL, '288', 0, 'Goffa Eco Essentielle 6 Kg ', NULL, 46, 50, '6', NULL, '<p>Vous &ecirc;tes inquiet de quoi apporter comme produits essentiels pour votre famille!</p>\n<p>Vous ne voulez pas consommer une grande quantit&eacute; de viandes rouges et vous cherchez &agrave; adapter un style de vie plus sain et &eacute;quilibr&eacute; !</p>\n<p><strong>Go Ferme Halal</strong> pr&eacute;occupe de votre budget et votre sant&eacute; en vous aidant &agrave; &eacute;conomiser &agrave; travers sa Goffa Eco Essentielle pratique et l&eacute;g&egrave;re en mati&egrave;re grasses. &nbsp;&nbsp;</p>\n<p><strong>Goffa Eco Essentielle</strong> est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;<br /><br /><br /></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>', 'file_1dfd624ce4d79fd2971ecdde5952db95.jpeg', '2021-09-24 13:33:03', NULL, 1, NULL, 'Goffa Eco Essentielle 6 Kg ', 'Goffa Eco Essentielle 6 Kg ', 'Goffa Eco Essentielle 6 Kg ', NULL, 1, 1, 59, 30, 10, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 2, 6, NULL),
(289, NULL, '289', 0, 'Goffa VIP 10 KG', NULL, 86, 101, '10', NULL, '<p>Vous voulez vous g&acirc;ter et sentir V.I.P aujourd&rsquo;hui !</p>\n<p><strong>Go ferme Halal</strong> vous pr&eacute;sente son &eacute;l&eacute;gante et riche Goffa V.I.P, en s&eacute;lectionnant pour vous des produits haut de gamme. &nbsp;</p>\n<p><strong>Goffa V.I.P </strong>est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;</p>', 'file_9c02964023d3afb16039057e29e99bac.jpeg', '2021-09-24 13:32:42', NULL, 1, NULL, 'Goffa VIP 10 KG', 'Goffa VIP 10 KG', 'Goffa VIP 10 KG', NULL, 1, 1, 120, 40, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 2, 0, NULL),
(290, NULL, '290', 0, 'Goffa Prestige 12 Kg', NULL, 128, 151, '12', NULL, '<p><strong>Go Ferme Halal</strong> vous pr&eacute;pare sa Goffa Prestige pour des repas prestigieux avec des<a href=\"../../../../pages/show/14-nos-recettes\"><strong> recettes</strong></a> savoureuses. &nbsp;</p>\n<p><strong>Goffa Prestige</strong> est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;<br />&nbsp; &nbsp;&nbsp;</p>\n<p>&nbsp;</p>', 'file_0293d2e7ee6e2f542de685a767fb7604.jpeg', '2021-09-24 13:32:16', NULL, 1, NULL, 'Goffa Prestige 12 Kg', 'Goffa Prestige 12 Kg', 'Goffa Prestige 12 Kg', NULL, 1, 1, 166, 30, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 2, 0, NULL),
(293, NULL, '293', 0, 'Goffa Royale 18 Kg', NULL, 217, 258, '17', NULL, '<p>Vous cherchez quoi pr&eacute;parer sp&eacute;cialement pour vos invit&eacute;s !&nbsp;</p>\n<p>Vous optez pour un diner royal et vous &ecirc;tes encore en doute et tu n&rsquo;es pas sure de la qualit&eacute; des produits ailleurs !</p>\n<p>Vous ne savez pas comment choisir des produits haut de gamme et savoureux pour vos chers !</p>\n<p><strong>Go ferme halal</strong> r&eacute;pond &agrave; vos attentes et vous assure ses meilleurs produits que vous aspirez dans &lsquo;Goffa Royale&rsquo;, est le couffin le plus large et en vari&eacute;t&eacute; remarquable.</p>\n<p><strong>Goffa Royale </strong>est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;</p>', 'file_0e0d2413ba0d4b987d31ad6d343bff60.jpg', '2021-09-24 13:31:55', NULL, 1, NULL, 'Goffa Royale 18 Kg', 'Goffa Royale 18 Kg', 'Goffa Royale 18 Kg', NULL, 1, 1, 282, 30, 19, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 2, 0, NULL),
(294, NULL, '294', 0, 'Goffa Barbecue 7Kg', NULL, 87, 102, '7', NULL, '<p>La saison de barbecue arrive aussi et un repas en plein air est toujours le meilleur !</p>\n<p>Vous n&rsquo;avez pas le temps de faire les courses ou bien vous &ecirc;tes h&eacute;sit&eacute;s pour un &eacute;v&eacute;nement semblable avec vos chers !</p>\n<p>Avec &lsquo;Goffa Barbecue&rsquo; vous pouvez r&eacute;aliser plusieurs recettes de grillades gouteuses. &nbsp;<br />&nbsp;<br /><strong>Go ferme Halal</strong> vous facilite la tache avec un simple geste vous choisissez le couffin magique contenant de tout ce que vous voulez des produits frais et des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong> </a>fabuleuses !&nbsp;</p>\n<p><strong>Goffa Barbecue </strong>est destin&eacute;e &agrave; 6 personnes / Semaine.&nbsp;<br /><br /><br /></p>', 'file_7116cd5be4a7c3fa61964bdcddc1b035.jpg', '2021-09-24 13:30:49', NULL, 1, NULL, 'Goffa Barbecue 7Kg', 'Goffa Barbecue 7Kg', 'Goffa Barbecue 7Kg', NULL, 1, 1, 113, 30, 17, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 3, 0, NULL),
(295, NULL, '295', 0, 'Goffa Anniversaire 8 Kg', NULL, 93, 109, '8', NULL, '<p>La journ&eacute;e sp&eacute;ciale s&rsquo;approche ! C&rsquo;est votre anniversaire ou d&rsquo;un cher ami ! Vous cherchez comment vous satisfaire et mettre beaucoup de valeur et joie en ce jour unique !&nbsp;</p>\n<p>L&rsquo;id&eacute;e est avec nous ! On vous recommande des <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> hautes en couleurs et en saveurs pour organiser un diner d&rsquo;anniversaire gourmand.&nbsp;</p>\n<p><strong>Go ferme Halal</strong> vous souhaite une journ&eacute;e inoubliable combl&eacute;e de bonheur ! &nbsp;Et vous propose son couffin id&eacute;al d&rsquo;anniversaire pour r&eacute;ussir vos<a href=\"../../../../pages/show/14-nos-recettes\"> <strong>recettes</strong></a> avec ses bonnes qualit&eacute;s des produits que vous ne regretterez jamais !&nbsp;</p>\n<p><strong>GOFFA Anniversaire</strong> est destin&eacute;e &agrave; 6 personnes / Semaine.&nbsp;</p>', 'file_2887a98e588be3a4b2e2ea5fca314c9f.jpeg', '2021-09-24 13:30:02', NULL, 1, NULL, 'Goffa Anniversaire 8 Kg', 'Goffa Anniversaire 8 Kg', 'Goffa Anniversaire 8 Kg', NULL, 1, 1, 120, 30, 17, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 3, 0, NULL),
(297, NULL, '297', 0, 'Goffa Ramadan 20 Kg', NULL, 211, 249, '20', NULL, '<h6>Ramadan est le mois saint par excellence pour tous les musulmans!</h6>\n<p>Son principal culte est le je&ucirc;ne de tous les app&eacute;tits. Et lorsqu&rsquo;on dit je&ucirc;ne on dit forc&eacute;ment &lsquo;Iftar&rsquo;, et donc &agrave; la fin d&rsquo;une langue journ&eacute;e de faim et soif, une table g&eacute;n&eacute;reuse est mise en place pleine de diverses<strong> <a href=\"../../../../pages/show/14-nos-recettes\">recettes</a></strong> gouteuse traditionnelles et originales.&nbsp;</p>\n<p>Pour que vous profitiez pleinement de ce mois sacr&eacute;, <strong>Go Ferme Halal </strong>pense &agrave; vous g&acirc;ter et &agrave; rajouter plus de saveurs &agrave; vos plats avec ses produits de vraies qualit&eacute;s dans sa Goffa Ramadan qui est bien pr&eacute;par&eacute;e et compl&egrave;te de tous que vous avez besoin. &nbsp;</p>\n<p><strong>Goffa Ramadan </strong>est destin&eacute;e &agrave; 6 personnes / Semaine.&nbsp;</p>', 'file_0837d74b76dbc15966b639ccf6f2c34e.jpeg', '2021-09-24 13:29:41', NULL, 1, NULL, 'Goffa Ramadan 20 Kg', 'Goffa Ramadan 20 Kg', 'Goffa Ramadan 20 Kg', NULL, 1, 1, 274, 30, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 3, 0, NULL),
(299, NULL, '299', 0, 'Goffa Réception 10 Kg', NULL, 90, 107, '10', NULL, '<p>Vous cherchez &agrave; programmer une r&eacute;ception honorable pour vos convives et vous &ecirc;tes &agrave; court d&rsquo;id&eacute;es sur les <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> &agrave; pr&eacute;senter &agrave; vos chers !</p>\n<p>Vous &ecirc;tes overbook&eacute;s et vous n&rsquo;avez pas le temps d&rsquo;aller chercher des produits de meilleures qualit&eacute;s !</p>\n<p><strong>Go Ferme Halal</strong> prend tout cela en consid&eacute;ration et aimerait vous faciliter les t&acirc;ches.</p>\n<p>Goffa R&eacute;ception est pr&eacute;par&eacute;e s&eacute;rieusement pour vos &eacute;v&eacute;nements importants avec quelques <a href=\"../../../../products/categorie/101-epices\"><strong>&eacute;pices</strong></a> <em>OFFERTS</em> afin d&rsquo;aromatiser et assaisonner vos mets. &nbsp; &nbsp;</p>\n<p><strong>Goffa R&eacute;ception</strong> est destin&eacute;e &agrave; 6 personnes / Semaine.&nbsp;</p>\n<p>&nbsp;</p>\n<p><br />&nbsp; &nbsp; &nbsp;</p>', 'file_a5791327942ea9abee405d6c4607c974.jpeg', '2021-09-24 13:30:21', NULL, 1, NULL, 'Goffa Réception 7Kg', 'Goffa Réception 7Kg', 'Goffa Réception 7Kg', NULL, 1, 1, 109, 20, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 3, 0, NULL),
(300, NULL, '300', 0, 'Goffa Couscous 5Kg', NULL, 48, 56, '5', NULL, '<p>Le Couscous est la <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recette</strong></a> Maghr&eacute;bine la plus populaire qui est appr&eacute;ci&eacute; par les grands et les petits, il est toujours le meilleur plan pour : <em>QUOI PREPARER AUJOUR&rsquo;HUI !</em> Et il est souvent pr&eacute;sent&eacute; dans tous nos &eacute;v&eacute;nements.</p>\n<p>Que ce soit au poulet, &agrave; la viande de b&oelig;uf ou d&rsquo;agneau, vous ne cesserez jamais de vous en servir encore et encore.</p>\n<p><strong>Go Ferme Halal </strong>est aussi un grand amateur de Couscous et vous pr&eacute;pare un Goffa sp&eacute;cialis&eacute;e Couscous<strong> </strong>dont les produits sont tellement savoureux et variables.</p>\n<p>Avec un kilo de Couscous <em>OFFERT<strong>&nbsp;</strong></em>! Pour que vous ne raterez jamais de vivre une exp&eacute;rience inoubliable de ce vrai d&eacute;lice.</p>\n<p><strong>Goffa Cousous</strong> est destin&eacute;e &agrave; 6 personnes / Semaine.</p>', 'file_d8757009db4fb0c3ddaab85af582f47d.jpeg', '2021-09-24 13:26:25', NULL, 1, NULL, 'Goffa Couscous 5Kg', 'Goffa Couscous 5Kg', 'Goffa Couscous 5Kg', NULL, 1, 1, 67, 40, 17, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 3, 0, NULL),
(301, NULL, '301', 0, 'Goffa du Chef 5Kg', NULL, 47, 55, '5', NULL, '<p>Vous &ecirc;tes passionn&eacute; par la cuisine et &nbsp;vous &ecirc;tes un bon gouteur de nature !</p>\n<p>Vous cherchez toujours &agrave; cr&eacute;er vos propres recettes et souvent sur les routes pour d&eacute;guster de nouveaux plats !&nbsp;</p>\n<p>Vous &ecirc;tes capable de reconnaitre les produits utilis&eacute;s dans un plat ainsi que leurs fraicheurs !&nbsp;</p>\n<p><strong>Go Ferme Halal</strong> compte sur vos bons gouts que votre curiosit&eacute; et aimerait avoir votre confiance de tester ses frais produits dans sa nouvelle \' Goffa Du Chef \' qui sera &agrave; votre disposition sous 48h. &nbsp;&nbsp;</p>\n<p><strong>Goffa Du Chef</strong> est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;</p>\n<p>&nbsp;</p>', 'file_5bf8b7e46417fb381c45c2acf62839fa.jpeg', '2021-09-24 13:24:53', NULL, 1, NULL, 'Goffa du Chef 5Kg', 'Goffa du Chef 5Kg', 'Goffa du Chef 5Kg', NULL, 1, 1, 70, 50, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 4, 0, NULL),
(302, NULL, '302', 0, 'Goffa du Boucher 12Kg', NULL, 135, 160, '12', NULL, '<p><strong>Go Ferme Halal</strong> vous propose sa<strong> </strong>Goffa du Boucher conseill&eacute;e par nos meilleurs bouchers du site combl&eacute;e par nos produits d&eacute;licatement s&eacute;lectionn&eacute;s.&nbsp;</p>\n<p><strong>GOFFA du Boucher</strong> est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;</p>\n<p>&nbsp; &nbsp;<strong>&nbsp;</strong></p>\n<p>&nbsp;</p>', 'file_fc0f1cbf799d08f28358497360c513f8.jpg', '2021-09-24 14:21:04', NULL, 1, NULL, 'Goffa du Boucher 12Kg', 'Goffa du Boucher 12Kg', 'Goffa du Boucher 12Kg', NULL, 1, 1, 176, 30, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 4, 0, NULL),
(303, NULL, '303', 0, 'Goffa Traiteur 14Kg', NULL, 162, 192, '14', NULL, '<p>Il semble qu&rsquo;apporter un Traiteur pour une soir&eacute;e din&eacute; est la meilleure fa&ccedil;on pour garantir des g&eacute;n&eacute;reuses et d&eacute;licieuses <a href=\"../../../../pages/show/14-nos-recettes\"><strong>recettes</strong></a> pour tous les invit&eacute;s.</p>\n<p><strong>Go Ferme Halal </strong>vous pr&eacute;sente sa Goffa Traiteur compl&egrave;te en quantit&eacute; et en produits que vos traiteurs ont besoin. &nbsp; &nbsp;&nbsp;</p>\n<p><strong>GOFFA Traiteur</strong> est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;</p>', 'file_51d5a8c3cbdcdea4ad11e30300b12eae.jpg', '2021-09-24 14:21:38', NULL, 1, NULL, 'Goffa Traiteur 14Kg', 'Goffa Traiteur 14Kg', 'Goffa Traiteur 14Kg', NULL, 1, 1, 210, 30, 19, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 4, 0, NULL),
(305, NULL, '305', 0, 'Goffa Du Gourmand 10Kg', NULL, 131, 155, '10', NULL, '<p>Une g&eacute;n&eacute;reuse quantit&eacute; des produits gouteux ce qui compte !</p>\n<p>Vous avez un gout prononc&eacute; pour des d&eacute;licieuses recettes et vous ne voulez surtout pas les rater !</p>\n<p><strong>Go Ferme Halal </strong>d&eacute;pose entre vos mains sa riche Goffa Du Gourmand qui vous fera plaisir par sa g&eacute;n&eacute;rosit&eacute;, variabilit&eacute; et meilleures qualit&eacute;s des produits avec un prix vraiment raisonnable. &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\n<p><strong>Goffa Du Gourmand</strong> est destin&eacute;e &agrave; 5 personnes / Semaine.&nbsp;</p>', 'file_f9192906c645370256580b7b0b190f52.jpeg', '2021-09-24 14:22:14', NULL, 1, NULL, 'Goffa Du Gourmand 10Kg', 'Goffa Du Gourmand 10Kg', 'Goffa Du Gourmand 10Kg', NULL, 1, 1, 170, 30, 18, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, '', 0, 4, 0, NULL),
(307, 0, '307', 230, 'Certifié Label Rouge', 110, NULL, 0, '30', NULL, '<p><strong>Go Ferme Halal</strong> vous propose en ligne la vente des moutons vivants, s&eacute;lectionn&eacute;s soigneusement des meilleurs bouchers et &eacute;leveurs locaux.</p>\n<p><strong>Go Ferme Halal </strong>vous propose une gamme d&rsquo;animaux vivants, aussi bien m&acirc;les que femelles, &agrave; des niveaux tarifaires diff&eacute;rents suivant les niveaux &nbsp;g&eacute;n&eacute;tiques certifi&eacute;s par l&rsquo;organisme de s&eacute;lection.</p>\n<p style=\"text-align: center;\"><strong>Faites don de votre sacrifice &agrave; une association !</strong></p>\n<p>Nous mettons un point d&rsquo;honneur &agrave; travailler main dans la main avec de nombreuses associations partenaires. N&rsquo;h&eacute;sitez plus : Nos associations comptent sur vos !&nbsp;</p>\n<p>Disponible &eacute;galement, en vente en ligne, l\'&eacute;paule d\'agneau, <strong><a href=\"../../../../products/show/165\">Cervelle d\'agneau</a>,<a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>, <a href=\"../../../../products/show/153-agneau-entier\">Agneau entier,</a> <a href=\"../../../../products/show/82\">Agneau entier d&eacute;coup&eacute;</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>\n<p>Tous nos produits sont livr&eacute;s &agrave; domicile dans le respect de la cha&icirc;ne du froid, en un jour ouvr&eacute; apr&egrave;s l\'exp&eacute;dition.</p>\n<p>Pour avoir plus d&rsquo;information sur les articles propos&eacute;s par<strong> Go Ferme Halal</strong>, n&rsquo;h&eacute;sitez pas &agrave; nous<strong> contacter</strong> !</p>', 'file_696c9c9ddfe006ed3feca07701cc7861.jpg', '2021-09-17 13:57:40', NULL, 1, NULL, '', '', '', 231, 0, 0, 132, 20, 0, 0, 1, 1, 1, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, NULL, NULL),
(308, 0, '308', 230, 'Certifié BIO', 110, NULL, 0, '30', NULL, '<p><strong>Go Ferme Halal</strong> vous propose en ligne la vente des moutons vivants, s&eacute;lectionn&eacute;s soigneusement des meilleurs bouchers et &eacute;leveurs locaux.</p>\n<p><strong>Go Ferme Halal </strong>vous propose une gamme d&rsquo;animaux vivants, aussi bien m&acirc;les que femelles, &agrave; des niveaux tarifaires diff&eacute;rents suivant les niveaux &nbsp;g&eacute;n&eacute;tiques certifi&eacute;s par l&rsquo;organisme de s&eacute;lection.</p>\n<p style=\"text-align: center;\"><strong>Faites don de votre sacrifice &agrave; une association !</strong></p>\n<p>Nous mettons un point d&rsquo;honneur &agrave; travailler main dans la main avec de nombreuses associations partenaires. N&rsquo;h&eacute;sitez plus : Nos associations comptent sur vos !&nbsp;</p>\n<p>Disponible &eacute;galement, en vente en ligne, l\'&eacute;paule d\'agneau, <strong><a href=\"../../../../products/show/165\">Cervelle d\'agneau</a>,<a href=\"../../../../products/show/160\">T&ecirc;te d\'agneau</a>, <a href=\"../../../../products/show/153-agneau-entier\">Agneau entier,</a> <a href=\"../../../../products/show/82\">Agneau entier d&eacute;coup&eacute;</a>, <a href=\"../../../../products/categorie/101-epices\">Epices</a>&hellip; !</strong></p>\n<p>Tous nos produits sont livr&eacute;s &agrave; domicile dans le respect de la cha&icirc;ne du froid, en un jour ouvr&eacute; apr&egrave;s l\'exp&eacute;dition.</p>\n<p>Pour avoir plus d&rsquo;information sur les articles propos&eacute;s par<strong> Go Ferme Halal</strong>, n&rsquo;h&eacute;sitez pas &agrave; nous<strong> contacter</strong> !</p>', 'file_fb35f7ba2cb7d0d3f4a994d67395e535.jpeg', '2021-09-17 13:57:42', NULL, 1, NULL, '', '', '', 231, 0, 0, 132, 20, 0, 0, 1, 1, 1, 9, 0, 0, 0, 0, 1, 0, '', '', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `av_products_attributs`
--

CREATE TABLE `av_products_attributs` (
  `product_attribut_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribut_id` int(11) NOT NULL,
  `attribut_value_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `av_products_compose`
--

CREATE TABLE `av_products_compose` (
  `product_compose_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` float DEFAULT NULL,
  `prod_poids` float DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `prod_label_rouge` int(1) DEFAULT 1,
  `prod_bio` int(1) DEFAULT 1,
  `prod_poitou_charentes` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_products_compose`
--

INSERT INTO `av_products_compose` (`product_compose_id`, `prod_id`, `prod_qty`, `prod_poids`, `product_id`, `prod_label_rouge`, `prod_bio`, `prod_poitou_charentes`) VALUES
(2525, 16, 1, 1, 301, 1, 1, 1),
(2526, 47, 1, 1, 301, 1, 1, 1),
(2527, 65, 1, 1, 301, 1, 1, 1),
(2528, 77, 1, 1, 301, 1, 1, 1),
(2529, 187, 1, 1, 301, 1, 1, 1),
(2530, 16, 1, 1, 300, 1, 1, 1),
(2531, 65, 1, 1, 300, 1, 1, 1),
(2532, 76, 1, 1, 300, 1, 1, 1),
(2533, 135, 1, 1, 300, 1, 1, 1),
(2534, 242, 1, 1, 300, 1, 1, 1),
(2545, 18, 2, 2, 297, 1, 1, 1),
(2546, 19, 2, 2, 297, 1, 1, 1),
(2547, 45, 2, 2, 297, 1, 1, 1),
(2548, 46, 2, 2, 297, 1, 1, 1),
(2549, 47, 2, 2, 297, 1, 1, 1),
(2550, 49, 2, 2, 297, 1, 1, 1),
(2551, 65, 3, 3, 297, 1, 1, 1),
(2552, 176, 2, 2, 297, 1, 1, 1),
(2553, 195, 1, 1, 297, 1, 1, 1),
(2554, 242, 2, 2, 297, 1, 1, 1),
(2555, 30, 2, 2, 295, 1, 1, 1),
(2556, 65, 2, 2, 295, 1, 1, 1),
(2557, 90, 1, 1, 295, 1, 1, 1),
(2558, 187, 1, 1, 295, 1, 1, 1),
(2559, 242, 2, 2, 295, 1, 1, 1),
(2560, 15, 1.5, 1.5, 299, 1, 1, 1),
(2561, 30, 1.5, 1.5, 299, 1, 1, 1),
(2562, 63, 1.5, 1.5, 299, 1, 1, 1),
(2563, 187, 1, 1, 299, 1, 1, 1),
(2564, 238, 1.5, 1.5, 299, 1, 1, 1),
(2565, 18, 2, 2, 294, 1, 1, 1),
(2566, 90, 2, 2, 294, 1, 1, 1),
(2567, 156, 1, 1, 294, 1, 1, 1),
(2568, 242, 2, 2, 294, 1, 1, 1),
(2569, 251, 2, 2, 294, 1, 1, 1),
(2570, 2, 2, 1, 293, 1, 1, 1),
(2571, 16, 2, 2, 293, 1, 1, 1),
(2572, 60, 2, 2, 293, 1, 1, 1),
(2573, 65, 3, 3, 293, 1, 1, 1),
(2574, 76, 2, 2, 293, 1, 1, 1),
(2575, 120, 2, 2, 293, 1, 1, 1),
(2576, 178, 2, 2, 293, 1, 1, 1),
(2577, 187, 1, 1, 293, 1, 1, 1),
(2578, 242, 2, 2, 293, 1, 1, 1),
(2579, 15, 2, 2, 290, 1, 1, 1),
(2580, 65, 3, 3, 290, 1, 1, 1),
(2581, 83, 2, 2, 290, 1, 1, 1),
(2582, 187, 1, 1, 290, 1, 1, 1),
(2583, 242, 2, 2, 290, 1, 1, 1),
(2584, 247, 2, 2, 290, 1, 1, 1),
(2585, 19, 2, 2, 289, 1, 1, 1),
(2586, 37, 2, 2, 289, 1, 1, 1),
(2587, 47, 1, 1, 289, 1, 1, 1),
(2588, 65, 2, 2, 289, 2, 2, 1),
(2589, 183, 1, 1, 289, 1, 1, 1),
(2590, 242, 2, 2, 289, 1, 1, 1),
(2591, 19, 2, 2, 288, 1, 1, 1),
(2592, 37, 1, 1, 288, 1, 1, 1),
(2593, 65, 1, 1, 288, 2, 2, 1),
(2594, 183, 1, 1, 288, 1, 1, 1),
(2595, 242, 1, 1, 288, 1, 1, 1),
(2614, 57, 2, 2, 302, 1, 1, 1),
(2615, 60, 2, 2, 302, 1, 1, 1),
(2616, 77, 1.5, 1.5, 302, 1, 1, 1),
(2617, 178, 2, 2, 302, 1, 1, 1),
(2618, 179, 1.5, 1.5, 302, 1, 1, 1),
(2619, 187, 1, 1, 302, 1, 1, 1),
(2620, 242, 2, 2, 302, 1, 1, 1),
(2621, 19, 2, 2, 303, 1, 1, 1),
(2622, 46, 2, 2, 303, 1, 1, 1),
(2623, 47, 2, 2, 303, 1, 1, 1),
(2624, 50, 2, 2, 303, 1, 1, 1),
(2625, 63, 1, 1, 303, 1, 1, 1),
(2626, 86, 2, 2, 303, 1, 1, 1),
(2627, 178, 1, 1, 303, 1, 1, 1),
(2628, 185, 1, 1, 303, 1, 1, 1),
(2629, 187, 1, 1, 303, 1, 1, 1),
(2630, 242, 1, 1, 303, 1, 1, 1),
(2631, 6, 2, 2, 305, 1, 1, 1),
(2632, 19, 1, 1, 305, 1, 1, 1),
(2633, 46, 2, 2, 305, 1, 1, 1),
(2634, 47, 1, 1, 305, 1, 1, 1),
(2635, 50, 1, 1, 305, 1, 1, 1),
(2636, 63, 1, 1, 305, 1, 1, 1),
(2637, 74, 1, 1, 305, 1, 1, 1),
(2638, 185, 1, 1, 305, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_products_parteners`
--

CREATE TABLE `av_products_parteners` (
  `product_partener_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `partener_id` int(11) NOT NULL,
  `price_buying` float DEFAULT 0,
  `is_disponible` int(1) DEFAULT 1,
  `product_partener_bio` int(1) DEFAULT 1,
  `product_partener_label_rouge` int(1) DEFAULT 1,
  `product_partener_origin` int(1) DEFAULT 1,
  `product_partener_promo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_products_parteners`
--

INSERT INTO `av_products_parteners` (`product_partener_id`, `product_id`, `partener_id`, `price_buying`, `is_disponible`, `product_partener_bio`, `product_partener_label_rouge`, `product_partener_origin`, `product_partener_promo`) VALUES
(24, 87, 9, 39.9, 1, 1, 1, 1, 1),
(25, 86, 9, 15, 1, 1, 1, 1, 1),
(26, 85, 9, 13.9, 1, 1, 1, 1, 1),
(27, 84, 9, 8.5, 1, 1, 1, 1, 1),
(28, 83, 9, 14.9, 1, 1, 1, 1, 1),
(29, 82, 9, 17, 1, 1, 1, 1, 1),
(30, 81, 9, 17, 1, 1, 1, 1, 1),
(31, 80, 9, 36, 1, 2, 1, 1, 1),
(32, 79, 9, 32, 1, 1, 1, 1, 1),
(33, 78, 9, 14, 1, 1, 1, 1, 1),
(34, 77, 9, 12.9, 1, 1, 1, 1, 1),
(35, 76, 9, 14, 1, 1, 1, 1, 1),
(36, 75, 9, 13, 1, 1, 1, 1, 1),
(37, 74, 9, 14, 1, 1, 1, 1, 1),
(38, 73, 9, 15, 1, 1, 1, 1, 1),
(39, 72, 9, 14, 1, 1, 1, 1, 1),
(40, 71, 9, 17.9, 1, 1, 1, 1, 1),
(41, 70, 9, 10.9, 1, 1, 1, 1, 1),
(42, 69, 9, 19, 1, 1, 1, 1, 1),
(43, 68, 9, 9.9, 1, 1, 1, 1, 1),
(44, 67, 9, 17.9, 1, 1, 1, 1, 1),
(45, 66, 9, 16, 1, 1, 1, 1, 1),
(46, 65, 9, 9.9, 1, 2, 2, 2, 2),
(47, 64, 9, 14.9, 1, 1, 1, 1, 1),
(48, 63, 9, 14.9, 1, 1, 1, 1, 1),
(49, 62, 9, 36, 1, 1, 1, 1, 1),
(50, 61, 9, 14, 1, 1, 1, 1, 1),
(51, 60, 9, 17.9, 1, 1, 1, 1, 1),
(52, 59, 9, 14.9, 1, 1, 1, 1, 1),
(53, 58, 9, 6.9, 1, 1, 1, 1, 1),
(54, 57, 9, 6.9, 1, 1, 1, 1, 1),
(55, 56, 9, 25.9, 1, 1, 1, 1, 1),
(56, 55, 9, 16.9, 1, 1, 1, 1, 1),
(57, 54, 9, 14.9, 1, 1, 1, 1, 1),
(58, 53, 9, 13.9, 1, 1, 1, 1, 1),
(59, 52, 9, 25.9, 1, 1, 1, 1, 1),
(60, 51, 9, 14.9, 1, 1, 1, 1, 1),
(61, 50, 9, 14, 1, 1, 1, 1, 1),
(62, 49, 9, 14, 1, 1, 1, 1, 1),
(63, 48, 9, 15.9, 1, 1, 1, 1, 1),
(64, 47, 9, 9.9, 1, 1, 1, 1, 1),
(65, 46, 9, 15, 1, 1, 1, 1, 1),
(66, 45, 9, 9.9, 1, 1, 1, 1, 1),
(67, 44, 9, 14.9, 1, 1, 1, 1, 1),
(68, 43, 9, 20.99, 1, 1, 1, 1, 1),
(69, 42, 9, 16.77, 1, 1, 1, 1, 1),
(70, 41, 9, 18, 1, 1, 1, 1, 1),
(71, 40, 9, 23, 1, 1, 1, 1, 1),
(72, 39, 9, 5.9, 1, 1, 1, 1, 1),
(73, 38, 9, 5.9, 1, 1, 1, 1, 1),
(74, 37, 9, 9.9, 1, 1, 1, 1, 1),
(75, 36, 9, 13.9, 1, 1, 1, 1, 1),
(76, 35, 9, 13.9, 1, 1, 1, 1, 1),
(77, 34, 9, 6, 1, 1, 1, 1, 1),
(78, 33, 9, 6.9, 1, 1, 1, 1, 1),
(79, 31, 9, 6.9, 1, 1, 1, 1, 1),
(80, 30, 9, 13.9, 1, 1, 1, 1, 1),
(81, 28, 9, 6.9, 1, 1, 1, 1, 1),
(82, 26, 9, 6.9, 1, 1, 1, 1, 1),
(83, 25, 9, 26, 1, 1, 1, 1, 1),
(84, 24, 9, 23, 1, 1, 1, 1, 1),
(85, 23, 9, 24, 1, 1, 1, 1, 1),
(86, 22, 9, 14.9, 1, 1, 1, 1, 1),
(87, 21, 9, 12, 1, 1, 1, 1, 1),
(88, 20, 9, 3.3, 1, 1, 1, 1, 1),
(89, 19, 9, 3.9, 1, 1, 1, 1, 1),
(90, 18, 9, 9.9, 1, 1, 1, 1, 1),
(91, 17, 9, 4.5, 1, 1, 1, 1, 1),
(92, 16, 9, 5.9, 1, 1, 1, 1, 1),
(93, 15, 9, 10, 1, 1, 1, 1, 1),
(94, 14, 9, 42, 1, 1, 1, 1, 1),
(95, 13, 9, 14.9, 1, 1, 1, 1, 1),
(96, 12, 9, 16, 1, 1, 1, 1, 1),
(97, 11, 9, 9.9, 1, 1, 1, 1, 1),
(98, 10, 9, 17.9, 1, 1, 1, 1, 1),
(99, 9, 9, 17.9, 1, 1, 1, 1, 1),
(100, 7, 9, 17.9, 1, 1, 1, 1, 1),
(101, 6, 9, 17, 1, 1, 1, 1, 1),
(102, 4, 9, 17.9, 1, 1, 1, 1, 1),
(103, 3, 9, 19.9, 1, 1, 1, 1, 1),
(104, 2, 9, 15.9, 1, 1, 1, 1, 1),
(105, 1, 9, 17.9, 1, 1, 1, 1, 1),
(106, 90, 10, 0, 1, 1, 1, 1, 1),
(107, 91, 9, 19.9, 1, 2, 2, 2, 2),
(108, 87, 10, 0, 1, 1, 1, 1, 1),
(109, 86, 10, 0, 1, 1, 1, 1, 1),
(110, 85, 10, 0, 1, 1, 1, 1, 1),
(111, 84, 10, 0, 1, 1, 1, 1, 1),
(112, 83, 10, 14.9, 1, 1, 1, 1, 1),
(113, 82, 10, 11, 1, 1, 1, 1, 1),
(114, 81, 10, 17, 1, 1, 1, 1, 1),
(115, 80, 10, 36, 1, 2, 1, 1, 1),
(116, 79, 10, 32, 1, 1, 1, 1, 1),
(117, 78, 10, 14.9, 1, 1, 1, 1, 1),
(118, 77, 10, 12.9, 1, 1, 1, 1, 1),
(119, 76, 10, 0, 1, 1, 1, 1, 1),
(120, 75, 10, 0, 1, 1, 1, 1, 1),
(121, 74, 10, 0, 1, 1, 1, 1, 1),
(122, 73, 10, 0, 1, 1, 1, 1, 1),
(123, 72, 10, 0, 1, 1, 1, 1, 1),
(124, 71, 10, 30, 1, 1, 1, 1, 1),
(125, 70, 10, 19.9, 1, 1, 1, 1, 1),
(126, 69, 10, 35, 1, 1, 1, 1, 1),
(127, 68, 10, 25, 1, 1, 1, 1, 1),
(128, 67, 10, 25, 1, 1, 1, 1, 1),
(129, 66, 10, 0, 1, 1, 1, 1, 1),
(130, 65, 10, 16, 1, 2, 2, 2, 2),
(131, 64, 10, 30, 1, 1, 1, 1, 1),
(132, 63, 10, 17, 1, 1, 1, 1, 1),
(133, 62, 10, 36, 1, 1, 1, 1, 1),
(134, 61, 10, 34, 1, 1, 1, 1, 1),
(135, 60, 10, 34, 1, 1, 1, 1, 1),
(136, 59, 10, 34, 1, 1, 1, 1, 1),
(137, 58, 10, 10, 1, 1, 1, 1, 1),
(138, 57, 10, 17, 1, 1, 1, 1, 1),
(139, 56, 10, 48, 1, 1, 1, 1, 1),
(140, 55, 10, 34.79, 1, 1, 1, 1, 1),
(141, 54, 10, 33.9, 1, 1, 1, 1, 1),
(142, 53, 10, 29.8, 1, 1, 1, 1, 1),
(143, 52, 10, 55, 1, 1, 1, 1, 1),
(144, 51, 10, 34, 1, 1, 1, 1, 1),
(145, 50, 10, 29.65, 1, 1, 1, 1, 1),
(146, 49, 10, 29.8, 1, 1, 1, 1, 1),
(147, 48, 10, 34, 1, 1, 1, 1, 1),
(148, 47, 10, 16, 1, 1, 1, 1, 1),
(149, 46, 10, 29, 1, 1, 1, 1, 1),
(150, 45, 10, 20, 1, 1, 1, 1, 1),
(151, 44, 10, 37.9, 1, 1, 1, 1, 1),
(152, 43, 10, 20.99, 1, 1, 1, 1, 1),
(153, 42, 10, 16.77, 1, 1, 1, 1, 1),
(154, 41, 10, 18, 1, 1, 1, 1, 1),
(155, 40, 10, 23, 1, 1, 1, 1, 1),
(156, 39, 10, 15, 1, 1, 1, 1, 1),
(157, 38, 10, 16, 1, 1, 1, 1, 1),
(158, 37, 10, 27, 1, 1, 1, 1, 1),
(159, 36, 10, 31.9, 1, 1, 1, 1, 1),
(160, 35, 10, 6.95, 1, 1, 1, 1, 1),
(161, 34, 10, 5, 1, 1, 1, 1, 1),
(162, 33, 10, 18.9, 1, 1, 1, 1, 1),
(163, 31, 10, 16.9, 1, 1, 1, 1, 1),
(164, 30, 10, 26, 1, 1, 1, 1, 1),
(165, 28, 10, 8.9, 1, 1, 1, 1, 1),
(166, 26, 10, 14, 1, 1, 1, 1, 1),
(167, 25, 10, 26, 1, 1, 1, 1, 1),
(168, 24, 10, 23, 1, 1, 1, 1, 1),
(169, 23, 10, 24, 1, 1, 1, 1, 1),
(170, 22, 10, 14.9, 1, 1, 1, 1, 1),
(171, 21, 10, 12, 1, 1, 1, 1, 1),
(172, 20, 10, 7, 1, 1, 1, 1, 1),
(173, 19, 10, 13.9, 1, 1, 1, 1, 1),
(174, 18, 10, 24.6, 1, 1, 1, 1, 1),
(175, 17, 10, 15.9, 1, 1, 1, 1, 1),
(176, 16, 10, 15.9, 1, 1, 1, 1, 1),
(177, 15, 10, 29, 1, 1, 1, 1, 1),
(178, 14, 10, 42, 1, 1, 1, 1, 1),
(179, 13, 10, 29, 1, 1, 1, 1, 1),
(180, 12, 10, 37, 1, 1, 1, 1, 1),
(181, 11, 10, 21, 1, 1, 1, 1, 1),
(182, 10, 10, 39.81, 1, 1, 1, 1, 1),
(183, 9, 10, 42, 1, 1, 1, 1, 1),
(184, 7, 10, 32.6, 1, 1, 1, 1, 1),
(185, 6, 10, 36, 1, 1, 1, 1, 1),
(186, 4, 10, 25, 1, 1, 1, 1, 1),
(187, 3, 10, 49.89, 1, 1, 1, 1, 1),
(188, 2, 10, 24.8, 1, 1, 1, 1, 1),
(189, 1, 10, 42.8, 1, 1, 1, 1, 1),
(190, 91, 10, 0, 1, 2, 2, 2, 2),
(191, 90, 9, 17.9, 1, 1, 1, 1, 1),
(192, 196, 0, 24, 1, 1, 1, 1, 1),
(193, 196, 9, 30, 1, 1, 1, 1, 1),
(194, 195, 9, 20.9, 1, 1, 1, 1, 1),
(195, 194, 9, 3, 1, 1, 1, 1, 1),
(197, 221, 9, 14, 1, 1, 1, 1, 1),
(198, 225, 9, 0, 1, 1, 1, 1, 1),
(199, 226, 9, 6.9, 1, 1, 1, 1, 1),
(200, 227, 9, 10.9, 1, 1, 1, 1, 1),
(201, 228, 9, 10.9, 1, 1, 1, 1, 1),
(202, 229, 9, 0, 1, 1, 1, 1, 1),
(203, 230, 9, 12.42, 1, 1, 1, 1, 1),
(204, 231, 9, 17.9, 1, 1, 1, 1, 1),
(205, 232, 9, 17.9, 1, 1, 1, 1, 1),
(206, 233, 9, 12.9, 1, 1, 1, 1, 1),
(207, 234, 9, 19.9, 1, 1, 1, 1, 1),
(208, 235, 9, 15.9, 1, 1, 1, 1, 1),
(209, 236, 9, 27.9, 1, 1, 1, 1, 1),
(211, 238, 9, 15.9, 1, 1, 1, 1, 1),
(212, 239, 9, 16.9, 1, 1, 1, 1, 1),
(213, 240, 9, 9.9, 1, 1, 1, 1, 1),
(214, 241, 9, 12.9, 1, 1, 1, 1, 1),
(215, 242, 9, 9.9, 1, 1, 1, 1, 1),
(216, 243, 9, 13.9, 1, 1, 1, 1, 1),
(217, 244, 9, 14.9, 1, 1, 1, 1, 1),
(218, 245, 9, 10.9, 1, 1, 1, 1, 1),
(219, 246, 9, 5.5, 1, 1, 1, 1, 1),
(220, 247, 9, 9.9, 1, 1, 1, 1, 1),
(221, 248, 9, 0, 1, 1, 1, 1, 1),
(222, 249, 9, 10.9, 1, 1, 1, 1, 1),
(223, 250, 9, 6.9, 1, 1, 1, 1, 1),
(224, 251, 9, 14.9, 1, 1, 1, 1, 1),
(225, 252, 9, 10.9, 1, 1, 1, 1, 1),
(226, 262, 9, 2.41, 1, 1, 1, 1, 1),
(227, 263, 9, 2, 1, 1, 1, 1, 1),
(228, 264, 9, 2.41, 1, 1, 1, 1, 1),
(229, 265, 9, 2.41, 1, 1, 1, 1, 1),
(230, 266, 9, 2.35, 1, 1, 1, 1, 1),
(231, 267, 9, 2.41, 1, 1, 1, 1, 1),
(232, 268, 9, 2.41, 1, 1, 1, 1, 1),
(233, 269, 9, 2.41, 1, 1, 1, 1, 1),
(234, 270, 9, 6.83, 1, 1, 1, 1, 1),
(235, 271, 9, 4.71, 1, 1, 1, 1, 1),
(236, 272, 9, 6.38, 1, 1, 1, 1, 1),
(237, 273, 9, 3.77, 1, 1, 1, 1, 1),
(238, 274, 9, 2.04, 1, 1, 1, 1, 1),
(239, 275, 9, 6.72, 1, 1, 1, 1, 1),
(240, 276, 9, 10.63, 1, 1, 1, 1, 1),
(241, 277, 9, 1.95, 1, 1, 1, 1, 1),
(242, 278, 9, 1.95, 1, 1, 1, 1, 1),
(243, 279, 9, 0, 1, 1, 1, 1, 1),
(244, 280, 9, 1.19, 1, 1, 1, 1, 1),
(245, 281, 9, 4.58, 1, 1, 1, 1, 1),
(246, 282, 9, 0, 1, 1, 1, 1, 1),
(247, 283, 9, 0, 1, 1, 1, 1, 1),
(250, 286, 9, NULL, 1, 1, 1, 1, 1),
(251, 166, 9, 9.9, 1, 1, 1, 1, 1),
(252, 156, 9, 9.9, 1, 1, 1, 1, 1),
(253, 285, 9, 4.58, 1, 1, 1, 1, 1),
(254, 284, 9, 1.19, 1, 1, 1, 1, 1),
(259, 193, 9, 16.9, 1, 1, 1, 1, 1),
(260, 192, 9, 48.5, 1, 1, 1, 1, 1),
(261, 190, 9, 13.65, 1, 1, 1, 1, 1),
(262, 189, 9, 10.9, 1, 1, 1, 1, 1),
(263, 188, 9, 5.5, 1, 1, 1, 1, 1),
(264, 187, 9, 8.9, 1, 1, 1, 1, 1),
(265, 186, 9, 7.95, 1, 1, 1, 1, 1),
(266, 185, 9, 10.9, 1, 1, 1, 1, 1),
(267, 184, 9, 5.42, 1, 1, 1, 1, 1),
(268, 183, 9, 8.9, 1, 1, 1, 1, 1),
(269, 182, 9, 9, 1, 1, 1, 1, 1),
(270, 181, 9, 6.9, 1, 1, 1, 1, 1),
(271, 180, 9, 9.9, 1, 1, 1, 1, 1),
(272, 179, 9, 10.9, 1, 1, 1, 1, 1),
(273, 178, 9, 10.9, 1, 1, 1, 1, 1),
(274, 177, 9, 11, 1, 1, 1, 1, 1),
(275, 176, 9, 7.9, 1, 1, 1, 1, 1),
(276, 175, 9, 8.9, 1, 1, 1, 1, 1),
(277, 174, 9, 8.9, 1, 1, 1, 1, 1),
(278, 173, 9, 16.9, 1, 1, 1, 1, 1),
(279, 172, 9, 15.9, 1, 1, 1, 1, 1),
(280, 171, 9, 17.9, 1, 1, 1, 1, 1),
(281, 170, 9, 17.9, 1, 1, 1, 1, 1),
(282, 169, 9, 16.9, 1, 1, 1, 1, 1),
(283, 168, 9, 16.9, 1, 1, 1, 1, 1),
(284, 167, 9, 16.9, 1, 1, 1, 1, 1),
(285, 165, 9, 3, 1, 1, 1, 1, 1),
(286, 164, 9, 5.9, 1, 1, 1, 1, 1),
(287, 163, 9, 8.9, 1, 1, 1, 1, 1),
(288, 162, 9, 13.9, 1, 1, 1, 1, 1),
(289, 161, 9, 0.8, 1, 1, 1, 1, 1),
(290, 160, 9, 6.5, 1, 1, 1, 1, 1),
(291, 159, 9, 0.84, 1, 1, 1, 1, 1),
(292, 158, 9, 0.82, 1, 1, 1, 1, 1),
(293, 157, 9, 0.8, 1, 1, 1, 1, 1),
(294, 155, 9, 1.08, 1, 1, 1, 1, 1),
(295, 154, 9, 0.86, 1, 1, 1, 1, 1),
(296, 153, 9, 11, 1, 1, 1, 1, 1),
(297, 152, 9, 0.88, 1, 1, 1, 1, 1),
(298, 151, 9, 8.5, 1, 1, 1, 1, 1),
(299, 150, 9, 14.9, 1, 1, 1, 1, 1),
(300, 149, 9, 14.9, 1, 1, 1, 1, 1),
(301, 148, 9, 14.9, 1, 1, 1, 1, 1),
(302, 147, 9, 0.75, 1, 1, 1, 1, 1),
(303, 146, 9, 0.82, 1, 1, 1, 1, 1),
(304, 145, 9, 1, 1, 1, 1, 1, 1),
(305, 144, 9, 0.88, 1, 1, 1, 1, 1),
(306, 143, 9, 0.67, 1, 1, 1, 1, 1),
(307, 142, 9, 1, 1, 1, 1, 1, 1),
(308, 141, 9, 0.71, 1, 1, 1, 1, 1),
(309, 140, 9, 0.8, 1, 1, 1, 1, 1),
(310, 139, 9, 0.92, 1, 1, 1, 1, 1),
(311, 138, 9, 12.9, 1, 1, 1, 1, 1),
(312, 135, 9, 8.9, 1, 1, 1, 1, 1),
(313, 134, 9, 8.25, 1, 1, 1, 1, 1),
(314, 133, 9, 9.9, 1, 1, 1, 1, 1),
(315, 132, 9, 9.9, 1, 1, 1, 1, 1),
(316, 131, 9, 13.9, 1, 1, 1, 1, 1),
(317, 130, 9, 10.9, 1, 1, 1, 1, 1),
(318, 129, 9, 13.9, 1, 1, 1, 1, 1),
(319, 128, 9, 10.9, 1, 1, 1, 1, 1),
(320, 127, 9, 12.9, 1, 1, 1, 1, 1),
(321, 126, 9, 10.9, 1, 1, 1, 1, 1),
(322, 125, 9, 10.9, 1, 1, 1, 1, 1),
(323, 124, 9, 9.9, 1, 1, 1, 1, 1),
(324, 123, 9, 9.9, 1, 1, 1, 1, 1),
(325, 122, 9, 9.9, 1, 1, 1, 1, 1),
(326, 121, 9, 14.9, 1, 1, 1, 1, 1),
(327, 120, 9, 14.9, 1, 1, 1, 1, 1),
(328, 117, 9, 0.84, 1, 1, 1, 1, 1),
(329, 116, 9, 0.88, 1, 1, 1, 1, 1),
(330, 114, 9, 0.95, 1, 1, 1, 1, 1),
(331, 112, 9, 1, 1, 1, 1, 1, 1),
(332, 111, 9, 0.77, 1, 1, 1, 1, 1),
(333, 110, 9, 1, 1, 1, 1, 1, 1),
(334, 104, 9, 2, 1, 1, 1, 1, 1),
(335, 103, 9, 1, 1, 1, 1, 1, 1),
(336, 101, 9, 1.64, 1, 1, 1, 1, 1),
(337, 100, 9, 1.64, 1, 1, 1, 1, 1),
(338, 99, 9, 1.64, 1, 1, 1, 1, 1),
(339, 98, 9, 1.03, 1, 1, 1, 1, 1),
(340, 95, 9, 1, 1, 1, 1, 1, 1),
(341, 94, 9, 1.45, 1, 1, 1, 1, 1),
(342, 93, 9, 1.64, 1, 1, 1, 1, 1),
(343, 287, 9, 0, 1, 1, 1, 1, 1),
(344, 153, 10, 11, 1, 1, 1, 1, 1),
(345, 165, 10, 1, 1, 1, 1, 1, 1),
(346, 163, 10, 8.9, 1, 1, 1, 1, 1),
(347, 156, 10, 9.9, 1, 1, 1, 1, 1),
(348, 160, 10, 6.5, 1, 1, 1, 1, 1),
(349, 161, 10, 0, 1, 1, 1, 1, 1),
(350, 162, 10, 13.9, 1, 1, 1, 1, 1),
(351, 164, 10, 0, 1, 1, 1, 1, 1),
(352, 166, 10, 0, 1, 1, 1, 1, 1),
(353, 238, 10, 0, 1, 1, 1, 1, 1),
(354, 243, 10, 0, 1, 1, 1, 1, 1),
(355, 251, 10, 0, 1, 1, 1, 1, 1),
(356, 150, 10, 14.9, 1, 1, 1, 1, 1),
(357, 149, 10, 14.9, 1, 1, 1, 1, 1),
(358, 148, 10, 14.9, 1, 1, 1, 1, 1),
(359, 151, 10, 8.5, 1, 1, 1, 1, 1),
(360, 239, 10, 0, 1, 1, 1, 1, 1),
(361, 74, 10, 0, 1, 1, 1, 1, 1),
(362, 243, 10, 0, 1, 1, 1, 1, 1),
(364, 87, 15, 39.9, 1, NULL, NULL, NULL, NULL),
(365, 86, 15, 15, 1, NULL, NULL, NULL, NULL),
(366, 85, 15, 13, 1, NULL, NULL, NULL, NULL),
(367, 84, 15, 8.5, 1, NULL, NULL, NULL, NULL),
(368, 83, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(369, 82, 15, 17, 1, NULL, NULL, NULL, NULL),
(370, 81, 15, 17, 1, NULL, NULL, NULL, NULL),
(371, 80, 15, 36, 1, NULL, NULL, NULL, NULL),
(372, 79, 15, 32, 1, NULL, NULL, NULL, NULL),
(373, 78, 15, 14, 1, NULL, NULL, NULL, NULL),
(374, 77, 15, 12.9, 1, NULL, NULL, NULL, NULL),
(375, 76, 15, 14, 1, NULL, NULL, NULL, NULL),
(376, 75, 15, 13, 1, NULL, NULL, NULL, NULL),
(377, 74, 15, 14, 1, NULL, NULL, NULL, NULL),
(378, 73, 15, 15, 1, NULL, NULL, NULL, NULL),
(379, 72, 15, 14, 1, NULL, NULL, NULL, NULL),
(380, 71, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(381, 70, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(382, 69, 15, 19.9, 1, NULL, NULL, NULL, NULL),
(383, 68, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(384, 67, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(385, 66, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(386, 65, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(387, 64, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(388, 63, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(389, 62, 15, 36, 1, NULL, NULL, NULL, NULL),
(390, 61, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(391, 60, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(392, 59, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(393, 58, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(394, 57, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(395, 56, 15, 25.9, 1, NULL, NULL, NULL, NULL),
(396, 55, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(397, 54, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(398, 53, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(399, 52, 15, 25.9, 1, NULL, NULL, NULL, NULL),
(400, 51, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(401, 50, 15, 14, 1, NULL, NULL, NULL, NULL),
(402, 49, 15, 14, 1, NULL, NULL, NULL, NULL),
(403, 48, 15, 15.9, 1, NULL, NULL, NULL, NULL),
(404, 47, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(405, 46, 15, 15, 1, NULL, NULL, NULL, NULL),
(406, 45, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(407, 44, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(408, 43, 15, 20.99, 1, NULL, NULL, NULL, NULL),
(409, 42, 15, 16.77, 1, NULL, NULL, NULL, NULL),
(410, 41, 15, 18, 1, NULL, NULL, NULL, NULL),
(411, 40, 15, 23, 1, NULL, NULL, NULL, NULL),
(412, 39, 15, 5.9, 1, NULL, NULL, NULL, NULL),
(413, 38, 15, 5.9, 1, NULL, NULL, NULL, NULL),
(414, 37, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(415, 36, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(416, 35, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(417, 34, 15, 6, 1, NULL, NULL, NULL, NULL),
(418, 33, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(419, 31, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(420, 30, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(421, 28, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(422, 26, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(423, 25, 15, 26, 1, NULL, NULL, NULL, NULL),
(424, 24, 15, 23, 1, NULL, NULL, NULL, NULL),
(425, 23, 15, 24, 1, NULL, NULL, NULL, NULL),
(426, 22, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(427, 21, 15, 12, 1, NULL, NULL, NULL, NULL),
(428, 20, 15, 3.3, 1, NULL, NULL, NULL, NULL),
(429, 19, 15, 3.9, 1, NULL, NULL, NULL, NULL),
(430, 18, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(431, 17, 15, 4.5, 1, NULL, NULL, NULL, NULL),
(432, 16, 15, 5.9, 1, NULL, NULL, NULL, NULL),
(433, 15, 15, 10, 1, NULL, NULL, NULL, NULL),
(434, 14, 15, 42, 1, NULL, NULL, NULL, NULL),
(435, 13, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(436, 12, 15, 16, 1, NULL, NULL, NULL, NULL),
(437, 11, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(438, 10, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(439, 9, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(440, 7, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(441, 6, 15, 17, 1, NULL, NULL, NULL, NULL),
(442, 4, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(443, 3, 15, 19.9, 1, NULL, NULL, NULL, NULL),
(444, 2, 15, 15.9, 1, NULL, NULL, NULL, NULL),
(445, 1, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(446, 91, 15, 16, 1, NULL, NULL, NULL, NULL),
(447, 90, 15, 17, 1, NULL, NULL, NULL, NULL),
(448, 196, 15, 30, 1, NULL, NULL, NULL, NULL),
(449, 195, 15, 20.9, 1, NULL, NULL, NULL, NULL),
(450, 194, 15, 3, 1, NULL, NULL, NULL, NULL),
(451, 221, 15, 14, 1, NULL, NULL, NULL, NULL),
(452, 225, 15, 0, 1, NULL, NULL, NULL, NULL),
(453, 226, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(454, 227, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(455, 228, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(456, 229, 15, 0, 1, NULL, NULL, NULL, NULL),
(457, 230, 15, 12.42, 1, NULL, NULL, NULL, NULL),
(458, 231, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(459, 232, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(460, 233, 15, 12.9, 1, NULL, NULL, NULL, NULL),
(461, 234, 15, 19.9, 1, NULL, NULL, NULL, NULL),
(462, 235, 15, 15.9, 1, NULL, NULL, NULL, NULL),
(463, 236, 15, 27.9, 1, NULL, NULL, NULL, NULL),
(464, 238, 15, 15.9, 1, NULL, NULL, NULL, NULL),
(465, 239, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(466, 240, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(467, 241, 15, 12.9, 1, NULL, NULL, NULL, NULL),
(468, 242, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(469, 243, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(470, 244, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(471, 245, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(472, 246, 15, 5.5, 1, NULL, NULL, NULL, NULL),
(473, 247, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(474, 248, 15, 0, 1, NULL, NULL, NULL, NULL),
(475, 249, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(476, 250, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(477, 251, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(478, 252, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(479, 262, 15, 2.41, 1, NULL, NULL, NULL, NULL),
(480, 263, 15, 2, 1, NULL, NULL, NULL, NULL),
(481, 264, 15, 2.41, 1, NULL, NULL, NULL, NULL),
(482, 265, 15, 2.41, 1, NULL, NULL, NULL, NULL),
(483, 266, 15, 2.35, 1, NULL, NULL, NULL, NULL),
(484, 267, 15, 2.41, 1, NULL, NULL, NULL, NULL),
(485, 268, 15, 2.41, 1, NULL, NULL, NULL, NULL),
(486, 269, 15, 2.41, 1, NULL, NULL, NULL, NULL),
(487, 270, 15, 6.83, 1, NULL, NULL, NULL, NULL),
(488, 271, 15, 4.71, 1, NULL, NULL, NULL, NULL),
(489, 272, 15, 6.38, 1, NULL, NULL, NULL, NULL),
(490, 273, 15, 3.77, 1, NULL, NULL, NULL, NULL),
(491, 274, 15, 2.04, 1, NULL, NULL, NULL, NULL),
(492, 275, 15, 6.72, 1, NULL, NULL, NULL, NULL),
(493, 276, 15, 10.63, 1, NULL, NULL, NULL, NULL),
(494, 277, 15, 1.95, 1, NULL, NULL, NULL, NULL),
(495, 278, 15, 1.95, 1, NULL, NULL, NULL, NULL),
(496, 279, 15, 0, 1, NULL, NULL, NULL, NULL),
(497, 280, 15, 1.19, 1, NULL, NULL, NULL, NULL),
(498, 281, 15, 4.58, 1, NULL, NULL, NULL, NULL),
(499, 282, 15, 0, 1, NULL, NULL, NULL, NULL),
(500, 283, 15, 0, 1, NULL, NULL, NULL, NULL),
(501, 286, 15, NULL, 1, NULL, NULL, NULL, NULL),
(502, 166, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(503, 156, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(504, 285, 15, 4.58, 1, NULL, NULL, NULL, NULL),
(505, 284, 15, 1.19, 1, NULL, NULL, NULL, NULL),
(506, 193, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(507, 192, 15, 48.5, 1, NULL, NULL, NULL, NULL),
(508, 190, 15, 13.65, 1, NULL, NULL, NULL, NULL),
(509, 189, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(510, 188, 15, 5.5, 1, NULL, NULL, NULL, NULL),
(511, 187, 15, 8.9, 1, NULL, NULL, NULL, NULL),
(512, 186, 15, 7.95, 1, NULL, NULL, NULL, NULL),
(513, 185, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(514, 184, 15, 5.42, 1, NULL, NULL, NULL, NULL),
(515, 183, 15, 8.9, 1, NULL, NULL, NULL, NULL),
(516, 182, 15, 9, 1, NULL, NULL, NULL, NULL),
(517, 181, 15, 6.9, 1, NULL, NULL, NULL, NULL),
(518, 180, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(519, 179, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(520, 178, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(521, 177, 15, 11, 1, NULL, NULL, NULL, NULL),
(522, 176, 15, 7.9, 1, NULL, NULL, NULL, NULL),
(523, 175, 15, 8.9, 1, NULL, NULL, NULL, NULL),
(524, 174, 15, 8.9, 1, NULL, NULL, NULL, NULL),
(525, 173, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(526, 172, 15, 15.9, 1, NULL, NULL, NULL, NULL),
(527, 171, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(528, 170, 15, 17.9, 1, NULL, NULL, NULL, NULL),
(529, 169, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(530, 168, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(531, 167, 15, 16.9, 1, NULL, NULL, NULL, NULL),
(532, 165, 15, 3, 1, NULL, NULL, NULL, NULL),
(533, 164, 15, 5.9, 1, NULL, NULL, NULL, NULL),
(534, 163, 15, 8.9, 1, NULL, NULL, NULL, NULL),
(535, 162, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(536, 161, 15, 0, 1, NULL, NULL, NULL, NULL),
(537, 160, 15, 6.5, 1, NULL, NULL, NULL, NULL),
(538, 159, 15, 0.84, 1, NULL, NULL, NULL, NULL),
(539, 158, 15, 0.82, 1, NULL, NULL, NULL, NULL),
(540, 157, 15, 0.8, 1, NULL, NULL, NULL, NULL),
(541, 155, 15, 1.08, 1, NULL, NULL, NULL, NULL),
(542, 154, 15, 0.86, 1, NULL, NULL, NULL, NULL),
(543, 153, 15, 11, 1, NULL, NULL, NULL, NULL),
(544, 152, 15, 0.88, 1, NULL, NULL, NULL, NULL),
(545, 151, 15, 8.5, 1, NULL, NULL, NULL, NULL),
(546, 150, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(547, 149, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(548, 148, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(549, 147, 15, 0.75, 1, NULL, NULL, NULL, NULL),
(550, 146, 15, 0.82, 1, NULL, NULL, NULL, NULL),
(551, 145, 15, 1, 1, NULL, NULL, NULL, NULL),
(552, 144, 15, 0.88, 1, NULL, NULL, NULL, NULL),
(553, 143, 15, 0.67, 1, NULL, NULL, NULL, NULL),
(554, 142, 15, 1, 1, NULL, NULL, NULL, NULL),
(555, 141, 15, 0.71, 1, NULL, NULL, NULL, NULL),
(556, 140, 15, 0.8, 1, NULL, NULL, NULL, NULL),
(557, 139, 15, 0.92, 1, NULL, NULL, NULL, NULL),
(558, 138, 15, 12.9, 1, NULL, NULL, NULL, NULL),
(559, 135, 15, 8.9, 1, NULL, NULL, NULL, NULL),
(560, 134, 15, 8.25, 1, NULL, NULL, NULL, NULL),
(561, 133, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(562, 132, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(563, 131, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(564, 130, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(565, 129, 15, 13.9, 1, NULL, NULL, NULL, NULL),
(566, 128, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(567, 127, 15, 12.9, 1, NULL, NULL, NULL, NULL),
(568, 126, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(569, 125, 15, 10.9, 1, NULL, NULL, NULL, NULL),
(570, 124, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(571, 123, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(572, 122, 15, 9.9, 1, NULL, NULL, NULL, NULL),
(573, 121, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(574, 120, 15, 14.9, 1, NULL, NULL, NULL, NULL),
(575, 117, 15, 0.84, 1, NULL, NULL, NULL, NULL),
(576, 116, 15, 0.88, 1, NULL, NULL, NULL, NULL),
(577, 114, 15, 0.95, 1, NULL, NULL, NULL, NULL),
(578, 112, 15, 1, 1, NULL, NULL, NULL, NULL),
(579, 111, 15, 0.77, 1, NULL, NULL, NULL, NULL),
(580, 110, 15, 1, 1, NULL, NULL, NULL, NULL),
(581, 104, 15, 2, 1, NULL, NULL, NULL, NULL),
(582, 103, 15, 1, 1, NULL, NULL, NULL, NULL),
(583, 101, 15, 1.64, 1, NULL, NULL, NULL, NULL),
(584, 100, 15, 1.64, 1, NULL, NULL, NULL, NULL),
(585, 99, 15, 1.64, 1, NULL, NULL, NULL, NULL),
(586, 98, 15, 1.03, 1, NULL, NULL, NULL, NULL),
(587, 95, 15, 1, 1, NULL, NULL, NULL, NULL),
(588, 94, 15, 1.45, 1, NULL, NULL, NULL, NULL),
(589, 93, 15, 1.64, 1, NULL, NULL, NULL, NULL),
(590, 287, 15, 0, 1, NULL, NULL, NULL, NULL),
(591, 307, 9, NULL, 1, 1, 1, 1, 1),
(592, 308, 9, NULL, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `av_products_pictures`
--

CREATE TABLE `av_products_pictures` (
  `product_picture_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_pictures` varchar(255) DEFAULT NULL,
  `picture_data_focus` int(11) DEFAULT NULL,
  `picture_data_sort_order` int(11) DEFAULT NULL,
  `picture_data_created` datetime DEFAULT NULL,
  `picture_data_updated` datetime DEFAULT NULL,
  `picture_data_status` int(11) DEFAULT NULL,
  `product_pictures_alt` varchar(255) DEFAULT NULL,
  `picture_view` int(11) DEFAULT 1,
  `product_picture_emplacement` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_products_pictures`
--

INSERT INTO `av_products_pictures` (`product_picture_id`, `product_id`, `product_pictures`, `picture_data_focus`, `picture_data_sort_order`, `picture_data_created`, `picture_data_updated`, `picture_data_status`, `product_pictures_alt`, `picture_view`, `product_picture_emplacement`) VALUES
(182, 74, 'file_674fb427dae9bd5c3ab218423fd953aa.jpg', 1, NULL, NULL, NULL, NULL, 'Tranches de gigot d\'agneau', 1, 0),
(23, 15, 'file_67d41da2cd4378a6bef1107ceb9c4403.jpg', 0, NULL, NULL, NULL, NULL, 'Jarret de veau (Osso Buco) Halal', 1, 0),
(24, 14, 'file_3a14c9d64ed5216892ccba20ae153e82.png', 0, NULL, NULL, NULL, NULL, 'Faux-filet de veau ', 1, 0),
(27, 12, 'file_02b83bdab8172038d3346f11fecd6dc3.png', 0, NULL, NULL, NULL, NULL, 'Côte de veau Halal', 1, 0),
(181, 73, 'file_52e8ff3212fc5ddba745576b746eb5bb.jpg', 1, NULL, NULL, NULL, NULL, 'Souris d\'agneau', 1, 0),
(180, 80, 'file_1c8d2444fc200f08e92c23d4bc0d5e54.jpg', 0, NULL, NULL, NULL, NULL, 'Sauté d\'agneau', 1, 0),
(179, 7, 'file_7ca7791215543292c50c3b9a000f27bc.jpg', 1, NULL, NULL, NULL, NULL, 'Paupiette de veau', 1, 0),
(31, 4, 'file_43cd8e660bdd15c159d513a529ea119c.jpg', 1, NULL, NULL, NULL, NULL, '	Steak haché de veau Halal', 1, 0),
(32, 3, 'file_028038e06d24520f67108bbd74b97a6d.jpg', 1, NULL, NULL, NULL, NULL, 'Filet de veau Halal', 1, 0),
(169, 78, 'file_c934b954c9e63715cc6aece24521f9a2.jpg', 1, NULL, NULL, NULL, NULL, 'Cotes filet d\'agneau', 1, 0),
(170, 26, 'file_ca5abdb06781c8190a48eb297065a8b2.jpg', 0, NULL, NULL, NULL, NULL, 'Cuisse de poulet marinée', 1, 0),
(171, 19, 'file_9f27f50faa48707fcf39ded30de16535.jpg', 1, NULL, NULL, NULL, NULL, 'Cuisse de poulet', 1, 0),
(172, 40, 'file_d285334ef5de67352880ef4f3b3ba4dd.jpg', 1, NULL, NULL, NULL, NULL, 'Dinde rouge', 1, 0),
(174, 10, 'file_7e1e498ad41b1c52559877f68ae6da17.jpg', 0, NULL, NULL, NULL, NULL, 'Escalope de veau', 1, 0),
(175, 55, 'file_d5ebd69ce17bfb125f8dc716f151e130.jpg', 1, NULL, NULL, NULL, NULL, 'Faux-filet', 1, 0),
(176, 39, 'file_455381591abc32bb5f4b11b627a23f85.jpg', 1, NULL, NULL, NULL, NULL, 'Foie de poulet', 1, 0),
(165, 57, 'file_e343a67013978ce50d7fc3e93be911ec.jpg', 1, NULL, NULL, NULL, NULL, 'Basse Cote', 1, 0),
(43, 34, 'file_b360fba432f3e7f71fe821945dba0844.png', 0, NULL, NULL, NULL, NULL, 'Aile de poulet pack 2 kg Halal', 1, 0),
(44, 33, 'file_21cec41ad9a88ba66f030650ce5d772b.jpg', 0, NULL, NULL, NULL, NULL, 'Cuisse de poulet désossée Halal', 1, 0),
(46, 31, 'file_629869457f956c43dc89b7c0291c5bb6.jpg', 0, NULL, NULL, NULL, NULL, 'Pilon de poulet mariné', 1, 0),
(227, 112, 'file_b55faeff7956f56da95709fa9b3b91c6.jpg', 1, NULL, NULL, NULL, NULL, 'Origan', 1, 0),
(226, 114, 'file_1283c2873a790fe87dc6b91490b2e81e.jpg', 1, NULL, NULL, NULL, NULL, 'Cannelle moulue', 1, 0),
(225, 117, 'file_0c662346444ae036724c593f68436f58.jpg', 1, NULL, NULL, NULL, NULL, 'Fenouil', 1, 0),
(184, 89, 'file_39b42440ac3285ded15dbfc575728674.jpeg', 1, NULL, NULL, NULL, NULL, '', 1, 0),
(52, 21, 'file_1ad4514ec2b9fc02b42bfe75732f0beb.jpg', 1, NULL, NULL, NULL, NULL, 'Poulet entier Halal', 1, 0),
(53, 20, 'file_5d2883425eaf702062ad18ff3883b708.jpg', 0, NULL, NULL, NULL, NULL, 'Aile de poulet Halal', 1, 0),
(183, 35, 'file_1d052152f8be0c8ef4e52b37e5871bf1.jpg', 1, NULL, NULL, NULL, NULL, 'Aile de poulet marinée pack 2 kg', 1, 0),
(55, 18, 'file_c6251ef5e2aba8839cb8270f55b1bf94.jpg', 0, NULL, NULL, NULL, NULL, 'Filet de poulet', 1, 0),
(56, 17, 'file_6570acd928cc6571910bc1e92c525250.jpg', 0, NULL, NULL, NULL, NULL, 'Haut de cuisse de poulet', 1, 0),
(57, 16, 'file_91086aa6af9dc27addf52be76ad7644a.jpg', 1, NULL, NULL, NULL, NULL, 'Pilon de poulet', 1, 0),
(58, 70, 'file_f3461ab64a68a9503d013c472e4bdc6c.jpg', 0, NULL, NULL, NULL, NULL, 'Kefta Halal ', 1, 0),
(155, 0, 'file_24145d2e61f8bfc27701d8de3c33d459.jpg', 1, NULL, NULL, NULL, 1, 'Epaule d\'agneau (avec os)', 1, 0),
(150, 83, 'file_0750fd2091ae049f57e4981bf4355e7e.jpg', 1, NULL, NULL, NULL, 1, 'Côtelettes d’agneau', 1, 0),
(173, 67, 'file_927c7287b2ba6d59af015a31d7a4a2e2.jpg', 0, NULL, NULL, NULL, NULL, 'Emincé de boeuf', 1, 0),
(63, 66, 'file_86cdb69b930d8fc82478f94404288a0e.jpg', 0, NULL, NULL, NULL, NULL, 'Côte de boeuf', 1, 0),
(64, 65, 'file_b5760a754d0a1ec40208d9116506f701.jpg', 0, NULL, NULL, NULL, NULL, 'Viande hachée', 1, 0),
(188, 64, 'file_8d0d19ad4431d9ca2462d1763f9cf72f.jpg', 0, NULL, NULL, NULL, NULL, 'Pièce à fondue', 1, 0),
(66, 63, 'file_7b89d3f86667e09cb417bb1e178c43a4.jpg', 0, NULL, NULL, NULL, NULL, 'Steak haché', 1, 0),
(67, 62, 'file_9df3a4fffb06381d65f2adf03e540ec2.jpg', 0, NULL, NULL, NULL, NULL, 'Le royal', 1, 0),
(68, 61, 'file_b0405df89be598c571fa325cee9939e1.jpg', 0, NULL, NULL, NULL, NULL, 'Pavé de rumsteak', 1, 0),
(147, 45, 'string(79) \"The image you are attempting to upload doesn\'t fit into the allowed dimensions.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Pot-au-feu', 1, 0),
(70, 59, 'file_10cc6aa37b0aa062b0ad8a43897d8a26.jpg', 0, NULL, NULL, NULL, NULL, 'Araignée', 1, 0),
(334, 58, 'file_24c1a95b1ed356d97b7bb70ab4643878.jpg', 1, NULL, NULL, NULL, NULL, 'plat de cote bœuf', 1, 0),
(142, 54, 'string(36) \"You did not select a file to upload.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Bavette d\'aloyau', 1, 0),
(162, 56, 'file_8cff2ca0c1067d34cf9bba6b526f8c4c.jpg', 1, NULL, NULL, NULL, NULL, 'Tranches de filet de boeuf', 1, 0),
(177, 75, 'file_f72a0e184a641c1d747193dbe333271f.jpg', 1, NULL, NULL, NULL, NULL, 'Gigot raccourci', 1, 0),
(168, 36, 'file_5fad5368e6b950605b25a2352e141433.jpg', 1, NULL, NULL, NULL, NULL, 'Brochette de poulet marinée', 1, 0),
(77, 52, 'file_016ff56be2f20bf42f18723dc9d9e05b.jpg', 0, NULL, NULL, NULL, NULL, 'Filet de boeuf', 1, 0),
(158, 51, 'file_07a93fb2ecf0ca91e648927d799216ad.jpg', 1, NULL, NULL, NULL, NULL, 'Filet de rumsteak', 1, 0),
(80, 49, 'file_fe2b4505f55b8dbb8de628473fb67430.jpg', 0, NULL, NULL, NULL, NULL, 'Bifteck dans la tranche', 1, 0),
(228, 111, 'file_89a8e9786e3a3a7bbc4ce9a64eae6ee7.jpg', 1, NULL, NULL, NULL, NULL, 'Ras El Hanout jaune', 1, 0),
(82, 47, 'file_c50d7cd6a6313bc2af1798dfbc7e8b2e.jpg', 0, NULL, NULL, NULL, NULL, 'Bourguignon', 1, 0),
(161, 46, 'file_1bdb87d98942fd6b2954571b7dceffaa.jpg', 1, NULL, NULL, NULL, NULL, 'Rosbif', 1, 0),
(335, 287, 'file_9fe478a89f1cc7446ec134660b925d45.jpg', 1, NULL, NULL, NULL, NULL, 'Epices Kefta', 1, 0),
(186, 69, 'file_9a503afd90a06be03de372006f983c4a.jpg', 1, NULL, NULL, NULL, NULL, 'Entrecôte de boeuf marinée', 1, 0),
(157, 86, 'file_3f01a6877b1e4080e84521785ea5c5fb.jpg', 1, NULL, NULL, NULL, NULL, 'Epaule d\'agneau désossée', 1, 0),
(145, 85, 'string(82) \"The uploaded file exceeds the maximum allowed size in your PHP configuration file.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Epaule d\'agneau (avec os) ', 1, 0),
(89, 84, 'file_489ab74f6029fd398565ff8562cf06a3.jpg', 0, NULL, NULL, NULL, NULL, 'Poitrine d\'agneau halal', 1, 0),
(239, 93, 'file_2d2ae6e2033630bfa10d0e19d2987dee.jpg', 1, NULL, NULL, NULL, NULL, 'Curcuma', 1, 0),
(238, 94, 'file_87625b6ebf95fa8bd89ce7e3d59e684b.jpg', 1, NULL, NULL, NULL, NULL, 'Cumin moulue', 1, 0),
(229, 116, 'file_fe83670f21151a77e365b8188d4a21aa.jpg', 1, NULL, NULL, NULL, NULL, 'Gingembre Moulue', 1, 0),
(230, 110, 'file_01e84b59891420a575abc3900686cf8b.jpg', 1, NULL, NULL, NULL, NULL, 'Clou de girofle', 1, 0),
(231, 104, 'file_94b7a44111c00f8718cc5b48c5525b72.jpg', 1, NULL, NULL, NULL, NULL, 'Feuilles de Laurier', 1, 0),
(232, 103, 'file_dcb27543f50ad9e277bcd1c0627d4938.jpg', 1, NULL, NULL, NULL, NULL, 'Basilic', 1, 0),
(233, 101, 'file_a604176359e45f14f12f19741ff06fc4.jpg', 1, NULL, NULL, NULL, NULL, 'Coriandre moulue', 1, 0),
(234, 100, 'file_011be3e42d621371212a3f2f1eb3d3b9.jpg', 1, NULL, NULL, NULL, NULL, 'Carvi moulue', 1, 0),
(235, 99, 'file_6c1bd21f1e5914bdd0a3323f499cf870.jpg', 1, NULL, NULL, NULL, NULL, 'Piment doux moulue', 1, 0),
(236, 98, 'file_33c8413560d1c3ce419863ccf216af91.jpg', 1, NULL, NULL, NULL, NULL, 'Herbes de provence', 1, 0),
(237, 95, 'file_432e3df6bb0a031a39037e429a8efede.jpg', 1, NULL, NULL, NULL, NULL, 'Poivre noir', 1, 0),
(101, 72, 'file_540eb08b2fe31597193d7ec537d2a62c.jpg', 1, NULL, NULL, NULL, NULL, 'Selle d\'agneau Halal', 1, 0),
(102, 88, 'file_e1c20cfb24ab17380129c14bf0fe0d2c.jpg', 1, NULL, NULL, NULL, 0, '', 0, 0),
(148, 45, 'file_df66b11a7cdea96b25bbcc238b87c79d.jpeg', 1, NULL, NULL, NULL, NULL, 'produit', 1, 0),
(152, 68, 'file_4fa47ad1aec4946f28217f8c871b5cc3.jpg', 1, NULL, NULL, NULL, NULL, 'Emincé de poulet', 1, 0),
(156, 85, 'file_bba06f3ab580b56fd26909bfb9813821.jpg', 1, NULL, NULL, NULL, NULL, 'Epaule d\'agneau (avec os)', 1, 0),
(178, 30, 'file_052874f16b3651f1a60c62be26b38f6c.jpg', 0, NULL, NULL, NULL, NULL, 'Paupiette de poulet', 1, 0),
(146, 71, 'string(82) \"The uploaded file exceeds the maximum allowed size in your PHP configuration file.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Brochette de boeuf ', 1, 0),
(164, 28, 'file_9496e6626f74ee7aaa70c6e9a8a0dfa4.jpg', 0, NULL, NULL, NULL, NULL, 'Aile de poulet marinée', 1, 0),
(110, 34, 'file_ca580c8ffbf3e558db4af9e600fc1b29.jpg', 1, NULL, NULL, NULL, NULL, 'Aile de poulet pack 2 kg', 1, 0),
(111, 20, 'file_2db6e13c29b2c710e93fecf8e826c32f.jpg', 1, NULL, NULL, NULL, NULL, 'Aile de poulet', 1, 0),
(112, 33, 'file_d2880460ffa6cf3f2324c1d1a099a238.jpg', 1, NULL, NULL, NULL, NULL, 'Cuisse de poulet désossée', 1, 0),
(113, 18, 'file_f4e82cd3a3bfbd448d7e45e86ba979b3.jpg', 1, NULL, NULL, NULL, NULL, 'Filet de poulet', 1, 0),
(114, 17, 'file_b4706e7880bd6db80feeb5bde145bf38.jpg', 0, NULL, NULL, NULL, NULL, 'Haut de cuisse de poulet', 1, 0),
(115, 31, 'file_543c66fb73120dcd6713b66bf9c97ca7.jpg', 1, NULL, NULL, NULL, NULL, 'Pilon de poulet mariné', 1, 0),
(116, 16, 'file_6a2b3f0d00226dbd67984ef70e1af831.jpg', 0, NULL, NULL, NULL, NULL, 'Pilon de poulet', 1, 0),
(305, 26, 'file_682e4d30964796d6e71b4d88439a4e71.jpg', 1, NULL, NULL, NULL, NULL, 'Cuisse de poulet mariné', 1, 0),
(117, 21, 'file_ead034978fb68ac55f5c94f3408691ee.jpg', 0, NULL, NULL, NULL, NULL, 'Poulet entier', 1, 0),
(255, 237, 'file_a97b7f3ae205f896ec43e2957715bca2.jpg', NULL, NULL, NULL, NULL, NULL, 'Steak haché de veau', 1, 0),
(118, 12, 'file_103c664f7a8f9c280f4b41a404002b75.jpg', 1, NULL, NULL, NULL, NULL, 'Côte de veau', 1, 0),
(119, 9, 'file_66bf7dae8e29f0a5b7dda31ab290df13.jpg', 1, NULL, NULL, NULL, NULL, 'Entrecôte de veau', 1, 0),
(120, 14, 'file_3e6335b3a14975439c46c73b4da8c572.jpg', 1, NULL, NULL, NULL, NULL, 'Faux-filet de veau', 1, 0),
(307, 3, 'file_fd969d3e7ceaec05b2cb08016ebb3ea6.jpg', NULL, NULL, NULL, NULL, NULL, 'Filet de veau ', 1, 0),
(122, 15, 'file_52c73a27db370ecff8939646680fbad1.jpg', 1, NULL, NULL, NULL, NULL, 'Jarret de veau (Osso Buco)', 1, 0),
(123, 4, 'file_a97b7f3ae205f896ec43e2957715bca2.jpg', 0, NULL, NULL, NULL, NULL, 'Steak haché de veau', 1, 0),
(124, 59, 'file_f9b7c64c2755e0931f3f85671efdc2ff.jpg', 1, NULL, NULL, NULL, NULL, 'Araignée', 1, 0),
(125, 57, 'string(36) \"You did not select a file to upload.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Basse côte', 1, 0),
(126, 49, 'file_4e3cafe122dc45d42b2234e86f47d013.jpg', 1, NULL, NULL, NULL, NULL, 'Bifteck dans la tranche', 1, 0),
(187, 53, 'file_3cb49ddaecaac33fe3854445a667fd23.jpg', 1, NULL, NULL, NULL, NULL, 'Bavette de flanchet', 1, 0),
(128, 47, 'file_24302ad12c942fe28b86158bed7e894b.jpg', 1, NULL, NULL, NULL, NULL, 'Bourguignon', 1, 0),
(129, 60, 'file_3ad8a444aaa0458c2fdc9a5773eee43f.jpg', 1, NULL, NULL, NULL, NULL, '', 1, 0),
(131, 66, 'file_d3a10fc0d3f34806b36fd6de3594105a.jpg', 1, NULL, NULL, NULL, NULL, 'Côte de boeuf', 1, 0),
(132, 90, 'file_6ab5ba8b563a678277ccf8ac25cb462e.jpg', 1, NULL, NULL, NULL, 1, 'Brochette d\'agneau ', 1, 0),
(133, 84, 'file_073b8e3cad336456c9d08b894ad5b012.jpg', 1, NULL, NULL, NULL, NULL, 'Poitrine d\'agneau ', 1, 0),
(134, 72, 'file_ed53576b4e1e187a5a443f86a7e436bb.jpg', 0, NULL, NULL, NULL, NULL, 'Selle d\'agneau ', 1, 0),
(135, 52, 'file_894b81d33ff3d90f487e5c3a850d66fc.jpg', 1, NULL, NULL, NULL, NULL, 'Filet de boeuf', 1, 0),
(136, 70, 'file_9822fd4f3befe21af323a81ca4de3124.jpg', 1, NULL, NULL, NULL, NULL, 'Kefta', 1, 0),
(137, 62, 'file_21251992f77dde0f4e8e8e395b263bca.jpg', 1, NULL, NULL, NULL, NULL, 'Le royal', 1, 0),
(138, 61, 'file_140212faf482cd355fb4d0c31e14d64e.jpg', 1, NULL, NULL, NULL, NULL, 'Pavé de rumsteak', 1, 0),
(139, 63, 'file_e3bdd087023b38d33390e471044487a0.jpg', 1, NULL, NULL, NULL, NULL, 'Steak haché', 1, 0),
(140, 65, 'file_bc6e19a536aae3765ff78bfb92db8a7b.jpg', 1, NULL, NULL, NULL, NULL, 'Viande hachée', 1, 0),
(166, 54, 'file_f9f6f8aca455975d531ddb71024ff217.jpg', 1, NULL, NULL, NULL, NULL, 'Bavette d’aloyau', 1, 0),
(167, 2, 'file_1d58dbe3ea2991585d15053d25fd522f.jpg', 0, NULL, NULL, NULL, 0, 'Blanquette de veau', 1, 0),
(241, 140, 'file_f2331ca52e1a9ef2d7c811f7b7e1b9d6.jpg', 1, NULL, NULL, NULL, NULL, 'Colorant alimentaire', 1, 0),
(216, 0, 'file_fad6bd3962f1b998851eeabbd0bcac26.jpg', NULL, NULL, NULL, NULL, NULL, 'Cardamome', 1, 0),
(243, 142, 'file_81d4be14b10f1db3137297f0d3e8facc.jpg', 1, NULL, NULL, NULL, NULL, 'Epice Barbecue Moulue', 1, 0),
(244, 143, 'file_5fa64d1d299865c6275b3a9d80dddd73.jpg', 1, NULL, NULL, NULL, NULL, 'Fenugrec Moulu', 1, 0),
(245, 144, 'file_96478199c66a615944aab346e971b8f4.jpg', 1, NULL, NULL, NULL, NULL, 'Molokheya Moulue', 1, 0),
(246, 145, 'file_35ab5660311170325013180e183c186d.jpg', 1, NULL, NULL, NULL, NULL, 'Poivre blanc', 1, 0),
(247, 146, 'file_e2a7aa456a3956e02d4f05bdd859e37e.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Chorba Moulue', 1, 0),
(248, 147, 'file_ff51290336f9b9d7b75e04e7297cb6c8.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Couscous Jaune Moulue', 1, 0),
(240, 139, 'file_f62db9ceb778c347de72a8cabd5aa99e.jpg', 1, NULL, NULL, NULL, NULL, 'Ail moulu', 1, 0),
(242, 141, 'file_dd74ff1d52c6ffd29390b83020dc0f73.jpg', 1, NULL, NULL, NULL, NULL, 'Cury madras moulue', 1, 0),
(249, 152, 'file_941be040d6139259ddec5643d12f5541.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Harira Moulue', 1, 0),
(250, 154, 'file_d31b19489a72b4ad965992959cc81420.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Kefta Moulue ', 1, 0),
(251, 155, 'file_0900f8f27d75af20fe1f855b645d6dee.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Massalé Moulue', 1, 0),
(252, 157, 'file_5a328850abe474054a5bfa07eda1e358.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Poulet Jaune Moulue ', 1, 0),
(253, 158, 'file_5e8aeecfb93f9e549ddd6289ffbc1855.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Tajine Moulue', 1, 0),
(254, 159, 'file_67b442980e46cf86332307b634dab6fa.jpg', 1, NULL, NULL, NULL, NULL, 'Épice Tandoori Moulue', 1, 0),
(257, 161, 'string(79) \"The image you are attempting to upload doesn\'t fit into the allowed dimensions.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Pieds d\'agneau', 1, 0),
(258, 161, 'string(79) \"The image you are attempting to upload doesn\'t fit into the allowed dimensions.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Pieds d\'agneau', 1, 0),
(259, 161, 'file_495dd9f0e52439736ee35d2451628125.jpg', 1, NULL, NULL, NULL, NULL, 'Pieds d\'agneau', 1, 0),
(260, 153, 'string(79) \"The image you are attempting to upload doesn\'t fit into the allowed dimensions.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Agneau entier', 1, 0),
(261, 167, 'string(36) \"You did not select a file to upload.\"\r\n', 0, NULL, NULL, NULL, NULL, 'Cote filet de veau ', 1, 0),
(262, 167, 'file_06cb1c26d17f8117cd77e869a560d03e.jpg', 0, NULL, NULL, NULL, NULL, 'Cote filet de veau ', 1, 0),
(308, 262, 'file_54ec874ca67d0e1783ccac4fae73bd53.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Barbecue', 1, 0),
(263, 10, 'file_06dada8acd480cf69ac3d04f99da02c3.jpg', 1, NULL, NULL, NULL, NULL, 'Escalope de veau ', 1, 0),
(264, 195, 'file_4ebfdc64d93545a570581868b20e0e50.jpg', 1, NULL, NULL, NULL, NULL, 'Foie de veau ', 1, 0),
(265, 241, 'file_e4a621c4fa0ce6e8bb685c651323c06a.jpg', 1, NULL, NULL, NULL, NULL, 'Langue de veau ', 1, 0),
(266, 153, 'file_0947d5f05bd9e17062db80414bcf6fa5.jpeg', 1, NULL, NULL, NULL, NULL, 'Agneau entier', 1, 0),
(267, 240, 'file_29d99b2110ef36f1b6fca882111468d5.jpg', 1, NULL, NULL, NULL, NULL, 'Poitrine de veau ', 1, 0),
(268, 244, 'file_df38a22a320c0fbbb87b21c4ef6b1008.jpg', 1, NULL, NULL, NULL, NULL, 'Merguez de veau ', 1, 0),
(269, 6, 'file_52d19e7fb7befc09f2c078c18c6d254e.jpg', 1, NULL, NULL, NULL, NULL, 'rôti de veau ', 1, 0),
(270, 82, 'file_9e1710f8af3683e954b33ce3747c183b.jpg', 1, NULL, NULL, NULL, NULL, 'Agneau entier découpé', 1, 0),
(271, 183, 'file_3af706d8b8fe1602a681434f625014cc.jpg', 1, NULL, NULL, NULL, NULL, 'Cordon bleu ', 1, 0),
(272, 184, 'file_471948c9ab5776154ae7fc9fc0cf7abc.jpg', 0, NULL, NULL, NULL, NULL, 'Cuisse de dinde ', 1, 0),
(273, 76, 'file_b2fe7960d0bcad5a1803916c179f7879.jpeg', 0, NULL, NULL, NULL, NULL, 'Gigot entier', 1, 0),
(274, 156, 'file_0561439a27de0597bd72a07f06460049.jpeg', 1, NULL, NULL, NULL, NULL, 'Foie d\'agneau', 1, 0),
(275, 79, 'file_11e97db9e9fe96ad3fa36345095e645e.jpg', 1, NULL, NULL, NULL, NULL, 'Steak haché d\'agneau', 1, 0),
(276, 166, 'file_ffe41874e7c8d7ab541f9f9714f9c8af.jpg', 1, NULL, NULL, NULL, NULL, 'Langue d\'agneau', 1, 0),
(277, 164, 'file_5473b2584a5103ed7b929117043d1169.jpg', 1, NULL, NULL, NULL, NULL, 'Tripes d\'agneau', 1, 0),
(278, 251, 'file_49a67663b36c584f2e38906fccc73d44.jpg', 1, NULL, NULL, NULL, NULL, 'cote d\'agneau', 1, 0),
(279, 243, 'file_d809767d9557edf0b3813dd8581b77a6.jpg', 1, NULL, NULL, NULL, NULL, 'Merguez d\'agneau', 1, 0),
(280, 230, 'file_24aec2950d8b5422a1d4ab47ea7dc34b.jpg', 1, NULL, NULL, NULL, NULL, 'Bifteck haché bœuf', 1, 0),
(281, 122, 'file_d184dc2c9f9d59ed3342964e2f727e87.jpg', 1, NULL, NULL, NULL, NULL, 'Collier de bœuf ', 1, 0),
(282, 123, 'file_82bb13caba966beda65c4c060a381166.jpg', 1, NULL, NULL, NULL, NULL, 'Gite de bœuf', 1, 0),
(283, 131, 'file_8250c0c80645426d5e3c631065247d58.jpg', 1, NULL, NULL, NULL, NULL, 'Hampe', 1, 0),
(284, 135, 'file_0242242ae85d4ab26d9988eb61a0a1da.jpg', 1, NULL, NULL, NULL, NULL, 'Jarret', 1, 0),
(285, 121, 'file_046f9ce26363cd4e1b28842d4307b6dc.jpg', 1, NULL, NULL, NULL, NULL, 'La tranche', 0, 0),
(286, 138, 'file_6c9174f3d54f7e16083e2ce0522c863f.jpg', 1, NULL, NULL, NULL, NULL, 'Langue de bœuf', 1, 0),
(287, 125, 'file_d205f066fc76b3f08f2fd902e26b0c47.jpg', 1, NULL, NULL, NULL, NULL, 'Macreuse de bœuf ', 1, 0),
(288, 252, 'file_62c4e74bef9ecf19b2dee498d46b5c63.jpg', NULL, NULL, NULL, NULL, NULL, 'Macreuse pour bourguignon', 1, 0),
(289, 242, 'file_64e7b48647a27d539b060a69c8990a6b.jpg', 1, NULL, NULL, NULL, 0, 'Merguez de boeuf', 1, 0),
(290, 44, 'file_f12894d4dcd787751e6a24047da76ea1.jpg', 1, NULL, NULL, NULL, NULL, 'Onglet', 1, 0),
(291, 185, 'file_feedb9add4fef762d449553bcf0f2d06.jpg', 0, NULL, NULL, NULL, NULL, 'Escalope de dinde ', 1, 0),
(292, 134, 'file_14fb3be7978f3525e1d1e59dbd6d67d2.jpg', 1, NULL, NULL, NULL, NULL, 'Queue de bœuf', 1, 0),
(293, 37, 'file_5d93bfd16d392fb773a09a87b015802a.jpg', 1, NULL, NULL, NULL, NULL, 'Escalope de poulet ', 1, 0),
(294, 120, 'file_2742caf547ec4074a2205839f79ef397.jpg', 1, NULL, NULL, NULL, 0, 'Rumsteak', 1, 0),
(295, 38, 'file_88d82274cd2c9792e6a8efe2634bcf7e.jpg', 1, NULL, NULL, NULL, NULL, 'Haut de cuisse mariné', 1, 0),
(300, 174, 'file_f334ff5e1aec07de1ff1d92709617b50.jpg', 1, NULL, NULL, NULL, NULL, 'Nuggets de poulet ', 1, 0),
(297, 182, 'file_e2fd2bcdad24b7eec72d9be2a94f077f.jpg', 1, NULL, NULL, NULL, NULL, 'Poulet rôti avec garniture ', 1, 0),
(298, 181, 'file_4064178cce8b8d57ed79cb48cec14f15.jpg', 1, NULL, NULL, NULL, NULL, 'Poulet rôti ', 1, 0),
(299, 30, 'file_ba5beb55ae9bbbd07a867e939f3674c3.jpg', 1, NULL, NULL, NULL, NULL, 'Paupiette de poulet ', 1, 0),
(301, 28, 'file_7abe350b07c4f4633db40e4aa06ca7c3.jpg', 1, NULL, NULL, NULL, NULL, 'Ailes de poulet marinés', 1, 0),
(302, 2, 'file_0ea723be3fa0604358253f4139853baa.jpg', 1, NULL, NULL, NULL, NULL, 'Blanquette de veau ', 1, 0),
(303, 77, 'file_50f59e1aa57a7058e2bbc3917ab21270.jpg', 1, NULL, NULL, NULL, NULL, 'Collier d\'agneau ', 1, 0),
(304, 17, 'file_7c6f0bf06ac9f4537c93c2a82b50f304.jpg', 1, NULL, NULL, NULL, NULL, 'Haut de cuisse de poulet ', 1, 0),
(306, 238, 'file_4e9fecd1b7c1d9d1eb34ec5d8dd71f1d.jpg', 1, NULL, NULL, NULL, NULL, 'Epaule roulé ', 1, 0),
(309, 263, 'file_6d73383a41142a074c0b180d53632127.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Ketchup', 1, 0),
(310, 264, 'file_47ffd9b4bfd00550c466ab97eebd9dfc.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Algérienne', 1, 0),
(311, 265, 'file_1de0e471bcb0b024b23d417c3c244424.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Burger', 1, 0),
(312, 266, 'file_d5108bc53b82806b86896314e1549624.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Mayonnaise', 1, 0),
(313, 267, 'file_7cb904a79f545440a68294a594f19323.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Andalouse', 1, 0),
(314, 268, 'file_d55a23dd3caacbae0ce3ca203a0321c0.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Cheezy', 1, 0),
(315, 269, 'file_2707c8e88780845304c5ae29546ceaf6.jpg', 1, NULL, NULL, NULL, NULL, 'Sauce Samouraï', 1, 0),
(316, 270, 'file_21862c5351ab00efa9ac23478da4e643.jpg', 1, NULL, NULL, NULL, NULL, 'Huile D\'olive Vierge Extra 1l PET', 1, 0),
(317, 271, 'file_0d6fbad682d1e376cf5aec551579d44b.jpg', 1, NULL, NULL, NULL, NULL, 'Huile D\'olive Vierge Extra 500ml Verre', 1, 0),
(318, 272, 'file_ef9f579b1345bf6920903ab21eb9f664.jpg', 1, NULL, NULL, NULL, NULL, 'Huile D\'olive Vierge Extra 750ml Verre', 1, 0),
(319, 273, 'file_8bd2f06699d6ff57581ccbfeb740e4c8.jpg', 1, NULL, NULL, NULL, NULL, 'Huile De Grignons D\'olives 1l PET', 1, 0),
(320, 274, 'file_b1ffd56fa37df5dbe8753e6fd5d23b3d.jpg', 1, NULL, NULL, NULL, NULL, 'Huile De Tournesol', 1, 0),
(321, 275, 'file_1c89fbacbc6872df50bb9637e4ec5bc5.jpg', 1, NULL, NULL, NULL, NULL, 'Huile De Tournesol', 1, 0),
(322, 276, 'file_0e204c13f7c62ef45c515b7d2094759d.jpg', 1, NULL, NULL, NULL, NULL, 'Huile De Tournesol', 1, 0),
(323, 277, 'file_ec78553be94999059dbb4769bb04bfd1.jpg', 1, NULL, NULL, NULL, NULL, 'Couscous Fin 1kg', 1, 0),
(324, 278, 'file_b0fe5bd114d9472bc92aeeaac87b6069.jpg', 1, NULL, NULL, NULL, NULL, 'Couscous Moyen 1kg', 1, 0),
(325, 280, 'file_91146cc20d724c5c79fda22161b1bac1.jpg', 1, NULL, NULL, NULL, NULL, 'Semoule Extra Fine 1kg', 1, 0),
(326, 281, 'file_079f9502033dd68eac40a37552cf152a.jpg', 1, NULL, NULL, NULL, NULL, 'Semoule Extra Fine 5kg', 1, 0),
(327, 282, 'file_2fa291c8ce95917f25d3b14dc3c32f1e.jpg', 1, NULL, NULL, NULL, NULL, 'Semoule Fine 1kg', 1, 0),
(328, 283, 'file_0442eab5c548c431b6dfc5c87408de8c.jpg', 1, NULL, NULL, NULL, NULL, 'Semoule Fine 5kg', 1, 0),
(329, 284, 'file_91cab84ed5ef9a9880029c90efa921f2.jpg', 1, NULL, NULL, NULL, NULL, 'Semoule Moyenne 1kg', 1, 0),
(330, 285, 'file_aa72090dc4fb175b32c7c4925f46e230.jpg', 1, NULL, NULL, NULL, NULL, 'Semoule Moyenne 5kg', 1, 0),
(332, 80, 'file_511785d0cd9f632d31bf293928cc825b.jpg', 1, NULL, NULL, NULL, NULL, 'Sauté d\'agneau ', 1, 0),
(333, 231, 'file_b2e30f5892c3b94fcac6a89f4a0ddcf5.jpg', 1, NULL, NULL, NULL, NULL, 'Brochette de bœuf mariné ', 1, 0),
(336, 307, 'file_696c9c9ddfe006ed3feca07701cc7861.jpg', 1, NULL, NULL, NULL, NULL, '', 1, 0),
(337, 308, 'file_fb35f7ba2cb7d0d3f4a994d67395e535.jpeg', 1, NULL, NULL, NULL, NULL, '', 1, 0),
(338, 184, 'file_5ade4f9cbcef99149d098980cc1f5c3b.jpg', 1, NULL, NULL, NULL, NULL, 'Cuisse de dinde ', 1, 0),
(339, 185, 'file_093f07e53893da1a7e3580942e24032e.png', 1, NULL, NULL, NULL, NULL, 'Escalope de Dinde ', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `av_settings`
--

CREATE TABLE `av_settings` (
  `setting_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `page_title` text CHARACTER SET utf8 NOT NULL,
  `banner_picture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `block_contact` text CHARACTER SET utf8 NOT NULL,
  `page_contact` text CHARACTER SET utf8 NOT NULL,
  `block_contact_en` text CHARACTER SET utf8 NOT NULL,
  `page_contact_en` text CHARACTER SET utf8 NOT NULL,
  `page_meta_description` text CHARACTER SET utf8 NOT NULL,
  `page_meta_keywords` text CHARACTER SET utf8 NOT NULL,
  `page_title_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `page_meta_description_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `page_meta_keywords_en` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_en_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_color_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_2` text CHARACTER SET utf8 NOT NULL,
  `home_block_titre_en_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_color_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_en_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_color_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_en_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_color_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_titre_5` text CHARACTER SET utf8 NOT NULL,
  `home_block_titre_en_5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_color_5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_en_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_en_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_en_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_en_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_desc_en_5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` int(11) NOT NULL,
  `home_block_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_en_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_block_en_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `home_title_en` varchar(266) CHARACTER SET utf8 NOT NULL,
  `home_title` varchar(266) CHARACTER SET utf8 NOT NULL,
  `site_logo` varchar(266) CHARACTER SET utf8 NOT NULL,
  `email_envoi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `text_send` text CHARACTER SET utf8 NOT NULL,
  `text_send_en` text CHARACTER SET utf8 NOT NULL,
  `home_block_titre_6` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `home_block_titre_en_6` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `home_block_color_6` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `home_block_desc_6` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `home_block_desc_en_6` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `home_taux` int(11) NOT NULL DEFAULT 0,
  `home_nbr_dossiers` int(11) NOT NULL DEFAULT 0,
  `home_top_desc` text CHARACTER SET utf8 DEFAULT NULL,
  `home_top_desc_1` text CHARACTER SET utf8 DEFAULT NULL,
  `home_top_price` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `home_top_interventions` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cookie` text CHARACTER SET utf8 DEFAULT NULL,
  `footer_text` text CHARACTER SET utf8 DEFAULT NULL,
  `newsleter_text` text CHARACTER SET utf8 DEFAULT NULL,
  `order_tax` float DEFAULT 0,
  `boucherie_bannier` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `association_bannier` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_settings`
--

INSERT INTO `av_settings` (`setting_id`, `email`, `phone`, `address`, `page_title`, `banner_picture`, `block_contact`, `page_contact`, `block_contact_en`, `page_contact_en`, `page_meta_description`, `page_meta_keywords`, `page_title_en`, `page_meta_description_en`, `page_meta_keywords_en`, `home_block_titre_1`, `home_block_titre_en_1`, `home_block_color_1`, `home_block_titre_2`, `home_block_titre_en_2`, `home_block_color_2`, `home_block_titre_3`, `home_block_titre_en_3`, `home_block_color_3`, `home_block_titre_4`, `home_block_titre_en_4`, `home_block_color_4`, `home_block_titre_5`, `home_block_titre_en_5`, `home_block_color_5`, `home_block_desc_1`, `home_block_desc_en_1`, `home_block_desc_2`, `home_block_desc_en_2`, `home_block_desc_3`, `home_block_desc_en_3`, `home_block_desc_4`, `home_block_desc_en_4`, `home_block_desc_5`, `home_block_desc_en_5`, `active`, `home_block_1`, `home_block_en_1`, `home_block_2`, `home_block_en_2`, `home_title_en`, `home_title`, `site_logo`, `email_envoi`, `text_send`, `text_send_en`, `home_block_titre_6`, `home_block_titre_en_6`, `home_block_color_6`, `home_block_desc_6`, `home_block_desc_en_6`, `home_taux`, `home_nbr_dossiers`, `home_top_desc`, `home_top_desc_1`, `home_top_price`, `home_top_interventions`, `address_1`, `address_2`, `email_1`, `phone_1`, `cookie`, `footer_text`, `newsleter_text`, `order_tax`, `boucherie_bannier`, `association_bannier`) VALUES
(1, 'contact@gmail.fr', '39 61 62 60', 'test', 'Go-ferme-halal', 'file_543d80baf00600e33b0a0db9fd39417d.jpg', '', '', '', '', 'Go-ferme-halal', 'Go-ferme-halal', 'assurance', 'assurance', 'assurance', '', '', '', 'Devis gratuit sans engagement', '', '', 'Un seul dossier', '', '', 'Les garanties ', '', '', 'Go-ferme-halal.com vous propose une grande sélection de viande Française à des prix abordables. Notre équipe s\'engage pour la qualité et la sélection pour vous de nos meilleures bêtes ,adaptées à tous les budgets.', '', '', 'Un accès direct au marché français et au marché des Lloyds', '', 'Aucun frais perçu avant, pendant ou après l’émission des offres', '', 'Notre professionnalisme et notre sens de l’écoute.', 'La régularité et la fiabilité de nos interventions.', 'Les contrats proposés sont spécialement conçus par des spécialistes pour vos activités', '', 'Nos partenaires proposent des tarifs très compétitifs et stables', '', 1, '', '', '', '', 'OUR SERVICES', 'NOS SERVICES', 'file_9a9c01034570be4567ea0678b6565542.png', 'elfartoun@gmail.com', '', '', 'test', '6', '554', 'test', '230', 91, 762, 'test', 'test', '70 000 €', '70%', 'test', 'test', NULL, NULL, 'test', '<p><a href=\"https://www.templateshub.net\" target=\"_blank\" rel=\"noopener\">Templates Hub</a></p>', 'test', 0, 'file_a03f64e3fa6b2d43fcacc934758d6b0f.jpg', 'file_8b3180f765c158792e679480f878b33a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `av_sociaux`
--

CREATE TABLE `av_sociaux` (
  `sociau_id` int(11) NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 NOT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 NOT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `instgram` varchar(255) CHARACTER SET utf8 NOT NULL,
  `google_plus` varchar(255) CHARACTER SET utf8 NOT NULL,
  `youtub` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pinterest` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_sociaux`
--

INSERT INTO `av_sociaux` (`sociau_id`, `facebook`, `twitter`, `linkedin`, `instgram`, `google_plus`, `youtub`, `pinterest`) VALUES
(1, 'https://web.facebook.com/', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `av_status`
--

CREATE TABLE `av_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_color` varchar(255) NOT NULL,
  `status_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `av_status`
--

INSERT INTO `av_status` (`status_id`, `status_name`, `status_color`, `status_type`) VALUES
(1, 'Nouvelle commande', '#2f23d7', 1),
(2, 'Suivi  de préparation', '#33f20d', 1),
(3, 'Suivi de la livraison', '#d219c3', 1),
(4, 'Annulée et remboursée', '#fd1717', 1),
(5, 'Vide', '#000000', 2),
(6, 'Récupéré', '#000000', 2),
(7, 'En cours de livraison', '#000000', 2),
(8, 'Livré chez le client', '#000000', 2),
(9, 'Livraison prise en charge par livreur', '#000000', 1),
(10, 'Demande Faite ', '#45867b', 2);

-- --------------------------------------------------------

--
-- Structure de la table `av_taxe`
--

CREATE TABLE `av_taxe` (
  `taxe_id` int(11) NOT NULL,
  `taxe_value` varchar(255) NOT NULL,
  `taxe_data_status` int(11) NOT NULL,
  `taxe_data_created` datetime DEFAULT NULL,
  `taxe_data_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_taxe`
--

INSERT INTO `av_taxe` (`taxe_id`, `taxe_value`, `taxe_data_status`, `taxe_data_created`, `taxe_data_updated`) VALUES
(1, '5.5', 1, NULL, '2021-09-13 11:34:42');

-- --------------------------------------------------------

--
-- Structure de la table `av_transporters`
--

CREATE TABLE `av_transporters` (
  `transporter_id` int(11) NOT NULL,
  `transporter_name` varchar(255) NOT NULL,
  `transporter_short_text` text DEFAULT NULL,
  `transporter_picture` varchar(100) DEFAULT NULL,
  `transporter_data_focus` int(11) DEFAULT NULL,
  `transporter_phone_portable` varchar(255) DEFAULT NULL,
  `transporter_data_created` datetime NOT NULL,
  `transporter_data_updated` datetime NOT NULL,
  `transporter_data_status` int(11) NOT NULL,
  `transporter_phone` varchar(255) DEFAULT NULL,
  `transporter_responsable` varchar(255) DEFAULT NULL,
  `transporter_price_in_france` float DEFAULT 0,
  `transporter_price_not_france` float DEFAULT 0,
  `transporter_price_by_one` float DEFAULT 0,
  `transporter_city` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `av_transporters`
--

INSERT INTO `av_transporters` (`transporter_id`, `transporter_name`, `transporter_short_text`, `transporter_picture`, `transporter_data_focus`, `transporter_phone_portable`, `transporter_data_created`, `transporter_data_updated`, `transporter_data_status`, `transporter_phone`, `transporter_responsable`, `transporter_price_in_france`, `transporter_price_not_france`, `transporter_price_by_one`, `transporter_city`) VALUES
(1, 'Chronofresh', 'Livraison prévus 48 heures après préparation de commande', 'file_81e6d496442a2f891843e6d265a1742f.jpg', 0, '', '2013-11-13 13:11:02', '2021-09-15 10:19:46', 1, '0978970963', 'Nicolas Aparicio', 15, 16.55, 1, 'Paris'),
(2, 'Gratuit', 'Livraison prévus 48 heur après préparation de commande', 'file_32cae7503c13f251874ed0a3b7d610fc.jpg', NULL, NULL, '2021-08-16 14:02:56', '0000-00-00 00:00:00', 0, '', 'Gratuit', 0, 0, 0, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `av_accounts`
--
ALTER TABLE `av_accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Index pour la table `av_associations`
--
ALTER TABLE `av_associations`
  ADD PRIMARY KEY (`association_id`);

--
-- Index pour la table `av_attributs`
--
ALTER TABLE `av_attributs`
  ADD PRIMARY KEY (`attribut_id`);

--
-- Index pour la table `av_attributs_values`
--
ALTER TABLE `av_attributs_values`
  ADD PRIMARY KEY (`attribut_value_id`);

--
-- Index pour la table `av_banners`
--
ALTER TABLE `av_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Index pour la table `av_categories`
--
ALTER TABLE `av_categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `av_categories_couffin`
--
ALTER TABLE `av_categories_couffin`
  ADD PRIMARY KEY (`categorie_couffin_id`);

--
-- Index pour la table `av_categories_options`
--
ALTER TABLE `av_categories_options`
  ADD PRIMARY KEY (`categorie_option_id`);

--
-- Index pour la table `av_certificats`
--
ALTER TABLE `av_certificats`
  ADD PRIMARY KEY (`certificat_id`);

--
-- Index pour la table `av_code_zip`
--
ALTER TABLE `av_code_zip`
  ADD PRIMARY KEY (`code_zip_id`);

--
-- Index pour la table `av_code_zip_parteners`
--
ALTER TABLE `av_code_zip_parteners`
  ADD PRIMARY KEY (`code_zip_partener_id`);

--
-- Index pour la table `av_contacts`
--
ALTER TABLE `av_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `av_countries`
--
ALTER TABLE `av_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Index pour la table `av_customers`
--
ALTER TABLE `av_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Index pour la table `av_customer_shopping`
--
ALTER TABLE `av_customer_shopping`
  ADD PRIMARY KEY (`customer_shopping_id`);

--
-- Index pour la table `av_customer_shopping_products`
--
ALTER TABLE `av_customer_shopping_products`
  ADD PRIMARY KEY (`customer_shopping_product_id`);

--
-- Index pour la table `av_departement`
--
ALTER TABLE `av_departement`
  ADD PRIMARY KEY (`departement_id`),
  ADD KEY `departement_slug` (`departement_slug`),
  ADD KEY `departement_code` (`departement_code`),
  ADD KEY `departement_nom_soundex` (`departement_nom_soundex`);

--
-- Index pour la table `av_home_blocks`
--
ALTER TABLE `av_home_blocks`
  ADD PRIMARY KEY (`home_block_id`);

--
-- Index pour la table `av_log_orders_parteners`
--
ALTER TABLE `av_log_orders_parteners`
  ADD PRIMARY KEY (`log_order_partener_id`);

--
-- Index pour la table `av_log_products_parteners_price`
--
ALTER TABLE `av_log_products_parteners_price`
  ADD PRIMARY KEY (`log_product_partener_id`);

--
-- Index pour la table `av_news`
--
ALTER TABLE `av_news`
  ADD PRIMARY KEY (`new_id`);

--
-- Index pour la table `av_newsletters`
--
ALTER TABLE `av_newsletters`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Index pour la table `av_options_types`
--
ALTER TABLE `av_options_types`
  ADD PRIMARY KEY (`option_type_id`);

--
-- Index pour la table `av_orders`
--
ALTER TABLE `av_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `av_orders_details`
--
ALTER TABLE `av_orders_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Index pour la table `av_orders_products_options`
--
ALTER TABLE `av_orders_products_options`
  ADD PRIMARY KEY (`orders_product_option_id`);

--
-- Index pour la table `av_pages`
--
ALTER TABLE `av_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Index pour la table `av_parteners`
--
ALTER TABLE `av_parteners`
  ADD PRIMARY KEY (`partener_id`);

--
-- Index pour la table `av_payments_parteners`
--
ALTER TABLE `av_payments_parteners`
  ADD PRIMARY KEY (`payment_partener_id`);

--
-- Index pour la table `av_payments_parteners_details`
--
ALTER TABLE `av_payments_parteners_details`
  ADD PRIMARY KEY (`payment_partener_detail_id`);

--
-- Index pour la table `av_payment_systems`
--
ALTER TABLE `av_payment_systems`
  ADD PRIMARY KEY (`payment_system_id`);

--
-- Index pour la table `av_products`
--
ALTER TABLE `av_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `av_products_attributs`
--
ALTER TABLE `av_products_attributs`
  ADD PRIMARY KEY (`product_attribut_id`);

--
-- Index pour la table `av_products_compose`
--
ALTER TABLE `av_products_compose`
  ADD PRIMARY KEY (`product_compose_id`);

--
-- Index pour la table `av_products_parteners`
--
ALTER TABLE `av_products_parteners`
  ADD PRIMARY KEY (`product_partener_id`);

--
-- Index pour la table `av_products_pictures`
--
ALTER TABLE `av_products_pictures`
  ADD PRIMARY KEY (`product_picture_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `av_status`
--
ALTER TABLE `av_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Index pour la table `av_taxe`
--
ALTER TABLE `av_taxe`
  ADD PRIMARY KEY (`taxe_id`);

--
-- Index pour la table `av_transporters`
--
ALTER TABLE `av_transporters`
  ADD PRIMARY KEY (`transporter_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `av_accounts`
--
ALTER TABLE `av_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `av_associations`
--
ALTER TABLE `av_associations`
  MODIFY `association_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `av_attributs`
--
ALTER TABLE `av_attributs`
  MODIFY `attribut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `av_attributs_values`
--
ALTER TABLE `av_attributs_values`
  MODIFY `attribut_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `av_banners`
--
ALTER TABLE `av_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `av_categories`
--
ALTER TABLE `av_categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT pour la table `av_categories_couffin`
--
ALTER TABLE `av_categories_couffin`
  MODIFY `categorie_couffin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `av_categories_options`
--
ALTER TABLE `av_categories_options`
  MODIFY `categorie_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `av_certificats`
--
ALTER TABLE `av_certificats`
  MODIFY `certificat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `av_code_zip`
--
ALTER TABLE `av_code_zip`
  MODIFY `code_zip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `av_code_zip_parteners`
--
ALTER TABLE `av_code_zip_parteners`
  MODIFY `code_zip_partener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `av_contacts`
--
ALTER TABLE `av_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `av_countries`
--
ALTER TABLE `av_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `av_customers`
--
ALTER TABLE `av_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `av_customer_shopping`
--
ALTER TABLE `av_customer_shopping`
  MODIFY `customer_shopping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `av_customer_shopping_products`
--
ALTER TABLE `av_customer_shopping_products`
  MODIFY `customer_shopping_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `av_departement`
--
ALTER TABLE `av_departement`
  MODIFY `departement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `av_home_blocks`
--
ALTER TABLE `av_home_blocks`
  MODIFY `home_block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `av_log_orders_parteners`
--
ALTER TABLE `av_log_orders_parteners`
  MODIFY `log_order_partener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `av_log_products_parteners_price`
--
ALTER TABLE `av_log_products_parteners_price`
  MODIFY `log_product_partener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT pour la table `av_news`
--
ALTER TABLE `av_news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `av_newsletters`
--
ALTER TABLE `av_newsletters`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `av_options_types`
--
ALTER TABLE `av_options_types`
  MODIFY `option_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `av_orders`
--
ALTER TABLE `av_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `av_orders_details`
--
ALTER TABLE `av_orders_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT pour la table `av_orders_products_options`
--
ALTER TABLE `av_orders_products_options`
  MODIFY `orders_product_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT pour la table `av_pages`
--
ALTER TABLE `av_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `av_parteners`
--
ALTER TABLE `av_parteners`
  MODIFY `partener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `av_payments_parteners`
--
ALTER TABLE `av_payments_parteners`
  MODIFY `payment_partener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `av_payments_parteners_details`
--
ALTER TABLE `av_payments_parteners_details`
  MODIFY `payment_partener_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `av_payment_systems`
--
ALTER TABLE `av_payment_systems`
  MODIFY `payment_system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `av_products`
--
ALTER TABLE `av_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT pour la table `av_products_attributs`
--
ALTER TABLE `av_products_attributs`
  MODIFY `product_attribut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `av_products_compose`
--
ALTER TABLE `av_products_compose`
  MODIFY `product_compose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2639;

--
-- AUTO_INCREMENT pour la table `av_products_parteners`
--
ALTER TABLE `av_products_parteners`
  MODIFY `product_partener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;

--
-- AUTO_INCREMENT pour la table `av_products_pictures`
--
ALTER TABLE `av_products_pictures`
  MODIFY `product_picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT pour la table `av_status`
--
ALTER TABLE `av_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `av_taxe`
--
ALTER TABLE `av_taxe`
  MODIFY `taxe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `av_transporters`
--
ALTER TABLE `av_transporters`
  MODIFY `transporter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
