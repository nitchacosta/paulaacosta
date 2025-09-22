<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Diprella</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --teal-primary: #4ECDC4;
            --teal-dark: #45B7B8;
            --coral: #FF6B6B;
            --yellow: #FFE66D;
            --gray-light: #F8F9FA;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gray-light);
        }
        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: #333 !important;
        }
        .logo-icon {
            width: 24px;
            height: 24px;
            background: var(--teal-primary);
            border-radius: 4px;
            margin-right: 0.5rem;
        }
        .btn-logout {
            background: var(--coral);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: #ff5252;
            transform: translateY(-2px);
        }
        .welcome-card {
            background: linear-gradient(135deg, var(--teal-primary) 0%, var(--teal-dark) 100%);
            color: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -20px;
            right: -20px;
        }
        .profile-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .profile-picture {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--teal-primary) 0%, var(--teal-dark) 100%);
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .detail-card {
            border: none;
            border-radius: 10px;
            background: white;
            border-left: 4px solid var(--teal-primary);
            transition: all 0.3s ease;
        }
        .detail-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .detail-label {
            color: var(--teal-primary);
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .detail-value {
            color: #333;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .stats-card {
            background: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        .stats-icon.teal { background: var(--teal-primary); }
        .stats-icon.coral { background: var(--coral); }
        .stats-icon.yellow { background: var(--yellow); color: #333; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <div class="logo-icon"></div>
                Diprella Dashboard
            </div>
            <button type="button" class="btn btn-logout text-white d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </div>
    </nav>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="<?=site_url('logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <!-- Welcome Section -->
        <div class="card welcome-card mb-4">
            <div class="card-body p-4 position-relative">
                <h1 class="h2 fw-bold mb-2">Welcome back, <?= ($user['first_name']) ?>!</h1>
                <p class="fs-5 mb-0 opacity-90">Here's your profile information and account details.</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon teal mx-auto mb-3">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1"><?= ($user['account_status'] ?? 'Active') ?></h3>
                        <p class="text-muted mb-0">Account Status</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon coral mx-auto mb-3">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1"><?= date('F Y', strtotime($user['created_at'])) ?></h3>
                        <p class="text-muted mb-0">Member Since</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon yellow mx-auto mb-3">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1"><?= ($user['account_type'] ?? 'Standard') ?></h3>
                        <p class="text-muted mb-0">Account Type</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="card profile-card">
            <div class="card-body p-4">
                <!-- Profile Header -->
                <div class="d-flex align-items-center mb-4">
                    <div class="profile-picture me-3">
                        <?php if(!empty($user['profile_picture']) && file_exists($user['profile_picture'])): ?>
                            <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
                        <?php else: ?>
                            <?= strtoupper(substr($user['first_name'],0,1)) ?>
                        <?php endif; ?>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold text-dark mb-1"><?= ($user['first_name'].' '.$user['last_name']) ?></h2>
                        <p class="text-muted mb-0">@<?= ($user['username']) ?></p>
                    </div>
                </div>

                <!-- Profile Details Grid -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">First Name</div>
                                <div class="detail-value"><?= ($user['first_name']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">Username</div>
                                <div class="detail-value"><?= ($user['username']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">Email Address</div>
                                <div class="detail-value"><?= ($user['email']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">Member Since</div>
                                <div class="detail-value"><?= date('F d, Y', strtotime($user['created_at'])) ?></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

          <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
