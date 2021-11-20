@extends('basic.app')

@section('content')
    @isset($content['posts'])
        <section>
            <header>
                <h1 class="h4">Новые записи блога</h1>
            </header>
            <article class="row justify-content-center">
                @forelse($content['posts'] as $post)
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card bg-dark bg-gradient h-100">
                            <div class="image-post">
                                <a href="{{route('post', ['route'=>$post['post_url_address'] . ($post["post_url_prefix"]?'.'.$post["post_url_prefix"]:'')])}}">
                                    <img src="{{$post['post_photo']??'/media/img/no-photo.png'}}" class="card-img-top" alt="{{$post['post_head']}}">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('post', ['route'=>$post['post_url_address'] . ($post["post_url_prefix"]?'.'.$post["post_url_prefix"]:'')])}}">
                                    <h2 class="h6 card-title">{{Str::limit($post['post_head'], 100, '...')}}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    Не найдено новых записей
                @endforelse
                    <div class="col-12 mt-3">
                        <a href="{{route('blog')}}" class="btn btn-block btn-orange">Смотреть все записи блога</a>
                    </div>
            </article>
        </section>

        <section class="mt-3">
            <article class="row">
                Тестовый текст
            </article>
        </section>
    @endisset
@endsection
