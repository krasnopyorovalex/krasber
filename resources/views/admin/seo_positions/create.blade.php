@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.seo_positions.index') }}">Seo-позиции</a></li>
    <li class="active">Форма добавления seo-позиции</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления seo-позиции</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.seo_positions.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @input(['name' => 'domain', 'label' => 'Адрес сайта'])

                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                @submit_btn()
            </form>

        </div>
    </div>
@endsection
