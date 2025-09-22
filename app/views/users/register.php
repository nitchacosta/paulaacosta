<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up to Diprella</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Updated to match Diprella design with reversed layout for registration */
        :root {
            --teal-primary: #4ECDC4;
            --teal-dark: #45B7B8;
            --coral: #FF6B6B;
            --yellow: #FFE66D;
            --gray-light: #F8F9FA;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }
        
        .split-container {
            display: flex;
            height: 100vh;
        }
        
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, var(--teal-primary) 0%, var(--teal-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .right-panel {
            flex: 1;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 2rem;
            overflow-y: auto;
        }
        
        .logo {
            position: absolute;
            top: 2rem;
            right: 2rem;
            display: flex;
            align-items: center;
            font-weight: 600;
            color: #333;
        }
        
        .logo-icon {
            width: 24px;
            height: 24px;
            background: var(--teal-primary);
            border-radius: 4px;
            margin-right: 0.5rem;
        }
        
        .form-container {
            width: 100%;
            max-width: 350px;
        }
        
        .form-title {
            color: var(--teal-primary);
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .social-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            border-color: var(--teal-primary);
            color: var(--teal-primary);
        }
        
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            color: #999;
            font-size: 0.9rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            background: #f8f9fa;
        }
        
        .form-control:focus {
            border-color: var(--teal-primary);
            box-shadow: 0 0 0 0.2rem rgba(78, 205, 196, 0.25);
            background: white;
        }
        
        .btn-signup {
            background: var(--teal-primary);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-signup:hover {
            background: var(--teal-dark);
            transform: translateY(-2px);
        }
        
        .welcome-content {
            text-align: center;
            z-index: 2;
        }
        
        .welcome-title {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 1rem;
        }
        
        .welcome-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn-signin {
            background: transparent;
            border: 2px solid white;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-signin:hover {
            background: white;
            color: var(--teal-primary);
        }
        
        /* Decorative shapes */
        .shape {
            position: absolute;
            border-radius: 50%;
        }
        
        .shape-1 {
            width: 100px;
            height: 100px;
            background: var(--coral);
            top: 10%;
            left: 10%;
            opacity: 0.8;
        }
        
        .shape-2 {
            width: 60px;
            height: 60px;
            background: var(--yellow);
            bottom: 20%;
            right: -30px;
            opacity: 0.9;
        }
        
        .left-panel::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -50px;
            left: -50px;
        }
        
        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }
            
            .left-panel {
                order: -1;
                flex: 0 0 40%;
            }
            
            .right-panel {
                flex: 1;
                padding: 1rem;
            }
            
            .logo {
                position: relative;
                top: 0;
                right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="split-container">
        <!-- Left Panel - Welcome Message -->
        <div class="left-panel">
            <div class="welcome-content">
                <h2 class="welcome-title">Welcome Back!</h2>
                <p class="welcome-subtitle">To keep connected with us<br>please login with your personal info</p>
                <a href="<?= site_url('/');?>" class="btn-signin">Sign In</a>
            </div>
            
            <!-- Decorative shapes -->
            <div class="shape shape-1"></div>
        </div>
        
        <!-- Right Panel - Registration Form -->
        <div class="right-panel">
            <div class="logo">
                <div class="logo-icon"></div>
                Diprella
            </div>
            
            <div class="form-container">
                <h1 class="form-title">Create Account</h1>
                
                <!-- Social Login Buttons -->
                <div class="social-buttons">
                    <a href="#" class="social-btn" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="social-btn" title="Google">
                        <i class="bi bi-google"></i>
                    </a>
                    <a href="#" class="social-btn" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
                
                <div class="divider">or use your email for registration</div>
                
                <!-- Registration Form -->
                
                <form id="registerForm" action="<?= site_url('create-user');?>" method="POST"  enctype="multipart/form-data">
                     <?php getErrors(); ?>
        <?php getMessage(); ?>

                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="file" class="form-control" required name="profile_picture" accept="image/*">
                    </div>
                    
                    <button type="submit" class="btn btn-signup text-white">
                        Sign Up
                    </button>
                </form>
            </div>
            
           
            <div class="shape shape-2"></div>
        </div>
    </div>

     <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

</body>
</html>
