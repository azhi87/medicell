<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Hash;
class UserController extends Controller
{
   public function updateUser(Request $request,$id)
    {
         $this->validate($request,[
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:25',

        ]);
        $user = \App\User::find($id);
        $password = $request['password'];
        $password_confirmation = $request['password_confirmation'];
        if($request->has('password') && $request->has('password_confirmation'))
        {
            if($password!=$password_confirmation)
            {
                return back()->withErrors(["password"=>"password do not match"]);
            }
            $user->password=Hash::make($password);
        }
        
            $email=$request['email'];
            $user->email=$email;
            $user->name=$request['name'];
            $user->save();

            return redirect('/users');
    }
}
