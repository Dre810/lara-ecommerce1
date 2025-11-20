@extends('layouts.app')

@section('content')
<div class="container">

    <h2 style="margin-bottom: 20px;">Our Products</h2>

    @if($products->count())
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    <h4>{{ $product->name }}</h4>
                    <p class="price">KSh {{ number_format($product->price) }}</p>
                    <p>{{ $product->description }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No products available yet.</p>
    @endif

</div>
@endsection
