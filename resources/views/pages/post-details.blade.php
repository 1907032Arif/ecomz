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
                            <h2>Shop</h2>
                        </div>
                        <div class="page-bc">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item position-relative active" aria-current="page"><a
                                            href="shop_grid.html">Shop</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title area Ends -->

    <div class="blog-area blog-ls blog-rs news-details-area pt-120">
        <div class="container">
            <div class="row ">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="news-details">
                        <div class="news-img overflow-hidden">
                            <img src="{{ asset('posts') . "/" . $post->image }}" alt="img">
                        </div>
                        <div class="news-title">
                            <h4>{{ $post->title }}</h4>
                        </div>
                        <div class="share-icon d-flex pt-10">
                            <h6>Share:</h6>
                            <ul class="social-icon">
                                <li><a href=""><i class="lab la-facebook-f"></i></a></li>
                                <li><a href=""><i class="lab la-twitter"></i></a></li>
                                <li><a href=""><i class="lab la-instagram"></i></a></li>
                                <li><a href=""><i class="lab la-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <div>
                            {!! $post->description  !!}
                        </div>

                        <div class="related-post pt-115">
                            <div class="section-title pb-25">
                                <h6>Related Post</h6>
                            </div>
                            <div class="row">
                                @foreach($relatedPosts as $post)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="news-items mb-30">
                                            <div class="news-img">
                                                <a href="{{ route('post.details', ['id'=> $post->id]) }}"><img src="{{ asset('posts') . "/" . $post->image }}" alt="img1"></a>
                                            </div>
                                            <span class="d-block pt-25">By {{ $post->user->Name }} | {{ date('M d, Y', strtotime($post->created_at)) }}</span>
                                            <div class="news-details pt-5">
                                                <div class="news-title">
                                                    <a href="{{ route('post.details', ['id'=> $post->id]) }}">{{ $post->title }}</a>
                                                </div>
                                                <a class="slider-btn d-inline-block position-relative mt-10"
                                                   href="{{ route('post.details', ['id'=> $post->id]) }}">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="blog-comment pt-75">
                            <div class="section-title">
                                <h6>Comments ({{ $commentCount }})</h6>
                            </div>
                            <div class="latest-comments pl-30 pt-35">
                                <ul>
                                    @foreach($postComments as $comment)
                                        <li>
                                            <div class="comments-box d-flex pt-20 ">
                                                <div class="comments-avatar">
                                                    <img src="{{ asset('avatar') . "/". $comment->user->avatar }}" alt="man">
                                                </div>
                                                <div class="comments-text pl-30 pt-10 pr-40">
                                                    <div class="avatar-name d-inline-block">
                                                        <h6>{{ $comment->user->name }}</h6>
                                                        <span>Otct 10, 2020</span>
                                                    </div>
                                                    {{--                                                <div class="reply float-right"><span>Reply</span></div>--}}
                                                    <p>{{ $comment->content }}</p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="comment-sidebar pt-80">
                            <div class="section-title">
                                <h6>
                                    Leave a Comment
                                </h6>
                            </div>
                            <div class="post-comment pt-25 pb-30">
                                <form action="{{ route('post.comment') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        @guest
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="name">
                                                <input type="text" placeholder="Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="email mt-30 mt-sm-0">
                                                <input type="text" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        @endguest
                                        <div class="col-xl-12">
                                            <div class="comment-reply-area pt-30">
                                                <textarea cols="30" name="content" rows="10" placeholder="Comment" data-gramm="false"
                                                          wt-ignore-input="true"></textarea>
                                            </div>
                                            <div class="submit pt-30">
                                                <button class="p-btn border-0" type="submit">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-8 col-sm-10 pt-80 pt-lg-0">
                    <div class="sidebar-widget">

                        <div class="recent-post ">
                            <div class="sidebar-title">
                                <h5>Recent Posts</h5>
                            </div>
                            @foreach($recentPosts as $post )
                                <div class="post d-flex mt-25">
{{--                                    <div class="post-img">--}}
{{--                                        <img src="{{ asset('posts') . "/" . $post->image }}" alt="product">--}}
{{--                                    </div>--}}
                                    <div class="post-details ml-20 mt-auto mb-auto">
                                        <h6><a href="{{ route('post.details', ['id'=> $post->id]) }}">{{ $post->title }}</a></h6>
                                        <span>{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
{{--                        <div class="categories mt-55">--}}
{{--                            <div class="sidebar-title">--}}
{{--                                <h5>Categories</h5>--}}
{{--                            </div>--}}
{{--                            <ul class="categories-list">--}}
{{--                                <li><a href="#"> Fashion<span>(9)</span></a></li>--}}
{{--                                <li><a href="#"> interior design <span>(09)</span></a></li>--}}
{{--                                <li><a href="#"> electronics<span>(07)</span></a></li>--}}
{{--                                <li><a href="#"> Uncategorized<span>(02)</span></a></li>--}}
{{--                                <li><a href="#"> shoes<span>(04)</span></a></li>--}}
{{--                                <li><a href="#"> House decors<span>(07)</span></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        --}}

                        <div class="tags mt-50">
                            <div class="sidebar-title">
                                <h5>Tags</h5>
                            </div>
                            <ul class="tag-list pt-20">
                                <li><a href="#">Interior</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Decor</a></li>
                                <li><a href="#">Cooling System </a></li>
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Software</a></li>
                            </ul>
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
                        window.location.reload()

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
