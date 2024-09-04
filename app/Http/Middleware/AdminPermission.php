<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Route;

class AdminPermission
{

    public function __construct(Guard $auth)
    {

        $this->auth = $auth;

    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $segments = $request->segments();
        $segmentCounter = count($segments);

        $currentRouteActionAdmin = 'App\Http\Controllers\Admin\HomeController@getIndex';

        if ($this->auth->check()) {
            if (env('API_KEY') == '' || env('API_KEY') == 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx') {
                Session::push('errorKey', 'Please enter your key in the .env file in the API_KEY section');
            }
            if ($this->auth->user()->admin) {
                if ($segments[0] == Config::get('site.admin')) {
                    if (($segmentCounter > 1) && Route::currentRouteAction() !== $currentRouteActionAdmin) {
                        foreach ($this->auth->user()->roles as $role) {
                            $permission = unserialize($role->permission);
                            if (is_array($permission)) {
                                if ($permission['fullAccess'] == 1) {
                                    return $next($request);
                                }
                            }
                        }
                    } elseif (($segmentCounter > 0) && (Route::currentRouteAction() == $currentRouteActionAdmin)) {
                        return $next($request);
                    }
                }
            }

        }
        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            if (Auth::check() and Auth::user()->admin) {
                return redirect('/' . Config::get('site.admin'))->with('error', 'You do not have access to this section.');
            } else {
                return redirect()->action('Auth\LoginController@getLogin');
            }
        }
    }


}
