@extends('master')

@section('content')
    <!-- check out section -->
    <div class="checkout-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button">
                                            Order
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form method="POST" action="{{ route('checkoutOrder') }}">
                                                @csrf
                                                <p><input type="text" name="fullname" placeholder="Name" required></p>
                                                <p><input type="text" name="address" placeholder="Address" required></p>
                                                <p><input type="tel" name="phone" placeholder="Phone" required></p>
                                              
                                                <button type="submit" name="checkout" class=" btn ord">{{ __('Submit') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
