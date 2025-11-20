@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group mb-3">
        <label>Price (KES)</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control" value="0">
    </div>

    <div class="form-group mb-3">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Save Product</button>

</form>

@stop
