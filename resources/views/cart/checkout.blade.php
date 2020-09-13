@extends('welcome')

@section('content')
    <div class="row bg-white p-2 row">
        <form method="post" action="{{ route('customer.store') }}">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputEmail4">{{ __('cart.First_Name') }}</label>
                    <input type="text" name="first_name" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col">
                    <label for="inputPassword4">{{ __('cart.Last_Name') }}</label>
                    <input type="text" name="last_name" class="form-control" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">{{ __('cart.Phone') }}</label>
                <input type="text" name="phone" class="form-control" id="inputAddress">
            </div>
            <div class="form-group">
                <label for="inputAddress2">{{ __('cart.Address') }}</label>
                <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-submit mb">Save</button>
        </form>
    </div>

@stop