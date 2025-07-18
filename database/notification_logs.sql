-- Notification Logs Table
CREATE TABLE IF NOT EXISTS notification_logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    type VARCHAR(50) NOT NULL,
    recipient_email VARCHAR(255),
    recipient_phone VARCHAR(20),
    email_sent VARCHAR(20) DEFAULT 'not_attempted',
    whatsapp_sent VARCHAR(20) DEFAULT 'not_attempted',
    email_response TEXT,
    whatsapp_response TEXT,
    template_used VARCHAR(100),
    data_payload TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Indexes for better performance
CREATE INDEX IF NOT EXISTS idx_notification_logs_type ON notification_logs(type);
CREATE INDEX IF NOT EXISTS idx_notification_logs_created_at ON notification_logs(created_at);
CREATE INDEX IF NOT EXISTS idx_notification_logs_email ON notification_logs(recipient_email);
CREATE INDEX IF NOT EXISTS idx_notification_logs_phone ON notification_logs(recipient_phone);
