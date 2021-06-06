<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;


Route::group(['middleware' => 'api'], function(){

    // all contacts
 Route::get("/contact",function(){
    return Contact::latest()->orderby('created_at', 'desc')->get();
 });

 //single contact
 Route::get("/contact/{id?}",function($id = null){
    return Contact::findorfail($id);
 });

 Route::post("/contact/store", function(Request $request){
     return Contact::create(['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone]);
 });


 //update
 Route::patch("/contact/{id?}", function(Request $request,$id = null){
     Contact::findorfail($id)->update(['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone]);
});

//destory
Route::delete('/contact/{id?}', function($id = null){
    return Contact::destroy($id);
});


});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
