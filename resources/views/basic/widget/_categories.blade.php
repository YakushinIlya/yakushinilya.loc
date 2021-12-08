<ul>
    @foreach(App\Models\Categories::all() as $category)
        <li>
            <a href="{{route('category', ['id'=>$category['id']])}}">{{$category['category_head']}}</a>
        </li>
    @endforeach
</ul>
