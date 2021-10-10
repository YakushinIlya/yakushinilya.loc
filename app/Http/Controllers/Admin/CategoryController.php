<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(Categories $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->data['title']       = 'Категории';
        $this->data['categories']  = CategoryService::getAll(20, $this->model);
        return view('admin.category._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title']      = 'Добавить категорию';
        $this->data['categories'] = CategoryService::getAll($this->model);
        if($request->isMethod('post')){
            $data = $request->except('_token');
            return CategoryService::create($data, $this->model);
        }
        return view('admin.category._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title']      = 'Редактировать категорию';
        $this->data['category']   = CategoryService::getId($request->id, $this->model);
        $this->data['categories'] = CategoryService::getAll($this->model);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            return CategoryService::update($request->id, $data, $this->model);
        }
        return view('admin.category._update', $this->data);
    }

    public function delete(Request $request)
    {
        return CategoryService::delete($request->id, $this->model);
    }
}
