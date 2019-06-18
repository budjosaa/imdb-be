<?php

namespace App\Http\Middleware;

use Closure;
Use App\Services\MovieServices\MovieService;


class incrementViews
{
    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;
     }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $this->movieService->increment($request->movie->id);
        return $next($request);
    }
}
