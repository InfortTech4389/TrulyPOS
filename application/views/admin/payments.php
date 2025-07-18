<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-credit-card me-2"></i>Payment Management</h2>
    <div>
        <button class="btn btn-outline-secondary" onclick="exportPayments()">
            <i class="fas fa-download me-2"></i>Export
        </button>
        <button class="btn btn-primary" onclick="refreshPayments()">
            <i class="fas fa-sync-alt me-2"></i>Refresh
        </button>
    </div>
</div>

<!-- Payment Statistics -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-dollar-sign fa-2x mb-2"></i>
                <h4>$<?php echo number_format($stats['total_revenue'], 2); ?></h4>
                <p class="mb-0">Total Revenue</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <i class="fas fa-clock fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['pending_payments']); ?></h4>
                <p class="mb-0">Pending Payments</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['completed_payments']); ?></h4>
                <p class="mb-0">Completed</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body text-center">
                <i class="fas fa-times-circle fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['failed_payments']); ?></h4>
                <p class="mb-0">Failed</p>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="<?php echo site_url('admin/payments'); ?>" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" class="form-control" name="search" placeholder="Payment ID, customer name..." 
                       value="<?php echo $this->input->get('search'); ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Statuses</option>
                    <option value="pending" <?php echo $this->input->get('status') == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="completed" <?php echo $this->input->get('status') == 'completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="failed" <?php echo $this->input->get('status') == 'failed' ? 'selected' : ''; ?>>Failed</option>
                    <option value="refunded" <?php echo $this->input->get('status') == 'refunded' ? 'selected' : ''; ?>>Refunded</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Date Range</label>
                <select class="form-select" name="date_filter">
                    <option value="">All Time</option>
                    <option value="today" <?php echo $this->input->get('date_filter') == 'today' ? 'selected' : ''; ?>>Today</option>
                    <option value="week" <?php echo $this->input->get('date_filter') == 'week' ? 'selected' : ''; ?>>This Week</option>
                    <option value="month" <?php echo $this->input->get('date_filter') == 'month' ? 'selected' : ''; ?>>This Month</option>
                    <option value="year" <?php echo $this->input->get('date_filter') == 'year' ? 'selected' : ''; ?>>This Year</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Amount Range</label>
                <select class="form-select" name="amount_filter">
                    <option value="">All Amounts</option>
                    <option value="0-100" <?php echo $this->input->get('amount_filter') == '0-100' ? 'selected' : ''; ?>>$0 - $100</option>
                    <option value="100-500" <?php echo $this->input->get('amount_filter') == '100-500' ? 'selected' : ''; ?>>$100 - $500</option>
                    <option value="500-1000" <?php echo $this->input->get('amount_filter') == '500-1000' ? 'selected' : ''; ?>>$500 - $1000</option>
                    <option value="1000+" <?php echo $this->input->get('amount_filter') == '1000+' ? 'selected' : ''; ?>>$1000+</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Payment Method</label>
                <select class="form-select" name="method">
                    <option value="">All Methods</option>
                    <option value="stripe" <?php echo $this->input->get('method') == 'stripe' ? 'selected' : ''; ?>>Stripe</option>
                    <option value="paypal" <?php echo $this->input->get('method') == 'paypal' ? 'selected' : ''; ?>>PayPal</option>
                    <option value="razorpay" <?php echo $this->input->get('method') == 'razorpay' ? 'selected' : ''; ?>>Razorpay</option>
                    <option value="bank_transfer" <?php echo $this->input->get('method') == 'bank_transfer' ? 'selected' : ''; ?>>Bank Transfer</option>
                </select>
            </div>
            <div class="col-md-1">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Payments Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Payment History
            <span class="badge bg-secondary ms-2"><?php echo number_format($total_payments); ?> payments</span>
        </h5>
    </div>
    <div class="card-body">
        <?php if (!empty($payments)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Payment ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Transaction ID</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $payment): ?>
                            <tr>
                                <td>
                                    <strong>#<?php echo $payment['id']; ?></strong>
                                    <?php if (!empty($payment['order_id'])): ?>
                                        <br><small class="text-muted">Order: #<?php echo $payment['order_id']; ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-2">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 32px; height: 32px; font-size: 14px;">
                                                <?php echo strtoupper(substr($payment['customer_name'], 0, 1)); ?>
                                            </div>
                                        </div>
                                        <div>
                                            <strong><?php echo htmlspecialchars($payment['customer_name']); ?></strong>
                                            <br><small class="text-muted"><?php echo htmlspecialchars($payment['customer_email']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong class="fs-6">$<?php echo number_format($payment['amount'], 2); ?></strong>
                                    <?php if (!empty($payment['currency']) && $payment['currency'] != 'USD'): ?>
                                        <br><small class="text-muted"><?php echo strtoupper($payment['currency']); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $method_icons = [
                                        'stripe' => 'fab fa-stripe',
                                        'paypal' => 'fab fa-paypal',
                                        'razorpay' => 'fas fa-credit-card',
                                        'bank_transfer' => 'fas fa-university'
                                    ];
                                    $icon = $method_icons[$payment['payment_method']] ?? 'fas fa-credit-card';
                                    ?>
                                    <i class="<?php echo $icon; ?> me-2"></i>
                                    <?php echo ucfirst(str_replace('_', ' ', $payment['payment_method'])); ?>
                                </td>
                                <td>
                                    <?php
                                    $status_classes = [
                                        'pending' => 'bg-warning text-dark',
                                        'completed' => 'bg-success',
                                        'failed' => 'bg-danger',
                                        'refunded' => 'bg-secondary',
                                        'cancelled' => 'bg-dark'
                                    ];
                                    $status_class = $status_classes[$payment['status']] ?? 'bg-secondary';
                                    ?>
                                    <span class="badge <?php echo $status_class; ?>">
                                        <?php echo ucfirst($payment['status']); ?>
                                    </span>
                                    <?php if ($payment['status'] == 'pending'): ?>
                                        <br><small class="text-muted">
                                            Since <?php echo timeAgo($payment['created_at']); ?>
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($payment['transaction_id'])): ?>
                                        <code class="small"><?php echo htmlspecialchars($payment['transaction_id']); ?></code>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo date('M d, Y', strtotime($payment['created_at'])); ?>
                                    <br><small class="text-muted"><?php echo date('H:i', strtotime($payment['created_at'])); ?></small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url('admin/payment_details/' . $payment['id']); ?>" 
                                           class="btn btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <?php if ($payment['status'] == 'pending'): ?>
                                            <button type="button" class="btn btn-outline-success" 
                                                    onclick="updatePaymentStatus(<?php echo $payment['id']; ?>, 'completed')" 
                                                    title="Mark as Completed">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" 
                                                    onclick="updatePaymentStatus(<?php echo $payment['id']; ?>, 'failed')" 
                                                    title="Mark as Failed">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        <?php elseif ($payment['status'] == 'completed'): ?>
                                            <button type="button" class="btn btn-outline-warning" 
                                                    onclick="initiateRefund(<?php echo $payment['id']; ?>)" 
                                                    title="Process Refund">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-outline-info" 
                                                onclick="sendPaymentNotification(<?php echo $payment['id']; ?>)" 
                                                title="Send Receipt">
                                            <i class="fas fa-envelope"></i>
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
                <i class="fas fa-credit-card fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No payments found</h5>
                <p class="text-muted">No payments match your current filters.</p>
                <a href="<?php echo site_url('admin/payments'); ?>" class="btn btn-primary">
                    <i class="fas fa-refresh me-2"></i>Reset Filters
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Update Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Payment Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="statusForm">
                <div class="modal-body">
                    <input type="hidden" id="paymentId" name="payment_id">
                    <input type="hidden" id="newStatus" name="status">
                    <div class="mb-3">
                        <label class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" name="notes" rows="3" 
                                  placeholder="Add any notes about this status change..."></textarea>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        The customer will be automatically notified about this status change.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Refund Modal -->
