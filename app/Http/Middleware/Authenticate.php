<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\SiteDataController;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    /*
    protected function unauthenticated($request, array $guards)
    {
        abort(response()->json(['error' => 'Unauthenticated'], 401));
    }
    */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {

            if (in_array('auth:client', $request->route()->middleware())) {

                $lang = $request->route('lang');
                if (!$lang) {
                    $sitedctrlr = new SiteDataController();
                    $transarr = $sitedctrlr->FillTransData($lang);
                    $defultlang = $transarr['langs']->first();
                    $lang = $defultlang->code;
                }
                return route('login.client', $lang);

            } else if (in_array('guest:client', $request->route()->middleware())) {

                return route('site.home');


                // return  route('mymessages');
            } else if (in_array('auth:web', $request->route()->middleware())) {
                return route('login');
                //  return  route('mymessages');
            } else {
                return route('login.client');
                // return $request->expectsJson() ? null : route('login');
            }


        }
        // else{

        //     return route('login.client','ar');
        // }
        //  return $request->expectsJson() ? null : route('login');
    }

}
