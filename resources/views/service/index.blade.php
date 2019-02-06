@extends('layouts.app')

@section('title', $service->title)
@section('description', $service->description)
@push('og')
<meta property="og:title" content="{{ $service->title }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->getUri() }}">
@if ($service->image)
    <meta property="og:image" content="{{ asset(str_replace('.svg', '.jpg', $service->image->path)) }}">
@else
    <meta property="og:image" content="{{ asset('img/logo_green.jpg') }}">
@endif
    <meta property="og:description" content="{{ $service->description }}">
    <meta property="og:site_name" content="Веб-студия Красбер в Симферополе и Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush
@section('content')

    @if ($service->image)
        @include('layouts.partials.header_with_image', ['page' => $service, 'parent' => $service->parent ? $service->parent->alias : false, 'name' => $service->parent ? $service->parent->menu_name : false])
    @else
        @include('layouts.partials.header', ['page' => $service, 'parent' => $service->parent ? $service->parent->alias : false, 'name' => $service->parent ? $service->parent->menu_name : false])
    @endif

    <main>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    {!! $service->text !!}
                    @if ($service->is_showed_dev_stages)
                    <div class="list__items develop__steps">
                        <div class="list__items-item">
                            <div class="title">Звоните или пишите нам</div>
                            <div class="text">
                                <p>Наш специалист проконсультирует по интересующему вас виду сайта. Если вы еще не знаете, с чего начать, менеджер подскажет вам и даст рекомендации исходя из специфики бизнеса.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>1</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-01">
                                        <use xlink:href="./img/symbols.svg#de-01"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Бриф</div>
                            <div class="text">
                                <p>Этап брифинга - это сбор информации о вашем бизнесе. Кроме названия компании и основных услуг для нас важно: каким вы представляете будущий сайт, в каком цвете, какую информацию важно донести.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>2</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-02">
                                        <use xlink:href="./img/symbols.svg#de-02"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Техническое задание</div>
                            <div class="text">
                                <p>На основе брифа наш специалист составляет техническое задание (ТЗ). ТЗ необходимо как для дизайнера, так для программиста и копирайтера. ТЗ согласовывается до начала работы, ведь именно по этому документу будет проверяться правильность и полнота выполненных работ.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>3</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-03">
                                        <use xlink:href="./img/symbols.svg#de-03"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Дизайн</div>
                            <div class="text">
                                <p>На этом этапе создается внешний вид сайта: общий цвет, вид меню, расположение блоков на страницах, иконки и графические элементы, уникальные фишки. Дизайн создается на основе поведенческих факторов и предпочтений целевой аудитории вашего бизнеса.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>4</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-04">
                                        <use xlink:href="./img/symbols.svg#de-04"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Согласование</div>
                            <div class="text">
                                <p>Этап согласования макета дизайна обычно не занимает много времени. В этот промежуток вносятся мелкие корректировки в дизайн страниц. Согласование дизайна требует максимального участия заказчика, т.к. в дальнейшем изменить дизайн будет сложно.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>5</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-05">
                                        <use xlink:href="./img/symbols.svg#de-05"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Разработка</div>
                            <div class="text">
                                <p>Макеты страниц переходят к новому специалисту - программист, именно он из картинки сделает полноценный работающий сайт. Разработка может занимать от 1 недели до 2 месяцев в зависимости от сложности реализации проекта.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>6</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-06">
                                        <use xlink:href="./img/symbols.svg#de-06"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Тестирование</div>
                            <div class="text">
                                <p>Перед сдачей сайта его тестирует на правильность работы. Именно сейчас будут исправляться возможные ошибки, делаться доработки, пока все пункты ТЗ не будут выполнены. Обычно тестирование занимает до 5 дней.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>7</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-07">
                                        <use xlink:href="./img/symbols.svg#de-07"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Сдача проекта и обучение</div>
                            <div class="text">
                                <p>После тщательной проверки правильной работы ресурса мы передаем сайт заказчику и прилагаем инструкцию. В инструкции описаны все ключевые моменты по внесению изменений в текстовую часть сайта.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>8</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-08">
                                        <use xlink:href="./img/symbols.svg#de-08"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="list__items-item">
                            <div class="title">Сопровождение</div>
                            <div class="text">
                                <p>Для того, чтобы новый сайт начал приносить прибыль его необходимо рекламировать: запустить контекст, сделать сео-оптимизацию, заказать продвижение. Не стоит откладывать это в долгий ящик, а сразу договориться о рекламе после запуска.</p>
                            </div>
                            <div class="decor">
                                <div class="decor__number"><span>9</span></div>
                                <div class="decor__line"></div>
                                <div class="decor__icon">
                                    <svg class="icon de-09">
                                        <use xlink:href="./img/symbols.svg#de-09"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @include('layouts.forms.order', [
        'form_title' => 'Заказать консультацию',
        'form_sub_title' => 'Вы можете получить консультацию по услуге ' . mb_strtolower($service->name) . '. Вас это ни к чему не обязывает'
    ])

    @if (count($service->relatedServices))
        <section class="services_list-box">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <h4 class="as__h1 center">Что заказывают вместе с услугой «{{ mb_strtolower($service->menu_name) }}»</h4>
                        <div class="list__items">
                            @foreach ($service->relatedServices as $relatedService)
                                <div class="list__items-item4">
                                    <a href="{{ route('service.show', ['alias' => $relatedService->alias]) }}">
                                        <svg class="icon {{ $relatedService->icon }}">
                                            <use xlink:href="./img/symbols.svg#{{ $relatedService->icon }}"></use>
                                        </svg>
                                    </a>
                                    <a href="{{ route('service.show', ['alias' => $relatedService->alias]) }}" class="title">{{ $relatedService->name }}</a>
                                    {!! preg_replace('#<ul[^.]*<\/ul>#', '', $relatedService->preview) !!}
                                    <div class="price">{{ $relatedService->getPrice() }}</div>
                                    <a href="{{ route('service.show', ['alias' => $relatedService->alias]) }}" class="btn_style-two">Подробнее</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
