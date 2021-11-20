<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'file_name', 'file_path', 'file_alt', 'file_title',
    ];

    public function post()
    {
        return $this->belongsToMany('App\Models\Posts', 'post_img', 'img_id', 'post_id');
    }
}
