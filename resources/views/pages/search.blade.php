@extends('components.master')

@section('content')

    @php
        $assetPath = asset('products') . "/";
    @endphp
        <!-- Page Title Area Start -->
    <div class="page-title-area pt-150 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="section-title">
                            <h2>Search</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item position-relative active" aria-current="page"><a
                                            href="{{ route('search') }}">Search</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area Ends -->

    <!-- new arrival area starts -->
    <div class="new-arrival shop-grid pt-110 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!!  "You searched for: ". '<strong>' .$terms . '</strong>' !!}
                </div>
            </div>
        </div>

        <div class="container">
            <div class="arrival-product new-arrival-2 position-relative pt-45">

                <div class="row">
                    @if($products)

                        @foreach($products as $product)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item cat1 cat4">
                                <div class="arrival-items arrival-new-items text-center mb-55">
                                    <div class="arrival-img">
                                        <img src="{{ $assetPath. $product->image }}" alt="bag">
                                    </div>
                                    <div class="arrival-details position-relative pt-25">
                                        <h5><a href="{{ route('shop.single', ['id' => $product->id]) }}">{{ $product->name }}</a></h5>
                                        <ul class="rating">
                                            @for($i=0; $i<$product->rating; $i++)
                                                <li><i class="las la-star"></i></li>
                                            @endfor
                                        </ul>
                                        <div class="price price1">

                                            @if($offer = $product->offer_price)
                                                <del>{{ $product->regular_price }}</del>
                                                <span class="ml-10">{{ $offer }}</span>
                                            @else
                                                <span class="ml-10">{{ $product->regular_price }}</span>
                                            @endif

                                        </div>
                                        <div class="buy-info">
                                            <a class="slider-btn add-btn float-left position-relative add-to-cart"
                                               href="#" data-product-id="{{ $product->id }}">Add To Cart</a>
                                            <ul class="wishlist text-right">
                                                <li>
                                                    <button class="popbtn popup_product" data-product-id="{{$product->id}}"><i class="fas fa-search-plus"></i></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else

                        <div class="text-center">
                            <h4>No products found.</h4>
                        </div>

                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="product-popupList">
        <div class="product-popup shop-details position-relative ">
            <div class="close-popup">
                <button>X</button>
            </div>
            <div class="product-img">
                <img src="" alt="img" id="p_img">
            </div>
            <div class="product-details ml-30 mt-20">
                <h5 id="p_name"></h5>
                <ul class="rating d-inline-block mr-20" id="p_rating">

                </ul>
                <div class="price pt-15 pb-10 " id="priceContainer">
                </div>
                <p class="pr-110" id="p_description">
                </p>
                <div class="product-size d-flex pt-10">
                    <h6>SELECT SIZE</h6>
                    <ul class="ml-50">
                        <li class="active">Xl</li>
                        <li>L</li>
                        <li>M</li>
                        <li>S</li>
                        <li>XS</li>
                    </ul>
                </div>
                <div class="product-count d-flex mt-25 mb-30">
                    <div class="quty mr-20">
                        <input class="qty" type="number" value="1" id="quantity">
                    </div>
                    <div class="add-tocart mr-20 mt-15 mt-sm-0">
                        <a class="p-btn position-relative add-to-cart" href="#" >
                            <span>Add to cart</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


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

                        var imgUrl = "{{ $assetPath }}" + res.image;
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
                        }else {
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
                        product_id :  id,
                        quantity : quantity
                    },
                    success: function (res) {

                        console.log(res.status);

                    },
                    error: function(xhr, status, error) {
                        // Handle the error response, such as displaying an error message
                        console.log(error);
                    }
                })
            });
        });
    </script>
@endsection
