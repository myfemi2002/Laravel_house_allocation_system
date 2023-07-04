<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomNumController;
use App\Http\Controllers\ShopNumController;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AssignRoomController;
use App\Http\Controllers\OfficeNumbController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\RoomAccessoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Prevent Back Starts Here
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Start Middleware
Route::middleware('auth')->group(function(){

// Admin Management All Routes Starts
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
    Route::get('/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

}); // Admin Management All Routes Ends

// All Login Route
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
Route::get('/manager/login', [ManagerController::class, 'ManagerLogin'])->name('manager.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login')->middleware(RedirectIfAuthenticated::class);

// Manager Dashboard Management All Routes Starts
Route::prefix('manager')->middleware(['auth','role:manager'])->group(function() {

    Route::get('/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashobard');
    Route::get('/logout', [ManagerController::class, 'ManagerDestroy'])->name('manager.logout');

    Route::get('/profile', [ManagerController::class, 'ManagerProfile'])->name('manager.profile');
    Route::post('/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
    Route::get('/change/password', [ManagerController::class, 'ManagerChangePassword'])->name('manager.change.password');
    Route::post('/update/password', [ManagerController::class, 'ManagerUpdatePassword'])->name('manager.update.password');

}); // Manager End Middleware

// User Dashboard Management All Routes Starts
Route::prefix('user')->middleware(['auth','role:user'])->group(function() {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashobard');
    Route::get('/logout', [UserController::class, 'UserDestroy'])->name('user.logout');

    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');

}); // Manager End Middleware



Route::middleware(['auth','role:admin'])->group(function() {

    //  All Apartment NAme Route Starts Here
    Route::prefix('apartment')->controller(ApartmentController::class)->group(function(){
        Route::get('/view' , 'ViewApartment')->name('apartment.view');
        Route::get('/add' , 'AddApartment')->name('apartment.add');
        Route::post('/store' , 'StoreApartment')->name('apartment.store');
        Route::get('/edit/{id}' , 'EditApartment')->name('apartment.edit');
        Route::post('/update' , 'UpdateApartment')->name('apartment.update');
        Route::get('/delete/{id}' , 'DeleteApartment')->name('apartment.delete');
    }); //All Apartment NAme Route Ends Here

//  All Block Route Starts Here
    Route::prefix('block')->controller(BlockController::class)->group(function(){
        Route::get('/view' , 'ViewBlock')->name('block.view');
        Route::get('/add' , 'AddBlock')->name('block.add');
        Route::post('/store' , 'StoreBlock')->name('block.store');
        Route::get('/edit/{id}' , 'EditBlock')->name('block.edit');
        Route::post('/update' , 'UpdateBlock')->name('block.update');
        Route::get('/delete/{id}' , 'DeleteBlock')->name('block.delete');
    }); //  All Block Route Ends Here

//  All Shop Route Starts Here
Route::prefix('shop')->controller(ShopController::class)->group(function(){
    Route::get('/view' , 'ViewShop')->name('shop.view');
    Route::get('/add' , 'AddShop')->name('shop.add');
    Route::post('/store' , 'StoreShop')->name('shop.store');
    Route::get('/edit/{id}' , 'EditShop')->name('shop.edit');
    Route::post('/update' , 'UpdateShop')->name('shop.update');
    Route::get('/delete/{id}' , 'DeleteShop')->name('shop.delete');
}); //  All Shop Route Ends Here

//  All Shop Numb Route Starts Here
Route::prefix('shop-numb')->controller(ShopNumController::class)->group(function(){
    Route::get('/view' , 'ViewShopNumb')->name('shopnumb.view');
    Route::get('/add' , 'AddShopNumb')->name('shopnumb.add');
    Route::post('/store' , 'StoreShopNumb')->name('shopnumb.store');
    Route::get('/edit/{id}' , 'EditShopNumb')->name('shopnumb.edit');
    Route::post('/update' , 'UpdateShopNumb')->name('shopnumb.update');
    Route::get('/delete/{id}' , 'DeleteShopNumb')->name('shopnumb.delete');
}); //  All Shop Route Ends Here

//  All Room Numb Route Starts Here
Route::prefix('room-numb')->controller(RoomNumController::class)->group(function(){
    Route::get('/view' , 'ViewRoomNum')->name('room.view');
    Route::get('/add' , 'AddRoomNum')->name('room.add');
    Route::post('/store' , 'StoreRoomNum')->name('room.store');
    Route::get('/edit/{id}' , 'EditRoomNum')->name('room.edit');
    Route::post('/update/{id}' , 'UpdateRoomNum')->name('room.update');
    Route::get('/delete/{id}' , 'DeleteRoomNum')->name('room.delete');
    Route::get('/ajax/{apartment_id}', 'GetBlock');

}); //  All Shop Route Ends Here

//  All Room Numb Route Starts Here
Route::prefix('accessories')->controller(RoomAccessoriesController::class)->group(function(){
    Route::get('/view' , 'ViewAccessories')->name('accessories.view');
    Route::get('/add' , 'AddAccessories')->name('accessories.add');
    Route::post('/store' , 'StoreAccessories')->name('accessories.store');
    Route::get('/edit/{id}' , 'EditAccessories')->name('accessories.edit');
    Route::post('/update' , 'UpdateAccessories')->name('accessories.update');
    Route::get('/delete/{id}' , 'DeleteAccessories')->name('accessories.delete');
}); //  All Shop Route Ends Here





//  All Office Route Starts Here
Route::prefix('office')->controller(OfficeController::class)->group(function(){
    Route::get('/view' , 'ViewOffice')->name('office.view');
    Route::get('/add' , 'AddOffice')->name('office.add');
    Route::post('/store' , 'StoreOffice')->name('office.store');
    Route::get('/edit/{id}' , 'EditOffice')->name('office.edit');
    Route::post('/update' , 'UpdateOffice')->name('office.update');
    Route::get('/delete/{id}' , 'DeleteOffice')->name('office.delete');
}); //  All Block Route Ends Here

//  All Office Numb Route Starts Here
Route::prefix('office-numb')->controller(OfficeNumbController::class)->group(function(){
    Route::get('/view' , 'ViewOfficeNumb')->name('officenumb.view');
    Route::get('/add' , 'AddOfficeNumb')->name('officenumb.add');
    Route::post('/store' , 'StoreOfficeNumb')->name('officenumb.store');
    Route::get('/edit/{id}' , 'EditOfficeNumb')->name('officenumb.edit');
    Route::post('/update' , 'UpdateOfficeNumb')->name('officenumb.update');
    Route::get('/delete/{id}' , 'DeleteOfficeNumb')->name('officenumb.delete');
}); //  All Block Route Ends Here

//  All Assign Room Route Starts Here
Route::prefix('assign-occupant-room')->controller(AssignRoomController::class)->group(function(){
    Route::get('/view' , 'ViewAssignRoom')->name('assign.view');
    Route::get('/add/{id}' , 'AssignRoom')->name('assign.room');
    // Route::post('/add' , 'AddAssignRoom')->name('assign.add');


    Route::get('/pending-list', 'AssignRoomPendingList')->name('assign.pending.list');
    Route::get('/approved-list', 'AssignRoomApprovedList')->name('assign.approved.list');


    Route::get('/approve/{id}',  'AssignRoomApprove')->name('assign.approve');
    Route::post('/approve-storez', 'AssignRoomApprovalStore')->name('assign.approval.store');


    Route::get('/approved-edit/{id}' , 'AssignEditRoomApproval')->name('assign.approved.edit');
    Route::post('/approved-update' , 'AssignUpdateRoomApproval')->name('assign.approved.update');



    Route::post('/store' , 'StoreAssignRoom')->name('assign.store');
    Route::get('/edit/{id}' , 'EditAssignRoom')->name('assign.edit');
    Route::post('/update' , 'UpdateAssignRoom')->name('assign.update');
    Route::get('/delete/{id}' , 'DeleteAssignRoom')->name('assign.delete');

    // Route::get('/ajax/{apartment_id}', 'GetBlock');
    Route::get('/ajax/{block_id}', 'GetRoom');
}); //  All Assign Room  Route Ends Here

//  All occupant Route Starts Here
Route::prefix('occupant')->controller(OccupantController::class)->group(function(){
    Route::get('/view' , 'ViewOccupant')->name('occupant.view');
    Route::get('/detail/{id}' , 'DetailOccupant')->name('occupant.details');

    Route::get('/add' , 'AddOccupant')->name('occupant.add');
    Route::post('/store' , 'StoreOccupant')->name('occupant.store');
    Route::get('/edit/{id}' , 'EditOccupant')->name('occupant.edit');
    Route::post('/update' , 'UpdateOccupant')->name('occupant.update');
    Route::get('/delete/{id}' , 'DeleteOccupant')->name('occupant.delete');
}); //  All occupant Route  Ends Here


//  All Approve Message Route Starts Here
Route::prefix('message')->controller(MessageController::class)->group(function(){
    Route::get('/view' , 'ViewMessage')->name('message.view');
    Route::get('/send/{id}' , 'SendMessage')->name('send.mail');
    Route::post('/store/{id}' , 'StoreSingleMessage')->name('message.store'); // Send message to single occupant
    Route::get('/sent-messages' , 'ViewSentMessage')->name('sent-message.view');


    Route::get('/edit/{id}' , 'EditMessage')->name('message.edit');
    Route::post('/update' , 'UpdateMessage')->name('message.update');
    Route::get('/delete/{id}' , 'DeleteMessage')->name('message.delete');
}); //  All Approve Message  Route Ends Here






}); // Admin End Middleware
}); //prevent-back-history








































}); //End Middleware
