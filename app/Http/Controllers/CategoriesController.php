<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Categories $model)
    {
        $this->model = $model;
    }

    public function getId(int $id)
    {
        if($categoryData = CategoryService::getId($id, $this->model)){
            $this->data['title']       = $categoryData['category_title']??$categoryData['category_head'];
            $this->data['description'] = $categoryData['category_description'];
            $this->data['keywords']    = $categoryData['category_keywords'];
            $this->data['posts']       = $categoryData->post()->orderByDesc('category_head')->paginate(20);
        } else {
            return view('basic.404');
        }

        return view('basic.category.default', $this->data);
    }
}
