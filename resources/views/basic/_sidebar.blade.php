@include('basic._navigation-sidebar')
@forelse($widgets as $item)
    <section>
        <header>
            <h1>{{$item['head']}}</h1>
        </header>
        <div class="body-module">
            {!! $item['body'] !!}
        </div>
    </section>
@empty
    No widget
@endforelse
