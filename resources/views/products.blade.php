<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Shopping Cart add to cart with Stripe Payment Gateway</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
   
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12">
            <div class="dropdown">
               
                <button id="dLabel" type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                </button>
 
                <div class="dropdown-menu" aria-labelledby="dLabel">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-success">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('images') }}/{{ $details['photo'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['product_name'] }}</p>
                                    <span class="price text-success"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
</div>
    
<br/>
<div class="container">
    
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    
    <div class="row">
        @foreach($products as $product)
            <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                <div class="img_thumbnail productlist">
                    <img src="{{ asset('images') }}/{{ $product->photo }}" class="img-fluid">
                    <div class="caption">
                        <h4>{{ $product->product_name }}</h4>
                        <p>{{ $product->product_description }}</p>
                        <p><strong>Price: </strong> ${{ $product->price }}</p>
                        <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>c
</div>
    
@yield('scripts')
</body>
</html>