<?php

namespace App\Http\Controllers\settings\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsProfile extends Controller
{
    public function index(){
        // return Inertia::render('Auth/Login');
        return Inertia::render('Settings/Profile/SettingsProfile');
    }
}
