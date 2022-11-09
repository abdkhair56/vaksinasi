<?php

namespace App\Http\Controllers\Backoffice\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request) {
        return view('backoffice.auth.login');
    }

    public function execute (Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }

        if (empty($request->only('email')) ) {
            return redirect()
             ->back()
             ->with('__error_message__', 'Email dan kata sandi yang Anda masukan tidak sesuai.');
        }
      
        if ($request->only('password')) {
            return redirect()
              ->back()
              ->with('__error_message__', 'Email dan kata sandi yang Anda masukan tidak sesuai.');
        }
    }

    public function logout (Request $request) {
        Auth::logout();
    
        // redirect ke halaman login
        return redirect()->route('login.index');
      }
}
