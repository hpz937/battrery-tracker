CREATE TABLE `batteries` (
  `id` int(11) unsigned NOT NULL,
  `brand` varchar(40) DEFAULT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `c_rating` int(11) DEFAULT 0,
  `capacity` int(11) DEFAULT 0,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
