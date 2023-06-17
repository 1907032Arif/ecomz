@extends('components.master')

@section('content')

    @php
        $assetPath = asset('catagory');
        $assetPath = $assetPath . "/";
        $date = date("d F Y", strtotime("25 November 2023"));
    @endphp

        <!-- slider area starts -->
    <div class="slider-area pt-105">
        @foreach($featuredProducts as $post)
            <div class="single-slide slider-height position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-8 offset-xl-1 offset-lg-1 offset-xl-0 ">
                        <div class="slider-description mt-200">
                            <h1>{{ $post->name }}</h1>
                            <p class="pb-30 pr-120">{{ $post->description }}</p>
                            <a href="{{ route('shop.single', ['id' => $post->id]) }}" class="slider-btn position-relative">{{ __('SHOP NOW') }}</a>
                        </div>
                    </div>
                    <div class="slider-images ">
                        <div class="slider-image-bg">
                            <img src="{{ asset('products') . "/". $post->image }}" alt="shoes">
                            <span class="slider-price-badge">
                <span>{{ $post->offer_price ?? $post->regular_price }}</span>
              </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- slider area ends -->

    <!-- popular category area starts -->
    <div class="popular-category-area pt-110">
        <div class="container">
            <div class="section-title text-center pb-45">
                <h2>{{ __('POPULAR CATEGORIES') }}</h2>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="category-img-item first-items position-relative">
                        <div class="cat-thumb overflow-hidden">
                            <img src="{{  $assetPath . $categories[0]['image'] }}" alt="img1">
                        </div>
                        <div class="category-texts ">
                            <span>Popular</span>
                            <h3><a href="shop_grid.html">{{ $categories[0]['name'] }}</a></h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="category-img-item second-items position-relative mb-30">
                        <div class="cat-thumb overflow-hidden">
                            <img src="{{ $assetPath . $categories[1]['image'] }}" alt="img2">
                        </div>
                        <div class="category-texts position-absolute">
                            <h3><a href="shop_grid.html">{{ $categories[1]['name'] }}</a></h3>
                        </div>
                    </div>

                    <div class="category-img-item third-items position-relative">
                        <div class="cat-thumb overflow-hidden">
                            <img src="{{ $assetPath . $categories[2]['image'] }}" alt="img3">
                        </div>
                        <div class="category-texts position-absolute">
                            <h3><a href="shop_grid.html">{{ $categories[2]['name'] }}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular category area ends -->

    @php
