-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 fév. 2020 à 10:15
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `allo_jati`
--

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id_artist` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `first_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `birth_day` date NOT NULL,
  `bio` text NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id_artist`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id_artist`, `picture`, `first_name`, `last_name`, `birth_day`, `bio`, `role`) VALUES
(1, 'https://fr.web.img5.acsta.net/pictures/17/02/08/16/50/452749.jpg', 'Will', 'Smith', '1968-09-25', 'Willard Carroll Smith, Jr., alias Will Smith, est un acteur, rappeur et producteur de cinéma américain, né le 25 septembre 1968 à Philadelphie3, en Pennsylvanie.\r\n\r\nIl est l\'un des rares artistes à avoir connu le succès dans trois différents médias de divertissement aux États-Unis et dans le monde : cinéma, télévision et musique. Il est devenu rapidement célèbre en tenant le rôle-titre de la série télévisée Le Prince de Bel-Air au début des années 1990, puis en s\'imposant au cinéma avec quelques blockbusters à succès comme Bad Boys (1995), Independence Day (1996), Men in Black (1997) puis Ennemi d\'État (1998).\r\n\r\nÀ la suite du flop de Wild Wild West (1999), il accepte de tourner dans deux suites : Men in Black 2 (2002) et Bad Boys 2 (2003), mais s\'essaie également à un cinéma plus dramatique : le mélodrame La Légende de Bagger Vance (2001) de Robert Redford puis Ali (2001) de Michael Mann, qui lui vaut une nomination à l\'Oscar du meilleur acteur en 2002.\r\n\r\nIl privilégie ensuite des projets plus commerciaux : la comédie Hitch, expert en séduction (2005), les blockbusters de science-fiction I, Robot (2004), Je suis une légende (2007) et Hancock (2008). Il porte aussi deux mélodrames réalisés par Gabriele Muccino : À la recherche du bonheur (2006), qui lui vaut sa seconde nomination à l\'Oscar du meilleur acteur, puis Sept vies (2008).\r\n\r\nIl est alors l\'un des acteurs les mieux payés d\'Hollywood avec 80 millions de dollars gagnés entre le 1er juin 2007 et le 1er juin 20084,5 et le seul acteur à avoir tourné dans huit films classés premiers au box-office américain dès leur premier week-end de diffusion6.\r\n\r\nLes années 2010 sont cependant plus difficiles : après le succès Men in Black 3 (2012), ses nouveaux blockbusters : After Earth (2013), Un amour d\'hiver (2014), Diversion (2015), Suicide Squad (2016) et Bright (2017) - comme ses projets plus intimistes - Seul contre tous (2015) et Beauté cachée (2016) - sont très mal reçus par la critique7.\r\n\r\nEn 2019, Aladdin, l’adaptation en prise de vues réelle du film homonyme de 1992, dans lequel il incarne le Génie, devient le plus gros succès au box-office de sa carrière8. En 2020, il reprend son rôle dans Bad Boys for Life. ', 1),
(2, 'https://upload.wikimedia.org/wikipedia/commons/8/8b/Jim_Carrey_2008.jpg', 'Jim', 'Carrey', '1962-01-17', 'James Eugene Carrey, dit Jim Carrey, né le 17 janvier 1962 à Newmarket en Ontario au Canada, est un acteur canadien et américain, humoriste, scénariste et producteur de cinéma canado-américain.\r\n\r\nIl s\'est fait connaître au cinéma en 1994 grâce aux films à succès Ace Ventura, détective chiens et chats, The Mask et Dumb and Dumber. Ses comédies sont basées sur un humour gestuel et de nombreuses grimaces, ce qui deviendra sa marque de fabrique.\r\n\r\nIl confirme avec des comédies construites autour de lui : Ace Ventura en Afrique (1995), Disjoncté (1996), Menteur, menteur (1997), Fous d\'Irène (2000) et Bruce tout-puissant (2003). Parallèlement, il s\'impose dans un registre dramatique : The Truman Show (1998), Man on the Moon (1999), The Majestic (2001) et Eternal Sunshine of the Spotless Mind (2004). Ses performances lui valent deux Golden Globes.\r\n\r\nIl se concentre par la suite sur des productions destinées à la jeunesse : Les Désastreuses Aventures des orphelins Baudelaire (2004), Le Drôle de Noël de Scrooge (2009), Monsieur Popper et ses pingouins (2011), L\'Incroyable Burt Wonderstone (2013).\r\n\r\nEn revanche, ses passages dans un registre action et ses retours au dramatique ne sont pas suivis par le grand public, Kick-Ass 2 (2013), Dark Crimes (2016) et The Bad Batch (2017) passent inaperçus. ', 1),
(3, 'https://fr.web.img6.acsta.net/pictures/17/02/06/17/01/343859.jpg', 'Keanu', 'Reeves', '1964-09-02', 'Keanu Reeves est un acteur canadien, né le 2 septembre 1964 à Beyrouth2,3 (Liban) et qui habite aux États-Unis.\r\n\r\nAprès avoir été révélé à la fin des années 1980 dans deux films buddy movie : L\'Excellente Aventure de Bill et Ted (1989) et Point Break (1991), il fait une prestation remarquée dans Dracula (1992). Il s\'impose ensuite comme un acteur incontournable du cinéma d\'action avec les rôles de Jack Traven dans Speed (1994) et de Neo dans la trilogie Matrix (1999-2003).\r\n\r\nParallèlement à sa carrière d\'acteur, il est bassiste dans le groupe grunge Dogstar, de 1991 à 2002, et plus récemment dans le groupe Becky.\r\n\r\nDans l\'émission Entertainment Tonight en 2006, Keanu Reeves a été inclus dans le « Top 10 des stars préférées des Américains ». Le 31 janvier 2005, il a reçu une étoile sur le Walk of Fame à Hollywood.\r\n\r\nEn 2014, il fait un retour remarqué en imposant un nouveau héros du cinéma d\'action avec le film John Wick. ', 1),
(4, 'https://fr.web.img6.acsta.net/pictures/18/07/13/09/57/3777492.jpg', 'Tom', 'Cruise', '1962-07-03', 'Thomas Cruise, dit Tom Cruise, est un acteur et producteur de cinéma américain, né le 3 juillet 1962 à Syracuse (New York).\r\n\r\nAprès avoir interprété des seconds rôles dans des films culte, notamment dans Taps (1981) et Outsiders (1983), il obtient son premier rôle important dans la comédie dramatique Risky Business, qui le révèle au grand public. Mais c\'est le rôle de Pete « Maverick » Mitchell dans le film d\'action Top Gun (1986), qui en fait une star internationale.\r\n\r\nPar la suite, l’acteur occupe des têtes d\'affiche, sous la direction de plusieurs grands réalisateurs tels que Martin Scorsese pour La Couleur de l\'argent (1986), Barry Levinson pour Rain Man (1988), Oliver Stone pour Né un 4 juillet (1989), Rob Reiner pour Des hommes d\'honneur (1992), Sydney Pollack pour La Firme (1993), Brian De Palma pour Mission impossible (1996), Cameron Crowe pour Jerry Maguire (1996) et Vanilla Sky (2001).\r\n\r\nPar la suite, il s\'essaie à des personnages plus négatifs : Stanley Kubrick plonge dans son intimité pour Eyes Wide Shut (1998), Paul Thomas Anderson le transforme en gourou pour Magnolia (1999) et Michael Mann en fait un tueur à gages pour Collatéral (2004).\r\n\r\nA partir de la décennie 2000, il privilégie cependant des blockbusters : il tourne les films de science-fiction Minority Report (2002) et La Guerre des mondes avec Steven Spielberg, puis Oblivion (2013), de Joseph Kosinski et Edge of Tomorrow (2014), de Doug Liman.\r\n\r\nMais il connait surtout un énorme succès en s\'investissant dans la production de ses films : il incarne ainsi Ethan Hunt dans la saga cinématographique à succès Mission impossible, dont il confie la réalisation à J. J. Abrams, puis à Christopher McQuarrie. Il développe aussi une autre franchise comme acteur/producteur, Jack Reacher, qui connait deux films. L\'année 2020 le verra surtout revenir dans la suite du blockbuster qui l\'a révélé trente-cinq ans plus tôt, avec Top Gun: Maverick.\r\n\r\nDurant sa carrière, Tom Cruise a reçu trois nominations aux Oscars et sept nominations aux Golden Globes, qu\'il a remportés trois fois. Selon le magazine Forbes, Tom Cruise était en 2012 l\'acteur le mieux payé de Hollywood avec 75 000 000 $2. À ce jour, il détient le record du plus gros cachet de l\'histoire du cinéma avec 100 000 000 $ pour le film La Guerre des mondes et du plus gros cachet pour le contrat de la série de films Mission impossible pour 290 000 000 $.\r\n\r\nIl a tourné avec, entre autres, Steven Spielberg, Stanley Kubrick, Paul Thomas Anderson, Brian De Palma, John Woo, J.J. Abrams, Brad Bird, Michael Mann, Robert Redford, Cameron Crowe, Martin Scorsese, Oliver Stone, Neil Jordan, Ron Howard, Sydney Pollack, Barry Levinson, Francis Ford Coppola, Ridley Scott ou encore Tony Scott.\r\n\r\nSon appartenance à la Scientologie et son prosélytisme pour cette organisation, considérée comme une secte ou comme une religion selon les différents pays, sont à l\'origine de nombreuses polémiques. ', 1),
(5, 'https://fr.web.img5.acsta.net/pictures/15/06/24/14/36/054680.jpg', 'Leonardo', 'Di Caprio', '1974-11-11', 'Leonardo DiCaprio né le 11 novembre 1974 à Los Angeles, est un acteur, scénariste et producteur de cinéma américain.\r\n\r\nGrandissant dans les quartiers populaires de Los Angeles tels que Los Feliz puis Hollywood, le jeune Leonardo DiCaprio prend comme modèle le fils de sa belle-mère Peggy Ann Saunders, Adam Farrar, qui commence dès l\'enfance une carrière d\'acteur. Il décide alors de se lancer lui aussi, encouragé par ses parents. Il montre rapidement un talent évident pour la comédie et se voit proposer des rôles à la télévision, puis au cinéma. Après avoir été choisi parmi de très nombreux candidats pour jouer face à son acteur préféré Robert De Niro dans Blessures secrètes en 1993, il se fait particulièrement remarquer la même année grâce à son film suivant, Gilbert Grape, où il incarne face à Johnny Depp un jeune garçon déficient intellectuel, rôle pour lequel il est nommé à l\'Oscar du meilleur acteur dans un second rôle à l\'âge de 19 ans.\r\n\r\nAprès plusieurs films dans le circuit indépendant, Leonardo DiCaprio est découvert en 1996 par le grand public dans l\'adaptation moderne et rock d’une pièce de Shakespeare : Roméo + Juliette. Un an plus tard, il devient une star planétaire en incarnant le héros romantique Jack Dawson dans Titanic, un des plus gros succès de l\'histoire du cinéma et l\'un des films les plus oscarisés avec 11 statuettes. Sa carrière prend alors un nouveau tournant dans les années 2000, durant lesquelles il travaille pour les plus grands réalisateurs et devient le nouvel acteur fétiche de Martin Scorsese - comme a pu l\'être Robert De Niro dans les années 1970-1990 - à l\'affiche de cinq de ses films : Gangs of New York, Aviator, Les Infiltrés, Shutter Island et Le Loup de Wall Street. Il remporte de nombreuses récompenses tout au long de sa carrière pour des films tels que Aviator, Blood Diamond, Arrête-moi si tu peux, J Edgar, Django Unchained ou encore Le Loup de Wall Street. Mais ce n\'est qu\'en février 2016, qu\'il remporte pour la première fois l\'Oscar du meilleur acteur, pour son interprétation de Hugh Glass dans The Revenant.\r\n\r\nParallèlement à ses métiers dans le cinéma, Leonardo DiCaprio est également connu pour son fort engagement en faveur de l\'écologie avec sa « Fondation Leonardo DiCaprio ». Il a lié ses deux activités en écrivant et produisant le film documentaire La Onzième heure, le dernier virage, sur le thème du réchauffement climatique. ', 1),
(6, 'https://medias.fashionnetwork.com/image/upload/v1/medias/ab4a10f7679ea2c38819c8c900904f2b2943745.jpg', 'Brad', 'Pitt', '1963-12-18', 'William Bradley Pitt, dit Brad Pitt, est un acteur et producteur de cinéma américain, né le 18 décembre 1963 à Shawnee (Oklahoma).\r\n\r\nRepéré dans une publicité pour Levi\'s, Brad Pitt sort de l\'anonymat grâce à un petit rôle dans le film Thelma et Louise de Ridley Scott. En très peu de temps, il devient une véritable star et sa collaboration avec le réalisateur David Fincher donne naissance aux films culte Seven, Fight Club et L\'Étrange Histoire de Benjamin Button. Il tourne dans de nombreux autres succès comme Entretien avec un vampire de Neil Jordan, Ocean\'s Eleven et ses suites de Steven Soderbergh, Troie de Wolfgang Petersen et Inglourious Basterds de Quentin Tarantino. Au cours de sa carrière, il reçoit six nominations aux Oscars et cinq nominations aux Golden Globes, dont un remporté pour L\'Armée des douze singes de Terry Gilliam en 1996.\r\n\r\nSex-symbol des années 1990, Brad Pitt est le premier acteur élu deux fois « Homme le plus sexy du monde » par le magazine People en 1995 et en 2000. Avec sa femme Angelina Jolie (rencontrée sur le tournage de Mr et Mrs Smith et qui a demandé le divorce en septembre 2016), il est le père de 6 enfants. Leur couple est très médiatisé dans les années 2000, y compris dans leurs actions humanitaires (à l\'occasion notamment du tsunami de 2004 et de l\'ouragan Katrina).\r\n\r\nÀ partir de 2002, il s\'investit dans la production via sa société Plan B Entertainment avec des films (dans lesquels il joue) tels que Les Infiltrés de Martin Scorsese et Twelve Years a Slave de Steve McQueen, qui sont chacun récompensés par l\'Oscar du meilleur film en 2007 et 2014, The Tree of Life de Terrence Malick, qui reçoit la Palme d\'or au Festival de Cannes en 2011, ou des succès publics comme World War Z, réalisé par Marc Forster. Il collabore avec des cinéastes de renom comme, entre autres, David Fincher, Quentin Tarantino, Steven Soderbergh, Terrence Malick, Ridley Scott, Tony Scott, Joel et Ethan Coen, Robert Redford, Guy Ritchie, Jean-Jacques Annaud, Alan J. Pakula, Neil Jordan, Terry Gilliam, Alejandro González Iñárritu, Andrew Dominik, Steve McQueen ou, plus récemment, Robert Zemeckis et James Gray. ', 1),
(7, 'https://www.cine-feuilles.ch/storage/app/uploads/public/5a3/d5a/efa/5a3d5aefa807b927305637.jpg', 'George', 'Clooney', '1961-06-06', 'George Clooney est un acteur, réalisateur, scénariste et producteur de cinéma américain, né le 6 mai 1961 à Lexington (Kentucky).\r\n\r\nIl devient célèbre grâce à son rôle du docteur Doug Ross dans la série télévisée Urgences. Depuis, il mène une importante carrière au cinéma à travers Ocean\'s Eleven, Confessions d\'un homme dangereux, Good Night and Good Luck et Syriana (qui lui a valu l\'Oscar du meilleur acteur dans un second rôle). En 2013, il interprète également le 1er rôle masculin dans le film Gravity, qui reçoit 7 Oscars l\'année suivante.\r\n\r\nSon nom est souvent associé à celui du réalisateur Steven Soderbergh avec qui il tourne six films, ainsi qu\'à celui des frères Coen, sous la direction desquels il participe à quatre films (série des « idiots », avec, dans l\'ordre : O\'Brother en 2000, Intolérable Cruauté en 2003, Burn After Reading en 2008 et Ave, César ! en 2016). Il est classé vingt-troisième plus importante personnalité du monde par le journal Time en 2008. Il est l\'époux de la célèbre avocate libano-britannique Amal Alamuddin. ', 1),
(8, 'https://fr.web.img3.acsta.net/pictures/19/05/22/10/33/5945451.jpg', 'Quentin', 'Tarantino', '1963-03-27', 'Quentin Tarantino, né le 27 mars 1963 à Knoxville dans le Tennessee, est un réalisateur, scénariste, producteur et acteur américain.\r\n\r\nIl acquiert une célébrité internationale dans les années 1990, en tant que réalisateur de films indépendants avec ses deux premiers longs métrages, Reservoir Dogs (1992) et Pulp Fiction (1994), et remporte pour ce dernier la Palme d\'or à Cannes. Après un troisième film en 1997 (Jackie Brown), il effectue son retour avec les deux volets de Kill Bill (2003 et 2004). Ses plus grands succès commerciaux internationaux sont Django Unchained (2012) et Once Upon a Time… in Hollywood (2019).\r\n\r\nLe style très cinéphile de Quentin Tarantino se reconnaît entre autres par sa narration postmoderne et non linéaire, ses dialogues travaillés souvent émaillés de références à la culture populaire, et ses scènes hautement esthétiques mais d\'une violence extrême, inspirées de films d\'exploitation, d\'arts martiaux ou de western spaghetti. Ayant reçu une formation d\'acteur, il interprète fréquemment de petits rôles dans ses propres films, comme ceux de M. Brown dans Reservoir Dogs, Jimmie dans Pulp Fiction, Warren dans Boulevard de la mort ou encore un employé de compagnie minière dans Django Unchained.\r\n\r\nQuentin Tarantino a créé pour Pulp Fiction la société de production A Band Apart, dont le nom est un hommage au film Bande à part de Jean-Luc Godard3 alors que son logo reprend quant à lui les personnages en costumes noirs de Reservoir Dogs. Il collabore régulièrement avec son ami réalisateur Robert Rodriguez. ', 3),
(10, 'https://upload.wikimedia.org/wikipedia/commons/5/57/SYDNEY%2C_AUSTRALIA_-_JANUARY_23_Margot_Robbie_arrives_at_the_Australian_Premiere_of_%27I%2C_Tonya%27_on_January_23%2C_2018_in_Sydney%2C_Australia_%2828074883999%29_%28cropped_2%29.jpg', 'Margot', 'Robbie', '1990-07-02', 'Margot Robbie, née le 2 juillet 1990 à Dalby (Queensland, Australie), est une actrice et productrice australienne.\r\n\r\nRobbie se fait connaitre en Australie en 2008 en décrochant un rôle régulier dans le soap opera à succès Les Voisins, rôle qu\'elle tiendra quatre ans et qui lui permettra de décrocher deux nominations aux Logie Awards. Elle se lance ensuite à Hollywood en devenant l\'un des personnage central de la série télévisée Pan Am, annulée après son unique saison. Néanmoins, elle se fait connaître à l\'international deux ans plus tard, à l\'âge de 23 ans, grâce au film à succès de Martin Scorsese, Le Loup de Wall Street2 dans lequel elle tient un second rôle.\r\n\r\nPar la suite, elle obtient des rôles dans des films à plus gros budgets comme Diversion où elle donne la réplique à Will Smith ou Tarzan de David Yates. En 2016, elle devient l\'interprète du célèbre personnage de comics Harley Quinn, l’assistante et petite-amie du Joker, rôle qu\'elle interprète pour la première fois dans le film Suicide Squad en 20163,4.\r\n\r\nEn 2014, elle lance avec plusieurs collaborateurs LuckyChap Entertainment, son entreprise de production avec laquelle elle produit notamment le film Moi, Tonya, réalisé par l\'Australien Craig Gillespie, qui lui permet d\'être nommée en 2018, à l\'âge de 27 ans, aux Golden Globes, aux BAFA et aux Oscars5.\r\n\r\nPar la suite, elle est acclamée pour ses rôles dans Marie Stuart, Reine d\'Écosse, dans Once Upon a Time in Hollywood de Quentin Tarantino ou encore dans le drame Scandale, qui lui permettent d\'être nommées une nouvelle fois aux BAFA ainsi qu´aux Oscars pour le dernier. ', 1),
(11, 'https://fr.web.img2.acsta.net/pictures/18/09/12/12/03/5412955.jpg\r\n', 'Jonah', 'Hill', '1983-12-20', 'Jonah Hill Feldstein, plus connu sous le nom de Jonah Hill, est un acteur, producteur, réalisateur et scénariste américain, né le 20 décembre 1983 à Los Angeles.\r\n\r\nAyant commencé sa carrière d\'acteur grâce à Dustin Hoffman, dont les enfants sont ses amis, ce n\'est qu\'en devenant un des collaborateurs fidèles de Judd Apatow qu\'il se fait connaître du public, notamment dans En cloque, mode d\'emploi, SuperGrave, Sans Sarah rien ne va, Funny People et American Trip. ', 3);

