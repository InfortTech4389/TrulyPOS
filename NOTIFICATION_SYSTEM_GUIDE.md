# TrulyPOS Email & WhatsApp Notification System

## Overview

The TrulyPOS notification system provides comprehensive email and WhatsApp notifications for all business operations. This system handles customer communications, order confirmations, license deliveries, and administrative notifications.

## 🚀 Features

### ✅ Email Notifications
- **Contact Form Submissions** - Customer acknowledgment + admin notifications
- **Order Confirmations** - Professional order confirmation emails with details
- **License Delivery** - Automated license key delivery after payment
- **Demo Requests** - Demo scheduling confirmations
- **Newsletter Welcome** - Welcome emails for new subscribers
- **Custom Email Templates** - Beautiful, responsive HTML templates

### 📱 WhatsApp Notifications
- **Multiple Service Integration** - Twilio, MSG91, UltraMsg support
- **Message Templates** - Pre-defined templates for different notification types
- **Business Hours Respect** - Smart sending within business hours
- **Rate Limiting** - Prevents spam and respects API limits
- **Fallback Options** - WhatsApp link generation for manual sending

### 📊 Notification Management
- **Comprehensive Logging** - All notifications logged with status
- **Statistics Dashboard** - Success/failure rates and analytics
- **Error Handling** - Graceful fallbacks and error reporting
- **Template Management** - Easy template customization

## 📁 File Structure

```
application/
├── config/
│   ├── email.php                 # Email configuration
│   └── whatsapp.php             # WhatsApp service configuration
├── libraries/
│   └── Notification_service.php # Main notification service
├── views/emails/
│   ├── contact_acknowledgment.php
│   ├── contact_admin.php
│   ├── order_confirmation.php
│   ├── license_delivery.php
│   └── newsletter_welcome.php
├── controllers/
│   └── Notification_test.php    # Testing controller
└── database/
    └── notification_logs.sql    # Database schema
```

## ⚙️ Configuration

### Email Configuration (`application/config/email.php`)

```php
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = 'your-email@gmail.com';
$config['smtp_pass'] = 'your-app-password';
$config['smtp_crypto'] = 'tls';
$config['mailtype'] = 'html';
```

### WhatsApp Configuration (`application/config/whatsapp.php`)

#### Twilio Setup
```php
$config['whatsapp_service'] = 'twilio';
$config['twilio_account_sid'] = 'YOUR_TWILIO_SID';
$config['twilio_auth_token'] = 'YOUR_TWILIO_TOKEN';
$config['twilio_whatsapp_number'] = '+14155238886';
```

#### MSG91 Setup
```php
$config['whatsapp_service'] = 'msg91';
$config['msg91_auth_key'] = 'YOUR_MSG91_KEY';
$config['msg91_template_id'] = 'YOUR_TEMPLATE_ID';
```

#### UltraMsg Setup
```php
$config['whatsapp_service'] = 'ultramsg';
$config['ultramsg_token'] = 'YOUR_ULTRAMSG_TOKEN';
$config['ultramsg_instance_id'] = 'YOUR_INSTANCE_ID';
```

## 💻 Usage Examples

### Basic Usage

```php
// Load the notification service
$this->load->library('Notification_service');

// Send contact form notification
$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'phone' => '+919876543210',
    'subject' => 'Technical Support',
    'message' => 'Need help with setup'
];

$results = $this->notification_service->send_notification('contact_form', $data);
```

### Order Confirmation

```php
$order_data = [
    'customer_name' => 'Jane Smith',
    'email' => 'jane@example.com',
    'phone' => '+919876543211',
    'order_id' => 'ORD-12345',
    'plan_name' => 'Growth',
    'amount' => 25000
];

$this->notification_service->send_notification('order_confirmation', $order_data);
```

### License Delivery

```php
$license_data = [
    'customer_name' => 'Mike Johnson',
    'email' => 'mike@example.com',
    'phone' => '+919876543212',
    'license_key' => 'TPOS-ABCD-1234',
    'plan_name' => 'Enterprise',
    'download_link' => 'https://trulypos.com/download'
];

$this->notification_service->send_notification('license_delivery', $license_data);
```

### Email Only

```php
$this->notification_service->send_email('contact_form', $data);
```

### WhatsApp Only

```php
$this->notification_service->send_whatsapp('order_confirmation', $data);
```

## 📧 Email Templates

### Template Variables

All email templates support these common variables:
- `{customer_name}` - Customer's name
- `{email}` - Customer's email
- `{phone}` - Customer's phone number
- `{order_id}` - Order ID
- `{amount}` - Order amount
- `{plan_name}` - Selected plan name
- `{license_key}` - License key
- Plus template-specific variables

### Custom Templates

Create custom email templates in `application/views/emails/`:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Custom Template</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <h1>Hello <?= htmlspecialchars($customer_name) ?>!</h1>
    <p>Your custom message here...</p>
</body>
</html>
```

## 📱 WhatsApp Templates

### Available Templates

```php
// Order confirmation template
"🎉 *Order Confirmed!*\n\nHi {customer_name}!\n\nYour TrulyPOS order has been confirmed:\n\n📦 *Order ID:* {order_id}\n💰 *Amount:* ₹{amount}\n📋 *Plan:* {plan_name}\n\nWe'll send your license details once payment is confirmed.\n\nThanks for choosing TrulyPOS! 🚀"

