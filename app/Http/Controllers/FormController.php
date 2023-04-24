<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;


use Illuminate\Http\Request;

class FormController extends Controller
{
    // public function form(){
    //     return view('form');
    // }
    public function store(Request $request){
        $data=new user();
        $request->validate(
            [
                'name'=>'required|regex:/^[\pl\s-]+$/u',
                'email'=>'required',
                'pass'=>'required',
                'phone'=>'required',
                // 'country'=>'required',
                'address'=>'required',
            ],[

                'email'=>'Please fill the email address field',
                'pass'=>'Please fill the password field',

                'phone'=>'Please fill the mobile No. field',
                'address'=>'Please fill the address field',
            ]
        );
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->pass);
        $data->phone=$request->phone;
        // $data->country=$request->country;
        $data->country_id=$request->country_id;
        $data->state_id=$request->state_id;
        $data->city_id=$request->city_id;
        $data->address=$request->address;
        $data->save();
        // dd($data);
        return redirect()->route('form.table')->with('msg','Record has been Stored Successfully');
    }
    public function table(){
        $data=User::with('country')->get();
        // dd($data);
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
                'name'=>'required|regex:/^[\pl\s-]+$/u',
                'email'=>'required',
                'pass'=>'required',
                'phone'=>'required',
                'address'=>'required',
                // 'country'=>'required',


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
        $data->password=bcrypt($request->pass);
        $data->phone=$request->phone;
        // $data->country=$request->country;
        $data->country_id=$request->country_id;
        $data->state_id=$request->state_id;
        $data->city_id=$request->city_id;
        $data->address=$request->address;
        $data->save();
        return redirect()->route('form.table')->with('msg','Record has been Updated Successfully');
    }
    public function delete($id){
        $data=User ::find($id);
        $data->delete();
        return redirect()->route('form.table')->with('msg','Record has been Deleted Successfully');
    }






    public function index()
    {

            $countries = Country::get(["name", "id"]);
            // dd('countries');
        return view('form',compact('countries'));
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);


        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}

