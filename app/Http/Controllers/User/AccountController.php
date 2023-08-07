<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
   
    public function index(){
        $danhmucs = DB::table('danhmuc')
        ->select('madm','tendm','anhdm')
        ->orderBy('madm', 'DESC')
        ->get();
        return View('Front.Account.account',compact('danhmucs'));
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))) {

            return redirect()->route('home.index');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
   
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Set the Quyen property for the new user
        $user = $request->only(['name','email']);

        
        $user['role'] = $request->input('role', 0);
        $pass = $request->input('password');
        $user['password'] =  bcrypt($pass);
        $user['created_at'] =  date("Y-m-d");


        // Create a new user
        $users = Users::create($user);
       
        return redirect()->back();
    }
}
