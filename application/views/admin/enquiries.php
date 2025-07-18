<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-envelope me-2"></i>Enquiry Management</h2>
    <div>
        <button class="btn btn-outline-secondary" onclick="markAllAsRead()">
            <i class="fas fa-check-double me-2"></i>Mark All Read
        </button>
        <button class="btn btn-outline-secondary" onclick="exportEnquiries()">
            <i class="fas fa-download me-2"></i>Export
        </button>
    </div>
</div>

<!-- Enquiry Statistics -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <i class="fas fa-envelope fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['total_enquiries']); ?></h4>
                <p class="mb-0">Total Enquiries</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <i class="fas fa-exclamation-circle fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['new_enquiries']); ?></h4>
                <p class="mb-0">New Enquiries</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <i class="fas fa-reply fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['responded_enquiries']); ?></h4>
                <p class="mb-0">Responded</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body text-center">
                <i class="fas fa-clock fa-2x mb-2"></i>
                <h4><?php echo number_format($stats['pending_enquiries']); ?></h4>
                <p class="mb-0">Pending Response</p>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="<?php echo site_url('admin/enquiries'); ?>" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" class="form-control" name="search" placeholder="Name, email, or message..." 
                       value="<?php echo $this->input->get('search'); ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Statuses</option>
                    <option value="new" <?php echo $this->input->get('status') == 'new' ? 'selected' : ''; ?>>New</option>
                    <option value="pending" <?php echo $this->input->get('status') == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="responded" <?php echo $this->input->get('status') == 'responded' ? 'selected' : ''; ?>>Responded</option>
                    <option value="closed" <?php echo $this->input->get('status') == 'closed' ? 'selected' : ''; ?>>Closed</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Priority</label>
                <select class="form-select" name="priority">
                    <option value="">All Priorities</option>
                    <option value="high" <?php echo $this->input->get('priority') == 'high' ? 'selected' : ''; ?>>High</option>
                    <option value="medium" <?php echo $this->input->get('priority') == 'medium' ? 'selected' : ''; ?>>Medium</option>
                    <option value="low" <?php echo $this->input->get('priority') == 'low' ? 'selected' : ''; ?>>Low</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Date Range</label>
                <select class="form-select" name="date_filter">
                    <option value="">All Time</option>
                    <option value="today" <?php echo $this->input->get('date_filter') == 'today' ? 'selected' : ''; ?>>Today</option>
                    <option value="week" <?php echo $this->input->get('date_filter') == 'week' ? 'selected' : ''; ?>>This Week</option>
                    <option value="month" <?php echo $this->input->get('date_filter') == 'month' ? 'selected' : ''; ?>>This Month</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Source</label>
                <select class="form-select" name="source">
                    <option value="">All Sources</option>
                    <option value="contact_form" <?php echo $this->input->get('source') == 'contact_form' ? 'selected' : ''; ?>>Contact Form</option>
                    <option value="pricing_page" <?php echo $this->input->get('source') == 'pricing_page' ? 'selected' : ''; ?>>Pricing Page</option>
                    <option value="demo_request" <?php echo $this->input->get('source') == 'demo_request' ? 'selected' : ''; ?>>Demo Request</option>
                    <option value="support" <?php echo $this->input->get('source') == 'support' ? 'selected' : ''; ?>>Support</option>
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

