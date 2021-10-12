<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;

class LoginController extends Controller
{

    public function login()
    {
        try {
            //dd('i am here');
            return $this->getHomeService()->login();
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function signUp()
    {
        try {
            return $this->getHomeService()->signUp();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function signIn()
    {
        try {
            return $this->getHomeService()->signIn();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }
    

    public function userSignup()
    {
        try {
            return $this->getHomeService()->userSignup();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function forgotPassword()
    {
        try {
            return $this->getHomeService()->forgotPassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }
    
    public function signout()
    {
        try {
            \Illuminate\Support\Facades\Auth::logout();
            \Illuminate\Support\Facades\Session::flush();
            \Session::forget('userInfo');
            return redirect()->route('login')->with('success_message', 'You have logged out successfully');
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }
}
