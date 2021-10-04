<?php

namespace App\Services;

use App\Helpers\Generation;
use App\Helpers\Validation;
use App\Interfaces\NavigationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagService implements NavigationInterface
{
    public static function getAll(object $model)
    {
        try {
            return $model::orderByDesc('id')->paginate(20);
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public static function getId(int $id, object $model)
    {
        try {
            return $model::findOrFail($id);
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public static function create(array $data, object $model)
    {
        $validator = Validation::tagsData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['tags_article']     = base64_encode($data['tags_article']);
            $data['tags_url_address'] = trim($data['tags_url_address'], '/');
            $data['tags_url_prefix']  = trim($data['tags_url_prefix'], '.');

            if(empty($data['tags_url_address'])){
                $data['tags_url_address'] = Generation::urlAddress($data['tags_head']);
            }

            try {
                $model::create($data);
                return redirect()->route('admin.tag')->with('status', 'Тег успешно добавлен');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function update(int $id, array $data, object $model)
    {
        $validator = Validation::tagsData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['tags_article']     = base64_encode($data['tags_article']);
            $data['tags_url_address'] = trim($data['tags_url_address'], '/');
            $data['tags_url_prefix']  = trim($data['tags_url_prefix'], '.');

            if(empty($data['tags_url_address'])){
                $data['tags_url_address'] = Generation::urlAddress($data['tags_head']);
            }

            try {
                $model::findOrFail($id)->update($data);
                return redirect()->back()->with('status', 'Тег успешно обновлен');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function delete(int $id, object $model)
    {
        try {
            $model::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Тег успешно удален');
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
