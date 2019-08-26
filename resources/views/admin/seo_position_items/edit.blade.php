@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.seo_positions.index') }}">Seo-позиции</a></li>
    <li><a href="{{ route('admin.seo_position_items.index', ['seoPosition' => $seoPositionItem->seoPosition->id]) }}">{{ $seoPositionItem->seoPosition->domain }}</a></li>
    <li class="active">Запросы</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования запроса</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.seo_position_items.update', ['id' => $seoPositionItem->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="se">Поисковая система:</label>
                            <select class="form-control border-blue border-xs select-search" id="se" name="se" data-width="100%">
                                <option value="yandex" {{ $seoPositionItem->se === 'yandex' ? 'selected': '' }}>Yandex</option>
                                <option value="google" {{ $seoPositionItem->se === 'google' ? 'selected': '' }}>Google</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @input(['name' => 'value', 'label' => 'Позиция', 'entity' => $seoPositionItem])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        @input(['name' => 'query', 'label' => 'Запрос', 'entity' => $seoPositionItem])
                        @submit_btn()
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
