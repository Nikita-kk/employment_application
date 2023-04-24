<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Http\Request;


//  for ajax
class PostController extends Controller
{
  public function user(){
     $data= category::get(["name", "id"]);

    return view('post.create',compact('data'));
  }


  public function subcategory(Request $request){
    $data['subcategories'] = subcategory::where("category_id",$request->category_id)->get(["name", "id"]);

    // dd($data);
    return response()->json($data);
  }


  public function store(Request $request){
    $data=new post();
    $data->name=$request->name;
    $data->category_id=$request->category_id;
    $data->subcategory_id=$request->subcategory_id;
    $data->save();
  }
}




