@extends('components.master')

@section('content')

    <!-- Page Title Area Start -->
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
    <!-- Page Title area Ends -->
    <!-- wishlist Area Start -->
    <div class="wishlist-area shopping_cart shop-list pt-105">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col"><span>PRODUCT NAME</span></th>
                                <th scope="col"><span>UNIT PRICE </span> <span class="d-none">ALL DETAILS</span></th>
                                <th scope="col"><span>QUANTITY</span></th>
                                <th scope="col"><span>TOTAL</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $item)
                                @php
                                $price = $item->product->offer_price ??  $item->product->regular_price ;
                                 @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="cart-img">
                                                <img src="{{ asset('products') . "/".$item->product->image }}" alt="product">
                                            </div>
                                            <div class="product-name mt-auto mb-auto ml-30">
                                                <h6><a href="{{ route('shop.single', ['id' => $item->id]) }}">{{ $item->product->name }}</a></h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td >
                                        <div class="product-price ">
                                            <span>{{ $price }}</span>
                                            <div class="shopping-cart-mobile-content d-none mt-10">
                                                <div class="quty">
                                                    <input class="qty" type="number" value="1">
                                                </div>
                                                <div class="cart-button mt-20">
                                                    <span>{{ $price }}</span>
                                                    <button class="float-right ">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="quty" data-price="{{ $price }}">
                                            <input class="qty" type="number" value="{{ $item->quantity }}" id="quantityInput">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart-button ">
                                            <span class="grandPrice">{{ $price }}</span>
                                            <button id="delete_cart" class="float-right" data-id="{{ $item->product->id }}">X</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            <tr>
                                <td colspan="4">
                                    <div class="table-button">
                                        <button id="clear_cart">CLEAR SHOPPING CART</button>
                                        <button id="update_cart" class="ml-25">UPDATE SHOPPING CART</button>
                                        <a  href="{{ route('shop') }}" class="float-right">CONTINUE SHOPPING</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-50">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="coupon_discount d-none">
                        <h6>Counpon discount</h6>
                        <p>Enter your code if you have one. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae</p>
                        <form action="#" class="coupon-form pt-25">
                            <input type="text" placeholder="Enter your code here">
                            <button class="p-btn border-0 ml-20">APPLY COUNPON</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="cart-total pt-30 pl-40 pr-30 pb-50 mt-40 mt-md-0">
                        <h6>Cart Total</h6>
                        <ul>
                            <li>Sub Total <span class="float-right" id="sub_total"></span></li>
                            <li>Grand Total <span class="float-right" id="grand_total"></span></li>

                        </ul>
                        <p class="pt-15">Checkout with Mutilple Adresses</p>
                        <a href="{{ route('checkout') }}" class="p-btn border-0 mt-20">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist Area Ends -->

@endsection

@section('scripts')
    <script>

        $(document).ready(function () {

            $(".nice-number button").click(function() {
                var qutyDiv = $(this).closest(".quty");
                var quantity = qutyDiv.find(".qty").val();
                var price = qutyDiv.data("price");
                var totalPrice = quantity * price;
                var tr = $(this).closest('tr');
                tr.find(".grandPrice").text(totalPrice);
                console.log("Total price:", totalPrice);

               var sum = 0;
                $(".grandPrice").each(function() {
                    var price = parseFloat($(this).text());
                    sum += price;
                });
                $("#sub_total").text(sum)
                $("#grand_total").text(sum)
                console.log(sum)
            });

            $("#clear_cart").click(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/cart/clear",
                    success: function (res) {
                        window.location.reload()
                        console.log(res.status)
                    }
                });
            });

            $("#update_cart").click(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/cart/update",
                    data: {
                    },
                    success: function (res) {
                        window.location.reload()
                        console.log(res.status)
                    }
                });
            });



            $(document).on('click', '#delete_cart', function () {
                    var id = $(this).attr("data-id");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/cart/delete",
                    data: {
                        product_id :  id,
                    },
                    success: function (res) {
                        window.location.reload()
                        console.log(res.status)
                    }
                });

            });



            console.log(sum);


        });
    </script>
@endsection
