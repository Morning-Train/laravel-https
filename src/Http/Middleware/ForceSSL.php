<?php

namespace MorningTrain\Laravel\Https\Http\Middleware;


use Closure;

class ForceSSL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (config('https.redirect_to_https', false) && !$request->secure()) {
            return redirect()->secure(url($request->getPathInfo()));
        }

        return $next($request);
    }
}
