<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ticket;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.home');
    }

    public function seeTickets(){
        $lists=Ticket::orderBy('id', 'desc')->paginate(20);

        return view('admin.tickets.showlist', [
            'lists'=>$lists
        ]);

    }
   

}
