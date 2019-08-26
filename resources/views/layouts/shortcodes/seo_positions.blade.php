@if(count($seoPositions))
<div class="seo_positions owl-carousel owl-theme">
    @foreach($seoPositions as $seoPosition)
    <div class="seo_positions-item">
        <div class="row">
            <div class="col-4 as__center">
                <div class="logo">
                    @if($seoPosition->image)
                    <img src="{{ $seoPosition->image->path }}" alt="{{ $seoPosition->image->alt }}" title="{{ $seoPosition->image->title }}">
                    @endif
                    <div class="domain grey">
                        {{ $seoPosition->domain }}
                    </div>
                </div>
            </div>
            <div class="col-8">
                @if(count($seoPosition->seoPositionItems))
                <div class="positions">
                    <ul>
                        @foreach($seoPosition->seoPositionItems as $item)
                            <li>
                                <svg class="icon">
                                    <use xlink:href="{{ asset('img/symbols.svg#' . $item->se) }}"></use>
                                </svg>
                                {{ $item->query }}
                                <div><span>{{ $item->value }}</span></div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
