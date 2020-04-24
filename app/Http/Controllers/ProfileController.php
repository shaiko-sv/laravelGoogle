<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('profile', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request, $id)
    {
        $user = User::find($id);
        $errors = [];
        $request->validated();
        if (Hash::check($request->input('password'), $user->password)){

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
        return redirect()->route('profile.show', $user)->withErrors($errors);


        return view('profile', [
            'user' => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
