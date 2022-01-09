<?php namespace Renick\Shortener;

use App;
use Renick\Shortener\Classes\ShortenerMiddleware;
use System\Classes\PluginBase;
use Illuminate\Contracts\Http\Kernel;

class Plugin extends PluginBase
{
    public function boot()
    {
        if (App::runningInConsole() || App::runningUnitTests() || App::runningInBackend()) {
            return;
        }

        $kernel = $this->app[Kernel::class];
        $kernel->prependMiddleware(ShortenerMiddleware::class);
    }
}
