<?php

namespace App\Providers;

use App\View\Composers\PengaturanComposer;
use App\View\Composers\PenggunaComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // pengaturan
        View::composer('*', PengaturanComposer::class);

        // pengguna
        View::composer([
            'tampilan.dasbor'
        ], PenggunaComposer::class);
    }
}
