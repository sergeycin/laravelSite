<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use app\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function save(Request $request) {

    if (Auth::check()) {
        return redirect(route('load'));
    }

    $validateFields = $request->validate ([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = 'App\Models\User'::create($validateFields);

    if ($user) {
        Auth::login($user);
        return redirect(route('load'));
    }

    return redirect(route('auth.login'))->withErrors([
        'formError' => 'Error with saving form'
    ]);

   }

   public function showLoginForm()
   {
     return view('auth.login');
   }
}
