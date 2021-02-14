<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('site.category.index',compact('categories'));
    }
    public function create(CategoryRequest $request){
        Category::create([
           'name' => $request->name,
           'user_id' => auth()->user()->id
        ]);
        return redirect()->back()->with(['success'=>'تم الاضافه بنجاح']);
    }
    public function update(CategoryRequest $request,$id){
       $category = Category::find($id);
       $category->update($request->all());
        return redirect()->back()->with(['success'=>'تم التعديل  بنجاح']);

    }
    public function delete($id){
        Category::find($id)->delete();
        return redirect()->back()->with(['success'=>'تم الحذف  بنجاح']);

    }


}
