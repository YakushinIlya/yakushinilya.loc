@extends('admin.app')

@section('content')
    <div class="app-card app-card-orders-table shadow-sm mb-5 p-4">
        <div class="app-card-body">
            <form class="settings-form" method="post" action="{{route('admin.tag.add')}}">
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Заголовок</label>
                    <input type="text" name="tags_head" class="form-control" id="setting-input-1" value="{{old('tags_head')}}" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">URL адрес</label>
                    <input type="text" name="tags_url_address" class="form-control" id="setting-input-2" value="{{old('tags_url_address')}}">
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">URL префикс</label>
                    <input type="text" name="tags_url_prefix" class="form-control" id="setting-input-2" value="{{old('tags_url_prefix')}}">
                </div>
                <div class="mb-3">
                    <label for="setting-input-4" class="form-label">Описание тега</label>
                    <textarea name="tags_article" rows="7" style="height: 150px;" class="form-control" id="setting-input-4">{{old('tags_article')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="setting-input-5" class="form-label">TITLE</label>
                    <input type="text" name="tags_title" class="form-control" value="{{old('tags_title')}}" id="setting-input-5">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Description</label>
                    <input type="text" name="tags_description" class="form-control" value="{{old('tags_description')}}" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Keywords</label>
                    <input type="text" name="tags_keywords" class="form-control" value="{{old('tags_keywords')}}" id="setting-input-6">
                </div>
                <button type="submit" class="btn app-btn-primary">Сохранить</button>
            </form>
        </div><!--//app-card-body-->
    </div>
@endsection
