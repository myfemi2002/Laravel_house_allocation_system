<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Block;
use App\Models\Apartment;
use Auth;
use Illuminate\Validation\Rule;

class BlockController extends Controller
{
    public function ViewBlock(){
        $allData = Block::orderBy('id','DESC')->paginate(10);
        return view('backend.block.index',compact('allData'));
    } // End Method

    public function AddBlock(){
        $apartment = Apartment::orderBy('apartment_name','DESC')->get();
        return view('backend.block.add_block',compact('apartment'));
   } // End Method

    public function StoreBlock(Request $request){
        $validateData = $request->validate([
            'block_num' => [
                Rule::unique('blocks')
                ->where('apartment_id', $request->input('apartment_id'))
                ->where('block_num', $request->input('block_num')),
            'apartment_id' => 'required',
        ],
        [
            'apartment_id.required' => 'Please Input Apartment Name',
            'block_num.required' => 'Please Input Block Num',
            ]
        ]);

        Block::insert([
            'apartment_id' => $request->apartment_id,
            'block_num' => $request->block_num,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
        'message' => 'Added Successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('block.view')->with($notification);
    }// End Method

    public function EditBlock($id){
        $apartment = Apartment::orderBy('apartment_name','ASC')->get();
        $editData = Block::findOrFail($id);
        return view('backend.block.edit_block',compact('editData','apartment'));
    }// End Method

    public function UpdateBlock(Request $request){
        $validateData = $request->validate([
            'apartment_id' => 'required',
            'block_num' => 'required',
        ],
        [
            'apartment_id.required' => 'Please Input Apartment Name',
            'block_num.required' => 'Please Input Block Num',
        ]);
        $block_id = $request->id;

        Block::findOrFail($block_id)->update([
            'apartment_id' => $request->apartment_id,
            'block_num' => $request->block_num,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('block.view')->with($notification);
    } // End Method

    public function DeleteBlock($id){
        Block::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Method
}
