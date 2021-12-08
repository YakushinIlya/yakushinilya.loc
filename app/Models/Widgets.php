<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Widgets extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'widgets';

    protected $fillable = [
        'head_ru', 'head_en', 'body', 'location', 'template', 'range',
    ];

    protected $dates = ['deleted_at'];

    private $data=[
        [
            'head'  => 'Виджет',
            'body'  => '<p class="text-white">Текст виджета</p>',
        ],
    ];

    public function widgetList()
    {
        return $this->where('location', 'right')->get();
    }
}
