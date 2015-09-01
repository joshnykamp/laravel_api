<?php namespace App\Http\Middleware;

use Closure;

class Demo {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		//dd($request->root());
		/*
		 * make middleware to handle multiple domains and render a profile
		 * then pass company/user information to create them template.
		 * Try to do this over the weekend.
		 */
		if($request->has('foo')) {
			return redirect('articles');
		}
		return $next($request);
	}

}
