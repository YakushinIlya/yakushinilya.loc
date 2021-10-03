@extends('admin.app')

@section('content')
    <div class="app-card app-card-orders-table shadow-sm mb-5 p-4">
        <div class="app-card-body">
            <form class="settings-form" method="post" action="{{route('admin.post.edit', ['id'=>$post['id']])}}">
                @method('PUT')
                @csrf
                    <label for="setting-input-1" class="form-label">Заголовок</label>
                    <input type="text" name="post_head" class="form-control" id="setting-input-1" value="{{$post['post_head']}}" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">URL адрес</label>
                    <input type="text" name="post_url_address" class="form-control" value="{{$post['post_url_address']}}" id="setting-input-2">
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">URL префикс</label>
                    <input type="text" name="post_url_prefix" class="form-control" value="{{$post['post_url_prefix']}}" id="setting-input-3">
                </div>
                <div class="mb-3">
                    <label for="setting-input-4" class="form-label">Содержимое статьи</label>
                    <textarea name="post_article" rows="7" style="height: 150px;" class="form-control" id="setting-input-4">{{base64_decode($post['post_article'])}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="setting-input-5" class="form-label">TITLE</label>
                    <input type="text" name="post_title" class="form-control" value="{{$post['post_title']}}" id="setting-input-5">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Description</label>
                    <input type="text" name="post_description" class="form-control" value="{{$post['post_description']}}" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Keywords</label>
                    <input type="text" name="post_keywords" class="form-control" value="{{$post['post_keywords']}}" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-7" class="form-label">Шаблон статьи</label>
                    <select name="post_template" class="form-control" id="setting-input-7" required>
                        @foreach(config('customAdmin.postTemplate') as $k => $v)
                            <option value="{{$k}}" @if($post['post_template']==$k) selected @endif>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn app-btn-primary">Сохранить</button>
            </form>
        </div><!--//app-card-body-->
    </div>
@endsection
