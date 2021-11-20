<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'post_head', 'post_url_address', 'post_url_prefix', 'post_article', 'post_title', 'post_description',
        'post_keywords', 'post_template', 'post_status', 'post_photo',
    ];

    public function image()
    {
        return $this->belongsToMany('App\Models\Images', 'post_img', 'post_id', 'img_id');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Categories', 'post_category', 'post_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags', 'post_tags', 'post_id', 'tags_id');
    }
}
