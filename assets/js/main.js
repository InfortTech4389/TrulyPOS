// Truly POS Website JavaScript

$(document).ready(function() {
    // Initialize components
    initializeScrollTop();
    initializeNewsletterModal();
    initializeFAQ();
    initializeContactForm();
    initializeNewsletterForm();
    initializeAnimations();
    initializePaymentForm();
    initializeMegaMenu();
    initializeMegaMenu();
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });
    
    // Navbar scroll effect
    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });
    
    // Preloader
    $(window).on('load', function() {
        $('#preloader').fadeOut('slow');
    });
});

// Initialize scroll to top button
function initializeScrollTop() {
    // Create scroll to top button
    $('body').append('<button class="scroll-top" id="scrollTop"><i class="fas fa-arrow-up"></i></button>');
    
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#scrollTop').addClass('show');
        } else {
            $('#scrollTop').removeClass('show');
        }
    });
    
    $('#scrollTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });
}

// Initialize newsletter modal
function initializeNewsletterModal() {
    // Show newsletter modal after 30 seconds
    setTimeout(function() {
        if (!localStorage.getItem('newsletter_shown')) {
            $('#newsletterModal').modal('show');
            localStorage.setItem('newsletter_shown', 'true');
        }
    }, 30000);
}

// Initialize FAQ functionality
function initializeFAQ() {
    $('.faq-question').click(function() {
        var answer = $(this).next('.faq-answer');
        var isVisible = answer.is(':visible');
        
        // Hide all answers
        $('.faq-answer').slideUp();
        $('.faq-question').removeClass('active');
        
        // Show current answer if it was hidden
        if (!isVisible) {
            answer.slideDown();
            $(this).addClass('active');
        }
    });
}

// Initialize contact form
function initializeContactForm() {
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        
        var form = $(this);
        var button = form.find('button[type="submit"]');
        var buttonText = button.html();
        
        // Show loading state
        button.html('<i class="fas fa-spinner fa-spin"></i> Sending...').prop('disabled', true);
        
        // Simulate form submission
        setTimeout(function() {
            // Reset form
            form[0].reset();
            
            // Show success message
            showAlert('success', 'Thank you for your message! We will get back to you soon.');
            
            // Reset button
            button.html(buttonText).prop('disabled', false);
        }, 2000);
    });
}

// Initialize newsletter form
function initializeNewsletterForm() {
    $('#newsletterForm').submit(function(e) {
        e.preventDefault();
        
        var form = $(this);
        var email = form.find('input[type="email"]').val();
        var button = form.find('button[type="submit"]');
        var buttonText = button.html();
        
        // Show loading state
        button.html('<i class="fas fa-spinner fa-spin"></i> Subscribing...').prop('disabled', true);
        
        // Simulate subscription
        setTimeout(function() {
            // Reset form
            form[0].reset();
            
            // Show success message
            showAlert('success', 'Thank you for subscribing to our newsletter!');
            
            // Close modal
            $('#newsletterModal').modal('hide');
            
            // Reset button
            button.html(buttonText).prop('disabled', false);
        }, 2000);
    });
}

// Initialize animations
function initializeAnimations() {
    // Animate elements on scroll
    $(window).scroll(function() {
        $('.animate-on-scroll').each(function() {
            var element = $(this);
            var elementTop = element.offset().top;
            var elementBottom = elementTop + element.outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                element.addClass('animate-fade-in-up');
            }
        });
    });
    
    // Counter animation
    $('.counter').each(function() {
        var $this = $(this);
        var countTo = $this.attr('data-count');
        
        $({ countNum: $this.text() }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'linear',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
            }
        });
    });
}

// Initialize payment form
function initializePaymentForm() {
    $('#paymentForm').submit(function(e) {
        e.preventDefault();
        
        var form = $(this);
        var button = form.find('button[type="submit"]');
        var buttonText = button.html();
        
        // Show loading state
        button.html('<i class="fas fa-spinner fa-spin"></i> Processing...').prop('disabled', true);
        
        // Validate form
        if (validatePaymentForm(form)) {
            // Process payment
            processPayment(form);
        } else {
            // Reset button
            button.html(buttonText).prop('disabled', false);
        }
    });
}

