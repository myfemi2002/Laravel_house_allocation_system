<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Apartment;
use Auth;

class ApartmentController extends Controller
{
    public function ViewApartment(){
        $allData = Apartment::latest()->paginate(6);
        return view('backend.apartment.index',compact('allData'));
    } // End Method

    public function AddApartment(){
        return view('backend.apartment.add_apartment');
   } // End Method

    public function StoreApartment(Request $request){
        $validateData = $request->validate([
            'apartment_name' => 'required|unique:apartments',
        ],
        [
            'apartment_name.required' => 'Please Input apartment Name',
        ]);

        Apartment::insert([
            'apartment_name' => $request->apartment_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('apartment.view')->with($notification);
    }// End Method

    public function EditApartment($id){
        $editData = Apartment::findOrFail($id);
        return view('backend.apartment.edit_apartment',compact('editData'));
    }// End Method

    public function UpdateApartment(Request $request){
        $validateData = $request->validate([
            'apartment_name' => 'required|unique:apartments',
        ],
        [
            'apartment_name.required' => 'Please Input apartment Name',
        ]);
        $apartment = $request->id;

        Apartment::findOrFail($apartment)->update([
            'apartment_name' => $request->apartment_name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('apartment.view')->with($notification);
    } // End Method

    public function DeleteApartment($id){
        Apartment::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}
