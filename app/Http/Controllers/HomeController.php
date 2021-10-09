<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $this->data['title']       = "Илья Якушин - профессиональная WEB разработка";
        $this->data['description'] = "Профессиональное создание сайтов на заказ от опытного программиста.";
        $this->data['keywords']    = "web разработка, создание сайтов, разработка сайтов, программисты, программирование, на заказ";
        $this->data['content']     = [
            'posts' => Posts::orderByDesc('id')->limit(4)->get(),
        ];

        return view('basic.page.index', $this->data);
    }
}
