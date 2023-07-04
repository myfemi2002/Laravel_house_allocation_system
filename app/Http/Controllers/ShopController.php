<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Shop;
use Auth;

class ShopController extends Controller
{
    public function ViewShop(){
        $allData = Shop::latest()->paginate(6);
        return view('backend.shop.index',compact('allData'));
    } // End Method

    public function AddShop(){
        return view('backend.shop.add_shop');
   } // End Method

    public function StoreShop(Request $request){
        $validateData = $request->validate([
            'shop_name' => 'required|unique:shops',
        ],
        [
            'shop_name.required' => 'Please Input Shop Name',
        ]);

        Shop::insert([
            'shop_name' => $request->shop_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('shop.view')->with($notification);
    }// End Method

    public function EditShop($id){
        $editData = Shop::findOrFail($id);
        return view('backend.shop.edit_shop',compact('editData'));
    }// End Method

    public function UpdateShop(Request $request){
        $validateData = $request->validate([
            'shop_name' => 'required|unique:shops',
        ],
        [
            'shop_name.required' => 'Please Input Shop Name',
        ]);
        $shop = $request->id;

        Shop::findOrFail($shop)->update([
            'shop_name' => $request->shop_name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('shop.view')->with($notification);
    } // End Method

    public function DeleteShop($id){
        Shop::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}
