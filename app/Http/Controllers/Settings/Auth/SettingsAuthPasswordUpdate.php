<?php

namespace App\Http\Controllers\Settings\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsAuthPasswordUpdate extends Controller
{
    //
    function passwordUpdate(){
        return Inertia::render("Auth/PasswordUpdate");
    }
}
