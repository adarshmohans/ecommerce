<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function homepage(){
        $name = "Adarsh";
        $newName = strtoupper($name);
        return view('welcome', compact('newName'));
    }

    public function about(){
        return view('aboutUs');
    }
    public function contact(){
        return view('contact');
    }

    //Reading the Tables (CRUD)
    public function home(){
        //$users= User::all();
        //$user= User::find(43);
        //$user= User::where ('id', '=', 43)->get();
        //$user= User::where ('email', 'dubuque.mackenzie@example.com')->first();
        //$users= User::whereIn('id', [43, 23])->get();
        //return $user->dob;
        //return $user->dob->format('d-M-Y');
        //return $user->name;
        //$users=User::active()->get();
       // $users=User::active()->orderBy('name','ASC')->get();
        //$users=User::active()->latest()->get();
        $users=User::active()->latest()->limit(10)->get();
        return view('home', compact('users'));
    }

    //Creating a new record (CRUD)
    public function create(){
        return view('users.create');
    }

    public function save(){
        // User::create([
        //     'name' => request('name'),
        //     'email' => request('email'),
        //     'dob' => request('dob'),
        //     'status' => request('status'),
        // ]);
        // return redirect()->route('home');

       User::firstOrCreate([
            'email' => request('email')
        ],[
            'name' => request('name'),
            'dob' => request('dob'),
            'status' => request('status'),
        ]);
        return redirect()->route('homemain')->with('message','User created successfully');
    }

    public function edit($userId){
        $user= User::find(decrypt($userId));
        return view('users.edit', compact('user'));
    }

    public function update(){
        $userId= decrypt(request('id'));
        $user= User::find($userId);
        $user->update([
            'name'=> request('name'),
            'email'=> request('email'),
            'dob'=> request('dob'),
           'status'=> request('status'),
        ]);
        return redirect()->route('homemain')->with('message','User updated successfully');
    }
    public function delete($userId){
        $user= User::find(decrypt($userId));
        $user->delete();
        return redirect()->route('homemain')->with('message','User deleted successfully');
    }
}