-- --------------------------------------------------------

--
-- Structure de la table `artists_movies`
--

DROP TABLE IF EXISTS `artists_movies`;
CREATE TABLE IF NOT EXISTS `artists_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_movie` int(10) NOT NULL,
  `id_artist` int(10) NOT NULL,
  `role` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artists_movies`
--

INSERT INTO `artists_movies` (`id`, `id_movie`, `id_artist`, `role`) VALUES
(1, 3, 10, 1),
(2, 3, 11, 1),
(3, 3, 5, 1),
(4, 1, 6, 1),
(5, 2, 6, 1),
(6, 1, 7, 1),
(7, 4, 8, 2),
(8, 4, 10, 1),
(9, 4, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(7) NOT NULL AUTO_INCREMENT,
  `id_user` int(7) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `note` int(2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`),
  KEY `users` (`id_user`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `title`, `content`, `note`, `date`) VALUES
(9, 39, 'test temporaire', 'test temporaire', 4, '2020-02-25 06:08:20'),
(8, 39, 'test temporaire', 'test temporaire', 4, '2020-02-25 06:06:59'),
(10, 42, 'test', 'test', NULL, '2020-02-25 10:11:42');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `expeditor` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `expeditor`, `pseudo`, `title`, `message`) VALUES
(4, 'admin', 'Admin', 'test', 'admin'),
(5, 'admin', 'Admin', 'test messagerie', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores sapiente error officia culpa quam. Praesentium, delectus, eveniet adipisci quia optio hic natus ab obcaecati placeat voluptatum ea? Sit, a perferendis.\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi quisquam perspiciatis vitae voluptate tenetur alias in magni itaque eos doloremque, consequuntur voluptatem accusamus suscipit et sit. Incidunt commodi eaque nemo!');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id_movie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `style` varchar(70) NOT NULL,
  `resume` text NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `time` time(2) NOT NULL,
  PRIMARY KEY (`id_movie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id_movie`, `picture`, `title`, `year`, `style`, `resume`, `trailer`, `time`) VALUES
(1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Oceanseleven-logo.svg/512px-Oceanseleven-logo.svg.png', 'Ocean\'s Eleven', 2001, 'Action', 'Ocean\'s Eleven ou L\'Inconnu de Las Vegas au Québec est un film américain réalisé par Steven Soderbergh, sorti en 2001. Il s\'agit d\'un remake de L\'Inconnu de Las Vegas (Ocean\'s Eleven) de Lewis Milestone sorti en 1960, dans lequel joue notamment Frank Sinatra. Le film est une distribution d\'ensemble avec George Clooney, Brad Pitt, Matt Damon, Bernie Mac, Don Cheadle, Andy Garcia, Julia Roberts, Elliott Gould et Carl Reiner.\r\n\r\nAcclamé par la critique et grand succès commercial, avec plus de 450 millions de dollars américains au box-office mondial, le film est le premier de la trilogie Ocean. Ses deux suites, Ocean\'s Twelve (2004) Ocean\'s Thirteen (2007), dans lesquelles les acteurs reprennent leurs rôles respectifs, sont également réalisées par Soderbergh. Un spin-off intitulé Ocean\'s Eight, réalisé par Gary Ross, sort en 2018. ', 'https://www.youtube.com/embed/imm6OR605UI', '01:57:00.00'),
(2, 'https://fr.web.img2.acsta.net/medias/nmedia/18/70/45/22/19123474.jpg', 'Inglourious Basterds', 2009, 'Action', 'Inglourious Basterds ou Le Commando des bâtards au Québec, est un film de guerre uchronique germano-américain écrit et réalisé par Quentin Tarantino, sorti en 2009.\r\n\r\nLe film est présenté en compétition officielle lors du Festival de Cannes 2009.\r\n\r\nL\'histoire se déroule en France durant la Seconde Guerre mondiale et narre la vengeance d\'une jeune Juive, Shosanna Dreyfus (Mélanie Laurent), dont la famille a été assassinée par les nazis ainsi que les plans d\'un commando de soldats juifs alliés menés par le lieutenant Aldo Raine (Brad Pitt), envoyés en Europe occupée pour éliminer le plus de nazis possible, qu\'ils s\'appliquent à scalper, avant de s\'attaquer avec succès à leurs dirigeants.\r\n\r\nTarantino a commencé à écrire le scénario du film plus de dix ans avant sa sortie mais, ayant des difficultés à le finaliser, a réalisé Kill Bill et Boulevard de la mort avant d\'achever ce projet de longue date. Le film a été tourné en France et en Allemagne à la fin de l\'année 2008. Le film a été un succès commercial et critique et a reçu de multiples récompenses, notamment pour l\'acteur Christoph Waltz, qui a été honoré de nombreux prix pour son interprétation de l\'officier SS Hans Landa.\r\n\r\nLe titre du film est un hommage au titre anglophone d’Une poignée de salopards (The Inglorious Bastards, 1978), un film de guerre italien réalisé par Enzo G. Castellari, qui s\'inspirait lui-même en partie des Douze salopards (1967). Le titre du film de Tarantino se distingue de l\'original par deux fautes d\'orthographe volontaires (Inglourious Basterds), lesquelles jouent également sur les accents, qui sont un élément de l\'œuvre. ', 'https://www.youtube.com/embed/BiPUoLI9eGM', '02:33:00.00'),
(3, 'https://fr.web.img6.acsta.net/pictures/210/604/21060483_20131125114549726.jpg', 'Le Loup de Wall Street', 2013, 'Dramatique', 'Sa licence de courtier en poche, et les narines déjà pleines de cocaïne, Jordan Belfort est prêt à conquérir Wall Street. Ce jour d\'octobre, un krach, le plus important depuis 1929, vient piétiner ses rêves de grandeur. C\'est finalement à Long Island qu\'il échoue et qu\'il monte sa propre affaire de courtage. Son créneau : le hors-cote. Sa méthode : l\'arnaque. Son équipe : des vendeurs ou des petits trafiquants.', 'https://www.youtube.com/embed/iszwuX1AK6A', '02:59:00.00'),
(4, 'https://www.grignoux.be/upload/grignoux/films/784/once_upon_a_time_affiche.jpg', 'Once Upon a Time… in Hollywood', 2019, 'Comédie', 'En 1969, la star de télévision Rick Dalton et le cascadeur Cliff Booth, sa doublure de longue date, poursuivent leurs carrières au sein d\'une industrie qu\'ils ne reconnaissent plus.', 'https://www.youtube.com/embed/ELeMaP8EPAA', '02:40:00.00'),
(5, 'https://fr.web.img6.acsta.net/medias/nmedia/18/70/64/92/19106209.jpg', 'Mission impossible 2', 2000, 'Action', 'Votre mission, monsieur Hunt, si vous décidez de l\'accepter, sera de récupérer un virus génétiquement modifié, baptisé Chimera. Sean Ambrose, qui fut votre élève avant de devenir votre ennemi juré, s\'est emparé de l\'antidote et se terre dans un laboratoire secret de Sydney. Son ex-maitresse, Nyah Hall, pourrait s\'avérer utile dans vos tentatives d\'infiltration de ce QG hautement protégé. Comme toujours, si vous ou l\'un de vos équipiers étiez capturés ou tués, le département d\'Etat nierait avoir eu connaissance de vos agissements. Ce résumé s\'autodétruira dans cinq secondes. ', 'https://www.youtube.com/embed/vIpqpRuGrq4', '02:06:00.00');

-- --------------------------------------------------------

--
-- Structure de la table `movie_comments`
--

DROP TABLE IF EXISTS `movie_comments`;
CREATE TABLE IF NOT EXISTS `movie_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movie` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie_comments`
--

INSERT INTO `movie_comments` (`id`, `id_movie`, `id_comment`) VALUES
(5, 1, 140),
(6, 1, 141),
(7, 1, 1),
(8, 1, 2),
(9, 1, 3),
(10, 1, 4),
(11, 1, 5),
(12, 1, 6),
(13, 1, 7),
(14, 1, 8),
(15, 1, 9),
(16, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(7) NOT NULL AUTO_INCREMENT,
  `admin` int(4) DEFAULT NULL,
  `pseudo` varchar(70) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(123) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `admin`, `pseudo`, `mdp`, `mail`, `avatar`) VALUES
(42, 1, 'Anthony', '$2y$10$07zjTfx8ZzRbbZxuykg2We8.IqXMtt96vxQ2p2apGs/hVZqyeOGny', 'Anthony@gmail.com', '5e54efe2edf5e8.30586616.jpg'),
(40, 1, 'admin', '$2y$10$x/jJGGrZpxBeg4zSLLoX1eYxavOY.T1foeuBfFFq9RtgIqk1swFRC', 'dmin@gmail.com', 'jatilogo.png'),
(41, NULL, 'user1', '$2y$10$qhO8/JdskX9OiOfWFuzoaO/UrZC.f20JfTB3h8FFIshdzQuJkEAjm', 'min@gmail.com', 'jatilogo.png');

-- --------------------------------------------------------

--
-- Structure de la table `users_comments`
--

DROP TABLE IF EXISTS `users_comments`;
CREATE TABLE IF NOT EXISTS `users_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_comments`
--

INSERT INTO `users_comments` (`id`, `id_user`, `id_comment`) VALUES
(184, 42, 10),
(183, 39, 9),
(182, 39, 8),
(181, 39, 7),
(180, 39, 6),
(179, 39, 5),
(178, 39, 4),
(177, 39, 3),
(176, 39, 2),
(175, 39, 1),
(174, 39, 141);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
