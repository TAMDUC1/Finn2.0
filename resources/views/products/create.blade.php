

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Upload products </h2><br  />
        <form method="post" action="{{url('products')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" name="type">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control" name="stock">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="description">Descriptions:</label>
                    <input type="text" class="form-control" name="description">
                </div>
            </div>
            <input type="file" name="photo">
            <!-- <form action="upload.php" method = "POST" enctype="multipart/form-data">
            </form> -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Add Product</button>
                </div>
            </div>
        </form >
    </div>
@endsection
