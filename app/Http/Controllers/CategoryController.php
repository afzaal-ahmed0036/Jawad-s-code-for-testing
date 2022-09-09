<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index' , compact('categories'));
    }

    public function storeCategory(Request $request)
     {
           $validate = $request->validate([

            'category_name' => 'required',
           ]);

           Category::insert([
            'category_name' => $request->category_name,
            'user_id'       => Auth::user()->id,
            'created_at'     =>  Carbon::now(),
           ]);
           return redirect()->route('all.category')->with('success' , 'Category Added Successfully');
     }

     public function editCategory($id)
     {
       
        $category = Category::find($id);
        return view('admin.category.edit' , compact('category'));
     }

     public function updateCategory(Request $request , $id)
     {
        $validate = $request->validate([

            'category_name' => 'required',
           ]);

           Category::where('id' , $id)->update([

            'category_name' => $request->category_name,
             'user_id'      => Auth::user()->id,
           ]);
           return redirect()->route('all.category')->with('success' , 'Category updated successfully');
     }
}
