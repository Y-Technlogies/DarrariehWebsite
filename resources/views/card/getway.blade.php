@extends('welcome')

@section('content')
    <div class="row bg-white p-3" style="font-size: 0.80rem;">
        <form method="post" action="{{ route('customer.store') }}" class="payment">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputAddress">Card Number</label>
                <input type="text" name="card_number" class="form-control" placeholder="0000 0000 0000 0000">
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputEmail4">Expire Date</label>
                    <input type="text" name="cvc" class="form-control" placeholder="MM/DD">
                </div>
                <div class="form-group col">
                    <label for="inputPassword4">Security Core</label>
                    <input type="text" name="date" class="form-control" placeholder="CVV">
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-submit mb">Pay</button>
        </form>
    </div>

@stop