<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Auth System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #ede7f6; /* Light purple background */
            font-family: sans-serif;
        }

        .profile-picture {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #3b82f6; /* Blue, similar to the login button */
            color: white; /* Ensure the initials are white */
            font-size: 2rem; /* Adjust font size as needed */
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .welcome-card {
            background-color: white;
            border-radius: 1rem; /* Rounded corners */
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1); /* Shadow */
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .user-info-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
            color: #4b5563; /* Darker gray */
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-value {
            color: #374151; /* Even darker gray */
            background-color: #f9fafb; /* Very light gray */
            padding: 0.75rem;
            border-radius: 0.5rem;
        }

        .logout-button {
            background-color: #3b82f6; /* Blue, same as login button */
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
            text-decoration: none; /* Remove underline from the link */
            cursor: pointer; /* Change cursor to pointer */
        }

        .logout-button:hover {
            background-color: #2563eb; /* Darker blue on hover */
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 10; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            border-radius: 0.5rem;
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
        }

        .modal-buttons {
            text-align: right;
            margin-top: 1rem;
        }

        .confirm-button, .cancel-button {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            margin-left: 0.5rem;
        }

        .confirm-button {
            background-color: #3b82f6;
            color: white;
        }

        .cancel-button {
            background-color: #ddd;
        }
    </style>
    <script>
        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = "block";
        }

        function hideLogoutModal() {
            document.getElementById('logoutModal').style.display = "none";
        }
    </script>
</head>
<body class="min-h-screen">
    <!-- Navigation Header -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-800">Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span id="welcomeMessage" class="text-gray-600"></span>
                    <button onclick="showLogoutModal()" class="logout-button">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Card -->
        <div class="welcome-card flex items-center">
            <div class="profile-picture mr-4">
                <?php if(!empty($user['profile_picture']) && file_exists($user['profile_picture'])): ?>
                    <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
                <?php else: ?>
                    <?= strtoupper(substr($user['first_name'],0,1)) ?>
                <?php endif; ?>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome to Your Dashboard!</h2>
                <p class="text-gray-600 text-lg">You have successfully logged in. Here's your personalized dashboard.</p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stats-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Profile</p>
                        <p class="text-2xl font-semibold text-gray-900">Active</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Status</p>
                        <p class="text-2xl font-semibold text-gray-900">Online</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Last Login</p>
                        <p class="text-2xl font-semibold text-gray-900" id="loginTime">Now</p>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Activity</p>
                        <p class="text-2xl font-semibold text-gray-900">High</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Information Card -->
        <div class="user-info-card">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">User Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">First Name</label>
                    <p id="userFirstName" class="form-value"><?= ($user['first_name']) ?></p>
                </div>
                <div>
                    <label class="form-label">Last Name</label>
                    <p id="userLastName" class="form-value"><?= ($user['last_name']) ?></p>
                </div>
                <div>
                    <label class="form-label">Email Address</label>
                    <p id="userEmail" class="form-value"><?= ($user['email']) ?></p>
                </div>
                <div>
                    <label class="form-label">Username</label>
                    <p id="userEmail" class="form-value"><?= ($user['username']) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="hideLogoutModal()">&times;</span>
            <p>Are you sure you want to logout?</p>
            <div class="modal-buttons">
                <button class="cancel-button" onclick="hideLogoutModal()">Cancel</button>
                <a href="<?= site_url('logout');?>" class="confirm-button">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>