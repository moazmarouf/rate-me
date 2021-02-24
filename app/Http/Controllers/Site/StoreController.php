<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePasswordRequest;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('site.stores.index',compact('user'));
    }
    public function updateStore(StoreUpdateRequest $request){
      $store = Store::find($request['id']);
        $file = $request->file('image');
        $path = "assets/uploads/stores/";
        $random = rand(1111,9999);
        $name = rand(1111111,9999999);
        $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
        $file->move($path, $fileName);
      $store->update([
          'store_name' => $request->store_name,
          'store_location' => $request->store_location,
          'events' => $request->events,
          'conduction' => $request->conduction,
          'image' => $fileName
      ]);
        return redirect()->back()->with(['success' => 'تم تعديل  المتجر بنجاح']);
  }

  public function updateStorePassword(Request $request){

      $validator = Validator::make($request->all(), [
          'old_password' => 'required',
          'password' => 'required|min:6|confirmed',
      ], [
          'old_password.required' => 'كلمه المرور القديمه مطلوبه',
          'password.required' => ' كلمه المرور الجديده مطلوبه',
          'password.min' => ' كلمه المرور يجب ان لا تقل عن 6 حروف',
          'password.confirmed' => 'كلمه الجديده المرور غير متطابقه',
      ]);


      if ($validator->passes()) {
          $store = Store::find($request['id']);
          if (Hash::check($request['old_password'], $store->password)) {
              $store->update([
                  $store->password => Hash::make($request['password'])
              ]);
              $msg = route('company-info.index');
              return response()->json([
                  'key' => 'success',
                  'msg' => $msg
              ]);
          } else {
              $msg = 'كلمه المرور القديمه غير صحيحه';
              return response()->json([
                  'key' => 'fail',
                  'msg' => $msg
              ]);
          }
      }else{
          foreach ((array)$validator->errors() as $value) {
              if(isset($value['old_password'])){
                  $msg = $value['old_password'][0];
                  return response()->json([
                      'key' => 'fail',
                      'msg' => $msg
                  ]);
              }
              if(isset($value['password'])){
                  $msg = $value['password'][0];
                  return response()->json([
                      'key' => 'fail',
                      'msg' => $msg
                  ]);
              }
//
          }
      }
  }
}
