<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function apartment(){
        return $this->belongsTo(Apartment::class,'apartment_id','id');
    }
}
