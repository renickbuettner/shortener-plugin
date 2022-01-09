<?php namespace Renick\Shortener\Classes;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Renick\Shortener\Models\Shortener;

class ShortenerMiddleware
{
    /**
     * Injects the redirects
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->method(), ['GET', 'POST', 'HEAD'], true)) {
            return $next($request);
        }

        try {
            $path = $request->path();

            if ($path === '/') {
                return $next($request);
            }

            $slug = str_replace('/', '', $path);
            $el = Shortener::where('slug', $slug)->firstOrFail();
            $el->onMiddlewareRedirect();
            return redirect()->to($el->target, 301);

        } catch (Exception $e) {
            // do nothing, it's quality code, I promise
        }

        return $next($request);
    }
}
