<?php
/**
 * Created by PhpStorm.
 * User: ironside
 * Date: 2/12/19
 * Time: 2:19 PM
 */

namespace Zymawy\Arabify;

use Illuminate\Support\ServiceProvider;
class ArabifyServiceProvider extends  ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
//        if ($this->app->runningInConsole()) {
//
//            $this->publishes([
//                __DIR__.'/../config/arabify.php' => config_path('arabify.php'),
//            ], 'config');
//        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}