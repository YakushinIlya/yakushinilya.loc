@extends('admin.app')

@section('content')
    <div class="app-card app-card-orders-table shadow-sm mb-5 p-4">
        <div class="app-card-body">
            <form class="settings-form" method="post" action="{{route('admin.category.edit', ['id'=>$category['id']])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Заголовок</label>
                    <input type="text" name="category_head" class="form-control" id="setting-input-1" value="{{$category['category_head']}}" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">URL адрес</label>
                    <input type="text" name="category_url_address" class="form-control" value="{{$category['category_url_address']}}" id="setting-input-2">
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">URL префикс</label>
                    <input type="text" name="category_url_prefix" class="form-control" value="{{$category['category_url_prefix']}}" id="setting-input-3">
                </div>
                <div class="mb-3">
                    <label for="setting-input-4" class="form-label">Описание категории</label>
                    <textarea name="category_article" rows="7" style="height: 150px;" class="form-control" id="setting-input-4">{{base64_decode($category['category_article'])}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="setting-input-5" class="form-label">TITLE</label>
                    <input type="text" name="category_title" class="form-control" value="{{$category['category_title']}}" id="setting-input-5">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Description</label>
                    <input type="text" name="category_description" class="form-control" value="{{$category['category_description']}}" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Keywords</label>
                    <input type="text" name="category_keywords" class="form-control" value="{{$category['category_keywords']}}" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-7" class="form-label">Родитель</label>
                    <select name="location" class="form-control" id="setting-input-7">
                        <option value="" selected>-- Выберите родительскую категорию --</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat['id']}}" @if($category['category_parent']==$cat['id']) selected @endif>{{$cat['category_head']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn app-btn-primary">Сохранить</button>
            </form>
        </div><!--//app-card-body-->
    </div>
@endsection
