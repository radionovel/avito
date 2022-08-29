<?php
declare(strict_types=1);


namespace App\Advertising\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pagination
{
    const DEFAULT_PAGE_SIZE = 10;

    public function handle(Request $request, Closure $next)
    {
        if (!$request->query->has('per_page')) {
            $request->query->set('per_page', self::DEFAULT_PAGE_SIZE);
        }

        return $next($request);
    }
}
