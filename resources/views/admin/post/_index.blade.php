@extends('admin.app')

@section('content')
    <a href="{{route('admin.post.add')}}" class="btn btn-orange text-white mb-3">Добавить статью</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($posts)
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
                        @foreach($posts as $post)
                            <tr>
                                <td class="cell">{{$post["id"]}}</td>
                                <td class="cell">{{$post["post_head"]}}</td>
                                <td class="cell">
                                    <a href="/blog/{{$post["post_url_address"]}}{{$post["post_url_prefix"]?'.'.$post["post_url_prefix"]:''}}" target="_blank">
                                        {{$post["post_url_address"]}}{{$post["post_url_prefix"]?'.'.$post["post_url_prefix"]:''}}
                                    </a>
                                </td>
                                <td class="cell">{{$post["post_title"]}}</td>
                                <td class="cell">{{$post["post_template"]}}</td>
                                <td class="cell text-center">
                                    <a href="{{route('admin.post.edit', ['id'=>$post["id"]])}}" class="btn-sm btn-warning btn-block mb-2">Редактировать</a>
                                    <form action="{{route('admin.post.drop', ['id'=>$post["id"]])}}" method="POST">
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

                {!! $posts->links() !!}
            @else
                <div class="alert alert-warning">Ничего не найдено</div>
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
