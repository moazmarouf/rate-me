<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('created_at','DESC')->paginate(8);
        return view('dashboard.categories.index',compact('categories'));
    }
    public function create(CategoryRequest $request){
        Category::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back()->with(['success'=>'تم الاضافه بنجاح']);
    }
    public function update(Request $request){
        $category = Category::find($request['id']);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect() ->back() ->with(['success' => 'تم تحديث القسم بنجاح']);
    }
    public function delete(Request $request){
        $category = Category::find($request['id'])->delete();
        return redirect() ->back() ->with(['success' => 'تم حذف  القسم بنجاح']);
    }
}
