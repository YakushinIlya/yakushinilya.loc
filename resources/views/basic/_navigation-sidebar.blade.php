@isset($sidebarMenu)
    @forelse($sidebarMenu as $item)
        <section>
            <header>
                <h1>{{$item['head']}}</h1>
            </header>
            <div class="body-module">
                <ul>
                    @foreach($item['list'] as $itemList)
                        <li>
                            <a href="{{$itemList['route']}}">{{$itemList['head']}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @empty

    @endforelse
@endisset
