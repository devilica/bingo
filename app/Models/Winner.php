<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $casts = [
        'numbers' => 'array'
];

    protected $fillable = [
        'user_id',
        'ticket_id',
        'round_id',
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
    

}
