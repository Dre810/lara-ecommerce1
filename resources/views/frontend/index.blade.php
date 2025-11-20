<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce Store</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <nav style="padding: 15px; background: white; border-bottom: 1px solid #ddd;">
        <a href="/" style="font-size: 24px; font-weight: bold;">Ecommerce1</a>
        <span style="float: right;">
            @auth
                <a href="/dashboard">Dashboard</a>
            @else
                <a href="/login">Login</a> |
                <a href="/register">Register</a>
            @endauth
        </span>
    </nav>

    <div style="width: 90%; margin: 0 auto; padding-top: 30px;">
        <h2>Latest Products</h2>
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">

            @foreach($products as $product)
                <div style="background: white; border: 1px solid #ddd; width: 23%; padding: 10px; border-radius: 5px;">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         style="width: 100%; height: 180px; object-fit: cover; border-radius: 5px;">
                    <h4 style="margin-top: 10px;">{{ $product->name }}</h4>
                    <p>KES {{ number_format($product->price) }}</p>
                    <a href="/product/{{ $product->id }}" 
                       style="display: inline-block; padding: 7px 15px; background: #007bff; color: white; border-radius: 4px;">
                       View
                    </a>
                </div>
            @endforeach

        </div>
    </div>

</body>
</html>
