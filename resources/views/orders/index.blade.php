

<x-app-layout>
    <x-slot name="header">
     
    </x-slot>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .order-items-table {
            width: 100%;
            margin-top: 20px;
        }

        .order-items-table th, .order-items-table td {
            padding: 8px 12px;
        }

        .order-items-table td {
            border: 1px solid #ddd;
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
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}"class="active">
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
            <form method="POST" action="{{ route('logout') }}">
                @csrf
        
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Status</th>
                <th>Placed by</th>
                <th>Total Price</th>
                <th>Order Items</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>${{ $order->total_price }}</td>
                    <td>
                        <table class="order-items-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>${{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
</x-app-layout>