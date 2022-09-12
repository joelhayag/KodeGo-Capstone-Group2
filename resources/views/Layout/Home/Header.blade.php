<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{ $settings->app_email }}</li>
                            <li>Shipping fee {{ $settings->app_shipping_fee }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            @foreach ($socials as $social)
                                <a href="{{ $social->social_url }}"><i class="fa fa-{{ $social->social_name }}"></i></a>
                            @endforeach
                        </div>
                        <div class="header__top__right__auth">
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    @else
                                        <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <h2 class="text-center">{{ $settings->app_name }}</h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{ Route::is('shop') ? 'active' : '' }}"><a href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{ route('cart') }}">Shoping Cart</a></li>
                                <li><a href="{{ route('checkout') }}">Check Out</a></li>
                                <li><a href="{{ route('blog') }}">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="{{ Route::is('blogs') ? 'active' : '' }}"><a href="{{ route('blogs') }}">Blog</a>
                        </li>
                        <li class="{{ Route::is('contact') ? 'active' : '' }}"><a
                                href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                @livewire('cart-counter')
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
