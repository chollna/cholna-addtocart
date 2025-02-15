
<x-app-layout>
    <x-slot name="header">
     
    </x-slot>
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 CRUD (Create, Read, Update and Delete) with Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <a href="{{ route('dashboard') }}" >
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('orders.index') }}"class="active">
                <i class="fas fa-users"></i> order
            </a>
        </li>
        <li>
            <a href="{{ route('index') }}" class="active">
                <i class="fas fa-box"></i> Products
            </a>
        </li>
        {{-- <li>
            <a href="#">
                <i class="fas fa-chart-bar"></i> Analytics
            </a>
        </li> --}}
        {{-- <li>
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
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>WElcome chollna</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ url('create') }}"> Create New Product</a>

         
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th>Price</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $product->photo }}" width="100px"></td>
            <td>{{ $product->name }}</td>
           
            <td>{{ $product->detail }}</td>
            <td>{{ $product->price }}</td>
            {{-- <td>{{ $product->User['name']}}</td> --}}
            <td>
                <form action="{{ route('destroy',$product->id) }}" method="POST">
      
                    <a class="btn btn-info" href="{{ route('show',$product->id) }}">Show</a>
       
                    <a class="btn btn-primary" href="{{ route('edit',$product->id) }}">Edit</a>
      
                    @csrf
                    @method('DELETE')
         
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
     
    {!! $products->links() !!}
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

</body>
</html>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>