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
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace('Guozheng\TangShi\Controller\Web')
            ->group(realpath(__dir__ . '/../routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->namespace('Guozheng\TangShi\Controller\Api')
            ->group(realpath(__dir__ . '/../routes/api.php'));
    }
}
