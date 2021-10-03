<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pages';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'page_head', 'page_url_address', 'page_url_prefix', 'page_article', 'page_title', 'page_description',
        'page_keywords', 'page_template', 'page_status',
    ];
}
