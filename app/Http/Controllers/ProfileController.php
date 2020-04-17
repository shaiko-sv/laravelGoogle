<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = \Auth::user();

        $errors = [];

        if ($request->isMethod('post')){
            if (Hash::check($request->post('password'), $user->password)){

                if ((($request->post('newPassword')) != '' && ($request->post('password_confirmation') != '')) &&
                    $request->post('newPassword') === $request->post('password_confirmation')) {
                    $user->fill([
                        'name' => $request->post('name'),
                        'email' => $request->post('email'),
                        'password' => Hash::make($request->post('newPassword'))
                    ]);
                } elseif (($request->post('newPassword')) == '' && ($request->post('password_confirmation') == '')) {
                    $user->fill([
                        'name' => $request->post('name'),
                        'email' => $request->post('email')
                    ]);
                } else {
                    $errors['newPassword'][] = 'New password don\'t match.';
                }

                $user->save();
                $request->session()->flash('success', 'Profile successfully updated.');

            } else {
                $errors['password'][] = 'Wrong password.';
            }
            return redirect()->route('profile')->withErrors($errors);
        }

        return view('profile', [
            'user' => $user
        ]);

    }
}
