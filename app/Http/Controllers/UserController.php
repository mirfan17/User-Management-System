<?php

namespace App\Http\Controllers;

use App\UdemyUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = UdemyUser::all();
        return view('welcome',['users'=>$users]);
    }

    public function create(){
        return view('add-user');
    }

    public function store(Request $request){

        UdemyUser::create($request->all());

        return redirect( '/');
    }


    public function delete($id){
        $user = UdemyUser::find($id);

        $user->delete();

        return back();
    }

    public function edit($id){
        $user = UdemyUser::find($id);

        return view('edit-user', ['user'=>$user]);
    }

    public function update(Request $request, $id){
        $user = UdemyUser::find($id);

        $user->update($request->all());

        return redirect('/');
    }
}
