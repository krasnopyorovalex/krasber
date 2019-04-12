@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@section('canonical', route('page.show', ['alias' => request('alias')]))
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset('img/logo_green.jpg') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Веб-студия Красбер в Симферополе и Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush
@section('content')

    @include('layouts.partials.header_with_image', ['page' => $page])

    <main>
        <div class="container">
            <div class="row">
                <div class="col-10">
                   {!! $page->text !!}
                </div>
            </div>
        </div>
    </main>

    @if ($articles->count())
    <section itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost" class="articles__list">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    @foreach ($articles as $article)
                        <article>
                            @if ($article->image)
                            <div itemscope="" itemprop="image" itemtype="http://schema.org/ImageObject" class="image">
                                <figure class="is__loaded">
                                    <a href="{{ $article->url }}">
                                        <img itemprop="url contentUrl" src="" data-src="{{ asset($article->image->path) }}" alt="{{ $article->image->alt }}" title="{{ $article->image->title }}">
                                        <meta itemprop="url" content="{{ asset($article->image->path) }}">
                                        <meta itemprop="width" content="319">
                                        <meta itemprop="height" content="216">
                                    </a>
                                </figure>
                            </div>
                            @endif
                            <div itemprop="articleBody" class="preview">
                                <time itemprop="datePublished" datetime="{{ $article->published_at->format('c') }}">
                                    {{ $article->published_at->formatLocalized('%d %b %Y') }} г.
                                </time>
                                <a itemprop="headline" href="{{ $article->url }}" class="name">{{ $article->name }}</a>
                                {!! $article->preview !!}
                                <a href="{{ $article->url }}" class="btn_style-two">читать подробнее</a>
                            </div>
                        </article>
                    @endforeach

                    <div class="center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @include('layouts.forms.subscribe')
@endsection
