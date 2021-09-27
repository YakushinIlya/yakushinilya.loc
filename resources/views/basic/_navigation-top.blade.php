@forelse($navMenuTop as $item)
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{$item['route']}}">{{$item['head']}}</a>
    </li>
@empty
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="https://vk.com/yakushinilya">Автор в ВК</a>
    </li>
@endforelse
