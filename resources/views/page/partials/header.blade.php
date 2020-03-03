<div class="site-branding-area bg-danger">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo">
                    <h1><a href="{{ route('page.index') }}"><img src="{{ asset('img/logo.png') }}"
                                                                 style="height: 100px"></a></h1>
                </div>
            </div>

            <div class="col-sm-6 text-center">
                <h1 class="text-success font-weight-bold" style="margin-top: 70px">Think Different</h1>
            </div>
            @guest
                <div class="col-sm-3" style="margin-top: 24px">
                    <div class="shopping-item bg-warning" style="border-color: #0f401b">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="shopping-item bg-warning" style="border-color: #0f401b">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endif
                </div>
            @else
                <div class="col-sm-3" style="margin-top: 24px">
                    <div class="shopping-item dropdown dropdown-small bg-success" style="border-color: #0f401b">
                        <a id="navbar Dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    <div class="shopping-item bg-success" style="border-color: #0f401b">
                        <a href="{{ route('list.shopping.cart') }}">Cart <span
                                class="cart-amunt">${{ Cart::subtotal(0,'',' ') }}</span> <i
                                class="fa fa-shopping-cart"></i> <span class="product-count">{{ Cart::count() }}</span></a>
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
                <ul class="nav navbar-nav ">
                    <li class="{{ Request::path() == '/' ? 'active' : null }}"><a
                            href="{{ route('page.index') }}">Home</a></li>
                    <li class="{{ Request::path() == 'shop' ? 'active' : null }}"><a href="{{ route('page.shop') }}">Shop
                            page</a></li>
                    <li class="{{ Request::path() == 'category/' ? 'active' : null }}">
                        <div class="dropdown">
                            <button style="margin-top: 12px; background-color: #fbfbfb !important;"
                                    class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CATEGORY
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('page.category', 'iphone') }}">Iphone
                                    (APPLE)</a>
                                <a class="dropdown-item" href="{{ route('page.category', 'samsung') }}">Samsung</a>
                                <a class="dropdown-item" href="{{ route('page.category', 'oppo') }}">Oppo</a>
                                <a class="dropdown-item" href="{{ route('page.category', 'huawei') }}">Huawei</a>
                            </div>
                        </div>
                    </li>
                    <li class="{{ Request::path() == 'shopping/cart' ? 'active' : null }}"><a
                            href="{{ route('list.shopping.cart') }}">Cart</a></li>
                    <li class="{{ Request::path() == 'shopping/checkout' ? 'active' : null }}"><a
                            href="{{ route('checkout.shopping') }}">Checkout</a></li>
                    @auth
                        <li class="{{ Request::path() == 'shopping/manage-transaction' ? 'active' : null }}">
                            <a href="{{ route('manageTransaction.shopping') }}">Your Transactions</a>
                        </li>
                    @endauth
                    <li>
                        <form action="{{ route('page.find_product') }}" method="get" style="margin-left: 5px">
                            <input type="text" class="d-inline" name="name" style="margin-top: 10px"
                                   placeholder="Input product's name">
                            <button class="btn btn-danger" style="font-size: 19px; margin-left: 5px">Find</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
