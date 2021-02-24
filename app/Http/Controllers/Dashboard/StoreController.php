<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        $users = User::where('owner',0)->get();
        $stores = Store::orderBy('created_at','DESC')->paginate(10);
        return view('dashboard.stores.index',compact('stores','users'));
    }
    public function create(StoreRequest $request){
        $file = $request->file('image');
        $path = "assets/uploads/stores/";
        $random = rand(1111,9999);
        $name = rand(1111111,9999999);
        $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
        $file->move($path, $fileName);
        Store::create([
            'store_name' => $request->store_name,
            'image' => $fileName,
            'store_location' => $request->store_location,
            'events' => $request->events,
            'conduction' => $request->conduction,
            'password' => bcrypt($request->password),
            'user_id' => $request->user_id
        ]);
        $user  = User::find($request['user_id']);
//        dd($user);
        $user->owner =1;
        $user->update();
        return redirect()->back()->with(['success' => 'تم اضافه المتجر بنجاح']);
    }
    public function update (StoreRequest $request){
        $file = $request->file('image');
        $path = "assets/uploads/stores/";
        $random = rand(1111,9999);
        $name = rand(1111111,9999999);
        $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
        $file->move($path, $fileName);
        $store = Store::find($request['id']);
        $store->update([
            'store_name' => $request->store_name,
            'image' => $fileName,
            'store_location' => $request->store_location,
            'user_id' => $request->user_id,
            'events' => $request->events,
            'conduction' => $request->conduction,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->back()->with(['success' => 'تم تعديل المتجر بنجاح']);

    }
    public function delete(Request $request){
        $store = Store::find($request['id'])->delete();

        return redirect() ->back()->with(['success' => 'تم حذف المتجر بنجاج']);
    }
}
