<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * show login page
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * show register page
     * @return response()
     */
    public function registration()
    {
        return view('auth.register');
    }
      
    /**
     * Doing Login Process
     * @return response()
     * @param Request $request
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('counsellors-detail', auth()->user()->id)->with('message', 'You have Successfully loggedin');
        }
        return redirect("login")->with('fail', 'Oppes! You have entered invalid credentials');
    }
      
    /**
     * Doing Register Process
     * @return response()
     * @param Request $request
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],
            'phone' => ['required', 'numeric', 'min:8'],
            'address' => ['required', 'string'],
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->route('question.index');
    }
    
    /**
     * Storing User data when the user register
     * @return response()
     * @param Array $data
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
    }
    
    /**
     * Doing logout Process
     * @return response()
     */
    public function logout() {
        Auth::logout();
        return Redirect('login')->with('message', 'Logout Successful');
    }
}
