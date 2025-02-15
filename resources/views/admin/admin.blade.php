<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Sidebar Menu</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        .sidebar {
            height: 100vh;
            background: #2c3e50;
            padding: 20px 0;
            position: fixed;
            width: 250px;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 20px;
            color: #ecf0f1;
            text-align: center;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li a {
            color: #bdc3c7;
            text-decoration: none;
            padding: 15px 30px;
            display: block;
            transition: all 0.3s;
        }

        .sidebar-menu li a:hover {
            background: #34495e;
            color: #ecf0f1;
            padding-left: 35px;
        }

        .sidebar-menu li a i {
            margin-right: 15px;
            width: 20px;
        }

        .active {
            background: #34495e;
            color: #ecf0f1 !important;
            border-left: 4px solid #3498db;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }

        .toggle-btn {
            position: fixed;
            left: 10px;
            top: 10px;
            z-index: 1000;
        }
    </style>
</head>
<body>

<!-- Sidebar Toggle Button -->
<button class="btn btn-primary toggle-btn d-md-none" id="toggleSidebar">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    
    <ul class="sidebar-menu">
        <li>
            <a href="#" class="active">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('orders') }}">
                <i class="fas fa-users"></i> order
            </a>
        </li>
        <li>
            <a href="{{ route('index') }}">
                <i class="fas fa-box"></i> Products
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-chart-bar"></i> Analytics
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-cog"></i> Settings
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <h1>Main Content Area</h1>
    <p>Resize the browser window to see the responsive behavior.</p>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Custom Script -->
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
    });
</script>

</body>
</html>