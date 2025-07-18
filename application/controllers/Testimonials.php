<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Testimonial_model');
    }

    public function index()
    {
        $data['title'] = 'Customer Testimonials - TrulyPOS';
        $data['meta_description'] = 'Real customer testimonials and reviews from businesses across India using TrulyPOS - Smart Billing & Inventory Software.';
        
        // Get testimonials data from database
        $data['featured_testimonials'] = $this->Testimonial_model->get_featured_testimonials(12);
        $data['all_testimonials'] = $this->Testimonial_model->get_all_testimonials();
        $data['testimonial_stats'] = $this->Testimonial_model->get_testimonial_stats();
        
        $this->load->view('templates/header', $data);
        $this->load->view('testimonials/index', $data);
        $this->load->view('templates/footer');
    }

    public function category($category = null)
    {
        if (!$category) {
            redirect('testimonials');
        }
        
        $data['title'] = ucfirst($category) . ' Testimonials - TrulyPOS';
        $data['meta_description'] = 'Customer testimonials from ' . $category . ' businesses using TrulyPOS.';
        
        $data['category'] = $category;
        $data['testimonials'] = $this->Testimonial_model->get_testimonials_by_category($category);
        
        $this->load->view('templates/header', $data);
        $this->load->view('testimonials/category', $data);
        $this->load->view('templates/footer');
    }
}
?>
                'category' => 'Auto Parts'
            ],
            [
                'name' => 'Ritu Verma',
                'business' => 'Daily Fresh Mart',
                'location' => 'Satellite, Ahmedabad, Gujarat',
                'review' => 'I\'ve been able to expand my grocery store\'s product range because Truly POS makes it easy to manage SKUs, prices, and batches. My team learned the billing process in a single day, and our checkout lines have gotten much shorter. I rely on the daily sales and stock reports to plan my orders and promotions. GST return filing has become effortless thanks to the POS\'s detailed reports. Customers enjoy the printed bills and the WhatsApp option for receipts. I\'m glad I chose Truly POS.',
                'rating' => 5,
                'category' => 'Grocery'
            ],
            [
                'name' => 'Rajeev Menon',
                'business' => 'Crescent Medical Store',
                'location' => 'Anna Nagar, Chennai, Tamil Nadu',
                'review' => 'With Truly POS, I never have to worry about medicine expiry or missing out on sales. The software\'s batch and expiry alerts are a lifesaver. The GST billing is accurate, and supplier management is smooth. When the pandemic hit, Truly POS helped me manage curbside pickups and fast, contactless billing. I also use the data export for easy accounting at year-end. Truly POS has made my pharmacy smarter and more responsive to customer needs.',
                'rating' => 5,
                'category' => 'Pharmacy'
            ],
            [
                'name' => 'Sana Shaikh',
                'business' => 'Glamour Touch Beauty Lounge',
                'location' => 'Bandra, Mumbai, Maharashtra',
                'review' => 'Appointment scheduling and product billing used to be manual and time-consuming at my salon. Truly POS combines both in one screen, letting us bill services and products in a single invoice. Gift vouchers and loyalty points are now simple to track, which has boosted our repeat business. Daily closing and cash tracking have become quick and transparent. Support is always patient and helpful whenever we have questions. Truly POS is the best investment I\'ve made for my salon.',
                'rating' => 5,
                'category' => 'Beauty Salon'
            ],
            [
                'name' => 'Nitin Aggarwal',
                'business' => 'TechHub Mobiles',
                'location' => 'Sector 18, Noida, Uttar Pradesh',
                'review' => 'I run a busy mobile and accessories store, and keeping track of fast-moving items, IMEI numbers, and warranty claims is a daily challenge. Truly POS\'s barcode system and IMEI tracking are a huge advantage. I can now see my top-selling products in real time and set up combo offers easily. Even my new staff can process exchanges without any confusion. End-of-month profit and loss statements are now just a click away. This system has made my shop more efficient and profitable.',
                'rating' => 5,
                'category' => 'Mobile Store'
            ],
            [
                'name' => 'Rashmi Pillai',
                'business' => 'Rainbow Gifts & Novelties',
                'location' => 'MG Road, Pune, Maharashtra',
                'review' => 'Gift shops require managing hundreds of small items and seasonal offers, and Truly POS handles it all beautifully. I can run festival discounts with just a few clicks, and my inventory is always up to date. The interface is bright and easy for my staff to learn. Customers like the variety of payment options and clear, itemized bills. I also love being able to check my store\'s daily sales from my mobile. Truly POS is the perfect partner for any gift shop owner.',
                'rating' => 5,
                'category' => 'Gift Shop'
            ],
            [
                'name' => 'Akash Chatterjee',
                'business' => 'Bookscape Library & Store',
                'location' => 'South City, Kolkata, West Bengal',
                'review' => 'Truly POS has made cataloging and selling books much easier for us. Barcoding lets us scan and bill fast, and managing returns is now systematic. The built-in customer database helps with our library\'s membership renewals and book reservations. Even during book fairs, we can handle high volume without mistakes. Daily and monthly sales reports are detailed and easy to share with our partners. Truly POS really supports independent bookstores.',
                'rating' => 5,
                'category' => 'Bookstore'
            ],
            [
                'name' => 'Tanvi Desai',
                'business' => 'Happy Feet Footwear',
                'location' => 'Law Garden, Ahmedabad, Gujarat',
                'review' => 'Our store has shoes for every age group, and keeping track of sizes and designs was hard before. Truly POS lets us quickly update our inventory and set different pricing for clearance sales. The GST invoicing is straightforward, and returns are handled seamlessly. My team loves how quick the system is during busy weekends. I also appreciate the clear stock transfer feature for our new branch. Truly POS is a must-have for footwear retailers.',
                'rating' => 5,
                'category' => 'Footwear'
            ],
            [
                'name' => 'Satinder Kaur',
                'business' => 'Green Valley Agro Center',
                'location' => 'GT Road, Amritsar, Punjab',
                'review' => 'We stock fertilizers, seeds, and farming tools, so our billing has to handle bulk sales and farmer credits. Truly POS manages all of it efficiently. Bulk purchase and credit tracking are built-in, and my accountant finds GST compliance easy with the software\'s reports. I have also noticed fewer mistakes in stock management. The support team understands the needs of agro dealers very well. This has made my work less stressful and my customers more satisfied.',
                'rating' => 5,
                'category' => 'Agro Center'
            ],
            [
                'name' => 'Devashish Sinha',
                'business' => 'City Fresh Supermarket',
                'location' => 'Civil Lines, Kanpur, Uttar Pradesh',
                'review' => 'My supermarket\'s old billing system was slow and unreliable, leading to long queues and upset customers. Truly POS changed everything—the billing speed is amazing, and inventory updates in real time. I get daily, weekly, and monthly sales trends that help me plan my marketing. My staff find it easy to handle discounts and offers, and the barcode scanning is flawless. Even returns are now easy for customers. I am able to run my business with much more confidence.',
                'rating' => 5,
                'category' => 'Supermarket'
            ],
            [
                'name' => 'Leena George',
                'business' => 'Florista Boutique',
                'location' => 'Residency Road, Bengaluru, Karnataka',
                'review' => 'As a florist, managing fresh inventory and last-minute orders is tough. Truly POS gives me expiry alerts for flowers and quick billing for both walk-in and online orders. Custom billing lets me add personal notes for wedding or event bouquets. The dashboard gives me a quick view of my best-selling products every week. Customers love getting their invoices instantly via WhatsApp. Truly POS has helped my shop stand out in a competitive market.',
                'rating' => 5,
                'category' => 'Florist'
            ],
            [
                'name' => 'Amit Solanki',
                'business' => 'Solanki Tyre World',
                'location' => 'Bhavnagar Road, Rajkot, Gujarat',
                'review' => 'Our tyre shop deals with multiple brands and types, and inventory tracking was a headache. With Truly POS, we can easily manage stock, handle party credits, and generate GST-compliant invoices. Warranty and serial numbers are tracked in every bill, which helps when customers come back for replacements. Staff can now serve customers faster and more accurately. The mobile dashboard gives me sales updates even when I\'m traveling. Truly POS has modernized our business.',
                'rating' => 5,
                'category' => 'Tyre Shop'
            ],
            [
                'name' => 'Sangeeta Joshi',
                'business' => 'Kids Planet Toy Store',
                'location' => 'Model Town, Ludhiana, Punjab',
                'review' => 'My toy shop\'s inventory keeps changing with new trends, so I need a system that\'s flexible. Truly POS lets me add new products quickly and organize them by category. The offers and combo billing features are great during festivals. My staff can check what\'s in stock instantly, avoiding disappointed customers. I also love being able to review sales reports from my phone at home. Truly POS is perfect for specialty retail.',
                'rating' => 5,
                'category' => 'Toy Store'
            ],
            [
                'name' => 'Deepak Yadav',
                'business' => 'Om Sai Kirana Stores',
                'location' => 'Dilsukhnagar, Hyderabad, Telangana',
                'review' => 'Truly POS has made my kirana store much more efficient. Now, I never run out of fast-moving goods thanks to automatic low-stock alerts. Billing lines move quickly, even during morning rush hours. I can set up customer credits for regulars and track payments easily. GST returns are much simpler because of the software\'s clear reports. My customers love getting digital receipts through WhatsApp. I\'m very happy with this POS.',
                'rating' => 5,
                'category' => 'Kirana Store'
            ],
            [
                'name' => 'Parul Soni',
                'business' => 'The Stationery Nook',
                'location' => 'Sector 22, Chandigarh, Punjab',
                'review' => 'Stocking hundreds of stationery items with frequent price changes was tough before. Truly POS lets me update prices and offers in bulk, and the barcode billing is super quick. Students appreciate the itemized bills and digital payment options. End-of-day closing takes minutes, and my accountant loves the export feature. Customer queries about stock or discounts can be answered instantly. It\'s a huge upgrade over my previous billing system.',
                'rating' => 5,
                'category' => 'Stationery'
            ],
            [
                'name' => 'Shivani Shah',
                'business' => 'Shivani\'s Fashion Boutique',
                'location' => 'Navrangpura, Ahmedabad, Gujarat',
                'review' => 'My boutique deals with a lot of walk-ins and custom orders, and Truly POS has made it all manageable. It lets me track fabric usage, set multiple pricing, and handle special festival offers easily. The professional bills add a premium touch for my clients. I have noticed fewer billing errors and better stock management. Even returns and exchanges are easy to process now. I couldn\'t imagine running my boutique without Truly POS.',
                'rating' => 5,
                'category' => 'Fashion'
            ],
            [
                'name' => 'Aashish Pandey',
                'business' => 'Sai Mobile Gallery',
                'location' => 'Civil Lines, Prayagraj, Uttar Pradesh',
                'review' => 'Earlier, IMEI tracking and managing fast-moving accessories was a real pain. Truly POS has brought order to my store. Barcoded bills, easy returns, and customer database make it easier to serve every visitor. Festival offers are easy to set up. I rely on the sales analysis to choose what to stock up on for the next month. My whole staff learned to use it within a few days.',
                'rating' => 5,
                'category' => 'Mobile Store'
            ],
            [
                'name' => 'Reshma Fernandes',
                'business' => 'Pet Wellness Care',
                'location' => 'Vasco da Gama, Goa',
                'review' => 'Our pet supply shop is now truly digital! Truly POS tracks our products and also lets us manage pet grooming appointments. The SMS reminders make sure clients never miss a booking. Detailed stock and sales reports help us identify which products and services are most profitable. The system\'s mobile dashboard is a bonus for me as I often travel for pet shows. Customers appreciate the professional billing and digital payment options.',
                'rating' => 5,
                'category' => 'Pet Store'
            ],
            [
                'name' => 'Gaurav Tiwari',
                'business' => 'ElectroHub Appliances',
                'location' => 'Hazaratganj, Lucknow, Uttar Pradesh',
                'review' => 'My appliance store needed a billing solution that could handle warranties, serial numbers, and different price schemes. Truly POS ticks all those boxes. Warranty details are printed right on the customer\'s bill, and barcode billing saves us time. I particularly like the easy way to transfer stock between my two shops. My accountant also finds the data export for GST filing simple and reliable. Support has always been prompt.',
                'rating' => 5,
                'category' => 'Appliances'
            ],
            [
                'name' => 'Preeti Nair',
                'business' => 'Sunrise Pharmacy',
                'location' => 'Marine Drive, Kochi, Kerala',
                'review' => 'Tracking medicine expiry and supplier payments used to be stressful, but Truly POS changed all that. The automatic batch and expiry management means I never lose money on expired stock. GST billing is now error-free, and staff can handle complex sales with confidence. The loyalty rewards have helped us retain more regular customers. I can also quickly check all my sales data remotely, which is perfect for a busy owner.',
                'rating' => 5,
                'category' => 'Pharmacy'
            ],
            [
                'name' => 'Manoj Chavan',
                'business' => 'City Fresh Fruits & Veggies',
                'location' => 'Swargate, Pune, Maharashtra',
                'review' => 'Before Truly POS, keeping up with changing prices and perishable stock was overwhelming. Now, price updates and stock corrections are done in seconds. Billing is quick and accurate, and even during festival rushes, there\'s no delay at checkout. I can see best-selling items and slow movers easily, which helps reduce waste. The mobile app keeps me in control, even when I\'m away from the shop. I recommend it to every grocer.',
                'rating' => 5,
                'category' => 'Grocery'
            ],
            [
                'name' => 'Aisha Khan',
                'business' => 'StyleHub Ladies Store',
                'location' => 'Lalbagh, Lucknow, Uttar Pradesh',
                'review' => 'Running a ladies\' fashion store means managing returns, exchanges, and hundreds of SKUs. Truly POS lets me track everything efficiently, from size and color to special orders. The return/exchange feature saves us time and customer complaints have gone down. I can also set up flash sales and loyalty offers with just a few clicks. The dashboard is clear and easy to use, even for my junior staff. I\'m delighted with the software.',
                'rating' => 5,
                'category' => 'Fashion'
            ],
            [
                'name' => 'Girish Rao',
                'business' => 'TechStore Computers',
                'location' => 'Residency Road, Bengaluru, Karnataka',
                'review' => 'Selling laptops, accessories, and offering repair services was always a juggling act. Truly POS now keeps my inventory, sales, and service orders all organized. The system tracks serial numbers and warranty periods automatically, which means fewer mistakes. My staff process returns and exchanges confidently, and reports are detailed yet easy to read. I also appreciate the frequent updates with new features. Truly POS is built for tech stores like ours.',
                'rating' => 5,
                'category' => 'Computer Store'
            ],
            [
                'name' => 'Neeta Dubey',
                'business' => 'Shubh Shringar Jewels',
                'location' => 'Sadar Bazaar, Gwalior, Madhya Pradesh',
                'review' => 'Our jewelry store needed a professional solution for inventory and GST billing. Truly POS lets me set up gold, silver, and diamond SKUs, update rates, and manage customer orders smoothly. The bills look polished and professional, impressing our clients. Staff picked up the system quickly and I can track sales remotely, which is helpful during wedding season. The customer database helps us stay in touch with regulars for special offers.',
                'rating' => 5,
                'category' => 'Jewelry'
            ],
            [
                'name' => 'Ajay Shetty',
                'business' => 'Shetty\'s Tyre Point',
                'location' => 'Kundapura, Karnataka',
                'review' => 'Tyre sales, party credits, and warranty tracking are now part of our daily routine, thanks to Truly POS. Stock transfers to my second location are seamless, and the software handles GST perfectly. The team at Truly POS always helps out when I have a doubt. Billing is fast, reducing customer wait times, and daily reports help me stay on top of profit margins. It\'s a complete package for auto accessory retailers.',
                'rating' => 5,
                'category' => 'Tyre Shop'
            ],
            [
                'name' => 'Shweta Mehra',
                'business' => 'EcoMart Organic Grocers',
                'location' => 'Khar, Mumbai, Maharashtra',
                'review' => 'Managing organic produce means daily stock rotation and checking expiry. Truly POS gives me real-time stock updates and expiry alerts, which means I waste much less. The barcode system is fast and easy, and my staff find it simple to train new hires. Billing is always smooth, and customers enjoy getting their receipts via WhatsApp. My store is running better than ever.',
                'rating' => 5,
                'category' => 'Organic Store'
            ],
            [
                'name' => 'Ravindra Sahu',
                'business' => 'Mohanlal General Store',
                'location' => 'Gandhi Chowk, Bilaspur, Chhattisgarh',
                'review' => 'Truly POS is perfect for my busy general store. From regular sales to credit accounts for regulars, the software tracks everything. The automated low-stock alerts keep our inventory full. I can export reports for GST with one click. Customers also love the new digital payment options we now offer. Truly POS is a game-changer for small businesses.',
                'rating' => 5,
                'category' => 'General Store'
            ],
            [
                'name' => 'Yamini Pillai',
                'business' => 'Book Café Express',
                'location' => 'Jubilee Hills, Hyderabad, Telangana',
                'review' => 'Running a café inside a bookstore means tracking sales for both food and books. Truly POS combines both in one neat dashboard. I can quickly apply offers, process returns, and check stock levels from my phone. Customers get their bills instantly, and my team is much faster during busy weekends. Accounting and GST reports are always accurate and ready.',
                'rating' => 5,
                'category' => 'Café'
            ],
            [
                'name' => 'Abhishek Dey',
                'business' => 'Royal Home Decor',
                'location' => 'Ballygunge, Kolkata, West Bengal',
                'review' => 'Home décor involves big-ticket items and fast-moving accessories, and Truly POS keeps track of everything. The barcode system is robust, and I love being able to generate custom bills for special orders. My accountant uses the data export for tax time, which is now much less stressful. Sales analysis is detailed and helps me plan my inventory for the next season.',
                'rating' => 5,
                'category' => 'Home Decor'
            ],
            [
                'name' => 'Pooja Sharma',
                'business' => 'Kids Choice Stationers',
                'location' => 'Rajouri Garden, New Delhi',
                'review' => 'My stationery shop\'s inventory keeps growing, but Truly POS lets me add and update items with ease. I love how fast billing is, especially during school season. Combo offers are easy to set up, and the system\'s reports help me keep track of profit and stock turnover. Even my senior staff picked up the software in no time.',
                'rating' => 5,
                'category' => 'Stationery'
            ],
            [
                'name' => 'Ramesh Bhagat',
                'business' => 'Bhagat Sports & Fitness',
                'location' => 'Shaniwar Peth, Pune, Maharashtra',
                'review' => 'Truly POS manages both my sports equipment sales and the gym membership section. Stocking, returns, and billing are all done in minutes. My staff can check inventory from the POS, and the support team is very responsive. GST billing and monthly profit analysis are easy. The software grows with my business.',
                'rating' => 5,
                'category' => 'Sports'
            ],
            [
                'name' => 'Kavita Jain',
                'business' => 'Jain Luggage & Bags',
                'location' => 'Ambedkar Chowk, Nagpur, Maharashtra',
                'review' => 'Seasonal stock, combo deals, and returns are all simple with Truly POS. Billing is fast, and my customers like the professional printed invoices. The dashboard lets me track daily sales and profit easily. I\'ve also started using the loyalty program, which has improved repeat business. The mobile app keeps me in control on the go.',
                'rating' => 5,
                'category' => 'Luggage'
            ],
            [
                'name' => 'Karan Singh',
                'business' => 'Singh\'s Tyre Bazaar',
                'location' => 'Civil Lines, Bhopal, Madhya Pradesh',
                'review' => 'My tyre business needed a solution for bulk billing, party credit, and stock transfers. Truly POS handles all these with ease. My team can process warranties, and GST reports are accurate. The mobile dashboard means I never miss a sale, even when I\'m traveling. Support is always helpful and prompt.',
                'rating' => 5,
                'category' => 'Tyre Shop'
            ],
            [
                'name' => 'Mitali Deshmukh',
                'business' => 'Craftopia Handicrafts',
                'location' => 'Viman Nagar, Pune, Maharashtra',
                'review' => 'As a handicraft retailer, I have to manage a huge variety of items, each with its own pricing and details. Truly POS lets me add products with pictures and track bestsellers. Sales trends help me prepare for festival seasons. Customers love the WhatsApp billing option, and my staff find inventory tracking much easier now. The software is reliable and updated often.',
                'rating' => 5,
                'category' => 'Handicrafts'
            ],
            [
                'name' => 'Alok Varma',
                'business' => 'Sunshine Pharma',
                'location' => 'Chinhat, Lucknow, Uttar Pradesh',
                'review' => 'Truly POS gives my pharmacy complete control over expiry, batches, and supplier payments. My team can quickly check stock and print GST bills, making sales much faster. The support team always responds to our questions, and new features are added regularly. The dashboard helps me keep an eye on sales and profitability.',
                'rating' => 5,
                'category' => 'Pharmacy'
            ],
            [
                'name' => 'Priya Reddy',
                'business' => 'Elegance Cosmetics',
                'location' => 'Banjara Hills, Hyderabad, Telangana',
                'review' => 'My cosmetics shop benefits from quick billing and detailed inventory tracking with Truly POS. Combo offers, returns, and loyalty points are all easy to set up. I can review sales trends to see what to stock up for each festival. Customers love getting their receipts instantly on WhatsApp. Truly POS has made business fun and efficient.',
                'rating' => 5,
                'category' => 'Cosmetics'
            ],
            [
                'name' => 'Vikas Shah',
                'business' => 'Shah Agro Products',
                'location' => 'Mandvi, Surat, Gujarat',
                'review' => 'My agro supplies store deals with seasonal sales, credits, and supplier management. Truly POS automates all these tasks. Billing and bulk sales are faster, and GST returns are now much easier. The support team is always available. Stock transfers between outlets are seamless, and the mobile app gives me instant updates.',
                'rating' => 5,
                'category' => 'Agro Products'
            ],
            [
                'name' => 'Aarti Mehta',
                'business' => 'Modern Book Corner',
                'location' => 'Hazratganj, Lucknow, Uttar Pradesh',
                'review' => 'With Truly POS, my bookstore handles both school textbooks and novels easily. Adding new SKUs is fast, and daily billing is accurate. The dashboard is clear and helps me plan new book orders. My staff can print detailed bills and manage returns without confusion. The loyalty program keeps students coming back.',
                'rating' => 5,
                'category' => 'Bookstore'
            ],
            [
                'name' => 'Naveen Gupta',
                'business' => 'Gupta Hardware Mart',
                'location' => 'Sector 17, Chandigarh, Punjab',
                'review' => 'Hardware and paint store management is now automated with Truly POS. Bulk product updates, GST billing, and party credits are now error-free. I can check my stock and sales from home, which helps me balance family and business. Customers appreciate the quick service at the counter.',
                'rating' => 5,
                'category' => 'Hardware'
            ],
            [
                'name' => 'Rashmi Joshi',
                'business' => 'Eco Fresh Grocery',
                'location' => 'Dadar, Mumbai, Maharashtra',
                'review' => 'My grocery\'s biggest challenge was tracking perishable items and pricing changes. Truly POS lets me update prices instantly and keeps a close eye on fast-moving goods. Stock and profit reports are detailed, and the WhatsApp billing is a big hit with our customers. I love the clean, modern dashboard.',
                'rating' => 5,
                'category' => 'Grocery'
            ],
            [
                'name' => 'Rajat Sinha',
                'business' => 'Sinha Home Needs',
                'location' => 'Raja Bazar, Patna, Bihar',
                'review' => 'Running a general store means managing a lot of moving parts. Truly POS tracks credit accounts, supplier orders, and daily sales with no fuss. The reports help me plan new stock orders and analyze profit. My staff find billing much faster, and customer lines are shorter. It\'s a smart choice for any shop owner.',
                'rating' => 5,
                'category' => 'General Store'
            ],
            [
                'name' => 'Sonali Shekhar',
                'business' => 'Blossom Florist',
                'location' => 'Gandhi Market, Jabalpur, Madhya Pradesh',
                'review' => 'Running a florist shop means handling lots of small, perishable stock and frequent last-minute orders. Truly POS\'s expiry alerts help me reduce wastage and keep track of what\'s fresh. The system is quick to bill even during festival rush, and customers are happy with the digital payment options. I also love being able to see which flower varieties sell best each week. Staff learned to use it very quickly, and I can manage the business from my mobile anytime.',
                'rating' => 5,
                'category' => 'Florist'
            ],
            [
                'name' => 'Yogesh Deshpande',
                'business' => 'Galaxy Electronics Hub',
                'location' => 'Pimpri, Pune, Maharashtra',
                'review' => 'My electronics store carries many brands and gadgets, and earlier warranty tracking and inventory checks were confusing. With Truly POS, every item is easily billed with its barcode, and warranties are printed on the receipt. The dashboard gives me sales and profit insights daily, which help with ordering new stock. The support team is responsive and regularly adds new features. My staff are now more confident and our customer service has improved.',
                'rating' => 5,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Farida Khan',
                'business' => 'Spice Route Kirana',
                'location' => 'Charminar, Hyderabad, Telangana',
                'review' => 'Truly POS changed how I manage my kirana store. From quick billing to automatic low-stock reminders, everything is streamlined. GST returns are a breeze, and digital payment support means I can serve more customers each day. The bulk item update saves me time on stock changes. My regulars love getting their bill copies on WhatsApp, and I\'ve gained new customers because checkout is so fast now.',
                'rating' => 5,
                'category' => 'Kirana Store'
            ],
            [
                'name' => 'Pranav Mehta',
                'business' => 'Urban Tyres & Wheels',
                'location' => 'Paldi, Ahmedabad, Gujarat',
                'review' => 'Truly POS helps me keep tabs on tyre models, sizes, and party credit accounts. The serial number tracking is very useful when customers return for warranty claims. During festival sales, the system handled high volume effortlessly and the end-of-day reports are comprehensive. My accountant also uses the export feature to Tally, which makes filing taxes much simpler. This software has boosted my confidence as a business owner.',
                'rating' => 5,
                'category' => 'Tyre Shop'
            ],
            [
                'name' => 'Shalini Singh',
                'business' => 'The Gift Gallery',
                'location' => 'South Extension, New Delhi',
                'review' => 'My gift shop always has new arrivals and seasonal offers. Truly POS makes it easy to add items, change prices, and apply combo deals. The software tracks fast-moving items so I never miss out on sales. Customers love the clear, colorful bills and the option to pay via UPI. I review daily sales trends on my phone and plan new stock accordingly. Billing errors have almost disappeared since we adopted this system.',
                'rating' => 5,
                'category' => 'Gift Shop'
            ],
            [
                'name' => 'Ajit Pillai',
                'business' => 'Healthy Living Organics',
                'location' => 'Fort, Kochi, Kerala',
                'review' => 'Our store focuses on organic and health products, which means keeping a close eye on expiry dates. Truly POS\'s expiry management and low-stock alerts are incredibly helpful. Billing is accurate and quick, even during busy weekends. The system\'s sales analysis helps me identify trends and adjust stock for the next month. My staff picked up the software very quickly. Support is friendly and always ready to answer our queries.',
                'rating' => 5,
                'category' => 'Organic Store'
            ],
            [
                'name' => 'Mehul Shah',
                'business' => 'ElectroCity Appliances',
                'location' => 'SG Highway, Ahmedabad, Gujarat',
                'review' => 'From big-ticket items to accessories, Truly POS handles my entire stock easily. Serial number tracking and warranty billing give customers confidence. My staff can process sales and returns quickly, and the reports help me decide what to promote next. We manage two outlets now and stock transfer is seamless. Truly POS has helped my business scale without the usual chaos.',
                'rating' => 5,
                'category' => 'Appliances'
            ],
            [
                'name' => 'Simran Kapoor',
                'business' => 'Simran\'s Style Studio',
                'location' => 'Hiranandani Gardens, Powai, Mumbai, Maharashtra',
                'review' => 'My boutique constantly rotates collections, and Truly POS lets me add new arrivals and update pricing in no time. The loyalty program keeps my regulars coming back. GST invoicing and return management are very straightforward, so my team can focus on customer service. Even seasonal sales are a breeze now. The mobile app lets me track the shop while I\'m away for sourcing trips.',
                'rating' => 5,
                'category' => 'Fashion'
            ],
            [
                'name' => 'Rohit Prasad',
                'business' => 'Rohit\'s General Store',
                'location' => 'Sadar Bazar, Kanpur, Uttar Pradesh',
                'review' => 'Managing a busy general store was stressful before Truly POS. Now, inventory, party credits, and GST billing are all automatic. The daily profit and loss reports help me analyze sales and reduce waste. My staff adapted to the system in just a few days. Digital receipts are appreciated by our customers and have reduced disputes over purchases.',
                'rating' => 5,
                'category' => 'General Store'
            ],
            [
                'name' => 'Maya Rao',
                'business' => 'Maya\'s Fine Foods',
                'location' => 'Residency Road, Bengaluru, Karnataka',
                'review' => 'Our specialty food shop needed a system to handle both packaged and fresh goods. Truly POS makes it simple to update prices, track expiry, and run offers during festivals. Customers get detailed, professional bills, and the WhatsApp receipts are a hit. The reporting dashboard lets me see which items to restock, helping us avoid shortages. I\'m glad we chose Truly POS for our growing business.',
                'rating' => 5,
                'category' => 'Food Store'
            ],
            [
                'name' => 'Aman Joshi',
                'business' => 'Books & Beyond',
                'location' => 'Rajendra Place, New Delhi',
                'review' => 'Selling school books and stationery was chaotic until we switched to Truly POS. Barcoding lets us handle sales and returns quickly, even during peak season. I love how easy it is to manage stock and create combo offers for students. The dashboard helps me plan inventory for the next semester. End-of-day closing is fast and I can track profits easily. Truly POS is made for bookshops.',
                'rating' => 5,
                'category' => 'Bookstore'
            ],
            [
                'name' => 'Seema Menon',
                'business' => 'Home Essentials',
                'location' => 'Elamakkara, Kochi, Kerala',
                'review' => 'Our homeware shop now runs smoothly thanks to Truly POS. Bulk uploads make adding new stock fast, and customers love the modern, detailed invoices. I can apply discounts during clearance sales with just a few clicks. The sales analysis shows which products are most popular, so I can adjust my buying strategy. Even my oldest staff member now handles billing with ease.',
                'rating' => 5,
                'category' => 'Home Decor'
            ],
            [
                'name' => 'Arvind Kumar',
                'business' => 'Kumar Agro Mart',
                'location' => 'Kankarbagh, Patna, Bihar',
                'review' => 'As an agro supplier, tracking bulk inventory and credits for farmers was a headache. Truly POS has made these tasks automatic and error-free. I can see real-time stock, bill in bulk, and manage GST with confidence. The mobile dashboard lets me check on sales from anywhere in the field. My staff picked up the software quickly and now spend less time on manual work.',
                'rating' => 5,
                'category' => 'Agro Products'
            ],
            [
                'name' => 'Tina D\'Souza',
                'business' => 'D\'Souza Stationery Hub',
                'location' => 'Vasco, Goa',
                'review' => 'Truly POS has streamlined our busy stationery shop. The barcode system makes billing lightning fast, and the loyalty program keeps schoolchildren coming back. Stock updates are quick and I can always check what\'s selling best. During exam season, even large crowds are handled smoothly. My accountant uses the export feature for tax filing, which is a big relief for me.',
                'rating' => 5,
                'category' => 'Stationery'
            ],
            [
                'name' => 'Vinay Mehta',
                'business' => 'Mehta Footwear',
                'location' => 'Anna Salai, Chennai, Tamil Nadu',
                'review' => 'With shoes of different sizes and brands, stock management was a struggle. Truly POS lets me categorize products easily and set up clearance offers in seconds. Billing is faster than ever and customers like the branded, colorful receipts. Stock transfer between my two shops is seamless. I use the sales analytics to predict demand and minimize unsold inventory.',
                'rating' => 5,
                'category' => 'Footwear'
            ],
            [
                'name' => 'Shikha Aggarwal',
                'business' => 'Springfield Gifts',
                'location' => 'Park Lane, Jaipur, Rajasthan',
                'review' => 'Gifting is a seasonal business and Truly POS keeps me ahead with quick product addition and combo offers. My staff can now track stock and apply discounts on the spot. Customers enjoy the professional, detailed bills and digital payment support. The end-of-day reports help me plan for upcoming festivals. The support team always helps promptly when we have questions.',
                'rating' => 5,
                'category' => 'Gift Shop'
            ],
            [
                'name' => 'Abhay Pillai',
                'business' => 'Pillai Mobile Point',
                'location' => 'JP Nagar, Bengaluru, Karnataka',
                'review' => 'Selling mobiles and accessories requires tracking IMEIs and warranties, and Truly POS makes it effortless. The barcode billing is smooth and exchanges are now managed without hassle. I use the profit reports to plan which brands to promote. My staff can handle festival rushes easily and customers get instant WhatsApp receipts. The regular updates keep adding new features we need.',
                'rating' => 5,
                'category' => 'Mobile Store'
            ],
            [
                'name' => 'Mona Rathi',
                'business' => 'Little Champs Toy Land',
                'location' => 'Laxmi Road, Pune, Maharashtra',
                'review' => 'Our toy shop has hundreds of SKUs and new arrivals each month. Truly POS lets us update inventory and billing quickly, so we\'re always ready for the next trend. The combo offer and loyalty features are especially useful. Billing errors have gone down, and the staff enjoy using the mobile dashboard to track sales. The support team is friendly and proactive.',
                'rating' => 5,
                'category' => 'Toy Store'
            ],
            [
                'name' => 'Tarun Sethi',
                'business' => 'Sethi Hardware & Paints',
                'location' => 'Nayapalli, Bhubaneswar, Odisha',
                'review' => 'Hardware billing and credit management were always tough before Truly POS. Now, even large party orders and supplier credits are tracked easily. My accountant loves the GST-ready reports, and bulk price updates save us a lot of time. The barcode billing impresses our customers. Staff find it simple to use, and returns are managed with zero confusion.',
                'rating' => 5,
                'category' => 'Hardware'
            ],
            [
                'name' => 'Krupa Desai',
                'business' => 'Krupa\'s Chemist & Wellness',
                'location' => 'Science City, Ahmedabad, Gujarat',
                'review' => 'Managing a pharmacy with hundreds of products and expiry dates was overwhelming. Truly POS gives automatic expiry and batch alerts, reducing wastage. GST billing is simple, and I can offer loyalty points to my regulars. The sales reports help me reorder only what\'s needed. My team adapted to the system quickly and customers appreciate the clear, fast service.',
                'rating' => 5,
                'category' => 'Pharmacy'
            ]
        ];
    }
}
