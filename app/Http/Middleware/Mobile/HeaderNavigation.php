<?php

namespace App\Http\Middleware\Mobile;

use App\Models\Position;
use Illuminate\Support\Facades\View;

class HeaderNavigation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $navData = [
            'pos' => Position::where(['stage' => 1, 'nav_show' => 1])
                ->orderBy('sort')
                ->get()
        ];

        View::share('__vs_nav_data', $navData);
        return $next($request);
    }
}
