<div class="card-columns pt-2 maxWidthCard">
    @foreach($products as $product)
    <a href="{{ route('product.show', $product) }}">
        <div class="card d-inline-block">
            <img class="card-img-top" src="{{ Voyager::image($product->getImage()[0]) }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text two-line mb-3">
                    {{ $product->description }}
                </p>
                <p class="card-text card-price mb-2">
                    {{ $product->price }}
                </p>
            </div>
        </div>
    </a>
    @endforeach
</div>