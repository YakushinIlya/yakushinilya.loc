<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $this->authorize('view', Auth::user());
        $this->data['title']       = "Илья Якушин - профессиональная WEB разработка";
        $this->data['description'] = "Профессиональное создание сайтов на заказ от опытного программиста.";
        $this->data['keywords']    = "web разработка, создание сайтов, разработка сайтов, программисты, программирование, на заказ";
        $this->data['content']     = [
            'posts' => Posts::orderByDesc('id')->limit(4)->get(),
        ];

        return view('basic.page.index', $this->data);
    }
}
