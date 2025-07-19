-- ========================================
-- TrulyPOS Complete MySQL Database Schema
-- ========================================
-- This file contains all tables required for TrulyPOS website
-- Compatible with MySQL 5.7+ and MySQL 8.0+
-- Character set: utf8mb4 (supports emojis and international characters)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- ========================================
-- CORE CONTENT MANAGEMENT TABLES
-- ========================================

-- Content table (main content management)
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_data` longtext DEFAULT NULL,
  `status` enum('active','inactive','draft') DEFAULT 'active',
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_content_type` (`type`),
  KEY `idx_content_status` (`status`),
  KEY `idx_content_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert pricing plans into content table
INSERT INTO `content` (`title`, `content`, `type`, `meta_data`, `status`, `sort_order`) VALUES
('Starter Plan', 'Perfect for small businesses starting their digital journey', 'pricing_plan', '{"price": 4999, "currency": "INR", "billing_cycle": "yearly", "max_users": 2, "max_locations": 1, "features": "Basic POS, Inventory Management, GST Billing, Mobile App, Email Support", "support_type": "Email", "is_popular": 0}', 'active', 1),
('Professional Plan', 'Ideal for growing businesses with multiple locations', 'pricing_plan', '{"price": 9999, "currency": "INR", "billing_cycle": "yearly", "max_users": 5, "max_locations": 3, "features": "All Starter features, Multi-location Support, Advanced Reports, Customer Management, Phone Support", "support_type": "Phone & Email", "is_popular": 1}', 'active', 2),
('Enterprise Plan', 'Complete solution for large businesses and chains', 'pricing_plan', '{"price": 19999, "currency": "INR", "billing_cycle": "yearly", "max_users": 999, "max_locations": 999, "features": "All Professional features, Unlimited Users & Locations, Custom Reports, API Access, Priority Support", "support_type": "Priority Support", "is_popular": 0}', 'active', 3);

-- Features table
CREATE TABLE `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_features_status` (`status`),
  KEY `idx_features_sort` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert features
INSERT INTO `features` (`title`, `description`, `icon`, `sort_order`, `status`) VALUES
('Inventory Management', 'Complete inventory control with stock tracking, low stock alerts, and automated reorder points', 'fas fa-box', 1, 'active'),
('GST Billing', 'GST compliant billing with automatic tax calculations, invoice generation, and compliance reports', 'fas fa-receipt', 2, 'active'),
('Barcode Scanning', 'Fast checkout with barcode scanning, label printing, and product identification', 'fas fa-barcode', 3, 'active'),
('Reports & Analytics', 'Comprehensive reporting with sales analytics, profit analysis, and business insights', 'fas fa-chart-line', 4, 'active'),
('Multi-Location Support', 'Manage multiple stores and warehouses from a single dashboard with centralized control', 'fas fa-store', 5, 'active'),
('Mobile App', 'Android app for on-the-go inventory management, sales tracking, and customer management', 'fas fa-mobile-alt', 6, 'active'),
('Customer Management', 'Comprehensive customer database with purchase history, credit management, and loyalty programs', 'fas fa-users', 7, 'active'),
('Supplier Management', 'Manage supplier relationships, purchase orders, and payment tracking', 'fas fa-truck', 8, 'active'),
('Role-based Access', 'Secure user management with role-based permissions and access control', 'fas fa-user-shield', 9, 'active'),
('Backup & Security', 'Automated backups, data encryption, and secure cloud storage options', 'fas fa-shield-alt', 10, 'active');

-- ========================================
-- CUSTOMER INTERACTION TABLES
-- ========================================

-- Testimonials table
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `testimonial` text NOT NULL,
  `rating` int(1) DEFAULT 5,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','pending') DEFAULT 'pending',
  `featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_testimonials_status` (`status`),
  KEY `idx_testimonials_featured` (`featured`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample testimonials
INSERT INTO `testimonials` (`customer_name`, `business_name`, `business_type`, `location`, `testimonial`, `rating`, `status`, `featured`) VALUES
('Rajesh Kumar', 'Kumar Electronics', 'Electronics Store', 'Delhi', 'TrulyPOS has revolutionized our inventory management. The GST compliance feature saves us hours of work every month.', 5, 'active', 1),
('Priya Sharma', 'Sharma Garments', 'Clothing Store', 'Mumbai', 'The mobile app is fantastic! I can check my store status even when I am traveling. Highly recommended for retail businesses.', 5, 'active', 1),
('Amit Patel', 'Fresh Mart', 'Grocery Store', 'Ahmedabad', 'Customer management feature helped us increase repeat sales by 30%. The reports are very detailed and helpful.', 5, 'active', 0),
('Sunita Gupta', 'Gupta Pharmacy', 'Medical Store', 'Pune', 'Barcode scanning makes billing so fast. Our customers love the quick checkout process.', 4, 'active', 1),
('Vikram Singh', 'Singh Auto Parts', 'Automobile Parts', 'Jaipur', 'Multi-location support is perfect for our chain. We can monitor all branches from one dashboard.', 5, 'active', 0);

-- Contact inquiries table
CREATE TABLE `contact_inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `source` varchar(50) DEFAULT 'website',
  `status` enum('new','in_progress','resolved','closed') DEFAULT 'new',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_contact_email` (`email`),
  KEY `idx_contact_status` (`status`),
  KEY `idx_contact_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Newsletter subscriptions table
