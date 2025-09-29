<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Auth System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #a855f7 0%, #7c3aed 100%);
            min-height: 100vh;
        }
        .auth-card {
            background: white;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .toggle-btn {
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
        }
        .toggle-btn.active {
            background-color: #2563eb;
            color: white;
        }
        .toggle-btn.inactive {
            background-color: transparent;
            color: #6b7280;
        }
        .form-control {
            border-radius: 1rem;
            padding: 1rem;
            border: 1px solid #e5e7eb;
        }
        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }
        .btn-primary {
            background-color: #2563eb;
            border-color: #2563eb;
            border-radius: 1rem;
            padding: 1rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }
        .upload-area {
            border: 2px dashed #d1d5db;
            border-radius: 1rem;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .upload-area:hover {
            border-color: #2563eb;
            background-color: #eff6ff;
        }
        .profile-preview {
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e5e7eb;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-4">
    <div class="auth-card p-5" style="width: 100%; max-width: 28rem;">
        <h1 class="h2 fw-bold text-dark text-center mb-4">Signup Form</h1>
        
        <!-- Toggle Buttons -->
        <div class="bg-light rounded-pill p-1 mb-4 d-flex">
            <button onclick="window.location.href='<?= site_url('/'); ?>'" class="toggle-btn inactive flex-fill">
                Login
            </button>
            <button class="toggle-btn active flex-fill">
                Signup
            </button>
        </div>

                            <?php getErrors(); ?>
        <?php getMessage(); ?>
        <form id="signupForm" action="<?= site_url('create-user');?>" method="POST"  enctype="multipart/form-data">
            <div class="mb-3">
                <input 
                    type="text"
                    name="first_name" 
                    id="firstName" 
                    placeholder="First Name" 
                    required
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <input 
                    type="text" 
                    id="lastName" 
                    name="last_name"
                    placeholder="Last Name" 
                    required
                    class="form-control"
                >
            </div>
            
            <!-- Profile Image Upload -->
            <div class="mb-3">
                <div class="position-relative">
                        <input type="file" class="form-control" required name="profile_picture" accept="image/*">

                   
                </div>
                <div id="imagePreview" class="mt-3 d-none text-center">
                    <img id="previewImg" src="/placeholder.svg" alt="Preview" class="profile-preview">
                    <p id="fileName" class="small text-muted mt-2 mb-0"></p>
                </div>
            </div>
            
         <div class="mb-3">
                <input 
                    type="text"
                    name="username" 
                    id="email" 
                    placeholder="username" 
                    required
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <input 
                    type="email"
                    name="email" 
                    id="email" 
                    placeholder="Email Address" 
                    required
                    class="form-control"
                >
            </div>
            
            <div class="mb-3">
                <input 
                    type="password" 
                    name="password"
                    id="password" 
                    placeholder="Password" 
                    required
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <input 
                    type="password" 
                    name="confirm_password"
                    id="confirmPassword" 
                    placeholder="Confirm Password" 
                    required
                    class="form-control"
                >
            </div>

            <button 
                type="submit"
                class="btn btn-primary w-100"
            >
                Signup
            </button>
        </form>

        <div class="text-center mt-4">
            <span class="text-muted">Already a member? </span>
            <a href="<?=site_url('/'); ?>" class="text-primary text-decoration-none fw-medium">
                Login now
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

</body>
</html>
