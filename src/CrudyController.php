<?php

namespace Sapioweb\CrudHelper;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CrudyController extends Controller
{
    public static function index($model, $relations = [])
    {
        switch (true) {
            case $relations !== null:

                $resource = $model->with($relations);
                break;

            default:
                $resource = $model->all();
                break;
        }

        return $resource;
    }

    public static function store($model, $createData)
    {
        $resource = $model->create($createData);

        return $resource;
    }

    public static function show($model, $field = 'id', $id, $relations = null)
    {
        switch (true) {
            case $relations !== null:

                foreach ($relations as $relation) {
                    $resource = $model->with($relation);
                }

                $resource = $resource->where($field, '=', $id);
                break;

            default:
                $resource = $model->where($field, '=', $id);
                break;
        }

        return $resource->first();
    }

    public static function relationshipQuery($model, $relationships, $relationField = null, $relationshipQuery = null)
    {
        foreach ($relationships as $relationship) {
            $resource = $model->with($relationship);
        }

        $resource = $resource->whereHas($relationship, function($query) use ($relationField, $relationshipQuery) {
            $query->where($relationField, '=', $relationshipQuery);
        });

        return $resource;
    }

    public static function createOrUpdate($model, $field, $id, $inputData)
    {
        $resource = static::show($model, $field, $id);

        foreach ($inputData as $inputKey => $inputValue) {
            $data[$inputKey] = $inputValue;
        }

        switch (true) {
            case $resource->exists():

                $resource->update($data);
                break;

            default:

                $model->create($data);
                break;
        }

        return $resource;
    }

    public static function destroy($model, $id)
    {
        $resource = $model->find($id);
        $resource->delete();

        return $resource;
    }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }
}
