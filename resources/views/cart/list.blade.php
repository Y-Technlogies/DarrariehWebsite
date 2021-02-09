@extends('welcome')

@section('content')
    @if(isset($products) && @count($products) > 0)
        @foreach($products as $key=>$product)
            @if($isArabic)
                <div class="border-bottom-0 card d-flex flex-row mt-3 cart-list margin-fix">
                    <div class="card-body text-right">
                        <p class="card-text one-line mb-0">
                            {{ productTranslation($product['product_id']) }}
                        </p>
                        <div class="card-text style">
                            @php
                                $color = \App\Color::find($product['product_color'])->first();
                            @endphp
                            {{ getSizeFromOption($product['product_size']) }} , <div class="badge badge-lg" style="background-color: {{ $color->code }}; width: 15px; height: 10px;">&nbsp;</div>
                        </div>
                        <p class="card-text card-text d-flex justify-content-between text-center">
                            <span class="quantity">Q : {{ $product['quantity']}}</span>
                            <span class="price">{{ $product['price'] }} {{ __('product-detail.currency') }}</span>
                        </p>
                    </div>
                    <img height="120" src="{{Voyager::image($product['image'])}}" class="w-25">
                    <a href="{{ route('cart.remove', $key) }}" class="btn btn-danger h-25 m-1">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            @else
                <div class="border-bottom-0 card d-flex flex-row mt-3 cart-list margin-fix">
                    <a href="{{ route('cart.remove', $key) }}" class="btn btn-danger h-25 m-1">
                        <i class="fa fa-trash"></i>
                    </a>
                    <img height="120" src="{{Voyager::image($product['image'])}}" class="w-25">
                    <div class="card-body">
                        <p class="card-text one-line mb-0">
                            {{ $product['description'] }}
                        </p>
                        <div class="card-text style">
                            @php
                                $color = \App\Color::find($product['product_color'])->first();
                            @endphp
                           <div class="badge badge-lg" style="background-color: {{ $color->code }}; width: 15px; height: 10px;">&nbsp;</div> , {{ getSizeFromOption($product['product_size']) }}
                        </div>
                        <p class="card-text card-text d-flex justify-content-between text-center">
                            <span class="price">{{ $product['price'] }} {{ __('product-detail.currency') }}</span>
                            <span class="quantity">Q : {{ $product['quantity']}}</span>
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    <nav id="navbar" class="navbar fixed-bottom navbar-expand navbar-light bg-white p-0 border full-screen-fix">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav text-center">
                @if($isArabic)
                    <li class="nav-item add-to-cart py-1">
                        @if(isset($products) && @count($products) > 0)
                            <a class="nav-link font-weight-bold" href="{{ route('cart.checkout') }}">{{ __('cart.checkout') }}</a>
                        @else
                            <a class="nav-link font-weight-bold" href="{{ url('/') }}">{{ __('cart.go_to_home') }}</a>
                        @endif
                    </li>
                    <li class="border-right nav-item p-2 @if(app()->getLocale() === 'en') text-left @else text-right @endif w-100 total @if(Session::get('total') < 1) invisible @endif">
                        {{ __('cart.total') }} : <span class="pl-1">{{ __('product-detail.currency') }} {{ Session::get('total') }}</span>
                    </li>
                @else
                    <li class="border-right nav-item p-2 @if(app()->getLocale() === 'en') text-left @else text-right @endif w-100 total @if(Session::get('total') < 1) invisible @endif">
                      {{ __('cart.total') }} : <span class="pl-1">{{ Session::get('total') }} {{ __('product-detail.currency') }}</span>
                    </li>
                    <li class="nav-item add-to-cart py-1">
                        @if(isset($products) && @count($products) > 0)
                            <a class="nav-link font-weight-bold" href="{{ route('cart.checkout') }}">{{ __('cart.checkout') }}</a>
                        @else
                            <a class="nav-link font-weight-bold" href="{{ url('/') }}">{{ __('cart.go_to_home') }}</a>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </nav>

@stop