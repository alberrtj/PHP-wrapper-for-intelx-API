<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function getIndex()
    {
        return Redirect::route('login');
    }

    public function anyLogout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::route('login');
    }
}
