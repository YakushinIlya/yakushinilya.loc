@extends('admin.app')

@section('content')
    <div class="app-card app-card-orders-table shadow-sm mb-5 p-4">
        <div class="app-card-body">
            <form class="settings-form" method="post" action="{{route('admin.widget.edit', ['id'=>$widget['id']])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Заголовок RU</label>
                    <input type="text" name="head_ru" class="form-control" id="setting-input-1" value="{{$widget['head_ru']}}" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">Заголовок EN</label>
                    <input type="text" name="head_en" class="form-control" id="setting-input-2" value="{{$widget['head_en']}}">
                </div>
                <div class="mb-3">
                    <label for="setting-input-4" class="form-label">Содержимое виджета</label>
                    <textarea name="body" rows="7" style="height: 150px;" class="form-control" id="setting-input-4">{{base64_decode($widget['body'])}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="setting-input-7" class="form-label">Location</label>
                    <select name="location" class="form-control" id="setting-input-7" required>
                        @foreach(config('customAdmin.widgetLocale') as $k => $v)
                            <option value="{{$k}}" @if($widget['location']==$k) selected @endif>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="setting-input-8" class="form-label">Ранжирование</label>
                    <input type="text" name="range" class="form-control" id="setting-input-8" value="{{$widget['range']}}">
                </div>
                <button type="submit" class="btn app-btn-primary">Сохранить</button>
            </form>
        </div><!--//app-card-body-->
    </div>
@endsection
