<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseapiController;
use App\File;
use App\Http\Resources\FileResource;
use App\Http\Resources\FileCollection;

class FilesController extends BaseapiController
{
    //
    protected $model = File::class;
    protected $collection = FileCollection::class;
    protected $resource = FileResource::class;
    protected $where = [];
}
