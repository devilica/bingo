<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Luckynumber;

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


            $last=Luckynumber::orderBy('id', 'desc')->first();
            $round=$last->round_id;

            $ticket=new Ticket();
            $ticket->user_id=Auth::id();
            $ticket->round_id=$round+1;
            $ticket->numbers=$request->numbers;
            $ticket->save();

            return redirect('/home')->with('message', 'Successfully created ticket'); 
        }

    }


}
