
@extends('components.master')

@section('content')

    <!-- Page Title Area Start -->
<div class="page-title-area pt-150 pb-55">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-titel-detalis  ">
                    <div class="section-title">
                        <h2>404</h2>
                    </div>
                    <div class="page-bc">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item position-relative active" aria-current="page"><a href="404.html">404</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Title area Ends -->
<!-- 404 Area Start -->
<div class="page-404-area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="img-404 text-center">
                    <img src="img/404/404.png" alt="img">
                    <div class="back-btn mt-30 p-btn">
                        <a href="{{ route('home') }}">Go back Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
