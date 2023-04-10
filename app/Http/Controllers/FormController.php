<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(){
        return view('form');
    }
    public function store(Request $request){
        $data=new user();
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'pass'=>'required',
                'phone'=>'required',
                'address'=>'required',
            ],[
                'name'=>'Please fill the name field',
                'email'=>'Please fill the email address field',
                'pass'=>'Please fill the password field',
                'phone'=>'Please fill the mobile No. field',
                'address'=>'Please fill the address field',
            ]
        );
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->pass;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->save();
        return redirect()->route('table')->with('msg','Record has been Stored Successfully');
    }
    public function table(){
        $data=User ::all();
        return view('table',compact('data'));
    }
    public function edit($id){
        $data=User ::find($id);
        return view('edit',compact('data'));
    }
    public function update(Request $request,$id){
        $data=User ::find($id);
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'pass'=>'required',
                'phone'=>'required',
                'address'=>'required',
            ],[
                'name'=>'Please fill the name field',
                'email'=>'Please fill the email address field',
                'pass'=>'Please fill the password field',
                'phone'=>'Please fill the mobile No. field',
                'address'=>'Please fill the address field',
            ]
        );
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->pass;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->save();
        return redirect()->route('table')->with('msg','Record has been Updated Successfully');
    }
    public function delete($id){
        $data=User ::find($id);
        $data->delete();
        return redirect()->route('table')->with('msg','Record has been Deleted Successfully');
    }
}
