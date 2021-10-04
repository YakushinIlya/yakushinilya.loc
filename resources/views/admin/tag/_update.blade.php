@extends('admin.app')

@section('content')
    <div class="app-card app-card-orders-table shadow-sm mb-5 p-4">
        <div class="app-card-body">
            <form class="settings-form" method="post" action="{{route('admin.tag.edit', ['id'=>$tags['id']])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Заголовок</label>
                    <input type="text" name="tags_head" class="form-control" id="setting-input-1" value="{{$tags['tags_head']}}" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">URL адрес</label>
                    <input type="text" name="tags_url_address" class="form-control" value="{{$tags['tags_url_address']}}" id="setting-input-2">
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">URL префикс</label>
                    <input type="text" name="tags_url_prefix" class="form-control" value="{{$tags['tags_url_prefix']}}" id="setting-input-3">
                </div>
                <div class="mb-3">
                    <label for="setting-input-4" class="form-label">Описание тега</label>
                    <textarea name="tags_article" rows="7" style="height: 150px;" class="form-control" id="setting-input-4">{{base64_decode($tags['tags_article'])}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="setting-input-5" class="form-label">TITLE</label>
                    <input type="text" name="tags_title" class="form-control" value="{{$tags['tags_title']}}" id="setting-input-5">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Description</label>
                    <input type="text" name="tags_description" class="form-control" value="{{$tags['tags_description']}}" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Keywords</label>
                    <input type="text" name="tags_keywords" class="form-control" value="{{$tags['tags_keywords']}}" id="setting-input-6">
                </div>
                <button type="submit" class="btn app-btn-primary">Сохранить</button>
            </form>
        </div><!--//app-card-body-->
    </div>
@endsection