<div class="modal fade" id="refundModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Process Refund</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="refundForm">
                <div class="modal-body">
                    <input type="hidden" id="refundPaymentId" name="payment_id">
                    <div class="mb-3">
                        <label class="form-label">Refund Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="refund_amount" step="0.01" required>
                        </div>
                        <div class="form-text">Maximum refundable amount will be shown here</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Refund Reason</label>
                        <select class="form-select" name="refund_reason" required>
                            <option value="">Select reason...</option>
                            <option value="customer_request">Customer Request</option>
                            <option value="duplicate_payment">Duplicate Payment</option>
                            <option value="service_issue">Service Issue</option>
                            <option value="billing_error">Billing Error</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="refund_notes" rows="3" 
                                  placeholder="Add details about the refund..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Process Refund</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updatePaymentStatus(paymentId, status) {
    document.getElementById('paymentId').value = paymentId;
    document.getElementById('newStatus').value = status;
    new bootstrap.Modal(document.getElementById('statusModal')).show();
}

function initiateRefund(paymentId) {
    document.getElementById('refundPaymentId').value = paymentId;
    new bootstrap.Modal(document.getElementById('refundModal')).show();
}

function sendPaymentNotification(paymentId) {
    if (confirm('Send payment receipt to customer?')) {
        fetch('<?php echo site_url("admin/send_payment_receipt"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({payment_id: paymentId})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Receipt sent successfully!');
            } else {
                alert('Failed to send receipt: ' + data.message);
            }
        });
    }
}

function exportPayments() {
    const params = new URLSearchParams(window.location.search);
    params.append('export', '1');
    window.location.href = '<?php echo site_url("admin/payments"); ?>?' + params.toString();
}

function refreshPayments() {
    location.reload();
}

// Handle status form submission
document.getElementById('statusForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?php echo site_url("admin/update_payment_status"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('statusModal')).hide();
            location.reload();
        } else {
            alert('Failed to update status: ' + data.message);
        }
    });
});

// Handle refund form submission
document.getElementById('refundForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (confirm('Are you sure you want to process this refund? This action cannot be undone.')) {
        const formData = new FormData(this);
        
        fetch('<?php echo site_url("admin/process_refund"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('refundModal')).hide();
                location.reload();
            } else {
                alert('Failed to process refund: ' + data.message);
            }
        });
    }
});

<?php
// Helper function for time ago
function timeAgo($datetime) {
    $time = time() - strtotime($datetime);
    if ($time < 60) return 'just now';
    if ($time < 3600) return floor($time/60) . ' min ago';
    if ($time < 86400) return floor($time/3600) . ' hours ago';
    return floor($time/86400) . ' days ago';
}
?>
</script>
