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
}
