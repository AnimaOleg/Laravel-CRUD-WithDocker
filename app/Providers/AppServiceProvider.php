<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Oleg - Esquema para longitud de consulta SQL al migrar ( SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes (Connection: mysql, SQL: alter table `users` add unique `users_email_unique`(`email`)))
use Illuminate\Support\Facades\Schema;
// Oleg - Paginador de Tabla
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // OLEG - Para evitar poner esto, hay que actualizar la versión de MySql
        Schema::defaultStringLength(191);

        // Oleg - Uso de estilos de Bootstrap 5
        Paginator::useBootstrapFive();
    }
}
