@extends('admin.app')

@section('content')
    <a href="{{route('admin.widget.add')}}" class="btn btn-orange text-white mb-3">Добавить виджет</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($widgets)
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                        <tr>
                            <th class="cell">#id</th>
                            <th class="cell">Range</th>
                            <th class="cell">Заголовок</th>
                            <th class="cell">Location</th>
                            <th class="cell">Template</th>
                            <th class="cell">Act.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($widgets as $widget)
                            <tr>
                                <td class="cell">{{$widget["id"]}}</td>
                                <td class="cell">{{$widget["range"]}}</td>
                                <td class="cell">{{$widget["head_ru"]??$widget["head_en"]}}</td>
                                <td class="cell">{{$widget["location"]}}</td>
                                <td class="cell">{{config('customAdmin.widgetTemplate')[$widget["template"]]??'null'}}</td>
                                <td class="cell text-center">
                                    <a href="{{route('admin.widget.edit', ['id'=>$widget["id"]])}}" class="btn-sm btn-warning btn-block mb-2">Редактировать</a>
                                    <form action="{{route('admin.widget.drop', ['id'=>$widget["id"]])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-sm btn-danger btn-block">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--//table-responsive-->

                {!! $widgets->links() !!}
            @else
                <div class="alert alert-warning">Ничего не найдено</div>
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
