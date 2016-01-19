## Crud Helper for Laravel 5+
[![Latest Stable Version](https://poser.pugx.org/sapioweb/crudhelper/v/stable)](https://packagist.org/packages/sapioweb/crudhelper)
[![Total Downloads](https://poser.pugx.org/sapioweb/crudhelper/downloads)](https://packagist.org/packages/sapioweb/crudhelper)
[![Latest Unstable Version](https://poser.pugx.org/sapioweb/crudhelper/v/unstable)](https://packagist.org/packages/sapioweb/crudhelper)
[![License](https://poser.pugx.org/sapioweb/crudhelper/license)](https://packagist.org/packages/sapioweb/crudhelper)

## Installation
Include into your `config/app.php`, `Sapioweb\CrudHelper\CrudHelperServiceProvider::class,`

Use the helper in any controller you plan to use it in, `use Sapioweb\CrudHelper\CrudyController as CrudHelper;`

## Usage
`use Sapioweb\CrudHelper\CrudyController as CrudHelper;`

`dd(CrudHelper::index());`

## Available Methods
Grab all data for a given resource

`CrudHelper::index($model, $relations = null)`

Stores you data for a resource

`CrudHelper::store($model, $createData)`

Show a single resource

`CrudHelper::show($model, $field = 'id', $id, $relations = null)`

Preform a where query on relationships

`CrudHelper::relationshipQuery($model, $relationships, $relationField = null, $relationshipQuery = null)`

Create or update a resource

`CrudHelper::createOrUpdate($model, $field, $id, $inputData)`

Destroy a resource

`CrudHelper::destroy($model, $field = 'id', $id)`

Turn a regular string into a slug string

`CrudHelper::slugify($text)`
