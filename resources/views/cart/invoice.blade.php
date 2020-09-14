@extends('welcome')

@section('content')

    <div class="card mt-2 p-1 customer-address margin-fix">
        <div class="card-body">
            <p class="cart-text m-0">
                {{ $customer->first_name }} {{ $customer->last_name }}
            </p>
            <p class="cart-text m-0">
                {{ $customer->phone }}
            </p>
            <p class="cart-text two-line m-0">
                {{ $customer->address }}
            </p>
        </div>
    </div>

    <div class="card mt-2 p-1 invoice margin-fix">
        <div class="card-body">
            <p class="card-text d-flex justify-content-between text-center m-0">
                <span class="text-gray">{{ __('cart.product_total') }}</span>
                <span class="text-gray">{{ Session::get('total') }}</span>
            </p>
            <p class="card-text d-flex justify-content-between text-center m-0">
                <span>{{ __('cart.order_total') }}</span>
                <span class="order-total">{{ Session::get('total') }}</span>
            </p>
        </div>
    </div>

    @foreach($products as $key=>$product)
        <div class="border-bottom-0 card d-flex flex-row mt-2 cart-list margin-fix">
            <img src="{{Voyager::image($product['image'])}}" class="w-25">
            <div class="card-body">
                <p class="card-text one-line mb-0">
                    {{ $product['description'] }}
                </p>
                <p class="card-text style">
                    {{ $product['product_size']}} , {{ $product['product_color']  }}
                </p>
                <p class="card-text d-flex justify-content-between text-center">
                    <span>{{ $product['price'] }}</span>
                    <span class="quantity text-gray">x{{ $product['quantity']}}</span>
                </p>
            </div>
        </div>
    @endforeach

    <nav id="navbar" class="navbar fixed-bottom navbar-expand navbar-light bg-white p-0 border">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav text-center">
                <li class="border-right nav-item p-2 text-left w-100 total">
                    {{ __('cart.grand_total') }}: <span class="pl-1">{{ Session::get('total') }}</span>
                </li>
                <li class="nav-item add-to-cart py-1">
                    <a class="nav-link font-weight-bold" href="{{ route('pay') }}">{{ __('cart.confirm_pay') }}</a>
                </li>
            </ul>
        </div>
    </nav>

@stop