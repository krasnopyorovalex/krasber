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
    <meta property="og:image" content="{{ asset('img/visitka.png') }}">
    <meta property="og:image:width" content="529" />
    <meta property="og:image:height" content="243" />
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
                <div class="col-12">
                    {!! $service->text !!}
                </div>
            </div>
        </div>
    </main>

    @if ($service->is_showed_dev_stages)
        <section class="develop">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="develop-steps">
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">01</span>
                                    <img src="{{ asset('img/ds-01.svg') }}" alt="">
                                </div>
                                <p>Обсуждение проекта с менеджером и составление детального ТЗ</p>
                            </div>
                            <div class="line-separate"></div>
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">02</span>
                                    <img src="{{ asset('img/ds-02.svg') }}" alt="">
                                </div>
                                <p>Согласование и заключение официального договора</p>
                            </div>
                            <div class="line-separate"></div>
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">03</span>
                                    <img src="{{ asset('img/ds-03.svg') }}" alt="">
                                </div>
                                <p>Создание прототипа и отрисовка дизайна сайта</p>
                            </div>
                            <div class="line-separate"></div>
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">04</span>
                                    <img src="{{ asset('img/ds-04.svg') }}" alt="">
                                </div>
                                <p>Согласование и утверждение макета дизайна</p>
                            </div>
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">05</span>
                                    <img src="{{ asset('img/ds-05.svg') }}" alt="">
                                </div>
                                <p>Профессиональная вёрстка и подключение CMS</p>
                            </div>
                            <div class="line-separate"></div>
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">06</span>
                                    <img src="{{ asset('img/ds-06.svg') }}" alt="">
                                </div>
                                <p>Тестирование и финальные согласования проекта</p>
                            </div>
                            <div class="line-separate"></div>
                            <div class="develop-steps-item">
                                <div class="develop-steps-item-circle">
                                    <span class="step-number">07</span>
                                    <img src="{{ asset('img/ds-07.svg') }}" alt="">
                                </div>
                                <p>Сдача проекта и сопровождение</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('layouts.forms.order', [
        'form_title' => 'Заказать консультацию',
        'form_sub_title' => 'Вы можете получить консультацию по услуге ' . mb_strtolower($service->name) . '. Вас это ни к чему не обязывает'
    ])

    @if (count($service->relatedServices))
        <section class="services_list-box">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="as__h1 center">Что заказывают вместе с услугой «{{ mb_strtolower($service->menu_name) }}»</h4>
                        <div class="list__items">
                            @foreach ($service->relatedServices as $relatedService)
                                <div class="list__items-item4">
                                    <a href="{{ route('service.show', ['alias' => $relatedService->alias]) }}" class="title">{{ $relatedService->menu_name ?: $relatedService->name }}</a>
                                    <div class="price">{!! $relatedService->getPrice() !!}</div>
                                    <div class="body">
                                        {!! preg_replace('#<ul[^.]*<\/ul>#', '', $relatedService->preview) !!}
                                    </div>
                                    <div class="btn-box">
                                        <a href="{{ route('service.show', ['alias' => $relatedService->alias]) }}" class="btn btn-green">Подробнее</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
