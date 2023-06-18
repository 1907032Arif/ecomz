 <!-- header area starts -->
 <header>
     <div class="header-1">
         <nav class="navbar navbar-light navbar-expand-md py-4">
             <div class="container">
                 <a class="navbar-brand d-flex align-items-center" href="#"><img src="{{ asset('img/logo/logo.png') }}" alt=""></a>
                 <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span
                         class="visually-hidden">Toggle
                         navigation</span><span class="navbar-toggler-icon"></span></button>
                 <div class="collapse navbar-collapse" id="navcol-3">
                     <ul class="navbar-nav mx-auto">
                         <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                         <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                         <li class="nav-item"><a class="nav-link" href="{{ route('about.us') }}">About us</a></li>
                         <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                     </ul>

                     <div class="nav-icons">
                         <ul>
                            @guest
                            <li><a href="{{ route('login') }}" class="btn login-btn">Login </a> </li>
                            <li><a href="{{ route('register') }}" class="btn register-btn">Register </a></li>
                            @endguest

                            @auth
                             <li>
                                 <div class="search position-relative">
                                     <span><i class="fas fa-search"></i></span>
                                     <div class="search-overlap">
                                     </div>
                                     <form action="{{ route('search') }}" class="search-form position-fixed" method="get">
                                         <div class="search-input ">
                                             <div class="search-close">
                                                 <span>X</span>
                                             </div>
                                             <input type="search" placeholder="Enter your keywords....." name="search"/>
                                         </div>
                                     </form>
                                 </div>
                             </li>
                             <li><a href="{{ route('your.cart') }}"><i class="fas fa-shopping-cart"></i>
                                     @if($cartProducts > 0) <span class="badge badge-pink ">{{ $cartProducts }}</span> @endif
                                 </a>

                                 <div class="product-on-sale pb-30">
                                     <div class="product-close-icon">
                                         <span>X</span>
                                     </div>
                                     <div class="product-wrapper d-flex">
                                         <div class="product-img position-relative ">
                                             <img src="img/products/22.png" alt="product">
                                             <div class="cart-icon">
                                                 <a href="shopping_cart.html"><i class="las la-cart-plus"></i></a>
                                             </div>
                                         </div>
                                         <div class="product-details mt-10">
                                             <span>Shoes</span>
                                             <h6><a href="shop_detalis.html">Leather Menz Shoes</a></h6>
                                             <div class="price d-flex">
                                                 <span>$999</span>
                                                 <del>$899</del>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="product-wrapper mt-20 d-flex">
                                         <div class="product-img position-relative">
                                             <img src="img/products/23.png" alt="product">
                                             <div class="cart-icon">
                                                 <a href="shopping_cart.html"><i class="las la-cart-plus"></i></a>
                                             </div>
                                         </div>
                                         <div class="product-details mt-10">
                                             <span>Shoes</span>
                                             <h6><a href="shop_detalis.html">Leather Menz Shoes</a></h6>
                                             <div class="price d-flex">
                                                 <span>$999</span>
                                                 <del>$899</del>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="cart-price pr-20 pt-30">
                                         <p>Subtotal: <span>$999.00</span></p>
                                         <p>Total: <span>$999.00</span></p>
                                     </div>
                                     <div class="cart-button mt-20 pl-15">
                                         <a href="shopping_cart.html">View Cart</a>
                                         <a href="checkout_page.html">Checkout</a>
                                     </div>
                                 </div>
                             </li>
                             <li class="position-relative">
                                 <div class="nav-item dropdown">
                                     <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown"
                                         href="#"><span class="product-cart"><i class="fas fa-user"></i></span>
                                         {{ \Illuminate\Support\Facades\Auth::user()->name }} </a>
                                     <div class="dropdown-menu">
                                         <a class="dropdown-item" href="#">Profile</a>
                                         <a class="dropdown-item" href="#">Purchuse History</a>
                                         <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                     </div>
                                 </div>
                             </li>
                              @endauth
                         </ul>
                     </div>
                     {{-- <button class="btn btn-primary" type="button">Button</button> --}}
                 </div>
             </div>
         </nav>
     </div>
 </header>
 <!-- header area ends -->
