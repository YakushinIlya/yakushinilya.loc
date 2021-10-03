@extends('basic.app')

@section('content')
    <section>
        <header>
            <h1>{{$post['post_head']}}</h1>
        </header>
        <article>
            {!! $post['post_article'] !!}
        </article>
    </section>
@endsection
