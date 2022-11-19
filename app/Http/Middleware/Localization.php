<?php
namespace App\Http\Middleware;

use App;
use Closure;

class Localization {
    public function handle($request, Closure $next)
    {
        if (session()->has('locale') && session()->get('locale')!='fr'){
            App::setLocale(session()->get('locale'));
            session()->put('localeDB', '_'.session()->get('locale'));
        } else {
            session()->put('localeDB', '');
        }
        return $next($request);
    }
}