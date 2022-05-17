<?php

namespace App\Http\Middleware\Admin;

use Closure;

class CheckUrlHasOrganizationId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('organization_id') && $request->organization_id){
            return $next($request);
        }
        abort(404);
    }
}
