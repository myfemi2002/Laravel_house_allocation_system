<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Office;
use Auth;

class OfficeController extends Controller
{
    public function ViewOffice(){
        $allData = Office::orderBy('id','DESC')->paginate(10);
        return view('backend.office.index',compact('allData'));
    } // End Method

    public function AddOffice(){
        return view('backend.office.add_office');
   } // End Method

    public function StoreOffice(Request $request){
        $validateData = $request->validate([
            'office_name' => 'required|unique:offices',
        ],
        [
            'office_name.required' => 'Please Input Office Name',
        ]);

        Office::insert([
            'office_name' => $request->office_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('office.view')->with($notification);
    }// End Method

    public function EditOffice($id){
        $editData = Office::findOrFail($id);
        return view('backend.office.edit_office',compact('editData'));
    }// End Method

    public function UpdateOffice(Request $request){
        $validateData = $request->validate([
            'office_name' => 'required|unique:offices',
        ],
        [
            'office_name.required' => 'Please Input Office Name',
        ]);
        $office_id = $request->id;

        Office::findOrFail($office_id)->update([
            'office_name' => $request->office_name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('office.view')->with($notification);
    } // End Method

    public function DeleteOffice($id){
        Office::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}

