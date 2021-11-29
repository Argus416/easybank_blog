-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 29 nov. 2021 à 18:21
-- Version du serveur :  8.0.27-0ubuntu0.21.10.1
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `easybank`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL,
  `id_user` int NOT NULL,
  `id_categorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `creation_date`, `is_deleted`, `id_user`, `id_categorie`) VALUES
(1, 'Qu&#39;est-ce que le Lorem Ipsum?', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#39;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n&#39;a pas fait que survivre cinq siècles, mais s&#39;est aussi adapté à la bureautique informatique, sans que son contenu n&#39;en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.\r\n\r\n', '2021-11-18 17:22:14', 0, 6, 6),
(2, 'Pourquoi l\'utiliser?\r\n', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).\r\n\r\n', '2021-11-18 17:22:14', 0, 6, 5),
(3, 'D\'où vient-il?\r\n', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.\r\n\r\n', '2021-11-18 17:22:14', 0, 6, 1),
(4, 'Où puis-je m&#39;en procurer?', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d&#39;entre elles a été altérée par l&#39;addition d&#39;humour ou de mots aléatoires qui ne', '2021-11-18 17:22:14', 0, 6, 7),
(5, 'Hvad er Lorem Ipsum?\r\n', 'Lorem Ipsum er ganske enkelt fyldtekst fra print- og typografiindustrien. Lorem Ipsum har været standard fyldtekst siden 1500-tallet, hvor en ukendt trykker sammensatte en tilfældig spalte for at trykke en bog til sammenligning af forskellige skrifttyper. Lorem Ipsum har ikke alene overlevet fem århundreder, men har også vundet indpas i elektronisk typografi uden væsentlige ændringer. Sætningen blev gjordt kendt i 1960\'erne med lanceringen af Letraset-ark, som indeholdt afsnit med Lorem Ipsum, og senere med layoutprogrammer som Aldus PageMaker, som også indeholdt en udgave af Lorem Ipsum.\r\n\r\n', '2021-11-18 17:22:14', 0, 6, 1),
(6, 'Hello world', 'qzdqsdqzd', '2021-11-18 17:22:14', 0, 6, 1),
(18, 'Cupcake ipsum dolor sit amet wafer chocolate bar', 'Cupcake ipsum dolor sit amet soufflé lemon drops bonbon wafer. Toffee shortbread powder candy marshmallow candy canes toffee dragée. Pudding halvah cheesecake tootsie roll gingerbread. Shortbread macaroon brownie pie marzipan bear claw.\r\n\r\nCroissant bear claw candy canes cake tootsie roll bonbon cake topping jelly. Wafer chocolate jelly-o croissant biscuit oat cake. Soufflé caramels pie icing croissant toffee gingerbread croissant.\r\n\r\nPowder sweet candy canes cotton candy tiramisu. Dessert caramels jelly-o liquorice marshmallow chocolate. Topping caramels sweet bonbon cake. Chupa chups liquorice chocolate cake muffin danish.\r\n\r\nMuffin liquorice chocolate bar chocolate cake cupcake marzipan. Chocolate bar marshmallow carrot cake macaroon tootsie roll. Jelly cake jelly gingerbread candy jujubes marzipan. Gummies sweet roll jujubes chocolate pie soufflé.\r\n\r\nMarzipan oat cake jelly-o sweet roll croissant powder chupa chups danish. Bear claw carrot cake macaroon marzipan donut gummi bears. Sugar plum cake gummi bears gummies liquorice sweet roll pastry.\r\n\r\n', '2021-11-29 15:11:26', 0, 6, 2),
(19, 'Bonbon tart croissant tart chocolate wafer', 'Cupcake ipsum dolor sit amet cookie ice cream. Bonbon tart croissant tart chocolate wafer cookie caramels candy. Powder shortbread halvah candy jujubes gummi bears tiramisu.\r\n\r\nJelly-o biscuit marshmallow oat cake donut danish. Candy oat cake lemon drops icing bear claw toffee. Jujubes gingerbread marzipan pudding tootsie roll oat cake bear claw.\r\n\r\nDonut lollipop muffin brownie sweet roll. Marshmallow chupa chups marshmallow oat cake gingerbread carrot cake candy. Lollipop tootsie roll cheesecake chocolate cake sesame snaps. Shortbread pastry chupa chups candy canes cupcake.\r\n\r\nCandy canes dragée marzipan soufflé toffee wafer tart cheesecake marzipan. Dessert muffin gingerbread sesame snaps donut chocolate cake pudding fruitcake pie. Tiramisu donut cookie fruitcake fruitcake tiramisu brownie bear claw. Gummies sugar plum powder chocolate carrot cake cookie cotton candy.\r\n\r\nMarzipan pastry apple pie danish carrot cake candy canes apple pie wafer. Fruitcake candy canes powder sweet wafer chocolate bar croissant caramels. Lemon drops jujubes tart pastry tart.\r\n\r\n', '2021-11-29 15:11:54', 0, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `type`, `is_deleted`) VALUES
(1, 'Action', 0),
(2, 'Culture', 1),
(3, 'Financee', 1),
(5, 'd', 1),
(6, 'qzdqs', 0),
(7, 'Mohamad', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `img_profile` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mdp`, `date_de_naissance`, `img_profile`) VALUES
(6, 'Alkhatib', 'Mohamad', 'mohamad@localhost.com', '$argon2i$v=19$m=65536,t=4,p=1$b1VCWjhqRDBYLkJzNmk0SA$LRHTN5zQLUXAnOw1I6VOGZ4G2ZJOIQDmxSGW8d2s/EU', '1970-01-01', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
