-- Update testimonials table to add missing columns
ALTER TABLE `testimonials` ADD COLUMN `category` varchar(100) DEFAULT NULL AFTER `image`;
ALTER TABLE `testimonials` ADD COLUMN `location` varchar(255) DEFAULT NULL AFTER `company`;

-- Update existing testimonials with sample categories
UPDATE `testimonials` SET `category` = 'Electronics' WHERE `id` = 1;
UPDATE `testimonials` SET `category` = 'Fashion' WHERE `id` = 2;
UPDATE `testimonials` SET `category` = 'Distribution' WHERE `id` = 3;
UPDATE `testimonials` SET `category` = 'Textiles' WHERE `id` = 4;
UPDATE `testimonials` SET `category` = 'Hardware' WHERE `id` = 5;

-- Add more sample testimonials with categories
INSERT INTO `testimonials` (`name`, `company`, `position`, `location`, `message`, `rating`, `category`, `status`) VALUES
('Priya Malhotra', 'ChocoBerry Bakers', 'Owner', 'Mumbai, Maharashtra', 'As a bakery owner, managing rush hours and keeping up with custom cake orders used to be overwhelming. Truly POS has made our billing process lightning fast, and my team loves how easy it is to track pending and completed orders.', 5, 'Bakery', 'active'),
('Mohammed Rizwan', 'Smart Vision Opticals', 'Manager', 'Kochi, Kerala', 'Before using Truly POS, keeping records of different frame brands and lens types was a headache. Now, inventory updates happen in real time, and I can set up promotions for old stock with a click.', 5, 'Optical', 'active'),
('Sneha Ghosh', 'Heritage Book World', 'Owner', 'Kolkata, West Bengal', 'My bookshops collection is vast, and earlier I struggled to find fast-moving books or track old stock. Truly POS lets me barcode every item, manage returns, and get easy daily sales summaries.', 5, 'Bookstore', 'active'),
('Anurag Singh', 'Fresh Greens Grocery', 'Manager', 'Lucknow, Uttar Pradesh', 'I always wanted to automate my grocery shop but was worried about the learning curve for my staff. Truly POS surprised me with its simple billing and quick inventory features.', 5, 'Grocery', 'active'),
('Namrata Shenoy', 'Bella Vita Fashion Studio', 'Designer', 'Bengaluru, Karnataka', 'Managing a boutique means handling constant changes in inventory, offers, and sizes. Truly POS allows us to set different prices for designer collections, print beautiful branded bills, and quickly process exchanges.', 5, 'Fashion', 'active');
