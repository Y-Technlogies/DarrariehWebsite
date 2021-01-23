@extends('welcome')

@section('content')
    <div class="row bg-white p-2 row">
        @include('partials.frontend.validation')
        <form method="post" action="{{ route('customer.store') }}" class="@if(app()->getLocale() === 'en') text-left @else text-right @endif">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputEmail4">{{ __('cart.first_name') }}</label>
                    <input type="text" name="first_name" class="form-control @if(app()->getLocale() === 'en') text-left @else text-right @endif" id="inputEmail4"
                    placeholder="{{(app()->getLocale() === 'ar') ?: __('placeholder.first_name') }}">
                </div>
                <div class="form-group col">
                    <label for="inputPassword4">{{ __('cart.last_name') }}</label>
                    <input type="text" name="last_name" class="form-control @if(app()->getLocale() === 'en') text-left @else text-right @endif" id="inputPassword4"
                   placeholder="{{(app()->getLocale() === 'ar') ?: __('placeholder.last_name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">{{ __('cart.phone') }}</label>
                <input type="text" name="phone" class="form-control @if(app()->getLocale() === 'en') text-left @else text-right @endif" id="inputAddress"
                placeholder="{{(app()->getLocale() === 'ar') ?: __('placeholder.phone') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress2">{{ __('cart.address') }}</label>
                <textarea name="address" id="" cols="30" rows="10" class="form-control @if(app()->getLocale() === 'en') text-left @else text-right @endif" placeholder="{{ __('placeholder.address') }}"></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-submit mb">{{ __('cart.save') }}</button>
        </form>
    </div>

@stop