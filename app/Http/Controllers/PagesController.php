<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Services\PageService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(Pages $model)
    {
        $this->model = $model;
    }
    public function getRoute(string $route)
    {
        if($pageData = PageService::getRoute($route, $this->model)){
            $this->data['title']       = $pageData['page_title']??$pageData['page_head'];
            $this->data['description'] = $pageData['page_description'];
            $this->data['keywords']    = $pageData['page_keywords'];
            $pageData['page_article']  = base64_decode($pageData['page_article']);
            $this->data['page']        = $pageData;
        } else {
            $pageData['page_template'] = '404';
        }

        return view('basic.page.'.$pageData['page_template']??'default', $this->data);
    }
}
