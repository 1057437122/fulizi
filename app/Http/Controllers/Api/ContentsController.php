<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseapiController;
use App\Content;
use App\Http\Resources\ContentResource;
use App\Http\Resources\ContentCollection;


class ContentsController extends BaseapiController
{
    //
    protected $model = Content::class;
    protected $collection = ContentCollection::class;
    protected $resource = ContentResource::class;
    protected $where = [];

    public function __construct(){
    	//
    	$this->where = $this->generate_where();
    	parent::__construct();
    }
    private function generate_where(){
    	$where = [];
    	$cat_id = isset($_GET['cat_id'])  ? $_GET['cat_id'] : '';
    	$search = isset($_GET['search'])  ? $_GET['search'] : '';
    	if($cat_id)
    		array_push($where, ['cat_id',$cat_id]);
    	if($search)
    		array_push($where, ['detail','like',"%$search%"]);
    	return $where;
    }
}
