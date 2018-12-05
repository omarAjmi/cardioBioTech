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
        $user = User::findOrFail($id);
        return view('public.profile', [
            'user'=>$user,
            'title' => $user->getFullName().' | Profile'
            ]);
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

    public function updateAvatar(Request $request, int $id)
    {
        $user = User::findorFail($id);
        if($request->file('avatar')) {
            $user->photo = $user->uploadImage($request->file('avatar'), '/storage/users/avatars/', $id);
            $user->save();
        }
        return back();
    }
}
