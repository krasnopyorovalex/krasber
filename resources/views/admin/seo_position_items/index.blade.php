@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.seo_positions.index') }}">SEO-позиции</a></li>
    <li class="active">{{ $seoPosition->domain }}</li>
@endsection

@section('content')

    <a href="{{ route('admin.seo_position_items.create', ['seoPosition' => $seoPosition]) }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table seo_table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Запрос</th>
                <th>Позиция</th>
                <th>ПС</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($seoPositionItems as $seoPositionItem)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td><span class="label label-default">{{ $seoPositionItem->query }}</span></td>
                    <td><span class="label label-success">{{ $seoPositionItem->value }}</span></td>
                    <td>
                        <svg class="icon">
                            <use xlink:href="{{ asset('img/symbols.svg#' . $seoPositionItem->se) }}"></use>
                        </svg>
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('admin.seo_position_items.edit', $seoPositionItem) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.seo_position_items.destroy', $seoPositionItem) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
