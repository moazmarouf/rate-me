<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessage()
    {
        $messages = Message::orderBy('created_at', 'DESC')->where('type', 1)->paginate(8);
        foreach ($messages as $message) {
            $message->seen = 1;
            $message->update();
        }
        return view('dashboard.messages.index',compact('messages'));
    }
    public function getComplains(Request $request)
    {
        $messages = Message::orderBy('created_at','desc')->where('type',2)->paginate(8);
        foreach($messages as $message){
            $message->seen = 1;
            $message->update();
        }
            return view('dashboard.complains.index',compact('messages'));
    }
    public function changeReplayedMessage(Request $request)
    {
        $message = Message::find($request['id']);
        if($message->replayed == 0){
            $message->replayed =1;
        }else{
            $message->replayed =0;
        }
        $message->update();

        return response()->json($message->replayed);
    }
    public function delete(Request $request){
        $message = Message::find($request['id']);
        $message->delete();
        return redirect() ->back() ->with(['success' => 'تم حذف الرساله بنجاج']);
    }

}
