<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'authAcc']);
    }

    public function profile( Request $request, int $id)
    {
        return view('public.profile', ['user'=>User::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return back();
    }

    public function updateAvatar(Request $request)
    {
        $user = Auth::user();
        if($request->file('avatar')) {
            $user->photo = '/users/avatars/'.$user->uploadAvatar($request->file('avatar'));
            $user->save();
        }
        return back();
    }
}
