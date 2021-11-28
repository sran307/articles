<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\articleModel;
use App\Models\tagModel;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=articleModel::all();
        return view("home",compact("articles"));
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
        //image name taking and move it to the folder
        $image=$request->file("image");
        //destination folder 
        $destination="images/";
        //taking image name and move it to the folder
        $image_name=$image->getClientOriginalName();
        $image->move($destination,$image_name);
        DB::beginTransaction();
        try{
            articleModel::create([
                "Name"=>$request->post("name"),
                "Description"=>$request->post("description"),
                "Image"=>$image_name
            ]);
            DB::commit();
            return redirect()->route("articleModel.index");
        }catch(\Exception $e){
            DB::rollback();
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles=articleModel::where("id",$id)->get();
        return response()->json([
            "articles"=>$articles
        ]);
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
        $image=$request->file("image");
        $destination="images/";
        $image_name=$image->getClientOriginalName();
        $image->move($destination, $image_name);
        $name=$request->input("name");
        $description=$request->input("description");
       DB::beginTransaction();
       try{
           articleModel::where("id", $id)->update([
               "Name"=>$name,
               "Description"=>$description,
               "Image"=>$image_name
           ]);
           DB::commit();
           return redirect()->route("home");
       }catch(\Exception $e){
           DB::rollback();
           return redirect()->route("show-article", $id);
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
        $delete=articleModel::where("id", $id)->delete();
        if($delete)
        {
            return redirect()->route("home");
        }
        else
        {
            return redirect()->route("show-article", $id);
        }
    }
    public function show_article($id)
    {
        $articles=articleModel::where("id",$id)->get();
        $tag=tagModel::where("Article_id", $id)->get();
        return view("show-article",compact("articles", "tag"));
        
        
    }
    
}
