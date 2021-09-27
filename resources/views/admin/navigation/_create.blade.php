@extends('admin.app')

@section('content')
    <div class="app-card app-card-orders-table shadow-sm mb-5 p-4">
        <div class="app-card-body">
            <form class="settings-form" method="post" action="{{route('admin.navigation.add')}}">
                @csrf
                <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Заголовок</label>
                    <input type="text" name="head" class="form-control" id="setting-input-1" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-2" class="form-label">URL адрес</label>
                    <input type="text" name="route" class="form-control" id="setting-input-2" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">CLASS</label>
                    <input type="text" name="class" class="form-control" id="setting-input-3">
                </div>
                <div class="mb-3">
                    <label for="setting-input-4" class="form-label">SVG</label>
                    <input type="text" name="svg" class="form-control" id="setting-input-4">
                </div>
                <div class="mb-3">
                    <label for="setting-input-5" class="form-label">ICON</label>
                    <input type="text" name="icon" class="form-control" id="setting-input-5">
                </div>
                <div class="mb-3">
                    <label for="setting-input-6" class="form-label">Target</label>
                    <input type="text" name="target" class="form-control" id="setting-input-6">
                </div>
                <div class="mb-3">
                    <label for="setting-input-7" class="form-label">Location</label>
                    <select name="location" class="form-control" id="setting-input-7" required>
                        @foreach(config('customAdmin.navigationLocale') as $k => $v)
                            <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="setting-input-8" class="form-label">Ранжирование</label>
                    <input type="text" name="range" class="form-control" id="setting-input-8" value="1">
                </div>
                <button type="submit" class="btn app-btn-primary">Сохранить</button>
            </form>
        </div><!--//app-card-body-->
    </div>
@endsection
