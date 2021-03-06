<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Addition;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $addition = Addition::all();
        $categories = Category::all();
        $products = Product::all();
        return view('site.products.index', compact('categories','addition','products'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'meal_details' => 'required',
            'minimum' => 'required',
            'offer' => 'required',
        ]);
        if ($validator->passes()) {
            $file = $request->file('image');
            $path = "assets/uploads/products/";
            $random = rand(1111, 9999);
            $name = rand(1111111, 9999999);
            $fileName = $random . '_' . $name . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $category = Category::find($request['category_id']);

            $product = new Product();
            $product->image = $fileName;
            $product->name = $request['name'];
            $product->price = $request['price'];
            $product->offer = $request['offer'];
            $product->meal_details = $request['meal_details'];
            $product->minimum = $request['minimum'];
            $product->category_id = $category->id;
            $product->save();
            $keys = array_keys($request->addition_name);
            foreach ( $keys as  $key )
            {

                $product->additions()->create([
                    'addition_name' => $request->addition_name[$key],
                    'addition_price' =>$request->addition_price[$key]
                ]);
            }

            $msg = route('product.index');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);
        }
        else {
            foreach ((array)$validator->errors() as $value){
                if(isset($value['image'])){
                    $msg = 'يجب ادخال صوره المنتج ';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['name'])){
                    $msg = 'يجب ادخال اسم المنتج ';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['price'])){
                    $msg = 'يجب ادخال سعر المنتج ';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['meal_details'])){
                    $msg = 'يجب ادخال تفاصيل الوجبه';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['minimum'])){
                    $msg = 'يجب ادخال الحد الادني للمنتح';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['category_id'])){
                    $msg = 'يجب ادخال اسم القسم الرئيسي';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
            }
        }
        }
    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'meal_details' => 'required',
            'minimum' => 'required',
            'offer' => 'required',
        ]);
        if ($validator->passes()) {
            $category = Category::find($request['category_id']);
            if(!$category){
                return redirect()->back()->with(['fail'=>'لم يتم العثور علي هذا القسم']);
            }

            $product = Product::find($request['id']);
            if(!$product){
                return redirect()->back()->with(['fail'=>'لم يتم العثور علي هذا المنتج']);
            }

            if($request['image']){
                $file = $request->file('image');
                $path = "assets/uploads/products/";
                $random = rand(1111,9999);
                $name = rand(1111111,9999999);
                $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
                $file->move($path, $fileName);
            }


            $category = Category::find($request['category_id']);

            $product = new Product();
            $product->image = $fileName;
            $product->name = $request['name'];
            $product->price = $request['price'];
            $product->offer = $request['offer'];
            $product->meal_details = $request['meal_details'];
            $product->minimum = $request['minimum'];
            $product->category_id = $category->id;
            $product->update();
            return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
        }  else
            foreach ((array)$validator->errors() as $value){
                if(isset($value['image'])){
                    $msg = 'يجب ادخال صوره المنتج ';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['name'])){
                    $msg = 'يجب ادخال اسم المنتج ';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['price'])){
                    $msg = 'يجب ادخال سعر المنتج ';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['meal_details'])){
                    $msg = 'يجب ادخال تفاصيل الوجبه';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['minimum'])){
                    $msg = 'يجب ادخال الحد الادني للمنتح';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
                elseif(isset($value['category_id'])){
                    $msg = 'يجب ادخال اسم القسم الرئيسي';
                    return response() ->json([
                        'key' => 'fail',
                        'msg' => $msg
                    ]);
                }
            }








//            Product::update([
//            'name' => $request['name'],
//            'price' => $request['price'],
//            'meal_details' => $request['meal_details'],
//            'minimum' => $request['minimum'],
//            'offer' => $request['offer'],
//            'category_id' => $category->id,
//        ]);
//        if($request['addition_name']){
//            $keys = array_keys($request->addition_name);
//            foreach ( $keys as  $key )
//            {
//                $product->additions()->create([
//                    'addition_name' => $request->addition_name[$key],
//                    'addition_price' =>$request->addition_price[$key]
//                ]);
//            }
//        }

    }
    public function delete(Request $request) {
        $product = Product::find($request['id']);
        if(!$product){
            return redirect()->back()->with(['fail'=>'لم يتم العثور علي هذا المنتج']);
        }

        $product->delete();

        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }

}
