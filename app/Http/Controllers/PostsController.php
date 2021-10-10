<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(Posts $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $this->data['title'] = 'Все записи блога';
        $this->data['posts'] = PostService::getAll(20, $this->model);

        return view('basic.post.list', $this->data);
    }

    public function getRoute(string $route)
    {
        if($postData = PostService::getRoute($route, $this->model)){
            $this->data['title']       = $postData['post_title']??$postData['post_head'];
            $this->data['description'] = $postData['post_description'];
            $this->data['keywords']    = $postData['post_keywords'];
            $postData['post_article']  = base64_decode($postData['post_article']);
            $this->data['post']        = $postData;
        } else {
            return view('basic.404');
        }

        return view('basic.post.'.$postData['post_template']??'default', $this->data);
    }
}
