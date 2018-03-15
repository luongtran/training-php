<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request) {
          $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
          ];
          $validator = Validator::make($request->all(), $rules);

          if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
          } else {
            $email = $request['email'];
            $password = $request['password'];

            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
              return redirect('/list/user');
            }
            else {
              $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    			    return redirect('/')->withErrors($errors);
            }
          }
  }
}
