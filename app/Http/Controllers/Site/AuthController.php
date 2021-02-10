<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function home()
    {
        return view('layouts.site-master');
    }

    public function login()
    {
        return view('site.auth.login');
    }

    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required'
        ]);
        if ($validator->passes()) {
            if (!Auth::attempt(['phone' => $request['phone'], 'password' => $request['password']])) {
                $msg = "رقم الجوال أو كلمه المرور غير صحيحه.";
                return response()->json([
                    'key' => 'fail',
                    'msg' => $msg
                ]);
            }
            $user = User::where('phone', $request['phone'])->first();
            Auth::login($user);

            $msg = route('home');
            return response()->json([
                'key' => 'success',
                'msg' => $msg
            ]);
        } else {
            foreach ((array)$validator->errors() as $value) {
                if (isset($value['phone'])) {
                    $msg = 'رقم الهاتف مطلوب ';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } elseif (isset($value['password'])) {
                    $msg = 'كلمه المرور مطلوبه';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
            }
        }

    }

    public function register()
    {
        return view('site.auth.register');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'commercial-register' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->passes()) {
            $emailUsed = User::where('email', $request['email'])->first();
            if ($emailUsed) {
                $msg = 'البريد الالكتروني مستخدم من قبل';
                return response()->json([
                    'key' => 'fail',
                    'msg' => $msg
                ]);
            }
            $phoneUsed = User::where('phone', $request['phone'])->first();
            if ($phoneUsed) {
                $msg = 'رقم الجوال مستخدم من قبل';
                return response()->json([
                    'key' => 'fail',
                    'msg' => $msg
                ]);
            }
            $v_code = rand(1111, 9999);
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->password = $request['password'];
            $user->commercial_register = $request['commercial_register'];
            $user->v_code = $v_code;
            $user->save();
            Auth::login($user);

            $msg = route('confirmation');
            return response()->json([
                'key' => 'success',
                'msg' => $msg
            ]);
        } else {
            foreach ((array)$validator->errors() as $value) {
                if (isset($value['name'])) {
                    $msg = 'اسم المستخدم مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if (isset($value['phone'])) {
                    $msg = 'رقم الجوال مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if (isset($value['email'])) {
                    $msg = 'البريد الالكتروني مطلوب ';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if (isset($value['commercial-register'])) {
                    $msg = 'يرجي ادخال السجل التجاري';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if (isset($value['password'])) {
                    $msg = 'كلمه المرور مطلوبه';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                if (isset($value['password_confirmation'])) {
                    $msg = 'يجب تطابق كلمتي المرور';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
            }
        }

    }

    public function confirmation()
    {
        return view('site.auth.confirmation');
    }

    public function postConfirmation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'v_code' => 'required',
        ]);
        if ($validator->passes()) {

            $user =Auth::user();
            if ($request['v_code'] != $user->v_code) {
                $msg = 'كود التأكيد خاطئ';
                return response()->json([
                    'key' => 'fail',
                    'msg' => $msg
                ]);
            }
            $user->isConfirmed = 1;
            $user->v_code = '';
            $user->update();

            $msg = route('home');
            return response()->json([
                'key' => 'success',
                'msg' => $msg
            ]);
        } else {
            foreach ((array)$validator->errors() as $value) {
                if (isset($value['v_code'])) {
                    $msg = 'كود التأكيد مطلوب';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                } else {
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key' => 'fail',
                        'msg' => $msg,
                    ]);
                }
        }
        }
        }

        public  function logout()
        {
            Auth::logout();
            return redirect()->route('user.login');
        }
   public function forgotPassword() {
        return view('site.auth.forgotpassword');
   }
   public function postForgotPassword(Request $request){
        $validator = Validator::make($request->all(),[
            'phone' => 'required',
        ]);
        if($validator->passes()){
            $user = User::where('phone',$request['phone'])->first();
            if(!$user){
                $msg = 'رقم الجوال غير صحيح';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            $v_code = rand(1111,9999);
            $user->v_code = $v_code;
            $user->save();
            $user->update();
            Session::put('forgotpassword',$user);

            $msg = route('password.reset');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);
        }
        else{
            foreach((array)$validator->errors() as $value){
            if(isset($value['phone'])){
                $msg = 'رقم الجوال مطلوب';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
        }
   }
   }
   public function restPassword(){
        if(!Session::has('forgotpassword')){
            return redirect() ->route('password.forgot');
        }
        return view('site.auth.reset_password');
   }
    public function postResetPassword(Request $request){
        $validator=Validator::make($request->all(),[
            'v_code' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->passes()){

            if(!Session::has('forgotpassword')){
                $msg = route('password.forgot');
                return response()->json([
                    'key'   => 'success',
                    'msg' => $msg
                ]);
            }

            $user = Session::get('forgotpassword');
            if($user->v_code != $request['v_code']){
                $msg = 'كود التفعيل خاطئ';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }

            $user->password = bcrypt($request['password']);
            $user->v_code = '';
            $user->update();

            $msg = route('user.login');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
                if(isset($value['v_code'])){
                    $msg = 'كود التأكيد مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password'])) {
                    $msg = 'يجب ألا تقل كلمه المرور عن ٦ حروف';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password_confirmation'])) {
                    $msg = 'يجب تطابق كلمتي المرور';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }
            }
        }
    }
}


