-- Notification Logs Table (MySQL Compatible)
CREATE TABLE IF NOT EXISTS `notification_logs` (
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
