#!/bin/bash

# TrulyPOS Backup Script
# Run this script daily via cron job

# Configuration
BACKUP_DIR="/backups/trulypos"
DATE=$(date +%Y%m%d_%H%M%S)
DB_NAME="trulypos_web"
DB_USER="trulypos_root"
DB_PASS="4389BGAshri@*"
SITE_DIR="/var/www/html/trulypos"
RETENTION_DAYS=30

# Create backup directory if it doesn't exist
mkdir -p $BACKUP_DIR

# Function to log messages
log_message() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" | tee -a $BACKUP_DIR/backup.log
}

log_message "Starting TrulyPOS backup process..."

# 1. Database Backup
log_message "Creating database backup..."
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/database_$DATE.sql

if [ $? -eq 0 ]; then
    log_message "Database backup completed successfully"
    gzip $BACKUP_DIR/database_$DATE.sql
else
    log_message "ERROR: Database backup failed"
    exit 1
fi

# 2. File System Backup
log_message "Creating file system backup..."
tar -czf $BACKUP_DIR/files_$DATE.tar.gz \
    --exclude='application/logs/*' \
    --exclude='application/cache/*' \
    --exclude='.git' \
    --exclude='*.log' \
    -C $(dirname $SITE_DIR) $(basename $SITE_DIR)

if [ $? -eq 0 ]; then
    log_message "File system backup completed successfully"
else
    log_message "ERROR: File system backup failed"
    exit 1
fi

# 3. Configuration Backup
log_message "Creating configuration backup..."
mkdir -p $BACKUP_DIR/config_$DATE
cp $SITE_DIR/application/config/*.php $BACKUP_DIR/config_$DATE/
cp $SITE_DIR/.htaccess $BACKUP_DIR/config_$DATE/
tar -czf $BACKUP_DIR/config_$DATE.tar.gz -C $BACKUP_DIR config_$DATE
rm -rf $BACKUP_DIR/config_$DATE

# 4. Create combined backup
log_message "Creating combined backup archive..."
cd $BACKUP_DIR
tar -czf complete_backup_$DATE.tar.gz database_$DATE.sql.gz files_$DATE.tar.gz config_$DATE.tar.gz
rm database_$DATE.sql.gz files_$DATE.tar.gz config_$DATE.tar.gz

# 5. Cleanup old backups
log_message "Cleaning up old backups (older than $RETENTION_DAYS days)..."
find $BACKUP_DIR -name "*.tar.gz" -type f -mtime +$RETENTION_DAYS -delete
find $BACKUP_DIR -name "*.sql.gz" -type f -mtime +$RETENTION_DAYS -delete

# 6. Verify backup integrity
log_message "Verifying backup integrity..."
if [ -f "$BACKUP_DIR/complete_backup_$DATE.tar.gz" ]; then
    tar -tzf $BACKUP_DIR/complete_backup_$DATE.tar.gz > /dev/null 2>&1
    if [ $? -eq 0 ]; then
        log_message "Backup verification successful"
        BACKUP_SIZE=$(du -h $BACKUP_DIR/complete_backup_$DATE.tar.gz | cut -f1)
        log_message "Backup size: $BACKUP_SIZE"
    else
        log_message "ERROR: Backup verification failed"
        exit 1
    fi
else
    log_message "ERROR: Backup file not found"
    exit 1
fi

# 7. Optional: Upload to cloud storage (uncomment and configure as needed)
# log_message "Uploading backup to cloud storage..."
# aws s3 cp $BACKUP_DIR/complete_backup_$DATE.tar.gz s3://your-bucket/trulypos-backups/
# gsutil cp $BACKUP_DIR/complete_backup_$DATE.tar.gz gs://your-bucket/trulypos-backups/

log_message "Backup process completed successfully"
log_message "Backup file: $BACKUP_DIR/complete_backup_$DATE.tar.gz"

# Send notification email (optional)
if command -v mail >/dev/null 2>&1; then
    echo "TrulyPOS backup completed successfully on $(date)" | mail -s "TrulyPOS Backup Status" admin@trulypos.com
fi

exit 0
