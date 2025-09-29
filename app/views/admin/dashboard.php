<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #4285F4;
            --background-purple: #F3F0FF;
            --card-white: #FFFFFF;
            --text-dark: #2D3748;
            --text-gray: #718096;
            --border-light: #E2E8F0;
            --success-green: #48BB78;
            --warning-yellow: #ECC94B;
            --danger-red: #F56565;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-purple);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        /* Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .dashboard-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        .logout-btn {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            background: #3367D6;
            color: white;
            transform: translateY(-1px);
        }
        
        /* Welcome Card */
        .welcome-card {
            background: var(--card-white);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .profile-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 600;
        }
        
        .welcome-text h2 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0 0 0.5rem 0;
        }
        
        .welcome-text p {
            color: var(--text-gray);
            margin: 0;
            font-size: 1rem;
        }
        
        /* Status Cards */
        .status-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .status-card {
            background: var(--card-white);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }
        
        .status-card:hover {
            transform: translateY(-2px);
        }
        
        .status-card-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        
        .status-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        
        .status-icon.users { background: rgba(66, 133, 244, 0.1); color: var(--primary-blue); }
        .status-icon.active { background: rgba(72, 187, 120, 0.1); color: var(--success-green); }
        .status-icon.pending { background: rgba(236, 201, 75, 0.1); color: var(--warning-yellow); }
        .status-icon.activity { background: rgba(147, 51, 234, 0.1); color: #9333EA; }
        
        .status-label {
            color: var(--text-gray);
            font-size: 0.9rem;
            margin: 0;
        }
        
        .status-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        /* User Management Section */
        .user-management {
            background: var(--card-white);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }
        
        .section-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .search-form {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .search-input {
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            min-width: 200px;
        }
        
        .btn-primary {
            background: var(--primary-blue);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: white;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background: #3367D6;
            transform: translateY(-1px);
        }
        
        .btn-outline-secondary {
            border: 1px solid var(--border-light);
            color: var(--text-gray);
            background: white;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .btn-outline-secondary:hover {
            background: #F7FAFC;
            border-color: var(--text-gray);
        }
        
        /* Table Styles */
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            border-bottom: 2px solid var(--border-light);
            font-weight: 600;
            color: var(--text-dark);
            padding: 1rem 0.75rem;
            background: #F8FAFC;
        }
        
        .table td {
            border-top: 1px solid var(--border-light);
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            margin-right: 0.75rem;
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-details h6 {
            margin: 0;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .user-details small {
            color: var(--text-gray);
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.85rem;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .btn-outline-primary {
            border-color: var(--primary-blue);
            color: var(--primary-blue);
            background: white;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }
        
        .modal-header {
            border-bottom: 1px solid var(--border-light);
            padding: 1.5rem;
        }
        
        .modal-title {
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 0.75rem;
            transition: border-color 0.2s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.1);
        }
        
        /* Pagination */
        .pagination .page-link {
            color: var(--primary-blue);
            border: 1px solid var(--border-light);
            border-radius: 8px;
            margin: 0 2px;
            padding: 0.5rem 0.75rem;
        }
        
        .pagination .page-link:hover {
            background-color: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }
            
            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .welcome-card {
                flex-direction: column;
                text-align: center;
            }
            
            .status-cards {
                grid-template-columns: 1fr;
            }
            
            .section-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .section-actions {
                flex-direction: column;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .search-input {
                min-width: auto;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
         Header 
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <button type="button" class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutConfirmModal">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </div>

         Welcome Card 
        <div class="welcome-card">
            <div class="profile-icon">
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="welcome-text">
                <h2>Welcome to Your Dashboard!</h2>
                <p>You have successfully logged in. Here's your personalized dashboard.</p>
            </div>
        </div>

         Status Cards 
        <div class="status-cards">
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon users">
                        <i class="bi bi-people"></i>
                    </div>
                    <p class="status-label">Total Users</p>
                </div>
                <h3 class="status-value"><?= count($getAll); ?></h3>
            </div>
            
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon active">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <p class="status-label">Status</p>
                </div>
                <h3 class="status-value">Online</h3>
            </div>
            
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon pending">
                        <i class="bi bi-clock"></i>
                    </div>
                    <p class="status-label">Last Login</p>
                </div>
                <h3 class="status-value">Now</h3>
            </div>
            
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon activity">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <p class="status-label">Activity</p>
                </div>
                <h3 class="status-value">High</h3>
            </div>
        </div>

         User Management Section 
        <div class="user-management">
            <div class="section-header">
                <h3 class="section-title">User Information</h3>
                <div class="section-actions">
                    <form action="<?= site_url('admin/user-management'); ?>" method="get" class="search-form">
                        <?php
                        $q = '';
                        if(isset($_GET['q'])) {
                            $q = $_GET['q'];
                        }
                        ?>
                        <input type="text" class="form-control search-input" name="q" placeholder="Search users..." value="<?= html_escape($q); ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-circle me-2"></i>Add Admin
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-download me-2"></i>Export
                    </button>
                </div>
            </div>

            <?php getErrors(); ?>
            <?php getMessage(); ?>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <?php foreach($getAll as $user): ?>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
                                    </div>
                                    <div class="user-details">
                                        <h6><?= html_escape($user['username']); ?></h6>
                                        <small>ID: <?= html_escape($user['id']); ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?= html_escape($user['email']); ?></td>
                            <td><?= html_escape($user['first_name']); ?></td>
                            <td><?= html_escape($user['last_name']); ?></td>
                            <td><?= html_escape($user['role']); ?></td>
                            <td><?= html_escape($user['created_at']); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user['id']; ?>">Edit</button>
                                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $user['id']; ?>">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= site_url('admin/createAdmin'); ?>" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Admin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Profile Picture</label>
                                                <input type="file" class="form-control" required name="profile_picture" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= site_url('admin/update/'.$user['id']); ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" value="<?= html_escape($user['first_name']); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="<?= html_escape($user['last_name']); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" value="<?= html_escape($user['username']); ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= html_escape($user['email']); ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                        <div class="modal fade" id="deleteUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= site_url('admin/delete/'.$user['id']); ?>">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">Confirm Delete</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete <strong><?= html_escape($user['username']); ?></strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            
            <div class="mt-3">
                <?php echo $page; ?>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="logoutConfirmModal" tabindex="-1" aria-labelledby="logoutConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutConfirmModalLabel">
                        <i class="bi bi-box-arrow-right me-2"></i>Confirm Logout
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to logout? You will need to sign in again to access your dashboard.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="<?=site_url('logout'); ?>" class="btn btn-primary">
                        <i class="bi bi-box-arrow-right me-2"></i>Yes, Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
