<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tagModel;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try
        {
            tagModel::create([
                "Tag"=>$request->post("add_tag"),
                "Article_id"=>$request->post("tag_id")
            ]);
            DB::commit();
            return redirect()->route("show-article", $request->post("tag_id"));
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route("show-article", $request->post("tag_id"));
        }
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
        $tags = tagModel::where("id",$id)->get();
        return response()->compact("tags");
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
        
        $tag=$request->input("edit_tag");
        DB::beginTransaction();
        try
        {
            tagModel::where("id", $id)->update(["Tag"=>$tag]);
            DB::commit();
            return back();
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tagModel::where("id",$id)->delete();
        return back();
    }
}
