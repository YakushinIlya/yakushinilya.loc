<?php

namespace App\Services;

use App\Helpers\Generation;
use App\Helpers\ImageCorrector;
use App\Helpers\Validation;
use App\Interfaces\NavigationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostService implements NavigationInterface
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
                return $model::whereRaw('post_url_address=? && post_url_prefix=?', [trim($url[0], '/'), $url[1]])
                    ->first();
            }
            return $model::where('post_url_address', trim($url[0], '/'))->first();
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
        $validator = Validation::postData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['post_article']     = base64_encode($data['post_article']);
            $data['post_url_address'] = trim($data['post_url_address'], '/');
            $data['post_url_prefix']  = trim($data['post_url_prefix'], '.');

            if(empty($data['post_url_address'])){
                $data['post_url_address'] = Generation::urlAddress($data['post_head']);
            }

            try {
                $model::create($data);
                return redirect()->route('admin.post')->with('status', 'Статья успешно добавлена');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function update(int $id, array $data, object $model)
    {
        $validator = Validation::postData($data);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try {
                $data['post_article']     = base64_encode($data['post_article']);
                $data['post_url_address'] = trim($data['post_url_address'], '/');
                $data['post_url_prefix']  = trim($data['post_url_prefix'], '.');

                if(empty($data['post_url_address'])){
                    $data['post_url_address'] = Generation::urlAddress($data['post_head']);
                }

                $model::findOrFail($id)->update($data);
                return redirect()->back()->with('status', 'Статья успешно обновлена');
            } catch(ModelNotFoundException $e){
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public static function delete(int $id, object $model)
    {
        try {
            $model::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Статья успешно удалена');
        } catch(ModelNotFoundException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
