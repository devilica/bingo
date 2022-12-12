<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Luckynumber;
use Log;
use Illuminate\Support\Arr;
use App\Models\Winner;
use App\Models\Ticket;

class GetLuckyNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getluckynumbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting 30 of 48 lucky numbers.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        try{


            $lists=Luckynumber::orderBy('id', 'desc')->get();
            $last=Luckynumber::orderBy('id', 'desc')->first();

            $round=0;
            if($lists->count()==0){
                $round=1;
            }else{
                $round=$last->round_id+1;
            }

            $arr = [];
            for($i=1; $i<=48; $i++){
                $arr[]="$i";
            }
            $random= Arr::random($arr, 30);
            
    
            $luckynums=new Luckynumber();
            $luckynums->round_id=$round;
            $luckynums->numbers=$random;
            $luckynums->save();


            
            $tickets=Ticket::where('round_id', $round)->get();
            foreach($tickets as $ticket){
               
                $result=array_intersect($random,$ticket->numbers);
                $winner=new Winner();
                $winner->user_id=$ticket->user_id;
                $winner->ticket_id=$ticket->id;
                $winner->round_id=$round;
                $winner->numbers=$result;
                $winner->save();
            }


        
        }
        catch(Exception $e)
        {
                  Log::info($e->getMessage());
        }
    


    }
}
