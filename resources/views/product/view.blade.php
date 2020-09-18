@extends('welcome')

@section('content')

    <div class="row bg-white">
        <div id="carouselExampleIndicators" class="carousel slide col-sm-12 pl-0 pr-0" data-ride="carousel">
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
                <span class="product-id">{{ $dataTypeContent->id }}</span>
            </p>
        </div>
    </div>

    <div class="row bg-white mt-3 details @if($isArabic) text-right @endif">
        <h3 class="w-100">{{ __('product-detail.item_description') }}</h3>
        <table class="table table-bordered mt-3">
            <tbody>
            @foreach($dataType->readRows as $row)

                @if(!in_array($row->field, ['price', 'images', 'description', 'created_at']))
                    <tr>
                        @if($isArabic)
                            <td>
                                @if($row->field === 'size' || $row->field === 'style_color')
                                    @foreach(json_decode($dataTypeContent->{$row->field}, true) as $size)
                                        {{ $size }}
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
                                {{ $row->getTranslatedAttribute('display_name') }}
                            </td>
                            <td>
                                @if($row->field === 'size' || $row->field === 'style_color')
                                    @foreach(json_decode($dataTypeContent->{$row->field}, true) as $size)
                                        {{ $size }}
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