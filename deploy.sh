#!/bin/bash

# TrulyPOS Post-Deployment Script
# Run this script after uploading files to production server

echo "Starting TrulyPOS post-deployment setup..."

# Set proper file permissions
echo "Setting file permissions..."
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod -R 777 application/logs/
chmod -R 777 application/cache/
chmod 644 .htaccess

# Create necessary directories if they don't exist
echo "Creating necessary directories..."
mkdir -p application/logs
mkdir -p application/cache
mkdir -p uploads
mkdir -p assets/uploads

# Set permissions for upload directories
chmod 777 uploads
chmod 777 assets/uploads

# Clear any existing cache
echo "Clearing cache..."
rm -rf application/cache/*

# Create cache directories
mkdir -p application/cache/models
mkdir -p application/cache/smarty
chmod -R 777 application/cache/

# Check if database connection works
echo "Testing database connection..."
php -r "
\$config = include 'application/config/database.php';
\$db = \$config['default'];
if (\$db['dbdriver'] === 'mysqli') {
    \$conn = new mysqli(\$db['hostname'], \$db['username'], \$db['password'], \$db['database']);
    if (\$conn->connect_error) {
        echo 'Database connection failed: ' . \$conn->connect_error . PHP_EOL;
        exit(1);
    } else {
        echo 'Database connection successful!' . PHP_EOL;
        \$conn->close();
    }
}
"

# Create robots.txt for production
echo "Creating robots.txt..."
cat > robots.txt << EOF
User-agent: *
Allow: /
Disallow: /application/
Disallow: /system/
Disallow: /admin/
Disallow: /.git/
Disallow: /database/

Sitemap: https://trulypos.com/sitemap.xml
EOF

# Create sitemap.xml
echo "Creating sitemap.xml..."
cat > sitemap.xml << EOF
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://trulypos.com/</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://trulypos.com/features</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://trulypos.com/pricing</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://trulypos.com/industries</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>https://trulypos.com/contact</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>https://trulypos.com/testimonials</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    <url>
        <loc>https://trulypos.com/buy</loc>
        <lastmod>$(date +%Y-%m-%d)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
</urlset>
EOF

# Check PHP version
echo "Checking PHP version..."
php -v

# Check required PHP extensions
echo "Checking required PHP extensions..."
php -m | grep -E "(mysqli|pdo|json|mbstring|curl|openssl|gd|xml)"

# Test .htaccess rewrite rules
echo "Testing URL rewrite..."
if curl -s -o /dev/null -w "%{http_code}" "https://trulypos.com/features" | grep -q "200"; then
    echo "URL rewrite is working correctly"
else
    echo "Warning: URL rewrite may not be working properly"
fi

# Final security check
echo "Running final security checks..."

# Check if sensitive files are protected
if curl -s "https://trulypos.com/application/config/database.php" | grep -q "403\|404"; then
    echo "✓ Application directory is protected"
else
    echo "⚠ Warning: Application directory may be accessible"
fi

echo ""
echo "Post-deployment setup completed!"
echo ""
echo "Next steps:"
echo "1. Update email SMTP credentials in admin panel"
echo "2. Configure Razorpay payment gateway"
echo "3. Set up WhatsApp API credentials"
echo "4. Change default admin password"
echo "5. Test all website functionality"
echo "6. Set up SSL certificate"
echo "7. Configure backup schedule"
echo ""
echo "Admin Panel: https://trulypos.com/admin"
echo "Default Login: admin / trulypos2025"
echo ""
echo "⚠ IMPORTANT: Change the default admin password immediately!"
