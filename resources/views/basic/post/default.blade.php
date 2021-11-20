@extends('basic.app')

@section('content')
    <section>
        <header>
            <h1 class="h4">{{$post['post_head']}}</h1>
        </header>
        <article>
            @if(!empty($post['post_photo']))
                <img src="{{$post['post_photo']}}" alt="{{$post['post_head']}}" class="img-fluid first-image-post">
            @endif
           {!! base64_decode($post['post_article']) !!}
        </article>
    </section>
@endsection
