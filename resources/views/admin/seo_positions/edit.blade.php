@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.seo_positions.index') }}">Seo-позиции</a></li>
    <li class="active">Форма редактирования seo-позиции</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования seo-позиции</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.seo_positions.update', ['id' => $seoPosition->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-12">
                        @input(['name' => 'domain', 'label' => 'Название', 'entity' => $seoPosition])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if ($seoPosition->image)
                            <div class="panel panel-flat border-blue border-xs" id="image__box">
                                <div class="panel-body">
                                    <img src="{{ asset($seoPosition->image->path) }}" alt="" class="upload__image">

                                    <div class="btn-group btn__actions">
                                        <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                        <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $seoPosition->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $seoPosition, 'label' => 'Выберите изображение на компьютере'])
                        @submit_btn()
                    </div>
                </div>
            </form>

        </div>
    </div>
    @if ($seoPosition->image)
        @include('layouts.partials._image_attributes_popup', ['image' => $seoPosition->image])
    @endif
@endsection
