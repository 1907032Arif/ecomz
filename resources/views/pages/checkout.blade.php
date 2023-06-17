@php
    use \Illuminate\Support\Facades\Auth;

    if (Auth::check())
        {
            $email = Auth::user()->email;
            $name = Auth::user()->name;
        }else {
        $name="";
        $email = "";
        }

@endphp
@extends('components.master')

@section('content')

    <!-- Page Title Area Start -->
    <div class="page-title-area pt-150 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="section-title">
                            <h2>Checkout Page</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item position-relative active" aria-current="page"><a
                                            href="checkout_page.html">Checkout</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area Ends -->
    <!-- Checkout Area Start -->
    <div class="checkout-area pt-115">
        <div class="container">
            <form action="{{ route('place.order') }}" class="bill-form pt-5" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="checkout">
                            <p>Returning customer ?<a href="checkout_page.html"> Click here to login</a></p>
                            <p>Have a Coupon ? <a href="my_wishlist.html">Click here to enter your code</a></p>
                        </div>
                        <div class="bill-details pt-15">
                            <h6>Billing Details</h6>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="first-name pt-30">
                                        <label for="first-nem">Full Name</label>
                                        <input type="text" id="first-nem" name="name" value="{{ $name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="phone pt-30">
                                        <label for="pho">Phone</label>
                                        <input type="text" id="pho" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="email pt-30">
                                <label for="emai">Email</label>
                                <input type="text" id="emai" value="{{ $email }}" name="email">
                            </div>

                            <div class="address pt-30">
                                <label for="addres">Ship Address</label>
                                <textarea name="ship_address" id="ship_address" cols="30" rows="10"></textarea>
                            </div>

                            <div class="address pt-30">
                                <label for="addres">Bill Address</label>
                                <textarea name="bill_address" id="bill_address" cols="30" rows="10"></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="product-order pl-50 pr-50 pt-35 pb-55 mt-50 mt-md-0">
                            <h6 class="text-center pb-10">Your Order</h6>
                            <span>Products</span>

                            <ul>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($cart as $item)
                                    @php
                                        $price = $item->product->offer_price ?? $item->product->regular_price;
                                        $total += ($item->quantity * $price);
                                    @endphp
                                    <li>{{ $item->product->name }} <span
                                            class="float-right"><span>{{ $item->quantity }} x</span>{{ $price }}</span>
                                    </li>

                                @endforeach

                            </ul>
                            <hr class="mt-5">
                            <p class="pt-15">Sub Total <span class="float-right">{{ $total }}</span></p>
                            <hr>
                            <p class="pt-15">Shipping <span class="float-right"></span></p>
                            <hr>
                            <p class="price-total pt-15">Total <span class="float-right">$68.00</span></p>
                            <div class="payment-method mt-55">
                                <div class="direct-bank position-relative pl-25">
                                    <input type="radio" id="rad" name="payment" value="bank">
                                    <span class="check-mark"></span>
                                    <label for="rad">Direct bank transfer</label>
                                    <p class="pr-65">Aenean id ullamcorper libero. Vestibulum imperdiet nibh. Lorem
                                        ullamcorper
                                        volutpat. Vestibulum lacinia risus. Etiam sagittis </p>

                                </div>
                                <div class="Cheque position-relative pl-25 mt-20">
                                    <input type="radio" id="Chequ" name="payment" value="cheque">
                                    <span class="check-mark"></span>
                                    <label for="Chequ">Cheque Payment

                                    </label>

                                </div>
                                <div class="payment-card position-relative pl-25 mt-15">
                                    <input type="radio" id="card" name="payment" value="card">
                                    <span class="check-mark"></span>
                                    <label for="card">
                                        <span><i class="fab fa-cc-mastercard"></i></span>
                                        <span><i class="fab fa-cc-visa"></i></span>
                                        <span><i class="fab fa-paypal"></i></span>
                                        <span><i class="fab fa-cc-discover"></i></span>
                                    </label>
                                </div>
                                <button class="p-btn border-0 mt-45" type="submit">PLACE ORDER</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Area Ends -->

@endsection

@section('scripts')
    <script>

        $(document).ready(function () {

            $(document).on('click', '.popup_product', function () {
                var id = $(this).attr("data-product-id");
                $.ajax({
                    type: "GET",
                    url: "/product/popup/" + id,
                    success: function (res) {

                        console.log(res.rating);

                        var imgUrl = res.image;
                        $("#p_name").html(res.name);
                        $("#p_description").html(res.description);
                        $('#p_img').attr('src', imgUrl);
                        $("#p_price").val(res.regular_price);
                        $("#p_offer_price").val(res.offer_price);
                        $(".add-to-cart").attr('data-product-id', id);

                        var priceContainer = $("#priceContainer");

                        if (res.offer_price != 0) {
                            priceContainer.html('<del>' + res.regular_price + '</del>');
                            priceContainer.append('<span class="ml-10">' + res.offer_price + '</span>');
                        } else {
                            priceContainer.append('<span class="ml-10">' + res.regular_price + '</span>');
                        }

                        var ratingContainer = $("#p_rating");

                        // Remove existing li elements
                        ratingContainer.empty();
                        var rating = res.rating !== undefined ? res.rating : 0;


                        // Add new li elements
                        for (var i = 0; i < rating; i++) {
                            ratingContainer.append('<li><i class="las la-star"></i></li>');
                        }
                    }

                })
            });

            $(document).on('click', '.add-to-cart', function () {
                var id = $(this).attr("data-product-id");
                var quantity = $("#quantity").val();
                if (!quantity) {
                    quantity = 1;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/add-to-cart",
                    data: {
                        product_id: id,
                        quantity: quantity
                    },
                    success: function (res) {

                        console.log(res.status);

                    },
                    error: function (xhr, status, error) {
                        // Handle the error response, such as displaying an error message
                        console.log(error);
                    }
                })
            });
        });
    </script>
@endsection
