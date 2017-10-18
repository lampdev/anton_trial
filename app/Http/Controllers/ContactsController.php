<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::user()->id)->get();
        
        return view('home', ['contacts' => $contacts]);
    }
    
    public function add(){

        return view('contacts.add');
    }
    
    public function addPost(Request $request){
        $post = $request->all();

        if (!empty($post)) {
            $request->validate([
                'first_name' => 'required|string|max:150',
                'last_name' => 'required|string|max:150',
                'email' => 'required|string|email|max:250',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:250',
            ]);
            
            Contact::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'user_id' => Auth::user()->id
            ]);

            return redirect()->route('contacts');
        }

        return redirect()->route('add_contact');
    }

    public function edit($id){
        $contact = Contact::where('id', $id)->first();

        return view('contacts.edit', ['contact' => $contact]);
    }

    public function editPost(Request $request, $id){
        $post = $request->all();

        if (!empty($post)) {
            $request->validate([
                'first_name' => 'required|string|max:150',
                'last_name' => 'required|string|max:150',
                'email' => 'required|string|email|max:250',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:250',
            ]);

            $contact = Contact::where('id', $id)->first();
            $contact->first_name = $request->get('first_name');
            $contact->last_name = $request->get('last_name');
            $contact->email = $request->get('email');
            $contact->phone = $request->get('phone');
            $contact->address = $request->get('address');
            $contact->save();

            return redirect()->route('contacts');
        }

        return redirect()->route('edit_contact',['id',$id]);
    }

    public function delete($id){
        $contact = Contact::where('id', $id)->first();
        $contact->delete();

        return redirect()->route('contacts');
    }
}
