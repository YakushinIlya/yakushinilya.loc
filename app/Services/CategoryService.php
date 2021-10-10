<?php

namespace App\Services;

use App\Helpers\Generation;
use App\Helpers\Validation;
use App\Interfaces\NavigationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService implements NavigationInterface
{
    public static function getAll(int $count, object $model)
    {
        try {
            return $model::orderByDesc('id')->get();
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
        $validator = Validation::categoryData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['category_article']     = base64_encode($data['category_article']);
            $data['category_url_address'] = trim($data['category_url_address'], '/');
            $data['category_url_prefix']  = trim($data['category_url_prefix'], '.');

            if(empty($data['category_url_address'])){
                $data['category_url_address'] = Generation::urlAddress($data['category_head']);
            }

            try {
                $model::create($data);
                return redirect()->route('admin.category')->with('status', 'Категория успешно добавлена');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function update(int $id, array $data, object $model)
    {
        $validator = Validation::categoryData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['category_article']     = base64_encode($data['category_article']);
            $data['category_url_address'] = trim($data['category_url_address'], '/');
            $data['category_url_prefix']  = trim($data['category_url_prefix'], '.');

            if(empty($data['category_url_address'])){
                $data['category_url_address'] = Generation::urlAddress($data['category_head']);
            }

            try {
                $model::findOrFail($id)->update($data);
                return redirect()->back()->with('status', 'Категория успешно обновлена');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function delete(int $id, object $model)
    {
        try {
            $model::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Категория успешно удалена');
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
