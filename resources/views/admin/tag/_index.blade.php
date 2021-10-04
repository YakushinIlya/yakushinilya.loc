@extends('admin.app')

@section('content')
    <a href="{{route('admin.tag.add')}}" class="btn btn-orange text-white mb-3">Добавить тег</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($tags)
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                        <tr>
                            <th class="cell">#id</th>
                            <th class="cell">Заголовок</th>
                            <th class="cell">URL</th>
                            <th class="cell">Префикс</th>
                            <th class="cell">Act.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td class="cell">{{$tag["id"]}}</td>
                                <td class="cell">{{$tag["tags_head"]}}</td>
                                <td class="cell">{{$tag["tags_url_address"]}}</td>
                                <td class="cell">{{$tag["tags_url_prefix"]}}</td>
                                <td class="cell text-center">
                                    <a href="{{route('admin.tag.edit', ['id'=>$tag["id"]])}}" class="btn-sm btn-warning btn-block mb-2">Редактировать</a>
                                    <form action="{{route('admin.tag.drop', ['id'=>$tag["id"]])}}" method="POST">
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

                {!! $tags->links() !!}
            @else
                <div class="alert alert-warning">Ничего не найдено</div>
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
