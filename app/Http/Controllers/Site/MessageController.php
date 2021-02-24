<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        return view('site.message.index');
    }
    public function create(Request $request){
        $validator=Validator::make($request->all(),[
            'content' => 'required'
        ]);

        if($validator->passes()){
            Message::create([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'content' => $request['content']

            ]);

            $msg = route('home');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
             if(isset($value['content'])) {
                    $msg = 'المحتوي مطلوب';
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
