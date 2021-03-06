@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->description)
@push('og')
<meta property="og:title" content="{{ $article->title }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ $article->image ? asset($article->image->path) : asset('img/visitka.png') }}">
    <meta property="og:description" content="{!! str_replace(['\n', '\r'], '', strip_tags($article->preview)) !!}">
    <meta property="og:site_name" content="Веб-студия Красбер в Симферополе и Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    @include('layouts.partials.header', ['page' => $article, 'parent' => 'blog', 'name' => 'Блог', 'schema' => true])

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <article itemscope itemtype="http://schema.org/NewsArticle">
                                <time datetime="{{ $article->published_at->format('c') }}">
                                    {{ $article->published_at->formatLocalized('%d %b %Y') }} г.
                                </time>
                                <meta itemprop="identifier" content="{{ $article->id }}">
                                <meta itemprop="datePublished" content="{{ $article->published_at->format('c') }}" />

                                <div class="content" itemprop="articleBody">
                                    {!! $article->preview !!}
                                    @if($article->image)
                                    <figure>
                                        <img src="{{ asset($article->image->path) }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}">
                                    </figure>
                                    @endif
                                    {!! $article->text !!}
                                </div>
                            </article>
                        </div>
                        <div class="col-4 hidden__xs to__bottom">
                            <div class="ad">
                                <div class="ads__carousel owl-carousel owl-theme">
                                    <img src="{{ asset('img/banner-01.png') }}" alt="Контекстная реклама" title="Заказать бесплатную настройку контекстной рекламы" class="call__popup" data-service="Контекстная реклама">
                                    <img src="{{ asset('img/banner-02.png') }}" alt="Бесплатный аудит сайта" title="Заказать бесплатный аудит сайта" class="call__popup" data-service="Юзабили аудит">
                                </div>
                            </div>
                            <aside class="other__articles">
                                <div class="title">Последние наши работы</div>
                                @foreach($latestPortfolios as $latestPortfolio)
                                <div class="other__articles-row">
                                    <div class="other__articles-image">
                                        @if($latestPortfolio->image)
                                        <a href="{{ $latestPortfolio->url }}">
                                            <figure>
                                                <img src="{{ $latestPortfolio->image->path }}" alt="{{ $latestPortfolio->image->alt }}" title="{{ $latestPortfolio->image->title }}">
                                            </figure>
                                        </a>
                                        @endif
                                    </div>
                                    <div class="other__articles-name">
                                        <a href="{{ $latestPortfolio->url }}" class="name">{{ $latestPortfolio->name }}</a>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-only-6 center">
                            @if ($prev)
                            <a href="{{ route('article.show', $prev->alias) }}" class="prev__project">
                                {{ $prev->name }} <span data-text="Предыдущая статья"></span>
                            </a>
                            @endif
                        </div>
                        <div class="col-only-6 center">
                            @if ($next)
                            <a href="{{ route('article.show', $next->alias) }}" class="next__project">
                                {{ $next->name }} <span data-text="Следующая статья"></span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.forms.order', [
        'form_title' => 'Появились вопросы?',
        'form_sub_title' => 'Если Вы не нашли необходимой информации в статье, оставьте завявку и наш менеджер свяжется с Вами в течение 24 часов',
        'btn_text' => 'Задать вопрос'
    ])


<div class="popup">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="order__service-form">
                    <div class="close__box" title="Закрыть форму">
                        <svg class="icon close">
                            <use xlink:href="{{ asset('img/symbols.svg#close') }}"></use>
                        </svg>
                    </div>
                    <div class="wrap">
                        <div class="desc">
                            <div class="as__h1">Заказать услугу</div>
                            <p>Вы можете бесплатно  получить аудит вашего сайта.<br />Вас это ни к чему не обязывает.</p>
                        </div>
                        @include('layouts.forms.order_service', ['postfix' => '-banner'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup__show-bg"></div>

@endsection
