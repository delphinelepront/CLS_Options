-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 26 août 2020 à 18:35
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `timetracker`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `nameGroup` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `nameGroup`, `description`) VALUES
(6, 'Team Développeur A', 'Equipe A de développeurs'),
(7, 'Team Développeur C', 'Equipe C de développeurs'),
(8, 'Designers A', 'Equipe A des designers'),
(9, 'Designers B', 'Equipe B des designers'),
(10, 'Commerciaux', 'La team commerciaux qui intervient dans les actions de vente');

-- --------------------------------------------------------

--
-- Structure de la table `groups_member`
--

CREATE TABLE `groups_member` (
  `id` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups_member`
--

INSERT INTO `groups_member` (`id`, `id_groups`, `id_users`) VALUES
(19, 10, 7),
(20, 10, 8),
(21, 8, 7),
(22, 9, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 5),
(26, 7, 9),
(27, 7, 10),
(28, 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dateCreation` date NOT NULL,
  `statutProject` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `dateCreation`, `statutProject`, `id_users`) VALUES
(1, 'CLS Options Site web', 'Premier site web de l\'entreprise CLS Option Corp réalisé par L\'Elite', '2020-08-22', 'In progress', 2),
(2, 'Blog pour iamchloe', 'Blog travel/influencer pour le compte de @iamchloe sur instagram', '2020-08-20', 'In progress', 1),
(30, 'Backoffice Client #RTFD783', 'Développement d\'un backoffice pour le client #RTFD783, gestion de leurs commandes', '2020-08-26', 'In progress', 4),
(31, 'Mettre à jour les contenus site de l\'Hôtel Saint Antoine', 'Mise à jour photos et textes de la section galerie de l\'Hôtel Saint Antoine à Paris', '2020-08-26', 'In progress', 3),
(32, 'Créer site (client #PPOL654)', 'Création du site vitrine coiffeur', '2020-08-19', 'In progress', 1),
(33, 'Créer site (client #UUIY909)', 'Création du site vitrine restaurant dans la ville d\'Angers', '2020-08-08', 'In progress', 2);

-- --------------------------------------------------------

--
-- Structure de la table `project_groupmember`
--

