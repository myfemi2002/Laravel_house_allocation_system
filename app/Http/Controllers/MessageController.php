<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\RoomNum;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Notifications\ApprovedNotification;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    public function ViewMessage(){
        $allData = RoomNum::orderBy('id','desc')->where('msg_status','2')->get();
            return view('backend.message.index',compact('allData'));
    } // End Method


    public function ViewSentMessage(){
        $allData = RoomNum::orderBy('id','desc')->where('msg_status','1')->get();
            return view('backend.message.sent_messages',compact('allData'));
    } // End Method


    public function SendMessage($id){
        $messageData = RoomNum::findOrFail($id);
        return view('backend.message.send_message',compact('messageData'));
    }// End Method

    public function StoreSingleMessage(Request $request, $id){
        // This line update the Message Status from 2 to 1
        RoomNum::findOrFail($id)->update([
            'msg_status' => '1',
            'date_sent' => Carbon::now()
            ]);

        $allData = RoomNum::findOrFail($id);
        $approvedmessage = array();
        $approvedmessage['greeting'] = $request->greeting;
        $approvedmessage['body'] = $request->body;
        $approvedmessage['actiontext'] = $request->actiontext;
        $approvedmessage['actionurl'] = $request->actionurl;
        $approvedmessage['endtext'] = $request->endtext;

        Notification::send($allData, new ApprovedNotification($approvedmessage));

        $notification = array(
            'message' => 'Message Sent Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('message.view')->with($notification);
    } //End Method
}
