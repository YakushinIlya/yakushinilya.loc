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
            'page_keywords'    => 'nullable|string',
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
            'post_keywords'    => 'nullable|string',
            'post_template'    => 'nullable|string',
        ]);
    }

    public static function widgetData(array $data)
    {
        return Validator::make($data, [
            'head_ru'  => 'required|string',
            'head_en'  => 'nullable|string',
            'body'     => 'nullable|string',
            'location' => 'nullable|string',
            'template' => 'nullable|string',
            'range'    => 'nullable|integer',
        ]);
    }

    public static function categoryData(array $data)
    {
        return Validator::make($data, [
            'category_head'        => 'required|string',
            'category_url_address' => 'nullable|string',
            'category_url_prefix'  => 'nullable|string',
            'category_article'     => 'nullable|string',
            'category_title'       => 'nullable|string',
            'category_description' => 'nullable|string',
            'category_keywords'    => 'nullable|string',
            'category_parent'      => 'nullable|integer',
        ]);
    }

    public static function tagsData(array $data)
    {
        return Validator::make($data, [
            'tags_head'        => 'required|string',
            'tags_url_address' => 'nullable|string',
            'tags_url_prefix'  => 'nullable|string',
            'tags_article'     => 'nullable|string',
            'tags_title'       => 'nullable|string',
            'tags_description' => 'nullable|string',
            'tags_keywords'    => 'nullable|string',
        ]);
    }

    public static function userAuthData($data)
    {
        return Validator::make($data, [
            'email'    => 'email|required|string',
            'password' => 'required|string'
        ]);
    }

    public static function userRegisterData($data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:5',
        ]);
    }
}
