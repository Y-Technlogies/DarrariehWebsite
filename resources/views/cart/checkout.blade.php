@extends('welcome')

@section('content')
    <div class="row bg-white p-2 row">
        @include('partials.frontend.validation')
        <form method="post" action="{{ route('customer.store') }}" class="@if(app()->getLocale() === 'en') text-left @else text-right @endif">
            {{ csrf_field() }}
            <div class="form-row">
                @if(!$isArabic)
                    <div class="form-group col">
                        <label for="inputEmail4">{{ __('cart.first_name') }}</label>
                        <input type="text" name="first_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputEmail4"
                               placeholder="{{($isArabic) ? __('placeholder.first_name') : '' }}"
                               value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group col">
                        <label for="inputPassword4">{{ __('cart.last_name') }}</label>
                        <input type="text"
                               name="last_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputPassword4"
                               placeholder="{{($isArabic) ? __('placeholder.last_name') : '' }}"
                               value="{{ old('last_name') }}">
                    </div>
                @else
                    <div class="form-group col">
                        <label for="inputPassword4">{{ __('cart.last_name') }}</label>
                        <input type="text"
                               name="last_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputPassword4"
                               placeholder="{{($isArabic) ? __('placeholder.last_name') : '' }}"
                               value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group col">
                        <label for="inputEmail4">{{ __('cart.first_name') }}</label>
                        <input type="text" name="first_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputEmail4"
                               placeholder="{{($isArabic) ? __('placeholder.first_name') : '' }}"
                               value="{{ old('first_name') }}">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="inputAddress">{{ __('cart.phone') }}</label>
                <input type="text"
                       name="phone"
                       class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                       id="inputAddress"
                       placeholder="{{($isArabic) ? __('placeholder.phone') : '' }}"
                       value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="inputAddress2">{{ __('cart.address') }}</label>
                <textarea name="address"
                          id=""
                          cols="30"
                          rows="10"
                          class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                          placeholder="{{ __('placeholder.address') }}">
                </textarea>
            </div>
            <button type="submit" class="btn btn-block btn-submit mb">{{ __('cart.save') }}</button>
        </form>
    </div>

@stop