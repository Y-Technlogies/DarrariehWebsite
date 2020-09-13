@extends('welcome')

@section('content')

<div class="margin-fix">
    <div class="row bg-white">
        <div id="carouselExampleIndicators" class="carousel slide col-sm-12 pl-0 pr-0" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($product->getImage() as $key=>$image)
                    @if($key === 0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($product->getImage() as $key=>$image)
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
            @if(sizeof($product->getImage()) > 1)
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            @endif
        </div>

        <div class="product-info">
            <span>{{ $product->price }}</span>
            <p class="product-description">{{ $product->description }}
                <span class="product-id">{{ $product->id }}</span>
            </p>
        </div>
    </div>

    <div class="row bg-white mt-3 details">
        <span>Item Descriptions</span>
        <table class="table table-bordered mt-3">
            <tbody>
            <tr>
                <td>
                    Season
                </td>
                <td>
                   {{ $product->season }}
                </td>
            </tr>
            <tr>
                <td>
                    Style
                </td>
                <td>
                    {{ $product->style }}
                </td>
            </tr>
            <tr>
                <td>
                    Details
                </td>
                <td>
                    {{ $product->details }}
                </td>
            </tr>
            <tr>
                <td>
                    Pattern
                </td>
                <td>
                    {{ $product->pattern }}
                </td>
            </tr>
            <tr>
                <td>
                    Clothing noun
                </td>
                <td>
                    {{ $product->clothing_noun }}
                </td>
            </tr>
            <tr>
                <td>
                    Applicable scene
                </td>
                <td>
                    {{ $product->applicable_scene }}
                </td>
            </tr>
            <tr>
                <td>
                    Fabric
                </td>
                <td>
                    {{ $product->fabric }}
                </td>
            </tr>
            <tr>
                <td>
                    Suitable age
                </td>
                <td>
                    {{ $product->suitable_age }}
                </td>
            </tr>
            <tr>
                <td>
                    Style
                </td>
                <td>
                    {{ $product->color }}
                </td>
            </tr>
            <tr>
                <td>
                    Size
                </td>
                <td>
                     @foreach(json_decode($product->size, true) as $size)
                         {{ $size }}
                         @endforeach
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
    @include('partials.list')

    @include('partials.bottom-nav', ['product' => $product])

    <div class="clearfix" style="height: 50px"></div>
    
@stop