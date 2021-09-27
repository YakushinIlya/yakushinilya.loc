@extends('admin.app')

@section('content')
    <a href="{{route('admin.navigation.add')}}" class="btn btn-orange text-white mb-3">Добавить элемент</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($navigations)
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                        <tr>
                            <th class="cell">#id</th>
                            <th class="cell">Range</th>
                            <th class="cell">Заголовок</th>
                            <th class="cell">URL</th>
                            <th class="cell">CLASS</th>
                            <th class="cell">SVG/ICON</th>
                            <th class="cell">Target</th>
                            <th class="cell">Location</th>
                            <th class="cell">Parent</th>
                            <th class="cell">Act.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($navigations as $navigation)
                            <tr>
                                <td class="cell">{{$navigation["id"]}}</td>
                                <td class="cell">{{$navigation["range"]}}</td>
                                <td class="cell">{{$navigation["head"]}}</td>
                                <td class="cell">{{$navigation["route"]}}</td>
                                <td class="cell">{{$navigation["class"]}}</td>
                                <td class="cell">{!! $navigation["svg"]??$navigation["icon"] !!}</td>
                                <td class="cell">{{$navigation["target"]}}</td>
                                <td class="cell">{{$navigation["location"]}}</td>
                                <td class="cell">{{$navigation["parent"]}}</td>
                                <td class="cell text-center">
                                    <a href="{{route('admin.navigation.edit', ['id'=>$navigation["id"]])}}" class="btn-sm btn-warning btn-block mb-2">Редактировать</a>
                                    <form action="{{route('admin.navigation.drop', ['id'=>$navigation["id"]])}}" method="POST">
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

                {!! $navigations->links() !!}
            @else
                <div class="alert alert-warning">Ничего не найдено</div>
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
