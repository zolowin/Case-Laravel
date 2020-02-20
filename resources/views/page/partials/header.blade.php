<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{ route('page.index') }}"><img src="{{ asset('img/logo.png') }}"></a></h1>
                </div>
            </div>

            @guest
                <div class="shopping-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
                @if (Route::has('register'))
                    <div class="shopping-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                @endif

            @else
                <div class="col-sm-6">
                    <div class="shopping-item dropdown dropdown-small">
                        <a id="navbarDropdown" data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="shopping-item">
                        <a href="{{ route('list.shopping.cart') }}">Cart <span class="cart-amunt">${{ Cart::subtotal(0,'',' ') }}</span> <i
                                class="fa fa-shopping-cart"></i> <span class="product-count">{{ Cart::content()->count() }}</span></a>
                    </div>
                </div>
            @endguest
        </div>
    </div>

</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::path() == '/' ? 'active' : null }}"><a href="{{ route('page.index') }}">Home</a></li>
                    <li class="{{ Request::path() == 'shop' ? 'active' : null }}"><a href="{{ route('page.shop') }}">Shop page</a></li>
                    <li class="{{ Request::path() == 'shopping/cart' ? 'active' : null }}"><a href="{{ route('list.shopping.cart') }}">Cart</a></li>
                    <li class="{{ Request::path() == 'shopping/checkout' ? 'active' : null }}"><a href="{{ route('checkout.shopping') }}">Checkout</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Others</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="navbar-header float-right">

            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
