<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RoomNum;
use App\Models\RoomAccessory;
use App\Models\Apartment;
use App\Models\Block;
use Auth;
use DB;
use Illuminate\Validation\Rule;

class RoomNumController extends Controller
{
    public function ViewRoomNum(){
        $allData = RoomNum::orderBy('id','DESC')->get();
        return view('backend.roomnumb.index',compact('allData'));
    } // End Method

    public function AddRoomNum(){
        $apartment = Apartment::orderBy('apartment_name','ASC')->get();
        $block = Block::orderBy('block_num','ASC')->get();
        $roomaccessory = RoomAccessory::orderBy('room_accessories_name')->first();
        return view('backend.roomnumb.add_roomnumb',compact('roomaccessory','block','apartment'));
   } // End Method

    public function StoreRoomNum(Request $request){
        $data = $request->validate([
            'room_num' => [
                Rule::unique('room_nums')
                ->where('block_id', $request->input('block_id'))
                ->where('room_num', $request->input('room_num')),

            'apartment_id'       => 'required',
            'block_id'       => 'required',
            'room_num' => 'required',
            'room_accessories'    =>  'required',
        ],
        [
            'apartment_id.required' => 'Please Input Apartment Name',
            'block_id.required' => 'Please Input Block Num',
            'room_num.required' => 'Please Input Room Num',
            'room_accessories.required' => 'Please Input Home Accessories',
            ]
        ]);
        $data['apartment_id'] = $request->apartment_id;
        $data['block_id'] = $request->block_id;
        $data['room_accessories'] = str_replace('"', '', $request->room_accessories);
        $RoomNum = RoomNum::create($data);

        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
    );
        return redirect()->route('room.view')->with($notification);
    }// End Method

    public function GetBlock($apartment_id){
        $apartment = Block::where('apartment_id',$apartment_id)->orderBy('block_num','ASC')->get();
        return json_encode($apartment);
    }

    public function GetRoom($block_id){
        $apartment = RoomNum::where('block_id',$block_id)->orderBy('room_num','ASC')->get();
        return json_encode($apartment);
    }

    public function EditRoomNum($id){
        $apartment = Apartment::orderBy('apartment_name','ASC')->get();
        $block = Block::orderBy('block_num','ASC')->get();
        $roomaccessory = RoomAccessory::orderBy('room_accessories_name')->first();
        $editData = RoomNum::findOrFail($id);
        return view('backend.roomnumb.edit_roomnumb',compact('editData','block','roomaccessory','apartment'));
    }// End Method

    public function UpdateRoomNum (Request $request, $id){
        $data = $request->validate([
            'apartment_id'       => 'required',
            'block_id'       => 'required',
            'room_num'       => 'required',
            'room_accessories'    =>  'required',
        ],
        [
            'apartment_id.required' => 'Please Input Apartment Name',
            'block_id.required' => 'Please Input Block Num',
            'room_num.required' => 'Please Input Room Num',
            'room_accessories.required' => 'Please Input Home Accessories',
        ]);

        $data = array();
        $data['apartment_id'] = $request->apartment_id;
        $data['room_num'] = $request->room_num;
        $data['block_id'] = $request->block_id;
        $data['room_accessories'] = str_replace('"', '', $request->room_accessories);
        $data['updated_at'] = Carbon::now();


        DB::table('room_nums')->where('id',$id)->update($data);
        $notification = array(
        'message' => 'Updated Successfully',
        'alert-type' => 'info'
        );
        return Redirect()->route('room.view')->with($notification);
        } //End Method

    public function DeleteRoomNum($id){
        RoomNum::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}

