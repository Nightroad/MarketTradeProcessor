-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: markettradeprocessor
-- ------------------------------------------------------
-- Server version	5.7.19-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `iso3166alpha2`
--

DROP TABLE IF EXISTS `iso3166alpha2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iso3166alpha2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(2) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iso3166alpha2`
--

LOCK TABLES `iso3166alpha2` WRITE;
/*!40000 ALTER TABLE `iso3166alpha2` DISABLE KEYS */;
INSERT INTO `iso3166alpha2` VALUES (1,'AD','Andorra'),(2,'AE','United Arab Emirates'),(3,'AF','Afghanistan'),(4,'AG','Antigua and Barbuda'),(5,'AI','Anguilla'),(6,'AL','Albania'),(7,'AM','Armenia'),(8,'AO','Angola'),(9,'AQ','Antarctica'),(10,'AR','Argentina'),(11,'AS','American Samoa'),(12,'AT','Austria'),(13,'AU','Australia'),(14,'AW','Aruba'),(15,'AX','Åland Islands'),(16,'AZ','Azerbaijan'),(17,'BA','Bosnia and Herzegovina'),(18,'BB','Barbados'),(19,'BD','Bangladesh'),(20,'BE','Belgium'),(21,'BF','Burkina Faso'),(22,'BG','Bulgaria'),(23,'BH','Bahrain'),(24,'BI','Burundi'),(25,'BJ','Benin'),(26,'BL','Saint Barthélemy'),(27,'BM','Bermuda'),(28,'BN','Brunei Darussalam'),(29,'BO','Bolivia, Plurinational State of'),(30,'BQ','Bonaire, Sint Eustatius and Saba'),(31,'BR','Brazil'),(32,'BS','Bahamas'),(33,'BT','Bhutan'),(34,'BV','Bouvet Island'),(35,'BW','Botswana'),(36,'BY','Belarus'),(37,'BZ','Belize'),(38,'CA','Canada'),(39,'CC','Cocos (Keeling) Islands'),(40,'CD','Congo, the Democratic Republic of the'),(41,'CF','Central African Republic'),(42,'CG','Congo'),(43,'CH','Switzerland'),(44,'CI','Côte d\'Ivoire'),(45,'CK','Cook Islands'),(46,'CL','Chile'),(47,'CM','Cameroon'),(48,'CN','China'),(49,'CO','Colombia'),(50,'CR','Costa Rica'),(51,'CU','Cuba'),(52,'CV','Cabo Verde'),(53,'CW','Curaçao'),(54,'CX','Christmas Island'),(55,'CY','Cyprus'),(56,'CZ','Czechia'),(57,'DE','Germany'),(58,'DJ','Djibouti'),(59,'DK','Denmark'),(60,'DM','Dominica'),(61,'DO','Dominican Republic'),(62,'DZ','Algeria'),(63,'EC','Ecuador'),(64,'EE','Estonia'),(65,'EG','Egypt'),(66,'EH','Western Sahara'),(67,'ER','Eritrea'),(68,'ES','Spain'),(69,'ET','Ethiopia'),(70,'FI','Finland'),(71,'FJ','Fiji'),(72,'FK','Falkland Islands (Malvinas)'),(73,'FM','Micronesia, Federated States of'),(74,'FO','Faroe Islands'),(75,'FR','France'),(76,'GA','Gabon'),(77,'GB','United Kingdom of Great Britain and Northern Ireland'),(78,'GD','Grenada'),(79,'GE','Georgia'),(80,'GF','French Guiana'),(81,'GG','Guernsey'),(82,'GH','Ghana'),(83,'GI','Gibraltar'),(84,'GL','Greenland'),(85,'GM','Gambia'),(86,'GN','Guinea'),(87,'GP','Guadeloupe'),(88,'GQ','Equatorial Guinea'),(89,'GR','Greece'),(90,'GS','South Georgia and the South Sandwich Islands'),(91,'GT','Guatemala'),(92,'GU','Guam'),(93,'GW','Guinea-Bissau'),(94,'GY','Guyana'),(95,'HK','Hong Kong'),(96,'HM','Heard Island and McDonald Islands'),(97,'HN','Honduras'),(98,'HR','Croatia'),(99,'HT','Haiti'),(100,'HU','Hungary'),(101,'ID','Indonesia'),(102,'IE','Ireland'),(103,'IL','Israel'),(104,'IM','Isle of Man'),(105,'IN','India'),(106,'IO','British Indian Ocean Territory'),(107,'IQ','Iraq'),(108,'IR','Iran, Islamic Republic of'),(109,'IS','Iceland'),(110,'IT','Italy'),(111,'JE','Jersey'),(112,'JM','Jamaica'),(113,'JO','Jordan'),(114,'JP','Japan'),(115,'KE','Kenya'),(116,'KG','Kyrgyzstan'),(117,'KH','Cambodia'),(118,'KI','Kiribati'),(119,'KM','Comoros'),(120,'KN','Saint Kitts and Nevis'),(121,'KP','Korea, Democratic People\'s Republic of'),(122,'KR','Korea, Republic of'),(123,'KW','Kuwait'),(124,'KY','Cayman Islands'),(125,'KZ','Kazakhstan'),(126,'LA','Lao People\'s Democratic Republic'),(127,'LB','Lebanon'),(128,'LC','Saint Lucia'),(129,'LI','Liechtenstein'),(130,'LK','Sri Lanka'),(131,'LR','Liberia'),(132,'LS','Lesotho'),(133,'LT','Lithuania'),(134,'LU','Luxembourg'),(135,'LV','Latvia'),(136,'LY','Libya'),(137,'MA','Morocco'),(138,'MC','Monaco'),(139,'MD','Moldova, Republic of'),(140,'ME','Montenegro'),(141,'MF','Saint Martin (French part)'),(142,'MG','Madagascar'),(143,'MH','Marshall Islands'),(144,'MK','Macedonia, the former Yugoslav Republic of'),(145,'ML','Mali'),(146,'MM','Myanmar'),(147,'MN','Mongolia'),(148,'MO','Macao'),(149,'MP','Northern Mariana Islands'),(150,'MQ','Martinique'),(151,'MR','Mauritania'),(152,'MS','Montserrat'),(153,'MT','Malta'),(154,'MU','Mauritius'),(155,'MV','Maldives'),(156,'MW','Malawi'),(157,'MX','Mexico'),(158,'MY','Malaysia'),(159,'MZ','Mozambique'),(160,'NA','Namibia'),(161,'NC','New Caledonia'),(162,'NE','Niger'),(163,'NF','Norfolk Island'),(164,'NG','Nigeria'),(165,'NI','Nicaragua'),(166,'NL','Netherlands'),(167,'NO','Norway'),(168,'NP','Nepal'),(169,'NR','Nauru'),(170,'NU','Niue'),(171,'NZ','New Zealand'),(172,'OM','Oman'),(173,'PA','Panama'),(174,'PE','Peru'),(175,'PF','French Polynesia'),(176,'PG','Papua New Guinea'),(177,'PH','Philippines'),(178,'PK','Pakistan'),(179,'PL','Poland'),(180,'PM','Saint Pierre and Miquelon'),(181,'PN','Pitcairn'),(182,'PR','Puerto Rico'),(183,'PS','Palestine, State of'),(184,'PT','Portugal'),(185,'PW','Palau'),(186,'PY','Paraguay'),(187,'QA','Qatar'),(188,'RE','Réunion'),(189,'RO','Romania'),(190,'RS','Serbia'),(191,'RU','Russian Federation'),(192,'RW','Rwanda'),(193,'SA','Saudi Arabia'),(194,'SB','Solomon Islands'),(195,'SC','Seychelles'),(196,'SD','Sudan'),(197,'SE','Sweden'),(198,'SG','Singapore'),(199,'SH','Saint Helena, Ascension and Tristan da Cunha'),(200,'SI','Slovenia'),(201,'SJ','Svalbard and Jan Mayen'),(202,'SK','Slovakia'),(203,'SL','Sierra Leone'),(204,'SM','San Marino'),(205,'SN','Senegal'),(206,'SO','Somalia'),(207,'SR','Suriname'),(208,'SS','South Sudan'),(209,'ST','Sao Tome and Principe'),(210,'SV','El Salvador'),(211,'SX','Sint Maarten (Dutch part)'),(212,'SY','Syrian Arab Republic'),(213,'SZ','Swaziland'),(214,'TC','Turks and Caicos Islands'),(215,'TD','Chad'),(216,'TF','French Southern Territories'),(217,'TG','Togo'),(218,'TH','Thailand'),(219,'TJ','Tajikistan'),(220,'TK','Tokelau'),(221,'TL','Timor-Leste'),(222,'TM','Turkmenistan'),(223,'TN','Tunisia'),(224,'TO','Tonga'),(225,'TR','Turkey'),(226,'TT','Trinidad and Tobago'),(227,'TV','Tuvalu'),(228,'TW','Taiwan, Province of China'),(229,'TZ','Tanzania, United Republic of'),(230,'UA','Ukraine'),(231,'UG','Uganda'),(232,'UM','United States Minor Outlying Islands'),(233,'US','United States of America'),(234,'UY','Uruguay'),(235,'UZ','Uzbekistan'),(236,'VA','Holy See'),(237,'VC','Saint Vincent and the Grenadines'),(238,'VE','Venezuela, Bolivarian Republic of'),(239,'VG','Virgin Islands, British'),(240,'VI','Virgin Islands, U.S.'),(241,'VN','Viet Nam'),(242,'VU','Vanuatu'),(243,'WF','Wallis and Futuna'),(244,'WS','Samoa'),(245,'YE','Yemen'),(246,'YT','Mayotte'),(247,'ZA','South Africa'),(248,'ZM','Zambia'),(249,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `iso3166alpha2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iso4217`
--

DROP TABLE IF EXISTS `iso4217`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iso4217` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(6) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iso4217`
--

LOCK TABLES `iso4217` WRITE;
/*!40000 ALTER TABLE `iso4217` DISABLE KEYS */;
INSERT INTO `iso4217` VALUES (2,'AED','United Arab Emirates Dirham'),(3,'AFN','Afghanistan Afghani'),(4,'ALL','Albania Lek'),(5,'AMD','Armenia Dram'),(6,'ANG','Netherlands Antilles Guilder'),(7,'AOA','Angola Kwanza'),(8,'ARS','Argentina Peso'),(9,'AUD','Australia Dollar'),(10,'AWG','Aruba Guilder'),(11,'AZN','Azerbaijan Manat'),(12,'BAM','Bosnia and Herzegovina Convertible Marka'),(13,'BBD','Barbados Dollar'),(14,'BDT','Bangladesh Taka'),(15,'BGN','Bulgaria Lev'),(16,'BHD','Bahrain Dinar'),(17,'BIF','Burundi Franc'),(18,'BMD','Bermuda Dollar'),(19,'BND','Brunei Darussalam Dollar'),(20,'BOB','Bolivia Bolíviano'),(21,'BRL','Brazil Real'),(22,'BSD','Bahamas Dollar'),(23,'BTN','Bhutan Ngultrum'),(24,'BWP','Botswana Pula'),(25,'BYN','Belarus Ruble'),(26,'BZD','Belize Dollar'),(27,'CAD','Canada Dollar'),(28,'CDF','Congo/Kinshasa Franc'),(29,'CHF','Switzerland Franc'),(30,'CLP','Chile Peso'),(31,'CNY','China Yuan Renminbi'),(32,'COP','Colombia Peso'),(33,'CRC','Costa Rica Colon'),(34,'CUC','Cuba Convertible Peso'),(35,'CUP','Cuba Peso'),(36,'CVE','Cape Verde Escudo'),(37,'CZK','Czech Republic Koruna'),(38,'DJF','Djibouti Franc'),(39,'DKK','Denmark Krone'),(40,'DOP','Dominican Republic Peso'),(41,'DZD','Algeria Dinar'),(42,'EGP','Egypt Pound'),(43,'ERN','Eritrea Nakfa'),(44,'ETB','Ethiopia Birr'),(45,'EUR','Euro Member Countries'),(46,'FJD','Fiji Dollar'),(47,'FKP','Falkland Islands (Malvinas) Pound'),(48,'GBP','United Kingdom Pound'),(49,'GEL','Georgia Lari'),(50,'GGP','Guernsey Pound'),(51,'GHS','Ghana Cedi'),(52,'GIP','Gibraltar Pound'),(53,'GMD','Gambia Dalasi'),(54,'GNF','Guinea Franc'),(55,'GTQ','Guatemala Quetzal'),(56,'GYD','Guyana Dollar'),(57,'HKD','Hong Kong Dollar'),(58,'HNL','Honduras Lempira'),(59,'HRK','Croatia Kuna'),(60,'HTG','Haiti Gourde'),(61,'HUF','Hungary Forint'),(62,'IDR','Indonesia Rupiah'),(63,'ILS','Israel Shekel'),(64,'IMP','Isle of Man Pound'),(65,'INR','India Rupee'),(66,'IQD','Iraq Dinar'),(67,'IRR','Iran Rial'),(68,'ISK','Iceland Krona'),(69,'JEP','Jersey Pound'),(70,'JMD','Jamaica Dollar'),(71,'JOD','Jordan Dinar'),(72,'JPY','Japan Yen'),(73,'KES','Kenya Shilling'),(74,'KGS','Kyrgyzstan Som'),(75,'KHR','Cambodia Riel'),(76,'KMF','Comorian Franc'),(77,'KPW','Korea (North) Won'),(78,'KRW','Korea (South) Won'),(79,'KWD','Kuwait Dinar'),(80,'KYD','Cayman Islands Dollar'),(81,'KZT','Kazakhstan Tenge'),(82,'LAK','Laos Kip'),(83,'LBP','Lebanon Pound'),(84,'LKR','Sri Lanka Rupee'),(85,'LRD','Liberia Dollar'),(86,'LSL','Lesotho Loti'),(87,'LYD','Libya Dinar'),(88,'MAD','Morocco Dirham'),(89,'MDL','Moldova Leu'),(90,'MGA','Madagascar Ariary'),(91,'MKD','Macedonia Denar'),(92,'MMK','Myanmar (Burma) Kyat'),(93,'MNT','Mongolia Tughrik'),(94,'MOP','Macau Pataca'),(95,'MRO','Mauritania Ouguiya'),(96,'MUR','Mauritius Rupee'),(97,'MVR','Maldives (Maldive Islands) Rufiyaa'),(98,'MWK','Malawi Kwacha'),(99,'MXN','Mexico Peso'),(100,'MYR','Malaysia Ringgit'),(101,'MZN','Mozambique Metical'),(102,'NAD','Namibia Dollar'),(103,'NGN','Nigeria Naira'),(104,'NIO','Nicaragua Cordoba'),(105,'NOK','Norway Krone'),(106,'NPR','Nepal Rupee'),(107,'NZD','New Zealand Dollar'),(108,'OMR','Oman Rial'),(109,'PAB','Panama Balboa'),(110,'PEN','Peru Sol'),(111,'PGK','Papua New Guinea Kina'),(112,'PHP','Philippines Peso'),(113,'PKR','Pakistan Rupee'),(114,'PLN','Poland Zloty'),(115,'PYG','Paraguay Guarani'),(116,'QAR','Qatar Riyal'),(117,'RON','Romania Leu'),(118,'RSD','Serbia Dinar'),(119,'RUB','Russia Ruble'),(120,'RWF','Rwanda Franc'),(121,'SAR','Saudi Arabia Riyal'),(122,'SBD','Solomon Islands Dollar'),(123,'SCR','Seychelles Rupee'),(124,'SDG','Sudan Pound'),(125,'SEK','Sweden Krona'),(126,'SGD','Singapore Dollar'),(127,'SHP','Saint Helena Pound'),(128,'SLL','Sierra Leone Leone'),(129,'SOS','Somalia Shilling'),(130,'SPL','Seborga Luigino'),(131,'SRD','Suriname Dollar'),(132,'STD','São Tomé and Príncipe Dobra'),(133,'SVC','El Salvador Colon'),(134,'SYP','Syria Pound'),(135,'SZL','Swaziland Lilangeni'),(136,'THB','Thailand Baht'),(137,'TJS','Tajikistan Somoni'),(138,'TMT','Turkmenistan Manat'),(139,'TND','Tunisia Dinar'),(140,'TOP','Tonga Pa\'anga'),(141,'TRY','Turkey Lira'),(142,'TTD','Trinidad and Tobago Dollar'),(143,'TVD','Tuvalu Dollar'),(144,'TWD','Taiwan New Dollar'),(145,'TZS','Tanzania Shilling'),(146,'UAH','Ukraine Hryvnia'),(147,'UGX','Uganda Shilling'),(148,'USD','United States Dollar'),(149,'UYU','Uruguay Peso'),(150,'UZS','Uzbekistan Som'),(151,'VEF','Venezuela Bolívar'),(152,'VND','Viet Nam Dong'),(153,'VUV','Vanuatu Vatu'),(154,'WST','Samoa Tala'),(155,'XAF','Communauté Financière Africaine (BEAC) CFA Franc BEAC'),(156,'XCD','East Caribbean Dollar'),(157,'XDR','International Monetary Fund (IMF) Special Drawing Rights'),(158,'XOF','Communauté Financière Africaine (BCEAO) Franc'),(159,'XPF','Comptoirs Français du Pacifique (CFP) Franc'),(160,'YER','Yemen Rial'),(161,'ZAR','South Africa Rand'),(162,'ZMW','Zambia Kwacha'),(163,'ZWD','Zimbabwe Dollar');
/*!40000 ALTER TABLE `iso4217` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trades`
--

DROP TABLE IF EXISTS `trades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned DEFAULT NULL,
  `currencyFrom` int(10) unsigned NOT NULL,
  `currencyTo` int(10) unsigned NOT NULL,
  `amountSell` decimal(10,2) DEFAULT NULL,
  `amountBuy` decimal(10,2) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `timePlaced` datetime DEFAULT NULL,
  `originatingCountry` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_currencyFrom` (`currencyFrom`),
  KEY `FK_currencyTo` (`currencyTo`),
  KEY `FK_originatingCountry` (`originatingCountry`),
  CONSTRAINT `FK_currencyFrom` FOREIGN KEY (`currencyFrom`) REFERENCES `iso4217` (`id`),
  CONSTRAINT `FK_currencyTo` FOREIGN KEY (`currencyTo`) REFERENCES `iso4217` (`id`),
  CONSTRAINT `FK_originatingCountry` FOREIGN KEY (`originatingCountry`) REFERENCES `iso3166alpha2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trades`
--

LOCK TABLES `trades` WRITE;
/*!40000 ALTER TABLE `trades` DISABLE KEYS */;
INSERT INTO `trades` VALUES (1,592942,57,57,909.20,1367.53,0.66485,'2017-08-06 20:02:06',77),(2,486060,114,29,1599.97,659.18,2.42721,'2017-08-06 20:02:06',179),(3,354890,148,114,1139.07,1467.05,0.77644,'2017-08-06 20:02:06',77),(4,158435,148,148,284.86,510.86,0.55761,'2017-08-06 20:02:06',233),(5,862017,29,148,725.59,29.11,24.9258,'2017-08-06 20:02:06',179),(6,666892,57,119,1667.92,279.87,5.95962,'2017-08-06 20:02:06',59),(7,473394,114,29,761.44,1653.77,0.46043,'2017-08-06 20:02:06',59),(8,485128,45,45,995.91,1520.46,0.65501,'2017-08-06 20:02:06',77),(9,227842,45,119,856.82,1713.76,0.49996,'2017-08-06 20:02:06',179),(10,369306,57,57,1129.72,513.61,2.19957,'2017-08-06 20:02:06',57),(11,926246,29,45,1359.18,885.52,1.53489,'2017-08-06 20:02:06',233),(12,508934,48,114,241.61,504.38,0.47902,'2017-08-06 20:02:06',77),(13,336848,45,148,902.31,959.80,0.9401,'2017-08-06 20:02:06',233),(14,644374,48,45,1099.19,1693.56,0.64904,'2017-08-06 20:02:06',233),(15,453024,29,29,732.09,1325.83,0.55217,'2017-08-06 20:02:06',179),(16,2687,119,29,1637.63,284.24,5.76143,'2017-08-06 20:02:06',22),(17,709734,45,114,635.30,571.91,1.11084,'2017-08-06 20:02:06',77),(18,66300,114,48,1001.57,126.17,7.93826,'2017-08-06 20:02:06',57),(19,899806,29,119,539.20,1292.08,0.41731,'2017-08-06 20:02:06',89),(20,962059,29,48,1422.69,864.73,1.64524,'2017-08-06 20:02:06',38),(21,569339,45,29,1722.35,1671.22,1.03059,'2017-08-06 20:02:06',233),(22,578065,29,148,1685.12,1512.79,1.11392,'2017-08-06 20:02:06',22),(23,402258,48,148,329.96,238.28,1.38476,'2017-08-06 20:02:06',68),(24,64106,48,45,757.03,1735.45,0.43622,'2017-08-06 20:02:06',59),(25,743801,148,29,172.26,689.91,0.24968,'2017-08-06 20:02:06',179),(26,503312,119,29,646.57,135.59,4.76857,'2017-08-06 20:02:06',89),(27,207016,114,29,637.72,234.22,2.72274,'2017-08-06 20:02:06',57),(28,452164,114,45,71.82,601.60,0.11938,'2017-08-06 20:02:06',68),(29,343642,114,45,391.88,882.52,0.44405,'2017-08-06 20:02:06',68),(30,852077,119,48,1375.30,957.48,1.43637,'2017-08-06 20:02:06',57),(31,433637,148,45,714.04,101.69,7.02173,'2017-08-06 20:02:06',57),(32,876861,119,29,747.71,281.50,2.65616,'2017-08-06 20:02:06',89),(33,679190,45,48,307.40,1563.64,0.19659,'2017-08-06 20:02:06',59),(34,251258,148,45,1772.33,1024.06,1.73069,'2017-08-06 20:02:06',57),(35,984452,148,148,1405.03,1265.30,1.11043,'2017-08-06 20:02:06',59),(36,819291,148,29,962.63,300.83,3.19991,'2017-08-06 20:02:06',179),(37,296315,148,29,559.31,850.51,0.65762,'2017-08-06 20:02:06',57),(38,35438,45,114,791.27,1646.32,0.48063,'2017-08-06 20:02:06',68),(39,356580,57,29,1513.12,1430.27,1.05793,'2017-08-06 20:02:06',179),(40,988747,45,45,1520.15,1745.48,0.87091,'2017-08-06 20:02:06',179),(41,273698,114,29,378.03,674.33,0.5606,'2017-08-06 20:02:06',68),(42,665533,57,29,858.09,1303.40,0.65835,'2017-08-06 20:02:06',77),(43,540755,29,29,318.75,154.25,2.06645,'2017-08-06 20:02:06',89),(44,76579,29,48,1602.67,572.74,2.79825,'2017-08-06 20:02:06',57),(45,752507,29,119,1499.79,1551.21,0.96685,'2017-08-06 20:02:06',179),(46,111251,114,119,696.67,212.87,3.27275,'2017-08-06 20:02:06',57),(47,468024,114,57,107.31,1516.66,0.07075,'2017-08-06 20:02:07',179),(48,9714,48,148,1745.56,258.27,6.75866,'2017-08-06 20:02:07',77),(49,250700,57,119,189.91,527.92,0.35973,'2017-08-06 20:02:07',77),(50,788801,148,45,512.70,489.90,1.04654,'2017-08-06 20:02:07',179),(51,179851,48,119,468.26,1793.37,0.26111,'2017-08-06 20:02:07',179),(52,55041,48,148,241.54,1630.70,0.14812,'2017-08-06 20:02:07',233),(53,378339,29,114,76.12,33.63,2.26346,'2017-08-06 20:02:07',22),(54,736680,48,119,1727.98,480.26,3.59801,'2017-08-06 20:02:07',89),(55,443431,148,29,1753.47,1614.09,1.08635,'2017-08-06 20:02:07',68),(56,290574,57,119,1599.68,479.13,3.33872,'2017-08-06 20:02:07',59),(57,179295,48,57,1029.67,1006.73,1.02279,'2017-08-06 20:02:07',179),(58,201790,119,148,480.70,1496.82,0.32115,'2017-08-06 20:02:07',59),(59,956724,29,48,1554.72,1654.42,0.93974,'2017-08-06 20:02:07',233),(60,970887,114,114,1794.62,962.93,1.86371,'2017-08-06 20:02:07',89),(61,176545,29,114,972.69,1078.83,0.90162,'2017-08-06 20:02:07',233),(62,198593,119,45,144.84,711.98,0.20343,'2017-08-06 20:02:07',179),(63,654777,119,57,982.39,1360.22,0.72223,'2017-08-06 20:02:07',89),(64,497903,114,48,1322.43,1735.54,0.76197,'2017-08-06 20:02:07',233),(65,221948,29,114,6.77,1179.53,0.00574,'2017-08-06 20:02:07',179),(66,659042,29,29,725.22,910.78,0.79626,'2017-08-06 20:02:07',59),(67,276462,114,29,1799.56,1430.59,1.25791,'2017-08-06 20:02:07',68),(68,563175,57,119,1652.14,1055.71,1.56496,'2017-08-06 20:02:07',57),(69,175992,148,45,1076.09,1433.81,0.75051,'2017-08-06 20:02:07',233),(70,357056,119,148,1000.87,1528.15,0.65496,'2017-08-06 20:02:07',77),(71,432441,114,29,725.49,193.64,3.74659,'2017-08-06 20:02:07',233),(72,340171,45,148,1172.01,217.93,5.37792,'2017-08-06 20:02:07',22),(73,743376,148,45,558.83,557.46,1.00246,'2017-08-06 20:02:07',22),(74,755759,114,119,899.14,648.36,1.38679,'2017-08-06 20:02:07',22),(75,239957,45,119,1238.16,1475.55,0.83912,'2017-08-06 20:02:07',22),(76,168235,119,148,241.18,1539.94,0.15662,'2017-08-06 20:02:07',22),(77,265331,57,114,853.80,339.57,2.51436,'2017-08-06 20:02:07',22),(78,53284,57,45,452.57,1103.13,0.41026,'2017-08-06 20:02:07',57),(79,674652,148,48,62.99,1640.18,0.0384,'2017-08-06 20:02:07',38),(80,338588,48,45,1468.19,1217.21,1.20619,'2017-08-06 20:02:07',68),(81,729190,114,148,976.67,113.43,8.61033,'2017-08-06 20:02:07',179),(82,415511,114,119,1346.14,319.57,4.21235,'2017-08-06 20:02:07',38),(83,493786,114,48,1283.28,127.81,10.04053,'2017-08-06 20:02:07',22),(84,463403,45,114,611.68,1024.43,0.59709,'2017-08-06 20:02:07',89),(85,958573,48,57,1635.55,25.87,63.22188,'2017-08-06 20:02:07',57),(86,29106,29,148,36.58,207.58,0.17622,'2017-08-06 20:02:07',89),(87,170565,45,45,1731.22,1748.88,0.9899,'2017-08-06 20:02:07',57),(88,12965,57,148,202.13,1515.10,0.13341,'2017-08-06 20:02:07',68),(89,523290,57,48,605.77,742.89,0.81542,'2017-08-06 20:02:07',179),(90,597578,119,29,201.80,1572.30,0.12835,'2017-08-06 20:02:07',38),(91,52226,48,119,1257.46,1345.85,0.93432,'2017-08-06 20:02:07',59),(92,573619,57,114,1416.90,932.35,1.51971,'2017-08-06 20:02:07',68),(93,284853,148,45,585.15,1760.65,0.33235,'2017-08-06 20:02:07',233),(94,859703,119,119,365.93,585.89,0.62457,'2017-08-06 20:02:07',68),(95,124223,45,48,915.97,1311.67,0.69832,'2017-08-06 20:02:07',233),(96,609041,119,48,1590.54,1066.36,1.49156,'2017-08-06 20:02:07',89),(97,833784,45,114,562.08,1136.91,0.49439,'2017-08-06 20:02:07',77),(98,387021,57,48,309.63,497.67,0.62216,'2017-08-06 20:02:07',22),(99,301513,148,148,433.14,561.18,0.77184,'2017-08-06 20:02:07',77),(100,658405,148,114,633.77,996.06,0.63628,'2017-08-06 20:02:07',89);
/*!40000 ALTER TABLE `trades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-06 23:03:26
