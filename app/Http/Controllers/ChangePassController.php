<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Http\Controller\RoleController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Auth;



class ChangePassController extends Controller
{
    public function CPassword()
    {
        return view('admin.body.change_password');
    }
    public function UpdatePassword(Request $request)
    {
    
     $validate = $request->validate([
        'oldpassword' => 'required',
        'password'    => 'required|confirmed',

     ]);

     $hashedPassword = Auth::user()->password;
     if(Hash::check($request->oldpassword , $hashedPassword))
     {
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('success' , 'Password Updated Successfully');
     }else{
        return redirect()->back()->eith('error' , 'Current Password is Incoorect');
     }
    }
    public function profileUpdate(Request $request)
    {
  
       if(Auth::user())
       {
        $user = User::find(Auth::user()->id);
        if($user)
        {
           
            return view('admin.body.update_profile' , compact('user'));
        }
       }
    }

    public function userProfileUpdated(Request $request)
    {
       
       
         if(Auth::user())
         {
            dd($request->profile_photo_path);
            $user = User::find(Auth::user()->id);
            if($user)
            {
                $old_image = $request->old_image;
                $image =  $request->file('profile_photo_path');

                $validatedData = $request->validate([
                    'name'    => 'required|unique:users|min:3|max:25',
                    'email'   => 'required|unique:users|max:25',
                    'profile_photo_path' => 'required|mimes:jpg,jpeg,png',
                    
                ],
                [
                    'name.required' => 'Please Input Profile Name',
                    'image.min'     => 'Profile Longer then 4 Characters', 
                ]);

                if($image)
                {

                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      
                    Image::make($image)->resize(300,200)->save('image/profile/'.$name_gen);
            
                    $last_img = 'image/profile/'.$name_gen;
    
                    // $user->name = $request['name'];
                    // $user->email= $request['email'];

                    $user = User::find(auth()->user()->id);
                    $user2 = User::where('email',$request->email)->first();
                    if(!empty($user2) && $user2->id != $user->id){
                        return redirect()->route('Normaluser.profile')->with('error' , 'Email Already Exists');
                    }
                    
             
                    User::where('id' , Auth::user()->id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'profile_photo_path' => $last_img,
                        'created_at' => Carbon::now()
                    ]);
                    // $user->save();
                    return redirect()->route('profile.update')->with('success' , 'User Profile is Updated Successfully');
                }
                else{
                    
                    $user = User::find(auth()->user()->id);
                    $user2 = User::where('email',$request->email)->first();
                    if(!empty($user2) && $user2->id != $user->id){
                        return redirect()->route('Normaluser.profile')->with('error' , 'Email Already Exists');
                    }

                    User::where('id' , Auth::user()->id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'created_at' => Carbon::now()
                    ]);
                    // $user->save();
                    return redirect()->route('profile.update')->with('success' , 'User Profile is Updated Successfully');
                }
              
            }else{
                return redirect()->back();
            }
         }
    }

    public function NormalUserProfile()
    {
        $user = User::find(Auth::user()->id);
        if($user)
        {
            return view('pages.profile' , compact('user'));
        }
    }

    public function NormaluserProfileUpdated(Request $request)
    {
       
         if(Auth::user())
         {
            $user = User::find(Auth::user()->id);
            if($user)
            {
                $old_image = $request->old_image;
                $image =  $request->file('profile_photo_path');
               
                $validatedData = $request->validate([
                    // 'name' => 'required|unique:users|min:3|max:25',
                    'image' => 'mimes:jpg,jpeg,png',
                    // 'email' => 'required|unique:users|max:25',
                    
                ],
                [
                    'name.required' => 'Please Input Profile Name',
                    'image.min' => 'Image Longer then 4 Characters', 
                ]);

                if($image)
                {


                    
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      
                    Image::make($image)->resize(300,200)->save('image/profile/'.$name_gen);
            
                    $last_img = 'image/profile/'.$name_gen;
    
                    // $user->name = $request['name'];
                    // $user->email= $request['email'];
    
                    $user = User::find(auth()->user()->id);
                    $user2 = User::where('email',$request->email)->first();
                    if(!empty($user2) && $user2->id != $user->id){
                        return redirect()->route('Normaluser.profile')->with('error' , 'Email Already Exists');
                    }
             
                    User::where('id' , Auth::user()->id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'profile_photo_path' => $last_img,
                        'created_at' => Carbon::now()
                    ]);
                    // $user->save();
                    return redirect()->route('Normaluser.profile')->with('success' , 'User Profile is Updated Successfully');
                }
                else{

                    $user = User::find(auth()->user()->id);
                    $user2 = User::where('email',$request->email)->first();
                    if(!empty($user2) && $user2->id != $user->id){
                        return redirect()->route('Normaluser.profile')->with('error' , 'Email Already Exists');
                    }
                    User::where('id' , Auth::user()->id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'created_at' => Carbon::now()
                    ]);
                    // $user->save();
                    return redirect()->route('Normaluser.profile')->with('success' , 'User Profile is Updated Successfully');
                }
              
            }else{
                return redirect()->back();
            }
         }
    }

    public function resetPassword(Request $request)
    {
        $validate = $request->validate([

            'email'    => 'required',
            'password' => 'required',
            'password' => 'required|confirmed',
    
         ]);
$password = Hash::make($request->password);
         User::where('email' , $request->email)->update([
          'password' => $password,
         ]);

         Auth::logout();
         return redirect()->route('login')->with('success' , 'Password Reset Successfully');
    }
}
