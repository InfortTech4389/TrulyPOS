<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Website Routes
$route['home'] = 'home/index';
$route['features'] = 'home/features';
$route['demo'] = 'home/demo';
$route['pricing'] = 'home/pricing';
$route['buy'] = 'home/buy';
$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['blog'] = 'home/blog';
$route['blog/(:any)'] = 'home/blog_post/$1';
$route['faq'] = 'home/faq';
$route['testimonials'] = 'testimonials/index';
$route['testimonials/(:any)'] = 'testimonials/category/$1';

// Setup Routes
$route['setup'] = 'setupdb/index';
$route['setup/run'] = 'setupdb/run';
$route['setup/test_connection'] = 'setupdb/test';

// Newsletter Route
$route['newsletter/subscribe'] = 'home/newsletter_subscribe';

// Feature Detail Routes
$route['features/sales_billing'] = 'features/sales_billing';
$route['features/purchases_vendors'] = 'features/purchases_vendors';
$route['features/inventory_management'] = 'features/inventory_management';
$route['features/multi_location'] = 'features/multi_location';
$route['features/customer_management'] = 'features/customer_management';
$route['features/reporting_analytics'] = 'features/reporting_analytics';
$route['features/accounting'] = 'features/accounting';
$route['features/products_catalog'] = 'features/products_catalog';
$route['features/user_management'] = 'features/user_management';
$route['features/hardware_integration'] = 'features/hardware_integration';
$route['features/taxation_compliance'] = 'features/taxation_compliance';
$route['features/mobile_online'] = 'features/mobile_online';
$route['features/integrations'] = 'features/integrations';
$route['features/other_features'] = 'features/other_features';
$route['features/support_security'] = 'features/support_security';

// Payment Routes
$route['payment/process'] = 'payment/process';
$route['payment/success'] = 'payment/success';
$route['payment/cancel'] = 'payment/cancel';

// Contact Routes
$route['contact'] = 'contact/index';
$route['contact/submit'] = 'contact/submit';
$route['contact/demo'] = 'contact/demo';
$route['contact/demo_submit'] = 'contact/demo_submit';

// Admin Routes (comprehensive)
$route['admin'] = 'admin/index';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/authenticate'] = 'admin/authenticate';

// Customer Management
$route['admin/customers'] = 'admin/customers';
$route['admin/customers/(:num)'] = 'admin/customers/$1';
$route['admin/customer_details/(:num)'] = 'admin/customer_details/$1';
$route['admin/send_customer_message'] = 'admin/send_customer_message';

// Payment Management
$route['admin/payments'] = 'admin/payments';
$route['admin/payments/(:num)'] = 'admin/payments/$1';
$route['admin/payment_details/(:num)'] = 'admin/payment_details/$1';
$route['admin/update_payment_status'] = 'admin/update_payment_status';
$route['admin/process_refund'] = 'admin/process_refund';
$route['admin/send_payment_receipt'] = 'admin/send_payment_receipt';

// Enquiry Management
$route['admin/enquiries'] = 'admin/enquiries';
$route['admin/enquiries/(:num)'] = 'admin/enquiries/$1';
$route['admin/enquiry_details/(:num)'] = 'admin/enquiry_details/$1';
$route['admin/respond_enquiry'] = 'admin/respond_enquiry';
$route['admin/get_enquiry_details/(:num)'] = 'admin/get_enquiry_details/$1';
$route['admin/set_enquiry_priority'] = 'admin/set_enquiry_priority';
$route['admin/mark_all_enquiries_read'] = 'admin/mark_all_enquiries_read';

// License Management
$route['admin/licenses'] = 'admin/licenses';
$route['admin/licenses/(:num)'] = 'admin/licenses/$1';
$route['admin/license_details/(:num)'] = 'admin/license_details/$1';

// Newsletter Management
$route['admin/newsletter'] = 'admin/newsletter';
$route['admin/newsletter/(:num)'] = 'admin/newsletter/$1';
$route['admin/send_newsletter'] = 'admin/send_newsletter';

// Notification Management
$route['admin/notifications'] = 'admin/notifications';

// Settings
$route['admin/settings'] = 'admin/settings';
$route['admin/update_settings'] = 'admin/update_settings';

// Legacy Admin Routes (for backward compatibility)
$route['admin/contacts'] = 'admin/enquiries';
$route['admin/testimonials'] = 'admin/testimonials';
$route['admin/orders'] = 'admin/payments';
$route['admin/newsletter_subscribers'] = 'admin/newsletter';

// API Routes
$route['api/contact'] = 'api/contact/submit';
$route['api/newsletter'] = 'api/newsletter/subscribe';
$route['api/demo'] = 'api/demo/request';

// Industry Routes
$route['industries'] = 'industries/index';
$route['industries/apparel-footwear'] = 'industries/apparel_footwear';
$route['industries/electronics-computers'] = 'industries/electronics_computers';
$route['industries/hypermarket-departmental'] = 'industries/hypermarket_departmental';
$route['industries/lifestyle-fashion'] = 'industries/lifestyle_fashion';
$route['industries/pharma-healthcare'] = 'industries/pharma_healthcare';
$route['industries/supermarket-groceries'] = 'industries/supermarket_groceries';
$route['industries/specialized-retail'] = 'industries/specialized_retail';
$route['industries/restaurant'] = 'industries/restaurant';
$route['pricing'] = 'pricing/index';
$route['buy'] = 'buy/index';
$route['buy/checkout'] = 'buy/checkout';
$route['404_override'] = '';
