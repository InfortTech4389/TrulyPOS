<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - TrulyPOS</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #28a745; color: white; padding: 20px; text-align: center; }
        .content { padding: 30px 20px; background: #f8f9fa; }
        .order-box { background: white; padding: 20px; margin: 15px 0; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .status { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; text-align: center; margin: 20px 0; border: 1px solid #c3e6cb; }
        .footer { background: #343a40; color: white; padding: 20px; text-align: center; }
        .btn { background: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 10px 5px; }
        .price { font-size: 24px; color: #28a745; font-weight: bold; }
        .next-steps { background: #e7f3ff; padding: 20px; border-left: 4px solid #007bff; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Order Confirmed!</h1>
            <p>Thank you for choosing TrulyPOS</p>
        </div>
        
        <div class="content">
            <p><strong>Dear <?= htmlspecialchars($customer_name) ?>,</strong></p>
            
            <p>Great news! Your TrulyPOS order has been successfully confirmed. We're excited to help transform your business operations!</p>
            
            <div class="status">
                ✅ <strong>Order Status: CONFIRMED</strong><br>
                <small>Order ID: #<?= htmlspecialchars($order_id) ?></small>
            </div>
            
            <div class="order-box">
                <h3>📦 Order Summary</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px 0;"><strong>Plan Selected:</strong></td>
                        <td style="padding: 10px 0; text-align: right;"><?= htmlspecialchars($plan_name) ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px 0;"><strong>Plan Type:</strong></td>
                        <td style="padding: 10px 0; text-align: right;"><?= ucfirst(htmlspecialchars($plan_type ?? 'Standard')) ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px 0;"><strong>Billing Cycle:</strong></td>
                        <td style="padding: 10px 0; text-align: right;"><?= ucfirst(htmlspecialchars($billing_cycle ?? 'Yearly')) ?></td>
                    </tr>
                    <tr style="border-bottom: 2px solid #007bff;">
                        <td style="padding: 15px 0;"><strong>Total Amount:</strong></td>
                        <td style="padding: 15px 0; text-align: right;" class="price">₹<?= number_format($amount) ?></td>
                    </tr>
                </table>
            </div>
            
            <div class="order-box">
                <h3>👤 Customer Details</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($customer_name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($customer_email) ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($customer_phone) ?></p>
                <?php if (!empty($company_name)): ?>
                <p><strong>Company:</strong> <?= htmlspecialchars($company_name) ?></p>
                <?php endif; ?>
            </div>
            
            <div class="next-steps">
                <h3>🚀 What's Next?</h3>
                <ol>
                    <li><strong>Complete Payment:</strong> Click the payment link below to secure your license</li>
                    <li><strong>License Delivery:</strong> Your license key will be sent via email once payment is confirmed</li>
                    <li><strong>Download Software:</strong> Access the download link in your license email</li>
                    <li><strong>Setup Support:</strong> Our team will help you get started</li>
                </ol>
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="<?= base_url('payment/process/' . $order_id) ?>" class="btn" style="background: #28a745; font-size: 18px;">
                    💳 Complete Payment - ₹<?= number_format($amount) ?>
                </a>
            </div>
            
            <div style="text-align: center;">
                <a href="<?= base_url('home/features') ?>" class="btn">📚 View Features</a>
                <a href="<?= base_url('contact') ?>" class="btn">❓ Need Help?</a>
                <a href="<?= base_url('home/faq') ?>" class="btn">🤔 View FAQ</a>
            </div>
            
            <div style="background: #fff3cd; padding: 15px; border-radius: 5px; margin: 25px 0; border-left: 4px solid #ffc107;">
                <h4>💡 Pro Tip:</h4>
                <p>Complete your payment within 24 hours to ensure priority processing and faster license delivery!</p>
            </div>
            
            <p><strong>Need Assistance?</strong></p>
            <p>Our support team is here to help:</p>
            <ul>
                <li>📧 Email: support@trulypos.com</li>
                <li>📞 Phone: +91 9876543210</li>
                <li>💬 WhatsApp: +91 9876543210</li>
                <li>🕐 Business Hours: 9 AM - 6 PM (Mon-Fri)</li>
            </ul>
            
            <p>Thank you for choosing TrulyPOS. We're committed to helping your business succeed!</p>
            
            <p><strong>Best regards,</strong><br>
            The TrulyPOS Team</p>
        </div>
        
        <div class="footer">
            <p>&copy; <?= date('Y') ?> TrulyPOS. All rights reserved.</p>
            <p>🌐 <a href="<?= base_url() ?>" style="color: #ffffff;">www.trulypos.com</a></p>
            <p><small>Order Reference: #<?= htmlspecialchars($order_id) ?> | Processed on <?= date('F j, Y \a\t g:i A') ?></small></p>
        </div>
    </div>
</body>
</html>