CREATE TABLE `newsletter_subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','unsubscribed') DEFAULT 'active',
  `source` varchar(50) DEFAULT 'website',
  `preferences` text DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`),
  KEY `idx_newsletter_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- BUSINESS CONTENT TABLES
-- ========================================

-- Team members table
CREATE TABLE `team_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_team_status` (`status`),
  KEY `idx_team_sort` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog posts table
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `idx_blog_status` (`status`),
  KEY `idx_blog_published` (`published_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- FAQ table
CREATE TABLE `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(100) DEFAULT 'general',
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_faq_category` (`category`),
  KEY `idx_faq_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample FAQs
INSERT INTO `faqs` (`question`, `answer`, `category`, `sort_order`, `status`) VALUES
('What is TrulyPOS?', 'TrulyPOS is a comprehensive Point of Sale (POS) and inventory management software designed specifically for retail businesses in India. It includes GST billing, inventory tracking, customer management, and business analytics.', 'general', 1, 'active'),
('Is TrulyPOS GST compliant?', 'Yes, TrulyPOS is fully GST compliant. It automatically calculates GST rates, generates GST invoices, and provides detailed GST reports for filing returns.', 'billing', 2, 'active'),
('Can I use TrulyPOS offline?', 'Yes, TrulyPOS works both online and offline. Your data syncs automatically when internet connection is available.', 'technical', 3, 'active'),
('Do you provide training?', 'Yes, we provide comprehensive training to help you get started with TrulyPOS. Training is included in all our plans.', 'support', 4, 'active'),
('What kind of businesses can use TrulyPOS?', 'TrulyPOS is perfect for retail stores, restaurants, cafes, pharmacies, electronics shops, grocery stores, clothing stores, and any business that needs inventory management and billing.', 'general', 5, 'active');

-- ========================================
-- BUSINESS OPERATIONS TABLES
-- ========================================

-- Orders table (for software purchases)
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(100) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `plan_name` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) DEFAULT 'INR',
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','refunded') DEFAULT 'pending',
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_details` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `license_key` varchar(255) DEFAULT NULL,
  `license_status` enum('pending','active','expired','suspended') DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_order_number` (`order_number`),
  KEY `idx_orders_email` (`customer_email`),
  KEY `idx_orders_payment_status` (`payment_status`),
  KEY `idx_orders_license_status` (`license_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Licenses table
