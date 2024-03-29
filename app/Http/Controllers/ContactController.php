<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Contact;

class ContactController extends Controller
{

    public function displayUser(){

        // $user = auth()->user();
        // // $data = Contact::orderBy('updated_at' ,'desc');  
        //  $data = $user->contacts()->orderByDesc('updated_at')->paginate(6);  
        // if(request()->has('search')){
        //     $search = request()->search;
        //     $data = Contact::where('name', 'LIKE', '%'.$search.'%');
        // }
 
        // $newData = $data;
    //  return view('dashboard.index',['contacts'=> $newData]) ;
        $user = auth()->user();
        $data = $user->contacts()->orderByDesc('updated_at');  
        
        if (!$user){
            
            return view('dashboard.index' , ['contacts'=>  $data->paginate(6)]);
          
        }

       
        if(request()->has('search')){
            $search = request()->search;
            $data = $data->where('name', 'LIKE', '%'.$search.'%');
        }

        $newData = $data->paginate(6);
        return view('dashboard.index',['contacts'=> $newData]) ;
     
    
    }


    public function showUser($id){
        $contactUser = Contact::find($id);
        return view('contact.show' ,['contactShow' => $contactUser]);
    
    }
    
    public function showEdit(Contact $id){
      
         return view('contact.edit', ['info'=>$id]);
        
    }
    
    public function update(Request $request , $id){
        
        // dd($request);
        $updateData = $request-> validate([
            'name' =>'required',
            'company' =>'required',
            'phone' =>'required',
            'email' =>'required|email',
        ]);

        $account = Contact::find($id);

        $account->update($updateData);
        // dd($account);

       return redirect()->route('home'); 
        
    }

    
    public function addUser(Request $request){

        $data = $request->validate([
            'name' =>'required',
            'company' =>'required',
            'phone' =>'required',
            'email' =>'required|email',
        ]);
        $user = auth()->user();
        $data['user_id']=$user->id;
         $newContact = Contact::create($data);
        //  dd( $newContact );
         return redirect()->route('home');
      
    }

    public function deleteUser($id){
        $data = Contact::where('id', $id)->firstOrFail();
        $data ->delete();
        
        return redirect()->route('home');
    }
}