<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $tenantSchema = 'tenant_a';

        if (config('database_default') === 'pgsql') {
            $path = "\"$tenantSchema\",public";
            DB::statement("SET search_path TO $path");
        }
    }
}
