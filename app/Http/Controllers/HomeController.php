<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Models\Winner;
use App\Models\Luckynumber;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $tickets=Ticket::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(10);
        $lucky=Winner::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $current=Luckynumber::orderBy('id', 'desc')->first();

    
        return view('home', [
            'tickets'=> $tickets,
            'lucky'=>$lucky,
            'current'=>$current
        ]);
    }

 

   

}
