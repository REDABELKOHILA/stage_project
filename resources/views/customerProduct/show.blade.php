<!-- resources/views/customerProduct.blade.php -->

@extends('master')

@section('content')
<div class="single-product mt-150 mb-150">
    <div class="container">
        <!-- Customer product details -->
        <h2>Customer Product Details</h2>
        <p>Product Name: {{ $product->name }}</p>
        <p>Product Price: {{ $product->price }}</p>
        <p>Product Description: {{ $product->description }}</p>
        <!-- Add more product details as needed -->
        
        <!-- Customer information -->
        @if (session('customer'))
        <div class="customer-info">
            <h2>Customer Information</h2>
            <p>Name: {{ session('customer')->name }}</p>
            <p>Email: {{ session('customer')->email }}</p>
            <p>Phone: {{ session('customer')->phone }}</p>
            <p>Address: {{ session('customer')->address }}</p>
        </div>
        @endif
    </div>
</div>
@endsection
