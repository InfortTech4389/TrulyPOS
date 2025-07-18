# TrulyPOS Production Deployment Checklist

## Pre-Deployment Checklist

### 1. Server Preparation
- [ ] Linux server with Apache/Nginx
- [ ] PHP 7.4+ installed with required extensions
- [ ] MySQL 5.7+ installed and configured
- [ ] SSL certificate obtained for trulypos.com
- [ ] Domain DNS configured to point to server IP
- [ ] Firewall configured (ports 80, 443, 22)

### 2. Database Setup
- [ ] MySQL database `trulypos_web` created
- [ ] User `trulypos_root` created with password `4389BGAshri@*`
- [ ] Database permissions granted
- [ ] Run migration script: `mysql -u trulypos_root -p trulypos_web < database/mysql_migration.sql`

### 3. File Upload
- [ ] Upload all project files to server document root
- [ ] Set file permissions: `chmod +x deploy.sh && ./deploy.sh`
- [ ] Verify .htaccess is working
- [ ] Test basic website access

## Post-Deployment Configuration

### 4. Admin Panel Setup
- [ ] Access admin panel: `https://trulypos.com/admin`
- [ ] Login with: `admin / trulypos2025`
- [ ] **IMMEDIATELY change admin password**
- [ ] Update admin email address
- [ ] Configure site settings

### 5. Email Configuration
- [ ] Update SMTP settings in admin panel
- [ ] Test email functionality with contact form
- [ ] Verify email notifications are working
- [ ] Configure email templates

### 6. Payment Gateway
- [ ] Set up Razorpay account
- [ ] Add Razorpay API keys in admin settings
- [ ] Test payment flow in sandbox mode
- [ ] Switch to live mode after testing

### 7. WhatsApp Integration
- [ ] Set up WhatsApp Business API account
- [ ] Add WhatsApp API credentials
- [ ] Test WhatsApp notifications
- [ ] Configure WhatsApp templates

### 8. Security Configuration
- [ ] Enable HTTPS redirect in .htaccess
- [ ] Update session configuration
- [ ] Set secure cookie settings
- [ ] Configure CSRF protection
- [ ] Set strong encryption key

### 9. Performance Optimization
- [ ] Enable gzip compression
- [ ] Configure browser caching
- [ ] Optimize images
- [ ] Set up CDN (optional)
- [ ] Configure database indexing

### 10. Monitoring & Backup
- [ ] Set up daily backup cron job: `0 2 * * * /path/to/backup.sh`
- [ ] Set up health check monitoring: `*/15 * * * * /path/to/health_check.sh`
- [ ] Configure log rotation
- [ ] Set up uptime monitoring
- [ ] Configure error monitoring

## Testing Checklist

### 11. Functionality Testing
- [ ] Homepage loads correctly
- [ ] All navigation links work
- [ ] Contact form submits successfully
- [ ] Newsletter subscription works
- [ ] Purchase flow completes
- [ ] Payment processing works
- [ ] Admin panel functions correctly
- [ ] Email notifications sent
- [ ] WhatsApp notifications sent (if configured)

### 12. Security Testing
- [ ] Admin panel requires authentication
- [ ] Sensitive files are protected (.htaccess working)
- [ ] SQL injection protection active
- [ ] XSS protection enabled
- [ ] CSRF tokens working
- [ ] File upload restrictions work
- [ ] Session security configured

### 13. Performance Testing
- [ ] Page load times under 3 seconds
- [ ] Mobile responsiveness works
- [ ] Images optimized and loading
- [ ] Database queries optimized
- [ ] Caching working properly

## Production Environment Variables

### 14. Environment Configuration
Update these in production:

**Database:**
- Host: `localhost`
- Database: `trulypos_web`
- Username: `trulypos_root`
- Password: `4389BGAshri@*`

**Email SMTP:**
- Host: `mail.trulypos.com`
- Username: `noreply@trulypos.com`
- Password: `[UPDATE_IN_ADMIN_PANEL]`

**Payment Gateway:**
- Razorpay Key ID: `[UPDATE_IN_ADMIN_PANEL]`
- Razorpay Secret: `[UPDATE_IN_ADMIN_PANEL]`

**WhatsApp API:**
- API URL: `[UPDATE_IN_ADMIN_PANEL]`
- API Token: `[UPDATE_IN_ADMIN_PANEL]`
- Phone Number: `+91-9876543210`

## Important URLs

### 15. Key URLs After Deployment
- **Website:** https://trulypos.com
- **Admin Panel:** https://trulypos.com/admin
- **Contact Page:** https://trulypos.com/contact
- **Pricing:** https://trulypos.com/pricing
- **Purchase:** https://trulypos.com/buy

## Support Information

### 16. Admin Credentials
- **URL:** https://trulypos.com/admin
- **Default Username:** admin
- **Default Password:** trulypos2025
- **⚠️ CHANGE IMMEDIATELY AFTER FIRST LOGIN**

### 17. File Locations
- **Website Root:** `/var/www/html/trulypos/` (typical)
- **Config Files:** `application/config/`
- **Logs:** `application/logs/`
- **Database:** MySQL (not file-based in production)
- **Backups:** `/backups/trulypos/`

### 18. Maintenance Commands
```bash
# Run deployment script
./deploy.sh

# Create backup
./backup.sh

# Health check
./health_check.sh

# View logs
tail -f application/logs/log-$(date +%Y-%m-%d).php

# Check permissions
ls -la application/logs application/cache
```

## Emergency Contacts
- **Technical Support:** [Your Contact Info]
- **Server Administrator:** [Server Admin Contact]
- **Domain Registrar:** [Domain Provider]
- **Hosting Provider:** [Hosting Provider Contact]

---

**⚠️ CRITICAL REMINDERS:**
1. Change default admin password immediately
2. Keep regular backups
3. Monitor logs regularly
4. Update software periodically
5. Renew SSL certificates before expiry
6. Test all functionality after deployment
