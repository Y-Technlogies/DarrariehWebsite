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
                <img height="120" src="{{Voyager::image($product->getImage()[0])}}" class="w-25">
            @else
                <img height="120" src="{{Voyager::image($product->getImage()[0])}}" class="w-25">
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
                        @foreach($dataType->readRows as $row)
                            @if($row->field === 'size')
                                @if (@count(json_decode($dataTypeContent->{$row->field}, true)) > 0)
                                        @foreach(json_decode($dataTypeContent->size) as $item)
                                            @if ($row->details->options->{$item})
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="product_size" value="{{ $item }}">
                                                    <label class="form-check-label" for="product_size">{{ $row->details->options->{$item}  }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                @else
                                    {{ __('voyager::generic.none') }}
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('cart.color') }}</label> <br />
                        @php
                            $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                            $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($row->details->model, $row->details->pivot_table, $row->details->foreign_pivot_key ?? null, $row->details->related_pivot_key ?? null, $row->details->parent_key ?? null, $row->details->key)->get()->map(function ($item, $key) use ($row) {
                                return $item;

                            })->all() : array();
                        @endphp
                        @foreach($selected_values as $color)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_color" value="{{ $color->id }}">
                                <label class="form-check-label" for="product_color">
                                    <div class="badge badge-lg" style="background-color: {{ $color->code }}; color: {{ $color->code }}; width: 30px; height: 20px;">&nbsp;</div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('cart.quantity') }}</label>
                        <input type="number" name="quantity" class="form-control @if(app()->getLocale() != 'en') text-right @endif" placeholder="0" value="{{ old('quantity') ?: 1 }}">
                    </div>
                    <button class="btn btn-block btn-submit mb-2" type="submit">{{ __('cart.confirm') }}</button>
                </form>
            </div>
        </div>
    </div>
@stop