<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Namespace yang digunakan oleh controller.
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Definisikan rute untuk aplikasi Anda.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Daftarkan rute aplikasi.
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Definisikan rute untuk "web".
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Definisikan rute untuk "API".
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
