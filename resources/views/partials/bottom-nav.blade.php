<nav id="navbar" class="navbar fixed-bottom navbar-expand navbar-light bg-white p-0 border full-screen-fix">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav text-center">

            @if($isArabic)
                <li class="nav-item add-to-cart py-1">
                    <a class="nav-link" href="{{ route('cart.add', $product) }}">{{ __('bottom-nav.add_to_cart') }}</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link cart" href="{{ route('cart.list') }}"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>{{ __('bottom-nav.cart') }}</a>
                    @if(Session::has('products_count') && Session::get('products_count') > 0)
                        <span class="d-block position-absolute text-center cart-count">
                                <span>{{ Session::get('products_count') }}</span>
                        </span>
                    @endif
                </li>
                <li class="nav-item border-left px-3">
                    <a class="nav-link shop" href="{{ url('/') }}"><i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i>{{ __('bottom-nav.shop') }}</a>
                </li>
            @else
                <li class="nav-item border-right px-3">
                    <a class="nav-link shop" href="{{ url('/') }}"><i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i>{{ __('bottom-nav.shop') }}</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link cart" href="{{ route('cart.list') }}"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>{{ __('bottom-nav.cart') }}</a>
                    @if(Session::has('products') && Session::get('products_count') > 0)
                        <span class="d-block position-absolute text-center cart-count">
                            <span>{{ Session::get('products_count') }}</span>
                        </span>
                    @endif
                </li>
                <li class="nav-item add-to-cart py-1">
                    <a class="nav-link" href="{{ route('cart.add', $product) }}">{{ __('bottom-nav.add_to_cart') }}</a>
                </li>
            @endif
        </ul>
    </div>
</nav>