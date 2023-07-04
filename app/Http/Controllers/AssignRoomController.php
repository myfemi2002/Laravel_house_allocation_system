<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Block;
use App\Models\RoomNum;
use App\Models\Apartment;
use App\Mail\ApprovedMail;
use App\Models\AssignRoom;
use Illuminate\Http\Request;
use App\Models\RoomAccessory;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Image;


class AssignRoomController extends Controller
{

    public function ViewAssignRoom(){
        $allData = RoomNum::where('room_status','0')->get();
        return view('backend.assign_room.index',compact('allData'));
    } // End Method

    public function AssignRoom ($id){
        $assignData = RoomNum::findOrFail($id);
        return view('backend.assign_room.add_assign_room',compact('assignData'));
    }// End Method

    public function StoreAssignRoom(Request $request){
        $validateData = $request->validate([
            'firstname' => 'required',
            'othername' => 'required',
            'surname' => 'required',
            'pow' => 'required',
            'department' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'remarks' => 'required',
            'photo_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ],
            [
            'firstname.required' => 'Please Input firstname',
            'othername.required' => 'Please Input othername',
            'surname.required' => 'Please Input surname',
            'pow.required' => 'Please Input Place Of Work',
            'department.required' => 'Please Input department',
            'dob.required' => 'Please Input date of birth',

            'phone.required' => 'Please Input phone Numb',
            'email.required' => 'Please Input email',
            'remarks.required' => 'Please Input remarks',
            'photo_image.min' => 'Package Image Longer Than 4 Characters',
        ]);

        $image = $request->file('photo_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(600,520)->save('upload/occupant_images/'.$name_gen);
        $save_url = 'upload/occupant_images/'.$name_gen;

        $assignData = $request->id;
        RoomNum::findOrFail($assignData)->update([
            'firstname' => $request->firstname,
            'othername' => $request->othername,
            'surname' => $request->surname,
            'pow' => $request->pow,
            'department' => $request->department,
            'room_status' => '2',
            'phone' => $request->phone,
            'dob' => $request->dob,
            'email' => $request->email,
            'photo_image' => $save_url ,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('assign.view')->with($notification);
    }// End Method

    public function AssignRoomApprovedList(){
        $allData = RoomNum::where('room_status','1')->get();
        // $allData = RoomNum::get();
        return view('backend.assign_room.approved_list',compact('allData'));
    } // End Method

    public function AssignRoomPendingList(){
        $allData = RoomNum::orderBy('id','desc')->where('room_status','2')->get();
            return view('backend.assign_room.pending_list',compact('allData'));
    } // End Method

    public function AssignRoomApprove($id){
        // This line update the Status from 0 to 1
        RoomNum::findOrFail($id)->update([
            'room_status' => '1',
            'status' => '1',
            'msg_status' => '2',
            ]);

            $notification = array(
            'message' => 'Approved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.pending.list')->with($notification);
        }

    public function GetBlock($apartment_id){
        $apartment = Block::where('apartment_id',$apartment_id)->orderBy('block_num','ASC')->get();
        return json_encode($apartment);
    } //End Method

    public function GetRoom($block_id){
        $apartment = RoomNum::where('block_id',$block_id)->orderBy('room_num','ASC')->get();
        return json_encode($apartment);
    }
}
