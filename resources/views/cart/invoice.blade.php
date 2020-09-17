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
            @if($isArabic)
                <p class="card-text d-flex justify-content-between text-center m-0">
                    <span class="text-gray">{{ Session::get('total') }} {{ __('product-detail.currency') }}</span>
                    <span class="text-gray">{{ __('cart.product_total') }}</span>
                </p>
                <p class="card-text d-flex justify-content-between text-center m-0">
                    <span class="order-total">{{ Session::get('total') }} {{ __('product-detail.currency') }}</span>
                    <span>{{ __('cart.order_total') }}</span>
                </p>
            @else
                <p class="card-text d-flex justify-content-between text-center m-0">
                <span class="text-gray">{{ __('cart.product_total') }}</span>
                <span class="text-gray">{{ Session::get('total') }} {{ __('product-detail.currency') }}</span>
            </p>
            <p class="card-text d-flex justify-content-between text-center m-0">
                <span>{{ __('cart.order_total') }}</span>
                <span class="order-total">{{ Session::get('total') }} {{ __('product-detail.currency') }}</span>
            </p>
            @endif
        </div>
    </div>

    @foreach($products as $key=>$product)
        <div class="card d-flex flex-row mt-2 cart-list margin-fix">
            @if($isArabic)
                <div class="card-body text-right">
                    <p class="card-text one-line mb-0">
                        {{ productTranslation($product['product_id']) }}
                    </p>
                    <p class="card-text style">
                        {{ $product['product_size']}} , {{ $product['product_color']  }}
                    </p>
                    <p class="card-text d-flex justify-content-between text-center">
                        <span class="quantity text-gray">{{ $product['quantity']}} x</span>
                        <span>{{ $product['price'] }} {{ __('product-detail.currency') }}</span>
                    </p>
                </div>
                <img src="{{Voyager::image($product['image'])}}" class="w-25">
            @else
            <img src="{{Voyager::image($product['image'])}}" class="w-25">
            <div class="card-body">
                <p class="card-text one-line mb-0">
                    {{ productTranslation($product['product_id']) }}
                </p>
                <p class="card-text style">
                    {{ $product['product_size']}} , {{ $product['product_color']  }}
                </p>
                <p class="card-text d-flex justify-content-between text-center">
                    <span>{{ $product['price'] }} {{ __('product-detail.currency') }}</span>
                    <span class="quantity text-gray">x{{ $product['quantity']}}</span>
                </p>
            </div>
            @endif
        </div>
    @endforeach

    <nav id="navbar" class="navbar fixed-bottom navbar-expand navbar-light bg-white p-0 border full-screen-fix">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav text-center">
                <li class="border-right nav-item p-2 text-left w-100 total">
                    {{ __('cart.grand_total') }}: <span class="pl-1">{{ Session::get('total') }} {{ __('product-detail.currency') }}</span>
                </li>
                <li class="nav-item add-to-cart py-1">
                    <a class="nav-link font-weight-bold" href="{{ route('pay') }}">{{ __('cart.confirm_pay') }}</a>
                </li>
            </ul>
        </div>
    </nav>

@stop