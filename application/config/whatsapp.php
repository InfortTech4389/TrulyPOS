<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| WhatsApp Notification Configuration
| -------------------------------------------------------------------------
| This file contains the configuration for WhatsApp notifications
|
*/

// WhatsApp API Configuration
$config['whatsapp_api_url'] = 'https://api.whatsapp.com/send'; // Basic WhatsApp API
$config['whatsapp_business_api'] = ''; // WhatsApp Business API endpoint if available

// Third-party WhatsApp service (like Twilio, MSG91, or similar)
$config['whatsapp_service'] = 'twilio'; // Options: 'twilio', 'msg91', 'ultramsg', 'custom'

// Twilio Configuration
$config['twilio_account_sid'] = ''; // Your Twilio Account SID
$config['twilio_auth_token'] = ''; // Your Twilio Auth Token
$config['twilio_whatsapp_number'] = ''; // Your Twilio WhatsApp number (e.g., +14155238886)

// MSG91 Configuration
$config['msg91_auth_key'] = ''; // Your MSG91 Auth Key
$config['msg91_template_id'] = ''; // Your MSG91 Template ID

// UltraMsg Configuration
$config['ultramsg_token'] = ''; // Your UltraMsg Token
$config['ultramsg_instance_id'] = ''; // Your UltraMsg Instance ID

// Message Templates
$config['whatsapp_templates'] = [
    'order_confirmation' => "🎉 *Order Confirmed!*\n\nHi {customer_name}!\n\nYour TrulyPOS order has been confirmed:\n\n📦 *Order ID:* {order_id}\n💰 *Amount:* ₹{amount}\n📋 *Plan:* {plan_name}\n\nWe'll send your license details once payment is confirmed.\n\nThanks for choosing TrulyPOS! 🚀",
    
    'license_delivery' => "🔑 *Your TrulyPOS License is Ready!*\n\nHi {customer_name}!\n\n✅ Payment confirmed\n🔐 *License Key:* {license_key}\n📋 *Plan:* {plan_name}\n💾 *Download:* {download_link}\n\nNeed help? Contact us anytime!\n\nWelcome to TrulyPOS family! 🎉",
    
    'contact_acknowledgment' => "📩 *Message Received!*\n\nHi {customer_name}!\n\nThanks for contacting us. We've received your message:\n\n📋 *Subject:* {subject}\n\nOur team will respond within 24 hours.\n\nTrulyPOS Support Team 💼",
    
    'demo_scheduled' => "📅 *Demo Scheduled!*\n\nHi {customer_name}!\n\nYour TrulyPOS demo is scheduled:\n\n🕐 *Time:* {demo_time}\n📞 *Meeting Link:* {meeting_link}\n\nPrepare your questions - we're excited to show you TrulyPOS!\n\nSee you soon! 👋",
    
    'payment_reminder' => "⏰ *Payment Reminder*\n\nHi {customer_name}!\n\nYour order is pending payment:\n\n📦 *Order ID:* {order_id}\n💰 *Amount:* ₹{amount}\n\nComplete payment to activate your license:\n{payment_link}\n\nNeed help? Contact us anytime!",
    
    'support_ticket' => "🎫 *Support Ticket Created*\n\nHi {customer_name}!\n\n🆔 *Ticket ID:* {ticket_id}\n📋 *Issue:* {issue_title}\n\nOur technical team is on it. Expected resolution: {estimated_time}\n\nTrack status: {ticket_link}\n\nTrulyPOS Support 🛠️"
];

// Business hours for WhatsApp sending
$config['whatsapp_business_hours'] = [
    'start_time' => '09:00',
    'end_time' => '21:00',
    'timezone' => 'Asia/Kolkata'
];

// Rate limiting
$config['whatsapp_rate_limit'] = [
    'max_messages_per_minute' => 10,
    'max_messages_per_hour' => 100,
    'max_messages_per_day' => 1000
];

// Enable/disable WhatsApp notifications
$config['whatsapp_enabled'] = true;
$config['whatsapp_log_messages'] = true;
