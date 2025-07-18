<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">TrulyPOS Website Database Setup</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($setup_complete) && $setup_complete): ?>
                            <div class="alert alert-success">
                                <h4>Setup Complete!</h4>
                                <p>Your database is already set up and ready to use.</p>
                                <a href="<?php echo base_url(); ?>" class="btn btn-primary">Go to Website</a>
                                <a href="<?php echo base_url('admin'); ?>" class="btn btn-secondary">Admin Panel</a>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                <h4>Database Setup Required</h4>
                                <p>Click the button below to set up your database with sample data.</p>
                            </div>
                            
                            <div id="status-message"></div>
                            
                            <div class="mb-3">
                                <button id="test-connection" class="btn btn-info">Test Database Connection</button>
                                <button id="setup-database" class="btn btn-primary">Setup Database</button>
                            </div>
                            
                            <div class="mt-4">
                                <h5>Database Configuration</h5>
                                <p>Make sure your database configuration is correct in:</p>
                                <code>application/config/database.php</code>
                                
                                <div class="mt-3">
                                    <strong>Current Database Settings:</strong><br>
                                    <small class="text-muted">
                                        Host: localhost<br>
                                        Database: trulypos_web<br>
                                        Username: trulypos_root
                                    </small>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('test-connection').addEventListener('click', function() {
            fetch('<?php echo base_url('setup/test_connection'); ?>')
                .then(response => response.json())
                .then(data => {
                    const alertClass = data.success ? 'alert-success' : 'alert-danger';
                    document.getElementById('status-message').innerHTML = 
                        `<div class="alert ${alertClass}">${data.message}</div>`;
                });
        });

        document.getElementById('setup-database').addEventListener('click', function() {
            this.disabled = true;
            this.textContent = 'Setting up...';
            
            fetch('<?php echo base_url('setup/run'); ?>')
                .then(response => response.json())
                .then(data => {
                    const alertClass = data.success ? 'alert-success' : 'alert-danger';
                    document.getElementById('status-message').innerHTML = 
                        `<div class="alert ${alertClass}">${data.message}</div>`;
                    
                    if (data.success) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    } else {
                        this.disabled = false;
                        this.textContent = 'Setup Database';
                    }
                });
        });
    </script>
</body>
</html>
