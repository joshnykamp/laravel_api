<?php
/**
 * Created by PhpStorm.
 * User: joshnykamp
 * Date: 5/11/15
 * Time: 8:36 AM
 */

namespace app\Http\Middleware;

use \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use PhpParser\Node\Expr\Closure;

class VerifyCsrfMiddleware extends VerifyCsrfToken {

    public function handle($request, Closure $next)
    {
        if ($this->isReading($request) || $this->excludedRoutes($request) || $this->tokensMatch($request))
        {
            return $this->addCookieToResponse($request, $next($request));
        }

        throw new TokenMismatchException;
    }

}