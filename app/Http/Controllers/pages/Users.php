<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;


class Users extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('content.pages.users',['users'=>$users]);
  }
  public function create(){

    return view('content.pages.users-create');
  }
  public function store(Request $request){
    $validator = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' =>'required',
    ]);
    $user = new user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('pages-users');

  }
  public function show($user_id){
    $user = User::find($user_id);
    return view('content.pages.users-show', ['user'=>$user]);
  }
  public function update(Request $request){
    $user = User::find($request->user_id);
    $user->name = $request->name;
    $user->email = $request->email;
    if(!empty($request->new_password)){
      $user->password = Hash::make($request->new_password);
    }
    $user->save();
    return redirect()->route('pages-users');
  }
  public function destroy($user_id){
    $user = User::find($user_id);
    $user->delete();
    return redirect()->route('pages-users');
  }
}
