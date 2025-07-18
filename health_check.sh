#!/bin/bash

# TrulyPOS Health Check Script
# Use this to monitor the health of your production deployment

# Configuration
SITE_URL="https://trulypos.com"
LOG_FILE="/var/log/trulypos_health.log"
ALERT_EMAIL="admin@trulypos.com"

# Function to log messages
log_message() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" | tee -a $LOG_FILE
}

# Function to send alert
send_alert() {
    local subject="$1"
    local message="$2"
    
    if command -v mail >/dev/null 2>&1; then
        echo "$message" | mail -s "$subject" $ALERT_EMAIL
    fi
    
    log_message "ALERT: $subject - $message"
}

log_message "Starting TrulyPOS health check..."

# 1. Check website accessibility
log_message "Checking website accessibility..."
response_code=$(curl -s -o /dev/null -w "%{http_code}" $SITE_URL)

if [ "$response_code" = "200" ]; then
    log_message "✓ Website is accessible (HTTP $response_code)"
else
    send_alert "Website Down" "TrulyPOS website is not accessible. HTTP response code: $response_code"
fi

# 2. Check admin panel
log_message "Checking admin panel accessibility..."
admin_response=$(curl -s -o /dev/null -w "%{http_code}" $SITE_URL/admin)

if [ "$admin_response" = "200" ] || [ "$admin_response" = "302" ]; then
    log_message "✓ Admin panel is accessible"
else
    send_alert "Admin Panel Issue" "Admin panel is not accessible. HTTP response code: $admin_response"
fi

# 3. Check database connectivity
log_message "Checking database connectivity..."
db_check=$(php -r "
\$config = include '/var/www/html/trulypos/application/config/database.php';
\$db = \$config['default'];
if (\$db['dbdriver'] === 'mysqli') {
    \$conn = new mysqli(\$db['hostname'], \$db['username'], \$db['password'], \$db['database']);
    if (\$conn->connect_error) {
        echo 'FAILED: ' . \$conn->connect_error;
        exit(1);
    } else {
        echo 'SUCCESS';
        \$conn->close();
        exit(0);
    }
}
echo 'UNKNOWN';
exit(2);
")

if [ "$?" = "0" ]; then
    log_message "✓ Database connection successful"
else
    send_alert "Database Connection Failed" "Database connection check failed: $db_check"
fi

# 4. Check disk space
log_message "Checking disk space..."
disk_usage=$(df / | awk 'NR==2 {print $5}' | sed 's/%//')

if [ "$disk_usage" -gt 90 ]; then
    send_alert "Low Disk Space" "Disk usage is at $disk_usage%. Please free up space."
elif [ "$disk_usage" -gt 80 ]; then
    log_message "⚠ Warning: Disk usage is at $disk_usage%"
else
    log_message "✓ Disk space OK ($disk_usage% used)"
fi

# 5. Check log file sizes
log_message "Checking log file sizes..."
log_dir="/var/www/html/trulypos/application/logs"

if [ -d "$log_dir" ]; then
    large_logs=$(find $log_dir -name "*.php" -size +10M)
    if [ -n "$large_logs" ]; then
        send_alert "Large Log Files" "The following log files are larger than 10MB: $large_logs"
    else
        log_message "✓ Log file sizes are normal"
    fi
fi

# 6. Check SSL certificate expiry
log_message "Checking SSL certificate..."
ssl_expiry=$(echo | openssl s_client -connect trulypos.com:443 -servername trulypos.com 2>/dev/null | openssl x509 -noout -enddate 2>/dev/null | cut -d= -f2)

if [ -n "$ssl_expiry" ]; then
    expiry_timestamp=$(date -d "$ssl_expiry" +%s)
    current_timestamp=$(date +%s)
    days_until_expiry=$(( (expiry_timestamp - current_timestamp) / 86400 ))
    
    if [ "$days_until_expiry" -lt 7 ]; then
        send_alert "SSL Certificate Expiring" "SSL certificate expires in $days_until_expiry days on $ssl_expiry"
    elif [ "$days_until_expiry" -lt 30 ]; then
        log_message "⚠ Warning: SSL certificate expires in $days_until_expiry days"
    else
        log_message "✓ SSL certificate valid for $days_until_expiry days"
    fi
else
    log_message "⚠ Warning: Could not check SSL certificate"
fi

# 7. Check critical files
log_message "Checking critical files..."
critical_files=(
    "/var/www/html/trulypos/index.php"
    "/var/www/html/trulypos/.htaccess"
    "/var/www/html/trulypos/application/config/config.php"
    "/var/www/html/trulypos/application/config/database.php"
)

for file in "${critical_files[@]}"; do
    if [ -f "$file" ]; then
        log_message "✓ $file exists"
    else
        send_alert "Critical File Missing" "Critical file missing: $file"
    fi
done

# 8. Check file permissions
log_message "Checking file permissions..."
if [ -w "/var/www/html/trulypos/application/logs" ] && [ -w "/var/www/html/trulypos/application/cache" ]; then
    log_message "✓ File permissions are correct"
else
    send_alert "Permission Issue" "Write permissions missing for logs or cache directory"
fi

# 9. Check PHP errors
log_message "Checking for PHP errors..."
php_error_log="/var/log/php_errors.log"
if [ -f "$php_error_log" ]; then
    recent_errors=$(tail -n 100 $php_error_log | grep -i "trulypos" | grep "$(date '+%Y-%m-%d')" | wc -l)
    if [ "$recent_errors" -gt 10 ]; then
        send_alert "High PHP Error Count" "Found $recent_errors PHP errors today in the logs"
    else
        log_message "✓ PHP error count is normal ($recent_errors errors today)"
    fi
fi

# 10. Performance check
log_message "Checking website performance..."
load_time=$(curl -s -o /dev/null -w "%{time_total}" $SITE_URL)
load_time_ms=$(echo "$load_time * 1000" | bc)

if (( $(echo "$load_time > 5.0" | bc -l) )); then
    send_alert "Slow Website Performance" "Website load time is ${load_time}s, which is above the 5s threshold"
elif (( $(echo "$load_time > 3.0" | bc -l) )); then
    log_message "⚠ Warning: Website load time is ${load_time}s"
else
    log_message "✓ Website performance OK (${load_time}s load time)"
fi

log_message "Health check completed"

# Summary
echo ""
echo "=== Health Check Summary ==="
echo "Website: $SITE_URL"
echo "Timestamp: $(date)"
echo "Status: $(grep -c "✓" $LOG_FILE) checks passed, $(grep -c "⚠" $LOG_FILE) warnings, $(grep -c "ALERT" $LOG_FILE) alerts"
echo "=============================="
