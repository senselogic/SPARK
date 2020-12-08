CREATE TABLE `ARTICLE` (
  `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  `Title` TEXT NULL, 
  `Slug` TEXT NULL, 
  `Text` TEXT NULL, 
  `Image` TEXT NULL, 
  `Video` TEXT NULL, 
  `SectionSlug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ARTICLE` (`Id`, `Title`, `Slug`, `Text`, `Image`, `Video`, `SectionSlug`) VALUES
(1, 'Broke loose embraced him smiled silently spoke to.', 'broke-loose-embraced-him-smiled-silently-spoke-to', 'Merchant had soon I\'ll stop him who have followed it, conducted him how did the forest, life away thousands a heron\'s death. Black eyes fixed in perfumed waters.', 'surfer.jpg', 'train.mp4', 'hounsell'),
(2, 'Teachings perfectly connected without any given.', 'teachings-perfectly-connected-without-any-given', 'Boy himself anymore to do, come from festering wounds dripped from this time. Continued what has for children were brothers.', 'beach.jpg', 'train.mp4', 'vargas'),
(3, 'Turned black and moon ran incessantly hit.', 'turned-black-and-moon-ran-incessantly-hit', 'They won\'t hit him shines brightly the bondage of light. Saw mankind going back hour sped swiftly along, times but instead he bent down on water.', 'surfer.jpg', 'train.mp4', 'mcclellan'),
(4, 'I\'ve already carries the blue.', 'i-ve-already-carries-the-blue', 'Soon stop him of lustre saw his being, smiling oneness spoke we want to judge another person\'s life.', 'surfer.jpg', 'train.mp4', 'mcclellan'),
(5, 'Must know my son and my self.', 'must-know-my-son-and-my-self', 'Purpose to discover its drawing so venerable one. Fasting what wisdom like you, I\'m sitting here following him safe. Life knew the silence wearing fine clothes.', 'beach.jpg', 'bus.mp4', 'vargas'),
(6, 'Simply thus childlike face.', 'simply-thus-childlike-face', 'Soul which separated and gamblers with them, leapt in tears as well had grown old ferryman. Where it necessary to new rules.', 'palm_tree.jpg', 'train.mp4', 'hounsell'),
(7, 'Pilgrims and clearly and kept on hers.', 'pilgrims-and-clearly-and-kept-on-hers', 'That you\'ve already as dust was dead, stayed for expressing this for wealth the paper and stupid. Lust covetousness sloth and changed their end in heat.', 'beach.jpg', 'train.mp4', 'mcclellan'),
(8, 'Of thirst and on earth.', 'of-thirst-and-on-earth', 'Man when playing with mockery had wanted to earthly things. Haven\'t you well ordered well rested strangely clear voice, yet this past rose bid his shadow. Thus simply thus new riches pursued the verse.', 'beach.jpg', 'bus.mp4', 'mcclellan'),
(9, 'Occasionally he live it.', 'occasionally-he-live-it', 'And images and business of, it\'s a passion but you say. Travellers and uniform law and images any given.', 'surfer.jpg', 'bus.mp4', 'vargas'),
(10, 'Travellers of any goals for him.', 'travellers-of-any-goals-for-him', 'Behold here thought thus deeply. Bid his sickness before had thought to kiss. Takes everyone can stand and noble promises.', 'beach.jpg', 'train.mp4', 'vargas');

CREATE TABLE `CONTACT` (
  `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  `Name` TEXT NULL, 
  `Email` TEXT NULL, 
  `Message` TEXT NULL, 
  `DateTime` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `CONTACT` (`Id`, `Name`, `Email`, `Message`, `DateTime`) VALUES
(1, 'Stasney', 'alexi.ettson@gmail.com', 'Fatessan', '2001-07-03 08:49:00'),
(2, 'Kwee', 'ezmeralda.perina@outlook.com', 'Boyereu', '2001-06-12 13:08:18'),
(3, 'Gareis', 'asghar.baskin@outlook.com', 'Jepaddilkowa', '2005-12-04 06:32:16'),
(4, 'Wojciechowski', 'karoly.clinckett@yahoo.com', 'Akekapy', '2001-12-19 09:17:32'),
(5, 'Lawther', 'torrie.moriyama@live.com', 'Negestyf', '2007-12-28 23:42:14');

CREATE TABLE `SECTION` (
  `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  `Name` TEXT NULL, 
  `Slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `SECTION` (`Id`, `Name`, `Slug`) VALUES
(1, 'Hounsell', 'hounsell'),
(2, 'Mcclellan', 'mcclellan'),
(3, 'Vargas', 'vargas');

CREATE TABLE `TEXT` (
  `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  `Slug` TEXT NULL, 
  `Text` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `TEXT` (`Id`, `Slug`, `Text`) VALUES
(1, 'aragermelwe', 'While begging with returned late once again. Owned locked the sinner which teaches nothing left him. Salvation by many austere and acts in himself. Wants to time had even with sky-blue ones.'),
(2, 'tigunka', 'Wonderful sleep was hard for exalted one, got to dress a fearful but never be so, heard these recent times been his self. Spared from festering wounds dripped from he encountered women. Thoughts as profitable if you\'ll hear more.'),
(3, 'rudange', 'Life than in speaking she him but also fear, smiled too if it that your great pity. It as clearly as shining his ear, senses it\'s enough space for me exclaimed. Himself all very day strive downwards to them.'),
(4, 'onotchlowa', 'According to if only flee from that, finding means of boars of day the banana-trees. Kindly he observed him something on it. Body and full height when it importance.'),
(5, 'ilpadiog', 'Speaking she has nothing when I said, shimmered his hut were thoughts his actions. Occasionally they were in a perfected one, any other turned into this whole world colourful canopy. Laughed just ready to pile on that you.');

CREATE TABLE `USER` (
  `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  `Email` TEXT NULL, 
  `Pseudonym` TEXT NULL, 
  `Password` TEXT NULL, 
  `IsAdministrator` TINYINT UNSIGNED NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `USER` (`Id`, `Email`, `Pseudonym`, `Password`, `IsAdministrator`) VALUES
(1, 'root@root.com', 'root', 'xyz', 1),
(2, 'tybi.endrys@gmail.com', 'tybiendrys', 'many2D:h', 1),
(3, 'mabelle.lashmit@mail.com', 'mabellelashmit', 'd2e@aHnescu', 0),
(4, 'simone.keenemoore@mail.com', 'simonekeenemoore', 'atit^0ejS', 0),
(5, 'othilie.foss@outlook.com', 'othiliefoss', 'u-n5drybLeh', 1);

ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `CONTACT`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `SECTION`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `TEXT`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `USER`
  ADD PRIMARY KEY (`Id`);

