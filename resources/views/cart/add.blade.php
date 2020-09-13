@extends('welcome')

@section('content')
    <div class="border-bottom-0 card d-flex flex-row mt-3">
        <img src="{{Voyager::image($product->getImage()[0])}}" class="w-25">
        <div class="card-body">
            <p class="card-text two-line mb-3">
                {{ $product->description }}
            </p>
            <p class="card-text card-price mb-2">
                {{ $product->price }}
            </p>
        </div>
    </div>

    <div class="bg-white mx-0 pt-3 row">
        <div class="col-sm-12">
            <form method="post" action="{{ route('cart.post') }}">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Size</label> <br/>
                    @foreach(json_decode($product->size) as $size)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="product_size" value="{{ $size }}">
                            <label class="form-check-label" for="product_size">{{ strtoupper($size) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Color</label> <br />
                    @foreach(json_decode($product->style_color) as $color)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="product_color" value="{{ $color }}">
                            <label class="form-check-label" for="product_color">{{ ucfirst($color) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Quantity</label>
                    <input type="number" name="quantity" class="form-control" placeholder="0">
                </div>
                <button class="btn btn-block btn-submit mb" type="submit">Confirm</button>
            </form>
        </div>
    </div>
@stop