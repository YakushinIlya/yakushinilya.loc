@extends('admin.app')

@section('content')
    <a href="{{route('admin.category.add')}}" class="btn btn-orange text-white mb-3">Добавить категорию</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($categories)
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                        <tr>
                            <th class="cell">#id</th>
                            <th class="cell">Заголовок</th>
                            <th class="cell">URL</th>
                            <th class="cell">Префикс</th>
                            <th class="cell">Parent</th>
                            <th class="cell">Act.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="cell">{{$category["id"]}}</td>
                                <td class="cell">{{$category["category_head"]}}</td>
                                <td class="cell">{{$category["category_url_address"]}}</td>
                                <td class="cell">{{$category["category_url_prefix"]}}</td>
                                <td class="cell">{{$category["category_parent"]}}</td>
                                <td class="cell text-center">
                                    <a href="{{route('admin.category.edit', ['id'=>$category["id"]])}}" class="btn-sm btn-warning btn-block mb-2">Редактировать</a>
                                    <form action="{{route('admin.category.drop', ['id'=>$category["id"]])}}" method="POST">
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

                {!! $categories->links() !!}
            @else
                <div class="alert alert-warning">Ничего не найдено</div>
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