// License delivery template
"🔑 *Your TrulyPOS License is Ready!*\n\nHi {customer_name}!\n\n✅ Payment confirmed\n🔐 *License Key:* {license_key}\n📋 *Plan:* {plan_name}\n💾 *Download:* {download_link}\n\nNeed help? Contact us anytime!\n\nWelcome to TrulyPOS family! 🎉"
```

### Custom WhatsApp Templates

Add custom templates in `application/config/whatsapp.php`:

```php
$config['whatsapp_templates']['custom_template'] = "Your custom WhatsApp message with {variables}";
```

## 🗄️ Database Schema

### Notification Logs Table

```sql
CREATE TABLE notification_logs (
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
```

## 🧪 Testing

### Test All Notifications

Visit: `http://your-domain.com/notification_test`

This provides:
- ✅ Individual notification testing
- 📊 Statistics dashboard
- ⚙️ Configuration validation
- 🔍 Error diagnostics

### Test Individual Types

```
/notification_test/test_contact     - Contact form notification
/notification_test/test_order       - Order confirmation
/notification_test/test_license     - License delivery
/notification_test/test_demo        - Demo request
/notification_test/test_newsletter  - Newsletter welcome
/notification_test/whatsapp_test    - WhatsApp configuration
```

## 📊 Monitoring & Statistics

### Get Notification Statistics

```php
$stats = $this->notification_service->get_notification_stats(30); // Last 30 days
print_r($stats);
```

### Sample Output

```php
Array (
    [total] => 150
    [email_success] => 142
    [email_failed] => 3
    [whatsapp_success] => 89
    [whatsapp_failed] => 2
    [by_type] => Array (
        [contact_form] => 45
        [order_confirmation] => 32
        [license_delivery] => 28
        [demo_request] => 25
        [newsletter_welcome] => 20
    )
)
```

## 🔧 Controller Integration

### Contact Controller

```php
public function submit() {
    // ... form validation ...
    
    $notification_data = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone' => $this->input->post('phone'),
        'subject' => $this->input->post('subject'),
        'message' => $this->input->post('message')
    ];
    
    $this->notification_service->send_notification('contact_form', $notification_data);
}
```

### Buy Controller

```php
public function checkout() {
    // ... order creation ...
    
    $notification_data = [
        'customer_name' => $order_data['customer_name'],
        'email' => $order_data['customer_email'],
        'phone' => $order_data['customer_phone'],
        'order_id' => $order_id,
        'plan_name' => $order_data['plan_name'],
        'amount' => $order_data['amount']
    ];
    
    $this->notification_service->send_notification('order_confirmation', $notification_data);
}
```

### Payment Controller

```php
public function process() {
    // ... payment processing ...
    
    $notification_data = [
        'customer_name' => $order->customer_name,
        'email' => $order->customer_email,
        'phone' => $order->customer_phone,
        'license_key' => $license_key,
        'plan_name' => $order->plan_name,
        'order_id' => $order->id
    ];
    
    $this->notification_service->send_notification('license_delivery', $notification_data);
}
```

## 🚨 Error Handling

### Graceful Fallbacks

The system includes automatic fallbacks:
- Email failures don't affect WhatsApp delivery
- Template loading errors use default templates
- API failures are logged for debugging
- Invalid phone numbers are cleaned automatically

### Error Logging

All errors are logged to:
- CodeIgniter error logs
- Database notification logs
- Custom log messages for debugging

## 🔐 Security Features

### Input Sanitization
- All user inputs are sanitized using `htmlspecialchars()`
- Email validation using `filter_var()`
- Phone number cleaning and validation

### Rate Limiting
- Configurable rate limits for WhatsApp
- Business hours respect
- Duplicate prevention

### Template Security
- XSS protection in email templates
- Secure variable substitution
- Safe HTML rendering

## 🌟 Best Practices

### Configuration
1. Use environment variables for sensitive data
2. Set up proper SMTP authentication
3. Configure WhatsApp service properly
4. Test all notification types before production

### Templates
1. Keep templates responsive for mobile devices
2. Use clear, professional language
3. Include unsubscribe links where required
4. Test templates across different email clients

### Monitoring
1. Regularly check notification statistics
2. Monitor failed delivery rates
3. Update templates based on user feedback
4. Keep configuration up to date

## 🆘 Troubleshooting

### Common Issues

#### Email Not Sending
1. Check SMTP configuration
2. Verify email credentials
3. Check firewall settings
4. Test with different email providers

#### WhatsApp Not Working
1. Verify API credentials
2. Check phone number format
3. Ensure service is active
4. Test with different phone numbers

#### Templates Not Loading
1. Check file permissions
2. Verify template path
3. Ensure template syntax is correct
4. Test template loading manually

### Debug Mode
Enable debug mode in notification service:

```php
$config['notification_debug'] = true;
```

This will log detailed information about all notification attempts.

## 📞 Support

For support with the notification system:

- 📧 Email: support@trulypos.com
- 📞 Phone: +91 9876543210
- 💬 WhatsApp: +91 9876543210
- 🌐 Website: https://trulypos.com

## 📋 Checklist

### Pre-Production Checklist

- [ ] Email configuration tested
- [ ] WhatsApp service configured
- [ ] All templates reviewed
- [ ] Notification testing completed
- [ ] Database table created
- [ ] Error handling verified
- [ ] Statistics dashboard working
- [ ] Security measures in place
- [ ] Rate limiting configured
- [ ] Monitoring set up

### Go-Live Checklist

- [ ] Production email credentials set
- [ ] WhatsApp service activated
- [ ] All notification types working
- [ ] Backup notification method ready
- [ ] Team trained on system
- [ ] Documentation accessible
- [ ] Error alerts configured
- [ ] Performance monitoring active

---

**Last Updated:** <?= date('F j, Y') ?>  
**Version:** 1.0.0  
**System:** TrulyPOS Notification Service
