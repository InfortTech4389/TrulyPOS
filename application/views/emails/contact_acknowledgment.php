<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for contacting TrulyPOS</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #007bff; color: white; padding: 20px; text-align: center; }
        .content { padding: 30px 20px; background: #f8f9fa; }
        .footer { background: #343a40; color: white; padding: 20px; text-align: center; }
        .btn { background: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 0; }
        .highlight { background: #fff3cd; padding: 15px; border-left: 4px solid #ffc107; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🙏 Thank You for Contacting TrulyPOS!</h1>
        </div>
        
        <div class="content">
            <p><strong>Dear <?= htmlspecialchars($name) ?>,</strong></p>
            
            <p>Thank you for reaching out to us! We've received your message and appreciate you taking the time to contact TrulyPOS.</p>
            
            <div class="highlight">
                <h3>📋 Your Message Details:</h3>
                <p><strong>Subject:</strong> <?= htmlspecialchars($subject) ?></p>
                <p><strong>Submitted:</strong> <?= date('F j, Y \a\t g:i A') ?></p>
            </div>
            
            <p><strong>⏰ What happens next?</strong></p>
            <ul>
                <li>Our support team will review your message</li>
                <li>We'll respond within <strong>24 hours</strong> during business days</li>
                <li>For urgent matters, you can call us at <strong>+91 9876543210</strong></li>
            </ul>
            
            <p>While you wait, feel free to explore our resources:</p>
            
            <a href="<?= base_url('home/features') ?>" class="btn">📚 Browse Features</a>
            <a href="<?= base_url('home/faq') ?>" class="btn">❓ View FAQ</a>
            <a href="<?= base_url('contact/demo') ?>" class="btn">🎯 Request Demo</a>
            
            <p>Thank you for considering TrulyPOS for your business needs!</p>
            
            <p><strong>Best regards,</strong><br>
            TrulyPOS Support Team<br>
            📧 support@trulypos.com<br>
            📞 +91 9876543210</p>
        </div>
        
        <div class="footer">
            <p>&copy; <?= date('Y') ?> TrulyPOS. All rights reserved.</p>
            <p>🌐 <a href="<?= base_url() ?>" style="color: #ffffff;">www.trulypos.com</a></p>
        </div>
    </div>
</body>
</html>
