<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'numbers',
    ];

    public function setNumbersAttribute($value)
    {
        $this->attributes['numbers'] = json_encode($value);
    }

    public function getNumbersAttribute($value)
    {
        return $this->attributes['numbers'] = json_decode($value);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



}
