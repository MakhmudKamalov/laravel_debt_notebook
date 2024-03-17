<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;
  public function register()
  {
    return view('main-page.register');
  }

  protected function homepage()
  {
    return view('main');
  }

  protected function registerForm(RegisterFormRequest $request)
  {
    User::create([
      'name' => $request->name,
      'surname' => $request->surname,
      'phone' => $request->phone,
      'login' => $request->login,
      'password' => Hash::make($request->password),
    ]);
    return view('main-page.aldingi_index');
  }

  protected function loginCheck(Request $request)
  {
    $validated = $request->validate([
      'login' => 'required|min:3',
      'password' => 'required|min:5'
    ]);

    if (Auth::attempt($request->only('login', 'password'))) {
      $request->session()->regenerate();
      return redirect('main');
    } else {
      return back();
    }
  }

  protected function logout(Request $request)
  {
    Auth::logout();

    // Очистка сессии и редирект на страницу входа
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
  }

  protected function profilePage(Request $request)
  {
    return view('profile-page');
  }
}
