<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your TrulyPOS License is Ready!</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #007bff, #28a745); color: white; padding: 30px 20px; text-align: center; }
        .content { padding: 30px 20px; background: #f8f9fa; }
        .license-box { background: white; padding: 25px; margin: 20px 0; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 2px solid #28a745; }
        .license-key { background: #f8f9fa; padding: 20px; border: 2px dashed #007bff; border-radius: 8px; text-align: center; font-family: monospace; font-size: 18px; font-weight: bold; color: #007bff; margin: 15px 0; }
        .success { background: #d4edda; color: #155724; padding: 20px; border-radius: 5px; text-align: center; margin: 20px 0; border: 1px solid #c3e6cb; }
        .footer { background: #343a40; color: white; padding: 20px; text-align: center; }
        .btn { background: #28a745; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 5px; font-weight: bold; }
        .btn-secondary { background: #007bff; }
        .steps { background: white; padding: 20px; margin: 20px 0; border-radius: 8px; border-left: 4px solid #007bff; }
        .warning { background: #fff3cd; padding: 15px; border-radius: 5px; border-left: 4px solid #ffc107; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔑 Your TrulyPOS License is Ready!</h1>
            <p style="font-size: 18px; margin: 0;">Congratulations on your successful purchase!</p>
        </div>
        
        <div class="content">
            <p><strong>Dear <?= htmlspecialchars($customer_name) ?>,</strong></p>
            
            <div class="success">
                ✅ <strong>Payment Confirmed & License Activated!</strong><br>
                <small>Your TrulyPOS journey begins now</small>
            </div>
            
            <p>Fantastic! Your payment has been successfully processed and your TrulyPOS license is now active. You're all set to revolutionize your business operations!</p>
            
            <div class="license-box">
                <h3 style="color: #28a745; margin-top: 0;">🎫 Your License Details</h3>
                
                <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 8px 0;"><strong>License Key:</strong></td>
                        <td style="padding: 8px 0;"></td>
                    </tr>
                </table>
                
                <div class="license-key">
                    <?= htmlspecialchars($license_key) ?>
                </div>
                
                <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 8px 0;"><strong>Plan:</strong></td>
                        <td style="padding: 8px 0; text-align: right;"><?= htmlspecialchars($plan_name) ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 8px 0;"><strong>License Status:</strong></td>
                        <td style="padding: 8px 0; text-align: right; color: #28a745;"><strong>ACTIVE</strong></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 8px 0;"><strong>Valid From:</strong></td>
                        <td style="padding: 8px 0; text-align: right;"><?= date('F j, Y') ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Order ID:</strong></td>
                        <td style="padding: 8px 0; text-align: right;">#<?= htmlspecialchars($order_id) ?></td>
                    </tr>
                </table>
            </div>
            
            <div class="steps">
                <h3>🚀 Getting Started - Next Steps</h3>
                <ol style="margin: 0; padding-left: 20px;">
                    <li><strong>Download TrulyPOS:</strong> Use the download link below to get the latest version</li>
                    <li><strong>Install Software:</strong> Run the installer and follow the setup wizard</li>
                    <li><strong>Enter License Key:</strong> Copy and paste your license key when prompted</li>
                    <li><strong>Complete Setup:</strong> Configure your business settings and start using TrulyPOS</li>
                </ol>
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="<?= $download_link ?? 'https://trulypos.com/download' ?>" class="btn" style="font-size: 18px;">
                    💾 Download TrulyPOS Now
                </a>
            </div>
            
            <div style="text-align: center;">
                <a href="<?= base_url('home/features') ?>" class="btn btn-secondary">📖 User Guide</a>
                <a href="<?= base_url('contact') ?>" class="btn btn-secondary">🛠️ Get Support</a>
                <a href="<?= base_url('home/faq') ?>" class="btn btn-secondary">❓ FAQ</a>
            </div>
            
            <div class="warning">
                <h4>🔒 Important Security Notes:</h4>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>Keep your license key secure and confidential</li>
                    <li>Do not share your license key with unauthorized users</li>
                    <li>Save this email for future reference</li>
                    <li>Contact support immediately if you suspect unauthorized use</li>
                </ul>
            </div>
            
            <div style="background: #e7f3ff; padding: 20px; border-radius: 8px; margin: 25px 0; border-left: 4px solid #007bff;">
                <h4>📞 Need Help Getting Started?</h4>
                <p>Our setup support team is ready to help you:</p>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li><strong>📧 Email Support:</strong> support@trulypos.com</li>
                    <li><strong>📞 Phone Support:</strong> +91 9876543210</li>
                    <li><strong>💬 WhatsApp Support:</strong> +91 9876543210</li>
                    <li><strong>🕐 Support Hours:</strong> 9 AM - 6 PM (Mon-Fri)</li>
                </ul>
                <p><small>💡 Pro tip: Schedule a free setup call to get personalized assistance!</small></p>
            </div>
            
            <div style="background: #d1ecf1; padding: 20px; border-radius: 8px; margin: 25px 0;">
                <h4>🎉 What's Included in Your Plan:</h4>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>✅ Complete POS & Billing System</li>
                    <li>✅ Inventory Management</li>
                    <li>✅ Customer Database</li>
                    <li>✅ Sales Reports & Analytics</li>
                    <li>✅ GST Compliant Invoicing</li>
                    <li>✅ Multi-payment Options</li>
                    <li>✅ Regular Updates & Support</li>
                </ul>
            </div>
            
            <p>Welcome to the TrulyPOS family! We're excited to be part of your business success story. If you have any questions or need assistance, our team is always here to help.</p>
            
            <p><strong>Thank you for choosing TrulyPOS!</strong></p>
            
            <p><strong>Best regards,</strong><br>
            The TrulyPOS Team<br>
            🌐 www.trulypos.com</p>
        </div>
        
        <div class="footer">
            <p>&copy; <?= date('Y') ?> TrulyPOS. All rights reserved.</p>
            <p>📧 support@trulypos.com | 📞 +91 9876543210</p>
            <p><small>License Key: <?= htmlspecialchars($license_key) ?> | Order: #<?= htmlspecialchars($order_id) ?></small></p>
        </div>
    </div>
</body>
</html>
