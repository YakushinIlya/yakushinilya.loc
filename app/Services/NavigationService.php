<?php

namespace App\Services;

use App\Helpers\Validation;
use App\Interfaces\NavigationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NavigationService implements NavigationInterface
{
    public static function getAll(int $count, object $model)
    {
        try {
            return $model::orderByDesc('id')->paginate($count);
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
        $validator = Validation::navigationData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $model::create($data);
                return redirect()->route('admin.navigation')->with('status', 'Элемент навигации успешно добавлен');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function update(int $id, array $data, object $model)
    {
        $validator = Validation::navigationData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $model::findOrFail($id)->update($data);
                return redirect()->back()->with('status', 'Элемент навигации успешно обновлен');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function delete(int $id, object $model)
    {
        try {
            $model::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Элемент навигации успешно удален');
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
