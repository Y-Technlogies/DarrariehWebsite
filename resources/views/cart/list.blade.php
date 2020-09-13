@extends('welcome')

@section('content')

    @foreach($products as $key=>$product)
        <div class="border-bottom-0 card d-flex flex-row mt-3 cart-list margin-fix">
            <a href="{{ route('cart.remove', $key) }}" class="btn btn-danger h-25 m-1">
                <i class="fa fa-trash"></i>
            </a>
            <img src="{{Voyager::image($product['image'])}}" class="w-25">
            <div class="card-body">
                <p class="card-text one-line mb-0">
                    {{ $product['description'] }}
                </p>
                <p class="card-text style">
                    {{ $product['product_size']}} , {{ array_key_exists('product_color', $product) ? $product['product_color'] : ''  }}
                </p>
                <p class="card-text card-text d-flex justify-content-between text-center">
                    <span class="price">{{ $product['price'] }}</span>
                    <span class="quantity">Q : {{ $product['quantity']}}</span>
                </p>
            </div>
        </div>
    @endforeach

    <nav id="navbar" class="navbar fixed-bottom navbar-expand navbar-light bg-white p-0 border full-screen-fix">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav text-center">
                <li class="border-right nav-item p-2 text-left w-100 total">
                  {{ __('cart.Total') }}: <span class="pl-1">{{ Session::get('total') }}</span>
                </li>
                <li class="nav-item add-to-cart py-1">
                    @if(@count($products) > 0)
                        <a class="nav-link font-weight-bold" href="{{ route('cart.checkout') }}">{{ __('cart.Checkout') }}</a>
                    @else
                        <a class="nav-link font-weight-bold" href="{{ url('/') }}">{{ __('cart.Go_to_Home') }}</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>

@stop