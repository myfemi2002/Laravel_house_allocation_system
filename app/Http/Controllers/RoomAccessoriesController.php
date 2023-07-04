<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RoomAccessory;
use Auth;

class RoomAccessoriesController extends Controller
{
    public function ViewAccessories(){
        $allData = RoomAccessory::latest()->paginate(6);
        return view('backend.roomaccessories.index',compact('allData'));
    } // End Method

    public function AddAccessories(){
        return view('backend.roomaccessories.add_roomaccessories');
   } // End Method

    public function StoreAccessories(Request $request){
        $validateData = $request->validate([
            'room_accessories_name' => 'required',
        ],
        [
            'room_accessories_name.required' => 'Please Input Room Accessories Name',
        ]);

        RoomAccessory::insert([
            'room_accessories_name' => $request->room_accessories_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('accessories.view')->with($notification);
    }// End Method

    public function EditAccessories($id){
        $editData = RoomAccessory::findOrFail($id);
        return view('backend.roomaccessories.edit_roomaccessories',compact('editData'));
    }// End Method

    public function UpdateAccessories(Request $request){
        $validateData = $request->validate([
            'room_accessories_name' => 'required',
        ],
        [
            'room_accessories_name.required' => 'Please Input Room Aaccessories Name',
        ]);
        $room = $request->id;

        RoomAccessory::findOrFail($room)->update([
            'room_accessories_name' => $request->room_accessories_name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('accessories.view')->with($notification);
    } // End Method

    public function DeleteAccessories($id){
        RoomAccessory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}
