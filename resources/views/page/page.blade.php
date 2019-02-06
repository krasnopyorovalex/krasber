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

@section('content')

    @if ($page->image)
        @include('layouts.partials.header_with_image', ['page' => $page])
     @else
        @include('layouts.partials.header', ['page' => $page])
    @endif

    <main>
        <div class="container">
            <div class="row">
                <div class="col-10">
                   {!! $page->text !!}
                </div>
            </div>
        </div>
    </main>

@endsection
