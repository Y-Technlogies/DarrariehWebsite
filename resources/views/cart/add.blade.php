@extends('welcome')

@section('content')
    <div class="margin-fix">
        <div class="border-bottom-0 card d-flex flex-row mt-3">
            @if($isArabic)
                <div class="card-body text-right">
                    <p class="card-text two-line mb-3">
                        {{ $product->getTranslatedAttribute('description') }}
                    </p>
                    <p class="card-text card-price mb-2">
                        {{ $product->price }} {{ __('product-detail.currency') }}
                    </p>
                </div>
                <img src="{{Voyager::image($product->getImage()[0])}}" class="w-25">
            @else
                <img src="{{Voyager::image($product->getImage()[0])}}" class="w-25">
                <div class="card-body">
                    <p class="card-text two-line mb-3">
                        {{ $product->description }}
                    </p>
                    <p class="card-text card-price mb-2">
                        {{ $product->price }} {{ __('product-detail.currency') }}
                    </p>
                </div>
            @endif
        </div>

        <div class="bg-white border border-top-0 mx-0 pt-3 row">
            @include('partials.frontend.validation')
            <div class="col-sm-12">
                <form method="post" action="{{ route('cart.post') }}" class="@if(app()->getLocale() === 'en') text-left @else text-right @endif">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('cart.size') }}</label> <br/>
                        @foreach(json_decode($product->size) as $size)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_size" value="{{ $size }}">
                                <label class="form-check-label" for="product_size">{{ strtoupper($size) }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('cart.color') }}</label> <br />
                        @foreach(json_decode($product->style_color) as $color)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_color" value="{{ $color }}">
                                <label class="form-check-label" for="product_color">{{ ucfirst($color) }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('cart.quantity') }}</label>
                        <input type="number" name="quantity" class="form-control @if(app()->getLocale() != 'en') text-right @endif" placeholder="0" value="{{ old('quantity') }}">
                    </div>
                    <button class="btn btn-block btn-submit mb-2" type="submit">{{ __('cart.confirm') }}</button>
                </form>
            </div>
        </div>
    </div>
@stop