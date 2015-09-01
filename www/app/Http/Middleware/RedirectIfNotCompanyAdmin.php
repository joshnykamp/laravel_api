<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotCompanyAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//this would only be good for logged in users that dont have admin.
		if(!$request->user()->isACompanyAdmin())
		{
			return redirect('/');
		}
		return $next($request);
	}

}
