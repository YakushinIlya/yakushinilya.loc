<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Widgets;
use App\Services\WidgetService;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function __construct(Widgets $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->data['title']   = 'Виджеты';
        $this->data['widgets'] = WidgetService::getAll($this->model);
        return view('admin.widget._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title'] = 'Добавить виджет';
        if($request->isMethod('post')){
            $data = $request->except('_token');
            return WidgetService::create($data, $this->model);
        }
        return view('admin.widget._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title']   = 'Редактировать виджет';
        $this->data['widget']  = WidgetService::getId($request->id, $this->model);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            return WidgetService::update($request->id, $data, $this->model);
        }
        return view('admin.widget._update', $this->data);
    }

    public function delete(Request $request)
    {
        return WidgetService::delete($request->id, $this->model);
    }
}
