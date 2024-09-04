<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Agent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getLogin()
    {
        $agent = new Agent();
        $isMobile = $agent->isMobile();
        if (Auth::check() and Auth::user()->admin)
            return Redirect::action('Admin\HomeController@getIndex');
        else
            return view('admin.auth.login')->with('isMobile', $isMobile);
    }

    public function postLogin(AuthRequest $request)
    {
        $login = Auth::attempt([
            'admin' => 1,
            'status' => 1,
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        if ($login) return Redirect::action('Admin\HomeController@getIndex');

        return Redirect::action('Auth\LoginController@getLogin')
            ->with('error', 'The login information is incorrect.');
    }
}

