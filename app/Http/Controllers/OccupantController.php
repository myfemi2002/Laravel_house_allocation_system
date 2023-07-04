<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Apartment;
use App\Models\Block;
use App\Models\RoomNum;
use App\Models\RoomAccessory;
use App\Models\AssignRoom;
use Auth;

class OccupantController extends Controller
{
    public function ViewOccupant(){
        $allData = RoomNum::whereIn('room_status', ['1', '2'])->get();
        return view('backend.occupant.index',compact('allData'));
    } // End Method

}
