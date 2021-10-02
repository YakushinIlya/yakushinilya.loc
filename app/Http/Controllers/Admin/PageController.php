<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(Pages $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->data['title'] = 'Страницы';
        $this->data['pages'] = PageService::getAll($this->model);
        return view('admin.page._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title'] = 'Добавить страницу';
        if($request->isMethod('post')){
            $data = $request->except('_token');
            return PageService::create($data, $this->model);
        }
        return view('admin.page._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title'] = 'Редактировать страницу';
        $this->data['page']  = PageService::getId($request->id, $this->model);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            return PageService::update($request->id, $data, $this->model);
        }
        return view('admin.page._update', $this->data);
    }

    public function delete(Request $request)
    {
        return PageService::delete($request->id, $this->model);
    }
}
