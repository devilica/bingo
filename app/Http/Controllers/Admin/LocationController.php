<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;


class LocationController extends Controller
{
    
    public function create(){
        $admins=Admin::all();

        return view('admin.location.create', [
            'admins'=>$admins
        ]);
    }

    public function store(Request $request){

        
        $validator = Validator::make($request->all(),[
            'location' => 'required',
            'admin_id'=>'required'

            
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Admin and location are required.'); 
        }else{

            $input = $request->all();
            $input['admin_id']=$request->input('admin_id');
            $input['location'] = $request->input('location');
            Location::create($input);

            return redirect('/admin/home')->with('message', 'Successfully created location'); 
        }


    }

    public function seeLocations(){
        $lists=Location::orderBy('id', 'desc')->paginate('20');

        return view('admin.location.lists', [
            'lists'=>$lists
        ]);
    }



}
