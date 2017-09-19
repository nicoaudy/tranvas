<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->back();
    }
}
