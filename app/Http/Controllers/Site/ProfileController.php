<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();
        return view('site.profile.index',compact('user'));
    }
    public function update(Request $request){


        $validator = Validator::make($request->all(),[
            'image' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        if($validator->passes()){
            $user = User::find($request['id']);
            $file = $request['image'];
            $path = "assets/uploads/stores/";
            $random = rand(1111, 9999);
            $name = rand(1111111, 9999999);
            $fileName = $random . '_' . $name . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $user->image = $request['image'];
            $user->name = $request['name'];
            $user->phone = $request['phone'];
            $user->email = $request['email'];
            $user->update();
            $msg = route('profile');

            return response()->json([
                'key' => 'success',
                'msg' => $msg
            ]);
            } else{
            foreach ((array)$validator->errors() as $value) {
                if(isset($value['image'])){
                    $msg = 'يجب ادخال الصوره الشخصيه ';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if(isset($value['name'])){
                    $msg = 'يجب ادخال الاسم ';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if(isset($value['phone'])){
                    $msg = 'يجب ادخال رقم الهاتف ';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if(isset($value['email'])){
                    $msg = 'يجب ادخال البريد الالكتروني ';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }

            }
        }



    }

    public function updatePassword(Request $request)
    {
            $validator2 = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required|min:6|confirmed',
            ], [
                'old_password.required' => 'كلمه المرور القديمه مطلوبه',
                'password.required' => ' كلمه المرور الجديده مطلوبه',
                'password.min' => ' كلمه المرور يجب ان لا تقل عن 6 حروف',
                'password.confirmed' => 'كلمه الجديده المرور غير متطابقه',
            ]);


            if ($validator2->passes()) {
                $user = auth()->user();
                if (Hash::check($request['old_password'], $user->password)) {
                    $user->update([
                        $user->password => Hash::make($request['password'])
                    ]);
                    $msg = route('profile');
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
                foreach ((array)$validator2->errors() as $value) {
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
