-- Truly POS Website Database Structure
-- Create database: trulypos_website

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample features
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

-- Pricing plans table
CREATE TABLE `pricing_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `currency` varchar(10) DEFAULT 'INR',
  `billing_cycle` enum('monthly','yearly','lifetime') DEFAULT 'lifetime',
  `features` text DEFAULT NULL,
  `max_users` int(11) DEFAULT 1,
  `max_locations` int(11) DEFAULT 1,
  `support_type` varchar(50) DEFAULT 'email',
  `is_popular` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample pricing plans
INSERT INTO `pricing_plans` (`name`, `description`, `price`, `currency`, `billing_cycle`, `features`, `max_users`, `max_locations`, `support_type`, `is_popular`, `sort_order`, `status`) VALUES
('Single Store', 'Perfect for small retail businesses', 15000.00, 'INR', 'lifetime', 'Inventory Management,GST Billing,Barcode Scanning,Basic Reports,Customer Management,Email Support', 3, 1, 'email', 0, 1, 'active'),
('Multi Store', 'Ideal for growing businesses with multiple locations', 25000.00, 'INR', 'lifetime', 'All Single Store Features,Multi-Location Support,Advanced Reports,Supplier Management,Role-based Access,Priority Support', 10, 5, 'priority', 1, 2, 'active'),
('Enterprise', 'Complete solution for large businesses', 50000.00, 'INR', 'lifetime', 'All Multi Store Features,Unlimited Users,Unlimited Locations,Advanced Analytics,Custom Reports,24/7 Phone Support,On-site Training', -1, -1, 'phone', 0, 3, 'active');

-- Testimonials table
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `rating` int(11) DEFAULT 5,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample testimonials
INSERT INTO `testimonials` (`name`, `company`, `position`, `message`, `rating`, `image`, `status`) VALUES
('Rajesh Kumar', 'ABC Electronics', 'Owner', 'Truly POS has revolutionized our business operations. The inventory management is excellent and the GST billing feature saves us hours of work every day.', 5, 'user1.jpg', 'active'),
('Priya Sharma', 'Fashion Hub', 'Manager', 'Best POS software for retail business. Easy to use, powerful features, and excellent customer support. Highly recommended for any retail store!', 5, 'user2.jpg', 'active'),
('Amit Patel', 'Patel Distributors', 'Director', 'The multi-location feature is perfect for our chain of stores. We can manage everything from one place. Great software with amazing support team!', 5, 'user3.jpg', 'active'),
('Sunita Devi', 'Modern Textiles', 'Owner', 'Simple yet powerful software. The barcode scanning feature has made our billing process so much faster. Customer service is also very responsive.', 5, 'user4.jpg', 'active'),
('Vikram Singh', 'Singh Hardware', 'Manager', 'We have been using Truly POS for 2 years now. The software is stable, feature-rich, and the reports help us make better business decisions.', 5, 'user5.jpg', 'active');

-- Team members table
CREATE TABLE `team_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample team members
INSERT INTO `team_members` (`name`, `position`, `bio`, `image`, `email`, `sort_order`, `status`) VALUES
('Rohit Sharma', 'Founder & CEO', 'With over 10 years of experience in retail technology, Rohit leads our vision to revolutionize business management software.', 'team1.jpg', 'rohit@trulypos.com', 1, 'active'),
('Neha Gupta', 'CTO', 'Technical expert with expertise in software architecture and development. Neha ensures our platform is robust and scalable.', 'team2.jpg', 'neha@trulypos.com', 2, 'active'),
('Arjun Patel', 'Head of Sales', 'Sales and marketing specialist focused on understanding customer needs and building long-term relationships.', 'team3.jpg', 'arjun@trulypos.com', 3, 'active'),
('Kavya Reddy', 'Customer Success Manager', 'Dedicated to ensuring our customers get the maximum value from Truly POS with excellent support and training.', 'team4.jpg', 'kavya@trulypos.com', 4, 'active');

-- Blog posts table
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample blog posts
INSERT INTO `blog_posts` (`title`, `slug`, `excerpt`, `content`, `image`, `author`, `category`, `tags`, `meta_description`, `status`) VALUES
('10 Essential Features Every POS System Should Have', '10-essential-features-pos-system', 'Discover the must-have features that make a POS system truly effective for your business operations.', 'A comprehensive guide to the essential features every modern POS system should include for optimal business management...', 'blog1.jpg', 'Rohit Sharma', 'POS Systems', 'pos,features,business', 'Learn about the 10 essential features every POS system should have for effective business management.', 'published'),
('How to Choose the Right POS Software for Your Retail Business', 'choose-right-pos-software-retail', 'A complete guide to selecting the perfect POS software that meets your retail business needs.', 'Choosing the right POS software is crucial for your retail business success. Here\'s what you need to consider...', 'blog2.jpg', 'Neha Gupta', 'Retail', 'pos,retail,software', 'Complete guide to choosing the right POS software for your retail business needs.', 'published'),
('GST Compliance Made Easy with Modern POS Systems', 'gst-compliance-modern-pos-systems', 'Learn how modern POS systems simplify GST compliance and reduce administrative burden.', 'GST compliance doesn\'t have to be complicated. Modern POS systems can automate most of the process...', 'blog3.jpg', 'Arjun Patel', 'GST', 'gst,compliance,pos', 'Discover how modern POS systems make GST compliance easy and automated for businesses.', 'published');

