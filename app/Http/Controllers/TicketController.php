<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    

    public function create(){
        return view('user.ticket.create');
    }

    public function store(Request $request)
    {
    

        $validator = Validator::make($request->all(),[
            'numbers' => 'required|array|min:6|max:6',

            
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Please choose 6 numbers. It is required.'); 
        }else{

            $input = $request->all();
            $input['user_id']=Auth::id();
            $input['numbers'] = $request->input('numbers');
            Ticket::create($input);

            return redirect('/home')->with('message', 'Successfully created ticket'); 
        }

    }


}
