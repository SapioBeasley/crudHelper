<?php

namespace Sapioweb\CrudHelper;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CrudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index($model, $relations = null)
    {
        switch (true) {
            case $relations !== null:

                foreach ($relations as $relation) {
                    $resource = $model->with($relation);
                }
                break;

            default:
                $resource = $model->all();
                break;
        }

        return $resource;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store($model, $createData)
    {
        $resource = $model->create($createData);

        return $resource;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return $resource;
    }

    /**
     * Query resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($model, $field = 'id', $id)
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
