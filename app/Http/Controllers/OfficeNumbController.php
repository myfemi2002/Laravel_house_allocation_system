<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\OfficeNumb;
use Auth;

class OfficeNumbController extends Controller
{
    public function ViewOfficeNumb(){
        $allData = OfficeNumb::latest()->paginate(6);
        return view('backend.officenumb.index',compact('allData'));
    } // End Method

    public function AddOfficeNumb(){
        return view('backend.officenumb.add_officenumb');
   } // End Method

    public function StoreOfficeNumb(Request $request){
        $validateData = $request->validate([
            'office_numb' => 'required|unique:office_numbs',
        ],
        [
            'office_numb.required' => 'Please Input Office Num',
        ]);

        OfficeNumb::insert([
            'office_numb' => $request->office_numb,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('officenumb.view')->with($notification);
    }// End Method

    public function EditOfficeNumb($id){
        $editData = OfficeNumb::findOrFail($id);
        return view('backend.officenumb.edit_officenumb',compact('editData'));
    }// End Method

    public function UpdateOfficeNumb(Request $request){
        $validateData = $request->validate([
            'office_numb' => 'required|unique:office_numbs',
        ],
        [
            'office_numb.required' => 'Please Input Office Num',
        ]);
        $officenumb = $request->id;

        OfficeNumb::findOrFail($officenumb)->update([
            'office_numb' => $request->office_numb,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('officenumb.view')->with($notification);
    } // End Method

    public function DeleteOfficeNumb($id){
        OfficeNumb::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}

