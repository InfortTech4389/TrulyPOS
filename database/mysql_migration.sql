-- TrulyPOS MySQL Database Migration Script
-- Database: trulypos_web
-- Username: trulypos_root
-- Password: 4389BGAshri@*

-- Set character set
SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `trulypos_web` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE `trulypos_web`;

-- 1. Contacts Table
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_responded` tinyint(1) DEFAULT 0,
  `responded_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_email` (`email`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_is_responded` (`is_responded`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Newsletter Subscribers Table
CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','unsubscribed') DEFAULT 'active',
  `unsubscribe_token` varchar(64) DEFAULT NULL,
  `subscribed_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `unsubscribed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_email` (`email`),
  KEY `idx_status` (`status`),
  KEY `idx_subscribed_at` (`subscribed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Orders Table
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `plan_type` varchar(50) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `billing_cycle` enum('monthly','yearly') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'INR',
  `payment_status` enum('pending','processing','completed','failed','refunded') DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `razorpay_order_id` varchar(100) DEFAULT NULL,
  `razorpay_payment_id` varchar(100) DEFAULT NULL,
  `razorpay_signature` varchar(255) DEFAULT NULL,
  `transaction_notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_order_id` (`order_id`),
  KEY `idx_customer_email` (`customer_email`),
  KEY `idx_payment_status` (`payment_status`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_razorpay_order_id` (`razorpay_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Licenses Table
CREATE TABLE IF NOT EXISTS `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `license_key` varchar(255) NOT NULL,
  `plan_type` varchar(50) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `billing_cycle` enum('monthly','yearly') NOT NULL,
  `status` enum('active','expired','suspended','cancelled') DEFAULT 'active',
  `issued_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `expires_at` datetime NOT NULL,
  `last_used_at` datetime DEFAULT NULL,
  `activation_count` int(11) DEFAULT 0,
  `max_activations` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_license_key` (`license_key`),
  KEY `fk_order_id` (`order_id`),
  KEY `idx_status` (`status`),
  KEY `idx_expires_at` (`expires_at`),
  CONSTRAINT `fk_license_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Testimonials Table
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `testimonial` text NOT NULL,
  `rating` tinyint(1) DEFAULT 5,
  `image_url` varchar(500) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `order_index` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_is_active` (`is_active`),
  KEY `idx_is_featured` (`is_featured`),
  KEY `idx_order_index` (`order_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Settings Table
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `setting_type` enum('string','number','boolean','json','text') DEFAULT 'string',
  `description` varchar(500) DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_setting_key` (`setting_key`),
  KEY `idx_is_public` (`is_public`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Notification Logs Table
CREATE TABLE IF NOT EXISTS `notification_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `channel` enum('email','whatsapp','sms','both') NOT NULL,
  `recipient_email` varchar(255) DEFAULT NULL,
  `recipient_phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','sent','failed','delivered','read') DEFAULT 'pending',
  `error_message` text DEFAULT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `delivered_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_type` (`type`),
  KEY `idx_channel` (`channel`),
  KEY `idx_status` (`status`),
  KEY `idx_recipient_email` (`recipient_email`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Contact Responses Table
CREATE TABLE IF NOT EXISTS `contact_responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `response_message` text NOT NULL,
  `response_type` enum('email','whatsapp','both') NOT NULL,
  `responded_by` varchar(100) NOT NULL,
  `responded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_contact_id` (`contact_id`),
  KEY `idx_responded_at` (`responded_at`),
  CONSTRAINT `fk_response_contact` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default settings
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_type`, `description`, `is_public`) VALUES
('site_name', 'TrulyPOS', 'string', 'Website name', 1),
('site_email', 'info@trulypos.com', 'string', 'Primary email address', 1),
('admin_email', 'admin@trulypos.com', 'string', 'Admin email address', 0),
('support_email', 'support@trulypos.com', 'string', 'Support email address', 1),
('contact_phone', '+91-9876543210', 'string', 'Contact phone number', 1),
('whatsapp_number', '+91-9876543210', 'string', 'WhatsApp number', 1),
('razorpay_key_id', '', 'string', 'Razorpay Key ID', 0),
('razorpay_key_secret', '', 'string', 'Razorpay Key Secret', 0),
('email_from_name', 'TrulyPOS Team', 'string', 'Email from name', 0),
('email_from_address', 'noreply@trulypos.com', 'string', 'Email from address', 0),
('whatsapp_api_enabled', '0', 'boolean', 'Enable WhatsApp API', 0),
('email_notifications_enabled', '1', 'boolean', 'Enable email notifications', 0),
('maintenance_mode', '0', 'boolean', 'Maintenance mode', 0)
ON DUPLICATE KEY UPDATE 
setting_value = VALUES(setting_value),
updated_at = CURRENT_TIMESTAMP;

-- Insert sample testimonials
INSERT INTO `testimonials` (`name`, `company`, `designation`, `testimonial`, `rating`, `is_featured`, `is_active`, `order_index`) VALUES
('Rajesh Kumar', 'Kumar Electronics', 'Owner', 'TrulyPOS has transformed our retail business. The inventory management and billing system is exactly what we needed.', 5, 1, 1, 1),
('Priya Sharma', 'Sharma Pharmacy', 'Manager', 'Excellent software for pharmacy management. The compliance features and customer management are outstanding.', 5, 1, 1, 2),
('Amit Patel', 'Fresh Foods Market', 'Owner', 'Perfect for our grocery business. The multi-location support and real-time reporting have improved our operations significantly.', 5, 1, 1, 3),
('Sunita Joshi', 'Joshi Distributors', 'Director', 'The distribution module handles our complex requirements perfectly. Highly recommended for wholesale businesses.', 5, 0, 1, 4)
ON DUPLICATE KEY UPDATE 
testimonial = VALUES(testimonial),
updated_at = CURRENT_TIMESTAMP;

-- Create admin user session table (optional)
CREATE TABLE IF NOT EXISTS `admin_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create indexes for better performance
CREATE INDEX `idx_orders_customer` ON `orders` (`customer_email`, `created_at`);
CREATE INDEX `idx_licenses_expiry` ON `licenses` (`status`, `expires_at`);
CREATE INDEX `idx_notifications_pending` ON `notification_logs` (`status`, `created_at`);
CREATE INDEX `idx_contacts_unresponded` ON `contacts` (`is_responded`, `created_at`);

COMMIT;