<!-- Enquiries Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Enquiries List
            <span class="badge bg-secondary ms-2"><?php echo number_format($total_enquiries); ?> enquiries</span>
        </h5>
    </div>
    <div class="card-body">
        <?php if (!empty($enquiries)): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Subject</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Source</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enquiries as $enquiry): ?>
                            <tr class="<?php echo !$enquiry['is_read'] ? 'table-warning' : ''; ?>">
                                <td>
                                    <strong>#<?php echo $enquiry['id']; ?></strong>
                                    <?php if (!$enquiry['is_read']): ?>
                                        <span class="badge bg-warning badge-sm ms-1">New</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-2">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                                 style="width: 32px; height: 32px; font-size: 14px;">
                                                <?php echo strtoupper(substr($enquiry['name'], 0, 1)); ?>
                                            </div>
                                        </div>
                                        <div>
                                            <strong><?php echo htmlspecialchars($enquiry['name']); ?></strong>
                                            <br><small class="text-muted"><?php echo htmlspecialchars($enquiry['email']); ?></small>
                                            <?php if (!empty($enquiry['phone'])): ?>
                                                <br><small class="text-muted">
                                                    <i class="fas fa-phone fa-xs me-1"></i>
                                                    <?php echo htmlspecialchars($enquiry['phone']); ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <strong><?php echo htmlspecialchars($enquiry['subject'] ?? 'General Enquiry'); ?></strong>
                                    <br><small class="text-muted">
                                        <?php echo truncateText($enquiry['message'], 60); ?>
                                    </small>
                                    <?php if (!empty($enquiry['company'])): ?>
                                        <br><span class="badge bg-light text-dark">
                                            <i class="fas fa-building fa-xs me-1"></i>
                                            <?php echo htmlspecialchars($enquiry['company']); ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $priority = $enquiry['priority'] ?? 'medium';
                                    $priority_classes = [
                                        'high' => 'bg-danger',
                                        'medium' => 'bg-warning text-dark',
                                        'low' => 'bg-success'
                                    ];
                                    $priority_class = $priority_classes[$priority] ?? 'bg-secondary';
                                    ?>
                                    <span class="badge <?php echo $priority_class; ?>">
                                        <?php echo ucfirst($priority); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php
                                    $status = $enquiry['status'] ?? 'new';
                                    $status_classes = [
                                        'new' => 'bg-primary',
                                        'pending' => 'bg-warning text-dark',
                                        'responded' => 'bg-success',
                                        'closed' => 'bg-secondary'
                                    ];
                                    $status_class = $status_classes[$status] ?? 'bg-secondary';
                                    ?>
                                    <span class="badge <?php echo $status_class; ?>">
                                        <?php echo ucfirst($status); ?>
                                    </span>
                                    <?php if (isset($enquiry['response_count']) && $enquiry['response_count'] > 0): ?>
                                        <br><small class="text-muted">
                                            <i class="fas fa-reply fa-xs me-1"></i>
                                            <?php echo $enquiry['response_count']; ?> response(s)
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $source = $enquiry['source'] ?? 'contact_form';
                                    $source_icons = [
                                        'contact_form' => 'fas fa-envelope',
                                        'pricing_page' => 'fas fa-dollar-sign',
                                        'demo_request' => 'fas fa-play-circle',
                                        'support' => 'fas fa-headset'
                                    ];
                                    $icon = $source_icons[$source] ?? 'fas fa-question-circle';
                                    ?>
                                    <i class="<?php echo $icon; ?> me-1"></i>
                                    <?php echo ucfirst(str_replace('_', ' ', $source)); ?>
                                </td>
                                <td>
                                    <?php echo date('M d, Y', strtotime($enquiry['created_at'])); ?>
                                    <br><small class="text-muted"><?php echo date('H:i', strtotime($enquiry['created_at'])); ?></small>
                                    <br><small class="text-muted"><?php echo timeAgo($enquiry['created_at']); ?></small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url('admin/enquiry_details/' . $enquiry['id']); ?>" 
                                           class="btn btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-success" 
                                                onclick="quickReply(<?php echo $enquiry['id']; ?>)" title="Quick Reply">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-info" 
                                                onclick="setPriority(<?php echo $enquiry['id']; ?>)" title="Set Priority">
                                            <i class="fas fa-flag"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary" 
                                                onclick="assignEnquiry(<?php echo $enquiry['id']; ?>)" title="Assign">
                                            <i class="fas fa-user-plus"></i>
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
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No enquiries found</h5>
                <p class="text-muted">No enquiries match your current filters.</p>
                <a href="<?php echo site_url('admin/enquiries'); ?>" class="btn btn-primary">
                    <i class="fas fa-refresh me-2"></i>Reset Filters
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Quick Reply Modal -->
<div class="modal fade" id="quickReplyModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quick Reply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="quickReplyForm">
                <div class="modal-body">
                    <input type="hidden" id="enquiryId" name="enquiry_id">
                    
                    <!-- Original Enquiry Display -->
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Original Enquiry</h6>
                            <div id="originalEnquiry"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Response Type</label>
                            <select class="form-select" name="response_type" required>
                                <option value="">Select type...</option>
                                <option value="email">Email Only</option>
                                <option value="whatsapp">WhatsApp Only</option>
                                <option value="both">Both Email & WhatsApp</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Template</label>
                            <select class="form-select" id="responseTemplate">
                                <option value="">Select template...</option>
                                <option value="thank_you">Thank You</option>
                                <option value="info_request">Information Request</option>
                                <option value="pricing_info">Pricing Information</option>
                                <option value="demo_schedule">Demo Scheduling</option>
                                <option value="technical_support">Technical Support</option>
                                <option value="follow_up">Follow Up</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 mt-3">
                        <label class="form-label">Response Message</label>
                        <textarea class="form-control" name="response_message" rows="6" required 
                                  placeholder="Type your response here..."></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mark_resolved" id="markResolved">
                                <label class="form-check-label" for="markResolved">
                                    Mark enquiry as resolved
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="send_copy" id="sendCopy" checked>
                                <label class="form-check-label" for="sendCopy">
                                    Send copy to admin
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>Send Reply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Set Priority Modal -->
<div class="modal fade" id="priorityModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Priority</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="priorityForm">
                <div class="modal-body">
                    <input type="hidden" id="priorityEnquiryId" name="enquiry_id">
                    <div class="mb-3">
                        <label class="form-label">Priority Level</label>
                        <select class="form-select" name="priority" required>
                            <option value="">Select priority...</option>
                            <option value="high">High - Urgent attention required</option>
                            <option value="medium">Medium - Normal priority</option>
                            <option value="low">Low - Can wait</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" name="priority_notes" rows="2" 
                                  placeholder="Add notes about why this priority was set..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Set Priority</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function quickReply(enquiryId) {
    document.getElementById('enquiryId').value = enquiryId;
    
    // Load enquiry details
    fetch('<?php echo site_url("admin/get_enquiry_details"); ?>/' + enquiryId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('originalEnquiry').innerHTML = `
                    <strong>${data.enquiry.name}</strong> - ${data.enquiry.email}<br>
                    <strong>Subject:</strong> ${data.enquiry.subject || 'General Enquiry'}<br>
                    <strong>Message:</strong> ${data.enquiry.message}
                `;
            }
        });
    
    new bootstrap.Modal(document.getElementById('quickReplyModal')).show();
}

