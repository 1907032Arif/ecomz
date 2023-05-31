 <!-- header area starts -->
 <header>
     <div class="header-1">
         <nav class="navbar navbar-light navbar-expand-md py-4">
             <div class="container">
                 <a class="navbar-brand d-flex align-items-center" href="#"><span
                         class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg
                             xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                             viewBox="0 0 16 16" class="bi bi-bezier">
                             <path fill-rule="evenodd"
                                 d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z">
                             </path>
                             <path
                                 d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z">
                             </path>
                         </svg></span><span>Brand</span></a>
                 <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span
                         class="visually-hidden">Toggle
                         navigation</span><span class="navbar-toggler-icon"></span></button>
                 <div class="collapse navbar-collapse" id="navcol-3">
                     <ul class="navbar-nav mx-auto">
                         <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                         <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                         <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                         <li class="nav-item"><a class="nav-link" href="#">About us</a></li>
                         <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                     </ul>

                     <div class="nav-icons">
                         <ul>
                            @guest
                            <li><a href="{{ route('login') }}" class="btn btn-success">Login </a> </li>
                            <li><a href="{{ route('register') }}" class="btn btn-primary">Register </a></li>
                            @endguest
                          
                            @auth
                             <li>
                                 <div class="search position-relative">
                                     <span><i class="fas fa-search"></i></span>
                                     <div class="search-overlap">
                                     </div>
                                     <form action="#" class="search-form position-fixed">
                                         <div class="search-input ">
                                             <div class="search-close">
                                                 <span>X</span>
                                             </div>
                                             <input type="text" placeholder="Enter your keywords.....">
                                         </div>
                                     </form>
                                 </div>
                             </li>
                             <li><a href="my_wishlist.html"><i class="fas fa-shopping-cart"></i>
                                     <span class="badge badge-pink ">1</span>
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
                                         Admin </a>
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
