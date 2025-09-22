<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Diprella</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --teal-primary: #4ECDC4;
            --teal-dark: #45B7B8;
            --coral: #FF6B6B;
            --yellow: #FFE66D;
            --gray-light: #F8F9FA;
            --sidebar-width: 280px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }
        
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--teal-primary) 0%, var(--teal-dark) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .logo-icon {
            width: 32px;
            height: 32px;
            background: white;
            border-radius: 6px;
            margin-right: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--teal-primary);
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-item {
            margin-bottom: 0.5rem;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border-left-color: white;
        }
        
        .nav-link i {
            margin-right: 0.75rem;
            width: 20px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 2rem;
        }
        
        .header {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: between;
            align-items: center;
        }
        
        .header-title {
            color: #333;
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0;
        }
        
        .header-actions {
            display: flex;
            gap: 1rem;
            margin-left: auto;
        }
        
        .btn-primary {
            background: var(--teal-primary);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: var(--teal-dark);
            transform: translateY(-2px);
        }
        
        /* Stats Cards */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .stat-icon.users { background: rgba(78, 205, 196, 0.1); color: var(--teal-primary); }
        .stat-icon.active { background: rgba(40, 167, 69, 0.1); color: #28a745; }
        .stat-icon.pending { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .stat-icon.blocked { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* User Management Table */
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .table-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
        
        .search-box {
            position: relative;
            max-width: 300px;
        }
        
        .search-box input {
            padding-left: 2.5rem;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        
        .search-box i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            border-bottom: 2px solid #f1f3f4;
            font-weight: 600;
            color: #333;
            padding: 1rem 0.75rem;
        }
        
        .table td {
            border-top: 1px solid #f1f3f4;
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        
       .user-avatar {
    width: 50px;       /* Size of the avatar */
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;    /* Prevent shrinking */
    margin-right: 0.75rem;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Keeps image aspect ratio, fills container */
    display: block;
}

        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-details h6 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }
        
        .user-details small {
            color: #666;
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-active { background: rgba(40, 167, 69, 0.1); color: #28a745; }
        .status-pending { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .status-blocked { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            border-radius: 6px;
        }
        
        .btn-outline-primary {
            border-color: var(--teal-primary);
            color: var(--teal-primary);
        }
        
        .btn-outline-primary:hover {
            background: var(--teal-primary);
            border-color: var(--teal-primary);
        }
        
        /* Pagination Custom Styles */
      /* Custom Pagination Styles */
.pagination .page-link {
    color: var(--teal-primary) !important;
    border: 1px solid var(--teal-primary) !important;
    transition: all 0.3s ease;
    background-color: #fff !important; /* keep white default */
}

.pagination .page-link:hover {
    background-color: var(--teal-primary) !important;
    color: #fff !important;
    border-color: var(--teal-dark) !important;
}

.pagination .page-item.active .page-link {
  background-color: black
  /* remove Bootstrap blue glow */
}



        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .stats-row {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .header-actions {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
  <div class="admin-container">
    <!-- Sidebar -->
    <nav class="sidebar">
      <div class="sidebar-header">
        <div class="logo">
          <div class="logo-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
          Diprella Admin
        </div>
      </div>
      <div class="sidebar-nav">
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a></div>
        <div class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-people"></i> User Management</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bar-chart"></i> Analytics</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-gear"></i> Settings</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-shield-check"></i> Security</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-envelope"></i> Messages</a></div>
        <div class="nav-item"><a href="login.html" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <!-- Header -->
      <div class="header">
        <h1 class="header-title">User Management</h1>
        <div class="header-actions">
          <button class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Add User</button>
          <button class="btn btn-outline-secondary"><i class="bi bi-download me-2"></i>Export</button>
        </div>
      </div>

      <!-- User Management Table -->
      <div class="content-card">
        <div class="table-header">
          <h3 class="table-title">All Users</h3>
         <form action="<?= site_url('dashboard'); ?>" method="get" class="search-box d-flex">
            <?php
            $q = '';
            if(isset($_GET['q'])) {
                $q = $_GET['q'];
            }
            ?>
            <i class="bi bi-search align-self-center me-2"></i>
            <input type="text" class="form-control" name="q" placeholder="Search users..." value="<?= html_escape($q); ?>">
            <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>

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
                <td><?= html_escape($user['created_at']); ?></td>

                <td>
                  <div class="action-buttons">
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user['id']; ?>">Edit</button>
                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $user['id']; ?>">Delete</button>
                  </div>
                </td>
              </tr>

              <!-- Edit User Modal -->
              <div class="modal fade" id="editUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form method="POST" action="<?= site_url('admin/update/'.$user['id']); ?>">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3"><label class="form-label">First Name</label><input type="text" name="first_name" class="form-control" value="<?= html_escape($user['first_name']); ?>"></div>
                        <div class="mb-3"><label class="form-label">Last Name</label><input type="text" name="last_name" class="form-control" value="<?= html_escape($user['last_name']); ?>"></div>
                        <div class="mb-3"><label class="form-label">Username</label><input type="text" name="username" class="form-control" value="<?= html_escape($user['username']); ?>"></div>
                        <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?= html_escape($user['email']); ?>"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form method="POST" action="<?= site_url('admin/delete/'.$user['id']); ?>">
                      <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">Are you sure you want to delete <strong><?= html_escape($user['username']); ?></strong>?</div>
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

           <!-- Pagination -->
        <div class="mt-3">
            <?php
              
                echo $page;
            ?>
        </div>
      </div>
    </main>
  </div>

      <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
