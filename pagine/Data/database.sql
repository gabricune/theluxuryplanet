-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database luxury
CREATE DATABASE IF NOT EXISTS `luxury` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `luxury`;

-- Dump della struttura di tabella luxury.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `idprodotto` int(11) DEFAULT NULL,
  `quantita` int(11) DEFAULT NULL,
  `idutente` varchar(50) DEFAULT NULL,
  `prezzo` int(11) DEFAULT NULL,
  KEY `FK_cart_prodotti` (`idprodotto`),
  KEY `FK_cart_users` (`idutente`),
  CONSTRAINT `FK_cart_prodotti` FOREIGN KEY (`idprodotto`) REFERENCES `prodotti` (`Codprodotto`) ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_users` FOREIGN KEY (`idutente`) REFERENCES `users` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Carrello';

-- Dump dei dati della tabella luxury.cart: ~1 rows (circa)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`idprodotto`, `quantita`, `idutente`, `prezzo`) VALUES
	(9, 15, 'Filo', 1000);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dump della struttura di tabella luxury.events
CREATE TABLE IF NOT EXISTS `events` (
  `codevento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `immagine` varchar(50) DEFAULT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`codevento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='eventi';

-- Dump dei dati della tabella luxury.events: ~4 rows (circa)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`codevento`, `nome`, `data`, `location`, `prezzo`, `immagine`, `descrizione`) VALUES
	(1, 'Helitour', '2022-04-30', 'Partenza da Burago (MB)', 820, '../immagini/helitour.jpg', 'Sorvola una delle più belle regioni d\'Italia, famosa per i suoi laghi e per i suoi meravigliosi giardini.\nGoditi da un punto di vista esclusivo gli affascinanti panorami del Lago di Como, Maggiore, d\'Orta e delle splendide Isole Borromee.\nIl cuore di questa esperienza sarà l\'atterraggio per un aperitivo unico, da dove a 1.500 metri di altezza, i tuoi occhi spazieranno a 360 gradi dalle Alpi Marittime al Monte Rosa, passando per la Pianura Padana e su sei laghi.\nUn\'esperienza indimenticabile per festeggiare un compleanno, un anniversario, o rendere indelebile un momento importante.'),
	(2, 'Sailing', '2022-04-30', 'Partenza da Mari Cefalonia', 6200, '../immagini/sailing.jpg', 'Il motto della vacanza sarà, buona compagnia, divertimento, relax e avventura, ci accompagneranno tutta la settimana. La barca è un Beneteau 50, costruita appositamente per offrire il massimo della comodità a bordo, con 4 cabine matrimoniali, tutte le cabine offrono un bagno privato, 1 cabina dello skipper separata a prua. Sul ponte troverete un comodissimo prendisole di 12mq.\n\nLo skipper ha dedicato la sua vita al mare tra migliaia di miglia con equipaggi improvvisati e regate oceaniche, con alle spalle Caraibi e Seychelles nel periodo invernale. Tender con motore e il sup. Noi ci incontreremo al Marina di Sami Cefalonia.'),
	(3, 'Wine Taste Experience', '2022-04-30', 'Franciacorta', 356, '../immagini/IMG-4145.jpg', 'Proponiamo un\'esperienza enogastronomica all\'aperto:\nAccoglienza in Cantina per Visita guidata di 30-40 minuti, Degustazione di 1 calice di Franciacorta in Cantina con salame ed a seguire Pic-Nic in vigneto con antipasto, primo/secondo, dolce, 500ml acqua, una bottiglia di Franciacorta ogni 2 persone. (pietanze preparate da un ristoratore, comunicare eventuali allergie/intolleranze al momento della prenotazione).\nIn caso di maltempo è possibile consumare il light-lunch nella sala degustazione.'),
	(4, 'Ferrari Driving Experience', '2022-04-30', 'Maranello', 490, '../immagini/IMG-4136.jpg', 'I GT Tour ti condurranno in una serie di deliziose sorprese e avventure memorabili lungo alcune delle strade più belle d’Europa, permettendoti di vivere momenti esaltanti nei luoghi più incantevoli ed esclusivi. I GT Tour comprendono cinque destinazioni iconiche, scelte con cura per offrire ai proprietari di Ferrari la combinazione ottimale di lusso e piacere di guida.');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dump della struttura di tabella luxury.prodotti
CREATE TABLE IF NOT EXISTS `prodotti` (
  `codprodotto` int(32) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `immagine` varchar(150) DEFAULT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `tipologia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codprodotto`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Prodotti in vendita';

-- Dump dei dati della tabella luxury.prodotti: ~16 rows (circa)
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` (`codprodotto`, `nome`, `prezzo`, `immagine`, `descrizione`, `tipologia`) VALUES
	(0, 'Prada Guanti Linea Rossa', 350, '../immagini/IMG-4141.jpg', 'Firmati dal logo Prada Linea Rossa, questi guanti in tessuto sono realizzati con una lavorazione a maglia tridimensionale senza cuciture che li rende leggeri, flessibili e altamente traspiranti. La speciale tecnologia STORMBLOXX™ garantisce la massima copertura antivento.', 'sport'),
	(1, 'Philippe Patek Aquanaut', 43030, '../immagini/Aquanaut.jpg', 'Per festeggiare i 20 anni della collezione Aquanaut, lanciata nel 1997, Patek Philippe propone un modello maschile in un’inedita dimensione « Jumbo » di 42,2 mm di diametro, con quadrante stampato a rilievo delicatamente sfumato nero/blu notte. L’orologio, prettamente maschile, presenta una lunetta con finiture satinate e incarna uno stile contemporaneo, sportivo ed elegante. La cassa in oro bianco, impermeabile fino 120 m, ospita il calibro 324 S C a carica automatica.', 'jewelry'),
	(2, 'Prada Occhiali da sole', 210, '../immagini/IMG-4142.jpg', 'Belli, protettivi, sportivi, comodi e unici. Questi sono gli aggettivi di questi Prada Luna Rossa 0PS DG008F. Questo modello è perfetto sia per chi vuole un modello sportivo, sia per chi vuole un modello avvolgente.', 'sport'),
	(3, 'Philippe Patek Complicazioni', 50570, '../immagini/patekcomplicazioni.jpg', 'Il Calendario Annuale Ref. 5205, con finestrelle giorno/data/mese disposte a semicerchio, e stato presentato nel 2010 in due versioni in oro bianco. Nel 2022, Patek Philippe ripropone questo modello in un colore originale e contemporaneo. La cassa si distingue per la sua lunetta concava, i fianchi scavati e le anse traforate. Un’architettura raffinata interamente lucidata a mano dagli artigiani della Manifattura. Il quadrante verde oliva e caratterizzato da un motivo soleil e da una sfumatura di nero nella parte periferica. Le tre finestrelle giorno/data/mese poste nella parte superiore assicurano una perfetta leggibilita delle indicazioni del Calendario Annuale, con un riquadro in oro rosa a ore 12 che sottolinea l’informazione piu importante, la data.', 'jewelry'),
	(4, 'Philippe Patek Nautilus', 49490, '../immagini/pateknautilus.jpg', 'Il Nautilus Calendario Annuale e fasi lunari in acciaio esibisce un nuovo quadrante blu, il colore del modello originale Nautilus del 1976. Il rilievo orizzontale inciso, con un delicato effetto sfumato nero dal bordo, forma una decorazione raffinata e di grande carattere che si abbina perfettamente alla lucentezza del metallo.', 'jewelry'),
	(5, 'Philippe Patek Twenty-4', 45190, '../immagini/patektwenty4.jpg', 'Il Twenty~4 Automatic, realizzato per accompagnare con stile la vita delle donne moderne e attive, si declina in due nuove versioni di grande raffinatezza. La Ref. 7300/1200A-011 in acciaio si distingue per il suo elegante quadrante dall’inedita sfumatura verde oliva soleil. La Ref. 7300/1200R-011 in oro rosa prolunga l’armonia della cassa nel quadrante dorato con oro rosa soleil. Entrambi i modelli sono illuminati dalla doppia fila di diamanti incastonati secondo l’originale tecnica a Dentelle.', 'jewelry'),
	(6, 'Cartier Anello Trinity', 1000, '../immagini/anellocartier.jpg', 'Anello dorato di Trinity by Cartier', 'jewelry'),
	(7, 'Cartier Collana Trinity', 1000, '../immagini/collanacartier.jpg', 'Collana dorata di Trinity by Cartier', 'jewelry'),
	(8, 'Cartier Bracciale Trinity', 1000, '../immagini/braccialecartier.jpg', 'Bracciale dorato di Trinity by Cartier', 'jewelry'),
	(9, 'Cartier Orecchini Trinity', 1000, '../immagini/orecchinicartier.jpg', 'Orecchini dorati di Trinity by Cartier', 'jewelry'),
	(10, 'Ferri in grafite Taylor Made', 2300, '../immagini/IMG-4140.jpg', 'Con il P790 Ti, TaylorMade ha creato il massimo in fatto di ferri player per distanza. Realizzati con una struttura cava superleggera per il corpo in titanio, con pesi in tungsteno visibili e tecnologia SpeedFoam™ per massimizzare le prestazioni e le sensazioni.', 'sport'),
	(11, 'Kask Swaroski frame', 885, '../immagini/IMG-4138.jpg', 'Kask SWAROVSKY FRAME riding helmet on Dogma Chrome Light.', 'sport'),
	(12, 'Giacca Prada Reflex', 1650, '../immagini/IMG-4137.jpg', 'Kask SWAROVSKY FRAME riding helmet on Dogma Chrome Light.', 'sport'),
	(13, 'Tileist Tour Soft Golf Ball', 43, '../immagini/IMG-4139.jpg', 'The Titleist Tour Soft golf ball is a new ball from one of the best golf ball makers around, and it delivers a great mix of distance and feel. Whether it will be as popular as its predecessors — the Titleist NXT Tour and the Tour S — remains to be seen, but it’s an interesting choice at a great price.', 'sport'),
	(14, '2Gs Dynamick Sella Piatta Nera', 4880, '../immagini/IMG-4143.jpg', 'Arcione di ultima generazione costruito in maniera modulare con fibre composite CARBON-KEVLAR, assicura un ottima inforcatura e un grandissimo contatto con la groppa del cavallo, massima libertà di movimento e leggerezza. La resistenza alle torsioni risulta impareggiabile. ', 'sport'),
	(15, 'GPSMap R', 630, '../immagini/IMG-4144.jpg', 'Il nuovo portatile dedicato al mondo marine con tecnologia inReach® integrata. Mantieni la rotta con il dispositivo portatile GPSMAP 86i. Offre tutte le funzioni per l\'outdoor e le comunicazioni globali della serie GPSMAP® 66 con l\'aggiunta di funzioni per la navigazione, inclusa la connettività wireless al sistema marino di bordo.', 'sport');
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;

-- Dump della struttura di tabella luxury.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `indirizzo` varchar(100) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Utenti del sito';

-- Dump dei dati della tabella luxury.users: ~4 rows (circa)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username`, `mail`, `pwd`, `indirizzo`, `nome`, `cognome`) VALUES
	('3d', 'f3@gmail3', '4f3', 'dw', '3f3', '34f'),
	('3d3', 'f3@gmail3', '34f3f', '34f3', '3f', 'f3'),
	('4h4g', 't45@4t', '45t4', '5t4', '4g', 't45'),
	('Filo', 'faoifneifni', 'Sus', 'via libertà 9', 'Filippo', 'De Vecchi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
