<?php

namespace App\Services;

use App\Helpers\Generation;
use App\Helpers\Validation;
use App\Interfaces\NavigationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageService implements NavigationInterface
{
    public static function getAll(int $count, object $model)
    {
        try {
            return $model::orderByDesc('id')->paginate($count);
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public static function getRoute(string $route, object $model)
    {
        $url = explode('.', $route);
        try {
            if(isset($url[1])){
                return $model::whereRaw('page_url_address=? && page_url_prefix=?', [trim($url[0], '/'), $url[1]])
                    ->first();
            }
            return $model::where('page_url_address', trim($url[0], '/'))->first();
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
        $validator = Validation::pageData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['page_article']     = base64_encode($data['page_article']);
            $data['page_url_address'] = trim($data['page_url_address'], '/');
            $data['page_url_prefix']  = trim($data['page_url_prefix'], '.');

            if(empty($data['page_url_address'])){
                $data['page_url_address'] = Generation::urlAddress($data['page_head']);
            }

            try {
                $model::create($data);
                return redirect()->route('admin.page')->with('status', 'Страница успешно добавлена');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function update(int $id, array $data, object $model)
    {
        $validator = Validation::pageData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $data['page_article']     = base64_encode($data['page_article']);
                $data['page_url_address'] = trim($data['page_url_address'], '/');
                $data['page_url_prefix']  = trim($data['page_url_prefix'], '.');

                if(empty($data['page_url_address'])){
                    $data['page_url_address'] = Generation::urlAddress($data['page_head']);
                }

                $model::findOrFail($id)->update($data);
                return redirect()->back()->with('status', 'Страница успешно обновлена');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function delete(int $id, object $model)
    {
        try {
            $model::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Страница успешно удалена');
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
