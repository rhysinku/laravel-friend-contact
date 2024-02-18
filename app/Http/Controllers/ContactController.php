<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Contact;

class ContactController extends Controller
{
    //
    public function showUser($id){
        $contactUser = Contact::find($id);
        return view('contact.show' ,['contactShow' => $contactUser]);
    
    }

    
    public function displayUser(){
        $data = Contact::orderBy('updated_at' ,'desc')->simplePaginate(6);
       
        // $newContact = new Contact();
        // $newContact->name = "Rhysin";
        // $newContact->save();

        return view('dashboard.index',['contacts'=> $data]) ;
    }

    public function addUser(Request $request){

        $data = $request->validate([
            'name' =>'required',
            'company' =>'required',
            'phone' =>'required',
            'email' =>'required|email',
        ]);

        $newContact = Contact::create($data);

        // dd($data);
        return redirect()->route('home');
      
    }

    public function deleteUser($id){
        $data = Contact::where('id', $id)->firstOrFail();
        $data ->delete();
        
        return redirect()->route('home');
    }
}