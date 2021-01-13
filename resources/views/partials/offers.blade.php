<div id="carouselExampleSlidesOnly" class="carousel slide margin-fix-full" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($offers as $offer)
            <div class="carousel-item @if($offer->is_active) active @endif">
                <img class="d-block w-100" src="{{ Voyager::image($offer->cover) }}" height="200" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="color: {{ $offer->title_font_color }}">{{ $offer->title }}</h5>
                    <p style="color: {{ $offer->description_font_color }}">{{ $offer->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>