function setPriority(enquiryId) {
    document.getElementById('priorityEnquiryId').value = enquiryId;
    new bootstrap.Modal(document.getElementById('priorityModal')).show();
}

function assignEnquiry(enquiryId) {
    // Implement assignment functionality
    alert('Assignment functionality would be implemented here');
}

function markAllAsRead() {
    if (confirm('Mark all enquiries as read?')) {
        fetch('<?php echo site_url("admin/mark_all_enquiries_read"); ?>', {
            method: 'POST'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
}

function exportEnquiries() {
    const params = new URLSearchParams(window.location.search);
    params.append('export', '1');
    window.location.href = '<?php echo site_url("admin/enquiries"); ?>?' + params.toString();
}

// Response templates
const templates = {
    thank_you: "Thank you for contacting TrulyPOS. We appreciate your interest in our point of sale solutions. We will review your enquiry and get back to you within 24 hours.",
    info_request: "Thank you for your enquiry about TrulyPOS. I'd be happy to provide you with more information about our solutions. Could you please let me know specifically what aspects you'd like to learn more about?",
    pricing_info: "Thank you for your interest in TrulyPOS pricing. Our solutions are designed to be cost-effective for businesses of all sizes. I'll send you detailed pricing information based on your specific requirements.",
    demo_schedule: "Thank you for requesting a demo of TrulyPOS. I'd be happy to schedule a personalized demonstration for you. Please let me know your preferred time and date.",
    technical_support: "Thank you for contacting our technical support. I understand you're experiencing some issues. Let me help you resolve this as quickly as possible.",
    follow_up: "I wanted to follow up on your recent enquiry about TrulyPOS. Do you have any additional questions or would you like to schedule a call to discuss your requirements further?"
};

// Handle template selection
document.getElementById('responseTemplate').addEventListener('change', function() {
    const template = this.value;
    if (template && templates[template]) {
        document.querySelector('textarea[name="response_message"]').value = templates[template];
    }
});

// Handle form submissions
document.getElementById('quickReplyForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?php echo site_url("admin/respond_enquiry"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('quickReplyModal')).hide();
            location.reload();
        } else {
            alert('Failed to send reply: ' + data.message);
        }
    });
});

document.getElementById('priorityForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?php echo site_url("admin/set_enquiry_priority"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('priorityModal')).hide();
            location.reload();
        } else {
            alert('Failed to set priority: ' + data.message);
        }
    });
});

<?php
function truncateText($text, $length = 60) {
    if (strlen($text) <= $length) {
        return htmlspecialchars($text);
    }
    return htmlspecialchars(substr($text, 0, $length)) . '...';
}

function timeAgo($datetime) {
    $time = time() - strtotime($datetime);
    if ($time < 60) return 'just now';
    if ($time < 3600) return floor($time/60) . ' min ago';
    if ($time < 86400) return floor($time/3600) . ' hours ago';
    return floor($time/86400) . ' days ago';
}
?>
</script>
