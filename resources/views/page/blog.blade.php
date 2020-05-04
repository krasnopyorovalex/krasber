@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@section('canonical', route('page.show', ['alias' => request('alias')]))
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset('img/visitka.png') }}">
    <meta property="og:image:width" content="529" />
    <meta property="og:image:height" content="243" />
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Веб-студия Красбер в Симферополе и Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush
@section('content')

    @include('layouts.partials.header_with_image', ['page' => $page])

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                   {!! $page->text !!}
                </div>
            </div>
        </div>
    </main>

    @if ($articles->count())
    <section itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="BlogPost" class="articles__list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach ($articles as $article)
                        <article>
                            @if ($article->image)
                            <div itemscope="" itemprop="image" itemtype="http://schema.org/ImageObject" class="image">
                                <figure class="{{ $loop->index > 1 ? 'is__loaded' : '' }}">
                                    <a href="{{ $article->url }}">
                                        <img itemprop="url contentUrl" src="{{ $loop->index > 1 ? '' : asset($article->image->path) }}" @if($loop->index > 1)data-src="{{ asset($article->image->path) }}"@endif alt="{{ $article->image->alt }}" title="{{ $article->image->title }}">
                                        <meta itemprop="url" content="{{ asset($article->image->path) }}">
                                        <meta itemprop="width" content="319">
                                        <meta itemprop="height" content="216">
                                    </a>
                                </figure>
                            </div>
                            @endif
                            <div itemprop="articleBody" class="preview">
                                <a href="{{ $article->url }}" class="name">{{ $article->name }}</a>
                                {!! $article->preview !!}
                                <div class="row ai_center">
                                    <div class="col-6">
                                        <a href="{{ $article->url }}" class="btn black">читать подробнее</a>
                                    </div>
                                    <div class="col-6">
                                        <div class="time-box">
                                            <time itemprop="datePublished" datetime="{{ $article->published_at->format('c') }}">
                                                {{ $article->published_at->formatLocalized('%d %b %Y') }} г.
                                            </time>
                                        </div>
                                    </div>
                                </div>
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
{{--    @include('layouts.forms.subscribe')--}}
@endsection
