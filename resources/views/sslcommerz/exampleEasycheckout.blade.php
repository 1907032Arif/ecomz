@extends('components.master')

@section('content')

    <div class="page-title-area pt-150 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="section-title">
                            <h2>Shopping Cart</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item position-relative active" aria-current="page"><a
                                            href="shopping_cart.html">Shopping cart</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="checkout-area pt-50 mb-100">
        <div class="container">
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation bill-form">
                <input type="hidden" value="{{ csrf_token() }}" name="_token"/>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <div class="product-order pl-50 pr-50 pt-35 pb-55 mt-50 mt-md-0">
                        <h6 class="text-center pb-10">Your Order</h6>
                        <span>Products</span>
                        <ul>
                            @php
                            $subtotal = 0;
                            $shipping = 50;
                             @endphp
                            @foreach($productsInCart as $cart)
                                @php
                                $price = $cart->product->offer_price ?? $cart->product->regular_price;
                                 $subtotal += $price;
                                 @endphp
                                <li>{{ $cart->product->name }}<span class="float-right">{{ $price }}</span></li>
                            @endforeach
                        </ul>
                        <hr class="mt-5">
                        <p class="pt-15">Sub Total <span class="float-right">{{ $subtotal }}</span></p>
                        <hr>
                        <p class="pt-15">Shipping <span class="float-right">{{ $shipping }}</span></p>
                        <hr>
                        <p class="price-total pt-15">Total <span class="float-right">{{ $subtotal + $shipping }}</span></p>
                        <input type="hidden" value="{{ $subtotal + $shipping }}" name="total_amount"/>
                    </div>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Full name</label>
                                <input type="text" name="customer_name" class="form-control" id="customer_name"
                                       placeholder=""
                                       value="John Doe" required>
                                <div class="invalid-feedback">
                                    Valid customer name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile">Mobile</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+88</span>
                                </div>
                                <input type="text" name="customer_mobile" class="form-control" id="mobile"
                                       placeholder="Mobile"
                                       value="01711xxxxxx" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your Mobile number is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="customer_email" class="form-control" id="email"
                                   placeholder="you@example.com" value="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                   value="93 B, New Eskaton Road" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option value="Dhaka">Dhaka</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <input type="hidden" value="1200" name="amount" id="total_amount" required/>
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my
                                billing
                                address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next
                                time</label>
                        </div>
                        <hr class="mb-4">
                        <button class="btn order-btn border-0  btn-lg btn-block" type="submit">Continue to checkout
                        </button>

                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    {{--    <script>--}}
    {{--        var obj = {};--}}
    {{--        obj.cus_name = $('#customer_name').val();--}}
    {{--        obj.cus_phone = $('#mobile').val();--}}
    {{--        obj.cus_email = $('#email').val();--}}
    {{--        obj.cus_addr1 = $('#address').val();--}}
    {{--        obj.amount = $('#total_amount').val();--}}

    {{--        $('#sslczPayBtn').prop('postdata', obj);--}}

    {{--        (function (window, document) {--}}
    {{--            var loader = function () {--}}
    {{--                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];--}}
    {{--                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE--}}
    {{--                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX--}}
    {{--                tag.parentNode.insertBefore(script, tag);--}}
    {{--            };--}}

    {{--            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);--}}
    {{--        })(window, document);--}}
    {{--    </script>--}}

@endsection
