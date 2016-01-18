## Crud Helper for Laravel 5

[![Latest Stable Version](https://poser.pugx.org/sapioweb/crudhelper/v/stable)](https://packagist.org/packages/sapioweb/crudhelper)
[![Total Downloads](https://poser.pugx.org/sapioweb/crudhelper/downloads)](https://packagist.org/packages/sapioweb/crudhelper)
[![Latest Unstable Version](https://poser.pugx.org/sapioweb/crudhelper/v/unstable)](https://packagist.org/packages/sapioweb/crudhelper)
[![License](https://poser.pugx.org/sapioweb/crudhelper/license)](https://packagist.org/packages/sapioweb/crudhelper)

## Installation
Include
        Sapioweb\CrudHelper\CrudHelperServiceProvider::class,

Use
        use Sapioweb\CrudHelper\CrudyController as CrudHelper;

## Usage

`use Sapioweb\CrudHelper\CrudyController as CrudHelper;`

`dd(CrudHelper::index());`

## Available Methods

`index($model, $relations = null)`

`store($model, $createData)`

`show($model, $field = 'id', $id, $relations = null)`

`relationshipQuery($model, $relationships, $relationField = null, $relationshipQuery = null)`

`createOrUpdate($model, $field, $id, $inputData)`

`destroy($model, $field = 'id', $id)`

`slugify($text)`
