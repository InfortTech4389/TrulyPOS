# TrulyPOS - Complete Point of Sale Solution

TrulyPOS is a comprehensive point-of-sale (POS) software solution designed for retail businesses in India. Built with CodeIgniter 3.x framework, it provides inventory management, GST-compliant billing, customer management, and business analytics.

## Features

- **Inventory Management**: Complete stock management with barcode scanning
- **GST Billing**: Fully compliant with Indian GST regulations
- **Multi-Store Support**: Manage multiple locations from a single system
- **Customer Management**: Track customer purchases and loyalty programs
- **Payment Integration**: Razorpay payment gateway integration
- **Reports & Analytics**: Comprehensive business reporting
- **User Management**: Role-based access control
- **Offline Operation**: Works without internet connectivity
- **Responsive Design**: Mobile-friendly interface
- **Fast Loading**: Optimized images, CSS/JS minification, and caching
- **Security**: CSRF protection, XSS filtering, and secure headers

### 📄 Core Pages
- **Homepage**: Hero section, features overview, testimonials, and CTA
- **Features**: Detailed feature descriptions with icons and benefits
- **Live Demo**: Interactive demo with sample credentials
- **Pricing**: Flexible pricing plans with comparison table
- **Buy Now**: Secure payment integration with Razorpay
- **About Us**: Company information and team profiles
- **Contact**: Contact form with validation and email notifications
- **Blog**: Content management system for articles and updates
- **FAQ**: Frequently asked questions with search functionality
- **Testimonials**: Customer reviews and success stories

### 💳 Payment Integration
- **Razorpay Gateway**: Secure payment processing
- **Order Management**: Complete order tracking and management
- **License Generation**: Automatic license key generation and delivery
- **Invoice System**: PDF invoice generation and email delivery
- **Refund Support**: Automated refund processing

### 👨‍💼 Admin Panel
- **Dashboard**: Analytics and quick overview
- **Order Management**: Track and manage customer orders
- **License Management**: Activate/deactivate licenses
- **Content Management**: Update website content dynamically
- **User Management**: Admin user access control
- **Settings**: System configuration and customization

### 🔐 Security Features
- **CSRF Protection**: Cross-site request forgery protection
- **XSS Filtering**: Cross-site scripting prevention
- **SQL Injection Protection**: Parameterized queries
- **Session Security**: Secure session management
- **Input Validation**: Server-side form validation
- **File Upload Security**: Secure file handling

## Technology Stack

### Backend
- **Framework**: CodeIgniter 3.x
- **Language**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Payment Gateway**: Razorpay API
- **Email**: CodeIgniter Email Library

### Frontend
- **CSS Framework**: Bootstrap 5.3
- **JavaScript**: jQuery 3.6
- **Icons**: Font Awesome 6.0
- **Fonts**: Google Fonts (Inter)
- **Animations**: CSS3 animations and transitions

### Development Tools
- **Version Control**: Git
- **Package Manager**: Composer (optional)
- **Task Runner**: Custom scripts
- **Testing**: PHPUnit (optional)

## Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- mod_rewrite enabled
- CURL extension enabled
- OpenSSL extension enabled

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/InfortTech4389/TrulyPOS.git
   cd TrulyPOS
   ```

2. **Configure the database**
   - Create a new MySQL database named `trulypos_website`
   - Import the SQL file: `database/trulypos_website.sql`
   - Update database credentials in `application/config/database.php`

3. **Configure the application**
   - Update base URL in `application/config/config.php`
   - Set encryption key in `application/config/config.php`
   - Configure email settings in `application/config/email.php`

4. **Set up payment gateway**
   - Sign up for Razorpay account
   - Update API keys in `application/libraries/Payment_gateway.php`
   - Configure webhook URLs in Razorpay dashboard

5. **Configure file permissions**
   ```bash
   chmod 755 application/cache
   chmod 755 application/logs
   chmod 755 assets/uploads
   ```

6. **Set up virtual host**
   - Point document root to the project directory
   - Enable mod_rewrite for clean URLs
   - Configure SSL certificate (recommended)

## Quick Start

1. **Import the database** from `database/trulypos_website.sql`
2. **Configure database settings** in `application/config/database.php`
3. **Update base URL** in `application/config/config.php`
4. **Set up payment gateway** credentials
5. **Access the website** at your configured URL

## Project Structure

```
TrulyPOS/
├── application/
│   ├── config/         # Configuration files
│   ├── controllers/    # Controller files
│   ├── models/         # Model files
│   ├── views/          # View files
│   └── libraries/      # Custom libraries
├── assets/
│   ├── css/           # Stylesheets
│   ├── js/            # JavaScript files
│   └── images/        # Images and media
├── database/          # Database schema
├── system/            # CodeIgniter core files
├── .htaccess          # Apache configuration
└── index.php          # Entry point
```

## Configuration

### Database Setup
```php
// application/config/database.php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'trulypos_website',
);
```

### Payment Gateway
```php
// application/libraries/Payment_gateway.php
private $razorpay_key = 'rzp_test_YOUR_KEY_HERE';
private $razorpay_secret = 'YOUR_SECRET_KEY_HERE';
```

### Email Configuration
```php
// application/config/email.php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_user'] = 'your-email@gmail.com';
$config['smtp_pass'] = 'your-password';
```

## Usage

### Admin Panel
- URL: `/admin`
- Default credentials: `admin` / `admin123`
- Features: Order management, content editing, system settings

### Payment Processing
- Integrated with Razorpay for secure payments
- Automatic license generation and delivery
- Order tracking and management

### Content Management
- Dynamic content management for features, testimonials, blog
- SEO-friendly URLs and meta tags
- Responsive design for all devices

## Support

For support and documentation:
- **Email**: support@trulypos.com
- **Phone**: +91 9876543210
- **Website**: https://trulypos.com

## License

This project is proprietary software owned by InfortTech4389. All rights reserved.

---

**Version**: 1.0.0  
**Last Updated**: January 2025  
**Maintained by**: InfortTech4389 Team