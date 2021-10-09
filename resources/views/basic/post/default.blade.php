@extends('basic.app')

@section('content')
    <section>
        <header>
            <h1>{{$post['post_head']}}</h1>
        </header>
        <article>
            @if(!empty($post['post_photo']))
                <img src="{{$post['post_photo']}}" alt="{{$post['post_head']}}">
            @endif
            {!! $post['post_article'] !!}
        </article>
    </section>
@endsection
