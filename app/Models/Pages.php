<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'page_head', 'page_url_address', 'page_url_prefix', 'page_article', 'page_title', 'page_description',
        'page_keywords', 'page_template', 'page_status',
    ];
}
