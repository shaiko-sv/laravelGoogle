<?php

namespace App\Http\Controllers;

use App\Adaptors\Adaptor;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginVK()
    {
        if(Auth::check()) {
            return redirect()->route('/');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(Adaptor $userAdaptor)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin){
                return '/admin';
            }
            return '/';
        }
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userAdaptor->getUserBySocId($user, 'vk');

        Auth::login($userInSystem);
        if(Auth::user()->is_admin){
            return redirect()->route('admin.index');
        }
        return redirect()->route('main');
    }

    public function loginGitHub()
    {
        if(Auth::check()) {
            return redirect()->route('/');
        }
        return Socialite::with('github')->redirect();
    }

    public function responseGitHub(Adaptor $userAdaptor)
    {
        if(Auth::check()){
            return redirect()->route('/');
        }
        $user = Socialite::driver('github')->user();
        $userInSystem = $userAdaptor->getUserBySocId($user, 'github');

        Auth::login($userInSystem);
        if(Auth::user()->is_admin){
            return redirect()->route('admin.index');
        }
        return redirect()->route('main');
    }
}
