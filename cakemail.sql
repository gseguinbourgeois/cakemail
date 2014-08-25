DROP TABLE IF EXISTS `todoitems`;
CREATE TABLE `todoitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  `listId` int(11) NOT NULL,
  `done` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_item_list_idx` (`listId`),
  CONSTRAINT `FK_item_list` FOREIGN KEY (`listId`) REFERENCES `todolists` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `todolists`;
CREATE TABLE `todolists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
