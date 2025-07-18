<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TrulyPOS Newsletter!</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #007bff, #6610f2); color: white; padding: 30px 20px; text-align: center; }
        .content { padding: 30px 20px; background: #f8f9fa; }
        .welcome-box { background: white; padding: 25px; margin: 20px 0; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-left: 4px solid #28a745; }
        .footer { background: #343a40; color: white; padding: 20px; text-align: center; }
        .btn { background: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 5px; }
        .benefits { background: #e7f3ff; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .social-links { text-align: center; margin: 20px 0; }
        .social-links a { display: inline-block; margin: 0 10px; padding: 10px; background: #007bff; color: white; border-radius: 50%; text-decoration: none; width: 40px; height: 40px; line-height: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Welcome to TrulyPOS Newsletter!</h1>
            <p style="font-size: 18px; margin: 0;">Thanks for joining our community!</p>
        </div>
        
        <div class="content">
            <p><strong>Hello <?= htmlspecialchars($name ?? 'Subscriber') ?>!</strong></p>
            
            <div class="welcome-box">
                <h3 style="color: #28a745; margin-top: 0;">✨ You're Now Part of the TrulyPOS Family!</h3>
                <p>Thank you for subscribing to our newsletter. You've just taken the first step towards staying updated with the latest in POS technology, business tips, and exclusive offers!</p>
            </div>
            
            <div class="benefits">
                <h3>📬 What You'll Receive:</h3>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>📰 <strong>Weekly Updates:</strong> Latest features and product news</li>
                    <li>💡 <strong>Business Tips:</strong> Expert advice to grow your business</li>
                    <li>🎯 <strong>Exclusive Offers:</strong> Special discounts and early access</li>
                    <li>📚 <strong>Industry Insights:</strong> Trends and best practices</li>
                    <li>🛠️ <strong>How-to Guides:</strong> Step-by-step tutorials and tips</li>
                    <li>🎉 <strong>Product Launches:</strong> Be the first to know about new features</li>
                </ul>
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <h3>🚀 Ready to Transform Your Business?</h3>
                <p>While you're here, why not explore what TrulyPOS can do for your business?</p>
                
                <a href="<?= base_url('home/features') ?>" class="btn">🔍 Explore Features</a>
                <a href="<?= base_url('contact/demo') ?>" class="btn" style="background: #28a745;">📅 Book Free Demo</a>
                <a href="<?= base_url('pricing') ?>" class="btn" style="background: #ffc107; color: #333;">💰 View Pricing</a>
            </div>
            
            <div style="background: #fff3cd; padding: 20px; border-radius: 8px; margin: 25px 0; border-left: 4px solid #ffc107;">
                <h4>💡 Quick Start Guide:</h4>
                <ol style="margin: 10px 0; padding-left: 20px;">
                    <li>Check out our <a href="<?= base_url('home/faq') ?>">FAQ section</a> for common questions</li>
                    <li>Read our <a href="<?= base_url('home/blog') ?>">latest blog posts</a> for business insights</li>
                    <li>Follow us on social media for daily tips</li>
                    <li>Contact our support team if you need help</li>
                </ol>
            </div>
            
            <div class="social-links">
                <h4>🌐 Connect With Us</h4>
                <a href="#" title="Facebook">📘</a>
                <a href="#" title="Twitter">🐦</a>
                <a href="#" title="LinkedIn">💼</a>
                <a href="#" title="Instagram">📷</a>
                <a href="#" title="YouTube">📺</a>
            </div>
            
            <div style="background: #d1ecf1; padding: 20px; border-radius: 8px; margin: 25px 0;">
                <h4>📞 Need Help?</h4>
                <p>Our support team is always ready to assist you:</p>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>📧 Email: support@trulypos.com</li>
                    <li>📞 Phone: +91 9876543210</li>
                    <li>💬 WhatsApp: +91 9876543210</li>
                    <li>🕐 Support Hours: 9 AM - 6 PM (Mon-Fri)</li>
                </ul>
            </div>
            
            <div style="text-align: center; margin: 30px 0; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                <h4>🎁 Special Welcome Offer!</h4>
                <p>As a new subscriber, enjoy <strong>20% OFF</strong> on any TrulyPOS plan!</p>
                <p><strong>Use code:</strong> <code style="background: #007bff; color: white; padding: 5px 10px; border-radius: 3px;">WELCOME20</code></p>
                <p><small>*Valid for 30 days from subscription date</small></p>
                
                <a href="<?= base_url('pricing') ?>" class="btn" style="background: #dc3545;">🛒 Claim Offer Now</a>
            </div>
            
            <p>Thank you for choosing TrulyPOS. We're excited to help you succeed!</p>
            
            <p><strong>Best regards,</strong><br>
            The TrulyPOS Team<br>
            🌐 www.trulypos.com</p>
            
            <hr style="border: none; border-top: 1px solid #ddd; margin: 30px 0;">
            
            <p style="font-size: 12px; color: #666;">
                You're receiving this email because you subscribed to TrulyPOS newsletter. 
                If you no longer wish to receive these emails, you can 
                <a href="<?= base_url('newsletter/unsubscribe?email=' . urlencode($email)) ?>" style="color: #007bff;">unsubscribe here</a>.
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; <?= date('Y') ?> TrulyPOS. All rights reserved.</p>
            <p>📍 Mumbai, Maharashtra, India</p>
            <p>📧 support@trulypos.com | 📞 +91 9876543210</p>
        </div>
    </div>
</body>
</html>
