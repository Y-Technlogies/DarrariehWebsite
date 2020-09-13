<nav id="navbar" class="navbar fixed-bottom navbar-expand navbar-light bg-white p-0 border">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav text-center">
            <li class="nav-item border-right px-3">
                <a class="nav-link shop" href="{{ url('/') }}"><i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i>Shop</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link cart" href="{{ route('cart.list') }}"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>Cart</a>
                @if(Session::has('products_count') && Session::get('products_count') > 0)
                    <span class="d-block position-absolute text-center cart-count">
                            <span>{{ Session::get('products_count') }}</span>
                    </span>
                @endif
            </li>
            <li class="nav-item add-to-cart py-1">
                <a class="nav-link" href="{{ route('cart.add', $product) }}">ADD To Cart</a>
            </li>
        </ul>
    </div>
</nav>