// Initialize mega menu
function initializeMegaMenu() {
    const industryItems = document.querySelectorAll('.industry-item');
    const businessCategories = document.querySelectorAll('.business-category');
    const megaDropdown = document.querySelector('.mega-dropdown');
    const megaMenu = document.querySelector('.mega-menu');
    const dropdownToggle = megaDropdown?.querySelector('.dropdown-toggle');
    
    // Handle industry item hover/click
    industryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Only on desktop
            if (window.innerWidth > 991) {
                // Remove active class from all items
                industryItems.forEach(i => i.classList.remove('active'));
                businessCategories.forEach(cat => cat.classList.remove('active'));
                
                // Add active class to current item
                this.classList.add('active');
                
                // Show corresponding business category
                const industry = this.getAttribute('data-industry');
                const targetCategory = document.getElementById(industry + '-businesses');
                if (targetCategory) {
                    targetCategory.classList.add('active');
                }
            }
        });
        
        // Handle mobile click
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 991) {
                e.preventDefault();
                
                // Remove active class from all items
                industryItems.forEach(i => i.classList.remove('active'));
                businessCategories.forEach(cat => cat.classList.remove('active'));
                
                // Add active class to current item
                this.classList.add('active');
                
                // Show corresponding business category
                const industry = this.getAttribute('data-industry');
                const targetCategory = document.getElementById(industry + '-businesses');
                if (targetCategory) {
                    targetCategory.classList.add('active');
                }
            }
        });
    });
    
    // Handle mega menu dropdown
    if (megaDropdown && megaMenu) {
        let hoverTimeout;
        
        // Desktop hover
        megaDropdown.addEventListener('mouseenter', function() {
            if (window.innerWidth > 991) {
                clearTimeout(hoverTimeout);
                this.classList.add('show');
                
                // Show first category by default
                if (industryItems.length > 0) {
                    industryItems[0].classList.add('active');
                    const firstIndustry = industryItems[0].getAttribute('data-industry');
                    const firstCategory = document.getElementById(firstIndustry + '-businesses');
                    if (firstCategory) {
                        firstCategory.classList.add('active');
                    }
                }
            }
        });
        
        megaDropdown.addEventListener('mouseleave', function() {
            if (window.innerWidth > 991) {
                hoverTimeout = setTimeout(() => {
                    this.classList.remove('show');
                    // Reset active states
                    industryItems.forEach(i => i.classList.remove('active'));
                    businessCategories.forEach(cat => cat.classList.remove('active'));
                }, 300);
            }
        });
        
        // Mobile click
        if (dropdownToggle) {
            dropdownToggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    e.stopPropagation();
                    megaDropdown.classList.toggle('show');
                    
                    // Show first category by default on mobile
                    if (megaDropdown.classList.contains('show') && industryItems.length > 0) {
                        industryItems[0].classList.add('active');
                        const firstIndustry = industryItems[0].getAttribute('data-industry');
                        const firstCategory = document.getElementById(firstIndustry + '-businesses');
                        if (firstCategory) {
                            firstCategory.classList.add('active');
                        }
                    }
                }
            });
        }
    }
    
    // Close mega menu when clicking outside
    document.addEventListener('click', function(e) {
        if (megaDropdown && !megaDropdown.contains(e.target)) {
            megaDropdown.classList.remove('show');
            industryItems.forEach(i => i.classList.remove('active'));
            businessCategories.forEach(cat => cat.classList.remove('active'));
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
            megaDropdown?.classList.remove('show');
            industryItems.forEach(i => i.classList.remove('active'));
            businessCategories.forEach(cat => cat.classList.remove('active'));
        }
    });
}

// Validate payment form
function validatePaymentForm(form) {
    var isValid = true;
    
    // Remove previous error messages
    form.find('.is-invalid').removeClass('is-invalid');
    form.find('.invalid-feedback').remove();
    
    // Validate required fields
    form.find('input[required], select[required]').each(function() {
        var field = $(this);
        var value = field.val().trim();
        
        if (!value) {
            field.addClass('is-invalid');
            field.after('<div class="invalid-feedback">This field is required.</div>');
            isValid = false;
        }
    });
    
    // Validate email
    var email = form.find('input[type="email"]');
    if (email.length && !isValidEmail(email.val())) {
        email.addClass('is-invalid');
        email.after('<div class="invalid-feedback">Please enter a valid email address.</div>');
        isValid = false;
    }
    
    // Validate phone
    var phone = form.find('input[name="phone"]');
    if (phone.length && !isValidPhone(phone.val())) {
        phone.addClass('is-invalid');
        phone.after('<div class="invalid-feedback">Please enter a valid phone number.</div>');
        isValid = false;
    }
    
    return isValid;
}

// Process payment
function processPayment(form) {
    var formData = form.serialize();
    
    $.ajax({
        url: base_url + 'payment/process',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Initialize Razorpay payment
                initializeRazorpay(response.order);
            } else {
                showAlert('error', response.message || 'Payment failed. Please try again.');
                resetPaymentButton();
            }
        },
        error: function() {
            showAlert('error', 'Something went wrong. Please try again.');
            resetPaymentButton();
        }
    });
}

// Initialize Razorpay payment
function initializeRazorpay(order) {
    var options = {
        "key": "rzp_test_YOUR_KEY_HERE", // Your Razorpay key
        "amount": order.amount,
        "currency": order.currency,
        "name": "Truly POS",
        "description": "Purchase License",
        "image": base_url + "assets/images/trulypos-logo.png",
        "order_id": order.id,
        "handler": function(response) {
            // Payment successful
            var paymentData = {
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature
            };
            
            // Submit payment data to server
            $.ajax({
                url: base_url + 'payment/verify',
                type: 'POST',
                data: paymentData,
                success: function(result) {
                    if (result.success) {
                        window.location.href = base_url + 'payment/success';
                    } else {
                        showAlert('error', 'Payment verification failed. Please contact support.');
                        resetPaymentButton();
                    }
                },
                error: function() {
                    showAlert('error', 'Payment verification failed. Please contact support.');
                    resetPaymentButton();
                }
            });
        },
        "prefill": {
            "name": order.customer_name,
            "email": order.customer_email,
            "contact": order.customer_phone
        },
        "theme": {
            "color": "#007bff"
        },
        "modal": {
            "ondismiss": function() {
                resetPaymentButton();
            }
        }
    };
    
    var rzp = new Razorpay(options);
    rzp.open();
}

