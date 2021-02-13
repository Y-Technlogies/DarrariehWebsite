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
                               placeholder="{{ __('placeholder.first_name')}}"
                               value="{{ !$errors->has('first_name') ? old('first_name') : '' }}">
                    </div>
                    <div class="form-group col">
                        <label for="inputPassword4">{{ __('cart.last_name') }}</label>
                        <input type="text"
                               name="last_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputPassword4"
                               placeholder="{{ __('placeholder.last_name') }}"
                               value="{{ !$errors->has('last_name') ? old('last_name') : '' }}">
                    </div>
                @else
                    <div class="form-group col">
                        <label for="inputPassword4">{{ __('cart.last_name') }}</label>
                        <input type="text"
                               name="last_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputPassword4"
                               placeholder="{{ __('placeholder.last_name') }}"
                               value="{{ !$errors->has('last_name') ? old('last_name') : '' }}">
                    </div>
                    <div class="form-group col">
                        <label for="inputEmail4">{{ __('cart.first_name') }}</label>
                        <input type="text" name="first_name"
                               class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                               id="inputEmail4"
                               placeholder="{{ __('placeholder.first_name')}}"
                               value="{{ !$errors->has('first_name') ? old('first_name') : '' }}">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="inputAddress">{{ __('cart.phone') }}</label>
                <input type="text"
                       name="phone"
                       class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                       id="inputAddress"
                       placeholder="{{ __('placeholder.phone') }}"
                       value="{{ !$errors->has('phone') ? old('phone') : '' }}">
            </div>
            <div class="form-group">
                <label for="inputAddress2">{{ __('cart.address') }}</label>
                <textarea name="address"
                          id="address"
                          cols="30"
                          rows="10"
                          class="form-control {{ (!$isArabic) ? 'text-left' : 'text-right' }}"
                          placeholder="{{ __('placeholder.address') }}">{{ !$errors->has('address') ? old('address') : '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-block btn-submit mb">{{ __('cart.save') }}</button>
        </form>

        <table class="table table-striped">
            <thead>
                <td>Product Size</td>
                <td>Shoulder</td>
                <td>Bust/Chest</td>
                <td>Sleeve</td>
            </thead>
            <tbody>
                <tr>
                    <td>S</td>
                    <td>34</td>
                    <td>84</td>
                    <td>16</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>35</td>
                    <td>88</td>
                    <td>17</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>36</td>
                    <td>92</td>
                    <td>18</td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td>37</td>
                    <td>96</td>
                    <td>19</td>
                </tr>
                <tr>
                    <td>XXL</td>
                    <td>38</td>
                    <td>100</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </div>

@stop