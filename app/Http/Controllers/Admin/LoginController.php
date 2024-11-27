<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function LoginIndexPages(){
        return view("admin.pages.login");
    }
    //gelen giris degerleri

    public function LoginPagesPost(Request $request){
        $username = $request->username;
        $password = $request->password;
        $user=User::where("username",$username)->where("password",$password)->first();
        if($user){
            Auth::login($user);
            return redirect()->route("adminIndex")->with("success","Hoş Geldiniz.  '".ucwords($user->name)."'");
        }
        else{
            return redirect()->route("AdminLoginPage")->with("error","Lütfen Giriş Bilgilerini Kontrol Edin");
        }
    }

    //çıkış yap
    public function LogOut(){
        Auth::logout();
        return redirect()->route("AdminLoginPage")->with("success","Tekrar Görüşmek Üzere");
    }
}
