<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('Category.create');
    }



public function store(Request $request){

    $validated=$request->validate
    ([
        'name'=>'required'
    ]);

    $data=new category();
        $data->name=$request->name;
        $data->save();
        return redirect()->route('table')->with('msg','Data has been submit successfully');
    }

    public function table(){
        $data=category::all();
        return view('category.table',compact('data'));
    }
    public function edit($id){
        $data=category::find($id);
        return view('category.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $validated=$request->validate
        ([
            'name'=>'required'
        ]);
        $data=category::find($id);
            $data->name=$request->name;
            $data->save();
            return redirect()->route('table')->with('msg','Data has been update successfully');
        }

        
        public function delete($id){
            $data=category::find($id);
            $data->delete();
            return redirect()->route('table')->with('msg','Data has been Delete successfully');

        }
}





