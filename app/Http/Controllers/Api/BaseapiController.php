<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseapiController extends Controller
{
    protected $where = [];
    protected $orders;

    public function __construct(){
        //
        $this->generate_orders();
    }
    private function generate_orders(){
        $this->orders = isset($_GET['orders'])? str_replace('.', ' ', $_GET['orders']) : '';
        mylog($this->orders);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = $_GET['size'];
        $ret = $this->model::where($this->where);
        // if($this->where){
        //     $ret = $this->model::where($this->where);
        // }else{
        //     $ret = $this->model;
        // }
        if($this->orders)
            $ret = $ret->orderByRaw($this->orders);

        $ret = $ret->paginate($size);

        $res = new $this->collection($this->resource::collection($ret));
        mylog($res);
        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $data = $request->all();
        if($request->hasFile('file')){
            $data['file'] = $request->file('file')->store('uploads');
            $data['mimetype'] = $request->file->getMimeType();
            $data['size'] = $request->file->getClientSize();
            $data['name'] = $request->file->getClientOriginalName();
            $data['createdTime'] = time();
        }
        $info = $this->model::create($data);
        $data['id'] = $info->id;
        $ret = response()->json($data,200);
        return $ret;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $this->model::where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->model::where('id',$id)->delete();
    }
}
