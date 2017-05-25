<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
  public function toLogin(Request $request)
  {
    
    return view('login');
  }

  public function toRegister($value='')
  {
    return view('register');
  }
}
