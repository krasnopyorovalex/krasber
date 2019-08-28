@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
@if ($page->image)
    <meta property="og:image" content="{{ asset(str_replace('.svg', '.jpg', $page->image->path)) }}">
@else
    <meta property="og:image" content="{{ asset('img/logo_green.jpg') }}">
@endif
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Веб-студия Красбер в Симферополе и Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush
@section('slogan')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="row align__items-center">
                    <div class="col-5">
                        <div class="slogan__box">
                            <p>{!! $page->slogan !!}</p>
                            <a href="{{ route('page.show', ['alias' => 'quiz']) }}" class="btn black">Получить расчёт</a>
                        </div>
                        <!-- /.slogan__box -->
                    </div>
                    <div class="col-7">
                        <div class="main__image-top">
                            @if($page->image)
                            <a href="{{ route('page.show', ['alias' => 'quiz']) }}">
                                <img src="{{ asset($page->image->path) }}" alt="{{ $page->image->alt }}" title="{{ $page->image->title }}">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <section class="main__text">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>{{ $page->name }}</h1>
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </section>

    @includeWhen($services, 'layouts.sections.services', ['services' => $services])

    <section>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="order__service-form">
                        <div class="wrap">
                            <div class="desc">
                                <div class="as__h1">Заказать услугу</div>
                                <p>Вы можете бесплатно  получить аудит вашего сайта. Вас это не к чему не обязывает.</p>
                            </div>
                            @include('layouts.forms.order_service', ['services' => $services])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why__we">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h2 class="as__h1">Несколько фактов о нас</h2>
                    <div class="why__we-list">
                        <div class="why__we-list-item">
                            <svg class="icon opit_v_razrabotke">
                                <use xlink:href="{{ asset('img/symbols.svg#opit_v_razrabotke') }}"></use>
                            </svg>
                            <div class="separator"></div>
                            <div class="desc">Опыт в разработке сайтов более 5 лет</div>
                        </div>
                        <div class="why__we-list-item">
                            <svg class="icon opit">
                                <use xlink:href="{{ asset('img/symbols.svg#opit') }}"></use>
                            </svg>
                            <div class="separator"></div>
                            <div class="desc">Опыт в интернет-рекламе более 3 лет</div>
                        </div>
                        <div class="why__we-list-item">
                            <svg class="icon sertifikat">
                                <use xlink:href="{{ asset('img/symbols.svg#sertifikat') }}"></use>
                            </svg>
                            <div class="separator"></div>
                            <div class="desc">Сертифицированные специалисты Яндекс.Директ и Google.Adwords</div>
                        </div>
                        <div class="why__we-list-item">
                            <svg class="icon konsultaciya">
                                <use xlink:href="{{ asset('img/symbols.svg#konsultaciya') }}"></use>
                            </svg>
                            <div class="separator"></div>
                            <div class="desc">Бесплатные консультации и информационная поддержка спец. на всех этапах работы</div>
                        </div>
                        <div class="why__we-list-item">
                            <svg class="icon podhod">
                                <use xlink:href="{{ asset('img/symbols.svg#podhod') }}"></use>
                            </svg>
                            <div class="separator"></div>
                            <div class="desc">Индивидуальный подход и расчет стоимости для каждого клиента</div>
                        </div>
                        <div class="why__we-list-item">
                            <svg class="icon garantii">
                                <use xlink:href="{{ asset('img/symbols.svg#garantii') }}"></use>
                            </svg>
                            <div class="separator"></div>
                            <div class="desc">Юридические гарантии (составление договора)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @includeWhen($guestbook, 'layouts.sections.guestbook', ['guestbook' => $guestbook])

    <section class="portfolio">
        <div class="bg__box-section"></div>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <a href="{{ route('page.show', ['alias' => 'portfolio']) }}"><h3 class="as__h1">Новые работы нашей веб-студии</h3></a>
                    <div class="info">Работы нашей веб-студии, разработанные сайты, полезные кейсы.</div>

                    <div class="portfolio__list">

                        @foreach ($portfolios->slice(0,3) as $portfolio)
                            @include('layouts.partials._portfolio_item', ['portfolio' => $portfolio])
                        @endforeach

                        <div class="btn__more">
                            <a href="{{ route('page.show', ['alias' => 'portfolio']) }}" class="btn green">БОЛЬШЕ РАБОТ</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="we__work">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h3 class="as__h1">Мы работаем</h3>
                    <div class="info">Инструменты, которые мы используем для анализа и увеличения эффективности работы сайта.</div>
                    <div class="we__work-list">
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/php-logo.svg') }}" alt="php" title="Язык программирования - PHP">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/laravel-framework.svg') }}" alt="Laravel framework" title="Laravel фреймворк">
                            <img src="{{ asset('img/logotype.min.svg') }}" alt="Laravel framework" title="Laravel фреймворк">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/yii-framework.svg') }}" alt="Yii framework" title="Yii фреймворк">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/css3.svg') }}" alt="CSS3" title="Язык описания внешнего вида документа - css">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/javascript.svg') }}" alt="javascript" title="Язык программирования - Javascript">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/we_work-01.png') }}" alt="Яндекс.Метрика" title="Бесплатный инструмент аналитики от Яндекс">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/we_work-02.jpg') }}" alt="Яндекс.Директ" title="Онлайн реклама в поиске Яндекс">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/we_work-03.jpeg') }}" alt="Google.Adwords" title="Онлайн реклама в поиске Google">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/we_work-04.png') }}" alt="Google.Analytics" title="Google.Analytics - детальная статистика посещения Вашего веб-сайта">
                        </div>
                        <div class="we__work-list-item">
                            <img src="{{ asset('img/we_work-05.png') }}" alt="Topvisor" title="Topvisor - сервис поисковой аналитики">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main__text">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h2>Наши преимущества в создании сайтов</h2>
                    <p>Цель нашей работы – стать для Вас надежным партнером. Мы делаем сайты в Крыму и мы умеем это делать! В нашей команде работают специалисты с опытом более 5 лет в сфере создания сайтов, интернет-маркетинга и продвижения услуг в интернете. Именно поэтому, обращаясь в веб-студию «Красбер», Вы получаете полный спектр услуг:</p>

                    <ul>
                        <li>проектирование и дизайн,</li>
                        <li>разработка и продвижение,</li>
                        <li>поддержка и сопровождение.</li>
                    </ul>

                    <p>В нашем портфолио имеются, как корпоративные сайты, так лендинги и внутренние проекты. Мы активно развиваемся, проходим повышение квалификации, поднимаем качество услуг и следим за изменениями трендов. Уже на этапе разработки и проектирования используем уникальные фишки и техники, чтобы в дальнейшем облегчить Вам работу по администрированию сайта и сделать его дружелюбным для поисковых систем Яндекс и Google.</p>
                    <p>Стоимость создания сайта различна в зависимости от наполнения сайта и структуры. Мы разрабатываем быстрые и бюджетные варианты, а также уникальные и сложные проекты. На начальном этапе сбора информации от заказчика (брифинга) становится понятным запрос. Менеджер нашей студии всегда предложит несколько вариантов решений и поможет подобрать оптимальный, подходящий под Ваши пожелания и задачу. Мы рассчитаем для Вас цену создания сайта на заказ, а также более недорогого проекта. Помните, Вы всегда можете персонализировать сайт за счет уникальной информации, графических элементов, корпоративных цветов, ярких и неповторимых фотографий. По завершению работы мы предоставляем инструкцию для самостоятельной работы с сайтом и рекомендации по дальнейшему продвижению.</p>
                    <h2>Позвоните или оставьте заявку - создадим вместе сайт для Вашего бизнеса в Крыму!</h2>
                    <p>Создать сайт в Симферополе – легко и надежно. Менеджер веб-студии проработает для Вас концепцию сайта и варианты рекламы, после чего работа выполняется в кратчайшие сроки. Вы всегда можете сократить время на личную встречу и связаться с нами через популярные мессенджеры или электронную почту.  Если вы еще не определились с моделью сайта, оставляйте заявку на бесплатную консультацию.  Для этого заполните свои контакты в форме ниже, и мы свяжемся с Вами в течение 24 часов.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="order__service-form">
                        <div class="wrap">
                            <div class="desc">
                                <div class="as__h1">Заказать услугу</div>
                                <p>Вы можете бесплатно  получить аудит вашего сайта. Вас это не к чему не обязывает.</p>
                            </div>
                            @include('layouts.forms.order_service', ['services' => $services, 'postfix' => '_bottom'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
