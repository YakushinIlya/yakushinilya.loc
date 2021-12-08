@include('basic._navigation-sidebar')
@forelse($widgets as $item)
    <section>
        <header>
            <h1 class="h4">{{$item['head_ru']}}</h1>
        </header>
        <div class="body-module">
            {!! base64_decode($item['body']) !!}
            @if(!empty($item['template']))
                @include('basic.widget.'.$item['template'])
            @endif
        </div>
    </section>
@empty
    No widget
@endforelse
