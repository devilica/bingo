<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luckynumber extends Model
{
    use HasFactory;


    protected $fillable = [
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
