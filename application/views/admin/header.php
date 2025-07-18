<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'TrulyPOS Admin'; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            border-radius: 8px;
            margin: 2px 0;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 12px;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px 12px 0 0 !important;
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .table th {
            background-color: #f8f9fa;
            border-top: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
        .badge {
            font-size: 0.75em;
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.6rem;
        }
        .navbar-brand {
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="text-white mb-0">
                        <i class="fas fa-cash-register me-2"></i>
                        TrulyPOS
                    </h4>
                </div>
                
                <nav class="nav flex-column">
                    <a class="nav-link <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>" href="<?php echo site_url('admin'); ?>">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'customers' ? 'active' : ''; ?>" href="<?php echo site_url('admin/customers'); ?>">
                        <i class="fas fa-users me-2"></i> Customers
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'payments' ? 'active' : ''; ?>" href="<?php echo site_url('admin/payments'); ?>">
                        <i class="fas fa-credit-card me-2"></i> Payments
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'enquiries' ? 'active' : ''; ?>" href="<?php echo site_url('admin/enquiries'); ?>">
                        <i class="fas fa-envelope me-2"></i> Enquiries
                        <?php if (isset($pending_enquiries) && $pending_enquiries > 0): ?>
                            <span class="badge bg-danger notification-badge"><?php echo $pending_enquiries; ?></span>
                        <?php endif; ?>
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'licenses' ? 'active' : ''; ?>" href="<?php echo site_url('admin/licenses'); ?>">
                        <i class="fas fa-key me-2"></i> Licenses
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'newsletter' ? 'active' : ''; ?>" href="<?php echo site_url('admin/newsletter'); ?>">
                        <i class="fas fa-newspaper me-2"></i> Newsletter
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'notifications' ? 'active' : ''; ?>" href="<?php echo site_url('admin/notifications'); ?>">
                        <i class="fas fa-bell me-2"></i> Notifications
                    </a>
                    <a class="nav-link <?php echo $this->uri->segment(2) == 'settings' ? 'active' : ''; ?>" href="<?php echo site_url('admin/settings'); ?>">
                        <i class="fas fa-cog me-2"></i> Settings
                    </a>
                    
                    <hr class="text-white-50">
                    <a class="nav-link" href="<?php echo site_url('admin/logout'); ?>">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </nav>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 main-content p-4">
                <!-- Top Navigation -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 rounded shadow-sm">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1"><?php echo isset($title) ? $title : 'Admin Dashboard'; ?></span>
                        
                        <div class="navbar-nav ms-auto">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i>
                                    <?php echo $this->session->userdata('admin_username') ?: 'Admin'; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/settings'); ?>"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo site_url('admin/logout'); ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
