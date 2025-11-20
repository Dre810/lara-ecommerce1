@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')

<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="form-group mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ $product->name }}" required>
    </div>

    <div class="form-group mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label>Price (KES)</label>
        <input type="number" step="0.01" name="price"
               value="{{ $product->price }}" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control"
               value="{{ $product->stock }}">
    </div>

    <div class="form-group mb-3">
        <label>Current Image</label><br>
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="80"><br><br>
        @endif

        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Update Product</button>

</form>

@stop
