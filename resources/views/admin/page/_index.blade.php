@extends('admin.app')

@section('content')
    <a href="{{route('admin.page.add')}}" class="btn btn-orange text-white mb-3">Добавить страницу</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($pages)
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                        <tr>
                            <th class="cell">#id</th>
                            <th class="cell">Заголовок</th>
                            <th class="cell">URL</th>
                            <th class="cell">Title</th>
                            <th class="cell">Шаблон</th>
                            <th class="cell">Act.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td class="cell">{{$page["id"]}}</td>
                                <td class="cell">{{$page["page_head"]}}</td>
                                <td class="cell">{{$page["page_url_address"]}}{{$page["page_url_prefix"]?'.'.$page["page_url_prefix"]:''}}</td>
                                <td class="cell">{{$page["page_title"]}}</td>
                                <td class="cell">{{$page["page_template"]}}</td>
                                <td class="cell text-center">
                                    <a href="{{route('admin.page.edit', ['id'=>$page["id"]])}}" class="btn-sm btn-warning btn-block mb-2">Редактировать</a>
                                    <form action="{{route('admin.page.drop', ['id'=>$page["id"]])}}" method="POST">
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

                {!! $pages->links() !!}
            @else
                <div class="alert alert-warning">Ничего не найдено</div>
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
