<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RoomNum extends Model
{
    use SoftDeletes;

    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $guarded = [];

    public function block(){
        return $this->belongsTo(Block::class,'block_id','id');
    }

    public function apartment(){
        return $this->belongsTo(Apartment::class,'apartment_id','id');
    }

}
