<div class="row attached__portfolio">
    @foreach ($portfolios as $portfolio)
        <div class="col-4">
            <div class="image">
                <img src="{{ $portfolio->image->path }}" alt="{{ $portfolio->image->alt }}" title="{{ $portfolio->image->title }}">
            </div>
            <a href="{{ $portfolio->url }}" class="title">{{ $portfolio->name }}</a>
            <div class="desc">
                <div class="name">{{ $portfolio->name }}</div>
                {!! $portfolio->preview !!}
                @if ($portfolio->tags)
                    <div class="tags">
                        @foreach ($portfolio->tags as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif
                <div class="link__more">
                    <div class="link__more-text">
                        <a href="{{ $portfolio->url }}" class="btn white">ПОДРОБНЕЕ</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