//    $productWithCatName = [];
//    foreach ($productWithCat as $product){
//      $productWithCatName[] = $product->name;
//      print_r($product->name);
//    }
//
//    print_r(array_rand($productWithCatName) );
    @endphp
    <!-- new arrival area starts -->
    <div class="new-arrival pt-110 ">
        <div class="container">
            <div class="section-title text-center">
                <h2>NEW ARRIVAL</h2>
            </div>

            <div class="arrival-menu text-center pt-20">
                <button class="abtn" data-filter="*">All</button>
                @foreach($productCategory as $category)
                    @php
                        $catName = strtolower(str_replace(' ', '-', $category['name']));
                    @endphp
                    <button class="abtn" data-filter="{{ ".". $catName }}">{{ ucwords($category['name']) }}</button>
                @endforeach

            </div>
            <div class="arrival-product pt-45">
                <div class="row grid">

                    @foreach($catProduct as $product)
                        @php

                            $catName = strtolower(str_replace(' ', '-', $product->category->name));

                        @endphp
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 grid-item {{ $catName }}">
                            <div class="arrival-items arrival-new-items text-center mb-55">
                                <div class="arrival-img">
                                    <img src="{{ asset('products') . "/". $product->image }}" alt="bag">
                                </div>
                                <div class="arrival-details position-relative pt-25">
                                    <h5><a href="shop_detalis.html"></a></h5>
                                    <ul class="rating">
                                        @for($i=1; $i< $product->rating; $i++)
                                            <li><i class="las la-star"></i></li>
                                        @endfor

                                    </ul>
                                    <div class="price">
                                        <span>{{ "$" .$product->regular_price }}</span>
                                    </div>
                                    <div class="buy-info">
                                        <a class="slider-btn add-btn position-relative add-to-cart d-inline-block"
                                           href="{{ route('shop.single', ['id'=> $product->id]) }}" >Add To Cart</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="row">
                <div class="view-items ml-auto mr-auto mt-50">
                    <a class="p-btn position-relative" href="{{ route('shop') }}">
                        <span>Show more</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- new arrival area ends -->
    <!-- Today Deal Area Start -->
    @if($todayDeals)
    <div class="today-deal pt-115">
        <div class="container">

                @php
            $regular = $todayDeals->regular_price ;
            $offer = $todayDeals->offer_price ?? 0;
            $discount = ceil((($regular -$offer) * 100 ) / $regular);
 @endphp
              <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
                    <div class="deal-details pt-90">
                        <span>Today's Deal</span>
                        <h2>{{ $todayDeals->name }}</h2>
                        <div class="price">
                            <del class="mr-5">{{ "$" .$todayDeals->regular_price }}</del>
                            <span>{{ $todayDeals->offer_price }}</span>
                        </div>
                        <p class="pr-90">{{ "$" . $todayDeals->description }}</p>
                        <div id="countdown" class="d-flex pb-40">
                            <div class="cd-box d-flex">
                                <div class="d-inline-block">
                                    <span class="numbers days">00</span>
                                    <span class="strings timeRefDays">Days</span>
                                </div>
                                <span class="colon ml-20 mr-20 mt-15">:</span>
                            </div>
                            <div class="cd-box d-flex">
                                <div>
                                    <span class="numbers hours">00</span>
                                    <span class="strings timeRefHours">Hours</span>
                                </div>
                                <span class="colon ml-20 mr-20 mt-15">:</span>
                            </div>
                            <div class="cd-box d-flex">
                                <div>
                                    <span class="numbers minutes">00</span>
                                    <span class="strings timeRefMinutes">Mins</span>
                                </div>
                                <span class="colon ml-20 mr-20 mt-15">:</span>
                            </div>
                            <div class="cd-box">
                                <div>
                                    <span class="numbers seconds">00</span>
                                    <span class="strings timeRefSeconds">Secs</span>
                                </div>
                            </div>

                        </div>
                        <a class="p-btn position-relative" href="{{ route('shop.single',['id'=> $todayDeals->id]) }}">
                            <span>Shop Now</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12">
                    <div class="today-deal-img deal-img-position  text-center position-relative">
                        <img src="{{ asset('products'). "/" . $todayDeals->image}}" alt="product">
                        <span class="deal-badge slider-price-badge">
              <span>{{ $discount . "%" }}
                Discount</span>
            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Today Deal Area Ends -->
    <!-- News Area Start -->
    <div class="news-area pt-115">
        <div class="container">
            <div class="section-title text-center pb-45">
                <h2 class="text-uppercase">LATEST NEWS</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="news-items mb-30 mb-md-0">
                        <div class="news-img">
                            <a href="blog.html"><img src="img/blog/01.png" alt="img1"></a>
                        </div>
                        <div class="news-details pt-20">
                            <div class="news-title pr-50">
                                <a href="news_detalis.html">Lorem Ipsum has been the industry
                                    sed do tempor tara</a>
                            </div>
                            <span class="d-block">Jan 21, 2021 By Admin</span>
                            <a class="slider-btn d-inline-block position-relative mt-10" href="news_detalis.html">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 ml-30 mr-60 ">
                    <div class="news-items mb-30 mb-md-0">
                        <div class="news-img">
                            <a href="blog.html"><img src="img/blog/02.png" alt="img1"></a>
                        </div>
                        <div class="news-details pt-20">
                            <div class="news-title pr-50">
                                <a href="news_detalis.html">Lorem Ipsum has been the industry
                                    sed do tempor tara</a>
                            </div>
                            <span class="d-block">Jan 21, 2021 By Admin</span>
                            <a class="slider-btn d-inline-block position-relative mt-10" href="news_detalis.html">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 pl-xl-0 pr-xl-0 ">
                    <div class="news-items">
                        <div class="news-img">
                            <a href="blog.html"><img src="img/blog/03.png" alt="img1"></a>
                        </div>
                        <div class="news-details pt-20">
                            <div class="news-title ">
                                <a href="news_detalis.html">Lorem Ipsum has been the industry
                                    sed do tempor tara</a>
                            </div>
                            <span class="d-block">Jan 21, 2021 By Admin</span>
                            <a class="slider-btn d-inline-block position-relative mt-10" href="news_detalis.html">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Area Ends  -->

    <!-- Subscribe Area Starts -->

    <div class="subscribe-area pt-115">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="section-title ">
                        <h2 class="text-uppercase">stay connected</h2>
                    </div>
                    <p class="pr-120">Subscribe to our newsleter and stay up to date with
                        latest offers and upcoming trends.</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <form class="subscribe-form mt-40" action="#">
                        <input type="email" placeholder="Email Address">
                        <i class="las la-envelope"></i>
                        <button>SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scribe Area Ends -->

    <!-- Instagram Area Starts -->
    <div class="instagram-area pt-110 pb-120">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="text-uppercase">Instagram shop</h2>
                <span>@aruk_insta</span>
            </div>
            <div class="instagram-images d-flex pt-60">
                @foreach($instaProducts as $product)
                    <div class="insta-imgs position-relative">
                        <img src="{{ asset('products') . "/" . $product->image }}" alt="img">
                        <a href="https://{{ $product->instagram_url }}"><i class="lab la-instagram"></i></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Instagram Area Ends -->

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){

            //
            $("#countdown").countdown({
                date: "{{ $date }}", // change date/time here - do not change the format!
                format: "on"
            });


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
