<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="as__h1">Наши услуги</h2>

                <div class="services__list">
                    @foreach ($services as $service)
                    <div class="services__list-item{{ $loop->index === 0 ? ' is__open' : '' }}">
                        <a href="{{ route('service.show', $service->alias) }}" class="name">{{ $service->getMenuName() }}</a>
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
                                <a href="{{ route('service.show', $service->alias) }}" class="btn">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