// Reset payment button
function resetPaymentButton() {
    var button = $('#paymentForm button[type="submit"]');
    button.html('Pay Now').prop('disabled', false);
}

// Show alert message
function showAlert(type, message) {
    var alertClass = 'alert-' + type;
    var alertHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                    message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                    '</div>';
    
    // Remove existing alerts
    $('.alert').remove();
    
    // Add new alert
    $('.main-content').prepend(alertHTML);
    
    // Auto-hide after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 5000);
}

// Validate email format
function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validate phone format
function isValidPhone(phone) {
    var phoneRegex = /^[\+]?[1-9][\d]{9,14}$/;
    return phoneRegex.test(phone.replace(/\s/g, ''));
}

// Format currency
function formatCurrency(amount, currency = 'INR') {
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: currency
    }).format(amount);
}

// Copy to clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        showAlert('success', 'Copied to clipboard!');
    }, function() {
        showAlert('error', 'Failed to copy to clipboard.');
    });
}

// Demo functionality
function launchDemo(type) {
    var demoUrl = 'https://demo.trulypos.com/';
    var credentials = {
        'admin': { username: 'admin', password: 'admin123' },
        'staff': { username: 'staff', password: 'staff123' }
    };
    
    if (type in credentials) {
        var cred = credentials[type];
        var params = '?username=' + cred.username + '&password=' + cred.password;
        window.open(demoUrl + params, '_blank');
    } else {
        window.open(demoUrl, '_blank');
    }
}

// License verification
function verifyLicense() {
    var licenseKey = $('#licenseKey').val();
    
    if (!licenseKey) {
        showAlert('error', 'Please enter a license key.');
        return;
    }
    
    $.ajax({
        url: base_url + 'payment/verify',
        type: 'POST',
        data: { license_key: licenseKey },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                var result = response.data;
                var html = '<div class="alert alert-success">' +
                          '<h5>License Verified!</h5>' +
                          '<p><strong>License:</strong> ' + result.license_key + '</p>' +
                          '<p><strong>Plan:</strong> ' + result.plan + '</p>' +
                          '<p><strong>Customer:</strong> ' + result.customer + '</p>' +
                          '<p><strong>Status:</strong> ' + result.status + '</p>' +
                          '<p><strong>Created:</strong> ' + result.created_at + '</p>' +
                          '</div>';
                $('#licenseResult').html(html);
            } else {
                showAlert('error', response.message);
                $('#licenseResult').html('');
            }
        },
        error: function() {
            showAlert('error', 'Verification failed. Please try again.');
            $('#licenseResult').html('');
        }
    });
}

// Toggle pricing plan
function togglePricingPlan(planId) {
    $('.pricing-card').removeClass('selected');
    $('#plan-' + planId).addClass('selected');
    
    // Update form
    $('#selectedPlan').val(planId);
    
    // Update total
    var price = $('#plan-' + planId).data('price');
    $('#totalAmount').text(formatCurrency(price));
}

// Download invoice
function downloadInvoice(orderId) {
    window.open(base_url + 'orders/invoice/' + orderId, '_blank');
}

// Print page
function printPage() {
    window.print();
}

// Share on social media
function shareOnSocial(platform, url, text) {
    var shareUrl = '';
    
    switch(platform) {
        case 'facebook':
            shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url);
            break;
        case 'twitter':
            shareUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(text);
            break;
        case 'linkedin':
            shareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(url);
            break;
        case 'whatsapp':
            shareUrl = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(text + ' ' + url);
            break;
    }
    
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}

// Initialize tooltips
function initializeTooltips() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

// Initialize popovers
function initializePopovers() {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
}

// Lazy load images
function lazyLoadImages() {
    var images = document.querySelectorAll('img[data-src]');
    
    var imageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(function(img) {
        imageObserver.observe(img);
    });
}

// Initialize all components when DOM is ready
$(document).ready(function() {
    initializeTooltips();
    initializePopovers();
    lazyLoadImages();
});

// Global variables
var base_url = window.location.origin + '/';

// Export functions for global use
window.TrulyPOS = {
    showAlert: showAlert,
    copyToClipboard: copyToClipboard,
    launchDemo: launchDemo,
    verifyLicense: verifyLicense,
    togglePricingPlan: togglePricingPlan,
    downloadInvoice: downloadInvoice,
    printPage: printPage,
    shareOnSocial: shareOnSocial,
    formatCurrency: formatCurrency
};
