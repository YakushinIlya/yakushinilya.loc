<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'category_head', 'category_url_address', 'category_url_prefix', 'category_article', 'category_title',
        'category_description', 'category_keywords', 'category_status',
    ];

    public function post()
    {
        return $this->belongsToMany('App\Models\Posts', 'post_category', 'category_id', 'post_id');
    }
}
