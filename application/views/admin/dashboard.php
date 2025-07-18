<!-- Dashboard Overview -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100">
            <div class="card-body text-center">
                <i class="fas fa-users fa-2x mb-3"></i>
                <h4 class="mb-0"><?php echo number_format($stats['total_contacts']); ?></h4>
                <p class="mb-0">Total Contacts</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100">
            <div class="card-body text-center">
                <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                <h4 class="mb-0"><?php echo number_format($stats['total_orders']); ?></h4>
                <p class="mb-0">Total Orders</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100">
            <div class="card-body text-center">
                <i class="fas fa-dollar-sign fa-2x mb-3"></i>
                <h4 class="mb-0">$<?php echo number_format($stats['revenue_month'], 2); ?></h4>
                <p class="mb-0">Monthly Revenue</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100">
            <div class="card-body text-center">
                <i class="fas fa-key fa-2x mb-3"></i>
                <h4 class="mb-0"><?php echo number_format($stats['total_licenses']); ?></h4>
                <p class="mb-0">Active Licenses</p>
            </div>
        </div>
    </div>
</div>

<!-- Additional Stats Row -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card bg-warning text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-clock fa-2x mb-3"></i>
                <h4 class="mb-0"><?php echo number_format($stats['pending_orders']); ?></h4>
                <p class="mb-0">Pending Orders</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-dollar-sign fa-2x mb-3"></i>
                <h4 class="mb-0">$<?php echo number_format($stats['revenue_today'], 2); ?></h4>
                <p class="mb-0">Today's Revenue</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-user-plus fa-2x mb-3"></i>
                <h4 class="mb-0"><?php echo number_format($stats['new_customers_month']); ?></h4>
                <p class="mb-0">New Customers</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-envelope fa-2x mb-3"></i>
                <h4 class="mb-0"><?php echo number_format($stats['total_subscribers']); ?></h4>
                <p class="mb-0">Newsletter Subscribers</p>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Recent Activity -->
<div class="row">
    <!-- Recent Contacts -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-envelope me-2"></i>Recent Enquiries</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($recent_contacts)): ?>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_contacts as $contact): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($contact['created_at'])); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/enquiry_details/' . $contact['id']); ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="<?php echo site_url('admin/enquiries'); ?>" class="btn btn-primary">
                            View All Enquiries
                        </a>
                    </div>
                <?php else: ?>
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <p>No recent enquiries</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Recent Orders -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Recent Orders</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($recent_orders)): ?>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_orders as $order): ?>
                                    <tr>
                                        <td>#<?php echo $order['id']; ?></td>
                                        <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                        <td>$<?php echo number_format($order['amount'], 2); ?></td>
                                        <td>
                                            <?php
                                            $status_class = '';
                                            switch($order['status']) {
                                                case 'completed': $status_class = 'bg-success'; break;
                                                case 'pending': $status_class = 'bg-warning'; break;
                                                case 'failed': $status_class = 'bg-danger'; break;
                                                default: $status_class = 'bg-secondary';
                                            }
                                            ?>
                                            <span class="badge <?php echo $status_class; ?>">
                                                <?php echo ucfirst($order['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('admin/payment_details/' . $order['id']); ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="<?php echo site_url('admin/payments'); ?>" class="btn btn-primary">
                            View All Orders
                        </a>
                    </div>
                <?php else: ?>
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                        <p>No recent orders</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Notification Statistics -->
<?php if (isset($notification_stats) && !empty($notification_stats)): ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bell me-2"></i>Notification Statistics (Last 30 Days)</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-primary"><?php echo number_format($notification_stats['total_sent']); ?></h3>
                            <p class="text-muted mb-0">Total Sent</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-success"><?php echo number_format($notification_stats['email_sent']); ?></h3>
                            <p class="text-muted mb-0">Emails Sent</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h3 class="text-info"><?php echo number_format($notification_stats['whatsapp_sent']); ?></h3>
                            <p class="text-muted mb-0">WhatsApp Sent</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-warning"><?php echo number_format($notification_stats['failed']); ?></h3>
                        <p class="text-muted mb-0">Failed</p>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="<?php echo site_url('admin/notifications'); ?>" class="btn btn-primary">
                        View Detailed Reports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="<?php echo site_url('admin/enquiries'); ?>" class="btn btn-outline-primary w-100">
                            <i class="fas fa-envelope me-2"></i>View Enquiries
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="<?php echo site_url('admin/customers'); ?>" class="btn btn-outline-success w-100">
                            <i class="fas fa-users me-2"></i>Manage Customers
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="<?php echo site_url('admin/payments'); ?>" class="btn btn-outline-info w-100">
                            <i class="fas fa-credit-card me-2"></i>View Payments
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="<?php echo site_url('admin/newsletter'); ?>" class="btn btn-outline-warning w-100">
                            <i class="fas fa-newspaper me-2"></i>Send Newsletter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
