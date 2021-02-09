<div id="carouselExampleSlidesOnly" class="carousel slide margin-fix-full mb-2" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($offers as $key => $offer)

            @if($active > 1 || $active === 0)
                <div class="carousel-item @if($key === 0) active @endif">
                    <img class="d-block w-100" src="@if($offer->cover){{ Voyager::image($offer->cover) }} @else {{ asset('img/offer.png') }} @endif" height="200" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <p style="color: {{ $offer->title_description_color }}">{!! $offer->description !!}</p>
                    </div>
                </div>
            @else
                <div class="carousel-item @if($offer->is_active) active @endif">
                    <img class="d-block w-100" src="@if($offer->cover){{ Voyager::image($offer->cover) }} @else {{ asset('img/offer.png') }} @endif" height="200" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <p style="color: {{ $offer->title_description_color }}">{!! $offer->description !!}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>