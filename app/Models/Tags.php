<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'tags_head', 'tags_url_address', 'tags_url_prefix', 'tags_article', 'tags_title',
        'tags_description', 'tags_keywords', 'tags_status',
    ];
}
