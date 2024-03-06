<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomePageController extends Controller
{
    function Index(){
        $auth = auth()->check()? Auth::user() : null;
        $shareData = ['message' => 'Submit success', 'share_data' => $auth];
        return Inertia::render('Layouts/GuestLayout')->with($shareData);
    }
    function userRegister(Request $request){
        $JSON = $request->input();
        $shareData = ['message' => 'Submit success', 'share_data' => $JSON];

        // return redirect()->route('register',['data'=>$JSON]);
        return redirect()->route('register')->with($shareData);
    }
}
