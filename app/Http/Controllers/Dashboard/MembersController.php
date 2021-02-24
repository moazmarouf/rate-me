<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MembersRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index(){
        $users  = User::where('is_Admin',0)->get();
        return view('dashboard.members.index',compact('users'));
    }
    public function create(MembersRequest $request){
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_Admin' => 0,
            'isConfirmed' =>0,
        ]);
        return redirect()->back()->with(['success' => 'تم اضافه العضو بنجاح']);
    }
    public function update(MemberUpdateRequest $request){
        $user = User::find($request['id']);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
    }
    public function delete(Request $request){
        User::find($request['id'])->delete();
        return redirect()->back()->with(['success' => 'تم حذف العضو بنجاح']);

    }
}
