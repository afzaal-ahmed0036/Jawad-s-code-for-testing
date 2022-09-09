<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Multipic;
use App\Models\Brand;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index' , compact('abouts'));
    }
    public function AdminAddabout()
    {
        return view('admin.about.create');
    }
    public function storeAbout(Request $request)
    {

        About::create($request->except('_token'));
        return redirect()->route('all.about')->with('success' , 'Record Updated Successfully');
    }
    public function AdminEditAbout($id)
    {
        $about = About::find($id);
       return view('admin.about.edit' , compact('about'));
    }
    public function updateAbout(Request $request ,  $id)
    {
   
        // $request = $request->validate([
        //     'title' => 'required',
        //     'short_des' => 'required',
        //     'long_des' => 'required',
        // ]);

        About::where('id' , $id)->update($request->except('_token'));
        return redirect()->route('all.about')->with('success' , 'Record Updated Successfully');
    }
    public function AdmindeleteAbout($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('all.about')->with('success' , 'Data Inserted Successfully');
    }

    public function Home()
    {
        $brands = Brand::all();
        $abouts = About::first();
        $images = Multipic::all();
    
       return view('home' , compact('brands' , 'abouts' , 'images'));
    }

    public function portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio' , compact('images'));
    }

}