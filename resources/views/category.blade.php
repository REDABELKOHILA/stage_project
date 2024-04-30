@extends('master')

@section('content')

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href=""><img src="{{ url($category->imagepath) }}" alt=""  style="max-height: 220px; min-height: 220px;" ></a>
                    </div>
                    <h3>{{$category->name}}</h3>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</div>
@endsection