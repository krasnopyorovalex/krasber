@if ($service)
            </div>
        </div>
    </div>
</main>
<section class="sites__types">
    <div class="bg__box"></div>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="as__h1">{{ $service->title_block }}</div>

                <div class="list__items">
                    @foreach ($subServices as $service)
                        <div class="list__items-item2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="image">
                                        <a href="{{ route('service.show', ['alias' => $service->alias]) }}">
                                            <svg class="icon {{ $service->icon }}">
                                                <use xlink:href="./img/symbols.svg#{{ $service->icon }}"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="body">
                                        <a class="title" href="{{ route('service.show', ['alias' => $service->alias]) }}">{{ $service->menu_name }}</a>
                                        {!! $service->preview !!}
                                        <div class="price">{{ $service->getPrice() }}</div>
                                        <a href="{{ route('service.show', ['alias' => $service->alias]) }}" class="btn green">ПОДРОБНЕЕ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<main>
    <div class="container">
        <div class="row">
            <div class="col-10">
@endif
