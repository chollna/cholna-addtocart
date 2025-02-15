
<x-app-layout>
    <x-slot name="header">
     
    </x-slot>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
        }

        .card-header {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .card-body {
            text-align: center;
            font-size: 2rem;
            padding: 40px;
        }

        .card.bg-primary {
            background-color: #007bff !important;
        }

        .card.bg-success {
            background-color: #28a745 !important;
        }

        .card.bg-warning {
            background-color: #ffc107 !important;
        }

        .card.bg-danger {
            background-color: #dc3545 !important;
        }

        h3 {
            font-weight: bold;
        }

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
                <a href="{{ route('orders.index') }}">
                    <i class="fas fa-users"></i> order
                </a>
            </li>
            <li>
                <a href="{{ route('index') }}">
                    <i class="fas fa-box"></i> Products
                </a>
            </li>
            {{-- <li>
                <a href="#">
                    <i class="fas fa-chart-bar"></i> Analytics
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li> --}}
            <li>
                <a href="#">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </a>
            </li>
        </ul>
    </div>
  
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
<div class="container">
    <div class="row">
        <!-- Total Products Card -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <h3>{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Customers</div>
                <div class="card-body">
                    <h3>{{ $totalCustomers }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Orders Card -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Orders</div>
                <div class="card-body">
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Earnings Card -->
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Earnings</div>
                <div class="card-body">
                    <h3>${{ number_format($totalEarnings, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
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

<!-- Bootstrap JS (optional for responsiveness) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
</x-app-layout>