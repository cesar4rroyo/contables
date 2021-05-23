<?php

namespace App\Providers;

use App\Models\Admin\OpcionMenu;
use Carbon\Carbon;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        view()->composer('theme.lte.aside', function ($view) {
            $opciones = OpcionMenu::getMenu();
            $view->with('opciones', $opciones);
        });
        view()->share('theme', 'lte');

        Carbon::setLocale(config('app.locale'));

        if (env('REDIRECT_HTTPS')) {
            $url->formatScheme('https://');
        }
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
                    }
        
    }
}