CREATE TABLE `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license_key` varchar(255) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_email` varchar(255) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `max_users` int(11) DEFAULT 1,
  `max_locations` int(11) DEFAULT 1,
  `features` text DEFAULT NULL,
  `status` enum('active','expired','suspended','pending') DEFAULT 'pending',
  `activated_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `usage_data` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_license_key` (`license_key`),
  KEY `idx_licenses_email` (`customer_email`),
  KEY `idx_licenses_status` (`status`),
  KEY `idx_licenses_expires` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- SYSTEM MANAGEMENT TABLES
-- ========================================

-- Settings table
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` longtext DEFAULT NULL,
  `setting_type` varchar(50) DEFAULT 'text',
  `description` text DEFAULT NULL,
  `group_name` varchar(50) DEFAULT 'general',
  `is_public` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_setting_key` (`setting_key`),
  KEY `idx_settings_group` (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default settings
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_type`, `description`, `group_name`, `is_public`) VALUES
('site_name', 'TrulyPOS', 'text', 'Website name', 'general', 1),
('site_tagline', 'Smart POS for Smart Business', 'text', 'Website tagline', 'general', 1),
('contact_email', 'info@trulypos.com', 'email', 'Primary contact email', 'contact', 1),
('contact_phone', '+91-9876543210', 'text', 'Primary contact phone', 'contact', 1),
('business_address', 'Business Innovation Hub, Tech City, India', 'textarea', 'Business address', 'contact', 1),
('google_analytics_id', '', 'text', 'Google Analytics tracking ID', 'tracking', 0),
('facebook_pixel_id', '', 'text', 'Facebook Pixel ID', 'tracking', 0);

-- Notification logs table (MySQL compatible)
CREATE TABLE `notification_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `recipient_email` varchar(255) DEFAULT NULL,
  `recipient_phone` varchar(20) DEFAULT NULL,
  `email_sent` varchar(20) DEFAULT 'not_attempted',
  `whatsapp_sent` varchar(20) DEFAULT 'not_attempted',
  `email_response` text DEFAULT NULL,
  `whatsapp_response` text DEFAULT NULL,
  `template_used` varchar(100) DEFAULT NULL,
  `data_payload` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_notification_type` (`type`),
  KEY `idx_notification_created` (`created_at`),
  KEY `idx_notification_email` (`recipient_email`),
  KEY `idx_notification_phone` (`recipient_phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- ADMIN MANAGEMENT TABLES
-- ========================================

-- Admin users table
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `role` enum('super_admin','admin','moderator') DEFAULT 'admin',
  `status` enum('active','inactive','suspended') DEFAULT 'active',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `login_attempts` int(3) DEFAULT 0,
  `locked_until` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`),
  UNIQUE KEY `unique_email` (`email`),
  KEY `idx_admin_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin user (password: admin123 - should be changed immediately)
INSERT INTO `admin_users` (`username`, `email`, `password`, `full_name`, `role`, `status`) VALUES
('admin', 'admin@trulypos.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'super_admin', 'active');

-- ========================================
-- CREATE INDEXES FOR PERFORMANCE
-- ========================================

-- Additional indexes for better performance
CREATE INDEX idx_content_type_status ON content(type, status);
CREATE INDEX idx_testimonials_status_featured ON testimonials(status, featured);
CREATE INDEX idx_contact_status_created ON contact_inquiries(status, created_at);

-- ========================================
-- FINAL SETTINGS
-- ========================================

COMMIT;

-- ========================================
-- DATABASE SETUP COMPLETE
-- ========================================
-- 
-- Total Tables Created: 13
-- 1. content - Main content management
-- 2. features - Product features
-- 3. testimonials - Customer testimonials
-- 4. contact_inquiries - Contact form submissions
-- 5. newsletter_subscriptions - Newsletter signups
-- 6. team_members - Team/staff information
-- 7. blog_posts - Blog content
-- 8. faqs - Frequently asked questions
-- 9. orders - Software purchase orders
-- 10. licenses - Software licenses
-- 11. settings - System settings
-- 12. notification_logs - Email/SMS logs
-- 13. admin_users - Admin panel users
--
-- Default Admin Login:
-- Username: admin
-- Password: admin123
-- Email: admin@trulypos.com
--
-- IMPORTANT: Change the default admin password immediately after setup!
-- ========================================
