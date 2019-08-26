@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Seo-позиции</li>
@endsection

@section('content')

    <a href="{{ route('admin.seo_positions.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Адрес сайта</th>
                <th>Лого сайта</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="table__dnd">
            @foreach($seoPositions as $seoPosition)
                <tr data-id="{{ $seoPosition->id }}">
                    <td>
                        <div class="media-left media-middle">
                            <i class="icon-move dragula-handle"></i>
                        </div>
                    </td>
                    <td>{{ $seoPosition->domain }}</td>
                    <td>
                        @if($seoPosition->image)
                            <img src="{{ $seoPosition->image->path }}" alt="" width="100px">
                        @endif
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('admin.seo_positions.edit', $seoPosition) }}"><i class="icon-pencil7"></i></a>
                            <a href="{{ route('admin.seo_position_items.index', ['seoPosition' => $seoPosition->id]) }}" data-original-title="Позиции" data-popup="tooltip"><i class="icon-lan2"></i></a>
                            <form method="POST" action="{{ route('admin.seo_positions.destroy', $seoPosition) }}" class="form__delete">
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
    @push('scripts')
        <script src="{{ asset('dashboard/assets/js/plugins/ui/dragula.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/extension_dnd.js') }}"></script>
    @endpush
@endsection
