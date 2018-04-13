<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseapiController;
use App\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoriesController extends BaseapiController
{
    //
    protected $model = Category::class;
    protected $collection = CategoryCollection::class;
    protected $resource = CategoryResource::class;
    protected $where = [];
}
