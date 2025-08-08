-- Enhanced voucher and discount system
-- Add to existing database

-- Voucher system table
CREATE TABLE IF NOT EXISTS `vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `type` enum('percentage','fixed','bonus_saldo') NOT NULL DEFAULT 'percentage',
  `value` decimal(10,2) NOT NULL,
  `min_transaction` decimal(10,2) DEFAULT 0,
  `max_discount` decimal(10,2) DEFAULT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `used_count` int(11) DEFAULT 0,
  `valid_from` datetime NOT NULL,
  `valid_until` datetime NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Flash sale system
CREATE TABLE IF NOT EXISTS `flash_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `discount_percentage` decimal(5,2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` enum('upcoming','active','ended') DEFAULT 'upcoming',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Flash sale products
CREATE TABLE IF NOT EXISTS `flash_sale_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flash_sale_id` int(11) NOT NULL,
  `product_type` enum('games','pulsa','sosmed') NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `flash_price` decimal(10,2) NOT NULL,
  `stock_limit` int(11) DEFAULT NULL,
  `sold_count` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `flash_sale_id` (`flash_sale_id`),
  FOREIGN KEY (`flash_sale_id`) REFERENCES `flash_sales`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Voucher usage history
CREATE TABLE IF NOT EXISTS `voucher_usage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `used_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `voucher_id` (`voucher_id`),
  FOREIGN KEY (`voucher_id`) REFERENCES `vouchers`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Loyalty points system
CREATE TABLE IF NOT EXISTS `loyalty_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `tier` enum('bronze','silver','gold','platinum') DEFAULT 'bronze',
  `tier_updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Points history
CREATE TABLE IF NOT EXISTS `points_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `action` enum('earned','redeemed') NOT NULL,
  `points` int(11) NOT NULL,
  `description` text,
  `order_id` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Promotional banners
CREATE TABLE IF NOT EXISTS `promotional_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image_url` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `position` enum('home_top','home_middle','games','profile') DEFAULT 'home_top',
  `priority` int(11) DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Transaction benefits tracking
CREATE TABLE IF NOT EXISTS `transaction_benefits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `original_amount` decimal(10,2) NOT NULL,
  `final_amount` decimal(10,2) NOT NULL,
  `voucher_discount` decimal(10,2) DEFAULT 0,
  `flash_discount` decimal(10,2) DEFAULT 0,
  `points_earned` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO `vouchers` (`code`, `name`, `description`, `type`, `value`, `min_transaction`, `max_discount`, `usage_limit`, `valid_from`, `valid_until`, `status`) VALUES
('WELCOME10', 'Welcome Bonus', 'Diskon 10% untuk member baru', 'percentage', 10.00, 10000.00, 5000.00, 100, NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 'active'),
('FLASHSALE20', 'Flash Sale Special', 'Diskon 20% untuk semua produk', 'percentage', 20.00, 50000.00, 15000.00, 50, NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY), 'active'),
('BONUS5000', 'Bonus Saldo', 'Bonus saldo Rp 5.000', 'bonus_saldo', 5000.00, 25000.00, NULL, 200, NOW(), DATE_ADD(NOW(), INTERVAL 15 DAY), 'active');

INSERT INTO `flash_sales` (`name`, `description`, `discount_percentage`, `start_time`, `end_time`, `status`) VALUES
('Flash Sale Weekend', 'Diskon besar-besaran di akhir pekan', 25.00, NOW(), DATE_ADD(NOW(), INTERVAL 3 DAY), 'active'),
('Midnight Sale', 'Flash sale tengah malam dengan diskon fantastis', 30.00, DATE_ADD(NOW(), INTERVAL 1 DAY), DATE_ADD(NOW(), INTERVAL 2 DAY), 'upcoming');

INSERT INTO `promotional_banners` (`title`, `description`, `image_url`, `link_url`, `position`, `priority`, `start_date`, `end_date`, `status`) VALUES
('Grand Opening Discount', 'Dapatkan diskon hingga 50% untuk semua produk game!', '/assets/banners/grand-opening.jpg', '/id/games', 'home_top', 1, NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 'active'),
('Loyalty Program', 'Kumpulkan poin setiap transaksi dan tukar dengan hadiah menarik', '/assets/banners/loyalty.jpg', '/account/loyalty', 'home_middle', 2, NOW(), DATE_ADD(NOW(), INTERVAL 60 DAY), 'active');