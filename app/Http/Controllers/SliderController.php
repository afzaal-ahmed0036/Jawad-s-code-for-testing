<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Slider;
use Carbon\Carbon;

class SliderController extends Controller
{
   public function homeSlider()
   {
    $sliders = Slider::all();
    return view('admin.slider.index' ,  compact('sliders'));
   }

   public function createSlider()
   {
    return view('admin.slider.create');
   }

   public function storeSlider(Request $request)
   {


    $image =  $request->file('image');

    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,200)->save('image/slider/'.$name_gen);
    $last_img = 'image/slider/'.$name_gen;

    Slider::insert([
        'title'       => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at'  => Carbon::now()
    ]);
     
    return Redirect()->route('home.slider')->with('success' , 'Slider Inserted successfully');

   }

   public function editSlider($id)
   {
    $slider = Slider::find($id);
    return view('admin.slider.edit' ,  compact('slider'));
   }

   public function updateSlider(Request $request , $id)
   {

    $old_image = $request->old_image;

    $image =  $request->file('image');

    if($image){
    
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/slider/';
    $last_img = $up_location.$img_name;
    $image->move($up_location,$img_name);

    // unlink(asset($old_image));
    Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at' => Carbon::now()
    ]);
   return redirect()->route('home.slider')->with('success' , 'Brand Updated successfully');
    }
     else{
    Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'created_at' => Carbon::now()
    ]);
     return redirect()->route('home.slider')->with('success' , 'Brand Updated successfully');

    }
 }

   public function deleteSlider($id)
   {
    $slider = Slider::find($id);
    $slider->delete();
    return redirect()->route('home.slider')-with('success' , 'Slider added successfully');
   }

}
