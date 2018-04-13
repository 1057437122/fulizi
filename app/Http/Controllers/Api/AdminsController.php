<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdminCollection;
use App\Http\Resources\AdminResource;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ret = new AdminCollection(AdminResource::collection(Admin::paginate(env('PAGE',10))));
        return $ret;
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
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['password'] = $this->transform($data['password']);
        Admin::create($data);
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
        $data['password'] = $this->transform($data['password']);
        Admin::where('id',$id)->update($data);
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
        Admin::where('id',$id)->delete();
    }

    public function auth(Request $request){
        //verify username and password 
        $ret = Admin::where('name',$request->get('name'))->first();
        $data = $request->all();
        mylog($data);
        if($ret){
            //
            $rev_password = $this->transform($data['password']);
            mylog($ret);
            mylog($rev_password);
            if($rev_password == $ret->password){
                mylog($rev_password);
                //2018-03-16 05:41:34
                Admin::where('id',$ret->id)->update(['lastLoginTime'=>date('Y-m-d H:i:s',time())]);
                return response()->json(null, 200);
            }else{
                return response()->json(null, 404);
            }
        }else{
            return response()->json(null, 404);
        }
    }

    private function transform($password){
        return md5($password.'welcomeOnBoard');
    }
}
