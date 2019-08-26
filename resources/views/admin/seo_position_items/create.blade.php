@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.seo_positions.index') }}">Seo-позиции</a></li>
    <li><a href="{{ route('admin.seo_position_items.index', ['seoPosition' => $seoPosition->id]) }}">{{ $seoPosition->domain }}</a></li>
    <li class="active">Запросы</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления запроса</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.seo_position_items.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="seo_position_id" value="{{ $seoPosition->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="se">Поисковая система:</label>
                            <select class="form-control border-blue border-xs select-search" id="se" name="se" data-width="100%">
                                <option value="yandex">Yandex</option>
                                <option value="google">Google</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @input(['name' => 'value', 'label' => 'Позиция'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        @input(['name' => 'query', 'label' => 'Запрос'])
                        @submit_btn()
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
