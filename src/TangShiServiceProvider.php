<?php
/**
 * Created by PhpStorm.
 * User: guozheng
 * Date: 2018/12/15
 * Time: 19:49
 */
namespace Guozheng\TangShi;

use Illuminate\Support\ServiceProvider;

class TangShierviceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->publishes([
//            __DIR__.'/views' => base_path('resources/views/vendor/qmang'),
//        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
//    public function register()
//    {
//        $this->app->singleton('tangshi', function($app) {
//            return new TangShi($app['session'], $app['config']);
//        });
//    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace('Guozheng\TangShi\Controllers')
            ->group(realpath(__dir__ . '/../routes/web.php'));
    }
}
