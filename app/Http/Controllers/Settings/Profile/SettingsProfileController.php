<?php

namespace App\Http\Controllers\Settings\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsProfileController extends Controller
{
    // //
    function __construct()
    {
        $this->middleware(['auth','password.confirm']);
    }

    function accountDelete(){
        return Inertia::render('Auth/ProfileDelete');
        // return view('newview');
        // dd('dd');
        // Inertia::render('Layouts/AppLayout');
    }
    function profileDeleteConfirm(){
        // auth()->user()->delete();
        $user = User::whereId(auth()->user()->id)->delete();

        return redirect()->route('home');
    }
}
