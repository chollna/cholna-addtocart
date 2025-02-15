<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 CRUD (Create, Read, Update and Delete) with Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/crud') }}"> Back</a>
            </div>
        </div>
    </div>
          
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
         
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="photo" class="form-control" placeholder="photo">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="price">
                </div>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Select Category</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="category" selected disabled>Select category</option>
                    <option value="cloth">cloth</option>
                    <option value="fruit">fruit</option>
                    <option value="car">car</option>
                    <option value="phone">phone</option>
                </select>
            </div>

            <select class="form-control" name="user_id">
                <option value="option_select" disabled selected>Choose</option>
                @foreach ($users as $ct)
                  <option value="{{$ct->id}}" {{old('user_id') == $ct->id ? 'selected' : ''}}>{{$ct->name}}</option>
                @endforeach
             </select>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
       
          
    </form>
</div>
</body>
</html>