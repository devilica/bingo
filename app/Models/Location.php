<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'location',
    ];


    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

}
