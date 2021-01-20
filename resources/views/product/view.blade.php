@extends('welcome')

@section('content')

    <div class="row bg-white">
        <div id="carouselExampleIndicators" class="carousel slide col-sm-12 pl-0 pr-0" data-ride="carousel">
            <p class="carousel-overlay">
               <span>{{ $dataTypeContent->product_code }}</span>رمز المنتج :
            </p>
            <ol class="carousel-indicators">
                @foreach($dataTypeContent->getImage() as $key=>$image)
                    @if($key === 0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($dataTypeContent->getImage() as $key=>$image)
                    @if($key === 0)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ Voyager::image($image) }}">
                        </div>
                    @else
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ Voyager::image($image) }}">
                        </div>
                    @endif
                @endforeach
            </div>
            @if(sizeof($dataTypeContent->getImage()) > 1)
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ __('product-detail.Previous') }}</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{__('product-detail.Next')}}</span>
                </a>
            @endif
        </div>

        <div class="product-info w-100 @if($isArabic) text-right @endif">
            <span>{{ $dataTypeContent->getTranslatedAttribute('price') }} {{ __('product-detail.currency') }}</span>
            <p class="product-description">{{ $dataTypeContent->getTranslatedAttribute('description') }}
                {{--<span class="product-id">{{ $dataTypeContent->product_code }}</span>--}}
            </p>
        </div>
    </div>

    <div class="row bg-white mt-3 mb-2 details @if($isArabic) text-right @endif">
        <h3 class="w-100">{{ __('product-detail.item_description') }}</h3>
        <table class="table table-bordered mt-3">
            <tbody>
            @foreach($dataType->readRows as $row)

                @if(!in_array($row->field, ['price', 'images', 'description', 'created_at', 'season', 'style', 'pattern', 'clothing_noun', 'fabric']))
                    <tr>
                        @if($isArabic)
                            <td>
                                @if($row->field === 'size')
                                    @if (@count(json_decode($dataTypeContent->{$row->field})) > 0)
                                        @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                            @if (@$row->details->options->{$item})
                                                {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ __('voyager::generic.none') }}
                                    @endif

                                @elseif($row->type == 'relationship')
                                    @php
                                        $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                                        $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($row->details->model, $row->details->pivot_table, $row->details->foreign_pivot_key ?? null, $row->details->related_pivot_key ?? null, $row->details->parent_key ?? null, $row->details->key)->get()->map(function ($item, $key) use ($row) {

                                            return $item->{$row->details->label};

                                        })->all() : array();
                                    @endphp
                                    @foreach($selected_values as $color)
                                        {{--{{ $color . (!$loop->last ? ', ' : '')  }}--}}
                                        <div class="badge badge-lg" style="background-color: {{ $color }}; width: 30px; height: 20px;">&nbsp;</div>
                                    @endforeach
                                @else
                                    {{ $dataTypeContent->getTranslatedAttribute($row->field) }}
                                @endif
                            </td>
                            <td>
                                {{ $row->getTranslatedAttribute('display_name') }}
                            </td>
                        @else
                            <td>
                                {{ $row->getTranslatedAttribute('display_name') }}     {{ $status ?? '' }}
                            </td>
                            <td>
                                @if($row->field === 'size')
                                    @if (@count(json_decode($dataTypeContent->{$row->field})) > 0)
                                        @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                            @if (@$row->details->options->{$item})
                                                {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ __('voyager::generic.none') }}
                                    @endif

                                @elseif($row->type == 'relationship')
                                    @php
                                        $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                                        $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($row->details->model, $row->details->pivot_table, $row->details->foreign_pivot_key ?? null, $row->details->related_pivot_key ?? null, $row->details->parent_key ?? null, $row->details->key)->get()->map(function ($item, $key) use ($row) {

                                            return $item->{$row->details->label};

                                        })->all() : array();
                                    @endphp
                                    @foreach($selected_values as $color)
                                        <div class="badge badge-lg" style="background-color: {{ $color }}; width: 30px; height: 20px;">&nbsp;</div>
                                    @endforeach
                                @else
                                    {{ $dataTypeContent->getTranslatedAttribute($row->field) }}
                                @endif
                            </td>
                        @endif
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    @include('partials.list')

    @include('partials.bottom-nav', ['product' => $dataTypeContent])

    <div class="clearfix" style="height: 50px"></div>
@stop

