<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            foreach((array)$validator->error as $value){
                if(isset($value['image'])){
                    $msg = 'يجب ادخال صوره المنتج ';
                    return response()->json([
                       'key' => 'fail',
                       'message' => $msg
                    ]);
                }
            }
        }

    }
}
