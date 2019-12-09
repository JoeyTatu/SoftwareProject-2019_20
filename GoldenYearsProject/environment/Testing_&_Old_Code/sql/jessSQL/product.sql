CREATE TABLE IF NOT EXISTS `products` ( 
  `id_product` int(11) NOT NULL AUTO_INCREMENT, 
  `name` varchar(100) NOT NULL, 
  `description` varchar(250) NOT NULL, 
  `price` decimal(6,2) NOT NULL, 
  PRIMARY KEY (`id_product`) 
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ; 
  
INSERT INTO `products` (`id_product`, `name`, `description`, `price`) VALUES
(1, 'Event 1', 'Calling all grandpa for bus tour', '15.00'), 
(2, 'Event 2', 'Sasal dancing with the profesional ', '20.00'), 
(3, 'Event 3', 'Home visit  medical check up', '35.00'), 
(4, 'Event 4', 'Bingi Bingi night', '15.00'), 
(5, 'Event 5', 'Christmas dinner for all seniors', '25.00'), 
(6, 'Event 6', 'Computer lesson for beginers', '35.00');