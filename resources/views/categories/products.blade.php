@extends('master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Products in</span> {{ $category->name }}</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="{{ route('showproduct', $product->id) }}"><img
                                            style="max-height: 220px; min-height: 220px;"
                                            src="{{ url($product->imagepath) }}" alt=""></a>
                                </div>
                                <p class="product-price"><span> </span>{{ $product->prix }} DH </p>
                                <h3>{{ $product->name }}</h3>
                                <!-- <p>{{ $product->description }} </p> -->
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    @endforeach
              
            </div>
        </div>
    </div>
@endsection
