<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-users me-2"></i>Customer Management</h2>
    <div>
        <button class="btn btn-outline-secondary" onclick="exportCustomers()">
            <i class="fas fa-download me-2"></i>Export
        </button>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="<?php echo site_url('admin/customers'); ?>" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Search Customers</label>
                <input type="text" class="form-control" name="search" placeholder="Name, email, or phone..." 
                       value="<?php echo $this->input->get('search'); ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Registration Date</label>
                <select class="form-select" name="date_filter">
                    <option value="">All Time</option>
                    <option value="today" <?php echo $this->input->get('date_filter') == 'today' ? 'selected' : ''; ?>>Today</option>
                    <option value="week" <?php echo $this->input->get('date_filter') == 'week' ? 'selected' : ''; ?>>This Week</option>
                    <option value="month" <?php echo $this->input->get('date_filter') == 'month' ? 'selected' : ''; ?>>This Month</option>
                    <option value="year" <?php echo $this->input->get('date_filter') == 'year' ? 'selected' : ''; ?>>This Year</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status_filter">
                    <option value="">All Statuses</option>
                    <option value="active" <?php echo $this->input->get('status_filter') == 'active' ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?php echo $this->input->get('status_filter') == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Customer Statistics -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <i class="fas fa-users fa-2x mb-2"></i>
                <h4><?php echo number_format($total_customers); ?></h4>
                <p class="mb-0">Total Customers</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-user-check fa-2x mb-2"></i>
                <h4><?php echo number_format($active_customers ?? 0); ?></h4>
                <p class="mb-0">Active Customers</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <i class="fas fa-user-plus fa-2x mb-2"></i>
                <h4><?php echo number_format($new_customers_month ?? 0); ?></h4>
                <p class="mb-0">New This Month</p>
            </div>
        </div>
    </div>
</div>

<!-- Customers Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Customer List
            <span class="badge bg-secondary ms-2"><?php echo number_format($total_customers); ?> customers</span>
        </h5>
    </div>
    <div class="card-body">
        <?php if (!empty($customers)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Orders</th>
                            <th>Total Spent</th>
                            <th>Registration Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td>
                                    <strong>#<?php echo $customer['id']; ?></strong>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-2">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 32px; height: 32px; font-size: 14px;">
                                                <?php echo strtoupper(substr($customer['name'], 0, 1)); ?>
                                            </div>
                                        </div>
                                        <div>
                                            <strong><?php echo htmlspecialchars($customer['name']); ?></strong>
                                            <?php if (!empty($customer['company'])): ?>
                                                <br><small class="text-muted"><?php echo htmlspecialchars($customer['company']); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="mailto:<?php echo $customer['email']; ?>" class="text-decoration-none">
                                        <?php echo htmlspecialchars($customer['email']); ?>
                                    </a>
                                </td>
                                <td>
                                    <?php if (!empty($customer['phone'])): ?>
                                        <a href="tel:<?php echo $customer['phone']; ?>" class="text-decoration-none">
                                            <?php echo htmlspecialchars($customer['phone']); ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        <?php echo number_format($customer['total_orders'] ?? 0); ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-success">
                                        $<?php echo number_format($customer['total_spent'] ?? 0, 2); ?>
                                    </strong>
                                </td>
                                <td>
                                    <?php echo date('M d, Y', strtotime($customer['created_at'])); ?>
                                    <br><small class="text-muted"><?php echo date('H:i', strtotime($customer['created_at'])); ?></small>
                                </td>
                                <td>
                                    <?php
                                    $status = $customer['status'] ?? 'active';
                                    $status_class = $status == 'active' ? 'bg-success' : 'bg-secondary';
                                    ?>
                                    <span class="badge <?php echo $status_class; ?>">
                                        <?php echo ucfirst($status); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url('admin/customer_details/' . $customer['id']); ?>" 
                                           class="btn btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-success" 
                                                onclick="sendNotification(<?php echo $customer['id']; ?>)" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-info" 
                                                onclick="viewOrders(<?php echo $customer['id']; ?>)" title="View Orders">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <?php if (!empty($pagination)): ?>
                <div class="d-flex justify-content-center mt-4">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No customers found</h5>
                <p class="text-muted">No customers match your current filters.</p>
                <a href="<?php echo site_url('admin/customers'); ?>" class="btn btn-primary">
                    <i class="fas fa-refresh me-2"></i>Reset Filters
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Send Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Message to Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="messageForm">
                <div class="modal-body">
                    <input type="hidden" id="customerId" name="customer_id">
                    <div class="mb-3">
                        <label class="form-label">Message Type</label>
                        <select class="form-select" name="message_type" required>
                            <option value="">Select type...</option>
                            <option value="email">Email Only</option>
                            <option value="whatsapp">WhatsApp Only</option>
                            <option value="both">Both Email & WhatsApp</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function sendNotification(customerId) {
    document.getElementById('customerId').value = customerId;
    new bootstrap.Modal(document.getElementById('messageModal')).show();
}

function viewOrders(customerId) {
    window.location.href = '<?php echo site_url("admin/customer_details/"); ?>' + customerId;
}

function exportCustomers() {
    window.location.href = '<?php echo site_url("admin/customers/export"); ?>';
}

// Handle message form submission
document.getElementById('messageForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?php echo site_url("admin/send_customer_message"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('messageModal')).hide();
            location.reload();
        } else {
            alert('Failed to send message: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending the message');
    });
});
</script>
