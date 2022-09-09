<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Message;
class ContactController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index' , compact('contacts'));
    }
    public function AdminAddContact()
    {
        return view('admin.contact.create');
    }
    public function AdminstoreContact(Request $request)
    {


      Contact::insert([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        // 'create_at' => Carbon::now(),

      ]);
      return redirect()->route('admin.contact')->with('success' , 'Contact Added Successfully');
    }

    public function deleteContact($id)
    {
       
           $contact = Contact::find($id);
           $contact->delete();
           return redirect()->route('admin.contact')->with('success' , 'Contact Deleted Successfully');
    }
    
    public function EditAdminContact($id)
    {
       
           $contact = Contact::find($id);
           return view('admin.contact.edit' , compact('contact'));
    }

    public function UpdateAdminContact(Request $request , $id)
    {
      
     Contact::where('id' , $id)->update($request->except('_token'));
      return redirect()->route('admin.contact')->with('success' , 'Record Updated Successfully');
    }

    public function adminMessages()
    {
      $messages = Message::all();
      return view('admin.contact.messages' , compact('messages'));
    }

    public function adminMessageDelete($id)
    {
       $mess = Message::find($id);
       $mess->delete();
       return redirect()->route('admin.messages')->with('success' , 'Message deleted successfully');
    }

    public function storeMessage(Request $request)
    {
       $validate = $request->validate([
         'name' => 'required',
         'email' => 'required',
         'subject' => 'required',
         'message' => 'required',
       ]);

       $request->create($request->except('_token'));
       return redirect()->route('home.message')->with('success' , 'Your Message has been sent successfully.Thank you!');
    }

    public function messageHome()
    {
      $contact = Contact::first();
      return view('pages.contact' , compact('contact'));
    }
}
