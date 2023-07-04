<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ShopNum;
use Auth;

class ShopNumController extends Controller
{
    public function ViewShopNumb(){
        $allData = ShopNum::latest()->paginate(6);
        return view('backend.shopnumb.index',compact('allData'));
    } // End Method

    public function AddShopNumb(){
        return view('backend.shopnumb.add_shopnumb');
   } // End Method

    public function StoreShopNumb(Request $request){
        $validateData = $request->validate([
            'shop_numb' => 'required|unique:shop_nums',
        ],
        [
            'shop_numb.required' => 'Please Input Shop Num',
        ]);

        ShopNum::insert([
            'shop_numb' => $request->shop_numb,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('shopnumb.view')->with($notification);
    }// End Method

    public function EditShopNumb($id){
        $editData = ShopNum::findOrFail($id);
        return view('backend.shopnumb.edit_shopnumb',compact('editData'));
    }// End Method

    public function UpdateShopNumb(Request $request){
        $validateData = $request->validate([
            'shop_numb' => 'required|unique:shop_nums',
        ],
        [
            'shop_numb.required' => 'Please Input Shop Num',
        ]);
        
        $shopnumb = $request->id;

        ShopNum::findOrFail($shopnumb)->update([
            'shop_numb' => $request->shop_numb,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('shopnumb.view')->with($notification);
    } // End Method

    public function DeleteShopNumb($id){
        ShopNum::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}
