<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Services\NavigationService;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function __construct(Navigation $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->data['title']       = 'Навигация';
        $this->data['navigations'] = NavigationService::getAll($this->model);
        return view('admin.navigation._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title'] = 'Добавить элемент навигации';
        if($request->isMethod('post')){
            $data = $request->except('_token');
            return NavigationService::create($data, $this->model);
        }
        return view('admin.navigation._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title']      = 'Редактировать элемент навигации';
        $this->data['navigation'] = NavigationService::getId($request->id, $this->model);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            return NavigationService::update($request->id, $data, $this->model);
        }
        return view('admin.navigation._update', $this->data);
    }

    public function delete(Request $request)
    {
        return NavigationService::delete($request->id, $this->model);
    }
}
