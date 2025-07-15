<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Testimonial_model');
    }

    public function index()
    {
        $data['title'] = 'Customer Testimonials - TrulyPOS';
        $data['meta_description'] = 'Real customer testimonials and reviews from businesses across India using TrulyPOS - Smart Billing & Inventory Software.';
        
        // Get testimonials data
        $data['testimonials'] = $this->get_testimonials_data();
        
        $this->load->view('templates/header', $data);
        $this->load->view('testimonials/index', $data);
        $this->load->view('templates/footer');
    }

    private function get_testimonials_data()
    {
        return [
            [
                'name' => 'Priya Malhotra',
                'business' => 'ChocoBerry Bakers',
                'location' => 'Andheri West, Mumbai, Maharashtra',
                'review' => 'As a bakery owner, managing rush hours and keeping up with custom cake orders used to be overwhelming. Truly POS has made our billing process lightning fast, and my team loves how easy it is to track pending and completed orders. The kitchen ticket feature means our bakers never miss a special request. Daily sales and stock usage reports give me a clear idea of what\'s selling and what\'s not, so I waste much less now. The support team is helpful and always resolves our doubts quickly. My business has definitely grown more organized and profitable since adopting Truly POS.',
                'rating' => 5,
                'category' => 'Bakery'
            ],
            [
                'name' => 'Mohammed Rizwan',
                'business' => 'Smart Vision Opticals',
                'location' => 'MG Road, Kochi, Kerala',
                'review' => 'Before using Truly POS, keeping records of different frame brands and lens types was a headache. Now, inventory updates happen in real time, and I can set up promotions for old stock with a click. Customers love the professional bills and SMS alerts they get after each purchase. During the festive season, we were able to handle a huge crowd smoothly without long queues. I also appreciate the regular software updates that keep adding useful features. Truly POS is perfect for optical stores that want to scale up.',
                'rating' => 5,
                'category' => 'Optical'
            ],
            [
                'name' => 'Sneha Ghosh',
                'business' => 'Heritage Book World',
                'location' => 'Park Street, Kolkata, West Bengal',
                'review' => 'My bookshop\'s collection is vast, and earlier I struggled to find fast-moving books or track old stock. Truly POS lets me barcode every item, manage returns, and get easy daily sales summaries. The system is user-friendly, so even my older staff adapted without issues. When customers ask for recommendations, I can now check our bestsellers instantly on the dashboard. Billing errors have reduced, and GST compliance is no longer a worry. I\'m more confident about expanding to a second location, thanks to Truly POS.',
                'rating' => 5,
                'category' => 'Bookstore'
            ],
            [
                'name' => 'Anurag Singh',
                'business' => 'Fresh Greens Grocery',
                'location' => 'Gomti Nagar, Lucknow, Uttar Pradesh',
                'review' => 'I always wanted to automate my grocery shop but was worried about the learning curve for my staff. Truly POS surprised me with its simple billing and quick inventory features. Now, we receive low-stock alerts on time, so our shelves are never empty. Bulk item updates are a breeze, saving hours every month. What I love most is the WhatsApp bill sharing, which our customers find really convenient. The investment has paid off in smoother operations and happier shoppers.',
                'rating' => 5,
                'category' => 'Grocery'
            ],
            [
                'name' => 'Namrata Shenoy',
                'business' => 'Bella Vita Fashion Studio',
                'location' => 'Brigade Road, Bengaluru, Karnataka',
                'review' => 'Managing a boutique means handling constant changes in inventory, offers, and sizes. Truly POS allows us to set different prices for designer collections, print beautiful branded bills, and quickly process exchanges. The customer loyalty program keeps our regulars engaged, and I\'ve seen a clear rise in repeat sales. End-of-day closing takes just a few minutes now, and I can review my business performance on my mobile from anywhere. Truly POS gives boutique owners like me peace of mind.',
                'rating' => 5,
                'category' => 'Fashion'
            ],
            [
                'name' => 'Harish Patel',
                'business' => 'Vijay Electronics & Appliances',
                'location' => 'Sardar Patel Market, Ahmedabad, Gujarat',
                'review' => 'Our electronics store carries everything from TVs to small gadgets, and earlier, keeping track of warranty claims was a mess. With Truly POS, every item is sold with a barcode and warranty details printed right on the invoice. Multi-location support lets me track stock at both of my outlets without confusion. During Diwali, we managed festival rushes without any billing errors or delays. I also appreciate the easy data export to Tally for my accountant. Truly POS is the most reliable software I have used.',
                'rating' => 5,
                'category' => 'Electronics'
            ],
            [
                'name' => 'Arpita Sharma',
                'business' => 'GreenLeaf Organic Store',
                'location' => 'Banjara Hills, Hyderabad, Telangana',
                'review' => 'As an organic food retailer, freshness and stock rotation are crucial. Truly POS has helped me automate expiry management, so I can quickly identify items that need to be sold first. My team finds the interface intuitive, and new staff pick it up in a single day. The mobile app lets me check sales from home, which is a blessing for a working mom like me. Customer feedback has improved as the billing process is now much faster. I would recommend Truly POS to anyone in the health food business.',
                'rating' => 5,
                'category' => 'Organic Store'
            ],
            [
                'name' => 'Rohan Nair',
                'business' => 'Pet Paradise Grooming & Supplies',
                'location' => 'Indiranagar, Bengaluru, Karnataka',
                'review' => 'Running a pet store with a grooming section means tracking both products and service appointments. Truly POS\'s combined inventory and service module is exactly what I needed. Now, all our dog food, toys, and shampoos are accounted for, and I can schedule grooming appointments directly from the same system. Customers appreciate receiving automatic SMS reminders before their appointments. Billing is quick and transparent, and I can easily see which products are most popular each month. This has made managing my business much less stressful.',
                'rating' => 5,
                'category' => 'Pet Store'
            ],
            [
                'name' => 'Meena Jain',
                'business' => 'Lotus Chemist & Wellness',
                'location' => 'Sector 14, Gurugram, Haryana',
                'review' => 'Pharmacy management used to be complex with all the expiry dates and batch numbers, but Truly POS has made it almost effortless. I can track every medicine lot, and the system warns me before anything expires. GST billing is easy, and compliance reports are ready whenever my auditor needs them. My staff handles sales confidently, and errors have drastically reduced. The loyalty program has increased our customer retention, especially among elderly patients. It\'s a great investment for any modern chemist.',
                'rating' => 5,
                'category' => 'Pharmacy'
            ],
            [
                'name' => 'Vikram Sahu',
                'business' => 'Sahu Auto Parts Center',
                'location' => 'Durg, Chhattisgarh',
                'review' => 'Auto parts billing and inventory is tricky due to different models and suppliers, but Truly POS brings everything under control. The software\'s parts database, purchase management, and sales reports are very detailed. Even when my main cashier is on leave, my backup staff manage with ease because of the simple UI. I can instantly view daily, weekly, or monthly profit. The team\'s quick support for any issues gives me confidence. I recommend Truly POS to all my business contacts in the automotive trade.',
                'rating' => 5,
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
            ]
        ];
    }
}