CREATE TABLE `project_groupmember` (
  `id` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project_groupmember`
--

INSERT INTO `project_groupmember` (`id`, `id_groups`, `id_project`) VALUES
(6, 10, 31),
(7, 7, 31),
(8, 6, 32),
(9, 6, 33),
(10, 7, 1),
(11, 9, 1),
(12, 10, 30),
(13, 8, 2),
(14, 8, 30),
(15, 9, 33),
(16, 9, 32);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `textTask` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `statutTask` varchar(255) DEFAULT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `title`, `textTask`, `date`, `statutTask`, `id_project`) VALUES
(5, 'Développer homepage', 'Développement de la homepage seulement (attente du paiment)', '2020-08-12', 'takable', 30),
(6, 'Maquettes l\'application', 'Lancement des maquettes de l\'application complète', '2020-08-22', 'takable', 30),
(7, 'Maquettes 2', 'Réalisation maquettes 2', '2020-08-23', 'takable', 2),
(8, 'Commencer backend en suivant le cahier des charges', 'Développement backend', '2020-08-20', 'takable', 2),
(9, 'Changer les contenus', 'Changer les contenus des pages, mise à jour dans le drive', '2020-08-12', 'takable', 1),
(10, 'Correctifs update', 'Fin développement backend, correctifs à apporter', '2020-08-09', 'takable', 1),
(11, 'Wireframing', 'Réalisation de wireframes', '2020-08-12', 'takable', 32),
(12, 'Mise en place session/inscription/connexion', 'Développement premières fonctionnalités', '2020-08-10', 'takable', 32),
(13, 'Wireframing', 'Réalisation de wireframes', '2020-08-07', 'takable', 33),
(14, 'Design maquettes', 'Réalisation de maquettes par une team designers', '2020-08-15', 'takable', 33),
(15, 'Tâche d\'intégration', 'Intégration des photos du drive', '2020-08-26', 'takable', 31),
(16, 'Tâche d\'intégration', 'Intégration des textes du drive', '2020-08-16', 'takable', 31);

-- --------------------------------------------------------

--
-- Structure de la table `task_timerecorded`
--

CREATE TABLE `task_timerecorded` (
  `id` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `stopTime` time DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task_timerecorded`
--

INSERT INTO `task_timerecorded` (`id`, `startTime`, `stopTime`, `id_users`, `id_task`) VALUES
(33, '09:30:00', '12:30:00', 10, 9),
(34, '08:27:00', '16:30:00', 4, 8),
(35, '16:12:00', '18:30:00', 11, 10),
(36, '09:30:00', '18:02:00', 7, 14),
(37, '14:00:00', '18:21:00', 1, 5),
(38, '14:00:00', '18:11:00', 7, 7),
(39, '11:23:00', '16:09:00', 2, 6),
(40, '14:00:00', '15:44:00', 5, 12),
(41, '16:51:00', '18:23:00', 11, 15),
(42, '09:45:00', '12:32:00', 9, 16),
(43, '15:34:00', '17:23:00', 2, 11),
(44, '11:43:00', '14:19:00', 3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `prenom`, `nom`, `password`, `role`, `statut`) VALUES
(1, 'max', 'Maxime', 'Julius', '$2y$10$PsjdR3cKPLNplD0TFTuZIOlzlSUvEeAAduBwM/gTvEfbJ1ICf07lu', 'admin', 'online'),
(2, 'lou', 'Louis', 'Dos Santos', '$2y$10$h4MkHtWgR0qdab0pmNQsa.YvpaNoUTfcQaj1hmQBlk.DTExG/R./m', 'membre', 'offline'),
(3, 'delphi', 'Delphine', 'Lepront', '$2y$10$JBoQbdVJ6FHTGJcvorpbeOZJhuypR8shuXWi368XMpcmt4/wBxnNq', 'membre', 'offline'),
(4, 'bast', 'Bastien', 'Cordier', '$2y$10$MsTkqecvnzXBJ62x3Lu/i.NzF8upKsyCX/h/mPw0jAfxuc7.JoVfe', 'membre', 'offline'),
(5, 'jack', 'Jacky', 'Chan', '$2y$10$ORK749xPrNTt0dSEl2k0qOlLfBd8DBfKZhHKlQKlXLt3MeBQusb6q', 'membre', 'online'),
(6, 'paul', 'Paul', 'Gazol', '$2y$10$Vxdgz5iuJt1pQQeQLRc0MevhG3KZ2YvPcVZeLaTx5jXcZmZGDP8ca', 'membre', 'offline'),
(7, 'ambre', 'Ambre', 'Carreaux', '$2y$10$XHnw5JqV/eoFhQ5vLDTvAestzdE9DXuoq63eA9lB7maZu..GY3Phu', 'membre', 'offline'),
(8, 'martin', 'Martin', 'Penders', '$2y$10$wwnxxXfkvTGI2RCdyJMm.eJVLDs43r98aN2XHT9fIDBaDV1fJBDQO', 'membre', 'offline'),
(9, 'will', 'William', 'Roudin', '$2y$10$G95rEGIS/RxhRVYktkqBuuIVD6idF/JFJrFI9dESUZNJ43BXbTe9m', 'membre', 'offline'),
(10, 'phil', 'Phillipe', 'Cornet', '$2y$10$fkzmS.9REm37hLkFjqYx/OiD9mQiwGtIImVBBWmZ6zUCAUedeOLdi', 'membre', 'offline'),
(11, 'leo', 'Léo', 'Babanks', '$2y$10$4nN16xwozPr9LQ1v1CFMbOv5hmuRYZvw9OUgw5/m65D4jUeFvWIaW', 'membre', 'offline');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups_member`
--
ALTER TABLE `groups_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_member_groups_FK` (`id_groups`),
  ADD KEY `groups_member_users0_FK` (`id_users`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_users_FK` (`id_users`);

--
-- Index pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_groupmember_groups_FK` (`id_groups`),
  ADD KEY `project_groupmember_project0_FK` (`id_project`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_project_FK` (`id_project`);

--
-- Index pour la table `task_timerecorded`
--
ALTER TABLE `task_timerecorded`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_timerecorded_users_FK` (`id_users`),
  ADD KEY `task_timerecorded_task0_FK` (`id_task`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `groups_member`
--
ALTER TABLE `groups_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `task_timerecorded`
--
ALTER TABLE `task_timerecorded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `groups_member`
--
ALTER TABLE `groups_member`
  ADD CONSTRAINT `groups_member_groups_FK` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `groups_member_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `project_groupmember`
--
ALTER TABLE `project_groupmember`
  ADD CONSTRAINT `project_groupmember_groups_FK` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `project_groupmember_project0_FK` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_project_FK` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `task_timerecorded`
--
ALTER TABLE `task_timerecorded`
  ADD CONSTRAINT `task_timerecorded_task0_FK` FOREIGN KEY (`id_task`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `task_timerecorded_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
