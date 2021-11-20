@extends('basic.app')

@section('content')
    <section>
        <header>
            <h1 class="h4">{{$page['page_head']}}</h1>
        </header>
        <article>
            {!! base64_decode($page['page_article']) !!}
        </article>
    </section>
@endsection
