<?php
/**
 * Created by PhpStorm.
 * User: guozheng
 * Date: 2018/12/15
 * Time: 19:49
 */
namespace Guozheng\TangShi;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class TangShierviceProvider extends RouteServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
	parent::boot();
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton('tangshi', function($app) {
//            return new TangShi($app['session'], $app['config']);
//        });
        $this->commands([

        ]);
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('api', 'web')
            ->namespace('Guozheng\TangShi\Controllers')
            ->group(realpath(__dir__ . '/../routes/web.php'));
    }
}
