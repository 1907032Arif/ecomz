@extends('components.master')

@section('content')

    @php
        $assetPath = asset('products') . "/";
    @endphp

    <div class="page-title-area pt-150 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-titel-detalis  ">
                        <div class="section-title">
                            <h2>Shop Details</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item position-relative active" aria-current="page"><a
                                            href="shop_grid_right_sidebar.html">Shop List</a></li>
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
    <div class="shop-details pt-120 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-12">
                    <div class="nav nav-tabs " id="approach-tabs" role="tablist">
                        <a class="product-thumb mb-15 active" id="nav-thumb1" data-bs-toggle="tab" href="#nav-product1" role="tab"
                           aria-controls="nav-product1" aria-selected="true"><img src="img/products/24.png" alt="img"></a>
                        <a class="product-thumb mb-15" id="nav-thum2" data-bs-toggle="tab" href="#nav-product2" role="tab"
                           aria-controls="nav-product2" aria-selected="false"><img src="img/products/25.png" alt="img"></a>
                        <a class="product-thumb" id="nav-thumb3" data-bs-toggle="tab" href="#nav-product3" role="tab"
                           aria-controls="nav-product3" aria-selected="false"><img src="img/products/26.png" alt="img"></a>
                    </div>
                </div>
                <div class="col-xl-11 col-lg-11 col-md-10 col-sm-12">
                    <div class="product-wrapper d-flex">
                        <div class="product-imges tab-content" id="nav-tabContents">
                            <div class="tab-pane product-img  active " id="nav-product1" role="tabpanel" aria-labelledby="nav-thumb1">
                                <img src="{{ asset('products') . "/" . $product->image }}" alt="img">
                            </div>
                            <div class="tab-pane product-img " id="nav-product2" role="tabpanel" aria-labelledby="nav-thum2">
                                <img src="img/products/32.png" alt="img">
                            </div>
                            <div class="tab-pane product-img" id="nav-product3" role="tabpanel" aria-labelledby="nav-thumb3">
                                <img src="img/products/33.png" alt="img">
                            </div>
                        </div>
                        <div class="product-details ml-50">
                            <h5>{{ $product->name }}</h5>
                            <ul class="rating d-inline-block mr-20">
                                @for($i=0; $i< $product->rating; $i++)
                                  <li><i class="las la-star"></i></li>
                                @endfor
                            </ul>
                            <div class="price pt-15 pb-10">
                                <span>{{ $product->regular_price }}</span>
                            </div>
                            <p class="pr-110">{{ $product->description }}</p>
                            <div class="product-size d-flex pt-10">
                                <h6>SELECT SIZE</h6>

                                <ul class="ml-50">
                                    <li class="active">Xl </li>
                                    <li>L</li>
                                    <li>M</li>
                                    <li>S</li>
                                    <li>XS</li>
                                </ul>
                            </div>
                            <div class="product-count d-flex mt-25">
                                <div class="quty mr-20">
                                    <input class="qty" type="number" value="1" id="quantity">
                                </div>
                                <div class="add-tocart mr-20 mt-15 mt-sm-0">
                                    <a class="p-btn position-relative add-to-cart" href="#" data-product-id="{{ $product->id  }}">
                                        <span>Add to cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <hr class="pt-75">
        </div>
    </div>

    <div class="description-area pt-65">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="description-tab ">
                        <nav>
                            <div class="nav nav-tabs justify-content-center" id="approach-tab" role="tablist">
                                <a class="nav-item active mr-75" id="nav-description-tab" data-bs-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true">Description</a>
                                <a class="nav-item" id="nav-review-tab" data-bs-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">Reviews (2)</a>
                            </div>
                        </nav>
                        <div class="tab-content mt-55 ml-100" id="nav-tabContent">
                            <div class="tab-pane active " id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8">
                                        <div class="description-text position-relative">
                                            <p class="mb-25">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 pl-md-0 pr-md-0">
                                        <div class="description-size pt-5">
                                            <h6>SIZE & FIT</h6>
                                            <ul>
                                                <li>Your Product size is {{ $product->size }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-8 position-relative">
                                        <div class="description-text position-relative">
                                            <p class="mb-25">Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestib lum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna</p>
                                            <p>Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus plac erat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condim entum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 pl-md-0 pr-md-0">
                                        <div class="description-size pt-5">
                                            <h6>SIZE & FIT</h6>
                                            <ul>
                                                <li>Our Model wears a UK 8/ EU 36/ Us 4</li>
                                                <li>Model is 170/ 5’7” Tall</li>
                                                <li>Shoulder seam to hem measures appox 58”/ 147 cm in lengh</li>
                                            </ul>
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