-- FAQ table
CREATE TABLE `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample FAQs
INSERT INTO `faqs` (`question`, `answer`, `category`, `sort_order`, `status`) VALUES
('What is Truly POS?', 'Truly POS is a comprehensive inventory and billing software designed specifically for distribution and retail businesses. It includes features like inventory management, GST billing, barcode scanning, and multi-location support.', 'General', 1, 'active'),
('Is Truly POS suitable for small businesses?', 'Yes, Truly POS is designed to scale with your business. We offer different plans suitable for small single-store businesses to large multi-location enterprises.', 'General', 2, 'active'),
('Does Truly POS support GST billing?', 'Yes, Truly POS is fully GST compliant with automatic tax calculations, invoice generation, and GST reports to help you stay compliant with tax regulations.', 'Features', 3, 'active'),
('Can I use Truly POS on multiple devices?', 'Yes, Truly POS is a cloud-based solution that can be accessed from multiple devices including computers, tablets, and smartphones.', 'Technical', 4, 'active'),
('What kind of support do you provide?', 'We provide email support for all plans, priority support for Multi Store plans, and 24/7 phone support for Enterprise plans. We also offer training and implementation assistance.', 'Support', 5, 'active'),
('Is there a free trial available?', 'Yes, we offer a live demo where you can test all features with sample data. You can also request a free trial for your business.', 'General', 6, 'active'),
('How secure is my data?', 'Data security is our top priority. We use encryption, secure servers, regular backups, and follow industry best practices to keep your data safe.', 'Security', 7, 'active'),
('Can I customize the software according to my needs?', 'Yes, our Enterprise plan includes customization options. We can also develop custom features based on your specific business requirements.', 'Customization', 8, 'active');

-- Contacts table
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('new','in_progress','resolved') DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Newsletter subscribers table
CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `status` enum('active','unsubscribed') DEFAULT 'active',
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Orders table
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) DEFAULT 'INR',
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` enum('pending','paid','failed','refunded') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `plan_id` (`plan_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `pricing_plans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Licenses table
CREATE TABLE `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `license_key` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `status` enum('active','inactive','expired') DEFAULT 'active',
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `license_key` (`license_key`),
  KEY `order_id` (`order_id`),
  KEY `plan_id` (`plan_id`),
  CONSTRAINT `licenses_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `licenses_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `pricing_plans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin users table
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('admin','manager','staff') DEFAULT 'staff',
  `status` enum('active','inactive') DEFAULT 'active',
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user
INSERT INTO `admin_users` (`username`, `email`, `password`, `full_name`, `role`, `status`) VALUES
('admin', 'admin@trulypos.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Administrator', 'admin', 'active');

-- Settings table
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(50) DEFAULT 'text',
  `description` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default settings
INSERT INTO `settings` (`key`, `value`, `type`, `description`) VALUES
('site_title', 'Truly POS', 'text', 'Website title'),
('site_description', 'Smart Billing & Inventory Software for Distribution & Retail Businesses', 'text', 'Website description'),
('contact_email', 'info@trulypos.com', 'email', 'Contact email address'),
('support_email', 'support@trulypos.com', 'email', 'Support email address'),
('phone_number', '+91 9876543210', 'text', 'Contact phone number'),
('address', '123 Business Street, City, State 12345', 'text', 'Company address'),
('facebook_url', 'https://facebook.com/trulypos', 'url', 'Facebook page URL'),
('twitter_url', 'https://twitter.com/trulypos', 'url', 'Twitter profile URL'),
('linkedin_url', 'https://linkedin.com/company/trulypos', 'url', 'LinkedIn page URL'),
('instagram_url', 'https://instagram.com/trulypos', 'url', 'Instagram profile URL'),
('razorpay_key', 'rzp_test_YOUR_KEY_HERE', 'text', 'Razorpay API key'),
('razorpay_secret', 'YOUR_SECRET_KEY_HERE', 'text', 'Razorpay secret key'),
('google_analytics_id', 'GA_MEASUREMENT_ID', 'text', 'Google Analytics tracking ID'),
('demo_url', 'https://demo.trulypos.com', 'url', 'Demo application URL'),
('download_url', 'https://trulypos.com/download', 'url', 'Software download URL');
