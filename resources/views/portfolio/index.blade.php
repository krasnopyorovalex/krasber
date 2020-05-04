@extends('layouts.app')

@section('title', $portfolio->title)
@section('description', $portfolio->description)
@push('og')
    <meta property="og:title" content="{{ $portfolio->title }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($portfolio->image->path) }}">
    <meta property="og:description" content="{{ $portfolio->description }}">
    <meta property="og:site_name" content="Веб-студия Красбер в Симферополе и Крыму">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    @include('layouts.partials.header', ['page' => $portfolio, 'parent' => 'portfolio', 'name' => 'Портфолио'])

    @if ($portfolio->tags)
    <section class="tags">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tags black">
                        @foreach ($portfolio->tags as $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                   {!! $portfolio->text !!}
                </div>
            </div>
        </div>
    </main>

    @if ($portfolio->site_url)
    <section class="grey">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="btn__link-project">
                        {{ $portfolio->site_url }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="portfolio__nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-only-6 center">
                            @if ($prev)
                                <a class="prev__project" href="{{ route('portfolio.show', ['alias' => $next->alias]) }}">
                                    Предыдущий проект
                                </a>
                            @endif
                        </div>
                        <div class="col-only-6 center">
                            @if ($next)
                                <a class="next__project" href="{{ route('portfolio.show', ['alias' => $prev->alias]) }}">
                                    Следующий проект
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.forms.order', ['form_title' => $portfolio->form_title, 'form_sub_title' => $portfolio->form_sub_title])

@endsection
