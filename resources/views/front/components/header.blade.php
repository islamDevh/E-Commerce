<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="phone" href="#"><span
                                        class="icon label-before fa fa-mobile">
                                    @foreach ($settings as $setting)
                                    </span>{{$setting->phone}}</a>
                                    @endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            @guest
                            <li class="menu-item"><a title="Login" href="{{ route('login') }}">Login</a></li>
                            <li class="menu-item"><a title="Register" href="{{ route('register.index') }}">Register</a></li>
                            @endguest
                            @if (Auth::user() && Auth::user()->type == 'admin')
                            <li class="menu-item"><a title="Dashboard" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                            @auth
                            <li class="menu-item"><a title="logout"href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="bx bx-log-out"></i>logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            @endauth

                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{route('front.index')}}" class="link-to-home"><img
                            @foreach ($settings as $setting)
                            src="{{ asset($setting->logo) }}"  alt="mercado"></a>
                            @endforeach
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="Search here...">
                                <button form="form-search-top" type="button"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">All Category</a>
                                    <ul class="list-cate">
                                        <li class="level-0">All Category</li>
                                        <li class="level-1">-Electronics</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Headphone & Headsets</li>
                                        <li class="level-2">Mp3 Player & Acessories</li>
                                        <li class="level-1">-Smartphone & Table</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Mp3 Player & Headphones</li>
                                        <li class="level-2">Table & Accessories</li>
                                        <li class="level-1">-Electronics</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Headphone & Headsets</li>
                                        <li class="level-2">Mp3 Player & Acessories</li>
                                        <li class="level-1">-Smartphone & Table</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Mp3 Player & Headphones</li>
                                        <li class="level-2">Table & Accessories</li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section wishlist">
                            <a href="#" class="link-direction">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">0 item</span>
                                    <span class="title">Wishlist</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section minicart">
                            <a href="{{route('cart.index')}}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">items: {{ $cartItemCount }}</span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>

                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky" style="font-size:18px;">
                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon">
                                <a href="{{route('front.index')}}" class="link-term mercado-item-title"><i class="fa fa-home"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="about-us.html" class="link-term mercado-item-title">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('shop.index') }}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('cart.index')}}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('checkout.index')}}" class="link-term mercado-item-title">Checkout</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('ContactUs.index')}}" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
