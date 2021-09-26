<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    private $data=[
        [
            'head'  => 'Виджет',
            'body'  => '<p class="text-white">Текст виджета</p>',
        ],
    ];

    public function widgetList()
    {
        return $this->data;
    }
}
