<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #dc3545; color: white; padding: 20px; text-align: center; }
        .content { padding: 30px 20px; background: #f8f9fa; }
        .detail-box { background: white; padding: 20px; margin: 15px 0; border-radius: 5px; border-left: 4px solid #007bff; }
        .priority { background: #fff3cd; padding: 15px; border-left: 4px solid #ffc107; margin: 20px 0; }
        .actions { background: #d4edda; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .btn { background: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚨 New Contact Form Submission</h1>
            <p>Immediate attention required</p>
        </div>
        
        <div class="content">
            <div class="priority">
                <h3>⚡ Priority: <?= $subject == 'Technical Support' ? 'HIGH' : 'NORMAL' ?></h3>
                <p><strong>Received:</strong> <?= date('F j, Y \a\t g:i A') ?></p>
            </div>
            
            <div class="detail-box">
                <h3>👤 Customer Information</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a></p>
                <p><strong>Phone:</strong> <?= !empty($phone) ? htmlspecialchars($phone) : 'Not provided' ?></p>
                <p><strong>Company:</strong> <?= !empty($company) ? htmlspecialchars($company) : 'Not provided' ?></p>
            </div>
            
            <div class="detail-box">
                <h3>📋 Message Details</h3>
                <p><strong>Subject:</strong> <?= htmlspecialchars($subject) ?></p>
                <p><strong>Message:</strong></p>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 10px 0;">
                    <?= nl2br(htmlspecialchars($message)) ?>
                </div>
            </div>
            
            <?php if (!empty($ip_address)): ?>
            <div class="detail-box">
                <h3>🔍 Technical Details</h3>
                <p><strong>IP Address:</strong> <?= htmlspecialchars($ip_address) ?></p>
                <p><strong>User Agent:</strong> <?= !empty($user_agent) ? htmlspecialchars($user_agent) : 'Not available' ?></p>
            </div>
            <?php endif; ?>
            
            <div class="actions">
                <h3>🎯 Recommended Actions</h3>
                <p><strong>Response Time Target:</strong> 
                    <?php if ($subject == 'Technical Support'): ?>
                        <span style="color: #dc3545;">4 hours (Priority)</span>
                    <?php else: ?>
                        <span style="color: #28a745;">24 hours (Standard)</span>
                    <?php endif; ?>
                </p>
                
                <a href="mailto:<?= htmlspecialchars($email) ?>" class="btn">📧 Reply to Customer</a>
                
                <?php if (!empty($phone)): ?>
                <a href="tel:<?= htmlspecialchars($phone) ?>" class="btn">📞 Call Customer</a>
                <a href="https://api.whatsapp.com/send?phone=<?= urlencode($phone) ?>&text=Hi%20<?= urlencode($name) ?>,%20Thank%20you%20for%20contacting%20TrulyPOS!" class="btn" style="background: #25D366;">💬 WhatsApp</a>
                <?php endif; ?>
                
                <?php if ($subject == 'Demo Request'): ?>
                <a href="<?= base_url('admin/schedule_demo?email=' . urlencode($email)) ?>" class="btn" style="background: #17a2b8;">📅 Schedule Demo</a>
                <?php endif; ?>
            </div>
            
            <p><strong>📝 Next Steps:</strong></p>
            <ol>
                <li>Acknowledge receipt to customer within 2 hours</li>
                <li>Analyze the inquiry and prepare response</li>
                <li>Respond with solution or next steps</li>
                <li>Follow up if needed</li>
                <li>Update CRM with interaction details</li>
            </ol>
        </div>
        
        <div style="background: #343a40; color: white; padding: 20px; text-align: center;">
            <p>TrulyPOS Admin Dashboard</p>
            <p><a href="<?= base_url('admin') ?>" style="color: #ffffff;">🔗 View in Admin Panel</a></p>
        </div>
    </div>
</body>
</html>
