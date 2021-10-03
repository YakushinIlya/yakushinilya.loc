<?php

namespace App\Helpers;

use Validator;

class Validation
{
    public static function navigationData(array $data)
    {
        return Validator::make($data, [
            'head'     => 'required|string',
            'route'    => 'required|string',
            'class'    => 'nullable|string',
            'svg'      => 'nullable|string',
            'icon'     => 'nullable|string',
            'target'   => 'nullable|string',
            'location' => 'required|string',
            'dropdown' => 'nullable|json',
            'range'    => 'required|integer',
        ]);
    }

    public static function pageData(array $data)
    {
        return Validator::make($data, [
            'page_head'        => 'required|string',
            'page_url_address' => 'nullable|string',
            'page_url_prefix'  => 'nullable|string',
            'page_article'     => 'nullable|string',
            'page_title'       => 'nullable|string',
            'page_description' => 'nullable|string',
            'page_keywords'    => 'required|string',
            'page_template'    => 'nullable|string',
        ]);
    }

    public static function postData(array $data)
    {
        return Validator::make($data, [
            'post_head'        => 'required|string',
            'post_url_address' => 'nullable|string',
            'post_url_prefix'  => 'nullable|string',
            'post_article'     => 'nullable|string',
            'post_title'       => 'nullable|string',
            'post_description' => 'nullable|string',
            'post_keywords'    => 'required|string',
            'post_template'    => 'nullable|string',
        ]);
    }
}
