<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(Tags $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->data['title'] = 'Категории';
        $this->data['tags']  = TagService::getAll(20, $this->model);
        return view('admin.tag._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title']      = 'Добавить тег';
        if($request->isMethod('post')){
            $data = $request->except('_token');
            return TagService::create($data, $this->model);
        }
        return view('admin.tag._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title'] = 'Редактировать тег';
        $this->data['tags']  = TagService::getId($request->id, $this->model);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            return TagService::update($request->id, $data, $this->model);
        }
        return view('admin.tag._update', $this->data);
    }

    public function delete(Request $request)
    {
        return TagService::delete($request->id, $this->model);
    }
}
