<!-- Blog Section -->
<section class="blog-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h1 class="display-4 fw-bold">TrulyPOS Blog</h1>
                <p class="lead">Insights, tips, and updates from the world of retail technology</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-posts">
                    <?php if(isset($blog_posts) && !empty($blog_posts)): ?>
                        <?php foreach($blog_posts as $post): ?>
                            <article class="blog-post">
                                <div class="post-image">
                                    <img src="<?php echo base_url('assets/images/blog/' . $post->image); ?>" alt="<?php echo $post->title; ?>" class="img-fluid">
                                </div>
                                
                                <div class="post-content">
                                    <div class="post-meta">
                                        <span class="post-date"><i class="fas fa-calendar"></i> <?php echo date('F j, Y', strtotime($post->created_at)); ?></span>
                                        <span class="post-category"><i class="fas fa-folder"></i> <?php echo $post->category; ?></span>
                                        <span class="post-author"><i class="fas fa-user"></i> <?php echo $post->author; ?></span>
                                    </div>
                                    
                                    <h2 class="post-title">
                                        <a href="<?php echo base_url('blog/' . $post->slug); ?>"><?php echo $post->title; ?></a>
                                    </h2>
                                    
                                    <p class="post-excerpt"><?php echo word_limiter($post->content, 50); ?></p>
                                    
                                    <div class="post-tags">
                                        <?php 
                                        $tags = explode(',', $post->tags);
                                        foreach($tags as $tag): 
                                        ?>
                                            <span class="tag"><?php echo trim($tag); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    
                                    <a href="<?php echo base_url('blog/' . $post->slug); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default blog posts -->
                        <article class="blog-post">
                            <div class="post-image">
                                <img src="<?php echo base_url('assets/images/blog/blog-1.jpg'); ?>" alt="Blog Post" class="img-fluid">
                            </div>
                            
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="post-date"><i class="fas fa-calendar"></i> December 15, 2023</span>
                                    <span class="post-category"><i class="fas fa-folder"></i> Business Tips</span>
                                    <span class="post-author"><i class="fas fa-user"></i> TrulyPOS Team</span>
                                </div>
                                
                                <h2 class="post-title">
                                    <a href="#">5 Ways to Increase Your Retail Sales This Holiday Season</a>
                                </h2>
                                
                                <p class="post-excerpt">The holiday season is a crucial time for retailers. Learn how to maximize your sales potential with these proven strategies that successful businesses use to boost their revenue during the festive period.</p>
                                
                                <div class="post-tags">
                                    <span class="tag">Sales</span>
                                    <span class="tag">Holiday</span>
                                    <span class="tag">Retail</span>
                                </div>
                                
                                <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </article>
                        
                        <article class="blog-post">
                            <div class="post-image">
                                <img src="<?php echo base_url('assets/images/blog/blog-2.jpg'); ?>" alt="Blog Post" class="img-fluid">
                            </div>
                            
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="post-date"><i class="fas fa-calendar"></i> December 10, 2023</span>
                                    <span class="post-category"><i class="fas fa-folder"></i> Technology</span>
                                    <span class="post-author"><i class="fas fa-user"></i> Tech Team</span>
                                </div>
                                
                                <h2 class="post-title">
                                    <a href="#">Understanding GST Compliance for Your Retail Business</a>
                                </h2>
                                
                                <p class="post-excerpt">GST compliance is mandatory for all businesses. This comprehensive guide will help you understand the requirements, deadlines, and best practices for maintaining GST compliance in your retail operations.</p>
                                
                                <div class="post-tags">
                                    <span class="tag">GST</span>
                                    <span class="tag">Compliance</span>
                                    <span class="tag">Tax</span>
                                </div>
                                
                                <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </article>
                        
                        <article class="blog-post">
                            <div class="post-image">
                                <img src="<?php echo base_url('assets/images/blog/blog-3.jpg'); ?>" alt="Blog Post" class="img-fluid">
                            </div>
                            
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="post-date"><i class="fas fa-calendar"></i> December 5, 2023</span>
                                    <span class="post-category"><i class="fas fa-folder"></i> Inventory</span>
                                    <span class="post-author"><i class="fas fa-user"></i> Operations Team</span>
                                </div>
                                
                                <h2 class="post-title">
                                    <a href="#">Best Practices for Inventory Management in Multi-Store Operations</a>
                                </h2>
                                
                                <p class="post-excerpt">Managing inventory across multiple store locations can be challenging. Learn the best practices and strategies that successful multi-store retailers use to optimize their inventory management processes.</p>
                                
                                <div class="post-tags">
                                    <span class="tag">Inventory</span>
                                    <span class="tag">Multi-Store</span>
                                    <span class="tag">Management</span>
                                </div>
                                
                                <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </article>
                    <?php endif; ?>
                </div>
                
                <!-- Pagination -->
                <div class="blog-pagination">
                    <nav aria-label="Blog pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="col-lg-4">
                <aside class="blog-sidebar">
                    <!-- Newsletter Signup -->
                    <div class="sidebar-widget">
                        <h4>Subscribe to Our Newsletter</h4>
                        <p>Get the latest updates and insights delivered to your inbox.</p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Your email address" required>
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Categories -->
                    <div class="sidebar-widget">
                        <h4>Categories</h4>
                        <ul class="category-list">
                            <li><a href="#">Business Tips <span class="count">(15)</span></a></li>
                            <li><a href="#">Technology <span class="count">(12)</span></a></li>
                            <li><a href="#">Inventory <span class="count">(8)</span></a></li>
                            <li><a href="#">Sales <span class="count">(10)</span></a></li>
                            <li><a href="#">Customer Service <span class="count">(6)</span></a></li>
                            <li><a href="#">Industry News <span class="count">(9)</span></a></li>
                        </ul>
                    </div>
                    
                    <!-- Recent Posts -->
                    <div class="sidebar-widget">
                        <h4>Recent Posts</h4>
                        <div class="recent-posts">
                            <div class="recent-post">
                                <div class="recent-post-image">
                                    <img src="<?php echo base_url('assets/images/blog/recent-1.jpg'); ?>" alt="Recent Post" class="img-fluid">
                                </div>
                                <div class="recent-post-content">
                                    <h6><a href="#">How to Choose the Right POS System</a></h6>
                                    <small class="text-muted">December 12, 2023</small>
                                </div>
                            </div>
                            
                            <div class="recent-post">
                                <div class="recent-post-image">
                                    <img src="<?php echo base_url('assets/images/blog/recent-2.jpg'); ?>" alt="Recent Post" class="img-fluid">
                                </div>
                                <div class="recent-post-content">
                                    <h6><a href="#">Digital Payment Trends in 2024</a></h6>
                                    <small class="text-muted">December 8, 2023</small>
                                </div>
                            </div>
                            
                            <div class="recent-post">
                                <div class="recent-post-image">
                                    <img src="<?php echo base_url('assets/images/blog/recent-3.jpg'); ?>" alt="Recent Post" class="img-fluid">
                                </div>
                                <div class="recent-post-content">
                                    <h6><a href="#">Customer Loyalty Programs That Work</a></h6>
                                    <small class="text-muted">December 3, 2023</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tags -->
                    <div class="sidebar-widget">
                        <h4>Popular Tags</h4>
                        <div class="tag-cloud">
                            <a href="#" class="tag">POS System</a>
                            <a href="#" class="tag">Retail</a>
                            <a href="#" class="tag">Inventory</a>
                            <a href="#" class="tag">Sales</a>
                            <a href="#" class="tag">GST</a>
                            <a href="#" class="tag">Business</a>
                            <a href="#" class="tag">Technology</a>
                            <a href="#" class="tag">Tips</a>
                            <a href="#" class="tag">Management</a>
                            <a href="#" class="tag">Customer</a>
                        </div>
                    </div>
                    
                    <!-- CTA Widget -->
                    <div class="sidebar-widget cta-widget">
                        <h4>Ready to Get Started?</h4>
                        <p>Try TrulyPOS today and see how it can transform your business operations.</p>
                        <a href="<?php echo base_url('demo'); ?>" class="btn btn-primary btn-sm">Try Demo</a>
                        <a href="<?php echo base_url('pricing'); ?>" class="btn btn-outline-primary btn-sm">View Pricing</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="featured-categories py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Explore by Category</h2>
                <p class="lead">Find articles that interest you most</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Business Tips</h4>
                    <p>Practical advice to help you grow your business and improve operations.</p>
                    <a href="#" class="btn btn-outline-primary">View Articles</a>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Technology</h4>
                    <p>Latest trends and innovations in retail technology and POS systems.</p>
                    <a href="#" class="btn btn-outline-primary">View Articles</a>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Sales & Marketing</h4>
                    <p>Strategies and techniques to boost your sales and marketing efforts.</p>
                    <a href="#" class="btn btn-outline-primary">View Articles</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            // Show loading state
            submitBtn.textContent = 'Subscribing...';
            submitBtn.disabled = true;
            
            // Simulate subscription
            setTimeout(() => {
                alert('Thank you for subscribing! You will receive our latest updates.');
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    }
    
    // Smooth scrolling for pagination links
    const paginationLinks = document.querySelectorAll('.pagination a');
    
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Smooth scroll to top of blog section
            document.querySelector('.blog-section').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>
