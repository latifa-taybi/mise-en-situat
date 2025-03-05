<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        return view('registre',compact('roles'));
    }


    public function registre(StoreAuthRequest $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'role_id'=>$request->role,
        ]);
        // INSERT INTO users(name, email, password, role_id) VALUES ('name','email@gmail.com','password', 2)
        Auth::login($user);
        return redirect('/dashboard');
    }

    public function login(){
        return view('login');
    }

    public function connecter(LoginRequest $request)
    {
        $data = $request->validated();
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return view('login');
        // SELECT * FROM users WHERE email='email@gmail.com'

        // la requete de count users
        // SELECT COUNT(*) FROM users       
        
    }

    
    public function update(UpdateAuthRequest $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}






