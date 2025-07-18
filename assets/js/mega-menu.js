// New Mega Menu Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Get all category items and subcategory groups
    const categoryItems = document.querySelectorAll('.category-item');
    const subcategoryGroups = document.querySelectorAll('.subcategory-group');
    
    // Handle category hover/click
    categoryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Remove active class from all categories
            categoryItems.forEach(cat => cat.classList.remove('active'));
            
            // Add active class to current category
            this.classList.add('active');
            
            // Get category name
            const categoryName = this.getAttribute('data-category');
            
            // Hide all subcategory groups
            subcategoryGroups.forEach(group => group.classList.remove('active'));
            
            // Show corresponding subcategory group
            const targetGroup = document.getElementById(categoryName + '-subcategories');
            if (targetGroup) {
                targetGroup.classList.add('active');
            }
        });
    });
    
    // Handle mobile dropdown behavior
    const megaDropdown = document.querySelector('.mega-dropdown');
    const megaMenu = document.querySelector('.mega-menu');
    
    if (megaDropdown && megaMenu) {
        // Handle dropdown toggle on mobile
        megaDropdown.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                megaDropdown.classList.toggle('show');
                
                if (megaDropdown.classList.contains('show')) {
                    megaMenu.style.display = 'block';
                } else {
                    megaMenu.style.display = 'none';
                }
            }
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!megaDropdown.contains(e.target)) {
                megaDropdown.classList.remove('show');
                if (window.innerWidth <= 768) {
                    megaMenu.style.display = 'none';
                }
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                megaDropdown.classList.remove('show');
                megaMenu.style.display = '';
            }
        });
    }
    
    // Initialize with first category active
    if (categoryItems.length > 0) {
        categoryItems[0].classList.add('active');
        const firstCategory = categoryItems[0].getAttribute('data-category');
        const firstGroup = document.getElementById(firstCategory + '-subcategories');
        if (firstGroup) {
            firstGroup.classList.add('active');
        }
    }
});
