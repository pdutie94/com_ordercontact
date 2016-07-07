DROP TABLE IF EXISTS `#__product_order`;
DROP TABLE IF EXISTS `#__user_contact`;

CREATE TABLE `#__product_order` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `order_number` varchar(5) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `#__user_contact` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `published` tinyint(4) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;