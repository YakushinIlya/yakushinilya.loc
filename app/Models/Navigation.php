<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    private $navMenu=[
        [
            'head'  => 'Главная',
            'route' => '/',
            'class' => '',
        ],
        [
            'head'  => 'Автор в ВК',
            'route' => 'https://vk.com/yakushinilya',
            'class' => '',
        ],
    ];

    private $sidebarMenu=[
        [
            'head'  => 'Навигация',
            'class' => '',
            'list'  => [
                [
                    'head'  => 'Главная',
                    'route' => '/',
                    'class' => '',
                ],
                [
                    'head'  => 'Автор в ВК',
                    'route' => 'https://vk.com/yakushinilya',
                    'class' => '',
                ],
            ],
        ],
    ];

    public function listMenu()
    {
        return $this->navMenu;
    }

    public function sidebarMenu()
    {
        return $this->sidebarMenu;
    }
}
