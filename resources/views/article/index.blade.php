@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->description)
@push('og')
<meta property="og:title" content="{{ $article->title }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($article->image->path) }}">
    <meta property="og:description" content="{!! str_replace(['\n', '\r'], '', strip_tags($article->preview)) !!}">
    <meta property="og:site_name" content="Веб-студия Красбер в Крыму и Краснодарском крае">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    @include('layouts.partials.header', ['page' => $article, 'parent' => 'blog', 'name' => 'Блог'])

    <main>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-8">
                            <article>
                                <time datetime="{{ $article->published_at->format('c') }}">
                                    {{ $article->published_at->formatLocalized('%d %b %Y') }}
                                </time>

                                <div class="content">
                                    {!! $article->preview !!}
                                    <figure>
                                        <img src="{{ asset($article->image->path) }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}">
                                    </figure>
                                    {!! $article->text !!}
                                </div>
                            </article>
                        </div>
                        <div class="col-4 hidden__xs to__bottom">
                            <div class="ad">
                                <div class="text">Реклама</div>
                            </div>
                            {{--<aside class="other__articles">--}}
                                {{--<div class="title">ЧИТАЙТЕ ПО ТЕМЕ</div>--}}
                                {{--<div class="other__articles-row">--}}
                                    {{--<div class="other__articles-image">--}}
                                        {{--<figure>--}}
                                            {{--<img src="/img/article_another.png" alt="alt">--}}
                                        {{--</figure>--}}
                                    {{--</div>--}}
                                    {{--<div class="other__articles-name">--}}
                                        {{--<div class="name">Где заказать сайт: фриланс или веб-студия</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="other__articles-row">--}}
                                    {{--<div class="other__articles-image">--}}
                                        {{--<figure>--}}
                                            {{--<img src="/img/article_another.png" alt="alt">--}}
                                        {{--</figure>--}}
                                    {{--</div>--}}
                                    {{--<div class="other__articles-name">--}}
                                        {{--<div class="name">Где заказать сайт: фриланс или веб-студия</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</aside>--}}
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

@endsection
