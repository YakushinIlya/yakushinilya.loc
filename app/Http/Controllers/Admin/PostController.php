<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageCorrector;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $modelCategory;

    public function __construct(Posts $model, Categories $modelCategory)
    {
        $this->model = $model;
        $this->modelCategory = $modelCategory;
    }

    public function index()
    {
        $this->data['title'] = 'Статьи';
        $this->data['posts'] = PostService::getAll($this->model);
        return view('admin.post._index', $this->data);
    }

    public function create(Request $request)
    {
        $this->data['title']      = 'Добавить статью';
        $this->data['categories'] = CategoryService::getAll($this->modelCategory);
        if($request->isMethod('post')){
            $data = $request->except('_token');
            if($request->hasFile('photo')) {
                $fileExt = $request->file('photo')->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/posts/';
                $fileName = md5($data['post_head'].date('Y')) . '.' . $fileExt;
                $request->file('photo')->move($destinationPath, $fileName);
                ImageCorrector::getAvatar($destinationPath.$fileName, 500, 300);
                $data['post_photo'] = '/uploads/posts/'.$fileName;
            }
            return PostService::create($data, $this->model);
        }
        return view('admin.post._create', $this->data);
    }

    public function update(Request $request)
    {
        $this->data['title'] = 'Редактировать статью';
        $this->data['post']  = PostService::getId($request->id, $this->model);
        $this->data['categories'] = CategoryService::getAll($this->modelCategory);
        if($request->isMethod('put')){
            $data = $request->except('_token');
            if($request->hasFile('photo')) {
                $fileExt = $request->file('photo')->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/posts/';
                $fileName = md5($data['post_head'].date('Y')) . '.' . $fileExt;
                $request->file('photo')->move($destinationPath, $fileName);
                ImageCorrector::getAvatar($destinationPath.$fileName, 500, 300);
                $data['post_photo'] = '/uploads/posts/'.$fileName;
            }
            return PostService::update($request->id, $data, $this->model);
        }
        return view('admin.post._update', $this->data);
    }

    public function delete(Request $request)
    {
        return PostService::delete($request->id, $this->model);
    }
}
