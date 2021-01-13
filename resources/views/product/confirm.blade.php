@extends('welcome')

@section('content')

    <div class="align-content-center d-flex justify-content-center row" style="height: 94vh;">
        <div class="btn-group-vertical">
            <a href="{{ url('/') }}" class="btn btn-lg btn-outline-danger">Continue Shopping</a>
            <a href="{{ route('cart.list') }}" class="btn btn-lg btn-outline-danger">Checkout</a>
        </div>
    </div>

    <div class="clearfix" style="height: 50px"></div>
@stop