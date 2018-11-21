<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="step">01</div>
                <div class="as__h1">Наши услуги</div>

                <div class="services__list">
                    @foreach ($services as $service)
                    <div class="services__list-item">
                        <a href="{{ route('service.show', $service->alias) }}" class="name">{{ $service->getMenuName() }}</a>
                        <svg class="icon arrow_down">
                            <use xlink:href="{{ asset('img/symbols.svg#arrow_down') }}"></use>
                        </svg>
                        <div class="body">
                            <div class="desc">
                                {!! strip_tags($service->preview) !!}
                            </div>
                            @if ($service->services->count())
                            <ul>
                                @foreach ($service->services as $subService)
                                <li><a href="{{ route('service.show', $subService->alias) }}">{{ $subService->getMenuName() }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                            <div class="btn__more">
                                <a href="{{ route('service.show', $service->alias) }}" class="btn green">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>