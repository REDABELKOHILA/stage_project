@extends('master')

@section('content')
<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ url($product->imagepath) }}" style="max-height: 500px; min-height: 400px;" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{ $product->name }}</h3>
						<p class="single-product-pricing"><span>{{ $product->prix }} </span>DH </p>
                        <p>{{ $product->description }}</p>
						<div class="single-product-form">
							
							<a href="/checkout" class="cart-btn"><i class="fas fa-shopping-cart"></i> checkout</a>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
