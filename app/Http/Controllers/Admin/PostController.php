<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(Posts $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->data['title'] = 'Статьи';
        $this->data['posts'] = PostService::getAll($this->model);
        return view('admin.post._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title'] = 'Добавить статью';
        if($request->isMethod('post')){
            $data = $request->except('_token');
            return PostService::create($data, $this->model);
        }
        return view('admin.post._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title'] = 'Редактировать статью';
        $this->data['post']  = PostService::getId($request->id, $this->model);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            return PostService::update($request->id, $data, $this->model);
        }
        return view('admin.post._update', $this->data);
    }

    public function delete(Request $request)
    {
        return PostService::delete($request->id, $this->model);
    }
}
