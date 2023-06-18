--
-- Table structure for table `costumer`
--

CREATE TABLE IF NOT EXISTS `costumer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_number` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `created_at` bigint(255) NOT NULL,
  `updated_at` bigint(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id`, `name`, `gender`, `mobile_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Agung Prasetyo', 0, '08976455342', 'gunkid', 1685878172000, 1685878172000),
(2, 'Putri Chadra', 1, '08216455342', 'bekasi', 1685878172000, 1685878172000),
(3, 'Fajar teguh', 0, '08976455332', 'tangsel', 1685878172000, 1685878172000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` bigint(255) NOT NULL,
  `updated_at` bigint(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Handuk', '35100.00', 59, 1685878172000, 1685878172000),
(2, 'Mouse', '40000.00', 2, 1685878172000, 1685878172000),
(3, 'Masker', '3500.00', 1500, 1685878172000, 1685878172000),
(4, 'Sendal Slip', '19250.00', 5, 1685878172000, 1685878172000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `costumer_id` int(11) unsigned NOT NULL,
  `total_price` decimal(10, 2) NOT NULL,
  `created_at` bigint(255) NOT NULL,
  `updated_at` bigint(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `costumer_id` (`costumer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `costumer_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, '35100.00', 1685878172000, 1685878172000);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_unit` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`, `price_per_unit`) VALUES
(1, 1, 1, 1, '35100.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
