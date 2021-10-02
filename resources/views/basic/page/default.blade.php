@extends('basic.app')

@section('content')
    <section>
        <header>
            <h1>{{$page['page_head']}}</h1>
        </header>
        <article>
            {!! $page['page_article'] !!}
        </article>
    </section>
@endsection
